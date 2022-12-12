@push('dashboard_name')
    <li><a href="#" class="nav-link text-dark nav-link-lg fullscreen-btn">
            <p>STUDENT DASHBOARD</p>
        </a></li>
@endpush



@push('leftmenu')
<ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
        <a href="#" class="nav-link"><span>Dashboard</span></a>
    </li>

    <li class="dropdown">
        <a href="{{url('/')}}" class="nav-link"><span>Student </span></a>
    </li>

</ul>
@endpush

@include('inculdes.Header')
<!-- Main Content -->
<div class="main-content">
    <div class="div">
        <h4 style="margin-top:0px">
            {{session()->get('Std_FName') }}
            {{ session()->get('user') }}

        </h4>

    </div>




</div>

@include('inculdes.Footer')
@include('inculdes.Footer_resourses')
