<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SSC Election Results</title>
    <style>
        @page { 
            margin: 60px 50px 90px 50px; /* Adjusted margins */
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
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .footer {
            position: fixed;
            bottom: -50px; /* Moved further down */
            left: 0;
            right: 0;
            height: 50px;
            background-color: white;
            text-align: center;
            font-size: 10px;
            border-top: 1px solid #e5e7eb;
            padding-top: 15px;
            color: #6b7280;
            margin-top: 20px;
        }
        .footer .pagenum:before {
            content: counter(page);
        }
        .page-break { page-break-after: always; }
        .header h1 { 
            color: white; 
            margin: 0;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .college-info { text-align: center; margin-bottom: 20px; }
        .section { margin-bottom: 30px; }
        .position-title { 
            background: #1e40af;
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
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th { 
            background: #2563eb;
            color: white;
            padding: 12px 15px;
            font-weight: 600;
        }
        th, td { 
            padding: 12px 15px; 
            text-align: left; 
            border-bottom: 1px solid #e5e7eb;
        }
        .stats { 
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            border-left: 4px solid #3b82f6;
            padding: 20px; 
            border-radius: 8px; 
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .stats h3 {
            color: #1a56db;
            margin-top: 0;
            margin-bottom: 15px;
        }
        .winner {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            font-weight: bold;
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
        <h1>Supreme Student Council (SSC) Election Results</h1>
        <p>Generated on: {{ $generatedAt }}</p>
    </div>

    <div class="main-content">
        <div class="stats">
            <h3>University-Wide Voting Statistics</h3>
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
                        <th>Candidate Name</th>
                        <th>College</th>
                        <th>Partylist</th>
                        <th>Votes</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($position->candidates as $index => $candidate)
                    <tr class="{{ $index === 0 && $candidate->vote_count > 0 ? 'winner' : '' }}">
                        <td>{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                        <td>{{ $candidate->college->acronym }}</td>
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
