<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Relive Radio - Standard v.2.1.10</title>
	<link href="./podlove-web-player/static/podlove-web-player.css" rel="stylesheet" media="screen" type="text/css" />
	<script src="./podlove-web-player/libs/html5shiv.js"></script>
	<script src="./podlove-web-player/libs/jquery-1.9.1.min.js"></script>
	<script src="./podlove-web-player/static/podlove-web-player.js"></script>
<style>
.podlovewebplayer_meta .subtitle b{ 
	font-weight: bold;
	font-size: 13px;
}
.podlovewebplayer_meta .subtitle a{ 
	font-size: 12px;
	text-decoration: underline!important;
}
</style>


<?php
## Relive - CSS API #######################################################################################################
/**
*	Relive - Color API
*	@developer by Michael McCouman jr.
* 	@date 4 Juni 2013
*	@version 2.0.2
*/

# Abfrage ob CSS ?
if (isset($_GET["css"]) && !empty($_GET["css"])) {
	
	//Variable übergabe CSS Name
	$css = $_GET["css"];
		
		//Vergelich
		if ($css == 'mix')					{ $style_color 	= 'mix'; }  	//mix
		elseif ($css == 'mix-mobile')		{ $style_color 	= 'mix'; } 	 	//mix-mobile
		elseif ($css == 'technik')			{ $style_color 	= 'technik'; } 	//technik
		elseif ($css == 'technik-mobile')	{ $style_color 	= 'technik'; } 	//technik-mobile	
		elseif ($css == 'kultur')			{ $style_color 	= 'kultur'; }   //kultur
		elseif ($css == 'kultur-mobile')	{ $style_color 	= 'kultur'; } 	//kultur-mobile

			//Error
			else {	echo '<!-- No CSS API!-->'; }

		//Ausgabe Relive css: 
		echo '<link href="http://cm.wikibyte.org/testcodes/neu-chapters/css/'.$style_color.'.css" rel="stylesheet" media="screen" type="text/css" />';

} else {
	//Keine Eingaben
	echo '<!--Standard Player in Black-->';
}

## Stream API ###############################################################################################################
/**
*	Relive - Stream API
*	@developer by Michael McCouman jr.
* 	@date 11 Aug. 2013
*	@version 2.2
*/

