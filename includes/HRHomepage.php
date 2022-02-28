<!DOCTYPE html>
<html  lang="en">
<head>
<title>Human Resources Page</title>
 <?php include 'includes/header.php'?>
   <link rel="stylesheet" href="css/alert.css">
  <script type="text/javascript" src="gulpfile.js"></script>
</head>
<body>

<style type="text/css">
  .btn-circle.btn-lg {
  width: 45px;
  height: 45px;
  padding: 13px 14px;
  font-size: 24px;
  line-height: 2;
  border-radius: 30px;
}
tbody
{
    overflow:scroll;
}
 .modal-backdrop {

    display: none;    
} 
  #cancel{

    display: none;
  }

  #cancel2{

    display: none;
  }
  #setcanceldepartment{

    display: none;
  }
 
 #setcancelposition{

    display: none;
  }
  #setcancelbranch{

    display: none;
  }
   
  .badge {
  width: 0px;
  height: 0px;
  text-align: center;
  padding: 10px   10px;
  border-radius: 10px;
}
.glyphicon.glyphicon-bell {
    font-size: 15.9px;
    text-align: center;
   
}
.notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
    -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
    box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);

}
.notice-sm {
    padding: 10px;
    font-size: 80%;
}
.notice-lg {
    padding: 35px;
    font-size: large;
}
.notice-success {
    border-color: #80D651;
}
.notice-success>strong {
    color: #80D651;
}
.notice-info {
    border-color: #45ABCD;
}
.notice-info>strong {
    color: #45ABCD;
}
.notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
.notice-danger {
    border-color: #d73814;
}
.notice-danger>strong {
    color: #d73814;
}
#table-wrapper {
  position:relative;
}
#table-scroll {
  height:150px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width:100%;

}
#table-wrapper table * {
  background:yellow;
  color:black;
}
#table-wrapper table thead th .text {
  position:absolute;   
  top:-20px;
  z-index:2;
  height:20px;
  width:35%;
  border:1px solid red;
}
</style>
<div class="container-fluid">

  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 230px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">
        <li class="active"><a href="companydashboard.php" class="aqua-hover" style="color:#fff ; padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Customize</a></li>
        <li><a href="companyaddemployee.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>
        <li><a href="companyemployeerecord.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee Record</a></li>
        <li><a href="leaveapplication.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon-inbox"><i  class="glyphicon glyphicon-bell">
          <span class="badge badge-warning" id="badge1"style="margin-left:-20px;font-size:11.7px;margin-top:-15px">
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>

           </i>      
         </span>Leave Request
        </a>
        </li>
  
        <li><a href="CompanyHR_Report.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class=" fa fa-area-chart"></i></span>Analytical Report</a></li>
        <li><a href="CompanyHR_Holiday_Calendar.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="glyphicon glyphicon-calendar"></i></span>View Calendar's Holiday</a></li>
        <li ><a href="companybillingaccount.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="fa fa-paypal"></i></span>Subscription Payment</a></li>
      </ul><br>
    </div>
    <br>
    <br>
    <div class="col-sm-10 " style="float: right;background-color: #fff;margin-left: 10px;">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1150px;margin-left: 231px;background-color: white">
        <div class="container " style="width:auto;float: left;margin-top: 10px">
          <h5><b>Customization </b></h5>
                <b id="fname"></b> 
        </div>
       <input type="text" class=" form-control hidden"   id="userKey" style="width: 250px">
      <input type="text" class=" form-control hidden"   id="userid" style="width: 250px">
    　 <input type="text" class=" form-control hidden"   id="comuserskey" style="width: 250px">
      <input type="text" class=" form-control hidden"   id="photourl" style="width: 250px">
        <!--top navbar/ right side-->
        <div class="dropdown  loggedin-div" id="user_div"style="float: right;top:15px;margin-right: 100px"> 
           <img src="images/icon_user.png" id="profile" style="height: 30px; width: 30px"class="image_upload_preview">
            <b id="user_para"></b>  
           <a class=" lightgray-hover dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 10px; font-family:'Roboto';">        
            <span class="caret"></span></a>
              <ul class="dropdown-menu" style="margin-left:100px;">
               <li><a data-toggle="modal" href="#myModal"><span class="design icon_edit" style="padding-bottom: 9px;top: 3px"></span>Edit</a></li>
                <li><a onclick="logout()"><span class="design icon_out" style="padding-bottom: 9px;top: 3px"></span>Logout</a></li>
       </div>
      </div>

      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px"id="mydiv">
        <div class="col-10" style="padding-top: 45px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()"style="width: 1500px;margin-right: 20px">
        </div>
      </div>

  <div class="row">
      <div class="col-sm-12">
          <div class="well" style="height: auto;">
            <div class="container" style="padding-right: 15px;width: 910px;border-bottom: 2px solid #ccc;width: auto">
            <h5 style="float: left;"><b>Set Company Force Leave</b></h5>
                  <p style="color: #ff0000;padding-top: 20px;float: right;margin-top: -20px">* enabled to Use Force Leave *</p>
               <label class="switch" style="float: right;height: 20px;width: 35px;margin-right: 10px" id="switchlabel" >
                  <input type="checkbox" id="checkforce"  name="checkforce">
                  <span class="slider round"></span>
              </label>
            </div>
      </div>
    </div>
