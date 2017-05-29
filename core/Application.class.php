<?php
	namespace core;

	require_once \core\FileManager::getLibPath('http/Request');
	require_once \core\FileManager::getLibPath('http/Response');
	require_once \core\FileManager::getLibPath('DB');
	require_once \core\FileManager::getCorePath('View');

	/**
	 * Classe principale de l'application
	 */
	class Application {
		
		private $_view;
		private $_user;
		private $_controller;

		/**
		 * Constructeur
		 */
		public function __construct()
		{
			$this->_view = new \core\View;
		}
		
		/**
		 * Analyse la requête et l'execute si possible, sinon retourne une erreur 404
		 */
		public function init()
		{
			//$_SESSION['id_user'] = '1';
			// Si l'utilisateur est connecté
			if(\libs\http\Request::sessionExists('id_former'))
			{
				$this->_user = new \models\Former(array(
														'idFormer' => (int)\libs\http\Request::sessionData('id_former')
													)
												);

				// Chargement du module
				if(\libs\http\Request::getExists('module'))
				{
					$controller = \libs\http\Request::getData('module');
				}
				else
				{
					\libs\http\Response::redirect('?module=marks');
				}
			}
			else
			{
				$controller = 'authentification';
			}

			$controller = ucfirst($controller);

			if(file_exists(\core\FileManager::getControllerPath($controller)))
			{
				// Inclusion de la class du module
				require_once \core\FileManager::getControllerPath($controller);

				$controller = '\\controllers\\'. $controller;
				// Création de l'objet
				$this->_controller = new $controller($this->_view);
			}
			else
			{
				\libs\http\Response::redirect404();
			}
		}

		/**
		 * Lance l'application et retourne le texte à afficher
		 */
		public function execute()
		{
			// Appel de la méthode par rapport au _GET ou default si inexistant
			if(\libs\http\Request::getExists('action'))
			{
				if(method_exists($this->_controller, 'action'. ucfirst(\libs\http\Request::getData('action'))))
				{
					$action = \libs\http\Request::getData('action');
				}
				else
				{
					\libs\http\Response::redirect404();
				}
			}
			else
			{
				$action = 'default';
			}

			$action = 'action'. ucfirst($action);

			$this->_controller->$action();

			\libs\http\Response::send($this->_view);
		}
	}
?>
