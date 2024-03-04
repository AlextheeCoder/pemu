<x-adminlayout>
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">View PEMU  Blogs </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">View</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
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
            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">All Blogs</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">Image</th>
                                        <th class="border-0">Blog Title</th>
                                        <th class="border-0">Views</th>
                                        <th class="border-0">Date Created</th>
                                        <th class="border-0">Author</th>
                                        <th class="border-0">Status</th>
                                        
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @unless(count($blogs) == 0)
                                    @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$blog->id}}</td>
                                        <td>
                                            <div class="m-r-10"><img src="{{$blog->image ? asset('storage/' . $blog->image) : asset('Admin/assets/images/product-pic.jpg')}}" alt="user" class="rounded" width="45"></div>
                                        </td>
                                        <td>{{$blog->title}} </td>
                                        <td>{{$blog->views}}</td>
                                        <td>{{$blog->created_at}}</td>
                                        <td>{{$blog->user->firstname}}</td>
                                        @if ($blog->status == "published")
                                        <td><span class="badge-dot badge-success mr-1"></span>{{$blog->status}} </td>
                                        @else
                                        <td><span class="badge-dot badge-brand mr-1"></span>{{$blog->status}} </td>
                                        @endif
                                        
                                        <td>
                                            <form method="POST" action="{{ route('blog.delete', ['blog' => $blog->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"> Delete</button>
                                              </form>   
                                        </td>
                                        <td><a href="{{ route('blog.edit', ['id' => $blog->id]) }}" class="btn btn-success">Edit</a></td>
                                    </tr>
                                    
                                    @endforeach
                                    @else
                                        <td >No Blogs posted</td>
                                    @endunless
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-adminlayout>