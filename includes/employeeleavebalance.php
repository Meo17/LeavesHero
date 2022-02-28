<!DOCTYPE html>
<html  lang="en">
<head>
  <title>Employee Leave Balance </title>
 <?php include 'includes/empheader.php'?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.standalone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body id="body">
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 211px">
      <img class="logo" src="images/logo3.png" style="padding-left: 19px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

        <li ><a href="companyemployeedashboard.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-home"></span>Home</a></li>   
          <li   class="active" ><a href="employeeleavebalance.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub "></span>Leave Balance</a></li>
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
             <input type="hidden" class=" form-control "   id="userKey" style="width: 250px">
             <input type="hidden" class=" form-control "   id="userid" style="width: 250px">
             <input type="hidden" class=" form-control "   id="empkey" style="width: 250px">
             <input type="hidden" class=" form-control "   id="fullname1" style="width: 250px">
             <input type="hidden" class=" form-control "   id="refuserkey" style="width: 250px">
             <input type="hidden" class=" form-control "   id="photourl" style="width: 250px"  >  
             <input type="hidden" class=" form-control "   id="empuserskey" style="width: 250px">  
             <input type="hidden" id="empid">
             <input type="hidden" id="Employeekey">
             <input type="hidden" id="EmployeePosition">
             <input type="hidden" id="updateappfullname">
             <input type="hidden" id="email">
             <input type="hidden" id="gender">
             <input type="text" class=" form-control hidden"   id="fullname5" style="width: 250px">
             <input type="hidden" id="emphireddate">

        <!--top navbar/ right side-->
        
        <div class="dropdown  loggedin-div" id="user_div"style="float: right;top:15px;margin-right: 100px">
           <img src="images/icon_user.png" id="profile" style="height: 30px; width: 30px"class="image_upload_preview">
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
          <input class="form-control" type="search" placeholder="Search" id="dsearch" style="width: 1500px;margin-right: 20px">
        </div>
      </div>

<!------ ------------------COMPANY LEAVE SEATED BY----------------------------------------------------------------------->    
     <div class="row" style="height: auto;">
        <div class="col-sm-12">
      <!--       <button class="btn btn-leave" style="font-size: 12px; margin-left: 43px;margin-top: 20px;background-color:#00cc99 ; float: left;"id="multipleleavemodal" ><i class="glyphicon glyphicon-pencil" id="edit-btn" style="padding-right: 10px;"></i>Apply Multiple Leave</button> -->
            <div style="float: left;padding-left: 40px;width: 600px;width: auto;">
            <h4 style="text-align: center;"><b>Company Leave </b></h4>

            <a style="float: right;color: black;max-height: 25px;margin-right: 55px;color: #00cc99; font-size: 14px" href="#div"><b>View my leave request</b></a>
              <br> 

              <div id="leavetype" class="card-column" style="background-color: white"></div>
          <input type="hidden" id="gender12">
