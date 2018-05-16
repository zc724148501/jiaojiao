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
@include('common.userside')
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
                    <a id="1" class="span" style="color: @if($set == '1') black @else dodgerblue @endif;" href="{{ url('user/query/1') }}">全部订单</a>
                    <a id="2" class="span" style="color: @if($set == '2') black @else dodgerblue @endif;" href="{{ url('user/query/2') }}">未完成</a>
                    <a id="3" class="span" style="color: @if($set == '3') black @else dodgerblue @endif;" href="{{ url('user/query/3') }}">已完成</a>
                    <br>
                    <br>
                    <div>
                        <label>查询结果</label>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>订单号</th>
                                <th>故障原因</th>
                                <th>故障详情</th>
                                <th>接单人</th>
                                <th>联系方式</th>
                                <th>订单状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $key => $value)
                                <th>{{ $value['id'] }}</th>
                                <th>{{ $fault }}</th>
                                <th>{{ $value['describe'] }}</th>
                                <th>{{ $worker[$key]['name'] }}</th>
                                <th>{{ $worker[$key]['tel'] }}</th>
                                <th><a style="color: @if($value['status'] == 0) green @else red @endif;">@if($value['status'] == 0) 未完成 @else 已完成 @endif</a></th>
                            </tr>
                            </tbody>
                            @endforeach
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

<script type="text/javascript">
    $(".span").click(function () {

    });
</script>

</body>
</html>
