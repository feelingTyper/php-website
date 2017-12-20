<?php
	include("session.class.php");
	@$conn = mysql_connect("localhost","root","123456") or die("数据库连接失败");
	mysql_select_db("myeducation",$conn);
	mysql_query("set names 'utf8'");
	$session_id = session_id();
	$result_online = mysql_query("select * from session where PHPSESSID='$session_id'");
	if(mysql_num_rows($result_online)){
		$loginrow = mysql_fetch_assoc($result_online);
		$data = $loginrow['data'];
		$loginname = $_SESSION["username"];
	}
?>
