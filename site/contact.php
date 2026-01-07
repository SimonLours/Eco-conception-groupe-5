<?php
session_start();
$pageTitle = "Contact - Scierie Gineste";
?>

<?php require_once 'includes/header.php'; ?>

<div class="contactContainer">
    <div class="rightContainer">
        <div class="email">
            <h2>EMAIL</h2>
            <p>scierie.gineste@wanadoo.fr</p>
        </div>

        <div class="telephone">
            <h2>TELEPHONE</h2>
            <p>+33 9 70 35 54 09</p>
        </div>

        <div class="adresse">
            <h2>ADRESSE</h2>
            <ul>
                <li>Route de Rodez</li>
                <li>12220 MONTBAZENS</li>
            </ul>
        </div>
        
        <div class="reseauxSociaux">
            <h2>NOUS SUIVRE</h2>
            <p><a href="https://www.facebook.com/Scierie-du-Fargal-613509152159633/" target="_blank">Page Facebook</a></p>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>