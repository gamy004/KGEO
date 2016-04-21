<?php

	session_start();

	if($_SESSION['lang']=="")

		$_SESSION['lang'] = 'eng';

	if(isset($_POST['lang']))

		$_SESSION['lang'] = $_POST['lang'];

		

	include "include/connect_db.php";

	$sql = 'SELECT * FROM HOME';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$picId = $arr["NewsPic"];

    $msgId = $arr["WelcomeMessage"];

	

	preg_match('/^{(.*)}$/', $picId, $matches, PREG_OFFSET_CAPTURE);

	$picIdArr = $matches[1][0];

	

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

		width: 410px;

		float: left;

	}

</style>



<!-- Include the jQuery library (local or CDN) -->

<script type="text/javascript" src="script/jquery-1.9.1.min.js"></script>

<!-- Include the plugin *after* the jQuery library -->

<script type="text/javascript" src="script/photoslide/js/bjqs-1.3.min.js"></script>

<!-- Include the basic styles -->

<link type="text/css" rel="Stylesheet" href="script/photoslide/bjqs.css" />

<link rel="stylesheet" href="script/photoslide/demo.css">



<script type="text/javascript" charset="utf-8">  

	$(document).ready(function($) {

		$('#banner-fade').bjqs({

			'height' : 250,

			'width' : 830,

			'responsive' : true,

			'animtype' : 'slide'

		});

	});

	

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

	<!--<div style="float:left; padding-right:10px"><img src="images/logo_kgeo.gif" height="70" width="70"/></div>-->

	<h1><a href="#">KMUTT Geospatial Engineering and Innovation Center</a></h1>

	<!--<p><em>KMUTT Geospatial Engineering and Innovation Center</em></p>-->

</div>

<hr />

<!-- end #logo -->

<div id="page">

	<div id="page-bgtop">

		<div id="content">

        	<div align="right" style="margin-top:-20px; padding-bottom:10px;"> 

                <form id="langform" name="langform" action="index.php" method="post">

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

            <div align="center" style="padding-top:10px; padding-bottom:10px;">

                <div id="banner-fade">

                    <ul class="bjqs">

                    <?php

                    	$sql = 'SELECT Name, Caption, Location FROM PICTURE WHERE PicId IN ('.$picIdArr.')';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						while ($arr = mysqli_fetch_array($sqlresult)) {

							echo "\t<li>\n";

							echo "\t\t<img src=\"".$arr["Location"].$arr["Name"]."\" ";

							echo ($arr["Caption"]==NULL)?"": "title=\"".$arr["Caption"]."\"";

							echo ">";

							echo "\t</li>\n";

						}

					?>

                    </ul>

                </div>

            </div>

            <div class="post">

                <h3 class="title">

                	<?php

						$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'HOME00002\' AND Lang = \''.$_SESSION["lang"].'\'';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						$arr = mysqli_fetch_array($sqlresult);

						echo $arr["TextMsg"];

                    ?>     

                </h3>

                <div class="entry">

                    <p>

                    <?php

						$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \''.$msgId.'\' AND Lang = \''.$_SESSION['lang'].'\'';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						$arr = mysqli_fetch_array($sqlresult);

						echo $arr["TextMsg"];

					?>

                    </p>

                </div>

           </div>	

           <div class="post">

                <h3 class="title" align="right">

                	<?php

						$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'HOME00003\' AND Lang = \''.$_SESSION["lang"].'\'';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						$arr = mysqli_fetch_array($sqlresult);

						echo $arr["TextMsg"];

                    ?>  

                	<img src="images/rss-xxl.png" width="20" height="15">

                </h3>
				<!--
                <p class="meta">

                	<?php

						$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'HOME00004\' AND Lang = \''.$_SESSION["lang"].'\'';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						$arr = mysqli_fetch_array($sqlresult);

						echo $arr["TextMsg"];

                    ?>  

                </p>
				-->
                <div class="entry" align="center">
                <table>
					<?php 
						$sql = "SELECT * FROM news ORDER BY PubDate DESC LIMIT 3";
						$data = mysqli_query($dbconn,$sql) or die(mysql_error());
						$numrow = mysqli_num_rows($data);
						while ($row = mysqli_fetch_array($data)) {
							$sql = 'SELECT * FROM contenttext WHERE MsgKey=\''.$row["HeadlineId"].'\' AND Lang=\''.$_SESSION["lang"].'\'';
							$data2 = mysqli_query($dbconn,$sql);
							while ($row2 = mysqli_fetch_array($data2)) {
								if($_SESSION["lang"]=="tha"){
									$cont = $row2['TextMsg'];
								}
								else{
									$cont = substr($row2['TextMsg'], 0,50);
								}
								echo "<tr><td style=\"width:90px;\"><b>".$row['PubDate']."</b></td><td style=\"height:35px;\">"
								.$cont."&nbsp&nbsp<a href=\"details.php?news=".$row['NewsId']."\"><b> Read More >>></b></a></td></tr>";
							}
						}
					 ?>
				</table>
				<!--
                	<img src="images/prep.png" />
				-->
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