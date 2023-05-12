
<nav class="sidenav shadow-right sidenav-dark">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">

            <div class="sidenav-menu-heading"></div>
            <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <div class="nav-link-icon"></div>
                📉 Dashboard
            </a>
            <a class="nav-link {{ Request::is('pos*') ? 'active' : '' }}" href="{{ route('pos.index') }}">
                <div class="nav-link-icon"></div>
                🛒 Products 
            </a>

        
            
            <a class="nav-link {{ Request::is('orders/complete*') ? 'active' : '' }}" href="{{ route('order.completeOrders') }}">
                <div class="nav-link-icon"></div>
                ✅ Completed Orders
            </a>
            <a class="nav-link {{ Request::is('orders/pending*') ? 'active' : '' }}" href="{{ route('order.pendingOrders') }}">
                <div class="nav-link-icon"></div>
                🕐 Pending Orders
            </a>
            
            <a class="nav-link {{ Request::is('purchases', 'purchase/create*', 'purchases/details*') ? 'active' : '' }}" href="{{ route('purchases.allPurchases') }}">
                <div class="nav-link-icon"></div>
                💷 All Purchases
            </a>
            <!-- <a class="nav-link {{ Request::is('purchases/approved*') ? 'active' : '' }}" href="{{ route('purchases.approvedPurchases') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-circle-check"></i></div>
                Approval
            </a>
            <a class="nav-link {{ Request::is('purchases/report*') ? 'active' : '' }}" href="{{ route('purchases.dailyPurchaseReport') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-flag"></i></div>
                Daily Purchase Report
            </a> -->

            <!-- Sidenav Accordion (Pages)-->
            {{-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                People
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesCustomers">
                    <!-- Nested Sidenav Accordion (Pages -> People)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseCustomers" aria-expanded="false" aria-controls="pagesCollapseCustomers">
                        Customers
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseCustomers" data-bs-parent="#accordionSidenavPagesCustomers">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="#">Show All</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="#">Customers</a>
                    <a class="nav-link" href="#">Suppliers</a>
                </nav>
            </div> --}}

           
            <a class="nav-link {{ Request::is('customers*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
                <div class="nav-link-icon"></div>
                👥 Customers
            </a>
            <a class="nav-link {{ Request::is('suppliers*') ? 'active' : '' }}" href="{{ route('suppliers.index') }}">
                <div class="nav-link-icon"></div>
                📦 Suppliers
            </a>

            
            <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                <div class="nav-link-icon"></div>
                🧺 Products
            </a>
            <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                <div class="nav-link-icon"></div>
                🗂️ Categories
            </a>
            <a class="nav-link {{ Request::is('units*') ? 'active' : '' }}" href="{{ route('units.index') }}">
                <div class="nav-link-icon"></div>
                🖇️ Units
            </a>
        </div>
    </div>

    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">⚠️ You are logged in as:</div>
            <div class="sidenav-footer-title">{{ auth()->user()->name }}</div>
        </div>
    </div>
</nav>
