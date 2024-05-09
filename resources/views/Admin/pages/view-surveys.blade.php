<x-adminlayout>
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Survey Analytics </h3>
                    
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/pemu-admin" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Survey Analytics</li>
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
            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
            </div>
            <div class="col-md-6 mb-3">
                <select id="sortSelect" style="
                width: 200px;         /* Adjust width as needed */
                padding: 8px 12px;    /* Space within the select box */
                border: 1px solid #ccc;  /* Subtle border */
                border-radius: 4px;      /* Slightly rounded corners */
                background-color: #fff;  /* White background */
                font-size: 16px;         /* Readable text size */
                appearance: none;        /* Remove default dropdown arrow */
                -webkit-appearance: none; /* Specific for WebKit browsers */
                -moz-appearance: none;   /* Specific for Mozilla browsers */
               
                background-repeat: no-repeat;
                background-position: right 8px center; /* Position arrow to the right */
              ">
                    <option value="default">Sort by...</option>
                    <option value="user_id">UserId</option>
                    <option value="farm_type">Farm Type</option>
                    <option value="land_size">Land Size</option>
                    <!-- Add more options for other fields if needed -->
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Survey Responses</h5>
                    <div class="card-body p-0">
                        
                        <div class="table-responsive">
                            <table class="table" id="dataTable">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">UserId</th>
                                        <!--Section 1-->
                                        <th class="border-0">Farm Type</th>
                                        <th class="border-0">Land Size</th>
                                        <!--Section 2-->
                                        <th class="border-0">Regenerative Practice</th>
                                        <th class="border-0">Farming Challenges</th>
                                        <th class="border-0">Soil Quality</th>
                                        <th class="border-0">Irrigation Access</th>
                                        <th class="border-0">Water Source</th>
                                        <th class="border-0">Soil Improvement Techniques</th>
                                        <!--Section 3-->
                                        <th class="border-0">Interest Training</th>
                                        <th class="border-0">Training Areas</th>
                                        <th class="border-0">Pay For Training</th>
                                        <th class="border-0">Join Digital Platform</th>
                                        <th class="border-0">Find Operators</th>
                                        <th class="border-0">Upskill Operators</th>
                                        <!--Section 4-->
                                        <th class="border-0">Farm Operation</th>
                                        <th class="border-0">Record Keeping</th>
                                        <th class="border-0">Profitability Analysis</th>
                                        <th class="border-0">Long Term Strategy</th>
                                        <th class="border-0">Borrowing Habits</th>
                                        <th class="border-0">Sources Of Finance</th>
                                        <th class="border-0">Finance Access Challenges</th>
                                        <!--Section 5-->
                                        <th class="border-0">Market Reliability</th>
                                        <th class="border-0">Sales Channels</th>
                                        <th class="border-0">Selling Challenges</th>
                                        <!--Section 6-->
                                        <th class="border-0">Interest New Crops</th>
                                        <th class="border-0">Interest Livestock Farming</th>
                                        <th class="border-0">Current Crops</th>
                                        <th class="border-0">Crop Choice Constraints</th>
                                        <th class="border-0">Current Livestock</th>
                                        <th class="border-0">Livestock Farming Challenges</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @unless(count($surveys) == 0)
                                        @foreach($surveys as $survey)
                                            <tr>
                                                <td>#</td>
                                                <td>{{$survey->user_id}}</td>

                                                <!--Section 1-->
                                                <td>{{$survey->farm_type}}</td>
                                                <td>{{$survey->land_size}}</td>
                                                
                                                <!--Section 2-->
                                                <td>{{$survey->regenerative_practice}}</td>
                                                <td>{{ implode(', ', $survey->farming_challenges) }}</td>
                                                <td>{{$survey->soil_quality}}</td>
                                                <td>{{$survey->irrigation_access}}</td>
                                                <td>{{$survey->water_source}}</td>
                                                <td>{{ implode(', ', $survey->soil_improvement_techniques) }}</td>
                                                
                                                <!--Section 3-->
                                                <td>{{$survey->interest_training}}</td>
                                                <td>{{ implode(', ', $survey->training_areas) }}</td>
                                                <td>{{$survey->pay_for_training}}</td>
                                                <td>{{$survey->join_digital_platform}}</td>
                                                <td>{{$survey->find_operators}}</td>
                                                <td>{{$survey->upskill_operators}}</td>
                                                
                                                <!--Section 4-->
                                                <td>{{$survey->farm_operation}}</td>
                                                <td>{{$survey->record_keeping}}</td>
                                                <td>{{$survey->profitability_analysis}}</td>
                                                <td>{{$survey->long_term_strategy}}</td>
                                                <td>{{$survey->borrowing_habits}}</td>
                                                <td>{{ implode(', ', $survey->sources_of_finance) }}</td>
                                                <td>{{ implode(', ', $survey->finance_access_challenges) }}</td>
                                                
                                                <!--Section 5-->
                                                <td>{{$survey->market_reliability}}</td>
                                                <td>{{ implode(', ', $survey->sales_channels) }}</td>
                                                <td>{{ implode(', ', $survey->selling_challenges) }}</td>
                                                
                                                <!--Section 6-->
                                                <td>{{$survey->interest_new_crops}}</td>
                                                <td>{{$survey->interest_livestock_farming}}</td>
                                                <td>{{ implode(', ', $survey->current_crops) }}</td>
                                                <td>{{ implode(', ', $survey->crop_choice_constraints) }}</td>
                                                <td>{{ implode(', ', $survey->current_livestock) }}</td>
                                                <td>{{ implode(', ', $survey->livestock_farming_challenges) }}</td>
                                                
                                                

                                                
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No Users Have joined</td>
                                        </tr>
                                    @endunless
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- end revenue year  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- ap and ar balance  -->
            <!-- ============================================================== -->
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"> Distribution of farm types 
                    </h5>
                    <div class="card-body">
                        <canvas id="chartjs_balance_bar"></canvas>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end ap and ar balance  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- gross profit  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Top 4 training areas of interest</h5>
                    <div class="card-body">
                        <div id="morris_gross" style="height: 272px;"></div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end gross profit  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- profit margin  -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Top 4 sales channels</h5>
                    <div class="card-body">
                        <div id="morris_profit" style="height: 272px;"></div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end profit margin -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- earnings before interest tax  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Level of interest in training
                    </h5>
                    <div class="card-body">
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end earnings before interest tax  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- cost of goods  -->
            <!-- ============================================================== -->
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Top 5 farming challenges
                    </h5>
                    <div class="card-body">
                        <canvas id="chart3"></canvas>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end cost of goods  -->
            <!-- ============================================================== -->
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Top 5 soil improvement techniques used
                    </h5>
                    <div class="card-body">
                        <canvas id="chart4"></canvas>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end earnings before interest tax  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- cost of goods  -->
            <!-- ============================================================== -->
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Interest in joining digital platforms
                    </h5>
                    <div class="card-body">
                        <canvas id="joinDigitalPlatformChart"></canvas>
                    </div>
                </div>
            </div>
          
        </div>
