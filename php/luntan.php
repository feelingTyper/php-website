<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width = device-width,initial-scale = 1" />
<title>DHU-Formus</title>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/myjQuery.js"></script>
<script src="js/ajax.js"></script>
<script src="js/imgSizer.js"></script>
<link href=css/style.css type=text/css rel=stylesheet />
<link href=css/luntan-style.css type=text/css rel=stylesheet />
<?php 
	session_start();
	@$conn = mysql_connect("localhost","root","123456") or die("数据库连接失败");
	mysql_select_db("myeducation",$conn);
	mysql_query("set names 'utf8'");
	if(isset($_GET['action'])){
		switch($_GET['action']){
			case "ssjl":
				$classify = $_POST["classify"];
				
				$sql = "select * from tiezi where classify='$classify'";
				break;
			case "xxgg":
				$classify = $_POST["classify"];
				$sql = "select * from tiezi where classify='$classify'";
				break;
			case "wtfk":
				$classify = $_POST["classify"];
				$sql = "select * from tiezi where classify='$classify'";
				break;	
			case "fatie":
				$title = $_POST["tztitle"];
				$classify = $_POST["tzclassify"];
				$content = $_POST["tzcontent"];
				$author = "熊猫爱吃醋";
				$sql = "insert into tiezi values(null,'$title','$content','$classify',now(),0,'$author',0)";
				mysql_query($sql,$conn);
				$sql = "select * from tiezi";
				break;	
			}
		}else{
			$sql = "select * from tiezi";
			}
	$result = mysql_query($sql,$conn);
?>
</head>
<body>
	<!--导航栏-->
    <div id=nav class="nav">
    	<h1><a href=index.html><img src="img/logo.png"/></a></h1>
        <ul>
            <li><a href=index.html>首页</a></li>
            <li><a href=luntan.html target="_blank">论坛</a></li>
            <li><a href=#>留言</a></li>
            <li><a target="_blank" href="kecheng.html">课程</a></li>
        </ul>
        
        <div id="login" class="login">
        	<a class="login-out" href=javascript:><span>登录</span></a>
            <em>|</em>
            <a class="zhuce-out" href=javascript:><span>注册</span></a>
        </div>
        <div class=sousuo>
                <input class="formstyle" id="sskuang" type=text name="search" autocomplete="off" value="" placeholder="搜索关键字" />
                <input class="tjformstyle" id="tjkuang" type=submit value=""/>
        </div>
        
	</div>
    <div class="luntan-container">
    	<div class="luntan-center clearfix">
        	<div class="luntan-left">
            	<div class="lefttop">
                	<div class="all-tiezi"><i></i>所有帖子</div>
                	<ul class="luntan-theme">
                    	<li class="ssjl"><a href=javascript:><i></i>师生交流</a></li>
                        <li class="xxgg"><a href=javascript:><i></i>学校公告</a></li>
                        <li class="wtfk"><a href=javascript:><i></i>问题反馈</a></li>
                    </ul>
                </div>
                <div class="leftcenter">
                	<div class="leftcenter-min">
                    	<div class="today-fatie"><div class="counter-number">1</div><div class="span-z">今日发帖数</div></div>
                        <div class="zuotian-fatie"><div class="counter-number">222</div><div class="span-z">昨日发帖数</div></div>
                        <div class="total-fatie"><div class="counter-number">33333</div><div class="span-z">论坛总发帖数</div></div>
                        <div class="total-number"><div class="counter-number">3325</div><div class="span-z">论坛总会员数</div></div>
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
            	<div class="righttop">
                	<div class="right-nav">
                    	<ul class="rightnav-ul">
                        	<li class="rightnav-cur">全部</li>
                        	<li>最新</li>
                            <li>最热</li>
                            <li>推荐</li>
                            <li>置顶</li>
                        </ul>
                    </div>
                </div>
                <div class="rightcenter">
                	<div class="welcomeborder clearfix">
                    	<div class="welcome-fatie">
                    	<div class="huanying">欢迎会员：&nbsp;<a href="#">爱哭泣的小阿狸</a></div>
                        <div class="zaixian-now">当前在线人数：<em>3000</em></div>
                        <div class="fabuxintie"><a class="fabuxintie-a" href=javascript:>发表新帖子</a></div>
                    </div>
                    </div>
                    <div class="fatie-shuru">
                    	<div class="titleandclassify">
                        	<div class="fatie-title">
                            	<span>填写标题</span>
                                <input type=text name="fatie-title" class="fatie-titleinput" />
                            </div>
                            <div class="fatie-classify">
                            	<div class="select-classify">选择板块</div>
                                <ul class="bankuai-ul">
                                	<li>师生交流</li>
                                    <li>学校公告</li>
                                    <li>问题反馈</li>
                                </ul>
                            </div>
                            <div class="fatietj-btn">
                            	<button>发布</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="fatie-content">
                            	<textarea></textarea>   
                        </div>
                        
                    </div>
                    <div class="fatie-tip">发帖成功请等待刷新~</div>
                    <div class="tieziborder clearfix">
                   		<div class="tiezi-content">
                    	<ul class="theme-ul">
                        <?php while($resArray = mysql_fetch_array($result)){?>
                        <!--one-li-->
                        	<li class="theme-list">
                            	<div class="theme-authorimg"><a href="#"><img src="img/al.jpg" /></a></div>
                                <div class="theme-right">
                                	<p class="tiezi-title"><a href="#"><?php echo $resArray['title']?></a></p>
                                    <div class="tiezi-info">
                                    	<p class="tiezi-author"><a href="#"><?php echo $resArray['author']?></a></p>
                                        <div class="tiezi-addtime">2015-05-06&nbsp;21:52:33</div>
                                        <div class="tiezi-classify"><a href="#"><?php echo $resArray['classify']?></a></div>
                                        <div class="tiezi-status">最新</div>
                                        <div class="tiezi-invitation"><i></i><?php echo $resArray['invitation']?></div>
                                        <div class="tiezi-applay"><i></i><?php echo $resArray['replaynum']?></div>
                                    </div>
                                </div>
                            </li>
                       	<!--one-li-end-->
                   		<?php }?>
                        </ul>
                    </div>
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
<?php mysql_close($conn);?>