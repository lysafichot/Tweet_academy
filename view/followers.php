<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="Tweet Academy, le twitter pour les webdev"/>
	<link type= "text/css" rel="stylesheet" href="../view/front/style.css"/>
	<link rel="icon" type="image/png" href="../view/img/icon/owl.PNG" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="../view/js/autocomplete.js"></script>

	<title>Tweet academy</title>
</head>
<body>
	<?php include '../include/header.php'; ?>
	<?php include '../include/header-profil.php'; ?>
	<div class="profil-body-container">
		<div class="avatar-profil">
			<img src="<?= $user->avatar; ?>" alt="<?= $user->avatar; ?>">	
		</div>
		<div class="profil-desc-container">
			<div class="profil-desc">
				<h2><a href="profil.php?id=<?php echo $user_id; ?>" title=""><?php echo ucfirst($user->nickname); ?></a></h2>
				<h3><a href="profil.php?id=<?php echo $user_id; ?>" title ="">@<?php echo $user->username; ?></a></h3>
				<p><?php echo $user->biography; ?></p>
				<p><strong>Ville </strong> : <?php echo $user->location; ?></p>
				<p><strong>Date de naissance </strong> : <?php echo $user->birthdate; ?></p>
			</div>
			<div class="profil-pic-share">
				<p><a href="" title=""> Photos et vidéos</a></p>
				<div class="profil-pic-container">
					<img class="all-pic-profil" src="<?= $user->avatar; ?>" alt="<?= $user->avatar; ?>">
				</div>
			</div>
		</div>
		<div class="myTweet-profil">
			<h3>Liste des abonnées</h3>
			<?php echo $profil_follower; ?>
		</div>
	</div>
</body>
</html>