// Abfrage welcher Stream ?
if (isset($_GET["stream"]) && !empty($_GET["stream"])) {
	
	//Variable übergabe 
	$stream = $_GET["stream"];

		######### List API #############
		if (isset($_GET["liste"]) && !empty($_GET["liste"])) { 
			$anzahl = $_GET["liste"]; 
		} else {
			//Anzahl, Out
			global $anzahl;
			global $anzahlouts;
			#$anzahl = 6;  //standrad Listenanzahl
			//$anzahl = 6;  					#standrad Listenanzahl
			include('install/install.php');
		}
		######### List API #############
		
		
		## Mix Stream
		if ($stream == 'mix'){ 
			$uristream = "http://stream.reliveradio.de:8000/24.mp3"; 
			$jsonfile = file_get_contents('http://reliveradio.de/stream/mix.json');
			$names = "Mix";
			$urilink = "http://reliveradio.de/stream/mix";
			echo '<script src="http://cm.wikibyte.org/testcodes/neu-chapters/js-mix.php?anzahl='.$anzahl.'"></script>'; 
		}
		elseif ($stream == 'mix-mobile'){ 
			$uristream = "http://stream.reliveradio.de:8000/24mobile.mp3"; 
			$jsonfile = file_get_contents('http://reliveradio.de/stream/mix.json');
			$names = "Mix";
			$urilink = "http://reliveradio.de/stream/mix";
			echo '<script src="http://cm.wikibyte.org/testcodes/neu-chapters/js-mix.php?anzahl='.$anzahl.'"></script>'; 
		}			 
		
		## Technik Stream				 
		elseif ($stream == 'technik'){ 
			$uristream = "http://stream.reliveradio.de:8000/technik.mp3";
			$jsonfile = file_get_contents('http://reliveradio.de/stream/technik.json');
			$names = "Technik";
			$urilink = "http://reliveradio.de/stream/technik";
			echo '<script src="http://cm.wikibyte.org/testcodes/neu-chapters/js-technik.php"></script>'; 
		}			 
		elseif ($stream == 'technik-mobile'){ 
			$uristream = "http://stream.reliveradio.de:8000/technikmobile.mp3"; 
			$jsonfile = file_get_contents('http://reliveradio.de/stream/technik.json');
			$names = "Technik";
			$urilink = "http://reliveradio.de/stream/technik";
			echo '<script src="http://cm.wikibyte.org/testcodes/neu-chapters/js-technik.php"></script>'; 
		}			 
		
		## Kultur Stream				 
		elseif ($stream == 'kultur'){ 
			$uristream = "http://stream.reliveradio.de:8000/kultur.mp3"; 
			$jsonfile = file_get_contents('http://reliveradio.de/stream/kultur.json');
			$names = "Kultur";
			$urilink = "http://reliveradio.de/stream/kultur";
			echo '<script src="http://cm.wikibyte.org/testcodes/neu-chapters/js-kultur.php"></script>'; 
		}			 
		elseif ($stream == 'kultur-mobile'){ 
			$uristream = "http://stream.reliveradio.de:8000/kulturmobile.mp3";
			$jsonfile = file_get_contents('http://reliveradio.de/stream/kultur.json');
			$names = "Kultur";
			$urilink = "http://reliveradio.de/stream/kultur";
			echo '<script src="http://cm.wikibyte.org/testcodes/neu-chapters/js-kultur.php"></script>'; 
		}			 
		
		## No Stream API
		else { 
			$uristream = "http://stream.reliveradio.de:8000/24.mp3"; 
			$jsonfile = file_get_contents('http://reliveradio.de/stream/mix.json');
			$names = "Mix";
			$urilink = "http://reliveradio.de/stream/mix";
			echo '<script src="http://cm.wikibyte.org/testcodes/neu-chapters/js-mix.php?anzahl='.$anzahl.'"></script>';
		}

} else {

	######### List API #############
		if (isset($_GET["liste"]) && !empty($_GET["liste"])) { 
			$anzahl = $_GET["liste"]; 
		} else {
			//$anzahl = 6;  					#standrad Listenanzahl
			include('install/install.php');
			#$anzahl = 6;  //standrad Listenanzahl
		}
	######### List API #############
	$uristream = "http://stream.reliveradio.de:8000/24.mp3"; 
	$jsonfile = file_get_contents('http://reliveradio.de/stream/mix.json');
	$names = "Mix";
	$urilink = "http://reliveradio.de/stream/mix";
	echo '<script src="http://cm.wikibyte.org/testcodes/neu-chapters/js-mix.php?anzahl='.$anzahl.'"></script>';
}
## Stream API ###############################################################################################################



