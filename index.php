<?php
require_once 'autoload.php';

$db = App::getDatabase();
$auth = App::getAuth();

if($auth->user()){
	App::redirect('controller/accueil.php');
}
$errors = [];
if(!empty($_POST['bouton-register'])) {

	$validator = new Validator($_POST);

	$validator->isAlpha('username', "Votre pseudo n'est pas valide");
	$validator->isEmail('email', "Votre email n'est pas valide");
	$validator->isUniq('username', $db, 'users', 'Ce pseudo est déjà pris');
	$validator->isUniq('email', $db, 'users', 'Cet email est déjà utilisé pour un autre compte');

	if($validator->isValid()) {
		$avatar = '../view/img/avatar/owl.png';
	    App::getAuth()->register($db, htmlspecialchars($_POST['username']), htmlspecialchars($_POST['register-password']), htmlspecialchars($_POST['email']));
		Session::getInstance()->setFlash('success', 'Un email de confirmation vous a été envoyé pour valider votre compte');
	    App::redirect('index.php');
	} else {
		$errors = $validator->getErrors();
	}
}

if(!empty($_POST['bouton-login'])) {
    $user = $auth->login($db, htmlspecialchars($_POST['username']), htmlspecialchars($_POST['password']));
    $session = Session::getInstance();

    if($user) {
        $session->setFlash('success', 'Vous êtes maintenant connecté');
        $user_id = $_SESSION['auth']->id_user;
        App::redirect("controller/accueil.php");
    } else {
        $session->setFlash('danger', 'Identifiant ou mot de passe incorrecte');
         App::redirect("index.php");
    }
}

require_once 'view/index.php';