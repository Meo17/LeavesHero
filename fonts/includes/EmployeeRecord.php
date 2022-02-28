<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Record</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/css.css">
   <link rel="stylesheet" href="dist/sweetalert.css">
   <link rel="stylesheet" href="materialize/materialize.css">
   <link rel="stylesheet" href="materialize/materialize.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/css/mdb.min.css" />
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>
</head>
  
  <?php require 'css/css4.css'?>
       <!-- Bootstrap Core CSS -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
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

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 230px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">
        <?php foreach($ret as $a ) {?>  
        <li ><a href="companydashboard.php?Company_Id=<?php echo $a["Company_Id"];?>" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Customize</a></li>
       <?php }?>
        <?php foreach($ret as $b ) {?>  
        <li ><a href="companyaddemployee.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>

        <li class="active"><a href="companyemployeerecord.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee Record</a></li>
        <li>
    <a href="leaveapplication.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon-inbox"><i  class="glyphicon glyphicon-bell">
                      <?php if($count==0){
                echo '<span style="padding-left: 10px"class="glyphicon glyphicon-bell hidden"> 4</span>
              ';
              }
              ?>
              <?php if($count!=0){
                echo '<span class="badge badge-warning" style="margin-left:-22px;font-size:11.7px;margin-top:-9px">'.
               '<p style="margin-top:-4px;margin-left:-4px">'.$count.'</p>';
              }?>
          </i >      

            </span>Leave Notifications
          </a>
      </li>
        <li><a href="CompanyHR_Report.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class=" fa fa-area-chart"></i></span>Analytical Report</a></li>
        <li><a href="CompanyHR_Holiday_Calendar.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="glyphicon glyphicon-calendar"></i></span>View Calendar's Holiday</a></li>
        <li ><a href="companybillingaccount.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="fa fa-paypal"></i></span>Subcription Payment</a></li>
    <?php }?>
      </ul><br>
    </div>
    <br>
     <div class="col-sm-10 " style="float: right;background-color: #f1f1f1;margin-left: 10px">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1050px;margin-left: 211px;background-color: white">
        <div class="container " style="width:auto;float: left;margin-top: 10px">
          <?php foreach($ret as $u ) {?>
   
          <h5><b>Employee's Record</b></h5>
        </div>
        <!--top navbar/ right side-->
        <div class="dropdown" style="float: right;top:15px;">
          <img src="icons/<?php echo $u['Company_profile'] ; ?>" style="height: 20px; width: 20px"class="image_upload_preview">
          <a class=" lightgray-hover dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 10px; font-family:'Roboto';"><b><?php echo $u['Company_Name']; ?></b>
              <?php }?> 
            <span class="caret"></span></a>
              <ul class="dropdown-menu">
               <li><a data-toggle="modal" href="#myModal"<?php echo $a["Company_Id"];?>><span class="design icon_edit" style="padding-bottom: 9px;top: 3px"></span>Edit</a></li>
                <li><a href="logout.php?logout"><span class="design icon_out" style="padding-bottom: 9px;top: 3px"></span>Logout</a></li>
             </ul>
        </div>
      </div>
  
 
      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px">
        <div class="col-10" style="padding-top: 45px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()" style="width: 1000px">
        </div>
      </div>

        <!-- Edit Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
    
          <!-- Modal content-->
      
          <div class="modal-content">
            <div class="modal-header" style="border-bottom: 2px solid #ccc">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form  method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <style>
            .image_upload_preview {
              border-radius: 160%;
              height: 100px;
              width: 150px;
            }</style>
              <input type="file" id="inputFile" name="file" accept="image/*" capture style="display:none" ></input>
                <img src="icons/<?php echo $com['Company_profile'] ; ?>"  id="image_upload_preview" style="cursor:pointer;width:100px" class="center image_upload_preview" />
                <div class="form-group" style="padding-top: : 10px">
                     <input type="text" class=" form-control hidden Employee_Id" name="id" value="<?php echo $com['Company_Id']?>">
                   <p>Username</p>
                    
                   <input id="user"type="text" class=" form-control" name="usercom" value="<?php echo $com['Username']?>"style="width: 250px" > 
      
      
                 </div>
                 <div class="form-group">
                   <p>Password</p>
                   <input type="password" class=" form-control"   name="pass" value="<?php echo $com['Password1']?>"style="width: 250px" >

                 </div>
              <div class="form-group">
                  <p>Contact Number</p>
                  <input id="companycontact" type="text" class="form-control"  name="contact" value="<?php echo $com['Company_Contact']?>"style="width: 250px" > 
              </div>
              <div class="form-group">
                  <p>Email Address</p>
                  <input id="email" type="text" class="form-control"  name="email" value="<?php echo $com['Company_Email']?>"style="width: 250px" >
                  
                  
              </div>
              
              
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-leave btn-hover-white" name ="companyedit" >Save</button>
             <button type="submit" class="btn btn-red btn-hover-white" data-dismiss="modal"style="float: left;">Cancel</button>
            </div>
          </form>
    
          </div> 
        </div>
      </div>

      <!--Leave types-->
