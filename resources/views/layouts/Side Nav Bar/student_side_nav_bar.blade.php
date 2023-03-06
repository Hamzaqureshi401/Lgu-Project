           
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('student.Dashboard') }}">Dashboard</a></li>
              </ul>
            </li> 
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Enrollment</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.Enrollment') }}">Add Enrollment</a></li>
              </ul>
            </li>
          
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Challans</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('all.Challans') }}">All Challans</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Roll No Slip</span></a>
              <ul class="dropdown-menu">
                {{-- <li><a class="nav-link" href="{{ route('all.Challans') }}">Roll No Slip</a> --}}
                </li><li><a class="nav-link" href="{{ route('get.Student.Roll.No.Slip') }}">Get Roll No Slip</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Apply I-Grade</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('all.Igrades') }}">Apply I-Grade</a></li>
              </ul>
            </li>

            

            
          
