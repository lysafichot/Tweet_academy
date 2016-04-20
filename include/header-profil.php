	<div class="profil-container">
		<div class="cover-profil">
			<img src="<?= $user->cover; ?>" alt="<?= $user->cover; ?>">
		</div>
		<div class="profil-stats-container">
			<div class="profil-stats">	
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
				<div class="profil-stats-button">
					<a class="modif-profil" href="account.php" title="Profil et paramètres">Editer mon profil</a>
				</div>
			</div>
		</div>
	</div>