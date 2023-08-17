<!-- header-->
<header>
	<nav>
		<ul class="bandeau">
			<?php 
				if(isset($_SESSION['login'])){?>
					<li><a href="index.php?uc=accueil" class='panier'><img src="images/panier" alt=""></a></li>
					<li><a href="index.php?uc=accueil"> Accueil </a></li>
					<li><a href="index.php?uc=accueil" class='user'><img src="images/utilisateur" alt=""></a></li>
					<li><a href="index.php?uc=connexion&action=deconnexion" class='deconnexion'>DECONNEXION</a></li>

					
					<li><h1>Henry THIBERT Automobiles</h1></li>
			<?php 
				}
				else{ 

					?>

					<li><a href="index.php?uc=connexion" class='user'><img src="images/utilisateur" alt=""></a></li>
					<li><a href="index.php?uc=accueil"> Accueil </a></li>
					<li><h1>Henry THIBERT Automobiles</h1></li>
			<?php
				}
			?>
		</ul>
	</nav>
</header>

