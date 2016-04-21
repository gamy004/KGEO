<?php 

include "../include/connect_db.php";
if($_POST ==NULL && $_FILES==NULL){
		echo 'SIZE IMAGE MORE THAN 2 MB';
}
elseif(isset($_POST['headth']) && isset($_POST['headen'])){

	$headen = $_POST['headen'];
	$texten = trim($_POST['msgen']);
	$texten = nl2br($texten);

	$headth = $_POST['headth'];
	$textth = trim($_POST['msgth']);
	$textth = nl2br($textth);
	
	if(!$_FILES["filUpload"]['error']){
		$typeimg = substr($_FILES["filUpload"]["name"],strlen($_FILES["filUpload"]["name"])-4) ;
		$filename = time().$typeimg;
		move_uploaded_file($_FILES["filUpload"]["tmp_name"],
       					   "../content_img/".$filename);
		$sql = "SELECT MAX(PicId) as id FROM PICTURE ";
		$result = mysqli_query($dbconn,$sql);
		$result = mysqli_fetch_array($result);
		$picid = $result['id']+1;
		$sql = "INSERT INTO PICTURE(PicId,Name,Location) 
				VALUES ('$picid','$filename','./content_img/')"; 
				echo $sql;
		mysqli_query($dbconn,$sql);

		
		$tmpdate = getdate();
		$date = $tmpdate['year']."-".$tmpdate['mon']."-".$tmpdate['mday'];
		echo $date;
		$sql = "SELECT MAX(NewsId) as id FROM NEWS ";
		$result = mysqli_query($dbconn,$sql);
		$result = mysqli_fetch_array($result);
		$id = $result['id']+1;
		$contentid = sprintf('%05d',$id);

		$headid = "HEAD".$contentid;
		$newsid = "NEWS".$contentid;
		$sql = "INSERT INTO NEWS(NewsId,PubDate,PicId) 
				VALUES ('$id','$date',$picid)"; 
		mysqli_query($dbconn,$sql);
		$sql = "UPDATE NEWS 
				SET HeadlineId='$headid',ContentId='$newsid'
				WHERE NewsId='$id'";
		mysqli_query($dbconn,$sql);

		$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$headid','eng','$headen')";
		mysqli_query($dbconn,$sql);

		$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$headid','tha','$headth')";
		mysqli_query($dbconn,$sql);	

		$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$newsid','eng','$texten')";
		mysqli_query($dbconn,$sql);	

		$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$newsid','tha','$textth')";
		mysqli_query($dbconn,$sql);		
	}
	else{
		echo "maime";
		$tmpdate = getdate();

		$sql = "SELECT MAX(NewsId) as id FROM NEWS ";
		$result = mysqli_query($dbconn,$sql);
		$result = mysqli_fetch_array($result);
		$id = $result['id']+1;

		$date = $tmpdate['year']."-".$tmpdate['mon']."-".$tmpdate['mday'];
		$sql = "INSERT INTO NEWS(NewsId,PubDate) 
				VALUES ('$id','$date')"; 
		mysqli_query($dbconn,$sql);

		$contentid = sprintf('%05d',$id);
		$headid = "HEAD".$contentid;
		$newsid = "NEWS".$contentid;
				echo $id;
		echo $contentid;
		$sql = "UPDATE NEWS 
				SET HeadlineId='$headid',ContentId='$newsid'
				WHERE NewsId='$id'";
		mysqli_query($dbconn,$sql);

		$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$headid','eng','$headen')";
		mysqli_query($dbconn,$sql);

		$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$headid','tha','$headth')";
		mysqli_query($dbconn,$sql);	

		$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$newsid','eng','$texten')";
		mysqli_query($dbconn,$sql);	

		$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$newsid','tha','$textth')";
		mysqli_query($dbconn,$sql);		
		echo "ADD COMPLETE !!<br>";	
	}
	
	echo "<a href=\"news.php\"><button>OK</button></a>";
}
	
 ?>