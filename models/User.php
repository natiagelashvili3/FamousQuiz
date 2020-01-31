<?php 
	
	class User extends Model{
		
		public function getMember($username, $password) {
			return $this->fetchSingle("SELECT * FROM admins WHERE username = '".$username."' AND password = '".$password."' ");
		}

	}


 ?>