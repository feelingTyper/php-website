<?php 
	 session_start();
	 header("Content-type:text/html;charset=utf-8");
	 print("<html><b>");
	 $sid = session_id();
	 print("Session ID returned by session_id(): ".$sid."\n");
	 $sid = SID;
	 print("Session ID returned by SID: ".$sid."\n");
	 $mysite = $_SESSION["username"];
	 print("Value of mysite has been retrieved: ".$mysite."\n");
	 $ip = $_SERVER['REMOTE_ADDR'];
	 print("my client ip is".$ip);
	 print("</b></html>\n");
?>