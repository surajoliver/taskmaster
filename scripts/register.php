<?php


if( !isset($record) ) $record = [];
if( !isset($errors) ) $errors = [];

$record['username'] = $_POST['username'];
$record['email'] = $_POST['email'];
$record['password'] = $_POST['password'];
$record['password_confirm'] = $_POST['password_confirm'];

if ($record['username'] === '') {
    $errors['username'] = 'User Name cannot be blank';
}
if ($record['password'] === '') {
    $errors['password'] = 'Password cannot be blank';
}
if ($record['password_confirm'] !=  $record['password']) {
    $errors['password_confirm'] = 'Password confirmation is not matching with the password';
}
if ($record['email'] === '') {
    $errors['email'] = 'Email cannot be left blank';
}

if (count($errors) > 0) {
    require base_path("pages/register.php");
} else {
    $userid = User::register($record);

    $_SESSION["username"] = $record["username"];
    $_SESSION["user_id"] = $userid;
    $_SESSION["email"] = $record["email"];

    header("Location: /tasks");
}
