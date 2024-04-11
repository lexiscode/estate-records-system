<div class="navbar-bg"></div>

<!-- Navbar starts -->
@include('web.backend.layouts.navbar')
<!-- Navbar ends -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Estatelex</a>
            {{-- <a href="{{ route('view.home') }}"><img src={{ asset('users/images/logo.png') }} alt="Realestate"></a> --}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">E-LEX</a>
        </div>
        <ul class="sidebar-menu">

            <li class="dropdown">
                <li class="{{ setSidebarActive(['dashboard.*']) }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
            </li>

            <li class="menu-header">Manage Rent Records</li>
            @php
            $dropdownActiveClass = setSidebarActive(['remit.*', 'statement.*']);
            @endphp
            <li class="dropdown {{ $dropdownActiveClass ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-receipt"></i>
                    <span>Manage Rent Records</span></a>
                <ul class="dropdown-menu">
                    @if (hasPermission(['remittance index', 'remittance create', 'remittance show', 'remittance update', 'remittance delete']))
                    <li class="{{ setSidebarActive(['remit.*']) }}"><a class="nav-link" href="{{ route('remit.index') }}"><i class="fas fa-file-invoice-dollar"></i> <span>Remittance</span></a></li>
                    @endif
                    @if (hasPermission(['statement index', 'statement generatePDF', ]))
                    <li class="{{ setSidebarActive(['statement.*']) }}"><a class="nav-link" href="{{ route('statement.index') }}"><i class="fas fa-file-invoice"></i> <span>Statements</span></a></li>
                    @endif
                </ul>
            </li>

            <li class="menu-header">All Tenant Info</li>
            <li class="dropdown">
                @if (hasPermission(['tenant index', 'tenant create', 'tenant show', 'tenant update', 'tenant delete']))
                <li class="{{ setSidebarActive(['tenants.*']) }}">
                <a href="{{ route('tenant.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Register A Tenant</span></a>
                </li>
                @endif
            </li>

            <li class="menu-header">Service Charge Records</li>
            <li class="dropdown">
                @if (hasPermission(['service-charge index', 'service-charge create', 'service-charge update', 'service-charge delete']))
                <li class="{{ setSidebarActive(['service-charge.*']) }}">
                <a href="{{ route('service-charge.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Service Charge</span></a>
                </li>
                @endif
            </li>

            <li class="menu-header">Tenants History</li>
            <li class="dropdown">
                @if (hasPermission(['tenant-history index', 'tenant-history show']))
                <li class="{{ setSidebarActive(['tenant-history.*']) }}">
                <a href="{{ route('tenant-history.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Tenant History</span></a>
                </li>
                @endif
            </li>

            <li class="menu-header">Roles & Permissions</li>
            @php
            $dropdownActiveClass = setSidebarActive(['role-user.*', 'role.*']);
            @endphp
            <li class="dropdown {{ $dropdownActiveClass ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-receipt"></i>
                    <span>Roles & Permissions</span></a>
                <ul class="dropdown-menu">
                    @if (hasPermission(['user-role index', 'user-role create', 'user-role update', 'user-role delete']))
                    <li class="{{ setSidebarActive(['role-user.*']) }}"><a class="nav-link" href="{{ route('role-user.index') }}"><i class="fas fa-user-shield"></i>Role Users</span></a></li>
                    @endif
                    @if (hasPermission(['role-permission index', 'role-permission create', 'role-permission update', 'role-permission delete']))
                    <li class="{{ setSidebarActive(['role.*']) }}"><a class="nav-link" href="{{ route('role.index') }}"><i class="fas fa-file-invoice"></i> <span>Set Permissions</span></a></li>
                    @endif
                </ul>
            </li>

        </ul>
    </aside>
</div>

