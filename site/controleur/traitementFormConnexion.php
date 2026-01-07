<?php
session_start();
require("../metier/DB_connector.php");
require("../metier/User.php");
require("../Dao/UserDao.php");

// Initialisation de la réponse JSON par défaut
$response = ['success' => false, 'message' => 'Erreur inconnue'];

if (isset($_POST['idUtil']) && isset($_POST['mdpUtil'])) {

    $cnx = new DB_Connector();
    $jeton = $cnx->openConnexion();
    $userManager = new UserDao($jeton);
    
    $userId = htmlspecialchars($_POST['idUtil']);
    $mdp = $_POST['mdpUtil'];
  
    // Vérification
    $userExist = $userManager->userExist($userId, MD5($mdp));
    
    if ($userExist) {
        $_SESSION['id'] = $userId;
        // Ici, on pourrait récupérer le rôle si besoin
        
        $response = ['success' => true, 'message' => 'Connexion réussie'];
    } else {
        $response = ['success' => false, 'message' => "Identifiant ou mot de passe incorrect"];
    }
    
    $cnx->closeConnexion();
} else {
    $response = ['success' => false, 'message' => 'Données manquantes'];
}

// Envoi de la réponse JSON pour le JS
header('Content-Type: application/json');
echo json_encode($response);
?>