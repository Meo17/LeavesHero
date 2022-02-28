<?php require_once 'includes/ApplicationFormPage.php'?>
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
              Company_profile = document.querySelector("#profile").src              = "images/icon_user.png"; 
              Company_profile = document.querySelector("#image_upload_preview").src = "images/icon_user.png"; 
            }
          if(user.email == name){

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

    }

  } else {
  window.location.href = "index.php";


  }

/////////////////////////////////////////START/////////////////////////////////////////////////////
var usercompanyid                    　=  document.getElementById("userid").value;
var db                               　=  firebase.database();
var employeeleaverequestref          　=  db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         　=  db.ref("Leave_Request/"+usercompanyid);
var Leave_Request_Employee           　=  db.ref("Leave_Request_Employee/"+usercompanyid);
var Leave_Request_Employee1           =  db.ref("Leave_Request_Employee/"+usercompanyid);
var employeeref                      　=  db.ref("Employee/"+usercompanyid);
var pendingtable                     　=  $('#Pending tbody');
var acceptedtable                    　=  $('#Accepted tbody');
var rejectedtable                    　=  $('#Rejected tbody');
var subdoc                           　=  $('#subdoct tbody');

var update                            =  db.ref("Subscriber");
var empuserupdate                     =  db.ref("Users");
var profphoto                         =  db.ref("Subscriber");
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
function getpending(){

  var employeeref1 = employeeref;
      employeeref1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key3                   = childSnapshot2.key;
      var empid                  = childSnapshot2.child('Employee_Id').val();
      var Employee_FirstName     = childSnapshot2.child('Employee_FirstName').val();
      var Employee_LastName      = childSnapshot2.child('Employee_LastName').val();
      var Employee_MiddleInitial = childSnapshot2.child('Employee_MiddleInitial').val();
      var Employee_Suffix        = childSnapshot2.child('Employee_Suffix').val();
          
   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2        = childSnapshot1.key;
           var status      = childSnapshot1.child('status').val();
           var leaveType   = childSnapshot1.child('leaveType').val();
           var reason      = childSnapshot1.child('reason').val();
           var duration    = childSnapshot1.child('duration').val();
           var dateApplied = childSnapshot1.child('dateApplied').val();
           var leaveuntil  = childSnapshot1.child('leaveuntil').val();
           var leaveFrom   = childSnapshot1.child('leaveFrom').val();
           var count       = childSnapshot1.child('count').val();
           var id          = childSnapshot1.child('id').val();
           if(Employee_Suffix =="-"){
            Employee_Suffix =" ";
           }

            var fullname = Employee_FirstName+" "+Employee_MiddleInitial+" "+Employee_LastName +" "+Employee_Suffix;

            if(status =='waiting for approval' && id == empid){

                pendingtable.append(
               '<tr style="font-size: 12px" id="tbody1">'+
                '<td style="font-size: 12px;text-align: center">'+ fullname+'</td>'+
                '<td style="font-size: 12px;text-align: center">'+ leaveType+'</td>'+ 
                '<td style="font-size: 12px;text-align: center">'+ leaveFrom+'</td>'+ 
                '<td style="font-size: 12px;text-align: center">'+ leaveuntil+'</td>'+ 
                '<td style="font-size: 12px;text-align: center">'+ count+'</td>'+ 
                '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:#4d79ff"><b>'+status+'<b></p></td>'+      
                '<td style="font-size: 12px;text-align: center">'+ reason+'</td>'+      
                '<td style="font-size: 12px;text-align: center">'+ duration+'</td>'+  
                 '<td style="font-size: 12px;text-align: center">'+ dateApplied+'</td>'+   
                '<td style="font-size: 10px;text-align: center">'+
                '<button class ="viewapply  btn leave btn-info  btn btn-leave btn-hover-white btn-sm" style="font-size: 10px;width:79px" data-key="'+ key2 + '" data-toggle="modal" data-id="'+ key2 + '"   >VIEW</button> ' +
                 '<button class ="grant1-btn leave   btn btn-leave btn-hover-white btn-sm" style="font-size: 10px;width:79px" data-key="'+ key2 + '" data-toggle="modal" data-id="'+ key2 + '"   >Grant</button> ' +
                 '<button class ="declined-btn  btn leave btn-danger  btn btn-leave btn-hover-white btn-sm" style="font-size: 10px;width:79px" data-key="'+ key2 + '" data-toggle="modal" data-id="'+ key2 + '" >Declined</button> ' +
                '</td>'+
                '</tr>'
              );
              // var seen = {};
              // $('#Pending tr').each(function() {
              //     var txt = $(this).children("td:eq(2)").text();
              //     if (seen[txt])
              //         $(this).remove();
              //     else
              //         seen[txt] = true;
              // });
            }   
          
          });
        });
     });
   }); 
  });  
 });


}
function getapproved(){
acceptedtable.empty();
  var employeeref1 = employeeref;
      employeeref1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key3                   = childSnapshot2.key;
      var empid                  = childSnapshot2.child('Employee_Id').val();
      var Employee_FirstName     = childSnapshot2.child('Employee_FirstName').val();
      var Employee_LastName      = childSnapshot2.child('Employee_LastName').val();
      var Employee_MiddleInitial = childSnapshot2.child('Employee_MiddleInitial').val();
      var Employee_Suffix        = childSnapshot2.child('Employee_Suffix').val();
          
   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2        = childSnapshot1.key;
           var status      = childSnapshot1.child('status').val();
           var leaveType   = childSnapshot1.child('leaveType').val();
           var reason      = childSnapshot1.child('reason').val();
           var duration    = childSnapshot1.child('duration').val();
           var dateApplied = childSnapshot1.child('dateApplied').val();
           var leaveuntil  = childSnapshot1.child('leaveuntil').val();
           var leaveFrom   = childSnapshot1.child('leaveFrom').val();
           var count       = childSnapshot1.child('count').val();
           var id          = childSnapshot1.child('id').val();
           if(Employee_Suffix =="-"){
            Employee_Suffix =" ";
           }

            var fullname = Employee_FirstName+" "+Employee_MiddleInitial+" "+Employee_LastName +" "+Employee_Suffix;
  
            if(status =='approved' && id == empid){

                acceptedtable.append(
              '<tr style="font-size: 12px" id="tbody1">'+

                '<td style="font-size: 12px;text-align: center">'+ fullname+'</td>'+
                '<td style="font-size: 12px;text-align: center">'+ leaveType+'</td>'+ 
                '<td style="font-size: 12px;text-align: center">'+ leaveFrom+'</td>'+ 
                '<td style="font-size: 12px;text-align: center">'+ leaveuntil+'</td>'+ 
                '<td style="font-size: 12px;text-align: center">'+ count+'</td>'+ 
                '<td style="font-size: 13px;text-align: center;text-color:green "><p style="color:#4d79ff"><b>'+status+'<b></p></td>'+      
                '<td style="font-size: 12px;text-align: center">'+ reason+'</td>'+      
                '<td style="font-size: 12px;text-align: center">'+ duration+'</td>'+  
                 '<td style="font-size: 12px;text-align: center">'+ dateApplied+'</td>'+  
                '<td style="font-size: 10px;text-align: center">'+
                '<button class ="btn viewapply1  btn btn-leave btn-hover-white btn-sm" style="font-size: 10px" data-key="'+ key2 + '" data-toggle="modal" data-id="'+ key2 + '" >VIEW</button> ' +
                '</td>'+
                '</tr>'
              );
              // var seen = {};
              // $('#Accepted tr').each(function() {
              //     var txt = $(this).children("td:eq(2)").text();
              //     if (seen[txt])
              //         $(this).remove();
              //     else
              //         seen[txt] = true;
              // });

            }
          });
        });
     });
   }); 
  });  
 });
}
function getreject(){
rejectedtable.empty();
  var employeeref1 = employeeref;
      employeeref1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key3                   = childSnapshot2.key;
      var empid                  = childSnapshot2.child('Employee_Id').val();
      var Employee_FirstName     = childSnapshot2.child('Employee_FirstName').val();
      var Employee_LastName      = childSnapshot2.child('Employee_LastName').val();
      var Employee_MiddleInitial = childSnapshot2.child('Employee_MiddleInitial').val();
      var Employee_Suffix        = childSnapshot2.child('Employee_Suffix').val();
          
   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2        = childSnapshot1.key;
           var status      = childSnapshot1.child('status').val();
           var leaveType   = childSnapshot1.child('leaveType').val();
           var reason      = childSnapshot1.child('reason').val();
           var duration    = childSnapshot1.child('duration').val();
           var dateApplied = childSnapshot1.child('dateApplied').val();
           var leaveuntil  = childSnapshot1.child('leaveuntil').val();
           var leaveFrom   = childSnapshot1.child('leaveFrom').val();
           var count       = childSnapshot1.child('count').val();
           var id          = childSnapshot1.child('id').val();
           if(Employee_Suffix =="-"){
            Employee_Suffix =" ";
           }

            var fullname = Employee_FirstName+" "+Employee_MiddleInitial+" "+Employee_LastName +" "+Employee_Suffix;

            if(status =='declined' && id == empid){
        
                rejectedtable.append(
              '<tr style="font-size: 12px" id="tbody1">'+

                '<td style="font-size: 12px;text-align: center">'+ fullname+'</td>'+
                '<td style="font-size: 12px;text-align: center">'+ leaveType+'</td>'+ 
                '<td style="font-size: 12px;text-align: center">'+ leaveFrom+'</td>'+ 
                '<td style="font-size: 12px;text-align: center">'+ leaveuntil+'</td>'+ 
                '<td style="font-size: 12px;text-align: center">'+ count+'</td>'+ 
                '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:red"><b>'+status+'<b></p></td>'+      
                '<td style="font-size: 12px;text-align: center">'+ reason+'</td>'+      
                '<td style="font-size: 12px;text-align: center">'+ duration+'</td>'+  
                 '<td style="font-size: 12px;text-align: center">'+ dateApplied+'</td>'+            
                '<td style="font-size: 10px;text-align: center">'+
                '<button class ="declined-btn btn leave   btn btn-leave btn-hover-white btn-sm" style="font-size: 10px"  data-key="'+ key2 + '" data-toggle="modal" data-id="'+ key2 + '">VIEW</button> ' +
                '</td>'+
                '</tr>'
              );
              // var seen = {};
              // $('#Rejected tr').each(function() {
              //     var txt = $(this).children("td:eq(2)").text();
              //     if (seen[txt])
              //         $(this).remove();
              //     else
              //         seen[txt] = true;
              // });

            }  

          });
        });
     });
   }); 
  });  
 });


}
var usercompanyid                    =     document.getElementById("userid").value;
var employeeleaverequestref          =     db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         =     db.ref("Leave_Request/"+usercompanyid);
var compholiday1                     =     db.ref('Company_Holiday/'+usercompanyid);


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


