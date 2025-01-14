<?php
require 'f.php'; // Connexion à la base de données

// Récupérer les noms des établissements
$stmt = $pdo->query("SELECT nom FROM etablissements");
$etablissements = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Établissements</title>
    <style>
        /* Style général de la page */
        body {
            background-image: url("12.jpg");
            height: 1000px;
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            font-size: 2em;
            color: #2c3e50;
        }

        /* Conteneur principal */
        .container {
            width: 80%;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style de la liste des établissements */
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            font-size: 1.2em;
            background-color: #fff;
            border: 1px solid #ddd;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        li:hover {
            background-color: #3498db;
            color: white;
        }

        /* Style du lien retour */
        a {
            display: block;
            text-align: center;
            margin-top: 30px;
            font-size: 1.2em;
            text-decoration: none;
            color: #3498db;
            padding: 10px 20px;
            background-color: #ecf0f1;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #3498db;
            color: white;
        }

        /* Style pour les écrans petits */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Liste des Établissements</h1>
    <ul>
        <?php foreach ($etablissements as $etablissement): ?>
            <li><?= htmlspecialchars($etablissement['nom']) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="menubar.php">Retour au Menu</a>
</div>
</body>
</html>