<?php
/**
 * Gestionnaire de la classe user
 */
class UserDao {
	
	/** Instance de PDO pour se connecter à la BD */
	private $_db;
	
	/**
	 * Connexion à la BDD
	 */
	public function __construct($db) {
        $this->setDb($db);
    }
     
	/**
	 * Recherche d'un utilisateur en se basant sur le couple ident/mdp
     * Sécurisé contre les injections SQL
	 */
    public function userExist($userId, $userPwd) {
        // Utilisation de requêtes préparées (le ? remplace la variable directe)
		$rqt = $this->_db->prepare("SELECT userId FROM user WHERE userId = ? AND userPwd = ?");
		$rqt->execute(array($userId, $userPwd));

		if ($donnees = $rqt->fetch()) {  
		    return true;
		} else {
			return false;
		}
    }
	
	/**
	 * Recherche de l'existence d'un id
     * Sécurisé contre les injections SQL
	 */
    public function idExist($userId) {
		$rqt = $this->_db->prepare("SELECT userId FROM user WHERE userId = ?");
		$rqt->execute(array($userId));

		if ($donnees = $rqt->fetch()) {  
		    return true;
		} else {
			return false;
		}   
    }
    
	
   /** * Récupération de tous les users de la BDD
    */
    public function getList() {
        $users = [];
        $compteur = 0; // Initialisation du compteur manquante dans le code original
        
        $rqt = $this->_db->prepare('SELECT * FROM user');
        $rqt->execute();
	
        while ($donnees = $rqt->fetch()) {
            $users[$compteur] = new User($donnees); // Attention: Assurez-vous que la classe User est bien incluse là où getList est appelé
		    $compteur++;
        }
        return $users;
    }
    
    /**
     * Récupération d'un user spécifique (Ajout utile pour la cohérence)
     */
    public function get($userId) {
        $rqt = $this->_db->prepare("SELECT * FROM user WHERE userId = ?");
        $rqt->execute(array($userId));

        if ($donnees = $rqt->fetch()) {
            return new User($donnees);
        }
        return null;
    }
	
     
	/**
	 * Ajout d'un nouvel utilisateur à la BDD
     * Sécurisé contre les injections SQL
	 */
   public function add($user) {
		$rqt = $this->_db->prepare('INSERT INTO user(userId, userPwd) VALUES(?, ?)');
        // On passe les valeurs via bindValue ou directement dans execute
		$rqt->bindValue(1, $user->getUserId());
		$rqt->bindValue(2, $user->getUserPwd());

    	return $rqt->execute(); // Retourne true si succès, false sinon
	}
    
    /**
     * Mise à jour d'un utilisateur (nécessaire pour la page Mon Compte)
     */
    public function update($user) {
        // Note: La structure de la table user semble minimale (userId, userPwd), 
        // mais le code User.php a d'autres champs (Nom, Prenom...). 
        // Si la table SQL a ces colonnes, il faudrait compléter la requête ici.
        // Pour l'instant, on sécurise l'existant.
        
        $rqt = $this->_db->prepare('UPDATE user SET userPwd = ? WHERE userId = ?');
        $rqt->bindValue(1, $user->getUserPwd());
        $rqt->bindValue(2, $user->getUserId());
        
        return $rqt->execute();
    }
  
    /**
	 * Modifieur sur l'instance pdo de connexion 
	 */
     public function setDb(PDO $db) {
        $this->_db = $db;
    }
	
}
?>