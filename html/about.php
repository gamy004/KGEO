<?php

	session_start();

	if($_SESSION['lang']=="")

		$_SESSION['lang'] = 'eng';

	if(isset($_POST['lang']))

		$_SESSION['lang'] = $_POST['lang'];

		

	include "include/connect_db.php";

	$sql = 'SELECT * FROM KGEOINFO ORDER BY GroupNo ASC';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	while ($row = mysqli_fetch_array($sqlresult)){

		$headId[] = $row["Head"];

		$detailId[] = $row["Detail"];

		$group[] = $row["GroupNo"];

	}

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

                <form id="langform" name="langform" action="about.php" method="post">

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

                <img src="images/map-icon.jpg" width="700" height="200"/>

           </div>

           <?php

				$uniq_grp = array_values(array_unique($group));

				$bullet_no = 0;

				for($i=0;$i<sizeof($uniq_grp);$i++){

					echo "\t<div class=\"post\">\n";

					while($group[$bullet_no]==$uniq_grp[$i]){

						// Display header part

						$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \''.$headId[$bullet_no].'\' AND Lang = \''.$_SESSION['lang'].'\'';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						$arr = mysqli_fetch_array($sqlresult);

						echo ($arr["TextMsg"]==NULL)? "": "\t\t<h3 class=\"title\" id=\"".$group[$bullet_no]."\">".$arr["TextMsg"]."</h3>\n";

						

						// Display detail part

						$sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \''.$detailId[$bullet_no].'\' AND Lang = \''.$_SESSION['lang'].'\'';

						$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

						$arr = mysqli_fetch_array($sqlresult);

						echo "\t\t<div class=\"entry\" style=\"padding-left:20px;\">\n";

						echo ($arr["TextMsg"]==NULL)? "": $arr["TextMsg"];

						echo "\n\t\t</div>\n";

						$bullet_no++;
						if($bullet_no>5)break;
					}

					echo "\t</div>\n";

				}

			?>  

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

