<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');
	require_once \core\FileManager::getPersistencePath('Apprentice');
	require_once \core\FileManager::getPersistencePath('Option');

	class Apprentis extends \core\Controller {

		/**
		 * Affiche la liste des apprentis
		 */
		public function actionDefault()
		{
			$datas['apprentices'] = \persistences\Apprentice::getAll();

			$this->_view->setFile('apprentis_liste');
			$this->_view->setTitle('Liste des apprentis');
			$this->_view->setDatas($datas);
		}

		/**
		 * Affiche le formulaire d'ajout d'apprenti / Ajoute un apprenti
		 */
		public function actionAjouter()
		{
			if(\libs\http\Request::postExists('ajouter'))
			{
				$params = array(
						'idOption' => \libs\http\Request::postData('option'), 
						'lastName' => \libs\http\Request::postData('nom'), 
						'firstName' => \libs\http\Request::postData('prenom'), 
						'email' => \libs\http\Request::postData('email')
					);
				$apprentice = new \models\Apprentice($params);

				\persistences\Apprentice::insert($apprentice);

				\libs\http\Response::redirect('?module=apprentis');
			}

			$datas['options'] = \persistences\Option::getAll();

			$this->_view->setFile('apprentis_ajouter');
			$this->_view->setTitle('Ajouter un apprenti');
			$this->_view->setDatas($datas);
		}

		/**
		 * Affiche le formulaire de modification d'apprenti / Modifie un apprenti
		 */
		public function actionModifier()
		{
			if(\libs\http\Request::postExists('modifier'))
			{
				$params = array(
						'idApprentice' => \libs\http\Request::postData('id'), 
						'idOption' => \libs\http\Request::postData('option'), 
						'lastName' => \libs\http\Request::postData('nom'), 
						'firstName' => \libs\http\Request::postData('prenom'), 
						'email' => \libs\http\Request::postData('email')
					);
				$apprentice = new \models\Apprentice($params);

				\persistences\Apprentice::update($apprentice);

				\libs\http\Response::redirect('?module=apprentis');
			}
			else if(\libs\http\Request::postExists('id_apprentice'))
			{
				$datas['apprentice'] = \persistences\Apprentice::getOne(\libs\http\Request::postData('id_apprentice'));
				$datas['options'] = \persistences\Option::getAll();

				$this->_view->setFile('apprentis_modifier');
				$this->_view->setTitle('Modifier un apprenti');
				$this->_view->setDatas($datas);
			}
			else
			{
				\libs\http\Response::redirect('?module=apprentis');
			}
		}

		/**
		 * Supprime un apprenti
		 */
		public function actionSupprimer()
		{
			if(\libs\http\Request::postExists('id_apprentice'))
			{
				$params = array(
						'idApprentice' => \libs\http\Request::postData('id_apprentice')
					);

				$apprentice = new \models\Apprentice($params);

				\persistences\Apprentice::delete($apprentice);
			}

			\libs\http\Response::redirect('?module=apprentis');
		}

		/**
		 * Importe les apprentis à partir d'un CSV
		 */
		public function actionCsv()
		{
			if(\libs\http\Request::postExists('fichier'))
			{
				/*$file = fopen($_FILES['attachment']['tmp_name']);
				
				while(($line = fgetcsv($file, 1000, ",")) !== FALSE)
				{
					$params = array(
						'idApprentice' => \libs\http\Request::postData('id_apprentice')
					);

					$apprentice = new \models\Apprentice($params);

					\persistences\Apprentice::delete($apprentice);
				}*/
			}

			$this->_view->setFile('apprentis_csv');
			$this->_view->setTitle('Importer des apprentis');
		}
	}
?>