function init(){
  $("#comedit").on("click",updateempprofile);

  employeeleaverequestref.on('child_removed',getpending);
  employeeleaverequestref.on('child_changed',getpending);

  employeeleaverequestref.on('child_removed',getapproved);
  employeeleaverequestref.on('child_changed',getapproved);

  employeeleaverequestref.on('child_removed',getreject);
  employeeleaverequestref.on('child_changed',getreject);

  getreject();
  getapproved();
  getpending();
  reload_notif();
  notif();
}
init();
function reload_notif(){
   window.setInterval(notif, 1000);
}


$(function ($) {
 $('#viewalldetails').on('hidden.bs.modal', function (e) {
           $("#subdoct").empty();
           $("#Approvers").empty();

});
 $('#viewalldetails1').on('hidden.bs.modal', function (e) {

           $("#subdoct1").empty();
           $("#Approvers1").empty();
});
  $('#declinedmodal').on('hidden.bs.modal', function (e) {

           $("#subdoct2").empty();
           $("#Approvers2").empty();
});
     $("#close").click(function() {
          $("#subdoct").empty();
           $("#Approvers").empty();
           $("#viewalldetails").modal("hide");
           $("#subdoct1").empty();
           $("#Approvers1").empty();
           $("#viewalldetails1").modal("hide");
      });


      pendingtable.on('click', '.declined-btn', function () {
               var leaveid = $(this).data('id');
                $('#declinedkey').val(leaveid);
                 var requestId = document.getElementById('declinedkey').value;
      var employeeref1 = employeeref;
      employeeref1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key3                   = childSnapshot2.key;
      var empid                  = childSnapshot2.child('Employee_Id').val();
      var Employee_FirstName     = childSnapshot2.child('Employee_FirstName').val();
      var Employee_LastName      = childSnapshot2.child('Employee_LastName').val();
      var Employee_MiddleInitial = childSnapshot2.child('Employee_MiddleInitial').val();
      var Employee_Suffix        = childSnapshot2.child('Employee_Suffix').val();
      if(Employee_Suffix =="-"){
          Employee_Suffix ="";
      }
      var full = Employee_FirstName + " "+ Employee_MiddleInitial+" " + Employee_LastName + Employee_Suffix;

         employeeleaverequestref.once('value', function(snapshot) {
        snapshot.forEach(function(childSnapshot){
        var key                               = childSnapshot.key;
        document.getElementById('key15').value = key;
        var employeeleaverequestref2          = employeeleaverequestref1.child(key);
        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2           = childSnapshot1.key;
           var status         = childSnapshot1.child('status').val();
           var leaveType      = childSnapshot1.child('leaveType').val();
           var id             = childSnapshot1.child('id').val();
           var days           = childSnapshot1.child('days').val();
           var consumed       = childSnapshot1.child('consumed').val(); 
           var dateApplied    = childSnapshot1.child('dateApplied').val(); 
           var balance        = childSnapshot1.child('balance').val();
           var leaveFrom      = childSnapshot1.child('leaveFrom').val();
           var leaveuntil     = childSnapshot1.child('leaveuntil').val();
           var reason         = childSnapshot1.child('reason').val();
           var count          = childSnapshot1.child('count').val();
  
                
        if (key2 == requestId && id == empid) {
             document.getElementById('key25').value                   = key2;
             document.getElementById('leavedesc5').value              = leaveType;
             document.getElementById('apconsumed5').value             = count;
             document.getElementById('dateapply5').value              = dateApplied;

             }
            });
           });      
          });
        });
      });
    }); 
   $('#declinedmmodal').modal({
      backdrop: 'static'
    });
    $('#declinedmmodal').modal('show');

});

  var requestId1 =document.getElementById('leaverequestid').value;
  var requestId1 = document.getElementById('leaverequestid1').value;

  pendingtable.on('click', '.grant1-btn', function () {
        var id = $(this).data('id');
        $('#grantkey').val(id);
      var requestId = document.getElementById('grantkey').value;
      var employeeref1 = employeeref;
      employeeref1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key3                   = childSnapshot2.key;
      var empid                  = childSnapshot2.child('Employee_Id').val();
      var Employee_FirstName     = childSnapshot2.child('Employee_FirstName').val();
      var Employee_LastName      = childSnapshot2.child('Employee_LastName').val();
      var Employee_MiddleInitial = childSnapshot2.child('Employee_MiddleInitial').val();
      var Employee_Suffix        = childSnapshot2.child('Employee_Suffix').val();
      if(Employee_Suffix =="-"){
          Employee_Suffix ="";
      }
      var full = Employee_FirstName + " "+ Employee_MiddleInitial+" " + Employee_LastName + Employee_Suffix;

         employeeleaverequestref.once('value', function(snapshot) {
        snapshot.forEach(function(childSnapshot){
        var key                               = childSnapshot.key;
        document.getElementById('key13').value = key;
        var employeeleaverequestref2          = employeeleaverequestref1.child(key);
        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2           = childSnapshot1.key;
           var status         = childSnapshot1.child('status').val();
           var leaveType      = childSnapshot1.child('leaveType').val();
           var id             = childSnapshot1.child('id').val();
           var days           = childSnapshot1.child('days').val();
           var consumed       = childSnapshot1.child('consumed').val(); 
           var dateApplied    = childSnapshot1.child('dateApplied').val(); 
           var balance        = childSnapshot1.child('balance').val();
           var leaveFrom      = childSnapshot1.child('leaveFrom').val();
           var leaveuntil     = childSnapshot1.child('leaveuntil').val();
           var reason         = childSnapshot1.child('reason').val();
           var count          = childSnapshot1.child('count').val();
          
          
          
                
        if (key2 == requestId && id == empid) {
             document.getElementById('key24').value                   = key2;
             document.getElementById('leavedesc4').value              = leaveType;
             document.getElementById('apconsumed4').value             = count;
             document.getElementById('prevleaveconsumed4').value      = consumed;
             document.getElementById('dateapply4').value              = dateApplied;

             }
            });
           });      
          });
        });
      });
    });
       $("#grantmmodal").modal("show");

   });
  pendingtable.on('click', '.viewapply', function () {
        var id = $(this).data('id');
        $('#leaverequestid').val(id);
  var requestId = document.getElementById('leaverequestid').value;
  var employeeref1 = employeeref;
      employeeref1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key3                   = childSnapshot2.key;
      var empid                  = childSnapshot2.child('Employee_Id').val();
      var Employee_FirstName     = childSnapshot2.child('Employee_FirstName').val();
      var Employee_LastName      = childSnapshot2.child('Employee_LastName').val();
      var Employee_MiddleInitial = childSnapshot2.child('Employee_MiddleInitial').val();
      var Employee_Suffix        = childSnapshot2.child('Employee_Suffix').val();
      if(Employee_Suffix =="-"){
          Employee_Suffix ="";
      }
      var full = Employee_FirstName + " "+ Employee_MiddleInitial+" " + Employee_LastName + Employee_Suffix;

         employeeleaverequestref.once('value', function(snapshot) {
        snapshot.forEach(function(childSnapshot){
        var key                               = childSnapshot.key;
        document.getElementById('key1').value = key;
        var employeeleaverequestref2          = employeeleaverequestref1.child(key);
        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2           = childSnapshot1.key;
           var status         = childSnapshot1.child('status').val();
           var leaveType      = childSnapshot1.child('leaveType').val();
           var id             = childSnapshot1.child('id').val();
           var days           = childSnapshot1.child('days').val();
           var consumed       = childSnapshot1.child('consumed').val(); 
           var dateApplied    = childSnapshot1.child('dateApplied').val(); 
           var balance        = childSnapshot1.child('balance').val();
           var leaveFrom      = childSnapshot1.child('leaveFrom').val();
           var leaveuntil     = childSnapshot1.child('leaveuntil').val();
           var reason         = childSnapshot1.child('reason').val();
           var count          = childSnapshot1.child('count').val();
          
          
          
                
        if (key2 == requestId && id == empid) {
             document.getElementById('key2').value                   = key2;
             document.getElementById('redesc').innerHTML             = leaveType;
             document.getElementById('leavedesc').value              = leaveType;
             document.getElementById('aplicantfullname').innerHTML   = full;
             document.getElementById('empidno').innerHTML            = empid;
             document.getElementById('totaldays').innerHTML          = days;
             document.getElementById('dateapplied').innerHTML        = dateApplied;
             document.getElementById('leavedesciption').innerHTML    = leaveType;
             document.getElementById('consumed').innerHTML           = consumed;
             document.getElementById('availabledays').innerHTML      = days;
             document.getElementById('leaveform').innerHTML          = leaveFrom;
             document.getElementById('leaveuntil').innerHTML         = leaveuntil;
             document.getElementById('reason').innerHTML             = reason;
             document.getElementById('apconsumed1').value            = count;
             document.getElementById('prevleaveconsumed').value      = consumed;
             document.getElementById('dateapply').value              = dateApplied;
             
            var kay01  =   document.getElementById('key1').value;
            var employeeleaverequestref01 = employeeleaverequestref.child(key);
            var employeeleaverequestref02 = employeeleaverequestref01.child(key2);

            employeeleaverequestref02.child('requirements').once('value', function(snapshot2) {
            snapshot2.forEach(function(childSnapshot2){

           var key5                   = childSnapshot2.key;
           var ImageLink              = childSnapshot2.child('ImageLink').val();
       
            console.log(key5);
            console.log(ImageLink);
            if(ImageLink == "null"){
                $('#subdoct').append("");
            }else{
                $('#subdoct').append(
                '<a  href="'+ImageLink +'" download ><img id="myrequirements" style="height:100px;width:100px;padding:auto" src="'+ImageLink+'"></img></a>'
                );
            }

               });
              });
              employeeleaverequestref02.child('Approver').once('value', function(snapshot3) {
              snapshot3.forEach(function(childSnapshot3){
                    var key6                   = childSnapshot3.key;
                    var name                   = childSnapshot3.child('name').val();
                    var status                 = childSnapshot3.child('status').val();
                 
                      console.log(key6);
                      console.log(name);
                      var leavecoordinator = "leave coordinator";
                      if(name == leavecoordinator){

                         name="";
                         status=""
                      }
                   $('#Approvers').append(
                    '<label>'+name+'</label><br><div style="float:right"><p style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-25px;color:red">'+status+'</p></div>'
                );
               });
              });


             }
            });
           });      
          });
        });
      });
    });
 
      $('#viewalldetails').modal({
      backdrop: 'static'
    });
       $("#viewalldetails").modal("show");

   });

 acceptedtable.on('click', '.viewapply1', function () {
        var id = $(this).data('id');
        $('#leaverequestid1').val(id);
  var requestId = document.getElementById('leaverequestid1').value;
  var employeeref1 = employeeref;
      employeeref1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key3                   = childSnapshot2.key;
      var empid                  = childSnapshot2.child('Employee_Id').val();
      var Employee_FirstName     = childSnapshot2.child('Employee_FirstName').val();
      var Employee_LastName      = childSnapshot2.child('Employee_LastName').val();
      var Employee_MiddleInitial = childSnapshot2.child('Employee_MiddleInitial').val();
      var Employee_Suffix        = childSnapshot2.child('Employee_Suffix').val();
      if(Employee_Suffix =="-"){
          Employee_Suffix ="";
      }
      var full = Employee_FirstName + " "+ Employee_MiddleInitial+" " + Employee_LastName + Employee_Suffix;

         employeeleaverequestref.once('value', function(snapshot) {
        snapshot.forEach(function(childSnapshot){
        var key                               = childSnapshot.key;
        document.getElementById('key11').value = key;
        var employeeleaverequestref2          = employeeleaverequestref1.child(key);
        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2           = childSnapshot1.key;
           var status         = childSnapshot1.child('status').val();
           var leaveType      = childSnapshot1.child('leaveType').val();
           var id             = childSnapshot1.child('id').val();
           var days           = childSnapshot1.child('days').val();
           var consumed       = childSnapshot1.child('consumed').val(); 
           var dateApplied    = childSnapshot1.child('dateApplied').val(); 
           var balance        = childSnapshot1.child('balance').val();
           var leaveFrom      = childSnapshot1.child('leaveFrom').val();
           var leaveuntil     = childSnapshot1.child('leaveuntil').val();
           var reason         = childSnapshot1.child('reason').val();
           var count          = childSnapshot1.child('count').val();
          
          
                
             if (key2 == requestId && id == empid) {
             document.getElementById('key21').value                   = key2;
             document.getElementById('redesc1').innerHTML             = leaveType;
             document.getElementById('leavedesc1').value              = leaveType;
             document.getElementById('aplicantfullname1').innerHTML   = full;
             document.getElementById('empidno1').innerHTML            = empid;
             document.getElementById('totaldays1').innerHTML          = days;
             document.getElementById('dateapplied1').innerHTML        = dateApplied;
             document.getElementById('leavedesciption1').innerHTML    = leaveType;
             document.getElementById('consumed1').innerHTML           = consumed;
             document.getElementById('availabledays1').innerHTML      = days;
             document.getElementById('leaveform1').innerHTML          = leaveFrom;
             document.getElementById('leaveuntil1').innerHTML         = leaveuntil;
             document.getElementById('reason1').innerHTML             = reason;
             document.getElementById('apconsumed2').value             = count;
             document.getElementById('dateapply2').value              = dateApplied;
             document.getElementById('prevcon').value                = consumed;

            var kay01 =   document.getElementById('key11').value;
            var employeeleaverequestref01 = employeeleaverequestref.child(key);
            var employeeleaverequestref02 = employeeleaverequestref01.child(key2);

            employeeleaverequestref02.child('requirements').once('value', function(snapshot2) {
            snapshot2.forEach(function(childSnapshot2){

           var key5                   = childSnapshot2.key;
           var ImageLink1              = childSnapshot2.child('ImageLink').val();
       
            console.log(key5);
            console.log(ImageLink1);

            if(ImageLink1 == "null"){
                $('#subdoct1').append("");
            }else{
                $('#subdoct1').append(
                '<a  href="'+ImageLink1 +'" download ><img id="myrequirements" style="height:100px;width:100px;padding:auto" src="'+ImageLink1+'"></img></a>'
                );
            }
               });
              });
              employeeleaverequestref02.child('Approver').once('value', function(snapshot3) {
              snapshot3.forEach(function(childSnapshot3){
                    var key6                   = childSnapshot3.key;
                    var name                   = childSnapshot3.child('name').val();
                    var status                 = childSnapshot3.child('status').val();
                 
                      console.log(key6);
                      console.log(name);
                      var leavecoordinator = "leave coordinator";
                      if(name == leavecoordinator){

                         name="";
                         status=""
                      }
                   $('#Approvers1').append(
                    '<label>'+name+'</label><br><div style="float:left"><p style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:2px;color:red">'+status+'</p></div>'
                );
               });
              });


             }
            });
           });      
          });
        });
      });
    });
  
      $('#viewalldetails1').modal({
      backdrop: 'static'
    });
  
       $("#viewalldetails1").modal("show");

   });

 rejectedtable.on('click', '.declined-btn', function () {
        var id = $(this).data('id');
        $('#leaverequestid2').val(id);
  var requestId = document.getElementById('leaverequestid2').value;
  var employeeref1 = employeeref;
      employeeref1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key3                   = childSnapshot2.key;
      var empid                  = childSnapshot2.child('Employee_Id').val();
      var Employee_FirstName     = childSnapshot2.child('Employee_FirstName').val();
      var Employee_LastName      = childSnapshot2.child('Employee_LastName').val();
      var Employee_MiddleInitial = childSnapshot2.child('Employee_MiddleInitial').val();
      var Employee_Suffix        = childSnapshot2.child('Employee_Suffix').val();
      if(Employee_Suffix =="-"){
          Employee_Suffix ="";
      }
      var full = Employee_FirstName + " "+ Employee_MiddleInitial+" " + Employee_LastName + Employee_Suffix;

         employeeleaverequestref.once('value', function(snapshot) {
        snapshot.forEach(function(childSnapshot){
        var key                               = childSnapshot.key;
        document.getElementById('key12').value = key;
        var employeeleaverequestref2          = employeeleaverequestref1.child(key);
        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2           = childSnapshot1.key;
           var status         = childSnapshot1.child('status').val();
           var leaveType      = childSnapshot1.child('leaveType').val();
           var id             = childSnapshot1.child('id').val();
           var days           = childSnapshot1.child('days').val();
           var consumed       = childSnapshot1.child('consumed').val(); 
           var dateApplied    = childSnapshot1.child('dateApplied').val(); 
           var balance        = childSnapshot1.child('balance').val();
           var leaveFrom      = childSnapshot1.child('leaveFrom').val();
           var leaveuntil     = childSnapshot1.child('leaveuntil').val();
           var reason         = childSnapshot1.child('reason').val();
           var count          = childSnapshot1.child('count').val();
          
          
                
             if (key2 == requestId && id == empid) {
             document.getElementById('key22').value                   = key2;
             document.getElementById('redesc2').innerHTML             = leaveType;
             document.getElementById('leavedesc2').value              = leaveType;
             document.getElementById('aplicantfullname2').innerHTML   = full;
             document.getElementById('empidno2').innerHTML            = empid;
             document.getElementById('totaldays2').innerHTML          = days;
             document.getElementById('dateapplied2').innerHTML        = dateApplied;
             document.getElementById('leavedesciption2').innerHTML    = leaveType;
             document.getElementById('consumed2').innerHTML           = consumed;
             document.getElementById('availabledays2').innerHTML      = days;
             document.getElementById('leaveform2').innerHTML          = leaveFrom;
             document.getElementById('leaveuntil2').innerHTML         = leaveuntil;
             document.getElementById('reason2').innerHTML             = reason;
             document.getElementById('apconsumed3').value             = count;
             document.getElementById('dateapply3').value              = dateApplied;
             document.getElementById('preveconsumed1').value           = consumed;

            var kay01 =   document.getElementById('key12').value;
            var employeeleaverequestref01 = employeeleaverequestref.child(key);
            var employeeleaverequestref02 = employeeleaverequestref01.child(key2);

            employeeleaverequestref02.child('requirements').once('value', function(snapshot2) {
            snapshot2.forEach(function(childSnapshot2){

           var key5                   = childSnapshot2.key;
           var ImageLink1              = childSnapshot2.child('ImageLink').val();
       
            console.log(key5);
            console.log(ImageLink1);

            if(ImageLink1 == "null"){
                $('#subdoct2').append("");
            }else{
                $('#subdoct2').append(
                '<a  href="'+ImageLink1 +'" download ><img id="myrequirements" style="height:100px;width:100px;padding:auto" src="'+ImageLink1+'"></img></a>'
                );
            }
               });
              });
              employeeleaverequestref02.child('Approver').once('value', function(snapshot3) {
              snapshot3.forEach(function(childSnapshot3){
                    var key6                   = childSnapshot3.key;
                    var name                   = childSnapshot3.child('name').val();
                    var status                 = childSnapshot3.child('status').val();
                 
                      console.log(key6);
                      console.log(name);
                      var leavecoordinator = "leave coordinator";
                      if(name == leavecoordinator){

                         name="";
                         status=""
                      }
                   $('#Approvers2').append(
                    '<label>'+name+'</label><br><div style="float:right"><p style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-25px;color:red">'+status+'</p></div>'
                );
               });
              });


             }
            });
           });      
          });
        });
      });
     });
      $('#declinedmodal').modal({
      backdrop: 'static'
    });
       $("#declinedmodal").modal("show");
   });
 });
  

