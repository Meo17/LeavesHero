
  <?php require_once 'includes/EmployeeRecord.php'?>
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
            var companyname      = childSnapshot.child("Company_Name").val();
            var Company_profile  = childSnapshot.child("Company_profile").val();
            var childData        = childSnapshot.val();

          if(Company_profile == ""){
              Company_profile = document.querySelector("#profile").src = "images/icon_user.png"; 
              Company_profile = document.querySelector("#image_upload_preview").src = "images/icon_user.png"; 
            }         
          if(user.email == name){
              document.getElementById("photourl").value             =  Company_profile;
              document.getElementById("userKey").value              =  key;
              document.getElementById("companyaddress").value       =  companyaddress; 
              document.getElementById("password").value             =  password; 
              document.getElementById("companycontact").value       =  contact; 
              document.getElementById("email").value                =  email; 
              document.getElementById("user_para").innerHTML        =  companyname;
             document.querySelector('#profile').src                 =  Company_profile;
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

  } 
    if(user != null ){

      var email_id = user.email;
      var user_id = user.uid;
      document.getElementById("userid").value =  user_id;
     // document.getElementById("user_para").innerHTML =  email_id;
      

    }
    var db3                   = firebase.database();
    var query                 =   db3.ref("Employee/"+refuserid);
    var sgtTableElement       =   $('#table');
    var deactivatetable       =   $('#deactivatetable');
function hidemodal(){
            $("#deletemp").modal("hide");
    }
var usercompanyid                    =     document.getElementById("userid").value;
var employeeleaverequestref          =     db3.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         =     db3.ref("Leave_Request/"+usercompanyid);

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

        $("#modal-edit-department").append('<option>'+Department+'</option>');
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
       
        $("#modal-edit-branch").append('<option>'+Branch+'</option>');
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

        $("#modal-edit-position").append('<option>'+Position+'</option>');
        });
    });
}
function retrieveholiday(){
  var usercompanyid                    =     document.getElementById("userid").value;
  var db                               =     firebase.database();
  var compholiday1                     =     db.ref('Company_Holiday/'+usercompanyid);
  var start ;     
  var  end ;
    var dates =["2019-01-01","2019-04-09","2019-04-19","2019-04-18","2019-05-01","2019-06-12","2019-08-26","2019-11-30","2019-12-25","2019-12-30"];  
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
         dates.push(End,Start);
        }
  
      });
    var datesForDisable = dates;

             $(".date1").datepicker({
                format: 'yyyy-mm-dd',
                startDate: '-3d',
                autoclose: true,
                todayHighlight: true,
                datesDisabled: datesForDisable,

             }) 
   });

}
function init(){

    $("#comedit").on("click",updateempprofile);
    $("#empdel").on("click",hidemodal);
retrieveholiday()
notif();
reload_notif();
get_Company_Department();
get_Company_Branch();
get_Company_Position();



}
function reload_notif(){
   window.setInterval(notif, 1000);
}
init(); 

/////////////////////////////////STAR////////////////////////////////////
var db7                     =   firebase.database();
var refuserid               =   document.getElementById('userid').value;
var employee_ref            =   db7.ref('Employee/'+refuserid);
var employees_ref           =   db7.ref('Employee/'+refuserid);
var table                   =   $('#table tbody');


