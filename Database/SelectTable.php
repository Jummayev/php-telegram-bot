<?php
	use Database\DatabaseConnection;
	require_once('DatabaseConnection.php');

	class SelectTable extends DatabaseConnection {

		/**
		 * @throws \Exception
		 */
		public function selectData($tableName) : mysqli_result|bool {
			$sql = "SELECT * FROM $tableName";
			return mysqli_query($this->db_connect(), $sql);
		}

		/**
		 * @param $tableName
		 * @param $columnName
		 * @param $value
		 * @return bool|\mysqli_result
		 * @throws \Exception
		 */
		public function showData($tableName, $columnName, $value) : bool|mysqli_result {
			$sql = "SELECT * FROM $tableName WHERE $columnName = $value";
			return 	mysqli_query($this->db_connect(), $sql);
		}

	}

//$k = new SelectTable();
//	print_r(mysqli_fetch_array($k->selectData('users')));
