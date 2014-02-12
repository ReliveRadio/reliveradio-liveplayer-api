<?php

# Abfrage ob CSS ?
if (isset($_GET["css"]) && !empty($_GET["css"])) {
	
	//Variable übergabe CSS Name
	$css = $_GET["css"];


		//mix
		if ($css == 'mix'){
			$mix_color = $_GET["css"];
		} 
	
		//technik
		elseif ($css == 'technik'){
			$technik_color = $_GET["css"];
		} 
	
		//kultur
		elseif ($css == 'kultur'){
			$kultur_color = $_GET["css"];
		} 
		
		else {
			echo 'geht nicht!';
		}

		#Ausgabe CSS:
		echo '<link href="http://cm.wikibyte.org/testcodes/neu-chapters/'.$mix_color .''. $technik_color .''. $kultur_color.'.css" rel="stylesheet" media="screen" type="text/css" />';




} else {

		############## Easy Color Player 
		if (isset($_GET["color"]) && !empty($_GET["color"])) {
  			$color = $_GET["color"];

				?>
					<style>	.podlovewebplayer_wrapper{color:#ffffff !important;}.podlovewebplayer_wrapper .podlovewebplayer_meta,.podlovewebplayer_wrapper .podlovewebplayer_meta .subtitle,.podlovewebplayer_wrapper .podlovewebplayer_meta h3,.podlovewebplayer_wrapper .podlovewebplayer_meta h3 a,.podlovewebplayer_meta + .summary,.podlovewebplayer_wrapper .podlovewebplayer_controlbox,.podlovewebplayer_wrapper .podlovewebplayer_meta .togglers{color:#ffffff !important;}.podlovewebplayer_wrapper .podlovewebplayer_top,.podlovewebplayer_wrapper .podlovewebplayer_meta{background:#<?php echo $color; ?>;background:-moz-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#<?php echo $color; ?>),color-stop(100%,#<?php echo $color; ?>));background:-webkit-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%);background:-o-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%);background:-ms-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%);background:linear-gradient(to bottom,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $color; ?>',endColorstr='#<?php echo $color; ?>',GradientType=0 );}.podlovewebplayer_meta .bigplay{color:#ffffff;border-color:#ffffff !important;}.podlovewebplayer_meta .bigplay:hover,.podlovewebplayer_meta .bigplay:active,.podlovewebplayer_meta .bigplay.playing:hover,.podlovewebplayer_meta .bigplay.playing:active{color:#ffffff !important;border-color:#ffffff !important;text-shadow:0px 0px 4px #ffffff;text-decoration:none;filter:dropshadow(color=#ffffff,offx=0,offy=0);cursor:pointer;}.podlovewebplayer_meta .togglers .infobuttons,.podlovewebplayer_meta .togglers .infobuttons a,.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons,.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons a{color:#ffffff;text-shadow:0px 0px 1px #ffffff;text-decoration:none;}.podlovewebplayer_meta .togglers .infobuttons:hover,.podlovewebplayer_meta .togglers .infobuttons a:hover,.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons:hover,.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons a:hover{text-shadow:0px 0px 4px #ffffff;text-decoration:none;filter:dropshadow(color=#ffffff,offx=0,offy=0);cursor:pointer;}.podlovewebplayer_meta + .summary,.podlovewebplayer_wrapper .podlovewebplayer_controlbox{background:#<?php echo $color; ?> !important;border-left:3px #<?php echo $color; ?> solid !important;border-right:3px #<?php echo $color; ?> solid !important;}.podlovewebplayer_wrapper .podlovewebplayer_controlbox{background:#<?php echo $color; ?> !important;border-left:3px #<?php echo $color; ?> solid !important;border-right:3px #<?php echo $color; ?> solid !important;}.mejs-controls .mejs-play button{background-position:0 0;}.mejs-controls .mejs-pause button{background-position:0 -16px;}.mejs-controls .mejs-stop button{background-position:-112px 0;}.mejs-controls .mejs-fullscreen-button button{background-position:-32px 0;}.mejs-controls .mejs-unfullscreen button{background-position:-32px -16px;}.mejs-controls .mejs-mute button{background-position:-16px -16px;}.mejs-controls .mejs-unmute button{background-position:-16px 0;}.mejs-controls .mejs-captions-button button{background-position:-48px 0;}.mejs-controls .mejs-loop-off button{background-position:-64px -16px;}.mejs-controls .mejs-loop-on button{background-position:-64px 0;}.mejs-controls .mejs-backlight-off button{background-position:-80px -16px;}.mejs-controls .mejs-backlight-on button{background-position:-80px 0;}.mejs-controls .mejs-sourcechooser-button button{background-position:-128px 0;}.podlovewebplayer_wrapper .mejs-container .mejs-inner .mejs-controls{background:#<?php echo $color; ?> !important;background:-moz-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%) !important;background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#<?php echo $color; ?>),color-stop(100%,#<?php echo $color; ?>)) !important;background:-webkit-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%) !important;background:-o-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%) !important;background:-ms-linear-gradient(top,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%) !important;background:linear-gradient(to bottom,#<?php echo $color; ?> 0%,#<?php echo $color; ?> 100%) !important;filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $color; ?>',endColorstr='#<?php echo $color; ?>',GradientType=0 ) !important;}.mejs-container .mejs-controls .mejs-time span{color:#111;}.podlovewebplayer_wrapper .podlovewebplayer_chapterbox{border:3px #<?php echo $color; ?> solid !important;border-bottom:0px #<?php echo $color; ?> solid !important;}.podlovewebplayer_wrapper .podlovewebplayer_tableend{background:#<?php echo $color; ?> !important;-webkit-box-shadow:0px 1px #<?php echo $color; ?>;-moz-box-shadow:0px 1px #<?php echo $color; ?>;box-shadow:0px 1px #<?php echo $color; ?>;}.podlovewebplayer_meta .bigplay, .podlovewebplayer_meta .togglers .infobuttons, .podlovewebplayer_meta .togglers .infobuttons a, .podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons, .podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons a {color:#ffffff !important;}.podlovewebplayer_wrapper .podlovewebplayer_meta .bigplay {border: 5px solid #ffffff !important;}.mejs-container .mejs-controls .mejs-time span{color:#<?php echo $color; ?> !important} </style>
				<?php		
		} else {

				echo '<!--Standard Player - No API!-->';

		}

		############

	echo '<!--Color Player Black-->';
	
}

?>