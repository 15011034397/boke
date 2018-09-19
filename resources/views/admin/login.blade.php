<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台登录</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="/assets/css/app.css">
</head>

<body data-type="login">
    <div class="am-g myapp-login">
        <div class="myapp-login-logo-block  tpl-login-max">
            <div class="myapp-login-logo-text">
                <div class="myapp-login-logo-text">
                    后台登录
                </div>
            </div>
            <div class="login-font">
                <i>Log In </i> or <span> Sign Up</span>
            </div>
            <div class="am-u-sm-10 login-am-center">
                <form class="am-form" method="post" action="/admin/login">
                    <fieldset>
                        <div class="am-form-group">
                            <input type="text" class="" id="doc-ipt-email-1" name="name" placeholder="用户名">
                        </div>
                        <div class="am-form-group">
                            <input type="password" class="" name="password" id="doc-ipt-pwd-1" placeholder="设置个密码吧">
                        </div>
                        <input name="captcha" type="text" placeholder="验证码" align="center">
                        
            <img  src="{{ URL('/captcha/1') }}" onclick="this.src='{{ URL('/captcha/1') }}?d='+Math.random();" alt="验证码" title="刷新图片" width="150" height="60" id="c2c98f0de5a04167a9e4 27d883690ff6" border="0" align="center">
        
                        <br> {{csrf_field()}}
                        <p>
                            <button type="submit" class="am-btn am-btn-default">登录</button>
                        </p>
                    </fieldset>
                </form>
                <script>
                function re_captcha() {
                    $url = "{{ URL('/captcha') }}";
                    $url = $url + "/" + Math.random();
                    document.getElementById('captchaid').src = $url;
                }
                </script>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/amazeui.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
<SCRIPT Language=VBScript>
<!--

//-->
</SCRIPT>