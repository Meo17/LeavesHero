
<?php  
session_start();
include('db.php');
if (!isset($_SESSION['username'])) {
    header("location:superadminlogin.php");
  }
  $user = $_SESSION['username'];
  $res   = ret_admin1($user);
  $ret   = ret_company();

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
 <?php require_once 'includes/SuperAdminhomepage.php'; ?>
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

    var db           = firebase.database();
    var Users        = db.ref("Users");
    var query        = db.ref("Subscription");
    var subs         = db.ref("Subscriber");
    var table        = $('#subscriber tbody');
    var table2       = $('#grantable tbody');
    var table3       = $('#declinedtable tbody');
function getsubs()

{

    query.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
            var key               = childSnapshot.key;
            var Branch            = childSnapshot.child('Branch').val();
            var Company_Address   = childSnapshot.child('Company_Address').val();
            var Company_Email     = childSnapshot.child('Company_Email').val(); 
            var Company_License   = childSnapshot.child('Company_License').val();
            var Company_Name      = childSnapshot.child('Company_Name').val();  
            var Company_Owner     = childSnapshot.child('Company_Owner').val();  
            var Company_Type      = childSnapshot.child('Company_Type').val();      
            var Subscriber_Name   = childSnapshot.child('Subscriber_Name').val(); 
            var Date_Subscribe    = childSnapshot.child('Date_Subscribe').val(); 
            var status            = childSnapshot.child('status').val();   
        
            var query2 = query.child(key);
                query2.child('supportDocs').once("value").then(function(snapshot1){
                snapshot1.forEach(function(childSnapshot1){
                  var key2              = childSnapshot1.key; 
                  var Docs              = childSnapshot1.child('Docs').val();  

                  if(status == 'Waiting for approval'){

                    table.append(
                  '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ Subscriber_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ Company_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+Company_Owner+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ Branch+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+Company_Address+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center"><button class ="view-btn btn leave glyphicon glyphicon-eye-open  btn btn-leave btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"  data-target="#viewdocs"></button></td>'+  
                  '<td style="font-size: 12px;text-align: center">'+ Date_Subscribe+'</td>'+  
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:#4d79ff"><b>'+status+'<b></p></td>'+
              '<td style="font-size: 12px;text-align: center"><button class ="grant-btn btn leave   btn btn-leave btn-hover-white btn-sm"style="font-size: 10px;width:75px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '" data-target="#grant">Grant</button><button class ="declined-btn btn leave   btn btn-leave btn-danger btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '" data-target="#decilned">Declined</button></td>'+  
                '</tr>'
                );
          var seen = {};
              $('#subscriber tr').each(function() {
                  var txt = $(this).children("td:eq(2)").text();
                  if (seen[txt])
                      $(this).remove();
                  else
                      seen[txt] = true;
              });
              }

       });
      });
    });
  });
}
function acceptedtable()

{

    query.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
            var key               = childSnapshot.key;
            var Branch            = childSnapshot.child('Branch').val();
            var Company_Address   = childSnapshot.child('Company_Address').val();
            var Company_Email     = childSnapshot.child('Company_Email').val(); 
            var Company_License   = childSnapshot.child('Company_License').val();
            var Company_Name      = childSnapshot.child('Company_Name').val();  
            var Company_Owner     = childSnapshot.child('Company_Owner').val();  
            var Company_Type      = childSnapshot.child('Company_Type').val();      
            var Subscriber_Name   = childSnapshot.child('Subscriber_Name').val(); 
            var Date_Subscribe    = childSnapshot.child('Date_Subscribe').val(); 
            var status            = childSnapshot.child('status').val();   
        
            var query2 = query.child(key);
                query2.child('supportDocs').once("value").then(function(snapshot1){
                snapshot1.forEach(function(childSnapshot1){
                  var key2              = childSnapshot1.key; 
                  var Docs              = childSnapshot1.child('Docs').val();  

                  if(status == 'Accepted'){

                    table2.append(
                  '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ Subscriber_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ Company_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+Company_Owner+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ Branch+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+Company_Address+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center"><button class ="view-btn btn leave glyphicon glyphicon-eye-open  btn btn-leave btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"  data-target="#viewdocs"></button></td>'+  
                  '<td style="font-size: 12px;text-align: center">'+ Date_Subscribe+'</td>'+  
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:green"><b>'+status+'<b></p></td>'+
              '<td style="font-size: 12px;text-align: center"><button class ="declined2-btn btn leave   btn btn-leave btn-danger btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '" data-target="#decilned2">Declined</button></td>'+  
                '</tr>'
                );
          var seen = {};
              $('#grantable tr').each(function() {
                  var txt = $(this).children("td:eq(2)").text();
                  if (seen[txt])
                      $(this).remove();
                  else
                      seen[txt] = true;
              });
              }

       });
      });
    });
  });
}
function declinedtable()

