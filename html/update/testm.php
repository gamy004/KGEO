<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>

	</title>
</head>
<body>
	
	<form action="<?php echo htmlspecialchars('manager.php');?>" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>NAME ENG:</td>
				<td><input type="text" name="nameen" style="width:820px;" required></td>
			</tr>
			<tr>
				<td>NAME TH:</td>
				<td><input type="text" name="nameth" style="width:820px;" required></td>
			</tr>
			<tr>		
				<td>Website :</td>
				<td><input type="text" name="website" style="width:820px;"  placeholder="www.example.com" required></td>
			</tr>
			<tr>		
				<td>IMG :</td>
				<td><input type="file" name="filUpload" id="pic" required></td>
			</tr>
			<tr>
				<td>CLIENT/PARTNER:</td>
				<td><input type="radio" name="check" value="c" required>Client
					<input type="radio" name="check" value="p" required>Partner</td>
			</tr>
			<tr>
				<td><input name="type" type="submit" value="add">
				<input name="content" type="hidden" value="collaborator"></td>
			</tr>
		</table>	
	</form>



</body>
</html>