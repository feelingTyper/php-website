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
		case "huifu_liuyan":
			$flag = "huifu_liuyan";
			$id = $_GET["liuyan_id"];
			$liuyan_result = mysql_query("select * from liuyan where id = '$id'");
			$liuyan = mysql_fetch_array($liuyan_result);
		break;
		case "huifu_liuyan_confirm":
			$teacher = $_POST["teacher"];
			$student = $_POST["student"];
			$liuyan_id = $_POST["liuyan_id"];
			$content = $_POST["content"];
			$time = time();
			mysql_query("insert into huifuliuyan values(null,'$teacher','$student','$liuyan_id','$time','$content')");
			mysql_query("update liuyan set status = 1 where id ='$liuyan_id'");
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
        <div class="center">
        
        	<div class="student_info">
            	<?php if($flag=="huifu_liuyan"){?>
                <div class="stu_info_title">回复的留言</div>
                 <div class="message_author"><div class="liuyanzhe">留言学生:<span style="color:#35b558;display:inline-block"><?php echo $liuyan["liuyan_author"]?></span></div><div class="message_time"><?php echo date("Y-m-d H:i:s",$liuyan["addtime"])?></div>
                 <div class="clear_both"></div>
                <div class="liuyan_content_id"><?php echo $liuyan["liuyan_content"]?></div>
                <div class="huifu_title">回复</div>
                <textarea class="huifu_liuyan_val" placeholder="输入回复信息"></textarea>
                <div class="huifu_confirm">确定回复</div>
                <script type=text/javascript>
                	$(function(){
						$(".huifu_confirm").click(function(){
							var teacher = "<?php echo $name;?>";
							var student = "<?php echo $liuyan['liuyan_author'];?>";
							var liuyan_id = "<?php echo $liuyan['id'];?>";
							//alert(liuyan_id);
							var content = $(".huifu_liuyan_val").val();
							if(content==""){alert("填写内容");}else{
								$.post("huifu_liuyan.php?action=huifu_liuyan_confirm",{"teacher":teacher,"student":student,"liuyan_id":liuyan_id,"content":content},function(data){window.location.href="index.php?action=tome_message"});
							}
								});
					});
                </script>
                <?php }?>
                <div class="clear_both"></div>
       		</div>
        </div>
    </div>
     <div id="totop">
    </div>
    <div class="cr">Copyright &copy 2015-05-05 by lshaluminum 1169558697@qq.com.  all right reserved</div>
</body>
</html>