<?php

require 'app/connection.php';

$template = 'contact';

if (sizeof($_POST) > 0) {
	if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['message']) && isset($_POST['submit']))
	{
		

	$nom = $_POST['lastname'];
	$prenom = $_POST['firstname'];
	$email = $_POST['email'];
	$message = $_POST['message'];


	$insertion = $pdo->prepare('INSERT INTO Contact (Firstname, Lastname, Email, Messages, CreationTimestamp)
    	VALUES (?,?,?,?,NOW())');
	$insertion->execute(array(
    $prenom,
    $nom,
    $email,
    $message
            ));

    header('location:contact_treatment.php');
    
	}
}

/*
Création d'une nouvelle table dans MySQL :

CREATE TABLE IF NOT EXISTS `Contact` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(100) NOT NULL,
  `Lastname`varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Messages` text NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Lastname` (`Lastname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

*/

// je charge le template de base (le squelette)
include 'layout.phtml';