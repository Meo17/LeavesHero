<?php  
session_start();
 
include('db.php');
if (!isset($_SESSION['username'])) {
    header("location:index.php");
  }
  $user = $_SESSION['username'];
  $res = ret_admin1($user);
  $ret  = ret_company();
  $count = countcsub($user);
  $sub   = ret_subscription_company($user);
  $Billinginformation   = ret_billing_company($user);
  
 ?>

 <?php
 function ret_admin1($user){
  $db = db(); 
  $sql = "SELECT * FROM  superadmin WHERE username='$user'";
  $s = $db->query($sql);
  $user = $s->fetchAll();
  $db = null;
  return $user;
 }
 ?>
 <?php require_once 'includes/Billinginformation.php'; ?>

<?php
function countcsub($user){
  $db = db(); 
  $sql = "SELECT COUNT(*) as count from company WHERE  status = 'Waiting for approval'";
  $s = $db->query($sql);
  $user = $s->fetchColumn();
  $db = null;
  return $user;
}

function ret_subscription_company($user){
  $db = db(); 
  $sql = "SELECT  * from subscription s JOIN company c on s.Company_Id = c.Company_Id WHERE  Status = 'Verified'";
  $s = $db->query($sql);
  $user = $s->fetchAll();
  $db = null;
  return $user;
}
function ret_billing_company($user){
  $db = db(); 
  $sql = "SELECT  * from subscription s INNER JOIN company c on s.Company_Id = c.Company_Id WHERE  c.Status = 'Verified'";
  $s = $db->query($sql);
  $user = $s->fetchAll();
  $db = null;
  return $user;
}

?>
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
    var db                   = firebase.database();
    var Users                = db.ref("Users");
    var query                = db.ref("Company_Billing");
    var subs                 = db.ref("Subscriber");
    var query2               = db.ref("Subscription");
    var table                = $('#paymenthistory tbody');
    var table2               = $('#accepttable tbody');


function gepayments()

{

    query.once("value").then(function(snapshot){
      snapshot.forEach(function(childSnapshot){
      var key               = childSnapshot.key;
      var query2            = query.child(key);

       query2.once("value").then(function(snapshot2){
         snapshot2.forEach(function(childSnapshot1){
         var key1                 = childSnapshot1.key;
         var Username             = childSnapshot1.child('Username').val();
         var Payment_Type         = childSnapshot1.child('Payment_Type').val();
         var datepay              = childSnapshot1.child('datepay').val();
         var status1               = childSnapshot1.child('status').val();
        subs.once("value").then(function(snapshot3){
         snapshot3.forEach(function(childSnapshot2){
            var key2              = childSnapshot2.key;
            var Branch            = childSnapshot2.child('Branch').val();
            var Company_Address   = childSnapshot2.child('Company_Address').val();
            var Company_Contact   = childSnapshot2.child('Company_Contact').val();
            var Company_Email     = childSnapshot2.child('Company_Email').val(); 
            var Company_License   = childSnapshot2.child('Company_License').val();
            var Company_Name      = childSnapshot2.child('Company_Name').val();  
            var Company_Owner     = childSnapshot2.child('Company_Owner').val();  
            var Company_Type      = childSnapshot2.child('Company_Type').val();      
            var Subscriber_Name   = childSnapshot2.child('Subscriber_Name').val();
            var Date_Subscribe    = childSnapshot2.child('Date_Subscribe').val(); 
            var Subscription_Type = childSnapshot2.child('Subscription_Type').val(); 
            var monthly_payment   = childSnapshot2.child('monthly_payment').val(); 
            var username          = childSnapshot2.child('Username').val(); 
            var status            = childSnapshot2.child('status').val();   

                  if(Subscription_Type == 'Subscriber' && username == Username && status1 =='sent'){
      
                    table.append(
                  '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ Company_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ Subscriber_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+Company_Contact+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ Company_Address+'</td>'+
                  '<td style="font-size: 12px;text-align: center;word-wrap: break-word;">'+Company_Email+'</td>'+   
                  '<td style="font-size: 12px;text-align: center">'+ Company_License+'</td>'+ 
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:#4d79ff"><b>'+datepay+'<b></p></td>'+
                     '<td style="font-size: 12px;text-align: center">'+ monthly_payment+'</td>'+  

              '<td style="font-size: 12px;text-align: center"><button class ="accept3-btn btn leave   btn btn-leave btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key1 + '" data-toggle="modal" data-id="'+ key1 + '" data-target="#acceptpay">Accept</button></td>'+  
                '</tr>'
                );

              }

         });
        });
       });
      });
    });
    });
}

