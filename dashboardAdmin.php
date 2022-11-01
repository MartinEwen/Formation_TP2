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
                    echo '<li class="nav-item">
                            <a class="nav-link" href="dashboard.php">DashBoard</a>
                          </li>';
                }

                // <li class="nav-item">
                //     <a class="nav-link" href="dashboardAdmin.php">DashBoard Admin</a>
                // </li>
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

    <div class="row">
        <div class="col-4">
            <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
                <nav class="nav nav-pills flex-column">
                    <br>
                    <a class="nav-link" href="#item-1">Ajouter un produit</a>
                    <br>
                    <a class="nav-link" href="#item-2">Supprimer un produit</a>
                    <br>
                    <a class="nav-link" href="#item-3">Gestion des compte</a>
                    <br>
                </nav>
            </nav>
        </div>

        <div class="col-8">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                <div id="item-1">
                    <h2>Ajouter un produit</h2>
                    <form action="form_addproduct.php" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nom du Produit</label>
                                    <input type="text">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Description du produit</label>
                                    <input type="text">
                                </div>
                                <div class="col-md-6">
                                    <label for="">prix du produit</label>
                                    <input type="text">
                                </div>
                                <div class="col-md-6">
                                        <input type="file" name="choosefile" value="" />
                                </div>
                                <div class="col-md-12">
                                    <button type="submit">Valider le nouveau produit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="item-2">
                    <h2>Supprimer un produit</h2>
                </div>
                <div id="item-3">
                    <h2>Gestion des compte</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>