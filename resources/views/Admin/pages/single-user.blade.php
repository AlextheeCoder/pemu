<x-adminlayout>
   <div class="influence-profile">
      <div class="container-fluid dashboard-content ">
          <!-- ============================================================== -->
          <!-- pageheader -->
          <!-- ============================================================== -->
          <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="page-header">
                      <h3 class="mb-2">User Profile </h3>
                      
                      <div class="page-breadcrumb">
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                              <h2 class="font-24 mb-0">{{$user->firstname}} {{$user->lastname}}</h2>
                              <p>{{ ucfirst($user->role)}}</p>
                          </div>
                      </div>
                      <div class="card-body border-top">
                          <h3 class="font-16">Contact Information</h3>
                          <div class="">
                              <ul class="list-unstyled mb-0">
                              <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>{{$user->email}}</li>
                              <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i>{{$user->phone}}</li>
                              <li class="mb-0">County: {{$user->county}}</li>
                              <li class="mb-0">Sub-County: {{$user->subcounty}}</li>
                              <li class="mb-0">Ward: {{$user->ward}}</li>
                          </ul>
                          </div>
                      </div>
                      
                  
                      <div class="card-body border-top">
                          <h3 class="font-16">Role</h3>
                          <div>
                              <a href="#" class="badge badge-light mr-1">{{ ucfirst($user->role)}}</a>
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
                              <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">User</a>
                          </li>
                          
                          <li class="nav-item">
                              <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Survey Responses</a>
                          </li>
                         
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                              <div class="row">
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                      <div class="section-block">
                                          <h3 class="section-title">Manage {{$user->firstname}} {{$user->lastname}}</h3>
                                      </div>
                                  </div>
                                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                      <div class="card">
                                          <div class="card-body">
                                             <form method="POST" action="{{ route('user.delete', ['user' => $user->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"> Delete</button>
                                              </form>   
                                              
                                          </div>
                                      </div>
                                  </div>
                                 
                                
                                
                              </div>
                              
                            
                          </div>
                        
                          <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                              <div class="card">
                                  <h5 class="card-header">Survey Responses</h5>
                                  <div class="card-body">
                                      <div class="review-block">
                                       <h5 class="card-header">Survey Responses</h5>
                                          <p class="review-text font-italic m-0">“Quisque lobortis vestibulum elit, vel fermentum elit pretium et. Nullam id ultrices odio. Cras id nulla mollis, molestie diam eu, facilisis tortor. Mauris ultrices lectus laoreet commodo hendrerit. Nullam varius arcu sed aliquam imperdiet. Etiam ut luctus augue.”</p>
                                          <div class="rating-star mb-4">
                                              <i class="fa fa-fw fa-star"></i>
                                              <i class="fa fa-fw fa-star"></i>
                                              <i class="fa fa-fw fa-star"></i>
                                              <i class="fa fa-fw fa-star"></i>
                                              <i class="fa fa-fw fa-star"></i>
                                          </div>
                                          <span class="text-dark font-weight-bold">Tabitha C. Campbell</span><small class="text-mute"> (Company name)</small>
                                      </div>
                                  </div>
                                  <div class="card-body border-top">
                                      <div class="review-block">
                                          <p class="review-text font-italic m-0">“Maecenas rutrum viverra augue. Nulla in eros vitae ante ullamcorper congue. Praesent tristique massa ac arcu dapibus tincidunt. Mauris arcu mi, lacinia et ipsum vel, sollicitudin laoreet risus.”</p>
                                          <div class="rating-star mb-4">
                                              <i class="fa fa-fw fa-star"></i>
                                              <i class="fa fa-fw fa-star"></i>
                                              <i class="fa fa-fw fa-star"></i>
                                              <i class="fa fa-fw fa-star"></i>
                                              <i class="fa fa-fw fa-star"></i>
                                          </div>
                                          <span class="text-dark font-weight-bold">Luise M. Michet</span><small class="text-mute"> (Company name)</small>
                                      </div>
                                  </div>
                                 
                                 
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
   
</x-adminlayout>