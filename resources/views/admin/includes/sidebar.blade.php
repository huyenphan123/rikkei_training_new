
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/adminLTE/images/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="">
                <a href="{{route('staffs.index')}}">
                    <b>
                            <span>Employee Management</span>
                    </b>

                </a>
            </li>

            <li class="">
                <a href="{{route('departments.index')}}">
                    <b> <span>Department Management</span></b>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
