<?php
session_start();
require("../metier/DB_connector.php");
require("../metier/User.php");
require("../Dao/UserDao.php");

$response = ['success' => false, 'message' => 'Erreur inconnue'];

if (isset($_POST['idUtilCreation']) && isset($_POST['pwdCreation']) && isset($_POST['pwdBis'])) {

    $cnx = new DB_Connector();
    $jeton = $cnx->openConnexion();
    $userManager = new UserDao($jeton);

    $id = trim($_POST['idUtilCreation']);
    $pwd = trim($_POST['pwdCreation']);
    $pwdBis = trim($_POST['pwdBis']);
    
    $id = htmlspecialchars($id);

    if ($userManager->idExist($id)) {
         $response = ['success' => false, 'message' => "Cet identifiant est déjà utilisé"];
    } else {
        if ($pwd != $pwdBis) {
            $response = ['success' => false, 'message' => "Les mots de passe ne correspondent pas"];
        } else {
            $newUser = new User([
                'userId' => $id,
                'userPwd' => $pwd
            ]);
        
            if ($userManager->add($newUser)) {
                 $response = ['success' => true, 'message' => "Compte créé avec succès ! Connectez-vous."];
            } else {
                $response = ['success' => false, 'message' => "Erreur lors de la création du compte"];
            }
        }
    }
    $cnx->closeConnexion();
} else {
    $response = ['success' => false, 'message' => 'Données manquantes'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>