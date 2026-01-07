<?php
session_start();
require("../metier/DB_connector.php");
require("../metier/User.php");
require("../Dao/UserDao.php");

// On récupère et test l'existence des variables de connexion via POST
if (isset($_POST['idUtil']) && isset($_POST['mdpUtil'])) {

    // Accès à la BDD
    $cnx = new DB_Connector();
    $jeton = $cnx->openConnexion();

    $userManager = new UserDao($jeton);
    
    // Nettoyage basique des entrées
    $userId = htmlspecialchars($_POST['idUtil']);
    $mdp = $_POST['mdpUtil'];
  
    // Vérification de l'utilisateur (le mot de passe est haché avant envoi au DAO)
    $jetonExistance = $userManager->userExist($userId, MD5($mdp));
    
    if ($jetonExistance) {
          $_SESSION['id'] = $userId;
          
          // Récupération du rôle si nécessaire (admin ou user) pour la session
          // Note : Le code original ne gérait pas proprement le rôle ici, 
          // mais l'espace admin vérifie $_SESSION['role'] != "admin".
          // Idéalement, il faudrait récupérer l'objet User complet ici.
         
      $cnx->closeConnexion();
      header('Location:../index.php');
    } else {
      $_SESSION['errCnx'] = "La combinaison nom d'utilisateur/mot de passe est incorrecte"; 
      $cnx->closeConnexion();
      header('Location:../connexion.php');  
    }
} else {
    // Si tentative d'accès direct sans POST
    header('Location:../connexion.php');
}
?>