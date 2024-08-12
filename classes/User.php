<?php

//require "Database.php";
class User {

    public static function fetch_all() {
        try {
            $conn = Database::getConnection();
            $sql = "SELECT user_id, username, password, email FROM Users";
            $result = $conn->query($sql);
            $data = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            $conn->close(); 

        } catch( Exception $e ) {
            dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }

        return $data;
    }

    public static function fetch_single($user_id) {
        try {
            $conn = Database::getConnection();
            $sql = "SELECT user_id, username, password, email FROM Users WHERE user_id = '$user_id'";
            $result = $conn->query($sql);
            $data = [];
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            $conn->close(); 
        } catch( Exception $e ) {
            dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }

        return $row;
    }

    public static function create($record) {
        try {
            $conn = Database::getConnection();
            $username = $record['username'] ?? '';
            $email = $record['email'] ?? '';
            $password = $record['password'] ?? '';
            $sql = "INSERT INTO Users (username, email, password) VALUES ('$username', '$email', '$password')";
            //dd($sql);
            if ($conn->query($sql) != TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            return 1;
        } catch( Exception $e ) {
            dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }

    }

    public static function delete_record($user_id) 
    {
        try {
            $conn = Database::getConnection();
            $sql = "DELETE FROM Users WHERE user_id=$user_id";
            if (! $conn->query($sql) ) {
                dd("Error deleting record: " . $conn->error) ;
            }
        } catch( Exception $e ) {
            dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }

    }

    public static function update($record) 
    {
        $user_id = $record['user_id'];
        $username = $record['username'];
        $email = $record['email'];
        $password = $record['password'];

        try {
            $conn = Database::getConnection();
            $sql = "UPDATE Users SET username='$username', email='$email', password='$password' WHERE user_id=$user_id";
            if (! mysqli_query($conn, $sql)) {
                dd("Error updating record: " . mysqli_error($conn));
            }
            $conn->close();
        } catch( Exception $e ) {
            dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }      
    }


    public static function register($record) {
        try {
            $conn = Database::getConnection();
            $username = $record['username'] ?? '';
            $email = $record['email'] ?? '';
            $password = $record['password'] ?? '';
            
            $sql = "INSERT INTO Users (username, email, password) VALUES ('$username', '$email', '$password')";
            //dd($sql);
    
            if ($conn->query($sql) != TRUE) {
                dd("Error: " . $sql . "<br>" . $conn->error);
            }
            $userid = $conn->insert_id;
            return $userid;
            
        } catch( Exception $e ) {
            dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }

    }

    public static function login($record) {
        try {
            $conn = Database::getConnection();
            $email = $record['email'] ?? '';
            $password = $record['password'] ?? '';

            $message = '';
            $code = 1;
            $username = '';
            $user_id = '';
            
            $sql = "SELECT user_id, username, password FROM Users WHERE email = '$email' limit 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
            } else {
                $message = "Email id does not exists";
                $code = -1;
            }
            if ($result->num_rows > 0 && $row['password'] != $record['password']) {
                $message = "Password does not match";
                $code = -1;
            }

            if ($code === 1) {
                $message = 'Login successfull';
                $username = $row['username'];
                $user_id = $row['user_id'];
            }
            $conn->close(); 
        } catch( Exception $e ) {
            dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }

        return ['code'=>$code, 'message'=>$message, 'username'=>$username, 'user_id'=>$user_id];
    }

}
