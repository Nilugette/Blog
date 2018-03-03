<?php

require 'app/connection.php';

// je défini mon template qui sera chargé
$template = 'add_post';


$query = $pdo->query('SELECT * FROM Author');

$query->execute();

$aTab = $query->fetchAll();


$query2 = $pdo->query('SELECT Id, Name FROM Category');

$query2->execute();

$aTab2 = $query2->fetchAll();

if (sizeof($_POST) > 0) {
	if (!empty($_POST['title']) && !empty($_POST['contents']) && !empty($_POST['author']) && !empty($_POST['category']) )
	{
		
	$titre = $_POST['title'];
	$message = $_POST['contents'];
	$auteur = $_POST['author'];
	$categorie = $_POST['category'];


	$insertion = $pdo->prepare('INSERT INTO Post (Title, Contents, Author_Id, Category_Id, CreationTimestamp)
    	VALUES (?,?,?,?,NOW())');
	$insertion->execute(array(
    $titre,
    $message,
    $auteur,
    $categorie
            ));
	$aTab3 = $insertion->fetchAll();
	}
}



// je charge le template de base (le squelette)
include 'layout.phtml';