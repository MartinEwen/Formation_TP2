<?php
$pdo = new PDO('mysql:host=localhost;', 'root', '');
// $pdo = new PDO('mysql:host=localhost;port=3306','root',''); Si PDO n'arrive pas à faire le lien avec la base de données
$sql = "CREATE DATABASE IF NOT EXISTS `BoutiqueTP` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);



// creation table PRODUCT
try {
    $pdo = new PDO('mysql:host=localhost;', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = "CREATE TABLE IF NOT EXISTS `BoutiqueTP`.`PRODUCT` (
    `idProduct` INT NOT NULL AUTO_INCREMENT ,
    `nameProduct` VARCHAR(100) NOT NULL ,
    `descriptionProduct` VARCHAR(100) NOT NULL ,
    `priceProduct` VARCHAR(100) NOT NULL ,
    `image` VARCHAR(100) NOT NULL , PRIMARY KEY (`idProduct`)) ENGINE = InnoDB;";
    $pdo->exec($sql);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}



//creation table USERS
try {
    $pdo = new PDO('mysql:host=localhost;', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = "CREATE TABLE IF NOT EXISTS `BoutiqueTP`.`USERS` (
    `idUser` INT NOT NULL AUTO_INCREMENT ,
    `nameUser` VARCHAR(100) NOT NULL ,
    `firstNameUser` VARCHAR(100) NOT NULL ,
    `mailUser` VARCHAR(100) NOT NULL ,
    `passwordUser` VARCHAR(100) NOT NULL ,
    `dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`idUser`)) ENGINE = InnoDB;";
    $pdo->exec($sql);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}



//creation table CART
try {
    $pdo = new PDO('mysql:host=localhost;', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = "CREATE TABLE IF NOT EXISTS `BoutiqueTP`.`CART` (
    `idCart` INT NOT NULL AUTO_INCREMENT ,
    `numberOfProduct` VARCHAR(100) NOT NULL ,
    `dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`idCart`)) ENGINE = InnoDB;";
    $pdo->exec($sql);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}



//creation table CATEGORIE
try {
    $pdo = new PDO('mysql:host=localhost;', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = "CREATE TABLE IF NOT EXISTS `BoutiqueTP`.`CATEGORIE` (
    `idCategorie` INT NOT NULL AUTO_INCREMENT ,
    `nameCategorie` VARCHAR(100) NOT NULL , PRIMARY KEY (`idCategorie`)) ENGINE = InnoDB;";
    $pdo->exec($sql);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>