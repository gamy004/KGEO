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
		$sql = "SELECT * FROM STAFF";
		$data = mysqli_query($dbconn,$sql);

		while($result = mysqli_fetch_array($data)){
			$sql = "SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey='".$result['NameId']."'";
			$name = mysqli_query($dbconn,$sql);
			$name = mysqli_fetch_array($name);
			$sql = "SELECT * FROM PICTURE WHERE PicId=".$result['PicId'];
			$img = mysqli_query($dbconn,$sql) ;
			if($img != NULL)$img = mysqli_fetch_array($img);
			$pic = ($result['PicId'] == NULL)? "../content_img/profile_none.png" : ".".$img['Location'].$img['Name'];
			echo "<tr style=\"display:inline;margin:20px;height:320px;\">\n";
			echo "\t<td>";
			echo "\t\t<img src=\"".$pic."\" style=\"width:200px;\"><br>".$name['TextMsg'];
			echo "\t</td>";
			echo "\t<td>";
			echo "<table>";
			echo "<tr><form action=\"staffedit.php\" method=\"POST\">";
			echo "\t\t<button name=\"staffid\" type=\"submit\" value=\"".$result['PersonId']."\">EDIT</button>";
			echo "</form></tr>";
			echo "<form action=\"staffdel.php\" method=\"POST\">";
			echo "\t\t<button name=\"staffid\" type=\"submit\" value=\"".$result['PersonId']."\">DELETE</button>";
			echo "</form>";
			echo "</table>";
			echo "\t</td>";
			echo "</tr>";
		}
	 ?>
			<tr style="display:inline;margin:20px;height:320px;">
			<td>
			<img src="../content_img/profile_none.png" style="width:200px;">
			</td>
			<td>
			<table>
			<tr><form action="staffnew.php" method="POST">
			<button  type=submit >ADD STAFF</button>
			</form></tr>
			</table>
			</td>
			</tr>
	</table>

</body>
</html>