function grantrequest(event){
event.preventDefault();
var usercompanyid                    　    = document.getElementById("userid").value;
var approver                              = db.ref("Company_Approver/" + usercompanyid);
var employeeref1                          = employeeref;


      var employeeref7 = employeeref1;
      employeeref7.once('value', function(snapshot5) {
      snapshot5.forEach(function(childSnapshot5){

      var key3                   = childSnapshot5.key;
      var empid                  = childSnapshot5.child('Employee_Id').val();

      var employeeref8           = employeeref7.child(key3);

      employeeref8.once('value', function(snapshot8) {
      snapshot8.child('Leave_Summary').forEach(function(childSnapshot8){
           var leavekey         = childSnapshot8.key;
           var Consume          = childSnapshot8.child('Consume').val();
           var Available        = childSnapshot8.child('Available').val();
           var NumberofDays     = childSnapshot8.child('NumberofDays').val();
           var LeaveType1       = childSnapshot8.child('LeaveType').val();
           var childData        = childSnapshot8.val();

         employeeleaverequestref.once('value', function(snapshot) {
         snapshot.forEach(function(childSnapshot){
           var key                         = childSnapshot.key;
           var employeeleaverequestref2    = employeeleaverequestref1.child(key);

              employeeleaverequestref2.once('value', function(snapshot1) {
                 snapshot1.forEach(function(childSnapshot1){

                 var key2        = childSnapshot1.key;
                 var status      = childSnapshot1.child('status').val();
                 var leaveType   = childSnapshot1.child('leaveType').val();
                 var id          = childSnapshot1.child('id').val();
                 var balance     = childSnapshot1.child('balance').val();
                 var consumed    = childSnapshot1.child('consumed').val();
                 var days        = childSnapshot1.child('days').val();
                 var count       = childSnapshot1.child('count').val();

      var employeeleaverequestref3 = employeeleaverequestref2.child(key2);
          employeeleaverequestref3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

              var key4             = childSnapshot4.key;
              var name             = childSnapshot4.child('name').val();
              var actionstatus     = childSnapshot4.child('status').val();


            var employeeleaverequestref4 = employeeleaverequestref3.child("Approver");
            var leaverequestid     = document.getElementById('leaverequestid').value;
            var applyconsumed      = document.getElementById('apconsumed1').value;
            var leavedesc          = document.getElementById('leavedesc').value;
           
            var status           = "approved";
            var leavecoordinator = "leave coordinator";

                  var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;

            if(key2 == leaverequestid && empid == id && leaveType == LeaveType1 && name == "leave coordinator"){   
                  var consumed          = document.getElementById('apconsumed1').value; 
                  var prevleaveconsumed = document.getElementById('prevleaveconsumed').value; 
                  var avail   = parseFloat(Available);  
                  var con2    = parseFloat(consumed); 
                  var appcon  = parseFloat(applyconsumed); 
                  var prevleavecon  = parseFloat(prevleaveconsumed); 

                  var levecon = avail - appcon;
                  var con     = con2 + prevleavecon;

                  var employeeref9 = employeeref8.child('Leave_Summary');

                employeeref9.child(leavekey).update({
                              Available    :  levecon,
                              Consume      :  con,
                             
                    });

              employeeleaverequestref2.child(key2).update({
                      status       :  status,
                      balance      :  levecon,
                      consumed     :  con,
                      dateApproved :  dateTime,
                   });

                employeeleaverequestref4.child(key4).update({
                      status :status,
                     });
              
            }
            
            });
           });
          });
         });
        });
       });
      });
     });
    });
  });

  Leave_Request_Employee.once('value', function(snapshot2) {
         snapshot2.forEach(function(childSnapshot2){
           var key                        = childSnapshot2.key;
           var Leave_Request_Employee2    = Leave_Request_Employee1.child(key);

              Leave_Request_Employee2.once('value', function(snapshot3) {
                 snapshot3.forEach(function(childSnapshot3){


                 var key3         = childSnapshot3.key;
                 var status1      = childSnapshot3.child('status').val();
                 var leaveType1   = childSnapshot3.child('leaveType').val();
                 var id1          = childSnapshot3.child('id').val();
                 var balance1     = childSnapshot3.child('balance').val();
                 var consumed1    = childSnapshot3.child('consumed').val();
                 var days1        = childSnapshot3.child('days').val();
                 var count        = childSnapshot3.child('count').val();
                 var dateApplied1 = childSnapshot3.child('dateApplied').val();

      var Leave_Request_Employee3 = Leave_Request_Employee2.child(key3);
          Leave_Request_Employee3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

                 var key4             = childSnapshot4.key;
                 var name             = childSnapshot4.child('name').val();
                 var actionstatus     = childSnapshot4.child('status').val();


                 var Leave_Request_Employee4 = Leave_Request_Employee3.child("Approver");

                 var status           = "approved";
                 var leavecoordinator = "leave coordinator";
                 var applyconsumed    = document.getElementById('apconsumed1').value;
                 var leavedesc        = document.getElementById('leavedesc').value;
                 var dateapply        = document.getElementById('dateapply').value;

                  var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;

                  if(leavedesc == leaveType1 && dateapply == dateApplied1 && name == "leave coordinator" ){   
                          var consumed = document.getElementById('apconsumed1').value; 
                          var prevleaveconsumed = document.getElementById('prevleaveconsumed').value; 
                            var avail   = parseFloat(balance1);  
                            var con2    = parseFloat(consumed); 
                            var appcon  = parseFloat(applyconsumed); 
                            var prevleavecon  = parseFloat(prevleaveconsumed); 
                            var levecon = avail - appcon;
                             var con     = con2 + prevleavecon;
   

                        Leave_Request_Employee2.child(key3).update({
                                status       :  status,
                                balance      :  levecon,
                                consumed     :  con,
                                dateApproved :  dateTime,
                             });

                          Leave_Request_Employee4.child(key4).update({
                                status :status,
                               });
                          $('#viewalldetails').modal("hide");
                          swal({type:'success',title: "Sucessfully approved !",icon: "success",});
                        }
                      })
                    });
                  });
                });
              });
            });

}
function declined(event){
event.preventDefault();
var usercompanyid                    　    = document.getElementById("userid").value;
var approver                              = db.ref("Company_Approver/" + usercompanyid);
var employeeref1                          = employeeref;


      var employeeref7 = employeeref1;
      employeeref7.once('value', function(snapshot5) {
      snapshot5.forEach(function(childSnapshot5){

      var key3                   = childSnapshot5.key;
      var empid                  = childSnapshot5.child('Employee_Id').val();

      var employeeref8           = employeeref7.child(key3);

      employeeref8.once('value', function(snapshot8) {
      snapshot8.child('Leave_Summary').forEach(function(childSnapshot8){
           var leavekey         = childSnapshot8.key;
           var Consume          = childSnapshot8.child('Consume').val();
           var Available        = childSnapshot8.child('Available').val();
           var NumberofDays     = childSnapshot8.child('NumberofDays').val();
           var LeaveType1       = childSnapshot8.child('LeaveType').val();
           var childData        = childSnapshot8.val();

         employeeleaverequestref.once('value', function(snapshot) {
         snapshot.forEach(function(childSnapshot){
           var key                         = childSnapshot.key;
           var employeeleaverequestref2    = employeeleaverequestref1.child(key);

              employeeleaverequestref2.once('value', function(snapshot1) {
                 snapshot1.forEach(function(childSnapshot1){

                 var key2        = childSnapshot1.key;
                 var status      = childSnapshot1.child('status').val();
                 var leaveType   = childSnapshot1.child('leaveType').val();
                 var id          = childSnapshot1.child('id').val();
                 var balance     = childSnapshot1.child('balance').val();
                 var consumed    = childSnapshot1.child('consumed').val();
                 var days        = childSnapshot1.child('days').val();
                 var count       = childSnapshot1.child('count').val();

      var employeeleaverequestref3 = employeeleaverequestref2.child(key2);
          employeeleaverequestref3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

              var key4             = childSnapshot4.key;
              var name             = childSnapshot4.child('name').val();
              var actionstatus     = childSnapshot4.child('status').val();


            var employeeleaverequestref4 = employeeleaverequestref3.child("Approver");
            var leaverequestid     = document.getElementById('leaverequestid').value;
            var applyconsumed      = document.getElementById('apconsumed1').value;
           
            var status           = "declined";
            var leavecoordinator = "leave coordinator";

                  var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;

            if(key2 == leaverequestid && empid == id && leaveType == LeaveType1 && name == "leave coordinator"){   

              employeeleaverequestref2.child(key2).update({
                      status       :  status,
                      dateApproved :  dateTime,
                   });

                employeeleaverequestref4.child(key4).update({
                      status :status,
                     });
              }
            
            });
           });
          });
        });
        });
       });
      });
     });
    });
  });
  Leave_Request_Employee.once('value', function(snapshot2) {
         snapshot2.forEach(function(childSnapshot2){
           var key                        = childSnapshot2.key;
           var Leave_Request_Employee2    = Leave_Request_Employee1.child(key);

              Leave_Request_Employee2.once('value', function(snapshot3) {
                 snapshot3.forEach(function(childSnapshot3){


                 var key3         = childSnapshot3.key;
                 var status1      = childSnapshot3.child('status').val();
                 var leaveType1   = childSnapshot3.child('leaveType').val();
                 var id1          = childSnapshot3.child('id').val();
                 var balance1     = childSnapshot3.child('balance').val();
                 var consumed1    = childSnapshot3.child('consumed').val();
                 var days1        = childSnapshot3.child('days').val();
                 var count        = childSnapshot3.child('count').val();
                 var dateApplied1 = childSnapshot3.child('dateApplied').val();

      var Leave_Request_Employee3 = Leave_Request_Employee2.child(key3);
          Leave_Request_Employee3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

                 var key4             = childSnapshot4.key;
                 var name             = childSnapshot4.child('name').val();
                 var actionstatus     = childSnapshot4.child('status').val();


                 var Leave_Request_Employee4 = Leave_Request_Employee3.child("Approver");

                 var status           = "declined";
                 var leavecoordinator = "leave coordinator";
                 var applyconsumed    = document.getElementById('apconsumed1').value;
                 var leavedesc        = document.getElementById('leavedesc').value;
                 var dateapply        = document.getElementById('dateapply').value;

                  var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;

                  if(leavedesc == leaveType1 && dateapply == dateApplied1 && name == "leave coordinator" ){   
   

                        Leave_Request_Employee2.child(key3).update({
                                status       :  status,

                                dateApproved :  dateTime,
                             });

                          Leave_Request_Employee4.child(key4).update({
                                status :status,
                               });
                          $('#viewalldetails').modal("hide");
                          swal({type:'success',title: "Sucessfully declined !",icon: "success",});
                        }
                      });
                    });
                  });
                });
              });
            }); 
}
function declined1(event){
event.preventDefault();
var usercompanyid                    　    = document.getElementById("userid").value;
var approver                              = db.ref("Company_Approver/" + usercompanyid);
var employeeref1                          = employeeref;


      var employeeref7 = employeeref1;
      employeeref7.once('value', function(snapshot5) {
      snapshot5.forEach(function(childSnapshot5){

      var key3                   = childSnapshot5.key;
      var empid                  = childSnapshot5.child('Employee_Id').val();

      var employeeref8           = employeeref7.child(key3);

      employeeref8.once('value', function(snapshot8) {
      snapshot8.child('Leave_Summary').forEach(function(childSnapshot8){
           var leavekey         = childSnapshot8.key;
           var Consume          = childSnapshot8.child('Consume').val();
           var Available        = childSnapshot8.child('Available').val();
           var NumberofDays     = childSnapshot8.child('NumberofDays').val();
           var LeaveType1       = childSnapshot8.child('LeaveType').val();
           var childData        = childSnapshot8.val();

         employeeleaverequestref.once('value', function(snapshot) {
         snapshot.forEach(function(childSnapshot){
           var key                         = childSnapshot.key;
           var employeeleaverequestref2    = employeeleaverequestref1.child(key);

              employeeleaverequestref2.once('value', function(snapshot1) {
                 snapshot1.forEach(function(childSnapshot1){

                 var key2        = childSnapshot1.key;
                 var status      = childSnapshot1.child('status').val();
                 var leaveType   = childSnapshot1.child('leaveType').val();
                 var id          = childSnapshot1.child('id').val();
                 var balance     = childSnapshot1.child('balance').val();
                 var consumed    = childSnapshot1.child('consumed').val();
                 var days        = childSnapshot1.child('days').val();
                 var count       = childSnapshot1.child('count').val();

      var employeeleaverequestref3 = employeeleaverequestref2.child(key2);
          employeeleaverequestref3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

              var key4             = childSnapshot4.key;
              var name             = childSnapshot4.child('name').val();
              var actionstatus     = childSnapshot4.child('status').val();


           var employeeleaverequestref4 = employeeleaverequestref3.child("Approver");
            var leaverequestid     = document.getElementById('leaverequestid1').value;
            var applyconsumed      = document.getElementById('apconsumed2').value;
           
            var status           = "declined";
            var leavecoordinator = "leave coordinator";

                  var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;


            if(key2 == leaverequestid && empid == id && leaveType == LeaveType1 && name == "leave coordinator"){   

                  var avail  = parseFloat(Available);  
                  var con2    = parseFloat(Consume); 
                  var appcon  = parseFloat(applyconsumed); 

                 var levecon = avail + appcon;
                 var con     = con2 - appcon;
                var employeeref9 = employeeref8.child('Leave_Summary');

                employeeref9.child(leavekey).update({
                              Available    : levecon,
                              Consume      : con,

                    });

              employeeleaverequestref2.child(key2).update({
                      status       :  status,
                      balance      :  levecon,
                      consumed     :  con,
                      dateApproved :  dateTime,
                   });

                employeeleaverequestref4.child(key4).update({
                      status :status,
                     });

            
              }
            
            });
           });
          });
        });
        });
       });
      });
     });
    });
  });
  Leave_Request_Employee.once('value', function(snapshot2) {
         snapshot2.forEach(function(childSnapshot2){
           var key                        = childSnapshot2.key;
           var Leave_Request_Employee2    = Leave_Request_Employee1.child(key);

              Leave_Request_Employee2.once('value', function(snapshot3) {
                 snapshot3.forEach(function(childSnapshot3){


                 var key3         = childSnapshot3.key;
                 var status1      = childSnapshot3.child('status').val();
                 var leaveType1   = childSnapshot3.child('leaveType').val();
                 var id1          = childSnapshot3.child('id').val();
                 var balance1     = childSnapshot3.child('balance').val();
                 var consumed1    = childSnapshot3.child('consumed').val();
                 var days1        = childSnapshot3.child('days').val();
                 var count        = childSnapshot3.child('count').val();
                 var dateApplied1 = childSnapshot3.child('dateApplied').val();

      var Leave_Request_Employee3 = Leave_Request_Employee2.child(key3);
          Leave_Request_Employee3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

                 var key4             = childSnapshot4.key;
                 var name             = childSnapshot4.child('name').val();
                 var actionstatus     = childSnapshot4.child('status').val();


                 var Leave_Request_Employee4 = Leave_Request_Employee3.child("Approver");

                 var status           = "declined";
                 var leavecoordinator = "leave coordinator";
                 var applyconsumed    = document.getElementById('apconsumed2').value;
                 var leavedesc        = document.getElementById('leavedesc1').value;
                 var dateapply        = document.getElementById('dateapply2').value;

                var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;
                  if(leavedesc == leaveType1 && dateapply == dateApplied1 && name == "leave coordinator" ){   

                            var avail   = parseFloat(balance1);  
                            var con2    = parseFloat(consumed1); 
                            var appcon  = parseFloat(applyconsumed); 

                           var levecon = avail + appcon;
                           var con     = con2 - appcon;

                        Leave_Request_Employee2.child(key3).update({
                                status       :  status,
                                balance      :  levecon,
                                consumed     :  con,
                                dateApproved :  dateTime,
                             });

                          Leave_Request_Employee4.child(key4).update({
                                status :status,
                               });
                          $('#viewalldetails1').modal("hide");
                          swal({type:'success',title: "Sucessfully declined !",icon: "success",});
                        }
                      });
                    });
                  });
                });
              });
            });


}