<!------------Multiple  Leave--------------------------------------------------------------------------------------------->  
 <div class="modal fade" id="view-multipleday" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog" style="width: 500px;">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Apply Multiple Leave</b></h4></center>
              </div>
            

              <form method="post">
                 <div class="modal-body">  
                    <div class="container" style="width: 440px;border-bottom: 2px solid #ccc;margin:auto;">
                    <div style="margin-top: 10px">
                          <p><b>Full Name :</b>       <b id="apfullname" style="margin-left: 187px"></b></p> 
                          <p><b>Emp. ID No :</b><b id="idno1" style="margin-left: 181px"></b></p>

                   </div>
                       <h5 style="float: left;"><b>Company Leave</b></h5>
                       <select id="multipleleave" name="Duration"class="form-control" style="height: 28px;width: 250px;margin-left: 164px" required>
                              <option disabled selected>Leave Description</option>
                          </select>
                        <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>


                   </div>
                     <button class="btn btn-leave" style="font-size: 11px; margin-left: 43px;margin-top: 20px;background-color:#00cc99 ; float: left;"id="multipleleavemodal" ><i class="glyphicon glyphicon-plus"style="padding-right: 10px;"></i>Add leave</button>
                    <div id="tooglediv" style="margin-top: 10px">
  
                          <div class="box container form-control hideinfo1" style="margin-top: 20px; width: 440px; height: auto;">
                              <center><h3 id="textleave1" style="margin-top:2px"></h3></center>
                                <input id="muldata" class="hidden">
                                  <h6>Annual Entitlement             : <p id="MulNumberofDays" style="float:right;padding-right:282px">10</p> </h6>
                                  <h6 style="float:left;margin-top:-23px;margin-left:150px">Available to Apply  :<p id="MulAvailable" style="float:right;padding-left:10px">10</p></h6>
                                  <h6 style="float:left;margin-top:-34px;margin-left:286px">Total Leave Applied  : <p id="MulConsume" style="float:right;padding-left:100px;margin-top:-12px">0</p></h6>
                                  <div id="durationmuliple" class="form-group" style="padding-top: 10px;width: auto;padding-left:15px;margin-left:100px">
                                        <label class="checkbox-inline">
                                        <input type="checkbox" class="subject-list" name="ips1"><b id="muldurationfullday">Full Day</b></label>
                                        <label class="checkbox-inline">
                                        <input type="checkbox" class="subject-list"  name="ips2"><b id="muldurationhalfday">Half Day</b></label>
                                        <label class="checkbox-inline">
                                         <input type="checkbox" class="subject-list" name="ips3"><b id="muldurationmultipleday">Multiple Day</b></label>
                                  </div>

                                  <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                                       <p>Leave From:</p>  <input type="text"id="mulleavefrom" class="form-control date1"data-date-format="mm/dd/yyyy" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px" required>
                                  </div>  
                                  <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                                       <p>Leave Until:</p>  <input type="text" id="mulleaveuntil"class="date1" data-date-format="mm/dd/yyyy" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px" required >

                                  </div>  
                                  <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                                       <p>Reason:</p>  <textarea type="text"id="mulleavefrom" class=" date1"data-date-format="mm/dd/yyyy" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px" required></textarea>
                                  </div>
                                 </div> 

                                 <div id="viewalldata"class="box container form-control"style="margin-top: 20px; width: 440px; height: auto;">
                                  <table id="allreview">
                                      <tbody></tbody>
                                  </table>
                                    
                                 </div>
                           </div>
                           <!-- Confirm Edit Button  -->
                        <div class="modal-footer" style="margin-top: 20px">
                           <button  name="apply" type="submit" id="okay"class="btn btn-default"style="float: right;font-size: 10px"><span style="margin-right: 10px"class="glyphicon glyphicon-send"　></span> Submit </button>
                        </div>
                  </form>
                </div>
          </div>
      </div>
  </div>        
<!---------------Apply Leave---------------------------------------------------------------------------------------------->

