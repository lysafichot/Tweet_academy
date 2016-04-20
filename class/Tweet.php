<?php

class Tweet {

    private $_db;
    private $_id_tweet;
    private $_id_user;
    private $_content;
    private $_creation_date;
    private $_media;
    private $_deleted;
    private $_is_origin;
    private $_is_reply;
    private $_location;

    function __construct($id_user = null, $id_tweet = null) {
        $this->_db = App::getDatabase();
        $this->_id_user = $id_user;

        if (NULL !== $id_tweet) {
            $this->_id_tweet = $id_tweet;
            $sql = "SELECT * FROM tweets WHERE id_tweet = :id";
            $smt = $this->_db->query($sql, [':id' => $this->_id_tweet]);
            $all = $smt->fetch();

            $this->_content = $all->content;
            $this->_creation_date = $all->creation_date;
            $this->_media = $all->media;
            $this->_deleted = $all->deleted;
            $this->_is_origin = $all->is_origin;
            $this->_is_reply = $all->is_reply;
            $this->_location = $all->location;
        }
    }

    public function getTweet($db, $tweet_id) {
        return $db->query('SELECT * FROM tweets WHERE tweets.id_tweet = ?', [$tweet_id])->fetch();
    }

    public function checkTweet($db, $tweet_id) {
        return $db->query('SELECT * FROM tweets INNER JOIN users ON users.id_user = tweets.id_user 
            WHERE tweets.id_tweet = ? ORDER BY tweets.creation_date DESC', [$tweet_id])->fetch();
    }

    public function extractTags($content) {
        preg_match_all("/(#\w+)/", $content, $matches);
        return $matches[0];
    }

    public function _callback($matches) {
        $user = str_ireplace("@", " ", $matches[0]);
        $user = trim($user);

        $checkuser = $this->_db->query('SELECT * FROM users WHERE username = ?', [$user])->fetch();

        if($checkuser) {
            return '<a class="hashtag" href="profil.php?id='.$checkuser->id_user.'">'.$matches[0].'</a>';
        }      
    }

    public function extractUser($db, $content) {
        preg_match_all("/(@\w+)/", $content, $matches);

        foreach($matches[0] as $match) {
            $user = str_ireplace("@", " ", $match);
            $user = trim($user);

            $checkuser = $this->_db->query('SELECT * FROM users WHERE username = ?', [$user])->fetch();

            if($checkuser) {
                return preg_replace_callback("/(@\w+)/", array($this,'_callback'), $content);
            }
        }
    }

    public function _callbackUrl($matches) {
        $token = substr(md5(rand().microtime()), 0, 4);
        return '<a href="'.$matches[0].'">http://'.$token.'</a>';       
    }


    public function extractUrl($db, $content) {

        $content = str_replace( "www.", "http://www.", $content );
        $content = str_replace( "http://http://www.", "http://www.", $content );
        $content = str_replace( "https://http://www.", "https://www.", $content);
        $reg_exUrl = "/(http|https|ftp|ftps)?\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        if(preg_match($reg_exUrl, $content, $url)) {
           $content = preg_replace_callback($reg_exUrl, array($this,'_callbackUrl'), $content);
       }
       return $content;
   }
   
