<?php
	namespace core;

	/**
	 * Classe modèle des models
	 */
	abstract class Model {
		
		/**
		 * Constructeur
		 */
		public function __construct(array $datas = null)
		{
			if(!empty($datas))
			{
				$this->hydrate($datas);
			}
		}

		/**
		 * Hydrate
		 */
		public function hydrate(array $datas)
		{
			foreach($datas as $key => $value)
			{
				$method = 'set'. ucfirst($key);
				
				if(method_exists($this, $method))
				{
					$this->$method($value);
				}
			}
		}
	}
?>