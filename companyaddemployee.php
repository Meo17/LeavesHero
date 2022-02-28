<?php require_once 'includes/AddEmployee.php'?>

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
            var companyname      = childSnapshot.child("Company_Name").val();
            var Company_profile  = childSnapshot.child("Company_profile").val();
            var childData        = childSnapshot.val();
            if(Company_profile == ""){
              Company_profile  = document.querySelector("#profile").src = "images/icon_user.png"; 
              Company_profile  = document.querySelector("#image_upload_preview").src = "images/icon_user.png"; 
            }
          if(user.email == name){
              document.getElementById("photourl").value             =  Company_profile;
              document.getElementById("userKey").value            =  key;
              document.getElementById("companyaddress").value     =  companyaddress; 
              document.getElementById("password").value           =  password; 
              document.getElementById("companycontact").value     =  contact; 
              document.getElementById("email").value              =  email; 
              document.getElementById("user_para").innerHTML      =  companyname;
              document.querySelector('#profile').src              =  Company_profile;
              document.querySelector('#image_upload_preview').src =  Company_profile;
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
var db               = firebase.database();
var member_ref       = db.ref('Employee');
var users            = db.ref('Users');
var config2 = {
    apiKey: "AIzaSyCsHkJI5LjRN-WtQmwZxxFthT8EfRmjUOA",
    authDomain: "leaveshero42-37675.firebaseapp.com",
    databaseURL: "https://leaveshero42-37675.firebaseio.com",
    projectId: "leaveshero42-37675",
    storageBucket: "leaveshero42-37675.appspot.com",
    messagingSenderId: "1030314531552",
    appId: "1:1030314531552:web:5fe385f4488ca974864e85"

    };

var secondaryApp                          =  firebase.initializeApp(config2, "Secondary");
var password                              =  Math.random().toString(36).slice(-8);
 document.getElementById("pass").value    =  password; 

 var db                               =  firebase.database();
var update                            =  db.ref("Subscriber");
var empuserupdate                     =  db.ref("Users");
var profphoto                         =  db.ref("Subscriber");



function updateempprofile(event){
  event.preventDefault();

            var userKey                =  document.getElementById("userKey").value;
            var comuserskey            =  document.getElementById("comuserskey").value;       
            
            var file                   =  document.getElementById('inputFile').value;
            var password               =  document.getElementById("password").value;

            var updateaddress          =  document.getElementById("companyaddress").value;
            var companycontact         =  document.getElementById("companycontact").value;
            var upadateemail           =  document.getElementById("email").value;

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

function getFormData() {


  var selector                      =  document.getElementById('gender') ;
  var sex                           =  selector[selector.selectedIndex].value;

  var maritalstatus                 =  document.getElementById('maritalstatus') ;
  var maritalstatus                 =  maritalstatus[maritalstatus.selectedIndex].value;

  var employmentstat                =  document.getElementById('employmentstat') ;
  var employmentstat                =  employmentstat[employmentstat.selectedIndex].value;

  var branch                        =  document.getElementById('branch') ;
  var branch                        =  branch[branch.selectedIndex].value;

  var position                      =  document.getElementById('position') ;
  var position                      =  position[position.selectedIndex].value;

  var department                    =  document.getElementById('department') ;
  var department                    =  department[department.selectedIndex].value;

  var familyname                    =  $('#familyname').val();
  var givenname                     =  $('#givenname').val();
  var userkey                       =  $('#userKey').val();
  var middleinitial                 =  $('#middleinitial').val();
  var suffix                        =  $('#suffix').val();
  var datehired                     =  $('#datehired').val();
  var date                          =  $('#date').val();
  var religion                      =  $('#religion').val();
  var employeeemail                 =  $('#empemail').val();
  var address                       =  $('#address').val();
  var contactperson                 =  $('#contactperson').val();
  var contactpersonsnumber          =  $('#contactpersonsnumber').val();
  var contactnumber1                =  $('#contactnumber1').val();
  var employeeid                    =  $('#employeeid').val();
  var department                    =  $('#department').val();
  var employeeid                    =  $('#employeeid').val();
  var emppassword                   =   password;
  var status                        =  "Active";

  var employeeprofile               =  "";
  
  if(contactperson ==""){
    contactperson ="N/A"
  }if(address ==""){
    address ="N/A"
  }if(contactpersonsnumber ==""){
    addcontactpersonsnumberress ="N/A"
  }if(contactnumber1 ==""){
    contactnumber1 ="N/A"
  }if(branch ==""){
    branch ="N/A"
  }
 
 
 
 
  // var str                           =  familyname+employeeid +"@leaveshero.com";
  // var res                           =  str.toLowerCase();
  // var email                         =  res.replace(/\s+/g, "").toLowerCase();

secondaryApp.auth().createUserWithEmailAndPassword(employeeemail, emppassword).then(function(firebaseUser) {
   var firebaseUser = firebase.auth().currentUser;
    console.log("User " + firebaseUser.uid + " created successfully!");
    
    //I don't know if the next statement is necessary 
    secondaryApp.auth().signOut();

});
  var suffix1 = "";
  var app ="false";
if(suffix == ""){

    suffix1 = "-";
  }else{
    suffix1 = suffix;
  }

  return{
  
    Company_Id                             :     userkey,
    Employee_LastName                      :     familyname,
    Employee_Id                            :     employeeid,
    Employee_FirstName                     :     givenname,
    Employee_MiddleInitial                 :     middleinitial,
    Employee_Suffix                        :     suffix1,
    Employee_HireDate                      :     datehired,
    Employee_Birthdate                     :     date,
    Employee_Religion                      :     religion,
    Employee_Status                        :     status,
    Employee_Contact1                      :     contactnumber1,
    Employee_Email                         :     employeeemail,
    Employee_ContactPerson                 :     contactperson,
    Employee_ContactPersonNumber           :     contactpersonsnumber,
    Employee_Department                    :     department,
    Employee_Position                      :     position,
    Employee_Profile_Pic                   :     employeeprofile,
    Username                               :     employeeemail,
    Password                               :     emppassword,
    Employee_Address                       :     address,
    Employee_Sex                           :     sex,
    Employee_MaritalStatus                 :     maritalstatus,
    Branch                                 :     branch,
    isApprover                             :     app,
    Employment                             :     employmentstat,

  };



}
function getuseremployee() {
  // body...
    var employeeemail     =   document.getElementById('empemail').value;
     var familyname       =      document.getElementById('familyname').value;
     var employeeid       =      document.getElementById('employeeid').value;
     var ukey             =      document.getElementById('userKey').value;
     // var str             =      familyname+employeeid +"@leaveshero.com";
     // var res             =      str.toLowerCase();
     // var email           =      res.replace(/\s+/g, "").toLowerCase();
     var userid1         =      document.getElementById('userid').value;
     var  emppassword    =      password;
     var type            =     "Employee";
     var status          =     "Active"; 

  return{


    UsersName         :    employeeemail,
    Type              :    type,
    Company_Id        :    ukey,
    Company_User_Id   :    userid1,
    Password          :    emppassword,
    Status            :    status,
   
  };


}
function addMember (event){
  event.preventDefault();
  var userid2      =   document.getElementById('userid').value;
  var Leave        =   getFormData();
  var user         =   getuseremployee();

  
      users.push(user);
     member_ref.child(userid2).push(Leave);
     var tosend          = $('#empemail').val();
     var  emppassword    =  password;
    
Email.send({
    SecureToken : "1ed6ef29-4325-4889-a6ab-3e8255ac7093",
    To   : tosend,
    From : 'leaveshero@gmail.com',
    Subject : "Employee Leave Manangement System",
    Body : "Your Login Account"+
           "Username :"+tosend +""+
           "Password :"+emppassword+"",

});
    var query2   =   firebase.database().ref("Employee").child(userid2);
        query2.once("value").then(function(snapshot){
        snapshot.forEach(function(childSnapshot){
              var key2            = childSnapshot.key;
              document.getElementById("addleavesummarykey").value = key2;

                });
              });
document.getElementById("familyname").value           =   "";     
document.getElementById("gender").value               =   ""; 
document.getElementById("maritalstatus").value        =   ""; 
document.getElementById("givenname").value            =   ""; 
document.getElementById("middleinitial").value        =   ""; 
document.getElementById("suffix").value               =   ""; 
document.getElementById("religion").value             =   ""; 
document.getElementById("empemail").value             =   ""; 
document.getElementById("contactperson").value        =   ""; 
document.getElementById("contactnumber1").value       =   ""; 
document.getElementById("contactpersonsnumber").value =   ""; 
document.getElementById("employeeid").value           =   ""; 
document.getElementById("branch").value               =   ""; 
document.getElementById("department").value           =   ""; 
document.getElementById("address").value              =   ""; 
document.getElementById("datehired").value            =   ""; 
document.getElementById("date").value                 =   ""; 
document.getElementById("age").value                  =   ""; 
 
      var query1        = firebase.database().ref("Company_Leave").child(userid2);
          query1.once("value").then(function(snapshot){

          snapshot.forEach(function(childSnapshot){
              var key                     = childSnapshot.key;
              var LeaveType               = childSnapshot.child("LeaveType").val();
              var Company_Id              = childSnapshot.child("Company_Id").val();
              var NumberofDays            = childSnapshot.child("NumberofDays").val();
              var Requirement             = childSnapshot.child("Requirement").val();
              var GenderType              = childSnapshot.child("GenderType").val();
              var ConvertToCash           = childSnapshot.child("ConvertToCash").val();
              var Retirement_Benefits     = childSnapshot.child("Retirement_Benefits").val();
              var ConvertToCash           = childSnapshot.child("ConvertToCash").val();
              var Notes                   = childSnapshot.child("Notes").val();
              var Month                   = childSnapshot.child("Month").val();
              var visibility              = childSnapshot.child("visibility").val();
              var MinimumDaysRequire      = childSnapshot.child("MinimumDaysRequire").val();
              var userid2                 =   document.getElementById('userid').value;
              var query2                  =   firebase.database().ref("Employee").child(userid2);
                 query2.once("value").then(function(snapshot1){
                snapshot1.forEach(function(childSnapshot1){
                 var key1                        = childSnapshot1.key;  
                 var addleavesummarykey          = document.getElementById("addleavesummarykey").value;

                var empush  = query2.child(addleavesummarykey);
                 if(addleavesummarykey == key1)
                 {
                      var consume  ="0";
                     empush.child("Leave_Summary").push({
                      Available           : NumberofDays,
                      Company_Id          : userid2,
                      Consume             : consume,
                      LeaveType           : LeaveType,
                      NumberofDays        : NumberofDays,
                      Requirement         : Requirement,
                      GenderType          : GenderType,
                      Retirement_Benefits : Retirement_Benefits,
                      ConvertToCash       : ConvertToCash,
                      Notes               : Notes,
                      Month               : Month,
                     visibility           : visibility,
                     MinimumDaysRequire   : MinimumDaysRequire,
                      });
                    }
                    var query        = firebase.database().ref("Company_Employee_Leave_Type").child(userid2);
                      query.once("value").then(function(snapshot2){
                      snapshot2.forEach(function(childSnapshot2){
                          var key2                    = childSnapshot2.key;
                          var LeaveType1              = childSnapshot2.child("LeaveType").val();
                          var Company_Id1             = childSnapshot2.child("Company_Id").val();
                          var NumberofDays1           = childSnapshot2.child("NumberofDays").val();
                          var GenderType1             = childSnapshot2.child("GenderType").val();
                          var Position                = childSnapshot2.child("Position").val();
                          var Requirement1            = childSnapshot2.child("Requirement").val();
                          var ConvertToCash1          = childSnapshot2.child("ConvertToCash").val();
                          var Retirement_Benefits1    = childSnapshot2.child("Retirement_Benefits").val();
                          var Notes1                  = childSnapshot2.child("Notes").val();
                          var Month1                  = childSnapshot2.child("Month").val();
                          var visibility              = childSnapshot2.child("visibility").val();
                          var MinimumDaysRequire1     = childSnapshot2.child("MinimumDaysRequire").val();
                         var addleavesummarykey        = document.getElementById("addleavesummarykey").value;
                          var empush2 = query2.child(addleavesummarykey);
                           var position         = document.getElementById("position").value;

                            if(Position == position){
                              var consume  ="0";
                              empush2.child("Leave_Summary").push({

                              Available           : NumberofDays1,
                              Company_Id          : userid2,
                              Consume             : consume,
                              LeaveType           : LeaveType1,
                              NumberofDays        : NumberofDays1,
                              Requirement         : Requirement1,
                              GenderType          : GenderType1,
                              Retirement_Benefits : Retirement_Benefits1,
                              ConvertToCash       : ConvertToCash1,
                              Notes               : Notes1,
                              Month               : Month1,
                              visibility          : visibility,
                              MinimumDaysRequire   : MinimumDaysRequire,
                            
                            });
                              document.getElementById("position").value             =   ""; 
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


            }
          if(count == 0){
                $('#badge1').hide();
              }
         
          });
        });
     });
 });

}

function get_Company_Department(){
      var comuid                    =     document.getElementById("userid").value;
      var query = firebase.database().ref("Company_Department/"+comuid).orderByKey();
          query.once("value").then(function(snapshot){  
         snapshot.forEach(function(childSnapshot){
            var key                  =  childSnapshot.key;
            var Department           =  childSnapshot.child("Department").val();

        $("#department").append('<option>'+Department+'</option>');
        });
    });
}
function get_Company_Branch(){
      var comuid                    =     document.getElementById("userid").value;
      var query = firebase.database().ref("Company_Branch/"+comuid).orderByKey();
          query.once("value").then(function(snapshot){  
         snapshot.forEach(function(childSnapshot){
            var key                  =  childSnapshot.key;
            var Branch           =  childSnapshot.child("Branch").val();
       
        $("#branch").append('<option>'+Branch+'</option>');
        });
    });
}

function get_Company_Position(){
      var comuid                    =     document.getElementById("userid").value;
      var query = firebase.database().ref("Company_Employee_Position/"+comuid).orderByKey();
          query.once("value").then(function(snapshot){  
         snapshot.forEach(function(childSnapshot){
            var key                  =  childSnapshot.key;
            var Position             =  childSnapshot.child("Position").val();

        $("#position").append('<option>'+Position+'</option>');
        });
    });
}
function init(){
  $("#addemployee").on("click",addMember);
  $("#comedit").on("click",updateempprofile);

  notif();
  reload_notif();
  get_Company_Department();
  get_Company_Branch();
  get_Company_Position();
}
function reload_notif(){
   window.setInterval(notif, 1000);
}
 function reload_page(){
     window.location.reload();
}
//START the app
init();
  } else {
    // No user is signed in.


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


 
 function addemployee(){



            Swal.fire({type:'success',title:'Successfully Send.............'}).then(function() {
            // Redirect the user
            window.location.href = "companyaddemployee.php";
            console.log('The Ok Button was clicked.');
            });
				
}
  </script>



