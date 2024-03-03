<?php
    require_once ("db_connection.php");
    session_start();

    // Check if the task id is inside the URL.
    if (isset($_GET["id"])) { 
        $id = $_GET["id"];

        // Create the query.
        $query = "SELECT id, title, description FROM tasks WHERE id = $id";
        $task = mysqli_query($conn, $query);

        // Check if the query gave results (tasks).
        if (isset($task)) {
            // Convert query results (object) to an array.
            $task = mysqli_fetch_array($task);
        } else {
            $_SESSION["message"] = "An error has occurred.";
            $_SESSION["type_message"] = "error";
            
            header ("Location: index.php");
        }
    }
?>

<?php 
    include_once("head.php");
?>
<body>
    <?php include_once("nav.php"); ?>
    <main class="inline-content">
        <form action="update_task.php?id=<?php echo $id; ?>" method="post" class="task-form">
            <input name="title" type="text" placeholder="Task title" value="<?php echo $task["title"]; ?>" autofocus required>
            <hr>
            <textarea name="description" placeholder="Task description"><?php echo $task["description"]; ?></textarea>
            <br>
            <button name="update_task" type="submit" class="blue-button">Update task</button>
        </form>

        <table class="table"> 
            <tr>
                <th width="15%">Title</th>
                <th width="45%">Description</th>
                <th width="25%">Create at</th>
                <th width="20%">Actions</th>
            </tr>
            <?php 
                // Create the query.
                $query = "SELECT * FROM tasks ORDER BY create_at DESC;";
                $task = mysqli_query($conn, $query);

                // Go through all the fields of the array and show them in a table.
                while ($row = mysqli_fetch_array($task)) {
            ?> 
            <tr>
                <td> <?php echo $row["title"]; ?> </td>
                <td> <?php echo $row["description"]; ?> </td>
                <td> <?php echo $row["create_at"]; ?> </td>
                <td>
                    <a href="./edit_task.php?id=<?php echo $row["id"] ?>">
                            <img src="img/edit.svg" alt="edit" class="icon icon-green">
                    </a>
                    <a href="./delete_task.php?id=<?php echo $row["id"] ?>">
                        <img src="img/trash.svg" alt="trash" class="icon icon-red">
                    </a>
                </td>
            </tr>
            <?php } ?>    
        </table>
    </main>
</body>
</html>