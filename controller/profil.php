<?php
require_once '../autoload.php';
require_once '../include/results.php';

if($getId != $user_id) {
	$get  = $getId;
} else {
	$get = 'moi';
}

if(!$_GET['id']) {
	App::redirect('accueil.php');
}

$isFollow = $follow->isFollow($db, $get, $user_id);

if(isset($_POST['followme'])) {
$follow->toFollow($db, $get, $user_id);
}
if(isset($_POST['defollow'])) {
$follow->unFollow($db, $get, $user_id);
}


$mytweets = $tweet->getUserTweets($db, $getId);
$tweets = '';


foreach ($mytweets as $mytweet) {
	$tweets .= $tweet->display($mytweet, $user);
	// $tweets .= $tweet->extractTags($tweets);
}

require_once '../view/profil.php';