<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

$db=mysql_select_db("poimarche2");
if(!$db){
   die ("Impossibile selezionare il database.".mysql_errno());
}

$query1="SELECT Comune FROM chiesemonastericonventi";
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
    $comune=$row1["Comune"];
	$comuneI=addslashes($comune);
	//$provincia=$row1["Provincia"];
	//$provinciaI=addslashes($provincia);
	
	/*if($comune=="Salo'" and $provincia=="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17170' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Temu'" and $provincia=="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17184' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if (($comune=="Virgilio" or $comune=="Borgoforte")and $provincia=="MN"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='20071' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Viggiu'" and $provincia=="VA"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='12139' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Gambolo'" and $provincia=="PV"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='18068' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if ($comune=="Rodengo-Saiano" and $provincia=="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17163' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Rovagnate" or $comune=="Perego") and $provincia=="LC"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='97092' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Boffalora Sopra Ticino" and $provincia=="MI"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='15026' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Mezzegra" or $comune=="Lenno" or $comune=="Tremezzo" or $comune=="Ossuccio") and $provincia=="CO"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='13252' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Rivanazzano" and $provincia=="PV"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='18122' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Lonato" and $provincia="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17092' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Gabbioneta  Binanuova" and $provincia=="CR"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='19045' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Prestine" and $provincia=="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17018' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Brembilla" or $comune=="Gerosa")and $provincia=="BG"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='16253' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Toscolano Maderno" and $provincia=="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17187' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Verderio Inferiore" or $comune=="Verderio Superiore") and $provincia=="LC"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='97091' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="San Martino dell'Argine" and $provincia=="MN"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='20059' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Casale Cremasco Vidolasco" and $provincia=="CR"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='19017' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Locate Triulzi" and $provincia=="MI"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='15125' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Comezzano Cizzago" and $provincia=="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17060' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Godiasco" and $provincia=="PV"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='18073' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Parè" or $comune=="Drezzo" or $comune=="Gironico" or $comune=="Parè") and $provincia=="CO"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='13251' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Civenna" and $provincia=="CO"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='13250' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Gadesco Pieve Delmona" and $provincia=="CR"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='19046' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Robbio Lomellina" and $provincia=="PV"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='18123' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Vallio" and $provincia=="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17193' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Gravedona" or $comune=="Consiglio di Rumo" or $comune=="Germasino")and $provincia=="CO"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='13249' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Corteolona" or $comune=="Genzone") and $provincia=="PV"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='18192' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Laveno Mombello" and $provincia=="VA"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='12087' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Tremosine" and $provincia=="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17189' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Sant'Omobono Imagna" or $comune=="Valsecca") and $provincia=="BG"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='16252' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Gardone Valtrompia" and $provincia=="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17075' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Bovisio Masciago" and $provincia=="MB"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='108010' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Travedona Monate" and $provincia=="VA"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='12128' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Uggiate Trevano" and $provincia=="CO"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='13228' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Cocquio Trevisago" and $provincia=="VA"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='12053' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Gornate-Olona" and $provincia=="VA"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='12080' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Maccagno" or $comune=="Veddasca" or $comune=="Pino sulla sponda del Lago Mag") and $provincia=="VA"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='12142' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Cornale" and $provincia=="PV"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='18191' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Muggio'" and $provincia=="MB"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='108034' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Cantu'" and $provincia=="CO"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='13041' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}else if($comune=="Roe' Volciano" and $provincia=="BS"){
		$query="UPDATE poilombardia2.chiesemonastericonventi SET codiceComune='17164' WHERE comune='$comuneI' and Provincia='$provinciaI'";
		$do_query=mysql_query($query);
	}*/
	if($comune=="Sant'Angelo in Lizzola" or $comune=="Colbordolo") /*and $provincia=="PU"*/{
		$query="UPDATE poimarche2.chiesemonastericonventi SET codiceComune='41068' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Castel Colonna" or $comune=="Ripe" or $comune=="Monterado") /*and $provincia=="AN"*/{
		$query="UPDATE poimarche2.chiesemonastericonventi SET codiceComune='42050' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Serra de Conti" /*and $provincia=="AN"*/){
		$query="UPDATE poimarche2.chiesemonastericonventi SET codiceComune='42046' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}
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
		if($comune==$comune2 and  ($provincia2=="PU" or $provincia2=="AN" or $provincia2=="MC" or $provincia2=="AP" or $provincia2=="FM")){
		    $query="UPDATE poimarche2.chiesemonastericonventi SET codiceComune='$codcomune' WHERE Comune='$comuneI'";
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