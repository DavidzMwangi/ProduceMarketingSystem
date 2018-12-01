
<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="{{asset('uploads/user/user.jpg')}}" alt="User Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Produce Marketing System</span>
</a>

<!-- Sidebar -->
<div class="sidebar">


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{url('master')}}" class="nav-link {{\Illuminate\Support\Facades\Request::path()=='dashboard'?'active':''}} ">
                    <i class="fa fa-dashboard nav-icon"></i>
                    <p>Dashboard </p>
                </a>
            </li>


            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-pie-chart"></i>
                    <p>
                        Crops
                        <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.crop.new_crop')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>New Crop</p>
                        </a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a href="pages/charts/flot.html" class="nav-link">--}}
                            {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                            {{--<p>All Crops</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}

                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-pie-chart"></i>
                    <p>
                        Farmers
                        <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.farmer.all')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>All Farmers</p>
                        </a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a href="pages/charts/flot.html" class="nav-link">--}}
                            {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                            {{--<p>All Crops</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}

                </ul>
            </li>



            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-pie-chart"></i>
                    <p>
                        Location
                        <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.location.new_view')}}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>New Location</p>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{route('admin.location.all_locations')}}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>All Locations</p>
                    </a>
                    </li>

                </ul>
            </li>

            <hr>
            <br>
            <p>

            </p>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
