  <?php require_once 'includes/EmployeeHomepage.php'?>

   <script>
    // Initialize Firebase
    var config = {
    apiKey: "AIzaSyCsHkJI5LjRN-WtQmwZxxFthT8EfRmjUOA",
    authDomain: "leaveshero42-37675.firebaseapp.com",
    databaseURL: "https://leaveshero42-37675.firebaseio.com",
    projectId: "leaveshero42-37675",
    storageBucket: "leaveshero42-37675.appspot.com",
    messagingSenderId: "1030314531552",
    appId: "1:1030314531552:web:5fe385f4488ca974864e85"
    };
    firebase.initializeApp(config);

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
              document.getElementById("empuid").value          =  user_id; 
               document.getElementById("email_id").value          =  email_id; 
                             

      var query3 = firebase.database().ref('Company_Approver').child(Company_User_Id);
           query3.on('value', function(snapshot1) {
         snapshot1.forEach(function(childSnapsot1){
   
           var Employee_Id         =  childSnapsot1.child("Employee_Id").val();
           var Username         =  childSnapsot1.child("Username").val();
           var empidno             = document.getElementById("empid").value;
           if(user.email == Username){
            console.log(Employee_Id);
            $("#leaverequestnav").unbind().show();
          

           }

        }); 
      });
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

            var fullname                    =  fname + " " + mi + " " + lname + " " + suffix;
            var fullname2                    =  lname + ", " + fname + " " + mi + " " + suffix +'('+position+')';


                var dob = bdate;
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                
          if(user.email == name && user != null){
              document.querySelector('#profile').src                     =  Employee_Profile_Pic;
              document.querySelector('#image_upload_preview').src        =  Employee_Profile_Pic;
              document.querySelector('#profile2').src                    =  Employee_Profile_Pic;
              document.getElementById("photourl").value                  =  Employee_Profile_Pic; 
              document.getElementById("empkey").value                    =  key; 
              document.getElementById("password").value                  =  password; 
              document.getElementById("emppassword").value               =  password; 
              document.getElementById("empidno1").value                   = Employee_Id
              document.getElementById("userid").value                    =  Company_Id; 
              document.getElementById("age").innerHTML                   =  age; 
              document.getElementById("fullname").innerHTML              =  fullname ;
              document.getElementById("fullname1").innerHTML             =  fullname;
              document.getElementById("address1").innerHTML              =  address;
              document.getElementById("contact1").innerHTML              =  contact;
              document.getElementById("bdate").innerHTML                 =  bdate ;
              document.getElementById("sex").innerHTML                   =  sex;
              document.getElementById("religion").innerHTML              =  religion;
              document.getElementById("maritalstatus").innerHTML         =  maritalstatus;     
              document.getElementById("Branch").innerHTML                =  Branch;
              document.getElementById("email1").innerHTML                =  email;
              document.getElementById("datehired").innerHTML             =  datehired ;
              document.getElementById("position").innerHTML              =  position;
              document.getElementById("department").innerHTML            =  department; 
              document.getElementById("contactperson").innerHTML         =  contactperson;
              document.getElementById("contactpersonnumber").innerHTML   =  contactpersonnumber; 
              document.getElementById("fullname1").value                 =  fullname2;
              document.getElementById("fullname3").innerHTML             =  fullname;
              document.getElementById("idno").innerHTML                  =  Employee_Id;
              document.getElementById("empdepartment").innerHTML         =  department;

             
            }

         });

       });
       var comid =  document.getElementById("userid").value;
       var query2 = firebase.database().ref('Subscriber').child(comid);
       query2.on('value', function(snapshot) {

       var Company_Name         =  snapshot.child("Company_Name").val();
       document.getElementById("companyname").innerHTML   =  Company_Name;

     });
      
  });

  }

   else {
    // No user is signed in.
    console.log("No user is signed in.");

  }
/////////////////////////////////////////////StART////////////////////////////////////////////////////

//////////////////////////////END/////////////////////////////////////////////////////////////////////////////////////

});

var usercompanyid                    　=  document.getElementById("userKey").value;

