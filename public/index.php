<?php 

	require_once('../config/config.php');
	require_once('../helpers/Session.php');
	require_once('../config/Controller.php');
	require_once('../config/Model.php');
	require_once('../config/Page.php');


	Session::start();
	
	$page = new Page($_GET);
	$controller = $page->getController();


	if ($controller) {
		$controller->renderView();
	} else {
		print_r('No page found');
	}
 ?>