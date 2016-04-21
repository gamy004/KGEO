<?php 
	include "../include/connect_db.php";
	$sql = "SELECT * FROM NEWS WHERE NewsId='".$_POST['newsid']."'";
	$data = mysqli_query($dbconn,$sql);
	$data = mysqli_fetch_array($data);

	$sql = "SELECT * FROM PICTURE WHERE PicId='".$data['PicId']."'";
	$img = mysqli_query($dbconn,$sql);
	$img = mysqli_fetch_array($img);

	$newsid = $data['NewsId'];
	$pic = $data['PicId'];
	$filename = ".".$img['Location'].$img['Name'];

	

	$sql = "DELETE FROM CONTENTTEXT WHERE MsgKey='".$data['HeadlineId']."' OR MsgKey='".$data['ContentId']."'";
	mysqli_query($dbconn,$sql);
	if($pic != NULL){
	$sql = "DELETE FROM PICTURE WHERE PicId='$pic'";
	mysqli_query($dbconn,$sql);}
	$sql = "DELETE FROM NEWS WHERE NewsId='$newsid'";
	mysqli_query($dbconn,$sql);
	if($pic != NULL)unlink($filename);

	echo "DELETE COMPLETE !!<br>";
	echo "<a href=\"news.php\"><button>OK</button></a>";

 ?>