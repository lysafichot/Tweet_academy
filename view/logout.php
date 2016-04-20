<?php
require '../autoload.php';

App::getAuth()->logout();
Session::getInstance()->setFlash('danger', 'Vous êtes maintenant déconnecté');
App::redirect('../index.php');