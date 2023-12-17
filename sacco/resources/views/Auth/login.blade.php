@extends('layouts.app')
@section('content')
<div class="card mb-3">
    
  <div class="card-body">

    <div class="pt-4 pb-2">
      <h5 class="card-title text-center pb-0 fs-4">Login here!</h5>
      <p class="text-center small">Login Details</p>
      @include('message')
    </div>

                  <form class="row g-3 needs-validation" novalidate  action="{{url('login_post')}}">

                    <div class="col-12">
                      <label for="email" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" required autocomplete="username">
                        <span style="color: red">{{$errors->first('email')}}</span>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required autocomplete="current-password">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    {{-- <div class="col-12">
                      <a href="{{ url('auth/google') }}" style="margin-top: 0px !important;background: green;color: #ffffff;padding: 5px;border-radius:7px;" class="ml-2">
                        <strong>google Login</strong>
                    </a> --}}
                    
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{url('register')}}">Create an account</a></p>
                      <p class="small mb-0"> <a href="{{url('forgot')}}">forgot password</a></p>
                    </div>
                  </form>

                </div>
              </div>

              

              @endsection