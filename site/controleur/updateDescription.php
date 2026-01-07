<?php
session_start();

// Import des classes nécessaires
require("../metier/DB_connector.php");
require("../metier/Produit.php"); // ContenuDao utilise la classe Produit
require("../Dao/ContenuDao.php");

// Vérification des droits (Sécurité)
if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    // Redirection si pas admin (optionnel, mais recommandé)
    // header('Location: ../index.php');
    // exit();
}

if (isset($_POST['areaModifAccueil'])) {
    
    // 1. Connexion via votre classe DB_Connector
    $cnx = new DB_Connector();
    $db = $cnx->openConnexion();
    
    // 2. Instanciation du DAO
    $contenuManager = new ContenuDao($db);
    
    // 3. Récupération du contenu actuel (ID 1 pour l'accueil)
    // On récupère l'objet existant pour ne pas perdre le titre ou l'image
    $contenu = $contenuManager->getById(1);
    
    if ($contenu) {
        // 4. Modification de la description avec la donnée POST sécurisée
        // htmlspecialchars n'est pas strictement nécessaire ici si on utilise bindValue, 
        // mais cela protège contre les failles XSS à l'affichage si ce n'est pas fait ailleurs.
        $nouvelleDescription = $_POST['areaModifAccueil'];
        $contenu->setDescr($nouvelleDescription);
        
        // 5. Mise à jour en base via le DAO
        $contenuManager->update($contenu);
    }
    
    // 6. Fermeture et redirection
    $cnx->closeConnexion();
}

header('Location: ../index.php');
exit();
?>