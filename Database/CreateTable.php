<?php
	use Database\DatabaseConnection;
	require_once('DatabaseConnection.php');

	class CreateTable extends DatabaseConnection {

		/**
		 * @return void
		 * @throws \Exception
		 */
		public function run() : void {
			$this->createUsersTable();
		}

		/**
		 * Create users table
		 * @return void
		 * @throws \Exception
		 */
		private function createUsersTable() : void {
			$sql = "CREATE TABLE users (
    					id INT(15) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    					full_name VARCHAR(255),
    					user_id VARCHAR(15)	UNIQUE NOT NULL,
    					legal_entity BOOL default false,
    					lang VARCHAR(2) NULL,
    					reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
			mysqli_query($this->db_connect(), $sql);
			echo 'create users table successfully';
		}
	}
	$createTable = new CreateTable();
	try {
		$createTable->run();
	} catch (Exception $e) {
		$date = new DateTime(null, new DateTimeZone('Asia/Tashkent'));
		error_log("\n========== ".$date->format("Y-m-d H:i:s")." ========== \nDatabase Connection Failed\n".$e->getMessage()."\n", 3, 'errors.log');
		echo "Xatolik yuzberdi xatolikni ko'rish uchun errors.log falyni oching xatolik vaqti -> ".$date->format("Y-m-d H:i:s");
	}
