<?php
$pdo = new PDO("mysql:host=db;dbname=novacode","root","MonMotDePasse123");

$id     = $_POST['game_id'];
$image  = $_POST['game_name'];
$name   = $_POST['game_prix'];
$serie  = $_POST['game_image'];

if (!empty($id)) {

    $stmt = $pdo->prepare("
        UPDATE table_game
        SET game_name = ?,game_prix = ?, game_image = ?
        WHERE game_id = ?
    ");
    
    $stmt->execute([$image, $name, $serie, $id]);

} else {

    $stmt = $pdo->prepare("
        INSERT INTO table_game
            (game_name, game_prix, game_image)
        VALUES
            (?, ?, ?)
    ");

    $stmt->execute([$image, $name, $serie]);
}

header("Location: catalogue.php");
exit();
?>