<?php

	session_start();

	if($_SESSION['lang']=="")

		$_SESSION['lang'] = 'eng';

	if(isset($_POST['lang']))

		$_SESSION['lang'] = $_POST['lang'];

		

	include "include/connect_db.php";

	$sql = 'SELECT COUNT(NewsId) AS C FROM NEWS';

	$sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

	$arr = mysqli_fetch_array($sqlresult);

	$page = $arr["C"];

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

		color: #F60;

		text-decoration: none;

	}

	

	a:hover { 

		text-decoration: underline; 

	}

	.img_news {

		border: 6px solid #E1F1F6;

	}

</style>

<style>

	div.pagination {

		padding: 2px 5px 2px 5px;

		font-size: 11px;

		font-family: Tahoma, Arial, Helvetica, Sans-serif;

		background-color:#3e3e3e;

		color: #fff;

	}

	

	div.pagination a {

		padding: 2px 5px 2px 5px;

		margin: 2px;

		background-color:#3e3e3e;

		text-decoration: none; /* no underline */

		color: #fff;

	}

	div.pagination a:hover, div.pagination a:active {

		background-color:#ec5210;

		color: #fff;

	}

	div.pagination span.current {

		padding: 2px 5px 2px 5px;

		margin: 2px;

			font-weight: bold;

			background-color: #313131;

			color: #fff;

	}

	div.pagination span.disabled {

		padding: 2px 5px 2px 5px;

		margin: 2px;

		background-color:#3e3e3e;

		color: #868686;

	}

</style>



<!-- Include the jQuery library (local or CDN) -->

<script type="text/javascript" src="script/jquery-1.9.1.min.js"></script>



<script type="text/javascript" src="include/jQuery-Paging-master/jquery.paging.min.js"></script>

<script type="text/javascript" src="include/jQuery-Paging-master/spin.min.js"></script>

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

	

	$(function() {	

		$("#pagination").paging(<?php echo $page ?>, {

			format: '- < ncnnnnnn >',

			perpage: 5,

			lapping: 0,

			page: 1,

			onSelect: function(page) {

				var sp = new Spinner();

				sp.spin();
				console.log('newsdata.php?start=' + this.slice[0] + '&end=' + this.slice[1] + '&page=' + page);

				$.ajax({

					"url": 'newsdata.php?start=' + this.slice[0] + '&end=' + this.slice[1] + '&page=' + page,

					"success": function(data) {

						sp.stop();

						// content replace

						$("#contenttext").html(data);

					}

				});

		

			},

			onFormat: function(type) {

		

				switch (type) {

				case 'block':

		

					if (!this.active)

						return '<span class="disabled">' + this.value + '</span>';

					else if (this.value != this.page)

						return '<em><a href="#' + this.value + '">' + this.value + '</a></em>';

					return '<span class="current">' + this.value + '</span>';

		

				case 'next':

		

					if (this.active) {

						return '<a href="#' + this.value + '" class="next">»</a>';

					}

					return '<span class="disabled">»</span>';

		

				case 'prev':

		

					if (this.active) {

						return '<a href="#' + this.value + '" class="prev">«</a>';

					}

					return '<span class="disabled">«</span>';

		

				case 'first':

		

					if (this.active) {

						return '<a href="#' + this.value + '" class="first">|<</a>';

					}

					return '<span class="disabled">|<</span>';

		

				case 'last':

		

					if (this.active) {

						return '<a href="#' + this.value + '" class="prev">>|</a>';

					}

					return '<span class="disabled">>|</span>';

		

				case 'fill':

					if (this.active) {

						return 'PAGE ' + this.page + ' FROM ' + this.pages;

					}

				}

			},

		});

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

                <form id="langform" name="langform" action="news.php" method="post">

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

                    $sql = 'SELECT TextMsg FROM MSGTEXT WHERE MsgKey = \'NEWS00007\' AND Lang = \''.$_SESSION["lang"].'\'';

                    $sqlresult = mysqli_query($dbconn,$sql) or die(mysql_error());

                    $arr = mysqli_fetch_array($sqlresult);

                    echo $arr["TextMsg"];

                ?> 

            </h3>

            <br />

            <div id="contenttext"></div>

            

            <div style="clear: both;">&nbsp;</div>

            

            <div id="pagination" class="pagination"></div>

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