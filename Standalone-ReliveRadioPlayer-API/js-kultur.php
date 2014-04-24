<?php

//Test the new callbacks
 if (isset($_GET['technik']== 'on'){
 

#####################################################################################################################
	
	//list API
	if (isset($_GET["anzahl"]) && !empty($_GET["anzahl"])) { $liste = $_GET["anzahl"]; }
	
	//all vars includes:
	include("install/install.php");
	
//this is a "template" for each chapter row
//Chapters
//Cover
//Callback Title
######################################################## ALL JS ######################################################

#works!
/*var rowDummy = $('<tr class="chaptertr" data-start="" data-end="" data-img=""><td class="starttime"><span></span></td><td class="chaptername"></td><td class="timecode">\n<span></span>\n</td>\n</tr>');*/

######################################################################################################################
?>
setInterval( function jsonp(){ var scripts = document.getElementsByTagName("script"); for (i=0; i<scripts.length; i++) { var url = scripts[i].getAttribute("src"); if(!url) continue; if(url.indexOf("callback")>=0) { scripts[i].parentNode.removeChild(scripts[i]); } } var now = new Date(); url = "<?php echo $js_ajax_link_kul; ?>?time="+now.getTime()+"&anzahl=<?php  echo $liste; ?>&callback=callback"; var script = document.createElement("script"); script.setAttribute("src", url); script.setAttribute("type", "text/javascript"); document.getElementsByTagName("head")[0].appendChild(script); }, <?php echo $setup_ms_callback; ?>); function callback(data) {  document.getElementById("jsonp_antwort").innerHTML = data; }
setInterval( function jsonps(){ var relivecover = document.getElementsByTagName("script"); for (i=0; i<relivecover.length; i++) { var url = relivecover[i].getAttribute("src"); if(!url) continue; if(url.indexOf("relivecoverdata")>=0) { relivecover[i].parentNode.removeChild(relivecover[i]); } } var relivecoverurl = new Date(); url = "<?php echo $js_ajax_link_kul; ?>?time="+relivecoverurl.getTime()+"&relivecoverdata=relivecoverdata"; var relivecoverajax = document.createElement("script"); relivecoverajax.setAttribute("src", url); relivecoverajax.setAttribute("type", "text/javascript"); document.getElementsByTagName("head")[0].appendChild(relivecoverajax); }, <?php echo $setup_ms_callback; ?>); function relivecoverdata(data) {  document.getElementById("ReLiveCover").innerHTML = data; }
setInterval( function jsonps(){ var relivetitle = document.getElementsByTagName("script"); for (i=0; i<relivetitle.length; i++) { var url = relivetitle[i].getAttribute("src"); if(!url) continue; if(url.indexOf("relivetitlenamedata")>=0) { relivetitle[i].parentNode.removeChild(relivetitle[i]); } } var relivetitletturl = new Date(); url = "<?php echo $js_ajax_link_kul; ?>?time="+relivetitletturl.getTime()+"&relivetitlenamedata=relivetitlenamedata"; var relivetitlettajax = document.createElement("script"); relivetitlettajax.setAttribute("src", url); relivetitlettajax.setAttribute("type", "text/javascript"); document.getElementsByTagName("head")[0].appendChild(relivetitlettajax);}, <?php echo $setup_ms_callback; ?>); function relivetitlenamedata(data) {  document.getElementById("ReLiveTitle").innerHTML = data; }

}
