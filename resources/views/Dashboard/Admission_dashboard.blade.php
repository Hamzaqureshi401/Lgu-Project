


@push('dashboard_name')
<li><a href="#" class="nav-link text-dark nav-link-lg fullscreen-btn">
        <p>ADDMISSION DASHBOARD</p>
    </a></li>
@endpush

@push('leftmenu')
<ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
        <a href="#" class="nav-link"><span>Dashboard</span></a>
    </li>

    <li class="dropdown">
        <a href="{{url('/')}}/Addmision_student_info" class="nav-link"><span>Student Info</span></a>
    </li>

</ul>
@endpush


@include('inculdes.Header')
<!-- Main Content -->
<div class="main-content">
<div class="div">
    <h4 style="margin-top:0px">
         {{session()->get('Designation')}}

    </h4>

</div>





