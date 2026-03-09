<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?error=no_id_provided");
    exit();
}

$id = $_GET['id'];

try {
    $stmt = $db->prepare("
        DELETE FROM table_solde
        WHERE solde_id = ?
    ");

    $stmt->execute([$id]);

} catch (PDOException $e) {
    header("Location: index.php?error=db_failure");
    exit();
}

header("Location: index.php?success=deleted");
exit();
?>