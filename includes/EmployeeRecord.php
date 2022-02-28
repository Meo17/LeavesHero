<!DOCTYPE html>
<html >
<head>
  <title>Employee Record</title>
  <?php include 'includes/header.php'?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.standalone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
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

<div class="container-fluid" >
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 276px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

        <li ><a href="companydashboard.php" class="aqua-hover" style="color:#fff ; padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Customize</a></li>
  

        <li><a href="companyaddemployee.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>
        <li class="active"><a href="companyemployeerecord.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee Record</a></li>
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
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1600px;margin-left: 280px;background-color: white">
        <div class="container " style="width:auto;float: left;margin-top: 10px">

   
          <h5><b>Employee's Record</b></h5>
          <input type="hidden" class=" form-control hidden"   id="userKey" style="width: 250px"  >
          <input type="hidden" class=" form-control hidden"   id="userid" style="width: 250px"  >
          <input type="hidden" class=" form-control　hidden"   id="comuserskey" style="width: 250px">
          <input type="hidden" class=" form-control hidden"   id="photourl" style="width: 250px">
         
        </div>

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
 
      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px">
        <div class="col-10" style="padding-top: 45px">
           <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()" style="width: 1550px">
        </div>
      </div>

    <?php require'includes/ModalEditCompanyProfile.php';?>
<style>
 .view-btn  {
  left: 0px;
  top: 0px;
  z-index: 1;
}
</style>
<div class="row" >
    <div class="col-sm-12"style="height: 900px;">
        <div class="well" style="padding-bottom: 50px"> 
            <div class="container" style="width: auto;height:">
              <ul class="nav nav-tabs">
                  <li class="active"style="width: 50%"><a data-toggle="tab" href="#home"style="color: black;font-size: 17px;text-align: center"><i class="fa fa-close" style="margin-right: 10px"></i><b>Active Accounts</b></a></li>
                  <li style="width: 50%"><a data-toggle="tab" href="#menu1" style="color: black;font-size: 17px;text-align: center"> <i class="fa fa-close"style="margin-right: 10px"></i><b>Deactive Accounts</b></a></li>

              </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <table class="table table-hover" style="table-layout: fixed;overflow-x: auto;width:1450px;" id="table">
                    <thead>
                        <tr>
                            <th style="font-size: 13px;text-align: center">Family Name</th>
                            <th style="font-size: 13px;text-align: center">Given Name</th>
                            <th style="font-size: 13px;text-align: center">MI</th>
                            <th style="font-size: 13px;text-align: center">Birthdate</th>
                            <th style="font-size: 13px;text-align: center">Sex</th>
                        <!--     <th style="font-size: 13px;text-align: center;">Email</th>
                                 -->    
                         </tr>
                      </thead>
                          <tbody id="tbody" class="tbody" >
                            </tbody>
                </table>
            </div>
              <div id="menu1" class="tab-pane fade">
                     <table class="table table-hover" style="table-layout: fixed;overflow-x: auto;width:1450px;" id="deactivatetable">
                    <thead>
                      <tr>
                            <th style="font-size: 13px;text-align: center">Family Name</th>
                            <th style="font-size: 13px;text-align: center">Given Name</th>
                            <th style="font-size: 13px;text-align: center">MI</th>
                            <th style="font-size: 13px;text-align: center">Birthdate</th>
                            <th style="font-size: 13px;text-align: center">Sex</th>
                            <th style="font-size: 13px;text-align: center" >Marital Status</th>
                            <th style="font-size: 13px;text-align: center">Religion</th>
                            <th style="font-size: 13px;text-align: center;">Email</th>
                            <th style="font-size: 13px;text-align: center; width: 100px" >Contact No.</th>
                            <th style="font-size: 13px;padding-right: 10px">View Details</th>

                      </tr>
                  </thead>
                    <tbody></tbody>
                 </table>
               </div>
            </div>          
         </div>
      </div>
   </div>
</div>
<style>