 public function checkTags($db, $tag) {
    return $db->query('SELECT * FROM tags WHERE tag = ?', [$tag])->fetch();
}

public function tag($db, $id_tweet) {
    $info_tag = $db->query("SELECT * FROM tags INNER JOIN hashtags ON tags.id_tag = hashtags.id_tag INNER JOIN tweets ON hashtags.id_tweet = tweets.id_tweet WHERE hashtags.id_tweet = ?", [$id_tweet])->fetchAll();
    if(!empty($info_tag)) {
        $all_tag = [];
        foreach ($info_tag as $tags) {
            $get_tag = str_ireplace("#", "%23", $tags->tag);
            array_push($all_tag, '<a class="hashtag" href="search.php?search='.$get_tag.'" title="'.$get_tag.'">'.$tags->tag.'</a>');
        }
        $string_tag = implode(' ', $all_tag);
        return $string_tag;
    } else {
        return $tag = '';
    }
}

public function newTweet($media = null, $is_origin = null, $is_reply = null) {

    $sql = "INSERT INTO tweets SET content = :content, id_user = :id_user, creation_date = NOW()";
    $params = [':content'=>$this->_content, ':id_user'=>$this->_id_user];
    if ($is_origin) {
        $sql .= ", is_origin = :is_origin";
        $params[':is_origin']=$is_origin;
    }
    if ($is_reply) {
        $sql .= ", is_reply = :is_reply";
        $params[':is_reply'] = $is_reply;
    }
    if ($media) {
        $sql .= ", media = :media";
        $params[':media']=$media;
    }
    $this->_db->query($sql, $params);
    $this->_id_tweet = $this->_db->lastInsertId();
}

public function comparer($a, $b) {
    return strtotime($a->creation_date) - strtotime($b->creation_date);
}

public function Tweet_follower($id_user) {
    $follow = new Follow($id_user);
    $follower = new Auth($id_user);
    $id_following = $follow->id_following($this->_db, $this->_id_user);
    $tweet_followers = [];

    foreach ($id_following as $value) {
        if(isset($_GET['lastid'])){
            $followtweets = $this->getUserTweetsTimeline($this->_db, $value->abonnement);
        } else {
            $followtweets = $this->getUserTweets($this->_db, $value->abonnement);
        }
        foreach ($followtweets as $followtweet) {   
            array_push($tweet_followers, $followtweet); 
        }
    }

    usort($tweet_followers, array($this, 'comparer'));

    $tweets = array_reverse($tweet_followers);
    $affiche = '';
    foreach ($tweets as $tweet) {
        $infofollow = $follower->checkId($this->_db, $tweet->id_user);
        $affiche .= $this->display($tweet, $infofollow);
    }

    return $affiche;
}

public function enfant($origin) {
    return $this->_db->query("SELECT * FROM tweets where is_origin = ?", [$origin])->fetchAll();
}

public function display($info_tweet, $info_user) {
    if(!empty($info_tweet->media)) {
        $media ='<div class="img-tweet"><a href="#" title="'.$info_tweet->media.'"><img src='.$info_tweet->media.' alt='.$info_tweet->media.'></a></div>';
    }
    else {
        $media = '';
    }

    if(!empty($info_tweet->is_origin)) {
        $origin = '<p class="retweeteur">@'.$info_user->username.' a retweeter</p>';
        $tweet_papa =  $this->checkTweet($this->_db, $info_tweet->is_origin);
        $info_user = $this->_db->query('SELECT * FROM users WHERE id_user = ?', [$tweet_papa->id_user])->fetch();
        $but_retweet = '';
    } else { 
        if($info_tweet->id_user == $_SESSION['auth']->id_user) {
            $but_retweet = '';
        } else {
            $enfants = $this->enfant($info_tweet->id_tweet);

            $but_retweet = '<input type="text" name="comment_retweet"><input type="submit" name="retweeter" value="Retweeter">';
            foreach ($enfants as $enfant) {
                if($enfant->id_user == $_SESSION['auth']->id_user) {
                    $but_retweet = '';
                }
            }
        }
        $origin = '';
    }

    $tag = $this->tag($this->_db, $info_tweet->id_tweet);

    $extractuser = $this->extractUser($this->_db, $info_tweet->content);

    if(!empty($extractuser)) {
        $info_tweet->content = $extractuser;
    }

    $extractUrl = $this->extractUrl($this->_db, $info_tweet->content);
    if(!empty($extractUrl)) {
        $info_tweet->content = $extractUrl;
    }

    $info_tweet->content = preg_replace("/(#\w+)/", $tag, $info_tweet->content);
    
    return $display = 
    '<div class="container-tweet-following"><div class="tweet-following">'.$origin.'
    <a class="name-tweet-following" href="profil.php?id='.$info_user->id_user.'" title="'.$info_user->id_user.'"><img class="profil-pic-tweet" src='.$info_user->avatar.' alt='.$info_user->avatar.'><h2>'.$info_user->nickname.'</h2> @'.$info_user->username.'</a>
    <p class="content">'.$info_tweet->content.'</p></div>'
    .$media.
    '<form action="#" method="POST"> 
    <input type="hidden" name="id_tweet" value="'.$info_tweet->id_tweet.'">
    <input type="hidden" name="id_user" value="'.$info_user->id_user.'">'.$but_retweet.'
</form></div>';
}


public function getUserTweets($db, $user_id) {
    return $db->query("SELECT * FROM tweets WHERE id_user = ? ORDER BY creation_date DESC LIMIT 0, 10", [$user_id])->fetchAll();
}

public function getUserTweetsTimeline($db, $user_id) {
    if($_GET['lastid']){
        $result =  $db->query("SELECT * FROM tweets WHERE id_user = 1 AND id_tweet < ? ORDER BY creation_date DESC LIMIT 10", [$_GET['lastid']])->fetchAll();

        for ($i=0; $i < count($result); $i++) {
            return "<div class ='tweetos' id='".$result[$i]->id_tweet."'>".$result[$i]->id_tweet."</div>";
        }
    }
}

public function countTweet($db, $user_id) {
    return $db->query('SELECT COUNT(id_tweet) AS count_tweet FROM tweets WHERE id_user = ?', [$user_id])->fetch();
}

public function getIdTweet () {
    return $this->_id_tweet;
}

public function getIdUser () {
    return $this->_id_user;
}

public function getContent () {
    return $this->_content;
}

public function getCreationDate () {
    return $this->_creation_date;
}

public function getMedia () {
    return $this->_media;
}

public function getDeleted () {
    return $this->_deleted;
}

public function getIsOrigin () {
    return $this->_is_origin;
}

public function getIsReply () {
    return $this->_is_reply;
}

public function getLocation () {
    return $this->_location;
}

public function setIdTweet ($id_tweet) {
    $this->_id_tweet = $id_tweet;
}

public function setIdUser ($id_user) {
    $this->_id_user = $id_user;
}

public function setContent ($content) {
    if(count($content) < 141) {
        $this->_content = $content;  
    }
}

public function setMedia ($media) {
    $this->_media = $media;
}

public function setDeleted ($deleted) {
    $this->_deleted = $deleted;
}

public function setIsOrigin ($is_origin) {
    $this->_is_origin = $is_origin;
}

public function setIsReply ($is_reply) {
    $this->_is_reply = $is_reply;
}

public function setLocation ($location) {
    $this->_location = $location;
}
}
?>