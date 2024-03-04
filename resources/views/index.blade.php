<x-layout>
       <!-- Carousel Start -->
       <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="Image" style="max-height: 900px">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <h3 class="text-white">PEMU Agrifood</h3>
                            <h1 class="display-1 text-white mb-md-4">Growing Together, Regenerating the Future</h1>
                            <a href="#mission" class="btn btn-primary py-md-3 px-md-5 me-3">Explore</a>
                            @auth
                                @else
                                <a href="/login" class="btn btn-secondary py-md-3 px-md-5">Join Us</a>
                            @endauth
                           
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-2.jpg')}}" alt="Image" style="max-height: 900px">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <h3 class="text-white">PEMU Agrifood</h3>
                            <h1 class="display-1 text-white mb-md-4">Growing Together, Regenerating the Future</h1>
                            <a href="#mission" class="btn btn-primary py-md-3 px-md-5 me-3">Explore</a>
                            @auth
                            @else
                            <a href="/login" class="btn btn-secondary py-md-3 px-md-5">Join Us</a>
                        @endauth
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Banner Start -->
    <div class="container-fluid banner mb-5">
        <div class="container" id="mission">
            <div class="row gx-0">
                <div class="col-md-6">
                    <div class="bg-primary bg-vegetable d-flex flex-column justify-content-center p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Vision</h3>
                        <p class="text-white">Envisioning a future where empowered farmers and agripreneurs lead the transformation towards sustainable and regenerative agriculture, nurturing the planet and thriving communities.</p>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-secondary bg-fruit d-flex flex-column justify-content-center p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Mission </h3>
                        <p class="text-white">To build knowledge and skills among farmers and agripreneurs, enabling them to adopt regenerative solutions, access quality inputs, and connect with sustainable markets to grow their businesses sustainably.</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->


    <!-- About Start -->
    <div class="container-fluid about pt-5" id="about">
        <div class="row gx-5">
            <!-- Remove the outer container -->
            <!-- <div class="container"> -->
    
            <!-- Add mx-auto to center the content -->
            <div class="col-lg-6 pb-5 mx-auto">
                <div class="mb-3 pb-2">
                    <h6 class="text-primary text-uppercase">About Us</h6>
                    <h1 class="display-5">We Produce Organic Food For Your Family</h1>
                </div>
                <p class="mb-4">At PEMU AGRIFOOD ACADEMEY, we're right here with you, farmers, and agripreneurs, to help make your work better and kinder to the earth. We believe in farming that keeps the soil healthy and makes crops grow stronger. We're your neighbors, ready to work together to see what your farm or business needs to improve. Together, we'll make a good plan using farming methods that are good for the earth and your crops.
                    We give you the best Inputs, new ways to farm that really work, and teach you everything you need to know. We also help you find the right people to work with you, making sure they know how to help your farm or business grow. And we connect you with people who want to buy your products. With PEMU AGRIFOOD ACADEMEY, you get help that’s just right for you, using the right Inputs, knowledge, and connections to sell your crops and finding good people to work with.
                    Join us to change farming for the better, for our land and for all of us. Let's grow together, making your farms and businesses thrive with care for our earth.
                </p>
               
            </div>
            <!-- </div> Remove the outer container -->
        </div>
    </div>
    
    <!-- About End -->



