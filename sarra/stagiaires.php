<?php
require('db_connection.php');
require 'check_login.php';

$sqlquery = "select * from stagiare";
$stagiare = $conn->query($sqlquery);


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

            <ul class="tn">
                <li id="fonc">
                    <span><a href="accuiel.php">Gestion Des Etablissement</a></span>
                    <a href="accuiel.php">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <ul class="tn active">
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
            </div>
            <div class="profile">
                <a class="edit" href="edit.php"><i class="far fa-bell"></i></a>
                <img class="m2" src="img/profile.png" alt="">
            </div>
        </div>
        <div class="add">
            <h3 class="i-name">Liste Des Stagiaires</h3>
            <div class="ajouter">
                <a href="add-stagiaire.php">
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
                    if ($stagiare->num_rows > 0) {
                        while ($row = $stagiare->fetch_assoc()) {
                            echo "<tr>
                            <td>" . $row['name'] . "</td>.<td>" . $row['addresse'] . "</td>.<td>" . $row['numero'] . "</td>.<td>" . $row['email'] . "</td>.<td><a href='modif_stagiaire.php' class='editt'>modifier</a></td></tr>";
                        }
                    } else {
                        echo '<tr style="text-align:center"><td colspan=4>Aucun stagiaire trouvé</td></tr>';
                    }
                    ?>
            </table>
        </div>

    </section>
</body>

</html>