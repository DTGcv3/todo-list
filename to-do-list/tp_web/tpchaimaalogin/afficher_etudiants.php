<?php
require 'f.php'; // Connexion à la base de données

// Récupérer les étudiants avec leurs établissements
$stmt = $pdo->query("
    SELECT etudiants.nom AS etudiant_nom, etablissements.nom AS etablissement_nom
    FROM etudiants
    LEFT JOIN etablissements ON etudiants.etablissement = etablissements.id
");
$etudiants = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Étudiants</title>
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

            width: 50%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style du tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #f1c40f;
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

            table {
                font-size: 0.9em;
            }

            h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Liste des Étudiants</h1>
    <table>
        <thead>
        <tr>
            <th>Nom de l'Étudiant</th>
            <th>Établissement</th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($etudiants) > 0): ?>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?= htmlspecialchars($etudiant['etudiant_nom']) ?></td>
                    <td><?= htmlspecialchars($etudiant['etablissement_nom']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2" style="text-align: center;">Aucun étudiant trouvé</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <a href="menubar.php">Retour au Menu</a>
</div>
</body>
</html>