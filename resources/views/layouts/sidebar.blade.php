<div class="sidebar sidebar-collapse" id="sidebar">
    <div class="sidebar__menu-group">
        <ul class="sidebar_nav">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->segment(1) == '' ? 'active' : null }}">
                    <span class="nav-icon uil uil-create-dashboard"></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            @if(auth()->user()->role_id == 1)
            <li class="menu-title mt-30">
                <span>Master</span>
            </li>
            <li>
                <a href="{{ route('master-user-index') }}" class="{{ request()->segment(1) == 'master' && request()->segment(2) == 'user' ? 'active' : null }}">
                    <span class="nav-icon uil uil-users-alt"></span>
                    <span class="menu-text">User</span>
                </a>
                <a href="{{ route('master-item-index') }}" class="{{ request()->segment(1) == 'master' && request()->segment(2) == 'item' ? 'active' : null }}">
                    <span class="nav-icon uil uil-server"></span>
                    <span class="menu-text">Item</span>
                </a>
                <a href="{{ route('master-role-index') }}" class="{{ request()->segment(1) == 'master' && request()->segment(2) == 'role' ? 'active' : null }}">
                    <span class="nav-icon uil uil-user-md"></span>
                    <span class="menu-text">Role</span>
                </a>
            </li>
            @endif            
            <li class="menu-title mt-30">
                <span>Transaction</span>
            </li>
            <li>
                <a href="{{ route('transaction-order-index') }}" class="{{ request()->segment(1) == 'transaction' && request()->segment(2) == 'order' ? 'active' : null }}">
                    <span class="nav-icon uil uil-bill"></span>
                    <span class="menu-text">Order</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaction-production-index') }}" class="{{ request()->segment(1) == 'transaction' && request()->segment(2) == 'production' ? 'active' : null }}">
                    <span class="nav-icon uil uil-bolt-alt"></span>
                    <span class="menu-text">Production</span>
                </a>
            </li>   
            <li class="menu-title mt-30">
                <span>Manager</span>
            </li>
            <li>
                <a href="{{ route('dashboard-index') }}" class="{{ request()->segment(1) == 'dashboard' && request()->segment(2) == 'index' ? 'active' : null }}">
                    <span class="nav-icon uil uil-balance-scale"></span>
                    <span class="menu-text">Product</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard-chart') }}" class="{{ request()->segment(1) == 'dashboard' && request()->segment(2) == 'chart' ? 'active' : null }}">
                    <span class="nav-icon uil uil-chart"></span>
                    <span class="menu-text">Product Chart</span>
                </a>
            </li>
        </ul>
    </div>
</div>