</div>
      <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="height: auto; "id="table-scroll">
            <div class="container" style="padding-right: 15px;width: 950px;border-bottom: 2px solid #ccc;width: auto">
            <h5 style="float: left;"><b>Customize Company Leave Type</b></h5>

               <label class="switch" style="float: right;height: 20px;width: 35px;">
                      <input type="checkbox" id="check">

                  <span class="slider round"></span>
              </label>
              <script>
                $(document).ready(function(){
                  $("#check").click(function(){
                    $("#contactForm").toggle();
                  });
                });
                </script>
            </div>
            <div class="form-group" style="padding-left: 20px; padding-top: 26px;float: right;">
                <button type="submit"  style="line-height: 1;font-size: 10px" name="add"name="addleave" id="addleave" class="btn btn-gray btn-hover-lightgray btn-sm" style="line-height: 1"onclick="hulla.send('Successfully Add', 'success')" >Add</button> 
                 <button id="cancel" class="btn btn-gray btn-danger btn-hover-lightgray btn-sm" style="line-height: 1;font-size: 10px" name="add">Cancel</button> 
        
              </div>
            <form class="form-inline" id="contactForm"  style="padding-left: 18px;padding-top: 25px" method="post" >

              <div class="form-group" style="padding-right: 10px">
                  <p>Leave Description</p>
                <input type="text" class="form-control" name="leavetype"required placeholder="Leave Type" id="leavetype" >
              </div>
              <div class="form-group" style="padding-right: 6px">
                <p>Number of Days</p>
                <div style="padding-left: 20px">
                  <input type="Number" class="form-control"  style="width: 65px" name="numberofdays" required placeholder="0" id="numberofdays">
                </div>
              </div>
              <div class="form-group" style="padding-right: 10px">  
                <p style="padding-left: 100px">Duration</p>
                <div >
                  <label class="checkbox-inline"><input type="checkbox" name="ids1" value="Half Day" id="halfday">Half Day</label>
                  <label class="checkbox-inline"><input type="checkbox"  name="ids2" value="Full Day" id="fullday">Full Day</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ids3" value="Multiple Days" id="multipe">Multiple Days</label>
               
                </div>
              </div>
              <div class="form-group">
                <p style="padding-left: 30px">Requirement/s</p>
                <textarea class="form-control" rows="5" style="height: 26px" placeholder="Requirement/s"id="requirement"></textarea>
              </div>
              <div class="form-group" style="padding-right: 6px">
                <p>Minimum Day/s Hours</p>
                <div style="padding-left: 20px">
                  <input type="Number" class="form-control"  style="width: 65px" name="requiredhours" required placeholder="0" id="requiredhours">
                </div>
              </div>
              <div class="form-group" style="margin-left: 30px">

               <p style="padding-left: 40px;">Apply Before</p>
                <select class="form-control" rows="5"  style="height: 26px" placeholder="Note/s"id="notesme">
                  <option disabled selected>Select Number of Days</option>
                        <option >1 </option>
                        <option >2 </option>
                        <option >3 </option>
                        <option >4 </option>
                        <option >5 </option>
                        <option >6 </option>
                        <option >7 </option>
                        <option >8 </option>
                        <option >9 </option>
                        <option >10 </option> 
                        <option >11 </option>
                        <option >12 </option>
                        <option >13 </option>
                        <option >14 </option>
                        <option >15 </option>
                        <option >16 </option>
                        <option >17 </option>
                        <option >18 </option>
                        <option >19 </option>
                        <option >20</option>
                        <option >21 </option>
                        <option >22 </option> 
                        <option >23 </option>
                        <option >24 </option>
                        <option >25</option>
                        <option >26 </option>
                        <option >27 </option> 
                        <option >28 </option>
                        <option >29 </option>
                        <option >30 </option>
                        <option >31 </option>
                   </select>
              </div>
              <div class="form-group"style="margin-left: 30px">
                        <p>Year</p>
                        <select id="selectmonth" class="form-control" name="gender" style="height: 28px" required>
                        <option disabled selected>------Month------</option>
                        <option >1</option>
                        <option >2</option>
                        <option >3</option>
                        <option >4</option>
                        <option >5</option>
                        <option >6</option>
                        <option >7</option>
                        <option >8</option>
                        <option >9</option>
                        <option >10</option> 
                        <option >11</option>
                        <option >12</option>
                      </select>
              </div>
              <div class="form-group" style="margin-top: 42px;margin-left:10px">
               
              <p style="color: #ff0000;padding-top: 20px;float: right;margin-top: -20px">Convert to Cash</p>
               <label class="switch" style="float: right;height: 20px;width: 35px;margin-right: 10px" id="switchlabel" >
                  <input type="checkbox" id="converttocash" >
                  <span class="slider round"></span>
              </label>
            </div><br>
             <div class="form-group" style="margin-top: -30px;margin-right:1100px;float: right; ">   
              <p style="color: #ff0000;padding-top: 20px;float: right;margin-top: -20px">Retirement Benefits</p>
               <label class="switch" style="float: right;height: 20px;width: 35px;margin-right: 10px" id="switchlabel" >
                  <input type="checkbox" id="RetirementBenefits" >
                  <span class="slider round"></span>
              </label>
            </div>

            </form>
           <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
              <button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message"></span>
            </div>
            <div style="position:relative;">
             <table class="table table-hover" id="table1"style="table-layout: auto; overflow-y: auto;">
              <thead > 
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="font-size: 12px;text-align: center">Leave Description</th>
                  <th style="font-size: 12px;text-align: center">Days</th>
                  <th style="font-size: 12px;text-align: center">Duration</th>
                  <th style="font-size: 12px;text-align: center">Requirements</th>
                  <th style="font-size: 12px;text-align: center">Notes</th>
                  <th style="font-size: 12px;text-align: center">Month</th>
                  <th style="font-size: 12px;text-align: center">Require Minimum Day/s/Hour</th>
                  <th style="font-size: 12px;text-align: center">Convert to Cash</th>
                  <th style="font-size: 12px;text-align: center">Add to Retirement Benefits</th>
                  <th style="font-size: 12px;text-align: center">Edit</th>
                  <th style="font-size: 12px;text-align: center">Delete</th>
                  <th style="font-size: 12px"></th>
                  <th style="font-size: 12px"></th>
                </tr>
            </thead>
            <tbody id="tbody"style="overflow:scroll;height:100px;" ></tbody>

      </table>
            </div>

    </div>
  </div>
