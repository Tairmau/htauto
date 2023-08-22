<div class="admincrud">
    <table>
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Email</th>
                <th scope="col">Modele</th>
                <th scope="col">Descriptions</th>
                <th scope="col">Date</th>
                <th scope="col">Heure</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <?php
                    $pdo = PdoHtAuto::getPdoHtAuto();

                    $tri = $_GET['tri'];
                    
                    if($tri == 'allproducts'){
                        $req="select * from reservation";
                        $lesvoitures = $pdo->getLesProduits($req);
                    }

                    $lesvoitures = $pdo->getLesProduits($req);
                    
                    foreach($lesvoitures as $lavoiture){
                        $id = $lavoiture['idvoiture'];
                        $modele = $lavoiture['modele'];
                        $type = $lavoiture['type'];
                        $annee = $lavoiture['annee'];
                        $email = $lavoiture['email'];
                        $date = $lavoiture['date'];
                        $heure = $lavoiture['heure'];

                ?>
        <tbody>
            <tr>
                <th scope="row"><?php echo $id ?></th>
                <th scope="row"><?php echo $email ?></th>
                <th scope="row"><?php echo $modele ?></th>
                <th scope="row"><?php echo $type ?> / <?php echo $annee ?></th>
                <th scope="row"><?php echo $date ?></th>
                <th scope="row"><?php echo $heure ?></th>

                <th scope="row" class="action">
                    <a href="index.php?uc=admincrudreservation&action=supprimerreservation&id=<?php echo $id;?>"><img src="../images/trash.png" alt=""></a>
                </th>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
</div>