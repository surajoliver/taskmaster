
<?php
$user_id = $_POST['user_id'];
echo 'delete user ' . $user_id;
User::delete_record($user_id);

header("Location: /users");

?>