<?php
	namespace models;

	require_once \core\FileManager::getCorePath('Model');

	class Former extends \core\Model {

		private $_idFormer;
		private $_idRank;
		private $_name;
		private $_password;

		public function getIdFormer() { return $this->_idFormer; }
		public function getIdRank() { return $this->_idRank; }
		public function getName() { return $this->_name; }
		public function getPassword() { return $this->_password; }

		public function setIdFormer(int $idFormer)
		{ 
			$this->_idFormer = $idFormer;
		}
		public function setIdRank(int $idRank)
		{ 
			$this->_idRank = $idRank;
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
