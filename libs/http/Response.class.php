<?php
	namespace libs\http;

	/**
	 * Classe de gestion de la réponse HTTP
	 */
	class Response {
 
		public function addHeader($header)
		{
			header($header);
		}

		public function redirect($location)
		{
			header('Location: '. $location);
			exit;
		}

		public function redirect404()
		{
			header('HTTP/1.0 404 Not Found');
			exit;
		}

		public function send(\core\View $view)
		{
			exit($view->output());
		}
 
		// Changement par rapport à la fonction setcookie() : le dernier argument est par défaut à true
		public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
		{
			setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
		}
	}
?>