function grantrequest1(event){
event.preventDefault();
var usercompanyid                    　    = document.getElementById("userid").value;
var approver                              = db.ref("Company_Approver/" + usercompanyid);
var employeeref1                          = employeeref;


      var employeeref7 = employeeref1;
      employeeref7.once('value', function(snapshot5) {
      snapshot5.forEach(function(childSnapshot5){

      var key3                   = childSnapshot5.key;
      var empid                  = childSnapshot5.child('Employee_Id').val();

      var employeeref8           = employeeref7.child(key3);

      employeeref8.once('value', function(snapshot8) {
      snapshot8.child('Leave_Summary').forEach(function(childSnapshot8){
           var leavekey         = childSnapshot8.key;
           var Consume          = childSnapshot8.child('Consume').val();
           var Available        = childSnapshot8.child('Available').val();
           var NumberofDays     = childSnapshot8.child('NumberofDays').val();
           var LeaveType1       = childSnapshot8.child('LeaveType').val();
           var childData        = childSnapshot8.val();

         employeeleaverequestref.once('value', function(snapshot) {
         snapshot.forEach(function(childSnapshot){
           var key                         = childSnapshot.key;
           var employeeleaverequestref2    = employeeleaverequestref1.child(key);

              employeeleaverequestref2.once('value', function(snapshot1) {
                 snapshot1.forEach(function(childSnapshot1){

                 var key2        = childSnapshot1.key;
                 var status      = childSnapshot1.child('status').val();
                 var leaveType   = childSnapshot1.child('leaveType').val();
                 var id          = childSnapshot1.child('id').val();
                 var balance     = childSnapshot1.child('balance').val();
                 var consumed    = childSnapshot1.child('consumed').val();
                 var days        = childSnapshot1.child('days').val();
                 var count       = childSnapshot1.child('count').val();

      var employeeleaverequestref3 = employeeleaverequestref2.child(key2);
          employeeleaverequestref3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

              var key4             = childSnapshot4.key;
              var name             = childSnapshot4.child('name').val();
              var actionstatus     = childSnapshot4.child('status').val();


             var employeeleaverequestref4 = employeeleaverequestref3.child("Approver");
             var leaverequestid     = document.getElementById('leaverequestid2').value;
             var applyconsumed      = document.getElementById('apconsumed3').value;
           
             var status           = "approved";
             var leavecoordinator = "leave coordinator";

                var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;


            if(key2 == leaverequestid && empid == id && leaveType == LeaveType1  && name == "leave coordinator"){   

                  var consumed          = document.getElementById('apconsumed3').value; 
                  var prevleaveconsumed = document.getElementById('preveconsumed1').value; 
                  var avail   = parseFloat(Available);  
                  var con2    = parseFloat(consumed); 
                  var appcon  = parseFloat(applyconsumed); 
                  var prevleavecon  = parseFloat(prevleaveconsumed); 

                  var levecon = avail - appcon;
                  var con     = con2 + prevleavecon;

                var employeeref9 = employeeref8.child('Leave_Summary');

                employeeref9.child(leavekey).update({
                              Available    : levecon,
                              Consume      : con,
                    });

               employeeleaverequestref2.child(key2).update({
                      status       :  status,
                      balance      :  levecon,
                      consumed     :  con,
                      dateApproved :  dateTime,
                   });

                employeeleaverequestref4.child(key4).update({
                      status :status,
                     });

            
            }
            
            });
           });
          });
        });
        });
       });
      });
     });
    });
  });
  Leave_Request_Employee.once('value', function(snapshot2) {
         snapshot2.forEach(function(childSnapshot2){
           var key                        = childSnapshot2.key;
           var Leave_Request_Employee2    = Leave_Request_Employee1.child(key);

              Leave_Request_Employee2.once('value', function(snapshot3) {
                 snapshot3.forEach(function(childSnapshot3){


                 var key3         = childSnapshot3.key;
                 var status1      = childSnapshot3.child('status').val();
                 var leaveType1   = childSnapshot3.child('leaveType').val();
                 var id1          = childSnapshot3.child('id').val();
                 var balance1     = childSnapshot3.child('balance').val();
                 var consumed1    = childSnapshot3.child('consumed').val();
                 var days1        = childSnapshot3.child('days').val();
                 var count        = childSnapshot3.child('count').val();
                 var dateApplied1 = childSnapshot3.child('dateApplied').val();

      var Leave_Request_Employee3 = Leave_Request_Employee2.child(key3);
          Leave_Request_Employee3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

                 var key4             = childSnapshot4.key;
                 var name             = childSnapshot4.child('name').val();
                 var actionstatus     = childSnapshot4.child('status').val();


                 var Leave_Request_Employee4 = Leave_Request_Employee3.child("Approver");

                 var status           = "approved";
                 var leavecoordinator = "leave coordinator";
                 var applyconsumed    = document.getElementById('apconsumed3').value;
                 var leavedesc        = document.getElementById('leavedesc2').value;
                 var dateapply        = document.getElementById('dateapply3').value;

                var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;


                  if(leavedesc == leaveType1 && dateapply == dateApplied1 && leavecoordinator == "leave coordinator" ){   
                        var consumed          = document.getElementById('apconsumed3').value; 
                        var prevleaveconsumed = document.getElementById('preveconsumed1').value; 
                        var avail   = parseFloat(balance1);  
                        var con2    = parseFloat(consumed); 
                        var appcon  = parseFloat(applyconsumed); 
                        var prevleavecon  = parseFloat(prevleaveconsumed); 

                        var levecon = avail - appcon;
                        var con     = con2 + prevleavecon;
    
                        Leave_Request_Employee2.child(key3).update({
                                status       :  status,
                                balance      :  levecon,
                                consumed     :  con,
                                dateApproved :  dateTime,
                             });

                          Leave_Request_Employee4.child(key4).update({
                                status :status,
                               });
                        $('#declinedmodal').modal("hide");
                         swal({type:'success',title: "Sucessfully approved !",icon: "success",});
                        }
                      });
                    });
                  });
                });
              });
            });

}
function deleterequest(event){
event.preventDefault();
var usercompanyid                    　    = document.getElementById("userid").value;
var approver                              = db.ref("Company_Approver/" + usercompanyid);
var employeeref1                          = employeeref;

    approver.once('value',function(snapshot3){
    snapshot3.forEach(function(childSnapshot3){

    var key1                           = childSnapshot3.key;
    var approverEmployee_Id            = childSnapshot3.child('Employee_Id').val();
    var approverposition               = childSnapshot3.child('Employee_Position').val();
    var approverEmployee_LastName      = childSnapshot3.child('Employee_LastName').val();
    var approverEmployee_FirstName     = childSnapshot3.child('Employee_FirstName').val();
    var approverEmployee_MiddleInitial = childSnapshot3.child('Employee_MiddleInitial').val();

    var fullname = approverEmployee_LastName +',' + approverEmployee_FirstName +' ' + approverEmployee_MiddleInitial;

      employeeref1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){

      var key3                   = childSnapshot2.key;
      var empid                  = childSnapshot2.child('Employee_Id').val();
      var Employee_FirstName     = childSnapshot2.child('Employee_FirstName').val();
      var Employee_LastName      = childSnapshot2.child('Employee_LastName').val();
      var Employee_MiddleInitial = childSnapshot2.child('Employee_MiddleInitial').val();
      var Employee_Suffix        = childSnapshot2.child('Employee_Suffix').val();
      var Employee_Position      = childSnapshot2.child('Employee_Position').val();
          
   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){

        var key                      = childSnapshot.key;

     var employeeleaverequestref2    = employeeleaverequestref1.child(key);
        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){

           var key2       = childSnapshot1.key;
           var status     = childSnapshot1.child('status').val();
           var leaveType  = childSnapshot1.child('leaveType').val();
           var id         = childSnapshot1.child('id').val();

      var employeeleaverequestref3 = employeeleaverequestref2.child(key2);
          employeeleaverequestref3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

              var key4             = childSnapshot4.key;
              var name             = childSnapshot4.child('name').val();
              var actionstatus     = childSnapshot4.child('status').val();
              // console.log(key4);
              // console.log(name)
           var leaverequestid           = document.getElementById('leaverequestid2').value;
           var employeeleaverequestref4 = employeeleaverequestref3.child("Approver");

           var status = "approved";
           var leavecoordinator ="leave coordinator";
         
           if(name == leavecoordinator && key2 == leaverequestid && leavecoordinator == "leave coordinator" ){

                 employeeleaverequestref2.child(key2).remove();
                    $('#declinedmodal').modal("hide");
                     swal({type:'success',title: "Sucessfully Deleted !",icon: "success",});
                 }
                });
               });
              }); 
            });
           });
         });
       });
     });
    });
  });
}
// function grantleavemodal(){
// $('#grantmmodal').on('show.bs.modal', function(e) {
//        var grantkey = $(e.relatedTarget).data('id');
//         $(e.currentTarget).find('input[id="grantkey"]').val(grantkey);