.view-btn{
    display: none;
}
.setapprver-btn{
    display: none;
}
.edit-btn{
    display: none;
}
.delete-btn {
    display: none;
}
.forceleave-btn {
    display: none;
}
.tr:hover  .view-btn { 
  display:block;
}
.tr:hover .setapprver-btn { 
  display:block;
}
.tr:hover .edit-btn { 
  display:block;
}
.tr:hover .forceleave-btn { 
  display:block;
}
.tr:hover  .delete-btn{ 
  display:block;
  z-index: 1;
}
/*.tr {
  position: absolute;
  left: 0px;
  top: 0px;
  z-index: 1;
}*/
.datepicker-days table .disabled-date.day {
background-color: red;
color: #fff;
}
.datepicker table tr td.disabled, 
/*.datepicker table tr td.disabled:hover {
background:#3333331a;
color: #fff;
}*/
</style>
  <!-- UPDATE EMPLOYEE -->
  <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 800px;">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Update Employee's Profile</b></h4></center>
              </div>

            <form method="post">
                 <div class="modal-body">  
                    <div class="container" style="width: 700px;border-bottom: 2px solid #ccc">
                    <h5 style="float: left;"><b>Personal Information</b></h5>
                      <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>

                   </div>
                   <div class="container" style="width: 800px;height: auto;">
                      <div class="form-group" style="margin-left: 45px;margin-top: 10px">
                          <p>Family Name</p>

                          <input type ="text"  id="modal-edit-lname" name ="lname" class="form-control Employee_LastName"  style="width: 200px">
                        </div>
                        <div class="form-group" style="margin-right: 305px;margin-top: -70px;float: right;">
                            <p>First Name</p>
                            <input type ="text" id="modal-edit-fname" name ="fname" class="form-control Employee_FirstName"   style="width: 200px">

                           
                          </div>
                        <div class="form-group" style="margin-right: 245px;margin-top: -70px;float: right;">
                           <p>MI</p>
                            <input type ="text" id="modal-edit-mid"  name ="mi" class="form-control  Employee_MiddleInitial "   style="width: 40px">
                         
                        </div>
                        <div class="form-group" style="margin-right: 180px;margin-top: -70px;float: right;">
                           <p>Suffix </p>
                            <input type ="text"  id="modal-edit-suffix"name ="suffix" class="form-control  Employee_Suffix "   style="width: 40px">
                         
                        </div>
                         <div class="form-group" style="margin-right: 70px;margin-top: -70px;float: right;">
                           <p>Sex</p>
                            <!-- <input type ="text"  id="modal-edit-sex"name ="sex" class="form-control  Employee_Gender "   style="width: 80px"> -->
                              <select id="modal-edit-sex" class="form-control" name="gender" style="height: 28px" required>
                              <option disabled selected>Sex</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                          </select>
                        </div>
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                           <p>Marital Status</p>
                          <!--   <input type ="text" id="modal-edit-maritalstatus" name ="maritalstatus" class="form-control  Employee_MaritalStatus "   style="width: 80px"> -->
                        <select id="modal-edit-maritalstatus"class="form-control" name="maritalstatus" style="height: 28px;width:100px"required>
                              <option disabled selected>Status</option>
                              <option value="Single">Single</option>
                              <option value="Married">Married</option>
                              <option value="Divorced">Divorced</option>
                              <option value="Separated">Separated</option>
                              <option value="Widowed">Widowed</option>
                      </select>
                        </div> 
                        <div class="form-group" style="margin-right: 470px;margin-top: 10px;float: right;">
                          <p>Birthdate </p>
                          <input type ="date" id="modal-edit-bdate" name ="bdate" class="form-control   Employee_Birthdate"   style="width: 150px;padding-bottom: 30px;height: 10px">    
                        </div>

                       <div class="form-group" style="margin-left: 310px;margin-top:-80px;float: left;">
                           <p>Address </p>
                          <textarea type ="text" id="modal-edit-address" name ="address" class="form-control  Employee_Address"   style="width: 230px"> </textarea>  
                        </div>

                        <div class="form-group" style="margin-left: 550px;margin-top:-110px;float: left;">
                           <p>Religion  </p>
                           <input type ="text" id="modal-edit-religion" name ="religion" class="form-control  Employee_Religion "   style="width: 150px">   
                        </div>
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                            <p>Contact1 No. </p>
                            <input type ="text" id="modal-edit-contactno1"name ="contact1" class="form-control  Employee_Contact1 "   style="width: 120px">
                         
                        </div>
    
                         <div class="form-group" style="margin-left: 35px;margin-top: 10px;float: left;">
                            <p>Email </p>
                            <input type ="text"  id="modal-edit-empemail"name ="email" class="form-control  Employee_Email  "   style="width: 210px">
                        </div>  
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                            <p>Contact Person </p>
                            <input type ="text" id="modal-edit-contactperson" name ="contactperson" class="form-control  Employee_ContactPerson "   style="width: 200px">
                         
                        </div>  
                         <div class="form-group" style="margin-left: 35px;margin-top: 10px;float: left;">
                            <p>Contact Person No. </p>
                            <input type ="text" id="modal-edit-contactpersonno" name ="contactpersonno" class="form-control  Employee_ContactPersonNumber "   style="width: 120px">
                         
                        </div>                                                                    

                    </div>   
                    <div class="container" style="width: 700px;border-bottom: 2px solid #ccc">
                        <h5 style="float: left;"><b>Work Information</b></h5>
                        <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>
                   </div>
                        <div class="container">
                          <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>Department </p>
                            <!--   <input type ="text"  id="modal-edit-department"name ="department" class="form-control  Employee_Department "   style="width: 200px"> -->
                            <select id="modal-edit-department"class="form-control" name="maritalstatus" style="height: 28px;width:200px"required>
                              <option disabled selected>Department</option> 
                            </select>
                          </div>
                           <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>Position</p>
                       <!--        <input type ="text" id="modal-edit-position" name ="position" class="form-control  Employee_Position"   style="width: 200px"> -->
                            <select id="modal-edit-position"class="form-control" name="maritalstatus" style="height: 28px;width:200px"required>
                              <option disabled selected>Employee Position</option> 
                            </select>
                          </div>
                             <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>HireDate</p>
                              <input type ="date" id="modal-edit-hiredate" name ="hiredate" class="form-control  Employee_HireDate"   style="width: 200px;width: 150px;padding-bottom: 30px;height: 10px">
                           
                            </div>   
                          <div class="form-group" style="margin-left:-645px;margin-top: 100px;float: left;">
                            <p>Branch </p>
                            <!-- <input type ="text" id="modal-edit-branch"  name ="branch" class="form-control  Branch"   style="width: 120px"> -->
                               <select id="modal-edit-branch"class="form-control" name="maritalstatus" style="height: 28px;width:120px"required>
                              <option disabled selected>Company Branch</option> 
                            </select>
                          </div> 
                           </div> 
                            <input type="hidden" id="student-id" name="sid" value="" />

                           <!-- Confirm Edit Button  -->
                       <div class="modal-footer" style="margin-top: 20px">
                              <label class=" control-label" for="confirm-edit">Confirm Edit :</label>
                           <button id="confirm-edit" name="confirm-edit" type="button" class="btn btn-success"onclick="hulla.send('Successfully Update', 'success')" style="font-size: 10px">Confirm</button>
                        </div>

                 </div>

              </form>


          </div>
      </div>
  </div>
   <!---------------------------------END MODAL----------------------------------------------------------------------->
     <!---------------------------------------------------VIEW Employee MODAL------------------------------------------------------------>
   <div class="modal fade" id="viewdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
           <div class="modal-dialog" style="width: 800px;">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Employee's Profile</b></h4></center>
              </div>

            <form method="post">
                 <div class="modal-body">  
                    <div class="container" style="width: 700px;border-bottom: 2px solid #ccc">
                    <h5 style="float: left;"><b>Personal Information</b></h5>
                      <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>

                   </div>
                   <div class="container" style="width: 800px;height: auto;">
                      <div class="form-group" style="margin-left: 45px;margin-top: 10px">
                          <p>Family Name</p>

                          <input type ="text"  id="modal-edit-lname1" name ="lname" class="form-control Employee_LastName"  style="width: 200px" disabled>
                        </div>
                        <div class="form-group" style="margin-right: 305px;margin-top: -70px;float: right;">
                            <p>First Name</p>
                            <input type ="text" id="modal-edit-fname1" name ="fname" class="form-control Employee_FirstName"   style="width: 200px" disabled>

                           
                          </div>
                        <div class="form-group" style="margin-right: 245px;margin-top: -70px;float: right;">
                           <p>MI</p>
                            <input type ="text" id="modal-edit-mid1"  name ="mi" class="form-control  Employee_MiddleInitial "   style="width: 40px" disabled>
                         
                        </div>
                        <div class="form-group" style="margin-right: 180px;margin-top: -70px;float: right;">
                           <p>Suffix </p>
                            <input type ="text"  id="modal-edit-suffix1"name ="suffix" class="form-control  Employee_Suffix "   style="width: 40px"disabled>
                         
                        </div>
                         <div class="form-group" style="margin-right: 70px;margin-top: -70px;float: right;">
                           <p>Sex</p>
                            <input type ="text"  id="modal-edit-sex1"name ="sex" class="form-control  Employee_Gender "   style="width: 80px"disabled>
                         
                        </div>
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                           <p>Marital Status</p>
                            <input type ="text" id="modal-edit-maritalstatus1" name ="maritalstatus" class="form-control  Employee_MaritalStatus "   style="width: 80px"disabled>
                         
                        </div> 
                        <div class="form-group" style="margin-right: 470px;margin-top: 10px;float: right;">
                          <p>Birthdate </p>
                          <input type ="date" id="modal-edit-bdate1" name ="disabled" class="form-control   Employee_Birthdate"   style="width: 150px;padding-bottom: 30px;height: 10px"readonly>    
                        </div>

                       <div class="form-group" style="margin-left: 310px;margin-top:-80px;float: left;">
                           <p>Address </p>
                          <textarea type ="text" id="modal-edit-address1" name ="address" class="form-control  Employee_Address"   style="width: 230px"disabled> </textarea>  
                        </div>

                        <div class="form-group" style="margin-left: 550px;margin-top:-110px;float: left;">
                           <p>Religion  </p>
                           <input type ="text" id="modal-edit-religion1" name ="religion" class="form-control  Employee_Religion "   style="width: 150px"disabled>   
                        </div>
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                            <p>Contact1 No. </p>
                            <input type ="text" id="modal-edit-contactno1"name ="contact1" class="form-control  Employee_Contact1 "   style="width: 120px"disabled>
                         
                        </div>
    
                         <div class="form-group" style="margin-left: 35px;margin-top: 10px;float: left;">
                            <p>Email </p>
                            <input type ="text"  id="modal-edit-empemail1"name ="email" class="form-control  Employee_Email  "   style="width: 210px"disabled>
                        </div>  
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                            <p>Contact Person </p>
                            <input type ="text" id="modal-edit-contactperson1" name ="contactperson" class="form-control  Employee_ContactPerson "   style="width: 200px"disabled>
                         
                        </div>  
                         <div class="form-group" style="margin-left: 35px;margin-top: 10px;float: left;">
                            <p>Contact Person No. </p>
                            <input type ="text" id="modal-edit-contactpersonno1" name ="contactpersonno" class="form-control  Employee_ContactPersonNumber "   style="width: 120px"disabled>
                         
                        </div>                                                                    

                    </div>   
                    <div class="container" style="width: 700px;border-bottom: 2px solid #ccc">
                        <h5 style="float: left;"><b>Work Information</b></h5>
                        <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>
                   </div>
                        <div class="container">
                          <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>Department </p>
                              <input type ="text"  id="modal-edit-department1"name ="department" class="form-control  Employee_Department "   style="width: 200px"disabled>
                           
                          </div>
                           <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>Position</p>
                              <input type ="text" id="modal-edit-position1" name ="position" class="form-control  Employee_Position"   style="width: 200px"disabled>
                           
                          </div>
                             <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>HireDate</p>
                              <input type ="date" id="modal-edit-hiredate1" name ="hiredate" class="form-control  Employee_HireDate"   style="width: 200px;width: 150px;padding-bottom: 30px;height: 10px"disabled>
                           
                            </div>   
                          <div class="form-group" style="margin-left:-645px;margin-top: 100px;float: left;">
                            <p>Branch </p>
                            <input type ="text" id="modal-edit-branch1"  name ="branch" class="form-control  Branch"   style="width: 120px"disabled>
                          </div> 
                           </div> 
                  <div class="container" style="width: 700px;border-bottom: 2px solid #ccc">
                        <h5 style="float: left;"><b>Leave Summary</b></h5>
                        <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>
                   </div>   
                   <div class="row" style="margin-left: 30px">
                   <div class="col-md-12">  
                     
                        <div id="leave_Summary" class="card-column" style="background-color: white"></div>
                       <!-- <div class="container" style="height:auto; width: auto;">
                          <div class="row" id="leave_Summary"style="height:auto; width: auto;">
                            <div class="card-column" id="leave_Summary"style="height:auto; width: 500px;float: right;">
                              </div>
                          </div>
                                
                        </div> -->
                      </div>
                    </div>
                            <input type="hidden" id="student-id" name="sid" value="" />

                        <div class="modal-footer" style="margin-top: 30px">
                            <button type="submit"  class="btn btn-success" data-dismiss="modal" style="font-size: 10px"> close</button>
                         </div>

                 </div>

              </form>


          </div>
      </div>

  </div>
       <!---------------------------------------------------VIEW Employee MODAL------------------------------------------------------------>
        <!-- Delete -->
  <div class="modal fade" id="setapprover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Set Employee Leave Approver</b></h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Set As Approver</p>
                <h5 class="text-center fullname"></h5>
               
                 
                  <input type="hidden" id="company-id" name="sid" value="" />
                  <input type="hidden" id="emp-id" name="sid" value="" />
                  <input type="hidden" id="firstname" name="sid" value="" />  
                  <input type="hidden" id="middleinitial" name="sid" value="" />             
                  <input type="hidden" id="lastname" name="sid" value="" />
                  <input type="hidden" id="position" name="sid" value="" />
                  <input type="hidden" id="employeekey" name="sid" value="" />
                   <input type="hidden" id="sample" name="sid" value="" />
                   <input type="hidden" id="suffix"  value="" />
                  

                 
                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 10px"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn btn-danger" id="setapp-btn" name="updatestatus"style="font-size:10px "onclick="hulla.send('successfully Set', 'success')"><span class="glyphicon glyphicon-trash" ></span>Yes</button>
          
              </div>
             

          </div>
             </form>
      </div>
  </div>
  <!-- Delete -->
