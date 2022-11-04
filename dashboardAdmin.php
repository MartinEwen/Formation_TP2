<?php
require('createDB.php');
session_start();
?>

<?php 
if($_SESSION){ ?>

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
                    echo '<li class="nav-item">
                    <a class="nav-link" href="dashboardAdmin.php">DashBoard Admin</a></li>';
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
    <div class="container">
        <div class="row">
            <div class="col-3 pasdenom ">
                <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end navadmin">
                    <nav class="nav nav-pills flex-column sticky navadmin">
                        <br>
                        <a class="nav-link" href="#item-1">Ajouter un produit</a>
                        <br>
                        <a class="nav-link" href="#item-2">Gestion des produits</a>
                        <br>
                        <a class="nav-link" href="#item-3">Gestion des compte</a>
                        <br>
                    </nav>
                </nav>
            </div>

            <div class="col-9">
                <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                    <div id="item-1">
                    <form id="" action="form_addproduct.php" method="POST" enctype="multipart/form-data">
                            <h2>Ajouter un produit</h2>
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Nom du Produit</label>
                                        <br>
                                        <input type="text" name="nameProduct" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Description du produit</label>
                                        <br>
                                        <input type="text" name="descriptionProduct" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">prix du produit</label>
                                        <br>
                                        <input type="text" name="priceProduct" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="images" value=""  required/>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit">Valider le nouveau produit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="item-2">

                        <form action="" method="post">
                            <?php
                            try {
                                $pdo = new PDO('mysql:host=localhost;dbname=BoutiqueTP;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                                $sth = $pdo->prepare("SELECT idProduct, nameProduct, descriptionProduct, priceProduct, images FROM PRODUCT");
                                $sth->execute();
                                $resultat = $sth->fetchAll();
                            ?>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Produit</th>
                                        <th>Description</th>
                                        <th>Prix</th>
                                        <th></th>

                                    </tr>
                                <?php
                                foreach ($resultat as $value) {
                                    echo '<tr><td>' . $value['nameProduct'] . '</td><td class="pasdenom">' . $value['descriptionProduct'] . '</td><td>' . $value['priceProduct'] . '</td><td><a class="btn btn-danger" href="form_deleteproduct.php?idProduct='. $value['idProduct'].' images=./upload/'.$value['images'].'" method="GET">Supprimer</a></td></tr>';
                                }
                            } catch (PDOException $e) {
                                echo "Erreur : " . $e->getMessage();
                            }
                                ?>
                                </table>
                        </form>
                    </div>

                    <div id="item-3">

                        <h2>Gestion des compte</h2>
                        <?php
                        try {
                            $pdo = new PDO('mysql:host=localhost;dbname=BoutiqueTP;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                            $sth = $pdo->prepare("SELECT idUser, nameUser, firstNameUser, mailUser FROM USERS");
                            $sth->execute();
                            $resultat = $sth->fetchAll();
                        ?>
                            <table class="table table-striped">
                            <?php
                            foreach ($resultat as $value) {
                                echo '<tr><td class="pasdenom">' . $value['nameUser'] . '</td><td class="pasdenom">' . $value['firstNameUser'] . '</td><td>' . $value['mailUser'] . '</td><td><a class="btn btn-danger" href="form_deleteUser.php?idUser='. $value['idUser'].'" method="GET">Supprimer</a></td></tr>';
                            }
                        } catch (PDOException $e) {
                            echo "Erreur : " . $e->getMessage();
                        }
                            ?>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<footer>
<nav class="navbar navbar-expand-lg">
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
                    echo '<li class="nav-item">
                    <a class="nav-link" href="dashboardAdmin.php">DashBoard Admin</a></li>';
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

<?php }
else {
header('Location:index.php');
}
?>