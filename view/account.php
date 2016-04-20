<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="Tweet Academy, le twitter pour les webdev'"/>
	<link type= "text/css" rel="stylesheet" href="../view/front/style.css"/>
	<link rel="icon" type="image/png" href="../view/img/icon/owl.PNG" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
	<script src="../view/js/menu.js"></script> <!-- jquery ui avec tab pour onglet + simple-->
	<script src="../view/js/filereader.js"></script>
	<script src="../view/js/autocomplete.js"></script>
	<title>Tweet academy</title>
</head>
<body>
	<?php include '../include/header.php'; ?>
	<div class="body-container">
		<div class="page-container">
			<div class="container-left-side">
				<div class="dashboard">
					<div class="dashboard-cover">
						<a  href="account.php" title="Profil et paramètres"><img id='img_cover' src="<?= $info_user->cover; ?>" alt="<?php $info_user->nickname; ?>"></a>
					</div>
					<div class="dashboard-data">
						<a href="profil.php?id=<?php echo $user_id; ?>" title="Profil et paramètres"><img id='img_avatar' src="<?= $info_user->avatar; ?>" alt="<?php $info_user->nickname; ?>"></a>
					</div>
					<div class="dashboard-user">
						<a href="profil.php?id=<?php echo $user_id; ?>" title="<?php $info_user->nickname; ?>"><?php echo ucfirst($info_user->nickname); ?></a>
						<a href="profil.php?id=<?php echo $user_id; ?>" title ="<?php $info_user->username; ?>">@<?php echo $info_user->username; ?></a>
					</div>
				</div>
				<div class="account-menu">
					<ul>
						<li><a href="account.php" title="Compte">Compte</a></li>
						<li><a href="" title="Thème">Thème</a></li>
						<li><a href="../view/confidentiality.php" title="Confidentialité">Confidentialité</a></li>
					</ul>
				</div>
			</div>
			<div class="account-container">
				<div class="account-header-container">
					<header>
						<h2>Compte</h2>
						<p>Changez les paramètres de base de votre compte et vos paramètres de langue.</p>
					</header>
				</div>
				<div class="account-form">
					<form method="POST" name="account" action="#">
						<label for="fullname">Nom d'utilisateur</label>
						<div class="account-input">
							<input type="text" id="fullname" name="username" placeholder="@<?= $info_user->username; ?>">
							<p>https://twitter.com/<?= $info_user->username; ?></p>
						</div>
						<label for="biography">À propos de vous</label>
						<div class="account-input">					
							<input type="text" id="biography" name="biography" placeholder="<?= $info_user->biography; ?>">
						</div>
						<label for="nickname">Login</label>
						<div class="account-input">					
							<input type="text" id="nickname" name="nickname" placeholder="<?= $info_user->nickname; ?>">
						</div>
						<label for="location">Ville</label>
						<div class="account-input">					
							<input type="text" id="location" name="location" placeholder="<?= $info_user->location; ?>">
						</div>
						<label for="birthdate">Date de naissance</label>					
						<div class="account-input">
							<input type="date" id="birthdate" name="birthdate">
							<p>Format AAAA/MM/JJ.</p>
						</div>
						<div class="account-input">
							<input type="submit" value="Enregistrez les modifications" name="bouton-info">
						</div>
					</form>
					<form enctype="multipart/form-data" method="POST" name="avatar" action="#">
						<label for="avatar">Avatar</label>					
						<div class="account-input">
							<input type="file" name="avatar" id="avatar" accept="image/*">
							<p>Votre fichier doit faire moins de 50 mo, avec l'extension jpg/jpeg/png.</p>
						</div>
						<div class="account-input">
							<input type="submit" value="Ajoutez un avatar" name="valid_avatar">
						</div>
					</form>
					<form enctype="multipart/form-data" method="POST" name="cover" action="#">
						<label for="cover">Cover</label>					
						<div class="account-input">
							<input type="file" name="cover" id="cover" accept="image/*">
						</div>
						<div class="account-input">
							<input type="submit" value="Ajoutez une photo de couverture" name="valid_cover">
						</div>
					</form>
					<form method="POST" name="account" action="#">
						<label for="email">Email</label>
						<div class="account-input">
							<input type="text" id="email" name="email" placeholder="<?= $info_user->email; ?>">
						</div>
						<div class="account-input">
							<input type="password" name="pass" placeholder="Mot de passe actuel"/>
						</div>
						<div class="account-input">
							<input type="submit" name="email_modif" value="Enregistrez les modifications"/>
						</div>
					</form>
					<form method="POST" name="account" action="#">
						<label for="password">Mot de passe</label>
						<div class="account-input">
							<input type="password" id="password" name="pass1" placeholder="Mot de passe actuel"/>
						</div>
						<div class="account-input">
							<input type="password" name="password" placeholder="Nouveau mot de passe"/>
						</div>
						<div class="account-input">
							<input type="password" name="password_confirm" placeholder="Confirmez votre mot de passe"/>
						</div>		
						<div class="account-input">
							<input type="submit" name="pass_modif" value="Enregistrez les modifications"/>
						</div>
					</form>
					<form class="account-input-delete" method="POST" name="account" action="#">
						<label for="delete">Supprimer mon compte</label>
						<div class="account-delete-button">
							<input type="submit" id="delete" name="delete" value="Supprimez mon compte"/>
						</div>
					</form>
				</div>
			<?php include '../include/flash.php'; ?>
			</div>
		</div>
	</div>
</body>
</html>