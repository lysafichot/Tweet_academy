<?php
$db = App::getDatabase();
$auth = App::getAuth();
$auth->restrict();

$user_id = $_SESSION['auth']->id_user;
$info_user = $auth->checkId($db, $user_id);

if(isset($_GET['id'])) {

	$getId = htmlspecialchars($_GET['id']);
	$user_id_profil = $auth->checkId($db, $getId);
	if(!isset($getId) || !file_exists('profil.php')) { /*App::redirect('accueil.php');*/ } 
	else { 
		if(!$user_id_profil) { /*App::redirect('accueil.php');*/ }
	}
	$id = $getId;
	$user = $user_id_profil;
}
else {
	$id = $user_id;
	$user = $info_user;
}


$tweet = new Tweet($id);
$follow = new Follow($_SESSION['auth']);
$count_tweet = $tweet->countTweet($db, $id);
$count_follower = $follow->countFollower($db, $id);
$count_following = $follow->countFollowing($db, $id);

if(isset($_POST['retweeter'])) {
	
	$retweet = new Tweet($user_id, $_POST['id_tweet']);
	$retweet->newTweet(null, $_POST['id_tweet']);

	$info_tweet = $retweet->getTweet($db, $_POST['id_user']);
	$info_tweet = $retweet->checkTweet($db, $_POST['id_tweet']);

	$retweeter = $retweet->display($info_tweet, $info_user);
}