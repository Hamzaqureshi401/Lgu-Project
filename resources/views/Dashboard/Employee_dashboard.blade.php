@push('dashboard_name')
    <li><a href="#" class="nav-link text-dark nav-link-lg fullscreen-btn">
            <p>EMPLOYEE DASHBOARD</p>
        </a></li>
@endpush
@push('leftmenu')
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown">
            <a href="index.html" class="nav-link"><span>Dashboard</span></a>
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
</div>

@include('inculdes.Footer')
@include('inculdes.Footer_resourses')

