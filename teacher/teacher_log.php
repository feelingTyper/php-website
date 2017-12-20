<?php 
	session_start();
	$conn = @mysql_connect("localhost","root","123456") or die("数据库连接失败");
	mysql_select_db("myeducation",$conn);
	mysql_query("set names 'utf8'");
	if(isset($_GET["action"])){
		switch($_GET["action"]){
			case "login":
				$teacher_name = $_POST["teacher_name"];
				$teacher_passwd = $_POST["teacher_passwd"];
				$teacher_result = mysql_query("select * from teacher where name = '$teacher_name' and passwd = '$teacher_passwd'");
				if($teacher = mysql_fetch_assoc($teacher_result)){
					if($teacher["status"]==0){
						echo "账号未激活,登录失败";
					}else{
						$_SESSION["teachername"] = $teacher["name"];
						echo "登录成功";
						}
				}else{
					
					echo "密码错误或用户不存在，登录失败";	
				}
			break;
			case "logout":
				session_unset();
				session_destroy();
				setcookie(session_name(),"",time()-3600,'/');
			break;
		}	
	
	}
	
?>