<?php
require('createDB.php');
session_start();
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<header>
    <img src="img/banniere.jpg" alt="">
</header>
<nav class="navbar navbar-expand-lg bg-primary ">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarColor01">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <?php
                if ($_SESSION) {
                    echo  ' <li class="nav-item">
                    <a class="nav-link" href="dashboardAdmin.php">DashBoard Admin</a>
                </li>';
                }
                ?>
                <?php
                if ($_SESSION) {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="logout.php">Deconnexion</a>
                </li>';
                } else {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="login.php">Connexion</a>
                </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<body>
    <h1>Nos produits ont de l'humour</h1>
    <div class="container">
        <div class="row">
            <?php
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=BoutiqueTP;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $sth = $pdo->prepare("SELECT idProduct, nameProduct, descriptionProduct, priceProduct, images FROM PRODUCT");
                $sth->execute();
                $resultat = $sth->fetchAll();
                foreach ($resultat as $value) {
                    echo ' <div class="col-12  col-lg-6 col-xxl-4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="./upload/'. $value['images'] .'" />
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="card-title">
                                            <h3>' . $value['nameProduct'] . '</h3>
                                        </div>
                                        <div class="card-excerpt">
                                            <p>' . $value['descriptionProduct'] . '</p>
                                        </div>
                                        <div class="card-price">
                                            <h4>' . $value['priceProduct'] . '€</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            ?>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<footer>
<nav class="navbar navbar-expand-lg bg-primary ">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarColor01">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <?php
                if ($_SESSION) {
                    echo  ' <li class="nav-item">
                    <a class="nav-link" href="dashboardAdmin.php">DashBoard Admin</a>
                </li>';
                }
                ?>
                <?php
                if ($_SESSION) {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="logout.php">Deconnexion</a>
                </li>';
                } else {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="login.php">Connexion</a>
                </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
</footer>






</html>