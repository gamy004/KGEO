<meta charset="UTF-8">
<?php 
	include "../include/connect_db.php";
	$check = isset($_POST['mode']);
	if($_POST ==NULL && $_FILES==NULL){
		echo 'SIZE IMAGE MORE THAN 2 MB';
	}
	else if($check){
		 echo "EDIT<br>";
		$nameen = $_POST['nameen'];
		$nameth = $_POST['nameth'];
		$posen = $_POST['posen'];
		$posth = $_POST['posth'];
		$profileen = $_POST['profileen'];
		$profileth = $_POST['profileth'];
		$sql = "SELECT * FROM STAFF WHERE PersonId='".$_POST['mode']."'";
		$data = mysqli_query($dbconn,$sql);
		$data = mysqli_fetch_array($data);

		$sql ="UPDATE CONTENTTEXT SET TextMsg='".$nameen."' WHERE MsgKey='".$data['NameId']."' AND Lang='eng'";
		mysqli_query($dbconn,$sql);
		$sql ="UPDATE CONTENTTEXT SET TextMsg='".$nameth."' WHERE MsgKey='".$data['NameId']."' AND Lang='tha'";
		mysqli_query($dbconn,$sql);
		$sql ="UPDATE CONTENTTEXT SET TextMsg='".$posen."' WHERE MsgKey='".$data['PositionId']."' AND Lang='eng'";
		mysqli_query($dbconn,$sql);
		$sql ="UPDATE CONTENTTEXT SET TextMsg='".$posth."' WHERE MsgKey='".$data['PositionId']."' AND Lang='tha'";
		mysqli_query($dbconn,$sql);
		$sql ="UPDATE CONTENTTEXT SET TextMsg='".$profileen."' WHERE MsgKey='".$data['ProfileId']."' AND Lang='eng'";
		mysqli_query($dbconn,$sql);
		$sql ="UPDATE CONTENTTEXT SET TextMsg='".$profileth."' WHERE MsgKey='".$data['ProfileId']."' AND Lang='tha'";
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
				$sql = "UPDATE STAFF SET PicId='".$picid."' WHERE PersonId='".$_POST['mode']."'";
				mysqli_query($dbconn,$sql);
				$sql = "INSERT INTO PICTURE(PicId,Name,Location) 
						VALUES ('$picid','$filename','./content_img/')"; 
				mysqli_query($dbconn,$sql);

			}
		}
		echo "UPDATE SUCCESS<br>";
		echo "<a href=\"staff.php\"><button>OK</button></a>";
	}
	else {
		echo "ADD<br>";
		$nameen = $_POST['nameen'];
		$nameth = $_POST['nameth'];
		$posen = $_POST['posen'];
		$posth = $_POST['posth'];
		$profileen = $_POST['bden'];
		$profileth = $_POST['bdth'];
		if($_POST['mdth']!=NULL){
			$profileen = $profileen.";".$_POST['mden'];
			$profileth = $profileth.";".$_POST['mdth'];
		}
		if($_POST['phth']!=NULL){
			$profileen = $profileen.";".$_POST['phen'];
			$profileth = $profileth.";".$_POST['phth'];
		}
		$profileen = $profileen.$_POST['bden'].".<br><br>\n\n<b>Specialities include: </b><br><br>\n\n";
		$profileth = $profileth.$_POST['bdth'].".<br><br>\n\n<b>ความเชี่ยวชาญและความสนใจ:</b><br><br>\n\n";

		$text = trim($_POST['sien']);
		$textAr = explode("\n", $text);
		$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind
		foreach ($textAr as $line) {		
  		 	$profileen = $profileen."<li>".$line."</li>\n\n";
		} 
		
		$text = trim($_POST['sith']);
		$textAr = explode("\n", $text);
		$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind
		foreach ($textAr as $line) {		
  		 	$profileth = $profileth."<li>".$line."</li>\n\n";
		}

		$sql = "SELECT MAX(PersonId) as id FROM STAFF ";
		$result = mysqli_query($dbconn,$sql);
		$result = mysqli_fetch_array($result);
		$personid = $result['id']+1;
		$contentid = sprintf('%05d',$personid);
		$staffid = "STAF".$contentid;
		$positionid = "STPO".$contentid; 
		$profileid = "STPF".$contentid; 
		$email = $_POST['email'];
		$sql = "INSERT INTO STAFF(PersonId,NameId,PositionId,Profileid,Email)
				VALUES('$personid','$staffid','$positionid','$profileid','$email')";
		mysqli_query($dbconn,$sql);

		$sql = "INSERT INTO contenttext(MsgKey,Lang,TextMsg) 
				VALUES('$staffid','eng','$nameen')";
				//echo "$sql <br>";
		mysqli_query($dbconn,$sql);

		$sql = "INSERT INTO contenttext(MsgKey,Lang,TextMsg) 
				VALUES('$staffid','tha','$nameth')";
				//echo "$sql <br>";
		mysqli_query($dbconn,$sql);	

		$sql = "INSERT INTO contenttext(MsgKey,Lang,TextMsg) 
				VALUES('$positionid','eng','$posen')";
				//echo "$sql <br>";
		mysqli_query($dbconn,$sql);	

		$sql = "INSERT INTO contenttext(MsgKey,Lang,TextMsg) 
				VALUES('$positionid','tha','$posth')";
				//echo "$sql <br>";
		mysqli_query($dbconn,$sql);	

		$sql = "INSERT INTO contenttext(MsgKey,Lang,TextMsg) 
				VALUES('$profileid','eng','$profileen')";
				//echo "$sql <br>";
				//echo var_dump($profileen);
		mysqli_query($dbconn,$sql);	

		$sql = "INSERT INTO contenttext(MsgKey,Lang,TextMsg) 
				VALUES('$profileid','tha','$profileth')";
				//echo "$sql <br>";
		mysqli_query($dbconn,$sql);	
		if(!$_FILES["file"]['error']){
				$typeimg = substr($_FILES["file"]["name"],strlen($_FILES["file"]["name"])-4) ;
				$filename = time().$typeimg;
				move_uploaded_file($_FILES["file"]["tmp_name"],
       					   "../content_img/".$filename);
				$sql = "SELECT MAX(PicId) as id FROM picture ";
				$result = mysqli_query($dbconn,$sql);
				$result = mysqli_fetch_array($result);
				$picid = $result['id']+1;
				$sql = "UPDATE STAFF SET PicId='".$picid."' WHERE PersonId='".$personid."'";
				mysqli_query($dbconn,$sql);
				$sql = "INSERT INTO PICTURE(PicId,Name,Location) 
						VALUES ('$picid','$filename','./content_img/')"; 
				mysqli_query($dbconn,$sql);
		}	
	 }
	 echo "<br><a href=\"staff.php\"><button> OK </button></a>"
 ?>