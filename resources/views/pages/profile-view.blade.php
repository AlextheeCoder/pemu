<x-layout>
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img class="rounded-circle mr-3" style="max-width: 100px; max-height: 100px;" src="{{asset('img/lgo.jpeg')}}" alt=""/>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{auth()->user()->firstname}} {{auth()->user()->lastname}}
                        </h5>
                        <h6>
                            {{ ucfirst(auth()->user()->role) }}
                        </h6>
                        <p class="proile-rating">Date Joined : <span>{{auth()->user()->created_at->diffForHumans()}}</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            @if (auth()->user()->role == "admin")
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Survey Report</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 30px">
                            <a href="" class="btn btn-rounded btn-warning"><i class="fa fa-user" aria-hidden="true"></i> Edit Profile</a>
                        </div>
                        @php
                                 $userFilledSurvey = \App\Models\Survey::where('user_id', auth()->id())->exists();
                        @endphp

                        @if (auth()->user()->role == "farmer")
                            <div class="col-md-6">
                                @if(!$userFilledSurvey)
                                    <a href="{{ route('survey') }}" class="btn btn-rounded btn-success">
                                        <i class="fa fa-file-text" aria-hidden="true"></i> Take Our Survey
                                    </a>
                                @endif
                            </div>
                        @endif
                  
                    
                        
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <!-- ... Your existing content ... -->
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{auth()->user()->firstname}} {{auth()->user()->lastname}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{auth()->user()->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{auth()->user()->phone}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Age</label>
                                </div>
                                <div class="col-md-6">
                                    @php
                                            // Assuming 'dob' is the birthdate attribute of the user
                                            $birthdate = auth()->user()->dob;
                                            $age = now()->diffInYears($birthdate);
                                        @endphp
                                   <p>{{ $age }}</p>
                                </div>
                            </div>
                        </div>
                       
                        <div class="tab-pane fade" id="profile" role="tabpane2" aria-labelledby="profile-tab">
                           
                            <div class="row">
                                <div class="col-md-12">
                                    @if(!$userFilledSurvey)
                                        <p>Please Take the survey to view report</p>
                                        <a href="{{ route('survey') }}" class="btn btn-rounded btn-success"><i class="fa fa-file-text" aria-hidden="true"></i> Take Our Survey</a>
                                        @else
                                       
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>           
    </div>

    <!-- Add Bootstrap JS and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Add script for tab switching -->
    <script>
        $(document).ready(function () {
            $('#myTab a').on('click', function (e) {
                e.preventDefault();
                $(this).tab('show');
            });
        });
    </script>
</x-layout>
