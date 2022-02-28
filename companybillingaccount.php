<?php require_once 'includes/HRBillingPage.php';?>
 
   <script >
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



firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    var user = firebase.auth().currentUser;
    var query = firebase.database().ref("Subscriber").orderByKey();
    query.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){

            var key                = childSnapshot.key;
            var name               = childSnapshot.child("Username").val();
            var companyaddress     = childSnapshot.child("Company_Address").val();
            var contact            = childSnapshot.child("Company_Contact").val();
            var email              = childSnapshot.child("Company_Email").val();
            var password           = childSnapshot.child("Password").val() ;
            var companyname        = childSnapshot.child("Company_Name").val() ;
            var Company_profile    = childSnapshot.child("Company_profile").val();
            var start              = childSnapshot.child("Subscription_Date").val();
            var Subscriber_Name    = childSnapshot.child("Subscriber_Name").val();
            var childData          = childSnapshot.val();
            if(Company_profile == ""){
              Company_profile = document.querySelector("#profile").src              = "images/icon_user.png"; 
              Company_profile = document.querySelector("#image_upload_preview").src = "images/icon_user.png"; 
            }
              var date1, date2;
                  date1 = new Date(start);
                  date2 = new Date();
                    var res = Math.abs(date1 - date2) / 1000;
                  var days = Math.floor(res / 86400);
          if(user.email == name){
              document.getElementById("Subscription_Date").value    =  days;
              document.getElementById("photourl").value             =  Company_profile;
              document.getElementById("userKey").value              =  key;
              document.getElementById("companyaddress").value       =  companyaddress; 
              document.getElementById("password").value             =  password; 
              document.getElementById("companycontact").value       =  contact; 
              document.getElementById("email").value                =  email; 
              document.getElementById("user_para").innerHTML        =  companyname;
              document.querySelector('#profile').src                =  Company_profile;
              document.querySelector('#image_upload_preview').src   =  Company_profile;
              document.getElementById("login_email").value          =  name; 
              document.getElementById("subkey").value               =  key; 
              document.getElementById("subscribername").value       =  Subscriber_Name; 
              var remain = document.getElementById("Subscription_Date").value;

              if(remain > 30){
                 document.getElementById("Remaining").innerHTML       =  "0";
                 document.getElementById("payment").innerHTML         =  "P 450.00";
              }else{
                  document.getElementById("payment").innerHTML        =  "Free Trial";
                  var freetrialfee = 30;
                  parseInt(freetrialfee);
                  var diffday  = freetrialfee - days;
                  document.getElementById("Remaining").innerHTML      =  diffday;
                  // if(diffday == 0){
                  //          var users = firebase.database().ref("Users").orderByKey();
                  //         users.once("value").then(function(snapshot){
                  //              snapshot.forEach(function(childSnapshot){
                  //                     var keyr  = childSnapshot.key;
                  //                     var UsersName              = childSnapshot.child("UsersName").val();
                  //                       var usernamelog = document.getElementById("userid").value;
                  //                       var stat ="Deactivate";
                  //                        // if(usernamelog = UsersName ){

                  //                        //          users.child(keyr).update({
                  //                        //             Status :stat;
                  //                        //          })
                  //                        // }
                  //              });  
                  //            });
                  // }
              }
          }
           var query1 = firebase.database().ref("Users").orderByKey();
          query1.once("value").then(function(snapshot1){
           snapshot1.forEach(function(childSnapshot1){  
            var key1              = childSnapshot1.key;
            var name1             = childSnapshot1.child("UsersName").val();
            var password1         = childSnapshot1 .child("Password").val();

            if(user.email == name1){
                document.getElementById("comuserskey").value             =  key1;
            }
          });
       });
      });
    });

    if(user != null ){

      var email_id = user.email;
      var user_id = user.uid;
      document.getElementById("userid").value =  user_id;
     // document.getElementById("user_para").innerHTML =  email_id;
      

    }

  } else {
    // No user is signed in.


  }
