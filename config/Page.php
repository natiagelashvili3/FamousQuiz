<?php 
	
	class Page {
		private $controller;
		private $action;
		private $request;

		public function __construct($request) {
			$this->request 	  = $request;
			$this->controller = isset($request['controller']) && $request['controller'] ? $request['controller'] : 'home';
			$this->action 	  = isset($request['action']) && $request['action'] ? $request['action'] : 'index';
		}

		public function getController(){

			$file = $this->getInstanceName();

			if (file_exists($file)) {
				include_once $file;
				$instance = new $this->controller($this->action, $this->request);
				return $instance;
			} else {
				return false;
			}
		}

		private function getInstanceName() {
			$controllerFile = ucfirst($this->controller);
			$file = __DIR__.'../../controllers/'.$controllerFile.'Controller.php';
			return $file;
		}

	}

 ?>