<div class="modal fade" id="deletemp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 300px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><b>Delete Employee</b></h4></center>
            </div>
            <div class="modal-body">  
              <p class="text-center">Are you sure you want to Delete</p>
              <h5 class="text-center" id="setapprovername" style="text-decoration: bold"></h5>
              <input type="hidden" id="delid">
               <input type="hidden"  id="empemail"/>
              <input type="hidden"  id="emppass"/>
              <input type="hidden"  id="key"/>
              <!----EMPUID-->
               <input type="hidden"  id="empuid"/>
              <input type="hidden" id="empid" name="sid" value="" />
              <input type="hidden" id="approverkey" name="sid" value="" />



         </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"style="font-size: 10px"><span class="glyphicon glyphicon-remove"></span>No</button>
                <button type="button" class="btn btn-danger Id"style="font-size: 10px" id="empdel"><span class="glyphicon glyphicon-trash"></span>Yes</button>
            </div>

        </div>
    </div>
</div>
  <!-- UPDATE EMPLOYEE -->
  <div class="modal fade" id="viewall-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 800px;">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Employee's Profile</b></h4></center>
              </div>
              <input type="hidden" id="viewallid" name="sid" value="" />

              <form method="post">
                 <div class="modal-body">  
                    <div class="container" style="width: 700px;border-bottom: 2px solid #ccc">
                       <h5 style="float: left;"><b>Personal Information</b></h5>
                      <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>

                   </div>
                    <div class="container" style="width: 800px;height: auto;">
                      <div class="form-group" style="margin-left: 45px;margin-top: 10px">
                          <p>Family Name</p>

                          <input type ="text"  id="modal-deac-lname1" name ="lname" class="form-control Employee_LastName"  style="width: 200px" disabled>
                        </div>
                        <div class="form-group" style="margin-right: 305px;margin-top: -70px;float: right;">
                            <p>First Name</p>
                            <input type ="text" id="modal-deac-fname1" name ="fname" class="form-control Employee_FirstName"   style="width: 200px" disabled>

                           
                          </div>
                        <div class="form-group" style="margin-right: 245px;margin-top: -70px;float: right;">
                           <p>MI</p>
                            <input type ="text" id="modal-deac-mid1"  name ="mi" class="form-control  Employee_MiddleInitial "   style="width: 40px" disabled>
                         
                        </div>
                        <div class="form-group" style="margin-right: 180px;margin-top: -70px;float: right;">
                           <p>Suffix </p>
                            <input type ="text"  id="modal-deac-suffix1"name ="suffix" class="form-control  Employee_Suffix "   style="width: 40px"disabled>
                         
                        </div>
                         <div class="form-group" style="margin-right: 70px;margin-top: -70px;float: right;">
                           <p>Sex</p>
                            <input type ="text"  id="modal-deac-sex1"name ="sex" class="form-control  Employee_Gender "   style="width: 80px"disabled>
                         
                        </div>
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                           <p>Marital Status</p>
                            <input type ="text" id="modal-deac-maritalstatus1" name ="maritalstatus" class="form-control  Employee_MaritalStatus "   style="width: 80px"disabled>
                         
                        </div> 
                        <div class="form-group" style="margin-right: 470px;margin-top: 10px;float: right;">
                          <p>Birthdate </p>
                          <input type ="date" id="modal-deac-bdate1" name ="disabled" class="form-control   Employee_Birthdate"   style="width: 150px;padding-bottom: 30px;height: 10px"readonly>    
                        </div>

                       <div class="form-group" style="margin-left: 310px;margin-top:-80px;float: left;">
                           <p>Address </p>
                          <textarea type ="text" id="modal-deac-address1" name ="address" class="form-control  Employee_Address"   style="width: 230px"disabled> </textarea>  
                        </div>

                        <div class="form-group" style="margin-left: 550px;margin-top:-110px;float: left;">
                           <p>Religion  </p>
                           <input type ="text" id="modal-deac-religion1" name ="religion" class="form-control  Employee_Religion "   style="width: 150px"disabled>   
                        </div>
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                            <p>Contact1 No. </p>
                            <input type ="text" id="modal-deac-contactno1"name ="contact1" class="form-control  Employee_Contact1 "   style="width: 120px"disabled>
                         
                        </div>
    
                         <div class="form-group" style="margin-left: 35px;margin-top: 10px;float: left;">
                            <p>Email </p>
                            <input type ="text"  id="modal-deac-empemail1"name ="email" class="form-control  Employee_Email  "   style="width: 210px"disabled>
                        </div>  
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                            <p>Contact Person </p>
                            <input type ="text" id="modal-deac-contactperson1" name ="contactperson" class="form-control  Employee_ContactPerson "   style="width: 200px"disabled>
                         
                        </div>  
                         <div class="form-group" style="margin-left: 35px;margin-top: 10px;float: left;">
                            <p>Contact Person No. </p>
                            <input type ="text" id="modal-deac-contactpersonno1" name ="contactpersonno" class="form-control  Employee_ContactPersonNumber "   style="width: 120px"disabled>
                         
                        </div>    
                                       <div class="container" style="width: 700px;border-bottom: 2px solid #ccc">
                        <h5 style="float: left;"><b>Work Information</b></h5>
                        <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>
                   </div>
                        <div class="container">
                          <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>Department </p>
                              <input type ="text"  id="modal-deac-department1"name ="department" class="form-control  Employee_Department "   style="width: 200px"disabled>
                           
                          </div>
                           <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>Position</p>
                              <input type ="text" id="modal-deac-position1" name ="position" class="form-control  Employee_Position"   style="width: 200px"disabled>
                           
                          </div>
                             <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>HireDate</p>
                              <input type ="date" id="modal-deac-hiredate1" name ="hiredate" class="form-control  Employee_HireDate"   style="width: 200px;width: 150px;padding-bottom: 30px;height: 10px"disabled>
                           
                            </div>   
                          <div class="form-group" style="margin-left:-645px;margin-top: 100px;float: left;">
                            <p>Branch </p>
                            <input type ="text" id="modal-deac-branch1"  name ="branch" class="form-control  Branch"   style="width: 120px"disabled>
                          </div> 
                           </div> 
                  <div class="container" style="width: 700px;border-bottom: 2px solid #ccc">
                        <h5 style="float: left;"><b>Leave Summary</b></h5>
                        <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>
                   </div> 
                 <div class="row" style="margin-left: 30px">
                   <div class="col-md-12">  
                     
                        <div id="deac_leave_Summary" class="card-column" style="background-color: white"></div>
                       <!-- <div class="container" style="height:auto; width: auto;">
                          <div class="row" id="leave_Summary"style="height:auto; width: auto;">
                            <div class="card-column" id="leave_Summary"style="height:auto; width: 500px;float: right;">
                              </div>
                          </div>
                                
                        </div> -->
                      </div>
                    </div>    
             
                           
                           <!-- Confirm Edit Button  -->
                        <div class="modal-footer" style="margin-top: 20px">
                           <button  name="confirm-edit" type="button" class="btn btn-danger" style="font-size: 10px"data-dismiss="modal">Close</button>
                        </div>
                  </form>
                </div>
          </div>
      </div>
  </div>
   <!---------------------------------END MODAL----------------------------------------------------------------------->
