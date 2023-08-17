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
		}

}
include("vues/v_pied.php") ;


?>
