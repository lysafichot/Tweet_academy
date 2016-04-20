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
	<script src="../view/js/timeline.js"></script>
	<script src="../view/js/char-max.js"></script>
	<!--<script src="../view/js/tweet.js"></script> -->

<!-- date diff ajax  
theme bg ++
username preg  replace ++;
reply  ++
compte nb tweeter 
detweeter
delete-->
<title>Tweet academy</title>
</head>
<body>
	<?php include '../include/header.php'; ?>
	<div class="body-container">
		<div class="page-container">
			<?php include "../include/dashboard.php";?>
			<div class="main">
				<div class="container-write-tweet">
					<div class="write-tweet">
						<img class="profil-pic" src="<?= $info_user->avatar; ?>" alt="<?= $info_user->nickname; ?>">
						<form id="formTweet" method="post" action="#" enctype="multipart/form-data">
							<textarea id="tweet-textarea" maxlength='140' name="tweetcontent"></textarea>
							<p>Il vous reste <span id="maxChar"></span> caractères</p>
							<a id='img_tweet' href="#" title="Images"></a>
							<div class="button-tweet">
								<label for="file-input">
									<img src="../view/img/icon/icon-pic.png" alt="Ajoutez une image"/>
									<span class="submit-pic-tweet">Ajoutez une photo</span>
									<input type="file" id="file-input" name="file-input">
								</label>
								<label class="submit-location-tweet" for="location">
									<img src="../view/img/icon/icon-location.png" alt="Me géolocaliser"/>
									<span>Localisation</span>
									<input type="submit" id="location" name="location">
								</label>
								<button id="tweetsubmit" type="submit" name="submittweet">
									<span class="submit-button-tweet">Tweeter</span>
								</button>
							</div>
						</form>
					</div>
				</div>
				<div id='timeajax'>
					<?php
					for ($i=0; $i < count($result); $i++) {
						echo $result;
					}
/*$token = substr(md5(rand().microtime()), 0, 6);
*/
?>
</div>
</div>
</div>
</div>
</body>
</html>