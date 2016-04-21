<?php

	session_start();

	if($_SESSION['lang']=="")

		$_SESSION['lang'] = 'eng';

	if(isset($_POST['lang']))

		$_SESSION['lang'] = $_POST['lang'];

		

	include "include/connect_db.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--

Design by Free CSS Templates

http://www.freecsstemplates.org

Released for free under a Creative Commons Attribution 2.5 License



Name       : Proofing 

Description: A two-column, fixed-width design for 1024x768 screen resolutions.

Version    : 1.0

Released   : 20100216



-->

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>kGeo</title>

<meta name="keywords" content="" />

<meta name="description" content="" />

<link href="style.css" rel="stylesheet" type="text/css" media="screen" />



<style>

	#content {

		float: left;

		width: 890px;

		padding-top: 0px;

		margin-left: 20px;

		margin-right: 0px;

	}

	.post {

		margin-left: 25px;

		width: 850px;

		float: left;

	}

	

	.img_profile{

		-webkit-box-shadow:0 0px 7px rgba(0,0,0,0.3);

		box-shadow:0 0 5px rgba(0,0,0,0.2);

		padding:5px;

		background:#fff;

		border:1px solid #ccc;

		width:180px;

    }

	

	a { 

		color: #F60;

		text-decoration: none;

	}

	

	a:hover { 

		text-decoration: underline; 

	}

	

	li{

		line-height: 150%;

		list-style-position:inside;

		list-style-image: url(images/map_pin_yellow.png); 

	}

</style>



<!-- Include the jQuery library (local or CDN) -->

<script type="text/javascript" src="script/jquery-1.9.1.min.js"></script>



<script type="text/javascript" charset="utf-8">  

	$(function() {

		$("#lang-eng").click(function(){

			$("#lang").val("eng");

			$("#langform").submit();

		});

		

		$("#lang-tha").click(function(){

			$("#lang").val("tha");

			$("#langform").submit();

		});

		

		if("<?php echo $_SESSION['lang'] ?>"=="tha"){

			$(".eng").css("display", "none");

			$(".tha").css({

				"display": "block",

				"font-size": "12px"}

			);

		}else{

			$(".eng").css("display", "block");

			$(".tha").css("display", "none");

		}

	});

</script>



</head>

<body>

<div id="header-wrapper">

	<div id="header">

		<?php include "header/menu.php"; ?>

	</div>

</div>

<!-- end #header -->

<!-- end #header-wrapper -->

<div id="logo">

	<h1><a href="#">KMUTT Geospatial Engineering and Innovation Center</a></h1>	

</div>

<hr />

<!-- end #logo -->

