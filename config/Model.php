<?php 
	
	class Model {
		private $host = DB_HOST;
		private $user = DB_USER;
		private $pass = DB_PASS;
		private $name = DB_NAME;
		protected $conn;
		protected $query;

		public function __construct() {
			try {
				$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->name, $this->user, $this->pass); 
			} catch (Exception $e) {
				return false;
			}
		}

		public function fetchData($query){
			$query = $this->conn->prepare($query);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function fetchSingle($query){
			$query = $this->conn->prepare($query);
			$query->execute();
			return $query->fetch();
		}
	}

 ?>