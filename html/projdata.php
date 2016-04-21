<?php

	session_start();

	if($_SESSION['lang']=="")

		$_SESSION['lang'] = 'eng';

	if(isset($_POST['lang']))

		$_SESSION['lang'] = $_POST['lang'];

	include "include/connect_db.php";	

	

	$start = (int) $_GET['start'];

	$end   = (int) $_GET['end'];

	

	$sql = 'SELECT PJ.TitleId, PJ.ClientId, PJ.DescriptionId, PJ.TypeId, PJ.AuthorityId, PJ.ExternURL, '.

		   'P.Name AS PName, P.Location AS PLocation, SRC.Name AS SRCName, SRC.Location AS SRCLocation '.

		   'FROM (PROJECT PJ LEFT JOIN PICTURE P ON (PJ.PicId = P.PicId) '.

		   'LEFT JOIN SOURCE SRC ON (PJ.SourceId = SRC.SourceId)) '.

		   'ORDER BY DisplayOrder ASC LIMIT '.($end - $start).' OFFSET '.$start;

	

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$numprod = mysqli_num_rows($sqlresult);

	

	while ($row = mysqli_fetch_array($sqlresult)){

		$titleId[] = $row["TitleId"];

		$clientId[] = $row["ClientId"];

		$descId[] = $row["DescriptionId"];



		$authorityId[] = $row["AuthorityId"];

		$picture[] = ($row["PLocation"]==NULL || $row["PName"]==NULL)? "" : $row["PLocation"].$row["PName"];

		$source[] = ($row["SRCLocation"]==NULL || $row["SRCName"]==NULL)? NULL : $row["SRCLocation"].$row["SRCName"];

		$externURL[] = $row["ExternURL"];

		

		preg_match('/^{(.*)}$/', $row["TypeId"], $matches, PREG_OFFSET_CAPTURE);

		$typeId[] =  $matches[1][0];

	}

	

	// label

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'PROJ00018\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$typeLabel = $arr["TextMsg"];

	

	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'PROJ00019\' AND Lang = \''.$_SESSION["lang"].'\'';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$clientLabel= $arr["TextMsg"];

	

	for($i=0;$i<$numprod;$i++){

		// fetch name

		$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$titleId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$name = $arr["TextMsg"];

		

		// fetch client

		$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$clientId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$client = $arr["TextMsg"];

		

		// fetch authority

		$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$authorityId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$authority = $arr["TextMsg"];

		

		// fetch description

		$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$descId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$desc = $arr["TextMsg"];

		

		$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey IN ('.$typeId[$i].') AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$type = "";

		while ($arr = mysqli_fetch_array($sqlresult)) {

			$type = $type.$arr["TextMsg"]." ";

		}

		

		echo "<div class=\"post\">\n";

		echo "\t<div class=\"entry\" style=\"padding-left:10px;\">\n";

		echo "\t\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"10\">\n";

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\">\n";

		echo "<h4 class=\"title\">".$name."</h4>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"center\">\n";

		echo ($picture[$i]=="")? "" : "<img src=\"".$picture[$i]."\">";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		echo "\t\t</table>\n";

		

		echo "\t\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"20%\">\n";

		echo "<b>".$clientLabel."</b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"80%\">\n";

		echo $client;

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"15%\" valign=\"top\">\n";

		echo "<b>".$typeLabel."</b>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t\t<td align=\"left\" width=\"85%\">\n";

		echo $type;

		echo ($authority==NULL)? "": "<div style=\"padding-top:5px;\">(".$authority.")</div>";

		echo "\t\t\t\t</td>\n";

		echo "\t\t\t</tr>\n";

		echo "\t\t</table>\n";



		echo "\t\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

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

					

					echo "&nbsp;&nbsp;<a href=\"".$source[$i]."\"><img src=\"./images/pdficon.png\" width=\"17\" height=\"20\"></a>\n";

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