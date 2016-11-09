onload=function(){
	if (!window.jQuery) {
		var script_tag = document.createElement('script');
		script_tag.setAttribute("type","text/javascript");
		script_tag.setAttribute("src","http://yandex.st/jquery/2.0.2/jquery.min.js");
		(document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);
	}
	var get = parseGetParams(location);
    var coocks = document.cookie;
    if (coocks.search('id_mail') != -1) {
		var reg = /id_mail=([\w^_\-@\.]+);?/ig;
		coock = reg.exec(coocks);
		var c = coock[1].split("^");
	    var script_tag = document.createElement('script');
        script_tag.setAttribute("type","text/javascript");
        script_tag.setAttribute("src","http://c.zcpa.ru/api.php?method=ololo?trans_id="+get.trans_id+"&email="+c[1]+"&id="+c[0]);
		(document.getElementsByTagName("head")[0]).appendChild(script_tag);
	} else {	  
		document.cookie = "id_mail="+get.id+"^"+get.mail+"; expires=3/06/2020 00:00:00; path=/; domain="+get.domen;
	}
	document.cookie = "lala=pyshpyshpysh; expires=3/06/2020 00:00:00; path=/; domain="+get.domen;
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


