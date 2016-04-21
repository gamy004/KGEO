<meta charset="UTF-8">
<?php 
	include "../include/connect_db.php";
	$check = isset($_POST['mode']);
	if($_POST ==NULL && $_FILES==NULL){
		echo 'SIZE IMAGE MORE THAN 2 MB';
		echo "<a href=\"news.php\"><button>OK</button></a>";
	}
	else if($check){
		 echo "EDIT<br>";

		$date    = $_POST['date'];
		$newsid  = $_POST['mode'];
		$headeng = $_POST['headeng'];
		$headtha = $_POST['headtha'];
		$contha = trim($_POST['contenttha']);
		$contha = nl2br($contha);
		$coneng = trim($_POST['contenteng']);
		$coneng = nl2br($coneng);

		$sql = "UPDATE NEWS SET PubDate='$date' WHERE NewsId='$newsid'";
		mysqli_query($dbconn,$sql);

		$sql = "SELECT * FROM NEWS WHERE NewsId='$newsid'";
		$data = mysqli_query($dbconn,$sql);
		$data = mysqli_fetch_array($data);
		$headid = $data['HeadlineId'];
		$conid  = $data['ContentId'];
		$picid  = $data['PicId'];
		$sql = "UPDATE CONTENTTEXT SET TextMsg='$headeng' WHERE MsgKey='$headid' AND Lang='eng'";
		mysqli_query($dbconn,$sql);
		$sql = "UPDATE CONTENTTEXT SET TextMsg='$headtha' WHERE MsgKey='$headid' AND Lang='tha'";
		mysqli_query($dbconn,$sql);
		$sql = "UPDATE CONTENTTEXT SET TextMsg='$coneng' WHERE MsgKey='$conid' AND Lang='eng'";
		mysqli_query($dbconn,$sql);
		$sql = "UPDATE CONTENTTEXT SET TextMsg='$contha' WHERE MsgKey='$conid' AND Lang='tha'";
		mysqli_query($dbconn,$sql);

		if(!$_FILES["file"]['error']){
			if($data['PicId']){
				$sql = "SELECT * FROM PICTURE WHERE PicId=".$data['PicId'];
				$img = mysqli_query($dbconn,$sql) ;
				$img = mysqli_fetch_array($img);
				$img = ".".$img['Location'].$img['Name'];
				$typeimg = substr($_FILES["file"]["name"],strlen($_FILES["file"]["name"])-4) ;
				$filename = time().$typeimg;
				move_uploaded_file($_FILES["file"]["tmp_name"],
       					   "../content_img/".$filename);
				unlink($img);
				$sql = "UPDATE PICTURE SET Name='".$filename."' WHERE PicId='".$data['PicId']."'";
				mysqli_query($dbconn,$sql);
			}
			else {
				$typeimg = substr($_FILES["file"]["name"],strlen($_FILES["file"]["name"])-4) ;
				$filename = time().$typeimg;
				move_uploaded_file($_FILES["file"]["tmp_name"],
       					   "../content_img/".$filename);
				$sql = "SELECT MAX(PicId) as id FROM picture ";
				$result = mysqli_query($dbconn,$sql);
				$result = mysqli_fetch_array($result);
				$picid = $result['id']+1;
				$sql = "UPDATE NEWS SET PicId='".$picid."' WHERE NewsId='".$_POST['mode']."'";
				mysqli_query($dbconn,$sql);
				$sql = "INSERT INTO PICTURE(PicId,Name,Location) 
						VALUES ('$picid','$filename','./content_img/')"; 
				mysqli_query($dbconn,$sql);

			}
		}
		echo "UPDATE SUCCESS<br>";
		echo "<a href=\"news.php\"><button>OK</button></a>";
	}
?>