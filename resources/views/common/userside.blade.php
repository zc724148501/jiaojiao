<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="@if($active == 1) active-menu @endif" href="{{ url('user/homepage') }}"><i class="fa fa-dashboard"></i>首页</a>
            </li>
            <li>
                <a class="@if($active == 2) active-menu @endif" href="{{ url('user/appointment') }}"><i class="fa fa-desktop"></i>预约维修</a>
            </li>
            <li>
                <a class="@if($active == 3) active-menu @endif" href="{{ url('user/query/1') }}"><i class="fa fa-bar-chart-o"></i>订单查询</a>
            </li>
            <li>
                <a class="@if($active == 4) active-menu @endif" href="{{ url('user/personal') }}"><i class="fa fa-qrcode"></i>个人中心</a>
            </li>

            <li>
                <a class="@if($active == 5) active-menu @endif" href="{{ url('user/setting') }}"><i class="fa fa-table"></i>个人设置</a>
            </li>
            <li>
                <a href="{{ url('user/logout') }}"><i class="fa fa-edit"></i>退出登录</a>
            </li>
        </ul>

    </div>

</nav>