<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/C/connect.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/admin/protect.php');

$limit= 20;
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../V/Css/Style.css">
    <title>Page Admin</title>
</head>
<body>
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Réduction</th>
                <th>Prix de Base</th>
                <th>Prix Soldé</th>
                <th>Image (URL/Lien)</th>
                <th colspan="2"><a class="Bouton" href="form_page_index.php">➕</th>
            </tr>
            <?php foreach ($recordset as $row){?>
            <tr>
                <td><?= htmlspecialchars($row['solde_id']);?></td>
                <td><?= htmlspecialchars($row['solde_name']);?></td>
                <td><?= htmlspecialchars($row['solde_description']);?></td>
                <td><?= htmlspecialchars($row['solde_nombre']);?>%</td>
                <td><?= htmlspecialchars($row['solde_prix_base']);?>€</td>
                <td><?= htmlspecialchars($row['solde_prix_calculer']);?>€</td>
                <td><?= htmlspecialchars($row['solde_image']);?></td>
                <td><a class="Bouton" href="form_page_index.php?id=<?= $row["solde_id"];?>">🛠️</a></td>
                <td><a class="Bouton" href="delete_index.php?id=<?= $row["solde_id"];?>">❌</a></td>
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