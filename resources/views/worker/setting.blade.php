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
                        个人设置
                        <small>设置您的个人资料</small>
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
                                    <form role="form" action="{{ url('user/setInfo') }}" method="post">
                                        <div class="form-group">
                                            <label>姓名</label>
                                            <input name="name" class="form-control" placeholder="请输入您的姓名"
                                                   value="{{ $name or null }}">
                                        </div>
                                        <div class="form-group">
                                            <label>性别</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="sex" id="optionsRadios1"
                                                           value="1" @if($sex == 1) checked="true" @endif>男
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="sex" id="optionsRadios2"
                                                           value="0" @if($sex == 0) checked="true" @endif>女
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>年龄</label>
                                            <select name="age" class="form-control">
                                                @for ($i = 1; $i < 100; $i++)
                                                    @if($i == $age)
                                                        <option value="{{ $i }}" selected="selected">{{ $i }}岁</option>
                                                    @else
                                                        <option value="{{ $i }}">{{ $i }}岁</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group @if($msg == '错误的手机号格式') has-error @endif">
                                            <label>电话</label>
                                            <input name="tel" onkeyup="this.value=this.value.replace(/\D/g,'')"
                                                   onafterpaste="this.value=this.value.replace(/\D/g,'')"
                                                   class="form-control" placeholder="请输入您的电话"
                                                   value="{{ $tel or null }}">
                                            <label class="control-label" for="inputError"
                                                   style="margin-top: 10px">{{ $msg or null }}</label>
                                        </div>
                                        <div class="form-group">
                                            <label style="display: block;">地址</label>
                                            @include('common.city')
                                            <textarea name="address" class="form-control" rows="3"
                                                      style="margin-top: 10px"
                                                      placeholder="详细地址">{{ $address or null }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default" style="width: 100px;">保存</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <form role="form" action="{{ url('worker/setHousehold') }}" method="post">
                                    <div class="col-lg-6">
                                        <h4>选择您擅长维修的产品</h4>
                                        <div class="form-group">
                                            <label>品牌</label>
                                            <select id="brand" name="brand" class="form-control">
                                                <option value="0" selected="selected">未设置</option>
                                                @foreach($brandAll as $value)
                                                    <option value="{{ $value['number'] }}"
                                                            @if($brand == $value['number']) selected="selected" @endif>{{ $value['brand'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>型号</label>
                                            <select id="type" name="type" class="form-control">
                                                <option value="0" selected="selected">未设置</option>
                                                @foreach($typeAll as $value)
                                                    <option value="{{ $value['number'] }}"
                                                            @if($type == $value['number']) selected="selected" @endif>{{ $value['type'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button id="setHousehold" type="button" class="btn btn-default"
                                                style="width: 100px;margin-top: 20px">保存
                                        </button>
                                    </div>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
<!-- DATA TABLE SCRIPTS -->
<script src="/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();


        $("#setHousehold").click(function () {
            var brand = $('#brand').val();
            var type = $('#type').val();
            $.post("{{ url('worker/setHousehold') }}", {
                    brand: brand,
                    type: type,
                },
                function () {
                    alert('保存成功');
                });
        });
    });
</script>
<!-- Custom Js -->
<script src="/assets/js/custom-scripts.js"></script>

</body>
</html>