<!-- ===========================Last Row=================================== -->
        <div class="row">
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"> Level of reliance on borrowing for farm operations
                    </h5>
                    <div class="card-body">
                        <canvas id="relianceOnBorrowingChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end earnings before interest tax  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- cost of goods  -->
            <!-- ============================================================== -->
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Top 3 challenges in accessing reliable markets
                    </h5>
                    <div class="card-body">
                        <div id="morris_challenges" style="height: 272px;"></div>
                    </div>
                </div>
            </div>
          
        </div>
        <!-- ============================================================== -->
        <!-- end inventory turnover -->
        <!-- ============================================================== -->
    </div>

    
    <!-- jQuery -->
<script src="{{ asset('Admin/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<!-- Bootstrap bundle js -->
<script src="{{ asset('Admin/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<!-- Slimscroll js -->
<script src="{{ asset('Admin/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<!-- Chartist js -->
<script src="{{ asset('Admin/assets/vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
<script src="{{ asset('Admin/assets/vendor/charts/chartist-bundle/Chartistjs.js') }}"></script>
<script src="{{ asset('Admin/assets/vendor/charts/chartist-bundle/chartist-plugin-threshold.js') }}"></script>
<!-- C3 js -->
<script src="{{ asset('Admin/assets/vendor/charts/c3charts/c3.min.js') }}"></script>
<script src="{{ asset('Admin/assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('Admin/assets/vendor/charts/charts-bundle/Chart.bundle.js') }}"></script>
<script src="{{ asset('Admin/assets/vendor/charts/charts-bundle/chartjs.js') }}"></script>
<!-- Sparkline js -->
<script src="{{ asset('Admin/assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
<!-- Dashboard finance js -->
<script src="{{ asset('Admin/assets/libs/js/dashboard-finance.js') }}"></script>
<!-- Main js -->
<script src="{{ asset('Admin/assets/libs/js/main-js.js') }}"></script>
<!-- Gauge js -->
<script src="{{ asset('Admin/assets/vendor/gauge/gauge.min.js') }}"></script>
<!-- Morris js -->
<script src="{{ asset('Admin/assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
<script src="{{ asset('Admin/assets/vendor/charts/morris-bundle/morris.js') }}"></script>
<script src="{{ asset('Admin/assets/vendor/charts/morris-bundle/morrisjs.html') }}"></script>

