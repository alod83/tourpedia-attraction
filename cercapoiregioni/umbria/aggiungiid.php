<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);


$db=mysql_select_db("poiumbria");
if(!$db){
   die ("Impossibile selezionare il database POI.".mysql_errno());
}

$query1="SELECT COMUNE FROM impiantisportivi";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}


$filecom=file_get_contents("comuniitalianigeolocalizzatim.json");
$filedec=json_decode($filecom,true);



while ($row1=mysql_fetch_assoc($result1)){
    
	$comune=$row1["COMUNE"];
	$comuneI=addslashes($comune);
	//$provincia=$row1["Provincia"];
	//$provinciaI=addslashes($provincia);
	
	foreach($filedec["comuni"] as $value){
		$regione=$value["regione"];
		$comune2=$value["nomeComune"];
		$provincia2=$value["codiceProvincia"];
		$provincia2I=addslashes($provincia2);
		$idcomune=$value["id"];
		
		if($comune==$comune2 and $regione=="Umbria"){
			$query="UPDATE impiantisportivi SET id_comune='$idcomune' WHERE COMUNE='$comuneI'";
			$do_query=mysql_query($query);
			if(!$do_query){
				die("query fallita ".mysql_errno());
			}
			break;
		}
	}
	if($comune=="Santa Maria degli Angeli"){
		$query="UPDATE impiantisportivi SET id_comune=4737 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Passignano su Trasimeno"){
		$query="UPDATE impiantisportivi SET id_comune=4774 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Citta' della Pieve"){
		$query="UPDATE impiantisportivi SET id_comune=4748 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Citta' di Castello"){
		$query="UPDATE impiantisportivi SET id_comune=4749 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}
	
	/*else if(($comune=="Giuncugnano") or ($comune=="Sillano")){
		$query="UPDATE impiantisportivi SET id_comune=4507 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Stia") or($comune=="Pratovecchio") or ($comune=="Pratovecchio-Stia")){
		$query="UPDATE impiantisportivi SET id_comune=4665 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="San Casciano Val di Pesa"){
		$query="UPDATE impiantisportivi SET id_comune=4561 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Colle Val d'Elsa"){
		$query="UPDATE impiantisportivi SET id_comune=4677 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Castelnuovo Val di Cecina"){
		$query="UPDATE impiantisportivi SET id_comune=4601 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Montecatini Terme"){
		$query="UPDATE impiantisportivi SET id_comune=4518 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Montopoli in Val D'Arno"){
		$query="UPDATE impiantisportivi SET id_comune=4609 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Castiglione della pescaia"){
		$query="UPDATE impiantisportivi SET id_comune=4707 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Bagno A Ripoli"){
		$query="UPDATE impiantisportivi SET id_comune=4530 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Lastra A Signa"){
		$query="UPDATE impiantisportivi SET id_comune=4549 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Poggio A Caiano"){
		$query="UPDATE impiantisportivi SET id_comune=4733 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Borgo A Mozzano"){
		$query="UPDATE impiantisportivi SET id_comune=4478 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Castel San Niccolo'"){
		$query="UPDATE impiantisportivi SET id_comune=4637 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Santa Maria A Monte"){
		$query="UPDATE impiantisportivi SET id_comune=4622 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Campo Nell'Elba"){
		$query="UPDATE impiantisportivi SET id_comune=4574 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Pieve A Nievole"){
		$query="UPDATE impiantisportivi SET id_comune=4520 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	
	*/
		
}
	

?>