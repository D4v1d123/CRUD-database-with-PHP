<?php 
    include_once("head.php");
    session_start(); 
?>
<body>
    <?php include_once("nav.php"); ?>
    <main class="inline-content">
        <form action="create_task.php" method="post" class="task-form">
            <?php 
                if (isset($_SESSION["message"])) {
                    echo "<p class=" . $_SESSION["type_message"] . ">" . $_SESSION["message"] . "</p>";
                }

                // Delete the session values
                session_unset();
            ?>
            <input name="title" type="text" placeholder="Task title" autofocus required>
            <hr>
            <textarea name="description" placeholder="Task description"></textarea>
            <br>
            <button name="save_task" type="submit" class="blue-button">Save task</button>
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