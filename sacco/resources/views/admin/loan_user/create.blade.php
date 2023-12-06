@extends('admin.layouts.app')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Loan </h1>
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
              <form action="{{url('admin/loan_user/add')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
              
             
                <div class="row mb-3">
                    <label for="first_name" class="col-sm-2 col-form-label">first name <span style="color: red">*</span></label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="first_name" 
                            id="first_name" 
                            required  value="{{old('first_name')}}" 
                        >
                    </div>
                    </div>
                <div class="row mb-3">
                    <label for="middle_name" class="col-sm-2 col-form-label"> middle name</label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="middle_name" 
                            id="middle_name" 
                            required  value="{{old('middle_name')}}"
                        >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="last_name" class="col-sm-2 col-form-label"> last name</label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="last_name" 
                            id="last_name" 
                            required  value="{{old('last_name')}}"
                        >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 col-form-label">address </label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="address" 
                            id="address" 
                             required  value="{{old('address')}}"
                        >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="contact" class="col-sm-2 col-form-label">contact </label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="contact" 
                            id="contact" 
                            oninput="javascript:this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength) this.value=this.value.slice(0,this.maxLength);" 
                            maxlength="10" required  value="{{old('contact')}}"
                        >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">email </label>
                    <div class="col-sm-10">
                        <input 
                            type="email" 
                            class="form-control" 
                            name="email" 
                            id="email" 
                             required  value="{{old('email')}}"
                        >
                        <span style="color: red">{{$errors->first('email')}}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tax_id" class="col-sm-2 col-form-label">Tax Id </label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="tax_id" 
                            id="tax_id" 
                             required  value="{{old('tax_id')}}"
                        >
                    </div>
                </div>
   
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"> </label>
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