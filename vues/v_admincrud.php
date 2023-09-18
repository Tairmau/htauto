<div class="admincrud">
    <table>
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Photo</th>
                <th scope="col">Modèle</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <?php
                    $pdo = PdoHtAuto::getPdoHtAuto();

                    /*$tri = $_REQUEST['tri'] ?? 'prixdeCroissant';
                    
                    if($tri == 'allproducts'){
                        $lesvoitures = $pdo->getLesProduits();
                    }*/

                    $lesvoitures = $pdo->getLesProduits();
                    
                    foreach($lesvoitures as $lavoiture){
                        $id = $lavoiture['id'];
                        $image = $lavoiture['image'];
                        $modele = $lavoiture['modele'];
                        $type = $lavoiture['type'];
                        $annee = $lavoiture['annee'];
                        $etat = $lavoiture['etat'];
                        $prix =$lavoiture['prix'];
                ?>
        <tbody>
            <tr>

                <th scope="row"><?php echo $id ?></th>
                <th scope="row"><?php echo $image ?></th>
                <th scope="row"><?php echo $modele ?></th>
                <th scope="row"><?php echo $type ?> / <?php echo $annee ?> / <?php echo $etat ?></th>
                <th scope="row"><?php echo $prix ?> €</th>
                <th scope="row" class="action">
                    <a href="index.php?uc=admincrud&action=supprimerproduit&id=<?php echo $id;?>"><img src="../images/trash.png" alt=""></a>
                    <a href="index.php?uc=admincrud&action=productform&id=<?php echo $id;?>"><img src="../images/crayon.jpg" alt=""></a>
                </th>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
</div>