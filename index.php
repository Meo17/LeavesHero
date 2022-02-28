<?php  require'includes/LeavesHero.php';?>
<script type="text/javascript">
 var firebaseConfig = {
    apiKey: "AIzaSyCsHkJI5LjRN-WtQmwZxxFthT8EfRmjUOA",
    authDomain: "leaveshero42-37675.firebaseapp.com",
    databaseURL: "https://leaveshero42-37675.firebaseio.com",
    projectId: "leaveshero42-37675",
    storageBucket: "leaveshero42-37675.appspot.com",
    messagingSenderId: "1030314531552",
    appId: "1:1030314531552:web:5fe385f4488ca974864e85"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);



   var db                                 =  firebase.database();
   var subscription                       =  db.ref("Subscriber");
   var Users        = db.ref("Users");

function generatePassword() {
    var length = 8,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}
function addSubs (event){
  event.preventDefault();

            var branch                 =  $('#branch').val();
            var emailaddress           =  $('#emailaddress').val();
            var companyname            =  $('#companyname').val();
            var owner                  =  $('#owner').val();
            var subscibername          =  $('#subscibername').val();
            var address                =  $('#address').val();
            var registrationno         =  $('#registrationno').val();
            var contactno              =  $('#contactno').val();

            var status                 = "Active";
            var typecompany            =  document.getElementById('typecompany') ;
            var typecompany            =  typecompany[typecompany.selectedIndex].value;
            var supportDocs            = $("#supportDocs1")[0].files.length;
            var inpFile                = document.getElementById('supportDocs1');

            var type                   = "Company";
            var Subscription_Type      = "Free Trial";  

            var password               = generatePassword();
            var name                   = document.getElementById('companyname').value;
            var str                    = name.split(' ').join('');


            var username               = str;
            var convert                = username.toLowerCase();
            var finaloutput            = convert +'@leaveshero.com';



var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time; 

var config4 = {
    apiKey: "AIzaSyCsHkJI5LjRN-WtQmwZxxFthT8EfRmjUOA",
    authDomain: "leaveshero42-37675.firebaseapp.com",
    databaseURL: "https://leaveshero42-37675.firebaseio.com",
    projectId: "leaveshero42-37675",
    storageBucket: "leaveshero42-37675.appspot.com",
    messagingSenderId: "1030314531552",
    appId: "1:1030314531552:web:5fe385f4488ca974864e85"

    };

var secondaryApp                          =  firebase.initializeApp(config4, "Secondary");

    secondaryApp.auth().createUserWithEmailAndPassword(finaloutput, password).then(function(firebaseUser) {
       var firebaseUser = firebase.auth().currentUser;
       //var uid = firebaseUser.uid ;
        console.log("User " + firebaseUser.uid + " created successfully!");



        secondaryApp.auth().signOut();

    });

Email.send({
    SecureToken : "9d8f01f1-c539-4e0b-901b-8831c5021042",
    To   : emailaddress,
    From : 'leaveshero@gmail.com',
    Subject : "Employee Leave Manangement System",
    Body : "Your Login Account"+
           "Username :"+finaloutput +""+"</br>"+
           "Password :"+password+"",

});
var companyprofile ="";
var pay ="0";
    var newdata = {       
                Branch            : branch,
                Company_Address   : address,
                Company_Contact   : contactno,
                Company_Email     : emailaddress,
                Company_License   : registrationno,
                Company_Name      : companyname,
                Company_Owner     : owner,
                Company_profile   : companyprofile,
                Password          : password,
                Status            : status,
                Subscriber_Name   : subscibername,
                Subscription_Date : dateTime,
                Subscription_Type : Subscription_Type,
                Username          : finaloutput,
                type              : type,
                Company_Type      : typecompany,
                monthly_payment   : pay,
         };
          subscription.push(newdata);

      Users.push({
        Type            :  type,
        UsersName       :  finaloutput,
        Status          :  status,
        Password        :  password,
      });
        subscription.once("value").then(function(snapshot){  
          snapshot.forEach(function(childSnapshot){
           var key                             =  childSnapshot.key;
           document.getElementById("uploadkey").value = key; 

         });
       }); 
     if($("#supportDocs").val() !="" ){
   $('#myModalSubscribe').modal({
              backdrop: 'static'
            });
      for (var i = 0; i < inpFile.files.length; i++) {
           
        var imageFile = inpFile.files[i];
        uploadImageAsPromise(imageFile);

        function uploadImageAsPromise (imageFile) {
            return new Promise(function (resolve, reject) {
             var storageRef = firebase.storage().ref("SupportDocs/"+imageFile.name);   
             var task       = storageRef.put(imageFile);
             task.then(snap=>{

                var pairkey                 = document.getElementById("uploadkey").value;
                var subscription2           = subscription.child(pairkey);
                storageRef.getDownloadURL().then(function(url) {
                  subscription2.child("supportDocs").push({
                        Docs : url,
                     });

                      //Update progress bar
                      task.on('state_changed',
                        function progress(snapshot){

                            var percentage = snapshot.bytesTransferred / snapshot.totalBytes * 100;
                            console.log(percentage +"%");
                        },
                        function error(err){
                          console.log("Something Wrong while Uploading");
                        },
                        function complete(){
                            var downloadURL = task.snapshot.downloadURL;
                             console.log("Done!");

                              $("#myModalSubscribe").modal("hide");
                             swal({type:'success',title: "Your Subscription Form Successfully Send! Please wait for our cofirmation we will email you for your official account",icon: "success",});
                             
                        }
                      );
   
              });
              });
            });

        }

    }

  }else{

   swal({type:'error',title: "Please fill in required  fields!",icon: "error"});

  }


}

