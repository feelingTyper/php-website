<?php 
	include("online.php");	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>DHU-liuyan</title>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/myjQuery.js"></script>
<link href=css/style.css type=text/css rel=stylesheet />
<link href=css/liuyan.css type=text/css rel=stylesheet />
</head>
<body>
   <!--导航栏-->
    <div id=nav class="nav">
    	<h1><a href=index.php><img src="img/logo.png"/></a></h1>
        <ul>
            <li><a href=index.php>首页</a></li>
            <li><a href=luntan.php target="_blank">论坛</a></li>
            <li><a href=liuyan.php>留言</a></li>
            <li><a target="_blank" href="kecheng.php">课程</a></li>
        </ul>
        <?php if(!mysql_num_rows($result_online)){?>
        <div id="login" class="login">
        	<a  class="login-out" href=javascript:><span>登录</span></a>
            <em>|</em>
            <a  class="zhuce-out" href=javascript:><span>注册</span></a>
       
        </div>
        <?php }else{?>
         <!--afterlogin-->
        <div class="loginedbox">
        	<div class="logname"><a href="#"><span><?php  echo $loginname ?></span><i></i></a></div>
            <div class="personalcenter">
                <ul>
                    <li><a href=mypersonal.php target="_blank">个人中心</a></li>
                    <li><a href=mypersonal.php?pss=myliuyan>我的留言</a></li>
                    <li><a href=mypersonal.php?pss=mytiezi>我的贴吧</a></li>
                    <li><a href=mypersonal.php?pss=setpasswd>密码设置</a></li>
                    <li class="personnal-logout"><a href=javascript:>退出</a></li>
                </ul>
   			 </div>
        </div>    
        
        <!--afterloginend-->
        <?php }?>
        <div class=sousuo>
                <input class="formstyle" id="sskuang" type=text name="search" autocomplete="off" value="" placeholder="搜索关键字" />
                <input class="tjformstyle" id="tjkuang" type=submit value=""/>
        </div>
	</div>
    <div class="liuyan_container">
    	<div class="write_liuyan">请写下你给老师的留言</div>
        <input type=text class="liuyan_teacher" placeholder="希望解答的老师" />
    	<div class="liuyan_content">
        	<textarea class="liuyan_textarea"></textarea>
            <?php if(!mysql_num_rows($result_online)){?>
            <div class="login_tip">需要<a href=javascript:; class="login-out">登录</a>后才可以留言</div>
            <?php }?>
        </div>
        <div class="liuyan_submit">提交留言</div>
    </div>
 <div id="totop">
    </div>
    
    <div class="fullscreen-mask"></div>
    <div class="loginandzhuce">
    	<div class="login-model">
    	<ul class="login-nav">
        	<li><span>登录</span><button class="close-btn"></button></li>
        </ul>
    	<div class="denglu">
        	<div class="log-name clearfix">
                <input type=text name="log-name" autocomplete="off" placeholder="请输入您的用户名/邮箱" />
                <div class="yanzhengxinxi">用户名可用</div>
            </div>
            <div class="log-passwd clearfix">
                <input type=password name="log-passwd" placeholder="请输入输入密码"/>
                <div class="yanzhengxinxi">密码错误</div>
            </div>
            <div class="haimeiyou"><span>还没有帐号?</span><a href=javascript:>立刻注册</a></div>
            <button class="denglu-btn">登录</button>
        </div>
    </div>
    <div class="zhuce-model">
    	<ul class="login-nav">
        	<li><span>注册</span><button class="close-btn"></button></li>
        </ul>
    	<div class="zhuce">
        	<div class="zhuce-name clearfix">
                <input type=text name="zhuce-name" autocomplete="off" placeholder="请填写您的用户名" />
                <div class="yanzhengxinxi">账号已存在</div>
            </div>
            <div class="zhuce-passwd clearfix">
                <input type=password name="zhuce-passwd" placeholder="请输入您的密码"/>
                <div class="yanzhengxinxi"></div>
            </div>
            <div class="zhuce-passwdconfirm clearfix">
                <input type=password name="zhuce-passwdconfirm" placeholder="请确认您的密码"/>
                <div class="yanzhengxinxi">密码不一致</div>
            </div>
            <div class="zhuce-email clearfix">
                <input type=email name="zhuce-email" autocomplete="off" placeholder="填写邮箱"/>
                <div class="yanzhengxinxi">邮箱格式不正确</div>
            </div>
            <div class="haimeiyou"><span>已有账号?</span><a href=javascript:>快速登录</a></div>
            <button class="zhuce-btn">注册</button>
        </div>
    </div>
    </div>
    
    <footer>
    	<div class="foot-center">
        	<div class="by"><a href="#">网站服务</a></div>
        	<div class="by"><a href="#">关于我们</a></div>
            <div class="by"><a href="#">联系我们</a></div>
            <div class="by">
            	<a href="#">关注我们</a>
            	<div class="clearfix">
                	<div class= "a-img1" >
                	<a href="http://weibo.com/u/3291993551/home?topnav=1&wvr=6"></a>
                </div>
                <div class= "a-img2" >
                	<a href="#"></a>
                </div>
                <div class= "a-img3" >
                	<a href="#"></a>
                </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="cr">Copyright &copy 2015-05-05 by lshaluminum 1169558697@qq.com.  all right reserved</div>
</body>
</html>