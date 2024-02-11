
<?php

session_start();
if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
    header('Location: accuiel.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db_connection.php';
    if (isset($_POST['signin-form'])) {

        $name = $_POST['name'];
        $password = $_POST['cpassword'];
        $checkQuery = "SELECT * FROM persons WHERE name = '$name'";
        $user = $conn->query($checkQuery);
        if ($user->num_rows > 0) {
            $user = $user->fetch_assoc();
            $storedHashedPassword = $user['password'];
            
            if (password_verify($password, $storedHashedPassword)) {
                $_SESSION["logged"] = true;
                $_SESSION["email"] = $user['email'];
                header('location:accuiel.php');
                exit;
            } {
                $error = 'password is incorrect';
            }
        } else {
            $error = 'user not found';
        }
    } elseif (isset($_POST['signup-form'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($name)) {
            $error = 'Name is required';
        } elseif (empty($email)) {
            $error = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email format';
        } elseif (empty($password)) {
            $error = 'Password is required';
        } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO persons (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION["logged"] = true;
                    $_SESSION["email"] = $email;
                    header('Location: accuiel.php');
                    exit;
                } else {
                    $error = 'Error registering the user';
                }
            }

            $conn->close();
        }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Gestion De Stage</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">
        <div class="logo">
            <img src="img/cpg_2108.png" alt="">
        </div>
        <div class="from-box">
            <div class="login-singup">
                <form action="" method="post" class="singin-form">
                    <h2 class="title ">Connexion </h2>
                    <?php 
                    if($error){
                        echo "<span class='error' style='font-size:1.5rem'>$error</span>";
                    } 
                    ?>

                    <div class="input-field" id="passwordField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Nom d'utilisateur" name="name" value="">
                    </div>
                    <div class="input-field" id="passwordField">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Mot de passe" name="cpassword">
                    </div>
                    <div class="btn-flied">
                        <input type="submit" value="Se connecter" name="signin-form" class="Btn solid">
                        <input type="reset" value="Annuler" class="Btn solid">
                    </div>
                </form>

                <form action="" method="post" class="singup-form">
                    <h2 class="title ">S'inscrire </h2>
                    <div class="input-field" id="passwordField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Nom d'utilisateur" name="name" value="">
                    </div>
                    <div class="input-field" id="passwordField">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder=" E-mail" name="email" value="">
                    </div>
                    <div class="input-field" id="passwordField">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Mot de passe" name="password">
                    </div>

                    <div class="btn-flied">
                        <input type="submit" value="S'inscrire" name="signup-form" class="Btn solid">
                        <input type="reset" value="Annuler" class="Btn solid">
                    </div>
                </form>

            </div>
        </div>
        <div class="panels-containre">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Nouveau ici?</h3>
                    <p>Rejoignez la communauté de la Société des Phosphates de Gafsa en créant un compte. Remplissez les informations requises ci-dessous pour commencer.</p>
                    <button class="Btn transport" id="sing-up-btn">S'inscrire</button>
                </div>
                <img src="img/undraw_access_account_re_8spm.svg" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Un de nous ?</h3>
                    <p>Bienvenue sur le portail de connexion de la Société des Phosphates de Gafsa. Veuillez saisir vos identifiants pour accéder à votre compte.</p>
                    <button class="Btn transport" id="sing-in-btn">Se connecter</button>
                </div>
                <img src="img/undraw_sign_up_n6im.svg" class="image" alt="">
            </div>
        </div>

    </div>
    <script src="app.js"></script>

</body>

</html>