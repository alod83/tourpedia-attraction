<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

$db=mysql_select_db("poilazio2");
if(!$db){
   die ("Impossibile selezionare il database.".mysql_errno());
}

$query1="SELECT Comune,Provincia FROM musei";
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
    $comune=$row1["Comune"];
	$comuneI=addslashes($comune);
	$provincia=$row1["Provincia"];
	$provinciaI=addslashes($provincia);
	
	if($comune=="Castelgandolfo" and $provincia=="Roma"){
		$query="UPDATE poilazio2.musei SET codiceComune='58022' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Monte S. Giovanni in Sabina" and $provincia=="Rieti"){
		$query="UPDATE poilazio2.musei SET codiceComune='57043' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Monte S. Giovanni campano" and $provincia=="Frosinone"){
		$query="UPDATE poilazio2.musei SET codiceComune='60044' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Monteromano" and $provincia=="Viterbo"){
		$query="UPDATE poilazio2.musei SET codiceComune='56037' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Roma - Ostia Lido" and $provincia=="Roma"){
		$query="UPDATE poilazio2.musei SET codiceComune='58091' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Roma - Ostia antica" and $provincia=="Roma"){
		$query="UPDATE poilazio2.musei SET codiceComune='58091' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Monteporzio Catone" and $provincia=="Roma"){
		$query="UPDATE poilazio2.musei SET codiceComune='58064' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Castel San Pietro" and $provincia=="Roma"){
		$query="UPDATE poilazio2.musei SET codiceComune='58025' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Città di Cave" and $provincia=="Roma"){
		$query="UPDATE poilazio2.musei SET codiceComune='58026' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Giuliano di Roma" and $provincia=="Roma"){
		$query="UPDATE poilazio2.musei SET codiceComune='60041' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="San Donato Val di Comino" and $provincia=="Arsoli"){
		$query="UPDATE poilazio2.musei SET codiceComune='60062' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="San Martino al Cimino" and $provincia=="Viterbo"){
		$query="UPDATE poilazio2.musei SET codiceComune='56059' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
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
		$provincia2I=addslashes($provincia2);
		$codcomune=$row2["Codice_Comune_formato_alfanumerico"];
		if($comune==$comune2 and $provincia==$provincia2){
		    $query="UPDATE poilazio2.musei SET codiceComune='$codcomune' WHERE Comune='$comuneI' and Provincia='$provinciaI'";
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