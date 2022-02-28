
<?PHP
session_start();  

  require_once 'db.php';

  $admin    =    ret_admin(); 
  $company  =   ret_company(); 
  $employee =   ret_employee();
  $sname    = "";
  $spsw     = "";
  $mess     = "";
   try {
        if(isset($_POST['login']))
          {
              $sname  =   $_POST['username'];
              $spsw   =   $_POST['password'];
              if(empty($sname) && empty($spsw))
              {     
                    
                     echo "Please Login your account";
            
              }   
             else{
                   foreach ($company as $c) {
                        if ($c['Username'] == $sname && $c['Password1'] == $spsw) {
                          
                          login_company($sname, $spsw);  
                        }
                           
                  }
                  foreach ($employee as $e) {
                        if ($e['Username'] == $sname && $e['Password1'] == $spsw) {
                          login_company_employee($sname, $spsw);  

                        }

                      }
                 foreach ($admin as $a) {
                        if ($a['username'] == $sname && $a['password'] == $spsw) {
                          login_admin($sname, $spsw);  
                          

                        }

                    }   
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("Invalid Credentials !!","Please try again","error");});';
                  echo '</script>'; 
       }
    }
}

  catch (PDOException $error){
    $mess = $error->getMessage();
  }
?>

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
  <link rel="icon" href="icons/logo.jpg" sizes="32x32">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/css/mdb.min.css" />
      <script src="assets/js/sweet.js"></script>
  <script src="assets/js/angular.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <!-- Import and configure the Firebase SDK -->

  <script src="/__/firebase/5.7.0/firebase-app.js"></script>
  <script src="/__/firebase/5.7.0/firebase-auth.js"></script>
  <script src="/__/firebase/init.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
</head> 
<body  ng-app="app" ng-controller="ctrl" class="bgimg-2 "> 
  <?php include 'css/css.css'?>

 
  <div class="card center" style="width: 500px;height: 500px; background:white ;float: center;margin-top: 100px;opacity: 80%;margin-left: 550px">

        <form method="POST" style="width: 500px;float: center;margin-left:100px;padding-top:40px; "class="center">
                      <p id="p01"></p>
                      <h2 style="color: #262626"style="margin-top: 100px">Log in your account here !</h2>
                <div class="input-group" style="margin-top: 30px;" >
                        <input type="text" class="input-style3"  name="username" ng-model="email"id="username" placeholder="Username"style="width: 300px" required>	
                </div>
                <div class="input-group has-feedback" style="margin-top: 30px">
                        <input type="password" class="input-style3" name="password" id="pwd" ng-model="password" style="width: 300px" placeholder="Password" rrequired>
                            <i style="margin-top: 5px"class="glyphicon glyphicon-eye-open form-control-feedback" onclick="myFunction()"></i>
                </div>
               <a href="#" class="text-hover-gray" style="font-size: 10px;padding-left: 118px; text-decoration: none;color: #ccc">Forget Password?</a><br><br>
                  <button   type="submit" class="btn btn-leave btn-hover-white sweet-10 " name="login" style="width: 300px;font-size: 15px">Log In</button>
        </form>

  </div>
       <style >
   #pwd + .glyphicon {
   cursor: pointer;
   pointer-events: all;
 }

   </style>
       <script>
        function myFunction() {
          var x = document.getElementById("pwd");
          if (x.type === "password") {
              x.type = "text";

          } else {
              x.type = "password";
          }
                      // toggle password visibility
          $('#pwd + .glyphicon').on('click', function() {
            $(this).toggleClass('glyphicon-eye-close').toggleClass('glyphicon-eye-open'); // toggle our classes for the eye icon
            $('#pwd').togglePassword(); // activate the hideShowPassword plugin
          });
      }


</script>
</body>
</html>
  <script src="./script1.js"></script>
    <script src="./security.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/jQuery 3.3.1.js" ></script>
    <script src="js/jQuery-3.2.0..js" ></script>
  <script type="text/javascript" src="js/jquery.form.js" ></script>
 <script src="dist/sweetalert.min.js"></script>
 <script type="text/javascript" src="dist/sweetalert.js" ></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js1/jQuery 3.3.1.js" ></script>
    <script src="js1/jQuery-3.2.0..js" ></script>
  <script type="text/javascript" src="js/jquery.form.js" ></script>
 <script src="dist/sweetalert.min.js"></script>
 <script type="text/javascript" src="dist/sweetalert.js" ></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js1/init.js"></script>
  <script src="js1/materialize.js"></script>
       <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
 