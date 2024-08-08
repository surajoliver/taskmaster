

<?php 
    $record = [];
    $errors = [];

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
    //dd(count($errors));
    if (count($errors) > 0) {
        require(base_path("pages/users_create.php"));
    } else {
        User::create($record);

        header("Location: /users");
    }




?>

