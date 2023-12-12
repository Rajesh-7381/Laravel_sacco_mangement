@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="card mb-3">

  <div class="card-body">

    <div class="pt-4 pb-2">
      <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
      <p class="text-center small">Enter your personal details to create account</p>
    </div>

    <form class="row g-3 needs-validation" novalidate action="{{url('register_post')}}" >
      {{ csrf_field() }}
      <div class="col-12">
        <label for="name" class="form-label">enter your Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" required>
        <span style="color: red">{{$errors->first('name')}}</span>
        <div class="invalid-feedback">Please, enter your name!</div>
      </div>
      <div class="col-12">
        <label for="lastname" class="form-label">Your Last Name</label>
        <input type="text" name="lastname" class="form-control" id="lastname" value="{{old('lastname')}}" required>
        <span style="color: red">{{$errors->first('lastname')}}</span>
        <div class="invalid-feedback">Please, enter your Last name!</div>
      </div>

      <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
          <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" required autocomplete="username">
          <br>
          <span style="color: red">{{$errors->first('email')}}</span>
          <div class="invalid-feedback">enter your email</div>
        </div>
      </div>

      <div class="col-12">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password">

        <span style="color: red">{{$errors->first('password')}}</span>
        <div class="invalid-feedback">Please enter your password!</div>
      </div>

      {{-- <div class="col-12">
        <label for="password" class="form-label"></label>
        <strong>google recaptcha</strong>
        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}
      </div> --}}

      <div class="form-group mt-4 mb-4">
        <div class="captcha">
            <span>{!! captcha_img('math') !!}</span>
            <button type="button" class="btn btn-danger" class="reload" id="reload">
                &#x21bb;
            </button>
        </div>
    </div>
    <div class="form-group mb-4">
        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
        <span style="color: red">{{$errors->first('captcha')}}</span>
        <div class="invalid-feedback">Please, enter your Last name!</div>
    </div>

      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
          <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and
              conditions</a></label>
          <div class="invalid-feedback">You must agree before submitting.</div>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Create Account</button>
      </div>
      <div class="col-12">
        <p class="small mb-0">Already have an account? <a href="{{url('/')}}">Log in</a></p>
      </div>
    </form>

  </div>
</div>

<script type="text/javascript">
  $('#reload').click(function () {
      $.ajax({
          type: 'GET',
          url: 'reload-captcha',
          success: function (data) {
              $(".captcha span").html(data.captcha);
          }
      });
  });
</script>
@endsection