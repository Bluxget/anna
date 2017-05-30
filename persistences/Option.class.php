<?php
	namespace persistences;

	require_once \core\FileManager::getCorePath('Persistence');
	require_once \core\FileManager::getModelPath('Option');

	class Option extends \core\Persistence {

		public static function getAll()
		{
			$options = \libs\DB::query('SELECT * FROM options');

			$optionsObj = array();

			foreach($options as $option)
			{
				$params = array(
						'idOption' => $option['id_option'],
						'name' => $option['name']
					);
				$optionsObj[] = new \models\Option($params);
			}

			return $optionsObj;
		}

		public static function getById(int $id)
		{
			$option = \libs\DB::query('SELECT * FROM options');

			$optionObj = array();


			$params = array(
					'idOption' => $option['id_option'],
					'name' => $option['name']
				);
			$optionObj = new \models\Option($params);

			return $optionObj;
		}

		public static function update(\models\Option &$option)
		{

		}

		public static function delete(\models\Option &$option)
		{

		}
	}
?>
