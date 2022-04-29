<?php

namespace Database;

use mysqli;

class DatabaseConnection {
	protected $db_host;
	protected $db_username;
	protected $db_password;
	protected $db_databasename;
	protected $mysqli;

	public function __construct() {
		$this->db_host = 'localhost';
		$this->db_username = 'root';
		$this->db_password = '';
		$this->db_databasename = 'bot_telegram';
	}

	/**
	 * Database connection
	 * @return void
	 * @throws \Exception
	 */
	public function db_connect() {
		$this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_databasename);
	}
}

