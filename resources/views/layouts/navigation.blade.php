<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Mersi</span>
        </x-nav-link>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Main Section -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <x-nav-link :href="route('dashboard')">
                <i class="menu-icon tf-icons bx bx-home-alt"></i>
                <div>Dashboard</div>
            </x-nav-link>
        </li>

        <!-- Subscription Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Subscription Management</span></li>

        <li class="menu-item {{ request()->routeIs('subscription.index') ? 'active' : '' }}">
            <x-nav-link :href="route('subscription.index')">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div>Pricing Packages</div>
            </x-nav-link>
        </li>

        <li class="menu-item {{ request()->routeIs('subscription.payment') ? 'active' : '' }}">
            <x-nav-link :href="route('subscription.payment')">
                <i class="menu-icon tf-icons bx bx-wallet"></i>
                <div>My Payments</div>
            </x-nav-link>
        </li>

        <!-- Surveys Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Interactive Compliance</span></li>

        <li class="menu-item {{ request()->routeIs('survey.index') || request()->routeIs('survey.index') ? 'active' : '' }}">
            <x-nav-link :href="route('survey.index')">
                <i class="menu-icon tf-icons bx bx-clipboard"></i>
                <div>Surveys</div>
            </x-nav-link>
        </li>

        <li class="menu-item {{ request()->routeIs('survey.create') || request()->routeIs('survey.create') ? 'active' : '' }}">
            <x-nav-link :href="route('survey.create')">
                <i class="menu-icon tf-icons bx bx-plus-circle"></i>
                <div>Create Survey</div>
            </x-nav-link>
        </li>

        {{--        <li class="menu-item {{ request()->routeIs('survey.business.evaluation') ? 'active' : '' }}">--}}
        {{--            <x-nav-link :href="route('survey.business.evaluation')">--}}
        {{--                <i class="menu-icon tf-icons bx bx-task"></i>--}}
        {{--                <div>Evaluation</div>--}}
        {{--            </x-nav-link>--}}
        {{--        </li>--}}

        <!-- Reporting Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Reporting</span></li>

        <li class="menu-item {{ request()->routeIs('survey.audit.view') ? 'active' : '' }}">
            <x-nav-link href="{{ route('survey.audit.view', ['businessId' => 1]) }}">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div>Audit Reports</div>
            </x-nav-link>
        </li>
    </ul>
</aside>
<!-- / Menu -->
