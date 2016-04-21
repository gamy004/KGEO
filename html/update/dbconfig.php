<?php 


require  'medoo.min.php';

	$dbhost = "68.178.137.179";	//database server address

	$dbuser = "KGEODB";		//username

	$dbpwd = "glakXY123!";		//password

	$dbname = "KGEODB";		//database name

	$database = new medoo([
		 		// required
		'database_type' => 'mysql',
		'database_name' => $dbname,
		'server' => $dbhost,
		'username' => $dbuser,
		'password' => $dbpwd,

		]);



 ?>