

<?php 
    $record = [];
    $errors = [];

    $record["task_id"] = $_POST["task_id"];
    $record['task_name'] = $_POST["task_name"] ?? '';
    $record['description'] = $_POST["description"] ?? '';
    $record['due_date'] = $_POST["due_date"] ?? '';
    $record['priority'] = $_POST["priority"] ?? '';
    $record['status'] = $_POST["status"] ?? '';

    if ($record['task_name'] === '') {
        $errors['task_name'] = 'Task Name is a required field';
    }
    if ($record['due_date'] === '') {
        $errors['due_date'] = 'Due Date is a required field';
    }
    if ($record['priority'] === '') {
        $errors['priority'] = 'priority cannot be blank';
    }
    
    if (count($errors) > 0) {
        require("tasks_edit.php");
    } else {

        Task::update($record);

        header("Location: /tasks");
    }

?>