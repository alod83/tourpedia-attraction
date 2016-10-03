<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);


$db=mysql_select_db("poilazio");
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
	
	/*if($comune=="Cembra"){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3090 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Condino"){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3087 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Pieve Di Bono"){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3083 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if(($comune=="Fiera Di Primiero") or ($comune=="Siror")){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3094 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Male'"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Malè', id_comune=2996 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if(($comune=="Monclassico") or ($comune=="Dimaro")){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3082 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Riva Del Garda"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Riva del Garda', id_comune=3028 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Roncegno"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Roncegno Terme', id_comune=3031 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Tione Di Trento"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Tione di Trento', id_comune=3062 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Vezzano"){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3097 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Nago-torbole"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Nago-Torbole', id_comune=3007 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Coredo"){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3079 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Vigolo Vattaro"){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3085 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Coredo"){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3079 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Vigo Di Fassa"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Vigo di Fassa', id_comune=3072 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Castello-molina Di Fiemme"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Castello-Molina di Fiemme', id_comune=2954 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Ronzo-chienis"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Ronzo-Chienis', id_comune=3016 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Fai Della Paganella"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Fai della Paganella', id_comune=2976 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="San Lorenzo In Banale"){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3080 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Breguzzo"){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3095 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Caderzone"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Caderzone Terme', id_comune=2938 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Campitello Di Fassa"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Campitello di Fassa', id_comune=2944 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Ziano Di Fiemme"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Ziano di Fiemme', id_comune=3076 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Rovere' Della Luna"){
		$query="UPDATE farmacieprovinciatrento SET COMUNE='Roverè della Luna', id_comune=3034 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
		mysql_query($query);
	}else if($comune=="Calavino"){
		$query="UPDATE farmacieprovinciatrento SET id_comune=3092 WHERE COMUNE='$comuneI' and COD_PROVINCIA='$codiceprovincia'";
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