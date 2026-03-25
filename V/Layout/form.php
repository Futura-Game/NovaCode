<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <style>

    h1 {
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

    p {
    color: white;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 3px;
    }

    .form-group input {
        width: 500px;
        height: 35px;
        padding: 0px;
        margin-top: 3px;
        border: 1px solid black;
        border-radius: 4px;
    }

    .bouton {
        width: 100%;
        background-color : black;
        border-radius: 10px;
        display: flex;
    }

    input[type="text"] {
        font-size: 20px;
        padding-left : 5px;
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
        <h1>Formulaire</h1>    
    </haeder>

    <main>
    <form action="form-inscription.php" method="post" enctype="multipart/form-data">
        <p>Si vous n'avez pas de compte</p>
        <div class="bouton">
            <input type="submit" value="Inscription" title="Valider les informations et soumettre le formulaire">
        </div>
    </form>
        <br>
    <form action="form-connextion.php" method="post" enctype="multipart/form-data">
        <p>Si vous avez un compte</p>
        <div class="bouton">
            <input type="submit" value="Connection" title="Valider les informations et soumettre le formulaire">
        </div>
    </form>
    </main>
</body>
</html>