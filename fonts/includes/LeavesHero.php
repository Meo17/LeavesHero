<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "leaveshero";

$handle = fopen("counter.txt", "r");
if(!$handle){
  
 echo "could not open the file";
}
else {
  
  
  $counter=(int )fread($handle,20);
  fclose($handle);
  $counter++;
 // echo" <strong> you are visitor no ". $counter  . " </strong > " ;
$handle= fopen("counter.txt", "w" ) ;
fwrite($handle,$counter) ;
fclose ($handle) ;
  }
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO  views  (numberofvistor)
    VALUES ('$counter')");

    // commit the transaction
    $conn->commit();
    echo "";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
?> 
<input type="" name="view" value="<?php echo  $counter ?>" hidden >
<!DOCTYPE html>
<html lang="en-us">
<head>
<title>LeavesHero</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="dist/sweetalert.css">
   <link rel="stylesheet" href="materialize/materialize.css">
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>
   <link rel="stylesheet" href="materialize/materialize.min.css">
   <link rel="stylesheet" href="materialize/materialize.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/css/mdb.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>
</head>
<body>
  <?php include 'css/css.css'?>
<nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand navbar-logo" href="#home"></a><img class="logo" src="images/logo.png"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="#about" style="color:#1a1a1a">About</a></li>
            <li><a href="#features" style="color:#1a1a1a">Features</a></li>
        </ul>
        <div class="container-fluid" style="padding-top: 10px; padding-left: 1095px">
          <!--Modal Button-->
            <button type="button" class="btn btn-white btn-hover-lightgray btn-sm" data-toggle="modal" data-target="#myModalLogIn" style="font-size:10px"> Log In</button> 
          </div>

      </div>
    </div>
    <div class="container-fluid navline" style="padding-top: -10px"></div>
</nav> 
 
<div class="container" style="width: auto;">

   <div class="container-fluid bgimg-1" id="home" style="padding-left: 0px">
    <!--Subscription Modal-->
      <div class="container-fluid" style="padding-top: 380px; padding-left: 220px">
        <!--Modal Button-->
          <button type="button" class="btn btn-leave btn-hover-white btn-md" data-toggle="modal" data-target="#myModalSubscribe" style="width: 150px;font-size: 12px">Subscribe</button>  
            <!-- Subscription Modal -->

         <?PHP require_once 'subscribe.php'?>
    </div>
      <!--Log In Modal -->

  <?PHP require_once 'loginmodal.php'?>

  </div>
  <div class="container-fluid about-content" id="about">
    <div class="container-fluid" style="border-bottom: 2px solid #00cc99">
      <h2 style="color: #fff; padding-left: 68px; padding-top: 50px;">What is LeavesHero?</h2>
    </div>
    <div class="container" style="text-align: center; color: #fff; padding-top: 120px;">
      <h4>LeavesHero is an online application for employees leave management.</h4>
      <h4>It makes your company leave management paperless and</h4>
      <h4>allows your employees to manage leave application, </h4>
      <h4>apply leave request and check their balances </h4>
      <h4>any time, any where as long as they are </h4>
      <h4>connected in the internet. </h4 >
    </div>
  </div> 
  <div class="container-fluid howitworks-content" id="features">
    <div class="container-fluid" style="border-bottom: 2px solid #ccc">
      <h2 style="color: #262626; padding-left: 68px; padding-top: 50px">Features</h2>
    </div>
  </div> 
  <button type="button" class="btn  btn-md btn-right navbar-fixed-bottom " data-toggle="modal" data-target="#sendfeed" style="width: 150px;font-size: 12px;float: right;margin-top: 200px;margin-left: 1070px;background-color: #0d0d0d;opacity: 50%"><i class="glyphicon glyphicon-envelope " style="margin-right: 10px"></i>Send Feedback</button>  

</div>

</body>
</html>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/jQuery 3.3.1.js" ></script>
    <script src="js/jQuery-3.2.0..js" ></script>
  <script type="text/javascript" src="js/jquery.form.js" ></script>
 <script src="dist/sweetalert.min.js"></script>
 <script type="text/javascript" src="dist/sweetalert.js" ></script>
