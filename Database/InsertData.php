<?php
	use Database\DatabaseConnection;
	require_once('DatabaseConnection.php');

	class InsertData extends DatabaseConnection{

		/**
		 * @throws \Exception
		 */
		public function InserUser($chat_id, $value) {
			$this->db_connect();
			$sql = "INSERT INTO users ($chat_id) VALUES ($value)";
			$this->mysqli->query($sql);
		}
	}