$(function ($) {



 

    var refuserid          =   document.getElementById('userid').value;
    var deleteemployee     =   firebase.database().ref('Employee/'+refuserid);
   
    var delusers           =   firebase.database().ref('Users/');
    var delapprover        =   firebase.database().ref('Company_Approver/'+refuserid);

    var submitBtn          =   $('#approver'),
        submitBtn1         =   $('#empdel'),
        sgtTableElement    =   $('#table'),
        deactivatetable    =   $('#deactivatetable'),
        Force_Leaveref     =   new Firebase("https://leaveshero42-37675.firebaseio.com/ForceLeave/"+refuserid),
        firebaseRef        =   new Firebase("https://leaveshero42-37675.firebaseio.com/Employee/"+refuserid),
        firebaseRef2       =   new Firebase("https://leaveshero42-37675.firebaseio.com/Users"),
        firebaseRef3       =   new Firebase("https://leaveshero42-37675.firebaseio.com/Company_Approver"),
        firebaseRef4       =   new Firebase("https://leaveshero42-37675.firebaseio.com/Company_Approver_Username/"+refuserid);

    firebaseRef.on("child_added", function (studentSnapShot) {
        updateDOM(studentSnapShot);
    }, function (errorObject) {
        console.log("The read failed: " + errorObject.code);
    });
    firebaseRef.on("child_removed", function (studentSnapShot) {
        updateDOM(studentSnapShot);
    }, function (errorObject) {
        console.log("The read failed: " + errorObject.code);
    });
    firebaseRef.on("child_changed", function (studentSnapShot) {
        updateDOM(studentSnapShot);
    }, function (errorObject) {
        console.log("The read failed: " + errorObject.code);
    });

      /** Edit button handler */
    sgtTableElement.on('click', '.edit-btn', function () {
        var student_id = $(this).data('id');
        var studentFirebaseRef = firebaseRef.child(student_id);

        studentFirebaseRef.once('value', function (snapshot) {
            $('#modal-edit-lname').val(snapshot.val().Employee_LastName);
            $('#modal-edit-fname').val(snapshot.val().Employee_FirstName);
            $('#modal-edit-mid').val(snapshot.val().Employee_MiddleInitial);
            $('#modal-edit-suffix').val(snapshot.val().Employee_Suffix);
            $('#modal-edit-sex').val(snapshot.val().Employee_Sex);
            $('#modal-edit-maritalstatus').val(snapshot.val().Employee_MaritalStatus);
            $('#modal-edit-bdate').val(snapshot.val().Employee_Birthdate);
            $('#modal-edit-address').val(snapshot.val().Employee_Address);
            $('#modal-edit-religion').val(snapshot.val().Employee_Religion);
            $('#modal-edit-contactno1').val(snapshot.val().Employee_Contact1);
            $('#modal-edit-empemail').val(snapshot.val().Employee_Email);
            $('#modal-edit-contactperson').val(snapshot.val().Employee_ContactPerson);    
            $('#modal-edit-contactpersonno').val(snapshot.val().Employee_ContactPersonNumber);
            $('#modal-edit-department').val(snapshot.val().Employee_Department);
            $('#modal-edit-position').val(snapshot.val().Employee_Position);
            $('#modal-edit-hiredate').val(snapshot.val().Employee_HireDate);
            $('#modal-edit-branch').val(snapshot.val().Branch); 

            $('#student-id').val(student_id);

            console.log("$('#student-id').val(student_id) : ", $('#student-id').val(student_id));

            $("#edit-modal").modal("show");
        });
    });
    sgtTableElement.on('click', '.view-btn', function () {
        var student_id = $(this).data('id');
        var studentFirebaseRef = firebaseRef.child(student_id);

        studentFirebaseRef.once('value', function (snapshot) {
            var key = snapshot.key;
            $('#modal-edit-lname1').val(snapshot.val().Employee_LastName);
            $('#modal-edit-fname1').val(snapshot.val().Employee_FirstName);
            $('#modal-edit-mid1').val(snapshot.val().Employee_MiddleInitial);
            $('#modal-edit-suffix1').val(snapshot.val().Employee_Suffix);
            $('#modal-edit-sex1').val(snapshot.val().Employee_Sex);
            $('#modal-edit-maritalstatus1').val(snapshot.val().Employee_MaritalStatus);
            $('#modal-edit-bdate1').val(snapshot.val().Employee_Birthdate);
            $('#modal-edit-address1').val(snapshot.val().Employee_Address);
            $('#modal-edit-religion1').val(snapshot.val().Employee_Religion);
            $('#modal-edit-contactno1').val(snapshot.val().Employee_Contact1);
            $('#modal-edit-empemail1').val(snapshot.val().Employee_Email);
            $('#modal-edit-contactperson1').val(snapshot.val().Employee_ContactPerson);    
            $('#modal-edit-contactpersonno1').val(snapshot.val().Employee_ContactPersonNumber);
            $('#modal-edit-department1').val(snapshot.val().Employee_Department);
            $('#modal-edit-position1').val(snapshot.val().Employee_Position);
            $('#modal-edit-hiredate1').val(snapshot.val().Employee_HireDate);
            $('#modal-edit-branch1').val(snapshot.val().Branch); 


            console.log("$('#student-id').val(student_id) : ", $('#student-id').val(student_id));
           
        });
      var emppkey = document.getElementById('student-id').value; 
      var studentFirebaseRef1 = firebaseRef.child(emppkey);
       studentFirebaseRef1.child("Leave_Summary").once('value', function(snapshot2) {
                    snapshot2.forEach(function(childSnapshot1){
                     var key3           = childSnapshot1.key;
                     var Available     = childSnapshot1.child("Available").val();
                     var Consume       = childSnapshot1.child("Consume").val();
                     var LeaveType     = childSnapshot1.child("LeaveType").val();
                     var NumberofDays  = childSnapshot1.child("NumberofDays").val();
                     var Notes         = childSnapshot1.child("Notes").val();
                     var ConvertToCash           = childSnapshot1.child("ConvertToCash").val();
 
                     console.log(Available);
                  if(ConvertToCash == true){
                      $(".bth-convertcash").show();
                    }
                    if(Retirement_Benefits == true){
                      $(".bth-benefits").show();
                    }
                     if(Retirement_Benefits == false){
                     $(".bth-benefits").hide();
                    }
                    if(ConvertToCash == false){
                     $(".bth-convertcash").hide();
                    }
                     $("#leave_Summary").append(
                      '<div class="row containerref" style="float: left;height:auto;" id="tbody1"">'
                      + '<input type="hidden" id="retleavetype" value ="'+LeaveType +'">'
                      + '<input type="hidden" id="keyleave" value ="'+ key3 +'">'
                      + '<div class="col-sm-3" style="width: 300px;float: left;margin-left: 20px;">'
                      +'<div class="row" style="float: left;height:auto;" >'
                      + '<div class="col-sm-3" style="width: 300px;float: left;margin-left: 20px;">'
                      +'<div class="card"  style="background-color: white">'
                      +'<div class="inner text-center" style="height: 320px"> '
                      +' <h3 style="padding-top:15px"><b>'+LeaveType+'</b</h3>'
                      +' <div style="float: center;padding-left: 55px">'
                      +' <h5 style="margin-left:-60px"><b>Annual Leave Entitlement</b></h5>'
                      +' <h5 style="margin-left:-60p;color:red"><b>'+Notes+'</b></h5>'
                      +'<div style="float: left;">'
                      +'<h6><b>Annual Entitlement             : </b><b style="padding-left:40px">'+NumberofDays+' </b></h6>'
                      +'<h6 style="margin-left:-5px"><b>Available to Apply  : </b><b  style="padding-left:50px">'+  Available+'</b></h6>'
                      +'<h6 style="margin-left:-6px"><b>Total Leave Applied  : </b><b  style="padding-left:40px">'+ Consume +'</b></h6>'
                      +'</div>'
                      +'<div style="margin-right:20px">'
                      +'<div style=" text-align: right;margin-left: -200px;">'
                      +'<button  class="btn btn-warning bth-convertcash"  style="font-size:11px;width:210px;margin-right:10px" data-key="'+ key3 + '" data-toggle="modal" data-id="'+ key3 + '">Convertable To Cash</button>'
                      + '</div>'
                         +'<div style=" text-align: right;margin-left: -200px;">'
                      +'<button  class="btn btn-info bth-benefits" style="font-size:11px;width:210px;margin-right:10px" data-key="'+ key3 + '" data-toggle="modal" data-id="'+ key3 + '">Add to Retirement Benefits</button>'
                      + '</div>'
                      +'<div>'
                      + '</div>'
                      + '</div>'
                  
                      );
                  });
            });
     
          $("#viewdata").modal("show");
    });
      sgtTableElement.on('click', '.setapprver-btn', function () {
        var student_id = $(this).data('id');
        var studentFirebaseRef = firebaseRef.child(student_id);

        studentFirebaseRef.once('value', function (snapshot) {

            $('#company-id').val(snapshot.val().Company_Id);
            $('#emp-id').val(snapshot.val().Employee_Id);
            $('#firstname').val(snapshot.val().Employee_FirstName);
            $('#middleinitial').val(snapshot.val().Employee_MiddleInitial);
            $('#lastname').val(snapshot.val().Employee_LastName);
            $('#position').val(snapshot.val().Employee_Position);
            $('#sample').val(snapshot.val().Username);
            $('#suffix').val(snapshot.val().Employee_Suffix);
            document.getElementById("employeekey").value    =  student_id;
            console.log("$('#student-id').val(student_id) : ", $('#student-id').val(student_id));

            $("#setapprover").modal("show");
        });

  
    }); 

    $("#setapprover").on('click', '#setapp-btn', function () {
        console.log("im here");
        console.log("('#edit-modal').find('#student-id').val() :", $('#edit-modal').find('#student-id').val());

            var Company_Id                  =   $('#company-id').val(),
                    Employee_Id             =   $('#emp-id').val(),
                    Employee_FirstName      =   $('#firstname').val(),
                    Employee_LastName       =   $('#lastname').val(),
                    Employee_MiddleInitial  =   $('#middleinitial').val(),
                    Employee_Position       =   $('#position').val(),
                    username                =   $('#sample').val(),
                    suffix                  =   $('#suffix').val();

                if(suffix =="-"){

                  suffix ="";
                }
            firebaseRef3.child(refuserid).push({
                                Company_Id              : Company_Id,
                                Employee_Id             : Employee_Id,
                                Employee_FirstName      : Employee_FirstName,
                                Employee_LastName       : Employee_LastName,
                                Employee_MiddleInitial  : Employee_MiddleInitial,
                                Employee_Position       : Employee_Position,
                                Username                : username,
                                Employee_Suffix         : suffix,
                                
                        });
            var app                = "true" ;
            var empkey = document.getElementById("employeekey").value;   
            firebaseRef.child(empkey).update({
                isApprover  : app,
            });

            $("#setapprover").modal('hide');

               swal({type:'success',title: "Sucessfully Sent !",icon: "success",});

            });
    /** Edit Student Function
     * studentFirebaseReference argument should be the unique url of the selected student
     */
    function studentEdit(studentFirebaseReference) {

        var newlname             =   $('#modal-edit-lname').val(),
            newfname             =   $('#modal-edit-fname').val(),
            newmid               =   $('#modal-edit-mid').val(),
            newsuffix            =   $('#modal-edit-suffix').val(),
            newsex               =   $('#modal-edit-sex').val(),
            newmaritalstatus     =   $('#modal-edit-maritalstatus').val(),
            newbdate             =   $('#modal-edit-bdate').val(),
            newaddress           =   $('#modal-edit-address').val(),
            newreligion          =   $('#modal-edit-religion').val(),
            newcontactno1        =   $('#modal-edit-contactno1').val(),
            newempemail          =   $('#modal-edit-empemail').val(),
            newcontactperson     =   $('#modal-edit-contactperson').val(),
            newcontactpersonno   =   $('#modal-edit-contactpersonno').val(),
            newdepartment        =   $('#modal-edit-department').val(),
            newposition          =   $('#modal-edit-position').val(),
            newhiredate          =   $('#modal-edit-hiredate').val(),
            newbranch            =   $('#modal-edit-branch').val();

        console.log('student updated', 'newlname: ', newlname, 'newfname: ', newfname, 'newmid: ', newmid);

        studentFirebaseReference.update({

            Employee_LastName                 :   newlname,
            Employee_FirstName                :   newfname,
            Employee_MiddleInitial            :   newmid,
            Employee_Suffix                   :   newsuffix,
            Employee_Sex                      :   newsex,
            Employee_MaritalStatus            :   newmaritalstatus,
            Employee_Birthdate                :   newbdate,
            Employee_Address                  :   newaddress,
            Employee_Religion                 :   newreligion,
            Employee_Contact1                 :   newcontactno1,
            Employee_Email                    :   newempemail,
            Employee_ContactPerson            :   newcontactperson,
            Employee_ContactPersonNumber      :   newcontactpersonno,
            Employee_Department               :   newdepartment,
            Employee_Position                 :   newposition,
            Employee_HireDate                 :   newhiredate,
            Branch                            :   newbranch
        });
    }

    /** Click handler for modal confirm button */
    $("#edit-modal").on('click', '#confirm-edit', function () {
        console.log("im here");
        console.log("('#edit-modal').find('#student-id').val() :", $('#edit-modal').find('#student-id').val());
        var studentFirebaseRef = firebaseRef.child($('#edit-modal').find('#student-id').val());
        /* edit form click handler */
        studentEdit(studentFirebaseRef);

        $("#edit-modal").modal('hide');


            window.location.reload();
            
    });


    sgtTableElement.on('click', '.delete-btn', function () {
        var student_id = $(this).data('id');
        var studentFirebaseRef = firebaseRef.child(student_id);

        studentFirebaseRef.once('value', function (snapshot) {
            $('#delid').val(snapshot.val().Company_Id);
            $('#empid').val(snapshot.val().Employee_Id);
            $('#firstname').val(snapshot.val().Employee_FirstName);
            $('#middleinitial').val(snapshot.val().Employee_MiddleInitial);
            $('#lastname').val(snapshot.val().Employee_LastName);
            $('#position').val(snapshot.val().Employee_Position);
            $('#empemail').val(snapshot.val().Username);
            $('#emppass').val(snapshot.val().Password);

            document.getElementById("delid").value =  student_id;

           console.log("$('#delid').val(delid) : ", $('#delid').val(student_id));

            $("#deletemp").modal("show");
           
        });


        var uemail       =   document.getElementById("empemail").value;
        var uemppass     =   document.getElementById("emppass").value;
        var deleteusers  =   firebase.database().ref("Users/");

        deleteusers.orderByKey().on("child_added", function(data) {
            console.log(data.key);
            var key                   = data.key;
            var UsersName             = data.child("UsersName").val();
            var Password              = data.child("Password").val();
            var Emp_UID               = data.child("Emp_UID").val();
            var Password              = data.child("Password").val();

            if (uemail == UsersName && Password == uemppass) {

              document.getElementById("key").value    =  key;
              document.getElementById("empuid").value =  Emp_UID;
           

            }
           


        });

        var delempid          =   document.getElementById("empid").value;
        var companyid         =   document.getElementById('userid').value;
        var approver          =   firebase.database().ref("Company_Approver/"+ companyid);
            approver.orderByKey().on("child_added", function(approverdata) {
            console.log(approverdata.key);
            var apkey                  = approverdata.key;
            var Employee_Id            = approverdata.child("Employee_Id").val();

            if (Employee_Id == delempid ) {

              document.getElementById("approverkey").value    =  apkey;

            }
           


        });
    });

    $("#deletemp").on('click', '#empdel', function () {
        console.log("im here");
        console.log("('#edit-modal').find('#student-id').val() :", $('#edit-modal').find('#student-id').val());
          var  deleteemp  = document.getElementById("delid").value;
          var  deluserkey = document.getElementById("key").value;
          var  delapproverkey = document.getElementById("approverkey").value;
          var  empstatus = "Deactivate";
          deleteemployee.child(deleteemp).update({
                Employee_Status  :   empstatus,
            });
          delusers.child(deluserkey).remove();
          delapprover.child(delapproverkey).remove();
          swal({type:'success',title: "Sucessfully Deactivate !",icon: "success",});
           $("#deletemp").modal("hide");
      });

    deactivatetable.on('click', '.view-all ', function () {
        var student_id = $(this).data('id');
        var studentFirebaseRef = firebaseRef.child(student_id);
        document.getElementById('viewallid').value = student_id;
        studentFirebaseRef.once('value', function (snapshot) {
          
            var key = snapshot.key;
            $('#modal-deac-lname1').val(snapshot.val().Employee_LastName);
            $('#modal-deac-fname1').val(snapshot.val().Employee_FirstName);
            $('#modal-deac-mid1').val(snapshot.val().Employee_MiddleInitial);
            $('#modal-deac-suffix1').val(snapshot.val().Employee_Suffix);
            $('#modal-deac-sex1').val(snapshot.val().Employee_Sex);
            $('#modal-deac-maritalstatus1').val(snapshot.val().Employee_MaritalStatus);
            $('#modal-deac-bdate1').val(snapshot.val().Employee_Birthdate);
            $('#modal-deac-address1').val(snapshot.val().Employee_Address);
            $('#modal-deac-religion1').val(snapshot.val().Employee_Religion);
            $('#modal-deac-contactno1').val(snapshot.val().Employee_Contact1);
            $('#modal-deac-empemail1').val(snapshot.val().Employee_Email);
            $('#modal-deac-contactperson1').val(snapshot.val().Employee_ContactPerson);    
            $('#modal-deac-contactpersonno1').val(snapshot.val().Employee_ContactPersonNumber);
            $('#modal-deac-department1').val(snapshot.val().Employee_Department);
            $('#modal-deac-position1').val(snapshot.val().Employee_Position);
            $('#modal-deac-hiredate1').val(snapshot.val().Employee_HireDate);
            $('#modal-deac-branch1').val(snapshot.val().Branch); 


            console.log("$('#student-id').val(student_id) : ", $('#student-id').val(student_id));
           
        });
      var emppkey = document.getElementById('viewallid').value; 
      var studentFirebaseRef1 = firebaseRef.child(emppkey);
       studentFirebaseRef1.child("Leave_Summary").once('value', function(snapshot2) {
                    snapshot2.forEach(function(childSnapshot1){
                     var key3           = childSnapshot1.key;
                     var Available     = childSnapshot1.child("Available").val();
                     var Consume       = childSnapshot1.child("Consume").val();
                     var LeaveType     = childSnapshot1.child("LeaveType").val();
                     var NumberofDays  = childSnapshot1.child("NumberofDays").val();
                      var Notes         = childSnapshot1.child("Notes").val();
                     var ConvertToCash           = childSnapshot1.child("ConvertToCash").val();
                     var Retirement_Benefits     = childSnapshot1.child("Retirement_Benefits").val();
                     console.log(Available);
                  if(ConvertToCash == true){
                      $(".bth-convertcash").show();
                    }
                    if(Retirement_Benefits == true){
                      $(".bth-benefits").show();
                    }
                     if(Retirement_Benefits == false){
                     $(".bth-benefits").hide();
                    }
                    if(ConvertToCash == false){
                     $(".bth-convertcash").hide();
                    }      
                     console.log(Available);
                     $("#deac_leave_Summary").append(
                      '<div class="row containerref" style="float: left;height:auto;" id="tbody1"">'
                      + '<input type="hidden" id="retleavetype" value ="'+LeaveType +'">'
                      + '<input type="hidden" id="keyleave" value ="'+ key3 +'">'
                      + '<div class="col-sm-3" style="width: 300px;float: left;margin-left: 20px;">'
                      +'<div class="row" style="float: left;height:auto;" >'
                      + '<div class="col-sm-3" style="width: 300px;float: left;margin-left: 20px;">'
                      +'<div class="card"  style="background-color: white">'
                      +'<div class="inner text-center" style="height: 320px"> '
                      +' <h3 style="padding-top:15px"><b>'+LeaveType+'</b</h3>'
                      +' <div style="float: center;padding-left: 55px">'
                      +' <h5 style="margin-left:-60px"><b>Annual Leave Entitlement</b></h5>'
                      +' <h5 style="margin-left:-60p;color:red"><b>'+Notes+'</b></h5>'
                      +'<div style="float: left;">'
                      +'<h6><b>Annual Entitlement             : </b><b style="padding-left:40px">'+NumberofDays+' </b></h6>'
                      +'<h6 style="margin-left:-5px"><b>Available to Apply  : </b><b  style="padding-left:50px">'+  Available+'</b></h6>'
                      +'<h6 style="margin-left:-6px"><b>Total Leave Applied  : </b><b  style="padding-left:40px">'+ Consume +'</b></h6>'
                      +'</div>'
                      +'<div style="margin-right:20px">'
                      +'<div style=" text-align: right;margin-left: -200px;">'
                      +'<button  class="btn btn-warning bth-convertcash"  style="font-size:11px;width:210px;margin-right:10px" data-key="'+ key3 + '" data-toggle="modal" data-id="'+ key3 + '">Convertable To Cash</button>'
                      + '</div>'
                         +'<div style=" text-align: right;margin-left: -200px;">'
                      +'<button  class="btn btn-info bth-benefits" style="font-size:11px;width:210px;margin-right:10px" data-key="'+ key3 + '" data-toggle="modal" data-id="'+ key3 + '">Add to Retirement Benefits</button>'
                      + '</div>'
                      +'<div>'
                      + '</div>'
                      + '</div>'
                      );  
                  
                  });
              });

            $("#viewall-modal").modal("show");
          });
           
 
   

    //---------------------force  leave--------------------------------
    sgtTableElement.on('click', '.forceleave-btn', function () {
        var student_id = $(this).data('id');
        var studentFirebaseRef = firebaseRef.child(student_id);

        var from = new Date();
            var hours = from.getHours() % 12;
              hours = hours ? hours : 12;
                var dateTime = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][(from.getMonth())] + " " + 
                ("00" + from.getDate()).slice(-2) + " " + 
                from.getFullYear() + " " + 
                ("00" + hours).slice(-2) + ":" + 
                ("00" + from.getMinutes()).slice(-2) + ":" + 
                ("00" + from.getSeconds()).slice(-2) + ' ' + (from.getHours() >= 12 ? 'PM' : 'AM'); 

            document.getElementById('applieddate1').innerHTML =  dateTime;

        studentFirebaseRef.once('value', function (snapshot) {
            $('#forcecomid').val(snapshot.val().Company_Id);
            $('#Employee_Id').val(snapshot.val().Employee_Id);
            $('#foreceempemail').val(snapshot.val().Username);
            $('#Employee_Suffix').val(snapshot.val().Employee_Suffix);
            $('#Employee_FirstName').val(snapshot.val().Employee_FirstName);
            $('#Employee_MiddleInitial').val(snapshot.val().Employee_MiddleInitial);
            $('#Employee_LastName').val(snapshot.val().Employee_LastName);

            var samp = snapshot.val().Employee_Suffix ;
           if(samp =='-'){
              samp = "";
            }
     var fullname = snapshot.val().Employee_FirstName +" " + snapshot.val().Employee_MiddleInitial +" "+  snapshot.val().Employee_LastName+" " +samp;


        document.getElementById('foreceemployeename').innerHTML = fullname;
        document.getElementById('foreceemployeename1').value    = fullname;
        document.getElementById('foreceempidno1').innerHTML     = snapshot.val().Employee_Id;

            $('#foreceempidno1').val(snapshot.val().Employee_Id);
            $("#forceleave").modal("show");
           
        });


    });
    $("#forceleave").on('click', '#sendforceleave', function () {

            var Company_Id               =   $('#forcecomid').val(),
                    Employee_Id          =   $('#Employee_Id').val(),
                    Employee_Fulname     =   $('#fullnameforce').val(),
                    leavefrom1           =   $('#leavefrom1').val(),
                    leaveuntil1          =   $('#leaveuntil1').val(),
                    leavetype            =   $('#leavetype').val(),
                    reason               =   $('#reason').val(),
                    foreceemployeename1  =   $('#foreceemployeename1').val(),
                    username             =   $('#foreceempemail').val();

                var status      = "";
                var refuserid   =   document.getElementById('userid').value;
        var from = new Date();
            var hours = from.getHours() % 12;
              hours = hours ? hours : 12;
                var dateTime = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][(from.getMonth())] + " " + 
                ("00" + from.getDate()).slice(-2) + " " + 
                from.getFullYear() + " " + 
                ("00" + hours).slice(-2) + ":" + 
                ("00" + from.getMinutes()).slice(-2) + ":" + 
                ("00" + from.getSeconds()).slice(-2) + ' ' + (from.getHours() >= 12 ? 'PM' : 'AM'); 

   
            Force_Leaveref.child(Employee_Id).push({
                              comId          : refuserid,
                              dateApplied    : dateTime,
                              eid            : Employee_Id,
                              email          : username,
                              leaveFrom      : leavefrom1,
                              leaveType      : leavetype,
                              leaveuntil     : leaveuntil1,
                              name           : foreceemployeename1,
                              reason         : reason,
                              status         : status,
                            
                                
                        });
 
                  $("#forceleave").modal('hide');
                 swal({type:'success',title: "Sucessfully Sent !",icon: "success",});
             
            });

    /** DOM CREATION ================================== */
    function updateDOM(studentSnapShot) {
        var studentObject    = studentSnapShot.val();
        var studentObjectId  = studentSnapShot.key();
        var studentRow       = $("#" + studentObjectId);



        if (studentObject.Employee_Status == "Active" ) {
            //change current
            studentRow.find(".student-lname").text(studentObject.Employee_LastName);
            studentRow.find(".student-fname").text(studentObject.Employee_FirstName);
            studentRow.find(".student-mi").text(studentObject.Employee_MiddleInitial);
            studentRow.find(".student-bdate").text(studentObject.Employee_Birthdate);
            studentRow.find(".student-sex").text(studentObject.Employee_Sex);
            studentRow.find(".student-maritalstatus").text(studentObject.Employee_MaritalStatus);
            studentRow.find(".student-religion").text(studentObject.Employee_Religion);
            studentRow.find(".student-sex").text(studentObject.Employee_Sex);
            studentRow.find(".student-email").text(studentObject.Employee_Email);      
            studentRow.find(".student-contact").text(studentObject.Employee_Contact1);      
            //add new
            var Employee_LastName = $('<td>', {
                    text: studentObject.Employee_LastName,
                    style:"font-size:12px;text-align:center",
                    class: "student-fname"

                }),
                Employee_FirstName = $('<td>', {
                    text: studentObject.Employee_FirstName,
                    style:"font-size:12px;text-align:center",
                    class: "student-fname"

                }),
                Employee_MiddleInitial = $('<td>', {
                    text: studentObject.Employee_MiddleInitial,
                      style:"font-size:12px;text-align:center",
                      class: "student-mi"
                }),
               Employee_Birthdate = $('<td>', {
                    text: studentObject.Employee_Birthdate,
                    style:"font-size:12px;text-align:center",
                    class: "student-bdate"
          
                }),
                Employee_Sex = $('<td>', {
                    text: studentObject.Employee_Sex,
                    style:"font-size:12px;text-align:center",
                    class: "student-sex"
          
                }), 
        
    
                // Employee_Email = $('<td>', {
                //     text: studentObject.Employee_Email,
                //     style:"font-size:12px;text-align:center;word-wrap: break-word;",
                //     class: "student-email"
                // }), 
   
            /* Each student gets a unique edit and delete button appended to its row */
                sView = 
                 $('<button>', {
                    class: "view-btn btn leave  btn btn-leave btn-hover-white btn-sm",
                    Style:"font-size:10px;float:right;text-align:center;z-index:1;top:0px;width:150px",
                    title:"View Details",
                    text :"View Details",
                    'data-id': studentObjectId
                }), 
                setapprover = $('<button>', {
                    class: "setapprver-btn  btn-gray btn btn-info btn-hover-lightgray btn-sm top",
                    Style:"font-size:10px;float:right;z-index:1;top:0px;width:150px",
                    title:"Set Approver",
                    text :"Set Approver",
                    'data-id': studentObjectId
                }),   
               sEditBtn =
                $('<button>', {
                    class: "btn  btn-leave  edit-btn  btn btn-gray btn-hover-lightgray btn-sm top ",
                     Style:"font-size:10px;float:right;z-index: 1;top:0px;width:150px",
                     title:"Update Information",
                     text :"Update Information",
                    'data-id': studentObjectId
                }),

              sDeleteBtn = $('<button>', {
                    class: "delete-btn  btn btn-gray btn-danger btn-hover-lightgray btn-sm top",
                    Style:"font-size:10px;float:right;z-index: 1;top:0px;width:150px",
                    title:"Deactivate",
                    text : "Deactivate",
                    'data-id': studentObjectId
                });
                forceleave = $('<button>', {
                    class: "forceleave-btn  btn btn-gray btn-warning btn-hover-lightgray btn-sm top",
                    Style:"font-size:10px;float:right;z-index: 1;top:0px;width:150px",
                    title:"Send Force Leave",
                    text :"Send Force Leave",
                    'data-id': studentObjectId
                });
            var studentRow = $('<tr id="tr" class="tr">', {
                class :"tr",
                id: studentObjectId
            });

            studentRow.append(Employee_LastName, Employee_FirstName, Employee_MiddleInitial,Employee_Birthdate,Employee_Sex, Employee_MaritalStatus,Employee_Religion,Employee_Email,Employee_Contact1,sView,setapprover,sEditBtn,sDeleteBtn,forceleave);
            sgtTableElement.append(studentRow);
        }if (studentObject.Employee_Status != "Active" ) {

            var Employee_LastName = $('<td>', {
                    text: studentObject.Employee_LastName,
                    style:"font-size:12px;text-align:center",
                    class: "student-fname"

                }),
                Employee_FirstName = $('<td>', {
                    text: studentObject.Employee_FirstName,
                    style:"font-size:12px;text-align:center",
                    class: "student-fname"

                }),
                Employee_MiddleInitial = $('<td>', {
                    text: studentObject.Employee_MiddleInitial,
                      style:"font-size:12px;text-align:center",
                      class: "student-mi"
                }),
               Employee_Birthdate = $('<td>', {
                    text: studentObject.Employee_Birthdate,
                    style:"font-size:12px;text-align:center",
                    class: "student-bdate"
          
                }),
                Employee_Sex = $('<td>', {
                    text: studentObject.Employee_Sex,
                    style:"font-size:12px;text-align:center",
                    class: "student-sex"
          
                }), 
                 Employee_MaritalStatus = $('<td>', {
                    text: studentObject.Employee_MaritalStatus,
                    style:"font-size:12px;text-align:center",
                    class: "student-maritalstatus"
      
                }),
                Employee_Religion = $('<td>', {
                    text: studentObject.Employee_Religion,
                    style:"font-size:12px;text-align:center",
                    class: "student-religion"
                    
                }), 
                Employee_Email = $('<td>', {
                    text: studentObject.Employee_Email,
                    style:"font-size:12px;text-align:center;word-wrap: break-word;",
                    class: "student-email"
                }), 
                Employee_Contact1 = $('<td>', {
                    text: studentObject.Employee_Contact1,
                    style:"font-size:12px;text-align:center;margin-right:50px;margin:auto",
                    class: "student-contact"
                }),  
            /* Each styletudent gets a unique edit and delete button appended to its row */
                sView = 
                 $('<button>', {
                    class: "view-all btn leave   btn btn-leave btn-hover-white btn-sm",
                    Style:"font-size:10px;float:right;text-align:center;z-index:1;top:0px;",
                    title:"View Details",
                    text : "View all Details",
                    'data-id': studentObjectId
                });

            var studentRow = $('<tr id="tr" class="tr">', {
                class :"tr",
                id: studentObjectId
            });

            studentRow.append(Employee_LastName, Employee_FirstName, Employee_MiddleInitial,Employee_Birthdate,Employee_Sex, Employee_MaritalStatus,Employee_Religion,Employee_Email,Employee_Contact1,sView,);
            deactivatetable.append(studentRow);

        }
    }

    });



var db                                =  firebase.database();
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


$(function ($) {
 $('#viewdata').on('hidden.bs.modal', function (e) {
           $("#leave_Summary").empty();
          

  });
  $('#viewall-modal').on('hidden.bs.modal', function (e) {
           $("#deac_leave_Summary").empty();
          

  });
});

//////////////////////////END///////////////////////////////////////////


});
  ////////////End program////////////////////////

function logout(){
    firebase.auth().signOut().then(function() {
       window.location.href = "index.php";
      console.log('Signed Out');
    }, function(error) {
      console.error('Sign Out Error', error);
        });
}

</script>
