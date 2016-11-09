onload=function(){
	if (!window.jQuery) {
		var script_tag = document.createElement('script');
        script_tag.setAttribute("type","text/javascript");
        script_tag.setAttribute("src","http://yandex.st/jquery/2.0.2/jquery.min.js");
		(document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);

	}
	var get = parseGetParams(location)
	var addict =   "trans_id="+get.trans_id+"&id="+get.id+"&email="+get.mail;

	var $ankers = $('a');
	$ankers.each( function(i, item){
		var a;
		if (item.href.search('[?]') == -1) {
			a = "?"+addict;
		} else{
			a = "&"+addict;
		}
		item.href=item.href+a;
		console.log(item.href);
	});

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