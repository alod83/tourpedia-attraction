<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

$db=mysql_select_db("poitrentino2");
if(!$db){
   die ("Impossibile selezionare il database.".mysql_errno());
}

$query1="SELECT Comune FROM centricommercialiprovtrento";
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
	if(($comune=="Vela (Trento)") or ($comune=="Cognola") or ($comune=="Monte Bondone") or ($comune=="Ravina - Trento") or ($comune=="Meano") or ($comune=="Piedicasello") or ($comune=="Povo") or ($comune=="San Donà") or ($comune=="Gardolo") or ($comune=="Martignano")  or ($comune=="Mattarello") or ($comune=="Ravina") or ($comune=="Roncafort") or ($comune=="Sopramonte") or ($comune=="Villazzano") or ($comune=="Vaneze Monte Bondone") or ($comune=="Vigolo Baselga") or ($comune=="Vela") or ($comune=="Cadine") or ($comune=="Romagnano") or ($comune=="Baselga del Bondone") or ($comune=="Spini di Gardolo") or ($comune=="Viote") or ($comune=="Vason") or ($comune=="Trento - Monte Bondone") or ($comune=="Trento-Monte Bondone") or ($comune=="Sardagna")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22205' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Garniga Terme (Tn)"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22091' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Padergnone") or ($comune=="Terlago") or ($comune=="Vezzano") or ($comune=="Lon di Vezzano") or ($comune=="Fraveggio - Vezzano")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22248' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Lagolo - Calavino") or ($comune=="Pergolese di Lasino") or ($comune=="Fraz.Sarche - Calavino") or ($comune=="Lasino") or ($comune=="Calavino")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22243' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Pietramurata di Dro"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22079' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Vigo Cavedine") or ($comune=="Fraz. Lago di Cavedine")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22053' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Torbole sul Garda"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22124' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Roncegno"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22156' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Roncone") or ($comune=="Bondo") or ($comune=="Lardaro") or($comune=="Breguzzo")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22246' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Rovere' della Luna"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22160' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="San Lorenzo in Banale") or ($comune=="Dorsino")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22231' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Siror") or ($comune=="Tonadico") or ($comune=="Transacqua") or ($comune=="Fiera di Primiero")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22245' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Smarano") or ($comune=="Taio") or ($comune=="Tres") or ($comune=="Vervo'") or ($comune=="Coredo")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22230' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Strigno") or ($comune=="Villa Agnedo") or ($comune=="Ivano-Fracena") or ($comune=="Spera")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22240' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Tassullo") or ($comune=="Tuenno") or ($comune=="Nanno")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22249' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Terres") or ($comune=="Cunevo") or ($comune=="Flavon")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22242' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Vigolo Vattaro") or ($comune=="Bosentino") or ($comune=="Vattaro") or($comune=="Centa San Nicolo'")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22236' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Baselga di Pine'"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22009' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Cagno'"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22030' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Calliano (TN)"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22035' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Cembra") or ($comune=="Lisignago")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22241' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Condino") or ($comune=="Cimego")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22238' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Fiave'"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22083' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Garniga"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22091' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Livo (TN)"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22106' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Palu' del Fersina"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22133' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Panchia'"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22134' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Ragoli") or ($comune=="Montagne") or ($comune=="Preore")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22247' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Revo'"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22152' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Ruffre'"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22162' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Samone (TN)"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22165' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Vigo Rendena") or ($comune=="Villa Rendena") or ($comune=="Dare'")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22244' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Amblar") or($comune=="Don")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22237' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Caderzone"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22029' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Daone") or ($comune=="Praso")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22232' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Dimaro") or ($comune=="Monclassico")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22233' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Faver") or ($comune=="Grumes")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22235' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Male'"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22110' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if(($comune=="Pieve di Bono") or ($comune=="Prezzo")){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22234' WHERE Comune='$comuneI'";
		$do_query=mysql_query($query);
	}else if($comune=="Zuclo"){
		$query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='22234' WHERE Comune='$comuneI'";
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
		if($comune==$comune2 and $provincia2=="TN"){
		    $query="UPDATE poitrentino2.centricommercialiprovtrento SET codiceComune='$codcomune' WHERE Comune='$comuneI'";
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