</div>
   <script>

   $(document).ready(function() {
     $("#show_hide").click(function () {
         $("#toggle_tst").toggle(100,"easeOutQuint",function(){
        
          });
  });  
  });
   </script>
      <!--Leave types-->
   <div class="row">
        <div class="col-sm-12">
          <div class="well" style="height: auto;">
             <div class="container" style="padding-right: 15px;width: 910px;border-bottom: 2px solid #ccc;width: auto">
            <h5 style="float: left;"><b>Customize Employee Leave Type</b></h5>
                <label class="switch" style="float: right;height: 20px;width: 35px;">
                  <input type="checkbox">
                  <span class="slider round"></span>
              </label>
            </div>
            <form class="form-inline"  style="padding-left: 18px;padding-top: 10px"  id="formleave">

              <div class="form-group" style="padding-right: 10px">
                <p>Leave Description</p>
                <input type="text" class="form-control" required  placeholder="Leave Type" id="employeeleavetype"required>
              </div>
              <div class="form-group" style="padding-right: 6px">
                <p>Number of Days</p>
                <div style="padding-left: 20px">
                  <input type="Number" class="form-control"  style="width: 65px"  id="employeenumberofdays" required placeholder="0" required>
                </div>
              </div>
              <div class="form-group" style="padding-right: 10px">  
                <p style="padding-left: 100px">Duration</p>
                <div >
                  <label class="checkbox-inline"><input type="checkbox" name="ids4" value="Half Day" id="halfday1">Half Day</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ids5" value="Full Day" id="fullday1">Full Day</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ids6" value="Multiple Days" id="mul" >Multiple Days</label>

                </div>

              </div>
                  <div class="form-group">
                    <p style="padding-left: 30px">Employee Position</p>
                    <input type="text" class="form-control" name="position"required placeholder="Employee Position" style="width: 150px" id="employeepositon"required>
              </div>

              <div class="form-group"style="margin-left: 20px">
  
                <p style="padding-left: 30px">Requirement/s</p>

                <textarea class="form-control" rows="5" name="requirement" style="height: 35px;width: 250px" placeholder="Requirement/s" id="employeerequirement" required></textarea>
              </div>
              <div class="form-group" style="padding-right: 6px">
                <p>Minimum Day/s Hours</p>
                <div style="padding-left: 20px">
                  <input type="Number" class="form-control"  style="width: 65px" name="requiredhours" required placeholder="0" id="requiredhours1">
                </div>
              </div>
               <div class="form-group" style="margin-left: 30px">
                <p style="padding-left: 40px;">Apply Before</p>
                <select class="form-control" rows="5"  style="height: 26px" placeholder="Note/s"id="notesme1">
                  <option disabled selected>Select Number of Days</option>
                        <option >1 </option>
                        <option >2 </option>
                        <option >3 </option>
                        <option >4 </option>
                        <option >5 </option>
                        <option >6 </option>
                        <option >7 </option>
                        <option >8 </option>
                        <option >9 </option>
                        <option >10 </option> 
                        <option >11 </option>
                        <option >12 </option>
                        <option >13 </option>
                        <option >14 </option>
                        <option >15 </option>
                        <option >16 </option>
                        <option >17 </option>
                        <option >18 </option>
                        <option >19 </option>
                        <option >20</option>
                        <option >21 </option>
                        <option >22 </option> 
                        <option >23 </option>
                        <option >24 </option>
                        <option >25</option>
                        <option >26 </option>
                        <option >27 </option> 
                        <option >28 </option>
                        <option >29 </option>
                        <option >30 </option>
                        <option >31 </option>
                   </select>
              </div>
              <div class="form-group"style="margin-left: 30px">
                        <p>Year</p>
                        <select id="selectmonth1" class="form-control"  style="height: 28px" required>
                        <option disabled selected>------Month------</option>
                        <option >1</option>
                        <option >2</option>
                        <option >3</option>
                        <option >4</option>
                        <option >5</option>
                        <option >6</option>
                        <option >7</option>
                        <option >8</option>
                        <option >9</option>
                        <option >10</option> 
                        <option >11</option>
                        <option >12</option>
             
                 

                      </select>
              </div>
              <div class="form-group" style="margin-top: 10px;margin-left:10px">
               
              <p style="color: #ff0000;padding-top: 20px;float: right;margin-top: -20px">Convert to Cash</p>
               <label class="switch" style="float: right;height: 20px;width: 35px;margin-right: 10px" id="switchlabel" >
                  <input type="checkbox" id="converttocash1" >
                  <span class="slider round"></span>
              </label>
            </div>
             <div class="form-group" style="margin-top: 10px;margin-left:10px">   
              <p style="color: #ff0000;padding-top: 20px;float: right;margin-top: -20px">Add to Retirement Benefits</p>
               <label class="switch" style="float: right;height: 20px;width: 35px;margin-right: 10px" id="switchlabel" >
                  <input type="checkbox" id="RetirementBenefits1" >
                  <span class="slider round"></span>
              </label>
            </div>
              <div class="form-group"style="margin-left: 55px">
                 <button type="submit" class="btn btn-gray btn-hover-lightgray btn-sm" style="line-height: 1;font-size: 10px;float: right;" name="addleave1" id="addleave1" onclick="hulla.send('Successfully Add', 'success')">Add</button>
                  <button id="cancel2" class="btn btn-gray btn-danger btn-hover-lightgray btn-sm" style="line-height: 1;font-size: 10px;float: right;"  onclick="hulla.send('Successfully Cancel', 'info')">Cancel</button>
             </div>
            </form>
             <div id="alert2" class="alert alert-info text-center" style="margin-top:20px; display:none;">
              <button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message2"></span>
            </div>
            
           <table class="table table-hover" style="table-layout: auto; overflow-y: auto;" id="table2">
              <thead > 
                <tr>
                  <th></th>

                  <th style="font-size: 15px;text-align: center">Leave Description</th>
                  <th style="font-size: 15px;text-align: center">Days</th>
                  <th style="font-size: 15px;text-align: center">Duration</th>
                  <th style="font-size: 15px;text-align: center">Requirements</th>
                  <th style="font-size: 15px;text-align: center">Position</th>
                  <th style="font-size: 12px;text-align: center">Notes</th>
                  <th style="font-size: 12px;text-align: center">Month</th>
                  <th style="font-size: 12px;text-align: center">Require Minimum Day/s/Hour</th>
                  <th style="font-size: 12px;text-align: center">Convert to Cash</th>
                  <th style="font-size: 12px;text-align: center">Add to Retirement Benefits</th>
                  <th style="font-size: 15px;text-align: center">Edit</th>
                  <th style="font-size: 15px;text-align: center">Delete</th>
                  <th style="font-size: 15px"></th>
                </tr>
            </thead>
            <tbody style="font-size: " ></tbody>
          </table>
