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

		width: 820px;

		float: left;

	}

	a { 

	color: #666;

	text-decoration: none;

	}

	

	a:hover { 

		text-decoration: underline; 

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

                <form id="langform" name="langform" action="collaborator.php" method="post">

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

            <div class="post">

                <h3 class="title" id="c">

                	<?php

						$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'COLL00009\' AND Lang = \''.$_SESSION["lang"].'\'';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						$arr = mysqli_fetch_array($sqlresult);

						echo $arr["TextMsg"];

                    ?>  

                </h3>

                <div align="center" style="padding-top:10px;">

                <?php

					$sql = 'SELECT * FROM (COLLABORATOR C JOIN CONTENTTEXT T ON (C.NameId = T.MsgKey) '.

						   'JOIN PICTURE P ON (C.PicId = P.PicId)) '.

						   'WHERE Type = \'c\' AND Lang = \''.$_SESSION['lang'].'\' ORDER BY C.CollaboratorId ASC';

					$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

					if(mysqli_num_rows($sqlresult)>0){

						echo "\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

						$col = 1;

						while ($row = mysqli_fetch_array($sqlresult)){

							echo ($col%3==1)? "\t\t<tr>\n":"";

							echo "\t\t\t<td width=\"25%\" align=\"center\">\n";

							echo "\t\t\t\t<a href=\"http://".$row["Website"]."\"><img src=\"".$row["Location"].$row["Name"]."\" width=\"150\" height=\"150\"><br/><br/>\n";

							echo $row["TextMsg"]."</a>\n";

							echo "\t\t\t</td>\n";

							echo ($col%3==0)? "\t\t</tr>\n":"";

							$col++;

							

						}

						$col--;

						if($col%3!=0){

							while($col%3!=0){

								echo "\t\t\t<td width=\"25%\" align=\"center\">\n";

								echo "&nbsp;";

								echo "\t\t\t</td>\n";

								$col++;

							}

							echo "\t\t</tr>\n";

						}

						echo "\t</table>\n";

					}

					

				?>

                </div>

           </div>	

           <div class="post">

                <h3 class="title" id="p">

                	<?php

						$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'COLL00010\' AND Lang = \''.$_SESSION["lang"].'\'';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						$arr = mysqli_fetch_array($sqlresult);

						echo $arr["TextMsg"];

                    ?>  

                </h3>

                <div align="center" style="padding-top:10px;">

                <?php

					$sql = 'SELECT * FROM (COLLABORATOR C JOIN CONTENTTEXT T ON (C.NameId = T.MsgKey) '.

						   'JOIN PICTURE P ON (C.PicId = P.PicId)) '.

						   'WHERE Type = \'p\' AND Lang = \''.$_SESSION['lang'].'\' ORDER BY C.CollaboratorId ASC';

					$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

					if(mysqli_num_rows($sqlresult)>0){

						echo "\t<table width=\"95%\" border=\"0\" cellspacing=\"2\" cellpadding=\"5\">\n";

						$col = 1;

						while ($row = mysqli_fetch_array($sqlresult)){

							echo ($col%3==1)? "\t\t<tr>\n":"";

							echo "\t\t\t<td width=\"25%\" align=\"center\">\n";

							echo "\t\t\t\t<a href=\"http://".$row["Website"]."\"><img src=\"".$row["Location"].$row["Name"]."\" width=\"150\" height=\"150\"><br/><br/>\n";

							echo $row["TextMsg"]."</a>\n";

							echo "\t\t\t</td>\n";

							echo ($col%3==0)? "\t\t</tr>\n":"";

							$col++;

							

						}

						$col--;

						if($col%3!=0){

							while($col%3!=0){

								echo "\t\t\t<td width=\"25%\" align=\"center\">\n";

								echo "&nbsp;";

								echo "\t\t\t</td>\n";

								$col++;

							}

							echo "\t\t</tr>\n";

						}

						echo "\t</table>\n";

					}

					

				?>

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