function login(event){
    event.preventDefault();

       var email = $('#username').val();
       var pass = $('#pwd').val();


   firebase.auth().signInWithEmailAndPassword(email, pass)
      .catch(function(error) {
    // Handle Errors here.
                swal({type:'error',title: "Invalid Username or Password !",icon: "error",});

     });

   firebase.auth().onAuthStateChanged(function(user) {
 // $("#myModalLogIn").modal("hide");
      var user = firebase.auth().currentUser;
      var query = firebase.database().ref("Users").orderByKey();
       query.once("value").then(function(snapshot){

         snapshot.forEach(function(childSnapshot){

            var key              = childSnapshot.key;
            var name             = childSnapshot.child("UsersName").val();
            var type             = childSnapshot.child("Type").val();
            var password         = childSnapshot.child("Password").val();
            var childData        = childSnapshot.val();

          if(user.email == name && type=="Company"){
            $("#myModalLogIn").modal("hide");

                  swal({
                    type:'success',
                    title: "Login Accepted !",
                    icon: "success",
                    },function(){
                       window.location.href = "companydashboard.php";
                       console.log('The Ok Button was clicked.');
       
                     });

          }
      else if(user.email == name && type=="Employee"){
              $("#myModalLogIn").modal("hide");
              swal({
                    type :'success',
                    title: "Login Accepted !",
                    icon: "success",
                  },function(){
                   window.location.href = "companyemployeedashboard.php";
                   
                  });
              var empuid  =user.uid;
            query.child(key).push({
              Emp_UID :empuid,
            })
          }

      });
    });

    });


  
}

function init(){

  $('#subscribe').on("click",addSubs);

  $('#login').on("click",login);


}
init();



</script>

 <?php
       
 require 'phpmailer/PHPMailerAutoload.php';

if(isset($_POST["feedback"])) {
          

      
          $email1             =     trim($_POST['customeremail']);   
          $feedback           =     trim($_POST['feedbacksugggest']);   
          $mail               =     new PHPMailer;

          $mail->SMTPDebug    =    0;                             

          $mail->isSMTP();                                      
          $mail->Host         =   'smtp.gmail.com';
          $mail->SMTPAuth     =    true;                               
          $mail->Username     =   'leaveshero@gmail.com';  
          $recipient          =   $mail->Username;           
          $mail->Password     =   'capstone42';                           
          $mail->SMTPSecure   =   'ssl';                            
          $mail->Port         =    465 ;                                    

          $mail->setFrom($email1);
          $mail->addAddress($recipient,'cUSTOMER FEEDBACK');     // Add a recipient

          $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
          $mail->isHTML(true);                                  // Set email format to HTML

          $mail->Subject  = 'Feedback ';
          $mail->Body     .= '<b>Feedback Or Sugesstion  : </b>'.$feedback  ;
       

          $mail->AltBody = '';   
              echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("Successfully Send!","Thank You for giving us a feedback or suggestion","success");';
              echo '}, 10);</script>';
          if(!$mail->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
          } 

  


          }
?>
