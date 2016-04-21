<?php
   
    include "../include/connect_db.php";
    if (isset($_POST['collid'])){
	$sql = "SELECT * FROM COLLABORATOR WHERE CollaboratorId='".$_POST['collid']."'";
	$result = mysqli_query($dbconn,$sql);
    if($result === FALSE) 
    { 
        die(mysqli_error($dbconn));
    } else
    {
        $data = mysqli_fetch_array($result);

    }
	$sql = "SELECT * FROM PICTURE WHERE PicId='".$data['PicId']."'";
	$result = mysqli_query($dbconn,$sql);
     if($result === FALSE) 
    { 
        die(mysqli_error($dbconn));
    } else
    {
        $img = mysqli_fetch_array($result);

    }

	$collid = $data['CollaboratorId'];
	$pic = $data['PicId'];
	$filename = ".".$img['Location'].$img['Name'];

	

	$sql = "DELETE FROM CONTENTTEXT WHERE MsgKey='".$data['NameId']."'";
	mysqli_query($dbconn,$sql);
	if($pic != NULL){
	$sql = "DELETE FROM PICTURE WHERE PicId='$pic'";
	mysqli_query($dbconn,$sql);}
	$sql = "DELETE FROM COLLABORATOR WHERE CollaboratorId='$collid'";
	mysqli_query($dbconn,$sql);
	if($pic != NULL)unlink($filename);

	echo "DELETE COMPLETE !!<br>";
	echo "<a href=\"collaborator.php\"><button>OK</button></a>";
    } else {
    echo "DELETE FAILED !! SOMETHING WAS WRONG.<br>";
	echo "<a href=\"collaborator.php\"><button>BACK</button></a>";    
    }
 ?>