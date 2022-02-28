  <?php require_once 'includes/employeeleavebalance.php'?>

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

    if(user != null ){

      var email_id = user.email;
      var user_id = user.uid;
     
      document.getElementById("empuserskey").value     =  user_id;
      document.getElementById("email").value           =  email_id;

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
            var password                    =  childSnapshot.child("Password").val() ;
            var Employee_Profile_Pic        =  childSnapshot.child("Employee_Profile_Pic").val();
            if(suffix = "-"){
              suffix ="";
            }
            if(Employee_Profile_Pic == ""){
              Employee_Profile_Pic  = document.querySelector("#profile").src = "images/icon_user.png"; 
            }
            var childData                    =  childSnapshot.val();
            var fullname                     =  fname + " " + mi + " " + lname + " " + suffix;
            var fullname1                    =  fname + " " + mi + " " + lname + " " + suffix;
            var fullname2                    =  lname + ", "+ fname + " " + mi +" " + suffix;
            var updateappfullname            =  lname + ", "+ fname + " " + mi +" " + suffix +'('+position+')';
            var fullname5                    =  lname + ", " + fname + " " + mi + " " + suffix +'('+position+')';
          if(user.email == name && user != null){

               document.querySelector('#profile').src                         =  Employee_Profile_Pic;
               document.querySelector('#image_upload_preview').src            =  Employee_Profile_Pic;
               document.getElementById("photourl").value                      =  Employee_Profile_Pic;  
               document.getElementById("password").value                      =  password; 
               document.getElementById("userid").value                        =  Company_Id; 
               document.getElementById("empkey").value                        =  key; 
               document.getElementById("employeeid").value                    =  Employee_Id; 
               document.getElementById("employeeid1").value                   =  Employee_Id; 
               document.getElementById("Companyid").value                     =  Company_Id;
               document.getElementById("Companyid1").value                    =  Company_Id;  
               document.getElementById("fullname1").value                     =  fullname2;
               document.getElementById("empid").value                         =  Employee_Id;
               document.getElementById("empapplyname").value                  =  fullname2;
               document.getElementById("empapplyname1").value                 =  fullname2;  
               document.getElementById("update_empapplyname1").value          =  fullname2;              
               document.getElementById("fullname").innerHTML                  =  fullname;
               document.getElementById("aplicantfullname").innerHTML          =  fullname;
               document.getElementById("apfullname").innerHTML                =  fullname;
               document.getElementById("aplicantfullname1").innerHTML         =  fullname;
               document.getElementById("idno1").innerHTML                     =  Employee_Id;
               document.getElementById("empidno").innerHTML                   =  Employee_Id;
               document.getElementById("empidno1").innerHTML                  =  Employee_Id;
               document.getElementById("update_empidno1").innerHTML           =  Employee_Id;
               document.getElementById("Employeekey").value                   =  key;
               document.getElementById("EmployeePosition").value              =  position;
               document.getElementById("update_aplicantfullname1").innerHTML  =  fullname1;
               document.getElementById("updateappfullname").value             =  updateappfullname;
               document.getElementById("fullname5").value                     =  fullname5;
               document.getElementById("gender").value                        =  sex;
               document.getElementById("emphireddate").value                   =  datehired;
              

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
               $("#selectapprover").append("<label class='checkbox-inline'><input type='checkbox' name='ids1' value='"+ fullName +'('+appEmployee_Position+')'+"' id='approver'>" + fullName + "<p style='color:red '>"+appEmployee_Position+"</p></label>");

               $("#selectapprover1").append("<label class='checkbox-inline'><input type='checkbox' name='ids1' value='"+ fullName +'('+appEmployee_Position+')'+"' id='approver1'>" + fullName + "<p style='color:red '>"+appEmployee_Position+"</p></label>");

               $("#selectapprover2").append("<label class='checkbox-inline'><input type='checkbox' name='ids1' value='"+ fullName +'('+appEmployee_Position+')'+"' id='approver2'>" + fullName + "<p style='color:red '>"+appEmployee_Position+"</p></label>");
                 $('input:checkbox[id=approver2]').attr('checked',true);
              }
                 $('input:checkbox[name=leavecor]').attr('checked',true);
                 $('input:checkbox[name=leavecor2]').attr('checked',true);

              });         
             });
           }
         });
       });
       var comid =  document.getElementById("userid").value;
       var query2 = firebase.database().ref('Subscriber').child(comid);
       query2.on('value', function(snapshot) {

       var Company_Name         =  snapshot.child("Company_Name").val();
       document.getElementById("companyname").innerHTML   =  Company_Name;

     });
     /////////////////////////////////////////////StART////////////////////////////////////////////////////
var pairukey                         =   document.getElementById("userKey").value;
var db                               =   firebase.database();
var ret_approverref                  =   db.ref('Company_Approver/'+pairukey);
var ret_companyref                   =   db.ref('Company_Leave/'+pairukey);
var companyleaveref                  =   db.ref('Company_Leave/'+pairukey);
var ret_companyemployeeref           =   db.ref('Company_Employee_Leave_Type/'+pairukey);
var apply_leave_requestref           =   db.ref('apply_leave_request/'+pairukey);
var containerref                     =   $('#leavetype');
var employeeleavetyperef             =   $('#employeeleavetype');
var selectmultipleleave              =   $('#multipleleave');
var empuserskey1                      =   document.getElementById("empuserskey").value;
var comuid1                           =   document.getElementById("userKey").value;
var db2                               =   firebase.database();
var my_leave_request1                 =   db2.ref('Leave_Request/'+comuid1+'/'+empuserskey1+'');
// var Company_Employee_Leave_Type       =   db2.ref('Company_Employee_Leave_Type/'+comuid1+'/'+empuserskey1+'');

  containerref.empty(); 
  ret_companyref.on('child_added', onChildAdd);
  ret_companyref.on('child_removed', onChildAdd);
  ret_companyref.on('child_changed', onChildAdd);

  ret_companyemployeeref.on('child_added', onChildAddemp);
  ret_companyemployeeref.on('child_removed', onChildAddemp);
  ret_companyemployeeref.on('child_changed', onChildAddemp);
function onChildAdd (snap) {
  containerref.append(getleavetype(snap.key, snap.val()));
  selectmultipleleave.append(multipleleave(snap.key, snap.val()));
}


