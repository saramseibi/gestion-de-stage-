<?php
require 'check_login.php';
require 'db_connection.php';

$email = $_SESSION["email"];
$name = '';
$sql = "SELECT * FROM persons where email ='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $name = $row['name'];
} else {
  header('location:accuiel.php');
  $conn->close();
  exit;
}
$conn->close();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Accuiel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="ajouter.css">
</head>

<body>
  <h1>Modifier Le Compte </h1>
  <form method="POST" action="modifier.php" enctype="multipart/form-data">
    <label for="name">Nom d'utilisateur </label>
    <input type="text" id="name" name="name" <?php echo "value='$name'"?> required><br>

    <label for="password">Nouveau Mot de passe</label>
    <input type="password" id="password" name="password" required><br>

    <label for="cpassword">Nouveau Mot de passe</label>
    <input type="password" id="cpassword" name="cpassword" required><br>

    <div class="mb-3">
      <label class="form-label">Image de profil</label>
      <input type="file" class="form-control" name="fileToUpload">
    </div>
    <div class="Btn">
      <input type="submit" name ="submit" class="cc" value="Enregister">
      <a href="accuiel.php" class="link-secondary">Retouner</a>
    </div>
  </form>
</body>

</html>