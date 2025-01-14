<?php
require 'f.php';

$stmt = $pdo->query("SELECT * FROM etudiants");
$etudiants = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
</head>
<body>
<h1>Liste des étudiants</h1>
<ul>
    <?php foreach ($etudiants as $etudiant): ?>
        <li><?= $etudiant['nom'] ?> - <?= $etudiant['etablissement'] ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>