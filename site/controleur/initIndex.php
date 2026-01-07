<?php
// initIndex.php - Version optimisée GreenIT
// error_reporting(0); 

require("../metier/DB_connector.php");
require("../metier/Produit.php"); 
require("../Dao/ContenuDao.php");

$cnx = new DB_Connector();
$jeton = $cnx->openConnexion();

$contenuManager = new ContenuDao($jeton);
$contenus = $contenuManager->getList();

foreach ($contenus as $contenu) {
    echo "<ul class='main-list'>";
    
    if($contenu->getTitre() != '') {
        echo "<li class='main-item'><p class='titre'>".htmlspecialchars($contenu->getTitre())."</p></li>";
    }
    
    if($contenu->getDescr() != '' && $contenu->getImg() != ''){
        echo "<li class ='main-item'><ul class ='sub-list'>";
        echo "<li class='sub-item'><p class='texte'>".htmlspecialchars($contenu->getDescr())."</p></li>";
        echo "<li class='sub-item'><img class='image' loading='lazy' width='300' height='200' src='images/".htmlspecialchars($contenu->getImg())."' alt='Image de présentation'></li>";
        echo "</ul></li>";
    } else {
        if($contenu->getDescr() != ''){
            echo "<li class='main-item'><p class='texte'>".htmlspecialchars($contenu->getDescr())."</p></li>";
        }
        if($contenu->getImg() != ''){
             // Même optimisation ici
            echo "<li class='main-item'><img class='image' loading='lazy' width='300' height='200' src='images/".htmlspecialchars($contenu->getImg())."' alt='Image de présentation'></li>";
        }
    }
    echo "</ul>";
}
?>