</div>

</div>
<script type="text/javascript">
  function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("tbody");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
} 
</script>
<div class="col-sm-12">
      <div class="row">
        <div class="col-sm-8">
          <div class="well" style="height: 200px;">
      <div class="container" style="padding-right: 15px;width: 310px;border-bottom: 2px solid #ccc;width: auto">
            <h5 style="float: left;"><b>List of Approver</b></h5> 

            </div>
             <div id="alert3" class="alert alert-info text-center" style="margin-top:20px; display:none;">
              <button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message3"></span>
            </div>
             <table class="table table-hover"  id="table3"style="height: 100px;table-layout: auto; overflow-y: auto; overflow:scroll;
    height:100px">
                <thead>
                    <tr>

                      <th style="font-size: 15px;text-align: center">FirstName</th> 
                      <th style="font-size: 15px;text-align: center">Middle Initial</th>
                      <th style="font-size: 15px;text-align: center">LastName</th>
                      <th style="font-size: 15px;text-align: center">Position</th>
                      <th></th>
                    </tr>
               </thead>
              <tbody id="tbody1">  </tbody> 
           </table>    
        </div>
      </div>
      
        <div class="col-sm-4"style="width: 525px">
          <div class="well" style="height: 250px">
            <div class="container" style="width: 250px;border-bottom: 2px solid #ccc;width: auto;">
            <h5 style="float: left;"><b>Holidays and Events</b></h5>
 
            </div>
            <form class="form-inline" style="padding-left: 18px;padding-top: 10px" method="post">
              <div class="form-group">
                <p>Date/ Month/ Year   <button type="submit" class="btn btn-gray btn-hover-lightgray btn-sm"  name="addevent"style="line-height: 1;font-size: 10px;font-size: 10px;margin-left:35px " id="addcompanyholiday">Add</button></p>              
                <p style="padding-left: 2px">Start   <input type="date" class="form-control-edit" id="startholiday" style="width: 150px ;height: 30px;padding-top: -20px;margin-left: 30px"  required> &nbsp &nbsp</p>
               
               <p style="padding-left: 2px">End <input type="date" class="form-control-edit" id="endholiday" style="width: 150px ;height: 30px;padding-top: -20px;margin-left: 35px" required> &nbsp &nbsp </p>
                
  
              </div>
              <div class="form-group" style="margin-left: 30px">

               <p style="padding-left: 40px;">Holiday Type</p>
                <select class="form-control" rows="5"  style="height: 26px" placeholder="Note/s"id="holidaytype">
                      <option disabled selected>------Holiday Type------</option>
                      <option >Non-working</option>
                      <option >Working</option>
                 </select>
              </div>
              <div class="form-group" style="padding-top: 2px">
                <textarea class="form-control-edit" name="eventdescription" rows="5" id="description" style="width: 230px" required placeholder="Description"></textarea>
              </div>
            </form>
          </div>
      </div>
    </div>
