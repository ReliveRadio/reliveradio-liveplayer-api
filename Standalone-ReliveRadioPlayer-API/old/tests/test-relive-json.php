<?php

	//ReRadio Json:
	$jsonfile = file_get_contents('http://testpreview.reliveradio.de/stream/technik.json');

	//DeCode Json Out:
	$suche = json_decode($jsonfile,TRUE);
	
	##### Angaben - Zeit #########
	//Serverzeit
	$timestamp = time();
	$uhrzeit = date("H:i:s",$timestamp);
	
		//Rechner Server: Addierung der Stunden + 02:00:00
		$first 		= 	explode(":",$uhrzeit);
		$second 	= 	explode(":","02:00:50");
		$rechner 	= 	mktime(	$first[0] + $second[0], 
								$first[1] + $second[1], 
								$first[2] + $second[2] );
		
	##### Abgleich - Zeit #########
	//ReLive Time (gerade läuft:)
	$retime = substr($suche["live_episode"]["ends"], 11,-6);
		
	//Server Time:
	$server = date("H:i:s", $rechner);
		#$server = 	"21:34:50";			
		
		//Test: Serverzeit+2Stunden:
		#echo 'Livetime:'. $server.'<br><br>';

		//Testausgaben A & B
		#echo 'O.A:'. $server. '<br>'; 
		#echo 'O.B:'. $retime. '<br>';
	
	# Wandler
	//Serverzeit, ReliveZeit:
	$agleich = strtotime($server);
	$bgleich = strtotime($retime);
	$cgleich = strtotime(substr($suche["live_episode"]["ends"], 11,-6));
	
	//Berechne lasttime bis new episode
	$resttime = ($cgleich-$agleich);
		
		//Testausgaben Stringtimes
		echo 'A: <span style="color:#0c0;">'. $agleich. '</span> <i>Stringtime Nutzer </i><br>'; 
		echo 'B: <span style="color:#00f;">'. $bgleich. '</span> <i>Stringtime Relive neue Episode </i><br>'; 
		//Ausgebe String - Restzeit:
		echo 'X: <span style="color:#f00;">'. $resttime. '</span> <i>Rest Stringtime</i><br><br>'; 


		//Testausgaben A & B + Restzeit:
		echo 'A.ser: <span style="color:#0c0;">'. $server. '</span> <i>Ges. Zeit Nutzer </i><br>'; 
		echo 'B.rel: <span style="color:#00f;">'. $retime. '</span> <i>Ges. Zeit Relive neue Episode </i><br>'; 
		echo 'R.est: <span style="color:#f00;">'. date("H:i:s", $resttime). '</span> <i>Ges. Restzeit von Relive bis neue Episode</i><br>'; 

		//Funktion in Sekunden:
		function onlineTime($time) {
    		$time=explode(':',$time);
    		$sec = $time[0];
    		$sec+=$time[1]*60;
    		$sec+=$time[2]*3600;
    			return $sec;
		}
		$aaa = onlineTime($resttime);

		echo 'O.sek: <span style="color:#f00;">'. $aaa. '</span> <i>Ges. Restzeit von Relive in Sekunden</i><br>'; 

	#echo strtotime(substr($suche["upcoming_episodes"][2]["db"]["ends"], 11,-6));
	#echo date("H:i:s", (strtotime(substr($suche["upcoming_episodes"][2]["db"]["ends"], 11,-6)) - strtotime(date("H:i:s", $rechner))));


/*
//Ausgabe real:
echo 'A Time jetzt: <br>';
echo 'B Time ohne:'. strtotime(substr($suche["live_episode"]["starts"], 0, 11)). '<br>';
echo 'Time original:'. $suche["live_episode"]["starts"]. '<br>';
echo 'Time subst ohne:'. substr($suche["live_episode"]["starts"], 11). '<br>';
*/


/*
//Testschleife:
if (time() < strtotime(substr($suche["live_episode"]["starts"], 0, 19))) {	

	echo $suche["live_episode"]["starts"];

} else { 
	echo 'nix da'; 
}
*/



/*
*	Neuste Episode:
**/
echo 'Name:  '.$suche["live_episode"]["db"]["name"]. '<br>';
echo 'Folge: '.$suche["live_episode"]["track_title"]. '<br>';
echo 'Desc:  '.$suche["live_episode"]["db"]["description"]. '<br>';
echo 'Img:  <img src="http://static.reliveradio.de/logos/'.$suche["live_episode"]["db"]["slugintern"]. '.jpg" /><br>';


/**
* 	Nachfolgende Episoden:
*
echo 'Name:  '.$suche["upcoming_episodes"][0]["db"]["name"]. '<br>';
echo 'Folge: '.$suche["upcoming_episodes"][0]["track_title"]. '<br>';
echo 'Desc:  '.$suche["upcoming_episodes"][0]["db"]["description"]. '<br>';
echo 'Img:  <img src="http://static.reliveradio.de/logos/'.$suche["upcoming_episodes"][0]["db"]["slugintern"]. '.jpg" /><br>';
*/


/**
*	Schleifen Test:
*
for($i = 0; $i < count($suche["upcoming_episodes"][0]); ++$i) {
   	echo '<tr class="chaptertr oddchapter loaded" data-start="0.5" data-end="1.5" data-img="..."><td class="starttime"><span>00:01</span></td><td class="chaptername">'.$suche["upcoming_episodes"][$i]["db"]["name"]. ' - '.$suche["upcoming_episodes"][$i]["track_title"]. '</td><td class="timecode"><span>0:01</span></td></tr>';
}
*/
                            

?>

<?php
echo'<pre>';
print_r(json_decode($jsonfile));
echo'<pre>';
?>