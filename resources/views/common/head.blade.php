<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('user/homepage') }}">家电售后</a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <span style="color: #77c0fd;font-family: 微软雅黑;font-size: 16px">你好，{{ $username }}</span>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ url('user/personal') }}"><i class="fa fa-user fa-fw"></i> 个人中心</a>
                </li>
                <li><a href="{{ url('user/setting') }}"><i class="fa fa-gear fa-fw"></i> 设置</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ url('user/logout') }}"><i class="fa fa-sign-out fa-fw"></i> 退出登录</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
</nav>