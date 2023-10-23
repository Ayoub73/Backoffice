<?php
session_start();
if(isset($_POST['valider']))
{
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']))
    {
        $pseudo_par_defaut = "administrateur";
        $mdp_par_defaut = "45730257";
        
        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut)
        {
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location: index.php');
        }
        else{
            echo "<p style=color:red; align=center>Votre mot de passe ou pseudo est incorrect</p>";
        }
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
    <title>Espace de connexion admin</title>
</head>
<body>
    <h1 align="center">Backoffice my Admin</h1>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo" autocomplete="off">
        <br>
        <input type="password" name="mdp">
        <br><br>
        <button type="submit" name="valider" style="color:white; background-color: #5584EB; margin-bottom: 10px;">Connexion</button>
    </form>    
</body>
</html>