<div class="modal bounceIn" id="applyleave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px">
        <div class="modal-content">
            <div class="modal-header" style="height:55px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><b id="LeaveDescription" style="font-size: 26px"><h3 class="modal-title LeaveType"style="padding-top:-20px"></h3></b></center>
         </div>
                
         <div class="modal-body" style="height: 900px; height: auto;"> 
                  <form   enctype="multipart/form-data" method="POST">
                    <input type="hidden"    id="compaanyleavekey-id" name="sid" value="" />               
                    <input type="hidden"    id="appleavetype">
                    <input type="hidden"    id="employeeid"style="width: 300px"  >
                    <input type="hidden"    id="Companyid" style="width: 300px">      
                    <input type="hidden"    id="setleaveday">  
                    <input type="hidden"    id="applieddate">
                    <input type="hidden"    id="empapplyname">
                    <input type="hidden"    id="uploadfilekey" name="uploadfilekey">
                    <input type="hidden"    id="duplicateuploadfilekey" >
                    <input type="hidden"    id="consumed1">
                    <input type="hidden"    id="availabledays1">
                    <input type="hidden"    id="rangedaysbeforefile">
                    <input type="hidden"    id="range2">
                    <input type="hidden"    id="minimum">
                   
                    <h5 style="text-align:center" ><b>Application Form</b></h5>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Applicant</b></h5>
                      </div>
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
                        <h5 style="float: left;"><b>leave Duration</b></h5>
                      </div> 
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                               <input type="hidden" name="" id="halfday">
                               <input type="hidden" name="" id="fullday">
                               <input type="hidden" name="" id="multiple">

                           <select id="duration"name="Duration"class="form-control" style="height: 28px;width: 150px"required>
                              
                          </select>
                                <!--MULTIPLE DAYS-------->

                         
                           <input type="hidden" name="" id="dateslenth">
                       </div>                       
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Details of Events</b></h5>
                      </div>
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Date Applied:</p>  <p id="dateapplied" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Description:</p>  <p id="leavedesciption1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                     <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <b><p>Minimum Days/Hours Require To apply </p> <p id="requiredays2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p></b>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave From:</p>  <input type="text"id="leavefrom" class="date1"data-date-format="mm/dd/yyyy" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px" placeholder="mm/dd/yyy" required></input>
                          
                      </div>  
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Until:</p>  <input type="text" id="leaveuntil"class="ntrol date1" data-date-format="mm/dd/yyyy" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"placeholder="mm/dd/yyy" required ></input>

                      </div>  
                    
               <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Reason:</p>  <textarea id="reason" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></textarea>
                      </div>  
                       <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Submitted Document/s</b></h5>
                      </div>    
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                          <p style="color: red;float: left;" id="require" ></p>
                       </div>  
                     <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                       <input id="supportDocs" type="file" class="form-control" name="file" style="width: 300px;margin-top: 10px;padding-bottom:32px" multiple>
                       </div>  
                     <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Select Approver</b></h5>
                      </div> 
                       <div id="selectapprover"  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                          <label class='checkbox-inline hidden'>
                               <input type='checkbox' name='leavecor' value='leave coordinator'id='approver'>leave coordinator
                            </label>
                       </div>                      
                       <div>
                         <p id="nameapprover"> 
  
                         </p> 
                        <div class="container" style="border-bottom: 2px solid white;width: auto;">
                        
                        <button  name="apply" type="submit" id="sendapply"class="btn btn-default"style="float: right;font-size: 10px"><span style="margin-right: 10px"class="glyphicon glyphicon-send"　></span> Submit </button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;font-size:10px"><span style="margin-right: 10px" class="glyphicon glyphicon-remove"id='1'></span> Cancel</button>   
                      </div>
                      

                       </div>  


                  </form>
             </div> 
        </div>    
    </div>
</div>
<!------------------------COMPANY LEAVE SEATED BY eND----------------------------------------------------------------------->

<!------ ------------------COMPANY LEAVE SEATED BY----------------------------------------------------------------------->    
     <div class="row">
        <div class="col-sm-12">
               <h4 style="text-align: center; color: red;margin-top: 40px"><b>Other Leave that given to your company </b></h4>
           
            <div style="float: left;padding-left: 40px;width: 600px;width: auto;">
          <br> 

              <div id="employeeleavetype" class="card-column" style="background-color: white"></div>

