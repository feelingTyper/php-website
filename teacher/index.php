<?php 
session_start();
if(isset($_SESSION["teachername"])){
}else{
	header("location:teacher_login.php");
}
@$conn = mysql_connect("localhost","root","123456") or die("数据库连接失败");
mysql_select_db("myeducation",$conn);
mysql_query("set names 'utf8'");
$name = $_SESSION["teachername"];
if(isset($_GET["action"])){
	switch($_GET["action"]){
		case "mylesson":
			$flag = "mylesson";
			$mylesson_result = mysql_query("select * from kecheng where kechengauthor = '$name'");
		break;
		case "tome_message":
			$flag = "tome_message";
			$mymessage_result = mysql_query("select * from liuyan where liuyan_teacher = '$name'");
			
		break;
		case "admin_sent":
			$flag = "admin_sent";
			$mytongzhi_result = mysql_query("select * from tongzhiteacher where teacher = '$name'");
		break;
		case "biaoji_read":
			$flag = "admin_sent";
			$id = $_GET["tongzhi_id"];
			mysql_query("update tongzhiteacher set status = 1 where id = '$id'");
			$mytongzhi_result = mysql_query("select * from tongzhiteacher where teacher = '$name'");
		break;
		
		
	}
}else{
	$flag = "personnal_info";
	$teacher_result = mysql_query("select * from teacher where name = '{$_SESSION["teachername"]}'");
	$teacher = mysql_fetch_array($teacher_result);
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DHU-teacher</title>
<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/adminJquery.js"></script>
<link href=../css/info_management.css type=text/css rel=stylesheet />
</head>

<body>
	<div class="title">DHU老师管理界面</div>
	<div class="container">
    	<div class="bt">
        	<div class="welcome_admin">欢迎&nbsp;&nbsp;<span><?php echo $_SESSION["teachername"]?></span>&nbsp;&nbsp;老师登录页面</div>
            <div class="clear_both"></div>
        </div>
        <div class="student_info">
        	<div class="left">
            	<div class="fenlei">
                	<ul class="new_ul">
                    	<li class="<?php if($flag=="personnal_info"){echo "cur";}?> personnal_info"><a href=index.php>个人信息管理</a></li>
                        <li class="<?php if($flag=="mylesson"){echo "cur";}?> mylesson"><a href=index.php?action=mylesson>我的课程管理</a></li>
                        <li class="<?php if($flag=="tome_message"){echo "cur";}?> tome_message"><a href=index.php?action=tome_message>学生给我的留言</a></li>
                        <li class="<?php if($flag=="admin_sent"){echo "cur";}?> admin_sent"><a href=index.php?action=admin_sent>管理员发送的消息</a></li>
                        <li class="teacher_logout">退出登录</li>
                    </ul>
                </div>
            </div>
            <div class="right">
            	<?php if($flag=="personnal_info"){?>
            	<div class="stu_part">
                	<div class="stu_info_title">我的信息</div>
                    <table class="stu_info_table">
                        <tbody>
                        <tr><th>姓名</th><th>email</th><th>状态</th></tr>
                        <tr><td><?php echo $teacher["name"]?></td><td><?php echo $teacher["email"]?></td><td><a href=#>已激活</a></td></tr>
                        </tbody>
                    </table>
                </div>
                <!--stu_info end--> 
                <?php }?>
                <?php if($flag=="mylesson"){?>
                <div class="kecheng_part">
                	<div class="stu_info_title">我的课程</div>
                    <table class="stu_info_table">
                        <tbody>
                        <tr><th>课程名字</th><th>分类</th></tr>
                        <?php while($mylesson = mysql_fetch_array($mylesson_result)){?>
                        <tr><td><a target="_blank" href=../lesson.php?action=<?php echo base64_encode($mylesson["id"])?>><?php echo $mylesson["kechengname"]?></a></td><td><?php echo $mylesson["kechengclassify"]?></td></tr>
                        <?php }?>
                        </tbody>
                    </table>
                    <div class="page">
                        <ul>
                            <li class="first">首页</li>
                            <li class="pre">&lt;</li>
                            <li class="next">&gt;</li> 
                            <li class="last">尾页</li> 
                            <li class="total">共<span>5</span>页</li>
                            <li class="current">当前<span>3</span>/<span>5</span>页</li>
                        </ul>
                    </div>
                </div>
                <!--kecheng_part end--> 
                <?php }?>
                 <?php if($flag=="tome_message"){?>
                <div class="kecheng_part">
                	<div class="stu_info_title">我收到的学生留言</div>
                    <ul class="message_content">
                    	<?php while($mymessage = mysql_fetch_array($mymessage_result)){?>
                        <li>
                        	<div class="message_title"><?php echo $mymessage["liuyan_content"]?></div>
                            <div class="message_author"><div class="liuyanzhe">留言学生:<span style="color:#35b558;display:inline-block"><?php echo $mymessage["liuyan_author"]?></span></div><div class="message_time"><?php echo date("Y-m-d H:i:s",$mymessage["addtime"])?></div><div class="status"><?php echo $mymessage["status"]==0?"<em style=color:orange>未回答</em>":"已回答"?></div><div class="replay"><a href=<?php echo $mymessage["status"]==0?"huifu_liuyan.php?action=huifu_liuyan&liuyan_id=".$mymessage["id"]."":"#"?>><?php echo $mymessage["status"]==0?"现在回答":"已回答"?></a></div></div>
                            <?php 
								$myhuifu_result = mysql_query("select * from huifuliuyan where huifu_id = '{$mymessage["id"]}'");
								while($myhuifu = mysql_fetch_array($myhuifu_result)){
							?>
                            <div class="my_huifu">我的回复:</div>
                            <div class="huifu_content"><?php echo $myhuifu["huifu_content"]?></div>
                            <div class="huifu_time"><?php echo date("Y-m-d H:i:s",$myhuifu["addtime"])?></div>
                            <div class="clear_both"></div>
                        </li>
                        <?php }}?>
                    </ul>
                    <div class="page">
                        <ul>
                            <li class="first">首页</li>
                            <li class="pre">&lt;</li>
                            <li class="next">&gt;</li> 
                            <li class="last">尾页</li> 
                            <li class="total">共<span>5</span>页</li>
                            <li class="current">当前<span>3</span>/<span>5</span>页</li>
                        </ul>
                    </div>
                </div>
                <!--kecheng_part end--> 
                <?php }?>
                <?php if($flag=="admin_sent"){?>
                <div class="kecheng_part">
                	<div class="stu_info_title">我收到的通知</div>
                    <ul class="message_content">
                    	<?php while($mytongzhi = mysql_fetch_array($mytongzhi_result)){?>
                        <li class="hover_li">
                        	<div class="message_title"><?php echo $mytongzhi["content"]?></div>
							<div class="sent_status"><div class="laiyuan">来自于管理员:<div class="admin_name"><?php echo $mytongzhi["admin"]?></div><time><?php echo date("Y-m-d H:i:s",$mytongzhi["addtime"])?></time></div><span><?php echo $mytongzhi["status"]==1?"<em style=color:#35b558>已阅读</em>":"<em style=color:orange>未阅读</em>"?></span><a class="biaoji_read" href=index.php?action=biaoji_read&tongzhi_id=<?php echo $mytongzhi["id"]?>>标记为已阅读</a></div>	                         
                        </li>
                        <?php }?>
                    </ul>
                    <div class="page">
                        <ul>
                            <li class="first">首页</li>
                            <li class="pre">&lt;</li>
                            <li class="next">&gt;</li> 
                            <li class="last">尾页</li> 
                            <li class="total">共<span>5</span>页</li>
                            <li class="current">当前<span>3</span>/<span>5</span>页</li>
                        </ul>
                    </div>
                </div>
                <!--kecheng_part end--> 
                <?php }?>
                <div class="clear_both"></div>
            </div>
            <!--right end-->
            <div class="clear_both"></div>
        </div>

        </div>
    </div>
     <div id="totop">
    </div>
    <div class="cr">Copyright &copy 2015-05-05 by lshaluminum 1169558697@qq.com.  all right reserved</div>
</body>
</html>