<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>

	</title>
</head>
<body>
	<table>
<?php 
		include "../include/connect_db.php";
		$sql = "SELECT * FROM COLLABORATOR";
		$data = mysqli_query($dbconn,$sql);

		while($result = mysqli_fetch_array($data)){
			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$result['NameId']."' AND Lang='eng'";
			$head = mysqli_query($dbconn,$sql);
			$head = mysqli_fetch_array($head);
			$sql = "SELECT * FROM PICTURE WHERE PicId=".$result['PicId'];
			$img = mysqli_query($dbconn,$sql) ;
			if($img != NULL)$img = mysqli_fetch_array($img);
			$pic = ($result['PicId'] == NULL)? "../content_img/news_none.png" : ".".$img['Location'].$img['Name'];
			echo "<tr style=\"border:solid 2px;display:inline-table;margin:20px;height:320px;\">\n";
			echo "\t<td>";
			echo "\t\t<img src=\"".$pic."\" style=\"width:200px;\"><br>".$head['TextMsg'];
			echo "\t</td>";
			echo "\t<td>";
			echo "<table>";
			echo "<tr><form action=\"colledit.php\" method=\"POST\">";
			echo "\t\t<button name=\"collid\" type=\"submit\" value=\"".$result['CollaboratorId']."\">EDIT</button>";
			echo "</form></tr>";
			echo "<form action=\"manager.php\" method=\"POST\">";
			echo "<input name=\"content\" type=\"hidden\" value=\"collaborator\"><input name=\"type\" type=\"hidden\" value=\"del\">";
			echo "\t\t<button name=\"collid\" type=\"submit\" value=\"".$result['CollaboratorId']."\">DELETE</button>";
			echo "</form>";
			echo "</table>";
			echo "\t</td>";
			echo "</tr>";
		}
?>
<tr style="display:inline;margin:20px;height:320px;">
			<td>
			<img src="../content_img/news_none.png" style="width:200px;">
			</td>
			<td>
			<table>
			<tr><form action="colladd.php" method="POST">
			<button  type=submit >ADD NEWS</button>
			</form></tr>
			</table>
			</td>
			</tr>
	</table>

</body>
</html>