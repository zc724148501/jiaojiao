<!DOCTYPE html>
<html>

<head>
    <title>用户注册</title>
    <meta charset="gb2312">
    <link href="/css/home.css?v=2" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/js/jquery-1.7.2.js"></script>
</head>

<body>

<div class="wrap">
    <div class="banner-show" id="js_ban_content">
        <div class="cell bns-01">
            <div class="con">
            </div>
        </div>
        <div class="cell bns-02" style="display:none;">
            <div class="con">
                <a href="http://sc.chinaz.com" target="_blank" class="banner-link">
                    <i>圈子</i></a></div>
        </div>
        <div class="cell bns-03" style="display:none;">
            <div class="con">
                <a href="http://sc.chinaz.com" target="_blank" class="banner-link">
                    <i>企业云</i></a></div>
        </div>
    </div>
    <div class="banner-control" id="js_ban_button_box">
        <a href="javascript:;" class="left">左</a>
        <a href="javascript:;" class="right">右</a></div>
    <script type="text/javascript">
        ;(function () {

            var defaultInd = 0;
            var list = $('#js_ban_content').children();
            var count = 0;
            var change = function (newInd, callback) {
                if (count) return;
                count = 2;
                $(list[defaultInd]).fadeOut(400, function () {
                    count--;
                    if (count <= 0) {
                        if (start.timer) window.clearTimeout(start.timer);
                        callback && callback();
                    }
                });
                $(list[newInd]).fadeIn(400, function () {
                    defaultInd = newInd;
                    count--;
                    if (count <= 0) {
                        if (start.timer) window.clearTimeout(start.timer);
                        callback && callback();
                    }
                });
            }

            var next = function (callback) {
                var newInd = defaultInd + 1;
                if (newInd >= list.length) {
                    newInd = 0;
                }
                change(newInd, callback);
            }

            var start = function () {
                if (start.timer) window.clearTimeout(start.timer);
                start.timer = window.setTimeout(function () {
                    next(function () {
                        start();
                    });
                }, 8000);
            }

            start();

            $('#js_ban_button_box').on('click', 'a', function () {
                var btn = $(this);
                if (btn.hasClass('right')) {
                    //next
                    next(function () {
                        start();
                    });
                }
                else {
                    //prev
                    var newInd = defaultInd - 1;
                    if (newInd < 0) {
                        newInd = list.length - 1;
                    }
                    change(newInd, function () {
                        start();
                    });
                }
                return false;
            });

        })();
    </script>
    <div class="container">
        <div class="register-box">
            <div class="reg-slogan">用户注册</div>
            <div class="reg-form" id="js-form-mobile"  style="margin-top: -40px;">
                <br>
                <br>
                <form method="post" action="{{ url('user/check_register') }}">
                    <div class="cell">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                        <input type="text" name="username" id="js-mobile_ipt" class="text" maxlength="11"
                               placeholder="请输入账号" value="{{ $username or ''}}"/>
                    </div>
                    <div class="cell">
                        <input type="password" name="password" id="js-mobile_pwd_ipt" class="text" placeholder="请输入密码"/>
                        <input type="text" name="" id="js-mobile_pwd_ipt_txt" class="text" maxlength="20"
                               style="display:none;"/>
                        <b class="icon-form ifm-view js-view-pwd" title="查看密码" style="display: none">查看密码</b></div>
                    <div class="cell">
                        <input type="password" name="re_password" id="js-mobile_pwd_ipt" class="text"
                               placeholder="请再次输入密码"/>
                    </div>
                    <div class="cell vcode">
                        <input type="text" name="code" id="js-mobile_vcode_ipt" class="text" maxlength="6"
                               placeholder="请输入验证码"/>
                        {{--<a href="javascript:;" id="js-get_mobile_vcode" class="button btn-disabled">获取验证码</a>--}}
                        <img src="{{ URL('captcha/1') }}" id="captcha" alt="验证码" title="刷新验证码"
                             onclick="this.src='/captcha/'+Math.random()" style="cursor: pointer">
                    </div>
                    <div class="bottom">
                        <input type="submit" value="注册" id="login_btn" href="javascript:;" class="button btn-green"
                               style="width: 327px"/>
                    </div>
                    <br>
                    <div class="bottom">
                        <a id="return_btn" href="{{ url('user/login') }}" class="button btn-green">返回</a>
                    </div>
                    <div style="color: #c40000;font-size: 22px;margin-top: 15px;text-align: center">{{ $msg or '' }}</div>
                </form>
            </div>
            <!--            <div class="reg-form" id="js-form-mail" style="display: none;">-->
            <!--                <div class="cell">-->
            <!--                    <label for="js-mail_ipt">输入你的常用邮箱</label>-->
            <!--                    <input type="text" name="email" id="js-mail_ipt" class="text" />-->
            <!--                </div>-->
            <!--                <div class="cell">-->
            <!--                    <label for="js-mail_pwd_ipt">设置密码</label>-->
            <!--                    <input type="password" name="passwd" id="js-mail_pwd_ipt" class="text" />-->
            <!--                    <input type="text" name="passwd" id="js-mail_pwd_ipt_txt" class="text" maxlength="20" style="display:none;" />-->
            <!--                    <b class="icon-form ifm-view js-view-pwd" title="查看密码" style="display: none">-->
            <!--                        查看密码</b> </div>-->
            <!-- !短信验证码 -->
            <!--                <div class="cell vcode">-->
            <!--                    <label for="js-mail_vcode_ipt">输入验证码</label>-->
            <!--                    <input type="text" name="code" id="js-mail_vcode_ipt" class="text" maxlength="4" />-->
            <!--                    <img id="js-mail_vcode_img" src="http://passport.115.com/?ct=securimage&ac=email" alt="code" />-->
            <!--                    <span>-->
            <!--					<a id="js-mail_vcode_a" href="javascript:;" code_src="http://passport.115.com/?ct=securimage&amp;ac=email">-->
            <!--					换一张</a></span> </div>-->
            <!--                <div class="user-agreement">-->
            <!--                    <input type="checkbox" id="js-mail_chk" checked="true" />-->
            <!--                    <label for="js-mail_chk">同意<a href="http://115.com/agreement.html" target="_blank">《115网盘用户服务协议》</a></label>-->
            <!--                </div>-->
            <!--                <div class="bottom">-->
            <!--                    <a id="js-mail_btn" href="javascript:;" class="button btn-green">-->
            <!--                        立即注册</a></div>-->
            <!--            </div>-->
        </div>
    </div>
</div>
<div class="footer">
    <div class="con">
        <div class="copy-right">
            <div class="cell">
                <div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
                    <p>家电售后服务信息管理系统 —— 南京理工大学紫金学院</p>
                    <p>Power-By 张弛</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
