<!DOCTYPE html>
<html>
<head>
	<title>Rechercher un adhérent</title>
</head>
<body>
<h1>Rechercher un adhérent</h1><br>
<form method="post">
<label>Nom</label>
<input type="text" name="search">
<button type="submit" name="submit" style="color:white; background-color: #5584EB; margin-bottom: 10px;">Confirmer</button>
	
</form>



<?php

session_start();
require_once("connect_db.php");
if(!$_SESSION['mdp'])
{
    header('Location: connexion.php');
}

if (isset($_POST["submit"])) {
	if (!empty($_POST['search'])){
	
	$str = $_POST["search"];
	$sth = $bdd->prepare("SELECT * FROM `adherent` WHERE nom = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br>
		<table>
			
		<?php	
		$recupUsers = $bdd -> query("SELECT * FROM `adherent` WHERE nom = '$str'");
    while($user = $recupUsers -> fetch())
    {
        ?>
        <p><?= $user['nom']; ?>&nbsp<?= $user['prenom']; ?>&nbsp<?= $user['dateNaissance']; ?>&nbsp<?= $user['fonction']; ?> <a href="bannir_recherche.php?id=<?= $user['id']; ?>" onclick="return myFunction()" style="color:red;
        text-decoration: none;"><button style="color:white; background-color: crimson; margin-bottom: 10px;">Bannir l'adhérent</button></a>
        <a href="modifier_recherche.php?id=<?= $user['id']; ?>">
        <button style="color:black; background-color: yellow; margin-bottom: 10px;">Modifier</button>
        </a>
        </p>
        
        <?php
    } 
	?>

		</table>
<?php 
	}
		
		
		else{
			?>
			<p>L'adhérent que vous recherchez n'existe pas voulez le créer ? &nbsp<a href="ajouter.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Ajouter un adhérent</button></a></p>
			<?php
		}
	}
	else{
		echo"<p style=color:red;>Veuillez compléter le champ...</p>";
	}


}

?>

	<br><br><br><br><br>
	<a href="index.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Accueil</button></a>&nbsp
    <a href="adherents.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Afficher tous les adhérents</button></a>&nbsp
    <a href="ajouter.php"><button style="color:white; background-color: purple; margin-bottom: 10px;">Ajouter un adhérent</button></a>&nbsp
    <a href="logout.php"><button style="color:white; background-color: crimson; margin-bottom: 10px;">Déconnexion</button></a>&nbsp
	
	<script src="script.js" defer></script>
	</body>
	</html>
