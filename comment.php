<?php 
include("online.php");
if(isset($_GET["action"])){
	$kecheng = base64_decode($_GET["action"]);
	switch ($_GET["action"]){
		case "comment":
			$author = $_POST["author"];
			$content = $_POST["content"];
			$time = time();
			$parentname = "self";
			$kechengid = $_POST["kechengid"];
			$sql = "insert into comment values(null,'$author','$content',0,0,'$parentname','$kechengid',0,'$time')";
			mysql_query($sql,$conn);
			echo mysql_insert_id();
			$sql = "select * from comment where parentname= 'self' and kechengid = '$kechengid' order by addtime desc";
			$comment_result = mysql_query($sql,$conn);
		break;
		case "huifu":
			$parentname = $_POST["parentname"];
			$huifuauthor = $_POST["huifuauthor"];
			$huifucontent = $_POST["huifucontent"];
			$parentid = $_POST["parentid"];
			$time = time();
			$sql = "insert into comment values(null,'$huifuauthor','$huifucontent',0,'$parentid','$parentname',0,0,'$time')";
			mysql_query($sql,$conn);
			$replay_num_serch = mysql_query("select count(*) from comment where parentid = '$parentid'");
			$replay_num = mysql_fetch_array($repaly_num_serch);
			$replay_num_new = ++$relay_num["count(*)"];
			mysql_query("update comment set replay = $replay_num_new where id = '$parentid'");
		break;
		case "support":
			$support = $_POST["support"];
			$id = $_POST["id"];
			mysql_query("update comment set support = '$support' where id = '$id'");
		break;
		default:
			$kecheng = base64_decode($_GET["action"]);
			$result = mysql_query("select * from kecheng where id ='$kecheng'");
			$kecheng_result = mysql_fetch_array($result);
			break;
	}
	$sql = "select * from comment where parentname= 'self' and kechengid = '$kecheng' order by addtime desc";
	$comment_result = mysql_query($sql,$conn);
	$all_comment_num = mysql_num_rows($comment_result);
	}else{
	header("location:kecheng.php");
	}
	function T($time)
		{
		   //获取今天凌晨的时间戳
		   $day = strtotime(date('Y-m-d',time()));
		   //获取昨天凌晨的时间戳
		   $pday = strtotime(date('Y-m-d',strtotime('-1 day')));
		   //获取现在的时间戳
		   $nowtime = time();
			
		   $tc = $nowtime-$time;
		   if($time<$pday){
			  $str = date('Y-m-d H:i:s',$time);
		   }else if($time<$day && $time>$pday){
			  $str = "昨天";
		   }else if($tc>60*60){
			  $str = floor($tc/(60*60))."小时前";
		   }else if($tc>60){
			  $str = floor($tc/60)."分钟前";
		   }else{
			  $str = "刚刚";
		   }
		   return $str;
		}
?>