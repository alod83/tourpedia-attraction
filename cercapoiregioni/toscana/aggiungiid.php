<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);


$db=mysql_select_db("poitosc");
if(!$db){
   die ("Impossibile selezionare il database POI.".mysql_errno());
}

$query1="SELECT Citta,codice_provincia FROM poiarctoscana";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}


$filecom=file_get_contents("comuniitalianigeolocalizzati.json");
$filedec=json_decode($filecom,true);



while ($row1=mysql_fetch_assoc($result1)){
    
	$comune=$row1["Citta"];
	$comuneI=addslashes($comune);
	$provincia=$row1["codice_provincia"];
	$provinciaI=addslashes($provincia);
	
	foreach($filedec["comuni"] as $value){
		$comune2=$value["nomeComune"];
		$provincia2=$value["codiceProvincia"];
		$provincia2I=addslashes($provincia2);
		$idcomune=$value["id"];
		
		if($comune==$comune2 and $provincia==$provincia2){
			$query="UPDATE poiarctoscana SET id_comune='$idcomune' WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
			$do_query=mysql_query($query);
			if(!$do_query){
				die("query fallita ".mysql_errno());
			}
			break;
		}
	}
	
	if(($comune=="Casciana Terme")or($comune=="Lari")){
		$query="UPDATE poiarctoscana SET id_comune=4627 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Fabbriche di Vallico")or($comune=="Vergemoli")){
		$query="UPDATE poiarctoscana SET id_comune=4506 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Castelfranco di Sopra") or ($comune=="Pian di Scò") or ($comune=="Castelfranco Piandisco'")){
		$query="UPDATE poiarctoscana SET id_comune=4664 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Crespina") or($comune=="Lorenzana")){
		$query="UPDATE poiarctoscana SET id_comune=4628 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Figline Valdarno")or($comune=="Incisa in Val d'Arno")){
		$query="UPDATE poiarctoscana SET id_comune=4570 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="San Piero a Sieve")or ($comune=="Scarperia")){
		$query="UPDATE poiarctoscana SET id_comune=4571 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Giuncugnano") or ($comune=="Sillano")){
		$query="UPDATE poiarctoscana SET id_comune=4507 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Stia") or($comune=="Pratovecchio") or ($comune=="Pratovecchio-Stia")){
		$query="UPDATE poiarctoscana SET id_comune=4665 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="San Casciano Val di Pesa"){
		$query="UPDATE poiarctoscana SET id_comune=4561 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Colle Val d'Elsa"){
		$query="UPDATE poiarctoscana SET id_comune=4677 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Castelnuovo Val di Cecina"){
		$query="UPDATE poiarctoscana SET id_comune=4601 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Montecatini Terme"){
		$query="UPDATE poiarctoscana SET id_comune=4518 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Montopoli in Val D'Arno"){
		$query="UPDATE poiarctoscana SET id_comune=4609 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Castiglione della pescaia"){
		$query="UPDATE poiarctoscana SET id_comune=4707 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Bagno A Ripoli"){
		$query="UPDATE poiarctoscana SET id_comune=4530 WHERE Citta='$CittaI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Lastra A Signa"){
		$query="UPDATE poiarctoscana SET id_Citta=4549 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Poggio A Caiano"){
		$query="UPDATE poiarctoscana SET id_comune=4733 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Borgo A Mozzano"){
		$query="UPDATE poiarctoscana SET id_comune=4478 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Castel San Niccolo'"){
		$query="UPDATE poiarctoscana SET id_comune=4637 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Santa Maria A Monte"){
		$query="UPDATE poiarctoscana SET id_comune=4622 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Campo Nell'Elba"){
		$query="UPDATE poiarctoscana SET id_comune=4574 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Pieve A Nievole"){
		$query="UPDATE poiarctoscana SET id_comune=4520 WHERE Citta='$comuneI' and codice_provincia='$provinciaI'";
		mysql_query($query);
	}
	
	
		
}
	

?>