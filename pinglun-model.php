<?php
	@$conn = mysql_connect("localhost","root","123456") or die("数据库连接失败");
	mysql_select_db("myeducation",$conn);
	mysql_query("set names 'utf8'");
	if(isset($_GET["action"])){
	switch ($_GET["action"]){
		case "comment":
			$author = $_POST["author"];
			$content = $_POST["content"];
			$time = time();
			$parentname = "self";
			$sql = "insert into comment values(null,'$author','$content',0,0,'$parentname',0,'$time')";
			mysql_query($sql,$conn);
			$sql = "select * from comment where parentname= 'self' order by addtime desc";
			$comment_result = mysql_query($sql,$conn);
		break;
		case "huifu":
			$parentname = $_POST["parentname"];
			$huifuauthor = $_POST["huifuauthor"];
			$huifucontent = $_POST["huifucontent"];
			$parentid = $_POST["parentid"];
			$time = time();
			$sql = "insert into comment values(null,'$huifuauthor','$huifucontent',0,'$parentid','$parentname',0,'$time')";
			mysql_query($sql,$conn);
		break;
	}

	}else{
	$sql = "select * from comment where parentname= 'self' order by addtime desc";
	$comment_result = mysql_query($sql,$conn);
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
<?php while($all_comment = mysql_fetch_array($comment_result)){?>
<div class="commend-li">
    <input type=hidden class="hidden-pid" value ="<?php echo $all_comment["id"]?>"/>
    <div class="user-img"><img src="img/al.jpg" /></div>
    <div class="commend-right">
        <div class="user-name"><a href="#"><?php echo $all_comment["author"]?></a></div>
        <div class="commend-content"><p><?php echo $all_comment["content"]?></p></div>
        <div class="commend-addtime"><i class="time-i"><?php echo T($all_comment["addtime"])?></i></div>
        <div class="zhhf">
            <div class="support">赞(<em><?php echo $all_comment["support"]?></em>)</div>
            <div class="applay">回复(<i class="num-i"><?php echo $all_comment["replay"]?></i>)</div>
        </div>
    </div>
    <div class="clear-both"></div>
    <!--subreplay-->
    <div class="subreplaycentent">
        <div class="sub-contentmodel">
            <?php 
                $parent_name = $all_comment["author"];
                $parent_id = $all_comment["id"];
                $all_huifu_result = mysql_query("select * from comment where parentname = '$parent_name' and parentid = '$parent_id'");
                while($all_huifu = mysql_fetch_array($all_huifu_result)){
             ?>
             <div class="one-submodel">
                <div class="subname">
                    <div class="subname-img"><img src="img/al.jpg" /></div>
                    <a href="#"><?php echo $all_huifu["author"]?></a>
                </div>
                <div class="subcontent"><?php echo $all_huifu["content"]?></div>
                <div class="clear-both"></div>
                <div class="subtime"><?php echo T($all_huifu["addtime"])?></div>
                <div class="subsubrep">回复</div>
                <div class="clear-both"></div>
             </div>
             <?php }?>
        </div>                            
        <div class="applay-expand">
            <div class="huifu clearfix">
                <form name="huifu-form" class="huifu-form" method="post" action>
                    <textarea class="huifu-textcontent" name="huifu-textcontent" placeholder="回复内容" maxlength="50"></textarea>
                </form>
                <div class="huifu-num-counter"><i>0</i>/50</div>
                <div class="huifu-confirm">发布</div>
                 
            </div>
            <div class="clear-both"></div>
       </div>
       <div class="clear-both"></div>
    </div>
    <!--subreplayend-->
    <div class="clear-both"></div>
</div>
<!--one-li-->
<?php }?>