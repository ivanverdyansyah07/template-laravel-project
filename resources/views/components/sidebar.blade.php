<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">System GYM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ Request::is('schedule*') ? 'active' : '' }}">
        <a class="nav-link" href="/schedule">
            <i class="fa-solid fa-calendar-days"></i>
            <span>Trainer Schedule</span></a>
    </li>

    @if (auth()->user()->role == 'admin')
        <li
            class="nav-item {{ Request::is('staff*') || Request::is('member/*') || Request::is('member') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                aria-expanded="true" aria-controls="collapseUsers">
                <i class="fa-solid fa-user-tie"></i>
                <span>Users</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Another Users:</h6>
                    <a class="collapse-item" href="/staff">Staff</a>
                    <a class="collapse-item" href="/member">Members</a>
                </div>
            </div>
        </li>

        <li
            class="nav-item {{ (Request::is('membership*') || Request::is('benefit*') ? 'active' : '' || Request::is('request-member*')) ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMembership"
                aria-expanded="true" aria-controls="collapseMembership">
                <i class="fa-solid fa-dumbbell"></i>
                <span>Membership</span>
            </a>
            <div id="collapseMembership" class="collapse" aria-labelledby="headingMembership"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Membership:</h6>
                    <a class="collapse-item" href="/membership">Membership</a>
                    <a class="collapse-item" href="/benefit">Benefit</a>
                    <a class="collapse-item" href="/request-member">Request Member</a>
                </div>
            </div>
        </li>

        <li class="nav-item {{ Request::is('featured*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSection"
                aria-expanded="true" aria-controls="collapseSection">
                <i class="fa-solid fa-wrench"></i>
                <span>Data Section</span>
            </a>
            <div id="collapseSection" class="collapse" aria-labelledby="headingSection" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Data Section:</h6>
                    <a class="collapse-item" href="/featured">Featured</a>
                </div>
            </div>
        </li>

        <li class="nav-item {{ Request::is('rent') ? 'active' : '' }}">
            <a class="nav-link" href="/rent">
                <i class="fa-solid fa-handshake-angle"></i>
                <span>Rent Towel & Locker</span></a>
        </li>
    @elseif(auth()->user()->role == 'member')
        <li class="nav-item {{ Request::is('pricing-membership') ? 'active' : '' }}">
            <a class="nav-link" href="/pricing-membership">
                <i class="fa-solid fa-users-between-lines"></i>
                <span>Membership</span></a>
        </li>
    @endif

    <li class="nav-item {{ Request::is('report*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
            aria-expanded="true" aria-controls="collapseReport">
            <i class="fa-solid fa-file-invoice"></i>
            <span>Report</span>
        </a>
        <div id="collapseReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Another Report:</h6>
                <a class="collapse-item" href="/report-membership">Report Membership</a>
                <a class="collapse-item" href="/report-schedule">Report Schedule</a>
                <a class="collapse-item" href="/report-towel">Report Towel</a>
                <a class="collapse-item" href="/report-locker">Report Locker</a>
            </div>
        </div>
    </li>
</ul>
<!-- End of Sidebar -->