//       var requestId = document.getElementById('grantkey').value;
//       var employeeref1 = employeeref;
//       employeeref1.once('value', function(snapshot2) {
//       snapshot2.forEach(function(childSnapshot2){
//       var key3                   = childSnapshot2.key;
//       var empid                  = childSnapshot2.child('Employee_Id').val();
//       var Employee_FirstName     = childSnapshot2.child('Employee_FirstName').val();
//       var Employee_LastName      = childSnapshot2.child('Employee_LastName').val();
//       var Employee_MiddleInitial = childSnapshot2.child('Employee_MiddleInitial').val();
//       var Employee_Suffix        = childSnapshot2.child('Employee_Suffix').val();
//       if(Employee_Suffix =="-"){
//           Employee_Suffix ="";
//       }
//       var full = Employee_FirstName + " "+ Employee_MiddleInitial+" " + Employee_LastName + Employee_Suffix;

//          employeeleaverequestref.once('value', function(snapshot) {
//         snapshot.forEach(function(childSnapshot){
//         var key                               = childSnapshot.key;
//         document.getElementById('key13').value = key;
//         var employeeleaverequestref2          = employeeleaverequestref1.child(key);
//         employeeleaverequestref2.once('value', function(snapshot1) {
//            snapshot1.forEach(function(childSnapshot1){
//            var key2           = childSnapshot1.key;
//            var status         = childSnapshot1.child('status').val();
//            var leaveType      = childSnapshot1.child('leaveType').val();
//            var id             = childSnapshot1.child('id').val();
//            var days           = childSnapshot1.child('days').val();
//            var consumed       = childSnapshot1.child('consumed').val(); 
//            var dateApplied    = childSnapshot1.child('dateApplied').val(); 
//            var balance        = childSnapshot1.child('balance').val();
//            var leaveFrom      = childSnapshot1.child('leaveFrom').val();
//            var leaveuntil     = childSnapshot1.child('leaveuntil').val();
//            var reason         = childSnapshot1.child('reason').val();
//            var count          = childSnapshot1.child('count').val();
          
          
          
                
//         if (key2 == requestId && id == empid) {
//              document.getElementById('key24').value                   = key2;
//              document.getElementById('leavedesc4').value              = leaveType;
//              document.getElementById('apconsumed4').value             = count;
//              document.getElementById('preveconsumed1').value          = consumed;

