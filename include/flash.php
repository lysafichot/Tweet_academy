<?php if(Session::getInstance()->hasFlashes()): ?>
	<?php foreach(Session::getInstance()->getFlashes() as $type => $message): ?>
		<div class="alert-<?= $type; ?>">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<p><?= $message; ?></p>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<?php if(!empty($errors)): ?>
	<?php foreach($errors as $error): ?>
		<div class="alert-danger">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<p><?= $error; ?></p>
		</div>
	<?php endforeach; ?>
<?php endif; ?>