<!------Apply Leave----------------------------------------------------------------------->
<div class="modal bounceIn" id="employeeleaveapply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px">
        <div class="modal-content">
            <div class="modal-header" style="height:55px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><b id="LeaveDescription1" style="font-size: 26px"><h3 class="modal-title LeaveType"style="padding-top:-20px"></h3></b></center>
         </div>
                 
                       
         <div class="modal-body" style="height: 900px; height: auto;"> 
              <form   enctype="multipart/form-data" method="POST">
                     <input type="hidden"   id="leavekey-id" >             
                     <input type="hidden"   id="appleavetype1" >
                     <input type="hidden"   id="employeeid1">
                     <input type="hidden"   id="Companyid1">
                     <input type="hidden"   id="applieddate1">
                     <input type="hidden"   id="setleaveday1">  
                     <input type="hidden"   id="empapplyname1">
                     <input type="hidden"   id="uploadfilekey1">
                     <input type="hidden"   id="duplicateuploadfilekey2">
                     <input type="hidden"   id="consumed2">
                     <input type="hidden"    id="availabledays2">
                     <input type="hidden"    id="minimum1">
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

                               <input type="hidden" name="" id="halfday1"> 
                               <input type="hidden" name="" id="fullday1">
                               <input type="hidden" name="" id="multiple1">

                           <select id="duration1"name="Duration"class="form-control" style="height: 28px;width: 150px" required>
                              
                          </select>
                           <input type="" id="inputdate" hidden>
                          <p id="durationcount1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">0</p>
                          <p id="consumed" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">0</p>
                       </div> 
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Details of Events</b></h5>
                      </div>
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Date Applied:</p>  <p id="dateapplied1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Description:</p>  <p id="leavedesciption2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <b><p>Minimum Days/Hours Require To apply </p> <p id="requiredays1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p></b>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave From:</p>  <input type="text" id="leavefrom1" class="date1"placeholder="mm/dd/yyy"style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"required>
                      </div> 
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Until:</p>  <input type="text" id="leaveuntil1" class="date1"placeholder="mm/dd/yyy"style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"required>
                      </div> 
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Reason:</p>  <textarea id="reason1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></textarea>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Submitted Document/s</b></h5>
                      </div> 
   
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                          <p style="color: red;float: left;" id="require1" ></p>
                       </div> 
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                       <input id="supportDocs1" type="file" class="form-control" name="file" style="width: 300px;margin-top: 10px;padding-bottom:32px" multiple>
                       </div>  
                       <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Select Approver</b></h5>
                      </div> 
                       <div id="selectapprover1"  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                        <label class='checkbox-inline hidden'><input type='checkbox' name='leavecor1' value='leave coordinator'id='apapprover1'>leave coordinator</label>
                       </div> 

                        <div class="container" style="border-bottom: 2px solid white;width: auto;">
                        
                        <button  name="apply" type="submit" id="sendapply1"class="btn btn-default"style="float: right;font-size:10px"><span style="margin-right: 10px"class="glyphicon glyphicon-send"　></span> Submit </button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;font-size: 10px"><span style="margin-right: 10px" class="glyphicon glyphicon-remove"></span> Cancel</button>   
                      </div>
               </form>
          </div>
       </div>
      </div>
   </div>
