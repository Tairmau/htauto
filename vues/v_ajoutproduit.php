<section>
    <div class="ajoutproduit">
        <form action="index.php?uc=admincrud&action=ajoutproduit" method="POST">
            <label for="photo"><img src="../images/photo.png" alt=""><p>Choississez un fichier</p></label>
            <input type="file" name="photo" id="photo" placeholder="" class="file">
            <input type="text" name="modele" id="modele" placeholder="Modele">
            <input type="text" name="type" id="type" placeholder="Type">
            <input type="text" name="annee" id="annee" placeholder="Annee">
            <input type="text" name="etat" id="etat" placeholder="Etat">
            <input type="text" name="prix" id="prix" placeholder="Prix">
            <button type="submit">Ajouter</button>
        </form>
    </div>
</section>