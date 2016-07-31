    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpf1/v/t1.0-1/p160x160/12741983_178583622516081_862974866973730573_n.png?oh=87dd44f409b278f273f5e0ac55293232&oe=583774FC&__gda__=1479493011_3c4421dd92163d10c8459fd44b0a2eb7" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Admin Fortute</p>
                </div>
            </div>
          
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Manage User</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="{{url('admin/parent')}}"><i class="fa fa-circle-o"></i> Parent</a></li>
                        
                        <li><a href="{{url('admin/tutor')}}"><i class="fa fa-circle-o"></i> Tutor</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Manage Grade</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="{{url('admin/all-grade')}}"><i class="fa fa-circle-o"></i> Grades</a></li>
                        
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Manage Subject</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="{{url('admin/subject')}}"><i class="fa fa-circle-o"></i> Subject</a></li>
                        
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Manage Home Page</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="{{url('admin/manage-home')}}"><i class="fa fa-circle-o"></i> Home Page</a></li>
                        
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Manage Location</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="{{url('admin/manage-location')}}"><i class="fa fa-circle-o"></i> Location</a></li>
                        
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>