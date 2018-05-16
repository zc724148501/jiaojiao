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
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <script src="/assets/js/bootstrap.min.js"></script>
    <style type="text/css">
        label {
            font-size: 22px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        #panel {
            display: none;
        }
    </style>
    <script>

        var theme = "ios";
        var mode = "scroller";
        var display = "bottom";
        var lang = "zh";

        // Date & Time demo initialization
        $('#demo_datetime1').mobiscroll().datetime({
            theme: theme,
            mode: mode,
            display: display,
            lang: lang,
            dateFormat: "yyyy-mm-dd",
            minDate: new Date(2000, 3, 10, 9, 22),
            maxDate: new Date(2030, 7, 30, 15, 44),
            stepMinute: 1
        });
        $('#demo_datetime2').mobiscroll().datetime({
            theme: theme,
            mode: mode,
            display: display,
            lang: lang,
            dateFormat: "yyyy-mm-dd",
            minDate: new Date(2000, 3, 10, 9, 22),
            maxDate: new Date(2030, 7, 30, 15, 44),
            stepMinute: 1
        });
    </script>
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
                                    <div class="alert alert-warning"
                                         style="display: {{ (!$complete) ? 'block' : 'none' }};">
                                        <a href="#" class="close" data-dismiss="alert">
                                            &times;
                                        </a>
                                        <strong>警告！</strong>
                                        <span>您的个人资料未完善，请前往完善。</span>
                                        <a href="{{ url('user/setting') }}">个人设置</a>
                                    </div>
                                    <form role="form" action="{{ url('user/setInfo') }}" method="post">
                                        <div class="form-group">
                                            {{--<div class="form-group has-error">--}}
                                            {{--<label>家电编号</label>--}}
                                            {{--<input type="text" class="form-control" id="inputSuccess">--}}
                                            {{--<label class="control-label" for="inputSuccess"></label>--}}
                                            {{--<label class="control-label" for="inputSuccess">家电编号已存在</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                            {{--<label>保修期</label>--}}
                                            {{--<input type="date" class="form-control" style="line-height: 17px">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                            {{--<button type="submit" class="btn btn-default"--}}
                                            {{--style="width: 100px;margin-top: 30px">提交--}}
                                            {{--</button>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                            {{--<label>选择要添加的信息种类</label>--}}
                                            {{--<select name="fault" class="form-control">--}}
                                            {{--<option id="type">家电品牌</option>--}}
                                            {{--<option id="model">家电类型</option>--}}
                                            {{--<option>家电型号</option>--}}
                                            {{--</select>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                            {{--<label>保修期</label>--}}
                                            {{--<input type="date" class="form-control" style="line-height: 17px">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                            {{--<button type="submit" class="btn btn-default"--}}
                                            {{--style="width: 100px;margin-top: 30px">提交--}}
                                            {{--</button>--}}
                                            {{--</div>--}}
                                            <label>保修家电</label>
                                            <label style="font-size: 16px">（保修期已过的家电不能免费保修）</label>
                                            <select id="household" class="form-control">
                                                <option value="0" selected>未选择</option>
                                                @foreach($household as $key => $value)
                                                    <option id="{{ $value['id'] }}" class="change"
                                                            value="{{ $value['id'] }}">{{ $value['household'] }}</option>
                                                @endforeach
                                                @foreach($over as $key => $value)
                                                    <option id="{{ $value['id'] }}" class="change"
                                                            value="{{ $value['id'] }}">{{ $value['household'] . '（超出保修时间）' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label>故障类型</label>
                                        <select id="fault" class="form-control">
                                            <option id="type" disabled>======按家电类型分类======</option>
                                            <option id="model" disabled>======按家电型号分类======</option>
                                            <option disabled>========其他========</option>
                                            <option id="other" value="0">其他</option>
                                        </select>
                                        <div class="form-group">
                                            <label style="display: block;">详细说明</label>
                                            <textarea id="describe" class="form-control" rows="3"
                                                      style="margin-top: 10px"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label style="display: block">上门时间</label>
                                            <input id="demo_datetime1" style="width: 542px;display: inline-block;"
                                                   class="form-control" type="text" value="{{ $time }}">
                                            <label style="display: inline-block;margin-top: 0">至</label>
                                            <input id="demo_datetime2" style="width: 542px;display: inline-block;"
                                                   class="form-control" type="text" value="{{ $time }}">
                                        </div>
                                        <div id="flip" style="height: 80px;">
                                            <span id="icon" style="font-size: 50px;font-weight: bold">+</span><span
                                                    style="font-size: 30px;font-weight: bold;position: relative;left: 20px;top: -7px;">个人信息</span>
                                        </div>
                                        <div id="panel">
                                            <div class="form-group">
                                                <label>姓名</label>
                                                <input id="name" class="form-control" value="{{ $user['name'] }}"
                                                       disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>电话</label>
                                                <input id="tel" class="form-control" value="{{ $user['tel'] }}"
                                                       disabled>
                                            </div>
                                            <div class="form-group">
                                                <label style="display: block;">地址</label>
                                                <textarea id="address" class="form-control" rows="3"
                                                          style="margin-top: 10px"
                                                          disabled>{{ $user['province'] . '-' . $user['city'] . '-' . $user['address'] }}</textarea>
                                            </div>
                                        </div>
                                        <button id="submit" type="button" class="btn btn-default"
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
<script src="/js/jquery-1.js"></script>
<script src="/js/mobiscroll.js"></script>
<link href="/css/mobiscroll.css" rel="stylesheet" type="text/css">
<!-- DATA TABLE SCRIPTS -->
<script src="/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {

        var theme = "ios";
        var mode = "scroller";
        var display = "bottom";
        var lang = "zh";

        // Date & Time demo initialization
        $('#demo_datetime1').mobiscroll().datetime({
            theme: theme,
            mode: mode,
            display: display,
            lang: lang,
            dateFormat: "yyyy-mm-dd",
            minDate: new Date(2000, 3, 10, 9, 22),
            maxDate: new Date(2030, 7, 30, 15, 44),
            stepMinute: 1
        });
        $('#dataTables-example').dataTable();
        $("#flip").click(function () {
            $("#panel").slideToggle("slow");
            if ($("#icon").text() == '+') {
                $("#icon").html('-');
            } else {
                $("#icon").html('+');
            }
        });

        // Date & Time demo initialization
        $('#demo_datetime2').mobiscroll().datetime({
            theme: theme,
            mode: mode,
            display: display,
            lang: lang,
            dateFormat: "yyyy-mm-dd",
            minDate: new Date(2000, 3, 10, 9, 22),
            maxDate: new Date(2030, 7, 30, 15, 44),
            stepMinute: 1
        });
        $(".change").click(function () {
            var id = $(this).attr('id');
            $.post("{{ url('user/select') }}", {
                    id: id,
                },
                function (data) {
                    var typeLen = data['type'].length;
                    var modelLen = data['model'].length;
                    var type = $("#type");
                    var model = $("#model");
                    $("option").remove(".remove");
                    for (var i = 0; i < typeLen; i++) {
                        var option = $("<option class='remove' value='" + data['type'][i]['id'] + "'>" + data['type'][i]['fault'] + "</option>");
                        type.after(option);
                    }
                    for (var i = 0; i < modelLen; i++) {
                        var option = $("<option class='remove' value='" + data['model'][i]['id'] + "'>" + data['model'][i]['fault'] + "</option>");
                        model.after(option);
                    }
                }, "json");
        });
        $("#submit").click(function () {
            var name = $("#name").val();
            var tel = $("#tel").val();
            var address = $("#address").val();
            var household = $("#household").val();
            var fault = $("#fault").val();
            var describe = $("#describe").val();
            var startTime = new Date($("#demo_datetime1").val());
            var endTime = new Date($("#demo_datetime2").val());
            if (name == '' || tel == '' || address == '-') {
                alert('请完善个人信息');
            }
            else if (household == 0) {
                alert('请选择要保修的家电');
            }
            else if (describe == '') {
                alert('请填写详细说明');
            }
            else {
                $.post("{{ url('user/submit') }}", {
                        household: household,
                        fault: fault,
                        describe: describe,
                        startTime: startTime.valueOf(),
                        endTime: endTime.valueOf()
                    },
                    function (data) {
                        if (data) {
                            alert('已提交预约订单');
                            location = "{{ url('user/query') }}";
                        }
                        else {
                            alert('未找到合适的维修人员');
                        }
                    }, "json");
            }
        });

        function timestampToTime(timestamp) {
            var date = new Date(timestamp);
            Y = date.getFullYear() + '-';
            M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '-';
            D = date.getDate() + ' ';
            h = date.getHours() + ':';
            m = date.getMinutes() + ':';
            return Y + M + D + h + m;
        }
    });
</script>
<!-- Custom Js -->
<script src="/assets/js/custom-scripts.js"></script>
</body>
</html>
