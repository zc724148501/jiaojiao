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

    <!-- Custom Styles-->
    <link href="/assets/css/custom-styles.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <!-- TABLE STYLES-->
    <link href="/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet"/>
</head>
<body>
<div id="wrapper">
@include('common.head')
<!--/. NAV TOP  -->
@include('common.workerside')
<!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        个人中心
                        <small>查看您的个人资料</small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="disabledSelect">姓名</label>
                                        <div class="form-control">{{ $name or '未设置' }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>性别</label>
                                        <div class="form-control">@if($sex == 1) 男 @else 女 @endif</div>
                                    </div>
                                    <div class="form-group">
                                        <label>年龄</label>
                                        <div class="form-control">{{ $age or '未设置' }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>电话</label>
                                        <div class="form-control">{{ $tel or '未设置' }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label style="display: block;">地址</label>
                                        <div class="form-control"
                                             style="width: 293px;display: inline-block;">{{ $province or '未设置' }}</div>
                                        <div class="form-control"
                                             style="width: 293px;display: inline-block;">{{ $city or '未设置' }}</div>
                                        <div class="form-control"
                                             style="height: 102px;margin-top: 10px;">{{ $address or '未设置' }}</div>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h4>您擅长维修的产品</h4>
                                    <div id="box">
                                        <label style="display: block;">品牌</label>
                                        <div class="form-control">{{ $brand or '未设置' }}</div>
                                        <label style="display: block;">类型</label>
                                        <div class="form-control">{{ $type or '未设置' }}</div>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @include('common.foot')
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="/assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="/assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="/assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- Custom Js -->
<script src="/assets/js/custom-scripts.js"></script>

</body>
</html>
