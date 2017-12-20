<?php 
session_start();
if(isset($_SESSION["adminname"])){
}else{
	header("location:index.php");
}
@$conn = mysql_connect("localhost","root","123456") or die("数据库连接失败");
mysql_select_db("myeducation",$conn);
mysql_query("set names 'utf8'");
$stu_info_result = mysql_query("select * from users");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DHU-info_management</title>
<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/adminJquery.js"></script>
<link href=../css/info_management.css type=text/css rel=stylesheet />
</head>

<body>
	<div class="title">DHU心理网站后台管理系统</div>
	<div class="container">
    	<div class="bt">
        	<div class="welcome_admin">欢迎管理员&nbsp;&nbsp;<span><?php echo $_SESSION["adminname"]?></span>&nbsp;&nbsp;登录后台管理系统</div>
            <div class="clear_both"></div>
        </div>
        <div class="student_info">
        	<div class="left">
            	<div class="fenlei">
                	<ul>
                    	<li class="cur stu_info">学生信息管理</li>
                        <li class="teacher_info">老师信息管理</li>
                        <li class="lesson_info">课程信息管理</li>
                        <li class="stuforum_info">学生论坛信息管理</li>
                        <li class="stumessage_info">学生留言信息管理</li>
                        <li class="stucomment_info">学生评论信息管理</li>
                        <li class="logout">退出系统</li>
                    </ul>
                </div>
            </div>
            <div class="right">
            	<div class="stu_part">
                	<div class="stu_info_title">学生信息</div>
                    <table class="stu_info_table">
                        <tbody>
                        <tr><th>姓名</th><th>email</th><th>状态</th><th>Ta的帖子</th><th>Ta的留言</th><th>Ta的评论</th></tr>
                        <?php while($stu_info = mysql_fetch_array($stu_info_result)){
							$keyname =$stu_info["name"];
							$stu_status_result = mysql_query("select * from session where data like '%$keyname%' ");
							if(mysql_num_rows($stu_status_result)){
								$status = "<span style=color:#35b558>在线</span>";
							}else{
								
								 $status = "不在线";
								 }
						?>
                        <tr><td><?php echo $stu_info["name"]?></td><td><?php echo $stu_info["email"]?></td><td><?php echo $status?></td><td><a target="_blank" href=chakan.php?action=his_tiezi&author=<?php echo $stu_info["name"]?>>查看</a></td><td><a target="_blank" href=chakan.php?action=his_liuyan&author=<?php echo $stu_info["name"]?>>查看</a></td><td><a target="_blank" href=chakan.php?action=his_pinglun&author=<?php echo $stu_info["name"]?>>查看</a></td></tr>
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
                <!--stu_info end--> 
                
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