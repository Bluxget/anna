<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Authentification extends \core\Controller {

		/**
		 * Affiche la page d'authentification
		 */
		public function actionDefault()
		{
			if(\libs\http\Request::sessionExists('id_former'))
				\libs\http\Response::redirect('index.php');

			$this->_view->setFile('authentification');
			$this->_view->setTitle('Authentification');
		}

		/**
		 * L'utilisateur valide le formulaire d'authentification
		 */
		public function actionConnect()
		{
			if(\libs\http\Request::sessionExists('id_former'))
				\libs\http\Response::redirect('index.php');

			if(isset($_POST['username'], $_POST['password']))
			{
				$salt = 'K8G9KDZ';

				$reqResult = \libs\DB::query('SELECT * FROM formers WHERE name = ? AND password = ? LIMIT 1', array($_POST['username'], sha1($salt . $_POST['password'])));

				if(count($reqResult) > 0)
				{
					$_SESSION['id_former'] = $reqResult[0]['id_former'];

					\libs\http\Response::redirect('index.php');
				}
			}

			$this->_view->setFile('authentification_error');
			$this->_view->setTitle('Authentification');
		}

		/**
		 * L'utilisateur se deconnecte
		 */
		public function actionDisconnect()
		{
			session_destroy();

			$this->_view->setFile('authentification');
			$this->_view->setTitle('Authentification');
		}
	}
?>