<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\College;
use App\Models\CastedVote;
use App\Models\Voter;
use Illuminate\Http\Request;
use App\Helpers\CustomPDF;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $colleges = College::select('name', 'acronym')->get();
        $data = $this->getReportData();
        
        // Add positions data for the view
        $data['positions'] = Position::with(['candidates' => function($query) {
            $query->select('candidates.*')
                ->selectRaw('(
                    SELECT COUNT(*)
                    FROM casted_votes
                    WHERE casted_votes.candidate_id = candidates.candidate_id
                    AND casted_votes.position_id = candidates.position_id
                ) as vote_count')
                ->with(['partylist', 'college'])
                ->orderByDesc('vote_count');
        }])->orderBy('position_order')->get();

        // Add college statistics
        $data['collegeStats'] = College::with(['voters' => function ($query) {
            $query->where('status', 'Active');
        }])
        ->get()
        ->map(function ($college) {
            $totalVoters = $college->voters->count();
            $votedCount = CastedVote::whereIn('voter_id', $college->voters->pluck('voter_id'))
                ->distinct('voter_id')
                ->count();
            
            return [
                'name' => $college->name,
                'totalVoters' => $totalVoters,
                'votedCount' => $votedCount,
                'percentage' => $totalVoters > 0 ? round(($votedCount / $totalVoters) * 100, 2) : 0
            ];
        });
        
        $data['colleges'] = $colleges;
        return view('reports.index', $data);
    }

    public function generatePDF(Request $request)
    {
        $type = $request->type ?? 'all';
        $college = $request->college;
        
        // Get data based on type
        if ($type === 'ssc') {
            $data = $this->getSSCReportData();
            $filename = 'SSC_election_results.pdf';
            return $this->generateSSCPDF($data, $filename);
        } elseif ($type === 'sbo') {
            $data = $this->getSBOReportData($college);
            $filename = $college . '_sbo_election_results.pdf';
            return $this->generateSBOPDF($data, $filename);
        } else {
            $data = $this->getReportData();
            $filename = 'ALL_election_results.pdf';
            return $this->generateFullPDF($data, $filename);
        }
    }

    private function generateSSCPDF($data, $filename)
    {
        $pdf = new CustomPDF('P', 'mm', 'A4');
        $pdf->SetAutoPageBreak(true, 25);
        $pdf->AliasNbPages();  // For total page numbers
        $pdf->SetMargins(15, 15, 15);
        
        // Add first page
        $pdf->AddPage();

        // Add header
        $this->addHeaderToPage($pdf, "Supreme Student Council (SSC) Election Results", $data['generatedAt']);
        
        // Add stats section
        $this->addStatsSection($pdf, $data);

        // Column widths and headers
        $widths = [70, 30, 35, 25, 20, 15];  // Adjusted for A4 width
        $this->drawTableHeader($pdf, $widths);

        // Table Content - Handle page breaks
        foreach($data['positions'] as $position) {
            if ($pdf->GetY() > 250) {
                $pdf->AddPage();
                $this->drawTableHeader($pdf, $widths);
            }

            $this->drawPositionSection($pdf, $position, $data['totalVoted'], $widths);
        }

        // Add signatories after all results
        $pdf->AddSignatories();

        return $pdf->Output('D', $filename);
    }

    private function addHeaderToPage($pdf, $title, $date)
    {
        $timestamp = Carbon::now('Asia/Manila')->format('F j, Y H:i:s T');
        
        $pdf->SetFont('Arial', 'B', 16);
        // Split title into multiple lines if it contains newline
        foreach(explode("\n", $title) as $line) {
            $pdf->Cell(0, 10, $line, 0, 1, 'C');
        }
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Generated on: ' . $timestamp, 0, 1, 'C');
        $pdf->Ln(5);
    }

    private function drawPositionSection($pdf, $position, $totalVoted, $widths)
    {
        // Adjust column widths to better fit content
        $widths = [70, 30, 35, 25, 20]; // Adjusted widths for each column
        
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(0, 8, $position->name, 0, 1, 'L');
        $pdf->SetFont('Arial', '', 10);

        foreach($position->candidates as $index => $candidate) {
            // Check if we need a new page
            if($pdf->GetY() > 270) {  // Leave space for footer
                $pdf->AddPage();
                $this->drawTableHeader($pdf, $widths);
            }

            $this->drawCandidateRow($pdf, $candidate, $totalVoted, $widths, $index % 2 == 0);
        }

        $pdf->Ln(3);  // Small space between positions
    }

    private function drawTableHeader($pdf, $widths)
    {
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetFillColor(168, 85, 247); // Changed to purple-400
        $pdf->SetTextColor(255);
        
        $headers = ['Candidate Name', 'College', 'Partylist', 'Votes', '%'];
        foreach($headers as $i => $header) {
            $pdf->Cell($widths[$i], 10, $header, 1, 0, 'C', true);
        }
        $pdf->Ln();
        $pdf->SetTextColor(0);
    }

    private function drawCandidateRow($pdf, $candidate, $totalVoted, $widths, $fill = false)
    {
        $name = $candidate->first_name . ' ' . $candidate->last_name;  // Changed + to . for string concatenation
        $percentage = $totalVoted > 0 ? round(($candidate->vote_count / $totalVoted) * 100, 2) : 0;
        
        $pdf->Cell($widths[0], 10, $name, 1, 0, 'L', $fill);
        $pdf->Cell($widths[1], 10, $candidate->college->acronym, 1, 0, 'C', $fill);
        $pdf->Cell($widths[2], 10, $candidate->partylist->acronym, 1, 0, 'C', $fill);
        $pdf->Cell($widths[3], 10, $candidate->vote_count, 1, 0, 'R', $fill);
        $pdf->Cell($widths[4], 10, $percentage.'%', 1, 0, 'R', $fill);
        $pdf->Ln();
    }

    private function addStatsSection($pdf, $data)
    {
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, 'Voting Statistics', 0, 1, 'L');
        $pdf->SetFont('Arial', '', 12);
        
        $totalVoters = $data['totalVoters'] ?? 0;
        $totalVoted = $data['totalVoted'] ?? 0;
        $turnoutPercentage = $totalVoters > 0 ? round(($totalVoted / $totalVoters) * 100, 2) : 0;
        
        $stats = [
            ['Total Eligible Voters:', number_format($totalVoters)],
            ['Total Votes Cast:', number_format($totalVoted)],
            ['Voter Turnout:', $turnoutPercentage . '%']
        ];
        
        foreach($stats as $stat) {
            $pdf->Cell(60, 8, $stat[0], 0, 0, 'L');
            $pdf->Cell(0, 8, $stat[1], 0, 1, 'L');
        }
        $pdf->Ln(5);
    }

    public function generateSBOPDF($data, $filename)
    {
        $pdf = new CustomPDF('P', 'mm', 'A4');
        $pdf->SetAutoPageBreak(true, 25);
        $pdf->AliasNbPages();
        $pdf->SetMargins(15, 15, 15);
        
        // Add first page
        $pdf->AddPage();
        
        // Add header with college name first, then SBO title
        $title = $data['college']->name . "\nStudent Body Organization (SBO) Election Results";
        $this->addHeaderToPage($pdf, $title, $data['generatedAt']);
        
        // Add stats section
        $this->addStatsSection($pdf, $data);

        // Column widths and headers
        $widths = [70, 30, 35, 25, 20];
        $this->drawTableHeader($pdf, $widths);

        // Table Content - Handle page breaks
        foreach($data['positions'] as $position) {
            if ($pdf->GetY() > 250) {
                $pdf->AddPage();
                $this->drawTableHeader($pdf, $widths);
            }

            $this->drawPositionSection($pdf, $position, $data['totalVoted'], $widths);
        }

        // Add signatories after all results
        $pdf->AddSignatories();

        return $pdf->Output('D', $filename);
    }

    public function generateFullPDF($data, $filename)
    {
        $pdf = new CustomPDF('P', 'mm', 'A4');
        $pdf->SetAutoPageBreak(true, 25);
        $pdf->AliasNbPages();
        $pdf->SetMargins(15, 15, 15);
        
        // Add first page
        $pdf->AddPage();

        // Add header
        $this->addHeaderToPage($pdf, "Complete Election Results Report", $data['generatedAt']);
        
        // Add stats section
        $this->addStatsSection($pdf, $data);

        // First display SSC results
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, 'Supreme Student Council (SSC) Results', 0, 1, 'L');
        $pdf->Ln(2);

        $widths = [70, 30, 35, 25, 20];
        $this->drawTableHeader($pdf, $widths);

        // Display SSC positions (1-3)
        foreach($data['sscPositions'] as $position) {
            if ($pdf->GetY() > 250) {
                $pdf->AddPage();
                $this->drawTableHeader($pdf, $widths);
            }
            $this->drawPositionSection($pdf, $position, $data['totalVoted'], $widths);
        }

        // Then display results by college
        foreach($data['collegeResults'] as $college) {
            $pdf->AddPage();
            
            // College header
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(0, 10, $college['name'] . ' Results', 0, 1, 'L');
            $pdf->Ln(2);

            if (!empty($college['positions'])) {
                $this->drawTableHeader($pdf, $widths);
                
                foreach($college['positions'] as $position) {
                    if ($pdf->GetY() > 250) {
                        $pdf->AddPage();
                        $pdf->SetFont('Arial', 'B', 14);
                        $pdf->Cell(0, 10, $college['name'] . ' Results (continued)', 0, 1, 'L');
                        $pdf->Ln(2);
                        $this->drawTableHeader($pdf, $widths);
                    }
                    $this->drawPositionSection($pdf, $position, $college['totalVoted'], $widths);
                }
            } else {
                $pdf->SetFont('Arial', '', 11);
                $pdf->Cell(0, 10, 'No candidates found for this college.', 0, 1, 'L');
            }
        }

        // Add signatories after all results
        $pdf->AddSignatories();

        return $pdf->Output('D', $filename);
    }

    private function getReportData()
    {
        // Get SSC positions first (1-3: President, VP, Senators)
        $sscPositions = Position::whereIn('position_id', [1, 2, 3])
            ->with(['candidates' => function($query) {
                $query->select('candidates.*')
                    ->selectRaw('(
                        SELECT COUNT(*)
                        FROM casted_votes
                        WHERE casted_votes.candidate_id = candidates.candidate_id
                        AND casted_votes.position_id = candidates.position_id
                    ) as vote_count')
                    ->with(['partylist', 'college'])
                    ->orderByDesc('vote_count');
            }])->orderBy('position_order')->get();

        // Get results organized by college
        $colleges = College::all();
        $collegeResults = $colleges->map(function($college) {
            // Get positions 4-14 (Governor to Representatives) for this college
            $positions = Position::whereIn('position_id', range(4, 14))
                ->with(['candidates' => function($query) use ($college) {
                    $query->where('college_id', $college->college_id)
                        ->selectRaw('candidates.*, (
                            SELECT COUNT(*)
                            FROM casted_votes
                            WHERE casted_votes.candidate_id = candidates.candidate_id
                            AND casted_votes.position_id = candidates.position_id
                        ) as vote_count')
                        ->with(['partylist', 'college'])
                        ->orderByDesc('vote_count');
                }])
                ->get()
                ->filter(function($position) {
                    return $position->candidates->isNotEmpty();
                });

            $collegeVoters = Voter::where('college_id', $college->college_id)
                ->where('status', 'Active');

            return [
                'name' => $college->name,
                'positions' => $positions,
                'totalVoters' => $collegeVoters->count(),
                'totalVoted' => CastedVote::whereIn('voter_id', $collegeVoters->pluck('voter_id'))
                    ->distinct('voter_id')
                    ->count()
            ];
        });

        // Get overall statistics
        $totalVoters = Voter::where('status', 'Active')->count();
        $totalVoted = CastedVote::distinct('voter_id')->count();

        return [
            'sscPositions' => $sscPositions,
            'collegeResults' => $collegeResults,
            'totalVoters' => $totalVoters,
            'totalVoted' => $totalVoted,
            'generatedAt' => now()->timezone('Asia/Manila')->format('F j, Y H:i:s T')
        ];
    }

    private function getSSCReportData()
    {
        // Get SSC positions (President, VP, Senators)
        $positions = Position::whereIn('position_id', [1, 2, 3])
            ->with(['candidates' => function($query) {
                $query->select('candidates.*')
                    ->selectRaw('(
                        SELECT COUNT(*)
                        FROM casted_votes
                        WHERE casted_votes.candidate_id = candidates.candidate_id
                        AND casted_votes.position_id = candidates.position_id
                    ) as vote_count')
                    ->with(['partylist', 'college'])
                    ->orderByDesc('vote_count');
            }])->orderBy('position_order')->get();

        return [
            'positions' => $positions,
            'totalVoters' => \App\Models\Voter::where('status', 'Active')->count(),
            'totalVoted' => CastedVote::distinct('voter_id')->count(),
            'generatedAt' => now()->format('F j, Y h:i A')
        ];
    }

    private function getSBOReportData($college)
    {
        // Get college info
        $collegeInfo = College::where('acronym', $college)->firstOrFail();

        // Get SBO positions (4-14: Governor to Representatives)
        $positions = Position::whereIn('position_id', range(4, 14))
            ->with(['candidates' => function($query) use ($collegeInfo) {
                $query->where('college_id', $collegeInfo->college_id)
                    ->selectRaw('candidates.*, (
                        SELECT COUNT(*)
                        FROM casted_votes
                        WHERE casted_votes.candidate_id = candidates.candidate_id
                        AND casted_votes.position_id = candidates.position_id
                    ) as vote_count')
                    ->with(['partylist', 'college'])
                    ->orderByDesc('vote_count');
            }])
            ->get()
            ->filter(function($position) {
                return $position->candidates->isNotEmpty();
            });

        // Get voters from this college
        $collegeVoters = Voter::where('college_id', $collegeInfo->college_id)
            ->where('status', 'Active');

        return [
            'college' => $collegeInfo,
            'positions' => $positions,
            'totalVoters' => $collegeVoters->count(),
            'totalVoted' => CastedVote::whereIn('voter_id', $collegeVoters->pluck('voter_id'))
                ->distinct('voter_id')
                ->count(),
            'generatedAt' => now()->format('F j, Y h:i A')
        ];
    }
}
