<?php

session_start();

require_once 'config.php';
require_once 'connect.php';

// ─── RÉCUPÉRATION DES CHAMPS TEXTE ───────────────────────────────────────────
$pseudo   = trim($_POST['user_pseudo']   ?? '');
$mail     = trim($_POST['user_mail']     ?? '');
$password = trim($_POST['user_password'] ?? '');

// ─── VALIDATION BASIQUE ───────────────────────────────────────────────────────
if (empty($pseudo) || empty($mail) || empty($password)) {
    die("Tous les champs sont obligatoires.");
}

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    die("Adresse mail invalide.");
}

// ─── TRAITEMENT DE L'IMAGE ────────────────────────────────────────────────────
$avatarPath = 'uploads/avatars/default.png';

if (isset($_FILES['user_avatar']) && $_FILES['user_avatar']['error'] === UPLOAD_ERR_OK) {

    $file     = $_FILES['user_avatar'];
    $ext      = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $mimeType = mime_content_type($file['tmp_name']);

    $allowedExts  = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    $allowedMimes = ['image/jpeg', 'image/png', 'image/x-png', 'image/webp', 'image/gif'];

    if (!in_array($ext, $allowedExts) || !in_array($mimeType, $allowedMimes)) {
        die("Type de fichier non autorisé. Formats acceptés : JPG, PNG, WEBP, GIF.");
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        die("Image trop volumineuse (2 Mo maximum).");
    }

    $uploadDir = 'uploads/avatars/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $filename   = uniqid('avatar_', true) . '.' . $ext;
    $avatarPath = $uploadDir . $filename;

    if (!move_uploaded_file($file['tmp_name'], $avatarPath)) {
        die("Erreur lors de l'enregistrement de l'image.");
    }
}

// ─── VÉRIFICATION DOUBLON EMAIL ──────────────────────────────────────────────
$check = $db->prepare("SELECT user_id FROM table_user WHERE user_email = :mail");
$check->execute([':mail' => $mail]);
if ($check->fetch()) {
    die("Cet email est déjà utilisé.");
}

// ─── INSERTION EN BASE DE DONNÉES ───────────────────────────────────────────────────────────────────────────────────────
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$stmt = $db->prepare("
    INSERT INTO table_user (user_pseudo, user_email, user_password, user_avatar, user_date_inscription)
    VALUES (:pseudo, :mail, :password, :avatar, NOW())
");

$stmt->execute([
    ':pseudo'   => $pseudo,
    ':mail'     => $mail,
    ':password' => $passwordHash,
    ':avatar'   => $avatarPath,
]);

// ─── OUVERTURE DE SESSION APRÈS INSCRIPTION ───────────────────────────────────
$_SESSION['user_connected'] = 'Bienvenue';
$_SESSION['user_id']        = $db->lastInsertId();
$_SESSION['user_pseudo']    = $pseudo;
$_SESSION['user_avatar']    = $avatarPath;

// ─── REDIRECTION APRÈS SUCCÈS ─────────────────────────────────────────────────
header('Location: ../V/Layout/index.php');
exit;
