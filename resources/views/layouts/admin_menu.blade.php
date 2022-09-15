<ul class="nav">
    <li class="nav-item {{ request()->routeIs('admin.dashboard') && 'active' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.categories') && 'active' }}">
        <a class="nav-link" href="{{ route('admin.categories') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Categories</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.seo.index') && 'active' }}">
        <a class="nav-link" href="{{ route('admin.seo.index') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Pages SEO</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.settings.account') && 'active' }}">
        <a class="nav-link" href="{{ route('admin.settings.account') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Account</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.settings.index') && 'active' }}">
        <a class="nav-link" href="{{ route('admin.settings.index') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Settings</span>
        </a>
    </li>
</ul>
