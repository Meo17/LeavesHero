 <input type="date" class="input-style3 hidden" name="date"id="status" value="<?php echo  date('Y-m-d H:i:s');?>" placeholder="Status"required hidden>
<?php
	session_start();
	include 'db.php';
	require 'phpmailer/PHPMailerAutoload.php';


if (!isset($_SESSION['username'])) {
		header("location: index.php");
	}
	$resid              = $_GET['Company_Id'];
	$status             = "Verified";
	$subscriptiontype   = "Free Trial";
	$res                = ret_company_update($resid);
 
		  if ($res['Status']      == "Waiting for approval") 
			{


			    $company_name       =     $res['Company_Name'];
			    $stripped           =     str_replace(' ', '', $res['Company_Name']);
			    $str                =     strtolower($stripped);
		      $company_username   =     $res['Username'];
		      $company_password   =     $res['Password1'];
		      $company_email      =     $res['Company_Email'];
		      $company_id         =     $res['Company_Id'];
		      $date               =     date('Y-m-d H:i:s');
             
      
		      $mail               =    new PHPMailer;

		      $mail->SMTPDebug    =    0;                             

		      $mail->isSMTP();                                      
		      $mail->Host         = 	'smtp.gmail.com';
		      $mail->SMTPAuth     =		 true;                               
		      $mail->Username     = 	'leaveshero@gmail.com';                
		      $mail->Password     = 	'capstone42';                           
		      $mail->SMTPSecure   = 	'ssl';                            
		      $mail->Port 		    =		 465 ;                                    

		      $mail->setFrom('leaveshero@gmail.com', 'LeavesHero');
		      $mail->addAddress($company_email, $company_name);     // Add a recipient
		      // $mail->addAddress('ellen@example.com');               // Name is optional
		      // $mail->addReplyTo('info@example.com', 'Information');
		      // $mail->addCC('cc@example.com');
		      // $mail->addBCC('bcc@example.com');

		      $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		      $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		      $mail->isHTML(true);                                  // Set email format to HTML

		      $mail->Subject = 'THANK YOU ';
		      $mail->Body    .= '<b>USERNAME : </b>'.$str.'@leaveshero.com';
		      $mail->Body    .= '<br>';
		      $mail->Body    .= '<b>Password : </b>'.$company_password;

		      $mail->AltBody = '';

		      if(!$mail->send()) {
		          echo 'Message could not be sent.';
		          echo 'Mailer Error: ' . $mail->ErrorInfo;
		      } 

		      else {
		         
		          update_status($resid, $status);
		          subscription($date,$company_id,$subscriptiontype);
	
		        }

			}
	

	
	function update_status($resid, $status)
	{
		$db = db();		
		$sql2 = "UPDATE company SET Status = ? WHERE Company_Id = ?";
		$s2 = $db->prepare($sql2);
		$s2->execute(array($status, $resid));	
		$db = null;
	}
    function ret_company_update($id)
    { 
		$db = db();
		$sql = "SELECT * FROM company WHERE Company_Id = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$user = $s->fetch();
		$db = null;
		return $user;
    }
    function subscription($date,$company_id,$subscriptiontype){
  	 $db = db();
  	 $sql = "INSERT INTO subscription(Sub_Date,Company_Id,Subscription_Type) VALUES(?,?,?)";
  	 $s = $db->prepare($sql);
 	 $s->execute(array($date,$company_id,$subscriptiontype));
 	 $db = null;
	}
	?>
	

      	


<!DOCTYPE html>
<html>
<head>
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
  <script src="assets/js/angular.min.js"></script>
  <script src="/__/firebase/5.7.0/firebase-app.js"></script>
  <script src="/__/firebase/5.7.0/firebase-auth.js"></script>
  <script src="/__/firebase/init.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
		<script src="assets/js/angular.min.js"></script>
		<script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>
	<title>Send Account</title>
</head>
<body>
<style type="text/css">
	
	#cancel{

		display: none;
	}
</style>

