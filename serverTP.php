<?php
require("./productsTP.php");
// création du fichier soapServer.php

// Définir les fonctions pemettant d'implémenter nos fonctionnalités
function show() { 
    global $products;
    return $products;
}
function specific($id){
    global $products;
    foreach ($products as $k => $v) {
        if ($v["id"] == $id) {    
            // var_dump($v);
            return $v;
        }
    // return $product[$id];
    }
}
specific(2); // pour tester la fonction spéc
function add(array $new) {
    global $products;
    $products[] = $new;
    return $products;
}
function delete(int $id){
    global $products;
    foreach($products as $key => $product) {
        if($product['id'] == $id){
            unset($products[ $key ]);
        }
        
    }
    return $products; 

}
// Création du serveur SOAP
$options = [
    'uri'=>"http://localhost/formation_php/php-web-service/serverTP.php",  
    'encoding' => "UTF-8"
];
// Définition des fonctions dans le serveur
$server =  new SoapServer(NULL, $options);
$server->addFunction(['show' , 'specific','add', 'delete']);
// Lancement du serveur 
$server ->handle();