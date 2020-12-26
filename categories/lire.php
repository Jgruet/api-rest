<?php
// Headers requis
header("Access-Control-Allow-Origin: *"); // l'* ouvre l'acces à l'API à toutes les sources
header("Content-Type: application/json; charset=UTF-8"); // on envoie une réponse en JSON (contrainte norme REST)
header("Access-Control-Allow-Methods: GET"); // méthode acceptée (lecture = get)
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// On vérifie que la méthode utilisée est correcte grâce a la superglobale $_SERVER
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On inclut les fichiers de configuration et d'accès aux données
    include_once '../config/Database.php';
    include_once '../models/Categories.php';

    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnection();

    // On instancie les categories
    $categorie = new Categories($db);

    // On récupère les données (stmt = statement)
    $stmt = $categorie->lire();

    // On vérifie si on a au moins 1 categorie
    if($stmt->rowCount() > 0){
        // On initialise un tableau associatif
        $tableauCategories = [];
        $tableauCategories['categories'] = [];

        // On parcourt les categories
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $cat = [
                "id" => $id,
                "nom" => $nom,
                "description" => $description,
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ];

            $tableauCategories['categories'][] = $cat;
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($tableauCategories);
    }

}else{
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}