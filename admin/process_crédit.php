<?php
$pdo = new PDO("mysql:host=db;dbname=novacode","root","MonMotDePasse123");

$id     = $_POST['crédit_id'];
$image  = $_POST['crédit_name'];
$name   = $_POST['crédit_prix'];
$serie  = $_POST['crédit_image'];

if (!empty($id)) {

    $stmt = $pdo->prepare("
        UPDATE table_crédit
        SET crédit_name = ?,crédit_prix = ?, crédit_image = ?
        WHERE crédit_id = ?
    ");
    
    $stmt->execute([$image, $name, $serie, $id]);

} else {

    $stmt = $pdo->prepare("
        INSERT INTO table_crédit
            (crédit_name, crédit_prix, crédit_image)
        VALUES
            (?, ?, ?)
    ");

    $stmt->execute([$image, $name, $serie]);
}

header("Location: crédit.php");
exit();
?>