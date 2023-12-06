@extends('admin.layouts.app')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Upadet  Logo </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item active">logo and aname</li>
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
              <form action="{{ url('admin/logo_update') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Logo Name <span style="color: red">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" required value="{{ $getRecord->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="logo" class="col-sm-2 col-form-label">Logo Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="logo" name="logo">
                    </div>
                </div>
                
                @if(!empty($getRecord->logo))
                    <div class="row mb-3">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <img src="{{ asset('assets/upload/logo/' . $getRecord->logo) }}" alt="Logo Image" height="100px" width="100px">
                        </div>
                    </div>
                @endif
               
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
            <!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->
@endsection