<script>
Morris.Donut({
    
    element: 'morris_profit',
    data: [
        @foreach($chartsData['primarySalesChannelsCounts'] as $channel => $count)
            { value: {{ $count }}, label: '{{ $channel }}' },
        @endforeach
    ],
    labelColor: '#ff407b',
    colors: [
        '#ff407b',
        '#ffd5e1'
    ],
    formatter: function(x) { return x + "%" },
    resize: true
});


    </script>
<script>
       // ============================================================== 
       var ctx = document.getElementById("chartjs_balance_bar").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',

        
        data: {
        labels: <?php echo json_encode(array_column($chartsData['farmTypeCounts']->toArray(), 'farm_type')); ?>, 
        datasets: [{
            label: 'Farm Type Distribution', // Descriptive label
            data: <?php echo json_encode(array_column($chartsData['farmTypeCounts']->toArray(), 'total')); ?>, 
            backgroundColor: "rgba(89, 105, 255,.8)", 
            borderColor: "rgba(89, 105, 255,1)",
            borderWidth: 2 
        }]
    },
        options: {
            legend: {
                    display: true,

                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontFamily:'Circular Std Book',
                        fontSize: 14,
                    }
            },

                scales: {
                    xAxes: [{
                ticks: {
                    fontSize: 14,
                     fontFamily:'Circular Std Book',
                     fontColor: '#71748d',
                }
            }],
            yAxes: [{
                ticks: {
                    fontSize: 14,
                     fontFamily:'Circular Std Book',
                     fontColor: '#71748d',
                }
            }]
                }
    }



});

</script>

<script>
    // ===============================interestTrainingCounts=============================== 
var ctx2 = document.getElementById("chart2").getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'bar',

        
        data: {
        labels: <?php echo json_encode(array_column($chartsData['interestTrainingCounts']->toArray(), 'interest_training')); ?>,
        datasets: [{
            label: 'Interest in Training', 
            data: <?php echo json_encode(array_column($chartsData['interestTrainingCounts']->toArray(), 'total')); ?>, 
            backgroundColor: "rgba(159, 15, 25,.8)", 
            borderColor: "rgba(159, 15, 25,1)",
            borderWidth: 2 
        }]
    },
        options: {
            legend: {
                    display: true,

                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontFamily:'Circular Std Book',
                        fontSize: 14,
                    }
            },

                scales: {
                    xAxes: [{
                ticks: {
                    fontSize: 14,
                     fontFamily:'Circular Std Book',
                     fontColor: '#71748d',
                }
            }],
            yAxes: [{
                ticks: {
                    fontSize: 14,
                     fontFamily:'Circular Std Book',
                     fontColor: '#71748d',
                }
            }]
                }
    }



});

    </script>


 <script>
    Morris.Donut({
    element: 'morris_gross',
    data: [
        @foreach($chartsData['trainingAreasCounts'] as $area => $count)
            { value: {{ $count }}, label: '{{ $area }}' },
        @endforeach
    ],
    labelColor: '#5969ff',
    colors: [
        '#5969ff',
        '#a8b0ff'
    ],
    formatter: function(x) { return x + "%" },
    resize: true
});

       
 </script>




<script>
    var ctx3 = document.getElementById("chart3").getContext('2d');

