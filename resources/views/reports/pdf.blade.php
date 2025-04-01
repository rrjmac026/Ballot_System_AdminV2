<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Election Results Report</title>
    <style>
        @page { margin: 60px 50px 90px 50px; }
        body { font-family: sans-serif; line-height: 1.6; }
        .page-break { page-break-after: always; }
        .header {
            padding: 20px;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .section {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .section h2 {
            color: #0f172a;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .progress-bar { 
            height: 10px;
            background: #e5e7eb;
            border-radius: 5px;
            overflow: hidden;
        }
        .progress-bar div {
            background: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%);
            height: 100%;
            border-radius: 5px;
        }
        .stats { margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Election Results Report</h1>
        <p>Generated on: {{ $generatedAt }}</p>
    </div>

    <div class="section">
        <h2>Voting Summary</h2>
        <div class="stats">
            <p>Total Eligible Voters: {{ $totalVoters }}</p>
            <p>Total Votes Cast: {{ $totalVoted }}</p>
            <p>Voter Turnout: {{ round(($totalVoted / $totalVoters) * 100, 2) }}%</p>
        </div>
    </div>

    @foreach($positions as $position)
    <div class="section">
        <h2>{{ $position->name }} Results</h2>
        <table>
            <tr>
                <th>Candidate</th>
                <th>Party</th>
                <th>Votes</th>
                <th>Percentage</th>
            </tr>
            @foreach($position->candidates as $candidate)
            <tr>
                <td>{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                <td>{{ $candidate->partylist->acronym }}</td>
                <td>{{ $candidate->vote_count }}</td>
                <td>{{ round(($candidate->vote_count / $totalVoted) * 100, 2) }}%</td>
            </tr>
            @endforeach
        </table>
    </div>
    @if(!$loop->last)
    <div class="page-break"></div>
    @endif
    @endforeach

    <div class="section">
        <h2>Voter Turnout by College</h2>
        <table>
            <tr>
                <th>College</th>
                <th>Total Voters</th>
                <th>Voted</th>
                <th>Turnout</th>
            </tr>
            @foreach($collegeStats as $stat)
            <tr>
                <td>{{ $stat['name'] }}</td>
                <td>{{ $stat['totalVoters'] }}</td>
                <td>{{ $stat['votedCount'] }}</td>
                <td>{{ $stat['percentage'] }}%</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
