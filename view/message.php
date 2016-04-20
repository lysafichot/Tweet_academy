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
			<div class="all-conversation">
				<?php include '../include/flash.php' ?>
				<h2>Vos messages</h2>
				<div id='search-user-msg'>
					<form action='#' method='GET' name='search'>
						<p>À qui voulez vous envoyé un message ?</p>
						<input type='search' id='to' name='to' placeholder="Entrez un nom" value='<?php if(isset($_GET['to'])) { echo $_GET['to']; } ?>'>
						<input type="hidden" id="getMessages" name="getMessages" value="<?php if (isset($_GET['getMessages'])) {
							echo $_GET['getMessages'];
							}?>">
					</form>
				</div>
				<div id='boite'>
					<?php
					if (isset($_GET["getMessages"]))
					{
						?>
						<div id='reception'>
							<?php
							$messages = new Message($_SESSION["auth"], $_GET["getMessages"]);
							$messages->getMessages($db);
							?>
						</div>
						<div id='chatbox'>
							<div id='instantane'>
							</div>
							<form action='#' method='POST' name='search'>
								<textarea id="private-msg-textarea" name='content'></textarea>
								<input type='submit' name='valid_mess' id='valid_mess'>
							</form>
						</div>
						<?php
					}
					else
					{
						$messages = new Message($_SESSION['auth']);
						$messages->getConv($db);
					}
					?>
				</div>
			</div>		
		</div>
	</div>
</body>
</html>