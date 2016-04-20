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
	<div class="all-search-container">
		<div class="name-search-container">
			<h2><?php echo $_GET['search'] ?></h2>
		</div>
		<div class="result-search-container">
			<div class="suggest-profil">
				<h3>Suggestions</h3>
				<div class="who-follow-suggest">
					<a href='profil.php?id=<?php echo $info_user->id_user; ?>' title="<?php echo $info_user->username; ?>"><img src="<?= $info_user->avatar; ?>" alt="<?= $info_user->avatar; ?>">
						<h4><?php echo $user->nickname;?> - </h4>
						<h5>@<?php echo $user->username;?></h5>
						<span class="follow-button-suggest">Abonner</span>
					</a>
				</div>
			</div>
			<div class="all-search-user">
				<?php echo $search_user; ?>
			</div>
				<?php echo $search_tag; ?>
		</div>
	</div>
</body>
</html>