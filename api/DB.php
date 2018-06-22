<?php
	include 'Config.php';

	/**
	 * 
	 */
	class DB 
	{
		public $DB;
		
		public function __construct()
		{
			try {
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$host = HOST;
				$dbname = DATABASE;
				$user = USER;
				$password = PASSWORD;
				$this->DB = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $password, $pdo_options);
			} catch (Exception $e) {
				$message = array(
								"is_success" => false,
								"error_code" => 100,
								"error_msg" =>"Failed to connect to database.", 
								"error_desc" => $e->getMessage()
							);

				die(json_encode($message));
			}
			
		}

		public function GetDB(){
			if (!is_null($this->DB)){
				return $this->DB;
			} else {
				$message = array(
								"is_success" => false,
								"error_code" => 101,
								"error_msg" => "Failed to connect to database.",
								"error_desc" => "The connection is returning a null value."
							);
				echo json_encode($message);
			}
			
		}
	}



?>