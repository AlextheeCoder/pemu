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
            width: 95%;
            /* Increased width to take up more space */
            max-width: 1000px;
        }

        .main-table table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed;
            /* Ensures columns are evenly distributed */
        }

        .main-table th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            /* Reduced padding */
            text-align: center;
            font-size: 12px;
            /* Reduced font size */
            vertical-align: top;
        }

        .main-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
            position: relative;
            height: 30px;
            padding: 0;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
            /* Ensures text is not wrapped */
            overflow: hidden;
            text-overflow: ellipsis;
            /* Adds ellipsis if text overflows */

        }



        .main-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .main-table tr:hover {
            background-color: #f1f1f1;
        }

        .total-row {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .total-amount {
            color: green;
        }

        .summary-table {
            /* If you want to add any additional styles for this table */
        }
    </style>

</head>

<body>
    <div class="header">
        <img src="img/lgo.jpeg" alt="Company Logo">
        <h1>PEMU AGRIFOOD ACADEMY</h1>
        <h4>{{ $farmer['name'] }} Transactions summary</h4>

    </div>
    <div class="content">
        <h4 style="text-decoration: underline">List of Transactions</h4>
        <table class="main-table">
            <thead>
                <tr>
                    <th class="rotate">
                        <div>#</div>
                    </th>
                    <th class="rotate">
                        <div>Transaction Date</div>
                    </th>
                    <th class="rotate">
                        <div>Product Name</div>
                    </th>
                    <th class="rotate">
                        <div>Quantity</div>
                    </th>
                    <th class="rotate">
                        <div>Amount</div>
                    </th>


                </tr>
            </thead>
            <tbody>
                @foreach ($farmerTransactions as $index => $farmerTransaction)
                    <tr>

                        <td>{{ $index + 1 }}</td>

                        <td>{{ \Carbon\Carbon::parse($farmerTransaction['$createdAt'])->format('d/m/Y') }}</td>
                        <td>{{ $farmerTransaction['product_name'] }}</td>
                        <td>{{ $farmerTransaction['quantity'] }}</td>
                        <td style="color: green">{{ $farmerTransaction['amount'] }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="4" style="text-align: right;"><strong>Total Amount:</strong></td>
                    <td class="total-amount"><strong>KES {{ $totalAmount }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
