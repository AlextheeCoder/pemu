<x-adminlayout>
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Farmer Analytics </h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/pemu-admin" class="breadcrumb-link">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Farmer Analytics from PEMU
                                    Database</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Farmers Registerd</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $totalFarmers }}</h1>
                        </div>

                    </div>
                    <div id="sparkline-revenue"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Top Farmer Type</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $topFarmerType }}</h1>
                        </div>
                    </div>
                    <div id="sparkline-revenue"></div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Top Product</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $topProduct }}</h1>
                        </div>
                    </div>
                    <div id="sparkline-revenue"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Total Farmer Transactions</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1" style="color: green">{{ $totalTransactions }}</h1>
                        </div>
                    </div>
                    <div id="sparkline-revenue"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <form method="GET" action="{{ url()->current() }}">
                    <input type="text" class="form-control" name="search" id="searchInput" placeholder="Search..."
                        value="{{ request()->get('search') }}">
                </form>
            </div>
            <div class="col-md-6 mb-3">
                <a href="#" class="btn btn-success" style="margin-left: 30px">Download CSV</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Farmers</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table" id="dataTable">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">FullName</th>
                                        <th class="border-0">Phone Number</th>
                                        <th class="border-0">ID Number</th>
                                        <th class="border-0">Location</th>
                                        <th class="border-0">Type</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($farmers->count())
                                        @foreach ($farmers as $farmer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $farmer['name'] }}</td>
                                                <td>{{ $farmer['phonenumber'] }}</td>
                                                <td>{{ $farmer['IDnumber'] }}</td>
                                                <td>{{ $farmer['location'] }}</td>
                                                <td>{{ $farmer['type'] }}</td>
                                                <td><a href="{{ route('farmer.details', $farmer['$id']) }}"
                                                        class="btn btn-success">View Farmer</a></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">No Farmers found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $farmers->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="display: flex; justify-content: space-between;">
            <div class="card" style="width: 45%">
                <div class="card-body">
                    <canvas id="farmerTypeChart" style="height: 400px; width: 100%"></canvas>
                </div>
            </div>
            <div class="card" style="width: 45%">
                <div>
                    <canvas id="paymentTypeChart" style="height: 400px; width: 100%"></canvas>
                </div>
            </div>
        </div>


    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
        $(document).ready(function() {
            // Submit the form on search input change
            $('#searchInput').on('input', function() {
                $(this).closest('form').submit();
            });
        });
    </script>

    <script>
        var xValues = @json($xValues);
        var yValues = @json($yValues);
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("farmerTypeChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Farmers by Type"
                }
            }
        });
    </script>

    <script>
        var xValues = @json($paymentMethodXValues);
        var yValues = @json($paymentMethodYValues);
        var barColors = [
            "#ff6347", // Tomato
            "#1e90ff", // Dodger Blue
            "#ff69b4", // Hot Pink
            "#32cd32", // Lime Green
            "#9932cc" // Dark Orchid
        ];



        new Chart("paymentTypeChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Transactions by Type"
                }
            }
        });
    </script>


</x-adminlayout>
