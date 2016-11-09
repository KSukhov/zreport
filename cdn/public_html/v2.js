onload=function(){
	if (!window.jQuery) {
		var script_tag = document.createElement('script');
		script_tag.setAttribute("type","text/javascript");
		script_tag.setAttribute("src","http://yandex.st/jquery/2.0.2/jquery.min.js");
		(document.getElementsByTagName('head')[0] || document.documentElement).appendChild(script_tag);
	}
	var get = parseGetParams(location);
	var coocks = document.cookie;
	if (coocks.search('zdorov_id') != -1) {
		console.log('yesss: '+coocks);
		var reg = /zdorov_id=([\w^_]+);?/ig;
		coock = reg.exec(coocks);
		if(coock[1] == get.id){
			var script_tag = document.createElement('script');
			script_tag.setAttribute("type","text/javascript");
			script_tag.setAttribute("src","http://c.zcpa.ru/api.php?method=ololo_v2?trans_id="+get.trans_id+"&id="+get.id);
			document.getElementsByTagName("head")[0]).appendChild(script_tag);
		}
	} else {	
		if (get.id != undefined) {
			dateObj = new Date();
			dateObj.setDate(-30)
			console.log("hostset: "+location.hostname); 
			var day =(parseInt(dateObj.getDate(), 10) < 10 ) ? ('0'+dateObj.getDate()) : (dateObj.getDate());		
			var coock ="zdorov_id="+get.id+"; expires="+day+"/"+(dateObj.getMonth()+1)+"/"+dateObj.getFullYear()+" 00:00:00; path=/; domain="+location.hostname;
			document.cookie = coock;
		}
		if(get.nomulti === undefined){
			var list = new Array(
				"http://vklink.cg41118.tmweb.ru",
				"http://global.cg41118.tmweb.ru"
			);
			$(list).each(function(i, url){
				var frame_tag = document.createElement('iframe');
				frame_tag.setAttribute("src",url+"?nomulti=1&id="+get.id);
				frame_tag.setAttribute("width","1px");
				frame_tag.setAttribute("height","1px");
				(document.getElementsByTagName("body")[0] || document.documentElement).appendChild(frame_tag);
			}); 
		}
	}
}



function parseGetParams(location) {
	var $_GET = {}; 
	var __GET = location.search.substring(1).split("&");
	for(var i=0; i<__GET.length; i++) {
		var getVar = __GET[i].split("=");
		$_GET[getVar[0]] = typeof(getVar[1])=="undefined" ? "" : getVar[1];
	}
	let hostname = location.hostname;
	$_GET['domen'] = hostname.split(".").slice(-2).join(".");
	return $_GET;
}