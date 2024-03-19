<?php
// Votre code d'initialisation des données ici
$products = [
    [
        "id" => 1,
        "name" => "Product A",
        "price" => 100
    ],
    [
        "id" => 2,
        "name" => "Product B",
        "price" => 10
    ],
    [
        "id" => 3,
        "name" => "Product C",
        "price" => 30
    ],
    [
        "id" => 4,
        "name" => "Product D",
        "price" => 15
    ],
    [
        "id" => 5,
        "name" => "Product E",
        "price" => 25
    ],
];

// Vérifie la méthode HTTP
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // var_dump($_GET);
    // le contenttype approprié
    header('Content-Type: application/json');
    //permite o acesso a todos
    header('Access-Control-Allow-Origin: *');

    //NOS REPASSAMOS O TIPO DE CONTEUDO  QUE ESTÁ NA REQUISIÇÃO
    // Envoie les données des produits au format JSON avec 
    echo json_encode($products);
    //RETORNA O JSON QUE REPRESENTA A TABELA
}
// Autres actions à gérer pour d'autres méthodes HTTP
		// Méthode non autorisée

