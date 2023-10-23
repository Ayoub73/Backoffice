<?php
session_start();
require_once("connect_db.php");
if(isset($_GET['id']) AND !empty($_GET['id']))
{
    $getid = $_GET['id'];
    $recupUser = $bdd -> prepare('SELECT * FROM adherent WHERE id = ?');
    $recupUser -> execute(array($getid));
    if($recupUser -> rowCount() > 0)
    {
        	$bannirUser = $bdd -> prepare('DELETE FROM adherent WHERE id = ?');
            $bannirUser -> execute(array($getid));

            header('Location: recherche.php');
    }
    else
    {
        echo "Aucun adhérent n'a été trouvé";
    }
}
else
{
    echo "L'identifiant n'a pas été récupérer";
}
?>