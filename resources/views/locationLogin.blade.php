<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>management</title>
    <style type="text/css">
        span {
            font-size: 30px;
        }

        div {
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<script type="text/javascript">
    let t = 5;//设定跳转的时间
    setInterval("refer()", 1000); //启动1秒定时
    function refer() {
        t--;
        if (t == 0) {
            location.href = "{{ url('user/homepage') }}"; //#设定跳转的链接地址
            return;
        }
        document.getElementById('show').innerHTML = "" + t; // 显示倒计时
    }
</script>
<div>
    <span>恭喜你登录成功，</span><span id="show">5</span><span>秒后跳转至主页</span>
</div>
</body>
</html>