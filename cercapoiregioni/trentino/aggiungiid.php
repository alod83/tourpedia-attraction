<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);


$db=mysql_select_db("poitrentino");
if(!$db){
   die ("Impossibile selezionare il database POI.".mysql_errno());
}

$query1="SELECT Comune, Provincia FROM centricommercialiprovtrento";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}


$filecom=file_get_contents("comuniitalianigeolocalizzaticomp.json");
$filedec=json_decode($filecom,true);



while ($row1=mysql_fetch_assoc($result1)){
    
	$comune=$row1["Comune"];
	$comuneI=addslashes($comune);
	$provincia=$row1["Provincia"];
	$provinciaI=addslashes($provincia);
	
	foreach($filedec["comuni"] as $value){
		$comune2=$value["nomeComune"];
		$provincia2=$value["Provincia"];
		$provincia2I=addslashes($provincia2);
		$idcomune=$value["id"];
		
		if($comune==$comune2 and $provincia==$provincia2){
			$query="UPDATE centricommercialiprovtrento SET id_comune='$idcomune'  WHERE Comune='$comuneI' and Provincia='$provinciaI'";
			$do_query=mysql_query($query);
			if(!$do_query){
				die("query fallita ".mysql_errno());
			}
			break;
		}
	}
	
	if(($comune=="Cognola") or ($comune=="Ravina - Trento") or ($comune=="Meano") or ($comune=="Piedicasello") or ($comune=="Povo") or ($comune=="San Donà") or ($comune=="Gardolo") or ($comune=="Martignano")  or ($comune=="Mattarello") or ($comune=="Ravina") or ($comune=="Roncafort") or ($comune=="Sopramonte") or ($comune=="Villazzano") or ($comune=="Vaneze Monte Bondone") or ($comune=="Vigolo Baselga") or ($comune=="Vela") or ($comune=="Cadine") or ($comune=="Romagnano") or ($comune=="Baselga del Bondone") or ($comune=="Spini di Gardolo") or ($comune=="Viote") or ($comune=="Vason") or ($comune=="Trento - Monte Bondone") or ($comune=="Trento-Monte Bondone") or ($comune=="Sardagna")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3064 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Padergnone") or ($comune=="Terlago") or ($comune=="Vezzano") or ($comune=="Lon di Vezzano") or ($comune=="Fraveggio - Vezzano")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3095 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Lagolo - Calavino") or ($comune=="Pergolese di Lasino") or ($comune=="Fraz.Sarche - Calavino") or ($comune=="Lasino") or ($comune=="Calavino")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3090 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Pietramurata di Dro"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=2973 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Vigo Cavedine") or ($comune=="Fraz. Lago di Cavedine")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=2959 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Roncegno"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3029 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Roncone") or ($comune=="Bondo") or ($comune=="Lardaro") or($comune=="Breguzzo")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3093 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Rovere' della Luna"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3032 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="San Lorenzo in Banale") or ($comune=="Dorsino")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3078 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Siror") or ($comune=="Tonadico") or ($comune=="Transacqua") or ($comune=="Fiera di Primiero")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3092 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Smarano") or ($comune=="Taio") or ($comune=="Tres") or ($comune=="Vervo'") or ($comune=="Coredo")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3077 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Strigno") or ($comune=="Villa Agnedo") or ($comune=="Ivano-Fracena") or ($comune=="Spera")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3087 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Tassullo") or ($comune=="Tuenno") or ($comune=="Nanno")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3096 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Terres") or ($comune=="Cunevo") or ($comune=="Flavon")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3089 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Vigolo Vattaro") or ($comune=="Bosentino") or ($comune=="Vattaro") or($comune=="Centa San Nicolo'")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3083 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Baselga di Pine'"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=2926 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Cagno'"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=2938 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Calliano (TN)"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=2942 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Cembra") or ($comune=="Lisignago")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3088 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Condino") or ($comune=="Cimego")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3085 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Fiave'"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=2976 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Garniga"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=2982 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Livo (TN)"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=2991 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Palu' del Fersina"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3012 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Panchia'"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3013 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Ragoli") or ($comune=="Montagne") or ($comune=="Preore")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3094 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Revo'"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3025 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Ruffre'"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3034 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Vigo Rendena") or ($comune=="Villa Rendena") or ($comune=="Dare'")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3091 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Amblar") or($comune=="Don")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3084 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Caderzone"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=2937 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Daone") or ($comune=="Praso")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3079 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Dimaro") or ($comune=="Monclassico")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3080 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Faver") or ($comune=="Grumes")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3082 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Male'"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=2994 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Pieve di Bono") or ($comune=="Prezzo")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3081 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Zuclo"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=3086 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	/*else if(($comune=="Giuncugnano") or ($comune=="Sillano")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4507 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if(($comune=="Stia") or($comune=="Pratovecchio") or ($comune=="Pratovecchio-Stia")){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4665 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="San Casciano Val di Pesa"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4561 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Colle Val d'Elsa"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4677 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Castelnuovo Val di Cecina"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4601 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Montecatini Terme"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4518 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Montopoli in Val D'Arno"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4609 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	else if($comune=="Castiglione della pescaia"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4707 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Bagno A Ripoli"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4530 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Lastra A Signa"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4549 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Poggio A Caiano"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4733 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Borgo A Mozzano"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4478 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Castel San Niccolo'"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4637 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Santa Maria A Monte"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4622 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Campo Nell'Elba"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4574 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}else if($comune=="Pieve A Nievole"){
		$query="UPDATE centricommercialiprovtrento SET id_comune=4520 WHERE Comune='$comuneI' and Provincia='$provinciaI'";
		mysql_query($query);
	}
	
	*/
		
}
	

?>