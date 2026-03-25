<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');

session_start();
if (!isset($_SESSION["user_connected"]) || $_SESSION["user_connected"] != "Bienvenue" || !isset($_SESSION['user_id'])) {
    header("location:form.php");
    exit;
}

// Recharge les infos de l'user depuis la BDD à chaque page
$stmt = $db->prepare("SELECT user_pseudo, user_avatar FROM table_user WHERE user_id = :id");
$stmt->execute([':id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $_SESSION['user_pseudo'] = $user['user_pseudo'];
    $_SESSION['user_avatar'] = $user['user_avatar'];
}
?>
