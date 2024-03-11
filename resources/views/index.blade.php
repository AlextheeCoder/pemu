<x-layout>
       <!-- Carousel Start -->
       <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/1.jpeg') }}" alt="Image 1" style="max-height: 900px">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <a href="#mission" class="btn btn-primary py-md-3 px-md-5 me-3">Explore</a>
                                @auth 
                                @else
                                <a href="/login" class="btn btn-secondary py-md-3 px-md-5">Join Us</a>
                                @endauth
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/2.jpeg') }}" alt="Image 2" style="max-height: 900px">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <a href="#mission" class="btn btn-primary py-md-3 px-md-5 me-3">Explore</a>
                                @auth 
                                @else
                                <a href="/login" class="btn btn-secondary py-md-3 px-md-5">Join Us</a>
                                @endauth
                        </div>
                    </div>
                    </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/3.jpeg') }}" alt="Image 3" style="max-height: 900px">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <a href="#mission" class="btn btn-primary py-md-3 px-md-5 me-3">Explore</a>
                                @auth 
                                @else
                                <a href="/login" class="btn btn-secondary py-md-3 px-md-5">Join Us</a>
                                @endauth
                        </div>
                    </div>
                    </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/4.jpeg') }}" alt="Image 4" style="max-height: 900px">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <a href="#mission" class="btn btn-primary py-md-3 px-md-5 me-3">Explore</a>
                                @auth 
                                @else
                                <a href="/login" class="btn btn-secondary py-md-3 px-md-5">Join Us</a>
                                @endauth
                        </div>
                    </div>
                    </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/5.jpeg') }}" alt="Image 5" style="max-height: 900px">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <a href="#mission" class="btn btn-primary py-md-3 px-md-5 me-3">Explore</a>
                                @auth 
                                @else
                                <a href="/login" class="btn btn-secondary py-md-3 px-md-5">Join Us</a>
                                @endauth
                        </div>
                    </div>
                    </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/6.jpeg') }}" alt="Image 6" style="max-height: 900px">
                    <div class="carousel-caption top-0 bottom-0 start-0 end-0 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-start p-5" style="max-width: 900px;">
                            <a href="#mission" class="btn btn-primary py-md-3 px-md-5 me-3">Explore</a>
                                @auth 
                                @else
                                <a href="/login" class="btn btn-secondary py-md-3 px-md-5">Join Us</a>
                                @endauth
                        </div>
                    </div>
                    </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
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
                        <h2 class="text-white mb-3">Vision</h2>
                        <p class="text-white">Envisioning a future where empowered farmers and agripreneurs lead the transformation towards sustainable and regenerative agriculture, nurturing the planet and thriving communities.</p>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-secondary bg-fruit d-flex flex-column justify-content-center p-5" style="height: 300px;">
                        <h2 class="text-white mb-3">Mission </h2>
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

        <!-- Use col-12 to take the entire width of the screen -->
        <div class="col-12 pb-5">
            <div class="mb-3 pb-2 text-center">
                <!-- Apply text-center to center the heading -->
                <h1 class="text-primary text-uppercase">About Us</h1>
                <h2 class="display-5">Welcome to PEMU AGRIFOOD ACADEMY</h2>
            </div>
            <p class="mb-4">At PEMU AGRIFOOD ACADEMY, we're passionate about empowering farmers and agripreneurs like you with sustainable solutions.  We believe in regenerative agriculture – practices that build soil health, boost crop resilience, and protect the environment. We're your partners, dedicated to understanding your farm or agribusiness's unique needs and creating a customized plan for success. </p>
            <p class="mb-4">We provide premium regenerative inputs, teach proven sustainable farming methods, and offer the knowledge you need to thrive.  Plus, we'll help you find skilled labor committed to regenerative practices and connect you with buyers seeking responsibly-grown products. With PEMU AGRIFOOD ACADEMY, you'll gain the tools, resources, and network to build a profitable, earth-friendly agricultural venture. </p>
            <p class="mb-4">Join us in transforming the future of farming. Let's cultivate a better world together, where your farm or business flourishes in harmony with the environment. </p>
        </div>
        <!-- </div> Remove the outer container -->
    </div>
