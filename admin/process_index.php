<?php
$pdo = new PDO("mysql:host=db;dbname=novacode","root","MonMotDePasse123");

$id     = $_POST['solde_id'];
$image  = $_POST['solde_image'];
$name   = $_POST['solde_name'];
$serie  = $_POST['solde_description'];
$volume = $_POST['solde_nombre'];
$price  = $_POST['solde_prix_base'];
$author = $_POST['solde_prix_calculer'];

if (!empty($id)) {

    $stmt = $pdo->prepare("
        UPDATE table_solde 
        SET solde_image = ?,solde_name = ?, solde_description = ?, solde_nombre = ?, 
            solde_prix_base = ?, solde_prix_calculer = ?
        WHERE solde_id = ?
    ");
    
    $stmt->execute([$image, $name, $serie, $volume, $price, $author, $id]);

} else {

    $stmt = $pdo->prepare("
        INSERT INTO table_solde 
            (solde_image, solde_name, solde_description, solde_nombre, solde_prix_base, solde_prix_calculer)
        VALUES
            (?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([$image, $name, $serie, $volume, $price, $author]);
}

header("Location: index.php");
exit();
?>