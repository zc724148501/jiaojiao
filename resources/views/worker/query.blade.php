<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dream</title>
    <!-- Bootstrap Styles-->
    <link href="/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="/assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- Morris Chart Styles-->
    <link href="/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>
    <!-- Custom Styles-->
    <link href="/assets/css/custom-styles.css" rel="stylesheet"/>
</head>
<body>
<div id="wrapper">
@include('common.head')
<!--/. NAV TOP  -->
@include('common.workerside')
<!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    查询订单
                </div>
                <div class="panel-body">
                    {{--<div class="table-responsive">--}}
                    {{--<label>查询条件</label>--}}
                    {{--<table class="table table-striped">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                    {{--<th>品牌</th>--}}
                    {{--<th>类型</th>--}}
                    {{--<th>型号</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                    {{--<th>--}}
                    {{--<select name="fault" class="form-control" style="width: auto">--}}
                    {{--<option>无</option>--}}
                    {{--<option>西门子</option>--}}
                    {{--<option>海尔</option>--}}
                    {{--<option>美的</option>--}}
                    {{--<option>格力</option>--}}
                    {{--<option>小天鹅</option>--}}
                    {{--</select>--}}
                    {{--</th>--}}
                    {{--<th>--}}
                    {{--<select name="fault" class="form-control" style="width: auto">--}}
                    {{--<option>无</option>--}}
                    {{--<option>冰箱</option>--}}
                    {{--<option>洗衣机</option>--}}
                    {{--<option>电视机</option>--}}
                    {{--<option>电磁炉</option>--}}
                    {{--<option>微波炉</option>--}}
                    {{--</select>--}}
                    {{--</th>--}}
                    {{--<th>--}}
                    {{--<select name="fault" class="form-control" style="width: auto">--}}
                    {{--<option>无</option>--}}
                    {{--</select>--}}
                    {{--</th>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                    {{--</table>--}}

                    {{--<div class="form-group input-group">--}}
                    {{--<input type="text" class="form-control" placeholder="输入用户ID查找用户信息">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default" type="button"><i--}}
                    {{--class="fa fa-search"></i>--}}
                    {{--</button>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    <a>全部订单</a>
                    <a>未完成</a>
                    <span>已完成</span>
                    <br>
                    <br>
                    <div>
                        <label>查询结果</label>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>订单号</th>
                                <th>故障原因</th>
                                <th>委托人</th>
                                <th>家庭住址</th>
                                <th>联系方式</th>
                                <th>上门时间</th>
                                <th>订单状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>5000</th>
                                <th>电路老化</th>
                                <th>张三</th>
                                <th>北京-北京市-朝阳区XXX号</th>
                                <th>13888888888</th>
                                <th>2018-05-11 08:00至 2018-05-11 20:00</th>
                                <th><a style="color: red;">已完成</a></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="/assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="/assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="/assets/js/jquery.metisMenu.js"></script>
<!-- Morris Chart Js -->
<script src="/assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="/assets/js/morris/morris.js"></script>
<!-- Custom Js -->
<script src="/assets/js/custom-scripts.js"></script>


</body>
</html>