function onChildAddemp (snap) {
            employeeleavetyperef.append(getleavetypeemployee(snap.key, snap.val()));

}
function multipleleave(key,multipleleave){
        var  ukey      =  document.getElementById("userKey").value;
        var db         =  firebase.database();
        var  query1    =  db.ref("Employee").child(ukey);

        var Employeekey  = document.getElementById("Employeekey").value;
        var leavesummary = query1.child(Employeekey);
        var gend =  query1.child(Employeekey);
           gend.once("value").then(function(snapshot){
          var Employee_Sex = snapshot.child("Employee_Sex").val();
           
               $('#gender12').val(Employee_Sex);
       
             leavesummary.child("Leave_Summary").once("value").then(function(snapshot){
              snapshot.forEach(function(childSnapshot){

                var LeaveType = childSnapshot.child("LeaveType").val();
                var Available = childSnapshot.child("Available").val();
                var Consume   = childSnapshot.child("Consume").val();
                // var GenderType = childSnapshot.child("GenderType").val();

      var gender  = document.getElementById('gender').value;
      var gendr  = $('#gender12').val();
     
        if(LeaveType == multipleleave.LeaveType &&multipleleave.GenderType == gendr){
          
            selectmultipleleave.append('<option >'+multipleleave.LeaveType+'</option>');
              
                      $(document).ready(function(){
                        $('#multipleleave').on('change',function(){
                          var optionText = $("#multipleleave option:selected").text();

                             if(optionText == multipleleave.LeaveType && multipleleave.GenderType == gendr){
                              if(multipleleave.Duration.Full_Day ==true){
                                  multipleleave.Duration.Full_Day ="Full Day";
                              }if(multipleleave.Duration.Full_Day == false){
                                  multipleleave.Duration.Full_Day ="";
                              }if(multipleleave.Duration.Half_Day == true){
                                  multipleleave.Duration.Half_Day ="Half Day"; 
                              }if(multipleleave.Duration.Half_Day == false){
                                  multipleleave.Duration.Half_Day ="";
                              }if(multipleleave.Duration.Multiple_Day == true){
                                  multipleleave.Duration.Multiple_Day="Multiple Day";
                              }if(multipleleave.Duration.Multiple_Day == false){
                                  multipleleave.Duration.Multiple_Day ="";
                                
                              } 
                              document.getElementById('textleave1').innerHTML                  = multipleleave.LeaveType;
                              document.getElementById('muldata').value                         = multipleleave.LeaveType;
                              document.getElementById('MulNumberofDays').innerHTML             = multipleleave.NumberofDays;
                              document.getElementById('MulAvailable').innerHTML                = Available;
                              document.getElementById('MulConsume').innerHTML                  = Consume;
                              document.getElementById('muldurationfullday').innerHTML              = multipleleave.Duration.Full_Day;
                              document.getElementById('muldurationhalfday').innerHTML              = multipleleave.Duration.Half_Day;
                              document.getElementById('muldurationmultipleday').innerHTML          = multipleleave.Duration.Multiple_Day;
                               $('.hideinfo1').unbind().show();
                            }
                         
                      });
                    });


        }

      if(LeaveType == multipleleave.LeaveType && multipleleave.GenderType =="All"){

             selectmultipleleave.append('<option value="'+multipleleave.LeaveType+'">'+multipleleave.LeaveType+'</option>');
    
                      $(document).ready(function(){
                        $('#multipleleave').on('change',function(){
                          var optionText = $("#multipleleave option:selected").text();

                             if(optionText == multipleleave.LeaveType && multipleleave.GenderType =="All"){
                              if(multipleleave.Duration.Full_Day ==true){
                                  multipleleave.Duration.Full_Day ="Full Day";
                              }if(multipleleave.Duration.Full_Day == false){
                                  multipleleave.Duration.Full_Day ="";
                              }if(multipleleave.Duration.Half_Day == true){
                                  multipleleave.Duration.Half_Day ="Half Day"; 
                              }if(multipleleave.Duration.Half_Day == false){
                                  multipleleave.Duration.Half_Day ="";
                              }if(multipleleave.Duration.Multiple_Day == true){
                                  multipleleave.Duration.Multiple_Day="Multiple Day";
                              }if(multipleleave.Duration.Multiple_Day == false){
                                  multipleleave.Duration.Multiple_Day ="";
                                
                              } 
                              document.getElementById('textleave1').innerHTML                  = multipleleave.LeaveType;
                              document.getElementById('muldata').value                         = multipleleave.LeaveType;
                              document.getElementById('MulNumberofDays').innerHTML             = multipleleave.NumberofDays;
                              document.getElementById('MulAvailable').innerHTML                = Available;
                              document.getElementById('MulConsume').innerHTML                  = Consume;
                              document.getElementById('muldurationfullday').innerHTML              = multipleleave.Duration.Full_Day;
                              document.getElementById('muldurationhalfday').innerHTML              = multipleleave.Duration.Half_Day;
                              document.getElementById('muldurationmultipleday').innerHTML          = multipleleave.Duration.Multiple_Day;
                               $('.hideinfo1').unbind().show();
                            }
                         
                      });
                    });
                  }

            });
        });
               
  });

}
function getleavetype(key,companyleave){
        var  ukey      =  document.getElementById("userKey").value;
        var db         =  firebase.database();
        var  query1    =  db.ref("Employee").child(ukey);

        var Employeekey  = document.getElementById("Employeekey").value;
        var leavesummary = query1.child(Employeekey);
        var gend =  query1.child(Employeekey);
           gend.once("value").then(function(snapshot){
          var Employee_Sex = snapshot.child("Employee_Sex").val();
           
               $('#gender12').val(Employee_Sex);
       
             leavesummary.child("Leave_Summary").once("value").then(function(snapshot){
              snapshot.forEach(function(childSnapshot){
                var key3                    = childSnapshot.key;
                var LeaveType               = childSnapshot.child("LeaveType").val();
                var Available               = childSnapshot.child("Available").val();
                var Consume                 = childSnapshot.child("Consume").val();
                var Month                   = childSnapshot.child("Month").val();
                var Notes                   = childSnapshot.child("Notes").val();
                var ConvertToCash           = childSnapshot.child("ConvertToCash").val();
                var Retirement_Benefits     = childSnapshot.child("Retirement_Benefits").val();

                // var GenderType = childSnapshot.child("GenderType").val();

      var gender  = document.getElementById('gender').value;
      var emphireddate  = document.getElementById('emphireddate').value;
      var gendr   = $('#gender12').val();
      var start_date = new Date(emphireddate); //Create start date object by passing appropiate argument
      var end_date = new Date(new Date());
      var total_months = (end_date. getFullYear() - start_date.getFullYear())*12 + (end_date.getMonth() - start_date.getMonth());
      //alert(total_months);
      var visibility ="true";
      if(total_months >=   Month){
            
            if(LeaveType == companyleave.LeaveType &&companyleave.GenderType == gendr){
              var leavesummary2 = leavesummary.child("Leave_Summary");
                leavesummary2.child(key3).update({
                    visibility      : visibility,
                });
                    if(companyleave.ConvertToCash == true){
                      $(".bth-convertcash").show();
                    }
                    if(companyleave.Retirement_Benefits == true){
                      $(".bth-benefits").show();
                    }
                     if(companyleave.Retirement_Benefits == false){
                     $(".bth-benefits").hide();
                    }
                    if(companyleave.ConvertToCash == false){
                     $(".bth-convertcash").hide();
                    }
            containerref.append( '<div class="row containerref" style="float: left;height:auto;" id="tbody1"">'
                + '<input type="hidden" id="retleavetype" value ="'+ companyleave.LeaveType +'">'
                + '<input type="hidden" id="keyleave" value ="'+ key +'">'
                + '<div class="col-sm-3" style="width: 300px;float: left;margin-left: 20px;">'
                +'<div class="row" style="float: left;height:auto;" >'
                + '<div class="col-sm-3" style="width: 300px;float: left;margin-left: 20px;">'
                +'<div class="card"  style="background-color: white">'
                +'<div class="inner text-center" style="height: 320px;"> '
                +' <h3 style="padding-top:15px"><b>'+companyleave.LeaveType+'</b</h3>'
                +' <div style="float: center;padding-left: 55px">'
                +' <h5 style="margin-left:-60px"><b>Annual Leave Entitlement</b></h5>'
                +' <h5 style="margin-left:-60px;color:red; "><b>File this leave '+companyleave.Notes + '  working days ahead</b></h5>'
                +'<div style="float: left;">'
                +'<h6><b>Annual Entitlement             : </b><b style="padding-left:40px">'+companyleave.NumberofDays+' </b></h6>'
                +'<h6 style="margin-left:-5px"><b>Available to Apply  : </b><b  style="padding-left:50px">'+  Available+'</b></h6>'
                +'<h6 style="margin-left:-6px"><b>Total Leave Applied  : </b><b  style="padding-left:40px">'+ Consume +'</b></h6>'
                +'</div>'
                +'<div style="margin-right:20px">'
                +'<div style=" text-align: right;margin-left: -200px;">'
                +'<button id="disabledkey1" class="btn btn-default getapply" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '" style="font-size:11px;width:210px;margin-right:10px">Apply for leave</button>'
                + '</div>'
                +'<div style=" text-align: right;margin-left: -200px;">'
                +'<button  class="btn btn-warning bth-convertcash "  style="font-size:11px;width:210px;margin-right:10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '">Convert To Cash</button>'
                + '</div>'
                +'<div style=" text-align: right;margin-left: -200px;">'
                +'<button  class="btn btn-info bth-benefits " style="font-size:11px;width:210px;margin-right:10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '">Add to Retirement Benefits</button>'
                + '</div>'
                +'<div>'
                + '</div>'
                + '</div>'
                  )
                 if(Available =="0"){
                $("#disabledkey1").hide();
               }
            }
            if(LeaveType == companyleave.LeaveType && companyleave.GenderType =="All"){
            var leavesummary2 = leavesummary.child("Leave_Summary");
                leavesummary2.child(key3).update({
                    visibility      : visibility,
                });
                if(companyleave.ConvertToCash == true){
                  $(".bth-convertcash").show();
                }
                if(companyleave.Retirement_Benefits == true){
                  $(".bth-benefits").show();
                }
                 if(companyleave.Retirement_Benefits == false){
                 $(".bth-benefits").hide();
                }
                if(companyleave.ConvertToCash == false){
                 $(".bth-convertcash").hide();
                }
                
        containerref.append( '<div class="row containerref" style="float: left;height:auto;" id="tbody1"">'
            + '<input type="hidden" id="retleavetype" value ="'+ companyleave.LeaveType +'">'
            + '<input type="hidden" id="keyleave" value ="'+ key +'">'
            + '<div class="col-sm-3" style="width: 300px;float: left;margin-left: 20px;">'
            +'<div class="row" style="float: left;height:auto;" >'
            + '<div class="col-sm-3" style="width: 300px;float: left;margin-left: 20px;">'
            +'<div class="card"  style="background-color: white">'
            +'<div class="inner text-center" style="height: 320px"> '
            +' <h3 style="padding-top:15px"><b>'+companyleave.LeaveType+'</b</h3>'
            +' <div style="float: center;padding-left: 55px">'
            +' <h5 style="margin-left:-60px"><b>Annual Leave Entitlement</b></h5>'
            +' <h5 style="margin-left:-60px;color:red; "><b>File this leave  '+companyleave.Notes + ' working days ahead </b></h5>'
            +'<div style="float: left;">'
            +'<h6><b>Annual Entitlement             : </b><b style="padding-left:40px">'+companyleave.NumberofDays+' </b></h6>'
            +'<h6 style="margin-left:-5px"><b>Available to Apply  : </b><b  style="padding-left:50px">'+  Available+'</b></h6>'
            +'<h6 style="margin-left:-6px"><b>Total Leave Applied  : </b><b  style="padding-left:40px">'+ Consume +'</b></h6>'
            +'</div>'
            +'<div style="margin-right:20px">'
            +'<div style=" text-align: right;margin-left: -200px;">'
            +'<button id="disabledkey2" class="btn btn-default getapply " data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '" style="font-size:11px;width:210px;margin-right:10px">Apply for leave</button>'
            + '</div>'
            +'<div style=" text-align: right;margin-left: -200px;">'
            +'<button  class="btn btn-warning bth-convertcash "  style="font-size:11px;width:210px;margin-right:10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '">Convert To Cash</button>'
            + '</div>'
               +'<div style=" text-align: right;margin-left: -200px;">'
            +'<button  class="btn btn-info bth-benefits " style="font-size:11px;width:210px;margin-right:10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '">Add to Retirement Benefits</button>'
            + '</div>'
            +'<div>'
            + '</div>'
            + '</div>'
            )
            if(Available =="0"){
             $("#disabledkey2").hide();
            }
           }
      }


      
      });
    });
       });
}
function getleavetypeemployee(key,companyleaveemployee){
      var  ukey  =  document.getElementById("userKey").value;
 
      var position      =  document.getElementById("EmployeePosition").value;

      var  query1 = firebase.database().ref("Company_Employee_Leave_Type").child(ukey);
           query1.once("value").then(function(snapshot1){ 
           snapshot1.forEach(function(childSnapshot1){
          var Position      =  childSnapshot1.child("Position").val();


      if(position == Position){
        var  query1 = firebase.database().ref("Employee").child(ukey);
             query1.once("value").then(function(empsnapshot){
              empsnapshot.forEach(function(childSnapshot1){
        var Employeekey  = document.getElementById("Employeekey").value;
        var leavesummary = query1.child(Employeekey);
             leavesummary.child("Leave_Summary").once("value").then(function(snapshot){
              snapshot.forEach(function(childSnapshot){
                var key3                    = childSnapshot.key;
                var LeaveType               = childSnapshot.child("LeaveType").val();
                var Available               = childSnapshot.child("Available").val();
                var Consume                 = childSnapshot.child("Consume").val();
                var Month                   = childSnapshot.child("Month").val();
                var Notes                   = childSnapshot.child("Notes").val();
                var ConvertToCash           = childSnapshot.child("ConvertToCash").val();
                var Retirement_Benefits     = childSnapshot.child("Retirement_Benefits").val();

             var emphireddate  = document.getElementById('emphireddate').value;
            var gendr   = $('#gender12').val();
            var start_date = new Date(emphireddate); //Create start date object by passing appropiate argument
            var end_date = new Date(new Date());
            var total_months = (end_date.getFullYear() - start_date.getFullYear())*12 + (end_date.getMonth() - start_date.getMonth());
      var visibility ="true";
      if(total_months >= Month){

                        if(companyleaveemployee.ConvertToCash == true){
                          $(".empconverttocash").show();
                        }
                        if(companyleaveemployee.Retirement_Benefits == true){
                          $(".empaddretirement").show();
                        }
                         if(companyleaveemployee.Retirement_Benefits == false){
                         $(".empaddretirement").hide();
                        }
                        if(companyleaveemployee.ConvertToCash == false){
                         $(".empconverttocash").hide();
                        }
                        
          if(LeaveType == companyleaveemployee.LeaveType){

                 leavesummary.child("Leave_Summary").child(key3).update({
                    visibility      : visibility,
                });
                  employeeleavetyperef.empty(); 
                  employeeleavetyperef.append(
                    '<div class="row containerref" style="float: left;height:auto;" id="tbody1"">'
                    + '<input type="hidden" id="retleavetype" value ="'+ companyleaveemployee.LeaveType +'">'
                    + '<input type="hidden" id="keyleave" value ="'+ key +'">'
                    + '<div class="col-sm-3" style="width: 300px;float: left;margin-left: 20px;">'
                    +'<div class="row" style="float: left;height:auto;" >'
                    + '<div class="col-sm-3" style="width: 300px;float: left;margin-left: 20px;">'
                    +'<div class="card"  style="background-color: white">'
                    +'<div class="inner text-center" style="height: 320px"> '
                    +' <h3 style="padding-top:15px"><b>'+companyleaveemployee.LeaveType+'</b</h3>'
                    +' <div style="float: center;padding-left: 55px">'
                    +' <h5 style="margin-left:-60px"><b>Annual Leave Entitlement</b></h5>'
                    +' <h5 style="margin-left:-60px;color:red; "><b>Apply this in '+companyleaveemployee.Notes + '  Day/s ahead</b></h5>'
                    +'<div style="float: left;">'
                    +'<h6><b>Annual Entitlement             : </b><b style="padding-left:40px">'+companyleaveemployee.NumberofDays+' </b></h6>'
                    +'<h6 style="margin-left:-5px"><b>Available to Apply  : </b><b style="padding-left:50px">'+  Available+'</b></h6>'
                    +'<h6 style="margin-left:-6px"><b>Total Leave Applied  : </b><b style="padding-left:40px">'+ Consume +'</b></h6>'
                    +'</div>'
                    +'<div style="margin-right:20px">'
                    +'<div style=" text-align: right;margin-left: -200px;">'
                    +'<button id="disabledkey1" class="btn btn-default empapplyleave " data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '" style="font-size:11px;width:210px;margin-right:10px">Apply for leave</button>'
                    + '</div>'
                    +'<div style=" text-align: right;margin-left: -200px;">'
                    +'<button id="" class="btn btn-warning empconverttocash"  style="font-size:11px;width:210px;margin-right:10px"data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '">Convert To Cash</button>'
                    + '</div>'
                       +'<div style=" text-align: right;margin-left: -200px;">'
                    +'<button id="" class="btn btn-info empaddretirement" style="font-size:11px;width:210px;margin-right:10px" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '">Add to Retirement Benefits</button>'
                    + '</div>'
                    + '</div>'
                    + '</div>'
                    + '</div>'
                      );
                  if(Available =="0"){
                    $("#disabledkey").hide();
                   }
                  }
        }
         });
        });
       });
      });
     }
   });
  });
}
//////////////////////////////END/////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////modal data //////////////////////////////////////////////

