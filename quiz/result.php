<?php
session_start();
?>

<?php 
require 'config.php';
if(!empty($_SESSION['name'])){
    
    $right_answer=0;
    $wrong_answer=0;
    $unanswered=0; 
  
   $keys=array_keys($_POST);
   $order=join(",",$keys);
   
   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;
   
   $response=mysql_query("select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysql_error());
   
   while($result=mysql_fetch_array($response)){
       if($result['answer']==$_POST[$result['id']]){
               $right_answer++;
           }else if($_POST[$result['id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
   }
   $name=$_SESSION['name'];  
   mysql_query("update users set score='$right_answer' where user_name='$name'");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Unesco Quiz Alpha 1.0</title>
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
                Welcome <?php 
                if(!empty($_SESSION['name'])){
                    echo $_SESSION['name'];
                }?>
               
            </p>
        </header>
        <div class="container result">
            <div class="row"> 
                    <div class='result-logo'>

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

echo '<table border="0" cellpadding="0" cellspacing="0" bordercolor="#fff" width="350"> 
  <tr> 
    <td width="50" height="25"><font size="3" face="Arial" color="#fff">Platz</font></td> 
    <td width="200" height="25"><font size="3" face="Arial" color="#fff">Name</font></td> 
    <td width="50" height="25"><font size="3" face="Arial" color="#fff">Punkte</font></td> 
  </tr>
'; 

$platzierung = 1;

while ($result = mysql_fetch_array($res)) 
{ 
echo ' 
  <tr> 
    <td width="50" height="25" style="border-bottom: 1px solid #fff"><font size="2" face="Arial" color="#fff">'.$platzierung.'</font></td>
    <td width="200" height="25" style="border-bottom: 1px solid #fff"><font size="2" face="Arial" color="#fff">'.$result['user_name'].'</font></td>
    <td width="50" height="25" style="border-bottom: 1px solid #fff"><font size="2" face="Arial" color="#fff">'.$result['score'].'</font></td> 
  </tr> 
'; $platzierung = $platzierung + 1;
} 
echo '</table>'; 
?> 





                            <!--<img src="image/Quiz_result.png" class="img-responsive"/>-->
                    </div>    
           </div>
           <div class="trenn">    
                  <hr style="border: hide 0px  #fff" >  
            </div> 
           <div class="row"> 
                  <div class="col-xs-18 col-sm-9 col-lg-9"> 
                    <!--<div class='result-logo1'>
                            <img src="image/cat.GIF" class="img-responsive"/>
                    </div>-->
                  </div>
                  
                  <div class="col-xs-6 col-sm-3 col-lg-3"> 
                    <!-- <a href="<?php echo BASE_PATH;?>" class='btn btn-success'>Start new Quiz!!!</a>  -->                 
                     <a href="<?php echo BASE_PATH.'logout.php';?>" class='btn btn-success'>Logout</a>
                   
                       <div style="margin-top: 30%,font-size: 1.4em">
                        <p><span class="answer1"> Anzahl von richtigen Fragen:</span> <span class="answer"><?php echo $right_answer;?></span></p>
                        <p><span class="answer1"> Anzahl von richtigen Fragen:</span> <span class="answer"><?php echo $wrong_answer;?></span></p>
                        <!--<p>Totale Anzahl von unbeantworteten Fragen: : <span class="answer"><?php echo $unanswered;?></span></p>  -->                 
                       </div> 
                   
                   </div>
                    
            </div>    
            <div class="row">    
                    
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

        

    </body>
</html>
<?php }else{
    
 header( 'Location: http://localhost/quiz/index.php' ) ;
      
}?>