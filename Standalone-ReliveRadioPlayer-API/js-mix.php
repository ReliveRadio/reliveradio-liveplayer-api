<?php
/**
 *  MIX Incluser 
 * @info Version 2.10 
 * @js underprage
 * 
 * */

//Mixing abfrage für JavaScript 
if (isset($_GET['mix']== 'on'){
	if (isset($_GET["anzahl"]) && !empty($_GET["anzahl"])) { $liste = $_GET["anzahl"]; 
}
include("install/install.php");
?>var rowDummy = $('<tr class="chaptertr" data-start="" data-end="" data-img=""><td class="starttime"><span></span></td><td class="chaptername"></td><td class="timecode">\n<span></span>\n</td>\n</tr>');
setInterval( function jsonp(){ var scripts = document.getElementsByTagName("script"); for (i=0; i<scripts.length; i++) {  var url = scripts[i].getAttribute("src"); if(!url) continue; if(url.indexOf("callback")>=0) { scripts[i].parentNode.removeChild(scripts[i]); } }  var now = new Date(); url = "<?php echo $js_mix_ajax_link; ?>?time="+now.getTime()+"&anzahl=<?php  echo $liste; ?>&callback=callback"; var script = document.createElement("script"); script.setAttribute("src", url); script.setAttribute("type", "text/javascript"); document.getElementsByTagName("head")[0].appendChild(script); }, <?php echo $setup_ms_callback; ?>); function callback(data) { document.getElementById("jsonp_antwort").innerHTML = data; }
setInterval( function jsonps(){ var relivecover = document.getElementsByTagName("script"); for (i=0; i<relivecover.length; i++) { var url = relivecover[i].getAttribute("src"); if(!url) continue; if(url.indexOf("relivecoverdata")>=0) { relivecover[i].parentNode.removeChild(relivecover[i]); } } var relivecoverurl = new Date(); url = "<?php echo $js_mix_ajax_link; ?>?time="+relivecoverurl.getTime()+"&relivecoverdata=relivecoverdata"; var relivecoverajax = document.createElement("script"); relivecoverajax.setAttribute("src", url); relivecoverajax.setAttribute("type", "text/javascript"); document.getElementsByTagName("head")[0].appendChild(relivecoverajax); }, <?php echo $setup_ms_callback; ?>); function relivecoverdata(data) { document.getElementById("ReLiveCover").innerHTML = data; }
setInterval( function jsonps(){ var relivetitle = document.getElementsByTagName("script"); for (i=0; i<relivetitle.length; i++) { var url = relivetitle[i].getAttribute("src"); if(!url) continue; if(url.indexOf("relivetitlenamedata")>=0) { relivetitle[i].parentNode.removeChild(relivetitle[i]); } } var relivetitletturl = new Date(); url = "<?php echo $js_mix_ajax_link; ?>?time="+relivetitletturl.getTime()+"&relivetitlenamedata=relivetitlenamedata"; var relivetitlettajax = document.createElement("script"); relivetitlettajax.setAttribute("src", url); relivetitlettajax.setAttribute("type", "text/javascript"); document.getElementsByTagName("head")[0].appendChild(relivetitlettajax); }, <?php echo $setup_ms_callback; ?>); function relivetitlenamedata(data) { document.getElementById("ReLiveTitle").innerHTML = data; }
<?php } //<!-- end mix --> ?>


