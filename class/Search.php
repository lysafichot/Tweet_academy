<?php
require_once 'Tweet.php';
class Search
{
	protected $_nameUser;
	protected $_tag;
	private $_db;

	function __construct($_db, $_nameUser = NULL, $_tag = NULL) {
		$this->_db = App::getDatabase();
	}

	public function user($_nameUser) {

		if(stristr($_nameUser, "@") || $_nameUser !== stristr($_nameUser, "#")) {
			$tweet = new Tweet();
			$_nameUser = str_ireplace("@", " ", $_nameUser);
			$_nameUser = '%'.trim($_nameUser).'%';
			$search_name = $this->_db->query("SELECT * FROM users WHERE username LIKE ?", [htmlentities($_nameUser)])->fetchAll();
			$result = '';

			foreach ($search_name as $info_user) {
				$result .= '<div class="result-user">
					<div class="result-user-cover">
					<a href="profil.php?id='.$info_user->id_user.'" title="'.$info_user->username.'"><img src="'.$info_user->cover.'" alt="'.$info_user->username.'"></a>
					</div>
					<div class="dashboard-data">
						<a href="profil.php?id='.$info_user->id_user.'" title="'.$info_user->username.'"><img src="'.$info_user->avatar.'" alt="'.$info_user->username.'"></a>
					</div>
					<div class="dashboard-user">
						<a href="profil.php?id='.$info_user->id_user.'" title="'.$info_user->nickname.'">'.ucfirst($info_user->nickname).'</a>
						<a href="profil.php?id='.$info_user->id_user.'" title ="'.$info_user->username.'">@'.$info_user->username.'</a>
					</div>
					<div class="dashboard-stats">
						<div class="search-about-user">
							<a title="Tweets" href="profil.php?id='.$info_user->id_user.'">
								<span class="describ-stats">À propos : </span>
								<span class="biography-search">'.$info_user->biography.'</span>
							</a>
						</div>
					</div>
				</div>';
			}
			return $result;
		}
	}

	public function tag($_tag)
	{
		if(stristr($_tag, "#") || $_tag !== stristr($_tag, "@")) {
			$tweet = new Tweet();
			$_tag = str_ireplace("#", " ", $_tag);
			$_tag = '%'.trim($_tag).'%';
			$search_tag = $this->_db->query("SELECT * FROM tags 
			INNER JOIN hashtags ON tags.id_tag = hashtags.id_tag 
			INNER JOIN tweets ON hashtags.id_tweet = tweets.id_tweet 
			WHERE tag LIKE ? GROUP BY hashtags.id_tweet", [htmlentities($_tag)])->fetchAll();
			$result = '';
		foreach ($search_tag as $value) {	
			$info_user = $tweet->checkTweet($this->_db, $value->id_tweet);
			$result .= $tweet->display($value, $info_user);
		}
			return $result;
		}
	}
}

?>