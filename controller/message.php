<?php 
require_once '../autoload.php';
require_once '../include/results.php';

if(isset($_GET['to'])) {
	$valid = $auth->who($db, $_GET['to']);
	if(!$valid) {
		Session::getInstance()->setFlash('danger', 'Veuillez indiquez un destinataire valide.');

	} 
	else {
		if(isset($_POST['content'])) {
			$message = new Message($_SESSION['auth'], $valid->id_user);
			$content = trim(htmlspecialchars($_POST['content']));
			$message->send($db, $content);	
			
		}
		$_GET['getMessages'] = $valid->id_user;

	}
}

require_once '../view/message.php'; 
?> 