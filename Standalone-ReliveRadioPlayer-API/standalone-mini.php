<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Relive Radio - Live Mini Player</title>
	<link href="./podlove-web-player/static/podlove-web-player-mini.css" rel="stylesheet" media="screen" type="text/css" />
	<script src="./podlove-web-player/libs/html5shiv.js"></script>
	<script src="./podlove-web-player/libs/jquery-1.9.1.min.js"></script>
	<script src="./podlove-web-player/static/podlove-web-player.js"></script>
<?php
/**
*	ReliveRadio Live MiniWeblayer 
*	@developer by Michael McCouman jr.
* 	@date 11 Aug. 2013
*	@version 2.1.10
*/

## Relive - CSS API #######################################################################################################
/**
*	Relive - Color API
*	@developer by Michael McCouman jr.
* 	@date 4 Juni 2013
*	@version 2.0.a
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
// Abfrage welcher Stream ?
if (isset($_GET["stream"]) && !empty($_GET["stream"])) {
	
	//Variable übergabe 
	$stream = $_GET["stream"];
		
		## Mix Stream
		if ($stream == 'mix'){ 
			$uristream = "http://stream.reliveradio.de:8000/24.mp3"; 
			$names = "Mix";
			$urilink = "http://reliveradio.de/stream/mix";
			
		}
		elseif ($stream == 'mix-mobile'){ 
			$uristream = "http://stream.reliveradio.de:8000/24mobile.mp3"; 
			$names = "Mix - Mobile";
			$urilink = "http://reliveradio.de/stream/mix";
			
		}			 
		
		## Technik Stream				 
		elseif ($stream == 'technik'){ 
			$uristream = "http://stream.reliveradio.de:8000/technik.mp3";
			$names = "Technik";
			$urilink = "http://reliveradio.de/stream/technik";
			
		}			 
		elseif ($stream == 'technik-mobile'){ 
			$uristream = "http://stream.reliveradio.de:8000/technikmobile.mp3"; 
			$names = "Technik - Mobile";
			$urilink = "http://reliveradio.de/stream/technik";
			
		}			 
		
		## Kultur Stream				 
		elseif ($stream == 'kultur'){ 
			$uristream = "http://stream.reliveradio.de:8000/kultur.mp3"; 
			$names = "Kultur";
			$urilink = "http://reliveradio.de/stream/kultur";
			
		}			 
		elseif ($stream == 'kultur-mobile'){ 
			$uristream = "http://stream.reliveradio.de:8000/kulturmobile.mp3";
			$names = "Kultur - Mobile";
			$urilink = "http://reliveradio.de/stream/kultur";
			
		}			 
		
		## No Stream API
		else { 
			$uristream = "http://stream.reliveradio.de:8000/24.mp3"; 
			$names = "Mix";
			$urilink = "http://reliveradio.de/stream/mix";
		}

} else {
## No Stream API => Standard
	$uristream = "http://stream.reliveradio.de:8000/24.mp3"; 
	$names = "Mix";
	$urilink = "http://reliveradio.de/stream/mix";
}
## Stream API ###############################################################################################################



## Color API ###############################################################################################################
//Easy Color Player 
if (isset($_GET["color"]) && !empty($_GET["color"])) {
  			$color = $_GET["color"];
?><style>div.podlovewebplayer_tableend,div.podlovewebplayer_meta{background: #<?php echo $color; ?> !important;}</style><?php		
//Error
} else { echo '<!--Standard Mini Player - No Color API!-->'; }
## Color API ###############################################################################################################




################################################ Relive - WebPlayer ########################################################
/**
*	Relive - WebPlayer
*	@developer by Michael McCouman jr.
* 	@date 4 Juni 2013
*	@version 2.0.a
*/
?>
</head>
<body style="margin:0px; padding:0px;">
<p>
<?php

############################################# //Start - Audio #############################################
echo '<audio id="testplayer">';
  echo '<source src="'.$uristream.'" type="audio/mpeg"></source>';
echo '</audio>';
############################################# //Ende - Audio ##############################################

####################################### //Start - Podlove Web Player ######################################
echo "<script>\n";			
echo "$('#testplayer').podlovewebplayer({ \n";
echo "title: 'ReliveRadio <br>".$names. "', \n";
echo "permalink: '".$urilink."', \n";
echo "duration: '24:00:00',  \n";
echo "startVolume: 0.8, \n";
echo "width: 'auto', \n";
echo "timecontrolsVisible: false, \n";
echo "}); \n";
echo "</script>\n";
####################################### //End - Podlove Web Player #######################################

?>
</p>
</body>
</html>