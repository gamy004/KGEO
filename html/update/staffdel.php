<?php 
	include "../include/connect_db.php";
	$sql = "SELECT * FROM STAFF WHERE PersonId='".$_POST['staffid']."'";
	$data = mysqli_query($dbconn,$sql);
	$data = mysqli_fetch_array($data);

	$sql = "SELECT * FROM PICTURE WHERE PicId='".$data['PicId']."'";
	$img = mysqli_query($dbconn,$sql);
	$img = mysqli_fetch_array($img);

	$idstaff = $data['PersonId'];
	$pic = $data['PicId'];
	$filename = ".".$img['Location'].$img['Name'];

	

	$sql = "DELETE FROM CONTENTTEXT WHERE MsgKey='".$data['NameId']."' OR MsgKey='".$data['PositionId']."' OR MsgKey='".$data['ProfileId']."'";
	mysqli_query($dbconn,$sql);
	$sql = "DELETE FROM PICTURE WHERE PicId='$pic'";
	mysqli_query($dbconn,$sql);
	$sql = "DELETE FROM STAFF WHERE PersonId='$idstaff'";
	mysqli_query($dbconn,$sql);
	unlink($filename);

	echo "DELETE COMPLETE !!<br>";
	echo "<a href=\"staff.php\"><button>OK</button></a>";

 ?>