<?php
$sup=$_GET['idProduct'];
try {
    $pdo = new PDO('mysql:host=localhost;dbname=BoutiqueTP;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sqlDelete="DELETE FROM PRODUCT WHERE idProduct=$sup";
    $sql = $sqlDelete;
    $sth = $pdo->prepare($sql);
    $sth->execute();
    } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    }
    header('Location:dashboardAdmin.php');
?>