$(function ($) {

$('#applyleave').on('hidden.bs.modal', function (e) {
$("#selectapprover").append("");
  $(this)
    .find("textarea,select,input[type='file'],input[type='date']")
       .val('')
       .end();
        $('#inputdate').hide();
        $('#leaveuntil').val('');
        $('#leavefrom').val('');
    });
 $('#employeeleaveapply').on('hidden.bs.modal', function (e) {
$("#selectapprover1").append("");
  $(this)
    .find("textarea,select,input[type='file'],input[type='date']")
       .val('')
       .end();
        $('#leaveuntil1').val('');
        $('#leavefrom1').val('');
  
    });
  $('#updateleave').on('hidden.bs.modal', function (e) {
          $("#subdoct").empty();
           $("#updateApprovers").empty();
});
  containerref.on('click', '.bth-convertcash', function () {
        $('#converttocashmodal').modal({
              backdrop: 'static'
            });
        var student_id = $(this).data('id');
        $('#comverttocashkey').val(student_id);
           var apkeyid            =   document.getElementById("comverttocashkey").value;
            var comukey            =  document.getElementById("userKey").value;
            var appleave           =   firebase.database().ref("Company_Leave/"+ comukey).child(apkeyid);
            appleave.once('value', function (snapshot) {
            var apkey                     = snapshot.key;
            var applyleavetype            = snapshot.child("LeaveType").val();
            var Full_Day                  = snapshot.child("Duration/Full_Day").val();
            var Half_Day                  = snapshot.child("Duration/Half_Day").val();
            var Multiple_Day              = snapshot.child("Duration/Multiple_Day").val();
            var NumberofDays              = snapshot.child("NumberofDays").val();
            var Requirement               = snapshot.child("Requirement").val();

            console.log(apkey);


             document.getElementById("appleavetype32").value               =  applyleavetype;

                var  query1 = firebase.database().ref("Employee").child(ukey);
                 query1.once("value").then(function(empsnapshot){
                  empsnapshot.forEach(function(childSnapshot1){ 
                  var Employeekey  = document.getElementById("Employeekey").value;
                  var leavesummary = query1.child(Employeekey);
                     leavesummary.child("Leave_Summary").once("value").then(function(snapshot){
                  snapshot.forEach(function(childSnapshot){
                      var LeaveType = childSnapshot.child("LeaveType").val();
                      var Available = childSnapshot.child("Available").val();
                      var Consume   = childSnapshot.child("Consume").val();
                      
                      var appleave    =  document.getElementById("appleavetype32").value;
                    if(appleave == LeaveType){
                          document.getElementById("remainingdays3").innerHTML           =  Available;
                
                         }
                      });
                    });                  
                 });
                });
              });
        $("#converttocashmodal").modal("show");
    });
    containerref.on('click', '.bth-benefits', function () {
        $('#converttobenefitsmodal').modal({
              backdrop: 'static'
            });
        var student_id = $(this).data('id');
        $('#converttobenefitskey').val(student_id);
        var apkeyid            =   document.getElementById("converttobenefitskey").value;
            var comukey            =  document.getElementById("userKey").value;
            var appleave           =   firebase.database().ref("Company_Leave/"+ comukey).child(apkeyid);
            appleave.once('value', function (snapshot) {
            var apkey                     = snapshot.key;
            var applyleavetype            = snapshot.child("LeaveType").val();
            var Full_Day                  = snapshot.child("Duration/Full_Day").val();
            var Half_Day                  = snapshot.child("Duration/Half_Day").val();
            var Multiple_Day              = snapshot.child("Duration/Multiple_Day").val();
            var NumberofDays              = snapshot.child("NumberofDays").val();
            var Requirement               = snapshot.child("Requirement").val();

            console.log(apkey);


             document.getElementById("appleavetype322").value               =  applyleavetype;

                var  query1 = firebase.database().ref("Employee").child(ukey);
                 query1.once("value").then(function(empsnapshot){
                  empsnapshot.forEach(function(childSnapshot1){ 
                  var Employeekey  = document.getElementById("Employeekey").value;
                  var leavesummary = query1.child(Employeekey);
                     leavesummary.child("Leave_Summary").once("value").then(function(snapshot){
                  snapshot.forEach(function(childSnapshot){
                      var LeaveType = childSnapshot.child("LeaveType").val();
                      var Available = childSnapshot.child("Available").val();
                      var Consume   = childSnapshot.child("Consume").val();
                      
                      var appleave    =  document.getElementById("appleavetype322").value;
                    if(appleave == LeaveType){
                          document.getElementById("remainingdays33").innerHTML           =  Available;
                
                         }
                      });
                    });                  
                 });
                });
              });
        $("#converttobenefitsmodal").modal("show");
    });
employeeleavetyperef.on('click', '.empconverttocash', function () {
        $('#converttocashmodal1').modal({
              backdrop: 'static'
            });
        var student_id = $(this).data('id');
           $('#comverttocashkey1').val(student_id);
             var apkeyid            =   document.getElementById("comverttocashkey1").value;
            var comukey            =  document.getElementById("userKey").value;
            var appleave           =   firebase.database().ref("Company_Employee_Leave_Type/"+ comukey).child(apkeyid);
            appleave.once('value', function (snapshot) {
            var apkey                     = snapshot.key;
            var applyleavetype            = snapshot.child("LeaveType").val();
            var Full_Day                  = snapshot.child("Duration/Full_Day").val();
            var Half_Day                  = snapshot.child("Duration/Half_Day").val();
            var Multiple_Day              = snapshot.child("Duration/Multiple_Day").val();
            var NumberofDays              = snapshot.child("NumberofDays").val();
            var Requirement               = snapshot.child("Requirement").val();

            console.log(apkey);


             document.getElementById("appleavetype321").value               =  applyleavetype;

                var  query1 = firebase.database().ref("Employee").child(ukey);
                 query1.once("value").then(function(empsnapshot){
                  empsnapshot.forEach(function(childSnapshot1){ 
                  var Employeekey  = document.getElementById("Employeekey").value;
                  var leavesummary = query1.child(Employeekey);
                     leavesummary.child("Leave_Summary").once("value").then(function(snapshot){
                  snapshot.forEach(function(childSnapshot){
                      var LeaveType = childSnapshot.child("LeaveType").val();
                      var Available = childSnapshot.child("Available").val();
                      var Consume   = childSnapshot.child("Consume").val();
                      
                      var appleave    =  document.getElementById("appleavetype321").value;
                    if(appleave == LeaveType){
                          document.getElementById("remainingdays31").innerHTML           =  Available;
                
                         }
                      });
                    });                  
                 });
                });
              });
        $("#converttocashmodal1").modal("show");
    });
  employeeleavetyperef.on('click', '.empaddretirement', function () {
        $('#converttobenefitsmodal1').modal({
              backdrop: 'static'
            });
        var student_id = $(this).data('id');
        $('#converttobenefitskey1').val(student_id);
            var apkeyid            =   document.getElementById("converttobenefitskey1").value;
            var comukey            =  document.getElementById("userKey").value;
            var appleave           =   firebase.database().ref("Company_Employee_Leave_Type/"+ comukey).child(apkeyid);
            appleave.once('value', function (snapshot) {
            var apkey                     = snapshot.key;
            var applyleavetype            = snapshot.child("LeaveType").val();
            var Full_Day                  = snapshot.child("Duration/Full_Day").val();
            var Half_Day                  = snapshot.child("Duration/Half_Day").val();
            var Multiple_Day              = snapshot.child("Duration/Multiple_Day").val();
            var NumberofDays              = snapshot.child("NumberofDays").val();
            var Requirement               = snapshot.child("Requirement").val();

            console.log(apkey);


             document.getElementById("appleavetype3221").value               =  applyleavetype;

                var  query1 = firebase.database().ref("Employee").child(ukey);
                 query1.once("value").then(function(empsnapshot){
                  empsnapshot.forEach(function(childSnapshot1){ 
                  var Employeekey  = document.getElementById("Employeekey").value;
                  var leavesummary = query1.child(Employeekey);
                     leavesummary.child("Leave_Summary").once("value").then(function(snapshot){
                  snapshot.forEach(function(childSnapshot){
                      var LeaveType = childSnapshot.child("LeaveType").val();
                      var Available = childSnapshot.child("Available").val();
                      var Consume   = childSnapshot.child("Consume").val();
                      
                      var appleave    =  document.getElementById("appleavetype3221").value;
                    if(appleave == LeaveType){
                          document.getElementById("remainingdays331").innerHTML           =  Available;
                
                         }
                      });
                    });                  
                 });
                });
              });

        $("#converttobenefitsmodal1").modal("show");
    });

        containerref.on('click', '.getapply', function () {
        $('#applyleave').modal({
              backdrop: 'static'
            });
        var student_id = $(this).data('id');
        $('#compaanyleavekey-id').val(student_id);
            var apkeyid            =   document.getElementById("compaanyleavekey-id").value;
            var comukey            =  document.getElementById("userKey").value;
            var appleave           =   firebase.database().ref("Company_Leave/"+ comukey).child(apkeyid);
            appleave.once('value', function (snapshot) {
            var apkey                     = snapshot.key;
            var applyleavetype            = snapshot.child("LeaveType").val();
            var Full_Day                  = snapshot.child("Duration/Full_Day").val();
            var Half_Day                  = snapshot.child("Duration/Half_Day").val();
            var Multiple_Day              = snapshot.child("Duration/Multiple_Day").val();
            var NumberofDays              = snapshot.child("NumberofDays").val();
            var Requirement               = snapshot.child("Requirement").val();
            var MinimumDaysRequire        = snapshot.child("MinimumDaysRequire").val();
            console.log(apkey);
        var from = new Date();
            var hours = from.getHours() % 12;
              hours = hours ? hours : 12;
                var dateTime = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][(from.getMonth())] + " " + 
                ("00" + from.getDate()).slice(-2) + " " + 
                from.getFullYear() + " " + 
                ("00" + hours).slice(-2) + ":" + 
                ("00" + from.getMinutes()).slice(-2) + ":" + 
                ("00" + from.getSeconds()).slice(-2) + ' ' + (from.getHours() >= 12 ? 'PM' : 'AM'); 
            document.getElementById('applieddate').value =  dateTime;

             console.log(applyleavetype); 
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
                   document.getElementById("multiple").value                  = Multiple_Day;
              }
             document.getElementById("minimum").value                =  MinimumDaysRequire;
             document.getElementById("appleavetype").value               =  applyleavetype;
             document.getElementById("LeaveDescription").innerHTML       =  applyleavetype; 
             document.getElementById("setleaveday").value                =  NumberofDays; 
             document.getElementById("totaldays").innerHTML              =  NumberofDays; 
             document.getElementById("dateapplied").innerHTML            =  dateTime; 
             document.getElementById("leavedesciption1").innerHTML       =  applyleavetype; 
             document.getElementById("require").innerHTML                =  Requirement;
           
           document.getElementById("requiredays2").innerHTML               = MinimumDaysRequire;

             var halfday  = document.getElementById("halfday").value;
             var fullday  = document.getElementById("fullday").value;
             var multiple = document.getElementById("multiple").value;
                var  query1 = firebase.database().ref("Employee").child(ukey);
                 query1.once("value").then(function(empsnapshot){
                  empsnapshot.forEach(function(childSnapshot1){ 
                  var Employeekey  = document.getElementById("Employeekey").value;
                  var leavesummary = query1.child(Employeekey);
                     leavesummary.child("Leave_Summary").once("value").then(function(snapshot){
                  snapshot.forEach(function(childSnapshot){
                      var LeaveType = childSnapshot.child("LeaveType").val();
                      var Available = childSnapshot.child("Available").val();
                      var Consume   = childSnapshot.child("Consume").val();
                      var Notes   = childSnapshot.child("Notes").val();
                      
                      var appleave    =  document.getElementById("appleavetype").value;
                    if(appleave == LeaveType){

                          document.getElementById("consumed").innerHTML                =  Consume;
                          document.getElementById("consumed1").value                   =  Consume;
                          document.getElementById("availabledays").innerHTML           =  Available;
                          document.getElementById("availabledays1").value              =  Available;
                          document.getElementById("rangedaysbeforefile").value        =  Notes;  
                        var day  = document.getElementById("rangedaysbeforefile").value; 
                        var no   = parseFloat(day);                              
                                    function addDays(n)
                                    {
                                        var t = new Date();
                                            t.setDate(t.getDate() + n); 
                                        var month = "0"+(t.getMonth()+1);
                                        var date  = "0"+t.getDate();
                                            month = month.slice(-2);
                                            date  = date.slice(-2);
                                         var date  = date +"/"+month +"/"+t.getFullYear();
                                         // alert(date);
                                        document.getElementById("range2").value        =  date; 
                                  
                                      }
                                 addDays(no);  



                         }
                      });
                    });                  
                 });
              });

              $("#duration").empty();//To reset duration
              $("#duration").append('<option disabled selected>Duration</option>');
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
         });
       $("#applyleave").modal("show");
    });
