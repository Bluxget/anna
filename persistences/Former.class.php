<?php
	namespace persistences;

	require_once \core\FileManager::getCorePath('Persistence');
	require_once \core\FileManager::getModelPath('Former');

	class Former extends \core\Persistence {

		public const RANKS = array('formateur', 'responsable');

		public static function getAll()
		{
			$formers = \libs\DB::query('SELECT * FROM formers');

			$formersObj = array();

			foreach($formers as $former)
			{
				$params = array(
						'idFormer' => $former['id_former'],
						'rank' => $former['rank'],
						'name' => $former['name']
					);
				$formersObj[] = new \models\Former($params);
			}

			return $formersObj;
		}

		public static function getById(int $id)
		{
			$former = \libs\DB::query('SELECT * FROM formers WHERE id_former = ?', array($id))->fetch();

			$params = array(
						'idFormer' => $former['id_former'],
						'rank' => $former['rank'],
						'name' => $former['name']
					);
			$formersObj = new \models\Former($params);

			return $formersObj;
		}

		public static function isValid(\models\Former &$former)
		{
			$params = array(
					$former->getName(), 
					$former->getPassword()
				);

			$req = \libs\DB::query('SELECT * FROM formers WHERE name = ? AND password = ? LIMIT 1', $params)->fetch();

			if($req != FALSE)
			{
				$former->setIdFormer($req['id_former']);

				return TRUE;
			}

			return FALSE;
		}

		public static function insert(\models\Former &$former)
		{
			$params = array(
					$former->getRank(), 
					$former->getName(), 
					$former->getPassword()
				);

			\libs\DB::query('INSERT INTO formers(rank, name, password) VALUES(?, ?, ?)', $params);

			$former->setIdFormer(\libs\DB::getLastInsertId());
		}

		public static function update(\models\Former &$former)
		{
			$params = array(
					$former->getRank(), 
					$former->getName(), 
					$former->getPassword(), 
					$former->getIdFormer()
				);

			\libs\DB::query('UPDATE formers SET rank = ?, name = ?, password = ? WHERE id_former = ? LIMIT 1', $params);
		}

		public static function delete(\models\Former &$former)
		{
			$params = array(
					$former->getIdFormer()
				);

			\libs\DB::query('DELETE FROM formers WHERE id_former = ? LIMIT 1', $params);

			unset($former);
		}
	}
?>
