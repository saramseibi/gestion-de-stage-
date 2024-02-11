<?php
require('db_connection.php');
require 'check_login.php';


$sqlquery = "select * from etablissments";
$etblissment = $conn->query($sqlquery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ajouter.css">
</head>
<body>
    <h1 class="UT">Ajouter Etablissment</h1>
    <form method="POST" action="submit-form.php">
      <label for="name">Nom </label>
      <input type="text" id="name" name="name" required><br>
  
      <label for="address">Adresse </label>
      <input type="text" id="address" name="address" required><br>
  
      <label for="numero">Numero de téléphone </label>
      <input type="tel" id="numero" name="numero" required><br>
  
      <label for="email">Email </label>
      <input type="email" id="email" name="email" required><br>

      <div class="Btn">
          <input type="submit"  class="bnt" value="Ajouter">
          <button class="Bn"><a href="accuiel.php" >Retour </a></button>
      </div>

    </form> 
</body>
</html>