<?php
require '../autoload.php';
$db = App::getDatabase();

if(App::getAuth()->confirm($db, $_GET['id_user'], $_GET['token'], Session::getInstance())){
	$user_id = $_SESSION['auth']->id_user;
    Session::getInstance()->setFlash('success', "Votre compte a bien été validé");
    App::redirect("../controller/account.php");
} else {
    Session::getInstance()->setFlash('danger', "Ce token n'est plus valide");
    App::redirect('../index.php');
}