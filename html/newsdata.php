<?php

	session_start();

	if($_SESSION['lang']=="")

		$_SESSION['lang'] = 'eng';

	if(isset($_POST['lang']))

		$_SESSION['lang'] = $_POST['lang'];

	include "include/connect_db.php";	

	

	$start = (int) $_GET['start'];

	$end   = (int) $_GET['end'];


	
	

	$sql = 'SELECT NewsId,N.HeadlineId, date_format(N.PubDate, \'%d %M %Y\') AS PubDate, N.ContentId, N.ExternURL, '.

		   'P.Name AS PName, P.Location AS PLocation, SRC.Name AS SRCName, SRC.Location AS SRCLocation '.

		   'FROM (NEWS N LEFT JOIN PICTURE P ON (N.PicId = P.PicId) '.

		   'LEFT JOIN SOURCE SRC ON (N.SourceId = SRC.SourceId)) '.

		   'ORDER BY N.PubDate DESC LIMIT '.($end - $start).' OFFSET '.$start;

		      

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$numrow = mysqli_num_rows($sqlresult);

	

	while ($row = mysqli_fetch_array($sqlresult)){

		$newsid[] = $row["NewsId"];

		$headlineId[] = $row["HeadlineId"];

		$pubdate[] = $row["PubDate"];

		$contentId[] = $row["ContentId"];

		$picture[] = ($row["PLocation"]==NULL || $row["PName"]==NULL)? "./content_img/news_none.png" : $row["PLocation"].$row["PName"];

		$source[] = ($row["SRCLocation"]==NULL || $row["SRCName"]==NULL)? NULL : $row["SRCLocation"].$row["SRCName"];

		$externURL[] = $row["ExternURL"];		

	}

		

	for($i=0;$i<$numrow;$i++){

		// fetch headline

		$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$headlineId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);

		$headline = $arr["TextMsg"];

		

		// fetch content

		$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$contentId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

		$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

		$arr= mysqli_fetch_array($sqlresult);
		
		$content = substr($arr["TextMsg"], 0,150)."...";
		
		echo "<a href=\"details.php?news=".$newsid[$i]."\" >";
		echo "<div class=\"post\">\n";

		echo "\t<div class=\"entry\" style=\"padding-left:10px;\">\n";

		echo "\t\t<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"10\">\n";

		echo "\t\t\t<tr>\n";

		echo "\t\t\t\t<td width=\"30%\"  valign=\"top\">\n";
		//echo "<div style=\"width:232px;height:178px;overflow:hidden;\">";
		echo "<img src=\"".$picture[$i]."\" style=\"width:232px;height:178px;\" class=\"img_news\">";
		//echo "</div>";
		echo "\t\t\t\t</td>\n";

		echo "\t\t\t\t<td align=\"left\">\n";

		echo "<h4 class=\"title\">".$headline."</h4>";

		echo "<p class=\"meta\"> Posted on ".$pubdate[$i]."</p>";

		echo strip_tags($content)."<br><br>";

		

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

		echo "</div></a>";

	}	

?>