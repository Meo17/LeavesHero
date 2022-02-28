<?php require_once 'includes/EmployeeLeaveRecord.php'?>
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
    if(user != null ){

      var email_id = user.email;
      var user_id = user.uid;
     
      document.getElementById("empuserskey").value     =  user_id;
      document.getElementById("email_id").value     =  email_id;

    }
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
          if(Employee_Profile_Pic == ""){
              Employee_Profile_Pic  = document.querySelector("#profile").src = "images/icon_user.png"; 
            }
            var childData                   =  childSnapshot.val();
            var fullname                     =  fname + " " + mi + " " + lname + " " + suffix;
            var fullname1                    =  fname + " " + mi + " " + lname + " " + suffix;
            var fullname2                    =  lname + ", "+ fname + " " + mi +" " + suffix;
            var updateappfullname            =  lname + ", "+ fname + " " + mi +" " + suffix +'('+position+')';
            var fullname5                    =  lname + ", " + fname + " " + mi + " " + suffix +'('+position+')';
          if(user.email == name && user != null){
              document.querySelector('#profile').src                        =  Employee_Profile_Pic;
              document.querySelector('#image_upload_preview').src           =  Employee_Profile_Pic;
              document.getElementById("photourl").value                     =  Employee_Profile_Pic; 
              document.getElementById("empkey").value                       =  key; 
              document.getElementById("password").value                     =  password; 
              document.getElementById("userid").value                       =  Company_Id
              document.getElementById("fullname").innerHTML                 =  fullname;
              document.getElementById("fullname1").value                    =  fullname1;
              document.getElementById("empid").value                        =  Employee_Id;
              document.getElementById("fullname5").value                    =  fullname2;
              document.getElementById("aplicantfullname1").innerHTML        =  fullname;
              document.getElementById("empidno1").innerHTML                 =  Employee_Id;    
              document.getElementById("emp_id").value                       =  Employee_Id;
            }
var pairukey                         =   document.getElementById("userKey").value;
var db                               =   firebase.database();
var ret_approverref                  =   db.ref('Company_Approver/'+pairukey);

     ret_approverref.once("value").then(function(snapshot){  
            snapshot.forEach(function(childSnapshot){
            var appkey                           = childSnapshot.key;
            var appEmployee_FirstName            = childSnapshot.child("Employee_FirstName").val();
            var appEmployee_LastName             = childSnapshot.child("Employee_LastName").val();
            var appEmployee_MiddleInitial        = childSnapshot.child("Employee_MiddleInitial").val();
            var appEmployee_Position             = childSnapshot.child("Employee_Position").val();
            var appEmployee_Suffix               = childSnapshot.child("Employee_Suffix").val();

            var fullName = appEmployee_LastName  + ", " + appEmployee_FirstName  + " " +appEmployee_MiddleInitial +" "+appEmployee_Suffix;
  
            console.log(fullName);
           if( fullName != fullname2) {
               $("#selectapprover1").empty();
               $("#selectapprover1").append("<label class='checkbox-inline'><input type='checkbox' name='ids1' value='"+ fullName +'('+appEmployee_Position+')'+"' id='approver1'>" + fullName + "<p style='color:red '>"+appEmployee_Position+"</p></label>");

       
              }
                 $('input:checkbox[name=leavecor]').attr('checked',true);
                 $('input:checkbox[name=leavecor2]').attr('checked',true);

              });         
             });
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
var Employee_Id                      =   document.getElementById("emp_id").value;
var empuserskey                      =   document.getElementById("empuserskey").value;
var comuid                           =   document.getElementById("userKey").value;
var db1                              =   firebase.database();
 
var my_leave_request                 =   db1.ref('Leave_Request_Employee/'+comuid+'/'+empuserskey+'');
var Leave_RequestRef                 =   db1.ref('Leave_Request/'+comuid+'/'+empuserskey+'');
var ForceLeaveRef                    =   db1.ref('ForceLeave/'+comuid+'/'+Employee_Id+'');
var my_leave_request_table1          =   $('#Accepted tbody');
var my_leave_request_table3          =   $('#Rejected tbody');


