<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

$db=mysql_select_db("poipiemonte2");
if(!$db){
   die ("Impossibile selezionare il database.".mysql_errno());
}

$query1="SELECT Comune FROM centricommerciali";
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
	//$provincia=$row1["PROVINCIA"];
	//$provinciaI=addslashes($provincia);
	
	if($comune=="Cisterna D'Asti" /* and $provincia=="Asti"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='5040' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	} else if($comune=="Gignese" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103034' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	} else if($comune=="Chiusa Pesio" /*and $provincia=="Cuneo"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='4068' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	} else if($comune=="Verbania" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103072' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Santa Maria Maggiore" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103062' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Stresa" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103064' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Belgirate" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103010' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Cannero Riviera" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103016' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Crodo" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103026' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Domodossola" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103028' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Ghiffa" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103033' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Gravellona Toce" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103035' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Gurro" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103036' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Macugnaga" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103039' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Mergozzo" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103044' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Omegna" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103050' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Ornavasso" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103051' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Quarna Sotto" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103059' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Valstrona" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103069' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Villadossola" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103075' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Premia" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103056' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Villette" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103076' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Malesco" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103041' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Trarego Viggiona" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103066' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Brignano Frascata" /*and $provincia=="Alessandria"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='6024' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Leinì" /*and $provincia=="Torino"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='1130' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Montiglio" /*and $provincia=="Asti"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='5121' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Vogogna" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103077' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Oggebbio" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103049' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Re" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103060' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Cannobio" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103017' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Madonna del Sasso" /*and $provincia=="Verbania"*/){
		$query="UPDATE poipiemonte2.centricommerciali SET codiceComune='103040' WHERE Comune='$comuneI'";
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
		if($comune==$comune2 and ($provincia2=="Torino" or $provincia2=="Vercelli" or $provincia2=="Novara" or $provincia2=="Cuneo" or $provincia2=="Asti" or $provincia2=="Alessandria" or $provincia2=="Biella" or $provincia2=="Verbano-Cusio-Ossola")){
		    $query="UPDATE poipiemonte2.centricommerciali SET codiceComune='$codcomune' WHERE Comune='$comuneI'";
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