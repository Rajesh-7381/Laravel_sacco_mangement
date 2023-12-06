 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      @if(Auth::user()->is_role=='1')

      <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2) == 'dashboard') @else collapsed @endif" href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

       <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2) == 'staff') @else collapsed @endif" href="{{url('admin/staff/list')}}">
          <i class="bi bi-person"></i>
          <span>Staff</span>
        </a>
      </li>
      <!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan_types') active @else collapsed @endif" href="{{ url('admin/loan_types/list') }}">
            <i class="bi bi-journal-text"></i>
            <span>Loan Types</span>
        </a>
    </li>
    
      <!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan_plans') active @else collapsed @endif" href="{{ url('admin/loan_plans/list') }}">
            <i class="bi bi-cash"></i>
            <span>Loan Plans</span>
        </a>
    </li>
    
      <!-- End Contact Page Nav -->
 
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan') @else collapsed @endif" href="{{url('admin/loan/index')}}">
          <i class="bi bi-bar-chart"></i>
          <span>Loan</span>
        </a>
      </li>
      <!-- End Register Page Nav -->

       <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan_user') @else collapsed @endif" href="{{url('admin/loan_user/index')}}">
          <i class="bi bi-gem"></i>
          <span>Loan User</span>
        </a>
      </li>
      <!-- End Login Page Nav -->

       <li class="nav-item">
        <a class="nav-link @if (Request::segment(2)=='profile') @else collapsed @endif" href="{{url('admin/profile')}}">
          <i class="bi bi-dash-circle"></i>
          <span>Profile </span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link @if (Request::segment(2)=='logo') @else collapsed @endif" href="{{url('admin/logo')}}">
          <i class="bi bi-card-image"></i>
          <span>Logo </span>
        </a>
      </li>
      <!-- End Error 404 Page Nav -->

       <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li>
      <!-- End Blank Page Nav -->
      @endif






      @if(Auth::user()->is_role=='0')
      <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2) == 'dashboard') @else collapsed @endif" href="{{url('staff/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2) == 'loan_user') @else collapsed @endif" href="{{url('staff/loan_user/list')}}">
          <i class="bi bi-gem"></i>
          <span>Loan User</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link @if (Request::segment(2)=='profile') @else collapsed @endif" href="{{url('staff/profile')}}">
          <i class="bi bi-dash-circle"></i>
          <span>Profile </span>
        </a>
      </li>
      @endif

    </ul>

  </aside><!-- End Sidebar-->