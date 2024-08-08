
<?php
$task_id = $_POST['task_id'];
echo 'delete task ' . $task_id;
//dd($task_id);
Task::delete_record($task_id);

header("Location: /tasks");




?>