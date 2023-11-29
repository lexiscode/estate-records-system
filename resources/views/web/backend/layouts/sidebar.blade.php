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
                    <li class="{{ setSidebarActive(['remit.*']) }}"><a class="nav-link" href="{{ route('remit.index') }}"><i class="fas fa-file-invoice-dollar"></i> <span>Remittance</span></a></li>
                    <li class="{{ setSidebarActive(['statement.*']) }}"><a class="nav-link" href="{{ route('statement.index') }}"><i class="fas fa-file-invoice"></i> <span>Statements</span></a></li>
                </ul>
            </li>

            <li class="menu-header">All Tenant Info</li>
            <li class="dropdown">
                <li class="{{ setSidebarActive(['tenants.*']) }}">
                <a href="{{ route('tenant.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Register A Tenant</span></a>
                </li>
            </li>

        </ul>
    </aside>
</div>

