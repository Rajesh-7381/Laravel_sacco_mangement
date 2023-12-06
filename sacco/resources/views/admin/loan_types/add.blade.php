@extends('admin.layouts.app')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Loan Type </h1>
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
              <form action="{{url('admin/loan_types/add')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="type_name" class="col-sm-2 col-form-label">type name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="type_name" id="type_name" required value="{{old('type_name')}}">
                  </div>
                <div class="row mb-3">
                  <label for="description" class="col-sm-2 col-form-label">Description </label>
                  <div class="col-sm-10" >
                    <textarea  class="form-control" name="description" id="description"></textarea>
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