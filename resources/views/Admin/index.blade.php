<x-adminlayout>


            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">PEMU Dashboard</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">PEMU</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Visitors This Month</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{$numberOfVisitors}}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            @if ($percentageChange > 0)
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>{{$percentageChange}}%</span>
                                                @elseif ($percentageChange == 0)
                                                <span>N/A</span>
                                                @else
                                                <span><i style="color: red" class="fa fa-fw fa-arrow-down"></i></span><span style="color: red;">{{$percentageChange}}%</span>

                                            @endif
                                           
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">All Farmers</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{$farmersCount}}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">

                                            @if ( $farmersIncrease > 0)
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>{{$farmersIncrease}}%</span>
                                            @elseif ($farmersIncrease == 0)
                                            <span>N/A</span>
                                            @else
                                            <span><i style="color: red" class="fa fa-fw fa-arrow-down"></i></span><span style="color: red;">{{$farmersIncrease}}%</span>
                                            @endif

                                            
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">All Providers</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{$providersCount}}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            @if ( $providersIncrease > 0)
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>{{$providersIncrease}}%</span>
                                            @elseif ($providersIncrease == 0)
                                            <span>N/A</span>
                                            @else
                                            <span><i style="color: red" class="fa fa-fw fa-arrow-down"></i></span><span style="color: red;">{{$providersIncrease}}%</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Blog Views</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{ $totalViewsLastSixMonths }}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                            @if ( $BlogpercentageChange > 0)
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>{{$BlogpercentageChange}}%</span>
                                            @elseif ($BlogpercentageChange == 0)
                                            <span>N/A</span>
                                            @else
                                            <span><i style="color: red" class="fa fa-fw fa-arrow-down"></i></span><span style="color: red;">{{$BlogpercentageChange}}%</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Recent Blogs</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Image</th>
                                                        <th class="border-0">Blog Title</th>
                                                        <th class="border-0">Views</th>
                                                        <th class="border-0">Date Created</th>
                                                        <th class="border-0">Author</th>
                                                        <th class="border-0">Status</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @unless(count($blogs) == 0)
                                                    @foreach($blogs as $blog)
                                                    <tr>
                                                        <td>{{$blog->id}}</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="{{$blog->image ? asset('storage/' . $blog->image) : asset('Admin/assets/images/product-pic.jpg')}}" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>{{ strtok($blog->title, ' ') }} {{ strtok(' ') }} ...</td>
                                                        <td>{{$blog->views}}</td>
                                                        <td>{{$blog->created_at}}</td>
                                                        <td>{{$blog->user->firstname}}</td>
                                                        @if ($blog->status == "published")
                                                        <td><span class="badge-dot badge-success mr-1"></span>{{$blog->status}} </td>
                                                        @else
                                                        <td><span class="badge-dot badge-brand mr-1"></span>{{$blog->status}} </td>
                                                        @endif
                                                        
                                                        <td>

                                                            <form method="POST" action="{{ route('blog.delete', ['blog' => $blog->id]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger"> Delete</button>
                                                              </form>   
                                                        </td>
                                                        <td><a href="{{ route('blog.edit', ['id' => $blog->id]) }}" class="btn btn-success">Edit</a></td>
                                                    </tr>
                                                    
                                                    @endforeach
                                                    @else
                                                    <td >No Blogs posted</td>
                                                    @endunless
                                                    <tr>
                                                        <td colspan="9"><a href="/pemu/admin/view/blogs" class="btn btn-outline-light float-right">View All</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

    
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <!-- ============================================================== -->
                                <!-- top perfomimg  -->
                                <!-- ============================================================== -->
                                <div class="card">
                                    <h5 class="card-header">Top Performing Blogs</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table no-wrap p-table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Title</th>
                                                        <th class="border-0">Views</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @unless(count($mostviewdblogs) == 0)
                                                    @foreach ($mostviewdblogs as $mostviewdblog)
                                                        <tr>
                                                            <td class="truncate-title"><a href="{{ route('blog.detail', ['id' => $mostviewdblog->id]) }}">{{ $mostviewdblog->title }}</a></td>
                                                            <td>{{ $mostviewdblog->views }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @else
                                                    <td >No Blogs posted</td>
                                                    @endunless
                                                    <tr>
                                                        <td colspan="2">
                                                            <a href="/pemu/admin/view/blogs" class="btn btn-outline-light float-right">View All Blogs</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end top perfomimg  -->
                                <!-- ============================================================== -->
                            </div>
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->
                        </div>
                   

                    
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
                                <!-- ============================================================== -->
                                <!-- social source  -->
                                <!-- ============================================================== -->
                                <div class="card">
                                    <h5 class="card-header"> Views By Social Source</h5>
                                    <div class="card-body p-0">
                                        <ul class="social-sales list-group list-group-flush">
                                            <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle facebook-bgcolor mr-2"><i class="fab fa-facebook-f"></i></span><span class="social-sales-name">Facebook</span><span class="social-sales-count text-dark">..</span>
                                            </li>
                                            <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle twitter-bgcolor mr-2"><i class="fab fa-twitter"></i></span><span class="social-sales-name">Twitter</span><span class="social-sales-count text-dark">..</span>
                                            </li>
                                            <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle instagram-bgcolor mr-2"><i class="fab fa-instagram"></i></span><span class="social-sales-name">Instagram</span><span class="social-sales-count text-dark">..</span>
                                            </li>
                                            <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle linkedin-bgcolor mr-2"><i class="fab fa-linkedin-in"></i></span><span class="social-sales-name">LinkedIn</span><span class="social-sales-count text-dark">..</span>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="card-footer text-center">
                                       <p>Feature Coming soon ...</p>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end social source  -->
                                <!-- ============================================================== -->
                            </div>
                         
                            <!-- ============================================================== -->
                            <!-- end sales traffice source  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- sales traffic country source  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Visits By Location Traffic Source</h5>
                                    <div class="card-body p-0">
                                        <ul class="country-sales list-group list-group-flush">
                                            @foreach($topLocationsWithPercentage as $location)
                                                <li class="country-sales-content list-group-item">
                                                    <span class="mr-2"><i class="flag-icon flag-icon-{{ strtolower($location->country_code) }}" title="{{ strtolower($location->country_code) }}"></i> </span>
                                                    <span class="">{{ $location->city }}</span>
                                                    <span class="float-right text-dark">{{ $location->percentage }}%</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <!-- ============================================================== -->
                            <!-- end sales traffice country source  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const titleElements = document.querySelectorAll('.truncate-title a');

titleElements.forEach(element => {
  const title = element.textContent;
  const words = title.split(' ').slice(0, 2);  
  element.textContent = words.join(' ') + '...'; 
});

            </script>


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    var viewsTrendData = @json($viewsTrendData);
    var farmersTrendData = @json($farmersTrendData);
    console.log(viewsTrendData);
    console.log(farmersTrendData);

    $("#sparkline-revenue4").sparkline(viewsTrendData, {
            type: 'line',
            width: '99.5%',
            height: '100',
            lineColor: '#fec957',
            fillColor: '#fff2d5',
            lineWidth: 2,
            spotColor: undefined,
            minSpotColor: undefined,
            maxSpotColor: undefined,
            highlightSpotColor: undefined,
            highlightLineColor: undefined,
            resize: true,
        });

     

});
</script>

