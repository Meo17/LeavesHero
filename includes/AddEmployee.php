<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee </title>
 <?php include 'includes/header.php'?>
 
   <link rel="stylesheet" href="css/alert.css">
  <script type="text/javascript" src="gulpfile.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 276px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">
        
        <li ><a href="companydashboard.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Customize</a></li>
  

        <li class="active"><a href="companyaddemployee.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>
        <li><a href="companyemployeerecord.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee Record</a></li>
        <li><a href="leaveapplication.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon-inbox"><i  class="glyphicon glyphicon-bell">
          <span class="badge badge-warning" id="badge1"style="margin-left:-20px;font-size:11.7px;margin-top:-15px">
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>

           </i>      
         </span>Leave Request
        </a>
        </li>
  
        <li><a href="CompanyHR_Report.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class=" fa fa-area-chart"></i></span>Anaytical Report</a></li>
        <li><a href="CompanyHR_Holiday_Calendar.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="glyphicon glyphicon-calendar"></i></span>View Calendar's Holiday</a></li>
        <li><a href="companybillingaccount.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="fa fa-paypal"></i></span>Subscription Payment</a></li>

      </ul><br>
    </div>
    <br>
    <div class="col-sm-10 " style="float: right;background-color: #fff;margin-left: 10px;">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1700px;margin-left: 281px;background-color: white">
        <div class="container " style="width:auto;float: left;margin-top: 10px">
   
          <h5><b>Create Employee's Account</b></h5>
        </div>

           <input type="hidden" class=" form-control hidden"   id="userKey" style="width: 250px"  >
           <input type="hidden" class=" form-control hidden"   id="userid" style="width: 250px"  >
           <input type="hidden" class=" form-control　hidden"  id="comuserskey" style="width: 250px">
           <input type="hidden" class=" form-control hidden"   id="photourl" style="width: 250px">
            <input type="hidden" class=" form-control "   id="addleavesummarykey" style="width: 250px">

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
          <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()"style="width: 155s0px">
        </div>
      </div>
