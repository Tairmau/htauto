<?php
$pdo = PdoHtAuto::getPdoHtAuto();

if(!isset($_REQUEST['action']))
    $action = 'accueil';
else
    $action = $_REQUEST['action'];

switch($action)
    {     

        case'register':
            {

                $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
                $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
                $login = isset($_POST['login']) ? $_POST['login'] : '';
                $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : '';

                $pdo->getRegister($nom,$prenom,$login,$mdp);

                break;
            }
        case'verifconnex':
            {

                $login = isset($_POST['login']) ? $_POST['login'] : '';
                $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : '';

                $count = $pdo->getVerifConnex($login,$mdp);
                
                $admin = $pdo->getVerifConnexAdmin($login,$mdp);
                if($admin == 1){
                    $_SESSION['login'] = $login;

                    header('Location: index.php?uc=admincrud');

                }else{
                    if($count == 1){
                        $_SESSION['login'] = $login;
                        header('Location: index.php?uc=accueil');
                        include('vues/v_accueil.php');
                        exit;
    
                    }else{
                        header('Location: index.php?uc=connexion');
                        exit;
                    }
                }

                break;
            }
        case'deconnexion':
            {
                //Detruire la session
                session_destroy();
                header('Location: index.php?uc=accueil');
                exit; 

            }

    }


?>