<script>
     $(document).ready(function() {
    var farmersTrendData = @json($farmersTrendData);
    console.log(farmersTrendData);
    $("#sparkline-revenue2").sparkline(farmersTrendData, {
    type: 'line',
    width: '99.5%',
    height: '100',
    lineColor: '#ff407b',
    fillColor: '#ffdbe6',
    lineWidth: 2,
    spotColor: undefined,
    minSpotColor: undefined,
    maxSpotColor: undefined,
    highlightSpotColor: undefined,
    highlightLineColor: undefined,
    resize: true
});

     

});

</script>

<script>
    $(document).ready(function() {
   var ProvidersTrendData = @json($ProvidersTrendData);
   console.log(ProvidersTrendData);
   $("#sparkline-revenue3").sparkline(ProvidersTrendData, {
        type: 'line',
        width: '99.5%',
        height: '100',
        lineColor: '#25d5f2',
        fillColor: '#dffaff',
        lineWidth: 2,
        spotColor: undefined,
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined,
        resize: true
    });

});

</script>

<script>
    $(document).ready(function() {
   var visitsTrendData = @json($visitsTrendData);
   console.log(visitsTrendData);
   $("#sparkline-revenue").sparkline(visitsTrendData, {
        type: 'line',
        width: '99.5%',
        height: '100',
        lineColor: '#5969ff',
        fillColor: '#dbdeff',
        lineWidth: 2,
        spotColor: undefined,
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined,
        resize: true
    });

});

</script>



</x-adminlayout>