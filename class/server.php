<?php
// server.php

// Définition des fonctions du service (ex. fonction addition)
function addition(int $a, int $b){
    return $a + $b;
}
// Création du serveur SOAP
// Définition du tableau d'options (uri, encoding, ...)
$options = [
    'uri'=>"http://localhost/formation_php/php-web-service/server.php",  
    'encoding' => "UTF-8"
];
	// Instancier le serveur avec la classe SoapServer de PHP
    $server = new SoapServer(null,$options);  
    // La définition de l'échange WSDL se fait par la méthode addFunction() ou via un fichier et les options définies précédemment 
    
    // Définition des méthodes du service avec la fonction addFunction
    $server->addFunction("addition");

// Lancement du serveur pour la gestion des requêtes SOAP
$server ->handle();
?>

