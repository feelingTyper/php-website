// JavaScript Document created by lshaluminum 
window.onload = function(){
		var oUl = document.getElementById("ul1");
		var oOl = document.getElementById("ol1");
		var aLi = oUl.getElementsByTagName("li");
		var aOi = oOl.getElementsByTagName("li");
		var oBox = document.getElementById("center");
		var oneWidth = aLi[0].offsetWidth;
		var oneHeight = aLi[0].offsetHeight;
		var iNow = 0;
		var iNow2 = 0;
		var timer = null;
        //var oZuixunUl = document.getElementById("zuixin-ul");
        //var aZuixunLi = oZuixunUl.getElementsByTagName("li");
		
		//alert(liLength);
		oUl.style.width = aLi.length*oneWidth + "px";
		for(var i=0;i<aLi.length;i++){
				aOi[i].index = i;
				aOi[i].onmouseover = function(){
						for(var j=0;j<aOi.length;j++){
								aOi[j].className="";
								/*aLi[j].style.display = "none";
								aLi[j].style.opacity=0;
								aLi[j].style.filter="alpha(opacity=0)";
								startMove(aLi[j],{opacity:0},function(){
										aLi[j].style.display = "none";
									});淡入淡出效果*/
							}
						this.className = "active";
						iNow = this.index;
						iNow2 = this.index;
						aLi[this.index].style.display="block";
						startMove(oUl,{left:-(oneWidth*this.index)});
					}
				
			}
		oBox.onmouseover = function(){
				clearInterval(timer);
			}
		oBox.onmouseout = function(){
			   timer = setInterval(toRun,2000);
					}
		timer = setInterval(toRun,2000);
		function toRun(){
			if(iNow == 0){
					aLi[0].style.position = "static";
					oUl.style.left = 0;
					iNow2 = 0;
				}
			if(iNow == aLi.length-1){
				iNow = 0;
				iNow2++;
				aLi[0].style.position = "relative";
				aLi[0].style.left = aLi.length*oneWidth + "px";
				}else{
					iNow++;
					iNow2++;
				}
			for(var j=0;j<aOi.length;j++){
				aOi[j].className="";
							}
			aOi[iNow].className = "active";
			startMove(oUl,{left:-(oneWidth*iNow2)});	
					
			}
     //   for(var i=0;i<aZuixinLi.length;i++){
     //       aZuixunLi[i].onmouseover = function(){
    //
     //       }
     //   }
	 /*addLoadEvent(function(){
		var imgs = document.getElementById("container ").getElementsByTagName('img');
		imgSizer.collate(imgs);
		});*/
}
/*function setBack(){
		var oUl = document.getElementById("speech-ul");
		var aLi = oUl.getElementsByTagName("li");
		for(var i=0;i<aLi.length;i++){
				if(i%2!=0){
						aLi[i].style.background = "#eee";
					}
			}
	}*/
//move kuangjia 
function getStyle(obj, attr)
{
    if(obj.currentStyle)
    {
        return obj.currentStyle[attr];
    }
    else
    {
        return getComputedStyle(obj, false)[attr];
    }
}
 
function startMove(obj, json, fn)
{
    clearInterval(obj.timer);
    obj.timer=setInterval(function (){
        var bStop=true;        //这一次运动就结束了——所有的值都到达了
        for(var attr in json)
        {
            //1.取当前的值
            var iCur=0;
             
            if(attr=='opacity')
            {
                iCur=parseInt(parseFloat(getStyle(obj, attr))*100);
            }
            else
            {
                iCur=parseInt(getStyle(obj, attr));
            }
             
            //2.算速度
            var iSpeed=(json[attr]-iCur)/8;
            iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
             
            //3.检测停止
            if(iCur!=json[attr])
            {
                bStop=false;
            }
             
            if(attr=='opacity')
            {
                obj.style.filter='alpha(opacity:'+(iCur+iSpeed)+')';
                obj.style.opacity=(iCur+iSpeed)/100;
            }
            else
            {
                obj.style[attr]=iCur+iSpeed+'px';
            }
        }
         
        if(bStop)
        {
            clearInterval(obj.timer);
             
            if(fn)
            {
                fn();
            }
        }
    }, 30)
}	
	