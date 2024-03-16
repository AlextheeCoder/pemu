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
                                   @if (!$surveyResponse)
                                   <div class="card-body">
                                    <div class="review-block">
                                     <h5 class="card-header">No respnoses yet</h5>
                                        <p class="review-text font-italic m-0">No Responses have been Recorded</p>
                                    </div>
                                </div>
                                   @else

                                   
                                    <!-- -----------------------------------------------------------------Section 1------------------------------------------------------------------------- -->
                                   <div class="card-body">
                                       <div class="review-block">
                                        <h5 class="card-header">Farm Entity Type</h5>
                                           <p class="review-text font-italic m-0">  {{$surveyResponse->farm_type}}</p>
                                       </div>
                                   </div>
                                   <div class="card-body border-top">
                                       <div class="review-block">
                                         <h5 class="card-header">Land Size</h5>
                                           <p class="review-text font-italic m-0">{{$surveyResponse->land_size}} Hecters</p>
                                       </div>
                                   </div>
                                    <!-- -----------------------------------------------------------------Section 2------------------------------------------------------------------------- -->
                                    <div class="card-body border-top">
                                        <div class="review-block">
                                          <h5 class="card-header">Current Regenerative Agriculture Practice</h5>
                                            <p class="review-text font-italic m-0">{{$surveyResponse->regenerative_practice}} </p>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="review-block">
                                          <h5 class="card-header">Primary Farming Challenges</h5>
                                            <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->farming_challenges) }}</p>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="review-block">
                                          <h5 class="card-header">Soil Quality Rating</h5>
                                            <p class="review-text font-italic m-0">{{$surveyResponse->soil_quality}} </p>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="review-block">
                                          <h5 class="card-header">Access to Irrigation</h5>
                                            <p class="review-text font-italic m-0">{{$surveyResponse->irrigation_access}} </p>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="review-block">
                                          <h5 class="card-header">Water Source</h5>
                                            <p class="review-text font-italic m-0">{{$surveyResponse->water_source}} </p>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="review-block">
                                          <h5 class="card-header">Soil Improvement Techniques</h5>
                                            <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->soil_improvement_techniques) }} </p>
                                        </div>
                                    </div>
                        <!-- -----------------------------------------------------------------Section 3------------------------------------------------------------------------- -->

                        <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Interest in Training Services</h5>
                                <p class="review-text font-italic m-0">{{$surveyResponse->interest_training}} </p>
                            </div>
                        </div><div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Desired Training Areas</h5>
                                <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->training_areas) }} </p>
                            </div>
                        </div><div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Willingness to Pay for Training</h5>
                                <p class="review-text font-italic m-0"> {{$surveyResponse->pay_for_training}}</p>
                            </div>
                        </div><div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Likelihood to Join Digital Platform</h5>
                                <p class="review-text font-italic m-0"> {{$surveyResponse->join_digital_platform}}</p>
                            </div>
                        </div><div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Challenges in Finding Operators</h5>
                                <p class="review-text font-italic m-0"> {{$surveyResponse->find_operators}}</p>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Interest in Upskilling Operators</h5>
                                <p class="review-text font-italic m-0">{{$surveyResponse->upskill_operators}} </p>
                            </div>
                        </div>
                         <!-- -----------------------------------------------------------------Section 4------------------------------------------------------------------------- -->
                         <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Farm Operation as a Business</h5>
                                <p class="review-text font-italic m-0">{{$surveyResponse->farm_operation}} </p>
                            </div>
                        </div> <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Record-Keeping</h5>
                                <p class="review-text font-italic m-0">{{$surveyResponse->record_keeping}} </p>
                            </div>
                        </div> <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Profitability Analysis</h5>
                                <p class="review-text font-italic m-0">{{$surveyResponse->profitability_analysis}} </p>
                            </div>
                        </div> <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Long-term Strategy/Plan</h5>
                                <p class="review-text font-italic m-0">{{$surveyResponse->long_term_strategy}} </p>
                            </div>
                        </div> <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Sources of Finance</h5>
                                <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->sources_of_finance) }} </p>
                            </div>
                        </div> <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Borrowing Habits</h5>
                                <p class="review-text font-italic m-0">{{$surveyResponse->borrowing_habits}} </p>
                            </div>
                        </div> 
                        <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Challenges in Finance Access</h5>
                                <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->finance_access_challenges) }} </p>
                            </div>
                        </div>  

                          <!-- -----------------------------------------------------------------Section 5------------------------------------------------------------------------- -->
                          <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Sales Channels</h5>
                                <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->sales_channels) }} </p>
                            </div>
                        </div> 
                        <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Market Reliability</h5>
                                <p class="review-text font-italic m-0">{{$surveyResponse->market_reliability}} </p>
                            </div>
                        </div> 
                        <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Selling Challenges</h5>
                                <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->selling_challenges) }} </p>
                            </div>
                        </div> 
                           <!-- -----------------------------------------------------------------Section 6------------------------------------------------------------------------- -->
                           <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Crop and Livestock Enterprises</h5>
                                <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->current_crops) }} </p>
                            </div>
                        </div> 
                        <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Interest in New Crops</h5>
                                <p class="review-text font-italic m-0">{{$surveyResponse->interest_new_crops}} </p>
                            </div>
                        </div> 
                        <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Constraints in Crop Choice</h5>
                                <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->crop_choice_constraints) }} </p>
                            </div>
                        </div> 
                        <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Current Livestock</h5>
                                <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->current_livestock) }} </p>
                            </div>
                        </div> 
                        <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Interest in Livestock Farming</h5>
                                <p class="review-text font-italic m-0">{{$surveyResponse->interest_livestock_farming}} </p>
                            </div>
                        </div> 
                        <div class="card-body border-top">
                            <div class="review-block">
                              <h5 class="card-header">Challenges in Livestock Farming</h5>
                                <p class="review-text font-italic m-0">{{ implode(', ', $surveyResponse->livestock_farming_challenges) }} </p>
                            </div>
                        </div> 
 <!-- -----------------------------------------------------------------End of survey------------------------------------------------------------------------- -->
                                    @endif

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