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
                                    @unless (count($farmers) == 0)
                                        @foreach ($farmers as $farmer)
                                            <tr>
                                                <td>{{ $farmer['$id'] }}</td>
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
                                            <td colspan="8">No Farmers Have been registerd</td>
                                        </tr>
                                    @endunless
                                </tbody>
                            </table>
                            {{ $farmers->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-adminlayout>
