<?php 
	$conn = @mysql_connect("localhost","root","123456") or die("数据库连接失败");
	mysql_select_db("myeducation",$conn);
	mysql_query("set names 'utf8'");
	$author = $_POST["author"];
	$tiezi_id = $_POST["tiezi_id"];
	$comment_content = $_POST["comment_content"];
	$time = time();
	$dianping = null;
	$dianpingauthor = null;
	$sql = "insert into huifutiezi values(null,'$author','$tiezi_id','$time','$dianping','$comment_content','$dianpingauthor')";
	mysql_query($sql,$conn);
	$result = mysql_query("select count(*) from huifutiezi where tieziid = '$tiezi_id'");
	$result_data = mysql_fetch_array($result);
	mysql_query("update tiezi set replaynum ={$result_data['count(*)']} where id = '$tiezi_id'");
?>
<li>
    <div class="comment-author">
        <div class="author_img"><a href=#><img src=img/al.jpg /></a></div>
    </div>
    <div class="comment_right_content">
        <div class="right_author"><a href=#><?php echo $author?></a> <span>发表于</span><time>刚刚</time><em><?php echo $result_data["count(*)"]?><span>#</span></em></div>
        <div class="right_content"><p><?php echo $comment_content?></p></div>
        <div class="pinglun_huifu_zhichi"><span>点评</span><span>支持</span><span>回复</span></div>
    </div>
    <div class="clear-both"></div>
</li>
<?php mysql_close($conn)?>