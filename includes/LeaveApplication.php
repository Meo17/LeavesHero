<!DOCTYPE html>
<html  lang="en">
<head>
  <title>Employee Leaverequest </title>
 <?php include 'includes/empheader.php'?>
  <link rel="stylesheet" href="css/alert.css">
  <script type="text/javascript" src="gulpfile.js"></script>

</head>
<body id="body">
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 211px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

        <li ><a href="companyemployeedashboard.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-home"></span>Home</a></li>   
          <li  ><a href="employeeleavebalance.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub "></span>Leave Balance</a></li>
         <li  id="leaverequestnav"class="active" ><a href="EmployeeLeaveApplication.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay aqua-hover"></span>
          Leave Request<span class="badge badge-warning hidden" id="badge1"style="margin-left:2px;font-size:11.7px;margin-top:-9px" >
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>
          </a></li>
          <li ><a href="EmployeeLeaveRecord.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-th-list"></span>Leave Record</a></li>
          <li  ><a href="EmployeeCalendar.php" class="aqua-hover " style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-calendar "></span>Calendar</a></li>
      </ul><br>
    </div>
    <br>
   <div class="col-sm-10 " style="float: right;background-color: #fff;margin-left: 10px;">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1700px;margin-left: 211px;background-color: white">
        <div class="container " style="width:auto;float: left;margin-top: 10px">
   
          <h5><b id="companyname"> </b></h5>
         
        </div>
              <!---hiden input form- userkay kay ang ni sign in nga company---->
             <input type="text" class=" form-control hidden"   id="userKey" style="width: 250px">
             <input type="text" class=" form-control hidden"    id="userid" style="width: 250px">
             <input type="text" class=" form-control hidden"   id="empkey" style="width: 250px">
             <input type="text" class=" form-control hidden"   id="fullname1" style="width: 250px">
             <input type="text" class=" form-control hidden"   id="refuserkey" style="width: 250px">
             <input type="text" class=" form-control hidden"   id="photourl" style="width: 250px"  >  
             <input type="text" class=" form-control hidden"  id="empuserskey" style="width: 250px"  >  
             <input type="hidden" id="empid">
              <input type="hidden" id="count1">
              <input type="hidden" id="email_id">
          
       
      
        <!--top navbar/ right side-->
         
        <div class="dropdown  loggedin-div" id="user_div"style="float: right;top:15px;margin-right: 100px">
           <img id="profile" src="images/icon_user.png" style="height: 30px; width: 30px"class="image_upload_preview">
            <b id="fullname"></b>  
              <!--    <b id="fname"></b> 
             <b id="companyname"></b> -->
                  
          <a class=" lightgray-hover dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 10px; font-family:'Roboto';">  
                    
            <span class="caret"></span></a>
              <ul class="dropdown-menu" style="margin-left:100px;">
                <li><a onclick="logout()"><span class="design icon_out" style="padding-bottom: 9px;top: 3px"></span>Logout</a></li>
             </ul>
        </div>
      </div>

   

<?php require_once 'modalemployeerecord.php'?>

      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px"id="mydiv">
        <div class="col-10" style="padding-top: 45px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()"style="width: 1500px;margin-right: 20px">
        </div>
      </div>
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<div id="alertnotification">
  
</div>
<!-- <div class="alert">
  <span class="closebtn">&times;</span>  
  <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
</div>

<div class="alert success">
  <span class="closebtn">&times;</span>  
  <strong>Success!</strong> Indicates a successful or positive action.
</div>

<div class="alert info">
  <span class="closebtn">&times;</span>  
  <strong>Info!</strong> Indicates a neutral informative change or action.
</div>

<div class="alert warning">
  <span class="closebtn">&times;</span>  
  <strong>Warning!</strong> Indicates a warning that might need attention.
</div> -->

      <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="padding-bottom: 50px"> 

            <div class="container" style="width: auto;">
                <div class="container" style="padding-right: 15px;width: 950px;border-bottom: 2px solid #ccc;width: auto">
              <h5 style="float: left;"><b>Employee's Leave</b>   </h5><br>
            </div>
               <table class="table table-hover" id="employeeleaveRequest" style="table-layout: fixed;overflow-x: auto;width:1450px;">
              
              <thead>
                 <tr>
                  <th style="font-size: 12px;text-align: center">Employee ID</th>
                  <th style="font-size: 12px;text-align: center">Full Name</th>
                  <th style="font-size: 12px;text-align: center">Leave Description</th>
                  <th style="font-size: 12px;text-align: center">Duration</th>
                  <th style="font-size: 12px;text-align: center">Days</th>
                  <th style="font-size: 12px;text-align: center">Start</th>
                  <th style="font-size: 12px;text-align: center">End</th>
                  <th style="font-size: 12px;text-align: center">Reason</th>
                  <th style="font-size: 12px;text-align: center">Status</th>
                  <th style="font-size: 12px;text-align: center">Action</th>
                </tr>
              </thead>
             <tbody>
            </tbody>
          </table>
        </div>
       </div>
       </div>
      </div>
