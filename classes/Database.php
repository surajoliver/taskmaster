
<?php

class Database 
{
    public static function getConnection() 
    {
        $servername = "localhost";
        $username = "taskmaster"; //u171687109_taskmaster
        $password = "password";  //1/;vgUg#Ey
        $dbname = "taskmaster";  //u171687109_taskmaster

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        return $conn;

    }

    
}