function leaverequest(){
  my_leave_request_table1.empty();
    my_leave_request.on('child_added',function(myrequest){
        var key      =  myrequest.key;
        myrequest    =  myrequest.val();

   var array;
               array = [];
     var array1;
               array1 = [];
    var  my_leave_request2 = my_leave_request.child(key);
      my_leave_request2.child('Approver').once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
           var name     =  childSnapshot.child("name").val();
          var status    =  childSnapshot.child("status").val();
              if (status =='approved' ){
              array.push(name);
             console.log(array);
             document.getElementById("approverlist").value = array;
              }
            if (status =='declined' ){
              array1.push(name);
             
             document.getElementById("declinedlist").value = array1;
              }
       
              });
       }); 
  console.log(array);          
console.log(array1);
    if(myrequest.status =='approved'){
              var from = new Date(myrequest.leaveFrom);
            var hours = from.getHours() % 12;
              hours = hours ? hours : 12;
                var fromtest = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][(from.getMonth())] + " " + 
                ("00" + from.getDate()).slice(-2) + " " + 
               from.getFullYear() + " " + 
                ("00" + hours).slice(-2) + ":" + 
                ("00" + from.getMinutes()).slice(-2) + ":" + 
                ("00" + from.getSeconds()).slice(-2) + ' ' + (from.getHours() >= 12 ? 'PM' : 'AM'); 

          var until = new Date(myrequest.leaveuntil);
            var hours = until.getHours() % 12;
              hours = hours ? hours : 12;
                var untiltest = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][(until.getMonth() )] + " " + 
                ("00" + until.getDate()).slice(-2) + " " + 
                until.getFullYear() + " " + 
                ("00" + hours).slice(-2) + ":" + 
                ("00" + until.getMinutes()).slice(-2) + ":" + 
                ("00" + until.getSeconds()).slice(-2) + ' ' + (until.getHours() >= 12 ? 'PM' : 'AM'); 
                
          var dateApplied = new Date(myrequest.dateApproved);
            var hours = until.getHours() % 12;
              hours = hours ? hours : 12;
                var dateAppliedtest = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][(dateApplied.getMonth())] + " " + 
                ("00" + dateApplied.getDate()).slice(-2) + " " + 
                dateApplied.getFullYear() + " " + 
                ("00" + hours).slice(-2) + ":" + 
                ("00" + dateApplied.getMinutes()).slice(-2) + ":" + 
                ("00" + dateApplied.getSeconds()).slice(-2) + ' ' + (dateApplied.getHours() >= 12 ? 'PM' : 'AM'); 
  var arry =  document.getElementById("approverlist").value;
            my_leave_request_table1.append(
            '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.leaveType+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.duration+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.consumed+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ fromtest+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ untiltest+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ dateAppliedtest+'</td>'+  
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:#4d79ff"><b>'+myrequest.status+'<b></p></td>'+
            '<td style="font-size: 13px;text-align: center">'+
                 '<button class ="del btn    btn btn-leave btn-danger btn-hover-white btn-sm" style="font-size: 10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"   data-target="#Delete">Delete</button> ' +
                    '</td>'+
                '</tr>'
          );
              var seen = {};
              my_leave_request_table1.each(function() {
                  var txt = $(this).children("td:eq(2)").text();
                  if (seen[txt])
                      $(this).remove();
                  else
                      seen[txt] = true;
              });
       }
   
 });
}
function leaverequest1(){
  my_leave_request_table3.empty();
    my_leave_request.on('child_added',function(myrequest){
        var key      =  myrequest.key;
        myrequest    =  myrequest.val();

   var array;
               array = [];
     var array1;
               array1 = [];
    var  my_leave_request2 = my_leave_request.child(key);
      my_leave_request2.child('Approver').once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
           var name     =  childSnapshot.child("name").val();
          var status    =  childSnapshot.child("status").val();
              if (status =='approved' ){
              array.push(name);
             console.log(array);
             document.getElementById("approverlist").value = array;
              }
            if (status =='declined' ){
              array1.push(name);
             
             document.getElementById("declinedlist").value = array1;
              }
       
              });
       }); 
  console.log(array);          