</div>
<div class="col-sm-12">
      <div class="row">
        <div class="col-sm-8">
          <div class="well" style="height: auto;width: 900px">
                        <div class="container" style="padding-right: 15px;width: 510px;border-bottom: 2px solid #ccc;width: auto">
            <h5 style="float: left;"><b>Company Department</b></h5> 

            </div>
                <div class="form-group" style="padding-right: 20px;margin-top: 10px;margin-left: 20px">
                  <p style="padding-left: 30px">Set Department</p>
            <input type="text" class="form-control" required  placeholder="Department" id="setdepartement" style="width: 200px;margin-right: 20px" required>
              <button id="setcanceldepartment" class="btn btn-gray btn-danger btn-hover-lightgray btn-sm" style="line-height: 1;font-size: 10px;margin-left: 260px;margin-top: -35px" onclick="hulla.send('Successfully Cancel', 'info')">Cancel</button>  
                <button type="submit" class="btn btn-gray btn-hover-lightgray btn-sm"  name="addevent"style="line-height: 1;font-size: 10px;float: right;margin-top: -38px;margin-right:25px" id="adddepartment">Add</button>
            </div>
                <table class="table table-hover"  id="setempdeparment"style="table-layout: auto; overflow-y: auto;">
                  <thead>
                    <tr>
                             <th style="font-size: 15px;text-align: center">Department List</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                    </tr>
                  </thead>
                  <tbody id="tbody1">  </tbody>
                </table>  
          </div>
        </div>

 
        <div class="col-sm-4" style="margin-left: -130px" >
          <div class="well" style="height: auto;width: 625px">
            <div class="container" style="width: 350px;border-bottom: 2px solid #ccc;width: auto">
            <h5 style="float: left;"><b>Employee's Position</b></h5>
            </div>
            <div class="form-group" style="padding-right: 20px;margin-top: 10px;margin-left: 20px">
                  <p style="padding-left: 30px">Set Position</p>
            <input type="text" class="form-control" required  placeholder="Position" id="setposition" style="width: 200px;margin-right: 20px" required>
                   <button id="setcancelposition" class="btn btn-gray btn-danger btn-hover-lightgray btn-sm" style="line-height: 1;font-size: 10px;margin-left: 230px;margin-top: -40px" onclick="hulla.send('Successfully Cancel', 'info')">Cancel</button>   
                <button type="submit" class="btn btn-gray btn-hover-lightgray btn-sm"  name="addevent"style="line-height: 1;font-size: 10px;float: right;margin-top: -38px;margin-left: 10px" id="addposition">Add</button> 
            </div>
             <table class="table table-hover"  id="setempposition"style="table-layout: auto; overflow-y: auto;">
                <thead>
                    <tr>
                      <th style="font-size: 15px;text-align: center"> <b>Position List</b></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                    </tr>
               </thead>
              <tbody id="tbody1">  </tbody> 
           </table> 
          </div>
      </div>
    </div>
