<?php 
class Message extends Auth {

	private $id_mess;
	private $id_sender;
	private $id_receiver;
	
	public function __construct($session, $id_receiver = null, $options = []) {
		parent::__construct($session, $options = []);
		$this->id_sender = $session->id_user;
		$this->id_receiver = $id_receiver;
	}

	public function send($db, $content) {
		return $db->query('INSERT INTO messages SET id_sender = ?, id_receiver = ?, content = ?, date = NOW()', 
			[$this->id_sender, $this->id_receiver, $content]);
	}

	public function reception($db) {
		return $db->query('SELECT * FROM messages WHERE id_receiver = ? ORDER BY date ASC', [$this->id_sender])->fetchAll();
	}

	public function myMessage($db) {
		return $db->query('SELECT * FROM messages WHERE id_sender = ? ORDER BY date ASC', [$this->id_sender])->fetchAll();
	}

	public function getConv($db)
	{
		$allConv = [];

		$req = $db->query("SELECT * FROM messages INNER JOIN users ON messages.id_sender = users.id_user WHERE messages.id_receiver = ?", [$this->id_sender]);
		foreach ($req->fetchAll() as $key => $value)
		{
			$newConvers = 0;
			$alreadyIn = 0;

			foreach ($allConv as $key2 => $value2)
			{
				if ($value2[0] == $value->username)
				{
					$alreadyIn = 1;
				}
			}
			if ($alreadyIn == 0)
			{
				array_push($allConv, [$value->username, $value->id_user, $value->avatar]);
			}
		}
		foreach ($allConv as $key => $value)
		{
			echo "<div class=\"notif_follow\"><a href='message.php?to=".$value[0]."&getMessages=".$value[1]."' title='voir les messages avec".$value[0]."'><img src=".$value[2]." alt=".$value[0]."><p>Voir votre conversation avec <span>".$value[0]."</span></p></a></div>";
		}
	}

	public function getMessages($db)
	{
		$req = $db->query("SELECT * FROM messages LEFT JOIN users ON messages.id_sender = users.id_user WHERE messages.id_receiver = ? AND messages.id_sender = ? OR messages.id_receiver = ? AND messages.id_sender = ? ORDER BY 'date' DESC", [$this->id_sender, $this->id_receiver, $this->id_receiver, $this->id_sender]);

		foreach ($req->fetchAll() as $key => $value)
		{
			if ($value->username != $_SESSION["auth"]->username)
			{
				echo "<div class=\"message-exp\">
	<div class=\"image-message-exp\">
	<a href='profil.php?id=".$value->id_sender."'>
	<img src='".$value->avatar."' alt=".$value->username.">
	</a>	
	</div>
	<div class=\"message-exp-sended\">
		<label>".$value->content."</label>
		<span>".$value->date."</span>
	</div>
</div>";
			}
			else
			{
				echo "<div class=\"message-dest\">
	<div class=\"image-message-dest\">
		<a href='profil.php?id=".$value->id_receiver."'>
			<img src='". $_SESSION["auth"]->avatar ."' alt='". $_SESSION["auth"]->username ." profile picture'>
		</a>	
	</div>
	<div class=\"message-dest-sended\">
		<label>".$value->content."</label>
		<span>".$value->date."</span>
	</div>
</div>";
}


		}
	}
}
?>