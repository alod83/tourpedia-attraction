<?php
$conn=mysql_connect("localhost","root", "");
if(!$conn){
   die ("Errore di connessione con il server localhost.".mysql_errno());
}

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conn);

$db=mysql_select_db("comuniitaliani");
if(!$db){
   die ("Impossibile selezionare il database POI.".mysql_errno());
}

$query1="SELECT CodiceComune,Citta FROM istatcomuni";
$result1=mysql_query($query1);
if(!$result1){
   die ("query1 non riuscita.".mysql_errno());
}

$db=mysql_select_db("poiumbria");
if(!$db){
   die ("Impossibile selezionare il database POI.".mysql_errno());
}

$query2="SELECT CodiceComune FROM strutturesanitariepubblicheeprivate WHERE Comune='NULL'";
$result2=mysql_query($query2);
if(!$result2){
   die ("query2 non riuscita.".mysql_errno());
}

while ($row1=mysql_fetch_assoc($result1)){
	$codicecomune1=$row1["CodiceComune"];
	$comune=$row1["Citta"];
	while($row2=mysql_fetch_assoc($result2)){
		$codicecomune2=$row2["CodiceComune"];
		if ($codicecomune1==$codicecomune2){
			$query="UPDATE strutturesanitariepubblicheeprivate set Comune='$comune' where CodiceComune='$codicecomune2'";
			$result=mysql_query($query);
			if(!$result){
				die ("query non riuscita.".mysql_errno());
			}
		}
		
	}
	
	mysql_data_seek($result2,0);
}

?>
