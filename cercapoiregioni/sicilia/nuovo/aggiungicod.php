<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

$db=mysql_select_db("poisicilia2");
if(!$db){
   die ("Impossibile selezionare il database.".mysql_errno());
}

$query1="SELECT COMUNE,PROVINCIA FROM sitiarcheologiciprovtp";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}
$db=mysql_select_db("comuniitaliani2");
if(!$db){
   die ("Impossibile selezionare il database.".mysql_errno());
}

$query2="SELECT Codice_Comune_formato_alfanumerico, Denominazione_Citta_metropolitana, Denominazione_provincia, Denominazione_italiano FROM istatcomunigeolocalizzatidef";
$result2=mysql_query($query2);
if(!$result2){
   die ("query2 non riuscita.".mysql_errno());
}

while ($row1=mysql_fetch_assoc($result1)){
    $comune=$row1["COMUNE"];
	$comuneI=addslashes($comune);
	$provincia=$row1["PROVINCIA"];
	$provinciaI=addslashes($provincia);
	/*if($comune=="Belvi" and $provincia=="Nuoro"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='91007' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Onani" and $provincia=="Nuoro"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='91058' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Siniscola" and $provincia=="Ogliastra"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='91058' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Galtelli" and $provincia=="Nuoro"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='91027' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Soddi" and $provincia=="Oristano"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='95078' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Carceghe" and $provincia=="Sassari"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='90022' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Torpe'" and $provincia=="Nuoro"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='91094' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Buddus?" and $provincia=="Olbia-Tempio"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='104008' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Nughedu di San Nicolo'" and $provincia=="Sassari"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='90044' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Lode'" and $provincia=="Nuoro"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='91041' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Gonnosno'" and $provincia=="Oristano"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='95023' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Tortolý" and $provincia=="Ogliastra"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='105018' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="AlÓ dei Sardi" and $provincia=="Olbia-Tempio"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='104003' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="TrinitÓ d'Agultu e Vignola" and $provincia=="Olbia-Tempio"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='104026' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Bidoni'" and $provincia=="Oristano"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='95014' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Senorbi'" and $provincia=="Cagliari"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='92070' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="Ula' Tirso" and $provincia=="Oristano"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='95068' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Nicolo' Gerrei" and $provincia=="Cagliari"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='92058' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if ($comune=="San Nicolo' d'Arcidano" and $provincia=="Oristano"){
		$query="UPDATE poisardegna2.sitiarcheologiciprovtp SET codiceComune='95046' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}*/
	while ($row2=mysql_fetch_assoc($result2)){
		$comune2=$row2["Denominazione_italiano"];
		$comune2I=addslashes($comune2);
		if($row2["Denominazione_provincia"]=="NULL"){
			$provincia2=$row2["Denominazione_Citta_metropolitana"];
		}else{
			$provincia2=$row2["Denominazione_provincia"];
		}
		//$provincia2=$row2["Sigla_automobilistica"];
		$provincia2I=addslashes($provincia2);
		$codcomune=$row2["Codice_Comune_formato_alfanumerico"];
		if($comune==$comune2 and $provincia==$provincia2){
		    $query="UPDATE poisicilia2.sitiarcheologiciprovtp SET codiceComune='$codcomune' WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
			$do_query=mysql_query($query);
			if(!$do_query){
				die("query fallita ".mysql_errno());
			}
			break;
		}
	}
	mysql_data_seek($result2,0);
}

?>