<?php
require_once '../../autoload.php';

$auth = App::getAuth();
$db = App::getDatabase();

if(!empty($_POST["keyword"])) {
	
	if(stristr($_POST['keyword'], "@")) {
		$_POST['keyword'] = str_ireplace("@", " ", $_POST['keyword']);
		$_POST['keyword'] = trim($_POST['keyword']);
	}
	
	$username = $db->query("SELECT * FROM users WHERE username like '" . $_POST["keyword"] . "%' ORDER BY username LIMIT 0,6")->fetchAll();

	if(!empty($username)) { ?> 
		<ul> 
		<?php foreach($username as $value) { ?>
				<li class="user" ><a href='profil.php?id=<?php echo $value->id_user ?> '><img src="<?= $value->avatar; ?>" alt="<?= $value->avatar; ?>"><span><p><?php echo $value->nickname; ?></p><p>@<?php echo $value->username; ?></p></span></a></li>
		<?php } ?>
		</ul> 
	<?php } 
} 
?>