<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\phpStudy\WWW\thinkphp\public/../application/user/view/default/login\index.html";i:1533802328;}*/ ?>
<!--<!DOCTYPE html>-->
<!--<html lang="zh-CN">-->
<!--<head>-->
    <!--<meta charset="utf-8">-->
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <!--&lt;!&ndash; 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ &ndash;&gt;-->
    <!--<title>用户登录</title>-->

    <!--&lt;!&ndash; Bootstrap &ndash;&gt;-->
    <!--<link href="__STATIC__/bootstrap/css/bootstrap.css" rel="stylesheet">-->
    <!--<link href="__STATIC__/bootstrap/css/docs.css" rel="stylesheet">-->

    <!--<style>-->
        <!--.main{margin-bottom: 60px;}-->
        <!--.indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}-->
    <!--</style>-->
<!--</head>-->
<!--<body>-->
<!--<div class="main">-->
    <!--<div class="container-fluid">-->
        <!--<form>-->
            <!--<div class="form-group">-->
                <!--<label>您的用户名(必填):</label>-->
                <!--<input type="text" class="form-control" name="username" style="width: 100%"/>-->
            <!--</div>-->
            <!--<div class="form-group">-->
                <!--<label>您的密码(必填):</label>-->
                <!--<input type="text" class="form-control" name="password" style="width: 100%"/>-->
            <!--</div>-->
            <!--<div>-->
                <!--<label>验证码(必填)</label>-->
                <!--<input class="form-control" name="verify" type="text" style="width: 100%">-->
            <!--</div>-->
            <!--<div class="form-group">-->
                <!--<img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();"/>-->
            <!--</div>-->
            <!--&lt;!&ndash;<div class="form-group">&ndash;&gt;-->
                <!--&lt;!&ndash;<i class="form-control"></i>&ndash;&gt;-->
                <!--&lt;!&ndash;<label>验证码(必填)</label>&ndash;&gt;-->
                <!--&lt;!&ndash;<input type="text" name="verify" autocomplete="off">&ndash;&gt;-->
                <!--&lt;!&ndash;<a class="reloadverify" title="换一张" href="javascript:void(0)">换一张？</a>&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--&lt;!&ndash;<div class="verifyimg">&ndash;&gt;-->
                <!--&lt;!&ndash;<?php echo captcha_img(); ?>&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--<div class="form-group" style="padding-top:20px">-->
                <!--<input type="submit" value="提交">-->
            <!--</div>-->
        <!--</form>-->
        <!--<div style="position: relative"><span style="position: absolute;left: 205px;">还没账号？</span><a style="position: absolute;left: 270px;" href="<?php echo url('register'); ?>">马上注册</a></div>-->
    <!--</div>-->
<!--</div>-->
<!--&lt;!&ndash; jQuery (necessary for Bootstrap's JavaScript plugins) &ndash;&gt;-->
<!--<script type="text/javascript" src="__STATIC__/jquery-2.0.3.min.js"></script>-->
<!--<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>-->
<!--<script>-->
    <!--$(document)-->
        <!--.ajaxStart(function(){-->
            <!--$("button:submit").addClass("log-in").attr("disabled", true);-->
        <!--})-->
        <!--.ajaxStop(function(){-->
            <!--$("button:submit").removeClass("log-in").attr("disabled", false);-->
        <!--});-->


    <!--$("form").submit(function(){-->
        <!--var self = $(this);-->
        <!--$.post(self.attr("action"), self.serialize(), success, "json");-->
        <!--return false;-->

        <!--function success(data){-->
            <!--if(data.code){-->
                <!--window.location.href = data.url;-->
            <!--} else {-->
                <!--self.find(".Validform_checktip").text(data.msg);-->
                <!--//刷新验证码-->
                <!--$(".verifyimg img").click();-->
            <!--}-->
        <!--}-->
    <!--});-->



    <!--$(function(){-->
        <!--//刷新验证码-->
        <!--var verifyimg = $(".verifyimg img").attr("src");-->
        <!--$(".verifyimg img").click(function(){-->
            <!--if( verifyimg.indexOf('?')>0){-->
                <!--$(".verifyimg img").attr("src", verifyimg+'&random='+Math.random());-->
            <!--}else{-->
                <!--$(".verifyimg img").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());-->
            <!--}-->
        <!--});-->
    <!--});-->
<!--</script>-->
<!--</body>-->
<!--</html>-->
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>用户登录</title>

    <link href="__STATIC__/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="__STATIC__/bootstrap/css/docs.css" rel="stylesheet">


    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <div class="container-fluid">
        <h3>登录</h3>
        <form class="login-form" method="post">
            <div class="form-group">

                <div class="controls">
                    <input type="text"  style="width: 95%" id="inputEmail" class="span3" placeholder="请输入用户名"  ajaxurl="/member/checkUserNameUnique.html" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
                </div>
            </div>

            <div class="form-group">

                <div class="controls">
                    <input type="password"   style="width: 95%" id="inputPassword"  class="span3" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
                </div>
            </div>
            <div class="form-group">

                <div class="controls">
                    <input type="text"  style="width: 95%"  id="inputPassword" class="span3" placeholder="请输入验证码"  errormsg="请填写5位验证码" nullmsg="请填写验证码" datatype="*5-5" name="verify">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls verifyimg">
                    <?php echo captcha_img(); ?>
                </div>
                <div class="controls Validform_checktip text-warning"></div>
                <div class="form-group">
                    <label class="checkbox">
                        <input type="checkbox"> 自动登陆
                    </label>
                    <button class="btn btn-primary onlineBtn btn-block">确认提交</button>
                    还没账号?<a href="<?php echo url('login/register'); ?>">立即注册</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="__STATIC__/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document)
        .ajaxStart(function(){
            $("button:submit").addClass("log-in").attr("disabled", true);
        })
        .ajaxStop(function(){
            $("button:submit").removeClass("log-in").attr("disabled", false);
        });


    $("form").submit(function(){
        var self = $(this);
        $.post(self.attr("action"), self.serialize(), success, "json");
        return false;

        function success(data){
            if(data.code){
                window.location.href = data.url;
            } else {
                self.find(".Validform_checktip").text(data.msg);
                //刷新验证码
                $(".verifyimg img").click();
            }
        }
    });



    $(function(){
        //刷新验证码
        var verifyimg = $(".verifyimg img").attr("src");
        $(".verifyimg img").click(function(){
            if( verifyimg.indexOf('?')>0){
                $(".verifyimg img").attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(".verifyimg img").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });
    });
</script>
</body>
</html>
