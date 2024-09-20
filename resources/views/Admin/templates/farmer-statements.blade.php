<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Statement</title>
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
    </style>
</head>

<body>
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
                <th>Date</th>
                <th>Crop</th>
                <th>Product</th>
                <th>Produce Sold</th>
                <th>Balance (in Ksh)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statementEntries as $entry)
                <tr>
                    <td>{{ $entry['date'] }}</td>
                    <td>{{ is_array($entry['crop']) ? implode(', ', $entry['crop']) : $entry['crop'] }}</td>
                    <!-- Convert array to string if necessary -->
                    <td>{{ is_array($entry['product']) ? implode(', ', $entry['product']) : $entry['product'] }}</td>
                    <!-- Convert array to string if necessary -->
                    <td>{{ is_array($entry['produce']) ? implode(', ', $entry['produce']) : $entry['produce'] }}</td>
                    <!-- Convert array to string if necessary -->
                    <td>{{ number_format($entry['balance'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>


    </table>

    <div class="footer">
        <p>Generated on {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
        <p>© 2024 Farmer Management System</p>
    </div>
</body>

</html>
