<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <style>
        /* Style général */
        body {
            background-image: url("12.jpg");
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Conteneur des boutons */
        a {
            text-decoration: none;
            margin: 10px;
        }

        button {
            padding: 10px 20px;
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

        button:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>
<h1>Tableau de bord</h1>
<a href="afficher_etudiants.php"><button>Afficher Étudiants</button></a>
<a href="afficher_etablissements.php"><button>Afficher Établissements</button></a>
<a href="ajouter_etudiant.php"><button>Ajouter Étudiant</button></a>
<a href="ajouter_etablissement.php"><button>Ajouter Établissement</button></a>
</body>
</html>