<div class="modal fade" id="converttocashmodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 300px">
             <form method="post">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <center><h4 class="modal-title" id="myModalLabel"><b>Convert To Cash</b></h4></center>
                    </div>
                  <div class="modal-body">  
                          <!-- <b> <p >You have <p id="remainingdays3"style="float: right;margin-top: -20px"></p></p></b> -->
                        <h3 style="padding-top:5px;margin-left: 40px">You have <b id="remainingdays31"></b>  Days</h3>
                        <p class="text-center"style="margin-top: 20px"><b>Please Click To Continue.........</b></p>
                        <h5 class="text-center fullname"></h5>
                           <input type="text" name="bookId1" value="" id="comverttocashkey1"  hidden/>
                            <input type="hidden"    id="appleavetype321">
                    </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal"style="font-size: 12px"><span class="glyphicon glyphicon-remove"></span>No</button>
                      <button type="button" class="btn-remove-key btn btn-danger convertcashbtn" id="converttocash1" data-key="key" style="font-size: 12px"><span class="glyphicon glyphicon-trash"></span>Yes</button>
                  </div>
                 

              </div>
                 </form>
          </div>
      </div>
        <div class="modal fade" id="converttobenefitsmodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 300px">
             <form method="post">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <center><h4 class="modal-title" id="myModalLabel"><b>Add To Retirements</b></h4></center>
                    </div>
                  <div class="modal-body">  
                          <h3 style="padding-top:5px;margin-left: 40px">You have <b id="remainingdays331"></b>  Days</h3>
                        <p class="text-center"style="margin-top: 20px"><b>Please Click To Continue.........</b></p>
                        <h5 class="text-center fullname"></h5>
                                <input type="hidden" name="bookId1" value="" id="converttobenefitskey1"  />
                           <input type="hidden"    id="appleavetype3221">
                    </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"style="font-size:12px "><span class="glyphicon glyphicon-remove"></span>No</button>
                      <button type="button" class="btn-remove-key btn btn-default retirements" id="retirements_btn1" data-key="key" style="font-size:12px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
                  </div>
                 

              </div>
                 </form>
          </div>
      </div>
          </div>    
      </div>
  </div>
  <br>
     <div class="row" style="width: auto;margin-right: 21px"id="div">
        <div class="col-sm-12" style="width: auto;">
          <div class="well" style="padding-bottom: 50px;width: auto;"> 

            <div class="container" style="width: auto;">
                <div class="container" style="padding-right: 15px;border-bottom: 2px solid #ccc;width: auto">
              <h5 style="float: left;"><b>My Leave Request</b>   </h5><br>
            </div>
               <table class="table table-hover" id="table" style="table-layout: fixed;overflow-x: auto;width:all;">
              
              <thead>
                 <tr>
                  <th style="font-size: 12px;text-align: center">Leave Description</th>
                  <th style="font-size: 12px;text-align: center">Leave Duration</th>
                  <th style="font-size: 12px;text-align: center">Days</th>
                  <th style="font-size: 12px;text-align: center">Start</th>
                  <th style="font-size: 12px;text-align: center">End</th>
                  <th style="font-size: 12px;text-align: center">Reason</th>
                  <th style="font-size: 12px;text-align: center">Status</th>
      
                </tr>
              </thead>
                <tbody>
               </tbody>
          </table>
        <div class="modal fade" id="cancelmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog" style="width: 300px">
                <form method="post">
                   <div class="modal-content">
                     <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <center><h4 class="modal-title" id="myModalLabel">Cancel Leave Request</h4></center>
                     </div>
                        <div class="modal-body">  
                        <p class="text-center">Are you sure you want to cancel</p>
                                <input type="hidden" name="bookId" value="" id="cancelkey">
                                 <input type="hidden"  value="" id="cancelkeyleavedateapplied" >
                                 <input type="hidden" value="" id="cancelkeyleavetype" >
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size:10px "><span class="glyphicon glyphicon-remove"></span>No</button>
                               <button type="button" class="btn-remove-key btn btn-danger " id="cancelleaverequest" data-key="key" name="updatestatus"style="font-size: "><span class="glyphicon glyphicon-trash"></span>Yes</button>
                        </div>
                   </div>
                </form>

                </div>
              </div>
<!-----------------------------------------------Update leaverequest--------------------------------------->
<div class="modal fade" id="updateleave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog" style="width: 400px">
         <div class="modal-content">
            <div class="modal-header" style="height:55px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><b id="update_LeaveDescription1" style="font-size: 26px"><h3 class="modal-title LeaveType"style="padding-top:-20px"></h3></b></center>
           </div>         
          <div class="modal-body" style="height: 1000px; height: auto;"> 
              <form   enctype="multipart/form-data" method="POST">
                     <input type="hidden"   id="update_leavekey-id" />               
                     <input type="hidden"   id="update_appleavetype1" >
                     <input type="hidden"   id="update_employeeid1">
                     <input type="hidden"   id="update_Companyid1">
                     <input type="hidden"   id="update_applieddate1">
                     <input type="hidden"   id="update_setleaveday1">  
                     <input type="hidden"   id="update_empapplyname1">
                     <input type="hidden"   id="update_uploadfilekey1">
                     <input type="hidden"   id="update_key">
                     <input type="hidden"   id="update_consumed3">
                     <input type="hidden"   id="update_availabledays3">
                     <input type="hidden"   id="update_dateapply">
                     <input type="hidden"    id="update_minuim">
                    <h5 style="text-align:center" ><b>Application Form</b></h5>
                    <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Applicant</b></h5>
                    </div>
                     <div class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                            <p>Name :</p>  <p id="update_aplicantfullname1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Emp. ID No :</p>  <p id="update_empidno1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right:  15px;margin-top:-30px"></p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Annual Leave Info.</b></h5>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Total Days :</p>  <p id="update_totaldays1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"> Days</p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Consumed Days :</p>  <p id="update_consumed1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"> 0</p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Available Days :</p>  <p id="update_availabledays1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">0</p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>leave Duration</b></h5>
                      </div> 
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">

                               <input type="hidden" name="" id="update_halfday1"> 
                               <input type="hidden" name="" id="update_fullday1">
                               <input type="hidden" name="" id="update_multiple1">

                           <select id="updateduration1"name="update_Duration"class="form-control" style="height: 28px;width: 150px" required>
                                
                          </select>

                          <p id="durationcount1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">0</p>
                          <p id="consumed" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">0</p>
                       </div> 
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Details of Events</b></h5>
                      </div>
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Date Applied:</p>  <p id="update_dateapplied1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Description:</p>  <p id="update_leavedesciption2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <b><p>Minimum Days/Hours Require To apply </p> <p id="requiredays" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p></b>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave From:</p>  <input type="text" id="update_leavefrom1" class="date1"placeholder="mm/dd/yyy"style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">
                      </div> 
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Until:</p>  <input type="text" id="update_leaveuntil1" class="date1"placeholder="mm/dd/yyy"style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">
                      </div> 
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Reason:</p>  <textarea id="update_reason1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></textarea>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Submitted Document/s</b></h5>
                      </div>

                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                          <p style="color: red;float: left;" id="update_require1" ></p>
                       </div> 
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                          <input id="update_supportDocs" type="file" class="form-control" name="file" style="width: 300px;margin-top: 10px;padding-bottom:32px" multiple>
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
                        <div  class="form-group" id="updateApprovers"style="padding-top: 10px;width: auto;padding-left:15px"> 
                        </div>
                        <div id="selectapprover2"  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                          <label class='checkbox-inline hidden'>
                               <input type='checkbox' name='leavecor2' value='leave coordinator'id='approver2'>leave coordinator
                            </label>
                       </div> 

                        <div class="container" style="border-bottom: 2px solid white;width: auto;">
                        <button  name="apply" type="submit" id="update_sendapply"class="btn btn-default"style="float: right;font-size: 10px"><span style="margin-right: 10px"class="glyphicon glyphicon-send"　></span> Update </button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;font-size: 10px"><span style="margin-right: 10px" class="glyphicon glyphicon-remove"></span> close</button>   
                      </div>
               </form>
          </div>
       </div>
    
   </div>
