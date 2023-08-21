<section>
    <div class="voitures">
    <?php
            $pdo = PdoHtAuto::getPdoHtAuto();
            $tri = $_REQUEST['tri']; 

            if($tri == 'allproducts'){
                $req="select * from produits";
                $lesvoitures = $pdo->getLesProduits($req);
            }
            if($tri == 'prixcroissant'){
                $req="SELECT * FROM `produits` ORDER BY prix ASC";
                $lesvoitures = $pdo->getLesProduits($req);
            }
            if($tri == 'prixdecroissant'){
                $req="SELECT * FROM `produits` ORDER BY prix DESC";
                $lesvoitures = $pdo->getLesProduits($req);
            }
            if($tri == 'annee'){
                $req="SELECT * FROM `produits` ORDER BY annee DESC";
                $lesvoitures = $pdo->getLesProduits($req);
            }


            foreach($lesvoitures as $lavoiture){
                $image = $lavoiture['image'];
                $modele = $lavoiture['modele'];
                $type = $lavoiture['type'];
                $annee = $lavoiture['annee'];
                $etat = $lavoiture['etat'];
                $prix =$lavoiture['prix'];
        ?>
        <div class="voiture">
            <?php
                if(isset($_SESSION['login'])){
                    $id = $lavoiture['id'];
            ?>
            <form action="index.php?uc=reservation&id=<?php echo $id;?>" method="POST">
            <?php

                }else{
                    ?>
                    <form action="index.php?uc=connexion" method="POST">


                <?php
                }
                ?>
                <div class="left">
                    <img src="../images/<?php echo $image ?>" alt="">
                </div>
                <div class="right">
                    <div class="up">
                        <h1><?php echo $modele ?></h1>
                        <p class="type">Modèle : <?php echo $type ?></p>
                        <div class="down">
                            <p>Année : <?php echo $annee ?></p>
                            <p>Etat : <?php echo $etat ?></p>
                        </div>
                        <h1><?php echo $prix ?> €</h1>
                    </div>
                    <button type="submit">RESERVER</button>
            </form>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="space"></div>
</section>