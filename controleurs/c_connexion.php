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


                if(!empty($nom) && !empty($prenom) && !empty($login) && !empty($mdp)){
                    $pdo->getRegister($nom,$prenom,$login,$mdp);
                }else{

                    $errormessage = 'veuillez remplir tout les champs';
                    header('Location: index.php?uc=beforeconnexion&error=' . urlencode($errormessage));
                    exit;
                }  

                break;
            }
        case'verifconnex':
            {

                $login = isset($_POST['login']) ? $_POST['login'] : '';
                $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : '';

                $count = $pdo->getVerifConnex($login,$mdp);
                
                $admin = $pdo->getVerifConnexAdmin($login,$mdp);

                if(!empty($login) && !empty($mdp)){

                    if($admin == 1){
                        $_SESSION['login'] = $login;
                        $_SESSION['mdp'] = $mdp;
    
                        header('Location: index.php?uc=accueil&tri=allproducts');
    
                    }else{
                        if($count == 1){
                            $_SESSION['login'] = $login;
                            $_SESSION['mdp'] = $mdp;
    
                            header('Location: index.php?uc=accueil&tri=allproducts');
                            include('vues/v_accueil.php');
                            exit;
        
                        }else{
                            header('Location: index.php?uc=connexion');
                            exit;
                        }
                    }
                }else{

                    $errormessage = 'veuillez remplir tout les champs';
                    header('Location: index.php?uc=connexion&error=' . urlencode($errormessage));
                    exit;
                }  



                break;
            }
        case'deconnexion':
            {
                //Detruire la session
                session_destroy();
                header('Location: index.php?uc=accueil&tri=allproducts');
                exit; 

            }
        case'compteupdate':
            {
                $newpass = isset($_POST['newpass']) ? $_POST['newpass'] : '';
                $login = $_SESSION['login'];
                $pdo->updatepass($login,$newpass);
                break;
            }
    }


?>
