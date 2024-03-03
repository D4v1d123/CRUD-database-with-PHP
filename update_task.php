<?php
    require_once ("db_connection.php");
    session_start();

    // Check if the save_task button has been pressed.
    if (isset($_POST["update_task"])) {
        $id = $_GET["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];

        // Create the query.
        $query = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        // Check if the query was succesful.
        if ($result) {
            $_SESSION["message"] = "Task updated successfully.";
            $_SESSION["type_message"] = "success";

            header ("Location: index.php");
        } else {
            $_SESSION["message"] = "An error has occurred.";
            $_SESSION["type_message"] = "error";
            
            header ("Location: index.php");
        }
    }

    header ("Location: index.php");