<div class="modal bounceIn" id="forceleave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px">
        <div class="modal-content">
            <div class="modal-header" style="height:55px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h3 class="modal-title LeaveType"id="LeaveDescription1"style="padding-top:-20px">Force Leave</h3></center>
         </div>
                 
                       
         <div class="modal-body" style="height: 900px; height: auto;"> 
              <form   enctype="multipart/form-data" method="POST">
                     <input type="hidden"   id="Employee_Id" >             
                     <input type="hidden"   id="forceid" > 
                     <input type="hidden"   id="forcecomid" > 
                     <input type="hidden"   id="foreceempemail" > 
                      <input type="hidden" id ="foreceemployeename1">
                    <h5 style="text-align:center" ><b>Force Leave Form</b></h5>
                    <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Applicant</b></h5>
                    </div>
                     <div class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                            <p>Name :</p>  <p id="foreceemployeename" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                           
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Emp. ID No :</p>  <p id="foreceempidno1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right:  15px;margin-top:-30px"></p>
                      </div>
 
         
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Details of Events</b></h5>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Date Send:</p>  <p id="applieddate1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Description:</p>  <p style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">Force Leave</p>
                           <input type="hidden" value ="Force Leave" id="leavetype">
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave From:</p>  <input type="text"id="leavefrom1" class="date1"data-date-format="mm/dd/yyyy" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px" placeholder="mm/dd/yyy" required></input>
                          
                      </div> 

                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Until:</p>  <input type="text" id="leaveuntil1"class=" date1" data-date-format="mm/dd/yyyy" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"placeholder="mm/dd/yyy" required >

                      </div>  
             
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Reason:</p>  <textarea id="reason" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></textarea>
                      </div>

                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;margin-top: 100px">
                        
                      </div>
                        <div class="container" style="border-bottom: 2px solid white;width: auto;">
                        
                        <button  type="submit" id="sendforceleave"class="btn btn-default"style="float: right;font-size:10px"><span style="margin-right: 10px"class="glyphicon glyphicon-send"　></span> Submit </button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;font-size: 10px"><span style="margin-right: 10px" class="glyphicon glyphicon-remove"></span> Cancel</button>   
                      </div>
               </form>
          </div>
       </div>
      </div>
   </div>
</body>
</html>
  <?php include 'includes/script.php'?> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>