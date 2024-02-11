<?php
require('db_connection.php');
require 'check_login.php';
session_start();

$sqlquery = "select * from stage";
$stage = $conn->query($sqlquery);
$checkquery = "select name ,id from stagiare";
$stagiare = $conn->query($checkquery);
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
  <h1 class="UT" >Ajout D'un Stage</h1>
  <form method="POST" action="submit-stage.php">
    <label for="e_name">Nom D'Encadreur </label>
    <input type="text" id="e_name" name="e_name" required><br>

    <label for="s_name">Nom De stagiaire</label>
    <select class ="option" name="stagiaire_id">
      <?php
      if ($stagiare->num_rows > 0) {
        while ($row = $stagiare->fetch_assoc()) {
          echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
      } else {
        echo "<option value=''>Aucun stagiaire trouvé</option>";
      }
      ?>
    </select><br>


    <label for="text">Sujet De Stage</label>
    <input type="text" id="sujet" name="sujet" required><br>



    <label for="dure">Durée De Stage </label>
    <input type="text" id="dure" name="dure" required><br>

    <div class="Btn">
      <input type="submit" class="bnt" value="Ajouter">
      <button class="bnt"><a href="accuiel.php">Retour </a></button>
    </div>

  </form>
</body>

</html>