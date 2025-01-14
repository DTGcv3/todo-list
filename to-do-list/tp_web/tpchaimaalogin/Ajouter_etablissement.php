<?php
require 'f.php'; // Connexion à la base de données

// Récupérer les établissements existants
$stmt = $pdo->query("SELECT id, nom FROM etablissements");
$etablissements = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['nouvel_etablissement'])) {
        // Ajouter un nouvel établissement
        $nouvel_etablissement = $_POST['nouvel_etablissement'];
        $stmt = $pdo->prepare("INSERT INTO etablissements (nom) VALUES (:nom)");
        $stmt->execute(['nom' => $nouvel_etablissement]);

        echo "Nouvel établissement ajouté avec succès !";
    } elseif (!empty($_POST['etablissement_id'])) {
        // Établissement existant sélectionné
        $etablissement_id = $_POST['etablissement_id'];
        echo "Établissement sélectionné : ID $etablissement_id";
    } else {
        echo "Veuillez sélectionner ou ajouter un établissement.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Établissement</title>
    <style>
        /* Styles généraux */
        body {
            background-image: url("12.jpg");
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* En-tête */
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Formulaire */
        form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(154, 135, 135, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #293c9f;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #293c9f;
        }

        /* Lien de retour */
        a {
            margin-top: 15px;
            color: #273eae;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h1>Ajouter un Établissement</h1>
<form method="POST" action="">
    <label for="nouvel_etablissement">Ajouter un nouvel établissement :</label>
    <input type="text" id="nouvel_etablissement" name="nouvel_etablissement" placeholder="Nom du nouvel établissement">
    <button type="submit">Valider</button>
</form>
<a href="menubar.php">Retour au Menu</a>
</body>
</html>