@extends('admin.layouts.app')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>View Staff </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Staff</li>
          <li class="breadcrumb-item active">add</li>
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
              <form action="{{url('admin/staff/edit/'.$getRecord->id)}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">first name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" readonly required value="{{$getRecord->name}}">
                  </div>
                <div class="row mb-3">
                  <label for="lastname" class="col-sm-2 col-form-label">last name</label>
                  <div class="col-sm-10" >
                    <input type="text" class="form-control" name="lastname" id="lastname" readonly value="{{$getRecord->lastname}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="surename" class="col-sm-2 col-form-label">surename</label>
                  <div class="col-sm-10" >
                    <input type="text" class="form-control" name="surename" id="surename" readonly value="{{$getRecord->surename}}" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" readonly name="email" id="email" readonly value="{{$getRecord->email}}">
                  </div>
                  <span style="color: red">{{ $errors->first('email')}}</span>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">password <span style="color: red">* </span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly name="password" id="password" value="{{$getRecord->password}}">
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
                            maxlength="10" required  readonly value="{{$getRecord->mobile_number}}"
                        >
                    </div>
                </div>
                              
                <div class="row mb-3">
                  <label for="profile_image" class="col-sm-2 col-form-label">profile Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="profile_image" name="profile_image">
                    @if(!empty($getRecord->getprofileImage()))
                    <img src="{{$getRecord->getprofileImage()}}" readonly alt="" height="50px" width="50px">
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="bdo_date" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" readonly name="bdo_date" id="bdo_date" value="{{$getRecord->bdo_date}}">
                  </div>
                </div>
              

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example"  name="is_role" required>
                      <option selected>Open this select Role menu</option>
                      <option readonly  {{($getRecord->is_role == '0') ? 'selected' : ''}} value="0">Staff</option>
                      <option readonly {{($getRecord->is_role == '1') ? 'selected' : ''}} value="1">Admin</option>
                      
                    </select>
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