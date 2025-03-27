<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Election Results Report</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; }
        .page-break { page-break-after: always; }
        .header { text-align: center; margin-bottom: 30px; }
        .section { margin-bottom: 30px; }
        .progress-bar { 
            width: 100%;
            background: #eee;
            padding: 3px;
            border-radius: 3px;
            margin: 5px 0;
        }
        .progress-bar div {
            background: #4299e1;
            height: 20px;
            border-radius: 3px;
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
