<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>

	</title>
</head>
<body>
	<?php 
			include "../include/connect_db.php";
			$sql = "SELECT * FROM NEWS WHERE NewsId=".$_POST['newsid'];
			$result = mysqli_query($dbconn,$sql);
			$data = mysqli_fetch_array($result);
			$date = $data['PubDate'];

			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$data['HeadlineId']."' AND Lang='eng'";
			$result = mysqli_query($dbconn,$sql);
			$result = mysqli_fetch_array($result);
			$nameeng = $result['TextMsg'];

			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$data['HeadlineId']."' AND Lang='tha'";
			$result = mysqli_query($dbconn,$sql);
			$result = mysqli_fetch_array($result);
			$nametha = $result['TextMsg'];

			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$data['ContentId']."' AND Lang='eng'";
			$result = mysqli_query($dbconn,$sql);
			$result = mysqli_fetch_array($result);
			$coneng = $result['TextMsg'];

			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$data['ContentId']."' AND Lang='tha'";
			$result = mysqli_query($dbconn,$sql);
			$result = mysqli_fetch_array($result);
			$contha = $result['TextMsg'];

			$contha = str_replace("<br />","",$contha); 
			$coneng = str_replace("<br />","",$coneng); 

			echo "<form action=\"manager.php\" method=\"POST\" enctype=\"multipart/form-data\">";
			echo "<table>";
			echo "<tr><td>DATE			:	</td><td><input type=\"date\" name=\"date\"    style=\"width:763px;\" value='$date'    require></td></tr>";
			echo "<tr><td>HEADLINE ENG 	: 	</td><td><input type=\"text\" name=\"headen\" style=\"width:763px;\" value='$nameeng' require></td></tr>";
			echo "<tr><td>HEADLINE TH 	: 	</td><td><input type=\"text\" name=\"headth\" style=\"width:763px;\" value='$nametha' require></td></tr>";
			echo "<tr><td>CONTENT ENG 	: 	</td><td><textarea name=\"conten\" rows=20 cols=133>$coneng</textarea></td></tr>";
			echo "<tr><td>CONTENT TH 	: 	</td><td><textarea name=\"contth\" rows=20 cols=133>$contha</textarea></td></tr>";
			echo "<tr><td>UPDATE PIC 	: 	</td><td><input type=\"file\" name=\"filUpload\"></td></tr>";
			echo "<tr><td><button type=\"submit\" name=\"newsid\" value='".$data['NewsId']."'>SAVE</button><input name=\"content\" type=\"hidden\" value=\"news\"><input name=\"type\" type=\"hidden\" value=\"edit\"></td><td><a href=\"news.php\"><input type=\"button\" value=\"BACK\"></a></td></tr>";
			echo "</table>";
			echo "</form>";
	 ?>
</body>
</html>