<?php 

	class Controller {
		protected $action;
		protected $request;
		protected $module;

		public function __construct($action, $request) {
			$this->action = $action;
			$this->request = $request;
			$this->module =  $action;
		}

		public function renderView() {
			$view = $this->{$this->action}();
			$tpl = __DIR__.'../../views/'.$view['tpl'].'.php';
			$data = $view['data'];
			include_once (__DIR__.'../../views/layout.php');
		}
	}
	
 ?>