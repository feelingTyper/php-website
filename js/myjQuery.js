// JavaScript Document created by lshaluminum 
$(function(){
	/*var wide;
	wide = $(window).width();
	$("#nav").css("width",wide); 
	console.log(wide);*/
	$("#sskuang").focus(function(){
			$("#tjkuang").attr("class","hoverd");
			$("#sskuang").css("border-color","#35b558");
		});
	$("#sskuang").blur(function(){
			$("#tjkuang").attr("class","tjformstyle");
			$("#sskuang").css("border-color","#e8e8e8");
		});
    $(".zuixin-ul>li").each(function(){
            $(this).hover(function(){
                $(this).find(".lesson-img>a>img").css({"background":"black",transform:"scale(1.2,1.2)"});
                $(this).find(".hide-p").css({opacity:1,display:"block","height":"52px"});
                $(this).find(".lesson-info").css({"height":"155px"});

            },function(){
                $(this).find(".lesson-img>a>img").css({transform:"scale(1,1)"});
                $(this).find(".hide-p").css({"height":"0"},function(){
                    $(this).css("display","none");
                });

                $(this).find(".lesson-info").css({"height":"68px"});
            });
	$(".video-model").each(function(){
			$(this).hover(function(){
				//$(this).css({"border":"1px solid #eee"});
				$(this).find(".video-guankan").css({"background":"#35b558","color":"white"});
				},function(){
					//$(this).css({"border":"1px solid #eee"});
					$(this).find(".video-guankan").css({"background":"#f3fff6","color":"#35b558","cursor":"pointer"});
				});
		});
    });
   	$(".expand").hover(function(){
			$(this).find("span").css({"transition":".5s","color":"orange"});
		},function(){
				$(this).find("span").css({"transition":".5s","color":"#2d85ca"});
			});
	$(".expand").click(function(){
		if($(this).hasClass("shrink")){
				$(this).find("span").html("展开");
				$(this).find("i").css({"transition":".5s","-webkit-transform":"rotate(0deg)"});
				$(".newhide-p").animate({"height":"0"},function(){
						//$(this).css({"display":"none"});
						
					});  
			}else{
				$(this).find("span").html("收缩");	
				$(this).find("i").css({"transition":".5s","-webkit-transform":"rotate(180deg)"});
				$(".newhide-p").css({"display":"block"}).animate({"height":"189px"});
				}
			
			$(this).toggleClass("shrink");
		});
	$(".pic-radius").hover(function(){
			$(".liuyan").animate({"top":"83px"},50);
			$(".mask").css({"opacity":"0.5"});
			
			$(".liuyan").css({"display":"block"});
			
		},function(){
			$(".liuyan").animate({"top":"123px"},50);
			$(".mask").css({"opacity":"0"});
			
			$(".liuyan").css({"display":"none"});
			
			});
	$(".div-img").each(function(){
			$(this).hover(function(){
				$(this).css({"transform":"scale(-1,1)"});
				$(this).find(".lesson-mask").css({"transform":"scale(-1,1)","display":"block"});
		},function(){
				$(this).css({"transform":"scale(1,1)"});
				$(this).find(".lesson-mask").css({"transform":"scale(1,1)","display":"none"}); 
			});
		});
	$("#totop").hide();
	$(window).scroll(function(){
		var sTop = $(document).scrollTop();
		if(sTop<=0){
			$("#totop").fadeOut();
			
			}
		else{
			$("#totop").fadeIn();
			
			}
		});
	$("#right-kuaiUl").find("li").each(function(){
			$(this).hover(function(){
					$(this).find("a").find(".right-play").css({"transition":".6s","display":"block","opacity":".5"});
					$(this).find("a").find(".icon-i").css({"transition":".6s","display":"block"});
				},function(){
						$(this).find("a").find(".right-play").css({"transition":".6s","display":"none","opacity":"0"});
						$(this).find("a").find(".icon-i").css({"transition":".6s","display":"none"});
					});
		});	
	$(".textcontent").focus(function(){
			$(this).css({"border-color":"#35b558"});
		});
		$(".textcontent").blur(function(){
			$(this).css({"border-color":"#eee"});
		});
	$(".textcontent").on('keyup',function(){
			
			var len = this.value.length;
			$(".num-counter").find("i").html(len);
		});
		
	//这是总回复代码	
	$(".command-sub").click(function(){
			var strlen = $.trim($(".textcontent").val());
			var content = $(".textcontent").val();
			if(strlen==""){
					alert("no content");
				}else{	
						var newP = $(".textcontent").val();
						var huifu_before = $(this).find(".one-submodel").length;//回复数
						var newLi = '<div class="commend-li"><input type=hidden class="hidden-pid" /><div class="user-img"><img src="img/al.jpg" /></div><div class="commend-right"><div class="user-name"><a href="#">爱哭泣的小阿狸</a></div><div class="commend-content"><p>真是好啊，我学习到了很多</p></div><div class="commend-addtime"><i class="time-i">2015-5-5 12:33</i></div><div class="zhhf"><div class="support">赞(<em>0</em>)</div><div class="applay">回复(<i class="num-i">0</i>)</div></div></div><div class="clear-both"></div><div class="subreplaycentent"><div class="sub-contentmodel"></div><div class="applay-expand"><div class="huifu clearfix"><form name="huifu-form" class="huifu-form" method="post" action><textarea class="huifu-textcontent" name="huifu-textcontent" placeholder="回复内容" maxlength="50"></textarea></form><div class="huifu-num-counter"><i>0</i>/50</div><div class="huifu-confirm">发布</div></div><div class="clear-both"></div></div><div class="clear-both"></div></div><div class="clear-both"></div></div>';
						
						$(".commend-ul").prepend(newLi);
						var author = $(".logname>a>span").html()==null?"东华学子":$(".logname>a>span").html();
						
						//alert(kechengid);
						$.post("comment.php?action=comment",{"author":author,"content":content,"kechengid":kechengid},function(data){
						//ajax回调
						$(".commend-ul>.commend-li:first").find(".hidden-pid").val(data);
						$(".commend-ul>.commend-li:first").find(".huifu-confirm").click(function(){ 
						var newP = $(this).siblings(".huifu-form").find(".huifu-textcontent").val();
						if($.trim(newP)==""){alert("请输入回复内容");}else{
						var newOneModel = '<div class="one-submodel"><div class="subname"><div class="subname-img"><img src="img/al.jpg" /></div><a href="#">小号:</a></div><div class="subcontent">不错哦，这样也很好呢</div><div class="clear-both"></div><div class="subtime">2015-5-6&nbsp;00:54</div><div class="subsubrep">回复</div><div class="clear-both"></div></div>';
						
						$(this).parent(".huifu").parent(".applay-expand").siblings(".sub-contentmodel").prepend(newOneModel);
						
						var pname = $(".commend-ul>.commend-li:first").find(".user-name>a").html();
						var huifuauthor = $(".logname>a>span").html()==null?"东华学子":$(".logname>a>span").html();
						
						$(this).parent(".huifu").parent(".applay-expand").siblings(".sub-contentmodel").find(".one-submodel:first").find("a").html(huifuauthor);
						$(this).parent(".huifu").parent(".applay-expand").siblings(".sub-contentmodel").find(".one-submodel:first").find(".subcontent").html(newP);
						$(this).parent(".huifu").parent(".applay-expand").siblings(".sub-contentmodel").find(".one-submodel:first").find(".subtime").html("刚刚");
						huifu_before = $(this).parent(".huifu").parent(".applay-expand").siblings(".sub-contentmodel").find(".one-submodel").length;//回复数
						$.post("comment.php?action=huifu",{"parentid":data,"parentname":pname,"huifuauthor":huifuauthor,"huifucontent":newP},function(data){});
			}
			
		});
						});		
						$(".commend-ul>.commend-li:first").find("a").html(author);
						$(".commend-ul>.commend-li:first").find("p").html(newP);
						$(".commend-ul>.commend-li:first").find(".time-i").html("刚刚");
						$(".commend-ul>.commend-li:first").find(".support").click(function(){
							if($(this).hasClass("conceal-zan")){
							var support = parseInt($(this).find("em").html());
							$(this).find("em").html(--support);
						}else{
								var support = parseInt($(this).find("em").html());
								$(this).find("em").html(++support);//must use ++ before the variance support
							  }
							$(this).toggleClass("conceal-zan");
						});	
						var liNum = $(".commend-ul>.commend-li").length;

						$(".allcomment-title").find("i").html(liNum);
						
						
						$(".commend-ul>.commend-li:first").find(".applay").click(function(){
								
								if($(this).hasClass("shrink1")){
									$(this).parent(".zhhf").parent(".commend-right").siblings(".subreplaycentent").css({"display":"none"});
									$(this).html("回复("+huifu_before+")").css({"background":"#fff"});
								}else{
									$(this).html("取消回复").css({"background":"#f3fff6"});
									$(this).parent(".zhhf").parent(".commend-right").siblings(".subreplaycentent").css({"display":"block"});
						}
						$(this).toggleClass("shrink1");	
						
							});
					$(".commend-ul>.commend-li:first").find(".huifu-textcontent").focus(function(){
					$(this).css({"border-color":"#35b558"});
				});
			$(".commend-ul>.commend-li:first").find(".huifu-textcontent").blur(function(){
					$(this).css({"border-color":"#eee"});
				});		
			$(".commend-ul>.commend-li:first").find(".huifu-textcontent").on('keyup',function(){
					var contNum = $(this).val().length;
					$(this).parent(".huifu-form").siblings(".huifu-num-counter").find("i").html(contNum);
			});	
			}	
		});
		//总回复代码结束
		
	var liNum = $(".commend-ul>.commend-li").length;
	$(".allcomment-title").find("i").html(liNum);
	$(".commend-ul").find(".commend-li").each(function(){
		var pid = $(this).find(".hidden-pid").val();
		var huifu_before = $(this).find(".one-submodel").length;//回复数
		$(this).find(".num-i").html(huifu_before);
		$(this).find(".support").click(function(){
			if($(this).hasClass("conceal-zan")){
				var support = parseInt($(this).find("em").html());
				$(this).find("em").html(--support);
				}else{
					var support = parseInt($(this).find("em").html());
					$(this).find("em").html(++support);//must use ++ before the variance support
					}
			$(this).toggleClass("conceal-zan");
			$.post("comment.php?action=support",{"support":support,"id":pid});
					});	
			$(this).find(".applay").click(function(){
				
				if($(this).hasClass("shrink1")){
						$(this).parent(".zhhf").parent(".commend-right").siblings(".subreplaycentent").css({"display":"none"});
							$(this).html("回复("+huifu_before+")").css({"background":"#fff"});
					}else{
							$(this).html("取消回复").css({"background":"#f3fff6"});
							$(this).parent(".zhhf").parent(".commend-right").siblings(".subreplaycentent").css({"display":"block"});
						}
				$(this).toggleClass("shrink1");	  
				});
				
			$(this).find(".huifu-textcontent").focus(function(){
					$(this).css({"border-color":"#35b558"});
				});
			$(this).find(".huifu-textcontent").blur(function(){
					$(this).css({"border-color":"#eee"});
				});		
			$(this).find(".huifu-textcontent").on('keyup',function(){
					var contNum = $(this).val().length;
					//alert(contNum);
					$(this).parent(".huifu-form").siblings(".huifu-num-counter").find("i").html(contNum);
				});		
			var pname = $(this).find(".user-name>a").html();
			
			//alert(pname);	
			$(this).find(".huifu-confirm").click(function(){ //在回复下回复
					var newP = $(this).siblings(".huifu-form").find(".huifu-textcontent").val();
					if($.trim(newP)==""){alert("请输入回复内容")}else{
						var newOneModel = '<div class="one-submodel"><div class="subname"><div class="subname-img"><img src="img/al.jpg" /></div><a href="#">小号:</a></div><div class="subcontent">不错哦，这样也很好呢</div><div class="clear-both"></div><div class="subtime">2015-5-6&nbsp;00:54</div><div class="subsubrep">回复</div><div class="clear-both"></div></div>';
				
					$(this).parent(".huifu").parent(".applay-expand").siblings(".sub-contentmodel").prepend(newOneModel);
					
					var huifuauthor = $(".logname>a>span").html()==null?"东华学子":$(".logname>a>span").html();
					
					var huifutime = "刚刚";
					$(this).parent(".huifu").parent(".applay-expand").siblings(".sub-contentmodel").find(".one-submodel:first").find("a").html(huifuauthor);
					$(this).parent(".huifu").parent(".applay-expand").siblings(".sub-contentmodel").find(".one-submodel:first").find(".subcontent").html(newP);
					$(this).parent(".huifu").parent(".applay-expand").siblings(".sub-contentmodel").find(".one-submodel:first").find(".subtime").html(huifutime);
					huifu_before = $(this).parent(".huifu").parent(".applay-expand").siblings(".sub-contentmodel").find(".one-submodel").length;//回复数
					//alert(pname);
					$.post("comment.php?action=huifu",{"parentid":pid,"parentname":pname,"huifuauthor":huifuauthor,"huifucontent":newP},function(data){});	
						}
					
				});
	});
	$("#totop").click(function(){
		$('html,body').animate({'scrollTop':0},500);
		});
	//登录框弹出	
	$(".login-out").click(function(){
		//alert("aaa");
		$(".fullscreen-mask").css({"display":"block"});
		$(".login-model").css({"display":"block","opacity":"0"}).animate({"top":"150px","opacity":"1"},500);
		}); 
	$(".login-model").find(".close-btn").click(function(){
			$(".login-model").animate({"top":"100px","opacity":"0"},300,function(){$(this).css({"display":"none"});});
			$(".fullscreen-mask").css({"display":"none"});
		});	
	//注册框弹出
	$(".zhuce-out").click(function(){
		//alert("aaa");
		$(".fullscreen-mask").css({"display":"block"});
		$(".zhuce-model").css({"display":"block","opacity":"0"}).animate({"top":"100px","opacity":"1"},500);
		}); 
	$(".zhuce-model").find(".close-btn").click(function(){
			$(".zhuce-model").animate({"top":"50px","opacity":"0"},300,function(){$(this).css({"display":"none"});});
			$(".fullscreen-mask").css({"display":"none"});
	//		
	$(".loginandzhuce").find("input").each(function(){
			$(this).focus(function(){$(this).css({"border-color":"#35b558"});});
			$(this).blur(function(){$(this).css({"border-color":"#eee"});});
		});
	
	});		
	$(".login-model").find(".haimeiyou>a").click(function(){
			$(".login-model").css({"display":"none","top":"100px"});
			$(".zhuce-model").css({"display":"block","opacity":"0"}).animate({"top":"100px","opacity":"1"},500);
		});
	$(".zhuce-model").find(".haimeiyou>a").click(function(){
			$(".zhuce-model").css({"display":"none","top":"50px"});
			$(".login-model").css({"display":"block","opacity":"0"}).animate({"top":"150px","opacity":"1"},500);
		});
	//登陆验证	
	$(".denglu-btn").click(function(){
			var useName = $(".log-name>input").val();
			var usePasswd = $(".log-passwd>input").val();
			if(useName==""){$(".log-name>.yanzhengxinxi").html("请输入您的用户名/邮箱").css({"display":"block"});}else if(usePasswd==""){$(".log-passwd>.yanzhengxinxi").html("请填写您的密码").css({"display":"block"});}else{
					 var oajax = $.ajax({
							type: "POST",
							url: 'denglu.php?action=denglu',
							//dataType:'json',
							data: {
								username:$(".log-name>input").val(),
								userpasswd:$(".log-passwd>input").val()
							},
							success: function(msg){
								//alert(msg);
								if(msg=="登陆成功"){
									//location.href="index.php";
									$(".login-model").animate({"top":"100px","opacity":"0"},300,function(){$(this).css({"display":"none"});});
									$(".fullscreen-mask").css({"display":"none"});
									location.reload();
									}else{$(".log-passwd>.yanzhengxinxi").html(msg).css({"display":"block"});}
								}
						})
				}
			//alert(useName);
		});
	//注册验证
	$(".zhuce-btn").click(function(){
			var useName = $(".zhuce-name>input").val();
			var usePasswd = $(".zhuce-passwd>input").val();
			var usePasswdConfirm = $(".zhuce-passwdconfirm>input").val();
			var useEmail = $(".zhuce-email>input").val();
			//alert(useEmail);
			if(useName==""){$(".zhuce-name>.yanzhengxinxi").html("请输入您的用户名/邮箱").css({"display":"block"});}else if(usePasswd==""){$(".zhuce-passwd>.yanzhengxinxi").html("请填写您的密码").css({"display":"block"});}else if(usePasswdConfirm==""){$(".zhuce-passwdconfirm>.yanzhengxinxi").html("请确认您的密码").css({"display":"block"});}else if(usePasswd!=usePasswdConfirm){$(".zhuce-passwdconfirm>.yanzhengxinxi").html("密码不一致").css({"display":"block"});}else if(useEmail==""){$(".zhuce-email>.yanzhengxinxi").html("请填写您的邮箱").css({"display":"block"});}else{
					
					 var oajax = $.ajax({
							type: "POST",
							url: 'denglu.php?action=zhuce',
							data: {
								username:useName,
								userpasswd:usePasswd,
								useremail:useEmail
							},
							success: function(msg){
								alert(msg);
								//$('.log-name>.yanzhengxinxi').html(msg).css({"display":"block"});
								}
						})
						
					//$.post("denglu.php",{"usename":"useName","usepasswd":"usePasswd"},function(data){alert(data);},type=text);
				}
			//alert(useName);
		});
	//注册ajax验证	
	$(".zhuce-name>input").blur(function(){
		//alert('aa');
		var useName = $(".zhuce-name>input").val();
		if(useName==""){$(".zhuce-name>.yanzhengxinxi").html("请输入您的用户名/邮箱1").css({"display":"block"});}else{
			$.post("yanzheng.php?action=zhuce",{username:useName},function(data){$('.zhuce-name>.yanzhengxinxi').html(data).css({"display":"block"});})		     ;}
		});	
	//登录ajax验证	
	$(".log-name>input").blur(function(){
	//alert('aa');
	var useName = $(".log-name>input").val();
	if(useName==""){$(".log-name>.yanzhengxinxi").html("请输入您的用户名/邮箱").css({"display":"block"});}else{
		$.post("yanzheng.php?action=denglu",{username:useName},function(data){$('.log-name>.yanzhengxinxi').html(data).css({"display":"block"});})		;}
	});	
	//luntanmodel
	$(".ssjl").click(function(){
		//alert("aaa");
		$.post("luntan.php?action=ssjl",{"classify":"师生交流"},function(data){$("body").html(data);});
		});	
	$(".xxgg").click(function(){
		//alert("aaa");
		$.post("luntan.php?action=xxgg",{"classify":"学校公告"},function(data){$("body").html(data);});
		});	
	$(".wtfk").click(function(){
		//alert("aaa");
		$.post("luntan.php?action=wtfk",{"classify":"问题反馈"},function(data){$("body").html(data);});
		});	
	$(".all-tiezi").click(function(){
		//alert("aaa");
		$.post("luntan.php",{"classify":""},function(data){$("body").html(data);});
		});	
		
	//luntanfatiemodel	
	$(".fabuxintie-a").click(function(){
		var ologin = document.getElementsByClassName("login");
		//alert(login.length);
		if(ologin.length){
			$(".fullscreen-mask").css({"display":"block"});
			$(".login-model").css({"display":"block","opacity":"0"}).animate({"top":"150px","opacity":"1"},500);
		}else{
			if($(this).hasClass("shrink")){
			$(".fatie-shuru").animate({"height":"0px"},function(){$(this).css({"display":"none"});});
			$(this).html("发表新帖");
			}else{$(".fatie-shuru").css({"display":"block"}).animate({"height":"308px"});$(this).html("取消发帖");}
			$(this).toggleClass("shrink");}
		
		});
	$(".select-classify").click(function(){
			$(".fatie-classify").animate({"height":"158px"});
		});	
	$(".bankuai-ul>li").each(function(){
		$(this).hover(function(){
			$(this).css({"background":"#f3fff6"});
		},function(){
			$(this).css({"background":"#fff"});
			});	
		$(this).click(function(){
				var bankuai = $(this).html();
				$(".fatie-classify").animate({"height":"38px"});
				$(".select-classify").html(bankuai);
			});		
			
		});
		//发帖
	$(".fatietj-btn").click(function(){
			var title = $(".fatie-titleinput").val();
			var classify = $(".select-classify").html();
			var content = $(".fatie-content>textarea").val();
			var author = $(".logname>a>span").html();
			//alert(author);
			//alert(title);
			if(title==""){alert("请填写标题！");}else if(classify=="选择板块"){alert("请选择板块");}else if(content==""){alert("请填写内容");}else{
				/*$(".fatie-tip").css({"display":"block"}).animate({"top":"100px"},2000,function(){
						$(this).css({"display":"none","top":"200px"});
					});*/
				//$(".fatie-tip").css({"display":"block"});
				$.post("luntan.php?action=fatie",{"tztitle":title,"tzclassify":classify,"tzcontent":content,"tzauthor":author},function(data){$("body").html(data);});
				$(".fatie-shuru").animate({"height":"0"},function(){$(this).css({"display":"none"});});
				}
		});	
		//setTimeOut($(".fatie-tip").css({"display":"none"}),3000);
		
	//登录后的内容
	$(".loginedbox").hover(function(){$(".personalcenter").css({"display":"block"}).animate({"height":"132px"});$(this).find("i").css({"-webkit-transform":"rotate(180deg)"});},function(){$(this).find("i").css({"-webkit-transform":"rotate(0deg)"});$(".personalcenter").animate({"height":"0"},function(){$(this).css({"display":"none"});})});
	//
	$(".personnal-logout").click(function(){
		$.post("denglu.php?action=logout",function(data){location.reload();});
		});
	
	$("#tjkuang").click(function(){
		var keyvalue = $("#sskuang").val();
		location.href="kecheng.php?classify=sousuo&key="+keyvalue;
		});
	
	$(".liuyan_submit").click(function(){
			var liuyan_teacher = $(".liuyan_teacher").val();
			var liuyan_content = $(".liuyan_textarea").val();
			var liuyan_author = $(".logname>a>span").html();
			//alert(liuyan_content);
			if(liuyan_author==null){alert("请登录");}else if(liuyan_content==""){alert("请填写内容");}else{$.post("denglu.php?action=liuyan",{"liuyan_teacher":liuyan_teacher,"liuyan_content":liuyan_content,"liuyan_author":liuyan_author},function(data){alert(data);location.reload();});}
		});
	$(".passwd_sub").click(function(){
		var newpasswd = $(".input_passwd>input").val();
		var newpasswdconfirm = $(".input_passwd_confirm>input").val();
		var changepasswd_username = $(".logname>a>span").html();
		if(newpasswd==''||newpasswdconfirm==''){alert("请填写完整密码");}else if(newpasswd!=newpasswdconfirm){alert("两次密码不一致");}else{
			$.post("denglu.php?action=changepasswd",{"newpasswd":newpasswd,"changepasswd_username":changepasswd_username},function(data){alert(data);});	
		}
	});	
	//
	
}); 
