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
                  <li ><a href="EmployeeLeaveApplication.php? id=<?php echo $em['Employee_Id']?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay aqua-hover"></span>Leave Request
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
          <li class="active" ><a href="EmployeeLeaveRecord.php?id=<?php echo $em['Employee_Id']?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-th-list"></span>Leave Record</a></li>
          <li  ><a href="EmployeeCalendar.php? id=<?php echo $em['Employee_Id']?>" class="aqua-hover " style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span    class="design glyphicon-calendar "></span>Calendar</a></li>
       <?php }?>
      </ul><br>
    </div>
    <br>
    
      <div class="col-sm-10" style="float: right;background-color: #f1f1f1;margin-left: 10px">
      <div class="container navbar-fixed-top  " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1050px;margin-left: 214px;background-color: white">
        <div class="container" style="width:auto;float: left;width: auto;margin-top: 10px">
            <?php foreach($ret  as $em ) {?>  
          <h5> <b><?php echo $em['Company_Name']; ?></b>  </h5>
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
      </
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
              <h5 style="float: left;"><b>Your Leave Application Record</b></h5><br>
               <table class="table table-hover" style="table-layout: fixed;overflow-x: auto;width:1000px;">
              <thead>
                <tr>
                  <th style="font-size: 12px">Leave Type Applied</th>
                  <th style="font-size: 12px">Leave Duration</th>
                  <th style="font-size: 12px">Total Leave Day Applied</th>
                  <th style="font-size: 12px">Date Start Leave Applied</th>
                  <th style="font-size: 12px">Date End Leave Applied</th>
                  <th style="font-size: 12px">Employee Approver Name</th> 
                  <th style="font-size: 12px">Date Time Approved</th>
                  <th style="font-size: 12px">Leave Status</th>
                </tr>
            </thead>
            <?php foreach ($request as $row) {?>
          <tbody id="record">
              <tr>
               
                  
                  <td style="font-size: 10px"><?php echo $row['Leave_Type']?></td>
                  <td style="font-size: 10px"><?php echo $row['Leave_Duration']?></td>
                  <td style="font-size: 10px"><?php echo $row['Leave_Days']?></td>
                  <td style="font-size: 10px"><?php echo $row['Leave_Start']?></td>
                  <td style="font-size: 10px"><?php echo $row['Leave_End']?></td>
                  <td style="font-size: 10px"><?php echo $row['Approved_By']?></td>
                  <td style="font-size: 10px"><?php echo date(' l - d M Y, g:i A', strtotime($row['Date_Time_approved']))?></td>
                  <td style="font-size: 10px"><?php echo $row['Leave_Status']?></td>
                  <td>           
                      <?php if ($row['Leave_Status'] == 'Disapproved'){ ?>
                       <button  class="btn btn-outline-success btn-sm  reapply" data-id="<?php echo $row['apply_leave_request_Id']; ?>"style="font-size: 10px;width: 90px" >Reapply</button>  
                       <?php }?>   
                  </td>
              
              </tr>
                    <?php }?>
            </tbody>
<!-------------------------------------Rea Apply Leave----------------------------------------------------------------------->

<div class="modal bounceIn" id="reapply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px">
        <div class="modal-content">
            <div class="modal-header" style="height:55px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h3 class="modal-title Leave_Type" id="myModalLabel" style="padding-top:-20px"></h3></center>
         </div>            
         <div class="modal-body" style="height: 700px;">  
                     <form   enctype="multipart/form-data" method="POST">
                         <input type="text" id="id1" name="time" hidden >
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Family Name</label>
                                  <input type="text" class="Leave_Type" name="leavetype" >
                                   
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
                                    <input type="date"  class="form-control Leave_Start" name="end" style="width: 300px">
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Approver</label>
                                    <!---------TEMPORARY LEAVE APPROVER----------------->
                                     <input type="text" class="Approver_Name "  name="approver" readonly >
                                    
                                     <!---------TEMPORARY LEAVE APPROVER----------------->
                                </div>
                                 <div class="md-form" style="margin-left: 30px">
                                    <label style="margin-top: -20px">Reason</label>
                                    <textarea class="form-control" rows="5" name="reason"></textarea>
                                </div>
                                <div class="md-form" style="margin-left: 30px">
                                   <b> <label style="margin-top: -20px">Supporting Document</label></b>
                                     <input type="file"  name="file" style="width: 300px;margin-top: 20px" multiple>
                               </div>
                                <div class="md-form" style="margin-left: 30px">                      
                              <button  name="resendapply" type="submit" class="btn btn-default "style="float: right;"><span style="margin-right: 10px"class="glyphicon glyphicon-send"　></span> Submit </button>
                              
                               <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;"><span style="margin-right: 10px" class="glyphicon glyphicon-remove"></span> Cancel</button>
                               </div>
                </form>
              </div>
               
        </div>
    </div>
</div>       
   <!------------------------End ReApply Leave--- Modal-------------------------------------------------------------------->     
   
           </table>
      
            </div>
 
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

<script>

$(document).ready(function(){  
           $('#dsearch').keyup(function(){  
                search_table($(this).val());  
           });  
 
           function search_table(value){  
                $('#record ').each(function(){  
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