</div>
<div class="col-sm-12">
      <div class="row">
        <div class="col-sm-8">
          <div class="well" style="height: auto;width: 1550px">
                        <div class="container" style="padding-right: 15px;width: 510px;border-bottom: 2px solid #ccc;width: auto">
            <h5 style="float: left;"><b>Company Branch</b></h5> 

            </div>
                <div class="form-group" style="padding-right: 20px;margin-top: 10px;margin-left: 20px">
                  <p style="padding-left: 30px">Set Branch</p>
               <input type="text" class="form-control" required  placeholder="Department" id="setbranch" style="width: 200px;margin-right: 20px" required>
               <button id="setcancelbranch" class="btn btn-gray btn-danger btn-hover-lightgray btn-sm" style="line-height: 1;font-size: 10px;margin-left: 260px;margin-top: -40px" onclick="hulla.send('Successfully Cancel', 'info')">Cancel</button>  
                <button type="submit" class="btn btn-gray btn-hover-lightgray btn-sm"  name="addevent"style="line-height: 1;font-size: 10px;float: right;margin-top: -38px;margin-right:25px" id="addbranch">Add</button>
            </div>
                <table class="table table-hover"  id="setempbranch"style="table-layout: auto; overflow-y: auto;">
                  <thead>
                    <tr>
                             <th style="font-size: 15px;text-align: center">Branch List</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                    </tr>
                  </thead>
                  <tbody id="tbody1">  </tbody>
                </table>  
          </div>
        </div>


    </div>
