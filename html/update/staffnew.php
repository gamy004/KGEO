<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
	</title>

</head>
<body>
	<style type="text/css">
	.ph::-webkit-input-placeholder::after {
    display:block;
    content:"Line 2\A Line 3";
	}</style>
	<form action="staffupdate.php" method="POST" enctype="multipart/form-data">
		<table>
		<tr>
				<td>E-MAIL :</td>
				<td><input type="email" name="email" style="width:763px;" required></td>
			</tr>
			<tr>
				<td>NAME ENG:</td>
				<td><input type="text" name="nameen" style="width:763px;" required></td>
			</tr>
				<tr>
				<td>NAME TH:</td>
				<td><input type="text" name="nameth" style="width:763px;" required></td>
			</tr>
			<tr>
				<td>POSITION ENG:</td>
				<td><input type="text" name="posen" style="width:763px;" required></td>
			</tr>
				<tr>
				<td>POSITION TH:</td>
				<td><input type="text" name="posth" style="width:763px;" required></td>
			</tr>
			<tr>
				<td>Bachelor's Degree ENG:</td>
				<td><input type="text" name="bden" style="width:763px;" ></td>
			</tr>
			<tr>
				<td>Bachelor's Degree TH:</td>
				<td><input type="text" name="bdth" style="width:763px;" ></td>
			</tr>
			<tr>
				<td>Master's Degree ENG:</td>
				<td><input type="text" name="mden" style="width:763px;" ></td>
			</tr>
				<tr>
				<td>Master's Degree TH:</td>
				<td><input type="text" name="mdth" style="width:763px;" ></td>
			</tr>
			<tr>
				<td>Ph.D ENG:</td>
				<td><input type="text" name="phen" style="width:763px;" ></td>
			</tr>
				<tr>
				<td>Ph.D TH:</td>
				<td><input type="text" name="phth" style="width:763px;" ></td>
			</tr>
			<tr>
				<td>Specialities include ENG:</td>
				<td><textarea rows="20" cols="133" name="sien" placeholder="Line 1" class="ph" ></textarea></td>
			</tr>
		
			<tr>
				<td>Specialities include TH:</td>
				<td><textarea rows="20" cols="133" name="sith" placeholder="Line 1" class="ph"  ></textarea></td>
			</tr>
			<tr>		
				<td>IMG :</td>
				<td><input type="file" name="file" id="pic"/></td>
			</tr>
			<tr>
				<td><Button type="submit">ADD</button></td>
			</tr>
		</table>	
	</form>



</body>
</html>