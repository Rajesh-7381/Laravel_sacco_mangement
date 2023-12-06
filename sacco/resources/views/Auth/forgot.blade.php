@extends('layouts.app')
@section('content')
<div class="card mb-3">

  <div class="card-body">

    <div class="pt-4 pb-2">
      <h5 class="card-title text-center pb-0 fs-4">forgot here!</h5>
      <p class="text-center small">forgot email or password</p>
    </div>
    @include('message')

    <form class="row g-3 needs-validation" novalidate action="{{url('forgot/post')}}">
      {{csrf_field()}}
      <div class="col-12">
        <label for="email" class="form-label">Username</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
          <input type="text" name="email" class="form-control" id="email" required>
          <div class="invalid-feedback">Please enter your email.</div>
        </div>
      </div>

      <div class="col-12">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
        
      </div>

      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Forgot</button>
      </div>
      <div class="col-12">
        <p class="small mb-0"> have account? <a href="{{url('/')}}">Login</a></p>
        <p class="small mb-0">Don't have account? <a href="{{url('register')}}">Create an account</a></p>

      </div>
    </form>

  </div>
</div>

@endsection