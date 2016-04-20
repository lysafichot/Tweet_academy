<?php
class Auth {

    private $options = [
    'restriction' => "Vous n'avez pas la permission d'accéder à cette page"
    ];

    protected $session;

    public function __construct($session, $options = []) {
        $this->options = array_merge($this->options, $options);
        $this->session = $session;
    }

    public function getSession() {
        return $this->session;
    }

    public function hashPassword($password){
        $salt = 'si tu aimes la wac tape dans tes mains';
        return hash('ripemd160', $salt.$password);
    }

    public function register($db, $username, $password, $email) {
        $avatar = '../view/img-user/avatar/profil-man-default.png';
        $cover = '../view/img-user/cover/default-cover.jpg';
        $password = $this->hashPassword($password);
        $token = md5(rand().microtime());
        $db->query("INSERT INTO users SET username = ?, password = ?, email = ?, registration_token = ?, activated = 0, avatar = ?, cover = ?", [
            $username,
            $password,
            $email,
            $token,
            $avatar,
            $cover
            ]);
        $user_id = $db->lastInsertId();
        mail($email, 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/Projet_Web_tweet_academie/view/confirm.php?id_user=$user_id&token=$token");
    }

    public function img_profil($db, $user_id, $image, $path) {
        $validator = new Validator($_POST);
        $validator->isSize($image, 'Votre photo est trop lourde.');
        $validator->isExtension($image, 'Vous ne pouvez mettre que des fichiers avec les extensions suivantes : png, gif, jpg, jpeg.');
        $uploadfile = basename($_FILES[$image]['name']);
        $uploadfile = strtr($uploadfile,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $img = $path.$uploadfile;

        if($validator->isValid()) {
            $this->field_img($db, $user_id, $img, $image);
            move_uploaded_file($_FILES[$image]['tmp_name'], $img);

            $info_user = $this->checkId($db, $user_id);
            return $info_user->image = $img;
        }

        else {
            return $errors = $validator->getErrors();
        }
    }

    public function update($db, $user_id, $data, $field) {
        return $db->query('UPDATE users SET '.$field.' = ? WHERE id_user = ?', [
            $data,
            $user_id
            ]);
    }

    public function delete($db, $user_id) {
        return $db->query('UPDATE users SET activated = 0 WHERE id_user = ?', [$user_id]);
    }

    public function field_img($db, $user_id, $img, $field) {
        return $db->query("UPDATE users SET ".$field." = ? WHERE id_user = ?", [$img, $user_id]);
    }

    public function confirm($db, $user_id, $token) {
        $user = $db->query('SELECT * FROM users WHERE id_user = ?', [$user_id])->fetch();
        if($user && $user->registration_token == $token ) {
            $db->query('UPDATE users SET registration_token = NULL, activated = 1, creation_date = NOW() WHERE id_user = ?', [$user_id]);
            $this->session->write('auth', $user);

            return true;
        }
        return false;
    }

    public function restrict() {
        if(!$this->session->read('auth')){
            $this->session->setFlash('danger', $this->options['restriction']);
            header('Location: ../index.php');
            exit();
        }
    }

    public function user() {
        if(!$this->session->read('auth')) {
            return false;
        }
        return $this->session->read('auth');
    }

    public function connect($user) {
        $this->session->write('auth', $user);
    }

    public function login($db, $username, $password) {
        $user = $db->query('SELECT * FROM users WHERE (username = :username OR email = :username) AND activated = 1 AND creation_date IS NOT NULL', ['username' => htmlspecialchars($username)])->fetch();
        if($user) {
            $password = $this->hashPassword($password);
            if($password == $user->password) {
                $this->connect($user);
                return $user;
            } else {
                return false;
            }
        }
    }

    public function logout() {
        $this->session->delete('auth');
    }

    public function checkId($db, $user_id) {
        return $db->query('SELECT * FROM users WHERE id_user = ?', [$user_id])->fetch();
    }


    public function who($db, $user) {
        return $db->query('SELECT * FROM users WHERE username = ?', [$user])->fetch();
    }
}


