<ul class="metismenu" id="menu-bar">
    <li class="menu-title">Navigation</li>

    <li>
        <a href="{{ route('admin.dashboard')  }}">
            <i data-feather="home"></i>
            <!-- <span class="badge badge-success float-right">1</span> -->
            <span> Dashboard </span>
        </a>
    </li>


    <li class="">
        <a href="javascript: void(0);" aria-expanded="false" class="mm-collapsed">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> -->
            <span>   Services </span>
            <span class="menu-arrow"></span>
        </a>

        <ul class="nav-second-level mm-collapse" aria-expanded="false" style="">
            <li>
                <a href="{{ route('admin.categories.index')  }}">
                    <!-- <i data-feather="profile"></i> -->
                    <span> Categories </span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.services.index')  }}">
                    <!-- <i data-feather="profile"></i> -->
                    <span> Services </span>
                </a>
            </li>


        </ul>
    </li>



    <li class="">
        <a href="javascript: void(0);" aria-expanded="false" class="mm-collapsed">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> -->
            <span> Appointments </span>
            <span class="menu-arrow"></span>
        </a>

        <ul class="nav-second-level mm-collapse" aria-expanded="false" style="">
            <li>
            <a href="{{ route('admin.appointments.create')  }}"> Add Appointment </a>
            </li>

            <li>
            <a href="{{ route('admin.appointments.index')  }}"> All Appointment </a>
            </li>
            
            <li>
            <a href="{{ route('admin.appointments.pending')  }}"> In-Process Appointment </a>
            </li>
            
            <li>
            <a href="{{ route('admin.appointments.requested')  }}"> Requested Appointment </a>
            </li>
        </ul>
    </li>

    <li class="">
        <a href="javascript: void(0);" aria-expanded="false" class="mm-collapsed">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> -->
            <span>  Users </span>
            <span class="menu-arrow"></span>
        </a>

        <ul class="nav-second-level mm-collapse" aria-expanded="false" style="">
            <li>
                <a href="{{ route('admin.users.index')  }}"> All Users </a>
            </li>
            
            <li>
                <a href="{{ route('admin.users.pending')  }}"> Pending Requests </a>
            </li>
        </ul>
    </li>


</ul>
