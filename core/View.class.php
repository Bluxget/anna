<?php
	namespace core;

	/**
	 * Classe gérant la vue
	 */
	class View {
		
		private $_file;
		private $_title;
		private $_datas;

		public function getFile() { return $this->_file; }
		public function getTitle() { return $this->_title; }
		public function getDatas() { return $this->_datas; }

		public function setFile(string $file)
		{
			$this->_file = $file;
		}
		public function setTitle(string $title)
		{
			$this->_title = $title;
		}
		public function setDatas(array $datas)
		{
			$this->_datas = $datas;
		}

		public function output()
		{
			ob_start();

			require_once \core\FileManager::getViewPath($this->_file);

			$output = ob_get_contents();

			ob_end_clean();

			return $output;
		}
	}
?>