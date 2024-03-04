<x-adminlayout>

    <div class="container-fluid dashboard-content">
               <!-- ============================================================== -->
               <!-- pageheader -->
               <!-- ============================================================== -->
               <div class="row">
                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                       <div class="page-header">
                           <h2 class="pageheader-title">Create Category </h2>
                           <div class="page-breadcrumb">
                               <nav aria-label="breadcrumb">
                                   <ol class="breadcrumb">
                                       <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                       <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Create</a></li>
                                       <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                       <h3 class="text-center">Create Your Category</h3>
                   </div>
               </div>
           </div>

<!-- basic form  -->
                       <!-- ============================================================== -->
                       <div class="row">
                           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                               <div class="section-block" id="basicform">
                                   <h3 class="section-title">Create Your Category</h3>
                                   
                               </div>
                               <div class="card">
                                   <h5 class="card-header">Create</h5>
                                   <div class="card-body">
                                       <form class="blog-form" method="POST" action="/pemu/category/store" enctype="multipart/form-data" onsubmit="return validateForm()">
                                           @csrf

                                           <div class="form-group">
                                               <label for="inputText3" class="col-form-label">Category Name</label>
                                               <input id="inputText3" type="text" class="form-control" name="name" required>
                                               @error('name')
                                                   <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                               @enderror
                                           </div>
                                                                      
                                           <div class="form-group">
                                               <button type="submit" class="btn btn-success">Submit</button>
                                           </div>
                                       </form>
                                   </div>
                          
                               </div>
                           </div>
                       </div>
                       <!-- ============================================================== -->
                       <!-- end basic form  -->





   
</x-adminlayout>