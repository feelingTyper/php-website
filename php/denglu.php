<?php
	session_start();
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
					$_SESSION['username'] = $name;
					$_SESSION['login'] = 1;
					}
					else{
							echo "密码错误";
						}
				break;
			case "zhuce":
				$name = $_POST["username"];
				$passwd = $_POST["userpasswd"];
				$email = $_POST["useremail"];
				$sql = "insert into users(name,passwd,email)values('$name','$passwd','$email')";
				mysql_query($sql,$conn);
				$msg = "注册成功";
				echo $msg;
				break;
			case "logout":
				setcookie(session_name(),"",time()-3600,'/');
				session_unset();
				session_destroy();
				break;
		}
	
	mysql_close($conn);
?>