var db                               　=  firebase.database();
var employeeleaverequestref          　=  db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         　=  db.ref("Leave_Request/"+usercompanyid);
var Leave_Request_Employee           　=  db.ref("Leave_Request_Employee/"+usercompanyid);
var Leave_Request_Employee1         　 =  db.ref("Leave_Request_Employee/"+usercompanyid);
var employeeref                       =  db.ref("Employee/"+usercompanyid);
var retrieveforceleave                 =  db.ref("ForceLeave/"+usercompanyid);  

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
        snapshot3.forEach(function(childSnapshot3){
        var key3                   = childSnapshot3.key;
        var dateApplied            = childSnapshot3.child('dateApplied').val();
        var leaveFrom              = childSnapshot3.child('leaveFrom').val();
        var leaveType              = childSnapshot3.child('leaveType').val();
        var leaveuntil             = childSnapshot3.child('leaveuntil').val();
        var reason                 = childSnapshot3.child('reason').val();
        var status                 = childSnapshot3.child('status').val();
        var email                  = childSnapshot3.child('email').val();

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
                  '<button type="button" class="btn-remove-key btn btn-default  "id="acceptmememe" style="font-size:12px "onclick="accepted()"><span class="glyphicon glyphicon-check" style="margin-right: 10px"></span>Accept</button>'+
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
      });  

  }
 
