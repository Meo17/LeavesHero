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
   <link rel="stylesheet" href="css/css.css">
   <link rel="stylesheet" href="dist/sweetalert.css">
   <link rel="stylesheet" href="materialize/materialize.css">
   <link rel="stylesheet" href="materialize/materialize.min.css">
    <link rel="icon" href="icons/logo.jpg" sizes="32x32">
  <!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/css/mdb.min.css" /> -->
      <?php include 'css/css.css';?>
       <!-- Bootstrap Core CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>

  <link href='css/fullcalendar.css' rel='stylesheet' />
    <script src="/__/firebase/5.7.0/firebase-app.js"></script>
  <script src="/__/firebase/5.7.0/firebase-auth.js"></script>
  <script src="/__/firebase/init.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>
<body   >
  <style type="text/css">
    h1,h2,h3,h4,h5,h6,p{
      font-family:'Roboto Light';
    }
     .modal-backdrop {
    display: none;    
}
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: #ffffff;
      position: fixed;
      width: 100%
    }

    /* bluesh line under the navbar */
    .navline{
      height: 3px;
      background-color: #00cc99;
    }
    .navbar-logo{
      padding-left: 75px;
    }
    .logo{
      height: 25px;
      width:100px;
      padding-top: 0px;
    }
    .lower-nav{
      width: auto;
      font-style: 'Roboto';
      font-style: 20px;
      color: #1a1a1a; 
    }
    .login{
      padding-right: 75px;
    }
    .navbar-brand {
      float: left;
      height: 50px;
      padding: 13px;
      padding-left: 75px;
      font-size: 18px;
      line-height: 20px;
  }
  .bgimg-1 {
      background-position: center;
      background-size: cover;
      background-image: url("images/backgrounds.png");
      height: 540px;
      width: auto;

  } 
  .modal-head{
      padding-top: 30px;
      padding-left: 50px;
      padding-right: 50px;
      border-bottom: 0px solid #fff;
    }
    .modal-header{
      padding: 15px;
      border-bottom: 2px solid #00cc99;
    }
    .modal-footer {
       padding: 15px;
       border-top: 0px solid #fff;
  }
  .modal-foot {
       padding: 15px;
       border-top: 0px solid #fff;
  }
    .input-style{
      padding-top: 15px;
      padding-left: 37px;
      display:block;
      border:none;
      border-bottom:1px solid #ccc;
      width:100%;
    }
    .input-style2{
      padding-top: 15px;
      padding-left: 37px;
      display:block;
      border:none;
      border-bottom:1px solid #fff;
      width:100%;
    }
    .input-style3{
      padding:8px;
      display:block;
      border:none;
      border-bottom:1px solid #ccc;
      width:100%;
    }
    .btn-leave {
      color: #fff;
      background-color: #00cc99;
      border-color: #00cc99;
      border-radius: 20px
  }
  .btn-white {
      color: #000;
      background-color: #ffffff;
      border-color: #ffffff;

  }
  .btn-gray {
      color: #fff;
      background-color: #262626;
      border-color: #262626;
      border-radius: 20px
  }
  .btn-hover-lightgray:hover{
    color: #000!important;
    background-color: #f2f2f2!important;
    border-color: #f2f2f2!important
    border-color: #ccc;
  }
  .btn-hover-white:hover{
    color: #00cc99!important;
    background-color: #ffffff!important;
    border-color: #ffffff!important
    border-color: #00cc99;
  }
    .text-hover-gray:hover{
    color: #262626!important;
  }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    .about-content{
      height:550px;
      width: auto;
      background-color: #262626
    }
    .howitworks-content{
      height:250px;
      width: auto;
      background-color: #fff
    }
    .bgcolor-content{
      height:800px;
      width: auto;
      background-color: #fff
    }
    .header{
      padding-top: 60px;
      color: #fff;
      text-align: center;
    }

   input#company_name{
    background-image:url(images/icon_company.png);
    background-repeat:no-repeat;
    background-position:6px;
    font-family:'Roboto Light';
    margin-top:10px;
    padding-left:50px;
    padding-bottom: 14px;
    width:208px;
    height:30px;
    font-size:14px;
    box-shadow:0 0 0px;
    -webkit-box-shadow:0 0 0px;
    /* For I.E */
    -moz-box-shadow:0 0 0px;
    /* For Mozilla Web Browser*/
    border-radius:0px;
    -webkit-border-radius:0px;
    /* For I.E */
    -moz-border-radius:0px
    /* For Mozilla Web Browser*/
  }
  input#username{
    background-image:url(images/icon_username.png);
    background-repeat:no-repeat;
    background-position:6px;
    font-family:'Roboto Light';
    margin-top:10px;
    padding-left:50px;
    padding-bottom: 14px;
    width:208px;
    height:30px;
    font-size:14px;
    box-shadow:0 0 0px;
    -webkit-box-shadow:0 0 0px;
    /* For I.E */
    -moz-box-shadow:0 0 0px;
    /* For Mozilla Web Browser*/
    border-radius:0px;
    -webkit-border-radius:0px;
    /* For I.E */
    -moz-border-radius:0px
    /* For Mozilla Web Browser*/
  }
  input#pwd{
    background-image:url(images/icon_password.png);
    background-repeat:no-repeat;
    background-position:6px;
    font-family:'Roboto Light';
    margin-top:10px;
    padding-left:50px;
    padding-bottom: 14px;
    width:208px;
    height:30px;
    font-size:14px;
    box-shadow:0 0 0px;
    -webkit-box-shadow:0 0 0px;
    /* For I.E */
    -moz-box-shadow:0 0 0px;
    /* For Mozilla Web Browser*/
    border-radius:0px;
    -webkit-border-radius:0px;
    /* For I.E */
    -moz-border-radius:0px
    /* For Mozilla Web Browser*/
  }

  img {
    float: left;
  }

