<?php
require_once '../autoload.php';
require_once '../include/results.php';

if(isset($_POST['bouton-info'])) {
	$validator = new Validator($_POST);

	foreach($_POST as $field => $post) {
		if(!empty($_POST[$field]) && $_POST[$field] != 'Enregistrez les modifications') {
			if($_POST['username']) {
				$validator->isAlpha('username', "Le nom d'utilisateur n'est pas valide.");
				$info_user->username = $_POST['username'];
			}
			if($_POST['biography']) {
				$validator->isAlpha('biography', "Votre biographie contient des characetère non valide.");
				$info_user->biography = $_POST['biography'];
			}
			if($_POST['nickname']) {
				$validator->isAlpha('nickname', "Le login n'est pas valide.");
				$info_user->nickname = $_POST['nickname'];
			}
			if($_POST['location']) {
				$validator->isAlpha('location', "La ville renseigné n'est pas valide.");
				$info_user->location = $_POST['location'];
			}
			if($_POST['birthdate']) {
				$validator->isDate('birthdate', "La date renseigné n'est pas valide.");
				$info_user->birthdate = $_POST['birthdate'];
			}
			if($validator->isValid()) {
				$auth->update($db, $user_id, htmlentities($post), htmlentities($field));

			}
			else { 
				$errors = $validator->getErrors();
				Session::getInstance()->setFlash('danger', $errors);
			}
		}
	}
}


if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
	$avatar = $auth->img_profil($db, $user_id, 'avatar', '../view/img-user/avatar/');
	if(is_array($avatar)) {
		$errors = $avatar;
	}
	else {
		$info_user->avatar = $avatar;
	}
}


if(isset($_FILES['cover']) && !empty($_FILES['cover']['name']) ) {
	$cover = $auth->img_profil($db, $user_id, 'cover', '../view/img-user/cover/');
	if(is_array($cover)) {
		$errors = $cover;
	}
	else {
		$info_user->cover = $cover;
	}
}
if(isset($_POST['email_modif'])) {
	$validator = new Validator($_POST);
	if(!empty($_POST['pass']) && !empty($_POST['email'])) {
		$pass = $_POST['pass']; 
		$password = $auth->hashPassword($pass);
		$email = htmlspecialchars($_POST['email']);

		if($password == $info_user->password) { 

			$validator->isEmail('email', "Votre email n'est pas valide");
			if($validator->isValid()) {
				$validator->isUniq('email', $db, 'users', 'Cet email est déjà utilisé pour un autre compte.');
			} 
			if($validator->isValid()) { 
				$db->query('UPDATE users SET email = ? WHERE id_user = ?', [$email, $user_id]);
				$_SESSION['flash']['success'] = "Votre email a bien été mis à jour";
				$info_user->email = $email;
			} else {
				$errors = $validator->getErrors();
			}
		} else {
			$_SESSION['flash']['danger'] = "Une erreur dans le mot de passe actuel.";
		}
	} else {
		$_SESSION['flash']['danger'] = "Veuillez remplir tous les champs.";
	}
}

if(isset($_POST['pass_modif'])) {
	$validator = new Validator($_POST);
	if(!empty($_POST['pass1'])) {
		$pass = $_POST['pass1']; 
		$password = $auth->hashPassword($pass);
		if($password == $info_user->password) { 

			$validator->isConfirmed('password', 'Les deux mots de passe ne coincident pas.');
			if($validator->isValid()) { 
				$new_pass = $_POST['password'];
				$new_pass = $auth->hashPassword($new_pass);
				$db->query('UPDATE users SET password = ? WHERE id_user = ?', [$new_pass, $user_id]);
				$_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
			} else {
				$errors = $validator->getErrors();
			}
		} else {
			$_SESSION['flash']['danger'] = "Erreur dans le mot de passe actuel.";
		}  
	} else {
		$_SESSION['flash']['danger'] = "Veuillez remplir tous les champs.";
	}  
}

if(isset($_POST['delete'])) {
	$auth->delete($db, $user_id);
	session_destroy();
}

require_once '../view/account.php';
?>