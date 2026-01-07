<?php
session_start();
$pageTitle = "Accueil - Scierie Gineste";
// Suppression de la variable $scriptSpecifique liée au slider
?>

<?php require_once 'includes/header.php'; ?>

<h1>Bienvenue à la Scierie Gineste</h1>

<div class="gallery-item">
    <img src="images/img3.jpg" alt="Vue extérieure de la scierie" loading="lazy" width="300" height="200">
</div>

<div class="contenu-accueil" id="accueil-container">
    <p style="text-align:center;">Chargement du contenu...</p>
</div>

<?php require_once 'includes/footer.php'; ?>