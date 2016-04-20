<?php 
require_once '../autoload.php';

require_once '../include/results.php';
if(!$_GET['id']) {
	App::redirect('accueil.php');
}
  
$list_followers = $follow->listFollower($db, $getId);

$profil_follower =  $follow->display($db, $list_followers);

require_once '../view/followers.php';

?>