function geacceptedpayment()

{

    query.once("value").then(function(snapshot){
      snapshot.forEach(function(childSnapshot){
      var key               = childSnapshot.key;
      var query2            = query.child(key);

       query2.once("value").then(function(snapshot2){
         snapshot2.forEach(function(childSnapshot1){
         var key1                 = childSnapshot1.key;
         var Username             = childSnapshot1.child('Username').val();
         var Payment_Type         = childSnapshot1.child('Payment_Type').val();
         var datepay              = childSnapshot1.child('datepay').val();
         var status1               = childSnapshot1.child('status').val();
        subs.once("value").then(function(snapshot3){
         snapshot3.forEach(function(childSnapshot2){
            var key2              = childSnapshot2.key;
            var Branch            = childSnapshot2.child('Branch').val();
            var Company_Address   = childSnapshot2.child('Company_Address').val();
            var Company_Contact   = childSnapshot2.child('Company_Contact').val();
            var Company_Email     = childSnapshot2.child('Company_Email').val(); 
            var Company_License   = childSnapshot2.child('Company_License').val();
            var Company_Name      = childSnapshot2.child('Company_Name').val();  
            var Company_Owner     = childSnapshot2.child('Company_Owner').val();  
            var Company_Type      = childSnapshot2.child('Company_Type').val();      
            var Subscriber_Name   = childSnapshot2.child('Subscriber_Name').val();
            var Date_Subscribe    = childSnapshot2.child('Date_Subscribe').val(); 
            var Subscription_Type = childSnapshot2.child('Subscription_Type').val(); 
            var monthly_payment   = childSnapshot2.child('monthly_payment').val(); 
            var username          = childSnapshot2.child('Username').val(); 
            var status            = childSnapshot2.child('status').val();   

            if(Subscription_Type == 'Subscriber' && status1 =='confirm'){

                    
                table2.append(
                  '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ Company_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ Subscriber_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+Company_Contact+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ Company_Address+'</td>'+
                  '<td style="font-size: 12px;text-align: center;word-wrap: break-word;">'+Company_Email+'</td>'+   
                  '<td style="font-size: 12px;text-align: center">'+ Company_License+'</td>'+ 
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:#4d79ff"><b>'+datepay+'<b></p></td>'+
                     '<td style="font-size: 12px;text-align: center">'+ monthly_payment+'</td>'+  
 
                '</tr>'
                );
  
              }

         });
        });
       });
      });
    });
    });
}

function notif(){
var myArray;
myArray = [];
var count;
   query2.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
             var key2            = childSnapshot.key; 
            var status            = childSnapshot.child('status').val();   
            if(status =='Waiting for approval'){  
              myArray.push(key2);
  
              count =  myArray.length;
  
              document.getElementById('count').innerHTML = count;
              if(count == 0){
                $('#badge1').hide();
              }
            }
          });
      });

}
function appecmodal(){
      $('#acceptpay').on('show.bs.modal', function(e) {
       var dec = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="accepteky"]').val(dec);
        console.log(dec);
   
 });
}
function accpetpayment(){


    query.once("value").then(function(snapshot){
      snapshot.forEach(function(childSnapshot){
      var key               = childSnapshot.key;
      var query2            = query.child(key);

       query2.once("value").then(function(snapshot2){
         snapshot2.forEach(function(childSnapshot1){
          var key3  = childSnapshot1.key;

          var key2  = document.getElementById('accepteky').value ;
          var stat ="confirm";
          if(key3  == key2 ){

            query2.child(key3).update({status :stat});
            $('#acceptpay').modal('hide');
            swal({type:'success',title: "Successfully Confirm!",icon: "success"}); 
            window.location.reload();
          }
         });
       });
     });
    });
}
function init()
{
    
$("#yesaccept").on("click",accpetpayment)
table.on('click','button.accept3-btn ',appecmodal);

query.on('child_removed',gepayments);
query.on('child_changed',gepayments);


geacceptedpayment();
gepayments();
close();
notif();
reload_notif();
}
function reload_notif(){
   window.setInterval(notif, 1000);
}
function reload_getsubs(){
   window.setInterval(getsubs, 1000);
}
init();



 </script>