var userKey                           =  document.getElementById("userKey").value;
var comuserskey                       =  document.getElementById("comuserskey").value;
var db                                =  firebase.database();
var update                            =  db.ref("Subscriber/"+userKey);
var empuserupdate                     =  db.ref("Users/"+comuserskey);
var profphoto                         =  db.ref("Subscriber/"+userKey);
var usercompanyid                     =     document.getElementById("userid").value;
var employeeleaverequestref           = db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1          = db.ref("Leave_Request/"+usercompanyid);
var compholiday1                      = db.ref('Company_Holiday/'+usercompanyid);
var ballingaccount                    = db.ref('Company_Billing/'+usercompanyid);
var paymenthistoryref                 = db.ref('Company_Billing/'+usercompanyid);
var table                             = $('#paymenthistory tbody')

function notif(){
var myArray;
myArray = [];
var count;
   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
            var  key2        = childSnapshot1.key;
            var status       = childSnapshot1.child('status').val();
            var leaveType    = childSnapshot1.child('leaveType').val();
            var id           = childSnapshot1.child('id').val();
            var part3        = employeeleaverequestref2.child(key2);
             var childData   = childSnapshot1.val();

            if(status =='waiting for approval'){  
              myArray.push(key2);
            
              count =  myArray.length;
              document.getElementById('count').innerHTML = count;
              if(count == 0){
                $('#badge1').hide();
              }

            }
            
         
          });
        });
     });
 });

}
function updateempprofile(event){
  event.preventDefault();

            var userKey            = document.getElementById("userKey").value;
            var comuserskey        = document.getElementById("comuserskey").value;       
            
            var file               = document.getElementById('inputFile').value;
            var password           = document.getElementById("password").value;

            var updateaddress      = document.getElementById("companyaddress").value;
            var companycontact     = document.getElementById("companycontact").value;
            var upadateemail       = document.getElementById("email").value;

             var storage           = firebase.storage();
             var picurl            = document.getElementById('photourl').value;
             var vidFileLength     = $("#inputFile")[0].files.length;
             var inpFile           = document.getElementById('inputFile');


        if(picurl ==""){

          
            update.child(userKey).update({
             Company_Email                      :            upadateemail,
             Company_Address                    :            updateaddress,
             Password                           :            password,
             Company_Contact                    :            companycontact,   
            });
              
            empuserupdate.child(comuserskey).update({
              Password : password,
            });
         for (var i = 0; i < inpFile.files.length; i++) {
                var imageFile = inpFile.files[i];

          uploadImageAsPromise(imageFile);

          function uploadImageAsPromise (imageFile) {
            return new Promise(function (resolve, reject) {
                var storageRef = firebase.storage().ref("profile/"+imageFile.name);   
                    var task = storageRef.put(imageFile);
                    console.log(task);
                    task.then(snap=>{

                  
                    storageRef.getDownloadURL().then(function(url) {
 
                    profphoto.child(userKey).update({
                       Company_profile                 :            url,
                       });
                    
                     }); 
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
                            
                              $("#myModal").modal("hide");

                        }
                      );
                 });
               }
             } 
          }
          if(vidFileLength == 0){

            update.child(userKey).update({
             Company_Email                      :            upadateemail,
             Company_Address                    :            updateaddress,
             Password                           :            password,
             Company_Contact                    :            companycontact,   
            });
              
            empuserupdate.child(comuserskey).update({
              Password : password,
            });
            $("#myModal").modal("hide");
          }
         else if( $("#inputFile").val() !=""){

         for (var i = 0; i < inpFile.files.length; i++) {
                var imageFile = inpFile.files[i];

          uploadImageAsPromise(imageFile);

          function uploadImageAsPromise (imageFile) {
            return new Promise(function (resolve, reject) {
                var storageRef = firebase.storage().ref("profile/"+imageFile.name);   
                    var task = storageRef.put(imageFile);
                    console.log(task);
                    task.then(snap=>{

                  
                    storageRef.getDownloadURL().then(function(url) {
 
                    profphoto.child(userKey).update({
                       Company_profile                 :            url,
                       });
                    
                     }); 
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
                            
                              $("#myModal").modal("hide");

                        }
                      );
                 });
               }
             } 
         }
       
  }
