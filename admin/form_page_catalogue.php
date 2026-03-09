<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/function.php');

    $game_id=0;
    if (isset($_GET["id"])){
        $game_id=$_GET["id"];
    }
    $game_name="";
    $game_prix="";
    $game_image ="";

    if ($game_id > 0){
        $sql="SELECT * FROM table_solde WHERE game_id=:id";
        $stmt=$db->prepare($sql);
        $stmt->execute([":id" =>$_GET["id"]]);

        if ($row =$stmt->fetch(PDO::FETCH_ASSOC)){
            $game_name=$row["game_name"];
            $game_prix=$row["game_prix"];
            $game_image =$row["game_image"];
        }
    }

?>

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
    background-color: cyan;
    background-size: cover;      /* Remplit tout le bloc */
    background-repeat: no-repeat;
    padding: 20px;
    font-size: 20px;
    }

    main {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
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
        background-color: #00d026ff;
    }
    </style>
</head>
<body>
    <haeder>
        <h1>Formulaire</h1>    
    </haeder>

    <main>
    <form action="process_catalogue.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="game_name">Titre</label>
            <input type="text" class="form-control" name="game_name" id="game_name" value="<?=hsc($game_name);?>">
        </div>  
        
        <div class="form-group">
            <label for="game_prix">Prix Base</label>
            <input type="text" class="form-control" name="game_prix" id="game_prix" value="<?=hsc($game_prix);?>">
        </div>

        <div class="form-group">
            <label for="game_image ">Image</label>
            <input type="text" class="form-control" name="game_image" id="game_image" value="<?=hsc($game_image );?>">
        </div> 

        <input type="hidden" name="game_id" value="<?=hsc($game_id);?>">

        <div class="bouton">
            <input type="submit" value="Valider" title="Valider les informations et soumettre le formulaire">
        </div>
    </form>
    </main>
</body>
</html>