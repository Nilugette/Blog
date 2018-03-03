<?php
require 'app/connection.php';

$template = 'admin';



$query = $pdo->query('SELECT * FROM Author');
$query->execute();
$aTab = $query->fetchAll();


$query2 = $pdo->query('SELECT Id, Name FROM Category');
$query2->execute();
$aTab2 = $query2->fetchAll();

$query3 = $pdo->query('SELECT * FROM Post');
$query3->execute();
$aTab3 = $query->fetchAll();


if (sizeof($_POST) > 0) {

	if (!empty($_POST['title']) && !empty($_POST['contents']) && !empty($_POST['author']) && !empty($_POST['category']) )
	{
		$titre = $_POST['title'];
		$message = $_POST['contents'];
		$auteur = $_POST['author'];
		$categorie = $_POST['category'];
		$idPost = $_POST['id_post'];

		$modify = $pdo->prepare('
			UPDATE Post SET Title = ?, Contents = ?, Author_Id = ?, Category_Id = ? WHERE Id = ?
	    ');

		$modify->execute(array(
		    $titre,
		    $message,
		    $auteur,
		    $categorie,
			$idPost
	    ));
	}
}


//header('location:admin.php?Id='.$_POST['id_post']);
header('location:index.php');
