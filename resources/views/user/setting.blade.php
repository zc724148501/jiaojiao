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
@include('common.userside')
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
                                    <form role="form">
                                        <div class="form-group">
                                            <label>姓名</label>
                                            <input class="form-control" placeholder="请输入您的姓名">
                                        </div>
                                        <div class="form-group">
                                            <label>性别</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1"
                                                           value="option1" checked="">男
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2"
                                                           value="option2">女
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>年龄</label>
                                            <select class="form-control">
                                                @for ($i = 1; $i < 100; $i++)
                                                    @if($i == 20)
                                                        <option value="{{ $i }}" selected="selected">{{ $i }}</option>
                                                    @else
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>电话</label>
                                            <input onkeyup="this.value=this.value.replace(/\D/g,'')"
                                                   onafterpaste="this.value=this.value.replace(/\D/g,'')"
                                                   class="form-control" placeholder="请输入您的电话">
                                        </div>
                                        <div class="form-group">
                                            <label style="display: block;">地址</label>
                                            @include('common.city')
                                            <textarea class="form-control" rows="3" style="margin-top: 10px"
                                                      placeholder="详细地址"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h4>添加您购买的产品</h4>
                                    <form role="form">
                                        <div id="box">
                                            <div>
                                                <div class="form-group input-group">
                                                    <input type="text" class="form-control" placeholder="请输入产品编号">
                                                    <span id="span1" class="input-group-addon" style="cursor: pointer"
                                                          onclick="AddOrDelete(this)">+</span>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label class="control-label" for="inputSuccess">Input with
                                                        success</label>
                                                </div>
                                            </div>
                                        </div>
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
    });
</script>
<!-- Custom Js -->
<script src="/assets/js/custom-scripts.js"></script>

<script>
    var box = document.getElementById('box');

    function AddOrDelete(btn) {
        if (btn.innerText === '+'){
            let div = document.createElement('div');
            div.innerText = '123';
            box.appendChild(div);
            btn.innerText = '-';
        }
    }
</script>

</body>
</html>
