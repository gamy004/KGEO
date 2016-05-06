<?php
	$dbhost = "68.178.137.179 ";	//database server address

	$dbuser = "KGEODB";		//username

	$dbpwd = "glakXY123!";		//password

	$dbname = "KGEODB";		//database name
	
	//connect to database

	$dbconn = mysqli_connect($dbhost,$dbuser,$dbpwd);	

	if(!$dbconn)

	{

		echo "<h3> ERROR Cannot Connect Database</h3>";

		exit();

	}

	mysqli_select_db($dbconn, $dbname);		

	mysqli_query($dbconn,"SET character_set_results=utf8") or die('Invalid query: ' . mysql_error());

	mysqli_query($dbconn,"SET character_set_client=utf8") or die('Invalid query: ' . mysql_error());

	mysqli_query($dbconn,	"SET character_set_connection=utf8") or die('Invalid query: ' . mysql_error());

?>