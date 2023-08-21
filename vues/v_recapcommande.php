<section>
    <div class="voitures">
    <?php 
            $pdo = PdoHtAuto::getPdoHtAuto();
            $id = $_REQUEST['id'];
            $req="select * from produits where id = '$id'";

            $lesvoitures = $pdo->getLesProduits($req);


            foreach($lesvoitures as $lavoiture){
                $image = $lavoiture['image'];
                $modele = $lavoiture['modele'];
                $type = $lavoiture['type'];
                $annee = $lavoiture['annee'];
                $etat = $lavoiture['etat'];
                 $prix =$lavoiture['prix'];
        ?>
        <div class="voiture">
            <form action="">
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
                    <?php
                        if(isset($_SESSION['login'])){
                            $id = $lavoiture['id'];
                    ?>
                        <button type="submit"><a href="index.php?uc=reservation&id=<?php echo $id;?>">RESERVER</a></button>
                    <?php
                        }
                    ?>
            </form>
        </div>
        <?php
                break;

            }
        ?>
    </div>
    <div class="space"></div>
</section>