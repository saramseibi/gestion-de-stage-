
<?php
require 'db_connection.php';
require 'check_login.php';
echo" hi";

$sql = "SELECT id FROM stagiare";
if ($result = $conn->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];

        $_SESSION["logged"] = true;
        $_SESSION["id"] = $id;

        echo "Yep, it works!";
        echo "$id";
    } else {
        echo "No rows found.";
    }

    $result->free_result();
} else {
    $error = 'Error executing the query: ' . $conn->error;
}


?>