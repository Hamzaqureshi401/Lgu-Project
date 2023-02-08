             @if(!empty($sidbar['rights']))
            <!-- <li class="dropdown">
             -->
             <li>
              <!-- <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Header Name</span></a> --><!-- this will be Category --> 
              <!-- <ul class="dropdown-menu"> -->
                <ul>
                @foreach($sidbar['rights'] as $rights)
                <li><a class="nav-link" href="{{ $rights->module->URL }}">{{ $rights->module->ModuleName }}</a></li>
                @endforeach
                
              </ul>
            </li>
            @endif

            

            
          
