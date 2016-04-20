<?php
require_once '../../autoload.php';
require_once '../../include/results.php';


$tweet = new Tweet($user_id);

if (isset($_POST['tweetcontent'])) {
	if (!empty(trim($_POST['tweetcontent']))) {
		$tweet->setContent($_POST['tweetcontent']);
		if(!empty($_POST['file-input'])) {
			$uploaddir = '../view/img-user/tweet/';
			$uploadfile = basename($_POST['file-input']);
			$uploadfile = strtr($uploadfile, 
				'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'); 
			$img_tweet = $uploaddir.$uploadfile;

		
				move_uploaded_file($_POST['file-input'], $img_tweet);
				$tweet->newTweet($img_tweet);
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
echo $initFollow->Tweet_follower($user_id);


?>