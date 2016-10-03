<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);


$db=mysql_select_db("poipuglia");
if(!$db){
   die ("Impossibile selezionare il database POI.".mysql_errno());
}

$query1="SELECT COMUNE,PROVINCIA FROM impiantisportivi";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}


$filecom=file_get_contents("comuniitalianigeolocalizzati.json");
$filedec=json_decode($filecom,true);



while ($row1=mysql_fetch_assoc($result1)){
    
	$comune=$row1["COMUNE"];
	$comuneI=addslashes($comune);
	$provincia=$row1["PROVINCIA"];
	$provinciaI=addslashes($provincia);
	
	foreach($filedec["comuni"] as $value){
		$comune2=$value["nomeComune"];
		$provincia2=$value["Provincia"];
		$provincia2I=addslashes($provincia2);
		$idcomune=$value["id"];
		
		if($comune==$comune2 and $provincia==$provincia2){
			$query="UPDATE impiantisportivi SET id_comune='$idcomune' WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
			$do_query=mysql_query($query);
			if(!$do_query){
				die("query fallita ".mysql_errno());
			}
			break;
		}
	}
	
	/*if($comune=="CELLE SAN VITO"){
		$query="UPDATE impiantisportivi SET id_comune=6452 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="NARDO'"){
		$query="UPDATE impiantisportivi SET id_comune=6636 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="PATU'"){
		$query="UPDATE impiantisportivi SET id_comune=6644 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="SECLI'"){
		$query="UPDATE impiantisportivi SET id_comune=6658 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}
	*/
	
	if($comune=="Celle San Vito"){
		$query="UPDATE impiantisportivi SET id_comune=6452 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Nardo'"){
		$query="UPDATE impiantisportivi SET id_comune=6636 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Patu'"){
		$query="UPDATE impiantisportivi SET id_comune=6644 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if (($comune=="Secli'") or ($comune=="Secli")){
		$query="UPDATE impiantisportivi SET id_comune=6658 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Ferdinando Di Puglia"){
		$query="UPDATE impiantisportivi SET id_comune=6688 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Mola Di Bari"){
		$query="UPDATE impiantisportivi SET id_comune=6517 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Polignano A Mare"){
		$query="UPDATE impiantisportivi SET id_comune=6524 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Orsara Di Puglia"){
		$query="UPDATE impiantisportivi SET id_comune=6467 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Sannicandro Di Bari"){
		$query="UPDATE impiantisportivi SET id_comune=6529 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Donato Di Lecce"){
		$query="UPDATE impiantisportivi SET id_comune=6653 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Monteroni Di Lecce"){
		$query="UPDATE impiantisportivi SET id_comune=6632 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Corigliano D'Otranto"){
		$query="UPDATE impiantisportivi SET id_comune=6607 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Cassano Murge"){
		$query="UPDATE impiantisportivi SET id_comune=6506 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Gioia Del Colle"){
		$query="UPDATE impiantisportivi SET id_comune=6511 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Castri Di Lecce"){
		$query="UPDATE impiantisportivi SET id_comune=6601 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Uggiano La Chiesa"){
		$query="UPDATE impiantisportivi SET id_comune=6675 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Vito Dei Normanni"){
		$query="UPDATE impiantisportivi SET id_comune=6581 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Pietro In Lama"){
		$query="UPDATE impiantisportivi SET id_comune=6655 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Acquaviva Delle Fonti"){
		$query="UPDATE impiantisportivi SET id_comune=6495 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Caprarica Di Lecce"){
		$query="UPDATE impiantisportivi SET id_comune=6597 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Sammichele Di Bari"){
		$query="UPDATE impiantisportivi SET id_comune=6528 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Margherita Di Savoia"){
		$query="UPDATE impiantisportivi SET id_comune=6686 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Acquarica Del Capo"){
		$query="UPDATE impiantisportivi SET id_comune=6585 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Anzano Di Puglia"){
		$query="UPDATE impiantisportivi SET id_comune=6436 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Sannicandro Garganico"){
		$query="UPDATE impiantisportivi SET id_comune=6480 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Bagnolo Del Salento"){
		$query="UPDATE impiantisportivi SET id_comune=6592 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Vico Del Gargano"){
		$query="UPDATE impiantisportivi SET id_comune=6489 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Castelluccio Dei Sauri"){
		$query="UPDATE impiantisportivi SET id_comune=6448 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Canosa Di Puglia"){
		$query="UPDATE impiantisportivi SET id_comune=6685 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Cesario Di Lecce"){
		$query="UPDATE impiantisportivi SET id_comune=6652 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Monteleone Di Puglia"){
		$query="UPDATE impiantisportivi SET id_comune=6464 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Casalvecchio Di Puglia"){
		$query="UPDATE impiantisportivi SET id_comune=6447 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Marco La Catola"){
		$query="UPDATE impiantisportivi SET id_comune=6479 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Castrignano De Greci"){
		$query="UPDATE impiantisportivi SET id_comune=6602 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Sant'Agata Di Puglia"){
		$query="UPDATE impiantisportivi SET id_comune=6483 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Gravina di Puglia"){
		$query="UPDATE impiantisportivi SET id_comune=6513 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Palo Del Colle"){
		$query="UPDATE impiantisportivi SET id_comune=6522 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Santeramo In Colle"){
		$query="UPDATE impiantisportivi SET id_comune=6530 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Marzano Di San Giuseppe"){
		$query="UPDATE impiantisportivi SET id_comune=6560 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Castrignano Del Capo"){
		$query="UPDATE impiantisportivi SET id_comune=6603 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Ruvo Di Puglia"){
		$query="UPDATE impiantisportivi SET id_comune=6527 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Celle Di San Vito"){
		$query="UPDATE impiantisportivi SET id_comune=6452 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Marco In Lamis"){
		$query="UPDATE impiantisportivi SET id_comune=6478 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Paolo Di Civitate"){
		$query="UPDATE impiantisportivi SET id_comune=6481 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Minervino Di Lecce"){
		$query="UPDATE impiantisportivi SET id_comune=6631 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Morciano Di Leuca"){
		$query="UPDATE impiantisportivi SET id_comune=6634 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Gagliano Del Capo"){
		$query="UPDATE impiantisportivi SET id_comune=6612 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Castelnuovo Della Daunia"){
		$query="UPDATE impiantisportivi SET id_comune=6450 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}
	
	/*else if($comune=="San Casciano Val di Pesa" and $provincia=="FI"){
		$query="UPDATE strutturericettivetoscana SET id_comune=104, NomeProvincia='Firenze' WHERE comune='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}else if($comune=="Colle Val d'Elsa" and $provincia=="SI"){
		$query="UPDATE strutturericettivetoscana SET id_comune=220, NomeProvincia='Siena' WHERE comune='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}
	else if($comune=="Castelnuovo Val di Cecina" and $provincia=="PI"){
		$query="UPDATE strutturericettivetoscana SET id_comune=144, NomeProvincia='Pisa' WHERE comune='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}*/
	/*else if($comune=="Montecatini Terme" and $provincia=="PT"){
		$query="UPDATE strutturericettivetoscana SET id_comune=61, NomeProvincia='Pistoia' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}
	else if($comune=="Montopoli in Val D'Arno" and $provincia=="PI"){
		$query="UPDATE strutturericettivetoscana SET id_comune=152, NomeProvincia='Pisa' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}
	else if($comune=="Castiglione della pescaia" and $provincia=="GR"){
		$query="UPDATE strutturericettivetoscana SET id_comune=250, NomeProvincia='Grosseto' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}
	
    
	mysql_data_seek($result2,0);*/
		
}
	

?>