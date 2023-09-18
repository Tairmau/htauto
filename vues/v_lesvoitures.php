<section>
    <div class="voitures">
    <?php
            $pdo = PdoHtAuto::getPdoHtAuto();

            $tri = isset($_REQUEST['tri']) ? $_REQUEST['tri'] : 'allproducts';
            
            if($tri == 'allproducts'){
                $lesvoitures = $pdo->getLesProduits();
            }
            elseif($tri == 'prixcroissant'){
                $lesvoitures = $pdo->getLesPrixCroissant();
            }
            elseif($tri == 'prixdecroissant'){
                $lesvoitures = $pdo->getLesPrixPasCroissant();
            }
            //Récent
            elseif($tri == 'annee'){
                $lesvoitures = $pdo->getLesProduitParAnnee();
            }
            elseif($tri == 'search'){
                $search = isset($_POST['search']) ? $_POST['search'] : '';
                $lesvoitures = $pdo->getLesProduitsBySearch($search);
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
        <?php if(isset($_SESSION['login'])): ?>
            <form action="index.php?uc=reservation&id=<?php echo $lavoiture['id'];?>" method="POST">
        <?php else: ?>
            <form action="index.php?uc=connexion" method="POST">
        <?php endif; ?>
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
            </div>
        </form>
    </div>
    <?php
        }
    ?>
    </div>
    <div class="space"></div>
</section>
