<!DOCTYPE html>
<html>

<head>
    <title>{{ $farmer['name'] }} Transactions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;

        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
            margin-top: 20px;
        }

        .header h1 {
            margin: 10px 0;
            font-size: 24px;
            color: #333;
        }

        .content {
            margin: 20px auto;
            width: 90%;
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .total-row {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .total-amount {
            color: green;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="img/lgo.jpeg" alt="Company Logo">
        <h1>PEMU AGRIFOOD ACADEMY</h1>
    </div>

    <div class="content">
        <h2>{{ $farmer['name'] }} Transactions</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Transaction Date</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($farmerTransactions as $index => $farmerTransaction)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($farmerTransaction['$createdAt'])->format('d/m/Y') }}</td>
                        <td>{{ $farmerTransaction['product_name'] }}</td>
                        <td>{{ $farmerTransaction['quantity'] }}</td>
                        <td>{{ $farmerTransaction['amount'] }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="6" style="text-align: right;"><strong>Total Amount:</strong></td>
                    <td class="total-amount"><strong>KES {{ $totalAmount }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
