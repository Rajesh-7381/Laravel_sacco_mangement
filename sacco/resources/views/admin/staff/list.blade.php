@extends('admin.layouts.app')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="{{url('admin/staff/add')}}" class="btn btn-primary">Add Staff</a></h5>
              @include('message')
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">SureName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Is Role</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($getRecord as  $value)
                        
                   
                  <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->lastname }}</td>
                    <td>{{ $value->surename }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ !empty($value->is_role) ? 'Admin':'Staff' }}</td>
                    <td>{{ date('d-m-Y',strtotime($value->created_at))}}</td>
                    <td>
                      <a href="{{ url('admin/staff/view_staff/' . $value->id) }}" class="btn btn-warning"><i class="bi bi-eye"></i></a>
                      <a href="{{ url('admin/staff/edit/' . $value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                      <a onclick="return confirm('Are you sure you want to delete it?')" class="btn btn-danger" href="{{ url('admin/staff/delete/' . $value->id) }}"><i class="bi bi-trash"></i></a>
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