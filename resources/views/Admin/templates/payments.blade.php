<!DOCTYPE html>
<html>

<head>
    <title>{{ $farmer['name'] }} Payments</title>
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
            height: 120px;
            padding: 0;

        }

        .main-table th.rotate div {
            transform: rotate(-90deg);
            /* Rotate the text */
            transform-origin: left bottom;
            /* Adjust the origin for better alignment */
            position: absolute;
            /* Positioning the rotated text correctly */
            bottom: 0;
            left: 50%;
            width: max-content;
            white-space: nowrap;
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
        <h4>{{ $farmer['name'] }} Payments summary</h4>
        @php
            $amountOwed = $totalAmountTransacted - $totalAmount_deducted;
            $totalSales = $totalPaymentsAmount + $totalAmount_deducted;
        @endphp

        <table class="summary-table" style="width: 50%; margin: 0 auto; border-collapse: collapse;">
            <tr style="border: 0; ">
                <td style="width: 50%; text-align: center; font-weight: bold;">Total Amount Payed</td>
                <td style="width: 50%; text-align: center;">KES {{ number_format(round($totalPaymentsAmount, 0)) }}</td>
            </tr>
            <tr style="border: 0; ">
                <td style="width: 50%; text-align: center; font-weight: bold;">Total Sales</td>
                <td style="width: 50%; text-align: center;">KES {{ number_format(round($totalSales, 0)) }}</td>
            </tr>
            <tr style="border: 0; ">
                <td style="width: 50%; text-align: center; font-weight: bold;">Total Deductions</td>
                <td style="width: 50%; text-align: center;">KES {{ number_format(round($totalAmount_deducted, 0)) }}
                </td>
            </tr>
            <tr style="border: 0; ">
                <td style="width: 50%; text-align: center; font-weight: bold;">Amount Owed to PEMU</td>
                <td style="width: 50%; text-align: center; color:red;">KES {{ number_format(round($amountOwed, 0)) }}
                </td>
            </tr>
        </table>
    </div>
    <div class="content">
        <h4 style="text-decoration: underline">List of Payments</h4>
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
                        <div>Crop</div>
                    </th>
                    <th class="rotate">
                        <div>Delivery Date</div>
                    </th>
                    <th class="rotate">
                        <div>Accepted Kgs</div>
                    </th>
                    <th class="rotate">
                        <div>Unit Price (KES)</div>
                    </th>
                    <th class="rotate">
                        <div>Total Value</div>
                    </th>
                    <th class="rotate">
                        <div>Amount Deducted</div>
                    </th>
                    <th class="rotate">
                        <div>Total Debt</div>
                    </th>
                    <th class="rotate">
                        <div>Amount Paid</div>
                    </th>
                    <th class="rotate">
                        <div>Debt Balance</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allFarmerPayments as $index => &$pemupayment)
                    <tr>
                        @php
                            $totalValue =
                                floatval($pemupayment['amount_deducted']) + floatval($pemupayment['amount_payed']);
                            $debtBalance =
                                floatval($pemupayment['debt_balance']) - floatval($pemupayment['amount_deducted']);
                        @endphp
                        <td>{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($pemupayment['$createdAt'])->format('d/m/Y') }}</td>
                        <td>{{ $pemupayment['PaymentcropDetails'] }}</td>
                        <td>{{ $pemupayment['deliveryDates'] }}</td>
                        <td>{{ $pemupayment['acceptedKgs'] }}</td>
                        <td>{{ $pemupayment['unitPrice'] }}</td>
                        <td style="color: green">KES {{ round($totalValue, 2) }}</td>
                        <td style="color: green">KES {{ round($pemupayment['amount_deducted'], 2) }}</td>
                        <td style="color: red">KES {{ round($pemupayment['debt_balance'], 2) }}</td>
                        <td style="color: green">KES {{ round($pemupayment['amount_payed'], 2) }}</td>
                        <td style="color: orange">KES {{ round($debtBalance, 2) }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="10" style="text-align: right;"><strong>Total Amount Payed to
                            {{ $farmer['name'] }}</strong></td>
                    <td class="total-amount"><strong>KES {{ $totalPaymentsAmount }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
