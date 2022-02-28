<!DOCTYPE html>
<html lang="en" >
<head>
  <title>Employee Page</title>
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
          <li  ><a href="companyemployeedashboard.php? id=<?php echo $em['Employee_Id']?>" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Leave Balance</a></li>
           <?php }?>
          <?php foreach($approver  as $a ) {?> 
                 <?php  if ($a ['Employee_Id'] ==  $em ['Employee_Id'] ){?>
                  <li class="active" ><a href="EmployeeLeaveApplication.php? id=<?php echo $em['Employee_Id']?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay aqua-hover"></span>Leave Request
                 <?php if($count == 0 || $count1 == 0 ){

                      echo '<span style="padding-left: 10px"class="glyphicon glyphicon-bell hidden"> </span>';
                    }?>
                 <?php if($count != 0 || $count1 != 0 ){
                       $notif = $count + $count1 ;
                    echo '<span style="padding-left: 10px"class="glyphicon glyphicon-bell gly-rotate-90" style="height:40px"><span class="badge badge-warning" style="margin-top:-14px;margin-left:-4.5px;font-size:11.7px;padding-top:-25px;">'.
             '<p style="margin-top:-4px;margin-left:-4px">'.$notif.'</p>';  
                   }?>

            </a></li>
          <?php }?>
          <?php }?>
          <?php foreach($ret  as $em ) {?>  
          <li ><a href="EmployeeLeaveRecord.php?id=<?php echo $em['Employee_Id']?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-th-list"></span>Leave Record</a></li>
          <li  ><a href="EmployeeCalendar.php? id=<?php echo $em['Employee_Id']?>" class="aqua-hover " style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span    class="design glyphicon-calendar "></span>Calendar</a></li>
       <?php }?>
      </ul><br>
    </div>
    <br>
    
      <div class="col-sm-10" style="float: right;background-color: #f1f1f1;margin-left: 10px">
      <div class="container navbar-fixed-top  " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1050px;margin-left: 213px;background-color: white">
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
  
 
      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px">
        <div class="col-10" style="padding-top: 38px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch" style="width: 1030px">
        </div>
      </div>
             <!-- Edit Modal -->
      <div class="modal fade" id="myModal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
    
          <!-- Modal content-->
          <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><b>My Profile</b> </h4></center>
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
  
      <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="padding-bottom: 50px"> 

            <div class="container" style="width: auto;">
              <h5 style="float: left;">Employee's Leave </h5>
               <?php foreach ($request as $row) {?>
                 <?php if ($row['Leave_Status'] == "Waiting for approval") {?>
               <table class="table table-hover" style="table-layout: fixed;overflow-x: auto;width:1000px;">
              
              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>LT</th>
                  <th>Duration</th>
                  <th>Days</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Reason</th>
                  <th>Support Document</th>
                  <th>SD</th>
                  <th>View</th>
                  <th>Grant</th>
                  <th>Forward</th>
                  <th>Disapproved</th>
                </tr>
            </thead>
          
          <tbody>
              <tr>
               
                <td><?php echo $row['Applied_Employee_Id']?></td>
                <td><?php echo $row['Leave_Type']?></td>
                <td><?php echo $row['Leave_Duration']?></td>
                <td><?php echo $row['Leave_Days']?></td>
                <td><?php echo $row['Leave_Start']?></td>
                <td><?php echo $row['Leave_End']?></td>
                <td><?php echo $row['Leave_Reason']?></td>
                <td>
                  <a style="color:black;text-decoration:none" download="<?php echo $row['Leave_Support_Doc']?>" href="attachment/<?php echo $row['Leave_Support_Doc']?>"><?php  echo $row['Leave_Support_Doc']?><span class="glyphicon glyphicon-download-alt" style="float: right;"><br></span></a>
                </td>
                <td><?php echo $row['Leave_Status']?></td>
                 <td> 
                      <button class="btn btn-info btn-hover-white btn-sm  view" data-id ="<?php echo $row['apply_leave_request_Id'];?>" style="font-size:10px"><span class="glyphicon glyphicon-eye-open"></span></button> <br>
                 <td>
                    <button class="btn btn-success btn-hover-white btn-sm  delete4" data-id ="<?php echo $row['apply_leave_request_Id'];?>" style="font-size:10px"><i class="glyphicon glyphicon-check"></i></button>
                 </td>
                     <td>
                        <button type="submit"  class="btn btn-default btn-hover-lightgray btn-sm leaveforward" data-id ="<?php echo $row['apply_leave_request_Id'];?>"style="font-size: 10px;color: white;"><i class="glyphicon glyphicon-send"></i></button> 
                     </td> 
                     </td>  
                 <td>
                    <button class="btn btn-danger btn-hover-white btn-sm  delete5 " data-id ="<?php echo $row['apply_leave_request_Id'];?>" style="font-size:10px"><i class="glyphicon glyphicon-thumbs-down"></i></button>     
                  </td>
                                  
                
              </tr>
            </tbody>
   
      
           </table>
           <?php }?>
       <?php }?>
               <?php foreach ($ret_forwardleaverequest as $row) {?>
                 <?php if ($row['Request_Status'] == "Waiting for approval") {?>
               <table class="table table-hover" style="table-layout: fixed;overflow-x: auto;width:1000px;">
              
              <thead>
                <tr>
                  <th>Employee ID  </th>
                  <th>LT</th>
                  <th>Duration</th>
                  <th>Days</th>
                  <th>Reason</th>
                  <th>Support Document</th>
                  <th>Status</th>
                  <th>Forward By </th>
                  <th>View</th>
                  <th>Grant</th>
                  <th>Forward</th>
                  <th>Disapproved</th>
      
                  
                </tr>
            </thead>
          
          <tbody>
              <tr>
               
                <td><?php echo $row['Applied_Employee_Id']?></td>
                <td><?php echo $row['Leave_Type']?></td>
                <td><?php echo $row['Leave_Duration']?></td>
                <td><?php echo $row['Leave_Days']?></td>
                <td><?php echo $row['Leave_Reason']?></td>
                <td>
                  <a style="color:black;text-decoration:none" download="<?php echo $row['Leave_Support_Doc']?>" href="attachment/<?php echo $row['Leave_Support_Doc']?>"><?php  echo $row['Leave_Support_Doc']?><span class="glyphicon glyphicon-download-alt" style="float: right;"><br></span></a>
                </td>
                <td><?php echo $row['Leave_Status']?></td>
                 <td><?php echo $row['Approved_By']?></td>
                  <td> 
                      <button class="btn btn-info btn-hover-white btn-sm  view" data-id ="<?php echo $row['apply_leave_request_Id'];?>" style="font-size:10px"><span class="glyphicon glyphicon-eye-open"></span></button> <br>
                 </td> 
                 <td>
                    <button class="btn btn-success btn-hover-white btn-sm  delete4" data-id ="<?php echo $row['apply_leave_request_Id'];?>" style="font-size:10px"><i class="glyphicon glyphicon-check"></i></button>
                 </td>
                     <td>
                        <button type="submit"  class="btn btn-default btn-hover-lightgray btn-sm leaveforward" data-id ="<?php echo $row['apply_leave_request_Id'];?>"style="font-size: 10px;color: white;"><i class="glyphicon glyphicon-send"></i></button> 
                     </td>  
                 <td>
                    <button class="btn btn-danger btn-hover-white btn-sm  delete5 " data-id ="<?php echo $row['apply_leave_request_Id'];?>" style="font-size:10px"><i class="glyphicon glyphicon-thumbs-down"></i></button>   
                  </td>
  
              </tr>
            </tbody>
   
      
           </table>
           <?php }?>
       <?php }?>
      </div>
     
  <!--------------------------------------------------------------- APPROVAL MODAL------------------------------------------------------>
