<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle : 'Scierie Gineste' ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="toggle">
        <span class="menu-icon" style="font-size:30px;cursor:pointer;color:white;">&#9776;</span>
    </div>
    
    <ul class="nav-links">
        <li class="nav-item"><a href="index.php">ACCUEIL</a></li>
        <li class="nav-item"><a href="produits.php">LES PRODUITS</a></li>
        <li class="nav-item"><a href="video.php">VIDEO</a></li>
        <li class="nav-item"><a href="contact.php">NOUS CONTACTER</a></li>
        
        <?php if (isset($_SESSION['id'])): ?>
            <li class="nav-item"><a href="administration.php">ADMINISTRATION</a></li>
            <li class="nav-item"><a href="deconnexion.php">DECONNEXION</a></li>
        <?php else: ?>
            <li class="nav-item"><a href="connexion.php">CONNEXION</a></li>
        <?php endif; ?>
    </ul>

    <div class="brand-logo" style="color:white; font-weight:bold; margin-right:10px;">
        SCIERIE GINESTE
    </div>
</nav>
<main id="main-content">