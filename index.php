<?php 
	include("online.php");	
	$kecheng_result = mysql_query("select * from kecheng limit 8");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DHU</title>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/myjQuery.js"></script>
<script src="js/myjs.js"></script>
<link href=css/style.css type=text/css rel=stylesheet />
</head>
<body>
   <!--导航栏-->
    <div id=nav class="nav">
    	<h1><a href=index.php><img src="img/logo.png"/></a></h1>
        <ul>
            <li><a href=index.php>首页</a></li>
            <li><a href=luntan.php target="_blank">论坛</a></li>
            <li><a href=liuyan.php target="_blank">留言</a></li>
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
    
    <!--轮播图 -->
    <div id="container">
    	<div id=center >
        	<ul class="lunbo" id="ul1">
            	<li><a href="lesson.php?action=MQ==" target="_blank"><img src="img/glxy_adj.jpg" /></a></li>
                <li><a href="kecheng.php?classify=msjt"><img src="img/xlwkt_adj.jpg" /></a></li>
                <li><a href="#"><img src="img/cmds2_adj.jpg" /></a></li>
                <li><a href="#"><img src="img/4.jpg" /></a></li>
            </ul>
            <ol id="ol1">
            	<li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
            </ol>
        </div>
        <div class="shiping">
            <div class="shiping-title">
              心理讲堂
            </div>
        	<ul class="lesson-nav">
            	<li>全部课程</li>
                <li>名校经典</li>
            </ul>
        	<div class="zuixin">
                <ul class="zuixin-ul" id="zuixin-ul">
                	<?php while($kecheng = mysql_fetch_array($kecheng_result)){?>
                    <li>
                        <div class="lesson-img">
                            <a target="_blank" href=lesson.php?action=<?php echo base64_encode($kecheng["id"])?>><img src=<?php echo $kecheng["videoimg"]?> /></a>
                        </div>

                        <div class="lesson-info">
                            <h2><?php echo $kecheng["kechengname"]?></h2>
                            <p class="hide-p"><?php echo $kecheng["kechengjianjie"]?></p>
                            <div class="timeandicon">
                                <div class="margin-b8">
                                    <i class="time-icon"></i>
                                    <p>时长：<?php echo $kecheng["kechengtime"]?></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php }?>
                </ul>
             </div>
           <div class="dianying-title">
                心理影片鉴赏
                <a href="#">更多>></a>
           </div>
           <div class="xinliju">
                <div class="video-model">
                    <div class="video-img"><img src="img/cuimiandashi.jpg" /></div>
                    <div class="video-guankan">立刻观看</div>
                </div>
                <div class="video-model">
                    <div class="video-img"><img src="img/cqwwzl.jpg" /></div>
                    <div class="video-guankan">立刻观看</div>
                </div>
                <div class="video-model">
                    <div class="video-img"><img src="img/smzdr.jpg" /></div>
                    <div class="video-guankan">立刻观看</div>
                </div>
                <div class="video-model">
                    <div class="video-img"><img src="img/dx.jpg" /></div>
                    <div class="video-guankan">立刻观看</div>
                </div>
                <div class="video-model">
                    <div class="video-img"><img src="img/mlxl.jpg" /></div>
                    <div class="video-guankan">立刻观看</div>
                </div>
           </div>
           <div class="zixun-teachers">
                名师咨询
           </div>
         </div> <!--shiping -->
         <div class="full-bg">
           
           <div class="teacher-details">
                <div class="pic-left">
                    <div class="pic-radius">
                        <div class="liuyan"><a href="liuyan.php" target="_blank">给他留言</a></div>
                        <div class="mask"></div>
                    </div>
                    <div class="pkp-name"><h1>彭凯平</h1></div>
                </div>
                <div class="teacher-info">
                    <h1>个人简介</h1>
                    <p>清华大学心理学系主任</p>
                    <p>清华大学社科学院学术委员会主席</p>
                    <p>美国加州大学伯克利分校心理学与东亚研究终身教授</p>
                    
                    <a class="expand" href="javascript:"><span>展开</span><i></i></a>
                    <p class="newhide-p">彭凯平教授，现任清华大学心理学系主任、清华大学社科学院学术委员会主席、美国加州大学伯克利分校心理学及东亚研究终身教授。曾教授的课程包括普通心理学，管理心理学、文化心理学、积极心理学、跨文化沟通心理学。现任职国际积极心理联合会执行委员（2010年至今）、中国国际积极心理学大会执行主席（2009年至今），曾任职美国心理学会科学领导小组成员、伯克利加州大学社会人格心理专业主任、第五届世界华人心理学家学术大会共同主席，并担任过美国唐氏基金会董事和德国宝马公司青年领袖论坛董事会成员；为众多政府和国际公司作战略、人事、文化，管理咨询，例如：福特，宝马，美国航天局，富士康，宏达电，万科，中化，中航，海总，总装备部等。他还是多所国际著名商学院常聘客座教授，并连续多年获得清华大学经管学院EMBA最佳教学奖。彭教授曾发表140多篇期刊论文，多次获得重要学术奖项（包括2004年美国社会问题心理学会最佳论文奖，2006年美国管理学院最佳论文奖），出版学术专著多部。</p>
                    <hr />
                    <div class="his-lesson">
                        <div>他的课程</div>
                        <div class="img-all">
                        <div class="div-img">
                            <a href=http://www.xuetangx.com/courses/TsinghuaX/30700313_2015X/2015_T1/about target="_blank">
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
                                <img  class="img-hover" src="img/xlxyzgfz.jpg" />
                                <div class="lesson-mask">
                                    <h2>心理学与中国发展</h2>
                                    <p>中国历经改革开放30年的高速发展，今天作为一个正处在上升中的大国，公民的社会心态如何，面对新时代新机遇的挑战，中国的心理学应向何处去。</p>	
                                 <div class="go-study">去学习</div>
                                 <div class="go-radius"><div class="go-tri"></div></div>
                                </div>
                            </a>
                            
                        </div>
                        </div>
                        
                    </div>
                </div>
           </div>
           </div>
           <div class="news-info">
           		<div class="news-center">
                	<div class="recommand-read">推荐阅读</div>
                    <div class="section-border">
                    	<div class="section">
                        	<h1>网站简介</h1>
                           
                            <ul class="news-ul">
                            	<li><a href="#">东华大学心理教育平台网站服务</a></li>
                                <li><a href="#">东华大学心理健康教育与咨询中心简介</a></li>
                                <li><a href="#">联系方式</a></li>
                               
                            </ul>
                        </div>
                        <div class="section">
                        	<h1>心理文章</h1>
                          
                            <ul class="news-ul">
                            	<li><a href="#">做自己</a></li>
                                <li><a href="#">传染</a></li>
                                <li><a href="#">要是没有千斤顶怎么办</a></li>
                                <li><a href="#">善于倾听</a></li>
                                <li><a href="#">别盯着杯子</a></li>
                                <li><a href="#">表演大师</a></li>
                            </ul>
                        </div>
                        <div class="section">
                        	<h1>心理咨询师手记</h1>
                          
                            <ul class="news-ul">
                            	<li><a href="#">调整心态 从容就业</a></li>
                                <li><a href="#">卸下包袱 轻松考试</a></li>
                                <li><a href="#">让我们和谐地并肩同行</a></li>
                                <li><a href="#">认识心身症</a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                
                            </ul>
                        </div>
                        <div class="section">
                        		<h1>好书推荐</h1>
                          
                            <ul class="news-ul">
                            	<li><a href=jingcaiyuedu.php target="_blank">好书推荐之《正能量》</a></li>
                                <li><a href="#">《少有人走的路》</a></li>
                                <li><a href="#">心理学与生活（第16版）</a></li>
                                <li><a href="#">积极心理学：关于人类幸福和力量的科学</a></li>
                                <li><a href="#">《送你一座玫瑰园–能有效提升生活质量的心理学术语》</a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                        <div class="section">
                        	<h1>活动公告</h1>
                            
                            <ul class="news-ul">
                            	<li><a href="#">暂无公告</a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                        <div class="section">
                        	<h1>心理影片</h1>
                            
                            <ul class="news-ul">
                            	<li><a href="#">天使爱美丽</a></li>
                                <li><a href="#">隐秘而伟大</a></li>
                                <li><a href="#">飞屋环游记</a></li>
                                <li><a href="#">这个杀手不太冷</a></li>
                                <li><a href="#">禁闭岛</a></li>
                                <li><a href="#">当尼采哭泣</a></li>
                            </ul>
                        </div>
                    </div>
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
                <input type="email" name="zhuce-email" autocomplete="off" placeholder="填写邮箱"/>
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
