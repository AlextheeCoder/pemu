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
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="card-body border-top">
                            <h3 class="font-16">Crops Grown</h3>
                            <div>
                                @if ($farmerDetails)
                                    @foreach (explode(',', $farmerDetails['crops']) as $crop)
                                        <p class="badge mr-1 badge-success">{{ trim($crop) }}</p>
                                    @endforeach
                                @else
                                    <p>Farmer Details haven't been captured Yet</p>
                                @endif

                            </div>
                        </div>
                        <div class="card-body border-top">
                            <h3 class="font-16">Treatments in Use</h3>
                            <div>
                                @if ($farmerDetails)
                                    @foreach (explode(',', $farmerDetails['treatments']) as $treatment)
                                        <p class="badge mr-1 badge-warning">{{ trim($treatment) }}</p>
                                    @endforeach
                                @else
                                    <p>Farmer Details haven't been captured Yet</p>
                                @endif
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
                                    @if (!$farmerTransactions)
                                        <div class="card-body">
                                            <div class="review-block">
                                                <h5 class="card-header">No transactions yet</h5>
                                                <p class="review-text font-italic m-0">No Transactions have been
                                                    Recorded
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card">
                                            <h5 class="card-header" style="font-style: italic">
                                                {{ $farmer['name'] }}'s Transactions with Pemu</h5>
                                            <div class="card-body p-0">

                                                <div class="table-responsive">
                                                    <table class="table" id="dataTable">
                                                        <thead class="bg-light">
                                                            <tr class="border-0">
                                                                <th class="border-0">#</th>
                                                                <th class="border-0">Product</th>
                                                                <th class="border-0">Units</th>
                                                                <th class="border-0">Quantity</th>
                                                                <th class="border-0">Payment Method</th>
                                                                <th class="border-0">Amount</th>
                                                                <th></th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($farmerTransactions as $farmerTransaction)
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>{{ $farmerTransaction['product_name'] }}</td>
                                                                    <td>{{ $farmerTransaction['units'] }}</td>
                                                                    <td>{{ $farmerTransaction['quantity'] }}</td>
                                                                    <td>{{ $farmerTransaction['payment_method'] }}</td>
                                                                    <td style="color: green">KES
                                                                        {{ $farmerTransaction['amount'] }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

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
