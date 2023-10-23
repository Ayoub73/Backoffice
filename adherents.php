<?php
session_start();
require_once("connect_db.php");
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
    <title>Les adhérents</title>
</head>
<body>
    <h1>Les adhérents au club</h1>

<?php
    $recupUsers = $bdd -> query('SELECT * FROM adherent');
    while($user = $recupUsers -> fetch())
    {
        ?>
        <p><?= $user['nom']; ?>&nbsp<?= $user['prenom']; ?>&nbsp<?= $user['dateNaissance']; ?>&nbsp<?= $user['fonction']; ?> <a href="bannir.php?id=<?= $user['id']; ?>" onclick="return myFunction()" style="color:red;
        text-decoration: none;"><button style="color:white; background-color: crimson; margin-bottom: 10px;">Bannir l'adhérent</button></a>
        <a href="modifier.php?id=<?= $user['id']; ?>">
        <button style="color:black; background-color: yellow; margin-bottom: 10px;">Modifier</button>
        </a>
        </p>
        
        <?php
    } 



?>
    <br><br><br>

    <a href="index.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Accueil</button></a>&nbsp
    <a href="ajouter.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Ajouter un adhérent</button></a>&nbsp
    <a href="recherche.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Rechercher un adhérent</button></a>&nbsp
    <a href="logout.php"><button style="color:white; background-color: crimson; margin-bottom: 10px;">Déconnexion</button></a>&nbsp
    
<script src="script.js" defer></script>
</body>
</html>

