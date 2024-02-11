<?php
require('db_connection.php');
require 'check_login.php';

$sqlquery = "select * from etablissments";
$etablissments = $conn->query($sqlquery);
$msg = $_SESSION['successMessage'] ?? null;
$_SESSION['successMessage'] = null;

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="accuiel.css">
    <title>Accuiel</title>
</head>

<body>
    <nav>
        <aside>
            <div class="logo">
                <img class="m1" src="img/CPG_logo.svg.png">
                <h2>CPG</h2>
            </div>

            <ul class="tn active ">
                <li id="fonc">
                    <span><a href="accuiel.php">Gestion Des Etablissement</a></span>
                    <a href="accuiel.php">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <ul class="tn">
                <li id="fonc">
                    <span><a href="stagiaires.php">Gestion Des Stagiaires</a></span>
                    <a href="stagiaires.php">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <ul class="tn">
                <li id="fonc">
                    <span><a href="stage.php">Gestion Des Stages</a></span>
                    <a href="stage.php">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <button class="Btn solid"><a href="logout.php">Déconnecter</a></button>
        </aside>
    </nav>
    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="search">
                </div>
                <?php echo $msg ? "<span style='color:green'>$msg</span>" :''?>
            </div>
            <div class="profile">
                <a class="edit" href="edit.php"><i class="far fa-bell"></i></a>
                <?php 
                $email = $_SESSION["email"];
                $sql = "select image from persons where email='$email'";
                $user = $conn->query($sql)->fetch_assoc();
                $imagePath = $user['image'] ?? null;
                echo "<img class='m2' src='".($imagePath ?? 'img/profile.png') ."'>"
                ?>
            </div>
        </div>
        <div class="add">
            <h3 class="i-name">Liste Des Etablissements</h3>
            <div class="ajouter">
                <a href="ajouter.php">
                    <i class="fa-sharp fa-solid fa-plus"></i>
                </a>
                <h5>Ajouter</h5>
            </div>
        </div>


        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Adresse</td>
                        <td>Numero de télephone</td>
                        <td>Email</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($etablissments->num_rows > 0) {
                        while ($row = $etablissments->fetch_assoc()) {
                            echo "<tr> <td >" . $row['name'] . "</td>.<td>" . $row['address'] . "</td>.<td>" . $row['numero'] . "</td>.<td>" . $row['email'] . "</td> .<td><a href='modifier.php' class='editt'>modifier</a></td></tr>";
                        }
                    } else {
                        echo '<tr style="text-align:center"><td colspan=4>Aucun etablissement trouvé</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>