</div>
<!-----------------------------------Cancel Leaverequest------------------------------>
    
<div class="modal fade" id="converttocashmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 300px">
             <form method="post">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <center><h4 class="modal-title" id="myModalLabel"><b>Convert To Cash</b></h4></center>
                    </div>
                  <div class="modal-body">  
                          <!-- <b> <p >You have <p id="remainingdays3"style="float: right;margin-top: -20px"></p></p></b> -->
                        <h3 style="padding-top:5px;margin-left: 40px">You have <b id="remainingdays3"></b>  Days</h3>
                        <p class="text-center"style="margin-top: 20px"><b>Please Click To Continue.........</b></p>
                        <h5 class="text-center fullname"></h5>
                           <input type="text" name="bookId1" value="" id="comverttocashkey"  hidden/>
                            <input type="hidden"    id="appleavetype32">
                    </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal"style="font-size: 12px"><span class="glyphicon glyphicon-remove"></span>No</button>
                      <button type="button" class="btn-remove-key btn btn-danger convertcashbtn" id="converttocash" data-key="key" style="font-size: 12px"><span class="glyphicon glyphicon-trash"></span>Yes</button>
                  </div>
                 

              </div>
                 </form>
          </div>
      </div>
                 <div class="modal fade" id="converttobenefitsmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 300px">
             <form method="post">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <center><h4 class="modal-title" id="myModalLabel"><b>Add To Retirements</b></h4></center>
                    </div>
                  <div class="modal-body">  
                          <h3 style="padding-top:5px;margin-left: 40px">You have <b id="remainingdays33"></b>  Days</h3>
                        <p class="text-center"style="margin-top: 20px"><b>Please Click To Continue.........</b></p>
                        <h5 class="text-center fullname"></h5>
                                <input type="text" name="bookId1" value="" id="converttobenefitskey"  hidden/>
                           <input type="hidden"    id="appleavetype322">
                    </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"style="font-size:12px "><span class="glyphicon glyphicon-remove"></span>No</button>
                      <button type="button" class="btn-remove-key btn btn-default retirements" id="retirements_btn" data-key="key" style="font-size:12px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
                  </div>
                 

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
#leaverequestnav{

    display: none;
  }
