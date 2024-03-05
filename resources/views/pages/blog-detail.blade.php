<x-layout>

    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 bg-hero mb-5">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-white mb-md-4">{{$blog->title}}</h1>
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
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    
                    <div class="row g-5 mb-5">
                        <div class="col-md-12">
                            <h6 class="mb-4">{{$blog->category}}</h6>
                            <img class="img-fluid w-100" src="{{$blog->image ? asset('storage/' . $blog->image) : asset('img/blog-1.jpg')}}" alt="" style="max-height: 500px">
                        </div>
                    </div>
                    
                    
                    <h1 class="mb-4">{{$blog->title}}</h1>
                    
                    <p> {!! $updatedBlogContent !!}</p>
                </div>
                <!-- Blog Detail End -->

               

                    @php
                        $commentcount=count($comments);
                    @endphp

                    @if ($commentcount>1)
                    <h2 class="mb-4">{{$commentcount}} comments</h2>
                    @else
                    <h2 class="mb-4">{{$commentcount}} comment</h2>
                    @endif

               
                <!-- Comment List Start -->
                @foreach($comments as $comment)
                <div class="d-flex mb-4">
                  <div class="ps-3">
                    <h6><a href="">{{$comment->name}}</a> <small><i>{{$comment->created_at->diffForHumans()}}</i></small></h6>
                    <p>{{$comment->body}}</p>
                    <button class="btn btn-sm btn-primary reply-btn" data-comment-id="{{ $comment->id }}">Reply</button>
              
            




                    <div class="reply-form bg-primary p-5" id="reply-form-{{ $comment->id }}" style="display: none; margin-top:10px;">
                        <h2 class="text-white mb-4">Leave a Reply</h2>
                        <form action="{{ route('comments.store', ['blog' => $blog->id]) }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;" name="name" required>
                                    @error('name')
                                    <p style="font-size: 12px; color: red; margin-top: 8px; align-self:center;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;" name="email" required>
                                    @error('email')
                                    <p style="font-size: 12px; color: red; margin-top: 8px; align-self:center;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Website" style="height: 55px;" name="website" >
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment" name="body" required></textarea>
                                </div>
                                <div class="col-12">
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                    <button class="btn btn-secondary w-100 py-3" type="submit">Leave Your Reply</button>
                                </div>
                            </div>
                        </form>
                    </div>

              
                  </div>
                </div>
              
                {{-- Display Replies (if any) --}}
                <div class="d-flex ms-5 mb-4">
                  @foreach($comment->replies as $reply)
                  <div class="ps-3">
                    <h6><a href="">{{ $reply->name }}</a> <small><i>{{ $reply->created_at->diffForHumans() }}</i></small></h6>
                    <p>{{ $reply->body }}</p>
                  </div>
                  @endforeach
                </div>
              @endforeach
              
                <!-- Comment List End -->

                <!-- Comment Form Start -->
              
                <div class="bg-primary p-5">
                    <h2 class="text-white mb-4">Leave a comment</h2>
                    <form action="{{ route('comments.store', ['blog' => $blog->id]) }}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;" name="name" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;" name="email" required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control bg-white border-0" placeholder="Website" style="height: 55px;" name="website" >
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment" name="body" required></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Leave Your Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
               
                <!-- Comment Form End -->
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Search Form Start -->
               
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
                        <div class="d-flex overflow-hidden mb-3">
                            <img class="img-fluid flex-shrink-0" src="{{$latestblog->image ? asset('storage/' . $latestblog->image) : asset('img/blog-1.jpg')}}" style="width: 75px;" alt="">
                            <a href="{{ route('blog.detail', ['id' => $latestblog->id]) }}" class="d-flex align-items-center bg-white text-dark fs-5 fw-bold px-3 mb-0">{{$latestblog->title}}
                            </a>
                        </div>
                        @endforeach
                        @else
                        <div class="d-flex overflow-hidden mb-3">
                            <p>No Blogs Posted Yet</p>
                        </div>
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
                        @foreach ($popularTags as $tag)
                            @php
                                $tagArray = explode(',', $tag->tags);
                            @endphp
                            @foreach ($tagArray as $singleTag)
                                <a href="{{ route('blogs', ['tag' => $singleTag]) }}" class="btn btn-primary m-1">{{ $singleTag }}</a>
                            @endforeach
                        @endforeach
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

    <script>
        // Using plain JS for simplicity. You can use jQuery if preferred
        const replyButtons = document.querySelectorAll('.reply-btn');
      
        replyButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const commentId = event.target.dataset.commentId;
                const replyForm = document.getElementById('reply-form-' + commentId);
                if (replyForm.style.display === 'none') {
                    replyForm.style.display = 'block';
                } else {
                    replyForm.style.display = 'none';
                }
            });
        });
      </script>
      
    
</x-layout>