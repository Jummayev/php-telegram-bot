<?php
	use Database\DatabaseConnection;
	require_once('DatabaseConnection.php');

	class SelectTable extends DatabaseConnection {

		/**
		 * @throws \Exception
		 */
		public function selectData($tableName) {
			$this->db_connect();
			$sql = "SELECT * FROM $tableName";
			return $this->mysqli->query($sql);
		}

		/**
		 * @param $tableName
		 * @param $columnName
		 * @param $value
		 * @return mixed
		 * @throws \Exception
		 */
		public function showData($tableName, $columnName, $value) {
			$this->db_connect();
			$sql = "SELECT * FROM $tableName WHERE $columnName = $value";
			return $this->mysqli->query($sql);
		}

	}

$k = new SelectTable();
	print_r($k->selectData("users"));
