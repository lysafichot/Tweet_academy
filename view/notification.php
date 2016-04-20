<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="Tweet Academy, le twitter pour les webdev'"/>
	<link type= "text/css" rel="stylesheet" href="../view/front/style.css"/>
	<link rel="icon" type="image/png" href="../view/img/icon/owl.PNG" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="../view/js/autocomplete.js"></script>

	<title>Tweet academy</title>
</head>
<body>
	<?php include '../include/header.php'; ?>

	<div class="body-container">
		<div class="page-container">
			<?php include '../include/dashboard.php' ?>
			<div id='all-notif'>
			<h2>Notifications</h2>
				<?php echo $notification_all; ?>
			</div>
		</div>
	</div>