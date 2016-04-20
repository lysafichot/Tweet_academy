<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="Tweet Academy, le twitter pour les webdev'"/>
	<link type= "text/css" rel="stylesheet" href="view/front/style.css"/>
	<link rel="icon" type="image/png" href="../view/img/icon/owl.PNG" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="view/js/slider.js"></script>
	<title>Tweet academy</title>
</head>
<body>
	<div id="all">
		<header id="header-acceuil">
			<div id="header-acceuil-container">	
				<ul>
					<li><a href="#" title="Acceuil"><span class="icon-menu"></span><span>Acceuil</span></a></li>
					<li><a href="#" title="À propos"><span>À propos</span></a></li>
				</ul>
			</div>
		</header>
		<div id="all-acceuil-container">
			<div id="body-acceuil">
				<div id="body-acceuil-container">
					<div id="logo">
						<h1>Bienvenue sur Tweet Academy.</h1>
						<p>Connectez-vous à vos amis — et d'autres personnes fascinantes. Recevez des mises à jour instantanées sur les choses qui vous intéressent. Et regardez les événements se dérouler, en temps réel, sous tous les angles.</p>
					</div>
					<div id="container-sign-log">	
						<div id="sign">
							<h2>Nouveau sur <strong>Tweet Academy</strong> ? Inscrivez-vous</h2>
							<form class="signin" name="signin" method="POST" action="#">
								<label for="fullname">Username</label>
								<input type="text" class="input-large" name="username" id="fullname" placeholder="Nom complet" required>
								<label for="email">Email, téléphone ou username</label>
								<input type="email" class="input-large" name="email" id="email" placeholder="Adresse email" required>
								<label for="register-password">Mot de passe</label>
								<input type="password" class="input-medium" name="register-password" id="register-password" placeholder="Mot de passe" required>
								<input class="btn-sign" type="submit" value="S'inscrire" name="bouton-register">
							</form>
						</div>
						<div id="log">
							<form method="POST" name="login" action='#'>
								<label for="signin-email">Email, téléphone ou username</label>
								<input type="text" class="input-large" name="username" id="signin-email" placeholder="Email, téléphone ou username" required>
								<label for="signin-password">Mot de passe</label>
								<input class="input-medium" type="password" name="password" id="signin-password" placeholder="Mot de passe" required>
								<input class="btn-log" type="submit" value="Se connecter" name="bouton-login">
							</form>
						</div>
							<?php include 'include/flash.php' ?>
					</div>
				</div>
			</div>
			<div class="slideshow">
				<img src="view/img/slider/slider1.jpg" alt="slide_1">
				<img src="view/img/slider/slider7.jpg" alt="slide_7">
				<img src="view/img/slider/slider2.jpg" alt="slide_2">
				<img src="view/img/slider/slider5.jpg" alt="slide_5">
				<img src="view/img/slider/slider3.jpg" alt="slide_3">
				<img src="view/img/slider/slider4.jpg" alt="slide_4">
				<img src="view/img/slider/slider8.jpg" alt="slide_8">
				<img src="view/img/slider/slider6.jpg" alt="slide_6">
			</div>
		</div>
	</div>
</body>
</html>