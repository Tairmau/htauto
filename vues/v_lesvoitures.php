<section>
    <div class="voitures">
    <?php
            $pdo = PdoHtAuto::getPdoHtAuto();
            $lesvoitures = $pdo->getLesProduits();

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
                        <p class="type"><?php echo $type ?></p>
                        <div class="down">
                            <p><?php echo $annee ?></p>
                            <p><?php echo $etat ?></p>
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