// Fetch data from the controller
var farmingChallengesCounts = @json($chartsData['farmingChallengesCounts']);

var myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: Object.keys(farmingChallengesCounts),
        datasets: [{
            label: 'Farming Challenges Counts',
            data: Object.values(farmingChallengesCounts),
            backgroundColor: "rgba(89, 105, 255,.8)",
            borderColor: "rgba(89, 105, 255,1)",
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: true,
            position: 'bottom',
            labels: {
                fontColor: '#71748d',
                fontFamily: 'Circular Std Book',
                fontSize: 14,
            }
        },
        scales: {
            xAxes: [{
                ticks: {
                    fontSize: 14,
                    fontFamily: 'Circular Std Book',
                    fontColor: '#71748d',
                }
            }],
            yAxes: [{
                ticks: {
                    fontSize: 14,
                    fontFamily: 'Circular Std Book',
                    fontColor: '#71748d',
                }
            }]
        }
    }
});
    </script>


    <script>
        var ctx4 = document.getElementById("chart4").getContext('2d');

var soilImprovementTechniquesCounts = @json($chartsData['soilImprovementTechniquesCounts']);

var myChart4 = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: Object.keys(soilImprovementTechniquesCounts),
        datasets: [{
            label: 'Soil Improvement Techniques Counts',
            data: Object.values(soilImprovementTechniquesCounts),
            backgroundColor: "rgba(89, 105, 255,.8)",
            borderColor: "rgba(89, 105, 255,1)",
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: true,
            position: 'bottom',
            labels: {
                fontColor: '#71748d',
                fontFamily: 'Circular Std Book',
                fontSize: 14,
            }
        },
        scales: {
            xAxes: [{
                ticks: {
                    fontSize: 14,
                    fontFamily: 'Circular Std Book',
                    fontColor: '#71748d',
                }
            }],
            yAxes: [{
                ticks: {
                    fontSize: 14,
                    fontFamily: 'Circular Std Book',
                    fontColor: '#71748d',
                }
            }]
        }
    }
});

        </script>

        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var joinDigitalPlatformData = @json($chartsData['joinDigitalPlatformCounts']);
var labels = joinDigitalPlatformData.map(item => item.join_digital_platform);
var values = joinDigitalPlatformData.map(item => item.total);

var ctx5 = document.getElementById('joinDigitalPlatformChart').getContext('2d');
var myChart5 = new Chart(ctx5, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            label: 'Join Digital Platform Counts',
            data: values,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var relianceOnBorrowingData = @json($chartsData['relianceOnBorrowingCounts']);
            var labels = relianceOnBorrowingData.map(item => item.borrowing_habits);
            var values = relianceOnBorrowingData.map(item => item.total);

            var ctx6 = document.getElementById('relianceOnBorrowingChart').getContext('2d');
            var myChart6 = new Chart(ctx6, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Reliance on Borrowing Counts',
                        data: values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            // Add more colors if needed
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            // Add more colors if needed
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });

    </script>

    <script>
    Morris.Donut({
    element: 'morris_challenges',
    data: [
        @foreach($chartsData['sellingChallengesCounts'] as $challenges => $count)
            { value: {{ $count }}, label: '{{ $challenges }}' },
        @endforeach
    ],
    labelColor: '#5969ff',
    colors: [
        '#5969ff',
        '#a8b0ff'
    ],
    formatter: function(x) { return x + "%" },
    resize: true
});

       
 </script>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Search filter
    $('#searchInput').on('keyup', function() {
      var value = $(this).val().toLowerCase();
      $('#dataTable tbody tr').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });

    // Sorting
    $('#sortSelect').on('change', function() {
      var value = $(this).val();
      var rows = $('#dataTable tbody tr').get();

      rows.sort(function(a, b) {
        var A = $(a).children('td').eq(value === 'default' ? 0 : $('th').index($('#' + value)));
        var B = $(b).children('td').eq(value === 'default' ? 0 : $('th').index($('#' + value)));
        
        if (A.text() < B.text()) return -1;
        if (A.text() > B.text()) return 1;
        return 0;
      });

      $.each(rows, function(index, row) {
        $('#dataTable tbody').append(row);
      });
    });
  });
</script>

</x-adminlayout>