<!DOCTYPE html>
<html>
<head>
    <title>System Reports</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        h2 { margin-top: 30px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>📊 System Reports</h1>

    <h2>Complaints by Status</h2>
    <table>
        <tr><th>Status</th><th>Total</th></tr>
        @foreach ($complaintsByStatus as $row)
            <tr>
                <td>{{ $row->status }}</td>
                <td>{{ $row->total }}</td>
            </tr>
        @endforeach
    </table>

    <h2>Complaints by Assigned Employee</h2>
    <table>
        <tr><th>Employee</th><th>Total</th></tr>
        @foreach ($complaintsByEmployee as $row)
            <tr>
                <td>{{ $row->name }}</td>
                <td>{{ $row->total }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
