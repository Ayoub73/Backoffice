<?php
session_start();
require_once("connect_db.php");
if(!$_SESSION['mdp'])
{
    header('Location: connexion.php');
}

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];

    $recupUser = $bdd->prepare('SELECT * FROM adherent WHERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0){
        $userInfo = $recupUser->fetch();
        $nom = $userInfo['nom'];
        $prenom = $userInfo['prenom'];
        $dateNaissance = $userInfo['dateNaissance'];
        $fonction = $userInfo['fonction'];

        if(isset($_POST['valider'])){ 
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['dateNaissance']) AND !empty($_POST['fonction'])){
        $nom_saisi = htmlspecialchars($_POST['nom']);
        $prenom_saisi = htmlspecialchars($_POST['prenom']);
        $dateNaissance_saisi = htmlspecialchars($_POST['dateNaissance']);
        $fonction_saisi = htmlspecialchars($_POST['fonction']);

        $updateMembres = $bdd->prepare('UPDATE adherent SET nom = ?, prenom = ?, dateNaissance = ?, fonction = ? WHERE id = ?');
        $updateMembres->execute(array($nom_saisi, $prenom_saisi, $dateNaissance_saisi, $fonction_saisi, $getid));

        header('Location: adherents.php');
        }
        else{
            echo"<p style=color:red; align=center>Veuillez compléter tous les champs...</p>";
        }
    }
        
        

    }else
    {
        echo "<p style=color:red; align=center>Aucun adhérent trouvé</p>";
    }

}else{
    echo "<p style=color:red; align=center>Aucun identifiant trouvé</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'adhérent</title>
</head>
<body>
<h1 align="center">Modifier l'adhérent</h1>
<form action="" method="POST" align="center">
        Nom : <input type="text" name="nom" value="<?= $nom; ?>"><br>
        Prenom : <input type="text" name="prenom" value="<?= $prenom; ?>"><br>
        Date de naissance : <input type="date" name="dateNaissance" value="<?= $dateNaissance; ?>"><br>
        Fonction : <input type="text" name="fonction" value="<?= $fonction; ?>"><br>
        <button type="submit" name="valider" style="color:white; background-color: #5584EB; margin-bottom: 10px;">Valider</button>
    </form>
    <a href="index.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Accueil</button></a><br>
    <a href="adherents.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Afficher tous les adhérents</button></a><br>
    <a href="ajouter.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Ajouter un adhérent</button></a><br>
    <a href="recherche.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Rechercher un adhérent</button></a><br>
    <a href="logout.php"><button style="color:white; background-color: crimson; margin-bottom: 10px;">Déconnexion</button></a><br>
</body>
</html>