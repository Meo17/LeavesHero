<!DOCTYPE html>
<html lang="en" >
<head>
  <title>Employee Page</title>
 <?php include 'includes/empheader.php'?>
    <link rel="stylesheet" href="css/alert.css">
  <script type="text/javascript" src="gulpfile.js"></script>
</head>
<body id="body">
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 211px">
      <img class="logo" src="images/logo3.png" style="padding-left: 19px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

        <li ><a href="companyemployeedashboard.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-home"></span>Home</a></li>   
          <li ><a href="employeeleavebalance.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub "></span>Leave Balance</a></li>
         <li  id="leaverequestnav" ><a href="EmployeeLeaveApplication.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay aqua-hover"></span>
          Leave Request<span class="badge badge-warning" id="badge1"style="margin-left:2px;font-size:11.7px;margin-top:-9px">
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>
          </a></li>
          <li  class="active" ><a href="EmployeeLeaveRecord.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-th-list"></span>Leave Record</a></li>
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
             <input type="hidden" class=" form-control "   id="userKey" style="width: 250px">
             <input type="hidden" class=" form-control "   id="userid" style="width: 250px">
             <input type="hidden" class=" form-control "   id="empkey" style="width: 250px">
             <input type="hidden" class=" form-control "   id="fullname1" style="width: 250px">
             <input type="hidden" class=" form-control "   id="refuserkey" style="width: 250px">
             <input type="hidden" class=" form-control "   id="photourl" style="width: 250px"  >  
              <input type="hidden" class=" form-control "  id="empuserskey" style="width: 250px"  >  
              <input type="hidden" class=" form-control "   id="fullname5" style="width: 250px">
              <input type="hidden" id="empid">
              <input type="hidden" id="approverlist">
               <input type="hidden" id="declinedlist">
               <input type="hidden" id="email_id">
               <input type="hidden" name="date1">
               <input type="hidden" name="date2">
        <!--top navbar/ right side-->
         
        <div class="dropdown  loggedin-div" id="user_div"style="float: right;top:15px;margin-right: 100px">
           <img src="images/icon_user.png" id="profile" style="height: 30px; width: 30px"class="image_upload_preview">
          <b id="fullname"></b> 
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

    <!--Leave types-->
<div class="row" >
    <div class="col-sm-12"style="height: 900px;">
        <div class="well" style="padding-bottom: 50px"> 
            <div class="container" style="width: auto;height:">
              <ul class="nav nav-tabs">
                  
                  <li class="active"style="width: 50%"><a data-toggle="tab" href="#menu" style="color: black;font-size: 17px;text-align: center"> <i class="fa fa-handshake-o"style="margin-right: 10px"></i><b>Accepted</b></a></li>
                  <li style="width: 50%"><a data-toggle="tab" href="#menu2"style="color: black;font-size: 17px;text-align: center"><i class="fa fa-close" style="margin-right: 10px"></i><b>Declined</b></a></li>
              </ul>

      <div class="tab-content">

        <div id="menu" class="tab-pane fade">
          

         <table class="table table-hover" id="Accepted"style="table-layout: fixed;overflow-x: auto;width:1450px;">
                    <thead>
                      <tr>
                      <th style="font-size: 12px">Leave Type Applied</th>
                      <th style="font-size: 12px">Leave Duration</th>
                      <th style="font-size: 12px">Total Leave Day Applied</th>
                      <th style="font-size: 12px">Date Start Leave Applied</th>
                      <th style="font-size: 12px">Date End Leave Applied</th>
                     <!--  <th style="font-size: 12px">Employee Approver Name</th>  -->
                      <th style="font-size: 12px">Date Time Approved</th>
                      <th style="font-size: 12px">Leave Status</th>
                      </tr>
                  </thead>
                  <tbody> </tbody>
          </table>
        </div>
        <div id="menu2" class="tab-pane fade">
     
                 <table class="table table-hover" id="Rejected" style="table-layout: fixed;overflow-x: auto;width:1450px;">
                <thead>
                   <tr>
                      <th style="font-size: 12px">Leave Type Applied</th>
                      <th style="font-size: 12px">Leave Duration</th>
                      <th style="font-size: 12px">Total Leave Day Applied</th>
                      <th style="font-size: 12px">Date Start Leave Applied</th>
                      <th style="font-size: 12px">Date End Leave Applied</th>
                     <!--  <th style="font-size: 12px">Employee Approver Name</th>  -->
                      <th style="font-size: 12px">Date Time Approved</th>
                      <th style="font-size: 12px">Leave Status</th>
                  </tr>
                </thead>
                <tbody></tbody>
             </table>
           </div>
        <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 300px">
               <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Delete Leave</h4></center>
                      </div>
                    <div class="modal-body">  
                      <p class="text-center">Are you sure you want to Delete</p>
                      <h5 class="text-center fullname"></h5>
                              <input type="hidden" name="bookId1" value="" id="deletekey"  />

                      </div>
                    <div class="modal-footer">
                        <button type="button" style="font-size:12px"class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                        <button type="button" class="btn-remove-key btn btn-danger yes3" id="yes" data-key="key" name="updatestatus"style="font-size:12px "onclick="hulla.send('Successfully Deleted', 'success')"><span class="glyphicon glyphicon-trash"></span>Yes</button>
                    </div>
                   

                </div>
                   </form>
            </div>
        </div>


        <div class="modal bounceIn" id="reapplymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px">
        <div class="modal-content">
            <div class="modal-header" style="height:55px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h3 class="modal-title LeaveType"id="LeaveDescription1"style="padding-top:-20px"></h3></center>
         </div>
                 
                       
         <div class="modal-body" style="height: 900px; height: auto;"> 
              <form   enctype="multipart/form-data" method="POST">
                     <input type="hidden"   id="reapplykey" >  
                    <input type="hidden"    id="emp_id" > 
                    <input type="hidden"   id="appleavetype">  
                    <input type="hidden"   id="applieddate" >  
                    <input type="hidden"   id="prevapplieddate" >    
                    <input type="hidden"   id="bal" >  
                                   
