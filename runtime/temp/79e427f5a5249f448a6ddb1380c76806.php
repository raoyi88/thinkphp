<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpStudy\WWW\thinkphp\public/../application/user/view/default/login\register.html";i:1533798602;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
  <title>用户注册</title>

  <!-- Bootstrap -->
  <link href="__STATIC__/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="__STATIC__/bootstrap/css/docs.css" rel="stylesheet">

  <style>
    .main{margin-bottom: 60px;}
    .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
  </style>
</head>
<body>

<div class="main">
  <div class="container-fluid">
    <form action="<?php echo url('register'); ?>" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="用户名" style="width: 100%"/>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="密码" style="width: 100%"/>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="repassword" placeholder="确认密码" style="width: 100%"/>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="邮箱" style="width: 100%"/>
      </div>
      <div>
        <input class="form-control" name="verify" type="text" placeholder="验证码" style="width: 100%">
      </div>
      <div class="form-group">
        <img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();"/>
      </div>
      <div class="form-group" style="padding-top:20px">
        <input type="submit" value="提交">
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