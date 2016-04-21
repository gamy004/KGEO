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
			$sql = "SELECT * FROM STAFF WHERE PersonId=".$_POST['staffid'];
			$result = mysqli_query($dbconn,$sql);
			$data = mysqli_fetch_array($result);
			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$data['NameId']."'";
			$result = mysqli_query($dbconn,$sql);
			while ($txt = mysqli_fetch_array($result)) {
				$name[] = $txt['TextMsg'];
			}
			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$data['PositionId']."'";
			$result = mysqli_query($dbconn,$sql);
			while ($txt = mysqli_fetch_array($result)) {
				$position[] = $txt['TextMsg'];
			}
			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$data['ProfileId']."'";
			$result = mysqli_query($dbconn,$sql);
			while ($txt = mysqli_fetch_array($result)) {
				$profile[] = $txt['TextMsg'];
			}
			echo "<form action=\"staffupdate.php\" method=\"POST\" enctype=\"multipart/form-data\">";
			echo "<table>";
			echo "<tr><td>NAME ENG : </td><td><input type=\"text\" name=\"nameen\" style=\"width:763px;\" value='$name[0]'></td></tr>";
			echo "<tr><td>NAME TH : </td><td><input type=\"text\" name=\"nameth\" style=\"width:763px;\" value='$name[1]'></td></tr>";
			echo "<tr><td>POSITION ENG : </td><td><input type=\"text\" name=\"posen\" style=\"width:763px;\" value='$position[0]'></td></tr>";
			echo "<tr><td>POSITION TH : </td><td><input type=\"text\" name=\"posth\" style=\"width:763px;\" value='$position[1]'></td></tr>";
			echo "<tr><td>Profile ENG : </td><td><textarea name=\"profileen\" rows=20 cols=133>$profile[0]</textarea></td></tr>";
			echo "<tr><td>Profile TH : </td><td><textarea name=\"profileth\" rows=20 cols=133>$profile[1]</textarea></td></tr>";
			echo "<tr><td>UPDATE PIC : </td><td><input type=\"file\" name=\"file\"></td></tr>";
			echo "<tr><td><button type=\"submit\" name=\"mode\" value='".$data['PersonId']."'>SAVE</button>
					</td><td><a href=\"staff.php\"><input type=\"button\" value=\"BACK\"></a></td></tr>";
			echo "</table>";
			echo "</form>";
	 ?>
</body>
</html>