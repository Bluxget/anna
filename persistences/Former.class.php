<?php
	namespace persistences;

	require_once \core\FileManager::getCorePath('Persistence');
	require_once \core\FileManager::getModelPath('Former');

	class Former extends \core\Persistence {

		public static function getAll()
		{
			$formers = \libs\DB::query('SELECT * FROM formers INNER JOIN options ON formers.id_option = options.id_option');

			$formersObj = array();

			foreach($formers as $former)
			{
				$params = array(
						'idFormer' => $former['id_former'],
						'idOption' => $former['id_option'],
						'option' => $former['name'],
						'firstName' => $former['first_name'],
						'lastName' => $former['last_name'],
						'email' => $former['email']
					);
				$formersObj[] = new \models\Former($params);
			}

			return $formersObj;
		}

		public static function getOne(int $id)
		{
			$former = \libs\DB::query('SELECT * FROM formers INNER JOIN options ON formers.id_option = options.id_option WHERE id_former = ?', array($id))->fetch();

			$params = array(
						'idFormer' => $former['id_former'],
						'idOption' => $former['id_option'],
						'option' => $former['name'],
						'firstName' => $former['first_name'],
						'lastName' => $former['last_name'],
						'email' => $former['email']
					);
			$formersObj = new \models\Former($params);

			return $formersObj;
		}

		public static function insert(\models\Former $former)
		{
			$params = array(
					$former->getIdOption(), 
					$former->getFirstName(), 
					$former->getLastName(), 
					$former->getEmail()
				);

			\libs\DB::query('INSERT INTO formers(id_option, first_name, last_name, email) VALUES(?, ?, ?, ?)', $params);
		}

		public static function update(\models\Former $former)
		{
			$params = array(
					$former->getIdOption(), 
					$former->getFirstName(), 
					$former->getLastName(), 
					$former->getEmail(), 
					$former->getIdFormer()
				);

			\libs\DB::query('UPDATE formers SET id_option = ?, first_name = ?, last_name = ?, email = ? WHERE id_former = ?', $params);
		}

		public static function delete(\models\Former $former)
		{
			$params = array(
					$former->getIdFormer()
				);

			\libs\DB::query('DELETE FROM formers WHERE id_former = ?', $params);
		}
	}
?>
