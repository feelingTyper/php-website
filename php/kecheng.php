<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width = device-width,initial-scale = 1" />
<title>DHU-kecheng</title>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/myjQuery.js"></script>
<script src="js/ajax.js"></script>
<script src="js/imgSizer.js"></script>
<link href=css/style.css type=text/css rel=stylesheet />
<link href=css/kecheng-style.css type=text/css rel=stylesheet />
</head>

<body>
	<!--导航栏-->
    <div id=nav class="nav">
    	<h1><a href=index.html><img src="img/logo.png"/></a></h1>
        <ul>
            <li><a href=index.html>首页</a></li>
            <li><a href=luntan.php target="_blank">论坛</a></li>
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
    <div class="kecheng-container">
    	<div class="kecheng-center clearfix">
        	<div class="kecheng-left">
            	<div class="kecheng-allclassify"><a href="#">全部分类</a></div>
                <ul class="kecheng-ul">
                	<li><a href="#">名师讲堂</a></li>
                    <li><a href="#">心理电影欣赏</a></li>
                    <li><a href="#">大学生心理知识微课堂</a></li>
                    <li><a href="#">心灵书籍</a></li>
                </ul>
            </div>
            <div class="kecheng-right">
            	<div class="kecheng-rightwrap">
                	<!--sort-->
                    <div class="sort">
                    	<div class="wrap">
                    		<div class="sortMode">
                    			<h3 class="h3-cur">全部课程</h3>
                    			<h3>名师讲堂</h3>
                                <h3>心理电影欣赏</h3>
                                <h3>大学生心理知识微课堂</h3>
                                <h3>心灵书籍</h3>
                             </div>
                             <div class="previewMode">
                             	<ul>
                             		<li class="kuai-icon curr"><i class="icon"></i></li>
                               		<li class="list-icon"><i class="icon"></i></li>
                                </ul>
                          	</div>
                       </div>
                   </div><!--sort end-->
               <div class="right-kuai">
               		<ul id="right-kuaiUl">
                    	<li>
                        	<div class="right-imgDiv">
                           		<a href="lesson.html"><img src="img/glxy.jpg" />
                                	<div class="right-play">
                                    	
                                	</div>
                                    <div class="icon-i"><i></i></div>
                        		</a>
                            </div>
                            <div class="right-detailDiv">
                            	<a href="lesson.html">管理学院&nbsp;&nbsp;五平方米的世界</a>
                                <p class="right-p1">五平方米的世界是由东华大学管理学院的同学精心编写排练的一部反映大学生寝室关系的心理剧...</p>
                                <div class="timeandicon">
                                    <div class="margin-b8">
                                        <i class="time-icon"></i>
                                        <p>时长：4分35秒</p>
                                    </div>
                            	</div> 
                           </div>
                        </li>
                        <li>
                        	<div class="right-imgDiv">
                           		<a href="lesson.html"><img src="img/glxy.jpg" />
                                	<div class="right-play">
                                    	
                                	</div>
                                    <div class="icon-i"><i></i></div>
                        		</a>
                            </div>
                            <div class="right-detailDiv">
                            	<a href="lesson.html">管理学院&nbsp;&nbsp;五平方米的世界</a>
                                <p class="right-p1">五平方米的世界是由东华大学管理学院的同学精心编写排练的一部反映大学生寝室关系的心理剧...</p>
                                <div class="timeandicon">
                                    <div class="margin-b8">
                                        <i class="time-icon"></i>
                                        <p>时长：4分35秒</p>
                                    </div>
                            	</div> 
                           </div>
                        </li>
                        <li>
                        	<div class="right-imgDiv">
                           		<a href=#><img src="img/glxy.jpg" />
                                	<div class="right-play">
                                    	
                                	</div>
                                    <div class="icon-i"><i></i></div>
                        		</a>
                            </div>
                            <div class="right-detailDiv">
                            	<a href="#">管理学院&nbsp;&nbsp;五平方米的世界</a>
                                <p class="right-p1">五平方米的世界是由东华大学管理学院的同学精心编写排练的一部反映大学生寝室关系的心理剧...</p>
                                <div class="timeandicon">
                                    <div class="margin-b8">
                                        <i class="time-icon"></i>
                                        <p>时长：4分35秒</p>
                                    </div>
                            	</div> 
                           </div>
                        </li>
                        <li>
                        	<div class="right-imgDiv">
                           		<a href=#><img src="img/glxy.jpg" />
                                	<div class="right-play">
                                    	
                                	</div>
                                    <div class="icon-i"><i></i></div>
                        		</a>
                            </div>
                            <div class="right-detailDiv">
                            	<a href="#">管理学院&nbsp;&nbsp;五平方米的世界</a>
                                <p class="right-p1">五平方米的世界是由东华大学管理学院的同学精心编写排练的一部反映大学生寝室关系的心理剧...</p>
                                <div class="timeandicon">
                                    <div class="margin-b8">
                                        <i class="time-icon"></i>
                                        <p>时长：4分35秒</p>
                                    </div>
                            	</div> 
                           </div>
                        </li>
                        <li>
                        	<div class="right-imgDiv">
                           		<a href=#><img src="img/glxy.jpg" />
                                	<div class="right-play">
                                    	
                                	</div>
                                    <div class="icon-i"><i></i></div>
                        		</a>
                            </div>
                            <div class="right-detailDiv">
                            	<a href="#">管理学院&nbsp;&nbsp;五平方米的世界</a>
                                <p class="right-p1">五平方米的世界是由东华大学管理学院的同学精心编写排练的一部反映大学生寝室关系的心理剧...</p>
                                <div class="timeandicon">
                                    <div class="margin-b8">
                                        <i class="time-icon"></i>
                                        <p>时长：4分35秒</p>
                                    </div>
                            	</div> 
                           </div>
                        </li>
                        <li>
                        	<div class="right-imgDiv">
                           		<a href=#><img src="img/glxy.jpg" />
                                	<div class="right-play">
                                    	
                                	</div>
                                    <div class="icon-i"><i></i></div>
                        		</a>
                            </div>
                            <div class="right-detailDiv">
                            	<a href="#">管理学院&nbsp;&nbsp;五平方米的世界</a>
                                <p class="right-p1">五平方米的世界是由东华大学管理学院的同学精心编写排练的一部反映大学生寝室关系的心理剧...</p>
                                <div class="timeandicon">
                                    <div class="margin-b8">
                                        <i class="time-icon"></i>
                                        <p>时长：4分35秒</p>
                                    </div>
                            	</div> 
                           </div>
                        </li>
                        <li>
                        	<div class="right-imgDiv">
                           		<a href=#><img src="img/glxy.jpg" />
                                	<div class="right-play">
                                    	
                                	</div>
                                    <div class="icon-i"><i></i></div>
                        		</a>
                            </div>
                            <div class="right-detailDiv">
                            	<a href="#">管理学院&nbsp;&nbsp;五平方米的世界</a>
                                <p class="right-p1">五平方米的世界是由东华大学管理学院的同学精心编写排练的一部反映大学生寝室关系的心理剧...</p>
                                <div class="timeandicon">
                                    <div class="margin-b8">
                                        <i class="time-icon"></i>
                                        <p>时长：4分35秒</p>
                                    </div>
                            	</div> 
                           </div>
                        </li>
                    </ul>
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
