<?php

//require "Database.php";
class Task {

    public static function fetch_all() {
        try {
            $conn = Database::getConnection();
            $sql = "SELECT task_id, task_name, description, due_date, priority, status FROM Tasks";
            $result = $conn->query($sql);
            $data = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            $conn->close(); 
            return $data;
        } catch( Exception $e ) {
                dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }

    }

    public static function fetch_all_for_user($user_id) {
        try {
            $conn = Database::getConnection();
            $sql = "SELECT task_id, task_name, description, due_date, priority, status FROM Tasks where user_id = '$user_id'";
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

    
    public static function fetch_single($task_id) {
        try {
            $conn = Database::getConnection();
            $sql = "SELECT task_id, task_name, description, due_date, priority, status FROM Tasks WHERE task_id = '$task_id'";
            $result = $conn->query($sql);
            $data = [];
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            $conn->close(); 
            return $row;
        } catch( Exception $e ) {
                dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }

    }

    public static function create($record) {
        try {
            $conn = Database::getConnection();
            $task_name = $record['task_name'] ?? '';
            $description = $record['description'] ?? '';
            $due_date = $record['due_date'] ?? '';
            $priority = $record['priority'] ?? '';
            $status = $record['status'] ?? '';
            $user_id = $record['user_id'] ?? '';
            $sql = "INSERT INTO Tasks (task_name, description, due_date, priority, status, user_id) VALUES ('$task_name', '$description', '$due_date', '$priority', '$status', '$user_id')";
            $conn->query($sql);
        }catch(Exception $e) {
            throw new Exception( "Error: " . $sql. "<br>" . $e->getMessage());
        }
        return;
    }

    public static function delete_record($task_id) 
    {
        try {
            $conn = Database::getConnection();
            $sql = "DELETE FROM Tasks WHERE task_id=$task_id";
            if (! $conn->query($sql) ) {
                dd("Error deleting record: " . $conn->error) ;
            }
            $conn->close();
        } catch( Exception $e ) {
                dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }

    }

    public static function update($record) 
    {
        try {
            $task_id = $record['task_id'];
            $task_name = $record['task_name'] ?? '';
            $description = $record['description'] ?? '';
            $due_date = $record['due_date'] ?? '';
            $priority = $record['priority'] ?? '';
            $status = $record['status'] ?? '';
    
            $conn = Database::getConnection();
            $sql = "UPDATE Tasks SET task_name='$task_name', description='$description', due_date='$due_date', priority='$priority', status='$status' WHERE task_id=$task_id";
            if (! mysqli_query($conn, $sql)) {
                dd("Error updating record: " . mysqli_error($conn));
            }
            $conn->close();
        } catch( Exception $e ) {
                dd('Database error '. $e->getMessage() . '<br/> ' . $e) ;
        }



          
    }

}
