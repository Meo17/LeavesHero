  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Homepage</title>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/css.css">
   <link rel="stylesheet" href="dist/sweetalert.css">
   <link rel="stylesheet" href="materialize/materialize.css">
   <link rel="stylesheet" href="materialize/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/css/mdb.min.css" />
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>
</head>
 <?php include 'css/css12.css'?>

        <!-- Bootstrap Core CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>

  <link href='css/fullcalendar.css' rel='stylesheet' /> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
          <!-- Bootstrap Core CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>

  <link href='css/fullcalendar.css' rel='stylesheet' /> 

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
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">
         <?php foreach($ret  as $em ) {?>  
          <li class="active"  ><a href="companyemployeedashboard.php? id=<?php echo $em['Employee_Id']?>" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub "></span>Leave Balance</a></li>
           <?php }?>
          <?php foreach($approver  as $a ) {?> 
                 <?php  if ($a ['Employee_Id'] ==  $em ['Employee_Id'] ){?>
                  <li ><a href="EmployeeLeaveApplication.php? id=<?php echo $em['Employee_Id']?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay aqua-hover"></span>Leave Request
                 <?php if($count == 0 || $count1 == 0 ){

                      echo '<span style="padding-left: 10px"class="glyphicon glyphicon-bell hidden"> </span>';
                    }?> 
                 <?php if($count != 0 || $count1 != 0 ){
                       $notif = $count + $count1 ;
                                    echo '<span class="badge badge-warning" style="margin-left:-4.5px;font-size:11.7px;margin-left:20px">'.
             '<p style="margin-top:-4px;margin-left:-4px">'.$notif.'</p>';


                   }?>

            </a></li>
          <?php }?>
          <?php }?>
          <?php foreach($ret  as $em ) {?>  
          <li ><a href="EmployeeLeaveRecord.php?id=<?php echo $em['Employee_Id']?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-th-list"></span>Leave Record</a></li>
          <li  ><a href="EmployeeCalendar.php? id=<?php echo $em['Employee_Id']?>" class="aqua-hover " style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-calendar "></span>Calendar</a></li>
       <?php }?>
      </ul><br>
    </div>
    <br>
    
      <div class="col-sm-10" style="float: right;background-color: #f1f1f1;margin-left: 10px">
      <div class="container navbar-fixed-top  " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1050px;margin-left: 211px;background-color: white">
        <div class="container" style="width:auto;float: left;width: auto;margin-top: 10px">
            <?php foreach($ret  as $em ) {?>  
          <h5><b> <?php echo $em['Company_Name']; ?></b></h5>
        </div>
        <!--top navbar/ right side-->
        <div class="dropdown" style="float: right;top:15px;">
          <img src="icons/<?php  echo $em['Employee_Profile_Pic']?>" style="height: 35px; width: 35px;margin-top: -7px"id="img">
          <a class="btn-white lightgray-hover dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 10px; font-family:'Roboto';"><b><?php echo $em['Employee_FirstName'],' ',$em['Employee_MiddleInitial'],' ' ,$em['Employee_LastName']; ?></b>
              <?php }?> 
            <span class="caret"></span></button>
              <ul class="dropdown-menu">
              <li><a data-toggle="modal" href="#myModal"><span class="design icon_edit" style="padding-bottom: 9px;top: 3px"></span>Edit
                <li><a href="logout.php?logout"><span class="design icon_out" style="padding-bottom: 9px;top: 3px"></span>Logout</a></li>
             </ul>
        </div>
      </div>
  
 
      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px" id="mydiv">
        <div class="col-10" style="padding-top: 38px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch" style="width: 1030px">
        </div>
      </div>
