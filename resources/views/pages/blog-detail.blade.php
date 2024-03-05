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


                    <div class="likes">
                        <h6>Rate and Share Our Blog</h6>
                        <form id="likeDislikeForm">
                            @csrf 
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <button class="btn" id="green" type="button" onclick="submitLikeDislike('like', {{ $blog->id }})"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i> </button>
                            <button class="btn" id="red" type="button" onclick="submitLikeDislike('dislike', {{ $blog->id }})"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#myModel" id="shareBtn" data-bs-placement="top" onclick="submitLikeDislike('share', {{ $blog->id }})" type="button"><i class="fa fa-share" aria-hidden="true"></i></button>
                        </form>                        
                        
                    </div>

                    <div class="share">
                        <!-- Share Modal -->
                        <div class="modal fade" id="myModel" tabindex="-1" aria-labelledby="myModelLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModelLabel">Share Blog Post</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Share this link via</p>
                                        <div class="d-flex align-items-center icons">                
                                            <!-- Add href attribute with dynamic link -->
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog.detail', ['id' => $blog->id]) }}" 
                                               class="fs-5 d-flex align-items-center justify-content-center" target="_blank">
                                                <span class="fab fa-facebook-f"></span>
                                            </a>                
                                            <!-- Add href attribute with dynamic link -->
                                            <a href="https://twitter.com/intent/tweet?url={{ route('blog.detail', ['id' => $blog->id]) }}" 
                                               class="fs-5 d-flex align-items-center justify-content-center" target="_blank">
                                                <span class="fab fa-twitter"></span>
                                            </a>                
                                            <!-- Add href attribute with dynamic link -->
                                            <a href="https://www.instagram.com/" 
                                               class="fs-5 d-flex align-items-center justify-content-center">
                                                <span class="fab fa-instagram"></span>
                                            </a>                
                                            <!-- Add href attribute with dynamic link -->
                                            <a href="https://wa.me/?text={{ route('blog.detail', ['id' => $blog->id]) }}" 
                                               class="fs-5 d-flex align-items-center justify-content-center" target="_blank">
                                                <span class="fab fa-whatsapp"></span>
                                            </a>                
                                            <!-- Add href attribute with dynamic link -->
                                            <a href="https://t.me/share/url?url={{ route('blog.detail', ['id' => $blog->id]) }}" 
                                               class="fs-5 d-flex align-items-center justify-content-center" target="_blank">
                                                <span class="fab fa-telegram-plane"></span>
                                            </a>
                                        </div>
                                        <p>Or copy link</p>
                                        <div class="field d-flex align-items-center justify-content-between" target="_blank">
                                            <span class="fas fa-link text-center"></span>
                                            <!-- Display the current blog URL -->
                                            <input type="text" value="{{ route('blog.detail', ['id' => $blog->id]) }}" readonly>
                                            <button id="copyButton">Copy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    
                </div>
              
              <!-- Similar Blogs Section Start -->
                <div class="container-fluid py-5">
                    <div class="container">
                        <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                            <h6 class="text-primary text-uppercase">Similar Blogs</h6>
                            <h5 class="display-5" style="font-style: underline;">Explore More Articles</h5>
                        </div>
                        <div class="row g-5">
                            @php
                                $similarBlogs = $latestblogs->reject(function ($latestblog) use ($blog) {
                                    return $blog->id == $latestblog->id;
                                });
                            @endphp
                        
                            @if ($similarBlogs->count() > 0)
                                @foreach ($similarBlogs as $latestblog)
                                    <div class="col-lg-6">
                                        <div class="blog-item position-relative overflow-hidden">
                                            <img class="img-fluid" style="height: 300px" src="{{ $latestblog->image ? asset('storage/' . $latestblog->image) : asset('img/blog-1.jpg') }}" alt="">
                                            <a class="blog-overlay" href="{{ route('blog.detail', ['id' => $latestblog->id]) }}">
                                                <h4 class="text-white">{{ $latestblog->title }}</h4>
                                                <span class="text-white fw-bold">{{ $latestblog->created_at->diffForHumans() }}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-6">
                                    <div class="blog-item position-relative overflow-hidden">
                                        <p>No similar blogs found.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                    </div>
                </div>
                <!-- Similar Blogs Section End -->


                

                    @php
                        $commentcount=count($comments);
                    @endphp

                    @if ($commentcount>1)
                    <h2 class="mb-4">{{$commentcount}} Comments</h2>
                    @elseif ($commentcount == 0)
                    <h2 class="mb-4">{{$commentcount}} Comments</h2>
                    @else
                    <h2 class="mb-4">{{$commentcount}} Comment</h2>
                    @endif

               
                <!-- Comment List Start -->
                @unless (count($comments)==0)
                    
               
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
              <p>No comments yet ...</p>
              @endunless
              
                <!-- Comment List End -->
                <div class="col-12" style="margin-bottom: 40px">
                    <button type="button" class="btn btn-primary btn-lg" id="showFormButton">Leave a comment</button>
                   
                </div>
                <!-- Comment Form Start -->
              
                <div class="bg-primary p-5" id="commentform" style="display: none;">
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
                            <a href="{{ route('blog.detail', ['id' => $latestblog->id]) }}" class="d-flex align-items-center bg-white text-dark fs-5 fw-bold px-3 mb-0"> {{ strtok($latestblog->title, ' ') }} {{ strtok(' ') }} ...
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

      <script>
            var btn1 = document.querySelector('#green');
            var btn2 = document.querySelector('#red');
            var btn3 =document.querySelector('#shareBtn');

            btn1.addEventListener('click', function() {
            
                if (btn2.classList.contains('red')) {
                btn2.classList.remove('red');
                } 
            this.classList.toggle('green');
            
            });

            btn2.addEventListener('click', function() {
            
                if (btn1.classList.contains('green')) {
                btn1.classList.remove('green');
                } 
            this.classList.toggle('red');
            
            });
            btn3.addEventListener('click', function() {
            
            if (btn1.classList.contains('green')) {
            btn1.classList.remove('green');
            } 
            else if(btn2.classList.contains('red')){
                btn2.classList.remove('red');
            }
        this.classList.toggle('green');
        
        });
      </script>

      <script>
        document.addEventListener('DOMContentLoaded',function(e){
            let field = document.querySelector('.field');
            let input = document.querySelector('input');
            let copyBtn = document.querySelector('.field button');

            copyBtn.onclick = () =>{
                input.select();
                if(document.execCommand("copy")){
                    field.classList.add('active');
                    copyBtn.innerText = 'Copied';
                    setTimeout(()=>{
                        field.classList.remove('active');
                        copyBtn.innerText = 'Copy';
                    },3500)
                }
            }
        })
      </script>

      <!-- Include the Clipboard.js library for copying to clipboard -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
                    
      <!-- Initialize Clipboard.js for the copy button -->
      <script>
          document.addEventListener('DOMContentLoaded', function () {
              new ClipboardJS('#copyButton');
          });
      </script>
      
     
      <script>
        function submitLikeDislike(action) {
            var blogId = $('input[name="blog_id"]').val(); // Get the value from the hidden input
            $.ajax({
                url: '{{ route("like-dislike") }}',
                type: 'POST',
                data: {
                    action: action,
                    blog_id: blogId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    // Handle the response if needed
                    console.log(response);
                },
                error: function (error) {
                    // Handle the error if needed
                    console.error(error);
                }
            });
        }

      </script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
  $(document).ready(function () {
    $('#commentform').hide(); 

    $('#showFormButton').click(function () {
        $('#commentform').animate({
            opacity: 'toggle', // Toggle between 0 and 1
            height: 'toggle'    // Toggle between hiding and showing the full height
        }, "slow");
    });
});
</script>


    
    
</x-layout>