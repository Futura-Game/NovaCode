<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: crédit.php?error=no_id_provided");
    exit();
}

$id = $_GET['id'];

try {
    $stmt = $db->prepare("
        DELETE FROM table_crédit
        WHERE crédit_id = ?
    ");

    $stmt->execute([$id]);

} catch (PDOException $e) {
    header("Location: crédit.php?error=db_failure");
    exit();
}

header("Location: crédit.php?success=deleted");
exit();
?>