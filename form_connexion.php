<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=BoutiqueTP;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $mailUser = $_POST['mailUser'];
    // Récupération de l'utilisateur et de son pass hashé
    $req = $pdo->prepare('SELECT * FROM USERS WHERE mailUser = :mailUser');
    $req->execute(array(
        'mailUser' => $mailUser
    ));
    $resultat = $req->fetch();
    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['passwordUser'], $resultat['passwordUser']);
    if (!$resultat) {
        header("location:login.php");
        echo 'Mauvais identifiant ou mot de passe !';
    } else {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['idUser'] = $resultat['idUser'];
            $_SESSION['mailUser'] = $mailUser;
            header("location:index.php");
        } else {
            header("location:login.php");
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>