/////////////////////////////////////////////
 employeeleavetyperef.on('click', '.empapplyleave', function () {
        $('#employeeleaveapply').modal({
            backdrop: 'static'
          });
        var studid = $(this).data('id');
        $('#leavekey-id').val(studid);
            var keyid               =   document.getElementById("leavekey-id").value;
            var comukey1            =  document.getElementById("userKey").value;
            var appleave1           =   firebase.database().ref("Company_Employee_Leave_Type/"+ comukey1).child(keyid);
            appleave1.once('value', function (snapshot1) {
           
            var appkey                     = snapshot1.key;
            var applyleavetype1            = snapshot1.child("LeaveType").val();
            var Full_Day                   = snapshot1.child("Duration/Full_Day").val();
            var Half_Day                   = snapshot1.child("Duration/Half_Day").val();
            var Multiple_Day               = snapshot1.child("Duration/Multiple_Day").val();
            var NumberofDays               = snapshot1.child("NumberofDays").val();
            var Requirement                = snapshot1.child("Requirement").val();
            var MinimumDaysRequire         = snapshot1.child("MinimumDaysRequire").val();


            console.log(appkey);
            console.log(user.uid);

        var from = new Date();
            var hours = from.getHours() % 12;
              hours = hours ? hours : 12;
                var dateTime = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][(from.getMonth())] + " " + 
                ("00" + from.getDate()).slice(-2) + " " + 
                from.getFullYear() + " " + 
                ("00" + hours).slice(-2) + ":" + 
                ("00" + from.getMinutes()).slice(-2) + ":" + 
                ("00" + from.getSeconds()).slice(-2) + ' ' + (from.getHours() >= 12 ? 'PM' : 'AM'); 

            document.getElementById('applieddate1').value =  dateTime;

           if(Full_Day ==true){
               Full_Day ="Full Day";
               document.getElementById("fullday1").value                  = Full_Day;
            }if(Full_Day == false){
                Full_Day ="";
                 document.getElementById("fullday1").value                  = Full_Day;
            }if(Half_Day == true){
                Half_Day ="Half Day";
                document.getElementById("halfday1").value                  = Half_Day;
            }if(Half_Day == false){
                Half_Day ="";
                document.getElementById("halfday1").value                  = Half_Day;
            }if(Multiple_Day == true){
                Multiple_Day ="Multiple Day";
                document.getElementById("multiple1").value                  = Multiple_Day;
            }if(Multiple_Day == false){
                Multiple_Day ="";
                 document.getElementById("multiple1").value                  = Multiple_Day;
            }      
             document.getElementById("setleaveday1").value                =  NumberofDays;
             document.getElementById("appleavetype1").value               =  applyleavetype1;
             document.getElementById("LeaveDescription1").innerHTML       =  applyleavetype1;
             document.getElementById("leavedesciption2").innerHTML        =  applyleavetype1;
             document.getElementById("require1").innerHTML                =  Requirement;
             document.getElementById("dateapplied1").innerHTML            =  dateTime;
             document.getElementById("totaldays1").innerHTML              =  NumberofDays; 
             document.getElementById("minimum1").value                     =  MinimumDaysRequire; 
             document.getElementById("requiredays1").innerHTML               = MinimumDaysRequire;
             var halfday  = document.getElementById("halfday1").value;
             var fullday  = document.getElementById("fullday1").value;
             var multiple = document.getElementById("multiple1").value;

             var  query1 = firebase.database().ref("Employee").child(ukey);
                 query1.once("value").then(function(empsnapshot){
                  empsnapshot.forEach(function(childSnapshot1){
             var Employeekey  = document.getElementById("Employeekey").value;
             var leavesummary = query1.child(Employeekey);
                 leavesummary.child("Leave_Summary").once("value").then(function(snapshot){
                  snapshot.forEach(function(childSnapshot){
                      var LeaveType = childSnapshot.child("LeaveType").val();
                      var Available = childSnapshot.child("Available").val();
                      var Consume   = childSnapshot.child("Consume").val();
                      
                      var appleave    =  document.getElementById("appleavetype1").value;
                    if(appleave == LeaveType){

                          document.getElementById("consumed").innerHTML                =  Consume;
                          document.getElementById("consumed2").value                   =  Consume;
                          document.getElementById("availabledays").innerHTML           =  Available;
                          document.getElementById("availabledays2").value              =  Available;
                    }

                  });
                });
               });
              });

              $("#duration1").empty();//To reset cities
              $("#duration1").append('<option disabled selected>Duration</option>');
              if (halfday == Half_Day) {
                   $("#duration").append('<option>'+Half_Day+'</option>');
  
                } if (fullday == Full_Day) {
                   $("#duration1").append('<option>'+Full_Day+'</option>');
  
                }if (multiple == Multiple_Day) {
                   $("#duration1").append('<option>'+Multiple_Day+'</option>');
  
                }
           $('#duration1 option').filter(function(){
                 return !this.value || $.trim(this.value).length == 0;
               }).remove();
            });
              $('#employeeleaveapply').modal({
                backdrop: 'static',
                keyboard: false
            });
          $("#employeeleaveapply").modal("show");
           });


});

///////////////////////////////////////////////////Moda //////////////////////////////////////////////
var empuserskey                      =   document.getElementById("empuserskey").value;
var comuid                           =   document.getElementById("userKey").value;
var db1                              =   firebase.database();
var my_leave_request                 =   db1.ref('Leave_Request/'+comuid+'/'+empuserskey+'');

var table                             =   $('#table tbody');
var retrieveforceleave               =  db1.ref("ForceLeave/"+comuid);  

var holidays                         =  db1.ref("Company_Holiday/"+comuid);

