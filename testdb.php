<?php
    echo '<b>Testing database connnectivity</b>';
    $servername = "localhost";
    $username = "taskmaster";
    $password = "password";
    $dbname = "taskmaster";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } else {
        die("Database connection was successfull!");
    }