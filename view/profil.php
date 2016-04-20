<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="Tweet Academy, le twitter pour les webdev'"/>
	<link type= "text/css" rel="stylesheet" href="../view/front/style.css"/>
	<link rel="icon" type="image/png" href="../view/img/icon/owl.PNG" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="../view/js/like_dislike.js"></script>
	<script src="../view/js/autocomplete.js"></script>

	<title>Tweet academy</title>
</head>
<body>
	<?php include '../include/header.php'; ?>

	<div class="profil-container">
		<div class="cover-profil">
			<img src="<?= $user->cover; ?>" alt="<?= $user->cover; ?>">
		</div>
		<div class="profil-stats-container">
			<div class="profil-stats">	
				<a title="Tweets" href="profil.php?id=<?php echo $id; ?>">
					<span class="describ-stats">Tweets</span>
					<span class="number-stats"><?php echo $count_tweet->count_tweet; ?></span>
				</a>
				<a title="Abonnements" href="following.php?id=<?php echo $id; ?>">
					<span class="describ-stats">Abonnements</span>
					<span class="number-stats"><?php echo $count_following->count_following; ?></span>
				</a>
				<a title="Abonnés" href="followers.php?id=<?php echo $id; ?>">
					<span class="describ-stats">Abonnés</span>
					<span id='abonne' class="number-stats"><?php echo $count_follower->count_follower; ?></span>
				</a>
				<div class="profil-stats-button">
					<a href="account.php" title="Profil et paramètres">Editer mon profil</a>
					<form name="follows" class='follows' action="#" method="POST">
						<input type='hidden' class='already' name="already" value="<?= $isFollow; ?>" />
						<input type='hidden' class='user' name="user" value="<?= $get; ?>" />
						<input type='hidden' class= 'session' name="session" value="<?= $user_id ?>" />
						<input type="submit" name="followme" value="S'abonner" />
					</form>
					<form name="defollows" class='defollows' action="#" method="POST">
						<input type='hidden' class='user_d' name="user" value="<?= $get; ?>" />
						<input type='hidden' class= 'session_d' name="session" value="<?= $user_id; ?>" />
						<input type="submit" name="defollow" value="Désabonner" />
					</form>
				</div>
			</div>
		</div>
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
					<p><a href="#" title="Photos et vidéos">Photos et vidéos</a></p>
					<div class="profil-pic-container">
						<img class="all-pic-profil" src="<?= $user->avatar; ?>" alt="<?= $user->avatar; ?>">
					</div>
				</div>
			</div>
			<div class="myTweet-profil">
				<?php echo $tweets; ?>
			</div>
			<div class="suggest-profil">

			</div>
		</div>
	</div>
</body>
</html>