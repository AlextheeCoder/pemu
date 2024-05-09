<x-adminlayout>

    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Create Farmer </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Create</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Farmer</li>
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
                <h3 class="text-center">Our Farmers !</h3>
            </div>
        </div>
    </div>

    <!-- basic form  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Add A Farmer</h3>

            </div>
            <div class="card">
                <h5 class="card-header">Add</h5>
                <div class="card-body">
                    <form class="blog-form" method="POST" action="" enctype="multipart/form-data"
                        onsubmit="return validateForm()">
                        @csrf


                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Blog Title</label>
                            <input id="inputText3" type="text" class="form-control" name="title" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="custom-file mb-3">

                            <input type="file" class="custom-file-input" id="customFile" required name="image">
                            <label class="custom-file-label" for="customFile">Blog Image</label>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="input-select">Category</label>
                            <select class="form-control" id="input-select" name="category" required>
                                @foreach (\App\Models\Categorie::all() as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Blog Tags</label>
                            <input id="inputText3" type="text" class="form-control" name="tags"
                                placeholder="Example: Farming, Accounting, Marketing, etc">

                            @error('tags')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Write !!</label>
                            <div id="exampleFormControlTextarea1" style="height:500px;"></div>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="display:none;" name="content"></textarea>
                            @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">

                            <input type="hidden" name="status" id="status" value="">
                            <button type="submit" class="btn btn-success"
                                onclick="setStatus('published')">Publish</button>
                            <button type="submit" class="btn btn-warning" style="margin-left: 30px"
                                onclick="setStatus('staged')">Stage</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic form  -->







    <script src="https://cdn.quilljs.com/1.1.3/quill.js"></script>
    <script>
        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['link', 'image', 'video', 'formula'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }, {
                'list': 'check'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

            ['clean'] // remove formatting button
        ];
        const quill = new Quill('#exampleFormControlTextarea1', {
            modules: {
                toolbar: toolbarOptions,
            },
            placeholder: 'Write your Blog here...',
            theme: 'snow'
        });
        const form = document.querySelector('.blog-form');

        form.addEventListener('submit', function(event) {
            document.querySelector('textarea[name="content"]').value = quill.root.innerHTML;
            ow
        });


        function validateForm() {
            if (quill.getText().trim().length === 0) {
                alert('Please add some content to your blog.');
                return false;
            }
            return true;
        }

        function setStatus(status) {
            document.getElementById('status').value = status;
        }
    </script>



</x-adminlayout>