//              }
//             });
//            });      
//           });
//         });
//       });
//     });
//   });
// $('#grantmmodal').modal({ backdrop: 'static'});
// }
function yesgrant2(event){
event.preventDefault();
var usercompanyid                    　    = document.getElementById("userid").value;
var approver                              = db.ref("Company_Approver/" + usercompanyid);
var employeeref1                          = employeeref;


      var employeeref7 = employeeref1;
      employeeref7.once('value', function(snapshot5) {
      snapshot5.forEach(function(childSnapshot5){

      var key3                   = childSnapshot5.key;
      var empid                  = childSnapshot5.child('Employee_Id').val();

      var employeeref8           = employeeref7.child(key3);

      employeeref8.once('value', function(snapshot8) {
      snapshot8.child('Leave_Summary').forEach(function(childSnapshot8){
           var leavekey         = childSnapshot8.key;
           var Consume          = childSnapshot8.child('Consume').val();
           var Available        = childSnapshot8.child('Available').val();
           var NumberofDays     = childSnapshot8.child('NumberofDays').val();
           var LeaveType1       = childSnapshot8.child('LeaveType').val();
           var childData        = childSnapshot8.val();

         employeeleaverequestref.once('value', function(snapshot) {
         snapshot.forEach(function(childSnapshot){
           var key                         = childSnapshot.key;
           var employeeleaverequestref2    = employeeleaverequestref1.child(key);

              employeeleaverequestref2.once('value', function(snapshot1) {
                 snapshot1.forEach(function(childSnapshot1){

                 var key2        = childSnapshot1.key;
                 var status      = childSnapshot1.child('status').val();
                 var leaveType   = childSnapshot1.child('leaveType').val();
                 var id          = childSnapshot1.child('id').val();
                 var balance     = childSnapshot1.child('balance').val();
                 var consumed    = childSnapshot1.child('consumed').val();
                 var days        = childSnapshot1.child('days').val();
                 var count       = childSnapshot1.child('count').val();

      var employeeleaverequestref3 = employeeleaverequestref2.child(key2);
          employeeleaverequestref3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

              var key4             = childSnapshot4.key;
              var name             = childSnapshot4.child('name').val();
              var actionstatus     = childSnapshot4.child('status').val();


            var employeeleaverequestref4 = employeeleaverequestref3.child("Approver");
            var leaverequestid     = document.getElementById('grantkey').value;
            var applyconsumed      = document.getElementById('apconsumed4').value;
           
            var status           = "approved";
            var leavecoordinator = "leave coordinator";

                var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;


            if(key2 == leaverequestid && empid == id && leaveType == LeaveType1 && name == "leave coordinator"){   
                  var consumed          = document.getElementById('apconsumed4').value; 
                  var prevleaveconsumed = document.getElementById('prevleaveconsumed4').value; 
                  var avail         = parseFloat(Available);  
                  var con2          = parseFloat(Consume); 
                  var appcon        = parseFloat(applyconsumed); 
                  var con2          = parseFloat(consumed); 
                  var prevleavecon  = parseFloat(prevleaveconsumed); 
                 var levecon = avail - appcon;
                 var con     = appcon + con2;
                 var employeeref9 = employeeref8.child('Leave_Summary');

                employeeref9.child(leavekey).update({
                              Available    :  levecon,
                              Consume      :  con,
                             
                    });

              employeeleaverequestref2.child(key2).update({
                      status       :  status,
                      balance      :  levecon,
                      consumed     :  con,
                      dateApproved :  dateTime,
                   });

                employeeleaverequestref4.child(key4).update({
                      status :status,
                     });
               }
            
            });
           });
          });
         });
        });
       });
      });
     });
    });
  });

  Leave_Request_Employee.once('value', function(snapshot2) {
         snapshot2.forEach(function(childSnapshot2){
           var key                        = childSnapshot2.key;
           var Leave_Request_Employee2    = Leave_Request_Employee1.child(key);

              Leave_Request_Employee2.once('value', function(snapshot3) {
                 snapshot3.forEach(function(childSnapshot3){


                 var key3         = childSnapshot3.key;
                 var status1      = childSnapshot3.child('status').val();
                 var leaveType1   = childSnapshot3.child('leaveType').val();
                 var id1          = childSnapshot3.child('id').val();
                 var balance1     = childSnapshot3.child('balance').val();
                 var consumed1    = childSnapshot3.child('consumed').val();
                 var days1        = childSnapshot3.child('days').val();
                 var count        = childSnapshot3.child('count').val();
                 var dateApplied1 = childSnapshot3.child('dateApplied').val();

      var Leave_Request_Employee3 = Leave_Request_Employee2.child(key3);
          Leave_Request_Employee3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

                 var key4             = childSnapshot4.key;
                 var name             = childSnapshot4.child('name').val();
                 var actionstatus     = childSnapshot4.child('status').val();


                 var Leave_Request_Employee4 = Leave_Request_Employee3.child("Approver");

                 var status           = "approved";
                 var leavecoordinator = "leave coordinator";
                 var applyconsumed    = document.getElementById('apconsumed4').value;
                 var leavedesc        = document.getElementById('leavedesc4').value;
                 var dateapply        = document.getElementById('dateapply4').value;

                var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;


                  if(leavedesc == leaveType1 && dateapply == dateApplied1 && name == "leave coordinator" ){   
                          var consumed = document.getElementById('apconsumed4').value; 
                          var prevleaveconsumed = document.getElementById('prevleaveconsumed4').value; 
                
                            var prevleavecon  = parseFloat(prevleaveconsumed); 

   
                            var avail   = parseFloat(balance1);  
                            var con2    = parseFloat(consumed); 
                            var appcon  = parseFloat(applyconsumed); 

                            var levecon = avail - appcon;
                            var con     = con2 + prevleavecon;
   

                        Leave_Request_Employee2.child(key3).update({
                                status       :  status,
                                balance      :  levecon,
                                consumed     :  con,
                                dateApproved :  dateTime,
                             });

                          Leave_Request_Employee4.child(key4).update({
                                status :status,
                               });
                         
                        }
                      });
                    });
                  });
                });
              });
            });

 $('#grantmmodal').modal("hide");
