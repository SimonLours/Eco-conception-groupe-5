<?php
session_start();
$pageTitle = "Accueil - Scierie Gineste";
// On définit le script spécifique à cette page
$scriptSpecifique = "scripts/slider.js"; 
?>

<?php require_once 'includes/header.php'; ?>

<section id="slider-section">
    <?php include "includes/slider.php"; ?>
</section>

<div class="contenu-accueil" id="accueil-container">
    <p style="text-align:center;">Chargement du contenu...</p>
</div>

<?php require_once 'includes/footer.php'; ?>