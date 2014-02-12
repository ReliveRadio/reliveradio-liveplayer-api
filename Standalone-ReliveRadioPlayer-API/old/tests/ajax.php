<?php
/**
*
*	TESTSYSTEM für Relive ausgabe über Ajax & JsonP
*
*	@Developer: Michael McCouman jr.
*	@Mail: Support@wikibyte.org
* 	@Version: 0.1.2a
*
*/
if (isset($_GET["read"]) && !empty($_GET["read"])) {
	
	//Variable übergabe 
	$reads = $_GET["read"];
		
		## Mix Stream
		if ($reads == 'mix'){
			$jsonfile = file_get_contents('http://testpreview.reliveradio.de/stream/mix.json');
		}
		
		## Technik Stream				 
		elseif ($reads == 'technik'){ 
			$jsonfile = file_get_contents('http://testpreview.reliveradio.de/stream/technik.json');
		}			 		 
		
		## Kultur Stream				 
		elseif ($reads == 'kultur'){ 
			$jsonfile = file_get_contents('http://testpreview.reliveradio.de/stream/kultur.json');
		}			 			 
		
		## No Stream API
		else { 
			echo "Bitte einen Stream angeben! <span style='color:#f00;'>ajax.php?read=</span> 
			<br>mix, technik, kultur"; 
		}

} 

	//ReRadio
	#$jsonfile = file_get_contents('http://testpreview.reliveradio.de/stream/technique.json');

	//DeCode Json out:
	$suche = json_decode($jsonfile,TRUE);
	
	global $suche;


##### Angaben - Zeit #########
	//Serverzeit
	$timestamp = time();
	$uhrzeit = date("H:i:s",$timestamp);
	
		//Rechner Server: Addierung der Stunden + 02:00:00
		$first 		= 	explode(":",$uhrzeit);
		$second 	= 	explode(":","02:00:00");
		$rechner 	= 	mktime(	$first[0] + $second[0], 
							$first[1] + $second[1], 
							$first[2] + $second[2] );
	
	//Server Time:
	$server = date("H:i:s", $rechner);
	
######################################### Chapters Callback
if (isset($_GET["callback"]) && !empty($_GET["callback"])) {
  $callback = $_GET["callback"];

	//Header für ein JavaScript
  	header("Content-Type: application/javascript");

		/** Chapter Marks Callback **/
		#$datei = file("http://testpreview.reliveradio.de/stream/technique.chapters");
		#$datei = file("http://cm.wikibyte.org/testcodes/neu-chapters/podlove-web-player/relive.datei");
  
  	echo $callback. "('";
  	
		echo '<tr class="chaptertr active loaded" data-start="0.5" data-end="1.5" data-img="http://static.reliveradio.de/logos/' .$suche["upcoming_episodes"][$i]["db"]["slugintern"]. '.jpg"><td class="starttime"><span>00:00:00</span></td><td class="chaptername">'.preg_replace("/(')+/","&rsquo;",$suche["live_episode"]["db"]["name"]). ' - '.preg_replace("/(')+/","&rsquo;",$suche["live_episode"]["track_title"]). '</td><td class="timecode"><span>'. substr($suche["live_episode"]["ends"], 11, -6) .'</span></td></tr>';
		
		for($i = 0; $i < count($suche["upcoming_episodes"]); ++$i) {
   		#	if ($server < substr($suche["upcoming_episodes"][$i]["starts"], 11, -6)) {	
			 #echo 'nix da'; 
		#	} else { 

			echo '<tr class="chaptertr oddchapter loaded" data-start="0.5" data-end="1.5" data-img="http://static.reliveradio.de/logos/' .$suche["upcoming_episodes"][$i]["db"]["slugintern"]. '.jpg"><td class="starttime"><span>'. date("H:i:s", (strtotime(substr($suche["upcoming_episodes"][$i]["starts"], 11,-6))-strtotime($server))) .'</span></td><td class="chaptername">'.preg_replace("/(')+/","&rsquo;",$suche["upcoming_episodes"][$i]["db"]["name"]). ' - '.preg_replace("/(')+/","&rsquo;",$suche["upcoming_episodes"][$i]["track_title"]). '</td><td class="timecode"><span>'. substr($suche["upcoming_episodes"][$i]["ends"], 11, -6) .'</span></td></tr>';
		
		#	}
		}
	
	echo "')";
}








######################################### Cover Callback
// auf Callback-Parameter prüfen
if (isset($_GET["relivecoverdata"]) && !empty($_GET["relivecoverdata"])) {
  $relivecoverdata = $_GET["relivecoverdata"];

	//Header für ein JavaScript
  	header("Content-Type: application/javascript");

	echo $relivecoverdata. "('";
		echo '<img class="coverimg" src="http://static.reliveradio.de/logos/'.$suche["live_episode"]["db"]["slugintern"]. '.jpg" data-img="http://static.reliveradio.de/logos/'.$suche["live_episode"]["db"]["slugintern"]. '.jpg" alt="">';
	echo "')";
}


######################################### Title Callback
// auf Callback-Parameter prüfen
if (isset($_GET["relivetitlenamedata"]) && !empty($_GET["relivetitlenamedata"])) {
  $relivetitlenamedata = $_GET["relivetitlenamedata"];

	//Header für ein JavaScript
  	header("Content-Type: application/javascript");

	echo $relivetitlenamedata. "('";
		echo '<b style="font-weight: bold; font-size: 13px;">Gerade läuft: </b>'.$suche["live_episode"]["db"]["name"];
	echo "')";
}

######################################### Descs Callback
// auf Callback-Parameter prüfen
if (isset($_GET["relivedescdata"]) && !empty($_GET["relivedescdata"])) {
  $relivedescdata = $_GET["relivedescdata"];

	//Header für ein JavaScript
  	header("Content-Type: application/javascript");

	echo $relivedescdata. "('";
		echo '<p id="pinfos">'.$suche["live_episode"]["db"]["description"]. '</p>';
	echo "')";
}

?>