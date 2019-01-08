<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<!-- Bootstrap JS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  	crossorigin="anonymous"></script>



	<title>Document</title>
</head>
<body>

	<div class="container py-5">
		<section class="row justify-content-center">
			<div class="col-md-6">
				<form>
					<h1 class="text-justify">To-Do List 🗒️</h1>
					
					<input type="text" name="name" id="new-task">
					<button class="bg-success btn" id="addTaskBtn">Add Task</button>
				</form>
			</div>
			
		</section>
	
	</div>

	<script>
		$("#addTaskBtn").click( () => {
			const newTask = $('#new-task').val();

			$.ajax({
				method: 'GET',
				url: 'controllers/add_task.php',
				data: {name: newTask},
			}).done( 
				console.log('added task')
			);
			});

	</script>

<div class="container py-5">
	<section class="row justify-content-center">
		<div class="col-md-6">
			<h2>Tasks</h2>
			<ul id="taskList">
				<?php

					require_once './controllers/connection.php';

					$sql = "SELECT * FROM tasks";
					$sqlresult = mysqli_query($conn,$sql);

					while ($row = mysqli_fetch_assoc($sqlresult) ) { ?>

					<li data-id="<?php echo $row['id'] ; ?>">
							<?php echo $row['name'] . " is task number " . $row['id'] ; ?>
							&nbsp &nbsp <button class="deleteBtn">Remove From List</button>
						</li>
						
				<?php } ?>

			</ul>
		</div>
	</section>
</div>
	
<script>
	
	$('#taskList').on('click', '.deleteBtn', function(){
		const task_id = $(this).parent().attr('data-id');
		//console.log(task_id);
		$.ajax({
			method: 'post',
			url: 'controllers/remove_task.php',
			data:{ task_id: task_id }
		}).done( data =>{
			$(this).parent().fadeOut();
		});
	});

</script>





</body>
</html>