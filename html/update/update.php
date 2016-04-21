<?php 
require 'dbconfig.php';
	$now = new DateTime();

	if(isset($_POST['des'])){
		
		print_r($_POST);
		$filename = $now->getTimestamp().$_FILES["filUpload"]["name"];	

		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"pic/".$filename )){
			$database->insert("test",[
				'des'=>$_POST['des'],
				'pic'=>$filename
				]);
		}

	}

	













 ?>