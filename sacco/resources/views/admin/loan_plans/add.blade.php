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
              <form action="{{url('admin/loan_plans/add')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
              
             
                <div class="row mb-3">
                    <label for="months" class="col-sm-2 col-form-label">Months</label>
                    <div class="col-sm-10">
                        <input 
                            type="tel" 
                            class="form-control" 
                            name="months" 
                            id="months" 
                            oninput="javascript:this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength) this.value=this.value.slice(0,this.maxLength);" 
                            maxlength="10" required  value="{{old('months')}}"
                        >
                    </div>
                    </div>
                <div class="row mb-3">
                    <label for="intrest_percentage" class="col-sm-2 col-form-label">Intrest Percentage</label>
                    <div class="col-sm-10">
                        <input 
                            type="tel" 
                            class="form-control" 
                            name="intrest_percentage" 
                            id="intrest_percentage" 
                            oninput="javascript:this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength) this.value=this.value.slice(0,this.maxLength);" 
                            maxlength="10" required  value="{{old('intrest_percentage')}}"
                        >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penalty_rate" class="col-sm-2 col-form-label">Intrest Percentage</label>
                    <div class="col-sm-10">
                        <input 
                            type="tel" 
                            class="form-control" 
                            name="penalty_rate" 
                            id="penalty_rate" 
                            oninput="javascript:this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength) this.value=this.value.slice(0,this.maxLength);" 
                            maxlength="10" required  value="{{old('penalty_rate')}}"
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