<!-- Facts Start -->
    <div class="container-fluid bg-primary facts py-5 mb-5">
        <div class="container py-5">
            
            <p class="slogan">Growing Together, Regenerating the Future</p>
         </div>
    </div>
    <!-- Facts End -->
    

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <h6 class="text-primary text-uppercase" style="font-size: 1.8rem">Services</h6>
                        <h1 class="display-5">PEMU Agrifood Academy</h1>
                    </div>
                    <p class="mb-4">Got Questions? We've Got Answers!</p>
                    <a href="/contact" class="btn btn-primary py-md-3 px-md-5">Contact Us</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-tractor display-1 text-primary mb-3"></i>
                        <h4>Regenerative Inputs</h4>
                        <p class="mb-0" style="text-align: left">At PEMU, we believe in taking care of the soil so it can take care of our plants. Our special farming Inputs help make the soil strong, fight off pests without harmful chemicals, and use water wisely.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-graduation-cap display-1 text-primary mb-3"></i>
                        <h4>Training</h4>
                        <p class="mb-0" style="text-align: left">PEMU believes hands-on farm experience is the best way for farmers to learn. They aim to solve Kenya's lack of skilled agricultural workers by providing training that emphasizes practical application and seeing the results of improved farming methods.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-briefcase display-1 text-primary mb-3"></i>
                        <h4>Finiding you Manpower</h4>
                        <p class="mb-0" style="text-align: left">At PEMU, we understand that finding good, skilled people to work on farms and in food businesses can be really tough. But don’t worry, we’ve got you covered. We know exactly what kind of help you need to keep things running smoothly and how to find the right people for every job.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-plug display-1 text-primary mb-3"></i>
                        <h4>Connecting You</h4>
                        <p class="mb-0" style="text-align: left">At PEMU, we’re all about helping our farmers and food producers find people who want to buy what they grow and make. We know how important it is to grow food in a way that’s good for the earth – we call this regenerative farming. And we’re finding buyers who love this kind of food just as much as we do.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-globe display-1 text-primary mb-3"></i>
                        <h4>Connecting with our Community</h4>
                        <p class="mb-0" style="text-align: left">PEMU believes healthy communities start with healthy farms. Support our programs and see how better farming benefits everyone.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Features Start -->
    <div class="container-fluid bg-primary feature py-5 pb-lg-0 my-5">
        <div class="container py-5 pb-lg-0">
            <div class="mx-auto text-center mb-3 pb-2" style="max-width: 500px;">
                <h6 class="text-uppercase text-secondary">ENGAGEMENT PROCESS</h6>
                <h1 class="display-5 text-white">HOW TO ENGAGE WITH US</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-3">
                    <div class="text-white mb-5">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check-circle" aria-hidden="true" style="font-size:36px"></i>
                        </div>
                        <h4 class="text-white">1. Initial Meeting</h4>
                        <p class="mb-0">Discover PEMU at our retail outlets, demo farms, or during training events. It’s where your journey to sustainable farming starts.</p>
                    </div>
                    <div class="text-white">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check-circle" aria-hidden="true" style="font-size:36px"></i>
                        </div>
                        <h4 class="text-white">2. Member Registration and Survey</h4>
                        <p class="mb-0">Become part of the PEMU family! Register and take a quick survey to let us know about your farm or business and how we can help.</p>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <div class="text-white mb-5">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check-circle" aria-hidden="true" style="font-size:36px"></i>
                        </div>
                        <h4 class="text-white">3. Farm/Business Assessment</h4>
                        <p class="mb-0">We visit your farm or business for a detailed look to understand exactly what you need and how we can make things better together.</p>
                    </div>
                    <div class="text-white">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check-circle" aria-hidden="true" style="font-size:36px"></i>
                        </div>
                        <h4 class="text-white">4. Development of a Regenerative Plan</h4>
                        <p class="mb-0">Based on our assessment, we’ll help you create a plan that uses regenerative practices to improve your soil, crops, and overall farm health.</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="text-white mb-5">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check-circle" aria-hidden="true" style="font-size:36px"></i>
                        </div>
                        <h4 class="text-white">5. Implementation Support</h4>
                        <p class="mb-0">PEMU stands by you as you put your plan into action. From supplying inputs to offering training and linking you to markets, we’re here every step.</p>
                    </div>
                    <div class="text-white">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check-circle" aria-hidden="true" style="font-size:36px"></i>
                        </div>
                        <h4 class="text-white">6. Monitoring and Updates</h4>
                        <p class="mb-0">We keep a close eye on progress, logging all activities and keeping you informed with regular updates.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-white mb-5">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check-circle" aria-hidden="true" style="font-size:36px"></i>
                        </div>
                        <h4 class="text-white">7. Ongoing Support and Feedback Loop</h4>
                        <p class="mb-0">Our support doesn’t end. We continuously offer advice, training, and market opportunities, adapting to your needs and feedback for lasting success.</p>
                    </div>

                    <div class="text-white mb-5">
                        <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-check-circle" aria-hidden="true" style="font-size:36px"></i>
                        </div>
                        <h4 class="text-white">Become a Member</h4>
                        @auth
                            @else
                            <a href="/login" class="btn btn-secondary py-md-3 px-md-5">Sign IN</a>
                        @endauth
                       
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Features Start -->


    <!-- Products Start -->
   
    
    <!-- Products End -->


  
    <!-- Testimonial End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">The Team</h6>
                <h1 class="display-5">We Are Professional Organic Farmers</h1>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="row g-0">
                        <div class="col-10">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{asset ('img/founder.jpg')}}" alt="">
                                <div class="position-absolute start-0 bottom-0 w-100 py-3 px-4" style="background: rgba(5,106,59);">
                                    <h4 class="text-white">Peter Muthee</h4>
                                    <span class="text-white">Founder</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="h-100 d-flex flex-column align-items-center justify-content-around bg-secondary py-5">
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-twitter text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="#"><i class="fab fa-facebook-f text-secondary"></i></a>
                                <a class="btn btn-square rounded-circle bg-white" href="https://www.linkedin.com/in/peter-muthee-mwangi-18697952/"><i class="fab fa-linkedin-in text-secondary"></i></a>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">The Blog</h6>
                <h1 class="display-5">Latest Articles From Our Blog Post</h1>
            </div>
            <div class="row g-5">
                @unless(count($latestblogs) == 0)
                @foreach($latestblogs as $latestblog)
                @if($latestblog->status == 'published')
                <div class="col-lg-4">
                    <div class="blog-item position-relative overflow-hidden">
                        <img class="img-fluid" style="height: 400px;" src="{{$latestblog->image ? asset('storage/' . $latestblog->image) : asset('img/blog-1.jpg')}}" alt="">
                        <a class="blog-overlay" href="{{ route('blog.detail', ['id' => $latestblog->id]) }}">
                            <h4 class="text-white">{{$latestblog->title}}</h4>
                            <span class="text-white fw-bold">{{$latestblog->created_at->diffForHumans()}}</span>
                        </a>
                    </div>
                </div>
                @elseif ($latestblog->status == 'staged')
                <div class="col-md-6">
                    <div class="blog-item position-relative overflow-hidden">
                        <p>No blogs posted</p>
                    </div>
                </div>
                @endif
                @endforeach
                @else
                <div class="col-lg-4">
                    <div class="blog-item position-relative overflow-hidden">
                        <p><p>No blogs Posted yet. Stay tuned!</p></p>
                    </div>
                </div>
                @endunless

            </div>
        </div>
    </div>
    <!-- Blog End -->
</x-layout>