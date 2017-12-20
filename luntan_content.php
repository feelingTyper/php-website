<?php 
	include("online.php");
	if(isset($_GET['tiezicontent'])){
	$tiezi_id = base64_decode($_GET['tiezicontent']);
	mysql_query("update tiezi set invitation = invitation+1 where id = $tiezi_id");
	$sql = "select * from tiezi where id = '$tiezi_id'";
	$result = mysql_query($sql,$conn);
	$tiezi_content = mysql_fetch_array($result);
	
	$count = 0;
	$sql1 = "select count(*) from users";
	$huiyuan = mysql_query($sql1,$conn);
	$huiyuan1 = mysql_fetch_assoc($huiyuan);
	$sql1 = "select count(*) from tiezi";
	$alltiezi = mysql_query($sql1,$conn);
	$alltiezi1 = mysql_fetch_assoc($alltiezi);
	//判断帖子发表的时间
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
	$yesterday =mktime(0,0,0,date("m"),date("d")-1,date("Y"));
	$today =mktime(0,0,0,date("m"),date("d"),date("Y"));
	$sql1 = "select count(*) from tiezi where addtime > '$yesterday' and addtime < '$today'";
	$fatie_yesterday = mysql_query($sql1,$conn);
	$fatie_yesterday1 = mysql_fetch_assoc($fatie_yesterday); 
	$sql1 = "select count(*) from tiezi where addtime > '$today'";
	$fatie_today = mysql_query($sql1,$conn);
	$fatie_today1 = mysql_fetch_assoc($fatie_today);
	$comment_num_result = mysql_query("select count(*) from huifutiezi where tieziid = '$tiezi_id'"); 
	$comment_num = mysql_fetch_array($comment_num_result);
	$all_tiezi_comment_result = mysql_query("select * from huifutiezi where tieziid = '$tiezi_id' order by addtime");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DHU-Formuscontent</title>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/myjQuery.js"></script>
<script src="js/ajax.js"></script>
<script src="js/imgSizer.js"></script>
<link href=css/style.css type=text/css rel=stylesheet />
<link href=css/luntan-content.css type=text/css rel=stylesheet />
</head>
<body>
	<!--导航栏-->
    <div id=nav class="nav">
    	<h1><a href=index.php><img src="img/logo.png"/></a></h1>
        <ul>
            <li><a href=index.php>首页</a></li>
            <li><a href=luntan.php>论坛</a></li>
            <li><a href=liuyan.php>留言</a></li>
            <li><a target="_blank" href="kecheng.php">课程</a></li>
        </ul>
        <?php if(!mysql_num_rows($result_online)){?>
        <div id="login" class="login">
        	<a class="login-out" href=javascript:><span>登录</span></a>
            <em>|</em>
            <a class="zhuce-out" href=javascript:><span>注册</span></a>
        </div>
        <?php }else{?>
         <!--afterlogin-->
        <div class="loginedbox">
        	<div class="logname"><a href="#"><span><?php  echo $loginname ?></span><i></i></a></div>
            <div class="personalcenter">
                <ul>
                   	<li><a href=mypersonal.php target="_blank">个人中心</a></li>
                    <li><a href=mypersonal.php?pss=myliuyan>我的留言</a></li>
                    <li><a href=mypersonal.php?pss=mytiezi>我的贴吧</a></li>
                    <li><a href=mypersonal.php?pss=setpasswd>密码设置</a></li>
                    <li class="personnal-logout"><a href=javascript:>退出</a></li>
                </ul>
   			 </div>
        </div>    
        
        <!--afterloginend-->
        <?php }?>
        <div class=sousuo>
                <input class="formstyle" id="sskuang" type=text name="search" autocomplete="off" value="" placeholder="搜索关键字" />
                <input class="tjformstyle" id="tjkuang" type=submit value=""/>
        </div>
        
	</div>
    <div class="luntan-container">
    	<div class="luntan-center clearfix">
        	<div class="luntan-left">
            	<div class="lefttop">
                	<div class="author-img">
                    	<div class="author-img1">
                    		<a href=#><img src="img/al.jpg" /></a>
                    	</div>
                    </div>
                    <div class="author"><a href="#"><?php echo $tiezi_content['author']?></a></div>
                    <div class="hisbtn">
                    	<div class="hispage"><a href=#>Ta的主页</a></div>
                    	<div class="histiezi"><a href=#>Ta的帖子</a></div>
                    </div>
                </div>
                <div class="leftcenter">
                	<div class="leftcenter-min">
                    	<div class="today-fatie"><div class="counter-number"><?php echo $fatie_today1['count(*)'];?></div><div class="span-z">今日发帖数</div></div>
                        <div class="zuotian-fatie"><div class="counter-number"><?php echo $fatie_yesterday1['count(*)']?></div><div class="span-z">昨日发帖数</div></div>
                        <div class="total-fatie"><div class="counter-number"><?php echo $alltiezi1['count(*)']?></div><div class="span-z">论坛总发帖数</div></div>
                        <div class="total-number"><div class="counter-number"><?php echo $huiyuan1['count(*)'] ?></div><div class="span-z">论坛总会员数</div></div>
                        <div class="clear-both"></div>
                        <div class="hot-news">热点动态</div>
                        <div class="hotnews-img"><a href="#"><img src="img/al.jpg" /></a><span>这是怎么了</span></div>
                        <div class="hotnews-img"><a href="#"><img src="img/al.jpg" /></a><span>这是怎么了</span></div>
                        <div class="clear-both"></div>
                    </div>
                </div>
                <div class="leftbottom"></div>
            </div>
            <div class="luntan-right">
                <div class="rightcenter">
                    <div class="tieziborder clearfix">
                   		<div class="tiezi-content">
                    		<div class="tiezicontent-title">
                            <script type="text/javascript">
                            	$(function(){
									$(".shuoshuo_fabiao").click(function(){
										var tiezi_comment = $(".tiezi_comment_textarea").val();
										if(tiezi_comment==""){
										alert("说些内容吧");
										}else{
											var comment_author = $(".logname>a>span").html();
											var tiezi_id = "<?php echo $tiezi_content['id']?>";	
											$.post("comment_tiezi.php",{"author":comment_author,"tiezi_id":tiezi_id,"comment_content":tiezi_comment},function(data){$(".comment-ulcontainer>ul").append(data);var num = $(".comment-title>em").html();$(".comment-title>em").html(++num);var replay = $(".tiezi-applay>span").html();$(".tiezi-applay>span").html(++replay);});
										}
										});		
								});
                            </script>
                            	<div class="tile-title"><?php echo $tiezi_content['title']?></div>
                                <div class="tiezi-info">
                            		<div class="fabuzai">发表在<a href=#><?php echo $tiezi_content['classify']?></a></span></div>
                               		<div class="fabushijian"><?php echo T($tiezi_content['addtime'])?></div>
                               		<div class="fwhf">
                                    <div class="tiezi-invitation"><i></i><?php echo $tiezi_content['invitation']?></div>
                                    <div class="tiezi-applay"><i></i><span><?php echo $tiezi_content['replaynum']?></span></div>
                                 	</div>
                            	</div>
                          </div>
                          <div class="tiezineirong">
                            	<p><?php echo $tiezi_content['content']?></p>
                           </div>
                           <?php if(mysql_num_rows($result_online)){?>
                           <div class="shusoshuonidekanfa">
                           		<div class="comment-author">
                                	<div class="author_img"><a href=#><img src=img/al.jpg /></a></div>
                                </div>
                                
                                <div class="textarea_btn">
                                	<textarea class="tiezi_comment_textarea" placeholder="说说你的看法"></textarea>
                                    <span class="shuoshuo_fabiao">发表</span>
                                </div>
                           </div>
                           <?php }?>
                    	</div>
                    </div>
                </div>
                <div class="tiezi-comment">
                	<div class="comment-title"><span>精彩评论</span><em><?php echo $comment_num["count(*)"]?></em></div>
                    <div class="comment-ulcontainer">
                    	<ul>
                        	<?php while($all_tiezi_comment = mysql_fetch_array($all_tiezi_comment_result)){	?>
                        	<li>
                            	<div class="comment-author">
                                	<div class="author_img"><a href=#><img src=img/al.jpg /></a></div>
                                </div>
                                <div class="comment_right_content">
                                	<div class="right_author"><a href=#><?php echo $all_tiezi_comment["author"]?></a> <span>发表于</span><time><?php echo T($all_tiezi_comment["addtime"])?></time><em><?php echo ++$count; ?><span>#</span></em></div>
                                    <div class="right_content"><p><?php echo $all_tiezi_comment["content"]?></p></div>
                                    <div class="pinglun_huifu_zhichi"><span>点评</span><span>支持</span><span>回复</span></div>
                                </div>
                                <div class="clear-both"></div>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="rightpage">
                    <div class="pageDiv">
						<div class="pagediv_2 clearfix">
							<ul>
								<li class="first"><a href="#">&lt;&lt; 首页</a></li> 
                                <li class="previous"><a href="#">&lt;</a></li> 
                                <li class="page selected"><a href="#" >1</a></li>
                                <li class="page"><a href="#" >2</a></li>
                                <li class="page"><a href="#" >3</a></li>
                                <li class="page"><a href="#" >4</a></li>
                                <li class="page"><a href="#" >5</a></li>
                                <li class="page"><a href="#" >6</a></li>
                                <li class="page"><a href="#" >7</a></li> 
                                <li class="page"><a href="#" >8</a></li> 
                                <li class="page"><a href="#">9</a></li> 
                                <li class="page"><a href="#">10</a></li>
                                <li class="next"><a href="#">&gt;</a></li> 
                                <li class="last"><a href="#">末页>></a></li>
                           </ul>
						</div>
					</div>
                </div>
            </div>
            <div class="clear-both"></div>
        	<div class="fri-link">
                <strong>友情链接:</strong>
                <div class="a-link">
                    <a target="_blank" href="http://www.dxs525.com/">全国大学生心理健康教育网</a>
                    <a target="_blank" href="http://www.caps.fudan.edu.cn/">复旦大学心理健康教育中心</a>
                    <a target="_blank" href="http://www.tsinghua.edu.cn/publish/psy/2305/index.html">清华大学心理学系</a>
                    <a target="_blank" href="http://counseling.pku.edu.cn/">北京大学学生心理健康教育与咨询中心</a>
                    <a target="_blank" href="http://www.xlzx.uestc.edu.cn/school/crisis/index.asp?school=44">电子科技大学心理健康教育中心网络工作平台</a>
                    <a target="_blank" href="http://1658.yangtzeu.edu.cn/">长江大学心理健康教育中心</a>
                    <a target="_blank" href="http://xlzx.ecupl.edu.cn/">华东政法大学心理教育与咨询中心</a>
                    <a target="_blank" href="http://psyhelp.cqu.edu.cn/">重庆大学心理健康教育与咨询中心</a>
                </div>
             </div>
        </div>
    </div>
    
    
    <!--回到顶部-->
    <div id="totop">
    </div>
    <div class="fullscreen-mask"></div>
    <div class="loginandzhuce">
    	<div class="login-model">
    	<ul class="login-nav">
        	<li><span>登录</span><button class="close-btn"></button></li>
        </ul>
    	<div class="denglu">
        	<div class="log-name clearfix">
                <input type=text name="log-name" autocomplete="off" placeholder="请输入您的用户名/邮箱" />
                <div class="yanzhengxinxi">用户名可用</div>
            </div>
            <div class="log-passwd clearfix">
                <input type=password name="log-passwd" placeholder="请输入输入密码"/>
                <div class="yanzhengxinxi">密码错误</div>
            </div>
            <div class="haimeiyou"><span>还没有帐号?</span><a href=javascript:>立刻注册</a></div>
            <button class="denglu-btn">登录</button>
        </div>
    </div>
    <div class="zhuce-model">
    	<ul class="login-nav">
        	<li><span>注册</span><button class="close-btn"></button></li>
        </ul>
    	<div class="zhuce">
        	<div class="zhuce-name clearfix">
                <input type=text name="zhuce-name" autocomplete="off" placeholder="请填写您的用户名" />
                <div class="yanzhengxinxi">账号已存在</div>
            </div>
            <div class="zhuce-passwd clearfix">
                <input type=password name="zhuce-passwd" placeholder="请输入您的密码"/>
                <div class="yanzhengxinxi"></div>
            </div>
            <div class="zhuce-passwdconfirm clearfix">
                <input type=password name="zhuce-passwdconfirm" placeholder="请确认您的密码"/>
                <div class="yanzhengxinxi">密码不一致</div>
            </div>
            <div class="zhuce-email clearfix">
                <input type=email name="zhuce-email" autocomplete="off" placeholder="填写邮箱"/>
                <div class="yanzhengxinxi">邮箱格式不正确</div>
            </div>
            <div class="haimeiyou"><span>已有账号?</span><a href=javascript:>快速登录</a></div>
            <button class="zhuce-btn">注册</button>
        </div>
    </div>
    </div>
    <footer>
    	<div class="foot-center">
        	<div class="by"><a href="#">网站服务</a></div>
        	<div class="by"><a href="#">关于我们</a></div>
            <div class="by"><a href="#">联系我们</a></div>
            <div class="by">
            	<a href="#">关注我们</a>
            	<div class="clearfix">
                	<div class= "a-img1" >
                	<a href="http://weibo.com/u/3291993551/home?topnav=1&wvr=6"></a>
                </div>
                <div class= "a-img2" >
                	<a href="#"></a>
                </div>
                <div class= "a-img3" >
                	<a href="#"></a>
                </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="cr">Copyright &copy 2015-05-05 by lshaluminum 1169558697@qq.com.  all right reserved</div>
</body>
</html>
<?php 
	mysql_close($conn);
	}else{
		header("location:luntan.php");
		}
?>