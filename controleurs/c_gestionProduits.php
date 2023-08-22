<?php

$pdo = PdoHtAuto::getPdoHtAuto();

if(!isset($_REQUEST['action']))
    $action = 'accueil';
else
    $action = $_REQUEST['action'];
    
switch($action)
    {     

        case'ajoutproduit';
            {
                $image = $_POST['photo'];
                $modele = $_POST['modele'];
                $type = $_POST['type'];
                $annee = $_POST['annee'];
                $etat = $_POST['etat'];
                $prix = $_POST['prix'];

                $pdo->getajoutproduit($image,$modele,$type,$annee,$etat,$prix);
                header('Location: index.php?uc=admincrud&tri=allproducts');
                break;
            }
        case'supprimerproduit';
            {
                
                $id = $_REQUEST['id'];
                $req = "delete from produits where id = $id";

                $pdo->supprimerProduit($req);
                header('Location: index.php?uc=admincrud&tri=allproducts');
                exit;
            }
        case'supprimerreservation';
            {
                $req="select * from reservation";
                $lareservation = $pdo->getLesProduits($req);
                $email = $lareservation[0]['email'];

                $id = $_REQUEST['id'];
                $req = "delete from reservation where idvoiture = $id and email = '$email'";

                $pdo->supprimerProduit($req);
                header('Location: index.php?uc=admincrudreservation&tri=allproducts');
                exit;
            }
        case'productform':
            {
                include('vues/v_modifproduit.php');
                break;
            }           
        case'modifproduit';
            {
                $id = $_REQUEST['id'];

                //$image = $_POST['photo'];

                $modele = $_POST['modele'];
                $type = $_POST['type'];
                $annee = $_POST['annee'];
                $etat = $_POST['etat'];
                $prix = $_POST['prix'];

                /*if(!empty($image))
                    {
                        $updates = "UPDATE produits SET image = '$image' WHERE id = $id";
                        $pdo->modifProduit($updates,$id);
                    }*/
                if(!empty($modele))
                    {
                        $updates = "UPDATE produits SET modele = '$modele' WHERE id = $id";
                        $pdo->modifProduit($updates,$id);
                    }
                if(!empty($type))
                    {
                        $updates = "UPDATE produits SET type = '$type' WHERE id = $id";
                        $pdo->modifProduit($updates,$id);
                    }
                if(!empty($annee))
                    {
                        $updates = "UPDATE produits SET annee = '$annee' WHERE id = $id";
                        $pdo->modifProduit($updates,$id);
                    }
                if(!empty($etat))
                    {
                        $updates = "UPDATE produits SET etat = '$etat' WHERE id = $id";
                        $pdo->modifProduit($updates,$id);
                    }
                if(!empty($prix))
                    {
                        $updates = "UPDATE produits SET prix = '$prix' WHERE id = $id";
                        $pdo->modifProduit($updates,$id);
                    }
                break;
            }
    }


?>
