<?php 

require('db_connection.php');




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['stagiaire_id'])) {
        $stagiaire_id = $_POST['stagiaire_id'];
        $e_name = $_POST['e_name'];
        $sujet = $_POST['sujet'];
        $date = $_POST['date'];
        $data = $_POST['data'];

        $stagiaire_id= intval($stagiaire_id);

        $check_query = "SELECT id FROM stagaire WHERE id = $stagiaire_id";
        $result = $conn->query($check_query);


        $sqlquery = "INSERT INTO stage(stagiaire_id, e_name, sujet, date,data) VALUES ('$stagiaire_id', '$e_name',  '$sujet', '$date','$data')";
        if ($conn->query($sqlquery) === TRUE) {
            header('Location: stage.php');
            exit;
        } else {
            echo "Error: " . $sqlquery . "<br>" . $conn->error;
        }
    } else {
        die("Error: 'stagiaire_id' key is missing in the POST data.");
    }
}



?>