<style>
 table#employeeleaveRequest tr td .button { display:none;}
  table#employeeleaveRequest tr:hover td .button { display:inline-block;}

/*.tr {
  position: absolute;
  left: 0px;
  top: 0px;
  
}*/
</style>
<!--------------------------------------------------------------- APPROVAL MODAL------------------------------------------------------>
<div class="modal fade" id="viewalldetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 350px; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><b><h4 class="modal-title" id="redesc" style="text-transform: bold"></h4></b></center>
                 <input type="hidden" style="width: 150px;" id="leaverequestid">

              <input type="hidden" style="width: 150px" id="leavedesc">
            </div>
            <form method="post">
            <div class="modal-body" style="height: 900px; height: auto;">  
                  <h5 style="text-align:center" ><b>Application Form</b></h5>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Applicant</b></h5>
                      </div>
                        <input type="hidden" name="" id="key1">
                        <input type="hidden" name="" id="key2">
                         <input type="hidden" name="" id="updatedateapplied">
                        <input type="hidden" name=""  id="updateleavetype">
                       <div class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                            <p>Name :</p>  <p id="aplicantfullname" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                       </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Emp. ID No :</p>  <p id="empidno" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right:  15px;margin-top:-30px"></p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Annual Leave Info.</b></h5>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Total Days :</p>  <p id="totaldays" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"> Days</p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Consumed Days :</p>  <p id="consumed" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"> 0</p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Available Days :</p>  <p id="availabledays" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">0</p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Details of Events</b></h5>
                      </div>
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Date Applied:</p>  <p id="dateapplied" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Description:</p>  <p id="leavedesciption" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave From:</p>  <p id="leaveform" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>  
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Until:</p>  <p id="leaveuntil" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>  
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Reason:</p>  <p id="reason" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Approver's</b></h5>
                      </div>      
                        <div  class="form-group" id="Approvers"style="padding-top: 10px;width: auto;padding-left:15px"> 
                        </div>
                       </div>                
                       <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Submitted Document/s</b></h5>
                      </div> 
                        <div  class="form-group" id="groupsubmitfile" style="padding-top: 10px;width: auto;padding-left:15px"> 
                           <p>Click file to download</p> 
                           <div class="row" style="height:auto; width: auto;">
                              <div class="col-sm-3" id="subdoct"style="height:auto; width: auto;">
                            
                              </div>
                             

                           </div>
                       </div>
                           <div class="container" style="border-bottom: 2px solid white;width: auto;"> 
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger"  id="Declined" style="float: left;font-size: 10px">Declined</button>
                                  <button type="submit"  class="btn btn-success" name="grantrequest" id="grantrequest" style="font-size: 10px"> Grant</button>
                             </div>
                         </div>                        
            </form>

        </div>
    </div>
</div>
<!-----------------------------------------END MODAL------------------------------------------------------------------->
 <!-------------------------------------------GRANT MODAL------------------------------------------------------------>
 <div class="modal fade" id="grant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width: 300px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"> Approved Leave Request</h4></center>
            </div>
            <form method="post">
            <div class="modal-body">  
              <p class="text-center">Please Click Yes to Continue....</p>

                       <input type="hidden" style="width: 150px;" id="leaverequestid1">
                       <input type="hidden" name="" id="updatedateapplied1">
                        <input type="hidden" name=""  id="updateleavetype1">
            
           </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px">No</button>
                <button type="submit"  class="btn btn-success" name="yestogrant" id="yestogrant" style="font-size: 12px"> Yes</button>
            </div>
        </form>
        </div>
    </div>
</div>    
<!-------------------------------------END MODAL----------------------------------------------------------------------->    <!-------------------------------------------DISAPPROVE MODAL------------------------------------------------------------>
 <div class="modal fade" id="declined" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width: 300px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"> Disapproved Leave Request</h4></center>
            </div>
            <form method="post">
            <div class="modal-body">  
              <p class="text-center">Please Click Yes to Continue....</p>

                    
                       <input type="hidden" style="width: 150px;" id="leaverequestid2">
                        <input type="hidden" name="" id="updatedateapplied2">
                        <input type="hidden" name=""  id="updateleavetype2">
                        <textarea  id="reaseondisapprover" style="width: 270px" placeholder="Reason">
                          
                        </textarea>
            
           </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px">No</button>
                <button type="submit"  class="btn btn-success" name="disapproved"id="disapproved" style="font-size: 12px"> Yes</button>
            </div>
        </form>
        </div>
    </div>
</div>    
<!-------------------------------------END MODAL----------------------------------------------------------------------->    
</body>
</html>

 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/hullabaloo.js"></script>
 <?php include 'includes/script.php'?>
