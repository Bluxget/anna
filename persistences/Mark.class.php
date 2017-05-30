<?php
	namespace persistences;

	require_once \core\FileManager::getCorePath('Persistence');
	require_once \core\FileManager::getModelPath('Mark');

	class Mark extends \core\Persistence {

		public static function getAll()
		{
			$marks = \libs\DB::query('SELECT * FROM marks INNER JOIN apprentices ON marks.id_apprentice = apprentices.id_apprentice INNER JOIN options ON apprentices.id_option = options.id_option');

			$marksObj = array();

			foreach($marks as $mark)
			{
				$params = array(
						'idApprentice' => $mark['id_apprentice'],
						'idFormer' => $mark['id_former'],
						'idTest' => $mark['id_test'],
						'mark' => $mark['mark'],
						'comment' => $mark['comment'],
						'published' => $mark['published']
					);
				$marksObj[] = new \models\Mark($params);
			}

			return $marksObj;
		}

		public static function getById(int $id)
		{
			$mark = \libs\DB::query('SELECT * FROM marks INNER JOIN apprentices ON marks.id_apprentice = apprentices.idapprentice INNER JOIN options ON apprentices.id_option = options.id_option WHERE marks.id_apprentice = ?', array($id))->fetch();

			$params = array(
						'idApprentice' => $mark['id_apprentice'],
						'idFormer' => $mark['id_former'],
						'idTest' => $mark['id_test'],
						'mark' => $mark['mark'],
						'comment' => $mark['comment'],
						'published' => $mark['published']
					);
			$marksObj = new \models\Mark($params);

			return $marksObj;
		}

		public static function insert(\models\Mark &$mark)
		{
			$params = array(
					$mark->getIdApprentice(),
					$mark->getIdFormer(),
					$mark->getIdTest(),
					$mark->getMark(),
					$mark->getComment()
				);

			\libs\DB::query('INSERT INTO marks(id_apprentice, id_former, id_test, mark, comment) VALUES(?, ?, ?, ?, ?)', $params);
		}

		public static function delete(\models\Mark &$mark)
		{
			$params = array(
					$mark->getIdApprentice(),
					$mark->getIdFormer()
				);

			\libs\DB::query('DELETE FROM marks WHERE id_apprentice = ? AND id_former = ? LIMIT 1', $params);

			unset($mark);
		}
	}
?>

	
