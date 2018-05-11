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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>家电ID</th>
                                <th>品牌</th>
                                <th>类型</th>
                                <th>型号</th>
                                <th>编号</th>
                                <th>所属用户ID</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>3</th>
                                <th>小天鹅</th>
                                <th>冰箱</th>
                                <th>BV-300</th>
                                <th>4032</th>
                                <th>3</th>
                            </tr>

                            </tbody>
                        </table>
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