<div id="page">

	<div id="page-bgtop">

		<div id="content">

        	<div align="right" style="margin-top:-20px; padding-bottom:10px;"> 

                <form id="langform" name="langform" action="people.php" method="post">

                	<table width="10%" border="0" cellspacing="2" style="font-size:11px;">

                        <tr>

                            <td align="right">LANGUAGE:</td>

                            <td>

                            	<a id="lang-eng" href="#">

                            		<img id="eng" src="images/flag-english.png" width="20" height="15" style="opacity:<?php echo ($_SESSION['lang']=='eng')? "0.6" : "1.0"; ?>;" />

                                </a>

                            </td>

                            <td><label> | </label></td>

                            <td>

                            	<a id="lang-tha" href="#">

                                	<img id="tha" src="images/flag-thai.png" width="20" height="15" style="opacity:<?php echo ($_SESSION['lang']=='tha')? "0.6" : "1.0"; ?>;" />                                </a>

                            </td>

                        </tr>

                    </table>

                    <input type="hidden" id="lang" name="lang" value="" />

                </form>

                <!--

                <table width="30%" border="0" cellspacing="2" style="font-size:11px;">

                    <tr>

                        <td width="15%" align="right">Username</td>

                        <td width="10%"><input type="text" name="" value="" size="10"/></td>

                        <td width="10%">Password</td>

                        <td width="10%"><input type="password" name="" value=""size="10"></td>

                        <td width="55%">

                            <input type="submit" name="" value="LOGIN" class="button" style="font-size:11px;">

                        </td>

                    </tr>

                </table>

                -->  

           </div>

           <h3 class="title">

				<?php

                    $sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'STAF00019\' AND Lang = \''.$_SESSION["lang"].'\'';

                    $sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

                    $arr = mysqli_fetch_array($sqlresult);

                    echo $arr["TextMsg"];

                ?>     

            </h3>

           	<br />

			<?php

            	$sql = 'SELECT S.NameId, S.PositionId, S.ProfileId, S.ExternURL, '.

					   'P.Name AS PName, P.Location AS PLocation, SRC.Name AS SRCName, SRC.Location AS SRCLocation '.

					   'FROM (STAFF S LEFT JOIN PICTURE P ON (S.PicId = P.PicId) '.

					   'LEFT JOIN SOURCE SRC ON (S.SourceId = SRC.SourceId)) '.

					   'ORDER BY DisplayOrder ASC';

				$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

				$numppl = mysqli_num_rows($sqlresult);

				while ($row = mysqli_fetch_array($sqlresult)){

					$nameId[] = $row["NameId"];

					$positionId[] = $row["PositionId"];

					$profileId[] = $row["ProfileId"];

					$picture[] = ($row["PLocation"]==NULL || $row["PName"]==NULL)? "./content_img/profile_none.png" : $row["PLocation"].$row["PName"];

					$source[] = ($row["SRCLocation"]==NULL || $row["SRCName"]==NULL)? NULL : $row["SRCLocation"].$row["SRCName"];

					$externURL[] = $row["ExternURL"];

				}

				for($i=0;$i<$numppl;$i++){

					// fetch name

					$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$nameId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

					$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

					$arr= mysqli_fetch_array($sqlresult);

					$name = $arr["TextMsg"];

					

					// fetch position

					$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$positionId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

					$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

					$arr= mysqli_fetch_array($sqlresult);

					$position = $arr["TextMsg"];

					

					// fetch profile

					$sql = 'SELECT TextMsg FROM CONTENTTEXT WHERE MsgKey = \''.$profileId[$i].'\' AND Lang = \''.$_SESSION['lang'].'\'';

					$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

					$arr= mysqli_fetch_array($sqlresult);

					$profile = $arr["TextMsg"];

					

					echo "<div class=\"post\">\n";

					echo "\t<div class=\"entry\" style=\"padding-left:20px;\">\n";

					echo "\t\t<table width=\"90%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

					echo "\t\t\t<tr>\n";

					echo "\t\t\t\t<td width=\"30%\"  valign=\"top\">\n";

					echo "<img src=\"".$picture[$i]."\" class=\"img_profile\">";

					echo "\t\t\t\t</td>\n";

					echo "\t\t\t\t<td width=\"70%\"  align=\"left\" valign=\"top\">\n";

					echo "<h3 style=\"color:#006699\">".$name."</h3>";

					echo "<b><font size=\"3\" color=\"#090\">".$position."</font></b><br/>\n";

					echo $profile."<br>\n";

					

					if($source[$i]!=NULL || $externURL[$i]!=NULL){

						echo "More about ".$name.": ";

						echo ($externURL[$i]!=NULL)? "<a href=\"http://".$externURL[$i]."\">".$externURL[$i]."</a>":"";

						if($source[$i]!=NULL){

							if (file_exists($source[$i])) {

								header('Content-Description: File Transfer');

								header('Content-Type: application/octet-stream');

								header('Content-Disposition: attachment; filename='.basename($source[$i]));

								header('Content-Transfer-Encoding: binary');

								header('Expires: 0');

								header('Cache-Control: must-revalidate');

								header('Pragma: public');

								header('Content-Length: ' . filesize($source[$i]));

								ob_clean();

								flush();

								readfile($source[$i]);

								exit;

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

            <div class="post">

                <h3 class="title">

                    <?php

                        $sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'STAF00020\' AND Lang = \''.$_SESSION["lang"].'\'';

                        $sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

                        $arr = mysqli_fetch_array($sqlresult);

                        echo $arr["TextMsg"];

                    ?>     

                </h3>

                <p>

                	<?php

                        $sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'STAF00021\' AND Lang = \''.$_SESSION["lang"].'\'';

                        $sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

                        $arr = mysqli_fetch_array($sqlresult);

                        echo $arr["TextMsg"];

                    ?>

                </p>

                <div align="center">

                	<img src="images/corporation-people.jpg" width="650" height="212" />

                </div>

            </div>

		</div>

		<!-- end #content -->

		<div style="clear: both;">&nbsp;</div>

	</div>

	<!-- end #page -->

	<div id="footer">

		<?php include "footer/footer.php" ?>

	</div>

	<!-- end #footer -->

</div>

</body>

</html>

<?php

	// Free resultset

	mysqli_free_result($sqlresult);

	

	// Closing connection

	mysqli_close($dbconn);

?>