            
                
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="{{ route('dean.Dashboard') }}">Dashboard</a></li>
              </ul>
            </li>

           

            
            @if(!empty($sidbar['rights']))
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Header Name</span></a><!-- this will be Category --> 
              <ul class="dropdown-menu">
                @foreach($sidbar['rights'] as $rights)
                <li><a class="nav-link" href="{{ $rights->module->URL }}">{{ $rights->module->ModuleName }}</a></li>
                @endforeach
                
              </ul>
            </li>
            @endif
            
                
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Module</span></a><!-- this will be Category --> 
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.Modules') }}">Add Modules</a></li>
                <li><a class="nav-link" href="{{ route('all.Modules') }}">All Modules</a></li>
              </ul>
            </li>

             <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Std Scholar Ship</span></a><!-- this will be Category --> 
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.StdScholarShips') }}">Add Std Scholar Ships</a></li>
                <li><a class="nav-link" href="{{ route('all.StdScholarShips') }}">All Std Scholar Ships</a></li>
              </ul>
            </li>
                 
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>User Right</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.UserRights') }}">Add UserRights</a></li>
                <li><a class="nav-link" href="{{ route('all.UserRights') }}">All UserRights</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Courses</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.Courses') }}">Add Courses</a></li>
                <li><a class="nav-link" href="{{ route('all.Courses') }}">All Courses</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Degrees</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.Degree') }}">Add Degree</a></li>
                <li><a class="nav-link" href="{{ route('all.Degrees') }}">All Degree</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Department</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.Department') }}">Add Department</a></li>
                <li><a class="nav-link" href="{{ route('all.Departments') }}">All Department</a></li>
                
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Designation</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.Designation') }}">Add Designation</a></li>
                <li><a class="nav-link" href="{{ route('all.Designations') }}">All Designation</a></li> 
                <li><a class="nav-link" href="{{ route('set.EmpDesignation') }}">Set Emp Designation</a></li>
                <li><a class="nav-link" href="{{ route('all.EmpDesignations') }}">All Emp Designation</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Semester</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.Semester') }}">Add Semester</a></li>
                <li><a class="nav-link" href="{{ route('all.Semesters') }}">All Semester</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Semester Courses</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.SemesterCourses') }}">Add Semester Courses</a></li>
                <li><a class="nav-link" href="{{ route('all.SemesterCourses') }}">All Semester Courses</a></li>
                
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Semester Details</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.SemesterDetails') }}">Add Semester Detail</a></li>
                <li><a class="nav-link" href="{{ route('all.SemesterDetails') }}">All Semester Detail</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Degree Batches</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.DegreeBatch') }}">Add Degree Courses</a></li>
                <li><a class="nav-link" href="{{ route('all.DegreeBatchs') }}">All Degree Courses</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Employees</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.Employee') }}">Add  Employee</a></li>
                <li><a class="nav-link" href="{{ route('all.Employees') }}">All Emplyees</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Student Admission</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.StudentAdmissions') }}">Add Student Admission</a></li>
                <li><a class="nav-link" href="{{ route('all.StudentAdmissions') }}">All Student Admission</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Time Table</span></a>
              <ul class="dropdown-menu">
                <!-- <li><a class="nav-link" href="{{ route('add.TimeTable') }}">Add Time Table</a></li> -->
                <li><a class="nav-link" href="{{ route('all.TimeTables') }}">All Time Table</a></li>
                
              </ul>
            </li>
           <!--  <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Student Marks</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.StudentMark') }}">Add Marks</a></li>
                <li><a class="nav-link" href="{{ route('all.StudentMarks') }}">All Marks</a></li>
                
              </ul>
            </li> -->
             <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Std Roll No Slips </span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('add.StdRollNoSlips') }}">Add Std Roll No Slips</a></li>
                <li><a class="nav-link" href="{{ route('all.StdRollNoSlips') }}">All Std Roll No Slips</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Attendance</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('emp.SemesterCourses') }}">Add Attendance</a></li>
                 
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Assign Course</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('course.Offering') }}">Course Offering</a></li>
                 
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Enrollments</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('all.Enrollments') }}">All Enrollment</a></li>
                
                
              </ul>
            </li> 
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Dean</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('dean.Dashboard') }}">Dashboard</a></li>
                <li><a class="nav-link" href="{{ route('attandence.Dashboard') }}">All Student Attendence</a></li>
                 <li><a class="nav-link" href="{{ route('dean.All.Stu.Attandence') }}">Attendance</a></li>
                
              </ul>
            </li>
           <!--  <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Challans</span></a>
              <ul class="dropdown-menu">
                
                <li><a class="nav-link" href="{{ route('all.Challans') }}">All Challans</a></li>
                 
              </ul>
            </li> -->

            
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Views</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('vc.View') }}">Vc View</a></li>
                <li><a class="nav-link" href="{{ route('igrade.StudentView') }}">Igrade Student View</a></li>
                 <li><a class="nav-link" href="{{ route('igrade.StdDean') }}">Igrade Student Dean View</a></li>
                 <li><a class="nav-link" href="{{ route('dean.All.Stu.Attandence') }}">Attendance</a></li>
                <li><a class="nav-link" href="{{ route('exam.dasshboardView')}}">Exam Dashboard View</a></li>
                 <li><a class="nav-link" href="{{ route('igrade.StdhodView')}}">Igrade Std hod View</a></li>
                 <li><a class="nav-link" href="{{ route('student.365View')}}">Student 365 View</a></li>
                 <li><a class="nav-link" href="{{ route('reporting.Panel')}}">Reporting Panel View</a></li>
                  <li><a class="nav-link" href="{{ route('section.WIse.Report')}}">Section Wise Report View</a></li>
                  <li><a class="nav-link" href="{{ route('exam.Main.Dashboard.View')}}">Exam Main Dashboard View</a></li>
                  <li><a class="nav-link" href="{{ route('ceo.Dashboard')}}">CEO Dashboard</a></li>
                  <li><a class="nav-link" href="{{ route('student.Result')}}">Student Result</a></li>
                  <li><a class="nav-link" href="{{ route('std.Wise.Award')}}">Student Wise Award</a></li> 
                  <li><a class="nav-link" href="{{ route('std.Affairs')}}">Std Affairs</a></li>
                 <li><a class="nav-link" href="{{ route('reports')}}">Reports</a></li>
                 <li><a class="nav-link" href="{{ route('assessment.Detail')}}">Assessment Detail</a></li>
                 <li><a class="nav-link" href="{{ route('finance.Dashboard')}}">Finance Dashboard</a></li>
                 <li><a class="nav-link" href="{{ route('audit.Report')}}">Audit Report</a></li>
                 <li><a class="nav-link" href="{{ route('student.Ledger')}}">Student Ledger</a></li>
                 <li><a class="nav-link" href="{{ route('admission.Dashboard')}}">Admission Dashboard</a></li>
                 <li><a class="nav-link" href="{{ route('exam.Seating')}}">Exam Seattings</a></li>
                 <li><a class="nav-link" href="{{ route('student.Balance')}}">Student Balance</a></li>
                  <li><a class="nav-link" href="{{ route('defualter.List')}}">Defualter List</a></li>
                  <li><a class="nav-link" href="{{ route('collection.Report')}}">Collection Report</a></li>
                  <li><a class="nav-link" href="{{ route('subject.Wise.Student.Count')}}">Subject Wise Student Count</a></li>
                  <li><a class="nav-link" href="{{ route('igrade.Defualter')}}">Igrade Defualter</a></li>
                  <li><a class="nav-link" href="{{ route('fee.Rescheduling')}}">Fee Rescheduling</a></li>
                  <li><a class="nav-link" href="{{ route('tax.Report')}}">Tax Report</a></li>
                  <li><a class="nav-link" href="{{ route('ledger')}}">Ledger</a></li>
                  
              </ul>
              
            </li>











          </ul>
       
