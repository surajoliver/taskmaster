
<?php

class Database 
{
    public static function getConnection() 
    {
        $servername = "localhost";
        $username = "taskmaster";
        $password = "password";
        $dbname = "taskmaster";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        return $conn;

    }

    
}