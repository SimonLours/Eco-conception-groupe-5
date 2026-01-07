<?php
session_start();
$pageTitle = "Vidéo - Scierie Gineste";
?>

<?php require_once 'includes/header.php'; ?>

<div style="text-align: center; margin-top: 20px;">
    <h1>Notre Scierie en vidéo</h1>
    <iframe 
        width="560" 
        height="315" 
        src="https://www.youtube.com/embed/dbHXPnhCicI" 
        title="Présentation Scierie" 
        frameborder="0" 
        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
    </iframe>
</div>

<?php require_once 'includes/footer.php'; ?>