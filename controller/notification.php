<?php
require_once '../autoload.php';
require_once '../include/results.php';

$notifs = $follow->AllNotify($db, $user_id);


$notification_all = '';
foreach ($notifs as $notif) {
	$notification_all .= $follow->notif_type($db, $notif->id_notif, $notif->type);
}

require_once '../view/notification.php'; ?>