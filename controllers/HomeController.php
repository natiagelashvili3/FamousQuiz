<?php 
	
	class Home extends Controller {

		protected $data = [];


		/**
	     * Display main page of the website
	     */			
		public function index() {

			return ['tpl' => 'home/index', 'data' => ['module' => 'home']];
		
		}
	
	}

 ?>