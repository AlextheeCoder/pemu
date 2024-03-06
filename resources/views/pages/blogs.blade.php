<x-layout>

     <!-- Hero Start -->
     <div class="container-fluid bg-primary py-5 bg-hero mb-5">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-white mb-md-4">Blogs</h1>
                    <a href="/" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                    <a href="/blogs" class="btn btn-secondary py-md-3 px-md-5">Blogs</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    
     <!-- Blog Start -->
     <div class="container py-5">
        <div class="row g-5">
            <!-- Blog list Start -->
            <div class="col-lg-8">
                <div class="row g-5">
                    @unless(count($blogs) == 0)
                    @foreach($blogs as $blog)
                        @if($blog->status == 'published')
                            <article class="col-md-6">
                                <div class="blog-item position-relative overflow-hidden">
                                    <img class="img-fluid" style="height: 400px;" src="{{$blog->image ? asset('storage/' . $blog->image) : asset('img/blog-1.jpg')}}" alt="">
                                    <a class="blog-overlay" href="{{ route('blog.detail', ['slug' => $blog->slug]) }}">
                                        <h4 class="text-white">{{ $blog->title}}</h4>
                                        <span class="text-white fw-bold">{{$blog->created_at->diffForHumans()}}</span>
                                    </a>
                                </div>
                            </article>
                            @elseif ($blog->status == 'staged')
                            <article class="col-md-6">
                                <div class="blog-item position-relative overflow-hidden">
                                    <p>No blogs posted</p>
                                </div>
                            </article>
                        @endif
                    @endforeach
                @else
                    <article class="col-md-6">
                        <div class="blog-item position-relative overflow-hidden">
                            <p>No blogs posted</p>
                        </div>
                    </article>
                @endunless                


                    <div class="col-12">
                        <nav aria-label="Page navigation">
                            {{ $blogs->links('pagination.custom') }}
                        </nav>
                    </div>
                    
                    
                </div>
            </div>
            <!-- Blog list End -->

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Search Form Start -->
                <div class="mb-5">
                    <form action="/blogs" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control p-3" placeholder="Keyword" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                
                <!-- Search Form End -->

                <!-- Category Start -->
                <div class="mb-5">
                    <h2 class="mb-4">Categories</h2>
                    <div class="d-flex flex-column justify-content-start bg-primary p-4">
                        @unless(count($popularCategories) == 0)
                        @foreach ($popularCategories as $category)
                            <a class="fs-5 fw-bold text-white mb-2" href="{{ route('blogs', ['category' => $category->category]) }}">
                                <i class="bi bi-arrow-right me-2"></i>{{ $category->category }}
                            </a>
                        @endforeach

                        @else
                        <p>No Categories Yet</p>
                        @endunless

                    </div>
                </div>
                <!-- Category End -->

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h2 class="mb-4">Recent Post</h2>
                    <div class="bg-primary p-4">
                        @unless(count($latestblogs) == 0)
                        @foreach($latestblogs as $latestblog)
                        <article class="d-flex overflow-hidden mb-3">
                            <img class="img-fluid flex-shrink-0" src="{{$latestblog->image ? asset('storage/' . $latestblog->image) : asset('img/blog-1.jpg')}}" style="width: 75px;" alt="">
                            <a href="{{ route('blog.detail', ['slug' => $latestblog->slug]) }}" class="d-flex align-items-center bg-white text-dark fs-5 fw-bold px-3 mb-0"> {{ strtok($latestblog->title, ' ') }} {{ strtok(' ') }} ...
                            </a>
                        </article>
                        @endforeach
                        @else
                        <article class="d-flex overflow-hidden mb-3">
                            <p>No Blogs Posted Yet</p>
                        </article>
                        @endunless
                       
                    </div>
                </div>
                <!-- Recent Post End -->

                <!-- Image Start -->
                
                <!-- Image End -->

                <!-- Tags Start -->
                <div class="mb-5">
                    <h2 class="mb-4">Tag Cloud</h2>
                    <div class="d-flex flex-wrap m-n1">
                        @unless(count($latestblogs) == 0)
                            
                      
                        @foreach ($popularTags as $tag)
                            @php
                                $tagArray = explode(',', $tag->tags);
                            @endphp
                            @foreach ($tagArray as $singleTag)
                                <a href="{{ route('blogs', ['tag' => $singleTag]) }}" class="btn btn-primary m-1">{{ $singleTag }}</a>
                            @endforeach
                        @endforeach
                        @else
                        <p>No tags yet</p>
                        @endunless
                    </div>
                </div>
                
                <!-- Tags End -->

                <!-- Plain Text Start -->
             
                <!-- Plain Text End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->
</x-layout>