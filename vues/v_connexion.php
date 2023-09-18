<section>
    <div class="connexion">
    <?php
        //si error existe
        if (isset($_REQUEST['error'])) {
            //on va prendre la valeur que renvoie error dans l'url
            $error_message = $_REQUEST['error'];
            echo '<center><p class="error-message">' . $error_message . '</p></center>';
        }
        ?>
        <form action="index.php?uc=connexion&action=verifconnex" method="POST">
            <input type="text" name="login" placeholder="Identifiant">
            <input type="password" name="mdp" placeholder="Mot de passe">
            <button type="submit">CONNEXION</button>
            <a href="index.php?uc=beforeconnexion">Pas  encore enregistrer ? Cliquez ici</a>
        </form>
    </div>
</section>