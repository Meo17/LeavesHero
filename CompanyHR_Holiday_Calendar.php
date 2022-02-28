<?php require_once 'includes/HRHoliday.php';?>
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

            var key              = childSnapshot.key;
            var name             = childSnapshot.child("Username").val();
            var companyaddress   = childSnapshot.child("Company_Address").val();
            var contact          = childSnapshot.child("Company_Contact").val();
            var email            = childSnapshot.child("Company_Email").val();
            var password         = childSnapshot.child("Password").val() ;
            var companyname      = childSnapshot.child("Company_Name").val() ;
            var Company_profile  = childSnapshot.child("Company_profile").val();
            var childData        = childSnapshot.val();
            if(Company_profile == ""){
              Company_profile = document.querySelector("#profile").src = "images/icon_user.png"; 
              Company_profile = document.querySelector("#image_upload_preview").src = "images/icon_user.png"; 
            }
          if(user.email == name){
              document.getElementById("photourl").value            =  Company_profile;
              document.getElementById("userKey").value             =  key;
              document.getElementById("companyaddress").value      =  companyaddress; 
              document.getElementById("password").value            =  password; 
              document.getElementById("companycontact").value      =  contact; 
              document.getElementById("email").value               =  email; 
              document.getElementById("user_para").innerHTML       =  companyname;
              document.querySelector('#profile').src               =  Company_profile;
              document.querySelector('#image_upload_preview').src   =  Company_profile;
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

var db                                =  firebase.database();
var update                            =  db.ref("Subscriber");
var empuserupdate                     =  db.ref("Users");
var profphoto                         =  db.ref("Subscriber");
var usercompanyid                    =     document.getElementById("userid").value;
var employeeleaverequestref          =     db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         =     db.ref("Leave_Request/"+usercompanyid);
var compholiday1                     =     db.ref('Company_Holiday/'+usercompanyid);

function calendarupdate(){

var contain =[];
            compholiday1.once("value").then(function(snapshot){
                var snapshotkey                 = snapshot.key;
            snapshot.forEach(function(childSnapshot){      
            var holidaykey1                 = childSnapshot.key;
            var End                         = childSnapshot.child("End").val();    
            var Start                       = childSnapshot.child("Start").val(); 
            var Color                       = childSnapshot.child("Color").val();  
            var Title                       = childSnapshot.child("Title").val(); 
            var eventdata                   = childSnapshot.val();
            var userid4                       =   document.getElementById('userid').value;
          var eventss;
        if(snapshotkey == userid4){
                //empe.push(holidaykey1,);
                var allevent = {
                    id       : holidaykey1,
                    title    : Title,
                    start    : Start ,
                    end      : End,
                    color    : Color,
                    description :Title,
                }
                contain.push({ 
                    id       : holidaykey1,
                    title    : Title,
                    start    : Start ,
                    end      : End,
                    color    : Color,
                    description :Title,
                    });

                     console.log(contain);
  
          var events2 = contain

           
     
        }
  
      });
setTimeout(function() {
              $('#calendar').fullCalendar('addEventSource', contain);

            }, 2000);  
   });

  
}
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
function leaveemployeecalendar(){

var contain =[];
   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
            var  key2        = childSnapshot1.key;
            var status       = childSnapshot1.child('status').val();
            var leaveType    = childSnapshot1.child('leaveType').val();
            var name         = childSnapshot1.child('name').val();
            var leaveFrom    = childSnapshot1.child('leaveFrom').val();
            var leaveuntil   = childSnapshot1.child('leaveuntil').val();
            var id           = childSnapshot1.child('id').val();
            var part3        = employeeleaverequestref2.child(key2);
             var childData   = childSnapshot1.val();
            var color ="#dee0e3";
            if(status =='approved'){  
            var allevent = {
                    id       : key2,
                    title    : name,
                    start    : leaveFrom ,
                    end      : leaveuntil,
                    color    : Color,
                    description :leaveType,
                }
                contain.push({ 
                    id       : key2,
                    title    : name,
                    start    : leaveFrom ,
                    end      : leaveuntil,
                    color    : Color,
                    description :leaveType,
                    });

                     console.log(contain);
  
          var events2 = contain

            }
            
         
          });
        setTimeout(function() {
              $('#calendar').fullCalendar('addEventSource', contain);

            }, 2000);  
        });
     });
 });

}
function employeeforceleave(){

var contain =[];
   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
            var  key2        = childSnapshot1.key;
            var status       = childSnapshot1.child('status').val();
            var leaveType    = childSnapshot1.child('leaveType').val();
            var name         = childSnapshot1.child('name').val();
            var leaveFrom    = childSnapshot1.child('leaveFrom').val();
            var leaveuntil   = childSnapshot1.child('leaveuntil').val();
            var id           = childSnapshot1.child('id').val();
            var part3        = employeeleaverequestref2.child(key2);
             var childData   = childSnapshot1.val();
            var color ="#dee0e3";
            if(status =='approved'){  
            var allevent = {
                    id       : key2,
                    title    : name,
                    start    : leaveFrom ,
                    end      : leaveuntil,
                    color    : Color,
                    description :leaveType,
                }
                contain.push({ 
                    id       : key2,
                    title    : name,
                    start    : leaveFrom ,
                    end      : leaveuntil,
                    color    : Color,
                    description :leaveType,
                    });

                     console.log(contain);
  
          var events2 = contain

            }
            
         
          });

        });
                setTimeout(function() {
              $('#calendar').fullCalendar('addEventSource', contain);

            }, 2000);  
     });
 });

}
function updateempprofile(event){
  event.preventDefault();

            var userKey                                 =  document.getElementById("userKey").value;
            var comuserskey                             =  document.getElementById("comuserskey").value;       
            
            var file                              =  document.getElementById('inputFile').value;
            var password                          =  document.getElementById("password").value;

            var updateaddress                 = document.getElementById("companyaddress").value;
            var companycontact                = document.getElementById("companycontact").value;
            var upadateemail                  = document.getElementById("email").value;

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
  function forceleavecalendar(){
  var contain =[];
  var usercompanyid                   =  document.getElementById("userKey").value;
var retrieveforceleave              =  db.ref("ForceLeave/"+usercompanyid);  
    retrieveforceleave.once('value', function(snapshot) {
      snapshot.forEach(function(childSnapshot){
      var key                    = childSnapshot.key;
 console.log(key);

  var retrieveforceleave1 = retrieveforceleave.child(key);
      retrieveforceleave1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key2                    = childSnapshot2.key;
 // console.log(key2);
 var retrieveforceleave2 = retrieveforceleave1.child(key2);
    retrieveforceleave2.once('value', function(snapshot3) {
      snapshot3.forEach(function(childSnapshot3){
      var key3                   = childSnapshot3.key;
      var dateApplied            = childSnapshot3.child('dateApplied').val();
      var leaveFrom              = childSnapshot3.child('leaveFrom').val();
      var leaveType              = childSnapshot3.child('leaveType').val();
      var leaveuntil             = childSnapshot3.child('leaveuntil').val();
      var name                   = childSnapshot3.child('name').val();
      var reason                 = childSnapshot3.child('reason').val();
      var status                 = childSnapshot3.child('status').val();
      var email                  = childSnapshot3.child('email').val();
          
           if(status =='accepted'){
            console.log(key3)
          contain.push({ 
                    id          : key3,
                    title       : name,
                    start       : leaveFrom ,
                    end         : leaveuntil,
                    color       : Color,
                    description :leaveType,
                    });

                     console.log(contain);
  
          var events2 = contain
             }
            
           });

           });
    
         });
        });
          setTimeout(function() {
              $('#calendar').fullCalendar('addEventSource', contain);

            }, 2000)
      });
    });  
}
function init(){

  $("#comedit").on("click",updateempprofile);
  employeeleaverequestref.on('child_removed',notif);
  employeeleaverequestref.on('child_changed',notif);
  notif();
  calendarupdate();
  leaveemployeecalendar();
  forceleavecalendar();
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