{

    query.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
            var key               = childSnapshot.key;
            var Branch            = childSnapshot.child('Branch').val();
            var Company_Address   = childSnapshot.child('Company_Address').val();
            var Company_Email     = childSnapshot.child('Company_Email').val(); 
            var Company_License   = childSnapshot.child('Company_License').val();
            var Company_Name      = childSnapshot.child('Company_Name').val();  
            var Company_Owner     = childSnapshot.child('Company_Owner').val();  
            var Company_Type      = childSnapshot.child('Company_Type').val();      
            var Subscriber_Name   = childSnapshot.child('Subscriber_Name').val(); 
            var Date_Subscribe    = childSnapshot.child('Date_Subscribe').val(); 
            var status            = childSnapshot.child('status').val();   
        
            var query2 = query.child(key);
                query2.child('supportDocs').once("value").then(function(snapshot1){
                snapshot1.forEach(function(childSnapshot1){
                  var key2              = childSnapshot1.key; 
                  var Docs              = childSnapshot1.child('Docs').val();  

                  if(status == 'Declined'){

                    table3.append(
                     '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ Subscriber_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ Company_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+Company_Owner+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ Branch+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+Company_Address+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center"><button class ="view-btn btn leave glyphicon glyphicon-eye-open  btn btn-leave btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"  data-target="#viewdocs"></button></td>'+  
                  '<td style="font-size: 12px;text-align: center">'+ Date_Subscribe+'</td>'+  
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:#4d79ff"><b>'+status+'<b></p></td>'+
              '<td style="font-size: 12px;text-align: center"><button class ="grant2-btn btn leave   btn btn-leave btn-hover-white btn-sm"style="font-size: 10px;width:70px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '" data-target="#grant2">Grant</button></td>'+  
                '</tr>'
                );
          var seen = {};
              $('#declinedtable tr').each(function() {
                  var txt = $(this).children("td:eq(2)").text();
                  if (seen[txt])
                      $(this).remove();
                  else
                      seen[txt] = true;
              });
              }

       });
      });
    });
  });
}
function grant(){
      $('#grant').on('show.bs.modal', function(e) {
       var grant = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="grantkey"]').val(grant);
        var grantkey = document.getElementById('grantkey').value;

       query.child(grantkey).once("value").then(function(snapshot){
        var name               = snapshot.child('Company_Name').val();
          document.getElementById('name').value = name;
     
      });
    });

}
function grant2(){
      $('#grant2').on('show.bs.modal', function(e) {
       var grant = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="grantkey2"]').val(grant);
        var grantkey = document.getElementById('grantkey2').value;

       query.child(grantkey).once("value").then(function(snapshot){
        var name               = snapshot.child('Company_Name').val();
          document.getElementById('name2').value = name;
     
      });
    });

}

