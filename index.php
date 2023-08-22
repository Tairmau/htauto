<?php
session_start();
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;
require_once("util/class.PDO.HTAuto.inc.php");


$pdo = PdoHtAuto::getPdoHtAuto();

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];


switch($uc)
{
	case 'accueil':
		{
			include('vues/v_accueil.php');
			include('vues/v_tri.php');
			include('vues/v_lesvoitures.php');


			break;
		}
	case 'connexion':
		{
			include('vues/v_connexion.php');
			include('controleurs/c_connexion.php');

			break;
		}
	case 'beforeconnexion';
		{
			include('vues/v_register.php');
			include('controleurs/c_connexion.php');

			break;
		}

	case 'admincrud':
		{
			include('vues/v_ajoutproduit.php');
			include('controleurs/c_gestionProduits.php');
			include('vues/v_admincrud.php');
			break;
		}
	case 'admincrudreservation':
		{
			include('controleurs/c_gestionProduits.php');
			include('vues/v_admincrudreservation.php');
			break;
		}
	case'accountinfo':
		{
			include('controleurs/c_connexion.php');
			include('vues/v_compte.php');
			break;

		}
    case'reservation':
		{
			include('controleurs/c_sendmail.php');
			include('vues/v_recapcommande.php');
			include('vues/v_avantlenvoie.php');
			break;

		}
	case'merci':
		{
			include('controleurs/c_gotoadmincrud.php');
			break;

		}
}
include("vues/v_pied.php") ;


?>
