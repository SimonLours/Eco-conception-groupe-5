<?php
session_start();
require("../metier/DB_connector.php");
require("../metier/Produit.php");
require("../Dao/ProduitDao.php");

$cnx = new DB_connector();
$jeton = $cnx->openConnexion();

$produitManager = new ProduitDao($jeton);
$produits = $produitManager->getList();

for ($i = 0; $i < count($produits); $i++) {
	$produit = "<ul class='main-list'>";
	$produit .= "<li class='main-item'><p class='titre'>".htmlspecialchars($produits[$i]->getTitre())."</p></li>";
	$produit .= "<li class ='main-item'><ul class ='sub-list'>";
	$produit .= "<li class='sub-item'><p class='texte'>".htmlspecialchars($produits[$i]->getDescr())."</p></li>";
	$produit .= "<li class='sub-item'><img class='image' loading='lazy' width='150' height='100' src='images/".htmlspecialchars($produits[$i]->getImg())."' alt='".htmlspecialchars($produits[$i]->getTitre())."'></li>";		
	$produit .= "</ul></li></ul>";
	echo $produit;
}
?>