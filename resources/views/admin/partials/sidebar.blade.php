<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <a class="app-header__logo" href="#">
        <img src="{{asset('frontend/images/logo2.png')}}" alt="Arc-Angel">
    </a>
    <ul class="app-menu">

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>

        <li class="treeview"><a class="app-menu__item" href="{{ route('admin.capacities.index') }}" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Master Product's Data</span><i class="treeview-indicator fa fa-angle-right"></i></a>

            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('admin.capacities.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Capacity</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.batterygroups.index' ? 'active' : '' }}" href="{{ route('admin.batterygroups.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Group Number</span>
                    </a>
                </li>
            </ul>
        </li>



        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Affiliate Management System</span><i class="treeview-indicator fa fa-angle-right"></i></a>

            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.affiliates.index' ? 'active' : '' }}" href="{{ route('admin.affiliates.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Affiliates</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.referrals.index' ? 'active' : '' }}" href="{{ route('admin.referrals.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Referrals</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.batteryfinders.index' ? 'active' : '' }}" href="{{ route('admin.batteryfinders.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Battery Finder System</span>
            </a>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Products</span><i class="treeview-indicator fa fa-angle-right"></i></a>

            <ul class="treeview-menu">

                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Product List</span>
                    </a>
                </li>

                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.sales.index' ? 'active' : '' }}" href="{{ route('admin.sales.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Sales</span>
                    </a>
                </li>

                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.inventories.index' ? 'active' : '' }}" href="{{ route('admin.inventories.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Inventory</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.posts.index' ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Pages</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Users</span>
            </a>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Add-ons</span><i class="treeview-indicator fa fa-angle-right"></i></a>

            <ul class="treeview-menu">

                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.faqs.index' ? 'active' : '' }}" href="{{ route('admin.faqs.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">FAQs</span>
                    </a>
                </li>

                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.videos.index' ? 'active' : '' }}" href="{{ route('admin.videos.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Videos</span>
                    </a>
                </li>

                <li>
                    <a class="treeview-item {{ Route::currentRouteName() == 'admin.testimonials.index' ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Testimonials</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.banners.index' ? 'active' : '' }}" href="{{ route('admin.banners.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Banners</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.coupons.index' ? 'active' : '' }}" href="{{ route('admin.coupons.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Coupons</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.returnproducts.index' ? 'active' : '' }}" href="{{ route('admin.returnproducts.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Return Products</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Feedback Lists</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Serial Numbers</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Reports</span>
            </a>
        </li>

{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">--}}
{{--                <i class="app-menu__icon fa fa-tags"></i>--}}
{{--                <span class="app-menu__label">Categories</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}" href="{{ route('admin.attributes.index') }}">--}}
{{--                <i class="app-menu__icon fa fa-th"></i>--}}
{{--                <span class="app-menu__label">Attributes</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">--}}
{{--                <i class="app-menu__icon fa fa-cogs"></i>--}}
{{--                <span class="app-menu__label">Settings</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</aside>
