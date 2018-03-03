<?php
require 'app/connection.php';

$template = 'show_post';

if (sizeof($_POST) > 0) {
	if (!empty($_POST['pseudo']) && !empty($_POST['comment']))
    {
    
    	 $query = $pdo->prepare('
            INSERT INTO Comment (NickName, Contents, CreationTimeStamp, Post_Id)
            VALUES(?,?, NOW(), ?)
        ');


    	$query->execute([$_POST['pseudo'], $_POST['comment'], $_GET['Id']]);

    	header('location:show_post.php?Id='.$_GET['Id']);	
    }
}

if (isset($_GET['Id'])) {
$query = $pdo->prepare('SELECT *, Post.Id AS Id FROM Post INNER JOIN Author ON Author.Id = Post.Author_Id INNER JOIN Category ON Category.Id = Post.Category_Id WHERE Post.Id=? ORDER BY Name');

$query->execute([$_GET['Id']]);

$aTab = $query->fetch();

$query2 = $pdo->prepare('SELECT * FROM Comment WHERE Post_Id=?');
$query2->execute([$_GET['Id']]);
$aComments = $query2->fetchAll();
}


include 'layout.phtml';
