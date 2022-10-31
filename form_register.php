<?php
    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=BoutiqueTP;port=3306',
            'root',
            '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $nameUser = $_POST['nameUser'];
        $firstNameUser = $_POST['firstNameUser'];
        $passwordUser = $_POST['passwordUser'];
        $mailUser = $_POST['mailUser'];
        // Hachage du mot de passe
        $mdp_hache = password_hash($_POST['passwordUser'], PASSWORD_DEFAULT);
        // Insertion
        $req = $pdo->prepare('INSERT INTO USERS(nameUser, firstNameUser, passwordUser, mailUser, dateCreation)
VALUES(:nameUser, :firstNameUser, :passwordUser, :mailUser, CURDATE())');
        $req->execute(array(
            'nameUser' => $nameUser,
            'firstNameUser' => $firstNameUser,
            'passwordUser' => $mdp_hache,
            'mailUser' => $mailUser
        ));
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    header('location:index.php');