console.log(array1);

    if(myrequest.status =='declined'){
            var from = new Date(myrequest.leaveFrom);
            var hours = from.getHours() % 12;
              hours = hours ? hours : 12;
                var fromtest = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][(from.getMonth())] + " " + 
                ("00" + from.getDate()).slice(-2) + " " + 
               from.getFullYear() + " " + 
                ("00" + hours).slice(-2) + ":" + 
                ("00" + from.getMinutes()).slice(-2) + ":" + 
                ("00" + from.getSeconds()).slice(-2) + ' ' + (from.getHours() >= 12 ? 'PM' : 'AM'); 

          var until = new Date(myrequest.leaveuntil);
            var hours = until.getHours() % 12;
              hours = hours ? hours : 12;
                var untiltest = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][(until.getMonth() )] + " " + 
                ("00" + until.getDate()).slice(-2) + " " + 
                until.getFullYear() + " " + 
                ("00" + hours).slice(-2) + ":" + 
                ("00" + until.getMinutes()).slice(-2) + ":" + 
                ("00" + until.getSeconds()).slice(-2) + ' ' + (until.getHours() >= 12 ? 'PM' : 'AM'); 
                
          var dateApplied = new Date(myrequest.dateApproved);
            var hours = until.getHours() % 12;
              hours = hours ? hours : 12;
                var dateAppliedtest = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][(dateApplied.getMonth())] + " " + 
                ("00" + dateApplied.getDate()).slice(-2) + " " + 
                dateApplied.getFullYear() + " " + 
                ("00" + hours).slice(-2) + ":" + 
                ("00" + dateApplied.getMinutes()).slice(-2) + ":" + 
                ("00" + dateApplied.getSeconds()).slice(-2) + ' ' + (dateApplied.getHours() >= 12 ? 'PM' : 'AM'); 
  var declinedlist2q =  document.getElementById("declinedlist").value;
            my_leave_request_table3.append(
            '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.leaveType+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.duration+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.consumed+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ fromtest+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ untiltest+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ dateAppliedtest+'</td>'+ 
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:red"><b>'+myrequest.status+'<b></p></td>'+
        
                '<td style="font-size: 13px;text-align: center">'+
                 '<button class ="reapp-btn   btn btn-leave btn-danger btn-hover-white btn-sm" style="font-size: 10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"   data-target="#reapplymodal">Reapply</button> ' +
                    '</td>'+
                '</tr>'
          );
              var seen = {};
              my_leave_request_table3.each(function() {
                  var txt = $(this).children("td:eq(2)").text();
                  if (seen[txt])
                      $(this).remove();
                  else
                      seen[txt] = true;
              });
       }

  
 });
}
var usercompanyid                    　=  document.getElementById("userKey").value;
var db                               　=  firebase.database();
var employeeleaverequestref          　=  db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         　=  db.ref("Leave_Request/"+usercompanyid);
var Leave_Request_Employee           　=  db.ref("Leave_Request_Employee/"+usercompanyid);
var Leave_Request_Employee1         　 =  db.ref("Leave_Request_Employee/"+usercompanyid);
var employeeref                       =  db.ref("Employee/"+usercompanyid);
var empno = $('#count');
function notif(){


var myArray;
myArray = [];
var count;
empno.empty();
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

            var key4            = childSnapshot4.key;
            var apname          = childSnapshot4.child('name').val();
            var aprovalstat     = childSnapshot4.child('status').val();
            var approverfullname = document.getElementById('fullname5').value;
   
            if(aprovalstat =='no action' && id == empid && apname == approverfullname && status == "waiting for approval"){
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
     });
   }); 
  });  
 });
}
function showdeletemodal(){

    $('#Delete').on('show.bs.modal', function(e) {
       var del = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="deletekey"]').val(del);

    });
}
function  deleterecord(){
  var deletekey = document.getElementById('deletekey').value;
  my_leave_request.child(deletekey).remove();
   $("#Delete").modal("hide");
  swal({type:'success',title: "Sucessfully Deleted!",icon: "success"});
               
}
function showreapplymodal(){
      $('#updateleave').on('hidden.bs.modal', function (e) {
            $("#subdoct").empty();
             $("#selectapprover1").empty();
           });
    $('#reapplymodal').on('show.bs.modal', function(e) {
       var reappkey = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="reapplykey"]').val(reappkey);
var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time; 



      $('#applieddate').val(dateTime);
  var ukey    =  document.getElementById("userKey").value;
  var key     =  document.getElementById("reapplykey").value;
  var pairukey                =   document.getElementById("userKey").value;
var companyleaveref           =   db.ref('Company_Leave/'+pairukey);
my_leave_request.child(key).once("value").then(function(snapshot){

      var empid             = snapshot.child('Employee_Id').val();
      var leaveType         = snapshot.child('leaveType').val();
      var duration          = snapshot.child('duration').val();
      var leaveFrom         = snapshot.child('leaveFrom').val();
      var leaveuntil        = snapshot.child('leaveuntil').val();
      var reason            = snapshot.child('reason').val();
      var dateApplied            = snapshot.child('dateApplied').val();
    document.getElementById("LeaveDescription1").innerHTML  = leaveType;
    document.getElementById("leavedesciption2").innerHTML   = leaveType;

    $("#leavefrom1").val(leaveFrom);
    $("#leaveuntil1").val(leaveuntil);
    $("#reason").val(reason);
    $("#appleavetype").val(leaveType);
     $("#prevapplieddate").val(dateApplied);


 var my_leave_request2 = my_leave_request.child(key);
 var my_leave_request3 = my_leave_request2.child("requirements");
 my_leave_request3.once("value").then(function(snapshot5){
           snapshot5.forEach(function(childSnapshot5){
           var ImageLink         = childSnapshot5.child('ImageLink').val();
                if(ImageLink == "null"){
                       $('#subdoct').append("");
                    }else{
                      $('#subdoct').append(
                      '<a  href="'+ImageLink +'" download ><img id="myrequirements" style="height:100px;width:100px;padding:auto" src="'+ImageLink+'"></img></a>'
                      );
                    }
          });
      });

companyleaveref.once("value").then(function(snapshot1){
    snapshot1.forEach(function(childSnapshot1){
    var LeaveType1         = childSnapshot1.child('LeaveType').val();
    var Full_Day           = childSnapshot1.child('Duration/Full_Day').val();
    var Half_Day           = childSnapshot1.child('Duration/Half_Day').val();
    var Multiple_Day       = childSnapshot1.child('Duration/Multiple_Day').val();

   if(LeaveType1 == leaveType ){
                  // console.log(LeaveType1);
        $("#duration").empty();//To reset duration
             

              $("#duration option[value='"+duration+"']");
             if(Full_Day ==true){
                 Full_Day ="Full Day";
                 document.getElementById("fullday").value                  = Full_Day;
              }if(Full_Day == false){
                  Full_Day ="";
                   document.getElementById("fullday").value                  = Full_Day;
              }if(Half_Day == true){
                  Half_Day ="Half Day";
                  document.getElementById("halfday").value                  = Half_Day;
              }if(Half_Day == false){
                  Half_Day ="";
                  document.getElementById("halfday").value                  = Half_Day;
              }if(Multiple_Day == true){
                  Multiple_Day ="Multiple Day";
                  document.getElementById("multiple").value                  = Multiple_Day;
              }if(Multiple_Day == false){
                  Multiple_Day ="";
                   document.getElementById("multiple").value                = Multiple_Day;
              }

             var halfday  = document.getElementById("halfday").value;
             var fullday  = document.getElementById("fullday").value;
             var multiple = document.getElementById("multiple").value;
       
   
        $("#duration").val(duration);
 
                 if (halfday == Half_Day) {
                     $("#duration").append('<option>'+Half_Day+'</option>');
                } if (fullday == Full_Day) { 
                     $("#duration").append('<option>'+Full_Day+'</option>');
                }if (multiple == Multiple_Day) {
                     $("#duration").append('<option>'+Multiple_Day+'</option>');
                }
                 $('#duration option').filter(function(){
                    return !this.value || $.trim(this.value).length == 0;
                  }).remove();  
              }
            });
          });
    var query1 = firebase.database().ref("Employee").child(ukey);
        query1.once("value").then(function(snapshot2){
           snapshot2.forEach(function(childSnapshot2){
          var key            =  childSnapshot2.key;
          var Employee_Id    =  childSnapshot2.child("Employee_Id").val();

              var empid_no  = document.getElementById("empid").value;
              if (empid_no == Employee_Id){
                  console.log(key);
                var query2  = query1.child(key);

                   query2.once("value").then(function(snapshot3){
                   snapshot3.child("Leave_Summary").forEach(function(childSnapshot3){
                      var key1          =  childSnapshot3.key;
                      var Available     =  childSnapshot3.child("Available").val();
                      var NumberofDays  =  childSnapshot3.child("NumberofDays").val();
                      var LeaveType3    =  childSnapshot3.child("LeaveType").val();
                      var Consume       =  childSnapshot3.child("Consume").val();
                      var requirements     =  childSnapshot3.child("Requirements").val();
                    
                      if(LeaveType3 == leaveType){
                        console.log(Available);
                          document.getElementById('totaldays1').innerHTML       = NumberofDays;
                          document.getElementById("consumed1").innerHTML        = Consume;
                          document.getElementById("availabledays1").innerHTML   = Available;
                          document.getElementById("requirements").innerHTML     = requirements;
 
                          $('#bal').val(Available);
                          
   


                      }


                 });
               });

              }
 
      });
    });
  });
 });    
}
function sendreapply(){
 var status      =  "waiting for approval";
 var leaveFrom   =  $("#leavefrom1").val();
 var leaveuntil1  =  $("#leaveuntil1").val();
 var reason      =  $("#reason").val();
 var applieddate =  $("#applieddate").val();
 var appleavetype =  $("#appleavetype").val();
 var bal         =  $('#bal').val();
 var inpFile     =  document.getElementById('supportDocs');

 var duration    =  document.getElementById('duration');
 var duration    =  duration[duration.selectedIndex].value;
 var prevapplieddate = $('#prevapplieddate').val();
           
  var start                             =  new Date($('#leavefrom1').val());
  var end                               =  new Date($('#leaveuntil1').val());

  var diff                              =  new Date(end - start);
  var days                              =  1;
      days                              =  diff / 1000 / 60 / 60 / 24;
  var consumed;
  var status1           = "no action";

    if(duration =='Half Day'){
        consumed  = 0.5; 
     }if(duration =='Full Day'){
         consumed  = 1;
     }if(duration =='Multiple Day'){
         consumed  = 1;
      if (days == NaN){
           consumed = 0 ;
          }else{
       consumed= days  + 1;
                             
       }
    }
var keysend  = document.getElementById("reapplykey").value;
var reappldate = {
      leaveuntil    : leaveuntil1,
      dateApplied   : applieddate,
      leaveFrom     : leaveFrom,
      reason        : reason,
      status        : status,
      duration      : duration,
      count         : consumed,
}
 my_leave_request.child(keysend).update(reappldate);

                      if(inpFile !=""){
                      ///////////////////UPDATE REQUIREMENTS///////////////
                      for (var i = 0; i < inpFile.files.length; i++) {
                                var imageFile = inpFile.files[i];

                              uploadImageAsPromise(imageFile);
                        function uploadImageAsPromise (imageFile) {
                            return new Promise(function (resolve, reject) {
                             var storageRef = firebase.storage().ref("requirements/"+imageFile.name);   
                             var task       = storageRef.put(imageFile);
                             task.then(snap=>{

                   
                             storageRef.getDownloadURL().then(function(url) {
                                    my_leave_request.child(keysend).child("requirements").remove();
                                    my_leave_request.child(keysend).child("requirements").push({
                                           ImageLink : url
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
                                           
                                        }
                                    );
                         });
                       }
                     }
                   }
               my_leave_request.child(keysend).child("Approver").remove();
             $("input[id=approver2]:checked").each(function (i) { 

                   var data = $(this).val();
                   var index = i;
                   console.log("The index is " + i + " and the value is " + data);
                   //my_leave_request1.child("Approver").remove();

                   var leaverequest4 = my_leave_request.child("Approver").child(index);
                   var newdata1 = {
                      name   : data,
                      status : status1,
                   }
                   leaverequest4.child(keysend).update(newdata1);  
                 
                    
                 
                 });

     Leave_RequestRef.once("value").then(function(snapshot3){  
               snapshot3.forEach(function(childSnapshot3){
              var key2                         =  childSnapshot3.key;
              var leaverequestdateApplied      =  childSnapshot3.child('dateApplied').val();
              var LeaveType                    =  childSnapshot3.child('leaveType').val();


          if(consumed < bal)
          {  
            if(leaverequestdateApplied == prevapplieddate && appleavetype == LeaveType){
     
  
                      Leave_RequestRef.child(key2).update(reappldate);
    $("#reapplymodal").modal("hide");
                            swal({type:'success',title: "Sucessfully Send!",icon: "success"});  
                      if(inpFile !=""){
                      ///////////////////UPDATE REQUIREMENTS///////////////
                      for (var i = 0; i < inpFile.files.length; i++) {
                                var imageFile = inpFile.files[i];

                              uploadImageAsPromise(imageFile);
                        function uploadImageAsPromise (imageFile) {
                            return new Promise(function (resolve, reject) {
                             var storageRef = firebase.storage().ref("requirements/"+imageFile.name);   
                             var task       = storageRef.put(imageFile);
                             task.then(snap=>{

                   
                             storageRef.getDownloadURL().then(function(url) {
                                    Leave_RequestRef.child(key2).child("requirements").remove();
                                    Leave_RequestRef.child(key2).child("requirements").push({
                                           ImageLink : url
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
                                           
                                        }
                                    );
                         });
                       }
                     }
                    
                    }
                    Leave_RequestRef.child(key2).child("Approver").remove();

                   $("input[id=approver2]:checked").each(function (i) { 

                         var data = $(this).val();
                         var index = i;
                         console.log("The index is " + i + " and the value is " + data);
                         var leaverequest4 = Leave_RequestRef.child(key2).child("Approver").child(index);
                         var newdata1 = {
                            name   : data,
                            status : status1,
                         }
                         leaverequest4.update(newdata1);  
                       
                       
                       });

                    } 
                
                  }else{
                    alert('You only have: ' + bal +'days Available');
                   swal({type:'error',title: "Something Wrong!",icon: "error"});
                  }
                 }); 

              }); 

}

var usercompanyid                   =  document.getElementById("userKey").value;
var empuserskey                     =  document.getElementById("empuserskey").value;
var retrieveforceleave              =  db.ref("ForceLeave/"+usercompanyid);  

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
         //  console.log(key3);
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
                  '<button type="button" class="btn-remove-key btn btn-default  "onclick="accepted()"id="acceptmememe" style="font-size:12px "><span class="glyphicon glyphicon-check" style="margin-right: 10px"></span>Accept</button>'+
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

            
                   
       
     if(status ==''){

   
          var updatestatus        = "accepted";
          var retrieveforceleave3 = retrieveforceleave1.child(key3);
          retrieveforceleave3.update({status:updatestatus})
   

           }
            $("#forceleavemodal").modal('hide');
             swal({type:'success',title: "Sucessfully Sent !",icon: "success",});
          }
           });
           });
         });
        });

     });
}
function retrieveforceleavetbale(){
   my_leave_request_table1.empty();
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

            
                   
       
     if(status =='accepted'){

           
                 my_leave_request_table1.append(
                 
            '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ leaveType+'</td>'+
                  '<td style="font-size: 12px;text-align: center"> consecutive</td>'+
                  '<td style="font-size: 12px;text-align: center" ><p id="dayscount"></p></td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+leaveFrom +'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+leaveuntil +'</td>'+ 
                  '<td style="font-size: 12px;text-align: center"> HR</td>'+  
                  '<td style="font-size: 12px;text-align: center">'+ dateApplied+'</td>'+  
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:#4d79ff"><b>'+status+'<b></p></td>'+
    
                '</tr>'
          );
                // var input1  = $('#date1').val();
                // var input2  = $('#date2').val();
                // var date1 = new Date(input1); 
                // var date2 = new Date(input2); 
                  
                // // To calculate the time difference of two dates 
                // var Difference_In_Time = date2.getTime() - date1.getTime(); 
                  
                // // To calculate the no. of days between two dates 
                // var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
                // document.getElementById('dayscount').innerHTML =Difference_In_Days;

         }

          }
              
           });
           });
         });
        });
      });


}
function retrieveholidays(){
  var start ;
      
 var  end ;
    var dates =["2019-01-01","2019-04-09","2019-04-19","2019-04-18","2019-05-01","2019-06-12","2019-08-26","2019-11-30","2019-12-25","2019-12-30"];  
    var comuid                           =   document.getElementById("userKey").value;
var db1                              =   firebase.database();
var Company_Holiday                 =   db1.ref('Company_Holiday'+comuid); 
         Company_Holiday.once("value").then(function(snapshot3){
         snapshot3.forEach(function(childSnapshot){
            var key                  =  childSnapshot.key;
            var End                  =  childSnapshot.child("End").val();
            var Start                =  childSnapshot.child("Start").val();
            var Title                =  childSnapshot.child("Title").val();
          
            // var arrayholiday = [End,Start];
            // console.log(arrayholiday);
     
            if(Title !=""){
  
             dates.push(End,Start);
             console.log(Title);
 
            }


                 
   });
         
    var datesForDisable = dates;

             $(".date13").datepicker({
                format: 'yyyy-mm-dd',
                startDate: '-3d',
                autoclose: true,
                todayHighlight: true,
                datesDisabled: datesForDisable,

             }) 
});
console.log(dates);  
                         

}
function init(){
  $("#yes").on("click",deleterecord);
  $("#sendapply1").on("click",sendreapply);
  // $('#acceptmememe').on("click",accepted);
  $('#forceleavemodal').modal({backdrop: 'static'});
  my_leave_request.on('child_removed',leaverequest);
  my_leave_request.on('child_changed',leaverequest);

  my_leave_request.on('child_removed',leaverequest1);
  my_leave_request.on('child_changed',leaverequest1);
  
  my_leave_request_table1.on('click','button.del',showdeletemodal);
  my_leave_request_table3.on('click','button.reapp-btn',showreapplymodal);

// accepted();
  rerforceleave();
  leaverequest();
  leaverequest1();
  notif();
  reload_notif();
  retrieveforceleavetbale();
  retrieveholidays();
}
function reload_notif(){
   window.setInterval(notif, 1000);
}
init();


    
  });

  }
   else {
    // No user is signed in.
    console("No user is signed in.");

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
function reload(){
  window.refresh();
}
</script>

