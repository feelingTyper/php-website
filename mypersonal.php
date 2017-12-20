<?php 
	include("online.php");
	if(!mysql_num_rows($result_online)){
		echo "<script type=text/javascript>location.href = 'index.php';</script>";
	}
	if(isset($_GET["pss"])){
		switch($_GET["pss"]){
			case "myliuyan":
				$flag = "myliuyan";
				$liuyan_result = mysql_query("select * from liuyan where liuyan_author = '$loginname' limit 1");
			break;
			case "mytiezi":
			$flag = "mytiezi";
			$tiezi_result = mysql_query("select * from tiezi where author = '$loginname' limit 5");
			break;
			case "setpasswd":
			$flag = "setpasswd";
			break;
		}	
	}else{
		$flag = "personal_info";
		$userinfo_result = mysql_query("select * from users where name = '$loginname'");
		$userinfo = mysql_fetch_array($userinfo_result);
		$fatie_num_result = mysql_query("select count(*) from tiezi where author='$loginname'");
		$fatie_num = mysql_fetch_assoc($fatie_num_result);
		$huitie_num_result = mysql_query("select count(*) from huifutiezi where author='$loginname'");
		$huitie_num = mysql_fetch_assoc($huitie_num_result);
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>DHU-Personal</title>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/myjQuery.js"></script>
<link href=css/style.css type=text/css rel=stylesheet />
<link href=css/personalcenter.css type=text/css rel=stylesheet />
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
         <!--afterlogin-->
        <div class="loginedbox">
        	<div class="logname"><a href="#"><span><?php  echo $loginname ?></span><i></i></a></div>
            <div class="personalcenter">
                <ul>
                    <li><a href=mypersonal.php>个人中心</a></li>
                    <li><a href=mypersonal.php?pss=myliuyan>我的留言</a></li>
                    <li><a href=mypersonal.php?pss=mytiezi>我的贴吧</a></li>
                    <li><a href=mypersonal.php?pss=setpasswd>密码设置</a></li>
                    <li class="personnal-logout"><a href=javascript:>退出</a></li>
                </ul>
   			 </div>
        </div>    
        <!--afterloginend-->
        <div class=sousuo>
                <input class="formstyle" id="sskuang" type=text name="search" autocomplete="off" value="" placeholder="搜索关键字" />
                <input class="tjformstyle" id="tjkuang" type=submit value=""/>
        </div>
	</div>
    <div class="liuyan_container">
    	<div class="liuyan_left">
        	<div class="left_author">
            	<div class="author-img">
                    	<div class="author-img1">
                    		<a href=#><img src="img/al.jpg" /></a>
                    	</div>
                 </div>
                 <div class="author"><a href="#"><?php echo $loginname ?></a></div>
            </div>
            <div class="left_ul">
                <ul class="left_nav">
                    <li><a <?php if($flag=="personal_info"){echo "id='curbg'";}?> href=mypersonal.php>个人中心</a></li>
                    <li><a <?php if($flag=="myliuyan"){echo "id='curbg'";}?>href=mypersonal.php?pss=myliuyan>我的留言</a></li>
                    <li><a <?php if($flag=="mytiezi"){echo "id='curbg'";}?>href=mypersonal.php?pss=mytiezi>我的贴吧</a></li>
                    <li><a <?php if($flag=="setpasswd"){echo "id='curbg'";}?>href=mypersonal.php?pss=setpasswd>密码设置</a></li>
                    <li class="personnal-logout"><a href=javascript:>退出</a></li>
                </ul>
            </div>
        </div>
        <div class="liuyan_right">
        	<div class="right_content">
            	<?php if($flag=="personal_info"){?>
            	<div class="personal_info">
                	<span class="gerenziliao">个人资料</span>
                    <ul>
                    	<li><span>用户名：</span><span><?php echo $loginname ?></span></li>
                        <li><span>E-mail：</span><span><?php echo $userinfo["email"] ?></span></li>
                        <li><span>发帖数：</span><span><?php echo $fatie_num["count(*)"] ?></span></li>
                        <li><span>回复数：</span><span><?php echo $huitie_num["count(*)"] ?></span></li>
                    </ul>
                </div>
                <?php }?>
                <?php  if($flag=="myliuyan"){
					while($liuyan = mysql_fetch_array($liuyan_result)){
				?>
                <div class="my_message">
                	<span class="gerenziliao">我的留言</span>
                    <div class="my_message_ul">
                    	<ul>
                        	<li>
                            	<div class="message_addtime"><span>留言在&nbsp;&nbsp;</span><em><?php echo date("Y-m-d H:i:s",$liuyan["addtime"])?></em></div>
                                <div class="meassage_teacher"><span>留言老师&nbsp;&nbsp;</span><em><?php echo $liuyan["liuyan_teacher"]?></em></div>
                                <div class="liuyan_content"><p><?php echo $liuyan["liuyan_content"]?></p></div>
                                <div class="message_huifu">
                                	<span class="gerenziliao">老师回复</span>
                                    <?php 
										$id = $liuyan["id"];
										$result = mysql_query("select * from huifuliuyan where huifu_id = '$id'");
										while($huifu = mysql_fetch_assoc($result)){
									?>
                                    <div class="message_addtime"><span>回复在&nbsp;&nbsp;</span><em><?php echo date("Y-m-d H:i:s",$huifu["addtime"])?></em></div>
                                    <div class="meassage_teacher"><span>回复老师&nbsp;&nbsp;</span><em><?php echo $huifu["huifu_teacher"]?></em></div>
                                    <div class="liuyan_content"><p><?php echo $huifu["huifu_content"]?></p></div>
                                    <?php }?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php }}?>
                <?php  if($flag=="mytiezi"){
				?>
                <div class="my_tiezi">
                	<span class="gerenziliao">我的帖子&nbsp;<em>(3)</em></span>
                    <ul>
                    	<?php while($mytiezi = mysql_fetch_array($tiezi_result)){?>
                    	<li>
                        	<a class="my_tiezi_title" href=luntan_content.php?tiezicontent=<?php echo base64_encode($mytiezi["id"])?>><?php echo $mytiezi["title"]?></a>
                        	<div class="tiezi-info">
                            		<div class="fabuzai">发表在<a href=#><?php echo $mytiezi["classify"]?></a></span></div>
                               		<div class="fabushijian"><?php echo date("Y-m-d H:i:s",$mytiezi["addtime"])?></div>
                               		<div class="fwhf">
                                    <div class="tiezi-invitation"><i></i><?php echo $mytiezi["invitation"]?></div>
                                    <div class="tiezi-applay"><i></i><span><?php echo $mytiezi["replaynum"]?></span></div>
                                 	</div>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <?php }?>
                <?php  if($flag=="setpasswd"){?>
                <div class="set_passwd">
                	<span class="gerenziliao">设置密码</span>
                    <div class="passwd_input">
                    	<div class="input_passwd"><span>填写新的密码</span><input type=password /></div>
                        <div class="input_passwd_confirm"><span>确认新的密码</span><input type=password /></div>
                        <div class="passwd_sub">确认</div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
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