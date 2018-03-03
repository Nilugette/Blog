<?php
require 'app/connection.php';

$template = 'show_post';

$query = $pdo->prepare('DELETE FROM Post WHERE Post.Id=? AS Id');

$query->execute([$_GET['Id']]);




header('location:index.php');