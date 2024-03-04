<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PEMU Admin</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/plogo.png')}}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Admin/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    
    
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/pemu-admin" style="color: #056a3b">PEMU</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                     
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            @php
                                                use App\Models\Contact; // Adjust the namespace and model name accordingly

                                            // Fetch the 4 most recent notifications from the contacts table
                                            $notifications = Contact::orderBy('created_at', 'DESC')->limit(4)->get();
                                            @endphp
                                            @unless(count($notifications) == 0)
                                            @foreach($notifications as $notification)
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="{{asset ('Admin/assets/images/avatar-2.jpg')}}" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">{{$notification->name}}</span>a{{$notification->subject}}
                                                        <div class="notification-date">{{$notification->created_at->diffForHumans()}}</div>
                                                    </div>
                                                </div>
                                            </a>
                                            @endforeach
                                            @else
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <p>No Notfications</p>
                                                </div>
                                            </a>
                                            @endunless
                                            
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="/pemu/contacts/view">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                       
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset ('Admin/assets/images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{auth()->user()->firstname}} </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                               
                                <a class="dropdown-item" href="/logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
      <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                         
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Users</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/pemu/farmers/view">Farmers <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/pemu/providers/view">Providers</a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Blogs</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/pemu/admin/view/blogs">View</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/pemu/create/blog">Create Blog</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="/pemu/category/create">Create Category</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Notifications</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/pemu/contacts/view">Contacts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/pemu/newsletters/view">Newsletters</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
  
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                
                
                
                    {{$slot}}
                 

            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2024 PEMU. All rights reserved. Dashboard by PEMU</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <x-flash-message />
        <x-flash-error />
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
     <!-- jquery 3.3.1 -->
     <script src="{{ asset('Admin/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
     <!-- bootstap bundle js -->
   <script src="{{ asset('Admin/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
   <!-- slimscroll js -->
   <script src="{{ asset('Admin/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
   <!-- main js -->
   <script src="{{ asset('Admin/assets/libs/js/main-js.js') }}"></script>
   <!-- chart chartist js -->
   <script src="{{ asset('Admin/assets/vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
   <!-- sparkline js -->
   <script src="{{ asset('Admin/assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
   <!-- morris js -->
   <script src="{{ asset('Admin/assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
   <script src="{{ asset('Admin/assets/vendor/charts/morris-bundle/morris.js') }}"></script>
   <!-- chart c3 js -->
   <script src="{{ asset('Admin/assets/vendor/charts/c3charts/c3.min.js') }}"></script>
   <script src="{{ asset('Admin/assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
   <script src="{{ asset('Admin/assets/vendor/charts/c3charts/C3chartjs.js') }}"></script>
   <script src="{{ asset('Admin/assets/libs/js/dashboard-ecommerce.js') }}"></script>

   <x-flash-message />
    <x-flash-error />
</body>
 
</html>