<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>
	<link rel="stylesheet" type="text/css" href="<?= ROOT_URL.'assets/admin_resources/css/style.css' ?>">
</head>
<body>
	<?php if (Session::get('user_id')): ?>
		<nav class="admin-menu">
			<a href="<?= SITE_URL.'admin/questions' ?>" class="active">Questions</a>
			<a href="<?= SITE_URL.'admin/logout' ?>">Log Out</a>
		</nav>
		<div class="main-container">
				
			<?php require_once($tpl) ?>

		</div>
	<?php else: ?>
		<div >
				
			<?php require_once($tpl) ?>

		</div>
	<?php endif ?>


	<script type="text/javascript" src="<?= ROOT_URL.'assets/admin_resources/js/script.js' ?>"></script>
</body>
</html>