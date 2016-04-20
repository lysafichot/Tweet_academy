<div class="container-left-side">
	<div class="dashboard">
	<div class="dashboard-cover">
		<a  href="account.php" title="Profil et paramètres"><img src="<?= $info_user->cover; ?>" alt="<?= $info_user->nickname; ?>"></a>
	</div>
		<div class="dashboard-data">
			<a href="profil.php?id=<?php echo $id; ?>" title="Profil et paramètres"><img src="<?= $info_user->avatar; ?>" alt="<?= $info_user->nickname; ?>"></a>
		</div>
		<div class="dashboard-user">
			<a href="profil.php?id=<?php echo $id; ?>" title="<?= $info_user->nickname; ?>"><?php echo ucfirst($user->nickname); ?></a>
			<a href="profil.php?id=<?php echo $id; ?>" title ="<?= $info_user->nickname; ?>">@<?php echo $user->username; ?></a>
		</div>
		<div class="dashboard-stats">
			<a title="Tweets" href="profil.php?id=<?php echo $id; ?>">
				<span class="describ-stats">Tweets</span>
				<span class="number-stats"><?php echo $count_tweet->count_tweet; ?></span>
			</a>
			<a title="Abonnements" href="following.php?id=<?php echo $id; ?>">
				<span class="describ-stats">Abonnements</span>
				<span class="number-stats"><?php echo $count_following->count_following; ?></span>
			</a>
			<a title="Abonnés" href="followers.php?id=<?php echo $id; ?>">
				<span class="describ-stats">Abonnés</span>
				<span id='abonne' class="number-stats"><?php echo $count_follower->count_follower; ?></span>
			</a>
		</div>
	</div>
	<?php include 'flash.php'; ?>
</div>