<?php
	namespace models;

	require_once \core\FileManager::getCorePath('Model');

	class Mark extends \core\Model {

		private $_idApprentice;
		private $_idTest;
		private $_published;
		private $_mark;

		public function getIdApprentice() { return $this->_idApprentice; }
		public function getIdTest() { return $this->_idTest; }
		public function getPublished() { return $this->_published; }
		public function getMark() { return $this->_mark; }

		public function setIdApprentice(int $idApprentice)
		{ 
			$this->_idApprentice = $idApprentice;
		}
		public function setIdTest(int $idTest)
		{ 
			$this->_idTest = $idTest;
		}
		public function setPublished(bool $published)
		{ 
			$this->_published = $published;
		}
		public function setMark(double $mark)
		{ 
			$this->_mark = $mark;
		}
	}
?>