img {
  display: left;
  display: right;
  margin-left: auto;
  margin-right: auto;
}


  p:hover {
  background-color: #33cc99;
  border-radius: 10px;

  }

  

  </style>


<nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand navbar-logo" href="#home"><img class="logo" src="images/logo.png"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="#about" style="color:#1a1a1a">About</a></li>
            <li><a href="#features" style="color:#1a1a1a">Features</a></li>
        </ul>
        <div class="container-fluid" style="padding-top: 10px; padding-left: 1500px">
          <!--Modal Button-->
            <button type="button" class="btn btn-white btn-hover-lightgray btn-sm" data-toggle="modal" data-target="#myModalLogIn"> Log In</button> 
          </div>
      </div>
    </div>
    <div class="container-fluid navline"></div>
</nav>  
 
<div class="container" style="width: auto;">

   <div class="container-fluid bgimg-1" id="home" style="padding-left: 0px">
    <!--Subscription Modal-->
      <div class="container-fluid" style="padding-top: 380px; padding-left: 220px">
        <!--Modal Button-->
          <button type="button" class="btn btn-leave btn-hover-white btn-md" data-toggle="modal" data-target="#myModalSubscribe" style="width: 150px;font-size: 12px">Subscribe</button>  
            <!-- Subscription Modal -->
       


    </div>
      <!--Log In Modal -->

  <?PHP require_once 'subscribe.php'?>
  <?PHP require_once 'loginmodal.php'?>

  </div>
