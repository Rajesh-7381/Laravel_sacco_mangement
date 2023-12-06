@extends('admin.layouts.app')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Staff </h1>
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
              <form action="{{url('admin/staff/add')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">first name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" required value="{{old('name')}}">
                  </div>
                <div class="row mb-3">
                  <label for="lastname" class="col-sm-2 col-form-label">last name</label>
                  <div class="col-sm-10" >
                    <input type="text" class="form-control" name="lastname" id="lastname">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="surename" class="col-sm-2 col-form-label">surename</label>
                  <div class="col-sm-10" >
                    <input type="text" class="form-control" name="surename" id="surename" value="{{old('surename')}}" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email">
                  </div>
                  <span style="color: red">{{ $errors->first('email')}}</span>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">password <span style="color: red">* </span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="password" id="password">
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
                            maxlength="10" required  value="{{old('mobile_number')}}"
                        >
                    </div>
                </div>
                
               
                <div class="row mb-3">
                  <label for="profile_image" class="col-sm-2 col-form-label">profile Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="profile_image" name="profile_image">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="bdo_date" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="bdo_date" id="bdo_date">
                  </div>
                </div>
              
              

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="is_role" required>
                      <option selected>Open this select Role menu</option>
                      <option value="0">Staff</option>
                      <option value="1">Admin</option>
                      
                    </select>
                  </div>
                </div>

               

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit </button>
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