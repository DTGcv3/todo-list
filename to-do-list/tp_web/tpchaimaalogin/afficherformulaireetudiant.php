<?php
include 'index.php';

$sql = "SELECT * FROM etudiants";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Étudiants</title>
</head>
<body>
<h1>Liste des Étudiants</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Établissement</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['etablissement']; ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
