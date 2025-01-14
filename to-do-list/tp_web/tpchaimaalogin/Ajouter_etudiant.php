<?php
require 'f.php'; // Connexion à la base de données

// Récupérer la liste des établissements
$stmt = $pdo->query("SELECT * FROM etablissements");
$etablissements = $stmt->fetchAll();

// Traitement du formulaire d'ajout d'étudiant
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $etablissement_id = $_POST['etablissement'];

    // Insérer l'étudiant dans la base de données
    $stmt = $pdo->prepare("INSERT INTO etudiants (nom, mot_de_passe, etablissement) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $mot_de_passe, $etablissement_id]);

    echo "Étudiant ajouté avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Étudiant</title>
    <style>
        /* Style général de la page */
        body {
            background-image: url("12.jpg");
            font-family: 'Arial', sans-serif;
            background-color: #606367;
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
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background-color: #faf2f2;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style du formulaire */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 1.1em;
            color: #333;
        }

        input, select, button {
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #878080;
        }

        input:focus, select:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            background-color: #3498db;
            color: #403a3a;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Message de succès */
        .success-message {
            text-align: center;
            color: #27ae60;
            font-weight: bold;
            margin-top: 20px;
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
    <h1>Ajouter un Étudiant</h1>
    <form method="POST">
        <label for="nom">Nom de l'étudiant:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <label for="etablissement">Établissement:</label>
        <select id="etablissement" name="etablissement" required>
            <?php foreach ($etablissements as $etablissement): ?>
                <option value="<?= $etablissement['id'] ?>">
                    <?= htmlspecialchars($etablissement['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Ajouter Étudiant</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="success-message">
            Étudiant ajouté avec succès!
        </div>
    <?php endif; ?>
</div>
</body>
</html>