function approvedrequest2(){


  var key     = document.getElementById('grantkey2').value;
      query.child(key).once("value").then(function(snapshot){
        var key2               = snapshot.key;
        console.log(key2);

            var key               = snapshot.key;
            var Branch            = snapshot.child('Branch').val();
            var Company_Address   = snapshot.child('Company_Address').val();
            var Company_Email     = snapshot.child('Company_Email').val(); 
            var Company_License   = snapshot.child('Company_License').val();
            var Company_Name      = snapshot.child('Company_Name').val();  
            var Company_Owner     = snapshot.child('Company_Owner').val();  
            var Company_Type      = snapshot.child('Company_Type').val();      
            var Subscriber_Name   = snapshot.child('Subscriber_Name').val(); 
            var Date_Subscribe    = snapshot.child('Date_Subscribe').val();
            var Company_Contact   = snapshot.child('Company_Contact').val(); 
            
            var companyprofile    = "";
            var status            = "Active";
            var type              = "Company";
            var Subscription_Type = "Free Trial";  

            var password     = generatePassword();
            var name = document.getElementById('name').value;
            var str          = name.split(' ').join('');


            var username     = str;
            var convert      = username.toLowerCase();
            var finaloutput  = convert +'@leaveshero.com';



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
       var uid = firebaseUser.uid ;
        console.log("User " + firebaseUser.uid + " created successfully!");



        secondaryApp.auth().signOut();

    });
 Email.send({
    SecureToken : "1ed6ef29-4325-4889-a6ab-3e8255ac7093",
    To   : Company_Email,
    From : 'leaveshero@gmail.com',
    Subject : "Employee Leave Manangement System",
    Body : "Your Login Account"+
           "Username :"+finaloutput +""+"</br>"+
           "Password :"+password+"",

});
 status1 ="Accepted";
var pay ="0"
      query.child(key).update({
        status   : status1,
        Username : finaloutput,
        Password : password,
      });
        subs.push({
            Branch            : Branch,
            Company_Address   : Company_Address,
            Company_Contact   : Company_Contact,
            Company_Email     : Company_Email,
            Company_License   : Company_License,
            Company_Name      : Company_Name,
            Company_Owner     : Company_Owner,
            Company_profile   : companyprofile,
            Password          : password,
            Status            : status,
            Subscriber_Name   : Subscriber_Name,
            Subscription_Date : Date_Subscribe,
            Subscription_Type : Subscription_Type,
            Username          : finaloutput,
            type              : type,
            Company_Type      : Company_Type,
            monthly_payment   : pay,
        });

      Users.push({
        Type            :  type,
        UsersName       :  finaloutput,
        Status          :  status,
        Password        :  password,
      });

        $('#grant2').modal('hide');
        swal({type:'success',title: "Successfully Accept Subscription!",icon: "success"}); 
        //  window.location.reload();
    });

}
function declined(){
      $('#decilned').on('show.bs.modal', function(e) {
       var dec = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="declinedkey"]').val(dec);

    });

}

function generatePassword() {
    var length = 8,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}
