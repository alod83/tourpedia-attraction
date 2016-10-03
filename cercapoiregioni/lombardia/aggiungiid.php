<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);


$db=mysql_select_db("poilombardia");
if(!$db){
   die ("Impossibile selezionare il database POI.".mysql_errno());
}

$query1="SELECT COMUNE,PROVINCIA FROM impiantisportivi";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}


$filecom=file_get_contents("comuniitalianigeolocalizzatim.json");
$filedec=json_decode($filecom,true);



while ($row1=mysql_fetch_assoc($result1)){
    
	$comune=$row1["COMUNE"];
	$comuneI=addslashes($comune);
	$provincia=$row1["PROVINCIA"];
	$provinciaI=addslashes($provincia);
	
	foreach($filedec["comuni"] as $value){
		$comune2=$value["nomeComune"];
		$provincia2=$value["codiceProvincia"];
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
	
	/*if(($comune=="Rovagnate") or ($comune=="Perego")){
		$query="UPDATE impiantisportivi SET id_comune=2687 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Boffalora sopra Ticino"){
		$query="UPDATE impiantisportivi SET id_comune=1660 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if(($comune=="Mezzegra") or ($comune=="Lenno") or ($comune=="Tremezzo") or ($comune=="Ossuccio")){
		$query="UPDATE impiantisportivi SET id_comune=1569 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Rivanazzano"){
		$query="UPDATE impiantisportivi SET id_comune=2345 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Lonato"){
		$query="UPDATE impiantisportivi SET id_comune=2114 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Gabbioneta  binanuova"){
		$query="UPDATE impiantisportivi SET id_comune=2460 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Prestine"){
		$query="UPDATE impiantisportivi SET id_comune=2040 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Brembilla"){
		$query="UPDATE impiantisportivi SET id_comune=2022 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Toscolano Maderno"){
		$query="UPDATE impiantisportivi SET id_comune=2208 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if(($comune=="Verderio Inferiore") or ($comune=="Verderio Superiore")){
		$query="UPDATE impiantisportivi SET id_comune=2686 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="San Martino dell'Argine"){
		$query="UPDATE impiantisportivi SET id_comune=2588 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Casale Cremasco Vidolasco"){
		$query="UPDATE impiantisportivi SET id_comune=2432 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if(($comune=="Borgoforte") or ($comune=="Virgilio")){
		$query="UPDATE impiantisportivi SET id_comune=2599 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Locate Triulzi"){
		$query="UPDATE impiantisportivi SET id_comune=1709 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Comezzano Cizzago"){
		$query="UPDATE impiantisportivi SET id_comune=2082 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Godiasco"){
		$query="UPDATE impiantisportivi SET id_comune=2296 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if(($comune=="Parè") or ($comune=="Drezzo") or ($comune=="Gironico")){
		$query="UPDATE impiantisportivi SET id_comune=1568 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Civenna"){
		$query="UPDATE impiantisportivi SET id_comune=1560 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Gadesco Pieve Delmona"){
		$query="UPDATE impiantisportivi SET id_comune=2461 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Robbio lomellina"){
		$query="UPDATE impiantisportivi SET id_comune=2346 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Vallio"){
		$query="UPDATE impiantisportivi SET id_comune=2214 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Gravedona"){
		$query="UPDATE impiantisportivi SET id_comune=1566 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Corteolona"){
		$query="UPDATE impiantisportivi SET id_comune=2415 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Laveno Mombello"){
		$query="UPDATE impiantisportivi SET id_comune=1363 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Tremosine"){
		$query="UPDATE impiantisportivi SET id_comune=2210 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Sant'Omobono Imagna"){
		$query="UPDATE impiantisportivi SET id_comune=2021 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Gardone Valtrompia"){
		$query="UPDATE impiantisportivi SET id_comune=2097 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Bovisio Masciago"){
		$query="UPDATE impiantisportivi SET id_comune=2758 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Travedona Monate"){
		$query="UPDATE impiantisportivi SET id_comune=1402 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Uggiate Trevano"){
		$query="UPDATE impiantisportivi SET id_comune=1554 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="Cocquio Trevisago"){
		$query="UPDATE impiantisportivi SET id_comune=1329 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}*/
	
	if(($comune=="ROVAGNATE") or ($comune=="PEREGO")){
		$query="UPDATE impiantisportivi SET id_comune=2687 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="BOFFALORA SOPRA TICINO"){
		$query="UPDATE impiantisportivi SET id_comune=1660 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="MEZZEGRA") or ($comune=="LENNO") or ($comune=="TREMEZZO") or ($comune=="OSSUCCIO")){
		$query="UPDATE impiantisportivi SET id_comune=1569 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="RIVANAZZANO"){
		$query="UPDATE impiantisportivi SET id_comune=2345 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="LONATO"){
		$query="UPDATE impiantisportivi SET id_comune=2114 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="GABBIONETA  BINANUOVA"){
		$query="UPDATE impiantisportivi SET id_comune=2460 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="PRESTINE"){
		$query="UPDATE impiantisportivi SET id_comune=2040 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="BREMBILLA"){
		$query="UPDATE impiantisportivi SET id_comune=2022 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="TOSCOLANO MADERNO"){
		$query="UPDATE impiantisportivi SET id_comune=2208 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="VERDERIO INFERIORE") or ($comune=="VERDERIO SUPERIORE")){
		$query="UPDATE impiantisportivi SET id_comune=2686 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="SAN MARTINO DELL'ARGINE"){
		$query="UPDATE impiantisportivi SET id_comune=2588 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="CASALE CREMASCO VIDOLASCO"){
		$query="UPDATE impiantisportivi SET id_comune=2432 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="BORGOFORTE") or ($comune=="VIRGILIO")){
		$query="UPDATE impiantisportivi SET id_comune=2599 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="LOCATE TRIULZI"){
		$query="UPDATE impiantisportivi SET id_comune=1709 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="COMEZZANO CIZZAGO"){
		$query="UPDATE impiantisportivi SET id_comune=2082 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="GODIASCO"){
		$query="UPDATE impiantisportivi SET id_comune=2296 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="PARE'") or ($comune=="DREZZO") or ($comune=="GIRONICO")){
		$query="UPDATE impiantisportivi SET id_comune=1568 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="CIVENNA"){
		$query="UPDATE impiantisportivi SET id_comune=1560 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="GADESCO PIEVE DELMONA"){
		$query="UPDATE impiantisportivi SET id_comune=2461 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="ROBBIO LOMELLINA"){
		$query="UPDATE impiantisportivi SET id_comune=2346 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="VALLIO"){
		$query="UPDATE impiantisportivi SET id_comune=2214 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="GRAVEDONA"){
		$query="UPDATE impiantisportivi SET id_comune=1566 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="CORTEOLONA"){
		$query="UPDATE impiantisportivi SET id_comune=2415 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="LAVENO MOMBELLO"){
		$query="UPDATE impiantisportivi SET id_comune=1363 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="TREMOSINE"){
		$query="UPDATE impiantisportivi SET id_comune=2210 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="SANT'OMOBONO IMAGNA"){
		$query="UPDATE impiantisportivi SET id_comune=2021 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="GARDONE VALTROMPIA"){
		$query="UPDATE impiantisportivi SET id_comune=2097 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="BOVISIO MASCIAGO"){
		$query="UPDATE impiantisportivi SET id_comune=2758 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="TRAVEDONA MONATE"){
		$query="UPDATE impiantisportivi SET id_comune=1402 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="UGGIATE TREVANO"){
		$query="UPDATE impiantisportivi SET id_comune=1554 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="COCQUIO TREVISAGO"){
		$query="UPDATE impiantisportivi SET id_comune=1329 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="GEROSA"){
		$query="UPDATE impiantisportivi SET id_comune=2022 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="GERMASINO"){
		$query="UPDATE impiantisportivi SET id_comune=1566 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="MACCAGNO") or ($comune=="VEDDASCA") or ($comune=="PINO SULLA SPONDA DEL LAGO MAG")){
		$query="UPDATE impiantisportivi SET id_comune=1415 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="CORNALE"){
		$query="UPDATE impiantisportivi SET id_comune=2414 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}else if($comune=="VALSECCA"){
		$query="UPDATE impiantisportivi SET id_comune=2021 WHERE COMUNE='$comuneI' and PROVINCIA='$provinciaI'";
		mysql_query($query);
	}
	
	/*if(($comune=="ROVAGNATE") or ($comune=="PEREGO")){
		$query="UPDATE impiantisportivi SET id_comune=2687 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="BOFFALORA SOPRA TICINO"){
		$query="UPDATE impiantisportivi SET id_comune=1660 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if(($comune=="MEZZEGRA") or ($comune=="LENNO") or ($comune=="TREMEZZO") or ($comune=="OSSUCCIO")){
		$query="UPDATE impiantisportivi SET id_comune=1569 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="RIVANAZZANO"){
		$query="UPDATE impiantisportivi SET id_comune=2345 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="LONATO"){
		$query="UPDATE impiantisportivi SET id_comune=2114 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="GABBIONETA  BINANUOVA"){
		$query="UPDATE impiantisportivi SET id_comune=2460 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="PRESTINE"){
		$query="UPDATE impiantisportivi SET id_comune=2040 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="BREMBILLA"){
		$query="UPDATE impiantisportivi SET id_comune=2022 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="TOSCOLANO MADERNO"){
		$query="UPDATE impiantisportivi SET id_comune=2208 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if(($comune=="VERDERIO INFERIORE") or ($comune=="VERDERIO SUPERIORE")){
		$query="UPDATE impiantisportivi SET id_comune=2686 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="SAN MARTINO DELL'ARGINE"){
		$query="UPDATE impiantisportivi SET id_comune=2588 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="CASALE CREMASCO VIDOLASCO"){
		$query="UPDATE impiantisportivi SET id_comune=2432 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if(($comune=="BORGOFORTE") or ($comune=="VIRGILIO")){
		$query="UPDATE impiantisportivi SET id_comune=2599 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="LOCATE TRIULZI"){
		$query="UPDATE impiantisportivi SET id_comune=1709 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="COMEZZANO CIZZAGO"){
		$query="UPDATE impiantisportivi SET id_comune=2082 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="GODIASCO"){
		$query="UPDATE impiantisportivi SET id_comune=2296 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if(($comune=="PARÈ") or ($comune=="DREZZO") or ($comune=="GIRONICO")){
		$query="UPDATE impiantisportivi SET id_comune=1568 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="CIVENNA"){
		$query="UPDATE impiantisportivi SET id_comune=1560 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="GADESCO PIEVE DELMONA"){
		$query="UPDATE impiantisportivi SET id_comune=2461 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="ROBBIO LOMELLINA"){
		$query="UPDATE impiantisportivi SET id_comune=2346 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="VALLIO"){
		$query="UPDATE impiantisportivi SET id_comune=2214 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="GRAVEDONA"){
		$query="UPDATE impiantisportivi SET id_comune=1566 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="CORTEOLONA"){
		$query="UPDATE impiantisportivi SET id_comune=2415 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="LAVENO MOMBELLO"){
		$query="UPDATE impiantisportivi SET id_comune=1363 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="TREMOSINE"){
		$query="UPDATE impiantisportivi SET id_comune=2210 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="SANT'OMOBONO IMAGNA"){
		$query="UPDATE impiantisportivi SET id_comune=2021 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="GARDONE VALTROMPIA"){
		$query="UPDATE impiantisportivi SET id_comune=2097 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="BOVISIO MASCIAGO"){
		$query="UPDATE impiantisportivi SET id_comune=2758 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="TRAVEDONA MONATE"){
		$query="UPDATE impiantisportivi SET id_comune=1402 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="UGGIATE TREVANO"){
		$query="UPDATE impiantisportivi SET id_comune=1554 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}else if($comune=="COCQUIO TREVISAGO"){
		$query="UPDATE impiantisportivi SET id_comune=1329 WHERE COMUNE='$comuneI'";
		mysql_query($query);
	}
	*/
	
	
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