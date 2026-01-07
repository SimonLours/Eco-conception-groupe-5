<?php
session_start();
$pageTitle = "Connexion - Scierie Gineste";
?>

<?php require_once 'includes/header.php'; ?>

<div class="forms">
    <ul class="onglets">
        <li class="onglet active"><a href="#login">Connexion</a></li>
        <li class="onglet"><a href="#sinscrire">Inscription</a></li>
    </ul>

    <form action="controleur/traitementFormConnexion.php" method="POST" id="login">
        <h1>Connexion</h1>
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

    <form action="controleur/traitementFormInscription.php" id="sinscrire" method="POST" style="display:none;">
        <h1>S'inscrire</h1>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const onglets = document.querySelectorAll('.onglet a');
        onglets.forEach(onglet => {
            onglet.addEventListener('click', function(e) {
                e.preventDefault();
                // Gestion classes actives
                document.querySelectorAll('.onglet').forEach(li => li.classList.remove('active'));
                this.parentElement.classList.add('active');
                
                // Gestion affichage formulaires
                const targetId = this.getAttribute('href').substring(1);
                document.getElementById('login').style.display = 'none';
                document.getElementById('sinscrire').style.display = 'none';
                document.getElementById(targetId).style.display = 'block';
            });
        });
    });
</script>

<?php require_once 'includes/footer.php'; ?>