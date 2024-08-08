
<?php require "./templates/header.php"; ?>
<?php 
    $record = [];
    $errors = [];

    $record["user_id"] = $_POST["user_id"];
    $record['username'] = $_POST["username"] ?? '';
    $record['email'] = $_POST["email"] ?? '';
    $record['password'] = $_POST["password"] ?? '';

    if ($record['username'] === '') {
        $errors['username'] = 'User Name is a required field';
    }
    if ($record['email'] === '') {
        $errors['email'] = 'Email is a required field';
    }
    if ($record['password'] === '') {
        $errors['password'] = 'Password cannot be blank';
    }
    
    if (count($errors) > 0) {
        require("users_edit.php");
    } else {

        User::update($record);

        header("Location: /users");
    }

?>