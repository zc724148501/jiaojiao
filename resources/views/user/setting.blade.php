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
                                <div class="col-lg-6">
                                    <h4>添加您购买的产品</h4>
                                    <form role="form" action="{{ url('user/setHousehold') }}" method="post">
                                        <div id="box">
                                            @if(empty($household))
                                                <div>
                                                    <div class="form-group input-group">
                                                        <input id="input1" name="input1" type="text"
                                                               class="form-control">
                                                        <span class="input-group-addon" style="cursor: pointer"
                                                              onclick="AddOrDelete(this)">-</span>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label class="control-label"></label>
                                                    </div>
                                                </div>
                                            @else
                                                @foreach($household as $value)
                                                    <div>
                                                        <div class="form-group input-group">
                                                            <input id="input1" name="input1" type="text"
                                                                   class="form-control" value="{{ $value['input'] }}">
                                                            <span class="input-group-addon" style="cursor: pointer"
                                                                  onclick="AddOrDelete(this)">-</span>
                                                        </div>
                                                        <div class="
                                                            @if($value['msg'] != 'none' && $value['msg'] != 'exist')
                                                                form-group has-success
                                                            @else
                                                                form-group has-error
                                                            @endif
                                                                ">
                                                            <label class="control-label">
                                                                @if($value['msg'] == 'none')
                                                                    商品编号不存在
                                                                @elseif($value['msg'] == 'exist')
                                                                    商品已被绑定
                                                                @else
                                                                    绑定成功，{{ $value['msg'] }}
                                                                @endif
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-default" style="width: 100px;">添加</button>
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
    var firstDiv = box.firstElementChild;
    var firstSpan = firstDiv.children[0].children[1];
    firstSpan.innerHTML = '+';

    function AddOrDelete(btn) {
        if (btn.innerText === '+') {
            var div = document.createElement('div');
            box.appendChild(div);
            var firstDiv = document.createElement('div');
            firstDiv.setAttribute('class', 'form-group input-group');
            div.appendChild(firstDiv);
            var input = document.createElement('input');
            if (div.previousElementSibling.children[0].children[0]) {
                input.setAttribute('id', 'input' + (parseInt(div.previousElementSibling.children[0].children[0].getAttribute('id').substring(5)) + 1));
                input.setAttribute('name', 'input' + (parseInt(div.previousElementSibling.children[0].children[0].getAttribute('id').substring(5)) + 1));
            }
            input.setAttribute('class', 'form-control');
            firstDiv.appendChild(input);
            var span = document.createElement('span');
            span.setAttribute('type', 'text');
            span.setAttribute('class', 'input-group-addon');
            span.style.cursor = 'pointer';
            span.setAttribute('onclick', 'AddOrDelete(this)');
            span.innerText = '-';
            firstDiv.appendChild(span);
            var lastDiv = document.createElement('div');
            lastDiv.setAttribute('class', 'form-group has-success');
            div.appendChild(lastDiv);
            var label = document.createElement('label');
            label.setAttribute('class', 'control-label');
            label.innerText = '';
            lastDiv.appendChild(label);
        }
        else {
            var parentDiv = btn.parentNode.parentNode;
            box.removeChild(parentDiv);
        }
    }
</script>

</body>
</html>
