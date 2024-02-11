<?php
require('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['etablissment_id'])) {
        $etablissment_id = $_POST['etablissment_id'];
        $name = $_POST['name'];
        $addresse = $_POST['addresse'];
        $numero = $_POST['numero'];
        $email = $_POST['email'];

        $etablissment_id = intval($etablissment_id);

        $check_query = "SELECT id FROM etablissments WHERE id = $etablissment_id";
        $result = $conn->query($check_query);


        $sqlquery = "INSERT INTO stagiare(etablissment_id, name, addresse, numero, email) VALUES ('$etablissment_id', '$name', '$addresse', '$numero', '$email')";
        if ($conn->query($sqlquery) === TRUE) {
            header('Location: stagiaires.php');
            exit;
        } else {
            echo "Error: " . $sqlquery . "<br>" . $conn->error;
        }
    } else {
        die("Error: 'etablissment_id' key is missing in the POST data.");
    }
}

?>
