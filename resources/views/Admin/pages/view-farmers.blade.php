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
            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
            </div>
            <div class="col-md-6 mb-3">
                <select id="sortSelect"
                    style="
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
                    <option value="gender">Gender</option>
                    <option value="area">Area</option>
                    <option value="operator">Land Size</option>
                    <!-- Add more options for other fields if needed -->
                </select>
                <a href="{{ route('export-csv') }}" class="btn btn-success" style="margin-left: 30px">Download CSV</a>
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
                                        <th class="border-0">FullName</th>
                                        <th class="border-0">ID Number</th>
                                        <th class="border-0">Phone Number</th>
                                        <th class="border-0">Gender</th>
                                        <th class="border-0">Date of Birth</th>
                                        <th class="border-0">Crops</th>
                                        <th class="border-0">Area</th>
                                        <th class="border-0">Farm Operator</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @unless (count($tableData) == 0)
                                        @foreach ($tableData as $farmer)
                                            <tr>
                                                <td>{{ $farmer->id }}</td>
                                                <td>{{ $farmer->fullname }}</td>
                                                <td>{{ $farmer->idnumber }}</td>
                                                <td>{{ $farmer->phonenumber }}</td>
                                                <td>{{ $farmer->gender }}</td>
                                                <td>{{ $farmer->dob }}</td>
                                                <td>{{ $farmer->crops }}</td>
                                                <td>{{ $farmer->area }}</td>
                                                <td>{{ $farmer->operator }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No Farmers Have been registerd</td>
                                        </tr>
                                    @endunless
                                </tbody>
                            </table>
                            {{ $tableData->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="histogram"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="scatterPlot"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="stackedBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Get data from Laravel (assuming passed as JSON)
        const genderDistribution = JSON.parse('<?php echo json_encode($genderDistribution); ?>');
        const cropCounts = JSON.parse('<?php echo json_encode($cropCounts); ?>');
        const registrationTimeline = JSON.parse('<?php echo json_encode($registrationTimeline); ?>');
        const ageDistribution = JSON.parse('<?php echo json_encode($ageDistribution); ?>');
        const areaVsCrops = JSON.parse('<?php echo json_encode($areaVsCrops); ?>');
        const farmOperatorByCrop = JSON.parse('<?php echo json_encode($farmOperatorByCrop); ?>');
        // ... (similarly for other chart data)

        // Pie Chart
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: Object.keys(genderDistribution),
                datasets: [{
                    data: Object.values(genderDistribution)
                }]
            }
        });

        // ... Implement other charts similarly using your chosen library
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: Object.keys(cropCounts),
                datasets: [{
                    label: 'Number of Farmers',
                    data: Object.values(cropCounts),
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)', // red
                        'rgba(54, 162, 235, 1)', // blue
                        'rgba(255, 206, 86, 1)', // yellow
                        'rgba(75, 192, 192, 1)', // green
                        'rgba(153, 102, 255, 1)', // purple
                        'rgba(255, 159, 64, 1)' // orange
                        // add more colors if needed
                    ]
                }]
            }
        });

        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: Object.keys(registrationTimeline),
                datasets: [{
                    label: 'Farmers Registered',
                    data: Object.values(registrationTimeline),
                }]
            }
        });

        new Chart(document.getElementById('histogram'), {
            type: 'bar', // Chart.js treats bars horizontally as a histogram
            data: {
                labels: Object.keys(ageDistribution),
                datasets: [{
                    label: 'Number of Farmers',
                    data: Object.values(ageDistribution),
                }]
            }
        });

        new Chart(document.getElementById('scatterPlot'), {
            type: 'scatter',
            data: {
                datasets: [{
                    data: areaVsCrops,
                    pointBackgroundColor: 'blue',
                    pointRadius: 4 // Adjust point size as needed
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Area (acres)' // Label the axis 
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Crop Type'
                        }
                    }
                },
                plugins: { // Optional: For better readability
                    tooltip: {
                        callbacks: {
                            label: (context) => `Crop: ${context.parsed.y}, Area: ${context.parsed.x} acres`
                        }
                    }
                }
            }
        });

        const colors = ['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'pink', 'cyan', 'magenta',
            'lime'
        ]; // Add more colors if needed
        const operators = Object.keys(farmOperatorByCrop[0]).filter(key => key !== 'crop');
        new Chart(document.getElementById('stackedBarChart'), {
            type: 'bar',
            data: {
                labels: farmOperatorByCrop.map(data => data.crop),
                datasets: operators.map((operator, index) => ({
                    label: operator,
                    data: farmOperatorByCrop.map(data => data[operator] || 0),
                    backgroundColor: colors[index % colors
                        .length] // Use modulo operator to cycle through colors array
                }))
            },
            options: {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true
                    }
                }
            }
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
                    var A = $(a).children('td').eq(value === 'default' ? 0 : $('th').index($('#' +
                        value)));
                    var B = $(b).children('td').eq(value === 'default' ? 0 : $('th').index($('#' +
                        value)));

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
