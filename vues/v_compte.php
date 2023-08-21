<div class="compte">
    <form action="index.php?uc=accountinfo&action=compteupdate" method="POST">
        <h1>INFOS COMPTE</h1>
        <label for="">Username</label>
        <input type="text" placeholder="<?php echo $_SESSION['login']; ?>" disabled>
        <label for="">Ancien mot de passe</label>
        <input type="password" placeholder="" value="<?php echo $_SESSION['mdp']; ?>" disabled>
        <label for="">Nouveau mot de passe</label>
        <input type="text" placeholder="" name="newpass" id="newpass">
        <button type="submit">SUBMIT</button>
    </form>
    <button class="edit"><a href="">EDIT</a></button>
    <a href="index.php?uc=connexion&action=deconnexion" class='deconnexion'>DECONNEXION</a>

</div>