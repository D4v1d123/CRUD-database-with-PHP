<?php
function dbConnection ($host, $dbname, $dbusername, $dbpassword) {
    try {
        $conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname); 
        return $conn;
    } catch (mysqli_sql_exception $error) {
        echo "<p>An error has occurred while connecting to the database: $error</p>";
    }
}

// Create a connection object to the database.
$conn = dbConnection ("localhost", "crud_db", "root", "root");