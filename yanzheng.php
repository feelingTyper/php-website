<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<?php 
	$conn = @mysql_connect("localhost","root","123456") or die("数据库连接失败");
	mysql_select_db("myeducation",$conn);
	mysql_query("set names 'utf8'");
	$name = $_POST["username"];
	$sql = "select * from users where name='$name'";
	$result = @mysql_query($sql,$conn);
	$result_num = @mysql_num_rows($result);
	switch($_GET["action"]){
		case "denglu":
			if($result_num){
				echo "用户名存在";
			}else{
				echo "用户名不存在";	
			}
			break;
		case "zhuce":
			if($result_num){
				echo "用户名已存在！";
			}else{
				echo "用户名可用";	
			}
			break;
		default:
			break;
		}
	
	mysql_close($conn);
?>
<body>
</body>
</html>