<?php require'includes/ModalEditCompanyProfile.php';?>

        <!--ADD EMPLOYEEE'S ACCOUNT -->
 
      <div class="row"  style="width:;width:auto;">
        <div class="col-sm-12"style="width: auto;">
          <div class="well" style="height:auto;padding-bottom: 50px;width: auto;"> 
       
             <form  method="POST">  
                 <div class="container" style="width: auto;border-bottom: 2px solid #ccc;width: auto;">
                  <h5 style="float: left;"><b>Personal Information</b></h5>
   
                   <div style="padding-left: 20px; float: right;padding-top: 5px">
                     <button type="submit" name="createaccount" style="line-height: 1;font-size: 14px" class="btn btn-leave btn-hover-white btn-sm"   id="addemployee" onclick="hulla.send('Successfully Add Employee', 'success')">Create  Account</button>
                      </div>  
                  </div>
                  <br>
                  <div class="container" style="width: auto;" >
                    <div class="form-inline" >
                      <div class="form-group"  >
                        <p>Family Name</p>
                          <input type="hidden" name="sender" value="leaveshero@gmail.com">
                        <input type="hidden" name="pass" id="pass">
                        <input type="hidden" name="emopserid" id="pass">
                        <input type ="text"  name ="familyname" id="familyname" class="form-control" required>
                      </div>
                      <div class="form-group"  style="margin-left: 30px">
                        <p>Given Name</p>
                        <input type="text" name="givenname"class="form-control" id="givenname">
                      </div>
                      <div class="form-group" style="margin-left: 30px" required>
                          <p>Middle Initial</p>
                        <div style="padding-left: 20px">
                          <input type="text"  name="middleinitial" class="form-control" id="middleinitial" style="width: 50px;">
                        </div>
                      </div>
                       <div class="form-group" style="margin-left: 30px">
                        <p>Suffix</p>
                        <input type="text" name="suffex" class="form-control" id="suffix" style="width: 40px">
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
                document.getElementById('age').value = age;
                  };
                                  
                  </script>
                    <div class="form-inline"  >
                      <div class="form-group"  >
                        <p>Sex</p>
                        <select id="gender" class="form-control" name="gender" style="height: 28px" required>
                        <option disabled selected>Sex</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>

                     <div class="form-group"  style="padding-top: 10px;padding-left: 25px">
                        <p>Marital Status</p>
                        <select id="maritalstatus"class="form-control" name="maritalstatus" style="height: 28px"required>
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
                        <input type="text" class="form-control" name="religion" id="religion">
                    </div>
                     <div class="form-group" style="padding-left: 25px;">
                        <p>Email Address</p>
                        <input type="text" class="form-control" name="emailyou" id="empemail"style="width:270px "required >
                    </div>
                    <div class="form-inline" >
                        <div class="form-group" style="padding-top: 10px">
                        <p>Address</p>
                        <input type="text" class="form-control" name="address"  id="address"style="width: 380px">
                        </div>
                        <div class="form-group" style="padding-top: 10px;padding-left: 25px">
                        <p>Contact Person</p>
                        <input type="text"  name="contactperson"class="form-control" id="contactperson"style="width: 244px">
                        </div>
                        <div class="form-group" style="padding-top: 10px;padding-left: 25px">
                        <p>Contact Person's Number</p>
                        <input type="text" name="contactpersonsnumber"id="contactpersonsnumber"class="form-control" >
                        </div>
          
                   </div>
                      <p style="color: #ff0000;padding-top: 20px;">* Add your contact *</p>
                 <div class="form-inline"  style="">
                       <div class="form-group" style="padding-top: 10px">
                        <p>Contact Number 1</p>
                        <input type="text" name="contactnumber1" id="contactnumber1"class="form-control"required >
                       </div>

                  </div>
                     <br>
           
                  <div class="container" style="border-bottom: 2px solid #ccc;width: 1130px;width: auto;">
                     <h5 style="float: left;">Current Position</h5>

                  </div>
                  <br>
                  <div class="form-inline"  >
                      <div class="form-group" style="padding-top: 10px">
                          <p>Employee ID</p>
                          <input type="text" name="employeeid" class="form-control" id="employeeid" >
                      </div>
                     <div class="form-group" style="margin-left: 30px">
                          <p>Department</p>
                          <select id="department"class="form-control" name="department" style="height: 28px;width: 300px"required>
                             <option disabled selected>Department</option>
                         </select>
                      </div>
                      <div class="form-group" style="margin-left: 30px">

                          <p>Position</p>
                        <select id="position"class="form-control" name="position" style="height: 28px;width: 300px"required>
                         <option disabled selected>Employee Position</option>
                         </select> 
                      </div>
                      <div class="form-group" style="margin-left: 30px">
                        <br>
                          <p>Branch</p>
                          <select id="branch"class="form-control" name="branch" style="height: 28px;width: 300px;"required>
                                 <option disabled selected>Company Branch</option>
                          </select> 

                          <input type="text" name="branch"class="form-control hidden" id="shufflepassword" value="<?php  $chars    = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
                       $password = substr(str_shuffle( $chars ), 0, 6 );
                       echo $password; ?>;" >
                      </div>
                      <div class="form-group" style="margin-left: 30px">
                        <br>
                          <p>Employment Status</p>
                        <select id="employmentstat"class="form-control" name="employmentstat" style="height: 28px;width: 300px;"required>
                              <option disabled selected>Status</option>
                              <option>Casual Employment</option>
                              <option>Appentices or Trainee</option>
                              <option >Employment Agency Staff</option>
                              <option >Contractors and Sub-contractors</option>
                              <option >Project Employement</option>
                              <option >Term or Fixed Employment</option>
                              <option>Seasonal Employment</option>
                            
                         </select> 
                      </div> 
                  </div>
                <div class="container" style="width: 1130px;border-bottom: 2px solid #ccc;width: auto;">
                   <h5 style="float: left;">Joining Details</h5>
               </div>
                  <br>
                  <div class="form-inline" >
                      <div class="form-group" style="padding-top: 10px">
                        <p>Hired Date</p>
                        <input type="date" name="datehired"class="form-control" id="datehired" style="height: 50px">
                              <input type="hidden" name="not"class="form-control" value="not" style="height: 50px">
                  
                    </div>

                 </div>
          <!--          <a href="#mydiv"type="button" class="btn button  btn-circle navbar-fixed-bottom btn-lg "  style="font-size: 12px;float: right;margin-top: 200px;margin-left: 1170px;background-color: #00cc99 ;opacity: 0.6;"><i class="glyphicon glyphicon-chevron-up" id="lastclicked"></i></a>   -->
               </div>
             </div>
           </div>
        </form>
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
</style>
</body>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
</html>
 <?php include 'includes/script.php'?>
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