<a href="#mydiv"type="button" class="btn button  btn-circle navbar-fixed-bottom btn-lg "  style="font-size: 12px;float: right;margin-top: 200px;margin-left: 1170px;background-color: #00cc99 ;opacity: 0.6;"><i class="glyphicon glyphicon-chevron-up" id="lastclicked"></i></a> 
  
                 <!-- Edit Modal -->
      <div class="modal fade" id="myModal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
    
          <!-- Modal content-->
          <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><b>My Profile </b></h4></center>
            </div>
            <div class="modal-body">

               <form class="form" method="post" enctype="multipart/form-data">
                 <?php foreach($update  as $em ) {?>   
               <input type="file" id="inputFile" name="file" accept="image/*" capture style="display:none" ></input>
                <img src="icons/<?php echo $em['Employee_Profile_Pic'] ; ?>" id="image_upload_preview" style="cursor:pointer;width:100px" class="center round" />
                <div class="form-group" style="padding-top: 10px">
                  <p>Username</p>
                  <input type="text" class="form-control hidden" value="<?php echo $em['Employee_Id']?>" name="employeeid">
                  <input type="text" class="form-control" value="<?php echo $em['Username']?>" name="username">
              </div>
              <div class="form-group">
                  <p>Password</p>
                  <input type="password" class="form-control" value="<?php echo $em['Password1']?>" name="password">
              </div>
              <div class="form-group">
                  <p>Contact Number</p>
                  <input type="text" class="form-control" value="<?php echo $em['Employee_Contact1']?>" name="contact">
              </div>
              <div class="form-group">
                  <p>Email Address</p>
                  <input type="text" class="form-control" value="<?php echo $em['Employee_Email']?>" name="email">
              </div>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn  btn-hover-white btn-danger" style="float: left;" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-hover-white btn-sucess" name="userupdate" style="background-color:#00cc99">Save</button>
            </div>
             <?php }?>
                </form>
          </div> 
        </div>
      </div>
                 <!-- Edit Modal -->

      <!--Vertical Bar-->
      <div class="row">
        <div class="col-sm-4">
          <div class="well" style="height: 1000px;">
            <h4><center><b>Employee Information</b></center></h4><br>
             <img src="icons/<?php  echo $em['Employee_Profile_Pic']?>" class="center" id="img1"><br>
             <?php foreach ($update as $mployee) {?>
             <h5><center><b><?php echo $mployee['Employee_FirstName'] ,' ',$mployee['Employee_MiddleInitial'],' ',$mployee['Employee_LastName'];?></b></center></h5><br>
             <div style="float: left;">
             <h6>Employee ID</h6>
             <h6>Department</h6>
             <h6>Birthdate</h6>
             <h6>Contact Number</h6>
             <h6>Email</h6>
             <h6>Marital Status</h6>
              <h6>Hired Date</h6>
              </div>
              <div style="float: right;">
             <h6><?php echo $mployee['Employee_Id'] ?></h6>
              <h6><?php echo $mployee['Employee_Department'] ?></h6>
              <h6><?php echo $mployee['Employee_Birthdate'] ?></h6>
              <h6><?php echo $mployee['Employee_Contact1'] ?></h6>
              <h6><?php echo $mployee['Employee_Email'] ?></h6>
              <h6><?php echo $mployee['Employee_MaritalStatus'] ?></h6>
              <h6><?php echo $mployee['Employee_HireDate'] ?></h6>
              
           <?php  }?>
            </div>

          </div>
        </div>
        <!--LEAVE TYPE -->
        <div class="col" style="width: auto; padding-left: 230px;height: auto;">
          <div class="well" style="height: 1000px;">
            <div style="float: left;padding-left: 40px;width: 600px">
            <h4><b>Leave Types</b></h4>
            <a style="float: right;color: black;" href="#div"><b>View my leave request</b></a>
              <br> 
             <div style="float: left;width: auto;height: ;">
              <?php foreach ($ret_leave as $leave){?>
                    <?php  if($leave['LeaveType'] != ''){?>
                    <div class="row  " style="float: left;height: 500px" id="sub">
                      <div class="col-sm-3" style="width: 300px;float: left;margin-left: 10px">       
                      <div class="card">                   
                        <div class="inner text-center" style="height: 200px"> 
                          <h3><?php echo $leave["LeaveType"]?></h3>
                          <div style="float: center;padding-left: 55px">
                          <h5><b>Annual Leave Entitlement</b></h5> 
                              <div style="float: left;">
                              <h6>Annual Entitlement:</h6>
                              <h6>Available to Apply:</h6>
                              <h6>Total Leave Applied</h6>
                             </div>
                              <div style="float: right; text-align: right;margin-right: 50px">
                                  <h6><?php echo $leave["NumberofDays"],' ','Days'?></h6>
                                  <h6 ><?php
                                          $remain =  $leave["NumberofDays"] - $sumleave ;
                                      echo $remain ,' ','Days'?></h6>
                                 <?php foreach ($request1 as $leave1){?>
                                    <?php if ($leave1["Leave_Type"] == $leave["LeaveType"]){?>
                                           
                                            <h6 ><?php echo $sumleave ?></h6>
                                     <?php }?>
                                    <?php if ($leave1["Leave_Type"] != $leave["LeaveType"]){?>
                                           
                                     <?php }?>  

                                  <?php }?>

                                 
                              </div>
                         </div> 
                          <button  class="btn btn-default applyleave" data-id="<?php echo $leave["id"];?>">Apply for leave</button>
                        </div>                 
                      </div>
                    </div>
                  </div>

                   <?php }?>

                    <?php  if($leave['LeaveType'] == ''){?>
                    <div class="row hidden " style="float: left;" id="sub">
                      <div class="col-sm-3" style="width: 300px;float: left;margin-left: 10px">       
                      <div class="card">                   
                        <div class="inner text-center"> 
                          <h3><?php echo $leave["LeaveType"]?></h3>
                          <div style="float: center;padding-left: 55px">
                          <h5><b>Annual Leave Entitlement</b></h5> 
                              <div style="float: left;">
                              <h6>Annual Entitlement:</h6>
                              <h6>Available to Apply:</h6>
                              <h6>Total Leave Applied</h6>
                              <h6>Balance</h6>
                             </div>
                              <div style="float: right; text-align: right;margin-right: 50px">
                                  <h6><?php echo $leave["NumberofDays"]?></h6>
                                  <h6 ><?php echo $leave["NumberofDays"]?></h6>
                                 <?php foreach ($request1 as $leave1){?>
                                    <?php if ($leave1["Leave_Type"] == $leave["LeaveType"]){?>
                                       
                                           <h6 ><?php echo $leave1["Leave_Days"]?></h6>
                                     <?php }?>
                                    <?php if ($leave1["Leave_Type"] != $leave["LeaveType"]){?>
                                           
                                     <?php }?>  

                                  <?php }?>

                                 
                              </div>
                         </div> 
                          <button  class="btn btn-default applyleave" data-id="<?php echo $leave["id"];?>">Apply for leave</button>
                        </div>                 
                      </div>
                    </div>
                  </div>

                   <?php }?>
              <?php }?>

              <?php foreach ($leave_position as $leave){?>

                    <?php  if($leave['leave_type_employee_position'] ==$mployee['Employee_Position']){?>                
                       <div class="row " style="float: left; " id="sub">
                      <div class="col-sm-3" style="width: 300px;float: left;margin-left: 10px;">       
                      <div class="card"style="height: 600px">                   
                        <div class="inner text-center" style=""> 
                          <h3><?php echo $leave["LeaveType"]?></h3>
                          <div style="float: center;padding-left: 55px;">
                          <h5><b>Annual Leave Entitlement</b></h5> 
                              <div style="float: left;">
                              <h6>Annual Entitlement:</h6>
                              <h6>Available to Apply:</h6>
                              <h6>Total Leave Applied</h6>
                              <h6>Balance</h6>
                             </div>
                              <div style="float: right; text-align: right;margin-right: 50px">
                                  <h6><?php echo $leave["NumberofDays"]?></h6>
                                  <h6 ><?php echo $leave["NumberofDays"]?></h6>
                                 <?php foreach ($request1 as $leave1){?>
                                    <?php if ($leave1["Leave_Type"] == $leave["LeaveType"]){?>
                                       
                                              <h6 ><?php echo $sumleave ?></h6>
                                     <?php }?>
                                    <?php if ($leave1["Leave_Type"] != $leave["LeaveType"]){?>
                                           
                                     <?php }?>  

                                  <?php }?>

                                 
                              </div>
                         </div> 
                          <button  class="btn btn-default applyleave1" data-id="<?php echo $leave["leave_type_position_id"];?>">Apply for leave</button>
                        </div>                 
                      </div>
                    </div>
                  </div>
                    <?php }?>
              <?php }?>