function accepted(){
   $("#acceptmememe").click(function(){
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
      snapshot3.forEach(function(childSnapshot3){
      var key3                   = childSnapshot3.key;
      var dateApplied            = childSnapshot3.child('dateApplied').val();
      var leaveFrom              = childSnapshot3.child('leaveFrom').val();
      var leaveType              = childSnapshot3.child('leaveType').val();
      var leaveuntil             = childSnapshot3.child('leaveuntil').val();
      var reason                 = childSnapshot3.child('reason').val();
      var status                 = childSnapshot3.child('status').val();
      var email                  = childSnapshot3.child('email').val();
      var email_id               = document.getElementById('email_id').value;
    if(email_id == email){
     console.log(leaveFrom);

        if(status =" "){
            var updatestatus        = "accepted";
            var retrieveforceleave3 = retrieveforceleave2.child(key3);
              retrieveforceleave3.update({status:updatestatus})
              } 
            }    
           });
           });
         });
        });
      });
    });  
  $("#forceleavemodal").modal('hide');
   swal({type:'success',title: "Sucessfully Sent !",icon: "success"});                              

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
           var key2         = childSnapshot1.key;


      var employeeleaverequestref3 = employeeleaverequestref2.child(key2);
         employeeleaverequestref3.once('value', function(snapshot3) {
           snapshot3.forEach(function(childSnapshot3){
            var key5        = childSnapshot3.key;
           var status       = childSnapshot3.child('status').val();
           var leaveType    = childSnapshot3.child('leaveType').val();
           var id           = childSnapshot3.child('id').val();
           var duration     = childSnapshot3.child('duration').val();
           var days         = childSnapshot3.child('days').val();
           var balance      = childSnapshot3.child('balance').val();
           var consumed     = childSnapshot3.child('consumed').val();
           var dateApplied  = childSnapshot3.child('dateApplied').val();
           var leaveFrom    = childSnapshot3.child('leaveFrom').val();
           var leaveuntil   = childSnapshot3.child('leaveuntil').val();
           var name         = childSnapshot3.child('name').val();
           var reason       = childSnapshot3.child('reason').val();
         
         var employeeleaverequestref4 = employeeleaverequestref3.child(key5);
        employeeleaverequestref4.child('Approver').once('value', function(snapshot4) {
           snapshot4.forEach(function(childSnapshot4){ 

            var key4            = childSnapshot4.key;
            var apname          = childSnapshot4.child('name').val();
            var aprovalstat     = childSnapshot4.child('status').val();
            var approverfullname = document.getElementById('fullname1').value;

            if(aprovalstat =='no action'&& status == 'waiting for approval'&&approverfullname == apname ){
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
  });  
 });

}

function display() {
    var empkey   =  document.getElementById("empkey").value;
    var ukey     =  document.getElementById("userKey").value;
    var query1   = firebase.database().ref("Employee/"+ukey);
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

            if(key == empkey){
                document.getElementById('givenname1').value                 = fname;
                document.getElementById('middleinitial1').value             = mi;
                document.getElementById('familyname1').value                = lname;
                document.getElementById('date1').value                      = bdate;
                document.getElementById('gender1').value                    = sex;
                document.getElementById('maritalstatus1').value             = maritalstatus;
                document.getElementById('religion1').value                  = religion;
                document.getElementById('empemail1').value                  = email;
                document.getElementById('contactnumber1').value             = contact;
                document.getElementById('fulladdress1').value               = address;
                document.getElementById('contactperson1').value             = contactperson;
                document.getElementById('contactpersonsnumber1').value      = contactpersonnumber;
                document.getElementById('employeeid1').value                = Employee_Id;
                document.getElementById('department1').value                = department;
                document.getElementById('position1').value                  = position;           
                document.getElementById('datehired1').value                 = datehired;
                document.getElementById('branch1').value                    = Branch; 
                document.getElementById('suffix1').value                    = suffix;   

                $('#empsaveupdate')
                 .unbind()
                 .show();
                $('#cancel')
                 .unbind()
                 .show();
              
            }

$(document).ready(function(){
       $("#empsaveupdate").click(function(){
                                var ukey1                           = document.getElementById("userKey").value;
                                var updateemployee                  = firebase.database().ref("Employee/" + ukey1);
                                var empkey                          = document.getElementById("empkey").value; 
                                var comid1                          = document.getElementById("userid").value;
                                var    familyname1                  = document.getElementById("familyname1").value;
                                var    givenname1                   = document.getElementById("givenname1").value;
                                var    middleinitial1               = document.getElementById("middleinitial1").value;
                                var    suffix1                      = document.getElementById("suffix1").value;
                                var    date1                        = document.getElementById("date1").value;
                                var    gender1                      = document.getElementById("gender1").value;
                                var    maritalstatus1               = document.getElementById("maritalstatus1").value;
                                var    religion1                    = document.getElementById("religion1").value;
                                var    contactnumber1               = document.getElementById("contactnumber1").value;
                                var    address1                     = document.getElementById("fulladdress1").value;
                                var    contactperson1               = document.getElementById("contactperson1").value;
                                var    contactpersonsnumber1        = document.getElementById("contactpersonsnumber1").value;
                                var    employeeid1                  = document.getElementById("employeeid1").value;
                                var    department1                  = document.getElementById("department1").value;
                                var    position1                    = document.getElementById("position1").value;
                                var    empemail1                    = document.getElementById("empemail1").value;
                                var    datehired1                   = document.getElementById("datehired1").value;
                                var    branch1                      = document.getElementById("branch1").value; 
                               
                            updateemployee.child(empkey).update({

                                  Employee_LastName                      :     familyname1,
                                  Employee_Id                            :     employeeid1,
                                  Employee_FirstName                     :     givenname1,
                                  Employee_MiddleInitial                 :     middleinitial1,
                                  Employee_Suffix                        :     suffix1,
                                  Employee_HireDate                      :     datehired1,
                                  Employee_Birthdate                     :     date1,
                                  Employee_Religion                      :     religion1,
                                  Employee_Contact1                      :     contactnumber1,
                                  Employee_Email                         :     empemail1,
                                  Employee_ContactPerson                 :     contactperson1,
                                  Employee_ContactPersonNumber           :     contactpersonsnumber1,
                                  Employee_Department                    :     department1,
                                  Employee_Position                      :     position1,
                                  Employee_Address                       :     address1,
                                  Employee_Sex                           :     gender1,
                                  Employee_MaritalStatus                 :     maritalstatus1,
                                  Branch                                 :     branch1,


                            })
                             swal({type:'success',title: "Update Information! !",icon: "success"});
                          });
                           $("#cancel").click(function(){
                                var empty             = "";
                                empty                 = document.getElementById("familyname1").value;
                                empty                 = document.getElementById("givenname1").value;
                                empty                 = document.getElementById("middleinitial1").value;
                                empty                 = document.getElementById("suffix1").value;
                                empty                 = document.getElementById("date1").value;
                                empty                 = document.getElementById("gender1").value;
                                empty                 = document.getElementById("maritalstatus1").value;
                                empty                 = document.getElementById("religion1").value;
                                empty                 = document.getElementById("contactnumber1").value;
                                empty                 = document.getElementById("fulladdress1").value;
                                empty                 = document.getElementById("contactperson1").value;
                                empty                 = document.getElementById("contactpersonsnumber1").value;
                                empty                 = document.getElementById("employeeid1").value;
                                empty                 = document.getElementById("department1").value;
                                empty                 = document.getElementById("position1").value;
                                empty                 = document.getElementById("empemail1").value;
                                empty                 = document.getElementById("datehired1").value;
                                empty                 = document.getElementById("branch1").value; 
                                empty                 = document.getElementById("maritalstatus1").value;
                       });

              });
          });
        });  
     
    }

