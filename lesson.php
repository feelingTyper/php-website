<?php 
	include("comment.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>DHU-lesson</title>
<script type="text/javascript">var kechengid = "<?php echo $kecheng?>";</script>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/myjQuery.js"></script>
<script src="js/ajax.js"></script>
<script src="js/imgSizer.js"></script>
<link href=css/style.css type=text/css rel=stylesheet />
<link href=css/lesson-style.css type=text/css rel=stylesheet />
</head>

<body>
	<!--导航栏-->
    <div id=nav class="nav">
    	<h1><a href=index.php><img src="img/logo.png"/></a></h1>
        <ul>
            <li><a href=index.php>首页</a></li>
            <li><a href=luntan.php target="_blank">论坛</a></li>
            <li><a href=liuyan.php>留言</a></li>
            <li><a target="_blank" href="kecheng.php">课程</a></li>
        </ul>
        
        <?php if(!mysql_num_rows($result_online)){?>
        <div id="login" class="login">
        	<a  class="login-out" href=javascript:><span>登录</span></a>
            <em>|</em>
            <a  class="zhuce-out" href=javascript:><span>注册</span></a>
       
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
    <div class="lesson-contanier" > 
    	<div class="lesson-center">
        	<div class="lesson-ssnav"><a href="index.php">首页</a><i></i><a href="kecheng.php">课程</a><i></i><span><?php echo $kecheng_result["kechengclassify"]?></span>
            <i></i><span><?php $length = mb_strlen($kecheng_result["kechengname"],'utf-8');echo mb_substr($kecheng_result["kechengname"],4,$length,'utf-8')?></span></div>
        	<div class="lesson-vedioModel">
            	<div class="lesson-vedioName">
                	<span><?php echo $kecheng_result["kechengname"]?></span>
                </div>
                <div class="lesson-vedioTag">
                	<video controls src= <?php echo $kecheng_result["kechengsrc"]?> poster=<?php echo $kecheng_result["videoimg"]?>>
                    </video>
                </div>
            </div>
            <!-- 视频部分结束-->
            <div class="lesson-spjj">
            	<div class="jj-title">视频简介</div>
                <div><p><?php echo $kecheng_result["kechengjianjie"]?></p></div>
            </div>
            <div class="lesson-cast">
            	<div class="cast-tag">标签</div>
                <div class="cast-school"><a target="_blank" href="http://www.dhu.edu.cn/">东华大学&nbsp;&nbsp;</a><?php echo substr($kecheng_result["kechengname"],0,13)?></div>
                <div class="class-tagNames"><?php echo $kecheng_result["kechengclassify"]?></div>
                <p>时长:<?php echo $kecheng_result["kechengtime"]?></p>
            </div>
            <hr style="height:1px;border:none;border-top:1px solid #eee;clear:both" />
            <!--taolun-->
            <div class="lesson-taolun">
           		<div class="taolun-title">讨论区</div>
                <div class="fabiao">
                	<form name="fabiao-form" class="fabiao-form" method="post" action>
                    	<textarea class="textcontent" name="textcontent" placeholder="快来发表精彩评论吧" maxlength="300"></textarea>
                        <div class="num-counter"><i>0</i>/300</div>
                        <input type="button" class="command-sub" value="发表评论" />
                    </form>
                </div>
                <div class="all-comments">
                	<div class="allcomment-title"><div>所有评论(<i><?php $all_comment_num ?></i>条)</div></div>
                    <div class="commends-model">
                    	<div class="commend-ul">
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
                        </div>
                        <!--ulend-->
                    </div>
                </div>
            </div>
            <!--taolun-end-->
            <div class="lesson-relativeVideo">
            	<div class="relative-title">相关视频</div>
                <div class="lesson-expand">
                	<div class="div-img">
                            <a href="#">
                                <img class="img-hover" src="img/xlxgl.jpg" />
                                <div class="lesson-mask">
                                    <h2>心理学概论</h2>
                                    <p>本课程为心理学基础导论课，以心理学的经典理论和最新实证研究为蓝本，以积极心理学的视角，概览式地介绍科学心理学的基本理论、基本方法、研究领域和研究进展。</p>	
                                 <div class="go-study">去学习</div>
                                 <div class="go-radius"><div class="go-tri"></div></div>
                                </div>
                            </a>
                            
                        </div>
                        <div class="div-img">
                            <a href="#">
                                <img class="img-hover" src="img/xlxgl.jpg" />
                                <div class="lesson-mask">
                                    <h2>心理学概论</h2>
                                    <p>本课程为心理学基础导论课，以心理学的经典理论和最新实证研究为蓝本，以积极心理学的视角，概览式地介绍科学心理学的基本理论、基本方法、研究领域和研究进展。</p>	
                                 <div class="go-study">去学习</div>
                                 <div class="go-radius"><div class="go-tri"></div></div>
                                </div>
                            </a>
                            
                        </div>
                        <div class="div-img">
                            <a href="#">
                                <img class="img-hover" src="img/xlxgl.jpg" />
                                <div class="lesson-mask">
                                    <h2>心理学概论</h2>
                                    <p>本课程为心理学基础导论课，以心理学的经典理论和最新实证研究为蓝本，以积极心理学的视角，概览式地介绍科学心理学的基本理论、基本方法、研究领域和研究进展。</p>	
                                 <div class="go-study">去学习</div>
                                 <div class="go-radius"><div class="go-tri"></div></div>
                                </div>
                            </a>
                            
                        </div>
                        
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
                	<a href="#"></a>
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
