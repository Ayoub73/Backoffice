<?php
session_start();
if(!$_SESSION['mdp'])
{
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Accueil</h1>
    <a href="adherents.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Afficher tous les adhérents</button></a><br>
    <a href="ajouter.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Ajouter un adhérent</button></a><br>
    <a href="recherche.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Rechercher un adhérent</button></a><br>
    <a href="logout.php"><button style="color:white; background-color: crimson; margin-bottom: 10px;">Déconnexion</button></a><br>
</body>
</html>