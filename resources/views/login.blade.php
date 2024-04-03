@extends('layout.main')
@push('title')
    <title>Login</title>
@endpush
@push('styles')
    <style>
      .error-help-block{
        color: red;
      }
    </style>
@endpush
@section('main-container')
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">

                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center">
  
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                    class="img-fluid" alt="Sample image">
  
                </div>
                
                <div class="col-md-10 col-lg-6 col-xl-5 ">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                    @if (session('sucess'))
                        <div class="alert alert-success ">
                          <span>{{session('sucess')}}</span>
                        </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">
                      <span>{{session('error')}}</span>
                    </div>
                    @else
                        
                    @endif
                  <form class="mx-1 mx-md-4" id="loginform" method="POST" action= {{url('/login')}}>
                    @csrf
                    {{-- <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example1c">Your Name</label>
                        <input type="text" id="form3Example1c" name="u_name" class="form-control" />
                      </div>
                    </div> --}}
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email"  name="email" class="form-control" />
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" name="password" class="form-control" />
                      </div>
                    </div>
  
                    {{-- <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4cd" class="form-control" />
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      </div>
                    </div> --}}
  
                    {{-- <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                      <label class="form-check-label" for="form2Example3">
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div> --}}
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">Login</button>
                    </div>
  
                  </form>
  
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\LoginRequest', "#loginform") !!}

@endpush