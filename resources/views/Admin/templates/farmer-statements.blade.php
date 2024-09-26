<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $farmer['name'] }}'s Statement
    </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="img/lgo.jpeg" alt="Company Logo">
    </div>

    <h2>Farmer Statement</h2>

    <table>
        <tr>
            <th>Farmer Name:</th>
            <td>{{ $farmer['name'] }}</td>
        </tr>
        <tr>
            <th>Farmer ID:</th>
            <td>{{ $farmer['$id'] }}</td>
        </tr>
    </table>

    <h3>Statement Details</h3>
    <table>
        <thead>
            <tr>
                <th>Crop</th>
                <th>Input </th>
                <th>Unit Price</th>
                <th>Deliverable (Kgs)</th>
                <th>Total Deliverable Value</th>
                <th>Balance </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statement as $row)
                <tr>
                    <td>{{ $row['crop'] }}</td>
                    <td>{{ $row['transaction'] ?? '-' }}</td>
                    <td>{{ $row['amount_spent'] ?? '-' }}</td>
                    <td>{{ $row['kg_sold'] ?? '-' }}</td>
                    <td>{{ $row['value_sold'] ?? '-' }}</td>
                    <td>{{ $row['balance'] }}</td>
                </tr>
            @endforeach
        </tbody>


    </table>

    <div class="footer">
        <p>Generated on {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
        <p>© 2024 PEMU AGRIFOOD ACADEMY Management System</p>
    </div>
</body>

</html>
