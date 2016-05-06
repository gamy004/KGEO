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
			$sql = "SELECT * FROM COLLABORATOR WHERE CollaboratorId=".$_POST['collid'];
			$result = mysqli_query($dbconn,$sql);
			$data = mysqli_fetch_array($result);

			$site = $data['Website'];


			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$data['NameId']."' AND Lang='eng'";
			$result = mysqli_query($dbconn,$sql);
			$result = mysqli_fetch_array($result);
			$nameen = $result['TextMsg'];

			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$data['NameId']."' AND Lang='tha'";
			$result = mysqli_query($dbconn,$sql);
			$result = mysqli_fetch_array($result);
			$nameth = $result['TextMsg'];

			echo "<form action=\"manager.php\" method=\"POST\" enctype=\"multipart/form-data\">";
			echo "<table>";
			echo "<tr><td>NAME ENG : </td><td><input type=\"text\" name=\"nameen\" style=\"width:763px;\" value='$nameen'></td></tr>";
			echo "<tr><td>NAME TH  : </td><td><input type=\"text\" name=\"nameth\" style=\"width:763px;\" value='$nameth'></td></tr>";
			echo "<tr><td>WEBSITE  : </td><td><input type=\"text\" name=\"website\" style=\"width:763px;\" value='$site'></td></tr>";

			if($data['Type']=='c'){
				echo "<tr><td>Client/Partner  : </td><td><input type=\"radio\" name=\"check\" value=\"c\" required checked>Client
													 <input type=\"radio\" name=\"check\" value=\"p\" required>Partner</td></tr>";
			}
			else{
				echo "<tr><td>Client/Partner  : </td><td><input type=\"radio\" name=\"check\" value=\"c\" required >Client
													 <input type=\"radio\" name=\"check\" value=\"p\" required checked>Partner</td></tr>";
			}
			echo "<tr><td>UPDATE PIC : </td><td><input type=\"file\" name=\"filUpload\"><input type=\"hidden\" name=\"content\" value=\"collaborator\"><input type=\"hidden\" name=\"type\" value=\"edit\"></td></tr>";
			echo "<tr><td><button type=\"submit\" name=\"collid\" value='".$data['CollaboratorId']."'>SAVE</button>
					</td><td><a href=\"collaborator.php\"><input type=\"button\" value=\"BACK\"></a></td></tr>";
			echo "</table>";
			echo "</form>";
	 ?>
</body>
</html>