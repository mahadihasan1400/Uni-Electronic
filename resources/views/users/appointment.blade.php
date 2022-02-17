<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center" style="margin-top: 100px; margin-left: 0px; margin-right: 0px; margin-bottom: 0px;">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Appointment</h3></div>
                                    <div class="card-body">

                                        <form method="post" action = {{ route('appointment.save') }}>


                                            {{-- @if(Session::get('success'))
                                                <div class="alert alert-success">
                                                    {{ Session::get('success') }}
                                                </div>
                                         @endif
                                            @if(Session::get('fail'))
                                                <div class="alert alert-danger">
                                                    {{ Session::get('fail') }}
                                                </div>
                                            @endif --}}
                                            
                                            @csrf
                                     
                                             <div class="form-floating mb-3">
                                                <input class="form-control"  name="name" type="text" placeholder="james Bond" value="{{ old('name') }}"/>
                                                <label for="name">Name</label>
                                                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                            
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control"  name="email" type="email" placeholder="name@example.com" value="{{ old('company_email') }}"/>
                                                <label for="email">Email address</label>
                                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                               
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control"  name="phn" type="text" placeholder="+490000000" value="{{ old('phn') }}"/>
                                                <label for="phn">Contact Number</label>
                                                <span class="text-danger">@error('phn'){{ $message }} @enderror</span>
                    
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control"  name="product" type="textarea" placeholder="Ex: N25, recording system etc..." value="{{ old('product') }}"/>
                                                <label for="product">Product of Interest</label>
                                                <span class="text-danger">@error('product'){{ $message }} @enderror</span>
                    
                                            </div>

                                            
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                
                                                <button class="btn btn-primary"  type="submit">Iterested for Booking An Appointment</button>
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
