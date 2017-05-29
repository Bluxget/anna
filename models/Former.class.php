<?php
	namespace models;

	require_once \core\FileManager::getCorePath('Model');

	class Former extends \core\Model {

		private $_idFormer;
		private $_rank;
		private $_name;
		private $_password;

		public function getIdFormer() { return $this->_idFormer; }
		public function getRank() { return $this->_rank; }
		public function getName() { return $this->_name; }
		public function getPassword() { return $this->_password; }

		public function setIdFormer(int $idFormer)
		{ 
			$this->_idFormer = $idFormer;
		}
		public function setRank(int $idRank)
		{ 
			$this->_rank = $rank;
		}
		public function setName(string $name)
		{ 
			$this->_name = $name;
		}
		public function setPassword(string $password)
		{ 
			$this->_password = $password;
		}
	}
?>
