<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');

$limit= 8;
$page= 1;
if (!empty($_GET['page'])&& $_GET['page']>1){
    $page = $_GET['page'];
}
$offset= ($page-1)*$limit;

$total=0;
$sql="SELECT COUNT(game_id) AS total FROM table_game";
$stmt=$db->prepare($sql);
$stmt->execute();
if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $total = $row["total"];
}
$maxPage= ceil($total/$limit);

$sql="SELECT * FROM table_game ORDER BY game_id ASC LIMIT :offset , :limit";
$stmt=$db->prepare($sql);
$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
$stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
$stmt->execute();
$recordset = $stmt ->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nova Code</title>

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url(../../image/Space.jpg);
      background-size: cover;
      background-repeat: no-repeat;
    }

    header {
      background-color: #000000;
      padding-left: 5px;
      padding-top: 5px;
      padding-bottom: 5px;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 25px;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 25px;
      color: white;
      font-weight: bold;
      font-size: 24px;
      white-space: nowrap;
    }

    .logo img {
      width: 50px;
      height: 50px;
      border-radius: 25%;
    }

    .recherche {
      flex: 1;
      max-width: 550px;
      position: relative;
    }

    .recherche input {
      width: 100%;
      height: 40px;
      border-radius: 10px;
      border: 1px solid #a855f7;
      background: transparent;
      color: white;
      padding-left: 40px;
      outline: none;
      font-size: 16px;
    }

    .recherche span {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: white;
      font-size: 18px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 18px;
      margin: 0;
      padding: 0;
    }

    nav a {
      color: rgb(121, 121, 121);
      text-decoration: none;
      font-size: 16px;
    }

    nav a:hover {
      color: white;
    }

    nav a.active {
      color: #a855f7;
      text-decoration: underline;
      text-underline-offset: 6px;
    }

    nav.page ul {
        justify-content: center;
        background-color: black;
        list-style: none;
        display: flex;
        gap: 18px;
        margin: 0;
        padding: 5px;
    }

    nav.page a {
        color: rgb(121, 121, 121);
        text-decoration: none;
        font-size: 25px;
    }

    nav.page a:hover {
        color: white;
    }

    div.titre {
        background: url(../../image/Maquette-pour-Solde.png);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 100px;
        display: flex;
        justify-content: center; /* centre horizontalement */
        align-items: center;     /* centre verticalement */
    }
    div.titre h1 {
        color: white;
        margin: 0;
    }
        .select-categorie {
            display: grid;
            margin: 10px;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 10px;
            color: white;
        }
        .select-categorie img {
            width: 330px;
            height: 185px;
            padding: 8px;
            border-radius: 20px;
        }
        .select-categorie p {
            margin: 0;
            font-size: 20px;
        }
        .select-categorie button {
            margin: 0;
        }
        .Choix{
            border: solid 2px white;
            border-radius: 20px;
            height: 260px;
            display: flex;  
            flex-direction: column;
            justify-content: center; /* centrer horizontalement */
            align-items: center;     /* centrer verticalement */
            text-align: center;
            background-color: black;
            object-fit: cover;
        }
    div.bouton {
        display: flex;
        gap: 10px;
    }
  </style>
</head>

<body>
  <header>
    <div class="header">

      <div class="logo">
        <img src="../../image/Nova.png" alt="Nova">
        <span>Nova Code</span>
      </div>

      <div class="recherche">
        <span>🔍</span>
        <input type="search" placeholder="Recherche">
      </div>

      <nav>
        <ul>
          <li><a href="./index.php">Accueil</a></li>
          <li><a class="active" href="./catalogue.php">Catalogue</a></li>
          <li><a href="./crédit.php">Crédit</a></li>
          <li><a href="./carte.php">Carte</a></li>
        </ul>
      </nav>

    </div>
  </header>

  <main>
    <div class="titre">
        <h1>Nos jeux disponible  :</h1>
    </div>
      
    <div class="select-categorie">
      <?php foreach ($recordset as $row){?>
        <div class="Choix">
          <p><?= ($row['game_prix'] <= 0) ? "Gratuit" : htmlspecialchars($row['game_prix']) . "€"; ?></p>
          <img src="<?= htmlspecialchars($row['game_image']);?>" alt="Nova" width="100px">
          <div class="bouton">
            <button>Ajouter au panier</button>
            <button>Plus d'info</button>         
          </div>
        </div>
        <?php }?>
    </div>
        

        <?php $maxPage=2;?>

        <nav class="page">
        <ul>
            <li><a class="Bouton" href="?page=1">&lt;&lt;</a></li>
            <li><a class="Bouton" href="?page=<?=$page>1?$page-1:1;?>">&lt;</a></li>
            <?php for ($i=1;$i<=$maxPage;$i++){ ?>
                <li><a class="Bouton" href="?page=<?=$i;?>"><?=$i;?></a></li>
            <?php } ?>            
            <li><a class="Bouton" href="?page=<?=$page<$maxPage?$page+1:$maxPage;?>">&gt;</a></li>
            <li><a class="Bouton" href="?page=<?=$maxPage;?>">&gt;&gt;</a></li>
        </ul>
        </nav>
  </main>
</body>
</html>
