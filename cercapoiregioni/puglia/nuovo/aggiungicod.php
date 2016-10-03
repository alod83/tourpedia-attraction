<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

$db=mysql_select_db("poipuglia2");
if(!$db){
   die ("Impossibile selezionare il database.".mysql_errno());
}

$query1="SELECT comune,provincia FROM stabilimentibalneari";
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
    $comune=$row1["comune"];
	$comuneI=addslashes($comune);
	$provincia=$row1["provincia"];
	$provinciaI=addslashes($provincia);
	if($comune=="Celle San Vito" and $provincia=="Foggia"){
		$query="UPDATE poipuglia2.stabilimentibalneari SET codiceComune='71019' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Nardo'" and $provincia=="Lecce"){
		$query="UPDATE poipuglia2.stabilimentibalneari SET codiceComune='75052' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Patu'" and $provincia=="Lecce"){
		$query="UPDATE poipuglia2.stabilimentibalneari SET codiceComune='75060' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Secli'" and $provincia=="Lecce"){
		$query="UPDATE poipuglia2.stabilimentibalneari SET codiceComune='75074' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	} 
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
		    $query="UPDATE poipuglia2.stabilimentibalneari SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
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