<div class="row" ng-app="app" ng-controller="ctrl">
	
	<form class="col sm-2"  id="registerForm" method="POST">
	<input type="text" id="Company_Name"  value="<?php echo $res['Company_Name']?>" hidden>
	<input type="text" id="Subscriber_Name" value="<?php echo $res['Subscriber_Name']?>"hidden>
	<input type="text" id="Company_Owner" value="<?php echo $res['Company_Owner']?>"hidden>
	<input type="text" id="Company_Address"  value="<?php echo $res['Company_Address']?>" hidden>
	<input type="text" id="Company_Contact" value="<?php echo $res['Company_Contact']?>"hidden>
	<input type="text" id="Company_License" value="<?php echo $res['Company_License']?>" hidden>
  <input type="text" id="Company_Email" value="<?php echo $res['Company_Email']?>"hidden >
	<input type="text" id="Branch"  value="<?php echo $res['Branch']?>"hidden>
	<input type="text" id="Username" value="<?php echo $res['Username']?>"hidden>
	<input type="text" id="Password1"  value="<?php echo $res['Password1']?>"hidden>


 
    <input type="text" id="password"    value="<?php echo $res['Password1']?>"hidden>
    <input type="email" id="email"     value="<?php  $stripped = str_replace(' ', '', $res['Company_Name']);$str=strtolower($stripped);echo  $str.'@leaveshero.com'?>"hidden>
   
    <button  id="submit" class="btn  btn-success " ng-click="login()" onclick="register()"style="float: center;margin-top: 100px;margin-left: 500px;width:300px;height: 50px;font-size: 15px">Click To Continue.....</button>

	</form>

</div>

</body>
</html>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript"src="materialize/js/materialize.js"></script>
  <script type="text/javascript"src="materialize/js/materialize.min.js"></script> 

     <script>
  
      // Initialize Firebase
    var config = {
      apiKey: "AIzaSyBHT5cgnfEyFgi2wcCBWxSwAc3AlR4Uc_s",
      authDomain: "leaveshero-12d30.firebaseapp.com",
      databaseURL: "https://leaveshero-12d30.firebaseio.com",
      projectId: "leaveshero-12d30",
      storageBucket: "leaveshero-12d30.appspot.com",
      messagingSenderId: "4790351855"
    };
    firebase.initializeApp(config);

    var db          = firebase.database();
    var member_ref  = db.ref('Subscriber');
    var users  = db.ref('Users');
	var auth        =  firebase.auth();
	  


function getFormData() {
	// body...
	 var Company_Name =$('#Company_Name').val();
	 var Subscriber_Name = $('#Subscriber_Name').val();
	 var Company_Owner = $('#Company_Owner').val();
	 var Company_Address = $('#Company_Address').val();
	 var Company_Contact = $('#Company_Contact').val();
	 var Company_Email = $('#Company_Email').val();
	 var Company_License = $('#Company_License').val();
	 var Branch = $('#Branch').val();
     var email = document.getElementById('email').value;
	 var Password1 = $('#Password1').val();
	 var status = "Active";
     var type = "Company";
     var subscriptiontype = "Free Trial";
     var profile="";
     var subdate =  new Date().toLocaleString();

      
	return{
		Company_Name :Company_Name,
		Subscriber_Name :Subscriber_Name,
		Company_Owner :Company_Owner,
		Company_Address :Company_Address,
		Company_Contact :Company_Contact,
		Company_Email :Company_Email,
		Company_License :Company_License,
		Branch  :Branch,
		Username  :email,
		Password :Password1,		
		Status :status,
		type :type,
		Subscription_Type : subscriptiontype,
		Company_profile:profile,
		Subscription_Date : subdate,

	};

}
function getuser() {
	// body...
     var email = document.getElementById('email').value;
	 var Password1 = $('#Password1').val();

     var type = "Company";
 
	return{
		Company_Id :Company_Name,
		UsersName:email,
		Password :Password1,
		Type:type,
	};

}
function addMember (event){
	event.preventDefault();
	var member =getFormData();
     var user =getuser();
	member_ref.push(member);
	users.push(user);

}
function init(){
	$("#submit").on("click",addMember);

}

//START the app
init();
 function register(){



     var email = document.getElementById('email').value;
     var password = document.getElementById('password').value;

    if (email!="" && password!="" ) {

      var promise = auth.createUserWithEmailAndPassword(email,password);
				promise.then(function(){
					
            Swal.fire({type:'success',title:'Successfully Send.............'}).then(function() {
            // Redirect the user
            window.location.href = "dashboard.php";
            console.log('The Ok Button was clicked.');
            });
				}).catch(function(){
					Swal.fire({type:'error',title:'Invalid User'});
				});
    

    }
}




</script>
