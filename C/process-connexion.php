<?php

session_start();

require_once 'config.php';
require_once 'connect.php';

// ─── RÉCUPÉRATION DES CHAMPS ──────────────────────────────────────────────────
$mail     = trim($_POST['user_mail']     ?? '');
$password = trim($_POST['user_password'] ?? '');

// ─── VALIDATION BASIQUE ───────────────────────────────────────────────────────
if (empty($mail) || empty($password)) {
    die("Tous les champs sont obligatoires.");
}

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    die("Adresse mail invalide.");
}

// ─── VÉRIFICATION EN BASE DE DONNÉES ─────────────────────────────────────────
$stmt = $db->prepare("SELECT * FROM table_user WHERE user_email = :mail");
$stmt->execute([':mail' => $mail]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($password, $user['user_password'])) {
    die("Email ou mot de passe incorrect.");
}

// ─── OUVERTURE DE SESSION ─────────────────────────────────────────────────────
$_SESSION['user_connected'] = 'Bienvenue';
$_SESSION['user_id']        = $user['user_id'];
$_SESSION['user_pseudo']    = $user['user_pseudo'];
$_SESSION['user_avatar']    = $user['user_avatar'];

// ─── REDIRECTION ──────────────────────────────────────────────────────────────
header('Location: ../Layout/index.php');
exit;