swal({type:'success',title: "Sucessfully approved !",icon: "success",});

}

function yestodeclined(event){
      event.preventDefault();

var usercompanyid                    　  = document.getElementById("userid").value;
var approver                              = db.ref("Company_Approver/" + usercompanyid);
var employeeref1                          = employeeref;


      var employeeref7 = employeeref1;
      employeeref7.once('value', function(snapshot5) {
      snapshot5.forEach(function(childSnapshot5){

      var key3                   = childSnapshot5.key;
      var empid                  = childSnapshot5.child('Employee_Id').val();

      var employeeref8           = employeeref7.child(key3);

      employeeref8.once('value', function(snapshot8) {
      snapshot8.child('Leave_Summary').forEach(function(childSnapshot8){
           var leavekey         = childSnapshot8.key;
           var Consume          = childSnapshot8.child('Consume').val();
           var Available        = childSnapshot8.child('Available').val();
           var NumberofDays     = childSnapshot8.child('NumberofDays').val();
           var LeaveType1       = childSnapshot8.child('LeaveType').val();
           var childData        = childSnapshot8.val();

         employeeleaverequestref.once('value', function(snapshot) {
         snapshot.forEach(function(childSnapshot){
           var key                         = childSnapshot.key;
           var employeeleaverequestref2    = employeeleaverequestref1.child(key);

              employeeleaverequestref2.once('value', function(snapshot1) {
                 snapshot1.forEach(function(childSnapshot1){

                 var key2        = childSnapshot1.key;
                 var status      = childSnapshot1.child('status').val();
                 var leaveType   = childSnapshot1.child('leaveType').val();
                 var id          = childSnapshot1.child('id').val();
                 var balance     = childSnapshot1.child('balance').val();
                 var consumed    = childSnapshot1.child('consumed').val();
                 var days        = childSnapshot1.child('days').val();
                 var count       = childSnapshot1.child('count').val();

      var employeeleaverequestref3 = employeeleaverequestref2.child(key2);
          employeeleaverequestref3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

              var key4             = childSnapshot4.key;
              var name             = childSnapshot4.child('name').val();
              var actionstatus     = childSnapshot4.child('status').val();


            var employeeleaverequestref4 = employeeleaverequestref3.child("Approver");
            var leaverequestid     = document.getElementById('declinedkey').value;
            var applyconsumed      = document.getElementById('apconsumed5').value;
           
            var status           = "declined";
            var leavecoordinator = "leave coordinator";

                  var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;

            if(key2 == leaverequestid && empid == id && leaveType == LeaveType1 && name == "leave coordinator"){   
              var resond = $("#reasondeclined").val();
              employeeleaverequestref2.child(key2).update({
                      status          :  status,
                      dateApproved    :  dateTime,
                      Reason_Declined :  resond,
                   });

                employeeleaverequestref4.child(key4).update({
                      status :status,
                     });
              }
            
            });
           });
          });
        });
        });
       });
      });
     });
    });
  });
  Leave_Request_Employee.once('value', function(snapshot2) {
         snapshot2.forEach(function(childSnapshot2){
           var key                        = childSnapshot2.key;
           var Leave_Request_Employee2    = Leave_Request_Employee1.child(key);

              Leave_Request_Employee2.once('value', function(snapshot3) {
                 snapshot3.forEach(function(childSnapshot3){


                 var key3         = childSnapshot3.key;
                 var status1      = childSnapshot3.child('status').val();
                 var leaveType1   = childSnapshot3.child('leaveType').val();
                 var id1          = childSnapshot3.child('id').val();
                 var balance1     = childSnapshot3.child('balance').val();
                 var consumed1    = childSnapshot3.child('consumed').val();
                 var days1        = childSnapshot3.child('days').val();
                 var count        = childSnapshot3.child('count').val();
                 var dateApplied1 = childSnapshot3.child('dateApplied').val();

      var Leave_Request_Employee3 = Leave_Request_Employee2.child(key3);
          Leave_Request_Employee3.child('Approver').once('value',function(snapshot4){
             snapshot4.forEach(function(childSnapshot4){

                 var key4             = childSnapshot4.key;
                 var name             = childSnapshot4.child('name').val();
                 var actionstatus     = childSnapshot4.child('status').val();


                 var Leave_Request_Employee4 = Leave_Request_Employee3.child("Approver");

                 var status           = "declined";
                 var leavecoordinator = "leave coordinator";
                 var applyconsumed    = document.getElementById('apconsumed5').value;
                 var leavedesc        = document.getElementById('leavedesc5').value;
                 var dateapply        = document.getElementById('dateapply5').value;

                  var today = new Date();
                  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                  var dateTime = date+' '+time;

                  if(leavedesc == leaveType1 && dateapply == dateApplied1 && name == "leave coordinator" ){   
                        var resond = $("#reasondeclined").val();

                        Leave_Request_Employee2.child(key3).update({
                                status           :  status,
                                Reason_Declined  :  resond,
                                dateApproved     :  dateTime,
                             });

                          Leave_Request_Employee4.child(key4).update({
                                status :status,
                               });
                          $('#declinedmmodal').modal("hide");
                          swal({type:'success',title: "Sucessfully declined !",icon: "success",});
                        }
                      });
                    });
                  });
                });
              });
            }); 

}
function init1(){

$("#grantrequest").on('click',grantrequest);
$("#Declined").on('click',declined);
$("#declinedleaverequest").on('click',declined1);
$("#reapproved").on('click',grantrequest1);
$("#deleterequest").on('click',deleterequest);
$("#yesgrant").on('click',yesgrant2);
$("#yesdeclined").on('click',yestodeclined);

// pendingtable.on('click','button.grant1-btn',grantleavemodal);




}
init1();


////////////////////////////////////END////////////////////////////////////////////////////////



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