<!------Apply Leave----------------------------------------------------------------------->

<div class="modal bounceIn" id="applyleave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px">
        <div class="modal-content">
            <div class="modal-header" style="height:55px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h3 class="modal-title LeaveType" id="myModalLabel" style="padding-top:-20px"></h3></center>
         </div>
                
         <div class="modal-body" style="height: 700px;">  
                     <form   enctype="multipart/form-data" method="POST">

            
         <input type="text" id="id1" name="time" hidden >

                          <h5  class="center">Application Form</h5>
                     
                           <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Family Name</label>
                                  <input type="text" class="LeaveType" name="leavetype" hidden>
                                   
                                     <?php foreach($ret  as $emp ) {?>
                                       <input type="text" class="form-control hidden" name="employeeid" style="width: 300px"value="<?php echo $emp['Employee_Id']?>" readonly>
                                       <input type="text" class="form-control hidden" name="Companyid" style="width: 300px"value="<?php echo $emp['Company_Id']?>" readonly>
                                    <?php }?>
   
                                    <input type="text"  class="form-control"   style="width: 300px"value="<?php echo $emp['Employee_LastName']?>" readonly>
                                </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Given Name</label>
                                    <input type="text" class="form-control" style="width: 300px" value="<?php echo $emp['Employee_FirstName']?>" readonly>

   
                                </div>

                                   <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">MI</label>
                                    <input type="text"  class="form-control" style="width: 300px"value="<?php echo $emp['Employee_MiddleInitial']?>" readonly>
                                 </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Suffex</label>
                                    <input type="text" class="form-control"  style="width: 300px"value="<?php echo $emp['Employee_Suffix']?>" readonly>
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Department</label>
                                 <input style="width: 300px" type="text"  class="form-control" value="<?php echo $emp['Employee_Department']?>" readonly>


                                </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Duration</label>
                                     <select name="Duration"class="form-control" style="height: 28px;width: 150px">
                                        <option disabled selected>Duration</option>
                                        <option value="Half Day">Half Day</option>
                                        <option value="Full Day">Full Day</option>
                                        <option value="Multiple Days">Multiple Days</option>
                                    </select>
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Start Date</label>
                                    <input type="date"  class="form-control" name="start" style="width: 300px">
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">End Date</label>
                                    <input type="date"  class="form-control" name="end" style="width: 300px">
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Approver</label>
                                      <select name="approver"class="form-control" style="height: 28px;width: 150px">
                                     <option disabled selected>Send To Approver</option>
                                <?php foreach ($ret as $emp) {?>   
                                    <?php foreach ($sendapprover as $app) {?>   
                                      <?php if($emp['Employee_FirstName'] != $app['Employee_FirstName']||$emp['Employee_MiddleInitial'] != $app['Employee_MiddleInitial']||$emp['Employee_LastName'] != $app['Employee_LastName']||$emp['Employee_Suffix'] != $app['Employee_Suffix']){?>
                                        <?php if ($emp['Company_Id'] == $app['Company_Id']) {?>
                                        <option value="<?php echo $app['Employee_Id']?>"><?php echo $app['Employee_FirstName']," ", $app['Employee_MiddleInitial']," ", $app['Employee_LastName']," ",$app['Employee_Suffix']?></option>
                                       <?php }?>
                                      <?php }?>
                                   <?php }?>
                                <?php }?>   
                                    </select> 

                                </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Reason</label>
                                    <textarea class="form-control" rows="5" name="reason"></textarea>
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                <label style="margin-top: -20px">Supporting Document</label>
                                 <input type="file" class="form-control" name="file" style="width: 300px" multiple>
                                </div>

                  <button  name="apply" type="submit" class="btn btn-default "style="float: right;"><span style="margin-right: 10px"class="glyphicon glyphicon-send"　></span> Submit </button>

                   <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;"><span style="margin-right: 10px" class="glyphicon glyphicon-remove"></span> Cancel</button>
              </form>
               </div>

           
                              
                                  

               
        </div>
    </div>
