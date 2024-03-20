<?php
// Inclure le fichier de logique des utilisateurs
require "./users.php";
// Récupérer la méthode HTTP et l'URI
$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
// Routeur pour les différentes opérations CRUD
switch ($method) {
    case 'GET':
        preg_match("/^\/formation_php\/php-web-service\/REST\/users\/?(\d+)?$/", $uri, $matches);
        // var_dump($matches);
        if (!empty($matches) && !empty($users) && !array_key_exists(1, $matches)) {
            $users = getAll();
            echo json_encode($users);  // Envoyer une réponse au client en format JSON
            break;
            // var_dump("getAll", $matches);
            // echo '<pre>';
            // var_dump($users);
            // echo '</pre>';
        }
        if (array_key_exists(1, $matches)) {
            $user = getOne((int)$matches[1]);
            var_dump("getOne", $matches);
            echo json_encode($user);
            break;
            // echo '<pre>';
            // var_dump($user);
            // echo '</pre>';
        }
        if (empty($users)) {
            json_encode([
                "error" => "No user found",
                "code" => 404
            ]);
        }
        break;
    case 'POST':
        $user = $_POST;
        preg_match("/^\/formation_php\/php-web-service\/REST\/users\/?(\d+)?$/", $uri, $matches);
        $user = create($user);
        // var_dump($user);
        echo json_encode($user);
        break;

    case "PATCH":
        preg_match("/^\/formation_php\/php-web-service\/REST\/users\/?(\d+)?$/", $uri, $matches);
        var_dump($matches);
        $id = (int)$matches[1];
        $updates = file_get_contents("php://input");
        $items = explode('&',$updates);
        $array = []; 
        foreach ($items as $item) {
            $inputs = explode("=",$item);
            $array[$inputs[0]] = $inputs[1];
        }
        $result = update($id, $array);
        echo json_encode($result);

        break;

    
    case "PUT":
        preg_match("/^\/formation_php\/php-web-service\/REST\/users\/?(\d+)?$/", $uri, $matches);
        $id = (int)$matches[1];
        $updates = file_get_contents("php://input");
        $items = explode('&',$updates);
        $array = []; 
        foreach ($items as $item) {
            $inputs = explode("=",$item);
            $array[$inputs[0]] = $inputs[1];
        }
        $result = remplace($id, $array);
        echo json_encode($result);

        break;
    
    case "DELETE":
        preg_match("/^\/formation_php\/php-web-service\/REST\/users\/?(\d+)?$/", $uri, $matches);
        $id = (int)$matches[1];
        $result = delete($id);
        echo json_encode($result);

        break;


    default:
        http_response_code(404);
        echo json_encode([
            'message' => 'ressource introuvable',
            'http_status_code' => 404
        ]);
        break;
}


// echo '<pre>';
// var_dump($uri, $method);
// echo '</pre>';