<?php 
	session_start();
	@$conn = mysql_connect("localhost","root","123456") or die("数据库连接失败");
	mysql_select_db("myeducation",$conn);
	mysql_query("set names 'utf8'");
	if(isset($_SESSION["adminname"])){
	}else{
		header("location:index.php");
	}
	
	if(isset($_GET["action"])){
		switch($_GET["action"]){
			case "his_tiezi":
				$author = $_GET["author"];
				$flag = "his_tiezi";
				$his_tiezi_result = mysql_query("select * from tiezi where author = '$author'");
			break;
			case "his_liuyan":
				$author = $_GET["author"];
				$flag = "his_liuyan";
				$his_liuyan_result = mysql_query("select * from liuyan where liuyan_author = '$author'");
			break;
			case "his_pinglun":
				$author = $_GET["author"];
				$flag = "his_pinglun";
				$his_pinglun_result = mysql_query("select * from comment where author = '$author' and parentid = 0");
			break;
			case "lesson_edit":
				$id = $_GET["lesson_id"];
				$flag = "lesson_edit";
				$lesson_edit_result = mysql_query("select * from kecheng where id = '$id'");
			break;
			case "lesson_add":
				$flag = "lesson_add";
			break;
			case "tiezi_del":
				$author = $_GET["tiezi_author"];
				$id = $_GET["tiezi_id"];
				$flag = "his_tiezi";
				mysql_query("delete from tiezi where id = '$id'");
				$his_tiezi_result = mysql_query("select * from tiezi where author = '$author'");
			break;
			case "liuyan_del":
				$author = $_GET["liuyan_author"];
				$id = $_GET["liuyan_id"];
				$flag = "his_liuyan";
				mysql_query("delete from liuyan where id = '$id'");
				$his_liuyan_result = mysql_query("select * from liuyan where liuyan_author = '$author'");
			break;
			case "pinglun_del":
				$author = $_GET["pinglun_author"];
				$id = $_GET["pinglun_id"];
				$flag = "his_pinglun";
				mysql_query("delete from comment where id = '$id'");
				$his_pinglun_result = mysql_query("select * from comment where author = '$author' and parentid = 0");
			break;
			case "liuyan_answer":
				
				$teacher = $_GET["teacher_name"];
				$flag = "liuyan_answer";
				
			break;
			case "tongzhi_send":
				
				$teacher = $_POST["teacher"];
				$admin = $_POST["admin"];
				$content = $_POST["content"];
				$time = time();
				mysql_query("insert into tongzhiteacher values(null,'$teacher','$admin','$content','$time',0)");
			break;
			
			
		}
	}else{
		header("location:info_management.php");
	}
?>
 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>info_management_view</title>
<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/adminJquery.js"></script>
<link href=../css/info_management.css type=text/css rel=stylesheet />
</head>

