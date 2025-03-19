<!DOCTYPE html>
<html>
<head>
    <title>Election Results Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .section { margin-bottom: 30px; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <div class="header">
        <h1>BukSU Election Results</h1>
        <p>Generated on: {{ now()->format('F d, Y h:i A') }}</p>
    </div>

    <div class="section">
        <h2>Vote Count by Position</h2>
        <table>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Total Votes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($positionResults as $result)
                <tr>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->vote_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <h2>Winning Candidates</h2>
        <table>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Candidate</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($winners as $position => $candidates)
                @php $winner = $candidates->first(); @endphp
                <tr>
                    <td>{{ $position }}</td>
                    <td>{{ $winner->first_name }} {{ $winner->last_name }}</td>
                    <td>{{ $winner->vote_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
