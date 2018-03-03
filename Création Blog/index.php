<?php
require 'app/connection.php';
// je défini mon template qui sera chargé
$template = 'home';

$query = $pdo->query('SELECT *, Post.Id AS Id FROM Post INNER JOIN Author ON Author.Id = Post.Author_Id INNER JOIN Category ON Category.Id = Post.Category_Id ORDER BY name');

$query->execute();

$aTab = $query->fetchAll();




// je charge le template de base (le squelette)
include 'layout.phtml';