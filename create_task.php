<?php
require_once("db_connection.php");
session_start();

// Check if the save_task button has been pressed.
if (isset($_POST["save_task"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Create the query.
    $query = "INSERT INTO tasks (title, description) VALUE ('$title', '$description')";
    $result = mysqli_query($conn, $query);

    // Check if the query was succesful.
    if (!$resutl) {
        $_SESSION["message"] = "Task saved successfully.";
        $_SESSION["type_message"] = "success";

        header ("Location: index.php");
    } else {
        $_SESSION["message"] = "An error has occurred.";
        $_SESSION["type_message"] = "error";

        header ("Location: index.php");
    }
}