function retrieveholiday(){
      holidays.once('value', function(snapshot) {
      snapshot.forEach(function(childSnapshot){

        var dateend       = childSnapshot.child("End").val();
        var datestart     = childSnapshot.child("Start").val();
        var disabledstart = childSnapshot.val();
         /** Days to be disabled as an array */
         console.log(datestart);
 /** Days to be disabled as an array */
             
      });
    });

}
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


      var email_id = document.getElementById('email').value;
       $(document).ready(function(){
              $("#forceleavemodal").modal('show');
             });      
      if(email_id == email){
           console.log(key3);
           if(status ==''){
          
              $("#body").append(' <div class="modal fade" id="forceleavemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
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
                  '<button type="button" class="btn-remove-key btn btn-default  "id="acceptmememe" style="font-size:12px "onclick="acceptedme()"><span class="glyphicon glyphicon-check" style="margin-right: 10px"></span>Accept</button>'+
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
 

 function getapplyleave(event){
event.preventDefault();
      var com_uid                           =  document.getElementById("userKey").value;
      var comid                             =  document.getElementById('Companyid').value;
      var empuserskey                       =  document.getElementById('empuserskey').value;
      var employeeid                        =  document.getElementById('employeeid').value;   
      var appleavetype                      =  document.getElementById('appleavetype').value;     
      var db                                =  firebase.database();

      var leaverequest                      =  db.ref("Leave_Request/"+com_uid);
      var multi                             =  db.ref("Multiple_Day/"+com_uid);
      var leave_Request_Employee            =  db.ref("Leave_Request_Employee/"+com_uid);

      var leaverequest1                     =  leaverequest.child(empuserskey);
      var leaverequest2                     =  multi.child(empuserskey);
      var Leave_Request_Employee1           =  leave_Request_Employee.child(empuserskey);
      var name                              =  document.getElementById('empapplyname').value; 
      var dateapplied                       =  document.getElementById('applieddate').value;
      var setdays                           =  document.getElementById('setleaveday').value;
      var leavefrom                         =  document.getElementById('leavefrom').value;
      var leaveuntil                        =  document.getElementById('leaveuntil').value;
      var reason                            =  document.getElementById('reason').value;
      var duration                          =  document.getElementById('duration') ;
      var dateslenth                        =  document.getElementById('dateslenth').value;
      var duration                          =  duration[duration.selectedIndex].value;

      var uid                               = document.getElementById("empuserskey").value;
   
      var start                            = new Date($('#leavefrom').val());
      var end                              = new Date($('#leaveuntil').val());

      var diff                             = new Date(end - start);
      var days                             = 1;
          days                             = diff / 1000 / 60 / 60 / 24;

      var prevconsumed    = document.getElementById("consumed1").value;

      if(duration =='Half Day'){
        consumed  = 0.5; 
         $('#leaveuntil').val(leavefrom);
      }if(duration =='Full Day'){
         consumed  = 1;
         $('#leaveuntil').val(leavefrom);
      } if(duration =='Multiple Day'){
           consumed  = 1;
        if (days == NaN){
                   consumed = 0 ;
         }else{
                   consumed = days  + 1;
                   
         }

      }
      var availabe          = document.getElementById("availabledays1").value;
     
      var balance           = setdays - consumed;
      var status            = "waiting for approval";
      var status1           = "no action";
      var supportDocs       = $("#supportDocs1")[0].files.length;
      var inpFile           = document.getElementById('supportDocs');
      var button            = document.getElementById('sendapply');
      var email             = document.getElementById('email').value;
      var minimum           = document.getElementById('minimum').value;
   if(consumed <= minimum){     
if(consumed < availabe){

       if($("#supportDocs").val() !=""){
                 var newdata = {       
                  balance           :  availabe,
                  comId             :  comid,
                  consumed          :  prevconsumed,
                  dateApplied       :  dateapplied,
                  days              :  setdays,
                  duration          :  duration,
                  id                :  employeeid,
                  leaveFrom         :  leavefrom,
                  leaveType         :  appleavetype,
                  leaveuntil        :  leaveuntil,
                  name              :  name,
                  reason            :  reason,
                  status            :  status,
                  uid               :  uid,
                  count             :  consumed,   
                  email             :  email,

               }
              
              leaverequest1.push(newdata);
              Leave_Request_Employee1.push(newdata);

            for (var i = 0; i < inpFile.files.length; i++) {
                var imageFile = inpFile.files[i];
                uploadImageAsPromise(imageFile);

                function uploadImageAsPromise (imageFile) {
                  return new Promise(function (resolve, reject) {
                      var storageRef = firebase.storage().ref("requirements/"+imageFile.name);   
                          var task = storageRef.put(imageFile);
                          console.log(task);
                          task.then(snap=>{

                            var pairkey       = document.getElementById("uploadfilekey").value;
                            var pairkey2      = document.getElementById("duplicateuploadfilekey").value;
                            var leaverequest2 = leaverequest1.child(pairkey);
                           
                            var Leave_Request_Employee2 = Leave_Request_Employee1.child(pairkey2);

                          storageRef.getDownloadURL().then(function(url) {
                            leaverequest2.child("requirements").push({
                             
                                  ImageLink :url,
                                });   
                           Leave_Request_Employee2.child("requirements").push({
                             
                                  ImageLink :url,
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
                                    $("#applyleave").modal("hide");
                             

                              }
                            );
                       });
                     }

                }
             } 
             else{
                var empty ="null";

                var newdata = {
                 
                    balance           :  availabe,
                    comId             :  comid,
                    consumed          :  prevconsumed,
                    dateApplied       :  dateapplied,
                    days              :  setdays,
                    duration          :  duration,
                    id                :  employeeid,
                    leaveFrom         :  leavefrom,
                    leaveType         :  appleavetype,
                    leaveuntil        :  leaveuntil,
                    name              :  name,
                    reason            :  reason,
                    status            :  status,
                    uid               :  uid,
                    count             :  consumed,
                    email             :  email,

                  }
      
             leaverequest1.push(newdata).child("requirements").push({
                   ImageLink : empty,
                 });
             Leave_Request_Employee1.push(newdata).child("requirements").push({
                   ImageLink : empty,
                });
          
             }  
        leaverequest1.once("value").then(function(snapshot){  
         snapshot.forEach(function(childSnapshot){
         var key                            =  childSnapshot.key;
         var dateApplied1                   =  childSnapshot.child('dateApplied').val();
         var leaveType                      =  childSnapshot.child('leaveType').val();

         document.getElementById("uploadfilekey").value         = key; 

         var pairapplieddate = document.getElementById("applieddate").value;
         var pairkey         = document.getElementById("uploadfilekey").value;
         var doubleavetype   = document.getElementById("appleavetype").value;

         if(pairapplieddate == dateApplied1 && doubleavetype == leaveType && pairkey == key){

           $("input[id=approver]:checked").each(function (i) { 

                 var data = $(this).val();
                 var index = i;

                 var leaverequest3            = leaverequest1.child(pairkey);
                 var leaverequest4            = leaverequest3.child("Approver").child(index);

                 var newdata1 = {
                    name   : data,
                    status : status1,
                 }

                 leaverequest4.set(newdata1);  

               });
             }
          }); 
        }); 
    Leave_Request_Employee1.once("value").then(function(snapshot1){  
         snapshot1.forEach(function(childSnapshot1){
         var key2                            =  childSnapshot1.key;
         var dateApplied                     =  childSnapshot1.child('dateApplied').val();
         var leaveType                       =  childSnapshot1.child('leaveType').val();
           
           document.getElementById("duplicateuploadfilekey").value = key2; 

         var pairkey2        = document.getElementById("duplicateuploadfilekey").value;
         var pairapplieddate = document.getElementById("applieddate").value;
         var doubleavetype   = document.getElementById("appleavetype").value;

         if(pairapplieddate == dateApplied  && doubleavetype == leaveType && pairkey2 == key2){

           $("input[id=approver]:checked").each(function (i) { 

                 var data = $(this).val();
                 var index = i;

                 var Leave_Request_Employee3            = Leave_Request_Employee1.child(pairkey2);
                 var Leave_Request_Employee4            = Leave_Request_Employee3.child("Approver").child(index);
                 var newdata1 = {
                    name   : data,
                    status : status1,
                 }
                 Leave_Request_Employee4.set(newdata1);  
                
              
               });

           }else{
            swal({type:'error',title: "Something Wrong!",icon: "error"});
           }

         }); 
      }); 
  $("#applyleave").modal("hide");
                swal({type:'success',title: "Sucessfully Sent !",icon: "success",});
}else{
    alert('You only have: ' + availabe +'days Available');
  
 }

}else{
  alert('Minimum Days/Hours Require To apply : ' + minimum);

 }     
}

 
function notif(){
var usercompanyid                    　=  document.getElementById("userKey").value;
var db                               　=  firebase.database();
var employeeleaverequestref          　=  db.ref("Leave_Request/"+usercompanyid);
var employeeleaverequestref1         　=  db.ref("Leave_Request/"+usercompanyid);
var Leave_Request_Employee           　=  db.ref("Leave_Request_Employee/"+usercompanyid);
var Leave_Request_Employee1         　 =  db.ref("Leave_Request_Employee/"+usercompanyid);
var employeeref                       =  db.ref("Employee/"+usercompanyid);
var empno = $('#count');

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
   
            if(aprovalstat =='no action' && id == empid &&apname == approverfullname && status == "waiting for approval"){
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


 function getapplyleave1(event){
event.preventDefault();
      var com_uid                           =  document.getElementById("userKey").value;
      var comid                             =  document.getElementById('Companyid1').value;
      var empuserskey                       =  document.getElementById('empuserskey').value;
      var employeeid                        =  document.getElementById('employeeid1').value;   
      var appleavetype                      =  document.getElementById('appleavetype1').value;     
      var db                                =  firebase.database();
      var leaverequest                      =  db.ref("Leave_Request/"+com_uid);
      var leaverequest1                     =  leaverequest.child(empuserskey);
      var leave_Request_Employee            =  db.ref("Leave_Request_Employee/"+com_uid);
      var Leave_Request_Employee1           =  leave_Request_Employee.child(empuserskey);
      var  name                             =  document.getElementById('empapplyname1').value; 
      var dateapplied                       =  document.getElementById('applieddate1').value;
      var setdays                           =  document.getElementById('setleaveday1').value;
      var leavefrom                         =  document.getElementById('leavefrom1').value;
      var leaveuntil                        =  document.getElementById('leaveuntil1').value;
      var reason                            =  document.getElementById('reason1').value;
      var duration                          =  document.getElementById('duration1') ;
      var duration                          =  duration[duration.selectedIndex].value;
      var uid                               =  document.getElementById("empuserskey").value;

   
      var start                             =  new Date($('#leavefrom1').val());
      var end                               =  new Date($('#leaveuntil1').val());

      var diff                              =  new Date(end - start);
      var days                              =  1;
          days                              =  diff / 1000 / 60 / 60 / 24;

      var consumed;
      var setconsumed = "0";

      if(duration =='Half Day'){
        consumed  = 0.5; 
      }if(duration =='Full Day'){
         consumed  = 1;
    
      }if(duration =='Multiple Day'){
           consumed  = 1;
        if (days == NaN){
                   consumed = 0 ;
         }else{
                   consumed = days  + 1;
                   
         }

      }

      var avail = document.getElementById("availabledays2").value;
      //var balance           = setdays - days;
      var status            = "waiting for approval";
      var status1           = "no action";
      var supportDocs       = $("#supportDocs1")[0].files.length;
      var inpFile           = document.getElementById('supportDocs1');
      var button            = document.getElementById('sendapply1');
      var  email            = document.getElementById('email').value;
      var minimum           = document.getElementById('minimum1').value;
 if(consumed <= minimum ){
if(consumed < avail){    

   if($("#supportDocs1").val() !=""){
           var newdata = {       
            balance           :  avail,
            comId             :  comid,
            consumed          :  setconsumed,
            dateApplied       :  dateapplied,
            days              :  setdays,
            duration          :  duration,
            id                :  employeeid,
            leaveFrom         :  leavefrom,
            leaveType         :  appleavetype,
            leaveuntil        :  leaveuntil,
            name              :  name,
            reason            :  reason,
            status            :  status,
            uid               :  uid,
            count             :  consumed,
            email             :  email,
         };
          leaverequest1.push(newdata);
         Leave_Request_Employee1.push(newdata);
      for (var i = 0; i < inpFile.files.length; i++) {
                var imageFile = inpFile.files[i];

              uploadImageAsPromise(imageFile);
        function uploadImageAsPromise (imageFile) {
            return new Promise(function (resolve, reject) {
             var storageRef = firebase.storage().ref("requirements/"+imageFile.name);   
             var task       = storageRef.put(imageFile);
             task.then(snap=>{

                var pairkey                 = document.getElementById("uploadfilekey1").value;
                var pairkey2                = document.getElementById("duplicateuploadfilekey").value;

                var leaverequest2           = leaverequest1.child(pairkey);
                var Leave_Request_Employee2 = Leave_Request_Employee1.child(pairkey2);

                storageRef.getDownloadURL().then(function(url) {

                  leaverequest2.child("requirements").push({
                        ImageLink : url
                     });
                Leave_Request_Employee2.child("requirements").push({
                            ImageLink :url,
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

                            
                              $("#myModalSubscribe").modal("hide");
                          

                        }
                      );
            });
          }
        }
    }else{
        var empty   = "null";
        var newdata = {
            balance           :  avail,
            comId             :  comid,
            consumed          :  setconsumed,
            dateApplied       :  dateapplied,
            days              :  setdays,
            duration          :  duration,
            id                :  employeeid,
            leaveFrom         :  leavefrom,
            leaveType         :  appleavetype,
            leaveuntil        :  leaveuntil,
            name              :  name,
            reason            :  reason,
            status            :  status,
            uid               :  uid,
            count             :  consumed,
            email             :  email,
          }
      
          leaverequest1.push(newdata).child("requirements").push({
               ImageLink : empty,
            });;
          
         Leave_Request_Employee1.push(newdata).child("requirements").push({
               ImageLink : empty,
            });
    }
        leaverequest1.once("value").then(function(snapshot){  
          snapshot.forEach(function(childSnapshot){
           var key                             =  childSnapshot.key;
           var dateApplied                     =  childSnapshot.child('dateApplied').val();
           var leaveType                       =  childSnapshot.child('leaveType').val();

           document.getElementById("uploadfilekey1").value = key; 
           var pairkey         = document.getElementById("uploadfilekey1").value;
           var pairapplieddate = document.getElementById("applieddate1").value;
           var doubleavetype   = document.getElementById("appleavetype1").value;

          if(pairapplieddate == dateApplied && doubleavetype == leaveType && pairkey == key){    
             $("input[id=approver1]:checked").each(function (i) { 

                     var data = $(this).val();
                     var index = i;
                     console.log("The index is " + i + " and the value is " + data);
                     var leaverequest3 = leaverequest1.child(pairkey);
                     var leaverequest4 = leaverequest3.child("Approver").child(index);
                     var newdata1 = {
                        name   : data,
                        status : status1,
                     }
                     leaverequest4.set(newdata1);  
                     
                     });  
              }
         });
       }); 

    Leave_Request_Employee1.once("value").then(function(snapshot1){  
         snapshot1.forEach(function(childSnapshot1){
         var key2                            =  childSnapshot1.key;
         var dateApplied                     =  childSnapshot1.child('dateApplied').val();
         var leaveType                       =  childSnapshot1.child('leaveType').val();

         document.getElementById("duplicateuploadfilekey2").value = key2; 
         var pairkey2 = document.getElementById("duplicateuploadfilekey2").value;
         var pairapplieddate = document.getElementById("applieddate1").value;
         var doubleavetype   = document.getElementById("appleavetype1").value;

         if(pairapplieddate == dateApplied  && doubleavetype == leaveType && pairkey2 == key2){

             $("input[id=approver1]:checked").each(function (i) { 

                   var data = $(this).val();
                   var index = i;

                   var Leave_Request_Employee3                      = Leave_Request_Employee1.child(pairkey2);
                   var Leave_Request_Employee4                      = Leave_Request_Employee3.child("Approver").child(index);
                   var newdata1 = {
                      name   : data,
                      status : status1,
                   }
                   Leave_Request_Employee4.set(newdata1);  
              });
           }else{
            swal({type:'error',title: "Something Wrong!",icon: "error"});
           }
         }); 
      }); 

    }else{
       alert('You only have: ' + avail +'days Available');
    }
       $("#employeeleaveapply").modal("hide");
      swal({type:'success',title: "Sucessfully Send!",icon: "success"});
              
  }else{
     alert('Minimum Days/Hours Require To apply : ' + minimum);
      
  }

}

function tableleaverequest(){
  table.empty();
  my_leave_request.on('child_added',function(myrequest){
        var key      =  myrequest.key;
        myrequest    =  myrequest.val();


        console.log(key);
        if(myrequest.status =="waiting for approval"){
        table.append(
            '<tr style="font-size: 12px" id="tbody1">'+
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.leaveType+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.duration+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.count+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.leaveFrom+'</td>'+
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.leaveuntil+'</td>'+ 
                  '<td style="font-size: 12px;text-align: center">'+ myrequest.reason+'</td>'+  
                  '<td style="font-size: 13px;text-align: center;text-color:red"><p style="color:#4d79ff"><b>'+myrequest.status+'<b></p></td>'+
                  '<td style="font-size: 13px;text-align: center">'+
                   '<button class ="editrequest-btn  btn leave glyphicon  btn btn-leave btn-hover-white btn-sm button" style="font-size: 10px;width:72px"  title="Edit Request"  data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '"    >Edit</button> ' +
                   '<button class ="cancel-btn  btn-danger glyphicon btn btn-leave btn-hover-white btn-sm button" style="font-size: 10px;width:72px" title="Edit Request" data-key="'+ key + '" data-toggle="modal" data-id="'+ key + '">Cancel</button> ' +
                    '</td>'+        
                '</tr>'
          );
          // var seen = {};
          //     $('#table tr').each(function() {
          //         var txt = $(this).children("td:eq(2)").text();
          //         if (seen[txt])
          //             $(this).remove();
          //         else
          //             seen[txt] = true;
          //     });
         }
    });
}

$(function ($) {


    $('#updateleave').on('hidden.bs.modal', function (e) {
            $("#subdoct").empty();
             $("#updateApprovers").empty();
           }) 
        

      table.on('click', '.cancel-btn ', function () {
               var leaveid = $(this).data('id');
                $('#cancelkey').val(leaveid);
              var keyleave        =   document.getElementById('cancelkey').value; 
              my_leave_request.once("value").then(function(snapshot){  
              snapshot.forEach(function(childSnapshot){
              var key                  =  childSnapshot.key;
              var dateApplied          =  childSnapshot.child('dateApplied').val();
              var leaveType            =  childSnapshot.child('leaveType').val();
              var cancelkey            =  document.getElementById('cancelkey').value;
              if(key == keyleave){
                  document.getElementById('cancelkeyleavedateapplied').value = dateApplied;
                  document.getElementById('cancelkeyleavetype').value        = leaveType;
              }
             });
           });
               $('#cancelmodal').modal('show');
         });
      table.on('click', '.editrequest-btn ', function () {
               var leaveid = $(this).data('id');
                $('#update_leavekey-id').val(leaveid);
       
     $('#updateleave').modal({
      backdrop: 'static'
    });

  var db                               =   firebase.database();
  var comuid                           =   document.getElementById("userKey").value;
  var leavecom                         =   db.ref("Company_Leave/"+ comuid);
  var leavecom1                        =   db.ref("Company_Employee_Leave_Type/"+ comuid);
      leavecom.once("value").then(function(snapshotleave){  
            snapshotleave.forEach(function(childSnapshotleave){
              var leave_key                 = childSnapshotleave.key;
              var leave_leaveType           = childSnapshotleave.child("LeaveType").val();
              var Full_Day                  = childSnapshotleave.child("Duration/Full_Day").val();
              var Half_Day                  = childSnapshotleave.child("Duration/Half_Day").val();
              var Multiple_Day              = childSnapshotleave.child("Duration/Multiple_Day").val();
              var Requirement               = childSnapshotleave.child("Requirement").val();
             var MinimumDaysRequire         = childSnapshotleave.child("MinimumDaysRequire").val();
            my_leave_request.once("value").then(function(snapshot){  
            snapshot.forEach(function(childSnapshot){
            var key                  =  childSnapshot.key;
            var duration             =  childSnapshot.child("duration").val();
            var leaveFrom            =  childSnapshot.child("leaveFrom").val();
            var leaveuntil           =  childSnapshot.child("leaveuntil").val();
            var leaveType            =  childSnapshot.child("leaveType").val();
            var reason               =  childSnapshot.child("reason").val();
            var days                 =  childSnapshot.child("days").val();
            var dateApplied          =  childSnapshot.child("dateApplied").val();
            var count                =  childSnapshot.child("count").val();
            var balance              =  childSnapshot.child("balance").val();
            var consumed             =  childSnapshot.child("consumed").val();
            var childData            =  childSnapshot.val(); 
            var updatekey            =  document.getElementById("update_leavekey-id").value;

            if(key == updatekey &&  leaveType == leave_leaveType){
                  document.getElementById("update_dateapply").value        = dateApplied;
                  document.getElementById("update_appleavetype1").value   = leaveType;
                  document.getElementById("update_availabledays3").value   = balance;
                  document.getElementById("update_consumed3").value        = consumed;

                 if(Full_Day ==true){ 
                     Full_Day ="Full Day";
                     document.getElementById("update_fullday1").value                    = Full_Day;
                  }if(Full_Day == false){
                      Full_Day ="";
                       document.getElementById("update_fullday1").value                  = Full_Day;
                  }if(Half_Day == true){
                      Half_Day ="Half Day";
                      document.getElementById("update_halfday1").value                   = Half_Day;
                  }if(Half_Day == false){
                      Half_Day ="";
                      document.getElementById("update_halfday1").value                   = Half_Day;
                  }if(Multiple_Day == true){
                      Multiple_Day ="Multiple Day";
                      document.getElementById("update_multiple1").value                  = Multiple_Day;
                  }if(Multiple_Day == false){
                      Multiple_Day ="";
                       document.getElementById("update_multiple1").value                 = Multiple_Day;
                  }

                 
                $('#update_leavefrom1').val(leaveFrom);
                $('#update_leaveuntil1').val(leaveuntil);
               document.getElementById("updateduration1").innerHTML          = duration;
               document.getElementById("update_consumed1").innerHTML         = count;
               document.getElementById("update_dateapplied1").innerHTML      = dateApplied;
               document.getElementById("update_require1").innerHTML          = Requirement;
               document.getElementById("update_LeaveDescription1").innerHTML = leaveType;
               document.getElementById("update_leavedesciption2").innerHTML  = leaveType;
               document.getElementById("update_totaldays1").innerHTML        = days;
               document.getElementById("update_reason1").value               = reason;
               document.getElementById("update_applieddate1").value          = dateApplied;
               document.getElementById("requiredays").innerHTML               = MinimumDaysRequire;

              var halfday  = document.getElementById("update_halfday1").value;
              var fullday  = document.getElementById("update_fullday1").value;
              var multiple = document.getElementById("update_multiple1").value;



              var my_leave_request1  = my_leave_request.child(key);
              my_leave_request1.child("requirements").once("value").then(function(snapshot1){  
              snapshot1.forEach(function(childSnapshot1){

                      var ImageLinkkey =  childSnapshot1.key;
                      var ImageLink    =  childSnapshot1.child("ImageLink").val();
                      var arrayimage   =  [ImageLink].length;
                      
                   if(ImageLink == "null"){
                       $('#subdoct').append("");
                          arrayimage = 0;
                         console.log(arrayimage);
                    }else{
                      $('#subdoct').append(
                      '<a  href="'+ImageLink +'" download ><img id="myrequirements" style="height:100px;width:100px;padding:auto" src="'+ImageLink+'"></img></a>'
                      );
                      var countimage = arrayimage.toString();
                        document.getElementById("update_supportDocs").file = countimage;
                        console.log(arrayimage);
                     }

                  });
               });
             var my_leave_request2  = my_leave_request.child(key);
              my_leave_request2.child("Approver").once("value").then(function(appsnapshot){  
              appsnapshot.forEach(function(appchildSnapshot){
                      var appkey       = appchildSnapshot.key;
                      var name         = appchildSnapshot.child("name").val();
                      var status       = appchildSnapshot.child("status").val();

                      var leavecoordinator = "leave coordinator";

                      if(name == leavecoordinator){

                         name="";
                         status=""
                      }
                      var apname = document.getElementById("updateappfullname").value;
                      if(name != apname){
                       $('#updateApprovers').append(
                        '<label>'+name+'</label><br><div style="float:right"><p style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-25px;color:red">'+status+'</p></div>'
                       );
                     }
                  });
               });

              $("#updateduration1").empty();//To reset duration
              $("#updateduration1").val(duration);
              if (halfday == Half_Day) {
                   $("#updateduration1").append('<option>'+Half_Day+'</option>');
  
                } if (fullday == Full_Day) { 
                   $("#updateduration1").append('<option>'+Full_Day+'</option>');
  
                }if (multiple == Multiple_Day) {
                   $("#updateduration1").append('<option>'+Multiple_Day+'</option>');
  
                }
            $('#updateduration1 option').filter(function(){
                 return !this.value || $.trim(this.value).length == 0;
               }).remove();       

            }
         });
        });
      });
    });  
  var leavecom1                        =   db.ref("Company_Employee_Leave_Type/"+ comuid);
      leavecom1.once("value").then(function(snapshotleave){  
            snapshotleave.forEach(function(childSnapshotleave){
              var leave_key                 = childSnapshotleave.key;
              var leave_leaveType           = childSnapshotleave.child("LeaveType").val();
              var Full_Day                  = childSnapshotleave.child("Duration/Full_Day").val();
              var Half_Day                  = childSnapshotleave.child("Duration/Half_Day").val();
              var Multiple_Day              = childSnapshotleave.child("Duration/Multiple_Day").val();
              var Requirement               = childSnapshotleave.child("Requirement").val();
          
            my_leave_request.once("value").then(function(snapshot){  
            snapshot.forEach(function(childSnapshot){
            var key                  =  childSnapshot.key;
            var duration             =  childSnapshot.child("duration").val();
            var leaveFrom            =  childSnapshot.child("leaveFrom").val();
            var leaveuntil           =  childSnapshot.child("leaveuntil").val();
            var leaveType            =  childSnapshot.child("leaveType").val();
            var reason               =  childSnapshot.child("reason").val();
            var days                 =  childSnapshot.child("days").val();
            var dateApplied          =  childSnapshot.child("dateApplied").val();
            var count                =  childSnapshot.child("count").val();
            var balance              =  childSnapshot.child("balance").val();
            var consumed             =  childSnapshot.child("consumed").val();
            var childData            =  childSnapshot.val(); 
            var updatekey            =  document.getElementById("update_leavekey-id").value;

            if(key == updatekey &&  leaveType == leave_leaveType){
                  document.getElementById("update_dateapply").value        = dateApplied;
                  document.getElementById("update_appleavetype1").value   = leaveType;
                  document.getElementById("update_availabledays3").value   = balance;
                  document.getElementById("update_consumed3").value        = consumed;

                 if(Full_Day ==true){ 
                     Full_Day ="Full Day";
                     document.getElementById("update_fullday1").value                    = Full_Day;
                  }if(Full_Day == false){
                      Full_Day ="";
                       document.getElementById("update_fullday1").value                  = Full_Day;
                  }if(Half_Day == true){
                      Half_Day ="Half Day";
                      document.getElementById("update_halfday1").value                   = Half_Day;
                  }if(Half_Day == false){
                      Half_Day ="";
                      document.getElementById("update_halfday1").value                   = Half_Day;
                  }if(Multiple_Day == true){
                      Multiple_Day ="Multiple Day";
                      document.getElementById("update_multiple1").value                  = Multiple_Day;
                  }if(Multiple_Day == false){
                      Multiple_Day ="";
                       document.getElementById("update_multiple1").value                 = Multiple_Day;
                  }

                 
                $('#update_leavefrom1').val(leaveFrom);
                $('#update_leaveuntil1').val(leaveuntil);
               document.getElementById("updateduration1").innerHTML          = duration;
               document.getElementById("update_consumed1").innerHTML         = count;
               document.getElementById("update_dateapplied1").innerHTML      = dateApplied;
               document.getElementById("update_require1").innerHTML          = Requirement;
               document.getElementById("update_LeaveDescription1").innerHTML = leaveType;
               document.getElementById("update_leavedesciption2").innerHTML  = leaveType;
               document.getElementById("update_totaldays1").innerHTML        = days;
               document.getElementById("update_reason1").value               = reason;
               document.getElementById("update_applieddate1").value          = dateApplied;
               document.getElementById("update_require").value               = dateApplied;

              var halfday  = document.getElementById("update_halfday1").value;
              var fullday  = document.getElementById("update_fullday1").value;
              var multiple = document.getElementById("update_multiple1").value;



              var my_leave_request1  = my_leave_request.child(key);
              my_leave_request1.child("requirements").once("value").then(function(snapshot1){  
              snapshot1.forEach(function(childSnapshot1){

                      var ImageLinkkey =  childSnapshot1.key;
                      var ImageLink    =  childSnapshot1.child("ImageLink").val();
                      var arrayimage   =  [ImageLink].length;
                      
                   if(ImageLink == "null"){
                       $('#subdoct').append("");
                          arrayimage = 0;
                         console.log(arrayimage);
                    }else{
                      $('#subdoct').append(
                      '<a  href="'+ImageLink +'" download ><img id="myrequirements" style="height:100px;width:100px;padding:auto" src="'+ImageLink+'"></img></a>'
                      );
                      var countimage = arrayimage.toString();
                        document.getElementById("update_supportDocs").file = countimage;
                        console.log(arrayimage);
                     }

                  });
               });
             var my_leave_request2  = my_leave_request.child(key);
              my_leave_request2.child("Approver").once("value").then(function(appsnapshot){  
              appsnapshot.forEach(function(appchildSnapshot){
                      var appkey       = appchildSnapshot.key;
                      var name         = appchildSnapshot.child("name").val();
                      var status       = appchildSnapshot.child("status").val();

                      var leavecoordinator = "leave coordinator";

                      if(name == leavecoordinator){

                         name="";
                         status=""
                      }
                      var apname = document.getElementById("updateappfullname").value;
                      if(name != apname){
                       $('#updateApprovers').append(
                        '<label>'+name+'</label><br><div style="float:right"><p style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-25px;color:red">'+status+'</p></div>'
                       );
                     }
                  });
               });

              $("#updateduration1").empty();//To reset duration
              $("#updateduration1").val(duration);
              if (halfday == Half_Day) {
                   $("#updateduration1").append('<option>'+Half_Day+'</option>');
  
                } if (fullday == Full_Day) { 
                   $("#updateduration1").append('<option>'+Full_Day+'</option>');
  
                }if (multiple == Multiple_Day) {
                   $("#updateduration1").append('<option>'+Multiple_Day+'</option>');
  
                }
            $('#updateduration1 option').filter(function(){
                 return !this.value || $.trim(this.value).length == 0;
               }).remove();       

            }
         });
        });
      });
    });  
        $("#updateleave").modal("show");

  });

});

function updateapplyrequest(event){
      event.preventDefault();

              var com_uid                           =  document.getElementById("userKey").value;
              var empuserskey                       =  document.getElementById('empuserskey').value;
              var db                                =  firebase.database();
              var leave_Request_Employee            =  db.ref("Leave_Request_Employee/"+com_uid);
              // var Company_Employee_Leave_Type       =  db.ref("Company_Employee_Leave_Type/"+com_uid);
              var Leave_Request_Employee1           =  leave_Request_Employee.child(empuserskey);

              my_leave_request.once("value").then(function(snapshot){  
              snapshot.forEach(function(childSnapshot){
              var key                  =  childSnapshot.key;
              var dateApplied          =  childSnapshot.child('dateApplied').val();
              var leaveType            =  childSnapshot.child('leaveType').val();

              var updatekey            =  document.getElementById("update_leavekey-id").value;
              var inpFile              =  document.getElementById('update_supportDocs');


              var my_leave_request1  = my_leave_request.child(key);
                  my_leave_request1.child("requirements").once("value").then(function(snapshot1){  
                  snapshot1.forEach(function(childSnapshot1){

              var update_leavefrom1                 =  document.getElementById('update_leavefrom1').value;
              var update_leaveuntil1                =  document.getElementById('update_leaveuntil1').value;
              var update_reason1                    =  document.getElementById('update_reason1').value;
              var duration                          =  document.getElementById('updateduration1');
              var duration                          =  duration[duration.selectedIndex].value;
           
              var start                             =  new Date($('#update_leavefrom1').val());
              var end                               =  new Date($('#update_leaveuntil1').val());

              var diff                              =  new Date(end - start);
              var days                              =  1;
                  days                              =  diff / 1000 / 60 / 60 / 24;
              // var consumed = document.getElementById('consumed2').value;
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
                             consumed = days  + 1;
                             
                   }

                }
        var update_availabledays3    = document.getElementById("update_availabledays3").value;
        var update_minuim            = document.getElementById("update_minuim").value;
    if(consumed < update_availabledays3){  
    
            if(updatekey == key ){

                var update_consumed3      = document.getElementById("update_consumed3").value;
              

                var newdataupdate = {

                    balance     :  update_availabledays3,
                    consumed    :  update_consumed3,
                    count       :  consumed,
                    leaveFrom   :  update_leavefrom1,
                    leaveuntil  :  update_leaveuntil1,
                    reason      :  update_reason1,
                    duration    :  duration,
                }
                my_leave_request1.update(newdataupdate);



                //////////////UPDATE FILE UPLOAD//////////////////////////
                if(update_supportDocs !=""){
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
                                my_leave_request1.child("requirements").remove(); 
                              
                                my_leave_request1.child("requirements").push({
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
           ////////////////////////// Update Approver ///////////////////////
            var update_appleavetype1 = document.getElementById('update_appleavetype1').value;
            var update_applieddate1  = document.getElementById('update_applieddate1').value;
           if(update_appleavetype1 == leaveType && update_applieddate1 == dateApplied ){
              my_leave_request1.child("Approver").remove();
             $("input[id=approver2]:checked").each(function (i) { 

                   var data = $(this).val();
                   var index = i;
                   console.log("The index is " + i + " and the value is " + data);
                   //my_leave_request1.child("Approver").remove();

                   var leaverequest4 = my_leave_request1.child("Approver").child(index);
                   var newdata1 = {
                      name   : data,
                      status : status1,
                   }
                   leaverequest4.update(newdata1);  
                 
                    
                 
                 });
                }
               
              }
             
           }
             });
            });      
          });
          }); 
    

    Leave_Request_Employee1.once("value").then(function(snapshot3){  
               snapshot3.forEach(function(childSnapshot3){
              var key2                         =  childSnapshot3.key;
              var leaverequestdateApplied      =  childSnapshot3.child('dateApplied').val();
              var LeaveType                    =  childSnapshot3.child('leaveType').val();


              var inpFile                           =  document.getElementById('update_supportDocs');
              var update_leavefrom1                 =  document.getElementById('update_leavefrom1').value;
              var update_leaveuntil1                =  document.getElementById('update_leaveuntil1').value;
              var update_reason1                    =  document.getElementById('update_reason1').value;
              var duration                          =  document.getElementById('updateduration1');
              var duration                          =  duration[duration.selectedIndex].value;
           
              var start                             =  new Date($('#update_leavefrom1').val());
              var end                               =  new Date($('#update_leaveuntil1').val());

              var diff                              =  new Date(end - start);
              var days                              =  1;
                  days                              =  diff / 1000 / 60 / 60 / 24;
              // var consumed = document.getElementById('consumed2').value;
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
                             consumed = days  + 1;
                             
                   }

                }
              var dateapply            = document.getElementById('update_dateapply').value;
              var update_appleavetype1 = document.getElementById('update_appleavetype1').value;
              var update_availabledays3 = document.getElementById("update_availabledays3").value;
          if(consumed < update_availabledays3)
          {  
            if(leaverequestdateApplied == dateapply && update_appleavetype1 == LeaveType){
                      var update_consumed3      = document.getElementById("update_consumed3").value;
                     
                      var newdataupdateleave = {

                          balance     :  update_availabledays3,
                          consumed    :  update_consumed3,
                          count       :  consumed,
                          leaveFrom   :  update_leavefrom1,
                          leaveuntil  :  update_leaveuntil1,
                          reason      :  update_reason1,
                          duration    :  duration,

                      }
                      Leave_Request_Employee1.child(key2).update(newdataupdateleave);

                      if(update_supportDocs !=""){
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
                                    Leave_Request_Employee1.child(key2).child("requirements").remove();
                                    Leave_Request_Employee1.child(key2).child("requirements").push({
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
                    Leave_Request_Employee1.child(key2).child("Approver").remove();

                   $("input[id=approver2]:checked").each(function (i) { 

                         var data = $(this).val();
                         var index = i;
                         console.log("The index is " + i + " and the value is " + data);
                         var leaverequest4 = Leave_Request_Employee1.child(key2).child("Approver").child(index);
                         var newdata1 = {
                            name   : data,
                            status : status1,
                         }
                         leaverequest4.update(newdata1);  
                      
                       });
                    }  
                       $("#updateleave").modal("hide");
                            swal({type:'success',title: "Sucessfully Update!",icon: "success"});
                       
                  }else{
                    alert('You only have: ' + update_availabledays3 +'days Available');
                      
                  }
                 }); 
              }); 
   
   
}    
function deleteleaverequest(event){
      event.preventDefault();
     var keyleave        =   document.getElementById('cancelkey').value; 
     my_leave_request.child(keyleave).remove();

              var com_uid                           =  document.getElementById("userKey").value;
              var empuserskey                       =  document.getElementById('empuserskey').value;
              var db                                =  firebase.database();
              var leave_Request_Employee            =  db.ref("Leave_Request_Employee/"+com_uid);
              var Leave_Request_Employee1           =  leave_Request_Employee.child(empuserskey);


               Leave_Request_Employee1.once("value").then(function(snapshot3){  
               snapshot3.forEach(function(childSnapshot3){

              var key2                         =  childSnapshot3.key;
              var leaverequestdateApplied      =  childSnapshot3.child('dateApplied').val();
              var LeaveType                    =  childSnapshot3.child('leaveType').val();

                var dateApplied         = document.getElementById('cancelkeyleavedateapplied').value;
                var cancelkeyleavetype  = document.getElementById('cancelkeyleavetype').value;
                if(LeaveType == cancelkeyleavetype && leaverequestdateApplied == dateApplied){

                    Leave_Request_Employee1.child(key2).remove();

                   $("#cancelmodal").modal("hide");
                   swal({type:'success',title: "Sucessfully Deleted!",icon: "success"});
        
                }
               });
             });

}

function retrieveholidays(){
  var start ;
      
 var  end ;
    var dates =["2019-01-01","2019-04-09","2019-04-19","2019-04-18","2019-05-01","2019-06-12","2019-08-26","2019-11-30","2019-12-25","2019-12-30"];  
         var ukey   =  document.getElementById("userKey").value;
         var query1 = firebase.database().ref("Company_Holiday").child(ukey);
         query1.once("value").then(function(snapshot){
         snapshot.forEach(function(childSnapshot){
            var key                  =  childSnapshot.key;
            var End                  =  childSnapshot.child("End").val();
            var Start                =  childSnapshot.child("Start").val();
            var Title                =  childSnapshot.child("Title").val();
          
            // var arrayholiday = [End,Start];
            // console.log(arrayholiday);
     
            if(Title !=""){
  
               dates.push(End,Start);
 
            }


                 
   });
       // var range = document.getElementById("range2").value;
       // var no = document.getElementById("rangedaysbeforefile").value;
       // var no1   = parseFloat(no);
       // var ran =   '+'+no+'d';
       // alert(ran)
         var datesForDisable = dates;

             $(".date1").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                datesDisabled: datesForDisable,
             //   maxDate: new Date, minDate: new Date(no)
             })    

});
console.log(dates);  
                         

}
function showmodalmultipleleavemodal() {
  // body...
  $('#view-multipleday').modal('show');
}
function cash(){
    $("#converttocashmodal").modal("hide");
    swal({type:'success',title: "Successfully  Sent!",icon: "success"}); 
   
}
function benefits(){
    $("#converttobenefitsmodal").modal("hide");
    swal({type:'success',title: "Successfully  Sent!",icon: "success"}); 
   
}

function changeText(elemid) { 
var ind = document.getElementById(elemid).selectedIndex; 
document.getElementById("display").innerHTML=textBlocks[ind]; 
} 

function init(){
  $('#forceleavemodal').modal({backdrop: 'static'});
  $('#sendapply').on("click",getapplyleave);
  $('#sendapply1').on("click",getapplyleave1);
  $('#update_sendapply').on("click",updateapplyrequest);
  $('#cancelleaverequest').on("click",deleteleaverequest);
  $('#multipleleavemodal').on("click",showmodalmultipleleavemodal);
  $('#converttocash').on("click",cash);
  $('#retirements_btn').on("click",benefits);
  // table.on('click','button.cancel-btn',deleterequest);

  my_leave_request.on('child_removed',tableleaverequest);
  my_leave_request.on('child_changed',tableleaverequest);

  tableleaverequest();
  retrieveholidays();
  reload_notif();
  rerforceleave();
  
}

init();
function reload_notif(){
   window.setInterval(notif, 1000);
}

});
}


   else {
    // No user is signed in.
    console("No user is signed in.");

  }

});

function acceptedme(){
  var db3                          = firebase.database();
  var comuid2                       =   document.getElementById("userKey").value;
  var retrieveforceleave23         =  db3.ref("ForceLeave/"+comuid2);  
   $("#acceptmememe").click(function(){
  retrieveforceleave23.once('value', function(snapshot) {
      snapshot.forEach(function(childSnapshot){
      var key                    = childSnapshot.key;
 console.log(key);

  var retrieveforceleave1 = retrieveforceleave23.child(key);
      retrieveforceleave1.once('value', function(snapshot2) {
      snapshot2.forEach(function(childSnapshot2){
      var key2                    = childSnapshot2.key;
 console.log(key2);

      var key3                   = childSnapshot2.key;
      var dateApplied            = childSnapshot2.child('dateApplied').val();
      var leaveFrom              = childSnapshot2.child('leaveFrom').val();
      var leaveType              = childSnapshot2.child('leaveType').val();
      var leaveuntil             = childSnapshot2.child('leaveuntil').val();
      var reason                 = childSnapshot2.child('reason').val();
      var status                 = childSnapshot2.child('status').val();
      var email                  = childSnapshot2.child('email').val();
      var email_id               = document.getElementById('email').value;
    if(email_id == email){
     console.log(leaveFrom);

        if(status =" "){
            var updatestatus        = "accepted";
            var retrieveforceleave3 = retrieveforceleave1.child(key3);
              retrieveforceleave3.update({status:updatestatus})
              }
             }     
           });
           });
         });
        });
     
  $("#forceleavemodal").modal('hide');
   swal({type:'success',title: "Sucessfully Sent !",icon: "success"});                              

  });
    
}
 
function logout(){
    firebase.auth().signOut().then(function() {
       window.location.href = "index.php";
      console.log('Signed Out');
    }, function(error) {
      console.error('Sign Out Error', error);

    });
}

</script>

