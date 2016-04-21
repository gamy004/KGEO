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

	

	.img_profile{

		-webkit-box-shadow:0 0px 7px rgba(0,0,0,0.3);

		box-shadow:0 0 5px rgba(0,0,0,0.2);

		padding:5px;

		background:#fff;

		border:1px solid #ccc;

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

                <form id="langform" name="langform" action="contact.php" method="post">

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

                <h3 class="title">

                	<?php

						$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'CONT00006\' AND Lang = \''.$_SESSION["lang"].'\'';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						$arr = mysqli_fetch_array($sqlresult);

						echo $arr["TextMsg"];

                    ?>

                </h3>

                <div class="entry" style="padding-left:40px;">

                    <table width="80%" border="0" cellspacing="5">

                        <tr>

                            <td>

                                <font style="font-weight:bolder">

                                	<?php

                                    	$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'CONT00001\' AND Lang = \''.$_SESSION["lang"].'\'';

										$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

										$arr = mysqli_fetch_array($sqlresult);

										echo $arr["TextMsg"];

									?>

                                </font>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <?php

									$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'CONT00002\' AND Lang = \''.$_SESSION["lang"].'\'';

									$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

									$arr = mysqli_fetch_array($sqlresult);

									echo $arr["TextMsg"];

								?>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <?php

									$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'CONT00003\' AND Lang = \''.$_SESSION["lang"].'\'';

									$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

									$arr = mysqli_fetch_array($sqlresult);

									echo $arr["TextMsg"];

								?>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <?php

									$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'CONT00004\' AND Lang = \''.$_SESSION["lang"].'\'';

									$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

									$arr = mysqli_fetch_array($sqlresult);

									echo $arr["TextMsg"];

								?>

                            </td>

                        </tr>

                        <!--

                        <tr>

                            <td>

                                <?php

									if(false){

										$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'CONT00005\' AND Lang = \''.$_SESSION["lang"].'\'';

										$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

										$arr = mysqli_fetch_array($sqlresult);

										echo $arr["TextMsg"];

									}

								?>

                            </td>

                        </tr>

                        -->

                    </table>

                </div>

            </div>

            <div class="post">

                <h3 class="title">

                	<?php

						$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'CONT00007\' AND Lang = \''.$_SESSION["lang"].'\'';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						$arr = mysqli_fetch_array($sqlresult);

						echo $arr["TextMsg"];

                    ?>

                </h3>

                <div class="entry" style="padding-left:40px;">

                    <img src="images/KMUTT_Map.jpg" />

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