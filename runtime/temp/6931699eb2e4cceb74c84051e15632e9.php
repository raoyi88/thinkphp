<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\phpStudy\WWW\thinkphp\public/../application/home/view/default/activity\show.html";i:1534082714;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main {
            margin-bottom: 60px;
        }

        .indexLabel {
            padding: 10px 0;
            margin: 10px 0 0;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->
    <div class="container-fluid">
        <div class="row noticeList">

            <div class="col-xs-2">
                <img class="noticeImg" src="/image/1.png"/>
            </div>

            <div class="col-xs-10">
                <p>
                <h4>活动标题</h4></p>
                <p class="title"><?php echo $activity['title']; ?></p>
               <h4>内容</h4>
                <p><?php echo $activity['content']; ?></p>
                <h4>开始时间</h4>
                <p><?php echo date('Y-m-d',$activity['start_time']); ?></p>
                <h4>结束时间</h4>
                <p><?php echo date('Y-m-d',$activity['end_time']); ?></p>
                <h4>剩余名额</h4>
                <p><?php echo $activity['num']; ?></p>
                <?php if($activity['is_login']): if($activity['category']==1): ?>
                    <p><button id="baoming" <?php echo !empty($activity['res'])?'disabled' : ''; ?> class="btn btn-primary"  onclick="baoming('<?php echo $activity['id']; ?>')"><span id="view"><?php echo !empty($activity['res'])?'已报名' : '我要报名'; ?></span></button></p>
                    <?php else: endif; else: ?>
                    <p><a href="http://www.thinkphp.com/user/login/index.html" class="btn btn-success btn-sm">登录后报名</a></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/jquery-1.11.2.min.js"></script>
<script src="/layer/layer.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public.js"></script>
<script type="text/javascript">
    function baoming(id) {
        $.get("<?php echo url('baoming'); ?>",{id:id},function (result) {
            if (result.status){
                layer.msg('报名成功',{icon:6,time:2500});
                $("#view").html('已报名');
                $('#baoming').attr('disabled',true);
                return ;
            }
            layer.msg('报名失败!',{icon:5,time:2500});
        })
    }
</script>
</body>
</html>