function billingpay(){
var db1                        =  firebase.database();
var subkey                     =     document.getElementById("subkey").value;
var querywewe                  = db1.ref("Subscriber/"+subkey);
    var cardname               = $('#cardname').val();
    var cardnumber             = $('#cardnumber').val();
    var cvc                    = $('#cvc').val();
    var expirationmonth        = $('#expirationmonth').val();
    var year                   = $('#year').val();
    var status                 = "Monthly pay";
    var price                  = 450.00;
var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time; 

    var status               = "sent";
    var PaymentType          = "Premium  Subcription";
    var emaillog   = document.getElementById('login_email').value;

    ballingaccount.push({

             cardname         : cardname,
             cardnumber       : cardnumber,
             cvc              : cvc,
             expirationmonth  : expirationmonth,
             year             : year,
             status           : status,
             Price            : price,
             Username         : emaillog,
             datepay          : dateTime,
             status           : status,
             Payment_Type     : PaymentType,



    });
    swal({type:'success',title: "Successfully Sent  !",icon: "success"}); 
 var subscription_type  = "Subscriber";
  querywewe.update({Subscription_Type :subscription_type,monthly_payment : price});
  $('#cardname').val('');
  $('#cardnumber').val('');
  $('#cvc').val('');
  $('#expirationmonth').val('');
  $('#year').val('');
  window.location.reload();


}

function getpaymenthistory()

{
  table.empty();
    var query = firebase.database().ref("Subscriber").orderByKey();
    query.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
         var name               = childSnapshot.child("Username").val();
         var Subscriber_Name    = childSnapshot.child("Subscriber_Name").val();
         var Company_Contact    = childSnapshot.child("Company_Contact").val();
         var Subscription_Type  = childSnapshot.child("Subscription_Type").val();


         paymenthistoryref.once("value").then(function(snapshot1){
         snapshot1.forEach(function(childSnapshot1){
            var key               = childSnapshot1.key;
            var datepay           = childSnapshot1.child('datepay').val();
            var status            = childSnapshot1.child('status').val();   
            var Username          = childSnapshot1.child('Username').val(); 
            var PaymentType       = childSnapshot1.child('Payment_Type').val(); 
            var Price             = childSnapshot1.child('Price').val(); 
            

            var date1, date2;
            date1     = new Date(datepay);
            date2     = new Date();
            var res   = Math.abs(date1 - date2) / 1000;
            var days  = Math.floor(res / 86400);    
            var remaindays  = 30 - days;
          if(status == 'sent' && Username == name && Subscription_Type =="Subscriber") {
                   console.log(key);
              table.append(
                  '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ Subscriber_Name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ datepay+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ PaymentType+'</td>'+
                  '<td style="font-size: 12px;text-align: center;color:green">'+status+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center;color:blue">'+Price+'</td>'+ 
              '<td style="font-size: 12px;text-align: center"><button class ="declined-btn btn leave   btn btn-leave btn-danger btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '" data-target="#cancelsubcription">Cancel Subcription</button></td>'+  
                '</tr>'
                );
    
             /// $("#paymentcontent").hide(); 
                 document.getElementById("Remaining").innerHTML       =  "";
                 document.getElementById("payment").innerHTML         =  PaymentType;
              }
    
       });
      });
    });
  });      
}
function cancelsub(){
      $('#cancelsubcription').on('show.bs.modal', function(e) {
       var dec = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="cancelkey"]').val(dec);

    paymenthistoryref.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
        var key3       = childSnapshot.key;
        var Username   = childSnapshot.child('Username').val(); 
          console.log(key3);  
       var key     =  document.getElementById('cancelkey').value;
          if(key3 == key){
          document.getElementById('Username').value = Username;
          console.log(Username);
          }


     });
   });
 });
}
function remove(){
 var key     =  document.getElementById('cancelkey').value; 
 paymenthistoryref.child(key).remove();
$('#cancelsubcription').modal('hide');
swal({type:'success',title: "Successfully Cancel!",icon: "success"}); 

}
function init(){

  $('#yescancel').on("click",remove);
  $("#comedit").on("click",updateempprofile);
  $('#paymentyou').on("click",billingpay);

  table.on('click','button.declined-btn ',cancelsub);

  paymenthistoryref.on('child_removed',getpaymenthistory);
  paymenthistoryref.on('child_changed',getpaymenthistory);


  notif();
  reload_notif();
  getpaymenthistory();
}
init(); 
function reload_notif(){
   window.setInterval(notif, 1000);
}
});
  function logout(){
    firebase.auth().signOut().then(function() {
       window.location.href = "index.php";
      console.log('Signed Out');
    }, function(error) {
      console.error('Sign Out Error', error);

    });

  }

</script>