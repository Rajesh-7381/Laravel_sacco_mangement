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
              <h5 class="card-title">New Loan Application</h5>
              

              <!-- General Form Elements -->
              <form action="{{url('admin/loan/add')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">loan user </label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" name="user_id" required>
                        <option selected>--select loan user--</option>
                        @foreach($getLoanUser as $key => $value_3)
                          <option value="{{$value_3->id}}">{{$value_3->first_name}} {{$value_3->middle_name}} {{$value_3->last_name}}</option>
                        @endforeach
                      
                      </select>
                    </div>
                  </div>
                
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"> Staff Name </label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="staff_id" required>
                            <option selected>--select staff name --</option>
                            @foreach($getStaff as $key => $value_4)
                                <option value="{{ $value_4->id }}">{{ $value_4->name }} {{ $value_4->last_name }} {{ $value_4->surename }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Loan types </label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="loan_types_id" required>
                            <option selected>--select loan types--</option>
                            @foreach($getLoanTypes as $key => $value_11)
                                <option value="{{ $value_11->id }}">{{ $value_11->type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

               
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Loan plans </label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" name="loan_plan_id" required>
                        <option selected>--select Loan Plan--</option>
                        @foreach($getLoanPlans as  $value_2)
                            <option value="{{$value_2->id}}">{{$value_2->months}} [{{$value_2->intrest_percentage .'%'.  $value_2->penalty_rate }} ]</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
  
         
                <div class="row mb-3">
                    <label for="loan_amount" class="col-sm-2 col-form-label">loan amount</label>
                    <div class="col-sm-10">
                        <input 
                            type="number" 
                            class="form-control" 
                            name="loan_amount" 
                            id="loan_amount" 
                            oninput="javascript:this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length > this.maxLength) this.value=this.value.slice(0,this.maxLength);" 
                            maxlength="10" required  value="{{old('loan_amount')}}"
                        >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="purpose" class="col-sm-2 col-form-label">purpose </label>
                    <div class="col-sm-10">
                        <input 
                            type="tel" 
                            class="form-control" 
                            name="purpose" 
                            id="purpose" 
                             required  value="{{old('purpose')}}"
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