#cancel{

    display: none;
  }
  .row:after {
  content: "";
  display: table;
  clear: both;
}
 .modal-backdrop {

    display: none;    
}
 #updateleave {

    display: none;    
}  
 #updateleave {

    display: none;    
}  
 .hideinfo1 {

    display: none;    
}  
.datepicker-days table .disabled-date.day {
background-color: red;
color: #fff;
}
.datepicker table tr td.disabled{

}
.datepicker table tr td {
  color: black;
   font-weight: bold;
   font-size: 12px
}
.datepicker table th{
  color: black;
   font-weight: bold;
   font-size: 12px
}
/*.datepicker table tr td.disabled:hover {
background:#3333331a;
color: #fff;
}*/
</style>
</body>
</html>

  <?php include 'includes/script.php'?> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>
 <script type="text/javascript">

$(document).ready(function(){
 
 $(function() {
  $('#duration').change(function(){
        var divContent = $('#textleave').text();
            
    if($('#duration').val() == "Half Day"){
      $('#leavefrom').change(function() {
          $('#leaveuntil').val($(this).val());
          $("#leaveuntil").prop('disabled', true);
      });
    }
    if($('#duration').val() == "Full Day"){
          $('#leavefrom').change(function() {
          $('#leaveuntil').val($(this).val());
          $("#leaveuntil").prop('disabled', true);
      });
    }
    if($('#duration').val() == "Multiple Day"){
         $('#leavefrom').change(function() {
         $('#leaveuntil').val();
         $("#leaveuntil").prop('disabled', false);
      });
    
    }
  });
  $('#updateduration1').change(function(){
        var divContent = $('#textleave').text();
            
    if($('#updateduration1').val() == "Half Day"){
      $('#update_leavefrom1').change(function() {
          $('#update_leaveuntil1').val($(this).val());
          $("#update_leaveuntil1").prop('disabled', true);
      });
    }
    if($('#updateduration1').val() == "Full Day"){
          $('#update_leavefrom1').change(function() {
          $('#update_leaveuntil1').val($(this).val());
          $("#update_leaveuntil1").prop('disabled', true);
      });
    }
    if($('#updateduration1').val() == "Multiple Day"){
          $('#update_leavefrom1').change(function() {
          $('#update_leaveuntil1').val();
          $("#update_leaveuntil1").prop('disabled', false);
      });
    
    }
  });
$('#duration1').change(function(){
        var divContent = $('#textleave').text();
            
    if($('#duration1').val() == "Half Day"){
      $('#leavefrom1').change(function() {
          $('#leaveuntil1').val($(this).val());
          $("#leaveuntil1").prop('disabled', true);
      });
    }
    if($('#duration1').val() == "Full Day"){
          $('#leavefrom1').change(function() {
          $('#leaveuntil1').val($(this).val());
          $("#leaveuntil1").prop('disabled', true);
      });
    }
    if($('#duration1').val() == "Multiple Day"){
          $('#leavefrom1').change(function() {
          $('#leaveuntil1').val();
          $("#leaveuntil1").prop('disabled', false);
      });
    
    }

  });
  $('.subject-list').on('change', function() {
        $('.subject-list').not(this).prop('checked', false);  
    });

       var fullday1 = $('input:checkbox[name=ips1]').is(':checked');
        if(fullday1 = "Full Day"){

            $('#mulleavefrom').change(function() {
                $('#mulleaveuntil').val($(this).val());
                $("#mulleaveuntil").prop('disabled', true);
            });
          }

       var halfday1 = $('input:checkbox[name=ips2]').is(':checked');
        if(halfday1 = "Full Day"){

            $('#mulleavefrom').change(function() {
                $('#mulleaveuntil').val($(this).val());
                $("#mulleaveuntil").prop('disabled', true);
            });
          }

       var multiple = $('input:checkbox[name=ips3]').is(':checked');
        if(multiple = "Multiple Day"){

            $('#mulleavefrom').change(function() {
                $('#mulleaveuntil').val();
                $("#mulleaveuntil").prop('disabled', false);
            });
          }
  }); 
});
 
</script>