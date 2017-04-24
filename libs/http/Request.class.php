<?php
	namespace libs\http;

	/**
	 * Classe de gestion de la requête HTTP
	 */
	class Request {

		public function referer() { return $_SERVER['HTTP_REFERER']; }
		public function method() { return $_SERVER['REQUEST_METHOD']; }
		public function uri() { return $_SERVER['REQUEST_URI']; }

		public function sessionExists(string $key) { return isset($_SESSION[$key]); }
		public function sessionData(string $key) { return $this->postExists($key) ? $_SESSION[$key] : null; }

		public function postExists(string $key) { return isset($_POST[$key]); }
		public function postData(string $key) { return $this->postExists($key) ? $_POST[$key] : null; }

		public function getExists(string $key) { return isset($_GET[$key]); }
		public function getData(string $key) { return $this->getExists($key) ? $_GET[$key] : null; }
	}
?>