<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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

    input[type="text"] {
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

/* Zone de l'aperçu de l'avatar */
    .avatar-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }

    .preview-circle {
        width: 120px;
        height: 120px;
        background-color: #e3e5e8; /* Gris Discord */
        border: 3px solid black;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .preview-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* On cache l'input moche, on cliquera sur le cercle à la place */
    #user_avatar {
        display: none;
    }

    .upload-label {
        font-size: 14px;
        color: #A855F7;
        cursor: pointer;
        text-decoration: underline;
    }
    </style>
</head>
<body>
    <haeder>
        <h1>Inscription</h1>    
    </haeder>

    <main>
        <form action="../../C/process.php" method="post" enctype="multipart/form-data">
            <div class="avatar-wrapper">
                <label for="user_avatar" class="preview-circle" title="Cliquez pour changer l'avatar">
                    <img id="output" src="https://www.pngall.com/wp-content/uploads/12/Avatar-Profile-Vector-PNG-File.png">
                </label>
                <label for="user_avatar" class="upload-label">Choisir une image</label>
                <input type="file" name="user_avatar" id="user_avatar" accept="image/*" onchange="loadFile(event)">
            </div>
            
            <div class="form-group">
                <label for="user_pseudo">Pseudo</label>
                <input type="text" class="form-control" name="user_pseudo" id="user_pseudo" value="">
            </div>

            <div class="form-group">
                <label for="user_mail">Adresse Mail</label>
                <input type="text" class="form-control" name="user_mail" id="user_mail" value="">
            </div>

            <div class="form-group">
                <label for="user_password">Mot de passe</label>
                <input type="text" class="form-control" name="user_password" id="user_password" value="">
            </div>                

            <div class="bouton">
                <input type="submit" value="Valider" title="Valider les informations et soumettre le formulaire">
            </div>
        </form>

        <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // libération mémoire
            }
        };
        </script>
    </main>
</body>
</html>