<div class="modal fade" id="delete4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 300px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"> Leave Request</h4></center>
            </div>
            <form method="post">
            <div class="modal-body">  
              <p class="text-center">Are you sure you want to Approve the leave Request</p>
             
                  <input type="text" class="id" style="width: 150px" name="apply_leave_request_Id"hidden>
                  <input type="text" class="Applied_Employee_Id" style="width: 150px" name="Applied_Employee_Id"hidden>
                  <input type="text" class="Company_Id" style="width: 150px" name="Company_Id" hidden>
                  <input type="text" class="Leave_Type" style="width: 150px" name="Leave_Type"hidden>
                  <input type="text" class="Leave_Duration" style="width: 150px" name="Leave_Duration" hidden>
                  <input type="text" class="Leave_Days " style="width: 150px" name="Leave_Days" hidden>
                  <input type="text" class="Leave_Start" style="width: 150px" name="Leave_Start"hidden >
                  <input type="text" class="Leave_End" style="width: 150px" name="Leave_End" hidden>
                  <input type="text" class="" style="width: 250px;margin-left: 10px" name="reasonapproved" placeholder="Reason"  value="OK"hidden>
                      <input type="text" class="Employee_Position" style="width: 250px;margin-left: 10px" name="approver_position" placeholder="Reason" hidden>
                  <?php foreach ($ret as $ap) {?>

                  <input type="text" class="" style="width: 150px" name="approver" value="<?php echo $ap['Employee_FirstName'],' ',$ap['Employee_MiddleInitial'],' ' ,$ap['Employee_LastName']; ?> " hidden>
                  <?php }?>
                  <input type="text" style="width: 150px" name="Leave_Status" value="Approved" hidden>
            
           </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" >No</button>
                <button type="submit"  class="btn btn-success" name="grantrequest"> Yes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-------------------------------------------------END MODAL---------------------------------------------------------------------->
 <!---------------------------------------------------DISAPPROVE MODAL------------------------------------------------------------>
 <div class="modal fade" id="delete5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width: 300px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"> Disapproved Leave Request</h4></center>
            </div>
            <form method="post">
            <div class="modal-body">  
              <p class="text-center">Please Click Yes to Continue....</p>
             
                  <input type="text" class="id" style="width: 150px" name="apply_leave_request_Id"hidden>
                  <input type="text" class="Applied_Employee_Id" style="width: 150px" name="Applied_Employee_Id"hidden>
                  <input type="text" class="Company_Id" style="width: 150px" name="Company_Id" hidden>
                  <input type="text" class="Leave_Type" style="width: 150px" name="Leave_Type"hidden >
                  <input type="text" class="Leave_Duration" style="width: 150px" name="Leave_Duration" hidden>
                  <input type="text" class="Leave_Days " style="width: 150px" name="Leave_Days" hidden>
                  <input type="text" class="Leave_Start" style="width: 150px" name="Leave_Start"hidden >
                  <input type="text" class="Leave_End" style="width: 150px" name="Leave_End" hidden>
                  <input type="text" class="" style="width: 250px;margin-left: 10px" name="reasondisapproved" placeholder="Reason" >
                  <input type="text" class="Employee_Position" style="width: 250px;margin-left: 10px" name="approver_position" placeholder="Reason" hidden>
                  <?php foreach ($ret as $ap) {?>

                  <input type="text" class="" style="width: 150px" name="approver" value="<?php echo $ap['Employee_FirstName'],' ',$ap['Employee_MiddleInitial'],' ' ,$ap['Employee_LastName']; ?>" hidden>
                         <?php }?>
                          <input type="text" style="width: 150px" name="Leave_Status" value="Disapproved" hidden>
          
            
           </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit"  class="btn btn-success" name="disapproved"> Yes</button>
            </div>
        </form>
        </div>
    </div>
