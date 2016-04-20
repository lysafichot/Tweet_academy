<?php
require_once '../autoload.php';
require_once '../include/results.php';

$followTimeline = new tweet();

$followTimeline->Tweet_follower($user_id);

?>