<?php 
	include("online.php");	
	$kecheng_result = mysql_query("select * from kecheng limit 8");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>DHU-yuedu</title>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/myjQuery.js"></script>
<link href=css/style.css type=text/css rel=stylesheet />
<link href=css/tuijianyuedu.css type=text/css rel=stylesheet />
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
    <div class="neirong">
    	<p>联系电话：18817324635</p>
        <p>联系邮箱：1169558697@qq.com</p>
    </div>
    <div class="shuji_content">
    	<div class="shuji_img"><img src="img/tuijian_shuji_zhengnengliang .jpg" /></div>
    	<p>坚持正向能量，人生无所畏惧！</p>
　　<p>到底什么是正能量？科学的解释是：以真空能量为零，能量大于真空的物质为正，能量低于真空的物质为负。而在此书中，正能量指的是一切予人向上和希望、促使人不断追求、让生活变得圆满幸福的动力和感情。</p>
　　<p>《正能量》是一本世界级心理励志书。也是《怪诞心理学》作者的转型之作。这将是继“不抱怨”之后，引发全国团购热潮的励志读本！书中的内容深入浅出，为读者打开了一扇重新认识自己和他人的窗户，并结合多项实例，教会我们如何激发自身的潜能，引爆内在的正能量。</p>
　　<p>《正能量》延续了作者一贯的风格，是其和诸多心理学家共同研究成果的结晶。通过种种实验和数据，理查德?怀斯曼向我们阐释了伟大的“表现”原理，破除了我们过去秉持的“性格决定命运”“情绪决定行为”等认知。运用“表现”原理激发出的正能量，可以使我们产生一个新的自我，让我们变得更加自信、充满活力、也更有安全感。</p>
　　<p>《正能量》告诉我们：每个人身上都是带有能量的，而只有健康、积极、乐观的人才带有正能量，和这样人交往能将正能量传递给你。而人的意念力来自于我们内在的能量场，减少不该有的欲望，保持心态的平和，喜乐地生活能增加人生的正能量。</p>
　　<p>《正能量》严谨又趣味十足地阐释了“表现”原理与正能量之间的“亲密”关系，揭秘了什么样的行为模式可以影响人的信念、情绪、意志力。它通过一系列的训练方法，提升我们内在的信任、豁达、愉悦、进取等正能量；规避自私、猜疑、沮丧、消沉的负能量，是一本能彻底改变我们工作、生活、行为模式的心理学著作。</p>
　　<p>书中的数十个案例和步骤，是最理想的实践指南，通过本书，了解你自身的能量，知道你是如何散发并引导这股能量的。当你陷身困惑、争执或消极能量之中时，尝试解脱或改变破坏性的能量。当积极的能量被引爆时，你的人生将会得到神奇的大转变！</p>
　　<p>能量有正负，应用需智慧。葡萄糖和汽油是能量，炸药和海啸也是能量。大脑和心灵，需要源源不断的正能量濡养，否则人生将变得灰暗无序。作者以大量生动实例和简单易行的方法，传授给普通人如何积聚起内心正能量的诀窍。你读了此书并认真践行，就能将心理垃圾转化为积极温暖的活力，开启你的正能量神奇之门。当正能量持久稳定地制造并储备起来，有效使用，你就能驱散负能量的黑暗，人生不断走向精彩。</p>
　　<p>——毕淑敏 倾情推荐</p>
    </div>
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
