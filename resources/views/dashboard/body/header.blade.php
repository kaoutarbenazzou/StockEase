
<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-dark bg-black" id="sidenavAccordion">

<button class="btn btn-icon btn-transparent-light btn-xxl order-1 order-lg-0 me-2 ms-lg-4 me-lg-0" id="sidebarToggle">
    <i data-feather="menu"></i>
</button>

   
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="{{ route('dashboard') }}">StockEase</a>
    
    <form class="form-inline me-auto d-none d-lg-block me-3">
        <div class="input-group input-group-joined input-group-solid">
            <input class="form-control pe-0" type="search" placeholder="🔎 Search" aria-label="Search" />
            <div class="input-group-text"></div>
        </div>
    </form>
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">
        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img-fluid" src="{{ auth()->user()->photo ? asset('storage/profile/'.auth()->user()->photo) : asset('assets/img/illustrations/profiles/defaultProfile.png') }}" /></a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="{{ auth()->user()->photo ? asset('storage/profile/'.auth()->user()->photo) : asset('assets/img/illustrations/profiles/defaultProfile.png') }}" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ auth()->user()->name }}</div>
                        <div class="dropdown-user-details-email">{{ auth()->user()->email }}</a></div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                    Account
                </a>

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" action="{{ route('logout') }}" method="POST" onclick="return confirm('Are you sure you want to proceed to logout?')">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
