<!-- header-->
<header>
	<nav>
		<ul class="bandeau">
			<?php 
				require_once("util/class.PDO.HTAuto.inc.php");

				$pdo=PdoHtAuto::getPdoHtAuto();

				if(isset($_SESSION['login'])){
					$login = $_SESSION['login'];

					$userRole = $pdo->getrole($login); 
					?>
					<li><a href="index.php?uc=accueil&tri=allproducts"> Accueil </a></li>
					<li><a href="index.php?uc=accountinfo" class='user'><img src="images/utilisateurco" alt=""></a></li>
					<?php  
						if($userRole == 'Admin')
							{ ?>
							<h1 class="admincrudlink"><a href="index.php?uc=admincrud" >Admincrud</a></h1>
							<h1 class="admincrudreservation"><a href="index.php?uc=admincrudreservation" >Réservations</a></h1>

				    <?php
							}
					?>
					<li><h1>Henry THIBERT Automobiles</h1></li>
			<?php 
				}
				else{ 
					?>
					<li><a href="index.php?uc=connexion" class='user'><img src="images/utilisateur" alt=""></a></li>
					<li><a href="index.php?uc=accueil&tri=allproducts"> Accueil </a></li>
					<li><h1>Henry THIBERT Automobiles</h1></li>
			<?php
				}
			?>
		</ul>
	</nav>
</header>