<div class="container-fluid about-content" id="about">
    <div class="container-fluid" style="border-bottom: 2px solid #00cc99">
      <h2 style="color: #fff; padding-left: 68px; padding-top: 15px;">What is LeavesHero?</h2>
    </div>

    <div class="container" style="text-align: right; color: #fff; padding-top: 50px;">

      <img src="images/handphone.png" alt="hphone" style="width:230px;height:419px;margin-right:30px;">
      <br><br>
      <h3>LeavesHero is an online application for employees leave management.</h3>
      <h3>It makes your company leave management paperless and allows your &nbsp;</h3>
      <h3>employees to manage leave application, apply leave request and check </h3>
      <h3>their balances anytime. any where as long as they are connected in the</h3>
      <h3>Internet. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;</h4>
 
    </div>
    </div>

  
  <div class="container-fluid howitworks-content" id="features">
    <div class="container-fluid" style="border-bottom: 2px solid #ccc">
      <h2 style="color: #262626; padding-left: 68px; padding-top: 15px">Features</h2>
    </div><br><br>

      <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
            </div>
            <img src="images/phone.png" alt="phone" style="width:90px;height:90px;">
            <h3><b>Apply Leave</b></h3>
            <p class="lead mb-0  " style="text-align: justify;">This App will look great on any device, no matter the size!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">

            </div>
            <img src="images/customize.png" alt="customize" style="width:90px;height:90px;">
            <h3><b>Customization</b></h3>
            <p class="lead mb-0" style="text-align: justify;">Customizing leave type to set Leave Management System.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">

            </div>
            <img src="images/check.png" alt="check" style="width:90px;height:90px;">
            <h3><b>Easy to Use</b></h3>
            <p class="lead mb-0" style="text-align: justify;">Friendly and Easy to use in Applying Leaves.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

 <!--<table class="table table-bordered">
    <thead>
      <tr>
        <th>Significance of the System</th>
        <th>Company</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>The study provides information about Online Leave Management. There are reasons why the study should be implemented. The significance of the study is specified as follows:</td>
        <td>This study can improve the company’s leave services to its employees. Leave, when paired with attendance, it can improve accuracy and build discipline in any company.</td>
      </tr>
    </tbody>
  </table>

   <table class="table table-bordered">
    <thead>
      <tr>
        <th>Employee</th>
        <th>HR/Human Resources</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>This study will help employees in a way that they can have information about their leave of absences in the company. Employees can file their leave at any time that refers to the leave policy. </td>
        <td>This Study will provide instant information about employee’s leave history. It allows the manager and Human Resources to look at leave history of the applicant..</td>
      </tr>
    </tbody>
  </table> -->
  <div class="row">
    <div class="col-md-6">
          <img src="images/Maternity.png" alt="Maternity" width="900" height="530">
    </div>
    <div class="col-md-6">
          <img src="images/maternityword.png" alt="Maternity" width="900" height="530">
    </div>
  </div <div class="row">
    <div class="col-md-6">
          <img src="images/paternityword.png" alt="Paternity"width="900" height="530">
    </div>
     <div class="col-md-6">
          <img src="images/Paternity.png" alt="Paternity" width="900" height="530">
    </div>
  </div>

    <div class="row" style="margin-left: 0%">
    <div class="col-md-6">
          <img src="images/Sickleave.png" alt="Sick" width="900" height="530">
    </div>
     <div class="col-md-6">
          <img src="images/sickword.png" alt="Sick" width="900" height="530">
    </div>
  </div>
 <div class="row">
    <div class="col-md-6">
          <img src="images/vacationword.png" alt="Vacation" width="900" height="530">
    </div>
    <div class="col-md-6">
          <img src="images/Vacationleave.png" alt="Vacation" width="900" height="530">
    </div>
  </div>

      <div class="container">
        <h3><center>AND MORE!</center></h3>
      </div>

  <div class="row" style="margin-left: 10%; margin-top: 5%">
    <div class="col-md-12">
<div class="col-md-4">
<div class="card" style="width: 18rem;">
   <img src="images/hustler.png" class="img-circle" alt="hacker" width="180" height="180">
    <table class="table table-bordered">
  <thead>
      <tr>
        <th>HUSTLER</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Email: lawrencebriones@gmail.com</td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
<div class="col-md-4">
<div class="card" style="width: 18rem;">
   <img src="images/hackers.png" class="img-circle" alt="hacker" width="180" height="180">

       <table class="table table-bordered">
    <thead>
      <tr>
        <th>HACKER</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Email: Shairamae@gmail.com</td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
<div class="col-md-4">
<div class="card" style="width: 18rem;">
   <img src="images/hipster.png" class="img-circle" alt="hacker" width="180" height="180">
   
   <table class="tabgle table-bordered">
 <thead>
      <tr>
        <th>HIPSTER</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Email: Ailenmanalili@Gmail.com</td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
</div>
  </div>
  </div>



  </div>
</div>

  </div>
</div>







        </div>

<h5><center>&copy; LeavesHero All Rights Reserved 2019</center></h5>
  </body>
</html>

 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php include 'script.php'?>
