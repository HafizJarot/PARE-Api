<aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image float-left">
                <img src="{{asset('assets/images/profile.webp')}}" class="rounded" alt="User Image">
            </div>
            <div class="info float-left">
                <p>PARE.Mobile</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>


            <li class="treeview {{ request()->is('user/penyewa') || request()->is('user/pemilik') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>User</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ request()->is('user/pemilik') ? 'active' : '' }}"><a href="{{route('user.pemilik')}}"><i
                                    class="fa fa-circle-o {{ request()->is('user/pemilik') ? 'text-success' : '' }}"></i>Pemilik</a></li>
                    <li class="{{ request()->is('user/penyewa') ? 'active' : '' }}"><a href="{{route('user.penyewa')}}"><i
                                    class="fa fa-circle-o {{ request()->is('user/penyewa') ? 'text-success' : '' }}"></i> Penyewa </a></li>
                </ul>
            </li>

            <li class="{{ request()->is('notif') ? 'active' : '' }}">
                <a href="{{route('notif.index')}}">
                    <i class="fa fa-bell"></i> <span>Notification</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-red" id="notify">0</small>
            </span>
                </a>
            </li>
            <li class="{{--{{ request()->is('notif') ? 'active' : '' }}--}}">
                <a href="{{--{{route('notif.index')}}--}}">
                    <i class="fa fa-money"></i> <span>Transaction</span>
                </a>
            </li>

        </ul>
    </section>
</aside>