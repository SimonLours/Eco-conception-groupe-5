<?php
session_start();
$pageTitle = "Vidéo - Scierie Gineste";
?>

<?php require_once 'includes/header.php'; ?>

<div style="text-align: center; margin-top: 20px;">
    <h1>Notre Scierie en vidéo</h1>
    
    <div class="video-container" style="max-width: 600px; margin: 0 auto;">
        <a href="https://www.youtube.com/watch?v=dbHXPnhCicI" target="_blank" title="Regarder la vidéo">
            <img src="https://img.youtube.com/vi/dbHXPnhCicI/sddefault.jpg" 
                 alt="Aperçu vidéo présentation Scierie Gineste" 
                 style="width: 100%; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            <p style="margin-top: 10px; font-weight: bold; color: #54b454;">Cliquez pour regarder la présentation</p>
        </a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>