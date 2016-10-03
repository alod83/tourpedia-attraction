<?php
	$POIcateg=array("aerialway"=>["station"],"aeroway"=>["aerodrome","heliport"], "amenity"=>["bar","bbq","biergarten","cafe","drinking_water","fast_food","food_court","ice_cream","pub","restaurant","library","bicycle_parking","bicycle_repair_station",
	"bicycle_rental","bus_station","car_rental","car_sharing","car_wash","charging_station","fuel","motorcycle_parking","parking","taxi","atm","bank","bureau_de_change","clinic","dentist","doctors",
	"hospital","pharmacy","veterinary","casino","cinema","fountain","nightclub","planetarium","stripeclub","theatre","animal_boarding","dive_centre","embassy","fire_station","gym","internet_cafe","marketplace","monastery","photo_booth",
	"place_of_worship","police","post_box","post_office","sauna","shelter","shower","toilets","vending_machine","watering_place"],"biergarten"=> ["yes"],"castle_type"=>["fortress"],"craft"=>["caterer","photographic_laboratory","pottery","shoemaker","watchmaker"],"emergency"=>["defibrillator","aed"],"geological"=>["palaeontological_site"],"highway"=>["services"],"historic"=>
	["archaeological_site","battlefield","boundary_stone","cannon","castle","farm","fort","gallows","locomotive","manor","memorial","monastery","monument","pillory","ruins","rune_stone","tomb","tower"],"landuse"=>["salt_pond"],"leisure"=>
	["adult_gaming_centre","amusement_arcade","bowling_alley","dance","dog_park","firepit","garten","golf_course","hackerspace","ice_rink","miniature_golf","nature_reserve","park","pitch","playground","sports_centre","sauna","stadium","swimming_pool","water_park"],
	"man_made"=>["campanile","tower","watermill","windmill"],"medical"=>["aed"],"office"=>["guide"],"public_transport"=>["station"],"railway"=>["halt","station","tram_stop"],"shop"=>["alcohol","bakery","beverages","butcher","chocolate","coffee",
	"convenience","deli","greengrocer","confectionery","patry","seafood","wine","tailor","tea","kiosk","mall","supermarket","bag","boutique","clothes","jewerly","leather","shoes","watches","beauty","cosmetics",
	"hairdresser","herbalist","optician","perfumery","florist","antiques","computer","electronics","mobile_phone","bicycle","sports","games","music","video","video_games","book","gift","newsagent","ticket","dry_cleaning","tobacco","toys","travel_agency"],"ruins"=>["yes"],
	"sport"=>["base","basketball","beachvolleyball","billiards","canoe","cliff_diving","climbing","climbing_adventure","cycling","free_flying","parachuting","roller_skating","rowing","sailing","scuba_diving","soccer","surfing","tennis","volleyball","water_ski"],
	"tourism"=>["alpine_hut","yes","attraction","antwork","gallery","information","museum","picnic_site","theme_park","viewpoint","zoo"]);
	 
	$regioni=array("calabria");
	 foreach($regioni as $value){
		 //$stampainfoiniziali=true;
		 $nomefileresults="poi".$value.".json";
		 $fileresults=fopen($nomefileresults,'a+');
		 $nomefilecom="comuni".$value.".json";
		 $filer=file_get_contents($nomefilecom);
		 $filed=json_decode($filer);
		 foreach($filed as $value){
			 $nomecomune=$value;
			 $nomecomuneS=str_replace(" ","+",$nomecomune);
			 foreach($POIcateg as $cat=>$array){
				 $categ=$cat;
				 foreach($array as $value){
					 $results=NULL;
					 $count=1;
					 $ch = curl_init();
					 $urlR='http://overpass-api.de/api/interpreter?data=[out:json];area[name="'.$nomecomuneS.'"][admin_level=8][boundary=administrative];node(area)['.$categ.'='.$value.'];out%20meta%20qt;';
					 curl_setopt($ch, CURLOPT_URL, $urlR);
					 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
					 while($results==NULL){
						print("Results=null\t".$count."\t".$urlR."\n");
						$exec=curl_exec($ch);
						$results=json_decode($exec,true);
						$count++;
					}
					 /*if ($stampainfoiniziali){
						 fwrite($fileresults,'{"version":'.json_encode($results["version"]).",\n".'"generator":'.json_encode($results["generator"]).",\n".'"osm3s":'.json_encode($results["osm3s"]).",\n".'"elements": '."[\n");
						 $stampainfoiniziali=false;
					 }*/
					 $elements=$results["elements"];
					 if(!empty($elements)){
						 for($i=0;$i<count($elements);$i++){
							 if (!array_key_exists("addr:city",$elements[$i]["tags"])){
								 $elements[$i]["tags"]["addr:city"]=$nomecomune;
							 }else{
								 $elements[$i]["tags"]["myadd:city"]=$nomecomune;
							 }
							 if($i==count($elements)){
								fwrite($fileresults,json_encode($elements[$i],JSON_UNESCAPED_UNICODE)."\n"); 
							 }else{
								fwrite($fileresults,json_encode($elements[$i],JSON_UNESCAPED_UNICODE).",\n"); 
							 }
							 
						 }
					 }
					 
			    }
				 
			 }
		 }
		 fwrite($fileresults,"]\n}");
	 }
	
?>