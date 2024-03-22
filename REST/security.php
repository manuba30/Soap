<?php
// Clé secrète pour signer le token (à conserver en sécurité)
require "./vendor/autoload.php"; // In
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// $secret_key = "123";
// Fonction pour générer un token JWT
function  generateToken(string $secret_key,string $email) :string
{
    $payload = [
        "user_id"=>1,
        "username" => $email,
        "user_role"=> "Admin",
        "expiration"=>time() + 60*60 // Expire dans 1h
    ];
    try{
        return JWT :: encode($payload,$secret_key,"HS256");
    } catch (\Throwable $th) {
        throw $th;
    }

}

// $token = generateToken($secret_key,$email);

// Fonction pour valider et décoder un token JWT
//passamos $token como parametro
function validate_token(string $token, string $secret_key){
    //passamos a senha como global
    //aplicamos a funçao para decodar oq tinha sido codificado, com a mesma criptografia, headers so é util se ele foi aplicado antes
    return JWT::decode(
        $token, new Key($secret_key,'HS256'), $headers
    );
}

// $decode =  validate_token($token);
// echo "<pre>";
// var_dump($decode); 
// echo "</pre>"; 

// Exemple d'utilisation : Authentification et génération du token

// Exemple d'utilisation : Validation du token et accès à l'API

?>

