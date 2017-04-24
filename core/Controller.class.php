<?php
	namespace core;

	/**
	 * Classe modèle des controllers
	 */
	abstract class Controller {
		
		protected $_view;

		public function __construct(View $view)
		{
			$this->_view = $view;
		}

		abstract public function actionDefault();
	}
?>