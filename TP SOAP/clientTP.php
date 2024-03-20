<?php
// soapClient.php

// Création du client SOAP
	// création d'un tableau d'options (uri, location)
    $options = [
        'location' => "http://localhost/formation_php/php-web-service/serverTP.php",  // adresse IP et port de l'URL du serveur SOAP
        'uri' => "http://localhost/formation_php/php-web-service/clientTP",  // URI de l'espace de noms
        ];
	// création du client avec la classe PHP SoapClient
    $client = new SoapClient(null, $options);
// Appel de la fonction du service avec la méthode __soapCall
// $result = $client ->__soapCall('show',[]);
// foreach($_GET as $key => $value){
// $product[$key] = $value;
// }
// $result = $client ->add($product);
//funçao add sempre com o nome em vez de chamar com o soapcall, escrever isso na url clientTP.php?id=6&description=jolie&price=40&name=F&model=15
// $result = $client -> delete(1);
$result = $client -> update(1,["marque" => "Product Aa",
"modele" => "Model Aa",
"price" => 10,
"description" => "Description de Product Aa"]);

// Affichage des résultats
echo json_encode($result);
?>

