<?php
session_start();
require("../metier/DB_connector.php");
require("../metier/User.php");
require("../Dao/UserDao.php");

// Vérification des variables en POST
if (isset($_POST['idUtilCreation']) && isset($_POST['pwdCreation']) && isset($_POST['pwdBis'])) {

    $cnx = new DB_Connector();
    $jeton = $cnx->openConnexion();

    $userManager = new UserDao($jeton);

	$id = trim($_POST['idUtilCreation']);
	$pwd = trim($_POST['pwdCreation']);
	$pwdBis = trim($_POST['pwdBis']);
    
    // Sécurisation basique
    $id = htmlspecialchars($id);

	if (($userManager->idExist($id))) {
		 $_SESSION['errId'] = "Cet identifiant est déjà utilisé";	
		 $cnx->closeConnexion();
		 header('Location:../connexion.php#sinscrire'); // Ancre pour revenir sur l'onglet inscription
	} else {
		if ($pwd != $pwdBis) {
			$_SESSION['errMdp'] = "Mots de passe non identiques";	
			$cnx->closeConnexion();
			header('Location:../connexion.php#sinscrire');
			
		} else {
			$newUser = new User([
				'userId' => $id,
				'userPwd' => $pwd
			]);
		
			if ($userManager->add($newUser)) {
				 $_SESSION['creationOk'] = "Nouvel utilisateur créé";
				 $cnx->closeConnexion();
				 header('Location:../connexion.php');
			} else {
				$_SESSION['creationNok'] = "Utilisateur non créé";
				$cnx->closeConnexion();
				header('Location:../connexion.php');
			}
		}
	}
} else {
    header('Location:../connexion.php');
}
?>