<div class="row" >
    <div class="col-sm-12"style="height: 900px;">
        <div class="well" style="padding-bottom: 50px"> 
            <div class="container" style="width: auto;height:">
              <ul class="nav nav-tabs">
                  <li class="active"style="width: 479px"><a data-toggle="tab" href="#home"style="color: black;font-size: 17px;text-align: center"><i class="fa fa-close" style="margin-right: 10px"></i><b>Active Accounts</b></a></li>
                  <li style="width: 479px"><a data-toggle="tab" href="#menu1" style="color: black;font-size: 17px;text-align: center"> <i class="fa fa-handshake-o"style="margin-right: 10px"></i><b>Deactive Accounts</b></a></li>

              </ul>
  <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
          <table class="table table-hover" style="table-layout: fixed;overflow-x: auto;width:1000px;">
              <thead>
                <tr>
                  <th style="font-size: 13px">FamilyName</th>
                  <th style="font-size: 13px">GivenName</th>
                  <th style="font-size: 13px">MI</th>
                  <th style="font-size: 13px">Birthdate</th>
                  <th style="font-size: 13px">Gender</th>
                  <th style="font-size: 13px" >Marital Status</th>
                  <th style="font-size: 13px">Religion</th>
                  <th style="font-size: 13px">Email</th>
                  <th style="font-size: 13px;padding-right: 10px">View Details</th>
                   <th style="font-size: 13px;padding-left: 10px">Update</th>
                   <th style="font-size: 13px">Deactivate</th>

                  <th style="font-size: 13px;padding-left: 30px" >Set Approver</th>
                </tr>
            </thead>
          <?php foreach ($record as $row) {?>
          <tbody>
              <tr id="sub">   
               <?php if($row['Employee_Status'] == "Active") {?>        
                  <td style="font-size: 13px"><?php echo $row['Employee_LastName']?></td>
                  <td style="font-size: 13px"><?php echo $row['Employee_FirstName']?></td>
                  <td style="font-size: 13px"><?php echo $row['Employee_MiddleInitial']?></td>
                  <td style="font-size: 13px"><?php echo $row['Employee_Birthdate']?></td>                 
                  <td style="font-size: 13px"><?php echo $row['Employee_Gender']?></td>
                  <td style="font-size: 13px"><?php echo $row['Employee_MaritalStatus']?></td>
                  <td style="font-size: 13px"><?php echo $row['Employee_Religion']?></td>
                  <td style="font-size: 13px;word-wrap: break-word;"><?php echo $row['Employee_Email']?></td>
                  <td style="padding-right: -70px"> 
                    <button class="btn btn-info btn-hover-white btn-sm  viewdata" data-id ="<?php echo $row['ID'];?>" style="font-size:10px;width: 70px">view</button>                    
                </td>
                 <td style="padding-left: 10px"> 
                    <button class="btn btn-warning btn-hover-white btn-sm  updateemp"  data-id ="<?php echo $row['ID'];?>" style="font-size:10px;">Update</button>                    
                </td>
                  <td> 
                    <button class="btn btn-danger btn-hover-white btn-sm   deleteemployee" data-id ="<?php echo $row['ID'];?>"style="font-size:10px">Deactivate</button>                    
                </td>               
                   <form method="post">
                    <td class="hidden"><input type="text" class="input-style3" name="Employee_Id"id="status" value="<?php echo $row['Employee_Id']?>" placeholder="Status" required> 
                    <input type="text" class="input-style3" name="Company_Id"id="status" value="<?php echo $row['Company_Id']?>" placeholder="Status" required>
                  </td>
      
                  <td style="padding-left: 30px">  
                  <button  type="submit"class="btn btn-success btn-hover-white " name="setapprover">Set </button>        
                  </td>
  
                    <?php }?> 
               </form>
             <?php }?>
              </tr>
            </tbody>
           </table>
      </div>
        <div id="menu1" class="tab-pane fade">
               <table class="table table-hover" style="table-layout: fixed;overflow-x: auto;width:1000px;">
              <thead>
                <tr>
                  <th style="font-size: 13px">FamilyName</th>
                  <th style="font-size: 13px">GivenName</th>
                  <th style="font-size: 13px">MI</th>
                  <th style="font-size: 13px">Birthdate</th>
                  <th style="font-size: 13px">Gender</th>
                  <th style="font-size: 13px" >Marital Status</th>
                  <th style="font-size: 13px">Religion</th>
                  <th style="font-size: 13px">Email</th>
                  <th></th>
                  <th></th>
                  <th style="font-size: 13px;padding-right: 10px">View Details</th>

                </tr>
            </thead>

          <?php foreach ($record as $row) {?>
          <tbody>
              <tr id="sub">   
              <?php if($row['Employee_Status'] == "Deactivate") {?>    
                  <td style="font-size: 13px"><?php echo $row['Employee_LastName']?></td>
                  <td style="font-size: 13px"><?php echo $row['Employee_FirstName']?></td>
                  <td style="font-size: 13px"><?php echo $row['Employee_MiddleInitial']?></td>
                  <td style="font-size: 13px"><?php echo $row['Employee_Birthdate']?></td>                 
                  <td style="font-size: 13px"><?php echo $row['Employee_Gender']?></td>
                  <td style="font-size: 13px"><?php echo $row['Employee_MaritalStatus']?></td>
                  <td style="font-size: 13px"><?php echo $row['Employee_Religion']?></td>
                  <td style="font-size: 13px;"><?php echo $row['Employee_Email']?></td>
                  <td></td>
                  <td></td>
                  <td style="padding-right: -70px"> 
                    <button class="btn btn-info btn-hover-white btn-sm  viewdata" data-id ="<?php echo $row['ID'];?>" style="font-size:10px;width: 70px">view</button>                    
                  </td>
                

              <?php }?>
     
              </tr> 
            </tbody>

         <?php }?>
           </table>
      </div>
  </div>          
      


    
<?php require_once 'modalemployeerecord.php'?>

 <script src="app2.js"></script>    
             
          </div>
        </div>
      </div>
</div>

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
  
  
<script>

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