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
	public function getRegister($nom,$prenom,$login,$mdp)
	{
		$req1="INSERT INTO register(nom,prenom,identifiant,mdp) VALUES ('$nom','$prenom','$login','$mdp');";
		$req2="INSERT INTO connexion(identifiant,mdp,roleUser) VALUES ('$login','$mdp','User');";

		$res1= PdoHtAuto::$monPdo->prepare($req1);
		$res2= PdoHtAuto::$monPdo->prepare($req2);

		$res1->execute();
		$res2->execute();

	}

	public function getLesProduits()
		{
			$req="select * from produits";
			$res= PdoHtAuto::$monPdo->prepare($req);
			$res->execute();

			$lesLignes = $res->fetchAll();
			return $lesLignes; 
		}




		public function supprimerProduit($unIdProduit)
        {
            $req = "delete from produits where id = $unIdProduit";
			//var_dump($req);
			PdoHtAuto::$monPdo->exec($req);
        }
        public function nouveauProduit($image, $modele, $marque, $description, $prix)
        {
			//include("vues/v_ajoutervoitures.php");
			

			$req = "INSERT INTO produits (image, modele, marque, description, prix)
        	VALUES ('$image', '$modele', '$marque', '$description', '$prix')";
			
			PdoHtAuto::$monPdo->exec($req);
        }
        public function modifProduit($description, $prix, $image, $type)
        {
            /*A Compléter*/
        }



}
?>
