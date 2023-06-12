<div class="sidebar-content">
    <div class='sidebar-title text-muted text-center pt-3 pb-2 border-bottom d-flex align-items-center'>
        <h5>Sidebar</h5>
        <div class="sidebar-btn ms-auto"><i class="bi bi-list"></i></div>
    </div>
    <ul class='list-unstyled text-light sidebar-list p-0 m-0'>

        @if(Request::path()=='admin')
        <a href="{{url('/admin')}}">
            <li class='sidebar-item text-dark' style="background-color:#FFDE50"> <i class="icon bi bi-card-list"></i> start </li>
        </a>
        @else
        <a  href="{{url('/admin')}}" style="background-color:#FFDE50">
            <li class='sidebar-item'> <i class="icon bi bi-card-list"></i>start </li>
        </a>
        @endif
        @if(Request::path()=='admin/appointments')
        <a href="{{url('/admin/appointments')}}" style="background-color:#FFDE50">
            <li class='sidebar-item text-dark' style="background-color:#FFDE50"> <i class="icon bi bi-calendar3"></i> Appointment</li>
        </a>
        @else
        <a href="{{url('/admin/appointments')}}">
            <li class='sidebar-item'> <i class="icon bi bi-calendar3"></i> Appointment</li>
        </a>
        @endif

        @if(Request::path()=='admin/clients')
        <a href="{{url('/admin/clients')}}" style="background-color:#FFDE50">
            <li class='sidebar-item text-dark' style="background-color:#FFDE50"> <i class="icon bi bi-file-earmark-text"></i> clients</li>
        </a>
        @else
        <a href="{{url('/admin/clients')}}">
            <li class='sidebar-item'> <i class="icon bi bi-file-earmark-text"></i> clients </li>
        </a>
        @endif

        @if(Request::path()=='admin/numbers')
        <a href="{{url('/admin/numbers')}}" style="background-color:#FFDE50">
            <li class='sidebar-item text-dark' style="background-color:#FFDE50"> <i class="icon bi bi-journal-bookmark-fill"></i> numbers</li>
        </a>
        @else
        <a href="{{url('/admin/numbers')}}">
            <li class='sidebar-item'> <i class="icon bi bi-journal-bookmark-fill"></i> numbers </li>
        </a>
        @endif

        @if(Request::path()=='admin/employees')
        <a href="{{url('/admin/employees')}}" style="background-color:#FFDE50">
            <li class='sidebar-item text-dark' style="background-color:#FFDE50"> <i class="icon bi bi-person-lines-fill"></i> employees</li>
        </a>
        @else
        <a href="{{url('/admin/employees')}}">
            <li class='sidebar-item'> <i class="icon bi bi-person-lines-fill"></i> employees </li>
        </a>
        @endif

        @if(Request::path()=='admin/sessions')
        <a href="{{url('/admin/sessions')}}" style="background-color:#FFDE50">
            <li class='sidebar-item text-dark' style="background-color:#FFDE50"> <i class="icon bi bi-card-list"></i> sessions</li>
        </a>
        @else
        <a href="{{url('/admin/sessions')}}">
            <li class='sidebar-item'> <i class="icon bi bi-card-list"></i> sessions </li>
        </a>
        @endif

    </ul>
</div>