function updateempprofile(event){
  event.preventDefault();
var userKey                           =  document.getElementById("userKey").value;
var db                                =  firebase.database();
var update                            =  db.ref("Employee/"+userKey);
var empuserupdate                     =  db.ref("Users");
var profphoto                         =  db.ref("Employee/"+userKey);   
  
      
        var empkey                            =  document.getElementById("empkey").value;
        var refuserkey                        =  document.getElementById("refuserkey").value;
        var password                          =  document.getElementById("password").value;


         var storage        = firebase.storage()
         var picurl         = document.getElementById('photourl').value;
         var submitButton1  = document.getElementById('inputFile');
         var inpFile = $("#inputFile")[0].files.length;

    if( $("#inputFile").val() !=""){
    
          for (var i = 0; i < submitButton1.files.length; i++) {
                var imageFile = inpFile.files[i];

          uploadImageAsPromise(imageFile);

          function uploadImageAsPromise (imageFile) {
            return new Promise(function (resolve, reject) {
                var storageRef = firebase.storage().ref("profile/"+imageFile.name);   
                    var task = storageRef.put(imageFile);
                    console.log(task);
                    task.then(snap=>{

                  
                    storageRef.getDownloadURL().then(function(url) {
 
                        profphoto.child(empkey).update({
                        Employee_Profile_Pic                :            url, 
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
function updateempprofile1(event){
  event.preventDefault();
var userKey                           =  document.getElementById("userKey").value;
var db                                =  firebase.database();
var update                            =  db.ref("Employee/"+userKey);
var empuserupdate                     =  db.ref("Users");
var profphoto                         =  db.ref("Employee/"+userKey);   
  
      
        var empkey                            =  document.getElementById("empkey").value;
        var refuserkey                        =  document.getElementById("refuserkey").value;
        var password                          =  document.getElementById("password").value;

 
         var storage        = firebase.storage()
         var picurl         = document.getElementById('photourl').value;
         var submitButton1  = document.getElementById('inputFile');
         var vidFileLength  = $("#inputFile")[0].files.length;
         var oldpass        = $("#emppassword").val();
         var oldpass2       = $("#oldpassword").val();
         var newpass        = $("#newpassword").val();

    if(oldpass2 == oldpass){


        // user = firebase.auth().currentUser;
        // var user = firebase.auth().currentUser;
        // // var newPassword = getASecureRandomPassword();

        // user.updatePassword(newpass).then(() => {
        //   // Update successful.
        //    console.log("Successfully");
        // }, (error) => {
        //   // An error happened.
        //   console.log("Something wrong..Please try again");
        // });

        var user = firebase.auth().currentUser;
        //var newPassword = getASecureRandomPassword();

        user.updatePassword(newpass).then(function() {
          // Update successful.
          console.log("Successfully");
        }).catch(function(error) {
          // An error happened.
          console.log("Something wrong..Please try again");
        });


            update.child(empkey).update({ 
       
             Password                            :            newpass,
                     
            });
              
            empuserupdate.child(refuserkey).update({
              Password : newpass,
       
                });
             $("#confirmodal").modal("hide");

          }         

     
    }


function init(){
   $('#forceleavemodal').modal({
              backdrop: 'static'
            });
  $("#companyedit1").on("click",updateempprofile);
   $("#companyedit2").on("click",updateempprofile1);
  // Approver_ref.on('child_removed',getApprovers);
  // Approver_ref.on('child_changed',getApprovers);

  rerforceleave();
  notif();
  reload_notif();
  // accepted1();
}
init(); 
function reload_notif(){
   window.setInterval(notif, 1000);
}
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

