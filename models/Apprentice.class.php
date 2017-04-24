<?php
	namespace models;

	require_once \core\FileManager::getCorePath('Model');

	class Apprentice extends \core\Model {

		private $_idApprentice;
		private $_idOption;
		private $_firstName;
		private $_lastName;
		private $_email;

		public function getIdApprentice() { return $this->_idApprentice; }
		public function getIdOption() { return $this->_idOption; }
		public function getfirstName() { return $this->_firstName; }
		public function getLastName() { return $this->_lastName; }
		public function getEmail() { return $this->_email; }

		public function setIdApprentice(int $idApprentice)
		{ 
			$this->_idApprentice = $idApprentice;
		}
		public function setIdOption(int $idOption)
		{ 
			$this->_idOption = $idOption;
		}
		public function setfirstName(string $firstName)
		{ 
			$this->_firstName = $firstName;
		}
		public function setLastName(string $lastName)
		{ 
			$this->_lastName = $lastName;
		}
		public function setEmail(string $email)
		{ 
			$this->_email = $email;
		}
	}
?>
