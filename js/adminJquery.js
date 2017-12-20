// JavaScript Document created by lshaluminum 
$(function(){
	$("#totop").hide();
	$(window).scroll(function(){
		var sTop = $(document).scrollTop();
		if(sTop<=0){$("#totop").fadeOut();}else{$("#totop").fadeIn();}
	});
	$("#totop").click(function(){$("html,body").animate({"scrollTop":0});});
	//
	$(".adminlog_sub").click(function(){
		var admin_name = $(".adminname_input").val();
		var admin_passwd = $(".adminpasswd_input").val();
		if(admin_name==""||admin_passwd==""){alert("请填写内容");}else{$.post("adminlog.php?action=login",{"admin_name":admin_name,"admin_passwd":admin_passwd},function(data){if(data=="登录成功"){window.location.href="info_management.php"}});}
	});	
	//
	$(".fenlei>ul").find("li").each(function(){
		$(this).click(function(){
			$(".fenlei>ul").find("li").each(function(){$(this).removeClass("cur");});
			$(this).addClass("cur");
		});
	});
	//ajax
	
	$(".stu_info").click(function(){$.post("doaction.php",{},function(data){$(".right").html(data)});});
	$(".teacher_info").click(function(){$.post("doaction.php?action=teacher_info",{},function(data){$(".right").html(data)});});
	$(".lesson_info").click(function(){$.post("doaction.php?action=lesson_info",{},function(data){$(".right").html(data)});});
	$(".stuforum_info").click(function(){$.post("doaction.php?action=stuforum_info",{},function(data){$(".right").html(data)});});
	$(".stumessage_info").click(function(){$.post("doaction.php?action=stumessage_info",{},function(data){$(".right").html(data)});});
	$(".stucomment_info").click(function(){$.post("doaction.php?action=stucomment_info",{},function(data){$(".right").html(data)});});
	$(".logout").click(function(){$.post("adminlog.php?action=logout",{},function(data){location.reload();});});
	//
	$(".teacherlog_sub").click(function(){
		var admin_name = $(".adminname_input").val();
		var admin_passwd = $(".adminpasswd_input").val();
		if(admin_name==""||admin_passwd==""){alert("请填写登录信息");}else{$.post("teacher_log.php?action=login",{"teacher_name":admin_name,"teacher_passwd":admin_passwd},function(data){if(data=="登录成功"){window.location.href="index.php"}});}
	});	
	
	$(".teacher_logout").click(function(){
		$.post("teacher_log.php?action=logout",{},function(){location.reload();});
	});
	//
	$(".hover_li").hover(function(){

		if($(this).find("span").find("em").html()=="未阅读"){
			$(this).find(".biaoji_read").css({"display":"block"});		
		}
	},function(){

		$(this).find(".biaoji_read").css({"display":"none"});
	});
});