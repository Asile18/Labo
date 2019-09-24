<nav id="navigation">
	<ul class="menu">
		<li class="navigation"><a href=".">Accueil</a></li>
		<li class="navigation"><a href="?section=forum">Forum</a></li>
		<li class="navigation"><a href="?section=faq">FAQ</a></li>
		<li class="navigation"><a href="?section=contact">Contact</a></li>
		<?php
			//Client
		if($client){
			?>
			<li id="profil">
				<details>
					<summary><?= $userName ?></summary>
					<li><a href="?section=profil">Profil</a></li>
					<li><a href="?section=historique">Historique</a></li>
					<li><a href="?section=deconnexion">Déconnexion</a></li>
				</details>
			</li>
			<?php
		}
			//Admin
		else if($admin){
			?>
			<li id="profil">
				<details>
					<summary><?= $userName ?></summary>
					<li><a href="?section=profil">Profil</a></li>
					<li><a href="?section=historique">Historique</a></li>
					<li><a href="?section=hostelsselectall">AllHostels</a></li>
					<li><a href="?section=addhostel">AddHostel</a></li>
					<li><a href="?section=reviewsselectall">AllReviews</a></li>
					<li><a href="?section=roomsselectall">AllRooms</a></li>
					<li><a href="?section=reservationsselectall">AllReservations</a></li>
					<li><a href="?section=usersselectall">AllUsers</a></li>
					<li><a href="?section=addroom">AddRoom</a></li>
					<li><a href="?section=deconnexion">Déconnexion</a></li>
				</details>
			</li>
			<?php
		}
			//Visiteur
		else{
			?>
			<li class="login navigation" ><a href="?section=login">Login</a></li>
			<?php
		}
		?>
	</ul>
</nav>