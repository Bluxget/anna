<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');
	require_once \core\FileManager::getPersistencePath('Former');

	class Formateurs extends \core\Controller {

		/**
		 * Affiche la liste des formateurs
		 */
		public function actionDefault()
		{
			$datas['formers'] = \persistences\Former::getAll();

			$this->_view->setFile('formateurs_liste');
			$this->_view->setTitle('Liste des formateurs');
			$this->_view->setDatas($datas);
		}

		/**
		 * Affiche le formulaire d'ajout d'un formateur / Ajoute un formateur
		 */
		public function actionAjouter()
		{
			if(\libs\http\Request::postExists('ajouter'))
			{
				$salt = 'K8G9KDZ';

				$params = array(
						'rank' => \libs\http\Request::postData('rang'), 
						'name' => \libs\http\Request::postData('nom'), 
						'password' => sha1($salt . \libs\http\Request::postData('password'))
					);
				$former = new \models\Former($params);

				\persistences\Former::insert($former);

				\libs\http\Response::redirect('?module=formateurs');
			}

			$datas['ranks'] = \persistences\Rank::getAll();

			$this->_view->setFile('formateurs_ajouter');
			$this->_view->setTitle('Ajouter un formateur');
			$this->_view->setDatas($datas);
		}

		/**
		 * Affiche le formulaire de modification d'un formateur / Modifie un formateur
		 */
		public function actionModifier()
		{
			if(\libs\http\Request::postExists('modifier'))
			{
				$params = array(
						'idFormer' => \libs\http\Request::postData('id'), 
						'idRank' => \libs\http\Request::postData('rang'), 
						'name' => \libs\http\Request::postData('nom'), 
						'password' => \libs\http\Request::postData('password')
					);
				$former = new \models\Former($params);

				\persistences\Apprentice::update($former);

				\libs\http\Response::redirect('?module=formateurs');
			}
			else if(\libs\http\Request::postExists('id_former'))
			{
				$datas['former'] = \persistences\Former::getOne(\libs\http\Request::postData('id_former'));
				$datas['ranks'] = \persistences\Rank::getAll();

				$this->_view->setFile('formateurs_modifier');
				$this->_view->setTitle('Modifier un formateur');
				$this->_view->setDatas($datas);
			}
			else
			{
				\libs\http\Response::redirect('?module=formateurs');
			}
		}

		/**
		 * Supprime un formateur
		 */
		public function actionSupprimer()
		{
			if(\libs\http\Request::postExists('id_former'))
			{
				$params = array(
						'idFormer' => \libs\http\Request::postData('id_former')
					);

				$former = new \models\Former($params);

				\persistences\Former::delete($former);
			}

			\libs\http\Response::redirect('?module=formateurs');
		}
	}
?>