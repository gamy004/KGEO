<?php 
	include "../include/connect_db.php";
	$check = isset($_POST['mode']);
	if($_POST ==NULL && $_FILES==NULL){
		echo 'SIZE IMAGE MORE THAN 2 MB';
	}
    // Edit Collabarator
	else if($check && isset($_POST['nameth']) && isset($_POST['nameen'])){
		echo "EDIT";
		$nameen = $_POST['nameen'];
		$nameth = $_POST['nameth'];
		$site   = $_POST['site'];
		$check  = $_POST['check'];
		$id     = $_POST['mode'];

		$sql    = "SELECT * FROM COLLABORATOR WHERE CollaboratorId='$id'";
		$result = mysqli_query($dbconn,$sql);
        if($result === FALSE) 
        { 
            die(mysqli_error($dbconn));
        } else
        {
            $data = mysqli_fetch_array($result);

        }
		$contentid = $data['NameId'];

		$sql    = "UPDATE CONTENTTEXT SET TextMsg='$nameen' WHERE MsgKey='$contentid' AND Lang='eng'";
		mysqli_query($dbconn,$sql);

		$sql    = "UPDATE CONTENTTEXT SET TextMsg='$nameth' WHERE MsgKey='$contentid' AND Lang='tha'";
		mysqli_query($dbconn,$sql);

		$sql    = "UPDATE COLLABORATOR SET Website='$site' WHERE CollaboratorId='$id'";
		mysqli_query($dbconn,$sql);

		$sql    = "UPDATE COLLABORATOR SET Type='$check' WHERE CollaboratorId='$id'";
		mysqli_query($dbconn,$sql);

		if(!$_FILES["file"]['error']){
			if($data['PicId']){
				$sql = "SELECT * FROM PICTURE WHERE PicId=".$data['PicId'];
				$result = mysqli_query($dbconn,$sql) ;
                 if($result === FALSE) 
                { 
                    die(mysqli_error($dbconn));
                } else
                {
                    $img = mysqli_fetch_array($result);
        
                }
				$img = ".".$img['Location'].$img['Name'];
				$typeimg = substr($_FILES["file"]["name"],strlen($_FILES["file"]["name"])-4) ;
				$filename = time().$typeimg;
				move_uploaded_file($_FILES["file"]["tmp_name"],
       					   "../content_img/".$filename);
				unlink($img);
				$sql = "UPDATE PICTURE SET Name='".$filename."' WHERE PicId='".$data['PicId']."'";
				mysqli_query($dbconn,$sql);
			}
		}
	}
    // Add Collabarator
	else if(isset($_POST['nameth']) && isset($_POST['nameen'])){
		echo "ADD<br>";
		$nameen = $_POST['nameen'];
		$nameth = $_POST['nameth'];
		$type   = $_POST['check'];
		$website= $_POST['website'];

		$typeimg = substr($_FILES["filUpload"]["name"],strlen($_FILES["filUpload"]["name"])-4) ;
		$filename = time().$typeimg;
		move_uploaded_file($_FILES["filUpload"]["tmp_name"],
					   "../content_img/".$filename);
		$sql = "SELECT MAX(PicId) as id FROM PICTURE";
		$result = mysqli_query($dbconn,$sql);
        if($result === FALSE) 
        { 
            die(mysqli_error($dbconn));
        } else
        {
            $mysqli_result = mysqli_fetch_array($result);

        }
		$picid = $mysqli_result['id']+1;
		$sql = "INSERT INTO PICTURE(PicId,Name,Location) 
				VALUES ('$picid','$filename','./content_img/')"; 
		mysqli_query($dbconn,$sql);

		$sql = "SELECT MAX(CollaboratorId) as id FROM COLLABORATOR";
		$result = mysqli_query($dbconn,$sql);
        if($result === FALSE) 
        { 
            die(mysqli_error($dbconn));
        } else
        {
            $mysqli_result = mysqli_fetch_array($result);
        }
		$id =  $mysqli_result['id']+1;
		$contentid = sprintf('%05d',$id);
        $collid = "COLL".$contentid;
		$sql = "INSERT INTO COLLABORATOR(CollaboratorId,NameId,Type,PicId,Website) 
				VALUES ('$id','$collid','$type','$picid','$website')";
		mysqli_query($dbconn,$sql);

		$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$collid','eng','$nameen')";
		mysqli_query($dbconn,$sql);

		$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$collid','tha','$nameth')";
		mysqli_query($dbconn,$sql);

		
	 }
	 echo "<br><a href=\"collaborator.php\"><button> OK </button></a>"



 ?>