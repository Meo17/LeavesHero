<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
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
        <li class="active"><a href="companyaddemployee.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>
        <li><a href="companyemployeerecord.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee Record</a></li>
        <li><a href="leaveapplication.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon-inbox"><i  class="glyphicon glyphicon-bell">
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
        </a></li>
  
        <li><a href="CompanyHR_Report.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class=" fa fa-area-chart"></i></span>Anaytical Report</a></li>
        <li><a href="CompanyHR_Holiday_Calendar.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="glyphicon glyphicon-calendar"></i></span>View Calendar's Holiday</a></li>
        <li><a href="companybillingaccount.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="fa fa-paypal"></i></span>Subscription Payment</a></li>
    <?php }?>
      </ul><br>
    </div>
    <br>
    <div class="col-sm-10 " style="float: right;background-color: #f1f1f1;margin-left: 10px">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1050px;margin-left: 211px;background-color: white">
        <div class="container " style="width:auto;float: left;margin-top: 10px">
          <?php foreach($ret as $u ) {?>
   
          <h5><b>Create Employee's Account</b></h5>
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
  
 
      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px"id="mydiv">
        <div class="col-10" style="padding-top: 45px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()"style="width: 1000px">
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

        <!--ADD EMPLOYEEE'S ACCOUNT -->
 
      <div class="row" >
        <div class="col-sm-12">
          <div class="well" style="height:auto;padding-bottom: 50px"> 
          <form method="post">  
          
                 <div class="container" style="width: 916px;border-bottom: 2px solid #ccc">
                  <h5 style="float: left;"><b>Personal Information</b></h5>
                    <div style="padding-left: 20px; float: right;padding-top: 5px">
                     <button type="submit" name="createaccount" style="line-height: 1;font-size: 10px" class="btn btn-leave btn-hover-white btn-sm" data-target="#myModalLogIn" >Create Account</button>
                      </div>
                 </div>
                  <br>
                  <div class="container" style="width: 948px;" >
                    <div class="form-inline" >
                      <div class="form-group"  >
                        <p>Family Name</p>
                          <input type ="text"  name ="companyid" class="form-control hidden"value="<?php echo $com['Company_Id']?>" >
                  
                        <input type ="text"  name ="familyname" class="form-control" required>
                      </div>
                      <div class="form-group"  style="margin-left: 30px">
                        <p>Given Name</p>
                        <input type="text" name="givenname"class="form-control">
                      </div>
                      <div class="form-group" style="margin-left: 30px" required>
                          <p>Middle Initial</p>
                        <div style="padding-left: 20px">
                        <input type="text"  name="middleinitial" class="form-control"  style="width: 50px;">
                      </div>
                      </div>
                       <div class="form-group" style="margin-left: 30px">
                        <p>Suffix</p>
                        <input type="text" name="suffex" class="form-control" id="pwd" style="width: 40px">
                      </div>
                      <div class="form-group"  style="margin-left: 30px">
                        <p>Birthdate</p>
                        <input type="date"style="height: 40px" name="birthdate" class="form-control" id="date"onblur="getAge();"required>
                      </div>  
                       <div class="form-group" style="margin-left: 30px">
                        <p>Age</p>
                        <input style="width: 100px"type="text" name="age"class="form-control" id="age" style="width: 40px" placeholder="Age" disabled>
                      </div> 
                  <script type="text/javascript">
                 
                 function getAge(){
                var dob = document.getElementById('date').value;
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                document.getElementById('age').value=age;
                  };
                                  
                  </script>
                    <div class="form-inline"  >
                      <div class="form-group"  >
                        <p>Gender</p>
                        <select class="form-control" name="gender" style="height: 28px" required>
                        <option disabled selected>Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                      </select>
                    </div>

                     <div class="form-group"  style="padding-top: 10px;padding-left: 25px">
                        <p>Marital Status</p>
                        <select class="form-control" name="maritalstatus" style="height: 28px"required>
                        <option disabled selected>Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Separated">Separated</option>
                        <option value="Widowed">Widowed</option>
                      </select>
                    </div>
                    <div class="form-group" style="padding-left: 25px;">
                        <p>Religion</p>
                        <input type="text" class="form-control" name="religion">
                    </div>
                     <div class="form-group" style="padding-left: 25px;">
                        <p>Email Address</p>
                        <input type="text" class="form-control" name="email"style="width:270px "required >
                    </div>
                    <div class="form-inline" >
                        <div class="form-group" style="padding-top: 10px">
                        <p>Address</p>
                        <input type="text" class="form-control" name="address"  style="width: 380px">
                        </div>
                        <div class="form-group" style="padding-top: 10px;padding-left: 25px">
                        <p>Contact Person</p>
                        <input type="text"  name="contactperson"class="form-control" style="width: 244px">
                        </div>
                        <div class="form-group" style="padding-top: 10px;padding-left: 25px">
                        <p>Contact Person's Number</p>
                        <input type="text" name="contactpersonsnumber" class="form-control" >
                        </div>
          
                   </div>
                      <p style="color: #ff0000;padding-top: 20px;">* Add atleast 3 contact numbers *</p>
                 <div class="form-inline"  style="">
                       <div class="form-group" style="padding-top: 10px">
                        <p>Contact Number 1</p>
                        <input type="text" name="contactnumber1" class="form-control"required >
                       </div>
                       <div class="form-group"style="margin-left: 30px">
                        <p>Contact Number 2</p>
                        <input type="text" name="contactnumber2" class="form-control" >
                       </div>
                            <div class="form-group" style="margin-left: 30px">
                        <p>Contact Number 3</p>
                        <input type="text" name="contactnumber3" class="form-control" >
                       </div>
                  </div>
                     <br>
           
                  <div class="container" style="width: 916px;border-bottom: 2px solid #ccc">
                     <h5 style="float: left;">Current Position</h5>
                  </div>
                  <br>
                  <div class="form-inline"  >
                      <div class="form-group" style="padding-top: 10px">
                          <p>Employee ID</p>
                          <input type="text" name="employeeid" class="form-control" >
                      </div>
                     <div class="form-group" style="margin-left: 30px">
                          <p>Department</p>
                          <input type="text" name="department" class="form-control" >
                      </div>
                      <div class="form-group" style="margin-left: 30px">
                          <p>Position</p>
                          <input type="text" name="position"class="form-control" >
                      </div>
                      <div class="form-group" style="margin-left: 30px">
                          <p>Branch</p>
                          <input type="text" name="branch"class="form-control" >
                      </div>
                  </div>
                          <div class="container" style="width: 916px;border-bottom: 2px solid #ccc">
                          <h5 style="float: left;">Joining Details</h5>
                          </div>
                  <br>
                  <div class="form-inline" >
                      <div class="form-group" style="padding-top: 10px">
                        <p>Hired Date</p>
                        <input type="date" name="datehired"class="form-control"  style="height: 50px">
                    </div>

                 </div>
                   <a href="#mydiv"type="button" class="btn button  btn-circle navbar-fixed-bottom btn-lg "  style="font-size: 12px;float: right;margin-top: 200px;margin-left: 1170px;background-color: #00cc99 ;opacity: 0.6;"><i class="glyphicon glyphicon-chevron-up" id="lastclicked"></i></a>  
               </div>
             </div>
           </div>
        </form>
          </div>
        </div>
          <?php require 'ModalEditCompanyProfile.php'?>
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
</style>
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
 $('.button').click(function() {
  $('#lastclicked').text(this.textContent);
});

$('.button-x').click(function(e) { // Passes the event to the function to allow the prevent default function.
  e.preventDefault();
  $('#lastclicked').text(this.textContent);
});
  
</script>