<?php 

// Connexion DB
define('DB_DSN', 'mysql:dbname=test;host=localhost;charset=UTF8' );
define('DB_USER', 'root');
define('DB_PWD', 'root');
define('DB_OPTIONS', [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);

try 
{
	$dbTest = new PDO(DB_DSN, DB_USER, DB_PWD, DB_OPTIONS);
}

catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

?>
