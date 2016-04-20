<?php 
require_once '../autoload.php';
require_once '../include/results.php';


$tweet = new Tweet($user_id);

if (isset($_POST['submittweet'])) {
	if (!empty(trim($_POST['tweetcontent']))) {
		$tweet->setContent($_POST['tweetcontent']);
		if(isset($_FILES['file-input']) && !empty($_FILES['file-input']['name']) ) {
			$uploaddir = '../view/img-user/tweet/';
			$validator = new Validator($_POST);
			$validator->isSize('file-input', 'Votre photo est trop lourde.');
			$validator->isExtension('file-input', 'L\'extension de la photo n\'est pas un png, gif, jpg ou jpeg.');
			$uploadfile = basename($_FILES['file-input']['name']);
			$uploadfile = strtr($uploadfile, 
				'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'); 
			$img_tweet = $uploaddir.$uploadfile;

			if($validator->isValid()) {
				move_uploaded_file($_FILES['file-input']['tmp_name'], $img_tweet);
				$tweet->newTweet($img_tweet);
			}
			else { 
				$errors = $validator->getErrors();
			}
		}
		else{
			$tweet->newTweet();
		}

		$id_tweet= $tweet->getIdTweet();
		$extract_tag = $tweet->extractTags($_POST['tweetcontent']);

		for($i = 0; $i <= count($extract_tag) - 1; $i++) {
			if($tweet->checkTags($db, $extract_tag[$i])) {
				$i++;
			}
			else {
				$db->query("INSERT INTO tags SET tag = ?", [$extract_tag[$i]]);
				$lastidtag = $db->lastInsertId();

				$db->query("INSERT INTO hashtags SET id_tag = ?, id_tweet = ?", [$lastidtag, $id_tweet]);
			}
		}	
	}
}

$initFollow = new Tweet($user_id);
$result = $initFollow->Tweet_follower($user_id);

require_once '../view/accueil.php';
?>