<body>
	<div class="title">DHU心理网站后台管理系统</div>
	<div class="container">
    	<div class="bt">
        	<div class="welcome_admin">欢迎管理员&nbsp;&nbsp;<span><?php echo $_SESSION["adminname"]?></span>&nbsp;&nbsp;登录后台管理系统</div>
            <div class="clear_both"></div>
        </div>
        <div class="student_info">
        	<div class="center">
            <?php if($flag=="his_tiezi"){?>
            	<div class="tiezi_part">
                	<div class="stu_info_title">学生<span><?php echo $author?></span>的帖子</div>
                    <div class=tiezi_ul>
                        <ul>
                        	<?php while($his_tiezi = mysql_fetch_array($his_tiezi_result)){?>
                            <li>
                            	<div class="tiezi_title"><a target="_blank" href=../luntan_content.php?tiezicontent=<?php echo base64_encode($his_tiezi["id"])?>><?php echo $his_tiezi["title"]?></a></div>
                                <div class="tiezi_content"><?php echo $his_tiezi["content"]?></div>
                                <span><a>论坛板块:<?php echo $his_tiezi["classify"]?></a><em><?php echo date("Y-m-d H:i:s",$his_tiezi["addtime"])?></em><a href=chakan.php?action=tiezi_del&tiezi_id=<?php echo $his_tiezi["id"]?>&tiezi_author=<?php echo $his_tiezi["author"]?>>删除</a></span>
                                <div class="clear_both"></div>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
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
                <!--tiezi_part end-->
                <?php }?>
                <?php if($flag=="his_liuyan"){?>
                <div class="liuyan_part">
                	<div class="stu_info_title">学生<span><?php echo $author?></span>的留言</div>
                    <div class=tiezi_ul>
                        <ul>
                        	<?php while($his_liuyan = mysql_fetch_assoc($his_liuyan_result)){?>
                            <li>
                            	<div class="liuyan_content"><a href="#"><?php echo $his_liuyan["liuyan_content"]?></a></div>
                                <span><a><?php echo $his_liuyan["liuyan_teacher"]?></a><em><?php echo date("Y-m-d H:i:s",$his_liuyan["addtime"])?></em><em><?php echo $his_liuyan["status"]==0?"尚未答复":"已答复"?></em><a href=chakan.php?action=liuyan_del&liuyan_id=<?php echo $his_liuyan["id"]?>&liuyan_author=<?php echo $his_liuyan["liuyan_author"]?>>删除</a></span>
                                <div class="clear_both"></div>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
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
                <!--liuyan_part end-->
                <?php }?>
                <?php if($flag=="his_pinglun"){?>
                <div class="pinglun_part">
                	<div class="stu_info_title">学生<span><?php echo $author?></span>的评论</div>
                    <div class=tiezi_ul>
                        <ul>
                       		<?php while($his_pinglun = mysql_fetch_assoc($his_pinglun_result)){
								$kechengid = 
								$kecheng_result = mysql_query("select kechengname from kecheng where id = {$his_pinglun['kechengid']}");
								$kecheng = mysql_fetch_assoc($kecheng_result);	
							?>
                           <li>
                            	<div class="pinglun_content"><a href="#"><?php echo $his_pinglun["content"]?></a></div>
                                <span><a>关联课程：<?php echo $kecheng["kechengname"]?></a><em><?php echo date("Y-m-d H:i:s",$his_pinglun["addtime"])?></em><a href=chakan.php?action=pinglun_del&pinglun_id=<?php echo $his_pinglun["id"]?>&pinglun_author=<?php echo $his_pinglun["author"]?>>删除</a></span>
                                <div class="clear_both"></div>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
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
                <!--pinglun_part end-->
                <?php }?>
                <?php if($flag=="lesson_edit"){?>
                <div class="lesson_edit_part">
                	<div class="stu_info_title">修改课程</div>
                    <div class=kecheng_edit_ul>
                           		<table>
                                	<tbody>
                                    	<tr><th>课程名称</th><th>课程老师</th><th>课程资源</th><th>课程简介</th><th>课程时长</th><th>课程图片</th><th>课程分类</th></tr>
                                        <?php while($lesson_edit = mysql_fetch_assoc($lesson_edit_result)){?>
                                        <tr>
                                        	<td><textarea class="lesson_title" type=text><?php echo $lesson_edit["kechengname"]?></textarea></td>
                                            <td><textarea class="lesson_author" type=text ><?php echo $lesson_edit["kechengauthor"]?></textarea></td>
                                            <td><textarea class="lesson_src" type=text><?php echo $lesson_edit["kechengsrc"]?></textarea></td>
                                            <td><textarea class="lesson_jianjie" type=text><?php echo $lesson_edit["kechengjianjie"]?></textarea></td>
                                            <td><textarea class="lesson_time" type=text><?php echo $lesson_edit["kechengtime"]?></textarea></td>
                                            <td><textarea class="lesson_img" type=text><?php echo $lesson_edit["videoimg"]?></textarea></td>
                                            <td><textarea class="lesson_classify" type=text><?php echo $lesson_edit["kechengclassify"]?></textarea></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                                <a class="xiugai" href=javascript:;>修改</a>
                                <script type=text/javascript>
                                	$(".xiugai").click(function(){
									var title = $(".lesson_title").val();
									var author = $(".lesson_author").val();
									var src = $(".lesson_src").val();
									var jianjie = $(".lesson_jianjie").val();
									var time = $(".lesson_time").val();
									var img = $(".lesson_img").val();
									var classify = $(".lesson_classify").val();
									$.post("doaction.php?action=lesson_edit&lesson_id="+<?php echo $id;?>+"",{"title":title,"author":author,"src":src,"jianjie":jianjie,"time":time,"img":img,"classify":classify},function(data){window.location.href="info_management.php";});
									});
                                </script>
                                <div class="clear_both"></div>
                    </div>
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
                <!--lesson_edit_part end-->
                <?php }?>
                <div class="clear_both"></div>
                 <?php if($flag=="lesson_add"){?>
                <div class="lesson_add_part">
                	<div class="stu_info_title">添加课程</div>
                    <div class=kecheng_edit_ul>
                           		<table>
                                	<tbody>
                                    	<tr><th>课程名称</th><th>课程老师</th><th>课程资源</th><th>课程简介</th><th>课程时长</th><th>课程图片</th><th>课程分类</th></tr>
                                        <tr>
                                        	<td><textarea class="lesson_title" type=text placeholder ="必填项"></textarea></td>
                                            <td><textarea class="lesson_author" type=text placeholder ="非必填项"></textarea></td>
                                            <td><textarea class="lesson_src" type=text placeholder ="必填项 格式：video/dhfinal/xxx.mp4"></textarea></td>
                                            <td><textarea class="lesson_jianjie" type=text placeholder ="必填项"></textarea></td>
                                            <td><textarea class="lesson_time" type=text placeholder ="必填项 格式：xx分xx秒"></textarea></td>
                                            <td><textarea class="lesson_img" type=text placeholder ="必填项 格式：img/xxx.jpg"></textarea></td>
                                            <td><textarea class="lesson_classify" type=text placeholder ="必填项"></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a class="tianjia" href=javascript:;>添加</a>
                                 <script type=text/javascript>
                                	$(".tianjia").click(function(){
									var title = $(".lesson_title").val();
									var author = $(".lesson_author").val();
									var src = $(".lesson_src").val();
									var jianjie = $(".lesson_jianjie").val();
									var time = $(".lesson_time").val();
									var img = $(".lesson_img").val();
									var classify = $(".lesson_classify").val();
									if(title!=""&&src!=""&&jianjie!=""&&time!=""&&img!=""&&classify!=""){
										$.post("doaction.php?action=lesson_add",{"title":title,"author":author,"src":src,"jianjie":jianjie,"time":time,"img":img,"classify":classify},function(data){window.location.href="info_management.php"});
									}else{alert("请填写必要选项")}
									});
                                </script>
                                <div class="clear_both"></div>
                    </div>
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
                <!--lesson_add_part end-->
                <?php }?>
                <?php if($flag=="liuyan_answer"){?>
                <div class="lesson_add_part">
                	<div class="stu_info_title">向<span><?php echo $teacher?></span>发送通知</div>
                    <div class=liuyananswer_ul>
                           	<div class=tongzhi>通知内容</div>
                            <textarea class="tongzhi_content" type=text placeholder ="请填写通知内容"></textarea>
                                <a class="tianjia" href=javascript:;>发送</a>
                                 <script type=text/javascript>
                                	$(".tianjia").click(function(){
									var content = $(".tongzhi_content").val();
									var admin = "<?php echo $_SESSION["adminname"]?>";
									var teacher = "<?php echo $teacher?>";
									if(content!=""){
										$.post("chakan.php?action=tongzhi_send",{"content":content,"admin":admin,"teacher":teacher},function(data){alert("通知已发送");});
									}else{alert("请填写必要选项")}
									});
                                </script>
                                <div class="clear_both"></div>
                    </div>
                </div>
                <!--teacher_tongzhi end-->
                <?php }?>
            </div>
        </div>
</body>
</html>