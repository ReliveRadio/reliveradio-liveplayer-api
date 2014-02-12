

/**
*	Callback ajax.js
*/
setInterval( function jsonps(){

  // Löschen bereits vorhandener JSONP Skripte
  var reliveajphp = document.getElementsByTagName("script");
  for (i=0; i<reliveajphp.length; i++) {
    var url = reliveajphp[i].getAttribute("src");
    if(!url) continue;
    if(url.indexOf("reliveajaxphpdata")>=0) {
      reliveajphp[i].parentNode.removeChild(reliveajphp[i]);
    }
  }

  // Anlegen und Einfügen des neuen Skripts
  var reliveajaxphpurl = new Date();
  url = "http://cm.wikibyte.org/testcodes/neu-chapters/ajax.php?time="+reliveajaxphpurl.getTime()+"&reliveajaxphpdata=reliveajaxphpdata";
  var reliveajphpajax = document.createElement("script");
  reliveajphpajax.setAttribute("src", url);
  reliveajphpajax.setAttribute("type", "text/javascript");
  document.getElementsByTagName("head")[0].appendChild(reliveajphpajax);
  
}, 10500);

//---------------------------- Entgegennahme der Serverantwort
function reliveajaxphpdata(data) { 
  document.getElementById("Pty").innerHTML = data;
}