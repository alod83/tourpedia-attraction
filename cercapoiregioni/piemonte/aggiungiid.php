<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);


$db=mysql_select_db("poipiemonte");
if(!$db){
   die ("Impossibile selezionare il database POI.".mysql_errno());
}

$query1="SELECT COMUNE FROM uppubattivitaosp";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}


$filecom=file_get_contents("comuniitalianigeolocalizzatim.json");
$filedec=json_decode($filecom,true);



while ($row1=mysql_fetch_assoc($result1)){
    
	$comune=$row1["COMUNE"];
	$comuneI=addslashes($comune);
	//$provincia=$row1["nome_provincia"];
	//$provinciaI=addslashes($provincia);
	
	foreach($filedec["comuni"] as $value){
		$comune2=$value["nomeComune"];
		$provincia2=$value["Provincia"];
		$provincia2I=addslashes($provincia2);
		$regione=$value["regione"];
		$idcomune=$value["id"];
		
		if($comune==$comune2 and $regione=="Piemonte"){
		    
				
			$query="UPDATE uppubattivitaosp SET id_comune='$idcomune' WHERE COMUNE='$comuneI'";
			$do_query=mysql_query($query);
			if(!$do_query){
				die("query fallita ".mysql_errno());
			}
			break;
		}
	}
	

	if($comune=="CHIUSA PESIO"){
		$query="UPDATE uppubattivitaosp SET id_comune=557 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="BRIGNANO FRASCATA"){
		$query="UPDATE uppubattivitaosp SET id_comune=881 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="MONTIGLIO"){
		$query="UPDATE uppubattivitaosp SET id_comune=857 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="SEPPIANA"){
		$query="UPDATE uppubattivitaosp SET id_comune=1202 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="QUITTENGO"){
		$query="UPDATE uppubattivitaosp SET id_comune=1126 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="CAMPIGLIONE-FENILE"){
		$query="UPDATE uppubattivitaosp SET id_comune=49 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="CIRIE'"){
		$query="UPDATE uppubattivitaosp SET id_comune=86 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="CUORGNE'"){
		$query="UPDATE uppubattivitaosp SET id_comune=98 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="CAVAGLIA'"){
		$query="UPDATE uppubattivitaosp SET id_comune=1062 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="LEINI'"){
		$query="UPDATE uppubattivitaosp SET id_comune=130 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="VIU'"){
		$query="UPDATE uppubattivitaosp SET id_comune=313 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="MAZZE'"){
		$query="UPDATE uppubattivitaosp SET id_comune=148 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="SANTHIA'"){
		$query="UPDATE uppubattivitaosp SET id_comune=388 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="CARRU'"){
		$query="UPDATE uppubattivitaosp SET id_comune=532 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="VILLANOVA MONDOVI'"){
		$query="UPDATE uppubattivitaosp SET id_comune=734 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="SAN MICHELE MONDOVI'"){
		$query="UPDATE uppubattivitaosp SET id_comune=699 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="TRINITA'"){
		$query="UPDATE uppubattivitaosp SET id_comune=721 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="MONTA'"){
		$query="UPDATE uppubattivitaosp SET id_comune=622 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="ROCCAFORTE MONDOVI'"){
		$query="UPDATE uppubattivitaosp SET id_comune=679 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="MONDOVI'"){
		$query="UPDATE uppubattivitaosp SET id_comune=619 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="CROSA"){
		$query="UPDATE uppubattivitaosp SET id_comune=1125 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="SAN PAOLO CERVO"){
		$query="UPDATE uppubattivitaosp SET id_comune=1126 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}
		
}
	

?>