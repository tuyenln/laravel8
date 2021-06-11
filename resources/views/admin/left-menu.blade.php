<div class="navbar nav_title" style="border: 0;">
    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Intel System</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
    <div class="profile_pic">
        <img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.6435-1/p480x480/154963344_4147782348574327_1368434653755635608_n.jpg?_nc_cat=103&ccb=1-3&_nc_sid=7206a8&_nc_ohc=YsFdw_uCG4kAX8qnjbP&tn=ilD896ozy5vCtaSw&_nc_ht=scontent.fhan2-4.fna&tp=6&oh=f234c32d986d66ce23daf40d2b5bc3c1&oe=60E8ADE4" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{ $user->name }}</h2>
    </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li class="active"><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display:block">
                        <li><a href="{{route('listing.index', ['model' => 'menu'])}}">Danh Mục</a></li>
                        <li><a href="{{route('listing.index', ['model' => 'news'])}}">Tin tức</a></li>
                        <li><a href="{{route('listing.index', ['model' => 'product'])}}">Sản phẩm</a></li>
                        <li><a href="{{route('listing.index', ['model' => 'order'])}}">Đơn hàng</a></li>
                        <li><a href="{{route('listing.index', ['model' => 'admin'])}}">Thành viên</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->