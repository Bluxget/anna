<?php
	namespace core;

	require_once \core\FileManager::getLibPath('http/Request');
	require_once \core\FileManager::getLibPath('http/Response');
	require_once \core\FileManager::getCorePath('View');

	/**
	 * Classe principale de l'application
	 */
	class Application {
		
		private $_httpRequest;
		private $_httpResponse;
		private $_view;
		private $_user;
		private $_controller;

		/**
		 * Constructeur
		 */
		public function __construct()
		{
			$this->_httpRequest = new \libs\http\Request;
			$this->_httpResponse = new \libs\http\Response;
			$this->_view = new \core\View;
		}
		
		/**
		 * Analyse la requête et l'execute si possible, sinon retourne une erreur 404
		 */
		public function init()
		{
			//$_SESSION['id_user'] = '1';
			// Si l'utilisateur est connecté
			if($this->_httpRequest->sessionExists('id_user'))
			{
				$this->_user = new \models\Former(array(
														'idUser' => $this->_httpRequest->sessionData('id_user')
													)
												);

				// Chargement du module
				if($this->_httpRequest->getExists('module'))
				{
					$controller = $this->_httpRequest->getData('module');
				}
				else
				{
					$this->_httpResponse->redirect404();
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
				$this->_httpResponse->redirect404();
			}
		}

		/**
		 * Lance l'application et retourne le texte à afficher
		 */
		public function execute()
		{
			// Appel de la méthode par rapport au _GET ou default si inexistant
			if($this->_httpRequest->getExists('action'))
			{
				if(method_exists($this->_controller, 'action'. ucfirst($this->httpRequest->getData('action'))))
				{
					$action = $this->httpRequest->getData('action');
				}
				else
				{
					$this->_httpResponse->redirect404();
				}
			}
			else
			{
				$action = 'default';
			}

			$action = 'action'. ucfirst($action);

			$this->_controller->$action();

			$this->_httpResponse->send($this->_view);
		}
	}
?>
