<div class="modifier">
    <div class="ajoutproduit">
        <?php 
            $pdo = PdoHtAuto::getPdoHtAuto();
            $lesvoitures = $pdo->getLesProduits();
                    
            foreach($lesvoitures as $lavoiture){
            $id = $lavoiture['id'];
            ?>

        <form action="index.php?uc=admincrud&action=modifproduit&id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
        <?php
            }
        ?>
            <label for="photo"><img src="../images/photo.png" alt=""><p>Choississez un fichier</p></label>
            <input type="file" name="photo" id="photo" placeholder="" class="file">
            <input type="text" name="modele" id="modele" placeholder="Modele">
            <input type="text" name="type" id="type" placeholder="Type">
            <input type="text" name="annee" id="annee" placeholder="Annee">
            <input type="text" name="etat" id="etat" placeholder="Etat">
            <input type="text" name="prix" id="prix" placeholder="Prix">
            <button type="submit">Modifier</button>
        </form>

    </div>
</div>
