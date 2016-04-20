<?php 
require_once '../autoload.php';
require_once '../include/results.php';
if(!$_GET['id']) {
	App::redirect('accueil.php');
}

$list_following = $follow->listFollowing($db, $getId);

$profil_following =  $follow->display($db, $list_following);

require_once '../view/following.php';
?>