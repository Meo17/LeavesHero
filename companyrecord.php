<?php  
session_start();
 
include('db.php');
if (!isset($_SESSION['username'])) {
    header("location:index.php");
  }
  $user = $_SESSION['username'];
  $res = ret_admin1($user);
  
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
 <?php require_once 'includes/CompanyRecord.php'; ?>
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

    var db      = firebase.database();
    var Users   = db.ref("Users");
    var query   = db.ref("Subscription");
    var table   = $('#subscriber tbody');


 

function getsubs()

{
       // table.empty();
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
                   console.log(key);
                    table.append(
                  '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ Subscriber_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ Company_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+Company_Owner+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ Branch+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+Company_Address+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center"><button class ="view-btn btn leave glyphicon glyphicon-eye-open  btn btn-leave btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"  data-target="#viewdocs"></button></td>'+  
                  '<td style="font-size: 12px;text-align: center">'+ Date_Subscribe+'</td>'+  
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:red"><b>'+status+'<b></p></td>'+
              '<td style="font-size: 12px;text-align: center"><button class ="declined-btn btn leave   btn btn-leave btn-danger btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '" data-target="#decilned">Deactivate</button></td>'+  
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

function declined(){
      $('#decilned').on('show.bs.modal', function(e) {
       var dec = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="declinedkey"]').val(dec);

    query.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
        var key3       = childSnapshot.key;
        var Username   = childSnapshot.child('Username').val(); 
          console.log(key3);  
       var key     =  document.getElementById('declinedkey').value;
          if(key3 == key){
          document.getElementById('Username').value = Username;
          console.log(Username);
          }


     });
   });
 });
}
function grantrequest(){
     var key               = document.getElementById('declinedkey').value;
     var status            = "deactivate";
     query.child(key).update({status : status});

     var db    = firebase.database();
     var subs  = db.ref('Subscriber');


       subs.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
        var key2               = childSnapshot.key;
        var Username           = childSnapshot.child('Username').val(); 
        var username           = document.getElementById('Username').value;

            if(username == Username ){
              subs.child(key2).update({
                       Status  : status,
                    });
            }

        });
      });
     
       Users.once("value").then(function(snapshot1){
         snapshot1.forEach(function(childSnapshot2){
        var key3               = childSnapshot2.key;
        var Username           = childSnapshot2.child('UsersName').val(); 
        var username = document.getElementById('Username').value;

            if(username == Username ){
              Users.child(key3).remove();
            }
        });
      });
     

        $('#decilned').modal('hide');
        swal({type:'info',title: "Deactivate User  !",icon: "info"}); 

  
reload_getsubs();
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
$(document).ready(function(){
     $('#viewdocs').on('hidden.bs.modal', function (e) {
          $("#subdoct").empty();     
    
   }); 
  }); 
}
function notif(){
var myArray;
myArray = [];
var count;
   query.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
             var key2            = childSnapshot.key; 
            var status           = childSnapshot.child('status').val();   
            if(status =='Waiting for approval'){  
              myArray.push(key2);
              console.log(myArray)
              count =  myArray.length;
              console.log(count);
              document.getElementById('count').innerHTML = count;
              if(count == 0){
                $('#badge1').hide();
              }
            }
          });
      });

}
function init()
{

    $('#console').on("click",close);
    $('#yesdeclined').on("click",grantrequest);
   
    table.on('click','button.declined-btn',declined);
    table.on('click','button.view-btn',viewrequest);

    query.on('child_removed',getsubs);
    query.on('child_changed',getsubs);
    
    getsubs();
  
     notif();
    reload_notif();
    reload_getsubs();
}
function reload_notif(){
   window.setInterval(notif, 1000);
}
function reload_getsubs(){
   window.setInterval(getsubs, 1000);
}
init();

 </script>