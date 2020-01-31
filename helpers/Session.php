<?php 

	class Session {

		public static function start() {
			if (!isset($_SESSION)) {
				session_start();
			}
		}

		public static function destroy() {
			if (isset($_SESSION)){
				session_destroy();
			}
		}

		public static function set($key, $value) {
			$_SESSION[$key] = $value;
		}

		public static function unset($key) {
			if (isset($_SESSION[$key])) {
				unset($_SESSION[$key]);
			}
			return true;
		}

		public static function get($key) {
			if (isset($_SESSION[$key])) {
				return $_SESSION[$key];
			}
			return false;
		}


	}
	
 ?>