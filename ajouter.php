<?php
require_once("connect_db.php");
session_start();
if(!$_SESSION['mdp'])
{
    header('Location: connexion.php');
}

if(isset($_POST['envoi'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['dateNaissance']) AND !empty($_POST['fonction']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $dateNaissance = htmlspecialchars($_POST['dateNaissance']);
        $fonction = htmlspecialchars($_POST['fonction']);

        $insererMembres = $bdd -> prepare('INSERT INTO adherent(nom, prenom, dateNaissance, fonction) VALUES(?, ?, ?, ?)');
        $insererMembres -> execute(array($nom, $prenom, $dateNaissance, $fonction));

        echo "<p style=color:green; align=center>L'adhérent a bien été ajouté</p>";
    }
    
    else
    {
        echo "<p style=color:red; align=center>Veuillez compléter tous les champs...</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un adhérent</title>
</head>
<body>
    <h1 align="center">Ajouter un adhérent au club</h1>
    <form action="" method="POST" align="center">
        Nom : <input type="text" name="nom"><br>
        Prenom : <input type="text" name="prenom"><br>
        Date de naissance : <input type="date" name="dateNaissance"><br>
        Fonction : <input type="text" name="fonction"><br><br>
        <button type="submit" name="envoi" type="submit" name="valider" style="color:white; background-color: #5584EB; margin-bottom: 10px;">Ajouter</button>
    </form>
    <a href="index.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Accueil</button></a><br>
    <a href="adherents.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Afficher tous les adhérents</button></a><br>    
    <a href="recherche.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Rechercher un adhérent</button></a><br>
    <a href="logout.php"><button style="color:white; background-color: crimson; margin-bottom: 10px;">Déconnexion</button></a><br>
    
</body>
</html>





