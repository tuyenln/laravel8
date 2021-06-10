<div class="nav_menu">
    <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
    <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.6435-1/p480x480/154963344_4147782348574327_1368434653755635608_n.jpg?_nc_cat=103&ccb=1-3&_nc_sid=7206a8&_nc_ohc=YsFdw_uCG4kAX8qnjbP&tn=ilD896ozy5vCtaSw&_nc_ht=scontent.fhan2-4.fna&tp=6&oh=f234c32d986d66ce23daf40d2b5bc3c1&oe=60E8ADE4" alt="">{{ $user->name }}
        </a>
        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="javascript:;"> Profile</a>
            <a class="dropdown-item"  href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
            </a>
        <a class="dropdown-item"  href="javascript:;">Help</a>
            <a class="dropdown-item"  href="{{ route('admin.logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
        </div>
        </li>

        <li role="presentation" class="nav-item dropdown open">
        <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
        </a>
        <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
            <li class="nav-item">
            <a class="dropdown-item">
                <span class="image"><img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.6435-1/p480x480/154963344_4147782348574327_1368434653755635608_n.jpg?_nc_cat=103&ccb=1-3&_nc_sid=7206a8&_nc_ohc=YsFdw_uCG4kAX8qnjbP&tn=ilD896ozy5vCtaSw&_nc_ht=scontent.fhan2-4.fna&tp=6&oh=f234c32d986d66ce23daf40d2b5bc3c1&oe=60E8ADE4" alt="Profile Image" /></span>
                <span>
                <span>John Smith</span>
                <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
            </a>
            </li>
            <li class="nav-item">
            <a class="dropdown-item">
                <span class="image"><img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.6435-1/p480x480/154963344_4147782348574327_1368434653755635608_n.jpg?_nc_cat=103&ccb=1-3&_nc_sid=7206a8&_nc_ohc=YsFdw_uCG4kAX8qnjbP&tn=ilD896ozy5vCtaSw&_nc_ht=scontent.fhan2-4.fna&tp=6&oh=f234c32d986d66ce23daf40d2b5bc3c1&oe=60E8ADE4" alt="Profile Image" /></span>
                <span>
                <span>John Smith</span>
                <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
            </a>
            </li>
            <li class="nav-item">
            <a class="dropdown-item">
                <span class="image"><img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.6435-1/p480x480/154963344_4147782348574327_1368434653755635608_n.jpg?_nc_cat=103&ccb=1-3&_nc_sid=7206a8&_nc_ohc=YsFdw_uCG4kAX8qnjbP&tn=ilD896ozy5vCtaSw&_nc_ht=scontent.fhan2-4.fna&tp=6&oh=f234c32d986d66ce23daf40d2b5bc3c1&oe=60E8ADE4" alt="Profile Image" /></span>
                <span>
                <span>John Smith</span>
                <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
            </a>
            </li>
            <li class="nav-item">
            <a class="dropdown-item">
                <span class="image"><img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.6435-1/p480x480/154963344_4147782348574327_1368434653755635608_n.jpg?_nc_cat=103&ccb=1-3&_nc_sid=7206a8&_nc_ohc=YsFdw_uCG4kAX8qnjbP&tn=ilD896ozy5vCtaSw&_nc_ht=scontent.fhan2-4.fna&tp=6&oh=f234c32d986d66ce23daf40d2b5bc3c1&oe=60E8ADE4" alt="Profile Image" /></span>
                <span>
                <span>John Smith</span>
                <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
            </a>
            </li>
            <li class="nav-item">
            <div class="text-center">
                <a class="dropdown-item">
                <strong>See All Alerts</strong>
                <i class="fa fa-angle-right"></i>
                </a>
            </div>
            </li>
        </ul>
        </li>
    </ul>
    </nav>
</div>