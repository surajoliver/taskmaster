<?php

//require "Database.php";
class User {

    public static function fetch_all() {
        $conn = Database::getConnection();
        $sql = "SELECT user_id, username, password, email FROM users";
        $result = $conn->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        $conn->close(); 
        return $data;
    }

    public static function fetch_single($user_id) {
        $conn = Database::getConnection();
        $sql = "SELECT user_id, username, password, email FROM users WHERE user_id = '$user_id'";
        $result = $conn->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
        }
        $conn->close(); 
        return $row;
    }

    public static function create($record) {
        $conn = Database::getConnection();
        $username = $record['username'] ?? '';
        $email = $record['email'] ?? '';
        $password = $record['password'] ?? '';
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        //dd($sql);
        if ($conn->query($sql) != TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        return 1;
    }

    public static function delete_record($user_id) 
    {
        $conn = Database::getConnection();
        $sql = "DELETE FROM users WHERE user_id=$user_id";
        if (! $conn->query($sql) ) {
            dd("Error deleting record: " . $conn->error) ;
        }
    }

    public static function update($record) 
    {
        $user_id = $record['user_id'];
        $username = $record['username'];
        $email = $record['email'];
        $password = $record['password'];

        $conn = Database::getConnection();
        $sql = "UPDATE users SET username='$username', email='$email', password='$password' WHERE user_id=$user_id";
        if (! mysqli_query($conn, $sql)) {
            dd("Error updating record: " . mysqli_error($conn));
        }
        $conn->close();

          
    }

}
