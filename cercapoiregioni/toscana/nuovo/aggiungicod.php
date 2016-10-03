<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

$db=mysql_select_db("poitoscana2");
if(!$db){
   die ("Impossibile selezionare il database.".mysql_errno());
}

$query1="SELECT Citta FROM villefirenze";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}
$db=mysql_select_db("comuniitaliani2");
if(!$db){
   die ("Impossibile selezionare il database.".mysql_errno());
}

$query2="SELECT Codice_Comune_formato_alfanumerico, Sigla_automobilistica, Denominazione_italiano FROM istatcomunigeolocalizzatidef";
$result2=mysql_query($query2);
if(!$result2){
   die ("query2 non riuscita.".mysql_errno());
}

while ($row1=mysql_fetch_assoc($result1)){
    $comune=$row1["Citta"];
	$comuneI=addslashes($comune);
	/*$provincia=$row1["provincia"];
	$provinciaI=addslashes($provincia);
	if(($comune=="Casciana Terme" or $comune=="Lari") and $provincia=="PI"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='50040' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Fabbriche di Vallico" or $comune=="Vergemoli") and $provincia=="LU"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='46036' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Castelfranco di Sopra" or $comune=="Pian di Scò" or $comune=="Castelfranco Piandisco'") and $provincia=="AR"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='51040' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Crespina" or $comune=="Lorenzana") and $provincia=="PI"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='50041' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Figline Valdarno"or $comune=="Incisa in Val d'Arno") and $provincia=="FI"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='48052' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="San Piero a Sieve"or $comune=="Scarperia")and $provincia=="FI"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='48053' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Giuncugnano" or $comune=="Sillano") and $provincia=="LU"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='46037' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Stia" or$comune=="Pratovecchio" or $comune=="Pratovecchio-Stia") and $provincia=="AR"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='51041' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="San Casciano Val di Pesa" and $provincia=="FI"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='48038' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Colle Val d'Elsa" and $provincia=="SI"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='52012' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Castelnuovo Val di Cecina" and $provincia=="PI"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='50011' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Montecatini Terme" and $provincia=="PT"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='47011' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Equi Terme" and $provincia=="MS"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='45007' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Vicopisano"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='50038' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Bagno Vignoni" and $provincia=="SI"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='52030' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Cinquale" and $provincia=="MS"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='45011' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Venturina" and $provincia=="LI"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='49002' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}
	/*else if($comune=="Montopoli in Val D'Arno"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}
	else if($comune=="Castiglione della pescaia"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Bagno A Ripoli"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Lastra A Signa"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Poggio A Caiano"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Borgo A Mozzano"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Castel San Niccolo'"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Santa Maria A Monte"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Campo Nell'Elba"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Pieve A Nievole"){
		$query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE comune='$comuneI' and provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}*/
	while ($row2=mysql_fetch_assoc($result2)){
		$comune2=$row2["Denominazione_italiano"];
		$comune2I=addslashes($comune2);
		/*if($row2["Denominazione_provincia"]=="NULL"){
			$provincia2=$row2["Denominazione_Citta_metropolitana"];
		}else{
			$provincia2=$row2["Denominazione_provincia"];
		}*/
		$provincia2=$row2["Sigla_automobilistica"];
		$provincia2I=addslashes($provincia2);
		$codcomune=$row2["Codice_Comune_formato_alfanumerico"];
		if($comune==$comune2 and $provincia2=="FI"){
		    $query="UPDATE poitoscana2.villefirenze SET codiceComune='$codcomune' WHERE Citta='$comuneI'";
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