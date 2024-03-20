<?php
//definir un modele
$model = ["id", "firstname", "lastname", "email", "password"];
// Données simulées pour les utilisateurs
$users = [
    [
        "id" => 1,
        "firstname" => "Martin",
        "lastname" => "Smith",
        "email" => "martin.smith@gmail.com",
        "password" => "martin56@",
    ],
    [
        "id" => 2,
        "firstname" => "Paul",
        "lastname" => "Dupont",
        "email" => "paul.dupont@gmail.com",
        "password" => "paul56@",
    ],
    [
        "id" => 3,
        "firstname" => "Alice",
        "lastname" => "Delarue",
        "email" => "alice.delarue@gmail.com",
        "password" => "alice56@",
    ],
    [
        "id" => 4,
        "firstname" => "Marie",
        "lastname" => "Louise",
        "email" => "marie.louise@gmail.com",
        "password" => "loulou56@",
    ],
];

// Fonction pour récupérer tous les utilisateurs
function getAll()
{
    global $users;
    if (empty($users)) {
        http_response_code(200);
        return [
            "error" => "No user found",
            "code" => 200
        ];
    } else {
        return $users;
    }
}

// Fonction pour récupérer un utilisateur spécifique
function getOne(int $id)
{
    global $users;
    foreach ($users as $key => $user) {
        if ($user["id"] === $id) {
            http_response_code(201);
            return $user;
        }
    }
    http_response_code(402);
    return [
        "error" => "No user found with id: $id",
        "code" => 200
    ];
}
// Fonction pour créer un nouvel utilisateur
function create(array $user)
{
    global $users;
    global $model;
    $keys = array_keys($user);
    $diff = array_diff($model, $keys);
    if (empty($user)) {
        http_response_code(404);
        return [
            'code' => 404,
            'error' => 'aucun utilisateur n a etait reseigne'
        ];
    }
    if (count($diff) > 0) {
        $message = 'il manque les valeurs suivant';
        $i = 0;
        foreach ($diff as $key => $value) {
            if ($key === array_keys($model, $value)[0] && $i === 0) {
                $message .= "  $value";
                continue;
            }
            $message .= ", $value";
        }
        // var_dump("toto");
        http_response_code(400);
        return [
            "code" => 403,
            "error" => 'aucun utilisateur'
        ];
    }
    $users[] = $user;
    http_response_code(201);
    return $user;
}

// Fonction pour mettre à jour un utilisateur existant
function update(int $id, array $updates){
    
    global $users;
    
    foreach ($users as $k => $user) {
        if ($user["id"] === $id) {
            foreach ($updates as $i => $update) {
                $users[$k][$i] = $update;
            }
            http_response_code(201);
            return $users;
        }
        http_response_code(404);
        return [
            "code" => 404,
            "error" => "l'utilisateur demandé n'existe pas"
        ];
    }
}

// Fonction pour supprimer un utilisateur existant
function delete($id)
{
    global $users;
    foreach ($users as $key => $user) {
        if ($user["id"] === $id) {
            unset($users[$key]);
            http_response_code(201);
            return   $users;
        }
    }
    return null;
}
//function remplacer user
function remplace(int $id, array $puts){
    global $users;
    global $model;
    $message = 'il manque les valeurs suivant';
    $i = 0;
    $keys = array_keys($puts);
    $diff = array_diff($model, $keys);
    if (count($diff) > 0 ){
        foreach ($diff as $key => $value) {
            if ($key === array_keys($model, $value)[0] && $i === 0) {
                $message .= "  $value";
                continue;
            }
            $message .= ", $value";
    }
    foreach ($users as $k => $user) {
        if ($user["id"] === $id) {
            $users[$k] = $puts ;
            return $users;
        }
    }
    return [
        "code" => 404,
        "error" => "l'utilisateur demandé n'existe pas"
        ];
    }
}