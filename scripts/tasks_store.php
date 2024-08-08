

<?php 
    $record = [];
    $errors = [];

    $record['task_name'] = $_POST["task_name"] ?? '';
    $record['description'] = $_POST["description"] ?? '';
    $record['due_date'] = $_POST["due_date"] ?? '';
    $record['priority'] = $_POST["priority"] ?? '';
    $record['status'] = $_POST["status"] ?? '';
    $record['user_id'] = $_SESSION["user_id"] ;
    
    if ($record['task_name'] === '') {
        $errors['task_name'] = 'Task Name is a required field';
    }
    if ($record['due_date'] === '') {
        $errors['due_date'] = 'Due date is a required field';
    }
    if ($record['priority'] === '') {
        $errors['priority'] = 'Priority cannot be blank';
    }
    //dd(count($errors));
    if (count($errors) > 0) {
        //dd($record);
        require(base_path("pages/tasks_create.php"));
    } else {
        Task::create($record);

        header("Location: /tasks");
    }




?>

