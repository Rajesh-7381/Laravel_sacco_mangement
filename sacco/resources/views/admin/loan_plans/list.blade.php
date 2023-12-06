@extends('admin.layouts.app')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Loan Plans</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Loans</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="{{url('admin/loan_plans/add')}}" class="btn btn-primary">Add Loan</a></h5>
              @include('message')
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead> 
                  <tr>
                    <th scope="col">#</th>
                    
                    <th scope="col">Type Name</th>
                    <th scope="col">create date </th>
                    
                   
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($getRecord as  $value)
                        
                   
                  <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>
                        <p>Years/Month:<b>{{$value->months}}</b></p>
                        <p>Intrest:<b>{{$value->intrest_percentage}} %</b></p>
                        <p>Over Due Penalty:<b>{{$value->penalty_rate}}</b></p>
                       </td>
                    <td>{{ date('d-m-Y',strtotime($value->created_at))}}</td>
                    
                    <td>
                      <a href="{{ url('admin/loan_plans/edit/' . $value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                      <a onclick="return confirm('Are you sure you want to delete it?')" class="btn btn-danger" href="{{ url('admin/loan_plans/delete/' . $value->id) }}"><i class="bi bi-trash"></i></a>
                      </td>
                    
                  </tr>
                  @endforeach
             
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection