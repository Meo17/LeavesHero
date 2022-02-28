 <?php  require_once 'includes/LeaveApplication.php'?>

   <script>
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

  if (user) 
  {

    var user = firebase.auth().currentUser;
    var query = firebase.database().ref("Users").orderByKey();
    query.once("value").then(function(snapshot){  

         snapshot.forEach(function(childSnapshot){

            var key                  =  childSnapshot.key;
            var Company_Name         =  childSnapshot.child("UsersName").val();
            var company_id           =  childSnapshot.child("Company_Id").val();
            var Company_User_Id      =  childSnapshot.child("Company_User_Id").val();
            var password             =  childSnapshot.child("Password").val() ;
            var Type                 =  childSnapshot.child("Type").val() ;
            var childData            =  childSnapshot.val();


          if(user.email == Company_Name && user != null)
          {

              var email_id  =  user.email;
              var user_id   =  user.uid;

              document.getElementById("refuserkey").value      =  key;
              document.getElementById("userKey").value         =  Company_User_Id;
              document.getElementById("userid").value          =  company_id; 
              document.getElementById("email_id").value        =  email_id; 
  
          }
      
         });

    var ukey   =  document.getElementById("userKey").value;
    var query1 = firebase.database().ref("Employee").child(ukey);
    query1.once("value").then(function(snapshot){

         snapshot.forEach(function(childSnapshot){
   
            var key                         =  childSnapshot.key;
            var lname                       =  childSnapshot.child("Employee_LastName").val();
            var fname                       =  childSnapshot.child("Employee_FirstName").val();
            var mi                          =  childSnapshot.child("Employee_MiddleInitial").val();
            var Employee_Id                 =  childSnapshot.child("Employee_Id").val();
            var Company_Id                  =  childSnapshot.child("Company_Id").val();
            var suffix                      =  childSnapshot.child("Employee_Suffix").val();
            var datehired                   =  childSnapshot.child("Employee_HireDate").val();
            var bdate                       =  childSnapshot.child("Employee_Birthdate").val();
            var religion                    =  childSnapshot.child("Employee_Religion").val();
            var status                      =  childSnapshot.child("Employee_Status").val();
            var contact                     =  childSnapshot.child("Employee_Contact1").val();
            var email                       =  childSnapshot.child("Employee_Email").val();
            var contactperson               =  childSnapshot.child("Employee_ContactPerson").val();
            var contactpersonnumber         =  childSnapshot.child("Employee_ContactPersonNumber").val();
            var department                  =  childSnapshot.child("Employee_Department").val();
            var position                    =  childSnapshot.child("Employee_Position").val();
            var profilepic                  =  childSnapshot.child("Employee_Profile_Pic").val();
            var address                     =  childSnapshot.child("Employee_Address").val();
            var sex                         =  childSnapshot.child("Employee_Sex").val();
            var maritalstatus               =  childSnapshot.child("Employee_MaritalStatus").val();
            var Branch                      =  childSnapshot.child("Branch").val();
            var name                        =  childSnapshot.child("Username").val();   
            var password                    =  childSnapshot.child("Password").val();
            var Employee_Profile_Pic        =  childSnapshot.child("Employee_Profile_Pic").val();
            if(suffix = "-"){
              suffix ="";
            }
            var childData                   =  childSnapshot.val();

            var fullname                    =  fname + " " + mi + " " + lname + " " + suffix;
            var fullname2                   =  lname + ", " + fname + " " + mi + " " + suffix +'('+position+')';
            if(Employee_Profile_Pic == ""){
              Employee_Profile_Pic  = document.querySelector("#profile").src = "images/icon_user.png"; 
            }
          if(user.email == name && user != null ){

              document.querySelector('#profile').src                     =  Employee_Profile_Pic;
              document.querySelector('#image_upload_preview').src        =  Employee_Profile_Pic;
              document.getElementById("photourl").value                  =  Employee_Profile_Pic; 
              document.getElementById("empkey").value                    =  key; 
              document.getElementById("password").value                  =  password; 
              document.getElementById("userid").value                    =  Company_Id; 
              document.getElementById("empid").value                     =  Employee_Id; 
              document.getElementById("fullname").innerHTML              =  fullname;
              document.getElementById("fullname1").value                 =  fullname2;


             
            }

         });
     var userKey =  document.getElementById("userKey").value;
      var query3 = firebase.database().ref('Company_Approver').child(userKey);
           query3.on('value', function(snapshot1) {
         snapshot1.forEach(function(childSnapsot1){
   
           var Employee_Id         =  childSnapsot1.child("Employee_Id").val();
           var empidno             = document.getElementById("empid").value;
           if(Employee_Id == empidno){
            console.log(Employee_Id);
            $('#leaverequestnav')
                 .unbind()
                 .show();
          

           }
        }); 
      }); 
       });
       var comid =  document.getElementById("userid").value;
       var query2 = firebase.database().ref('Subscriber').child(comid);
       query2.on('value', function(snapshot) {

       var Company_Name         =  snapshot.child("Company_Name").val();
       document.getElementById("companyname").innerHTML   =  Company_Name;

     });
       

var usercompanyid                    　=  document.getElementById("userKey").value;
var db                               　=  firebase.database();
var employeeleaverequestref          　=  db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         　=  db.ref("Leave_Request/"+usercompanyid);
var Leave_Request_Employee           　=  db.ref("Leave_Request_Employee/"+usercompanyid);
var Leave_Request_Employee1         　 =  db.ref("Leave_Request_Employee/"+usercompanyid);
var employeeref                       =  db.ref("Employee/"+usercompanyid);

var pendingtable                     　=  $('#employeeleaveRequest tbody');

function getemployeeleaverequest(){
pendingtable.empty();

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
           var key2         = childSnapshot1.key;
           var status       = childSnapshot1.child('status').val();
           var leaveType    = childSnapshot1.child('leaveType').val();
           var id           = childSnapshot1.child('id').val();
           var duration     = childSnapshot1.child('duration').val();
           var days         = childSnapshot1.child('days').val();
           var balance      = childSnapshot1.child('balance').val();
           var consumed     = childSnapshot1.child('consumed').val();
           var dateApplied  = childSnapshot1.child('dateApplied').val();
           var leaveFrom    = childSnapshot1.child('leaveFrom').val();
           var leaveuntil   = childSnapshot1.child('leaveuntil').val();
           var name         = childSnapshot1.child('name').val();
           var reason       = childSnapshot1.child('reason').val();

         var employeeleaverequestref4 = employeeleaverequestref2.child(key2);
        employeeleaverequestref4.child('Approver').once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4             = childSnapshot4.key;
            var apname           = childSnapshot4.child('name').val();
            var aprovalstat      = childSnapshot4.child('status').val();
            var approverfullname = document.getElementById('fullname1').value;

   
            if(aprovalstat =="no action"  && id == empid && apname == approverfullname && status=="waiting for approval" ){

                pendingtable.append(
              '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ empid+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ name+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ leaveType+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ duration+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ consumed+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ leaveFrom+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ leaveuntil+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ reason+'</td>'+  
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:#4d79ff"><b>'+status+'<b></p></td>'+
                  '<td style="font-size: 10px;text-align: center">'+
                   '<button class ="viewapply  btn leave btn btn-leave btn-hover-white btn-sm button" style="font-size: 10px;width:75px" data-key="'+ key2 + '" data-toggle="modal" data-id="'+ key2 + '"title="view all details"   >View</button> ' +
                   '<button style=" font-size: 10px;text-align: center padding-top:3px;margin-top:10px;margin-bottom:10px;width:75px" class ="grant-btn btn-gray btn btn-info btn-hover-lightgray btn-sm top button" data-key="'+ key2 + '" data-toggle="modal" data-id="'+ key2 + '"   title="Grant">Grant</button> ' +
                   '<button  style="font-size: 10px;text-align: center margin-top:10px;padding-top:3px"class =" button diclined-btn btn leave  btn btn-leave btn-danger btn-hover-white btn-sm" data-key="'+ key2 + '" data-toggle="modal" data-id="'+ key2 + '" title="Declined">Declined</button> ' +

                '</td>'+
                '</tr>'
              );
                var seen = {};
              $('#employeeleaveRequest tr').each(function() {
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
     });
   }); 
  });  
 });


}
function notif(){
var myArray;
myArray = [];
var count;

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
           var status       = childSnapshot1.child('status').val();
           var leaveType    = childSnapshot1.child('leaveType').val();
           var id           = childSnapshot1.child('id').val();
           var duration     = childSnapshot1.child('duration').val();
           var days         = childSnapshot1.child('days').val();
           var balance      = childSnapshot1.child('balance').val();
           var consumed     = childSnapshot1.child('consumed').val();
           var dateApplied  = childSnapshot1.child('dateApplied').val();
           var leaveFrom    = childSnapshot1.child('leaveFrom').val();
           var leaveuntil   = childSnapshot1.child('leaveuntil').val();
           var name         = childSnapshot1.child('name').val();
           var reason       = childSnapshot1.child('reason').val();

         var employeeleaverequestref4 = employeeleaverequestref2.child(key2);
        employeeleaverequestref4.child('Approver').once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4            = childSnapshot4.key;
            var apname          = childSnapshot4.child('name').val();
            var aprovalstat     = childSnapshot4.child('status').val();
            var approverfullname = document.getElementById('fullname1').value;
            if(aprovalstat =='no action' && id == empid &&apname == approverfullname && status == "waiting for approval"  ){
               myArray.push(key2);
               count =  myArray.length;
               document.getElementById('count').innerHTML = count;
                document.getElementById('count1').value = count;
              var count2 = document.getElementById('count1').value;
                  $('#badge1').unbind().show();

               
              }   

            });
           });      
          });
        });
     });
   }); 
  });  
 });
}
function init(){


  employeeleaverequestref.on('child_removed',getemployeeleaverequest);
  employeeleaverequestref.on('child_changed',getemployeeleaverequest);

  getemployeeleaverequest();
  notif();
  reload_notif();
}
function reload_notif(){
   window.setInterval(notif, 1000);
}
init(); 

$(function ($) {
 $('#viewalldetails').on('hidden.bs.modal', function (e) {
          $("#subdoct").empty();
           $("#Approvers").empty();
});

 



  var requestId1 =document.getElementById('leaverequestid').value;

 //////////////////////////// VIEW LEAVE REQUEST ///////////////////
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
          
          
          
                
             if (key2 == requestId && id == empid) {
             document.getElementById('key2').value = key2;
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
             document.getElementById('updatedateapplied').value      = dateApplied;
             document.getElementById('updateleavetype').value        = leaveType;
            var kay01 =   document.getElementById('key1').value;
            var employeeleaverequestref01 = employeeleaverequestref.child(key);
            var employeeleaverequestref02 = employeeleaverequestref01.child(key2);

            employeeleaverequestref02.child('requirements').once('value', function(snapshot2) {
            snapshot2.forEach(function(childSnapshot2){

           var key5                   = childSnapshot2.key;
           var ImageLink              = childSnapshot2.child('ImageLink').val();
       
            console.log(key5);
            console.log(ImageLink);


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

              if(ImageLink =='null'){
                $('#subdoct').append('');
              }else{
                $('#subdoct').append(
                '<a  href="'+ImageLink +'" download ><img id="myrequirements" style="height:100px;width:100px;padding:auto" src="'+ImageLink+'"></img></a>'
                )

              }
             }
            });
           });      
          });
        });
      });
    });
 
  
       $("#viewalldetails").modal("show");

   });
 //////////////////////////// GRANT LEAVE REQUEST ///////////////////
   pendingtable.on('click', '.grant-btn ', function () {
        var id = $(this).data('id');
        $('#leaverequestid1').val(id);
       

       var requestId     = document.getElementById('leaverequestid1').value;
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
                  if (key2 == requestId && id == empid) {
                     
                     document.getElementById('updatedateapplied1').value      = dateApplied;
                     document.getElementById('updateleavetype1').value        = leaveType;
                   }

                });
               });
             });
           });
          });
         });
              $("#grant").modal("show");

        });
    //////////////////////////// Diclined LEAVE REQUEST ///////////////////
   pendingtable.on('click', '.diclined-btn ', function () {
        var id = $(this).data('id');
        $('#leaverequestid2').val(id);


       var requestId     = document.getElementById('leaverequestid2').value;
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
                  if (key2 == requestId && id == empid) {
                     
                     document.getElementById('updatedateapplied2').value      = dateApplied;
                     document.getElementById('updateleavetype2').value        = leaveType;
                   }

                });
               });
             });
           });
          });
         });


        $("#declined").modal("show");

      });
 });
 function grantrequest(event){
event.preventDefault();

   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2        = childSnapshot1.key;

         var employeeleaverequestref4 = employeeleaverequestref2.child(key2);
         var employeeleaverequestref5 = employeeleaverequestref4.child('Approver');
        employeeleaverequestref5.once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4             = childSnapshot4.key;
            var apname           = childSnapshot4.child('name').val();
            var approverfullname = document.getElementById('fullname1').value;

            var status = "approved";
            var leaverequestid           = document.getElementById('leaverequestid').value;
            var statApproved ="statApproved";
           if(apname == approverfullname  && key2 == leaverequestid ){

             employeeleaverequestref5.child(key4).update({
                  status :status,
                  action :statApproved,
                 });
     
           
                }

             });
            });
           });
         });
      });
   });
  Leave_Request_Employee.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var Leave_Request_Employee2 = Leave_Request_Employee1.child(key);

        Leave_Request_Employee2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2               = childSnapshot1.key;
           var dateApplied        = childSnapshot1.child('dateApplied').val();
           var leaveType          = childSnapshot1.child('leaveType').val();

         var Leave_Request_Employee4 = Leave_Request_Employee2.child(key2);
         var Leave_Request_Employee5 = Leave_Request_Employee4.child('Approver');
        Leave_Request_Employee5.once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4             = childSnapshot4.key;
            var apname           = childSnapshot4.child('name').val();
            var approverfullname = document.getElementById('fullname1').value;

            var status = "approved";
            var updatedateapplied           = document.getElementById('updatedateapplied').value;
            var updateleavetype           = document.getElementById('updateleavetype').value;
             var statApproved ="statApproved";
           if(apname == approverfullname  &&  updateleavetype == leaveType && updatedateapplied == dateApplied){

             Leave_Request_Employee5.child(key4).update({
                  status :status,
                  action :statApproved,
                 });
       
                $('#viewalldetails').modal("hide");
                 swal({type:'success',title: "Sucessfully Approved !",icon: "success",});
              }else{
                 swal({type:'error',title: "Something Wrong !",icon: "error",});
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

   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2        = childSnapshot1.key;

         var employeeleaverequestref4 = employeeleaverequestref2.child(key2);
         var employeeleaverequestref5 = employeeleaverequestref4.child('Approver');
        employeeleaverequestref5.once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4             = childSnapshot4.key;
            var apname           = childSnapshot4.child('name').val();

            var approverfullname = document.getElementById('fullname1').value;

            var status = "approved";
            var leaverequestid           = document.getElementById('leaverequestid1').value;
            var statApproved ="statApproved";
           if(apname == approverfullname  && key2 == leaverequestid ){

             employeeleaverequestref5.child(key4).update({
                  status :status,
                  action :statApproved,
                 });
     
            
                }

             });
            });
           });
         });
      });
   });

     Leave_Request_Employee.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var Leave_Request_Employee2 = Leave_Request_Employee1.child(key);

        Leave_Request_Employee2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2               = childSnapshot1.key;
           var dateApplied        = childSnapshot1.child('dateApplied').val();
           var leaveType          = childSnapshot1.child('leaveType').val();

         var Leave_Request_Employee4 = Leave_Request_Employee2.child(key2);
         var Leave_Request_Employee5 = Leave_Request_Employee4.child('Approver');
        Leave_Request_Employee5.once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4             = childSnapshot4.key;
            var apname           = childSnapshot4.child('name').val();
            var approverfullname = document.getElementById('fullname1').value;

            var status = "approved";
            var updatedateapplied           = document.getElementById('updatedateapplied1').value;
            var updateleavetype             = document.getElementById('updateleavetype1').value;
             var statApproved ="statApproved";
           if(apname == approverfullname  &&  updateleavetype == leaveType && updatedateapplied == dateApplied){

             Leave_Request_Employee5.child(key4).update({
                  status :status,
                  action :statApproved,
                 });
       
               $('#grant').modal("hide");
                swal({type:'success',title: "Sucessfully Approved !",icon: "success",});
                }else{
                  swal({type:'error',title: "Something Wrong !",icon: "error",});
                }

             });
            });
           });
         });
      });
   }); 
 }

function disapproved(event){
event.preventDefault();
   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2        = childSnapshot1.key;

         var employeeleaverequestref4 = employeeleaverequestref2.child(key2);
         var employeeleaverequestref5 = employeeleaverequestref4.child('Approver');
        employeeleaverequestref5.once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4             = childSnapshot4.key;
            var apname           = childSnapshot4.child('name').val();
            var approverfullname = document.getElementById('fullname1').value;

            var status = "declined";
            var leaverequestid           = document.getElementById('leaverequestid').value;
            var statDeclined ="statDeclined";
           if(apname == approverfullname  && key2 == leaverequestid ){

             employeeleaverequestref5.child(key4).update({
                  status :status,
                  action : statDeclined,
                 });
     
              
              }

             });
            });
           });
         });
      });
   });
  Leave_Request_Employee.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var Leave_Request_Employee2 = Leave_Request_Employee1.child(key);

        Leave_Request_Employee2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2               = childSnapshot1.key;
           var dateApplied        = childSnapshot1.child('dateApplied').val();
           var leaveType          = childSnapshot1.child('leaveType').val();

         var Leave_Request_Employee4 = Leave_Request_Employee2.child(key2);
         var Leave_Request_Employee5 = Leave_Request_Employee4.child('Approver');
        Leave_Request_Employee5.once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4             = childSnapshot4.key;
            var apname           = childSnapshot4.child('name').val();
            var approverfullname = document.getElementById('fullname1').value;

            var status = "declined";
            var updatedateapplied           = document.getElementById('updatedateapplied').value;
            var updateleavetype             = document.getElementById('updateleavetype').value;
            var statDeclined ="statDeclined";
           if(apname == approverfullname  &&  updateleavetype == leaveType && updatedateapplied == dateApplied){

             Leave_Request_Employee5.child(key4).update({
                  status :status,
                  action :statDeclined,
                 });
       
                $('#viewalldetails').modal("hide");
                 swal({type:'success',title: "Sucessfully Disapproved  !",icon: "success",});
                }else{
                  swal({type:'error',title: "Something Wrong  !",icon: "error",});
                }
             });
            });
           });
         });
      });
   });

}
function disapproved1(event){
event.preventDefault();
   employeeleaverequestref.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var employeeleaverequestref2 = employeeleaverequestref1.child(key);

        employeeleaverequestref2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2        = childSnapshot1.key;

         var employeeleaverequestref4 = employeeleaverequestref2.child(key2);
         var employeeleaverequestref5 = employeeleaverequestref4.child('Approver');
        employeeleaverequestref5.once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4             = childSnapshot4.key;
            var apname           = childSnapshot4.child('name').val();
            var approverfullname = document.getElementById('fullname1').value;

            var status = "declined";
            var leaverequestid           = document.getElementById('leaverequestid2').value;
            var statDeclined ="statDeclined";
            var reasondeclined              = document.getElementById('reaseondisapprover').value;
           if(apname == approverfullname  && key2 == leaverequestid ){

             employeeleaverequestref5.child(key4).update({
                  status : status,
                  action : statDeclined,
                  Declined_Reason :reasondeclined,
                 });
     
              
              }

             });
            });
           });
         });
      });
   });
  Leave_Request_Employee.once('value', function(snapshot) {
   snapshot.forEach(function(childSnapshot){
        var key = childSnapshot.key;
        var Leave_Request_Employee2 = Leave_Request_Employee1.child(key);

        Leave_Request_Employee2.once('value', function(snapshot1) {
           snapshot1.forEach(function(childSnapshot1){
           var key2               = childSnapshot1.key;
           var dateApplied        = childSnapshot1.child('dateApplied').val();
           var leaveType          = childSnapshot1.child('leaveType').val();

         var Leave_Request_Employee4 = Leave_Request_Employee2.child(key2);
         var Leave_Request_Employee5 = Leave_Request_Employee4.child('Approver');
        Leave_Request_Employee5.once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4             = childSnapshot4.key;
            var apname           = childSnapshot4.child('name').val();
            var approverfullname = document.getElementById('fullname1').value;

            var status = "declined";
            var updatedateapplied           = document.getElementById('updatedateapplied2').value;
            var updateleavetype             = document.getElementById('updateleavetype2').value;
            var reasondeclined              = document.getElementById('reaseondisapprover').value;
            var statDeclined ="statDeclined";
           if(apname == approverfullname  &&  updateleavetype == leaveType && updatedateapplied == dateApplied){

             Leave_Request_Employee5.child(key4).update({
                  status          : status,
                  Declined_Reason : reasondeclined,
                  action          : statDeclined,
                 });
       
                  $('#declined').modal("hide");
                   swal({type:'success',title: "Sucessfully Disapproved  !",icon: "success",});
                  // $('#alertnotification').append('<div class="alert success">'+
                  //    '<span class="closebtn">&times;</span>'+  
                  //    '<strong>Success!</strong> Employee leave request was declined'+
                  //    '</div>');
                  // var close = document.getElementsByClassName("closebtn");
                  // var i;

                  // for (i = 0; i < close.length; i++) {
                  //   close[i].onclick = function(){
                  //     var div = this.parentElement;
                  //     div.style.opacity = "0";
                  //     setTimeout(function(){ div.style.display = "none"; }, 100);
                  //   }
                  // }
                }else{
                  swal({type:'error',title: "Something Wrong  !",icon: "error",});
                }
             });
            });
           });
         });
      });
   });

}
function reload_getpending(){
   window.setInterval(getpending, 1000);
}
var db2                               　=  firebase.database();
var usercompanyid                    　 =  document.getElementById("userKey").value;
var retrieveforceleave                 =  db2.ref("ForceLeave/"+usercompanyid);  

