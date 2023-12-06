@extends('admin.layouts.app')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Loan user</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Loans</li>
          <li class="breadcrumb-item active">user</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              {{-- <h5 class="card-title"><a href="{{url('admin/loan/add')}}" class="btn btn-primary">Add new Loan Application</a></h5> --}}
              @include('message')
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead> 
                  <tr>
                    <th scope="col">#</th>
                    
                    <th scope="col">User Name</th>
                    {{-- <th scope="col">Staff Name</th> --}}
                    <th scope="col">Loan Type Name</th>
                    <th scope="col">Loan plan </th>
                    <th scope="col">Loan amount </th>
                    <th scope="col">purpose</th>
                    <th scope="col">create date </th>
                    <th scope="col">update date </th>                                   
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($getRecord2 as  $value)
                        
                   
                  <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>{{$value->name}} {{$value->lastname}} {{$value->surename}}</td>
                    <td>{{$value->type_name}}</td>
                    {{-- <td>{{$value->loan_types_id}}</td> --}}
                    <td>{{$value->months}}</td>
                    <td>{{$value->loan_amount}}</td>
                    <td>{{$value->purpose}}</td>
                    <td>{{ date('d-m-Y',strtotime($value->created_at))}}</td>
                    <td>{{ date('d-m-Y',strtotime($value->updated_at))}}</td>
                    <td>
                      {{-- <a href="{{ url('admin/loan/edit/' . $value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a> --}}
                      <a onclick="return confirm('Are you sure you want to delete it?')" class="btn btn-danger" href="{{ url('staff/loan_user/delete/' . $value->id) }}"><i class="bi bi-trash"></i></a>
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