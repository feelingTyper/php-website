<?php
		
		
		session_set_save_handler("open","close","read","write","destroy","gc");
		session_start();
		
		function open(){
			global $conn;
			global $ip;
			global $time;
			global $lifetime;
			@$conn = mysql_connect("localhost","root","123456") or die("fail to connect database");
			mysql_select_db("myeducation",$conn);
			mysql_query("set names 'utf-8'");
			$ip = !empty($_SERVER["REMOTE_ADDR"])?$_SERVER["REMOTE_ADDR"]:"unknown";
			$time = time();
			$lifetime = ini_get("session.gc.maxlifetime");
			return true;
		}
		
		function close(){
			
			return true;
		}
		function read($PHPSESSID){
			global $conn;
			global $ip;
			global $time;
			global $lifetime;	
			$sql = "select * from session where PHPSESSID='$PHPSESSID'";
			$result = mysql_query($sql,$conn);
			
			if(!$result_array = mysql_fetch_assoc($result)){
				return '';
			}
			if($ip !=$result_array["client_ip"]){
				destroy($PHPSESSID);
				return '';
			}
			if(($result_array["update_time"]+$lifetime)<$time){
				destroy($PHPSESSID);
				return '';
			}
			return $result_array["data"];
		}
		function write($PHPSESSID,$data){
			global $conn;
			global $ip;
			global $time;
			global $lifetime;	
			$sql = "select * from session where PHPSESSID='$PHPSESSID'";
			$result = mysql_query($sql,$conn);
			$result_array = mysql_fetch_assoc($result);
			
			if(mysql_num_rows($result)){
				if($data != $result_array["data"] || ($result_array["update_time"]+30)<$time){
					$sql = "update session set update_time ='$time',data='$data' where PHPSESSID='$PHPSESSID'";
					mysql_query($sql,$conn);
				}
			}else if(!empty($data)){
					$sql = "insert session(PHPSESSID,update_time,client_ip,data) values('$PHPSESSID','$time','$ip','$data')";
					mysql_query($sql,$conn);
				}
			return true;
		}
		function destroy($PHPSESSID){
			global $conn;
			global $ip;
			global $time;
			global $lifetime;	
			$sql = "delete from session where PHPSESSID='$PHPSESSID'";
			mysql_query($sql,$conn);
			return true;
		}
		function gc(){
			global $conn;
			global $ip;
			global $time;
			global $lifetime;	
			$valid_time = $time-$lifetime;
			$sql = "delete from session where update_time < '$valid_time'";
			mysql_query($sql,$conn);
		}	

?>