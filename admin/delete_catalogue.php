<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: catalogue.php?error=no_id_provided");
    exit();
}

$id = $_GET['id'];

try {
    $stmt = $db->prepare("
        DELETE FROM table_game
        WHERE game_id = ?
    ");

    $stmt->execute([$id]);

} catch (PDOException $e) {
    header("Location: catalogue.php?error=db_failure");
    exit();
}

header("Location: catalogue.php?success=deleted");
exit();
?>