<!--                      <input type="hidden"   id="appleavetype1" >
                     <input type="hidden"   id="employeeid1">
                     <input type="hidden"   id="Companyid1">
                     <input type="hidden"   id="applieddate1">
                     <input type="hidden"   id="setleaveday1">  
                     <input type="hidden"   id="empapplyname1">
                     <input type="hidden"   id="uploadfilekey1">
                     <input type="hidden"   id="duplicateuploadfilekey2">
                     <input type="hidden"   id="consumed2">
                    <input type="hidden"    id="availabledays2"> -->
                    <h5 style="text-align:center" ><b>Application Form</b></h5>
                    <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Applicant</b></h5>
                    </div>
                     <div class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                            <p>Name :</p>  <p id="aplicantfullname1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Emp. ID No :</p>  <p id="empidno1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right:  15px;margin-top:-30px"></p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Annual Leave Info.</b></h5>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Total Days :</p>  <p id="totaldays1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"> Days</p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Consumed Days :</p>  <p id="consumed1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"> 0</p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Available Days :</p>  <p id="availabledays1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">0</p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>leave Duration</b></h5>
                      </div> 
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">

                               <input type="hidden" name="" id="halfday"> 
                               <input type="hidden" name="" id="fullday">
                               <input type="hidden" name="" id="multiple">
                              
                        <select id="duration"name="Duration"class="form-control" style="height: 28px;width: 150px"required>
                              
                          </select>
          

                          <p id="consumed" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">0</p>
                       </div> 
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Details of Events</b></h5>
                      </div>
     
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Description:</p>  <p id="leavedesciption2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave From:</p>  <input type="date" id="leavefrom1" placeholder="mm/dd/yyy"style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"required>
                      </div> 
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Until:</p>  <input type="date" id="leaveuntil1"placeholder="mm/dd/yyy"style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"required>
                      </div> 
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Reason:</p>  <textarea id="reason" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></textarea>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Submitted Document/s</b></h5>
                      </div> 
   
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                          <p style="color: red;float: left;" id="requirements" ></p>
                       </div> 
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                       <input id="supportDocs" type="file" class="form-control" name="file" style="width: 300px;margin-top: 10px;padding-bottom:32px" multiple>
                       </div>  
                        <div  class="form-group" id="groupsubmitfile" style="padding-top: 10px;width: auto;padding-left:15px"> 
                           <p>Click file to View</p> 
                           <div class="row" style="height:auto; width: auto;">
                              <div class="col-sm-3" id="subdoct"style="height:auto; width: auto;">
                              </div>
                             

                           </div>
                       </div>

                       <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Select Approver</b></h5>
                      </div> 
                       <div id="selectapprover1"  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                        <label class='checkbox-inline hidden'><input type='checkbox' name='leavecor1' value='leave coordinator'id='apapprover1'>leave coordinator</label>
                       </div> 

                        <div class="container" style="border-bottom: 2px solid white;width: auto;">
                        
                        <button  name="apply" type="button" id="sendapply1"class="btn btn-default"style="float: right;font-size:10px"><span style="margin-right: 10px"class="glyphicon glyphicon-send"　></span> Submit </button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;font-size: 10px"><span style="margin-right: 10px" class="glyphicon glyphicon-remove"></span> Cancel</button>   
                      </div>
               </form>
          </div>
       </div>
      </div>
   </div>

          </div>    
      </div>
  </div>
       </div>
      </div>
    </div>
  </div>
</div>           
  <style type="text/css">
  .btn-circle.btn-lg {
  width: 45px;
  height: 45px;
  padding: 13px 14px;
  font-size: 24px;
  line-height: 2;
  border-radius: 30px;
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
#leaverequestnav{

    display: none;
  }
</style>  
  <style type="text/css">
         #img1 {
              border-radius: 160%;
              height: 150px;
              width: 150px;
            } 
       #img {
              border-radius: 160%;
              height: 100px;
              width: 150px;
            }
       #image_upload_preview {
              border-radius: 160%;
              height: 100px;
              width: 150px;
            }

  </style>
     
</body>

</html>
 <?php include 'includes/script.php'?>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<
 <script>
   $(document).ready(function(){
 
 $(function() {
  $('#duration').change(function(){
        var divContent = $('#textleave').text();
            
    if($('#duration').val() == "Half Day"){
      $('#leavefrom1').change(function() {
          $('#leaveuntil1').val($(this).val());
          $("#leaveuntil1").prop('disabled', true);
      });
    }
    if($('#duration').val() == "Full Day"){
          $('#leavefrom').change(function() {
          $('#leaveuntil1').val($(this).val());
          $("#leaveuntil1").prop('disabled', true);
      });
    }
    if($('#duration').val() == "Multiple Day"){
         $('#leavefrom1').change(function() {
         $('#leaveuntil').val();
         $("#leaveuntil").prop('disabled', false);
      });
    
    }
  });

  




  }); 
});
 
 </script>
