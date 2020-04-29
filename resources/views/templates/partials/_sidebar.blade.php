<aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image float-left">
                <img src="{{asset('assets/images/user2-160x160.jpg')}}" class="rounded" alt="User Image">
            </div>
            <div class="info float-left">
                <p>PARE Template</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview active">
            <li>
                <a href="#">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
           {{--     <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>

                <ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard 1</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard 2</a></li>
                    <li><a href="index3.html"><i class="fa fa-circle-o"></i> Dashboard 3</a></li>
                </ul>
            </li>--}}
            <li>
                <a href="{{route('users.index')}}">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>
            <li>
                <a href="{{route('notif.index')}}">
                    <i class="fa fa-bell"></i> <span>Notifikasi</span>
                </a>
            </li>

        </ul>
    </section>
</aside>