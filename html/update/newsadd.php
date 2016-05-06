<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>

	</title>
</head>
<body>
	
	<form action="manager.php" method="POST" enctype="multipart/form-data">
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
				<td><textarea name="conten" rows="20" cols="133" ></textarea></td>
			</tr>
			<tr>
				<td>HEADER TH:</td>
				<td><input type="text" name="headth" style="width:820px;" required></td>
			</tr>
			<tr>
				<td>CONTENT TH:</td>
				<td><textarea name="contth" rows="20" cols="133" ></textarea></td>
			</tr>
			<tr>		
				<td>IMG :</td>
				<td><input type="file" name="filUpload" id="pic"></td>
			</tr>
			<tr>
				<td><input name="content" type="hidden" value="news"><input name="type" type="hidden" value="add"><input type="submit"></td>
			</tr>
		</table>	
	</form>



</body>
</html>