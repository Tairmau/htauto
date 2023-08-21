<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application HtAuto (adaptation du cas lafleur)
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoHtAuto
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=htAuto';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoHtAuto = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoHtAuto::$monPdo = new PDO(PdoHtAuto::$serveur.';'.PdoHtAuto::$bdd, PdoHtAuto::$user, PdoHtAuto::$mdp); 
			PdoHtAuto::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoHtAuto::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoHtAuto = PdoHtAuto::getPdoHtAuto();
 * @return l'unique objet de la classe PdoHtAuto
 */
	public  static function getPdoHtAuto()
	{
		if(PdoHtAuto::$monPdoHtAuto == null)
		{
			PdoHtAuto::$monPdoHtAuto=new PdoHtAuto();
		}
		return PdoHtAuto::$monPdoHtAuto;  
	}
/**
 * Retourne toutes les catégories sous forme d'un tableau associatif
 *
 * @return le tableau associatif des catégories 
*/

	public function getVerifConnex($login,$mdp)
	{
		$req="SELECT COUNT(*) FROM connexion WHERE identifiant ='$login' AND mdp = '$mdp';";
		$res= PdoHtAuto::$monPdo->prepare($req);
		$res->execute();
		
		$count = $res->fetchcolumn();
		return $count;
	}
	public function getVerifConnexAdmin($login,$mdp)
	{
		$req="SELECT COUNT(*) FROM connexion WHERE identifiant ='$login' AND mdp = '$mdp' AND roleUser = 'Admin';";
		$res= PdoHtAuto::$monPdo->prepare($req);
		$res->execute();
		
		$count = $res->fetchcolumn();
		return $count;
	}
	public function getrole($login)
	{
		$req="SELECT roleUser FROM connexion WHERE identifiant ='$login'";
		$res= PdoHtAuto::$monPdo->prepare($req);
		$res->execute();
		
		$role = $res->fetchcolumn();
		return $role;
	}
	public function updatepass($login,$newpass)
	{
		$req="UPDATE connexion SET mdp = '$newpass' WHERE identifiant = '$login'";
		$res= PdoHtAuto::$monPdo->prepare($req);
		$res->execute();
	}
	public function getRegister($nom,$prenom,$login,$mdp)
	{
		$req1="INSERT INTO register(nom,prenom,identifiant,mdp) VALUES ('$nom','$prenom','$login','$mdp');";
		$req2="INSERT INTO connexion(identifiant,mdp,roleUser) VALUES ('$login','$mdp','User');";

		$res1= PdoHtAuto::$monPdo->prepare($req1);
		$res2= PdoHtAuto::$monPdo->prepare($req2);

		$res1->execute();
		$res2->execute();

	}
	public function getLesProduits($req)
	{
		$res= PdoHtAuto::$monPdo->prepare($req);
		$res->execute();

		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}

	public function getajoutproduit($image,$modele,$type,$annee,$etat,$prix)
	{
		$req="INSERT INTO produits(image,modele,type,annee,etat,prix) VALUES ('$image','$modele','$type','$annee','$etat','$prix');";
		$res= PdoHtAuto::$monPdo->prepare($req);
		$res->execute();

	}

	public function supprimerProduit($id)
        {
            $req = "delete from produits where id = $id";
			$res= PdoHtAuto::$monPdo->prepare($req);
			$res->execute();
        }
    public function modifProduit($updates,$id)
        {
			$res= PdoHtAuto::$monPdo->prepare($updates);
			$res->execute();
        }
	public function addEmail($email,$login)
        {
			$req="UPDATE connexion SET email = '$email' WHERE identifiant = '$login';";
			$res= PdoHtAuto::$monPdo->prepare($req);
			$res->execute();
        }
}
?>
