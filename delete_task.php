<?php
    require_once("db_connection.php");
    session_start();

    // Check if the task id is inside the URL.
    if (isset($_GET["id"])) { 
        $id = $_GET["id"];

        // Create the query.
        $query = "DELETE FROM tasks WHERE ID = '$id'";
        $result = mysqli_query ($conn, $query);

        // Check if the query was succesful.
        if ($result) { 
            $_SESSION["message"] = "Task deleted successfully.";
            $_SESSION["type_message"] = "warning";

            header("Location: index.php");
        } else {
            $_SESSION["message"] = "An error has occurred.";
            $_SESSION["type_message"] = "error";
            
            header ("Location: index.php");
        }
    }