</div>
<!-- About End -->





<!-- Facts Start -->
    <div class="container-fluid bg-primary facts py-5 mb-5">
        <div class="container py-5">
            
            <h2 class="slogan">Growing Together, Regenerating the Future</h2>
         </div>
    </div>
    <!-- Facts End -->
    

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="mb-3">
                        <h1 class="text-primary text-uppercase">Services</h1>
                        <h2 class="display-5">PEMU AGRIFOOD ACADEMY</h2>
                    </div>
                    <p class="mb-4">Got Questions? We've Got Answers!</p>
                    <a href="/contact" class="btn btn-primary py-md-3 px-md-5">Contact Us</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-tractor display-1 text-primary mb-3"></i>
                        <h2>Regenerative Inputs</h2>
                        <p class="mb-0" style="text-align: left">At PEMU, we believe in taking care of the soil so it can take care of our plants. Our special farming Inputs help make the soil strong, fight off pests without harmful chemicals, and use water wisely.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-graduation-cap display-1 text-primary mb-3"></i>
                        <h2>Training</h2>
                        <p class="mb-0" style="text-align: left">PEMU believes hands-on farm experience is the best way for farmers to learn. They aim to solve Kenya's lack of skilled agricultural workers by providing training that emphasizes practical application and seeing the results of improved farming methods.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-briefcase display-1 text-primary mb-3"></i>
                        <h2>Finiding you Manpower</h2>
                        <p class="mb-0" style="text-align: left">At PEMU, we understand that finding good, skilled people to work on farms and in food businesses can be really tough. But don’t worry, we’ve got you covered. We know exactly what kind of help you need to keep things running smoothly and how to find the right people for every job.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                       
                        <i class="fa fa-money display-1 text-primary mb-3"></i>
                        <h2>Connecting You</h2>
                        <p class="mb-0" style="text-align: left">At PEMU, we’re all about helping our farmers and food producers find people who want to buy what they grow and make. We know how important it is to grow food in a way that’s good for the earth – we call this regenerative farming. And we’re finding buyers who love this kind of food just as much as we do.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light text-center p-5">
                        <i class="fa fa-globe display-1 text-primary mb-3"></i>
                        <h2>Connecting with our Community</h2>
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
                <h2 class="display-5 text-white">HOW TO ENGAGE WITH US</h2>
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


   


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">PEMU Agrifood Academy's Guide to Sustainable Farming</h6> 
                <h2 class="display-5">Fresh Insights and Tips for Sustainable Farming</h2>                
            </div>
            <div class="row g-5">
                @unless(count($latestblogs) == 0)
                @foreach($latestblogs as $latestblog)
                @if($latestblog->status == 'published')
                <article class="col-lg-4">
                    <div class="blog-item position-relative overflow-hidden">
                        <img class="img-fluid" style="height: 400px;" src="{{$latestblog->image ? asset('storage/' . $latestblog->image) : asset('img/blog-1.jpg')}}" alt="">
                        <a class="blog-overlay" href="{{ route('blog.detail', ['slug' => $latestblog->slug]) }}">
                            <h4 class="text-white">{{$latestblog->title}}</h4>
                            <span class="text-white fw-bold">{{$latestblog->created_at->diffForHumans()}}</span>
                        </a>
                    </div>
                </article>
                @elseif ($latestblog->status == 'staged')
                <article class="col-md-6">
                    <div class="blog-item position-relative overflow-hidden">
                        <p>No blogs posted</p>
                    </div>
                </article>
                @endif
                @endforeach
                @else
                <article class="col-lg-4">
                    <div class="blog-item position-relative overflow-hidden">
                        <p><p>No blogs Posted yet. Stay tuned!</p></p>
                    </div>
                </article>
                @endunless

            </div>
        </div>
    </div>
    <!-- Blog End -->
</x-layout>