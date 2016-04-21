<?php

	session_start();

	if($_SESSION['lang']=="")

		$_SESSION['lang'] = 'eng';

	if(isset($_POST['lang']))

		$_SESSION['lang'] = $_POST['lang'];

	include "include/connect_db.php";	

	

	$start = (int) $_GET['start'];

	$end   = (int) $_GET['end'];

	

	$sql = 'SELECT ED.TitleId, ED.InstructorId, ED.DepartmentId, ED.Term, ED.DescriptionId, ED.LevelId, ED.ExternURL, '.

		   'SRC.Name AS SRCName, SRC.Location AS SRCLocation '.

		   'FROM EDUCATION ED LEFT JOIN SOURCE SRC ON (ED.SourceId = SRC.SourceId) '.

		   'LIMIT '.($end - $start).' OFFSET '.$start;

		      

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$numrow = mysqli_num_rows($sqlresult);

	

	while ($row = mysqli_fetch_array($sqlresult)){

		$titleId[] = $row["TitleId"];

		$instructorId[] = $row["InstructorId"];

		$departmentId[] = $row["DepartmentId"];

		$term[] = $row["Term"];

		$descriptionId[] = $row["DescriptionId"];

		

		$source[] = ($row["SRCLocation"]==NULL || $row["SRCName"]==NULL)? NULL : $row["SRCLocation"].$row["SRCName"];

		$externURL[] = $row["ExternURL"];



		preg_match('/^{(.*)}$/', $row["LevelId"], $matches, PREG_OFFSET_CAPTURE);

		$levelId[] =  $matches[1][0];		

	}

	

	// label

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'EDCT00010\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$instructorLabel = $arr["TextMsg"];

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'EDCT00011\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$studentLabel= $arr["TextMsg"];

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'EDCT00012\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$departmentLabel= $arr["TextMsg"];

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'EDCT00013\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$termLabel= $arr["TextMsg"];

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'EDCT00014\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$descLabel= $arr["TextMsg"];

	

	for($i=0;$i<$numrow;$i++){

		// fetch title

		$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$titleId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$title = $arr["TextMsg"];

		

		// fetch instructor

		$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$instructorId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$instructor = $arr["TextMsg"];

		

		// fetch student level

		$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey IN ('.$levelId[$i].') AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$level = "";	

		while ($arr = mysqli_fetch_array($sqlresult)) {

			$level = $level.$arr["TextMsg"]."<br><br>";

		}

		

		// fetch department

		$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \''.$departmentId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$department = $arr["TextMsg"];

		

		// fetch title

		$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$descriptionId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$desc = $arr["TextMsg"];

		

		echo "<div class=\"post\">\n";

		echo "\t<div class=\"entry\" style=\"padding-left:10px;\">\n";

		echo "\t\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\">\n";

		echo "<h4 class=\"title\">".$title."</h4>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		echo "\t\t</table>\n";

		

	

		

		echo "\t\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"20%\">\n";

		echo "<b>".$instructorLabel."</b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"80%\">\n";

		echo $instructor;

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"15%\" valign=\"top\">\n";

		echo "<b>".$departmentLabel."</b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"85%\">\n";

		echo $department;

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"15%\" valign=\"top\">\n";

		echo "<b>".$studentLabel."</b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t\t<td align=\"left\" valign=\"top\" width=\"85%\">\n";

		echo $level;

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"15%\" valign=\"top\">\n";

		echo "<b>".$termLabel."</b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"85%\">\n";

		echo $term[$i];

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		echo "\t\t</table>\n";



		echo "\t\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\">\n";

		echo "<b>".$descLabel."</b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\">\n";

		echo "<p>".$desc."</p>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";



		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\">\n";

		if($source[$i]!=NULL || $externURL[$i]!=NULL){

			echo "More about this: ";

			echo ($externURL[$i]!=NULL)? "<a href=\"http://".$externURL[$i]."\">".$externURL[$i]."</a>":"";

			if($source[$i]!=NULL){

				if (file_exists($source[$i])) {

					echo "&nbsp;&nbsp;<a href=\"./include/downloadpdf.php?fullPath=.".$source[$i]."\"><img src=\"./images/pdficon.png\" width=\"17\" height=\"20\"></a>\n";

				}

			}

		}

		

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		echo "\t\t</table>\n";

		echo "\t</div>\n";

		echo "</div>";

	}	

?>