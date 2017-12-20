<?php 
@$conn = mysql_connect("localhost","root","123456") or die("数据库连接失败");
mysql_select_db("myeducation",$conn);
mysql_query("set names 'utf8'");

if(isset($_GET["action"])){
	switch($_GET["action"]){
		case "teacher_info":
			$flag = "teacher_part";
			$teacher_info_result = mysql_query("select * from teacher");
		break;
		case "lesson_info":
			$flag = "lesson_part";
			$lesson_info_result = mysql_query("select * from kecheng");
		break;
		case "stuforum_info":
			$flag = "forum_part";
			$stuforum_info_result = mysql_query("select * from tiezi limit 10");
		break;
		case "stumessage_info":
			$flag = "message_part";
			$stumessage_info_result = mysql_query("select * from liuyan limit 10");
		break;
		case "stucomment_info":
			$flag = "comment_part";
			$stucomment_info_result = mysql_query("select * from comment where parentid = 0 limit 10");
		break;
		case "1":
		
			$id = $_GET["teacher_id"];
			mysql_query("update teacher set status = 0 where id ='$id'");
			header("location:info_management.php");
		break;
		case "0":
			
			$id = $_GET["teacher_id"];
			mysql_query("update teacher set status = 1 where id ='$id'");
			header("location:info_management.php");
		break;
		case "teacher_del":
			
			$id = $_GET["teacher_id"];
			mysql_query("delete from teacher where id ='$id'");
			header("location:info_management.php");
		break;
		case "lesson_del":
			
			$id = $_GET["lesson_id"];
			mysql_query("delete from kecheng where id ='$id'");
			header("location:info_management.php");
		break;
		case "tiezi_del":
			
			$id = $_GET["tiezi_id"];
			mysql_query("delete from tiezi where id ='$id'");
			header("location:info_management.php");
		break;
		case "stumessage_del":
			
			$id = $_GET["stumessage_id"];
			mysql_query("delete from liuyan where id ='$id'");
			header("location:info_management.php");
		break;
		case "stucomment_del":
			
			$id = $_GET["stucomment_id"];
			mysql_query("delete from comment where id ='$id'");
			header("location:info_management.php");
		break;
		case "lesson_edit":
			
			$id = $_GET["lesson_id"];
			$title = $_POST["title"];
			$author = $_POST["author"];
			$src = $_POST["src"];
			$jianjie = $_POST["jianjie"];
			$time = $_POST["time"];
			$img = $_POST["img"];
			$classify = $_POST["classify"];
			mysql_query("update kecheng set kechengname='$title',kechengauthor='$author',kechengsrc='$src',kechengjianjie='$jianjie',kechengtime='$time', videoimg='$img',kechengclassify='$classify' where id ='$id'");
		break;
		case "lesson_add":
			$title = $_POST["title"];
			$author = $_POST["author"];
			$src = $_POST["src"];
			$jianjie = $_POST["jianjie"];
			$time = $_POST["time"];
			$img = $_POST["img"];
			$classify = $_POST["classify"];
			mysql_query("insert into kecheng values(null,'$title','$author','$src','$jianjie','$time','$img','$classify')");
		break;
		
		
	}
}else{
		$flag = "stu_part";
		$stu_info_result = mysql_query("select * from users");
	}
