<?php 
require 'dbconfig.php';

$data = $database->select("test","*");


foreach ($data as $key => $value) {
	# code...

	echo "$key";

}





 ?>