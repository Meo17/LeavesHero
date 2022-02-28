<!DOCTYPE html>
<html  lang="en">
<head>
  <title>Employee Dashboard </title>
 <?php include 'includes/empheader.php'?>
    <link rel="stylesheet" href="css/alert.css">
<script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
<script type="text/javascript">
   (function(){
      emailjs.init("user_MJ3tlDkyLRQyFLgse5gAY");
   })();
</script>
</head>
<body id="body">

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 211px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

        <li class="active"  ><a href="companyemployeedashboard.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-home"></span>Home</a></li>   
          <li  ><a href="employeeleavebalance.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub "></span>Leave Balance</a></li>
         <li  id="leaverequestnav" ><a href="EmployeeLeaveApplication.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay aqua-hover"></span>
          Leave Request<span class="badge badge-warning" id="badge1"style="margin-left:2px;font-size:11.7px;margin-top:-9px">
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
            <input type="hidden" class=" form-control  "   id="userKey" style="width: 250px"  >
            <input type="text" class=" form-control hidden "   id="userid" style="width: 250px"  >
            <input type="text" class=" form-control hidden "   id="refuserkey" style="width: 250px"  >
           <input type="text" class=" form-control hidden "   id="photourl" style="width: 250px"  >
            <input type="hidden" id="empid">
              <input type="hidden" class=" form-control "   id="emppassword" style="width: 250px" >
       

             <input type="text" class=" form-control hidden"   id="empkey" style="width: 250px">
             <input type="text" class=" form-control hidden"   id="fullname1" style="width: 250px">
 
             <input type="text" class=" form-control hidden"  id="empuserskey" style="width: 250px"  >  
             <input type="hidden" id="empuid">
             <input type="hidden" id="empidno1">
             <input type="hidden" id="email_id">
  
        <!--top navbar/ right side-->
         
        <div class="dropdown  loggedin-div" id="user_div"style="float: right;top:15px;margin-right: 30px">
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


   <div class="col-sm-12">       
        <div class="row">
          <div class="col-sm-8" style="height: 600px;width:400px ;margin-right: 10px; background-color:#fff">

              <img src="images/icon_user.png" id="profile2"style="width: 150px;height: 150px;margin-top: 20px;margin-left: 16px">
                 <h3> <b id="fullname1"></b></h3>
                  <input type ="hidden"    id="empkey" class="form-control" required >
                  <div>
                    <b>Fullname   : </b> <b id="fullname3" style="margin-left: 40px"></b><br>
                    <b>ID number  : </b> <b id="idno"style="margin-left: 33px"></b><br>
                    <b>Department : </b> <b id="empdepartment"style="margin-left: 24px"><br>
                  </div>

  <button type="button" class="btn btn-leave hidden" style="font-size: 12px; margin-right: 200px;margin-top: 20px;background-color:#00cc99 ; float: right;" data-toggle="modal" data-target="#myModal" ><i class="glyphicon glyphicon-pencil" id="edit-btn" style="padding-right: 10px;"></i>Change Profile/ Password</button> 

  <button type="button" class="btn btn-leave" style="font-size: 12px; margin-right:170px;margin-top: 20px;background-color:#00cc99 ; float: right;width: 200px" data-toggle="modal" data-target="#editmodalprofile"onclick="display()"><i class="glyphicon glyphicon-pencil" id="edit-btn" style="padding-right: 10px;"></i>Edit Information</button>
            
          </div>



          <div class="col-sm-4" style="width: 500px;margin-top: 10px;height: 600px">
              <div class="well" style="height: 650px ;width: auto;width: 570px;height: 600px">
                <div class="container" style="width: 530px;border-bottom: 2px solid #ccc;text-align: center;">
                <h5 style="text-align: center;"><b style="text-align: center;">Other Information</b></h5>

            


              </div>
    
      <div>
                  <input type ="hidden" id="empkey" class="form-control" required >
                 <div style="margin-left: 50px;margin-top: 20px">
                     <b>Address : </b> <br>
                     <b>Contact : </b> <br>
                     <b>Email Address </b> <br>
                     <b>Birthdate : </b> <br>
                     <b>Age : </b> <br>
                     <b>Sex : </b>     <br> 
                     <b>Marital Status : </b>   <br>
                     <b>Religion : </b><br>
                     <b>Department : </b> <br>       
                     <b>Position : </b>   <br>  
                     <b>Date Hired :</b>  <br>     
                     <b>Branch:</b>  <br>     
                     <b>Emergency Contact Person:</b>  <br>      
                     <b>Contact Number :</b>   <br>    
                     
                     <div style="float: left;margin-top: -278px;padding-left: 250px">
                       
                         <b id="address1"></b><br>
                         <b id="contact1"></b><br>
                         <b id="email1" style="word-wrap: break-word;"></b><br>
                         <b id="bdate"></b><br>
                         <b id="age"></b><br>
                         <b id="sex"></b><br>
                         <b id="maritalstatus"></b><br>
                         <b id="religion"></b><br>
                         <b id="department"></b><br>
                         <b id="position"></b><br>
                         <b id="datehired"></b><br>
                         <b id="Branch"></b><br>
                         <b id="contactperson"></b><br>
                         <b id="contactpersonnumber"></b><br>

                     </div>
              </div> 
                </div>
         </div>

  <div class="modal fade" id="editmodalprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 600px;height: 1000px">
      
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel">Update Information</h4></center>
                </div>
              <div class="modal-body">  
                <form  method="post" > 
                  <div class="form-inline" style="padding-left: 18px;padding-top: 10px ">
                     <div class="form-group">
                             <p>Family Name</p>
                             <input type ="text"  id="familyname1" class="form-control" required>
                      </div>
                      <div class="form-group"  style="margin-left: 20px">
                             <p>Given Name</p>
                             <input type="text" class="form-control" id="givenname1">
                      </div>
                      <div class="form-group" style="margin-left: 20px" required>
                            <p>Middle Initial</p>
                             <input type="text"   class="form-control" id="middleinitial1" style="width: 50px;">
                      </div>
                       <div class="form-group" style="margin-left: -5px">
                        <p>Suffix</p>
                        <input type="text"  class="form-control" id="suffix1" style="width: 40px">
                      </div>
                      <div class="form-group"  style="margin-left: -2px;padding-top: 5px">
                        <p>Birthdate</p>
                        <input type="date"style="height: 40px" class="form-control" id="date1" onblur="getAge();"required>
                      </div>  
                       <div class="form-group" style="margin-left: 20px">
                        <p>Age</p>
                        <input style="width: 100px"type="text" name="age"class="form-control" id="age" style="width: 40px" placeholder="Age" disabled>
                      </div>
                       <div class="form-group"   style="margin-left: 20px">
                          <p>Sex</p>
                           <select id="gender1" class="form-control" style="height: 28px" required>
                             <option disabled selected>Sex</option>
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                          </select>
                    </div>
                       <div class="form-group"   style="margin-left: 10px">
                           <p>Marital Status</p>
                         <select id="maritalstatus1"class="form-control"  style="height: 28px"required>
                            <option disabled selected>Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Separated">Separated</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>  
                    <div class="form-group"  style="margin-left: 1px;width: auto;">
                        <p>Religion</p>
                        <input type="text" class="form-control"id="religion1">
                    </div>
                     <div class="form-group" style="padding-left: 15px;width: auto;">
                        <p>Email Address</p>
                        <input type="text" class="form-control" id="empemail1"required s>
                     </div>
                       <div class="form-group" style="padding-left: 10px">
                           <p>Contact Number</p>
                          <input type="text" style="width: 130px" id="contactnumber1"class="form-control"required >
                      </div>
    
                    <div class="form-inline" >
                        <div class="form-group" style="padding-top: 10px;width: auto;">
                           <p>Address</p>
                           <input type="text" class="form-control"  id="fulladdress1"style="width: 500px;">
                        </div>
                        <div class="form-group" style="padding-top: 10px">
                          <p>Contact Person</p>
                           <input type="text" class="form-control" id="contactperson1"style="width:120px;width: auto;">
                        </div>
                        <div class="form-group"style="padding-top: 10px;padding-left: 15px">
                           <p>Contact Person's Number</p>
                           <input type="text" id="contactpersonsnumber1"class="form-control" style="width:120px;width: auto;">
                        </div>
                            <div class="container" style="border-bottom: 2px solid #ccc;width: 1130px;width: auto;">
                     <h5 style="float: left;">Current Position</h5>
                  </div>
  
                      <div class="form-group" style="padding-top: 10px;width: auto;">
                          <p>Employee ID</p>
                          <input type="text" class="form-control" id="employeeid1" disabled>
                      </div>
                     <div class="form-group" style="margin-left: 10px;width: auto;padding-top: 10px">
                          <p>Department</p>
                          <input type="text"  class="form-control" id="department1" >
                      </div>
                      <div class="form-group" style="padding-top: 10px;margin-left: 10px">
                          <p>Position</p>
                          <input type="text" class="form-control" id="position1" style="width: 150px">
                      </div>
                      <div class="form-group" style="padding-top: 10px">
                        <p>Hired Date</p>
                        <input type="date" class="form-control" id="datehired1" style="height: 50px">
                             
                      </div>
                      <div class="form-group" style="margin-left: 30px;width: auto;padding-top: 10px">
                          <p>Branch</p>
                          <input type="text" class="form-control"id="branch1" >
                      </div>
                   <div class="container" style="width: 1130px;border-bottom: 2px solid #ccc;width: auto;margin-top: 20px">
                  </div>
                  <br>
                   <div style="margin-left: 203px;width: auto;padding-top: -6px;text-align: center;height: 50px">
                        <button type="submit"id="empsaveupdate" style="line-height: 1;font-size: 13px;margin-right: 100px;float: right;" class="btn btn-leave btn-hover-white btn-sm"   >Save Update</button>
                        <button  type="submit" style="line-height: 1;font-size: 13px;margin-right: 100px;float: left;margin-left:-96px" class="btn btn-leave btn-hover-white btn-sm btn-danger"   id="cancel" >Cancel</button>           
                    </div>

                  </div>
                 
                </form>

                </div>
                  <!----FORCE LEAVE MODAL--------->


          </div>
          
      </div>
  </div>

  
      </div>

    </div>
  </div>
</div>

<a href="#mydiv"type="button" class="btn button  btn-circle navbar-fixed-bottom btn-lg "  style="font-size: 12px;float: right;margin-top: 200px;margin-left: auto;background-color: #00cc99 ;opacity: 0.6;"><i class="glyphicon glyphicon-chevron-up" id="lastclicked"></i></a> 

      
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
<style type="text/css">
  .btn-circle.btn-lg {
  width: 45px;
  height: 45px;
  padding: 13px 14px;
  font-size: 24px;
  line-height: 2;
  border-radius: 30px;
}
#cancel{

    display: none;
  }

#empsaveupdate{

    display: none;
  }

#leaverequestnav{

    display: none;
  }
</style>
</body>
</html>

 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/hullabaloo.js"></script>
 <?php include 'includes/script.php'?>
