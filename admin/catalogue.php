<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');

$limit= 20;
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/Style.css">
    <title>Page Admin</title>
</head>
<body>
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Image (URL/Lien)</th>
                <th colspan="2"><a class="Bouton" href="form_page_catalogue.php">➕</th>
            </tr>
            <?php foreach ($recordset as $row){?>
            <tr>
                <td><?= htmlspecialchars($row['game_id']);?></td>
                <td><?= htmlspecialchars($row['game_name']);?></td>
                <td><?= htmlspecialchars($row['game_prix']);?>€</td>
                <td><?= htmlspecialchars($row['game_image']);?></td>
                <td><a class="Bouton" href="form_page_catalogue.php?id=<?= $row["game_id"];?>">🛠️</a></td>
                <td><a class="Bouton" href="delete_catalogue.php?id=<?= $row["game_id"];?>">❌</a></td>
            </tr>
            <?php }?>
        </table>

        <?php $maxPage=2;?>

        <div>
        <ul>
            <li><a class="Bouton" href="?page=1">&lt;&lt;</a></li>
            <li><a class="Bouton" href="?page=<?=$page>1?$page-1:1;?>">&lt;</a></li>
            <?php for ($i=1;$i<=$maxPage;$i++){ ?>
                <li><a class="Bouton" href="?page=<?=$i;?>"><?=$i;?></a></li>
            <?php } ?>            
            <li><a class="Bouton" href="?page=<?=$page<$maxPage?$page+1:$maxPage;?>">&gt;</a></li>
            <li><a class="Bouton" href="?page=<?=$maxPage;?>">&gt;&gt;</a></li>
        </ul>
        </div>
    </main>
</body>
</html>