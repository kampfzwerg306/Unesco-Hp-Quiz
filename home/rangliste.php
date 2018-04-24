<!DOCTYPE html>
<html>
<head>
<title>Unesco Project </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Your Trip Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- banner -->
	<div class="banner">
		<div class="container">
			<div class="banner_top">
				<div class="banner_top_left">
				</div>
				<div class="clearfix"> </div>
			</div>
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav cl-effect-14">
						<li><a href="index.html">Home</a></li>
						<li><a href="glob.html">Globalisierung</a></li>
						<li><a href="ethik.html">Ethik</a></li>
						<li><a href="europa.html">Europa</a></li>
						<li><a href="umwelt.html">Umwelt</a></li>
						<li><a href="elo.html">ELO</a></li>
						<li><a href="rangliste.php">Quiz Score</a></li>
						<li><a href="../quiz/index.php">Zum Quiz</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->	
				
				
			</nav>
			<div class="logo">
				<a href="index.html">Schau hin<span>und misch dich ein</span></a>
			</div>
		</div>
	</div>
<!-- //banner -->
<!-- single -->
	<div class="single">
		<div class="container">
			<div class="single-page-artical">
				<div class="artical-content">
				<center>
					<h3>Top 50</h3>
					<!--<img class="img-responsive" src="images/banner1.jpg" alt=" " />-->
					<p>

<?php  
$host = "localhost"; 
$user = "root"; 
$password = "ninabauer"; 
$dbname = "quiz"; 
$tabelle = "users"; 

$dbverbindung = mysql_connect ($host, $user, $password) or die("Verbindung zur Datenbank fehlgeschlagen");

$db_select = MYSQL_SELECT_DB($dbname) OR DIE (mysql_erroru()); 

$dbanfrage = "SELECT user_name, score FROM $tabelle ORDER BY score DESC  limit 10"; 

$res = mysql_db_query ($dbname, $dbanfrage, $dbverbindung) or die('Fehler'); 

echo '<table border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" width="350"> 
  <tr> 
    <td width="50" height="25"><font size="4" face="Arial" color="#000000">Platz</font></td> 
    <td width="200" height="25"><font size="4" face="Arial" color="#000000">Name</font></td> 
    <td width="50" height="25"><font size="4" face="Arial" color="#000000">Punkte</font></td> 
  </tr>
'; 

$platzierung = 1;

while ($result = mysql_fetch_array($res)) 
{ 
echo ' 

  <tr> 
    <td width="50" height="25" style="border-bottom: 1px dotted #000000"><font size="3" face="Arial" color="#000000">'.$platzierung.'</font></td>
    <td width="200" height="25" style="border-bottom: 1px dotted #000000"><font size="3" face="Arial" color="#000000">'.$result['user_name'].'</font></td>
    <td width="50" height="25" style="border-bottom: 1px dotted #000000"><font size="3" face="Arial" color="#000000">'.$result['score'].'</font></td> 
  </tr>
'; $platzierung = $platzierung + 1;
} 
echo '</table>' ; 
?> 
</center> 
</p>
				</div>
			</div>
		</div>
	</div>
<!-- single -->
<!-- contact -->
	<div class="contact" id="contact">
		<div class="container">
			</div>
			<div class="clearfix"> </div>
			<!-- footer -->
			<div class="footer-copy">
				<p>&copy 2016 Tim Fehmer & Daniel Schenk.</p>
			</div>
		</div>
	</div>
<!-- //contact -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>