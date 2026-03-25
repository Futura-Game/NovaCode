<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/admin/protect-user.php');

$limit= 4;
$page= 1;
if (!empty($_GET['page'])&& $_GET['page']>1){
    $page = $_GET['page'];
}
$offset= ($page-1)*$limit;

$total=0;
$sql="SELECT COUNT(solde_id) AS total FROM table_solde";
$stmt=$db->prepare($sql);
$stmt->execute();
if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $total = $row["total"];
}
$maxPage= ceil($total/$limit);

$sql="SELECT * FROM table_solde ORDER BY solde_id ASC LIMIT :offset , :limit";
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
        background: url(../../image/Space.jpeg);
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

    div.groupe {
        background-color: rgba(0, 0, 0, 0.75);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    div.groupe img {
        width: 200px;
        height: auto;
        object-fit: cover;
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
    div.text h2{
        margin: 0;
    }
    div.bouton {
        display: flex;
        gap: 10px;
    }
    div.bouton p, div.text {
        color: white;
    }
    div.bouton button {
        width: 100px;
        background-color: black;
        border: #a855f7 3px solid;
        border-radius: 10px;
        color: #a855f7;
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
          <li><a class="active" href="./index.php">Accueil</a></li>
          <li><a href="./catalogue.php">Catalogue</a></li>
          <li><a href="./crédit.php">Crédit</a></li>
          <li><a href="./carte.php">Carte</a></li>
        </ul>
      </nav>

    </div>
  </header>

  <main>
    <div class="titre">
        <h1>Nos meilleurs soldes :</h1>
    </div>
    <?php foreach ($recordset as $row){?>
    <div class="groupe">
        <div class="text+bouton">
            
            <div class="text">
                <h2>(-<?= htmlspecialchars($row['solde_nombre']);?>%) <?= htmlspecialchars($row['solde_name']);?></h2>
                <p><?= htmlspecialchars($row['solde_description']);?></p>
            </div>
            <div class="bouton">
                <button>Ajouter au panier</button>
                <button>Plus d'info</button>
                <p><s><?= htmlspecialchars($row['solde_prix_base']);?> €</s> ➡️ <?= htmlspecialchars($row['solde_prix_calculer']);?> €</p>
            </div>
        </div>
        <img src="<?= htmlspecialchars($row['solde_image']);?>">
    </div>
    <?php }?>


        <?php $maxPage=4;?>

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
