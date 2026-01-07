<?php
session_start();
$pageTitle = "Espace Membre - Scierie Gineste";
?>

<?php require_once 'includes/header.php'; ?>

<h1>Espace Membre</h1>

<div class="forms-container" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">

    <div class="forms">
        <form action="controleur/traitementFormConnexion.php" method="POST" id="login">
            <h2>Connexion</h2>
            <span class="err">
                <?= isset($_SESSION['errCnx']) ? $_SESSION['errCnx'] : '' ?>
                <?= isset($_SESSION['creationOk']) ? $_SESSION['creationOk'] : '' ?>
                <?= isset($_SESSION['creationNok']) ? $_SESSION['creationNok'] : '' ?>
                <?php $_SESSION['errCnx'] = $_SESSION['creationOk'] = $_SESSION['creationNok'] = ""; ?>
            </span>
            
            <div class="input-field">
                <label for="idUtil">Identifiant</label>
                <input type="text" placeholder="Nom d'utilisateur" name="idUtil" id="idUtil" required>
                
                <label for="mdpUtil">Mot de Passe</label> 
                <input type="password" placeholder="Mot de passe" name="mdpUtil" id="mdpUtil" required>
                
                <input type="submit" value="Se connecter" class="button">
            </div>
        </form>
    </div>

    <div class="forms">
        <form action="controleur/traitementFormInscription.php" id="sinscrire" method="POST">
            <h2>S'inscrire</h2>
            <span class="err">
                <?= isset($_SESSION['errMdp']) ? $_SESSION['errMdp'] : '' ?>
                <?= isset($_SESSION['errId']) ? $_SESSION['errId'] : '' ?>
                <?php $_SESSION['errMdp'] = $_SESSION['errId'] = ""; ?>
            </span>
            
            <div class="input-field">
                <label for="idUtilCreation">Identifiant</label> 
                <input type="text" placeholder="Choisir un identifiant" name="idUtilCreation" id="idUtilCreation" required>

                <label for="pwdCreation">Mot de Passe</label> 
                <input type="password" placeholder="Choisir un mot de passe" name="pwdCreation" id="pwdCreation" required>

                <label for="pwdBis">Confirmez le Mot de Passe</label> 
                <input type="password" placeholder="Ressaisir le mot de passe" name="pwdBis" id="pwdBis" required>
                
                <input type="submit" value="S'inscrire" class="button" />
            </div>
        </form>
    </div>

</div>

<?php require_once 'includes/footer.php'; ?>