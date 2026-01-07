<?php
session_start();
$pageTitle = "Nos Produits - Scierie Gineste";
$scriptSpecifique = "scripts/initListeProduits.js";
?>

<?php require_once 'includes/header.php'; ?>

<h1>Nos Produits</h1>
<div id="container">
    <p>Chargement des produits...</p>
</div>

<?php require_once 'includes/footer.php'; ?>