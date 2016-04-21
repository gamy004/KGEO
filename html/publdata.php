<?php

	session_start();

	if($_SESSION['lang']=="")

		$_SESSION['lang'] = 'eng';

	if(isset($_POST['lang']))

		$_SESSION['lang'] = $_POST['lang'];

	include "include/connect_db.php";	

	

	$start = (int) $_GET['start'];

	$end   = (int) $_GET['end'];

	

	$sql = 'SELECT PU.Title, PU.Author, PU.TypeId, PU.Publish, PU.Year, PU.AbstractId, PU.ExternURL, '.

		   'SRC.Name AS SRCName, SRC.Location AS SRCLocation '.

		   'FROM PUBLICATION PU LEFT JOIN SOURCE SRC ON (PU.SourceId = SRC.SourceId) '.

		   'ORDER BY Year DESC LIMIT '.($end - $start).' OFFSET '.$start;

		      

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$numprod = mysqli_num_rows($sqlresult);

	

	while ($row = mysqli_fetch_array($sqlresult)){

		$title[] = $row["Title"];

		$author[] = $row["Author"];

		$typeId[] = $row["TypeId"];



		$publish[] = $row["Publish"];

		$year[] = $row["Year"];

		$abstractId[] = $row["AbstractId"];

		

		$source[] = ($row["SRCLocation"]==NULL || $row["SRCName"]==NULL)? NULL : $row["SRCLocation"].$row["SRCName"];

		$externURL[] = $row["ExternURL"];

	}

	

	// label

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'PUBL00004\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$publishLabel = $arr["TextMsg"];

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'PUBL00005\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$abstractLabel= $arr["TextMsg"];

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'PUBL00006\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$yearLabel= $arr["TextMsg"];

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'PUBL00007\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$typeLabel= $arr["TextMsg"];

	

	for($i=0;$i<$numprod;$i++){

		// fetch abstract

		$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$abstractId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$abstract = $arr["TextMsg"];

		

		// fetch type

		$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \''.$typeId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$type = $arr["TextMsg"];

		

		

		echo "<div class=\"post\">\n";

		echo "\t<div class=\"entry\" style=\"padding-left:10px;\">\n";

		echo "\t\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\">\n";

		echo "<h4 class=\"title\">".$title[$i]."</h4>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\">\n";

		echo "<b><font size=\"3\" color=\"#090\">".$author[$i]."</font></b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		echo "\t\t</table>\n";

		

	

		

		echo "\t\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"20%\">\n";

		echo "<b>".$publishLabel."</b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"80%\">\n";

		echo $publish[$i];

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"15%\" valign=\"top\">\n";

		echo "<b>".$typeLabel."</b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"85%\">\n";

		echo $type;

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		

		if($year[$i]!=NULL){

			echo "\t\t\t<tr>\n";

			echo "\t\t\t\t<td align=\"left\" width=\"15%\" valign=\"top\">\n";

			echo "<b>".$yearLabel."</b>";

			echo "\t\t\t\t</td>\n";

			echo "\t\t\t\t<td align=\"left\" width=\"85%\">\n";

			echo $year[$i];

			echo "\t\t\t\t</td>\n";

			echo "\t\t\t</tr>\n";

		}

		

		echo "\t\t</table>\n";



		echo "\t\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\">\n";

		echo "<b>".$abstractLabel."</b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\">\n";

		echo "<p>".$abstract."</p>";

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