</div>
    <?php
require_once('bdd.php');


$sql = "SELECT e.id, e.title,e.Company_Id, e.start, e.end, e.color, c.Company_Id,c.Username FROM events e join company c on e.Company_Id = c.Company_Id    ";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();


$sql1 = "SELECT id, title, start, end, color FROM holiday";
$req1 = $bdd->prepare($sql1);
$req1->execute();
$events1 = $req1->fetchAll();

$sql2 = "SELECT *  FROM apply_leave_request a join Employee e on a.Applied_Employee_Id = e.Employee_Id join company c on e.Company_Id = c.Company_Id WHERE   and a.Leave_Status ='Approved'";
$req2 = $bdd->prepare($sql2);
$req2->execute();
$events2 = $req2->fetchAll();

?>

<style>
  
  #calendar {
    max-width: ;
    margin-bottom: 100px;
  }
    #calendar .p{
  color: white; 
  }
  .col-centered{
    float: none;
    margin: 0 auto;
    height: 100px;
  }
   </style>
   <!--Calendar Events--->
   <div class="col-sm-12">
     
 <div class="row" style="height:500px">
      <div class="col-sm-12">
         <div class="well" style="height: 1250px;">
            <div class="month">      
        
              <ul id="calendar"></ul>
        
           </textarea>
            </div> 

          </div>
        </div>
    </div>


   </div>

<!-- <a href="#mydiv"type="button" class="btn button  btn-circle navbar-fixed-bottom btn-lg "  style="font-size: 12px;float: right;margin-top: 200px;margin-left: 1170px;background-color: #00cc99 ;opacity: 0.6;"><i class="glyphicon glyphicon-chevron-up" id="lastclicked"></i></a>  -->
 


<?php require_once 'ModalEditCompanyProfile.php'?>
    <?php
require_once('bdd.php');

$sql = "SELECT * FROM events e join company c on e.Company_Id = c.Company_Id join employee em  on e.Company_Id = em.Company_I";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();

$sql1 = "SELECT id, title, start, end, color FROM holiday";

$req1 = $bdd->prepare($sql1);
$req1->execute();

$events1 = $req1->fetchAll();
?>
<!--  -->
</body>

</html>
  <!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
  <script src="./security.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/jQuery 3.3.1.js" ></script>
