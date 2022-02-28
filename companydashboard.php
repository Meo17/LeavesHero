<?php include_once 'includes/HRHomepage.php';
include_once 'includes/bdd.php';
?>
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
    var user      = firebase.auth().currentUser;
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
              Company_profile  = document.querySelector("#profile").src = "images/icon_user.png";
              Company_profile  = document.querySelector("#image_upload_preview").src = "images/icon_user.png";  
            }
          if(user.email == name){
              document.getElementById("photourl").value             =  Company_profile;
              document.getElementById("userKey").value              =  key;
              document.getElementById("companyaddress").value       =  companyaddress; 
              document.getElementById("password").value             =  password; 
              document.getElementById("companycontact").value       =  contact; 
              document.getElementById("email").value                =  email; 
              document.getElementById("user_para").innerHTML        =  companyname;
              document.querySelector('#profile').src                =  Company_profile;
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
  else {
    // No user is signed in.
    document.getElementById("user_div").style.display = "none";
    document.getElementById("login_div").style.display = "block";

  }
//////////////////////////////////////////START///////////////////////////////////////////////////
var db                               =     firebase.database();
var companyleave_ref                 =     db.ref('Company_Leave');
var employeeleave_ref                =     db.ref('Company_Employee_Leave_Type');
var companyholiday_ref               =     db.ref('Company_Holiday');
var usercompanyid                    =     document.getElementById("userid").value;
var employeeleaverequestref          =     db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         =     db.ref("Leave_Request/"+usercompanyid);
var compholiday1                     =     db.ref('Company_Holiday/'+usercompanyid);
var companydepartment                =     db.ref('Company_Department');
var companyposition                  =     db.ref('Company_Employee_Position');
var companybranch                    =     db.ref('Company_Branch');

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
            var holidaytype                 = childSnapshot.child("holiday_Type").val(); 
            var eventdata                   = childSnapshot.val();
            var userid4                     =   document.getElementById('userid').value;
            var eventss;
        if(snapshotkey == userid4){

                contain.push({ 
                    id          : holidaykey1,
                    title       : Title,
                    start       : Start ,
                    end         : End,
                    color       : Color,
                    description : holidaytype,
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
function getBranch() {
  // body...
  var setbranch                      =     $('#setbranch').val();
 if(setbranch !='' ){
        return({
                Branch                  :            setbranch,
            })
     swal({type:'success',title: "Successfully save!",icon: "success"});
    }
    else{
         swal({type:'error',title: "Please fill in required  fields!",icon: "error"});
      }
}
function getdepartment() {
  // body...
  var setdepartement                      =     $('#setdepartement').val();
 if(setdepartement !='' ){
      return({
              Department                  :            setdepartement,
          })
      swal({type:'success',title: "Successfully save!",icon: "success"});
    }
    else{
      swal({type:'error',title: "Please fill in required  fields!",icon: "error"});
    }
}
function getposition() {
  // body...
  var setposition                      =     $('#setposition').val();
 if(setposition !='' ){
      return({
              Position                  :            setposition,
          })
      swal({type:'success',title: "Successfully save!",icon: "success"});
    }
else{
      swal({type:'error',title: "Please fill in required  fields!",icon: "error"});
    }


}
function getleavesummary() {
  // body...
  var leavetype                      =     $('#leavetype').val();
  var numberofdays                   =     $('#numberofdays').val();
  var userkey                        =     $('#userKey').val();
  var consume = "0";
   if(leavetype !='' && numberofdays!='' ){
 
  return({
     Company_Id                          :            userkey,
     LeaveType                           :            leavetype,
     NumberofDays                        :            numberofdays,
     Consume                             :            consume, 
     Available                           :            numberofdays,                                  

      });
         swal({type:'success',title: "Successfully save!",icon: "success"});
      }else{
         swal({type:'error',title: "Please fill in required  fields!",icon: "error"});
      }
}
function getleavesummary1() {
  // body...
  var employeeleavetype                      =     $('#employeeleavetype').val();
  var employeenumberofdays                   =     $('#employeenumberofdays').val();
  var userkey1                               =     $('#userKey').val();
  var consume = "0";
  var type= "Employee Leave Type"
   if(employeeleavetype !='' && employeenumberofdays!='' ){
      return({
     Company_Id                          :            userkey1,
     LeaveType                           :            employeeleavetype,
     NumberofDays                        :            employeenumberofdays,
     Consume                             :            consume, 
     Available                           :            employeenumberofdays,
     Type                                :             type                               

      });
      swal({type:'success',title: "Successfully save!",icon: "success"});
   }else{
     swal({type:'error',title: "Please fill in required  fields!",icon: "error"});
   }

}
function getFormData() {
  // body...
  var leavetype                      =     $('#leavetype').val();
  var numberofdays                   =     $('#numberofdays').val();
  var userkey                        =     $('#userKey').val();
  var requirement                    =     $('#requirement').val();
  var halfday                        =     $('input:checkbox[name=ids1]').is(':checked');
  var fullday                        =     $('input:checkbox[name=ids2]').is(':checked');
  var muliple                        =     $('input:checkbox[name=ids3]').is(':checked');
  var requiredhours                  =     $('#requiredhours').val();
  var notesme                        =    document.getElementById('notesme') ;
  var notesme                        =    notesme[notesme.selectedIndex].value;
  var selectmonth                    =    document.getElementById('selectmonth') ;
  var selectmonth                    =    selectmonth[selectmonth.selectedIndex].value;
  var converttocash                  =    $('input:checkbox[id=converttocash]').is(':checked');
  var RetirementBenefits             =    $('input:checkbox[id=RetirementBenefits]').is(':checked');
  var genderType = "";
  if (leavetype == "Maternity"  || leavetype == "Maternity Leave" || leavetype == "Maternity leave" || leavetype== "maternity leave") {
          genderType = "Female"  
     } else if ( leavetype =="Paternity" || leavetype == "Paternity Leave" || leavetype == "Paternity leave" || leavetype== "paternity leave") {

          genderType = "Male";
    } else {
        genderType = "All";
    }
  var visibility ="false";
    if(leavetype !='' && numberofdays!='' ){
  return({
     Company_Id                          :            userkey,
     LeaveType                           :            leavetype,
     NumberofDays                        :            numberofdays,
     Requirement                         :            requirement,
     Month                               :            selectmonth,
     Notes                               :            notesme,
     ConvertToCash                       :            converttocash,
     Retirement_Benefits                 :            RetirementBenefits,
     MinimumDaysRequire                  :            requiredhours,
     visibility                          :            visibility,
     GenderType :genderType,
                 Duration: {
                Half_Day:halfday ,
                Full_Day:fullday,
                Multiple_Day:muliple,
            }
       });
   swal({type:'success',title: "Successfully save!",icon: "success"});
    }else{
         swal({type:'error',title: "Please fill in required  fields!",icon: "error"});
    }

}
function getFormDataEmployee() {
  var requiredhours1                         =     $('#requiredhours1').val();
  var employeeleavetype                      =     $('#employeeleavetype').val();
  var employeenumberofdays                   =     $('#employeenumberofdays').val();
  var employeepositon                        =     $('#employeepositon').val();
  var userkey1                               =     $('#userKey').val();
  var employeerequirement                    =     $('#employeerequirement').val();
  var halfday1                               =     $('input:checkbox[name=ids4]').is(':checked');
  var fullday1                               =     $('input:checkbox[name=ids5]').is(':checked');
  var muliple1                               =     $('input:checkbox[name=ids6]').is(':checked');
  var notesme                                =   document.getElementById('notesme1') ;
  var notesme                                =   notesme[notesme.selectedIndex].value;
  var selectmonth                            =   document.getElementById('selectmonth1') ;
  var selectmonth                            =   selectmonth[selectmonth.selectedIndex].value;
  var converttocash                  =    $('input:checkbox[id=converttocash1]').is(':checked');
  var RetirementBenefits             =    $('input:checkbox[id=RetirementBenefits1]').is(':checked');
  var genderType = "";
  if (employeeleavetype == "Maternity"  || employeeleavetype == "Maternity Leave" || employeeleavetype == "Maternity leave" || employeeleavetype== "maternity leave") {
          genderType = "Female"  
     } else if ( employeeleavetype =="Paternity" || employeeleavetype == "Paternity Leave" || employeeleavetype == "Paternity leave" || employeeleavetype== "paternity leave") {

          genderType = "Male";
    } else {
        genderType = "All";
    }
    var visibility ="false";
        if(leavetype !='' && numberofdays!='' ){
  return({
     Company_Id                          :            userkey1,
     LeaveType                           :            employeeleavetype,
     NumberofDays                        :            employeenumberofdays,
     Requirement                         :            employeerequirement,
     Position                            :            employeepositon,   
     Month                               :            selectmonth,
     Notes                               :            notesme,
     ConvertToCash                       :            converttocash,
     Retirement_Benefits                 :            RetirementBenefits,
     MinimumDaysRequire                  :            requiredhours1,
     visibility                          :            visibility,
     GenderType :genderType,
                 Duration: {
                Half_Day:halfday1 ,
                Full_Day:fullday1,
                Multiple_Day:muliple1,
            }
       });
        swal({type:'success',title: "Successfully save!",icon: "success"});
    }
    else{
         swal({type:'error',title: "Please fill in required  fields!",icon: "error"});
    }
}
function getFormDataHoliday() {
  // body...
  var description                            =     $('#description').val();
  var start                                  =     $('#startholiday').val();
  var end                                    =     $('#endholiday').val();
  var userkey2                               =     $('#userKey').val();
  var holidaytype                            =   document.getElementById('holidaytype') ;
  var holidaytype                            =   holidaytype[holidaytype.selectedIndex].value;
  var color = "#1a53ff";
  return({
     Title                               :            description,
     Start                               :            start,
     End                                 :            end,   
     Color                               :            color,
     holiday_Type                        :            holidaytype,
  })
}
function addBranch(event){
  event.preventDefault();
  var userid2       =   document.getElementById('userid').value;
  var dept          =   getBranch();
 companybranch.child(userid2).push(dept);
document.getElementById("setbranch").value           =   "";     

}
function addDepartment (event){
  event.preventDefault();
  var userid2       =   document.getElementById('userid').value;
  var dept          =   getdepartment();
 companydepartment.child(userid2).push(dept);
document.getElementById("setdepartement").value           =   "";     

}
function addposition (event){
  event.preventDefault();
  var userid2           =   document.getElementById('userid').value;
  var position          =   getposition();
 companyposition.child(userid2).push(position);
document.getElementById("setposition").value           =   "";     

}
function addMember (event){
  event.preventDefault();
  var userid2       =   document.getElementById('userid').value;
  var Leave         =   getFormData();
  var Leave1        =   getleavesummary();
 companyleave_ref.child(userid2).push(Leave);
  document.getElementById("requiredhours").value       =   ""; 
  document.getElementById("leavetype").value           =   "";     
  document.getElementById("numberofdays").value        =   ""; 
  document.getElementById("requirement").value         =   ""; 
  document.getElementById("requiredhours").value       =   ""; 
  $('input:checkbox[name=ids1]').attr('checked',false);
  $('input:checkbox[name=ids2]').attr('checked',false);
  $('input:checkbox[name=ids3]').attr('checked',false);
  $("#notesme").val("");
  $("#selectmonth1").val("");
}
function addMember1 (event){
  event.preventDefault();
   var userid3       =   document.getElementById('userid').value;
   var Leave2        =   getFormDataEmployee();
   var Leave1        =   getleavesummary1();
 employeeleave_ref.child(userid3).push(Leave2);
  document.getElementById("requiredhours1").value              =   ""; 
  document.getElementById("employeeleavetype").value           =   "";     
  document.getElementById("employeenumberofdays").value        =   ""; 
  document.getElementById("employeepositon").value             =   ""; 
  document.getElementById("employeerequirement").value         =   ""; 
   document.getElementById("requiredhours1").value             =   ""; 
   $('input:checkbox[name=ids4]').attr('checked',false); 
   $('input:checkbox[name=ids5]').attr('checked',false);
   $('input:checkbox[name=ids6]').attr('checked',false);
   $("#notesme1").val("");
   $("#selectmonth1").val("");
}
function addholiday (event){
  event.preventDefault();
  var userid4        =   document.getElementById('userid').value;
  var holiday        =   getFormDataHoliday();
  companyholiday_ref.child(userid4).push(holiday);
  document.getElementById("startholiday").value             =   "";     
  document.getElementById("endholiday").value             =   "";  
  document.getElementById("description").value         =   ""; 
}
var par               =   document.getElementById('userid').value;
var member_ref        =   db.ref('Company_Leave/'+par);
var members_ref       =   db.ref('Company_Leave/'+par);
var leave_ref         =   db.ref('Company_Employee_Leave_Type/'+par);
var leaves_ref        =   db.ref('Company_Employee_Leave_Type/'+par);
var Approver_ref      =   db.ref('Company_Approver/'+par);
var compholiday       =   db.ref('Company_Holiday/'+par);
var department_ref    =   db.ref('Company_Department/'+par);
var position_ref      =   db.ref('Company_Employee_Position/'+par);
var branch_ref        =   db.ref('Company_Branch/'+par);
var table             =   $('#table1 tbody');
var table2            =   $('#table2 tbody');
var table3            =   $('#table3 tbody');
var table4            =   $('#setempdeparment tbody');
var table5            =   $('#setempposition tbody');
var table6            =   $('#setempbranch tbody');
var hrcalendar        =   $('#calendar');
var updateleavebtn    =   $('#addleave');

function retbranch(){
  table6.empty();
  branch_ref.on('child_added',function(setbranch){
  var key         = setbranch.key;
  setbranch   = setbranch.val();
  table6.append(
    '<tr style="font-size: 12px" id="tbody1">'+

      '<td style="font-size: 12px;text-align: center">'+ setbranch.Branch+'</td>'+
      '<td style="font-size: 12px;text-align: center"></td>'+
      '<td style="font-size: 12px;text-align: center"></td>'+
      '<td style="font-size: 12px;text-align: center"></td>'+   
       '<td style="font-size: 12px;text-align: center"></td>'+      
        '<td style="font-size: 12px;text-align: center"></td>'+            
      '<td style="font-size: 10px;text-align: center">'+
      '<button class =" btn updatebranch   btn btn-leave btn-hover-white btn-sm" style="font-size: 10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"  >Update</button> ' +
      '<button class ="delbranch btn    btn btn-leave btn-danger btn-hover-white btn-sm" style="font-size: 10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"   data-target="#delbran">Delete</button> ' +
      '</td>'+
      '</tr>'
    );
  });
}
function retdepartment(){
  table4.empty();
  department_ref  .on('child_added',function(setdepartment){
  var key         = setdepartment.key;
  setdepartment   = setdepartment.val();
  table4.append(
    '<tr style="font-size: 12px" id="tbody1">'+

      '<td style="font-size: 12px;text-align: center">'+ setdepartment.Department+'</td>'+
      '<td style="font-size: 12px;text-align: center"></td>'+
      '<td style="font-size: 12px;text-align: center"></td>'+
      '<td style="font-size: 12px;text-align: center"></td>'+   
       '<td style="font-size: 12px;text-align: center"></td>'+      
        '<td style="font-size: 12px;text-align: center"></td>'+            
      '<td style="font-size: 10px;text-align: center">'+

           '<button class ="updatedepartment btn leave  edit-btn btn btn-leave btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key + '">Update</button> ' + 
      '<button class ="deldepartment btn    btn btn-leave btn-danger btn-hover-white btn-sm" style="font-size: 10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"   data-target="#deldept">Delete</button> ' +
      '</td>'+
      '</tr>'
    );
  });
}
function retposition(){
  table5.empty();
  position_ref.on('child_added',function(setposition){
  var key      = setposition.key;
  setposition = setposition.val();
  table5.append(
    '<tr style="font-size: 12px" id="tbody1">'+

      '<td style="font-size: 12px;text-align: center">'+ setposition.Position+'</td>'+
      '<td style="font-size: 12px;text-align: center"></td>'+
      '<td style="font-size: 12px;text-align: center"></td>'+
      '<td style="font-size: 12px;text-align: center"></td>'+      
       '<td style="font-size: 12px;text-align: center"></td>'+         
      '<td style="font-size: 10px;text-align: center">'+
      '<button class =" btn updateposition   btn btn-leave btn-hover-white btn-sm" style="font-size: 10px" data-key="'+ 
       key + '" data-toggle="modal" data-id="'+ key + '" >Update</button> ' +
      '</td>'+
      '<td style="font-size: 10px;text-align: center">'+
      '<button class ="delposition btn    btn btn-leave btn-danger btn-hover-white btn-sm" style="font-size: 10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"   data-target="#delposs">Delete</button> ' +
      '</td>'+       
      '</tr>'
    );
  });
}
function getApprovers(){
  table3.empty();
  Approver_ref.on('child_added',function(companyApprover){
  var key      = companyApprover.key;
  companyApprover = companyApprover.val();
  table3.append(
    '<tr style="font-size: 12px" id="tbody1">'+

      '<td style="font-size: 12px;text-align: center">'+ companyApprover.Employee_FirstName+'</td>'+
      '<td style="font-size: 12px;text-align: center">'+ companyApprover.Employee_MiddleInitial+'</td>'+
      '<td style="font-size: 12px;text-align: center">'+ companyApprover.Employee_LastName+'</td>'+
      '<td style="font-size: 12px;text-align: center">'+ companyApprover.Employee_Position+'</td>'+         
      '<td style="font-size: 10px;text-align: center">'+
      '<button class ="remove btn leave btn-danger  btn btn-leave btn-hover-white btn-sm" style="font-size: 10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"   data-target="#approverremove">Remove</button> ' +
      '</td>'+
      '</tr>'
    );
  });
}
function getMembers(){
  table.empty();
  member_ref.on('child_added',function(companyleave){

  var key      = companyleave.key;
  companyleave = companyleave.val();
  // companyleave.Duration.Full_Day = "Full Day";
  if(companyleave.Duration.Full_Day         == true){
     companyleave.Duration.Full_Day         = "Full Day";
  }
  if(companyleave.Duration.Half_Day         == true){
      companyleave.Duration.Half_Day        = "Half Day";
    }
  if(companyleave.Duration.Multiple_Day     == true){
        companyleave.Duration.Multiple_Day  = "Multiple Day";
    }
  
    if(companyleave.Duration.Full_Day       == false){
     companyleave.Duration.Full_Day         = "";
  }
  if(companyleave.Duration.Half_Day         == false){
      companyleave.Duration.Half_Day        = "";
    }
 if(companyleave.ConvertToCash              == true){
        companyleave.ConvertToCash          = "Converted To Cash";
    }  
  if(companyleave.ConvertToCash             == false){
        companyleave.ConvertToCash          = "";
    }
if(companyleave.Retirement_Benefits         == true){
        companyleave.Retirement_Benefits    = "Retirement  Benefits";
    }  
if(companyleave.Retirement_Benefits         == false){
        companyleave.Retirement_Benefits    = "";
    }  
  var fullday = companyleave.Duration.Full_Day + "," + companyleave.Duration.Half_Day + "," +companyleave.Duration.Multiple_Day ;
  table.append(

    '<tr style="font-size: 12px" id="tbody1">'+
      '<th></th>'+
      '<th></th>'+
      '<th></th>'+
      '<td style="font-size: 12px;text-align: center">'+ companyleave.LeaveType+'</td>'+
      '<td style="font-size: 12px;text-align: center">'+ companyleave.NumberofDays+'</td>'+
      '<td style="font-size: 12px;text-align: center">'+ fullday+'</td>'+
      '<td style="font-size: 12px;text-align: center">'+ companyleave.Requirement+'</td>'+     
      '<td style="font-size: 12px;text-align: center">'+ companyleave.Notes+'</td>'+   
      '<td style="font-size: 12px;text-align: center">'+companyleave.Month+'</td>'+ 
      '<td style="font-size: 12px;text-align: center">'+companyleave.MinimumDaysRequire+'</td>'+        
      '<td style="font-size: 12px;text-align: center">'+companyleave.ConvertToCash+'</td>'+ 
      '<td style="font-size: 12px;text-align: center">'+companyleave.Retirement_Benefits+'</td>'+            
      '<td style="font-size: 10px;text-align: center">'+
      '<button class ="update btn leave glyphicon glyphicon-pencil  edit-btn btn btn-leave btn-hover-white btn-sm" style="font-size: 10px" data-key="'+ key + '"></button> ' +
      '</td>'+
      '<td style="font-size: 10px;text-align: center">'+
      '<button class ="delete btn    glyphicon glyphicon-trash btn btn-gray btn-hover-lightgray btn-sm " style="font-size: 10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"   data-target="#leaveme"></button> ' +
      '</td>'+
      '</tr>'
    );
  });
}
function getEmployee_Leave_Type(){
  table2.empty();
  leave_ref.on('child_added',function(companyemployeeleave){

  var key  = companyemployeeleave.key;
  companyemployeeleave = companyemployeeleave.val();
  // companyleave.Duration.Full_Day = "Full Day";
  if(companyemployeeleave.Duration.Full_Day          == true){
     companyemployeeleave.Duration.Full_Day          = "Full Day";
  }
  if(companyemployeeleave.Duration.Half_Day          == true){
      companyemployeeleave.Duration.Half_Day         = "Half Day";
    }
  if(companyemployeeleave.Duration.Multiple_Day      == true){
        companyemployeeleave.Duration.Multiple_Day   = "Multiple Day";
    }
  
    if(companyemployeeleave.Duration.Full_Day        == false){
     companyemployeeleave.Duration.Full_Day          = "";
  }
  if(companyemployeeleave.Duration.Half_Day          == false){
      companyemployeeleave.Duration.Half_Day         = "";
    }
  if(companyemployeeleave.Duration.Multiple_Day      == false){
        companyemployeeleave.Duration.Multiple_Day   = "";
    }  
if(companyemployeeleave.Duration.Multiple_Day      == false){
        companyemployeeleave.Duration.Multiple_Day   = "";
    } 
  if(companyemployeeleave.ConvertToCash             == true){
        companyemployeeleave.ConvertToCash          = "Converted To Cash";
    }    
  if(companyemployeeleave.ConvertToCash             == false){
        companyemployeeleave.ConvertToCash          = "";
    }
if(companyemployeeleave.Retirement_Benefits         == true){
        companyemployeeleave.Retirement_Benefits    = "Retirement  Benefits";
    }  
if(companyemployeeleave.Retirement_Benefits         == false){
        companyemployeeleave.Retirement_Benefits    = "";
    }   
  var fullday = companyemployeeleave.Duration.Full_Day + "," + companyemployeeleave.Duration.Half_Day + "," +companyemployeeleave.Duration.Multiple_Day ;


  table2.append(

    '<tr style="font-size: 12px" id="tbody1">'+
      '<th></th>'+
      '<td style="font-size: 12px;text-align: center">'+ companyemployeeleave.LeaveType+'</td>'+
      '<td style="font-size: 12px;text-align: center">'+ companyemployeeleave.NumberofDays+'</td>'+
      '<td style="font-size: 12px;text-align: center">'+ fullday+'</td>'+
      '<td style="font-size: 12px;text-align: center">'+ companyemployeeleave.Requirement+'</td>'+    
      '<td style="font-size: 12px;text-align: center">'+ companyemployeeleave.Position+'</td>'+         
      '<td style="font-size: 12px;text-align: center">'+ companyemployeeleave.Notes+'</td>'+   
      '<td style="font-size: 12px;text-align: center">'+companyemployeeleave.Month+'</td>'+   
      '<td style="font-size: 12px;text-align: center">'+companyemployeeleave.MinimumDaysRequire+'</td>'+       
      '<td style="font-size: 12px;text-align: center">'+companyemployeeleave.ConvertToCash+'</td>'+ 
      '<td style="font-size: 12px;text-align: center">'+companyemployeeleave.Retirement_Benefits+'</td>'+    
      '<td style="font-size: 10px;text-align: center">'+
      '<button class ="update1 btn leave glyphicon glyphicon-pencil  edit-btn btn btn-leave btn-hover-white btn-sm"style="font-size: 10px"  data-key="'+ key + '"></button> ' +
      '</td>'+
      '<td style="font-size: 10px;text-align:   center">'+
      '<button class ="delete btn   glyphicon glyphicon-trash btn btn-gray btn-hover-lightgray btn-sm" style="font-size: 10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"   data-target="#leavemeemployee"></button> ' +
      '</td>'+
      '</tr>'
    );
  });
}
function updateDepartment(key){
  var member             = getdepartment();
  department_ref .child(key).set(member);       

  document.getElementById("setdepartement").value             =   "";     


    var submit = $('#adddepartment');
    submit.text('Add');
    $('#setcanceldepartment').hide();
    submit.unbind().on('click',addDepartment);
    reload_department();
}
function updatePosition(key){
  var position             = getposition();
      position_ref.child(key).set(position);       

    document.getElementById("setposition").value             =   "";     
    var submit = $('#addposition');
    submit.text('Add');
    $('#setcancelposition').hide();
    submit.unbind().on('click',addposition);
    reload_position();
}
function updateBranch(key){

  var branch             = getBranch();
      branch_ref.child(key).set(branch);       

    document.getElementById("setbranch").value             =   "";     
    var submit = $('#addbranch');
    submit.text('Add');
    $('#setcancelbranch').hide();
    submit.unbind().on('click',addBranch);
    reload_branch();
}

function updateMember(key){
  var member             = getFormData();
  members_ref.child(key).set(member);       
    var leavetype1      = document.getElementById('leavetype').value;
    var numberofdays1   = document.getElementById('numberofdays').value;
    var par2                     = document.getElementById('userid').value;


  document.getElementById("leavetype").value             =   "";     
  document.getElementById("numberofdays").value          =   ""; 
  document.getElementById("requirement").value           =   ""; 
   document.getElementById("notesme").value             =   ""; 
  document.getElementById("selectmonth").value         =   ""; 
  $('input:checkbox[name=ids1]').attr('checked',false);
  $('input:checkbox[name=ids2]').attr('checked',false);
  $('input:checkbox[name=ids3]').attr('checked',false);
  $('input:checkbox[id=converttocash]').attr('checked',false);
  $('input:checkbox[id=converttocash]').attr('checked',false);
    var submit = $('#addleave');
    submit.text('Add');
    $('#cancel').hide();
    submit.unbind().on('click',addMember);
    reload_getMembers();
}
function updateemployeeleave(key){

    var member                    = getFormDataEmployee();
    leaves_ref.child(key).set(member);
    var leavetype1               = document.getElementById('employeeleavetype').value;
    var numberofdays1            = document.getElementById('employeenumberofdays').value;
    var par2                     = document.getElementById('userid').value;
  
  document.getElementById("employeeleavetype").value           =   "";     
  document.getElementById("employeenumberofdays").value        =   ""; 
  document.getElementById("employeepositon").value             =   ""; 
  document.getElementById("employeerequirement").value         =   ""; 
  $("#notesme1").val("");
  $("#selectmonth1").val("");

  $('input:checkbox[id=converttocash]').attr('checked',false);
  $('input:checkbox[id=converttocash]').attr('checked',false);
  $('input:checkbox[name=ids4]').attr('checked',false);
  $('input:checkbox[name=ids5]').attr('checked',false);
  $('input:checkbox[name=ids6]').attr('checked',false);
    var submit = $('#addleave1');
    submit.text('Add');
    $('#cancel2').unbind().hide();
    submit.unbind().on('click',addMember1);
    reload_getEmployee_Leave_Type();
}
function getDepartmentform(){
var key = $(this).data('key');
var member_ref = department_ref.child(key);
member_ref.once('value')
.then(function(leave){
  leave = leave.val();
    $('#setdepartement').val(leave.Department);
 
        var submit = $('#adddepartment');

    submit.text('Update');
    submit.unbind().on('click',function(e){
      e.preventDefault();
      updateDepartment(key);
    });
});
$('#setcanceldepartment')
 .unbind()
 .show()
 .on('click',function(e){
  e.preventDefault();
     reload_department();
  document.getElementById("setdepartement").value           =   "";     

  $(this).hide();
    var submit = $('#adddepartment');
    submit.text('Add');
  submit.unbind().on('click',addDepartment);
  reload_department();
 })
}

function getBranchform(){
var key = $(this).data('key');
var bran_ref = branch_ref.child(key);
bran_ref.once('value')
.then(function(branch){
  branch = branch.val();
    $('#setbranch').val(branch.Branch);
 
        var submit = $('#addbranch');

    submit.text('Update');
    submit.unbind().on('click',function(e){
      e.preventDefault();
        updateBranch(key);
         reload_branch();
    });
});
$('#setcancelbranch')
 .unbind()
 .show()
 .on('click',function(e){
  e.preventDefault();
     reload_department();
  document.getElementById("setbranch").value           =   "";     

  $(this).hide();
    var submit = $('#addbranch');
        submit.text('Add');
        submit.unbind().on('click',addbranch);
        reload_branch();
 })
}
function getPositionform(){
var key = $(this).data('key');
var pos_ref = position_ref.child(key);
pos_ref.once('value')
.then(function(posiss){
  posiss = posiss.val();
    $('#setposition').val(posiss.Position);
 
        var submit = $('#addposition');

    submit.text('Update');
    submit.unbind().on('click',function(e){
      e.preventDefault();
        updatePosition(key);
    });
});
$('#setcancelposition')
 .unbind()
 .show()
 .on('click',function(e){
  e.preventDefault();
     reload_department();
  document.getElementById("setposition").value           =   "";     

  $(this).hide();
    var submit = $('#addposition');
    submit.text('Add');
  submit.unbind().on('click',addposition);
  reload_position();
 })
}
function getMember(){
var key = $(this).data('key');
var member_ref = members_ref.child(key);
member_ref.once('value')
.then(function(leave){
  leave = leave.val();
    $('#leavetype').val(leave.LeaveType);
    $('#numberofdays').val(leave.NumberofDays);
    $('#notesme').val(leave.Notes);
    $('#selectmonth').val(leave.Month);
    if(leave.Duration.Half_Day == true){
      $('input:checkbox[name=ids1]').attr('checked',true);
    
    }else{
       $('input:checkbox[name=ids1]').attr('checked',false);
    }
   if(leave.Duration.Full_Day == true){
      $('input:checkbox[name=ids2]').attr('checked',true);
    
    }else{
       $('input:checkbox[name=ids2]').attr('checked',false);
    }
    if(leave.Duration.Multiple_Day == true){
      $('input:checkbox[name=ids3]').attr('checked',true);
    
    }else{
       $('input:checkbox[name=ids3]').attr('checked',false);
    }

    $('#requirement').val(leave.Requirement);
        var submit = $('#addleave');
    submit.text('Update');
    submit.unbind().on('click',function(e){
      e.preventDefault();
      updateMember(key);
    });
});
$('#cancel')
 .unbind()
 .show()
 .on('click',function(e){
  e.preventDefault();
     reload_page();
  document.getElementById("leavetype").value           =   "";     
  document.getElementById("numberofdays").value        =   ""; 
  document.getElementById("requirement").value         =   ""; 
  document.getElementById("notesme").value             =   ""; 
  document.getElementById("selectmonth").value         =   ""; 
  document.getElementById("requiredhours").value       =   ""; 
  $('input:checkbox[name=ids1]').attr('checked',false);
  $('input:checkbox[name=ids2]').attr('checked',false);
  $('input:checkbox[name=ids3]').attr('checked',false);
  $(this).hide();
      var submit = $('#addleave');
    submit.text('Add');
  submit.unbind().on('click',addMember);
  reload_getMembers();
 })
}
function getEmployeeLeave(){
var key = $(this).data('key');
var leave_ref = leaves_ref.child(key);
  leave_ref.once('value')
.then(function(leave){
  leave = leave.val();
    $('#employeeleavetype').val(leave.LeaveType);
    $('#employeenumberofdays').val(leave.NumberofDays);
    $('#notesme1').val(leave.Notes);
    $('#selectmonth1').val(leave.Month);
    if(leave.Duration.Half_Day == true){
      $('input:checkbox[name=ids4]').attr('checked',true);
    
    }
   if(leave.Duration.Full_Day == true){
      $('input:checkbox[name=ids5]').attr('checked',true);
    
    }
    if(leave.Duration.Multiple_Day == true){
      $('input:checkbox[name=ids6]').attr('checked',true);
    
    }
    $('#employeepositon').val(leave.Position);
    $('#employeerequirement').val(leave.Requirement);
    var submit = $('#addleave1');

    submit.text('Update');
    submit.unbind().on('click',function(e){
      e.preventDefault();
        updateemployeeleave(key);
    });
});
$('#cancel2')
 .unbind()
 .show()
 .on('click',function(e){
  e.preventDefault();
     reload_page();
  document.getElementById("employeeleavetype").value             =   "";     
  document.getElementById("employeenumberofdays").value          =   "";  
  document.getElementById("employeepositon").value               =   ""; 
  document.getElementById("summerleavekey1").value               =   ""; 
  document.getElementById("employeerequirement").value           =   ""; 
  document.getElementById("notesme1").value                      =   ""; 
  document.getElementById("selectmonth1").value                  =   ""; 
  document.getElementById("requiredhours1").value                =   ""; 
  $('input:checkbox[name=ids4]').attr('checked',false);
  $('input:checkbox[name=ids5]').attr('checked',false);
  $('input:checkbox[name=ids6]').attr('checked',false);
  $(this).hide();
    var submit = $('#addleave1');
    submit.text('Add');
    submit.unbind().on('click',addMember1);
    reload_getEmployee_Leave_Type();
 })
}

function deleteMember(){
    $('#leaveme').on('show.bs.modal', function(e) {
    var bookId = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('input[id="keys"]').val(bookId);
    var keys = document.getElementById('keys').value;
    var par2                      = document.getElementById('userid').value;
    
  });
}
function deleteleave(){
      var keyleave                 =   document.getElementById('keys').value; 
      var summarkey                =   document.getElementById('summarkey').value;


      member_ref.child(keyleave).remove();

      $("#leaveme").modal('hide');
      reload_getMembers();
}
function deleteleave1(){
     var keyleave        =   document.getElementById('keys1').value; 
     var summarkey1      =   document.getElementById('summarkey1').value;

     leave_ref.child(keyleave).remove();

 　　 $("#leavemeemployee").modal('hide');
     reload_getEmployee_Leave_Type();
}
function remove(){
      var keyleave        =   document.getElementById('keys3').value; 
      Approver_ref.child(keyleave).remove();
      $("#approverremove").modal('hide');
      reload_getApprovers();
}
function deleteEmployeeleave(){
    $('#leavemeemployee').on('show.bs.modal', function(e) {
    var bookId1 = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('input[id="keys1"]').val(bookId1);

    var keys1 = document.getElementById('keys1').value;
    var par3                      = document.getElementById('userid').value;
     var empleavetype             = firebase.database().ref("Company_Employee_Leave_Type/"+par3);
         empleavetype.orderByKey().on("child_added", function(data) {
            var key3                  = data.key;
            var LeaveType             = data.child("LeaveType").val();    
           if (key3 == keys1) {       
                var summerleavekey3= key3;
                console.log(summerleavekey1);
                document.getElementById('pairleave1').value = LeaveType;
           }
        }); 

    });
}
function deletedepartment(){
    $('#deldept').on('show.bs.modal', function(e) {
       var delpart = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="depkey"]').val(delpart);

    });
}
function deletedept(){
      var keyleave                 =   document.getElementById('depkey').value; 
      department_ref.child(keyleave).remove();
      $("#deldept").modal('hide');
      reload_department();
}
function deleteposition(){
    $('#delposs').on('show.bs.modal', function(e) {
       var delp = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="delpos"]').val(delp);

    });
}
function delpost(){
      var postkey                 =   document.getElementById('delpos').value; 
      position_ref.child(postkey).remove();
      $("#delposs").modal('hide');
      reload_department();
}
function deleteBranch(){
    $('#delbran').on('show.bs.modal', function(e) {
       var combranch = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('input[id="comdelbranc"]').val(combranch);

    });
}
function deletebran(){
      var brankey                 =   document.getElementById('comdelbranc').value; 
      branch_ref.child(brankey).remove();
      $("#delbran").modal('hide');
      reload_branch();
}
function removeapprover(){
    $('#approverremove').on('show.bs.modal', function(e) {
    var bookId2 = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('input[id="keys3"]').val(bookId2);
    });
}

var db                                =  firebase.database();
var update                            =  db.ref("Subscriber");
var empuserupdate                     =  db.ref("Users");
var profphoto                         =  db.ref("Subscriber");

function updateempprofile(event){
  event.preventDefault();

            var userKey                  =  document.getElementById("userKey").value;
            var comuserskey              =  document.getElementById("comuserskey").value;       
            
            var file                     =  document.getElementById('inputFile').value;
            var password                 =  document.getElementById("password").value;

            var updateaddress            = document.getElementById("companyaddress").value;
            var companycontact           = document.getElementById("companycontact").value;
            var upadateemail             = document.getElementById("email").value;

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

function addcalendarholiday()
{
      var start   =  $('#start').val();
      var color   =  $('#color').val();
      var end     =  $('#end').val();
      var title   =  $('#title1').val(); 

      var userid4    =   document.getElementById('userid').value;
    companyholiday_ref.child(userid4).push({

       Title          :            title,
       Start          :            start,
       End            :            end,   
       Color          :            color,
    });
    $('#ModalAdd').modal('hide');
}
function deleteevent(){
   if(document.getElementById("deleteevents").checked){
     var userid4              =   document.getElementById('userid').value;
     var id                   =   document.getElementById('id').value;
     var companyholiday_ref1  =   companyholiday_ref.child(userid4);
         companyholiday_ref1.child(id).remove();

         $('#ModalEdit').modal('hide');

   }else{
            var userid4     =   document.getElementById('userid').value;
         var id          =   document.getElementById('id').value;
         var updatetitle =   document.getElementById('updatetitle').value;
         var updatestart =   document.getElementById('updatestart').value;
         var updateend   =   document.getElementById('updateend').value;
         var updatecolor =   document.getElementById('updatecolor').value;

         var companyholiday_ref1  =   companyholiday_ref.child(userid4);
         var updatecal = companyholiday_ref1.child(id);
         companyholiday_ref1.child(id).update({
              Title     : updatetitle,
              Start     : updatestart,
              End       : updateend,
              Color     : updatecolor,
         });

          $('#ModalEdit').modal('hide');
   }

}

function init()
{

  $("#comedit").on("click",updateempprofile);
  $("#addleave").on("click",addMember);
  $("#addleave1").on("click",addMember1);
  $("#addcompanyholiday").on("click",addholiday);
  $("#adddepartment").on("click",addDepartment);
  $("#addposition").on("click",addposition);
  $("#addbranch").on("click",addBranch);

  $("#yes").on("click",deleteleave);
  $("#yes1").on("click",deleteleave1);
  $("#yes3").on("click",remove);
  $("#yesdeldept").on("click",deletedept);
  $("#yesdelpos").on("click",delpost);
  $("#yesdelcombranch").on("click",deletebran);
  $("#addcalendarevent").on("click",addcalendarholiday);
  $("#updatecalendar").on("click",deleteevent);


  table.on('click','button.update',getMember);
  table.on('click','button.delete',deleteMember);

  table2.on('click','button.update1',getEmployeeLeave);
  table2.on('click','button.delete',deleteEmployeeleave);
  table3.on('click','button.remove',removeapprover);


  table4.on('click','button.updatedepartment',getDepartmentform);
  table4.on('click','button.deldepartment',deletedepartment);

  table5.on('click','button.updateposition',getPositionform);
  table5.on('click','button.delposition',deleteposition);

  table6.on('click','button.updatebranch',getBranchform);
  table6.on('click','button.delbranch',deleteBranch);

  member_ref.on('child_removed',getMembers);
  member_ref.on('child_changed',getMembers);

  Approver_ref.on('child_removed',getApprovers);
  Approver_ref.on('child_changed',getApprovers);

  leave_ref.on('child_removed',getEmployee_Leave_Type);
  leave_ref.on('child_changed',getEmployee_Leave_Type);


  department_ref .on('child_removed',retdepartment);
  department_ref .on('child_changed',retdepartment);

  position_ref.on('child_removed',retposition);
  position_ref.on('child_changed',retposition);

  branch_ref.on('child_removed',retbranch);
  branch_ref.on('child_changed',retbranch);

  employeeleaverequestref1.on('child_removed',notif);
  employeeleaverequestref1.on('child_changed',notif);

  compholiday1.on('child_removed',calendarupdate);
  compholiday1.on('child_changed',calendarupdate);

  getMembers();
  getEmployee_Leave_Type();
  getApprovers();
  notif();

  calendarupdate();
  retdepartment();
  retposition();
  retbranch();


}

function reload_notif(){
   window.setInterval(notif, 1000);
}
function reload_getMembers(){
   window.setInterval(getMembers, 1000);
}
function reload_getApprovers(){
   window.setInterval(getApprovers, 1000);
}
function reload_getEmployee_Leave_Type(){
   window.setInterval(getEmployee_Leave_Type, 1000);
}
function reload_page(){
   window.setInterval(getMember, 1000);
}
function reload_department(){
   window.setInterval(retdepartment, 1000);
}
function reload_position(){
   window.setInterval(retposition, 1000);
}
function reload_branch(){
   window.setInterval(retbranch, 1000);
}
//START the app
init();
$(document).ready(function(){

 
    var setcomforce                         =     db.ref('Company_Force_Leave_Set');
    $("#checkforce").click(function(){
          var userid4                        =    document.getElementById('userid').value;
          var checkset                       =     $('input:checkbox[id=checkforce]').is(':checked');
          var userkey                        =     $('#userKey').val();

          setcomforce.child(userid4).push({
                     Company_Id : userkey,
                     ForceLeave : checkset,
             })
          });
     

      });
  ////////////////////////////////////END//////////////////


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
