<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $college->name }} SBO Results</title>
    <style>
        @page { 
            margin: 60px 50px 90px 50px;
        }
        body { 
            font-family: sans-serif; 
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .header { 
            position: fixed;
            top: -60px;
            left: 0;
            right: 0;
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #581c87 0%, #7e22ce 100%);
            color: white;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .footer {
            position: fixed;
            bottom: -50px;
            left: 0;
            right: 0;
            height: 50px;
            background-color: white;
            text-align: center;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 20px;
        }
        .footer .pagenum:before {
            content: counter(page);
        }
        .page-break { page-break-after: always; }
        .header h1, .header h2 { 
            color: white;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .college-info { text-align: center; margin-bottom: 20px; }
        .section { margin-bottom: 30px; }
        .position-title { 
            background: #581c87;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 18px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 20px; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th { 
            background: #7e22ce;
            color: white;
            padding: 12px 15px;
            font-weight: 600;
        }
        td { 
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
        }
        .stats { 
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            border-left: 4px solid #7e22ce;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .content {
            margin-top: 40px;
            margin-bottom: 60px;
        }
        .position-section:not(:last-child) {
            margin-bottom: 30px;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 20px;
        }
        .main-content {
            margin-bottom: 50px; /* Space for footer */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Student Body Organization (SBO) Election Results</h1>
        <h2>{{ $college->name }} ({{ $college->acronym }})</h2>
        <p>Generated on: {{ $generatedAt }}</p>
    </div>

    <div class="main-content">
        <div class="stats">
            <h3>College-Specific Voting Statistics</h3>
            <p>Total Eligible Voters: {{ $totalVoters }}</p>
            <p>Total Votes Cast: {{ $totalVoted }}</p>
            <p>Voter Turnout: {{ $totalVoters > 0 ? round(($totalVoted / $totalVoters) * 100, 2) : 0 }}%</p>
        </div>

        @foreach($positions as $position)
        <div class="position-section">
            <h3 class="position-title">{{ $position->name }}</h3>
            <table>
                <thead>
                    <tr>
                        <th>Candidate</th>
                        <th>Partylist</th>
                        <th>Votes</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($position->candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                        <td>{{ $candidate->partylist->acronym }}</td>
                        <td>{{ $candidate->vote_count }}</td>
                        <td>{{ $totalVoted > 0 ? round(($candidate->vote_count / $totalVoted) * 100, 2) : 0 }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach
    </div>

    <div class="footer">
        <p style="margin: 0;">
            BukSU Comelec © {{ date('Y') }} | Page <span class="pagenum"></span>
        </p>
    </div>
</body>
</html>
