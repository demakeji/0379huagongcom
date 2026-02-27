function o(item){
	return document.getElementById(item); 
}

//var Today_recom={step:42,totalcount:4,a_pre:"",a_next:"",ul:'ul_recom'}; 
var IndexRecom={bigpic:"SwitchBigPic",step:230,smallpic:"SwitchSmaPic",selectstyle:"currA",pictxt:"",totalcount:4,autotimeintval:6000,objname:"IndexRecom"}; 
var B=BigNews={current:0,next:0,scrollInterval:0,autoScroller:0,smallpic:"SwitchSmaPic"}; 
BigNews.turn = function(index, obj){
	clearInterval(BigNews.autoScroller); 
	BigNews.scroll(index, obj); 
}
BigNews.scroll = function(index, obj){
	if (obj.smallpic == null || obj.smallpic == "") {
		clearInterval(BigNews.autoScroller); 
		return; 
	}
	var count = 0; 
	var step = obj.step; 
	var duration = 16; 
	var b = BigNews; 
	b.next = index; 
	if (index == b.current) {
		return; 
	}
	clearInterval(b.scrollInterval); 
	for (var i = 0;  i < obj.totalcount;  i++) {
		o(obj.smallpic + "_" + i).className = ''; 
		if (obj.pictxt != null && obj.pictxt != "") 
			o(obj.pictxt + "_" + i).style.display = "none"; 
	}
	o(obj.smallpic + "_" + index).className = obj.selectstyle; 
	if (obj.pictxt != null && obj.pictxt != "") 
		o(obj.pictxt + "_" + index).style.display = "block"; 
	var span = index - b.current; 
	var begin_value = o(obj.bigpic).scrollTop; 
	var chang_in_value = span * step + (b.current * step - begin_value); 
	b.scrollInterval = setInterval(function(){
		doit(begin_value, chang_in_value)
	}, 10); 
	function doit(b, c){
		o(obj.bigpic).scrollTop = cpu(count, b, c, duration); 
		count++; 
		if (count == duration) {
			clearInterval(BigNews.scrollInterval); 
			scrollInterval = 0; 
			count = 0; 
			o(obj.bigpic).scrollTop = b + c; 
			BigNews.current = index; 
		}
	}
	function cpu(t, b, c, d){return c * ((t = t / d - 1) * t * t + 1) + b; }; 
}
BigNews.auto = function(obj){
	//clearTimeout(BigNews.autoScroller); 
	clearInterval(BigNews.autoScroller); 
	BigNews.autoScroller = setInterval(function(){BigNews.scroll(BigNews.current == (obj.totalcount - 1) ? 0 :BigNews.current + 1, obj); }, obj.autotimeintval); }
	BigNews.pauseSwitch = function(){
		//clearTimeout(BigNews.autoScroller); 
		clearInterval(BigNews.autoScroller); 
	}
BigNews.init = function(obj){
	o(obj.bigpic).onmouseover = new Function("BigNews.pauseSwitch(); "); 
	o(obj.bigpic).onmouseout = new Function("BigNews.auto(" + obj.objname + "); "); 
	for (i = 0;  i < obj.totalcount;  i++) {
		if (obj.smallpic != null && obj.smallpic != "") {
			o(obj.smallpic + "_" + i).onmouseover = new Function("BigNews.turn(" + i + "," + obj.objname + "); BigNews.pauseSwitch(); "); 
			o(obj.smallpic + "_" + i).onmouseout = new Function("BigNews.auto(" + obj.objname + "); "); 
		}
	}
	BigNews.smallpic = obj.smallpic; 
}

BigNews.init(IndexRecom); 
if (!BigNews.autoScroller) {
	BigNews.auto(IndexRecom); 
}
