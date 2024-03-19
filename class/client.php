<?php
// soapClient.php

// Création du client SOAP
	// création d'un tableau d'options (uri, location)
    $options = [
        'location' => "http://localhost/formation_php/php-web-service/server.php",  // adresse IP et port de l'URL du serveur SOAP
        'uri' => "http://localhost/formation_php/php-web-service/client",  // URI de l'espace de noms
        ];
	// création du client avec la classe PHP SoapClient
    $client = new SoapClient(null, $options);
// Appel de la fonction du service avec la méthode __soapCall
$result = $client ->__soapCall('addition', [5,8]);
// Affichage des résultats
echo $result;
?>

