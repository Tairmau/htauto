<div class="compte">
    <form action="" method="POST">
        <h1>INFOS COMPTE</h1>
        <label for="">Username</label>
        <input type="text" placeholder="<?php echo $_SESSION['login']; ?>" disabled>
        <label for="">Mot de passe</label>
        <input type="password" placeholder="" value="<?php echo $_SESSION['mdp']; ?>" disabled>
    </form>
    <button class="edit"><a href="index.php?uc=connexion&action=deconnexion">DECONNEXION</a></button>
</div>