<?php
require_once '../../autoload.php';
$session = Session::getInstance();
$follow = new Follow($session);
if(isset($_POST['user']) && isset($_POST['session'])) {

	$db = App::getDatabase();
	$follow->toFollow($db, $_POST['user'], $_POST['session']);
	$o = $follow->countFollower($db, $_POST['user']);
	echo $o->count_follower;

}

if(isset($_POST['user_d']) && isset($_POST['session_d'])) {
	$db = App::getDatabase();
	$follow->unFollow($db, $_POST['user_d'], $_POST['session_d']);
	$j = $follow->countFollower($db, $_POST['user_d']);
	echo $j->count_follower;
}