</div>
<!------Apply Leave----------------------------------------------------------------------->

<div class="modal bounceIn" id="applyleave1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px">
        <div class="modal-content">
            <div class="modal-header" style="height:55px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h3 class="modal-title LeaveType" id="myModalLabel" style="padding-top:-20px"></h3></center>
         </div>
                
         <div class="modal-body" style="height: 700px;">  
                     <form   enctype="multipart/form-data" method="POST">

            
         <input type="text" id="id1" name="time" hidden >

                          <h5  class="center">Application Form</h5>
                     
                           <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Family Name</label>
                                  <input type="text" class="LeaveType" name="leavetype" hidden>
                                   
                                     <?php foreach($ret  as $emp ) {?>
                                       <input type="text" class="form-control hidden" name="employeeid" style="width: 300px"value="<?php echo $emp['Employee_Id']?>" readonly>
                                       <input type="text" class="form-control hidden" name="Companyid" style="width: 300px"value="<?php echo $emp['Company_Id']?>" readonly>
                                    <?php }?>
   
                                    <input type="text"  class="form-control"   style="width: 300px"value="<?php echo $emp['Employee_LastName']?>" readonly>
                                </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Given Name</label>
                                    <input type="text" class="form-control" style="width: 300px" value="<?php echo $emp['Employee_FirstName']?>" readonly>

   
                                </div>

                                   <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">MI</label>
                                    <input type="text"  class="form-control" style="width: 300px"value="<?php echo $emp['Employee_MiddleInitial']?>" readonly>
                                 </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Suffex</label>
                                    <input type="text" class="form-control"  style="width: 300px"value="<?php echo $emp['Employee_Suffix']?>" readonly>
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Department</label>
                                 <input style="width: 300px" type="text"  class="form-control" value="<?php echo $emp['Employee_Department']?>" readonly>


                                </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Duration</label>
                                     <select name="Duration"class="form-control" style="height: 28px;width: 150px">
                                        <option disabled selected>Duration</option>
                                        <option value="Half Day">Half Day</option>
                                        <option value="Full Day">Full Day</option>
                                        <option value="Multiple Days">Multiple Days</option>
                                    </select>
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Start Date</label>
                                    <input type="date"  class="form-control" name="start" style="width: 300px">
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">End Date</label>
                                    <input type="date"  class="form-control" name="end" style="width: 300px">
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Approver</label>
                                      <select name="approver"class="form-control" style="height: 28px;width: 150px">
                                     <option disabled selected>Send To Approver</option>
                                <?php foreach ($ret as $emp) {?>   
                                    <?php foreach ($sendapprover as $app) {?>   
                                      <?php if($emp['Employee_FirstName'] != $app['Employee_FirstName']||$emp['Employee_MiddleInitial'] != $app['Employee_MiddleInitial']||$emp['Employee_LastName'] != $app['Employee_LastName']||$emp['Employee_Suffix'] != $app['Employee_Suffix']){?>
                                        <?php if ($emp['Company_Id'] == $app['Company_Id']) {?>
                                        <option value="<?php echo $app['Employee_Id']?>"><?php echo $app['Employee_FirstName']," ", $app['Employee_MiddleInitial']," ", $app['Employee_LastName']," ",$app['Employee_Suffix']?></option>
                                       <?php }?>
                                      <?php }?>
                                   <?php }?>
                                <?php }?>   
                                    </select> 

                                </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Reason</label>
                                    <textarea class="form-control" rows="5" name="reason"></textarea>
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                <label style="margin-top: -20px">Supporting Document</label>
                                 <input type="file" class="form-control" name="file" style="width: 300px" multiple>
                                </div>

                  <button  name="apply1" type="submit" class="btn btn-default "style="float: right;"><span style="margin-right: 10px"class="glyphicon glyphicon-send"　></span> Submit </button>

                   <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;"><span style="margin-right: 10px" class="glyphicon glyphicon-remove"></span> Cancel</button>
              </form>
               </div>

           
                              
                                  

               
        </div>
    </div>
