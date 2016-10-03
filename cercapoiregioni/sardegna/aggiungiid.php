<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);


$db=mysql_select_db("poisardegna");
if(!$db){
   die ("Impossibile selezionare il database POI.".mysql_errno());
}

$query1="SELECT COMUNE,PROVINCIA FROM impiantisportivi";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}


$filecom=file_get_contents("comuniitalianigeolocalizzaticomp.json");
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
	
	if($comune=="Onani"){
		$query="UPDATE impiantisportivi SET id_comune=7717 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Galtelli"){
		$query="UPDATE impiantisportivi SET id_comune=7702 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Soddi"){
		$query="UPDATE impiantisportivi SET id_comune=7788 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Carceghe"){
		$query="UPDATE impiantisportivi SET id_comune=7636 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Torpe'"){
		$query="UPDATE impiantisportivi SET id_comune=7738 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Buddus?"){
		$query="UPDATE impiantisportivi SET id_comune=7906 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Nughedu di San Nicolo'"){
		$query="UPDATE impiantisportivi SET id_comune=7654 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Nughedu di San Nicolo'"){
		$query="UPDATE impiantisportivi SET id_comune=7654 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Lode'"){
		$query="UPDATE impiantisportivi SET id_comune=7707 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Gonnosno'"){
		$query="UPDATE impiantisportivi SET id_comune=7833 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Tortolý"){
		$query="UPDATE impiantisportivi SET id_comune=7942 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="AlÓ dei Sardi"){
		$query="UPDATE impiantisportivi SET id_comune=7901 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="TrinitÓ d'Agultu e Vignola"){
		$query="UPDATE impiantisportivi SET id_comune=7924 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Bidoni'"){
		$query="UPDATE impiantisportivi SET id_comune=7824 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Senorbi'"){
		$query="UPDATE impiantisportivi SET id_comune=7774 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Ula' Tirso"){
		$query="UPDATE impiantisportivi SET id_comune=7878 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Nicolo' Gerrei"){
		$query="UPDATE impiantisportivi SET id_comune=7767 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Belvi"){
		$query="UPDATE impiantisportivi SET id_comune=7691 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Nicolo' d'Arcidano"){
		$query="UPDATE impiantisportivi SET id_comune=7856 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}
	
	
	
		
}
	

?>