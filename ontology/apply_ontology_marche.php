<?php 
require 'vendor/autoload.php';
$connection = new MongoDB\Client('mongodb://localhost:27017');
$dbname = $connection->Attrazioni;
$nuovo = $dbname->NUOVO;
$dbname = $connection->Ontologia;
$marche = $dbname->NUOVAMARCHE;
$marche->drop();//in caso s volesse rieseguire

$product_array=array("region"=>"Marche");
$cursor=$nuovo->find($product_array);
foreach ($cursor as $obj) {
	//array per il tipo principale
	$document=array();
	//proprietà del tipo principale
	$inherited_properties=array();
	$properties=array();
	
	if((isset($obj["name"])) and ($obj["name"]!="")){
			$nome = $obj["name"];
			$inherited_properties["name"]=$nome;
	}
	if((isset($obj["latitude"])) and ($obj["latitude"]!=0)){
		$inherited_properties["latitude"]=$obj["latitude"];
		$inherited_properties["longitude"]=$obj["longitude"];
	}
	if((isset($obj["address"])) and ($obj["address"]!="")){
		$inherited_properties["street"]=$obj["address"];
	}
	if((isset($obj["postal-code"])) and ($obj["postal-code"]!=0)){
		$inherited_properties["postalCode"]=$obj["postal-code"];
	}
	if((isset($obj["province"])) and ($obj["province"]!="")){
		$inherited_properties["province"]=$obj["province"];
	}
	if((isset($obj["region"])) and ($obj["region"]!="")){
		$inherited_properties["region"]=$obj["region"];
	}
	if((isset($obj["city"])) and ($obj["city"]!="")){
		$inherited_properties["city"]=$obj["city"];
	}
	if((isset($obj["codistat"])) and ($obj["codistat"]!=0)){
		$inherited_properties["istatCode"]=$obj["codistat"];
	}
	//per tutte le informazioni che compongono l'indirizzo
	/*$array_ind_prop=array();
	if(isset($via)){$array_ind_prop["via"]=$via;}
	if(isset($cap)){$array_ind_prop["cap"]=$cap;}
	if(isset($provinca)){$array_ind_prop["provincia"]=$provincia;}
	if(isset($regione)){$array_ind_prop["regione"]=$regione;}
	if(isset($citta)){
		$array_ind_prop["haCittà"]=array("Type"=>array("name"=>"Città", "inherited_properties"=>array("name"=>$citta)));
		if(isset($codiceIstat)){
			$array_ind_prop["haCittà"]["Type"]["properties"]["codiceIstat"]=$codiceIstat;
		}
	}
	if(!empty($array_ind_prop)){
		$indirizzo = array("Type"=>array("name"=>"Indirizzo", "inherited_Types"=> array('Contatti','Thing'),"properties"=>$array_ind_prop));
		$inherited_properties["haIndirizzo"]=$indirizzo;
	}*/

	if (($obj["description"]=="Musei") or ($obj["description"]=="Punti di interesse turistico") or ($obj["description"]=="Biblioteche")){
			if((isset($obj["email"])) and ($obj["email"]!="")){
				if((isset($obj["category"])) and ($obj["category"]!="")){
					$inherited_properties["email"]=$obj["email"];
				}else{
					$properties["email"]=$obj["email"];
				}

			}
			if((isset($obj["telephone"])) and ($obj["telephone"]!="")){
				if((isset($obj["category"])) and ($obj["category"]!="")){
					$inherited_properties["telephone"]=$obj["telephone"];
				}else{
					$properties["telephone"]=$obj["telephone"];
				}

			}
			if((isset($obj["url"])) and ($obj["url"]!="")){
				if((isset($obj["category"])) and ($obj["category"]!="")){
					$inherited_properties["url"]=$obj["url"];
				}else{
					$properties["url"]=$obj["url"];
				}

			}
	}

	if (($obj["description"]=="Musei") or ($obj["description"]=="Punti di interesse turistico")){
			if((isset($obj["image"])) and ($obj["image"]!="")){
				if((isset($obj["category"])) and ($obj["category"]!="")){
					$inherited_properties["image"]=$obj["image"];
				}else{
					$properties["image"]=$obj["image"];
				}

			}
			if((isset($obj["opening hours"])) and ($obj["opening hours"]!="")){
				if((isset($obj["category"])) and ($obj["category"]!="")){
					$inherited_properties["openingHours"]=$obj["opening hours"];
				}else{
					$properties["openingHours"]=$obj["opening hours"];
				}

			}
	}

	if((isset($obj["category"])) and ($obj["category"]!="")){

		switch($obj["category"]){
			case 'Altro per App':
				$document["Type"]="OtherEvent";
				break;
			case "Le Marche all’Expo":
				$document["Type"]="MarchesActivityAtExpo";
				break;
			case "L’Expo nelle Marche":
				$document["Type"]="ExpoActivityInMarche";
				break; 
			case "Cineturismo nelle Marche":
				$document["Type"]="CinemaTourism";
				break;
			case "Mercati pubblici all’aperto":
				$document["Type"]= "Market";
				$properties["openAir"]=true;
				$inherited_properties["historic"]=false;
				$inherited_properties["pubblicAccess"]=true;
				break;
			case "Mercati pubblici storici coperti":
				$document["Type"]= "Market";
				$properties["openAir"]=false;
				$inherited_properties["historic"]=true;
				$inherited_properties["publicAccess"]=true;
				break;
			case "Tradizioni":
				$document["Type"]= "Tradition";
				break;
			case "Località":
				$document["Type"]="Locality";
				$document["inherited_Types"] = ["AdministrativeArea","Place", "TouristPOI","TouristAttraction","Thing"];
				break;
			case "Guide Turistiche":
				$document["Type"]= "TouristGuide";
				break;
			case "Sport":
				$document["Type"]= "SportActivityAndOrganization";
				break;
			case "Centri Congressi":
				$document["Type"]= "ConferenceCenter";
				break;
			case "Centri e punti IAT":
				$document["Type"]= "IATCenter";
				break;
			case "Centri Educazione Ambientale (CEA)":
				$document["Type"]= "EnvironmentalEducationCenter";
				break;
			case "Giardini Pubblici":
				$document["Type"]= "Garden";
				$inherited_properties["pubblicAccess"]=true;
				break;
			case "Musei POI":
				$document["Type"]="Museum";
				break;
			case "Architettura e paesaggio":
				$document["Type"]="LandscapeAndArchitecturalWork";
				break;
			case "Operatori turistici":
				$document["Type"]="TouristOperator";
				break;
			case "Parchi":
				$document["Type"]="Park";
				break;
			case "Ponti storici":
				$document["Type"]="Bridge";
				$properties["historic"]=true;
				break;
			case "Porti":
				$document["Type"]="Port";
				break;
			case "Teatri":
				$document["Type"]="Theater";
				break;
			case "Archeologia":
				if($obj["description"]=="Musei"){
					$document["Type"]= "ArchaeologicalMuseum";
					$document["inherited_Types"] = ["Museum","TouristAttraction","Thing"];
					if((isset($obj["entrance"])) and ($obj["entrance"]!="")){
						$inherited_properties["entrance"]=$obj["entrance"];
					}
				}else{
					$document["Type"]= "ArchaeologicalSiteAndWork";
					$document["inherited_Types"] = ["Establishment","Place","TouristPOI","TouristAttraction","Thing"];
				}
				break;
			case "Fari storici":
				$document["Type"]="Lighthouse";
				$inherited_properties["historic"]=true;
				break;
			case "Parchi divertimento":
				$document["Type"]= "AmusementPark";
				$document["inherited_Types"] = ["EntertainmentBusiness","BusinessActivity","Establishment","Place","TouristPOI", "TouristAttraction", "Thing"];
				break;
			case "Centri Benessere":
				$document["Type"]= "WellnessCenter";
				break;
			case "Terme/Spa":
				$document["Type"]= "ThermalBathAndSpa";
				break;
			case "Locali storici":
				$document["Type"] ="Club";
				$inherited_properties["historic"]=true;
				break;
			case "Botteghe":
				$document["Type"]= "Workshop";
				break;
			case "Locande":
				$document["Type"]= "Inn";
				break;
			case "Osterie":
				$document["Type"]= "Pub";
				break;
			case "Spacci di campagna":
				$document["Type"]= "FactoryOutlet";
				break;
			case "Taverne":
				$document["Type"]= "Tavern";
				break;
			case "Varie":
				$document["Type"]= "OtherClub";
				break;
			case "Negozi":
				$document["Type"]= "Store";
				break;
			case "Shopping di Qualità":
				$document["Type"]= "QualityShoppingStore";
				$document["inherited_Types"] = ["Store","BusinessActivity","Establishment","Place","TouristPOI","TouristAttraction","Thing"];
				break;
			case "Ristoranti":
				$document["Type"]= "Restaurant";
				$document["inherited_Types"] = ["FoodAndBeverageEstablishment","BusinessActivity","Establishment","Place","TouristPOI","TouristAttraction","Thing"];
				break;
			case "Stabilimenti":
				$document["Type"]= "BeachResort";
				break;
			case "Importante non specializzata":
				$document["Type"]= "NotSpecializedLibrary";
				break;
			case "Istituto di insegnamento superiore":
				$document["Type"]= "HighSchoolAndUniversityLibrary";
				break;
			case "Pubblica":
				$document["Type"]= "PublicLibrary";
				break;
			case "Specializzata":
				$document["Type"]= "SpecializedLibrary";
				break;
			case "Chiese":
				$document["Type"]= "Church";
				break;
			case "Monasteri e conventi":
				$document["Type"]= "ConventAndMonastary";
				break;
			case "Arte":
				$document["Type"]= "ArtMuseum";
				break;
			case "Etnografia e antropologia":
				$document["Type"]= "EthnographicAndAnthropologicalMuseum";
				break;
			case "Scienza e tecnica":
				$document["Type"]= "ScienceAndTecniqueMuseum";
				break;
			case "Specializzato":
				$document["Type"]= "SectorMuseum";
				break;
			case "Storia":
				$document["Type"]= "HistoricMuseum";
				break;
			case "Storia naturale e scienze naturali":
				$document["Type"]= "NaturalHistoryMuseum";
				break;
			case "Territoriale":
				$document["Type"]= "LocalMuseum";
				break;
			case "Spiagge":
				$document["Type"]= "Beach";
				$document["inherited_Types"] = ["GeologicalFormation","Place","TouristPOI","TouristAttraction","Thing"];
				break;
			case "Itinerari":
				$document["Type"]= "Itinerary";
				break;
			case "Itinerari Cicloturistici":
				$document["Type"]="CycleTouristicItinerary";
				$document["inherited_Types"] = ["Itinerary","Place","TouristPOI","TouristAttraction","Thing"];
				break;
			case "Luoghi d'arte":
				$document["Type"]="ArtisticPlace";
				break;
			case "Artigianato artistico":
				$document["Type"]="ArtisticCraftActivity";
				break;
			case "Cataloghi":
				$document["Type"]="Catalog";
				break;
			case "Eccellenze dell'arte":
				$document["Type"]="ArtisticExcellence";
				$document["inherited_Types"] = ["ArtPiece","CreativeWork","TouristPOI","TouristAttraction","Thing"];
			case "Opere d'arte":
				$document["Type"]="ArtPiece";
				break;
			case "Pacchetti Vacanze":
				$document["Type"]="HolidayPackage";
				break;
			case "Prodotti tipici":
				$document["Type"]="LocalProductAndActivity";
				break;
			case "Storie e leggende":
				$document["Type"]="HistoryAndLegend";
				break;
			case "Personaggi e la loro terra":
				$document["Type"]="HistoricPersonality";
				$document["inherited_Types"] = ["TouristPOI","TouristAttraction"];
				break;
		}
		
		switch($obj["category"]){
			case 'Altro per App ':
			case "Cineturismo nelle Marche":
			case "Mercati pubblici all’aperto":
			case  "Mercati pubblici storici coperti":
			case "Tradizione":
				$document["inherited_Types"] = ["Event","TouristPOI","TouristAttraction","Thing"];
				break;
			case "Le Marche all’Expo":
			case "L’Expo nelle Marche":
				$document["inherited_Types"] = ["ExpoActivity","Event","TouristPOI","TouristAttraction","Thing"];
			case "Guide turistiche":
			case "Sport":
			case "Centri Congressi":
			case "Centri Educazione Ambientale (CEA)":
			case "Centri e punti IAT":
			case "Giardini pubblici":
			case "Musei POI":
			case "Architettura e paesaggio":
			case "Operatori turistici":
			case "Parchi":
			case "Ponti storici":
			case "Porti":
			case "Teatri":
			case "Fari storici":
				$document["inherited_Types"] = ["Establishment","Place","TouristPOI","TouristAttraction","Thing"];
				break;
			case "Centri Benessere":
			case "Terme/Spa":
				$document["inherited_Types"] = ["HealthAndBeautyBusiness","BusinessActivity","Establishment","Place","TouristPOI","TouristAttraction","Thing"];
				break;
			case "Botteghe":
			case "Locande":
			case "Osterie":
			case "Spacci di campagna":
			case "Taverne":
			case "Varie":
				$document["inherited_Types"] = ["Club","TouristAttraction","Thing"];
				$properties["historic"]=true;
				break;
			case "Locali storici":
			case "Negozi":
			case "Stabilimenti":
				$document["inherited_Types"] = ["BusinessActivity","Establishment","Place","TouristPOI","TouristAttraction","Thing"];
				break;
			case "Importante non specializzata":
			case "Istituto di insegnamento superiore":
			case "Pubblica":
			case "Specializzata":
				$document["inherited_Types"] = ["Library","TouristAttraction","Thing"];
				break;
			case "Monasteri e conventi":
			case "Chiese":
				$document["inherited_Types"] = ["PlaceOfWorship","Establishment","Place","TouristPOI","TouristAttraction","Thing"];
				break;
			case "Arte":
			case "Etnografia e antropologia":
			case "Scienza e tecnica":
			case "Specializzato":
			case "Storia":
			case "Storia naturale e scienze naturali":
			case "Territoriale":
				$document["inherited_Types"] = ["Museum","TouristAttraction","Thing"];
				if(isset($obj["entrance"]) and ($obj["entrance"]!="")){
						$inherited_properties["entrance"]=$obj["entrance"];
				}
				break;
			case "Itinerari":
			case "Luoghi d'arte":
				$document["inherited_Types"] = ["Place","TouristPOI","TouristAttraction","Thing"];
				break;
			case "Artigianato artistico":
			case "Cataloghi":
			case "Opere d'arte":
			case "Pacchetti Vacanze":
			case "Prodotti tipici":
			case "Storie e leggende":
				$document["inherited_Types"] = ["CreativeWork","TouristPOI","TouristAttraction","Thing"];
				break;
		}
	}else{
		switch ($obj["description"]) {
			case 'Punti di interesse turistico':
				$document["Type"]="TouristPOI";
				$document["inherited_Types"]=["TouristAttraction","Thing"];
				break;
			case 'Bilioteche':
				$document["Type"]="Library";
				$document["inherited_Types"]=["TouristAttraction","Thing"];
				break;
			case 'Musei':
				$document["Type"]="Museum";
				$document["inherited_Types"]=["TouristAttraction","Thing"];
				if(isset($obj["entrance"]) and ($obj["entrance"]!="")){
						$inherited_properties["entrance"]=$obj["entrance"];
				}
				break;
			case 'Locali storici':
				$document["Type"]="Club";
				$document["inherited_Types"]=["TouristAttraction","Thing"];
				$properties["historic"]=true;
				break;
		}
	}

	if(!empty($inherited_properties)){
		$document["inherited_properties"]=$inherited_properties;
	}
	if(!empty($properties)){
		$document["properties"]=$properties;
	}
	$document["_id"]=$obj["_id"];
	var_dump($document);
	$marche->insertOne($document);


}
?>