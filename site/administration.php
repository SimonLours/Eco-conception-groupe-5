<?php
session_start();
// Vérification stricte des droits
if ((!isset($_SESSION['id']) || empty($_SESSION['id'])) && (isset($_SESSION['role']) && $_SESSION['role'] != "admin")) {
	header("Location:connexion.php");
	exit();
}

$pageTitle = "Administration - Scierie Gineste";
// Scripts pour les select dynamiques
$scriptSpecifique = "scripts/initSelectModifProduit.js"; 
// Note: Il y a plusieurs scripts JS ici, idéalement il faudrait les combiner.
// Pour l'instant, on laisse comme ça, mais footer.php ne gère qu'un script. 
// On peut ajouter les autres manuellement avant le footer si besoin, ou combiner.
?>

<?php require_once 'includes/header.php'; ?>

<h1>Administration</h1>

<div class="row">
    <div class="containerAjoutProduit col-90">
        <h3>Ajout d'un nouveau produit</h3>
        <span class="reussite"><?= isset($_SESSION['msgAddOk']) ? $_SESSION['msgAddOk'] : '' ?></span>
        <span class="err"><?= isset($_SESSION['msgAddNok']) ? $_SESSION['msgAddNok'] : '' ?></span>
        <?php $_SESSION['msgAddOk'] = $_SESSION['msgAddNok'] = ""; ?>

        <form id="formAjoutProduit" action="" method="post">
            <div class="row">
				<div class="col-40"><label for="lbProduit">Titre</label></div>
				<div class="col-40"><input type="text" id="lbProduit" name="lbProduit" required/></div>
			</div>
            <div class="row">
				<div class="col-40"><label for="lbDescr">Description</label></div>
				<div class="col-40"><input type="text" id="lbDescr" name="lbDescr" required/></div>
			</div>
            <div class="row">
				<div class="col-40"><label for="lbImg">Image</label></div>
				<div class="col-40"><input type="text" id="lbImg" name="lbImg" required/></div>
			</div>
			<div class="row"><input id="btnAjoutProduit" type="button" value="Ajouter"></div>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>