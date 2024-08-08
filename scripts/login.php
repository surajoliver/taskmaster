<?php


if (!isset($record)) $record = [];
if (!isset($errors)) $errors = [];

$record['email'] = $_POST['email'];
$record['password'] = $_POST['password'];

if ($record['password'] === '') {
    $errors['password'] = 'Password cannot be blank';
}
if ($record['email'] === '') {
    $errors['email'] = 'Email cannot be left blank';
}

if (count($errors) === 0) {
    $message = User::login($record);
    if ($message['code'] === -1) {
        $errors['email'] = $message['message'];
    } else {
        $_SESSION["username"] = $message["username"];
        $_SESSION["user_id"] = $message['user_id'];
        $_SESSION["email"] = $record["email"];

        header("Location: /tasks");
        die();
    }
}
require base_path("pages/login.php");

