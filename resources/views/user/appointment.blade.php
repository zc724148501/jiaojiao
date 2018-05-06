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
    <style type="text/css">
        label {
            font-size: 22px;
        }

        input[type='date'] {
            padding: 1px;
        }

        /*控制编辑区域的*/
        input[type='date'] {
            background-color: #fff;
        }

        /*控制年月日这个区域的*/
        input[type='date'] {
            color: #333;
            padding: 0 .5em;
        }

        /*这是控制年月日之间的斜线或短横线的*/
        input[type='date'] {
            color: #333;
        }

        /*控制年文字, 如2013四个字母占据的那片地方*/
        input[type='date'] {
            color: #333;
        }

        /*控制月份*/
        input[type='date'] {
            color: #333;
        }

        /*控制具体日子*/
        input[type='date'] { /*这是控制下拉小箭头的*/
            border: 1px solid #ccc;
            border-radius: 2px;
            box-shadow: inset 0 1px #fff, 0 1px #eee;
            color: #666;
        }

        #panel {
            display: none;
        }
    </style>
</head>
<body>
<div id="wrapper">
@include('common.head')
<!--/. NAV TOP  -->
@include('common.userside')
<!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        预约维修
                        <small>提交您的维修订单</small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row" style="margin: 0 auto;width: 1200px;">
                                <div class="col-lg-6" style="margin-left: 270px">
                                    <form role="form" action="{{ url('user/setInfo') }}" method="post">
                                        <div class="form-group">
                                            <label>保修家电</label>
                                            <label style="font-size: 16px">（保修期已过的家电不参与预约维修）</label>
                                            <select name="household" class="form-control">
                                                <option value="" selected="selected">岁</option>
                                                <option value="">岁</option>
                                            </select>
                                        </div>
                                        <label>故障类型</label>
                                        <select name="household" class="form-control">
                                            <option value="" selected="selected">岁</option>
                                            <option value="">岁</option>
                                        </select>
                                        <div class="form-group">
                                            <label style="display: block;">上门时间</label>
                                            <input type="date" name="date_start"
                                                   style="width: 268px;display: inline-block" class="form-control"
                                                   min="2015-09-16" max="2015-09-26"/>
                                            <input type="time" name="time_start"
                                                   style="width: 268px;display: inline-block;" class="form-control"
                                                   value="12:00" min="09:00" max="19:00"/>
                                            <label>至</label>
                                            <input type="date" name="date_end"
                                                   style="width: 268px;display: inline-block;" class="form-control"
                                                   min="2015-09-16" max="2015-09-26"/>
                                            <input type="time" name="time_end"
                                                   style="width: 268px;display: inline-block;" class="form-control"
                                                   value="12:00" min="09:00" max="19:00"/>
                                        </div>
                                        <div id="flip" style="height: 80px;">
                                            <span id="icon" style="font-size: 50px;font-weight: bold">+</span><span
                                                    style="font-size: 30px;font-weight: bold;position: relative;left: 20px;top: -7px;">个人信息</span>
                                        </div>
                                        <div id="panel">
                                            <div class="form-group">
                                                <label>姓名</label>
                                                <input name="name" class="form-control" value="" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>电话</label>
                                                <input name="tel" class="form-control" value="" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label style="display: block;">地址</label>
                                                <textarea name="address" class="form-control" rows="3"
                                                          style="margin-top: 10px" disabled></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-default"
                                                style="width: 100px;margin-top: 30px">提交
                                        </button>
                                    </form>
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

            <div id="flip">点我滑下面板</div>
            <div id="panel">Hello world!</div>
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
        $("#flip").click(function () {
            $("#panel").slideToggle("slow");
            if ($("#icon").text() == '+') {
                $("#icon").html('-');
            } else {
                $("#icon").html('+');
            }
        });
    });
</script>
<!-- Custom Js -->
<script src="/assets/js/custom-scripts.js"></script>
</body>
</html>
