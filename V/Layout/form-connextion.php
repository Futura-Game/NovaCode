<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/function.php');

    $errorMessage="";
    if(!empty($_POST['pwd']) && !empty($_POST['mail'])){
        $errorMessage="<p>Problème de Mail ou de Mot de passe</p>";
        $sql = "SELECT * FROM table_user WHERE user_email = :mail ";
        $stmt = $db->prepare($sql);
        $stmt->execute([":mail"=>$_POST['mail']]);
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if (password_verify($_POST['pwd'], $row['user_password'])){
                session_start();
                $_SESSION["user_connected"] = "Bienvenue";
                $_SESSION['user_id'] = $row['user_id'];

                header("Location:index.php");
                exit();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Connextion</title>
    <style>

    h1, p {
    text-align: center;
    color: white;
    }

    body {
    font-family: Arial, sans-serif;
    background: url(../../image/Space.jpeg);
    background-size: cover;      /* Remplit tout le bloc */
    background-repeat: no-repeat;
    padding: 20px;
    font-size: 20px;
    }

    main {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #060023;
    border-radius: 10px;
    }

    .form-group {
        margin-bottom: 15px;
        color: white;
    }

    .form-group label {
        display: block;
        margin-bottom: 3px;
    }

    .form-group input {
        width: 494px;
        height: 35px;
        padding: 0px;
        margin-top: 3px;
        background-color: #060023;
        border: 1px solid #A855F7;
        border-radius: 4px;
    }

    .bouton {
        width: 100%;
        background-color : black;
        border-radius: 10px;
        display: flex;
    }

    input[type="email"], input[type="password"]  {
        font-size: 20px;
        padding-left : 5px;
        color: white;
    }

    input[type="submit"] {
        color: white;
        width: 500px;
        height: 50px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 20px;
    }

    input[type="submit"] {
        background-color: #A855F7;
    }
    </style>
</head>
<body>
    <haeder>
        <h1>Formulaire User</h1>    
    </haeder>

    <main>
    <p>BIENVENUE User, veuillez vous identifier</p>

    <form action="" method="post">
        
        <div class="form-group">
            <label for="user_mail">🔒 Adresse Mail</label>
            <input type="email" name="mail" id="mail" required>
        </div>

        <div class="form-group">
            <label for="user_password">🔒 Mot de passe</label>
            <input type="password" name="pwd" id="pwd" required>
        </div>

        <div class="bouton">
            <input type="submit" value="Valider🔑" title="Valider les informations et soumettre le formulaire">
        </div>

        <?= $errorMessage;?>
    </form>
    </main>
</body>
</html>