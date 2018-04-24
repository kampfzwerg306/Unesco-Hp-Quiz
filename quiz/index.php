<?php
session_start();
?>

<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Alpha 0.1</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">
		<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<header>
			<p class="text-center">
				Willkommen zum Unesco Quiz <?php if(!empty($_SESSION['name'])){echo $_SESSION['name'];}?>
			</p>
		</header>
		<div class="container">
			<div class="row">
				<div class="col-xs-14 col-sm-7 col-lg-7">
					<div class='image'>
						<?php  
$host = "localhost"; 
$user = "root"; 
$password = "ninabauer"; 
$dbname = "quiz"; 

$dbverbindung = mysql_connect ($host, $user, $password) or die("Verbindung zur Datenbank fehlgeschlagen");

$db_select = MYSQL_SELECT_DB($dbname) OR DIE (mysql_erroru()); 

$dbanfrage = "SELECT user_name, score FROM users ORDER BY score DESC  limit 5"; 

$res = mysql_db_query ($dbname, $dbanfrage, $dbverbindung) or die('Fehler'); 

echo '<table border="0" cellpadding="0" cellspacing="0" bordercolor="#fff" width="350"> 
  <tr> 
    <td width="50" height="25"><font size="4" face="Arial" color="#fff">Top </font></td> 
    <td width="200" height="25"><font size="4" face="Arial" color="#fff">5</font></td> 
    <td width="50" height="25"><font size="4" face="Arial" color="#fff"></font></td> 
  </tr>
'; 

$platzierung = 1;

while ($result = mysql_fetch_array($res)) 
{ 
echo ' 

  <tr> 
    <td width="50" height="25" style="border-bottom: 0px dotted #fff"><font size="3" face="Arial" color="#fff">'.$platzierung.'</font></td>
    <td width="200" height="25" style="border-bottom: 0px dotted #fff"><font size="3" face="Arial" color="#fff">'.$result['user_name'].'</font></td>

  </tr>
'; $platzierung = $platzierung + 1;
} 
echo '</table>' ; 
?> 
					</div>
				</div>
				<div class="col-xs-10 col-sm-5 col-lg-5">
					<div class="intro">
						<p class="text-center">
							Bitte geben Sie Ihren Namen ein
						</p>
						<?php if(empty($_SESSION['name'])){?>
						<form class="form-signin" method="post" id='signin' name="signin" action="questions.php">
							<div class="form-group">
								<input type="text" id='name' name='name' class="form-control" placeholder="Bitte geben Sie Ihren Namen ein
						</p>"/>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
							    <select class="form-control" name="category" id="category">
						
                                  <option value="1">Unesco 2016</option>
                                 <!--  <option value="2">Programmieren</option>
                                  <option value="3">Elektrotechnik</option>
                                  <option value="4">Wirtschaftskunde</option> 
								   <option value="5">Ethik</option> -->
                                </select>
                                <span class="help-block"></span>
							</div>
							
							<br>
							<button class="btn btn-success btn-block" type="submit">
								DRÜCK Mich!
							</button><br>
							<a href="<?php echo BASE_PATH.'../home/index.html';?>" class='btn btn-success'>zur Homepage</a>
						</form>
						
						<?php }else{?>
						    <form class="form-signin" method="post" id='signin' name="signin" action="questions.php">
                            <div class="form-group">
                              <select class="form-control" name="category" id="category">
							    
                                  <option value="1">Unesco 2016</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            
                            <br>
                            <button class="btn btn-success btn-block" type="submit">
                               DRÜCK Mich!
                            </button><br>
                            <a href="<?php echo BASE_PATH.'../home/index.html';?>" class='btn btn-success'>zur Homepage</a>
                            <?php }?>
                            <?php if(!empty($_SESSION['name'])){?>
                            <a href="<?php echo BASE_PATH.'logout.php';?>" class='btn btn-success'>Logout</a>
                            <?php }?>
                        </form>
					</div>
				</div>
			</div>
		</div>
		<footer>
		<p class="text-center" id="foot">
                &copy; Tim Fehmer & Daniel Schenk 2016
            </p>
		</footer>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/jquery.validate.min.js"></script>

		<script>
			$(document).ready(function() {
				$("#signin").validate({
					submitHandler : function() {
					    console.log(form.valid());
						if (form.valid()) {
						    alert("sf");
							return true;
						} else {
							return false;
						}

					},
					rules : {
						name : {
							required : true,
							minlength : 3,
							remote : {
								url : "check_name.php",
								type : "post",
								data : {
									username : function() {
										return $("#name").val();
									}
								}
							}
						},
						category:{
						    required : false
						}
					},
					messages : {
						name : {
							required : "Bitte geben sie Ihren Namen ein",
							remote : "Der Name ist schon verwendet bitte Nehmen sie einen Anderen"
						},
						category:{
                            required : "Bitte wählen sie eine Kategorie"
                        }
					},
					errorPlacement : function(error, element) {
						$(element).closest('.form-group').find('.help-block').html(error.html());
					},
					highlight : function(element) {
						$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					success : function(element, lab) {
						var messages = new Array("");
						var num = Math.floor(Math.random() * 6);
						$(lab).closest('.form-group').find('.help-block').text(messages[num]);
						$(lab).addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');
					}
				});
			});
		</script>

	</body>
</html>
