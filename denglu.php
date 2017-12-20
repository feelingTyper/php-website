<?php
	include("session.class.php");
	header("Content-type: text/html; charset=UTF-8");
	@$conn = mysql_connect("localhost","root","123456") or die("数据库连接失败");
	mysql_select_db("myeducation",$conn);
	mysql_query("set names 'utf8'");
	switch($_GET["action"]){
			case "denglu":
				$name = $_POST["username"];
				$passwd = $_POST["userpasswd"];
				$sql = "select * from users where name='$name' and passwd='$passwd'";
				$result = mysql_query($sql,$conn);
				$result_num = mysql_num_rows($result);
				if($result_num){
					$mymsg = "登陆成功";
					echo $mymsg;
					session_id();
					$_SESSION['username'] = $name;
					$_SESSION['login'] = 1;
				}else{
					$mymsg = "密码错误";
					echo $mymsg;
					}
				break;
			case "zhuce":
				$name = $_POST["username"];
				$passwd = $_POST["userpasswd"];
				$email = $_POST["useremail"];
				$sql = "insert into users values(null,'$name','$passwd','$email')";
				mysql_query($sql,$conn);
				$msg = "注册成功";
				echo $msg;
				break;
			case "logout":
				//$sessionid = session_id();
				//mysql_query("delete from online where sessionid = '$sessionid'");
				session_unset();
				session_destroy();
				setcookie(session_name(),"",time()-3600,'/');
				//echo $sessionid;
				break;
			case "liuyan":
				$liuyan_teacher = $_POST["liuyan_teacher"];
				$liuyan_content = $_POST["liuyan_content"];
				$liuyan_author = $_POST["liuyan_author"];
				$time = time();
				$status = 0;
				mysql_query("insert into liuyan values(null,'$liuyan_teacher','$liuyan_content','$liuyan_author','$time','$status')");
				$msg = "留言成功，请注意查看老师的回复。";
				echo $msg;
				break;
			case "changepasswd":
				$newpasswd = $_POST["newpasswd"];
				$changepasswd_username = $_POST["changepasswd_username"];
				mysql_query("update users set passwd = '$newpasswd' where name='$changepasswd_username'");
				$msg = "密码修改成功";
				echo $msg;
				break;
		}
	
	mysql_close($conn);
?>
