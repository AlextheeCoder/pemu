<x-adminlayout>
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">View {{$contact->name}}'s  Contact Form </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">View</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                <div class="card">
                    <h5 class="card-header">{{$contact->subject}}</h5>
                    <div class="card-body">
                        <div class="media">
                          
                            <div class="media-body">
                                <h5>{{$contact->name}}</h5>
                                <p>{{$contact->body}}.</p>
                                <form method="POST" action="{{ route('contact.delete', ['contact' => $contact->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"> Delete</button>

                                    <a href="/pemu/contacts/view" class="btn btn-success">View Contacts</a>
                                  </form> 
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-adminlayout>