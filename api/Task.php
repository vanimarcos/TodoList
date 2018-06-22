<?php
	// include 'DB.php';

/**
 * 
 */
	class Task  
	{
		private $DB;
		private $STMT;
		private $Query;

		function __construct($DB)
		{
			$this->DB = $DB;
		}

		public function GetAllTasks(){
			$this->Query = "SELECT * FROM task";
			$this->STMT = $this->DB->prepare($this->Query);
			$this->STMT->execute();
			// $a = array("a"=>$this->STMT->rowCount());
			// echo json_encode($a);
			if ($this->STMT->rowCount() > 0){
				$tasks = array();
				foreach ($this->STMT as $Row) {
					$task = array("task_id" => $Row[0], "task_text" => $Row[1]); // fetch the task and save it
					array_push($tasks, $task);
				}

				$message  = array(
								"is_success" => true,
								"tasks"	=> $tasks,
								"success_msg" => "Tasks fetched successfully."
							); 
				echo json_encode($message);
			} else {
				$message  = array(
								"is_success" => false,
								"error_code" => 150,
								"error_msg" =>"No tasks saved in database."
							); 
				echo json_encode($message);
			}
		}

		public function GetNumbTasks(){
			$this->Query = "SELECT * FROM task";
			$this->STMT = $this->DB->prepare($this->Query);
			$this->STMT-> execute();
			echo "There are " . $this->STMT->rowCount() . " tasks.";
		}

		public function GetTasksByQuery($query){
			// requires implementation.
		}

		public function AddTask($title){
			$this->Query = "INSERT INTO task(title) VALUE(:title)";
			$this->STMT = $this->DB->prepare($this->Query);
			$this->STMT->execute(array(":title" => $title));
			$task_id = $this->DB->lastInsertId();
			$message = array(
							"is_success" => true,
						 	"task_id" => $task_id,
						 	"success_msg" => "Task created successfully."
							);
			echo json_encode($message);
		}

		public function Delete($taskId){
			$this->Query = "DELETE FROM task WHERE id = :taskId";
			$this->STMT = $this->DB->prepare($this->Query);
			$this->STMT->execute(array(":taskId" => $taskId));
			$message = array(
							"is_success" => true,
						 	"task_id" => $taskId,
						 	"success_msg" => "Task deleeted successfully."
							);
			echo json_encode($message);
		}

	}

?>