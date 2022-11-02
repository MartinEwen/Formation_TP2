<?php


try {
    $pdo = new PDO('mysql:host=localhost;dbname=BoutiqueTP;port=3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $nameProduct = $_POST['nameProduct'];
    $descriptionProduct = $_POST['descriptionProduct'];
    $priceProduct = $_POST['priceProduct'];
    if (!empty($_FILES['images'])) {

        $nameFile = $_FILES['images']['name'];
        $typeFile = $_FILES['images']['type'];
        $sizeFile = $_FILES['images']['size'];
        $tmpFile = $_FILES['images']['tmp_name'];
        $errFile = $_FILES['images']['error'];
    
        // Extensions
        $extensions = ['png', 'jpg', 'jpeg', 'gif'];
        // Type d'images
        $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
        // On récupère
        $extension = explode('.', $nameFile);
    
        $name=uniqid().'.' . strtolower(end($extension));
    
        // On vérifie que le type est autorisés
        if (in_array($typeFile, $type)) {
            // On vérifie que il n'y a que deux extensions
            if (count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions)) {
                // On bouge l'images uploadé dans le dossier upload
                if (move_uploaded_file($tmpFile, './upload/' . $name ))
                    $images=$name;
                else
                    echo "failed";
            } else {
                echo "Extension failed";
            }
        } else {
            echo "Type non autorisé";
        }
    } 
    //$sql appartient à la classe PDOStatement
    $sql = $pdo->prepare("
            INSERT INTO PRODUCT(nameProduct,descriptionProduct,priceProduct,images)
            VALUES (:nameProduct, :descriptionProduct, :priceProduct, :images)
            ");
    $sql->execute(array(
        ':nameProduct' => $nameProduct,
        ':descriptionProduct' => $descriptionProduct,
        ':priceProduct' => $priceProduct,
        ':images' => $images,
    ));
    echo "Entrée ajoutée dans la table, formulaire en action";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
 }
header('Location:dashboardAdmin.php');
