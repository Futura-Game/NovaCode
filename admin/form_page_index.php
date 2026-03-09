<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/function.php');

    $solde_id=0;
    if (isset($_GET["id"])){
        $solde_id=$_GET["id"];
    }
    $solde_name="";
    $solde_description="";
    $solde_nombre ="";
    $solde_prix_base="";
    $solde_prix_calculer="";
    $solde_image ="";

    if ($solde_id > 0){
        $sql="SELECT * FROM table_solde WHERE solde_id=:id";
        $stmt=$db->prepare($sql);
        $stmt->execute([":id" =>$_GET["id"]]);

        if ($row =$stmt->fetch(PDO::FETCH_ASSOC)){
            $solde_name=$row["solde_name"];
            $solde_description=$row["solde_description"];
            $solde_nombre =$row["solde_nombre"];
            $solde_prix_base=$row["solde_prix_base"];          
            $solde_prix_calculer=$row["solde_prix_calculer"];
            $solde_image =$row["solde_image"];
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
    <form action="process_index.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="solde_name">Titre</label>
            <input type="text" class="form-control" name="solde_name" id="solde_name" value="<?=hsc($solde_name);?>">
        </div>

        <div class="form-group">
            <label for="solde_description">Description</label>
            <input type="text" class="form-control" name="solde_description" id="solde_description" value="<?=hsc($solde_description);?>">
        </div>                

        <div class="form-group">
            <label for="solde_nombre ">% De Réduction</label>
            <input type="text" class="form-control" name="solde_nombre" id="solde_nombre" value="<?=hsc($solde_nombre);?>">
        </div>    
        
        <div class="form-group">
            <label for="solde_prix_base">Prix Base</label>
            <input type="text" class="form-control" name="solde_prix_base" id="solde_prix_base" value="<?=hsc($solde_prix_base);?>">
        </div>  

        <div class="form-group">
            <label for="solde_prix_calculer">Prix Solde</label>
            <input type="text" class="form-control" name="solde_prix_calculer" id="solde_prix_calculer" value="<?=hsc($solde_prix_calculer);?>">
        </div>  

        <div class="form-group">
            <label for="solde_image ">Image</label>
            <input type="text" class="form-control" name="solde_image" id="solde_image" value="<?=hsc($solde_image );?>">
        </div> 

        <input type="hidden" name="solde_id" value="<?=hsc($solde_id);?>">

        <div class="bouton">
            <input type="submit" value="Valider" title="Valider les informations et soumettre le formulaire">
        </div>
    </form>
    </main>
</body>
</html>