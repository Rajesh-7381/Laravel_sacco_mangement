@extends('admin.layouts.app')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add profile </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>
              

              <!-- General Form Elements -->
              <form action="{{url('staff/profile_update')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">first name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" required value="{{ $getRecord->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="lastname" class="col-sm-2 col-form-label">last name</label>
                  <div class="col-sm-10" >
                    <input type="text" class="form-control" name="lastname" id="lastname" value="{{$getRecord->lastname}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="surename" class="col-sm-2 col-form-label">surename</label>
                  <div class="col-sm-10" >
                    <input type="text" class="form-control" name="surename" id="surename" value="{{$getRecord->surename}}" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" value="{{$getRecord->email}}">
                  </div>
                  <span style="color: red">{{ $errors->first('email')}}</span>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">password <span style="color: red">* </span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="password" id="password" value="{{$getRecord->password}}">
                  </div>
                  <span style="color: red">{{ $errors->first('password')}}</span>
                </div>
                <div class="row mb-3">
                    <label for="mobile_number" class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-10">
                        <input 
                            type="tel" 
                            class="form-control" 
                            name="mobile_number" 
                            id="mobile_number" 
                            oninput="javascript:this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength) this.value=this.value.slice(0,this.maxLength);" 
                            maxlength="10" required  value="{{$getRecord->mobile_number}}"
                        >
                    </div>
                </div>
                
               
                <div class="row mb-3">
                    <label for="profile_image" class="col-sm-2 col-form-label">Profile Upload</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="profile_image" name="profile_image">
                    </div>
                </div>
                
                @if(!empty($getRecord->profile_image))
                    <div class="row mb-3">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            {{-- insetead of function we use manually --}}
                            <img src="{{ asset('image/upload/profile/' . $getRecord->profile_image) }}" alt="Profile Image" width="100px" height="100px">
                        </div>
                    </div>
                @endif
                
                {{-- <div class="row mb-3">
                  <label for="bdo_date" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="bdo_date" id="bdo_date" value="{{$getRecord->bdo_date}}">
                  </div>
                </div> --}}
              
  
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update </button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->
@endsection