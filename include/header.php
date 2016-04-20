<header class="header-timeline">
	<div class="header-timeline-menu">	
		<ul>
			<li><a href="accueil.php" title="Accueil"><span class="icon-home"></span><span>Accueil</span></a></li>
			<li><a href="notification.php" title="Notifications"><span class="icon-notif"></span><span>Notifications</span></a></li>
			<li><a href="message.php" title="Messages"><span class="icon-msg"></span><span>Messages</span></a></li>
		</ul>
		<div class="header-timeline-search">
			<form action="../controller/search.php" method="GET">
				<label for="search"></label>
				<input type="search" name="search" id="search" placeholder="Rechercher">
				<div id='complete'></div>
			</form>
			<a href="account.php" title="Profil et paramètres"><img src='<?= $info_user->avatar; ?>' alt="fox"></a>
			<a href="../view/logout.php"><img src="../view/img/icon/logout.png" alt="Se déconnecter"></a>
		</div>
	</div>
	<h1><span class="icon"></span></h1>
</header>
