<?php
	use Database\DatabaseConnection;
	require_once('DatabaseConnection.php');

	class InsertData extends DatabaseConnection{

		/**
		 * @throws \Exception
		 */
		public function InserUser($column = [], $value = []) {
			$this->db_connect();
			$sql = "INSERT INTO users ($column) VALUES ($value)";
		}
	}