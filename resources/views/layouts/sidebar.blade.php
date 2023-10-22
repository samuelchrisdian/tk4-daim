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
        </ul>
    </div>
</div>