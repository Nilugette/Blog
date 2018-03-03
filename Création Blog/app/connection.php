<?php

$pdo = new PDO(
	'mysql:host=127.0.0.1;dbname=blog;charset=UTF8', 
    'root', 
    'troiswa', 
	[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC] );