## Color API ################################################################################################################
//Easy Color Player 
if (isset($_GET["color"]) && !empty($_GET["color"])) {
	$color = $_GET["color"];
?><style>.podlovewebplayer_wrapper{color:#ffffff !important;}.podlovewebplayer_wrapper .podlovewebplayer_meta,.podlovewebplayer_wrapper .podlovewebplayer_meta .subtitle,.podlovewebplayer_wrapper .podlovewebplayer_meta h3,.podlovewebplayer_wrapper .podlovewebplayer_meta h3 a,.podlovewebplayer_meta + .summary,.podlovewebplayer_wrapper .podlovewebplayer_controlbox,.podlovewebplayer_wrapper .podlovewebplayer_meta .togglers{color:#ffffff !important;}.podlovewebplayer_wrapper .podlovewebplayer_top,.podlovewebplayer_wrapper .podlovewebplayer_meta{background:#<?php echo $color; ?>;background:-moz-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#<?php echo $color; ?>),color-stop(100%,#<?php echo $color; ?>));background:-webkit-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%);background:-o-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%);background:-ms-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%);background:linear-gradient(to bottom,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $color; ?>',endColorstr='#<?php echo $color; ?>',GradientType=0 );}.podlovewebplayer_meta .bigplay{color:#ffffff;border-color:#ffffff !important;}.podlovewebplayer_meta .bigplay:hover,.podlovewebplayer_meta .bigplay:active,.podlovewebplayer_meta .bigplay.playing:hover,.podlovewebplayer_meta .bigplay.playing:active{color:#ffffff !important;border-color:#ffffff !important;text-shadow:0px 0px 4px #ffffff;text-decoration:none;filter:dropshadow(color=#ffffff,offx=0,offy=0);cursor:pointer;}.podlovewebplayer_meta .togglers .infobuttons,.podlovewebplayer_meta .togglers .infobuttons a,.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons,.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons a{color:#ffffff;text-shadow:0px 0px 1px #ffffff;text-decoration:none;}.podlovewebplayer_meta .togglers .infobuttons:hover,.podlovewebplayer_meta .togglers .infobuttons a:hover,.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons:hover,.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons a:hover{text-shadow:0px 0px 4px #ffffff;text-decoration:none;filter:dropshadow(color=#ffffff,offx=0,offy=0);cursor:pointer;}.podlovewebplayer_meta + .summary,.podlovewebplayer_wrapper .podlovewebplayer_controlbox{background:#<?php echo $color; ?> !important;border-left:3px #<?php echo $color; ?> solid !important;border-right:3px #<?php echo $color; ?> solid !important;}.podlovewebplayer_wrapper .podlovewebplayer_controlbox{background:#<?php echo $color; ?> !important;border-left:3px #<?php echo $color; ?> solid !important;border-right:3px #<?php echo $color; ?> solid !important;}.mejs-controls .mejs-play button{background-position:0 0;}.mejs-controls .mejs-pause button{background-position:0 -16px;}.mejs-controls .mejs-stop button{background-position:-112px 0;}.mejs-controls .mejs-fullscreen-button button{background-position:-32px 0;}.mejs-controls .mejs-unfullscreen button{background-position:-32px -16px;}.mejs-controls .mejs-mute button{background-position:-16px -16px;}.mejs-controls .mejs-unmute button{background-position:-16px 0;}.mejs-controls .mejs-captions-button button{background-position:-48px 0;}.mejs-controls .mejs-loop-off button{background-position:-64px -16px;}.mejs-controls .mejs-loop-on button{background-position:-64px 0;}.mejs-controls .mejs-backlight-off button{background-position:-80px -16px;}.mejs-controls .mejs-backlight-on button{background-position:-80px 0;}.mejs-controls .mejs-sourcechooser-button button{background-position:-128px 0;}.podlovewebplayer_wrapper .mejs-container .mejs-inner .mejs-controls{background:#<?php echo $color; ?> !important;background:-moz-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%) !important;background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#<?php echo $color; ?>),color-stop(100%,#<?php echo $color; ?>)) !important;background:-webkit-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%) !important;background:-o-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%) !important;background:-ms-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%) !important;background:linear-gradient(to bottom,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%) !important;filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $color; ?>',endColorstr='#<?php echo $color; ?>',GradientType=0 ) !important;}.mejs-container .mejs-controls .mejs-time span{color:#111;}.podlovewebplayer_wrapper .podlovewebplayer_chapterbox{border:3px #<?php echo $color; ?> solid !important;border-bottom:0px #<?php echo $color; ?> solid !important;}.podlovewebplayer_wrapper .podlovewebplayer_tableend{background:#<?php echo $color; ?> !important;-webkit-box-shadow:0px 1px #<?php echo $color; ?>;-moz-box-shadow:0px 1px #<?php echo $color; ?>;box-shadow:0px 1px #<?php echo $color; ?>;}.podlovewebplayer_meta .bigplay, .podlovewebplayer_meta .togglers .infobuttons, .podlovewebplayer_meta .togglers .infobuttons a, .podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons, .podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons a {color:#ffffff !important;}.podlovewebplayer_wrapper .podlovewebplayer_meta .bigplay {border: 5px solid #ffffff !important;}.mejs-container .mejs-controls .mejs-time span{color:#<?php echo $color; ?> !important} </style><?php
} else { echo '<!--Standard Player - No Color API!-->'; }
## Color API ################################################################################################################



################################################ Relive - WebPlayer #########################################################
/**
*	Relive - WebPlayer
*	@developer by Michael McCouman jr.
* 	@date 4 Juni 2013
*	@version 2.0.a
*/
	
	//DeCode Json out:
	$suche = json_decode($jsonfile,TRUE);

	## Angaben - Zeit #########
	//Serverzeit
	$timestamp = time();
	$uhrzeit = date("H:i:s",$timestamp);
	
		//Rechner Server: Addierung der Stunden + 02:00:00
		$first 		= 	explode(":",$uhrzeit);
		$second 	= 	explode(":","02:00:50");
		$rechner 	= 	mktime(	$first[0] + $second[0], 
						$first[1] + $second[1], 
						$first[2] + $second[2] );
		
	## Abgleich - Zeit #########	
	//Server Time:
	$server = date("H:i:s", $rechner);
	
	//Serverzeit:
	$agleich = strtotime($server);
	
	
	## Ausgabe der Lise #####################
	//$anzahl = 6; ist standard
	$anzahlouts = ($anzahl -1);
?>
</head>
<body>
<p>


<center>
<div style="float:left; width:33%; margin-top: -32px; padding-bottom: 30px;">
<div style="background-color: #86ba00; width:300px; color:#fff;">
  <center><h2 class="genre-header mix">Mix Player</h2></center>
</div>
<a style="color:#000;" href="./test.php?stream=mix&css=mix">Standard Stream (Mix)</a> <br>
<a style="color:#000;" href="./test.php?stream=mix-mobile&css=mix">Mobile Stream (Mix)</a> <br>
<a style="color:#000;" href="./test.php?stream=mix">Ohne Farbe</a> <br>
</div>


<div style="float:left; width:33%; margin-top: -32px; padding-bottom: 30px;">
<div style="background-color: #49AEC0; width:300px; color:#fff;">
  <center><h2 class="genre-header mix">Technik Player</h2></center>
</div>
<a style="color:#000;" href="./test.php?stream=technik&css=technik">Standard Stream (Tec)</a> <br>
<a style="color:#000;" href="./test.php?stream=technik-mobile&css=technik">Mobile Stream (Tec)</a> <br>
<a style="color:#000;" href="./test.php?stream=technik">Ohne Farbe</a> <br>
</div>


<div style="float:left; width:33%; margin-top: -32px; padding-bottom: 30px;">
<div style="background-color: #f55c2e; width:300px; color:#fff;">
  <center><h2 class="genre-header mix">Kultur Player</h2></center>
</div>
<a style="color:#000;" href="./test.php?stream=kultur&css=kultur">Standard Stream (Kul)</a> <br>
<a style="color:#000;" href="./test.php?stream=kultur-mobile&css=kultur">Mobile Stream (Kul)</a> <br>
<a style="color:#000;" href="./test.php?stream=kultur">Ohne Farbe</a> <br>
</div>
</center>
<?php

############################################# //Start - Audio #############################################
echo '<audio id="testplayer">';
  echo '<source src="'.$uristream.'" type="audio/mpeg"></source>';
echo '</audio>';
############################################# //Ende - Audio ##############################################

####################################### //Start - Podlove Web Player ######################################
echo "<script>\n";			
echo "$('#testplayer').podlovewebplayer({ \n";

//Logo
echo "poster: './podlove-web-player/img/rr-logo.png', \n";
#echo "poster: 'http://static.reliveradio.de/logos/". $suche["live_episode"]["db"]["slugintern"]. ".jpg', \n";

echo "title: 'Relive Radio - ".$names. "', \n";
echo "permalink: '".$urilink."', \n";
echo "subtitle: '<b>Dein Podcast Radio:</b> Das <a style=\"color:#fff;\" href=\"http://reliveradio.de\">ReliveRadio</a> sendet rund um die Uhr Podcastformate aus ganz verschiedenen Themenbereichen...', \n";

//startepisode (läuft gerade)
echo "chapters: [ \n";
  echo " {'start':'00:00:00.000','title':'". preg_replace("/(')+/","&rsquo;",$suche["live_episode"]["db"]["name"]). " - ". preg_replace("/(')+/","&rsquo;",$suche["live_episode"]["track_title"]) ."', 'image':'http://static.reliveradio.de/logos/". $suche["live_episode"]["db"]["slugintern"]. ".jpg'} \n";

//weitere Episoden
for($i = 0; $i < $anzahlouts; ++$i) { 
  echo ",{'start':'". date("H:i:s", (strtotime(substr($suche["upcoming_episodes"][$i]["starts"], 11,-6))-strtotime($server))) ."','title':'". preg_replace("/(')+/","&rsquo;",$suche["upcoming_episodes"][$i]["db"]["name"]) ." - ". preg_replace("/(')+/","&rsquo;",$suche["upcoming_episodes"][$i]["track_title"]). "', 'image':'http://static.reliveradio.de/logos/".$suche["upcoming_episodes"][$i]["db"]["slugintern"]. ".jpg'} \n"; 
} 

echo "], \n";					
#echo "summary: '<p id=\"pinfos\">Das <a href=\"http://reliveradio.de\">ReliveRadio</a> sendet rund um die Uhr Podcastformate aus ganz verschiedenen Themenbereichen. <br><br><b>Motivation</b><br><br>Zum einen, möchten wir mit dem ReliveRadio Menschen erreichen, die sich erst wenig oder gar nicht mit dem Format Podcast beschäftigt haben und so eine niederschwellige Einstiegsmöglichkeit bieten. Zum anderen soll das ReliveRadio aber auch Hörern die Gelegenheit geben, neue Podcastformate kennen zu lernen. Ansonsten möchten wir dazu beitragen, dass Podcasts auch mit geringer Bandbreite jederzeit auf dem Smartphone, dem Smart-TV, im Auto oder auf anderen Geräten gehört werden können.</p>', \n";
echo "duration: '24:00:00',  \n";
echo "alwaysShowHours: true, \n";
echo "startVolume: 0.8, \n";
echo "width: 'auto', \n";
echo "summaryVisible: false, \n";
echo "chaptersVisible: true \n";
echo "}); \n";
echo "</script>\n";
####################################### //End - Podlove Web Player #######################################
?>
</p>

<br>

<p>
<center>
<div style="float:left; width:33%; margin-top: -32px; padding-bottom: 30px;">
<div style="background-color: #000; width:300px; color:#fff;">
	<h2 class="genre-header ">Player Standards (Black)</h2>
</div>
Mix: <a style="color:#000" href="./test.php?stream=mix">Standard</a> | <a style="color:#000" href="./test.php?stream=mix-mobile">Mobile</a><br>
Technik: <a style="color:#000" href="./test.php?stream=technik">Standard</a> | <a style="color:#000" href="./test.php?stream=technik-mobile">Mobile</a><br>
Kultur: <a style="color:#000" href="./test.php?stream=kultur">Standard</a> | <a style="color:#000" href="./test.php?stream=kultur-mobile">Mobile</a>
</div>


<div style="float:left; width:33%; margin-top: -32px; padding-bottom: 30px;">
<div style="width:300px;">
	<h2 class="genre-header" style="border:1px solid #aaa;">Eigene Farbe festlegen</h2>
</div>
Gebe hier ein Farbcode ein: (ohne # !) <br>
<form name="einfarben" action="./test.php?stream=mix&color=" method="get" enctype="text/html">
<input type="text" name="color" id="color" value="" size="20" maxlength="50" />
<input type="Submit" name="" value="Farbe ändern" />
</form>
</div>

<div style="float:left; width:33%; margin-top: -32px; padding-bottom: 30px;">
<div style="background-color: #eee; width:300px;">
	<h2 class="genre-header ">Anzahl der Liste </h2>
</div>
Gebe hier ein Zahl: (Standardwert => 6) <br>
<form name="anzahl" action="./test.php?liste=" method="get" enctype="text/html">
<input type="text" name="liste" id="anzahl" value="" size="20" maxlength="50" />
<input type="Submit" name="" value="Liste ausgeben" />
</form>
</div>

</center>

</div>
</center>
</p>
</body>
</html>