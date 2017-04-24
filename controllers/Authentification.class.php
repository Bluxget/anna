<?php
	namespace controllers;

	require_once \core\FileManager::getCorePath('Controller');

	class Authentification extends \core\Controller {

		/**
		 * Affiche la page d'authentification
		 */
		public function actionDefault()
		{
			$i = 32;

			$datas['i'] = $i;

			$this->_view->setDatas($datas);

			$this->_view->setFile('test');
			$this->_view->setTitle('Test');
			//$this->_view->setDatas(array('Test'));
		}
	}
?>