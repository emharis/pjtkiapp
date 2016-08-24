<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{Request::is('home') ? 'active':''}}" >
                <a href="home"> <i class="fa fa-home"></i> <span>Home</span> </a>
            </li>

            @if(Auth::user()->role()->nama == 'ADM')
                <li class="{{Request::is('admin/agency') ? 'active':''}}" >
                    <a href="admin/agency"><i class="fa fa-angle-double-right"></i> <span>Agency</span></a>
                </li> 
                <li class="{{Request::is('admin/ctki*') ? 'active':''}}" ><a href="admin/ctki"><i class="fa fa-angle-double-right"></i> <span>CTKI</span></a></li>        
                <li class="{{Request::is('admin/user*') ? 'active':''}}" ><a href="admin/user"><i class="fa fa-angle-double-right"></i> <span>Users</span></a></li>
            @endif

            @if(Auth::user()->role()->nama == 'AGN')
                <li class="{{Request::is('agency/profile*') ? 'active':''}}" >
                    <a href="agency/profile">
                        <i class="fa fa-angle-double-right"></i> <span>Profile</span>
                    </a>
                </li>
                <li class="{{Request::is('agency/ctki') ? 'active':''}}" >
                    <a href="agency/ctki">
                        <i class="fa fa-angle-double-right"></i> <span>CTKI</span>
                    </a>
                </li>
                <li class="{{Request::is('agency/recruited') ? 'active':''}}" >
                    <a href="agency/recruited">
                        <i class="fa fa-angle-double-right"></i> <span>Recruited CTKI</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->role()->nama == 'CTK')
                <li class="{{Request::is('ctki/profile*') ? 'active':''}}" >
                    <a href="ctki/profile">
                        <i class="fa fa-angle-double-right"></i> <span>Profile</span>
                    </a>
                </li>
            @endif
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>