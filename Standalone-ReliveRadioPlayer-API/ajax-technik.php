<?php
/**
*
*	TESTSYSTEM für Relive ausgabe über Ajax & JsonP
*
*	@Developer: Michael McCouman jr.
*	@Mail: Support@wikibyte.org
* 	@Version: 0.1.3
*
*/

	//ReRadio
	$jsonfile = file_get_contents('http://reliveradio.de/stream/technik.json');

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

   ####### Anzahl API zum Auslesen der Liste
	if (isset($_GET["anzahl"]) && !empty($_GET["anzahl"])) {
		$anzahl = $_GET["anzahl"];
	} else { $anzahl = 6; }

  	$anzahlouts = ($anzahl - 1);
  
  ########## OUTs //START ############
  	echo $callback. "('";
		echo '<tr class="chaptertr active loaded" data-start="0.5" data-end="1.5" data-img="http://static.reliveradio.de/logos/' .$suche["upcoming_episodes"][$i]["db"]["slugintern"]. '.jpg"><td class="starttime"><span>00:00:00</span></td><td class="chaptername">'.preg_replace("/(')+/","&rsquo;",$suche["live_episode"]["db"]["name"]). ' - '.preg_replace("/(')+/","&rsquo;",$suche["live_episode"]["track_title"]). '</td><td class="timecode"><span>'. substr($suche["live_episode"]["ends"], 11, -6) .'</span></td></tr>';
		for($i = 0; $i < $anzahlouts; ++$i) {
			echo '<tr class="chaptertr oddchapter loaded" data-start="0.5" data-end="1.5" data-img="http://static.reliveradio.de/logos/' .$suche["upcoming_episodes"][$i]["db"]["slugintern"]. '.jpg"><td class="starttime"><span>'. date("H:i:s", (strtotime(substr($suche["upcoming_episodes"][$i]["starts"], 11,-6))-strtotime($server))) .'</span></td><td class="chaptername">'.preg_replace("/(')+/","&rsquo;",$suche["upcoming_episodes"][$i]["db"]["name"]). ' - '.preg_replace("/(')+/","&rsquo;",$suche["upcoming_episodes"][$i]["track_title"]). '</td><td class="timecode"><span>'. substr($suche["upcoming_episodes"][$i]["ends"], 11, -6) .'</span></td></tr>';
		}
	echo "')";
  ########## OUTs //END #############
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
	
	//Include Vars = $dec_max_limet für Textanzahl
	include ("install/install.php");
	
	//Description
	$str = preg_replace("/\s+/", " " ,$suche["live_episode"]["db"]["description"]);
	$maxlen = $dec_max_limet; //Anzahl der wörter ausgeben

	$words = preg_split('/\s/', $str);
	$short = implode(array_slice($words, 0, $maxlen), ' ');
	if (count($words) > $maxwords) $short .= ' ...';

	echo $relivetitlenamedata. "('";																				
		echo '<b>' .$suche["live_episode"]["db"]["name"]. ':</b> '.$short.'';
	echo "')";
}
?>