</div>

          </div>
            </div>

        </div>
</div>
<!------------------------------------------------------------------------------------------------------>
 <h4><center><b>My Leave Request</b></center></h4><br>
   <!--Vertical Bar-->
    
           
        <div class="col-sm-12" id="div">

          <div class="well" style="height:auto;">
              <table class="table table-hover" style="table-layout: fixed;overflow-x: auto;width:1000px;">
              <thead>
                <tr>
                  <th style="font-size: 13px">Leave Type </th>
                  <th style="font-size: 13px" >Duration</th>
                  <th style="font-size: 13px">Start</th>
                  <th style="font-size: 13px">End</th>
                  <th style="font-size: 13px">Days</th>
                  <th style="font-size: 13px">Supporting Doc</th>
                  <th style="font-size: 13px">Leave Reason</th>
                  <th style="font-size: 13px">Status</th>
                  <th style="font-size: 13px">Edit</th>
                  <th style="font-size: 13px">Cancel</th>

                </tr>
            </thead>
         
               <tbody>
               <?php foreach ($apply_leaverequest as $row) {?>
                 <tr>
                  <?php if ($row['Leave_Status']=="Waiting for approval"): ?>
                    <td style="font-size: 13px"><?php echo $row['Leave_Type'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_Duration'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_Start'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_End'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_Days'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_Support_Doc'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_Reason'];?></td>
                    <td style="font-size: 13px;color: #ff0000"><b><?php echo $row['Leave_Status'];?></b></td>
                    <td><button class="btn btn-info btn-hover-white btn-sm  editapply" data-id ="<?php echo $row['apply_leave_request_Id'];?>" style="font-size:10px"><span class="glyphicon glyphicon-pencil"></span></button> <br>
                    </td>
      
                  <td><button class="btn btn-danger btn-hover-white btn-sm  CANCEL" data-id ="<?php echo $row['apply_leave_request_Id'];?>" style="font-size:10px"><i class="glyphicon glyphicon-minus"></i></button> <br>
                     </td>                 
                  <?php endif ?>
                  <?php if ($row['Leave_Status']=="Approved"): ?>
                    <td style="font-size: 13px"><?php echo $row['Leave_Type'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_Duration'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_Start'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_End'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_Days'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_Support_Doc'];?></td>
                    <td style="font-size: 13px"><?php echo $row['Leave_Reason'];?></td>
                    <td style="font-size: 13px;color: #008000"><b><?php echo $row['Leave_Status'];?></b></td>
               
                  <?php endif ?>
                 </tr>
               <?php }?>
               </tbody>
                </table>
              
          </div>
      
  
<!------Apply Leave----------------------------------------------------------------------->

<div class="modal bounceIn" id="editapply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px">
        <div class="modal-content">
            <div class="modal-header" style="height:55px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h3 class="modal-title Leave_Type" id="myModalLabel" style="padding-top:-20px"></h3></center>
         </div>
                
         <div class="modal-body" style="height: 700px;">  
                     <form  enctype="multipart/form-data" method="POST">

            
         <input type="text" id="id1" name="time" hidden >
               <input type="text" class="id" style="width: 150px" name="apply_leave_request_Id"hidden>
                          <h5  class="center">Application Form</h5>
                     
                           <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Family Name</label>
                                  <input type="text" class="Leave_Type" style="width: 150px" name="Leave_Type"hidden>
                                   
                                     <?php foreach($ret  as $emp ) {?>
                                       <input type="text" class="form-control hidden" name="employeeid" style="width: 300px"value="<?php echo $emp['Employee_Id']?>" readonly>
                                       <input type="text" class="form-control hidden" name="Companyid" style="width: 300px"value="<?php echo $emp['Company_Id']?>" readonly>
                                    <?php }?>
   
                                    <input type="text"  class="form-control"   style="width: 300px"value="<?php echo $emp['Employee_LastName']?>" readonly>
                                </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Given Name</label>
                                    <input type="text" class="form-control" style="width: 300px" value="<?php echo $emp['Employee_FirstName']?>" readonly>

   
                                </div>

                                   <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">MI</label>
                                    <input type="text"  class="form-control" style="width: 300px"value="<?php echo $emp['Employee_MiddleInitial']?>" readonly>
                                 </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Suffex</label>
                                    <input type="text" class="form-control"  style="width: 300px"value="<?php echo $emp['Employee_Suffix']?>" readonly>
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Department</label>
                                 <input style="width: 300px" type="text"  class="form-control" value="<?php echo $emp['Employee_Department']?>" readonly>


                                </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Duration</label>
                                     <select name="Duration"class="form-control " style="height: 28px;width: 150px">
                                        <option disabled selected>Duration</option>
                                        <option class ="Leave_Duration"value="Half Day">Half Day</option>
                                        <option value="Full Day">Full Day</option>
                                        <option value="Multiple Days">Multiple Days</option>
                                    </select>
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Start Date</label>
                                    <input type="date"  class="form-control Leave_Start" name="start" style="width: 300px">
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">End Date</label>
                                    <input type="date"  class="form-control Leave_End" name="end" style="width: 300px">
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Approver</label>
                                      <select name="approver"class="form-control" style="height: 28px;width: 150px">
                                     <option disabled selected>Send To Approver</option>
                                <?php foreach ($ret as $emp) {?>   
                                    <?php foreach ($sendapprover as $app) {?>   
                                      <?php if($emp['Employee_FirstName'] != $app['Employee_FirstName']||$emp['Employee_MiddleInitial'] != $app['Employee_MiddleInitial']||$emp['Employee_LastName'] != $app['Employee_LastName']||$emp['Employee_Suffix'] != $app['Employee_Suffix']){?>
                                        <?php if ($emp['Company_Id'] == $app['Company_Id']) {?>
                                        <option value="<?php echo $app['Employee_Id']?>"><?php echo $app['Employee_FirstName']," ", $app['Employee_MiddleInitial']," ", $app['Employee_LastName']," ",$app['Employee_Suffix']?></option>
                                       <?php }?>
                                      <?php }?>
                                   <?php }?>
                                <?php }?>   
                                    </select> 

                                </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Reason</label>
                                    <textarea class="form-control Leave_Reason" rows="5" name="reason"></textarea>
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                <label style="margin-top: -20px">Supporting Document</label>
                                 <input type="file" class="form-control" name="file" style="width: 300px" multiple>
                                </div>

                  <button  name="update" type="submit" class="btn btn-default "style="float: right;"><span style="margin-right: 10px"class="glyphicon glyphicon-send"　></span> Update</button>

                   <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;"><span style="margin-right: 10px" class="glyphicon glyphicon-remove"></span> Cancel</button>
              </form>
               </div>

           
                              
                                  

               
        </div>
    </div>
</div>
 <!---------------------------------------------------------------CANCEL MODAL------------------------------------------------------>
<div class="modal fade" id="CANCEL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 300px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"> Leave Request</h4></center>
            </div>
            <form method="post">
            <div class="modal-body">  
              <p class="text-center">Are you sure you want to Cancel your leave Request</p>
             
                  <input type="text" class="id" style="width: 150px" name="apply_leave_request_Id"hidden>
                  <input type="text" class="Applied_Employee_Id" style="width: 150px" name="Applied_Employee_Id"hidden>
                  <input type="text" class="Company_Id" style="width: 150px" name="Company_Id" hidden>
                  <input type="text" class="Leave_Type" style="width: 150px" name="Leave_Type"hidden>
                  <input type="text" class="Leave_Duration" style="width: 150px" name="Leave_Duration" hidden>
                  <input type="text" class="Leave_Days " style="width: 150px" name="Leave_Days" hidden>
                  <input type="text" class="Leave_Start" style="width: 150px" name="Leave_Start"hidden >
                  <input type="text" class="Leave_End" style="width: 150px" name="Leave_End" hidden>
                  <?php foreach ($ret as $ap) {?>

                  <input type="text" class="" style="width: 150px" name="approver" value="<?php echo $ap['Employee_FirstName'],' ',$ap['Employee_MiddleInitial'],' ' ,$ap['Employee_LastName']; ?> " hidden>
                  <?php }?>
                  <input type="text" style="width: 150px" name="Leave_Status" value="Approved" hidden>
            
           </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" >No</button>
                <button type="submit"  class="btn btn-success" name="cancel"> Yes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-----------------------------------END MODAL---------------------------------------------------------------------->
<!-------End Leave-------================----------------------------------------------------------------------------->
</div>




<script src="app.js"></script>
  <!-- Central Modal Small -->
        

</body>
</html>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/jQuery 3.3.1.js" ></script>
    <script src="js/jQuery-3.2.0..js" ></script>
  <script type="text/javascript" src="js/jquery.form.js" ></script>
 <script src="dist/sweetalert.min.js"></script>
 <script type="text/javascript" src="dist/sweetalert.js" ></script>
<script src="js/jQuery 3.3.1.js"></script>
 <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  
  <!-- FullCalendar -->
  <script src='js/moment.min.js'></script>
  <script src='js/fullcalendar.min.js'></script>
    <script type="text/javascript">
function testAnim(x) {
    $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
};
$('#delete2').on('show.bs.modal', function (e) {
  var anim = $('#entrance').val();
      testAnim(anim);
})
$('#delete2').on('hide.bs.modal', function (e) {
  var anim = $('#exit').val();
      testAnim(anim);
})
$(document).ready(function(){  
           $('#dsearch').keyup(function(){  
                search_table($(this).val());  
           });  
 
           function search_table(value){  
                $('#sub ').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
var currentTime = new Date()
var hours = currentTime.getHours()
var minutes = currentTime.getMinutes()

if (minutes < 10){
  minutes = "0" + minutes;
}
var suffix = "AM";
if (hours >= 12) {
suffix = "PM";
hours = hours - 12;
}
if (hours == 0) {
hours = 12;
}

document.getElementById('id1').value= hours + ":" + minutes + " " + suffix ;
  </script>
  <script type="text/javascript">
  $(document).ready(function(e) {
        $(".showonhover").click(function(){
      $("#selectfile").trigger('click');
    });
    });


var input = document.querySelector('input[type=file]'); // see Example 4

input.onchange = function () {
  var file = input.files[0];

  drawOnCanvas(file);   // see Example 6
  displayAsImage(file); // see Example 7
};

function drawOnCanvas(file) {
  var reader = new FileReader();

  reader.onload = function (e) {
    var dataURL = e.target.result,
        c = document.querySelector('canvas'), // see Example 4
        ctx = c.getContext('2d'),
        img = new Image();

    img.onload = function() {
      c.width = img.width;
      c.height = img.height;
      ctx.drawImage(img, 0, 0);
    };

    img.src = dataURL;
  };

  reader.readAsDataURL(file);
}

function displayAsImage(file) {
  var imgURL = URL.createObjectURL(file),
      img = document.createElement('img');

  img.onload = function() {
    URL.revokeObjectURL(imgURL);
  };

  img.src = imgURL;
  document.body.appendChild(img);
}


$("#image_upload_preview").click(function () {
    $("#inputFile").trigger('click');
});

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    
    }
   $("#inputFile").change(function () {
        readURL(this);
    });
</script>