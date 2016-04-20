<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="Tweet Academy, le twitter pour les webdev'"/>
	<link type= "text/css" rel="stylesheet" href="../view/front/style.css"/>
	<link rel="icon" type="image/png" href="../view/img/icon/owl.PNG" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="../view/js/location.js"></script>
	<script src="../view/js/reader_tweet.js"></script>
	<script src="../view/js/scroll.js"></script>
	<script src="../view/js/autocomplete.js"></script>
	<title>Tweet academy</title>
</head>
<body>
	<header class="header-timeline">
		<div class="header-timeline-menu">	
			<ul>
			<li><a href="../controller/accueil.php" title="Accueil"><span class="icon-home"></span><span>Accueil</span></a></li>
				<li><a href="../controller/notification.php" title="Notifications"><span class="icon-notif"></span><span>Notifications</span></a></li>
				<li><a href="../controller/message.php" title="Messages"><span class="icon-msg"></span><span>Messages</span></a></li>
			</ul>
			<div class="header-timeline-search">
				<form action="../controller/search.php" method="GET">
					<label for="search"></label>
					<input type="search" name="search" id="search" placeholder="Rechercher">
				</form>
				<a href="../view/logout.php"><img src="../view/img/logout.png" alt="Se déconnecter"></a>
			</div>
		</div>
		<h1><span class="icon"></span></h1>
	</header>
</body>
</head>
</html>