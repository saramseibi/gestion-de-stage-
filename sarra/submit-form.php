<?php

require 'db_connection.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];  
    $numero = $_POST['numero'];
    $email = $_POST['email'];


    $sqlquery = "INSERT INTO etablissments ( name, address, numero, email) VALUES ('$name', '$address', '$numero', '$email')";
    if ($conn->query($sqlquery) === TRUE) {
        header('Location: accuiel.php');
        exit;
    } else {
        echo "Error: " . $sqlquery . "<br>" . $conn->error;
    }
}
