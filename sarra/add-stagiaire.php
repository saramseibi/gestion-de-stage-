<?php
require('db_connection.php');
require 'check_login.php';

$sqlquery = "select * from stagaire";
$stagaire = $conn->query($sqlquery);
$checkquery = "select name ,id from etablissments";
$etablissments = $conn->query($checkquery);


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
  <h1 class="UT">Ajout D'un Stagiaire</h1>
  <form method="POST" action="submit-stagiaire.php">
    <label for="name">Nom </label>
    <input type="text" id="name" name="name" required><br>

    <label for="addresse">Adresse</label>
    <input type="text" id="addresse" name="addresse" required><br>

    <label for="numero">Numero de télephone</label>
    <input type="tel" id="numero" name="numero" required><br>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required><br>
    <select name="etablissment_id">
      <?php
      if ($etablissments->num_rows > 0) {
        while ($row = $etablissments->fetch_assoc()) {
          echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
      } else {
        echo "<option value=''>Aucun établissement trouvé</option>";
      }
      ?>
    </select><br>

    <div class="Btn">
      <input type="submit" class="bnt" value="Ajouter">
      <button class="bnt"><a href="accuiel.php">Retour </a></button>
    </div>
  </form>
</body>

</html>