<?php
require 'f.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    @$nom = $_POST['nom'];
    @$mot_de_passe = $_POST['mot_de_passe'];

    $stmt = $pdo->prepare("SELECT * FROM etudiants WHERE nom = :nom AND mot_de_passe = :mot_de_passe");
    $stmt->execute(['nom' => $nom, 'mot_de_passe' => $mot_de_passe]);
    $etudiant = $stmt->fetch();

    if ($etudiant) {
        header('Location: menubar.php');
        exit();
    } else {
        $erreur = "Nom ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        /* Style général */
        body {
            background-image: url("12.jpg");
            font-family: Arial, sans-serif;
            background-color: #4d504d;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        /* Conteneur du formulaire */
        .container {
            background-color: #c5bebe;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Connexion</h1>
    <?php if (isset($erreur)) echo "<p class='error'>$erreur</p>"; ?>
    <form method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

        <button type="submit">Connexion</button>
    </form>
</div>
</body>
</html>
