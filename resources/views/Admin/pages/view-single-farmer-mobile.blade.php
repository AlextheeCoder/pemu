<x-adminlayout>
    <div class="influence-profile">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h3 class="mb-2">Farmer Profile </h3>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/pemu-admin"
                                            class="breadcrumb-link">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/pemu/view/moblie/farmers"
                                            class="breadcrumb-link">Farmers</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Farmer Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- profile -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- card profile -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-body">

                            <div class="text-center">
                                <h2 class="font-24 mb-0">{{ $farmer['name'] }}</h2>

                            </div>
                        </div>
                        <div class="card-body border-top">
                            <h3 class="font-16">Contact Information</h3>
                            <div class="">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-0">Phone Number: <span
                                            style="color: green">{{ $farmer['phonenumber'] }}</span> </li>
                                    <li class="mb-0">ID Number: <span
                                            style="color: green">{{ $farmer['IDnumber'] }}</span></li>
                                    <li class="mb-0">Location: <span style="color: green">
                                            {{ $farmer['location'] }}</span> </li>
                                    <li class="mb-0">Type: <span style="color: green">{{ $farmer['type'] }}</span>
                                    <li class="mb-0">Coordinates: <span style="color: green">Not Available</span>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="card-body border-top">
                            <h3 class="font-16">Crops Grown</h3>
                            <div>
                                <p>Farmer Details haven't been captured Yet</p>
                            </div>
                        </div>

                    </div>
                    <!-- ============================================================== -->
                    <!-- end card profile -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end profile -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- campaign data -->
                <!-- ============================================================== -->
                <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- campaign tab one -->
                    <!-- ============================================================== -->
                    <div class="influence-profile-content pills-regular">
                        <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill"
                                    href="#pills-campaign" role="tab" aria-controls="pills-campaign"
                                    aria-selected="true">Farmer</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                    role="tab" aria-controls="pills-review"
                                    aria-selected="false">{{ $farmer['name'] }} Transactions</a>
                            </li>
                            @if ($farmer['type'] == 'Outgrower')
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-payments"
                                        role="tab" aria-controls="pills-review"
                                        aria-selected="false">{{ $farmer['name'] }} Payments</a>
                                </li>
                            @endif


                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel"
                                aria-labelledby="pills-campaign-tab">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="section-block">
                                            <h3 class="section-title">Manage {{ $farmer['name'] }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('updateMobileFarmer') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            placeholder="Enter Name" value="{{ $farmer['name'] }}"
                                                            name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="idnumber">ID Number</label>
                                                        <input type="text" class="form-control" id="idnumber"
                                                            placeholder="Enter ID Number" inputmode="numeric"
                                                            value="{{ $farmer['IDnumber'] }}" name="IDnumber">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phonenumber">Phone Number</label>
                                                        <input type="text" class="form-control" id="phonenumber"
                                                            placeholder="Enter Phone Number" inputmode="numeric"
                                                            value="{{ $farmer['phonenumber'] }}" name="phonenumber">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Type: </label>
                                                        <select class="form-control" id="type" name="type">
                                                            <option value="{{ $farmer['type'] }}">
                                                                {{ $farmer['type'] }}
                                                            </option>
                                                            <option value="Walk In">Walk In</option>
                                                            <option value="Walk In With Service">Walk In With Service
                                                            </option>
                                                            <option value="Outgrower">Outgrower</option>
                                                        </select>
                                                    </div>

                                                    <input type="hidden" value="{{ $farmer['$id'] }}"
                                                        name="farmerID" />
                                                    <button type="submit" class="btn btn-success">Edit
                                                        {{ $farmer['name'] }}</button>
                                                    <button class="btn btn-danger"> Delete
                                                        {{ $farmer['name'] }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                </div>


                            </div>

                            <div class="tab-pane fade" id="pills-review" role="tabpanel"
                                aria-labelledby="pills-review-tab">
                                <div class="card">
                                    <h5 class="card-header">Transactions</h5>
                                    @if (!$allFarmerTransactions)
                                        <div class="card-body">
                                            <div class="review-block">
                                                <h5 class="card-header">No transactions yet</h5>
                                                <p class="review-text font-italic m-0">No Transactions have been
                                                    Recorded
                                                </p>
                                            </div>
                                        </div>
                                    @elseif ($farmer['type'] == 'Outgrower')
                                        {{-- -------------------------------------------------------------------------------------------Outgrower Farmers------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ --}}
                                        <div class="card">
                                            <h5 class="card-header" style="font-style: italic">
                                                {{ $farmer['name'] }}'s Transactions with PEMU</h5>
                                            <div class="card-body p-0">
                                                <div class="card" style="margin: 30px;">
                                                    <form style="margin: 10px;" method="GET"
                                                        action="{{ route('farmer.details', ['id' => $farmer['$id']]) }}">
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label for="transactionCropFilter">Filter by
                                                                    Crop:</label>
                                                                <select name="transactionCrop"
                                                                    id="transactionCropFilter" class="form-control">
                                                                    <option value="">All {{ $farmer['name'] }}'s
                                                                        Crops</option>
                                                                    @foreach ($cropDetails as $crop)
                                                                        <option value="{{ $crop['$id'] }}"
                                                                            {{ request('transactionCrop') == $crop['$id'] ? 'selected' : '' }}>
                                                                            {{ $crop['crop_name'] }} (Planted on:
                                                                            {{ \Carbon\Carbon::parse($crop['planting_date'])->format('d/m/Y') }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Apply
                                                            Filters</button>
                                                        <a href="{{ route('farmer.details', ['id' => $farmer['$id']]) }}"
                                                            class="btn btn-warning">Reset Filters</a>
                                                    </form>
                                                </div>
                                                @php
                                                    $CardtotalAmount = 0;
                                                @endphp

                                                <div class="row" style="margin-left: 20px">
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="text-muted">Total Amount</h5>
                                                                <div class="metric-value d-inline-block">
                                                                    <h1 class="mb-1" style="color: green">
                                                                        KES {{ round($totalAmountTransacted, 0) }}
                                                                    </h1>
                                                                </div>

                                                            </div>
                                                            <div id="sparkline-revenue"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="text-muted">Total units</h5>
                                                                <div class="metric-value d-inline-block">
                                                                    <h1 class="mb-1 text-warning">
                                                                        {{ $totalUnits }}</h1>
                                                                </div>
                                                            </div>
                                                            <div id="sparkline-revenue"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="text-muted">Total transactions</h5>
                                                                <div class="metric-value d-inline-block">
                                                                    <h1 class="mb-1 text-danger">
                                                                        {{ $totalTransactionsCount }}
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                            <div id="sparkline-revenue"></div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="table-responsive">
                                                    <table class="table" id="dataTable">
                                                        <thead class="bg-light">
                                                            <tr class="border-0">
                                                                <th class="border-0">#</th>
                                                                <th class="border-0">Transaction Date</th>
                                                                <th class="border-0">Crop</th>
                                                                <th class="border-0">Product</th>
                                                                <th class="border-0">Quantity</th>
                                                                <th class="border-0">Amount</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $totalAmount = 0;
                                                            @endphp
                                                            @foreach ($allFarmerTransactions as $farmerTransaction)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($farmerTransaction['$createdAt'])->format('d/m/Y') }}
                                                                    </td>
                                                                    <td>{{ $farmerTransaction['CropName'] }}</td>
                                                                    <td>{{ $farmerTransaction['product_name'] }}</td>
                                                                    <td>{{ $farmerTransaction['quantity'] }}</td>
                                                                    <td style="color: green">KES
                                                                        {{ floatval($farmerTransaction['amount']) }}
                                                                    </td>
                                                                    @php
                                                                        $totalAmount += $farmerTransaction['amount'];
                                                                        $CardtotalAmount = $totalAmount;
                                                                    @endphp
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="5" class="text-right"><strong>Total
                                                                        Amount:</strong></td>
                                                                <td style="color: green"><strong>KES
                                                                        {{ $totalAmount }}</strong></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                </div>


                                            </div>


                                        </div>
                                        <a href="{{ route('transactions.downloadPDF', ['farmerId' => $farmer['$id']]) }}"
                                            class="btn btn-success"
                                            style="width: 20%; margin-left:5px; margin-bottom:5px">Download
                                            Transactions PDF</a>

                                        {{-- -------------------------------------------------------------------------------------------Walk In Farmers------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ --}}
                                    @else
                                        <div class="card">
                                            <h5 class="card-header" style="font-style: italic">
                                                {{ $farmer['name'] }}'s Transactions with PEMU</h5>
                                            <div class="card-body p-0">

                                                <div class="table-responsive">
                                                    <table class="table" id="dataTable">
                                                        <thead class="bg-light">
                                                            <tr class="border-0">
                                                                <th class="border-0">#</th>
                                                                <th class="border-0">Transaction Date</th>
                                                                <th class="border-0">Product</th>
                                                                <th class="border-0">Units</th>
                                                                <th class="border-0">Quantity</th>
                                                                <th class="border-0">Payment Method</th>
                                                                <th class="border-0">Amount</th>

                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $totalAmount = 0;
                                                            @endphp
                                                            @unless ($allFarmerTransactions->isEmpty())
                                                                @foreach ($allFarmerTransactions as $farmerTransaction)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ \Carbon\Carbon::parse($farmerTransaction['$createdAt'])->format('d/m/Y') }}
                                                                        </td>
                                                                        <td>{{ $farmerTransaction['product_name'] }}</td>
                                                                        <td>{{ $farmerTransaction['units'] }}</td>
                                                                        <td>{{ $farmerTransaction['quantity'] }}</td>
                                                                        <td>{{ $farmerTransaction['payment_method'] }}</td>
                                                                        <td style="color: green">KES
                                                                            {{ $farmerTransaction['amount'] }}</td>
                                                                        @php
                                                                            $totalAmount +=
                                                                                $farmerTransaction['amount'];
                                                                        @endphp
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td colspan="5" class="text-right"><strong>Total
                                                                            Amount:</strong></td>
                                                                    <td style="color: green"><strong>KES
                                                                            {{ $totalAmount }}</strong></td>
                                                                    <td></td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td colspan="7" class="text-center">No transactions
                                                                        found</td>
                                                                </tr>
                                                            @endunless
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>


                                        </div>
                                        <a href="{{ route('transactions.downloadPDF', ['farmerId' => $farmer['$id']]) }}"
                                            class="btn btn-success"
                                            style="width: 20%; margin-left:5px; margin-bottom:5px">Download
                                            Transactions PDF</a>
                                    @endif

                                </div>

                            </div>

                            {{-- ---------------------------------------------------------------------------------------Payments--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

                            <div class="tab-pane fade" id="pills-payments" role="tabpanel"
                                aria-labelledby="pills-review-tab">
                                <div class="card">
                                    <h5 class="card-header">Transactions</h5>
                                    @if (!$allFarmerPayments)
                                        <div class="card-body">
                                            <div class="review-block">
                                                <h5 class="card-header">No transactions yet</h5>
                                                <p class="review-text font-italic m-0">No Payment Transactions have
                                                    been
                                                    Recorded
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card">
                                            <h5 class="card-header" style="font-style: italic">
                                                {{ $farmer['name'] }}'s Payment Transactions with PEMU</h5>
                                            <div class="card-body p-0">
                                                <div class="card" style="margin: 30px;">
                                                    <form style="margin: 10px;" method="GET"
                                                        action="{{ route('farmer.details', ['id' => $farmer['$id']]) }}">
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">


                                                                <label for="paymentCropFilter">Filter by Crop:</label>
                                                                <select name="paymentCrop" id="paymentCropFilter"
                                                                    class="form-control">
                                                                    <option value="">All {{ $farmer['name'] }}'s
                                                                        Crops</option>
                                                                    @foreach ($cropDetailsPayments as $cropPayment)
                                                                        <option value="{{ $cropPayment['$id'] }}"
                                                                            {{ request('paymentCrop') == $cropPayment['$id'] ? 'selected' : '' }}>
                                                                            {{ $crop['crop_name'] }} (Planted on:
                                                                            {{ \Carbon\Carbon::parse($cropPayment['planting_date'])->format('d/m/Y') }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        {{-- <button type="submit" class="btn btn-success">Apply
                                                            Filters</button>
                                                        <a href="{{ route('farmer.details', ['id' => $farmer['$id']]) }}"
                                                            class="btn btn-warning">Reset Filters</a> --}}

                                                        <a href="#" class="btn btn-warning">Under
                                                            Construction</a>
                                                    </form>
                                                </div>
                                                <div class="row" style="margin-left: 20px; margin-right: 10px">
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="text-muted">Total Amount Payed</h5>
                                                                <div class="metric-value d-inline-block">
                                                                    <h1 class="mb-1"
                                                                        style="color: green; font-size: 1.5rem;">
                                                                        KES {{ round($totalPaymentsAmount, 0) }}
                                                                    </h1>
                                                                </div>

                                                            </div>
                                                            <div id="sparkline-revenue"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="text-muted">Total Sales</h5>
                                                                <div class="metric-value d-inline-block">
                                                                    <h1 class="mb-1 text-success"
                                                                        style=" font-size: 1.5rem;">
                                                                        @php
                                                                            $totalSales =
                                                                                $totalPaymentsAmount +
                                                                                $totalAmount_deducted;
                                                                        @endphp
                                                                        KES {{ round($totalSales, 0) }}
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                            <div id="sparkline-revenue"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="text-muted">Total Deductions</h5>
                                                                <div class="metric-value d-inline-block">
                                                                    <h1 class="mb-1 text-warning"
                                                                        style="font-size: 1.5rem;">
                                                                        KES {{ round($totalAmount_deducted, 0) }}
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                            <div id="sparkline-revenue"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="text-muted">Amount Owed to PEMU</h5>
                                                                <div class="metric-value d-inline-block">
                                                                    @php
                                                                        $amountOwed =
                                                                            $totalAmountTransacted -
                                                                            $totalAmount_deducted;
                                                                    @endphp

                                                                    <h1 class="mb-1 text-danger"
                                                                        style="font-size: 1.5rem;">
                                                                        @if ($amountOwed < 0)
                                                                            KES 0
                                                                        @else
                                                                            KES {{ round($amountOwed, 0) }}
                                                                        @endif

                                                                    </h1>
                                                                </div>
                                                            </div>
                                                            <div id="sparkline-revenue"></div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table" id="dataTable">
                                                        <thead class="bg-light">
                                                            <tr class="border-0">
                                                                <th class="border-0">#</th>
                                                                <th class="border-0">Transaction Date</th>
                                                                <th class="border-0">Crop</th>
                                                                <th class="border-0">Delivery Date</th>
                                                                <th class="border-0">Accepted Kgs</th>
                                                                <th class="border-0">Unit Price (KES)</th>
                                                                <th class="border-0">Total Value</th>
                                                                <th class="border-0">Amount Deducted</th>
                                                                <th class="border-0">Total Debt</th>
                                                                <th class="border-0">Amount Paid</th>
                                                                <th class="border-0">Debt Balance</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $totalAmount = 0;
                                                                $totalharvests = 0;
                                                            @endphp
                                                            @unless (count($allFarmerPayments) == 0)
                                                                @foreach ($allFarmerPayments as &$pemupayment)
                                                                    <tr>
                                                                        @php
                                                                            $totalValue =
                                                                                floatval(
                                                                                    $pemupayment['amount_deducted'],
                                                                                ) +
                                                                                floatval($pemupayment['amount_payed']);
                                                                            $debtBalance =
                                                                                floatval($pemupayment['debt_balance']) -
                                                                                floatval(
                                                                                    $pemupayment['amount_deducted'],
                                                                                );
                                                                        @endphp
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ \Carbon\Carbon::parse($pemupayment['$createdAt'])->format('d/m/Y') }}
                                                                        </td>
                                                                        <td>{{ $pemupayment['PaymentcropDetails'] }}</td>
                                                                        <td>{{ $pemupayment['deliveryDates'] }}</td>
                                                                        <td>{{ $pemupayment['acceptedKgs'] }}</td>
                                                                        <td>{{ $pemupayment['unitPrice'] }}</td>
                                                                        <td style="color: green">KES
                                                                            {{ round($totalValue, 2) }}</td>
                                                                        <td style="color: green">KES
                                                                            {{ round($pemupayment['amount_deducted'], 2) }}
                                                                        </td>
                                                                        <td style="color: red">KES
                                                                            {{ round($pemupayment['debt_balance'], 2) }}
                                                                        </td>
                                                                        <td style="color: green">KES
                                                                            {{ round($pemupayment['amount_payed'], 2) }}
                                                                        </td>
                                                                        <td style="color: orange">KES
                                                                            {{ round($debtBalance, 2) }}</td>
                                                                        @php
                                                                            $totalAmount +=
                                                                                $pemupayment['amount_payed'];
                                                                            $totalharvests += count(
                                                                                explode(
                                                                                    ',',
                                                                                    $pemupayment['HarvestIDs'],
                                                                                ),
                                                                            );
                                                                        @endphp
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="11" class="text-center">No transactions
                                                                        found</td>
                                                                </tr>
                                                            @endunless

                                                            <tr>

                                                                <td colspan="9" class="text-right"><strong>Total
                                                                        Amount Payed:</strong></td>
                                                                <td style="color: green"><strong>KES
                                                                        {{ $totalAmount }}</strong></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>


                                        </div>
                                        <a href="{{ route('transactions.downloadPaymentsPDF', ['farmerId' => $farmer['$id']]) }}"
                                            class="btn btn-success"
                                            style="width: 30%; margin-left:5px; margin-bottom:5px">Download
                                            Payments PDF</a>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end campaign tab one -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end campaign data -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/inputmask.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask('9999 999999').mask(document.getElementById('phonenumber'));
            Inputmask('99999999').mask(document.getElementById('idnumber'));
        });
    </script>
</x-adminlayout>
