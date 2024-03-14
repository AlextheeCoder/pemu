<x-adminlayout>
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">View PEMU  Users </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">View</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Users</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">All Users</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">First Name</th>
                                        <th class="border-0">Last Name</th>
                                        <th class="border-0">Age</th>
                                        <th class="border-0">Date Joined</th>
                                        <th class="border-0">Email</th>
                                        <th class="border-0">Phone Number</th>
                                        <th class="border-0">County</th>
                                        <th class="border-0">Sub County</th>
                                        <th class="border-0">Ward</th>
                                        <th class="border-0">Type of User</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @unless(count($allusers) == 0)
                                        @foreach($allusers as $alluser)
                                            <tr>
                                                <td>{{$alluser->id}}</td>
                                                <td>{{$alluser->firstname}} </td>
                                                <td>{{$alluser->lastname}}</td>
                                                <td>{{$alluser->age}}</td>
                                                <td>{{$alluser->created_at}}</td>
                                                <td>{{$alluser->email}}</td>
                                                <td>{{$alluser->phone}}</td>
                                                <td>{{$alluser->county}}</td>
                                                <td>{{$alluser->subcounty}}</td>
                                                <td>{{$alluser->ward}}</td>
                                                <td>{{ ucfirst($alluser->role)}}</td>
                                                <td><a href="{{ route('user.detail', ['id' => $alluser->id]) }}" class="btn btn-success">Manage</a></td>
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
    </div>
</x-adminlayout>