function rerforceleave() {

    retrieveforceleave.once('value', function(snapshot) {
      snapshot.forEach(function(childSnapshot){
      var key                    = childSnapshot.key;
 console.log(key);

  var retrieveforceleave1 = retrieveforceleave.child(key);
      retrieveforceleave1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key2                    = childSnapshot2.key;
 console.log(key2);
 var retrieveforceleave2 = retrieveforceleave1.child(key2);
    retrieveforceleave2.once('value', function(snapshot3) {
   
      var key3                   = snapshot3.key;
      var dateApplied            = snapshot3.child('dateApplied').val();
      var leaveFrom              = snapshot3.child('leaveFrom').val();
      var leaveType              = snapshot3.child('leaveType').val();
      var leaveuntil             = snapshot3.child('leaveuntil').val();
      var reason                 = snapshot3.child('reason').val();
      var status                 = snapshot3.child('status').val();
      var email                  = snapshot3.child('email').val();

      var email_id =document.getElementById('email_id').value;
       $(document).ready(function(){
              $("#forceleavemodal").modal('show');
             });
       
      if(email_id == email){
           console.log(key3);
           if(status ==''){
          
              $("#body").append(
                ' <div class="modal fade" id="forceleavemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
                '<div class="modal-dialog" style="width: 300px">'+
                '<form method="post">'+
                '<div class="modal-content">'+
                '<div class="modal-header">'+
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
                ' <center><b id="myModalLabelForce"style="font-size:17px"><h4 class="modal-title"></h4></b></center>'+
                ' </div>'+
                '<div class="modal-body" >'+  
                '<p class="text-center"><b>Please Click accept to verify   that you reciecve this information</p></b>'+
                '<h5 class="text-center fullname"></h5>'+
                '<input type="text" name="bookId1" value="" id="keys3"  hidden/>'+
                 '<label style="margin-left:20px;margin-top:20px">Date Submitted   :<p id="forceleavedatesend"style="margin-left:20px"></p></label>'+
                 '<label style="margin-left:20px">Start Date       :<p id="forceleavestart"style="margin-left:20px"></p></label>'+
                 '<label style="margin-left:30px">End Date         :<p id="forceleaveend"style="margin-left:20px"></p></label>'+
                 '<label style="margin-left:20px">Reason   :<p id="forceleavereason"style="margin-left:20px"></p></label>'+
                 '</div>'+
                 '<div class="modal-footer">'+
                  '<button type="button" class="btn-remove-key btn btn-default" data-key="key" name="updatestatus"style="font-size:12px "><span class="glyphicon glyphicon-check" style="margin-right: 10px" onclick="accepted()"></span>Accept</button>'+
                 '</div>'+
                 '</div>'+
                 '</form>'+
                '</div>'+
                 ' </div>'
                );
         
              document.getElementById('myModalLabelForce').innerHTML      = leaveType;
              document.getElementById('forceleavedatesend').innerHTML     = dateApplied;
              document.getElementById('forceleavestart').innerHTML        = leaveFrom;
              document.getElementById('forceleaveend').innerHTML          = leaveuntil;
              document.getElementById('forceleavereason').innerHTML       = reason;

     $('#forceleavemodal').modal({
                backdrop: 'static'
              });
          
   

           }
           

            }
              
           });
           });
         });
        });
      });
  

}
function accepted(){


    retrieveforceleave.once('value', function(snapshot) {
      snapshot.forEach(function(childSnapshot){
      var key                    = childSnapshot.key;
 console.log(key);

  var retrieveforceleave1 = retrieveforceleave.child(key);
      retrieveforceleave1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key2                    = childSnapshot2.key;
 console.log(key2);
 var retrieveforceleave2 = retrieveforceleave1.child(key2);
    retrieveforceleave2.once('value', function(snapshot3) {
   
      var key3                   = snapshot3.key;
      var dateApplied            = snapshot3.child('dateApplied').val();
      var leaveFrom              = snapshot3.child('leaveFrom').val();
      var leaveType              = snapshot3.child('leaveType').val();
      var leaveuntil             = snapshot3.child('leaveuntil').val();
      var reason                 = snapshot3.child('reason').val();
      var status                 = snapshot3.child('status').val();
      var email                  = snapshot3.child('email').val();

      var email_id =document.getElementById('email_id').value;
    
       
      if(email_id == email){
           console.log(key3);
           if(status ==' '){
        var updatestatus        = "accepted";
            var leabveforce =retrieveforceleave2.child(key3);
             leabveforce.update({status:updatestatus})

         
          
           }
            }    
           });
           });
         });
        });
      });
  $("#forceleavemodal").modal('hide');
             swal({type:'success',title: "Sucessfully Sent !",icon: "success"});
}
function init1(){
$("#grantrequest").on('click',grantrequest);
$("#Declined").on('click',disapproved);
$("#yestogrant").on('click',grantrequest1);
$("#disapproved").on('click',disapproved1);
//$('#accept').on("click",accepted);
$('#forceleavemodal').modal({backdrop: 'static'});
   rerforceleave();

}
 init1();

  });

  }
   else {
    // No user is signed in.
    console("No user is signed in.");

  }
/////////////////////////////////////////////StART////////////////////////////////////////////////////

//////////////////////////////END/////////////////////////////////////////////////////////////////////////////////////

});

function logout(){
    firebase.auth().signOut().then(function() {
       window.location.href = "index.php";
      console.log('Signed Out');
    }, function(error) {
      console.error('Sign Out Error', error);

    });
}
function reload(){
  window.refresh();
}
</script>





