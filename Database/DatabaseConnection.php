<?php

namespace Database;

use mysqli;
use Settings\DotEnv;
require_once('Settings/DotEnv.php');

class DatabaseConnection {
	/** @var string Database host     */  private string $db_host;
	/** @var string Database username */  private string $db_username;
	/** @var string Database password */  private string $db_password;
	/** @var string Database name     */  private string $db_databasename;
	protected $mysqli;

	public function __construct() {
		(new DotEnv(__DIR__.'/.env'))->load();
		$this->db_host = getenv('DB_HOST');
		$this->db_username = getenv('DB_USERNAME');
		$this->db_password = getenv('DB_PASSWORD');
		$this->db_databasename = getenv('DB_DATABASE');
	}

	/**
	 * Database connection
	 * @return \mysqli|false
	 * @throws \Exception
	 */
	public function db_connect() : mysqli|bool {
		return  mysqli_connect($this->db_host, $this->db_username, $this->db_password, $this->db_databasename);
	}
}