function approvedrequest(){


  var key     = document.getElementById('grantkey').value;
      query.child(key).once("value").then(function(snapshot){
        var key2               = snapshot.key;
        console.log(key2);

            var key               = snapshot.key;
            var Branch            = snapshot.child('Branch').val();
            var Company_Address   = snapshot.child('Company_Address').val();
            var Company_Email     = snapshot.child('Company_Email').val(); 
            var Company_License   = snapshot.child('Company_License').val();
            var Company_Name      = snapshot.child('Company_Name').val();  
            var Company_Owner     = snapshot.child('Company_Owner').val();  
            var Company_Type      = snapshot.child('Company_Type').val();      
            var Subscriber_Name   = snapshot.child('Subscriber_Name').val(); 
            var Date_Subscribe    = snapshot.child('Date_Subscribe').val();
            var Company_Contact   = snapshot.child('Company_Contact').val(); 
            
            var companyprofile    = "";
            var status            = "Active";
            var type              = "Company";
            var Subscription_Type = "Free Trial";  

            var password     = generatePassword();
            var name = document.getElementById('name').value;
            var str          = name.split(' ').join('');


            var username     = str;
            var convert      = username.toLowerCase();
            var finaloutput  = convert +'@leaveshero.com';



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
       var uid = firebaseUser.uid ;
        console.log("User " + firebaseUser.uid + " created successfully!");



        secondaryApp.auth().signOut();

    });
 Email.send({
    SecureToken : "1ed6ef29-4325-4889-a6ab-3e8255ac7093",
    To   : Company_Email,
    From : 'leaveshero@gmail.com',
    Subject : "Employee Leave Manangement System",
    Body : "Your Login Account"+
           "Username :"+finaloutput +""+"</br>"+
           "Password :"+password+"",

});
 status1 ="Accepted";
var pay ="0"
      query.child(key).update({
        status   : status1,
        Username : finaloutput,
        Password : password,
      });
        subs.push({
            Branch            : Branch,
            Company_Address   : Company_Address,
            Company_Contact   : Company_Contact,
            Company_Email     : Company_Email,
            Company_License   : Company_License,
            Company_Name      : Company_Name,
            Company_Owner     : Company_Owner,
            Company_profile   : companyprofile,
            Password          : password,
            Status            : status,
            Subscriber_Name   : Subscriber_Name,
            Subscription_Date : Date_Subscribe,
            Subscription_Type : Subscription_Type,
            Username          : finaloutput,
            type              : type,
            Company_Type      : Company_Type,
            monthly_payment   : pay,
        });

      Users.push({
        Type            :  type,
        UsersName       :  finaloutput,
        Status          :  status,
        Password        :  password,
      });

        $('#grant').modal('hide');
        swal({type:'success',title: "Successfully Accept Subscription!",icon: "success"}); 
        //  window.location.reload();
    });

}
function grantrequest(){
     var key   = document.getElementById('declinedkey').value;
     var status            = "Declined";
     query.child(key).update({status : status});
     $('#decilned').modal('hide');
       swal({type:'success',title: "Successfully Declined Subscription!",icon: "success"}); 
        //  window.location.reload();

}
function viewrequest(){
      $('#viewdocs').on('show.bs.modal', function(e) {
       var grant = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="viewkey"]').val(grant);
 
      var query2 = query.child(grant);
                query2.child('supportDocs').once("value").then(function(snapshot1){
                snapshot1.forEach(function(childSnapshot1){
                  var key2              = childSnapshot1.key; 
                  var Docs              = childSnapshot1.child('Docs').val();  
                  console.log(Docs);
        $('#subdoct').append(
                      '<a  href="'+Docs +'" download ><img id="myrequirements" style="height:100px;width:100px;padding:auto" src="'+Docs+'"></img></a>'
                      );

       });
     });
    });

}
function close(){
     $('#viewdocs').on('hidden.bs.modal', function (e) {
          $("#subdoct").empty();     
    
  }); 
}
function notif(){
var myArray;
myArray = [];
var count;
   query.once("value").then(function(snapshot){
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

function declined2(){
      $('#decilned2').on('show.bs.modal', function(e) {
       var dec = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="decilned2key"]').val(dec);
        query.once("value").then(function(snapshot){
             snapshot.forEach(function(childSnapshot){
              var key3       = childSnapshot.key;
              var Username   = childSnapshot.child('Username').val(); 
              console.log(key3);  
             var key     =  document.getElementById('decilned2key').value;
              if(key3 == key){
              document.getElementById('username').value = Username;
              console.log(Username);
              }


         });
       });
    });

}
function declinedrequest(){
     var key   = document.getElementById('decilned2key').value;
     var status            = "Declined";
     query.child(key).update({status : status});

       subs.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
        var key2               = childSnapshot.key;
        var Username           = childSnapshot.child('Username').val(); 
        var username           = document.getElementById('username').value;

            if(username == Username ){
              subs.child(key2).remove();
            }

        });
      });
       Users.once("value").then(function(snapshot1){
         snapshot1.forEach(function(childSnapshot2){
        var key3               = childSnapshot2.key;
        var Username           = childSnapshot2.child('UsersName').val(); 
        var username = document.getElementById('username').value;

            if(username == Username ){
              Users.child(key3).remove();
            }
        });
      });
     $('#decilned2').modal('hide');
     swal({type:'success',title: "Successfully Declined Subscription!",icon: "success"}); 
     //window.location.reload();
}
function init()
{
     
$("#subdoct").empty();     
    

$('#yesgrant').on("click",approvedrequest);
$('#yesdeclined').on("click",grantrequest);
$('#yesdeclined2').on("click",declinedrequest);
$('#yesgrant2').on("click",approvedrequest2);


table.on('click','button.grant-btn',grant);
table.on('click','button.declined-btn',declined);
table.on('click','button.view-btn',viewrequest);

table2.on('click','button.declined2-btn',declined2);

table3.on('click','button.grant2-btn',grant2);
table3.on('click','button.delete-btn',declined2);

query.on('child_removed',getsubs);
query.on('child_changed',getsubs);

query.on('child_removed',acceptedtable);
query.on('child_changed',acceptedtable);

query.on('child_removed',declinedtable);
query.on('child_changed',declinedtable);


getsubs();
close();
notif();
reload_notif();
acceptedtable();
declinedtable();

}
function reload_notif(){
   window.setInterval(notif, 1000);
}
function reload_getsubs(){
   window.setInterval(getsubs, 1000);
}
init();



 </script>
