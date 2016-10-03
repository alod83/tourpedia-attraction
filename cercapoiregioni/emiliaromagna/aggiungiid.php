<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);


$db=mysql_select_db("poi");
if(!$db){
   die ("Impossibile selezionare il database POI.".mysql_errno());
}

$query1="SELECT citta,provincia FROM strutturericettivetoscana";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}


$query2="SELECT id_comune,Provincia,codice_provincia,Comune FROM comunitoscanageolocalizzati";
$result2=mysql_query($query2);
if(!$result2){
   die ("query2 non riuscita.".mysql_errno());
}

while ($row1=mysql_fetch_assoc($result1)){
    
	$comune=$row1["citta"];
	$comuneI=addslashes($comune);
	$provincia=$row1["provincia"];
	
	
	
	while ($row2=mysql_fetch_assoc($result2)){
		$comune2=$row2["Comune"];
		$provincia2=$row2["Provincia"];
		$provincia2I=addslashes($provincia2);
		$idcomune=$row2["id_comune"];
		$codiceprovincia=$row2["codice_provincia"];
		
		
		if($comune==$comune2 and $provincia==$codiceprovincia){
		    
		   
			$query="UPDATE strutturericettivetoscana SET id_comune='$idcomune',NomeProvincia='$provincia2I' WHERE citta='$comuneI' and provincia='$provincia'";
			$do_query=mysql_query($query);
			if(!$do_query){
				die("query fallita ".mysql_errno());
			}
			break;
		}
	}
	
	if(($comune=="Casciana Terme" and $provincia=="PI")or($comune=="Lari" and $provincia=="PI")){
		$query="UPDATE strutturericettivetoscana SET id_comune=170, NomeProvincia='Pisa' , provincia='PI' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}else if(($comune=="Fabbriche di Vallico" and $provincia=="LU")or($comune=="Vergemoli" and $provincia=="LU")){
		$query="UPDATE strutturericettivetoscana SET id_comune=49, NomeProvincia='Lucca' , provincia='LU' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}else if(($comune=="Castelfranco di Sopra" and $provincia=="AR")or($comune=="Pian di Scò" and $provincia=="AR")){
		$query="UPDATE strutturericettivetoscana SET id_comune=207, NomeProvincia='Arezzo', provincia='AR' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}else if(($comune=="Crespina" and $provincia=="PI")or($comune=="Lorenzana" and $provincia=="PI")){
		$query="UPDATE strutturericettivetoscana SET id_comune=171, NomeProvincia='Pisa' , provincia='PI' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}else if(($comune=="Figline Valdarno" and $provincia=="FI")or($comune=="Incisa in Val d'Arno" and $provincia=="FI")){
		$query="UPDATE strutturericettivetoscana SET id_comune=113, NomeProvincia='Firenze' , provincia='FI' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}else if(($comune=="San Piero a Sieve" and $provincia=="FI")or ($comune=="Scarperia" and $provincia=="FI")){
		$query="UPDATE strutturericettivetoscana SET id_comune=114, NomeProvincia='Firenze' , provincia='FI' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}else if(($comune=="Giuncugnano" and $provincia=="LU") or ($comune=="Sillano" and $provincia=="LU")){
		$query="UPDATE strutturericettivetoscana SET id_comune=50, NomeProvincia='Lucca' , provincia='LU' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}else if(($comune=="Stia" and $provincia=="AR") or($comune=="Pratovecchio" and $provincia=="AR")){
		$query="UPDATE strutturericettivetoscana SET id_comune=208, NomeProvincia='Arezzo' , provincia='AR' WHERE citta='$comuneI' and provincia='$provincia'";
		mysql_query($query);
	}/*else if($comune=="San Casciano Val di Pesa" and $provincia=="FI"){
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
	else if($comune=="Montecatini Terme" and $provincia=="PT"){
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
	
    
	mysql_data_seek($result2,0);
		
}
	

?>