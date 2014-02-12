<?php
/**
*	Install Webplayer
*	--------------------------------
*	Parameter Angaben hier anpassen:
*
*/

# Install Pfad des gesammten Packetes (URL)
$setup_url = "http://cm.wikibyte.org/testcodes/neu-chapters";


# Standrad Listenanzahl festelegen
$anzahl = 5;  											//Standard ist: 5


# Callbacks für JS in /ms 
$setup_ms_callback = 8999; 								//Standard ist: 60999


# Anzahl der Textausgabe: (max 29 Wörter)
$dec_max_limet = 28;									//Description zur laufenden Sendung im Player ausgeben





######################################## Ab hier nicht ändern bitte! #########################################
/**
*	Dieser Bereich wird später zu einer Datei zusammengebunden!
*	Bitte hier nix ändern - danke :)
**/

#JS Data URLs
$js_mix_ajax_link = $setup_url. "/ajax-mix.php"; 		//JS - Mix
$js_ajax_link_tec = $setup_url. "/ajax-technik.php"; 	//JS - Technik
$js_ajax_link_kul = $setup_url. "/ajax-kultur.php"; 	//JS - Kultur


?>