?>
<?php if($flag=="stu_part"){?>
<div class="stu_part">
    <div class="stu_info_title">学生信息</div>
    <table class="stu_info_table">
        <tbody>
        <tr><th>姓名</th><th>email</th><th>状态</th><th>Ta的帖子</th><th>Ta的留言</th><th>Ta的评论</th></tr>
        <?php while($stu_info = mysql_fetch_array($stu_info_result)){
            $keyname =$stu_info["name"];
            $stu_status_result = mysql_query("Select * from session where data like '%$keyname%' ");
            if(mysql_num_rows($stu_status_result)){
                $status = "<span style=color:#35b558>在线</span>";
            }else{
                
                 $status = "不在线";
                 }
        ?>
        <tr><td><?php echo $stu_info["name"]?></td><td><?php echo $stu_info["email"]?></td><td><?php echo $status?></td><td><a href=chakan.php?action=his_tiezi&author=<?php echo $stu_info["name"]?>>查看</a></td><td><a href=chakan.php?action=his_liuyan&author=<?php echo $stu_info["name"]?>>查看</a></td><td><a href=chakan.php?action=his_pinglun&author=<?php echo $stu_info["name"]?>>查看</a></td></tr>
        <?php }?>
        </tbody>
    </table>
    <div class="page">
        <ul>
            <li class="first">首页</li>
            <li class="pre">&lt;</li>
            <li class="next">&gt;</li> 
            <li class="last">尾页</li> 
            <li class="total">共<span>5</span>页</li>
            <li class="current">当前<span>3</span>/<span>5</span>页</li>
        </ul>
    </div>
</div>
<!--stu_info end--> 
<?php }?>
<?php if($flag == "teacher_part"){?>
    <div class="teacher_part">
    <div class="stu_info_title">教师信息</div>
    <table class="stu_info_table">
        <tbody>
        <tr><th>姓名</th><th>email</th><th>Ta的课程</th><th>激活状态</th><th>激活</th><th>删除</th></tr>
        <?php while($teacher_info = mysql_fetch_array($teacher_info_result)){?>
        <tr><td><?php echo $teacher_info["name"]?></td><td><?php echo $teacher_info["email"]?></td><td><?php echo $teacher_info["lesson"]==""?"暂无":$teacher_info["lesson"];?></td><td><?php echo $teacher_info["status"]=="0"?"<em style=color:orange>未激活</em>":"<em style=color:#35b558>已激活</em>";?></td><td><a class="teacher_active" href=doaction.php?action=<?php echo $teacher_info["status"]?>&teacher_id=<?php echo $teacher_info["id"]?>><?php echo $teacher_info["status"]=="0"?"激活":"<em style=color:orange>冻结</em>";?></a></td><td><a class="teacher_del" href=doaction.php?action=teacher_del&teacher_id=<?php echo $teacher_info["id"]?>>删除</a></td></tr>
        <?php }?>
        </tbody>
    </table>
    <div class="page">
        <ul>
            <li class="first">首页</li>
            <li class="pre">&lt;</li>
            <li class="next">&gt;</li> 
            <li class="last">尾页</li> 
            <li class="total">共<span>5</span>页</li>
            <li class="current">当前<span>3</span>/<span>5</span>页</li>
        </ul>
    </div>
    </div>
    <!--teacher_part end-->
<?php }?> 
<?php if($flag == "lesson_part"){?>   
    <div class="lesson_part">
    <div class="stu_info_title">课程信息</div>
    <table class="stu_info_table">
        <tbody>
        <tr><th>课程名程</th><th>课程简介</th><th>课程分类</th><th>所属老师</th><th>删除</th><th>修改</th></tr>
        <?php while($lesson_info = mysql_fetch_array($lesson_info_result)){?>
        <tr><td><?php echo $lesson_info["kechengname"]?></td><td><a href=../lesson.php?action=<?php echo base64_encode($lesson_info["id"])?>><?php echo mb_substr($lesson_info["kechengjianjie"],0,20,"utf8")."。。。"?></a></td><td><?php echo $lesson_info["kechengclassify"]?></td><td><a class="lesson_author" href=javascript:;><?php echo $lesson_info["kechengauthor"]?></a></td><td><a class="lesson_del" href=doaction.php?action=lesson_del&lesson_id=<?php echo $lesson_info["id"]?>>删除</a></td><td><a target="_blank" href=chakan.php?action=lesson_edit&lesson_id=<?php echo $lesson_info["id"]?>>修改</a></td></tr>
        <?php }?>
        </tbody>
    </table>
    <div class="lesson_add"><a href=chakan.php?action=lesson_add>添加新课程</a></div>
    <div class="page clear_both">
        <ul>
            <li class="first">首页</li>
            <li class="pre">&lt;</li>
            <li class="next">&gt;</li> 
            <li class="last">尾页</li> 
            <li class="total">共<span>5</span>页</li>
            <li class="current">当前<span>3</span>/<span>5</span>页</li>
        </ul>
    </div>
    </div>
    <!--lesson_part end-->
     <?php }?>
    <?php if($flag == "forum_part"){?>
    <div class="forum_part">
    <div class="stu_info_title">帖吧信息</div>
    <table class="stu_info_table">
        <tbody>
        <tr><th>帖子作者</th><th>帖子标题</th><th>帖子分类</th><th>删除帖子</th></tr>
        <?php while($stuforum_info = mysql_fetch_array($stuforum_info_result)){?>
        <tr><td><a href=#><?php echo $stuforum_info["author"]?></a></td><td><a target="_blank" href=../luntan_content.php?tiezicontent=<?php echo base64_encode($stuforum_info["id"])?>><?php echo $stuforum_info["title"]?></a></td><td><?php echo $stuforum_info["classify"]?></td><td><a class="tiezi_del" href=doaction.php?action=tiezi_del&tiezi_id=<?php echo $stuforum_info["id"]?>>删除帖子</a></td></tr>
        <?php }?>
        </tbody>
    </table>
    <div class="page">
        <ul>
            <li class="first">首页</li>
            <li class="pre">&lt;</li>
            <li class="next">&gt;</li> 
            <li class="last">尾页</li> 
            <li class="total">共<span>5</span>页</li>
            <li class="current">当前<span>3</span>/<span>5</span>页</li>
        </ul>
    </div>
    </div>
    <!--forum_part end-->
     <?php }?>
    <?php if($flag == "message_part"){?>
    <div class="message_part">
    <div class="stu_info_title">留言信息</div>
    <table class="stu_info_table">
        <tbody>
        <tr><th>留言作者</th><th>指定老师</th><th>留言时间</th><th>是否答复</th><th>通知老师</th><th>删除留言</th></tr>
        <?php while($stumessage_info = mysql_fetch_array($stumessage_info_result)){?>
        <tr><td><?php echo $stumessage_info["liuyan_author"]?></td><td><?php echo $stumessage_info["liuyan_teacher"]?></td><td><?php echo date("Y-m-d H:i:s",$stumessage_info["addtime"])?></td><td><?php echo $stumessage_info["status"]==0?"<em style=color:orange>否</em>":"是"?></td><td><a href=<?php echo $stumessage_info["status"]==0?"chakan.php?action=liuyan_answer&teacher_name=".$stumessage_info["liuyan_teacher"]:"#"?>><?php echo $stumessage_info["status"]==0?"<em style=color:orange>通知</em>":"/"?></a></td><td><a class="tiezi_del" href=doaction.php?action=stumessage_del&stumessage_id=<?php echo $stumessage_info["id"]?>>删除留言</a></td></tr>
        <?php }?>
        </tbody>
    </table>
    <div class="page">
        <ul>
            <li class="first">首页</li>
            <li class="pre">&lt;</li>
            <li class="next">&gt;</li> 
            <li class="last">尾页</li> 
            <li class="total">共<span>5</span>页</li>
            <li class="current">当前<span>3</span>/<span>5</span>页</li>
        </ul>
    </div>
    </div>
    <!--message_part end-->
     <?php }?>
    <?php if($flag == "comment_part"){?>
    <div class="comment_part">
    <div class="stu_info_title">评论信息</div>
    <table class="stu_info_table">
        <tbody>
        <tr><th>评论作者</th><th>评论内容</th><th>关联课程</th><th>删除评论</th></tr>
        <?php while($stucomment_info = mysql_fetch_array($stucomment_info_result)){
			$lesson_result = mysql_query("select kechengname from kecheng where id = {$stucomment_info["kechengid"]}");
			$lesson = mysql_fetch_assoc($lesson_result);
		?>
        <tr><td><?php echo $stucomment_info["author"]?></td><td><a target="_blank" href=../lesson.php?action=<?php echo base64_encode($stucomment_info["kechengid"])?>><?php echo mb_substr($stucomment_info["content"],0,10,"utf8")?></a></td><td><?php echo $lesson["kechengname"]?></td><td><a class="comment_del" href=doaction.php?action=stucomment_del&stucomment_id=<?php echo $stucomment_info["id"]?>>删除</a></td></tr>
        <?php }?>
        </tbody>
    </table>
    <div class="page">
        <ul>
            <li class="first">首页</li>
            <li class="pre">&lt;</li>
            <li class="next">&gt;</li> 
            <li class="last">尾页</li> 
            <li class="total">共<span>5</span>页</li>
            <li class="current">当前<span>3</span>/<span>5</span>页</li>
        </ul>
    </div>
    </div>
    <!--comment_part end-->
    <?php }?>
    <div class="clear_both"></div>