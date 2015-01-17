<?php
	require_once("config.php");
	class Database {
		private $connection;
		
		public function __construct() {
			$this->connect();
		}
		
		public function connect() {
			$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
			if(mysql_errno()) {
				die("Failed to connect".mysqli_connect_error());
			}
			else {
				$db_select = mysqli_select_db($this->connection,DB_NAME);
			}
			
			if(!$db_select) {
				die("Database Not Selected".mysql_error());
			}
		}
		
		public function query($sql) {
			$result = mysqli_query($this->connection,$sql);
			
			if(!$result) {
				die("Query Can't be Executed".mysql_error());
			}
			return $result;
		}
		
		public function disconnect() {
			if(isset($this->connection)) {
				mysqli_close($this->connection);
				unset($this->connection);
			}
		}
	
	}
	
	$db = new Database();
?>