<script src="js/jQuery-3.2.0.js" ></script>
<script type="text/javascript" src="js/jquery.form.js" ></script>
<script src="dist/sweetalert.min.js"></script>
<script type="text/javascript" src="dist/sweetalert.js" ></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js1/jQuery 3.3.1.js" ></script>
<script src="js1/jQuery-3.2.0.js" ></script>
<script type="text/javascript" src="js/jquery.form.js" ></script>
<script src="dist/sweetalert.min.js"></script>
<script type="text/javascript" src="dist/sweetalert.js" ></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js1/init.js"></script>
<script src="js1/materialize.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/jQuery 3.3.1.js" ></script>
<script type="text/javascript" src="js/jquery.form.js" ></script>
<script src="dist/sweetalert.min.js"></script>
<script type="text/javascript" src="dist/sweetalert.js" ></script>
<script src="js/jQuery 3.3.1.js"></script>
 <!-- /.container -->
<script src="Chart.min.js"></script>
    <!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>
<script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
  
  <!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
  <script src="js/hullabaloo.js"></script>

  <script type="text/javascript">
    var hulla = new hullabaloo();

  </script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

 <?php include 'includes/script.php'?>

  <script>

  $(document).ready(function() {
var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();
function myDateFormatter (dateObject) {
    var d = new Date(dateObject);
    var day = d.getDate();
    var month = d.getMonth() + 1;
    var year = d.getFullYear();
    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }
    var date = day + "-" + month + "-" + year;
    
    return date;
};
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate:new Date(),
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      select: function(start, end) {
        
        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD '));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
        $('#ModalAdd').modal('show');
      },
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          var eventstart = event.start;
          var eventend   = event.end;
          var startevent = moment(eventstart).format('YYYY-MM-DD');
          var endevent   = moment(eventend).format('YYYY-MM-DD');
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #updatetitle').val(event.title);
          $('#ModalEdit #updatecolor').val(event.color);
          $('#ModalEdit #updatestart').val(startevent);
          $('#ModalEdit #updateend').val(endevent);

          $('#ModalEdit').modal('show');
        });
      },
        eventMouseover: function (data, event, view) {
        var sd=data.start.format()
            sd=myDateFormatter(sd)
        var ed=data.end.format()
            ed=myDateFormatter(ed)
            tooltip = '<div class="tooltiptopicevent" style="width:auto;height:auto;background:#f2f3f5;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;  line-height: 200%;">' +  'Holiday Type: ' + ': ' + data.description +'</br>' + 'Start: ' + ': ' + sd+ '</br>' +'End: ' + ': ' + ed+ '</br>' +'</div>';


            $("body").append(tooltip);
            $(this).mouseover(function (e) {
                $(this).css('z-index', 10000);
                $('.tooltiptopicevent').fadeIn('500');
                $('.tooltiptopicevent').fadeTo('10', 1.9);
            }).mousemove(function (e) {
                $('.tooltiptopicevent').css('top', e.pageY + 10);
                $('.tooltiptopicevent').css('left', e.pageX + 20);
            });


        },
        eventMouseout: function (data, event, view) {
            $(this).css('z-index', 8);

            $('.tooltiptopicevent').remove();

        },
        dayClick: function () {
            tooltip.hide()
        },
        eventResizeStart: function () {
            tooltip.hide()
        },
        eventDragStart: function () {
            tooltip.hide()
        },
        viewDisplay: function () {
            tooltip.hide()
        },      
   events: [
      <?php foreach($events as $event): 
      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
        },
      <?php endforeach; ?>

     <?php foreach($events1 as $event): 
      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
        },
      <?php endforeach; ?>
  

      ],

    });
    
    function edit(event){
      start = event.start.format('YYYY-MM-DD HH:mm:ss');
      if(event.end){
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
      }else{
        end = start;
      }
      
      id =  event.id;
      
      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;
      
      $.ajax({
       url: 'editEventDate.php',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
          if(rep == 'OK'){
            alert('Saved');
          }else{
            alert('Could not be saved. try again.'); 
          }
        }
      });
    }
    
  });


</script>
