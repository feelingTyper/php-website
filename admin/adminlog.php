<?php 
	session_start();
	$conn = @mysql_connect("localhost","root","123456") or die("数据库连接失败");
	mysql_select_db("myeducation",$conn);
	mysql_query("set names 'utf8'");
	if(isset($_GET["action"])){
		switch($_GET["action"]){
			case "login":
				$admin_name = $_POST["admin_name"];
				$admin_passwd = $_POST["admin_passwd"];
				$admin_result = mysql_query("select * from admin where adminname = '$admin_name' and adminpasswd = '$admin_passwd'");
				if($admin = mysql_fetch_assoc($admin_result)){
					
					$_SESSION["adminname"] = $admin["adminname"];
					//echo $admin["adminname"];
					echo "登录成功";
					
				}else{
					
					echo "登录失败";	
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