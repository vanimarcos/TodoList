<?php
	//Operations
	require_once 'DB.php'; 
	require_once 'Task.php';

	if(!empty($_POST["task"])){
		$taskTitle = $_POST["task"];

		$DB = new DB();
		$Task = new Task($DB->GetDB());

		$Task->AddTask($taskTitle);
	}


	if(!empty($_GET["all_tasks"])){
		$DB = new DB();
		$Task = new Task($DB->GetDB());

		$Task->GetAllTasks();
	}


	if(!empty($_POST["task_id"])){
		$taskId = $_POST["task_id"];
		$DB = new DB();
		$Task = new Task($DB->GetDB());

		$Task->Delete($taskId);
	}

?>