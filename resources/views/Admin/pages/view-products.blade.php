<x-adminlayout>

    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Products</h3>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/pemu-admin" class="breadcrumb-link">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Products from PEMU
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
                    <h5 class="card-header">Products</h5>
                    <div class="card-body p-0">

                        <div class="table-responsive">
                            <table class="table" id="dataTable">
                                <thead class="bg-light">
                                    <tr class="border-0">

                                        <th class="border-0">Product Name</th>
                                        <th class="border-0">Sales Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @unless (count($products) == 0)
                                        @foreach ($products as $product)
                                            <tr>

                                                <td>{{ $product['product_name'] }}</td>
                                                <td>{{ $product['sales_price'] }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No Products Have been inserted</td>
                                        </tr>
                                    @endunless
                                </tbody>
                            </table>
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-adminlayout>
