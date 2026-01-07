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
        <span class="menu-icon menu-icon-style">&#9776;</span>
    </div>
    
    <div class="nav-links">
        <a class="nav-item" href="index.php">ACCUEIL</a>
        <a class="nav-item" href="produits.php">LES PRODUITS</a>
        <a class="nav-item" href="video.php">VIDEO</a>
        <a class="nav-item" href="contact.php">NOUS CONTACTER</a>
        
        <?php if (isset($_SESSION['id'])): ?>
            <a class="nav-item" href="administration.php">ADMINISTRATION</a>
            <a class="nav-item" href="deconnexion.php">DECONNEXION</a>
        <?php else: ?>
            <a class="nav-item" href="connexion.php">CONNEXION</a>
        <?php endif; ?>
    </div>

    <div class="brand-logo brand-logo-style">
        SCIERIE GINESTE
    </div>
</nav>
<main id="main-content">