<?php
require_once '../../autoload.php';
$db = App::getDatabase();
$auth = App::getAuth();
$auth->restrict();

$user_id = $_SESSION['auth']->id_user;

$initFollow = new Tweet($user_id);
echo $initFollow->Tweet_follower($user_id);
?>