<?php
require 'app/connection.php';

$template = 'admin';

$query = $pdo->prepare('SELECT *, Post.Id AS Id FROM Post INNER JOIN Author ON Author.Id = Post.Author_Id INNER JOIN Category ON Category.Id = Post.Category_Id WHERE Post.Id=? ORDER BY Name');

$query->execute([$_GET['Id']]);

$aTab = $query->fetch();

$query2 = $pdo->query('SELECT Id, Name FROM Category');

$query2->execute();

$aTab2 = $query2->fetchAll();

include 'layout.phtml';