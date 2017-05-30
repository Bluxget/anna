<?php
	namespace core;

	/**
	 * Classe modèle des controllers
	 */
	abstract class Controller {
		
		protected $_view;
		protected $_access = 'formateur';

		public function __construct(View $view)
		{
			$this->_view = $view;
		}

		public function getAccess() { return $this->_access; }

		abstract public function actionDefault();
	}
?>