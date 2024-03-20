<?php
// Votre code d'initialisation des données ici
$products = [
    [
        "id" => 1,
        "marque" => "Product A",
        "modele" => "Model A",
        "price" => 100,
        "description" => "Description de Product A"
    ],
    [
        "id" => 2,
        "marque" => "Product B",
        "modele" => "Model B",
        "price" => 10,
        "description" => "Description de Product B"
    ],
    [
        "id" => 3,
        "marque" => "Product C",
        "modele" => "Model C",
        "price" => 30,
        "description" => "Description de Product C"
    ],
    [
        "id" => 4,
        "marque" => "Product D",
        "modele" => "Model D",
        "price" => 15,
        "description" => "Description de Product D"
    ],
    [
        "id" => 5,
        "marque" => "Product E",
        "modele" => "Model  E",
        "price" => 25,
        "description" => "Description de Product E"
    ],
];

// // Vérifie la méthode HTTP
// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     // var_dump($_GET);
//     // le contenttype approprié
//     header('Content-Type: application/json');
//     //permite o acesso a todos
//     header('Access-Control-Allow-Origin: *');

//     //NOS REPASSAMOS O TIPO DE CONTEUDO  QUE ESTÁ NA REQUISIÇÃO
//     // Envoie les données des produits au format JSON avec 
//     echo json_encode($products);
//     //RETORNA O JSON QUE REPRESENTA A TABELA
// }
// // Autres actions à gérer pour d'autres méthodes HTTP
// 		// Méthode non autorisée