</div>    

<!------------------------------------------------------END MODAL----------------------------------------------------------------------->      
   <!---------------------------------------------------FORWARD LEAVE MODAL------------------------------------------------------------>
 <div class="modal fade" id="leaveforward" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 300px">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"> Forward Leave Request</h4></center>
            </div>
            <form method="post">
            <div class="modal-body">  
              <p class="text-center">Forward To :</p>
                  <input type="text" style="width: 150px" name="Leave_Status" value="Waiting for approval" hidden>
                  <input type="text" class="id" style="width: 150px" name="apply_leave_request_Id"hidden>
                  <input type="text" class="Applied_Employee_Id" style="width: 150px" name="Applied_Employee_Id"hidden>
                  <input type="text" class="Company_Id" style="width: 150px" name="Company_Id" hidden>
                  <input type="text" class="Leave_Type" style="width: 150px" name="Leave_Type"hidden>
                  <input type="text" class="Leave_Duration" style="width: 150px" name="Leave_Duration" hidden>
                  <input type="text" class="Leave_Days " style="width: 150px" name="Leave_Days" hidden>
                  <input type="text" class="Leave_Start" style="width: 150px" name="Leave_Start" hidden>
                  <input type="text" class="Leave_End" style="width: 150px" name="Leave_End" hidden>
                   <?php foreach ($ret as $emp) {?>   
                  <?php foreach ($forward as $ap) {?>

                    <?php if ($emp['Company_Id'] == $ap['Company_Id']) {?>
                            <?php if ($ap['Employee_MiddleInitial'] != $emp['Employee_MiddleInitial'] ||$ap['Employee_FirstName'] != $emp['Employee_FirstName'] ||$ap['Employee_LastName'] != $emp['Employee_LastName'] || $ap['Employee_Suffix'] != $emp['Employee_Suffix']  ) {?>  
                              <label><?php  echo $emp['Employee_Position']?></label>
                      <div class="checkbox" style="margin-left: 30px">
                          <label><input type="checkbox" value="<?php echo $ap['Employee_Id']?>" name="Forward_To"><?php echo $ap['Employee_FirstName'],' ',$ap['Employee_MiddleInitial'],' ',$ap['Employee_LastName'],' ',$ap['Employee_Suffix'] ; ?> <input type="text" style="width: 150px" name="foward_id" value="<?php echo $ap['Employee_Id']  ?>"hidden></label>
                        </div>
                     <?php }?>

                     <?php }?>
                   <?php }?>
         
               
              <?php }?>
                  <?php foreach ($ret as $ap) {?>
       
                  <input type="text" class="" style="width: 150px" name="approver" value="<?php echo $ap['Employee_FirstName'],' ',$ap['Employee_MiddleInitial'],' ' ,$ap['Employee_LastName']; ?>" hidden>
                       <?php }?> 
          
           </div>
            <div class="modal-footer">
               
                <button type="submit"  class="btn btn-success" name="send">Send</button>
            </div>
        </form>
        </div>
    </div>
</div>    

<!------------------------------------------------------END MODAL----------------------------------------------------------------------->     <!---------------------------------------------------VIEW LEAVE MODAL------------------------------------------------------------>
 <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 300px">
        <div class="modal-content" >
           <div class="modal-header" style="height:55px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title " id="myModalLabel" style="padding-top:-20px">Employee Leave Profile</h4></center>
         </div>
             <div class="modal-body" > 
                        <h6>Employee Id No :</h6>
                        <h6>First Name :</h6>
                        <h6>Last Name :</h6>
                        <h6>Middle Initial :</h6>
                        <h6>Department :</h6>
                        <h6>Position :</h6>
                        <h6>Leave Type Applied :</h6>
                        <h6>Leave Type Duration :</h6>
                        <h6>Leave Start :</h6>
                        <h6>Leave End :</h6>
                        <h6>Total Leave Days :</h6>
                        <h6>Leave Reason :</h6>
                        <h6>Leave Status :</h6>
                         <h6>Date Time applied :</h6>
                          <div style="float: right; text-align: right;margin-right: 10px;margin-top: -335px">
                           <h6 class="Employee_Id"></h6>
                           <h6 class="Employee_FirstName"></h6>
                           <h6 class="Employee_LastName"></h6>
                           <h6 class="Employee_MiddleInitial"></h6>
                           <h6 class="Employee_Department"></h6>
                           <h6 class="Employee_Position"></h6>
                           <h6 class="Leave_Type"></h6>
                           <h6 class="Leave_Duration"></h6>
                           <h6 class="Leave_Start"></h6>
                           <h6 class="Leave_End"></h6>
                           <h6 class="Leave_Days"></h6>
                           <h6 class="Leave_Reason"></h6>
                           <h6 class="Leave_Status"></h6>
                           <h6 class="Leave_time_request"></h6>
                          
                          </div>
           </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-success" data-dismiss="modal"> close</button>
            </div>
        </div>
    </div>
</div>    

<!------------------------------------------------------END MODAL----------------------------------------------------------------------->       
          </div>
        </div>
      </div>
</body>
</html>
<script src="app.js"></script>
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