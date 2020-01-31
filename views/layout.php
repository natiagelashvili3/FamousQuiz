<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>
	<link rel="stylesheet" type="text/css" href="<?= ROOT_URL.'assets/css/style.css' ?>">
</head>
<body>

	<nav class="site-header">
		<div class="logo">
			QuizApp
		</div>
		<div class="container">
			<a class="link-item <?= isset($data['module']) && $data['module'] == 'home' ? 'active' : '' ?>" href="<?= SITE_URL ?>">Home</a>
			<a class="link-item <?= isset($data['module']) && $data['module'] == 'binary' ? 'active' : '' ?>" href="<?= SITE_URL.'quiz/binary' ?>">Binary</a>
			<a class="link-item <?= isset($data['module']) && $data['module'] == 'multiple' ? 'active' : '' ?>" href="<?= SITE_URL.'quiz/multiple' ?>">Multiple</a>
		</div>
	</nav>

	<div>
			
		<?php require_once($tpl) ?>

	</div>

	<script type="text/javascript" src="<?= ROOT_URL.'assets/js/script.js' ?>"></script>
</body>
</html>