$(document).ready(function(){

	$("div.close_button").click(function(){
		console.log(this);
		$(this).parents("li").remove();
	});

	$("#add_task").click(function(){
		var task_title = $("#task_title").val();
		if($.trim(task_title) != ""){
			$.ajax({
				url: "api/Operations.php",
				method: "POST",
				data: {task: task_title},
				dataType: "json",
				success: function(data){
					writeTask(data.task_id, task_title);
				},
				error: function(error){
					if (error.status === 404){
						console.log("The file requested does not exist.");
					} 
					console.log(error);
				}
			});
		}
	});

	loadTaskToList();



});

function removeElement(a){
	var id = $(a).parents("li").attr("id");
	$.ajax({
		url: "api/Operations.php",
		method: "POST",
		data: {task_id: id},
		dataType: "json",
		success: function(data){
			$(a).parents("li").fadeOut("slow");
		},
		error: function(error){
			if (error.status === 404){
				console.log("The file requested does not exist.");
				// console.log(error.statusText);
			} 
			console.log(error);
		}
	});

}

function loadTaskToList(){
	$.ajax({
	url: "api/Operations.php",
	method: "GET",
	data: {all_tasks:"nothing"},
	dataType: "json",
	success: function(data){
		var tasks = data.tasks;
		$.each(tasks, function(key, value){
			writeTask(value.task_id, value.task_text);
		});
		getAllCheckBoxes();
	},
	error: function(error){
		if (error.status === 404){
			console.log("The file requested does not exist.");
		} 
		console.log(error);
	}
	});
}

function writeTask(id, taskText){

	var list_element = "<li id='" + id +"'>"
						+"<div class='list_element'>"
						+"<div><input type='checkbox' name='task_done'></div>" 
						+"<span>"+ taskText +"</span>"
						+"<div class='close_button fa fa-times fa-lg' onclick='removeElement(this);'></div>"
						+"</div>"
						+"</li>"; 

	$("#displayTask>ul").append(list_element);
	$("#task_title").val("").focus();


}


function getAllCheckBoxes(){
	$("input[type='checkbox']").each(function(index, element){	
		$(element).click(function(){
			// if (element.checked != true){
			// 	console.log(element);
			// 	$(element).parents("span").css('text-decoration', 'line-through');
			// } else
			// {
			// 	console.log("Element not checked");
			// 	$(element).parents("span").css('text-decoration', 'none');
			// }
		});
	});
}
