<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>

	</title>
</head>
<body>
	
	<form action="testnews.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>DATE:</td>
				<td><input type="date" name="date"   style="width:820px;"></td>
			</tr>
			<tr>
				<td>HEADER ENG:</td>
				<td><input type="text" name="headen" style="width:820px;" required></td>
			</tr>
			<tr>
				<td>CONTENT ENG:</td>
				<td><textarea rows="20" cols="133" name="msgen" ></textarea></td>
			</tr>
			<tr>
				<td>HEADER TH:</td>
				<td><input type="text" name="headth" style="width:820px;" required></td>
			</tr>
			<tr>
				<td>CONTENT TH:</td>
				<td><textarea rows="20" cols="133" name="msgth" ></textarea></td>
			</tr>
			<tr>		
				<td>IMG :</td>
				<td><input type="file" name="filUpload" id="pic"></td>
			</tr>
			<tr>
				<td><input type="submit"></td>
			</tr>
		</table>	
	</form>



</body>
</html>