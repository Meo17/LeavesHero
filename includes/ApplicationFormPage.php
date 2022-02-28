<!DOCTYPE html>
<html lang="en">
<head>
 <title class="icon">Leave Requests</title>
  <?php include 'includes/header.php'?>

</head>
<body id="body">
<style type="text/css">
.icon{
        background-image: url("icons/company.png");
        height: 25px;
         width: 25px;

}
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
 .modal-backdrop {

    display: none;    
} 
</style>

<div class="container-fluid" >
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 276px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

        <li ><a href="companydashboard.php" class="aqua-hover" style="color:#fff ; padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Customize</a></li>
  

        <li><a href="companyaddemployee.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>
        <li ><a href="companyemployeerecord.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee Record</a></li>

        <li class="active"><a href="leaveapplication.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon-inbox"><i  class="glyphicon glyphicon-bell">
          <span class="badge badge-warning" id="badge1"style="margin-left:-20px;font-size:11.7px;margin-top:-15px">
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>

           </i>      
         </span> Leave Request
        </a>
        </li>
  
        <li><a href="CompanyHR_Report.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class=" fa fa-area-chart"></i></span>Analytical Report</a></li>
        <li><a href="CompanyHR_Holiday_Calendar.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="glyphicon glyphicon-calendar"></i></span>View Calendar's Holiday</a></li>
        <li ><a href="companybillingaccount.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="fa fa-paypal"></i></span>Subscription Payment</a></li>

      </ul><br>
    </div>
    <br>
  <div class="col-sm-10 " style="float: right;background-color: #fff;margin-left: 10px">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1600px;margin-left: 280px;background-color: white">
        <div class="container " style="width:auto;float: left; margin-top: 10px">
    
   
          <h5><b>Leave Application</b></h5>
       <input type="text" class=" form-control hidden"   id="userKey" style="width: 250px">
      <input type="text" class=" form-control hidden"   id="userid" style="width: 250px">
    　 <input type="text" class=" form-control hidden"   id="comuserskey" style="width: 250px">
      <input type="text" class=" form-control hidden"   id="photourl" style="width: 250px">
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

      <!--Leave types-->
<div class="row" >
    <div class="col-sm-12"style="height: 900px;">
        <div class="well" style="padding-bottom: 50px"> 
            <div class="container" style="width: auto;height:">
              <ul class="nav nav-tabs">
                  <li class="active"style="width: 32.5%"><a data-toggle="tab" href="#home"style="color: black;font-size: 17px;text-align: center">  <i class="fa fa-refresh"style="margin-right: 10px"></i><b>Pending</b></a></li>
                  <li style="width: 32.5%"  class=""><a data-toggle="tab" href="#menu1" style="color: black;font-size: 17px;text-align: center"> <i class="fa fa-handshake-o"style="margin-right: 10px"></i><b>Accepted</b></a></li>
                  <li style="width:32.5%" class=""><a data-toggle="tab" href="#menu2"style="color: black;font-size: 17px;text-align: center"><i class="fa fa-close" style="margin-right: 10px"></i><b>Declined</b></a></li>
              </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
         <table class="table table-hover" id="Pending" style="table-layout: fixed;overflow-x: auto;width:1450px;">
                    <thead>
                      <tr>
                        <th style="font-size: 12px;text-align:center">Full Name</th>
                        <th style="font-size: 12px;text-align:center">Leave Type</th>
                        <th style="font-size: 12px;text-align:center">Start</th> 
                        <th style="font-size: 12px;text-align:center">End</th>   
                        <th style="font-size: 12px;text-align:center">Days</th>   
                        <th style="font-size: 12px;text-align:center">Status</th>   
                         <th style="font-size: 12px;text-align:center">Reson</th>  
                         <th style="font-size: 12px;text-align:center">Duration</th>  
                        <th style="font-size: 12px;text-align:center">Date Applied</th> 
                          <th></th>
                      </tr>
                   </thead>
                <tbody id="tbodyPending" style="font-size: " ></tbody>
          </table>
        </div>
        <div id="menu1" class="tab-pane fade" >
          

         <table class="table table-hover" id="Accepted"style="table-layout: fixed;overflow-x: auto;width:1450px;">
                    <thead>
                      <tr>
                        <th style="font-size: 12px;text-align:center">Full Name</th>
                        <th style="font-size: 12px;text-align:center">Leave Type</th>
                        <th style="font-size: 12px;text-align:center">Start</th> 
                        <th style="font-size: 12px;text-align:center">End</th>   
                        <th style="font-size: 12px;text-align:center">Days</th>   
                        <th style="font-size: 12px;text-align:center">Status</th>   
                         <th style="font-size: 12px;text-align:center">Reson</th>  
                         <th style="font-size: 12px;text-align:center">Duration</th>  
                        <th style="font-size: 12px;text-align:center">Date Applied</th> 
       
                      </tr>
                  </thead>
                  <tbody> </tbody>
          </table>
        </div>
        <div id="menu2" class="tab-pane fade">
     
                 <table class="table table-hover" id="Rejected" style="table-layout: fixed;overflow-x: auto;width:1450px;">
                <thead>
                   <tr>
                        <th style="font-size: 12px;text-align:center">Full Name</th>
                        <th style="font-size: 12px;text-align:center">Leave Type</th>
                        <th style="font-size: 12px;text-align:center">Start</th> 
                        <th style="font-size: 12px;text-align:center">End</th>   
                        <th style="font-size: 12px;text-align:center">Days</th>   
                        <th style="font-size: 12px;text-align:center">Status</th>   
                         <th style="font-size: 12px;text-align:center">Reson</th>  
                         <th style="font-size: 12px;text-align:center">Duration</th>  
                        <th style="font-size: 12px;text-align:center">Date Applied</th> 
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
           
<!--------------------------------------------------------------- APPROVAL MODAL------------------------------------------------------>
<div class="modal fade" id="viewalldetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 350px; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><b><h4 class="modal-title" id="redesc" style="text-transform: bold"></h4></b></center>
                 <input type="hidden" style="width: 150px;" id="leaverequestid">

              <input type="hidden" style="width: 150px" id="leavedesc">
            </div>
            <form method="post">
            <div class="modal-body" style="height: 900px; height: auto;">  
                  <h5 style="text-align:center" ><b>Application Form</b></h5>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Applicant</b></h5>
                      </div>
                         <input type="hidden"  id="key1">
                         <input type="hidden"  id="key2">
                         <input type="hidden"  id="apconsumed1">
                         <input type="hidden"  id="dateapply">
                         <input type="hidden"  id="prevleaveconsumed">

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
                        <h5 style="float: left;"><b>Details of Events</b></h5>
                      </div>
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Date Applied:</p>  <p id="dateapplied" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Description:</p>  <p id="leavedesciption" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave From:</p>  <p id="leaveform" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>  
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Until:</p>  <p id="leaveuntil" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>  
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Reason:</p>  <p id="reason" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Approver's</b></h5>
                      </div>      
                        <div  class="form-group" id="Approvers"style="padding-top: 10px;width: auto;padding-left:15px"> 
                        </div>
                       </div>                
                       <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Submitted Document/s</b></h5>
                      </div> 
                        <div  class="form-group" id="groupsubmitfile" style="padding-top: 10px;width: auto;padding-left:15px"> 
                           <p>Click file to download</p> 
                           <div class="row" style="height:auto; width: auto;">
                              <div class="col-sm-3" id="subdoct"style="height:auto; width: auto;">
                            
                              </div>
                             

                           </div>
                       </div>
                           <div class="container" style="border-bottom: 2px solid white;width: auto;"> 
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger"  id="Declined" style="float: left;font-size: 12px">Declined</button>
                                  <button type="submit"  class="btn btn-success" name="grantrequest" id="grantrequest" style="font-size: 12px"> Grant</button>
                             </div>
                         </div>                        
            </form>

        </div>
    </div>
</div>
<!-------------------------------------------------END MODAL---------------------------------------------------------------------->
<!--------------------------------------------------------------- APPROVAL MODAL------------------------------------------------------>
<div class="modal fade" id="viewalldetails1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 350px; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><b><h4 class="modal-title" id="redesc1" style="text-transform: bold"></h4></b></center>
                 <input type="hidden" style="width: 150px;" id="leaverequestid1">

              <input type="hidden" style="width: 150px" id="leavedesc1">
            </div>
            <form method="post">
            <div class="modal-body" style="height: 900px; height: auto;">  
                  <h5 style="text-align:center" ><b>Application Form</b></h5>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Applicant</b></h5>
                      </div>
                        <input type="hidden" name="" id="key11">
                       <input type="hidden" name="" id="key21">
                       <input type="hidden" name="" id="apconsumed2">
                       <input type="hidden" name="" id="dateapply2">
                       <input type="hidden" id="prevcon">
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
                        <h5 style="float: left;"><b>Details of Events</b></h5>
                      </div>
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Date Applied:</p>  <p id="dateapplied1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Description:</p>  <p id="leavedesciption1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave From:</p>  <p id="leaveform1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>  
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Until:</p>  <p id="leaveuntil1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>  
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Reason:</p>  <p id="reason1" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Approver's</b></h5>
                      </div>      
                        <div  class="form-group" id="Approvers1"style="padding-top: 10px;width: auto;padding-left:15px"> 
                        </div>
                       </div>                
                       <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Submitted Document/s</b></h5>
                      </div> 
                        <div  class="form-group" id="groupsubmitfile1" style="padding-top: 10px;width: auto;padding-left:15px"> 
                           <p>Click file to download</p> 
                           <div class="row" style="height:auto; width: auto;">
                              <div class="col-sm-3" id="subdoct1"style="height:auto; width: auto;">
                            
                              </div>
                             

                           </div>
                       </div>
                           <div class="container" style="border-bottom: 2px solid white;width: auto;"> 
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;font-size: 12px">Close</button>
                                  <button type="submit"  class="btn btn-danger" name="cancelleaverequest" id="declinedleaverequest" style="font-size: 12px"> Declined</button>
                             </div>
                         </div>                        
            </form>

        </div>
    </div>
</div>
<!-------------------------------------------------END MODAL---------------------------------------------------------------------->
<!--------------------------------------------------------------- APPROVAL MODAL------------------------------------------------------>
<div class="modal fade" id="declinedmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 350px; ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><b><h4 class="modal-title" id="redesc2" style="text-transform: bold"></h4></b></center>
                 <input type="hidden" style="width: 150px;" id="leaverequestid2">

              <input type="hidden" style="width: 150px" id="leavedesc2">
            </div>
            <form method="post">
            <div class="modal-body" style="height: 900px; height: auto;">  
                  <h5 style="text-align:center" ><b>Application Form</b></h5>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Applicant</b></h5>
                      </div>
                        <input type="hidden" name="" id="key12">
                       <input type="hidden" name="" id="key22">
                       <input type="hidden" name="" id="apconsumed3">
                        <input type="hidden" name="" id="dateapply3">
                       <input type="hidden" id="preveconsumed1">
                       <div class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                            <p>Name :</p>  <p id="aplicantfullname2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                       </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Emp. ID No :</p>  <p id="empidno2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right:  15px;margin-top:-30px"></p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Annual Leave Info.</b></h5>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Total Days :</p>  <p id="totaldays2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"> Days</p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Consumed Days :</p>  <p id="consumed2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"> 0</p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Available Days :</p>  <p id="availabledays2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px">0</p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Details of Events</b></h5>
                      </div>
                        <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Date Applied:</p>  <p id="dateapplied2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Description:</p>  <p id="leavedesciption2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave From:</p>  <p id="leaveform2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>  
                      <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Leave Until:</p>  <p id="leaveuntil2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>  
                       <div  class="form-group" style="padding-top: 10px;width: auto;padding-left:15px">
                           <p>Reason:</p>  <p id="reason2" style="float: right;margin-right:50px;text-align: center;word-wrap: break-word;margin: auto;padding-right: 15px;margin-top:-30px"></p>
                      </div>
                      <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Approver's</b></h5>
                      </div>      
                        <div  class="form-group" id="Approvers2"style="padding-top: 10px;width: auto;padding-left:15px"> 
                        </div>
                       </div>                
                       <div class="container" style="border-bottom: 2px solid #ccc;width: auto;">
                        <h5 style="float: left;"><b>Submitted Document/s</b></h5>
                      </div> 
                        <div  class="form-group" id="groupsubmitfile2" style="padding-top: 10px;width: auto;padding-left:15px"> 
                           <p>Click file to download</p> 
                           <div class="row" style="height:auto; width: auto;">
                              <div class="col-sm-3" id="subdoct2"style="height:auto; width: auto;">
                            
                              </div>
                             

                           </div>
                       </div>
                           <div class="container" style="border-bottom: 2px solid white;width: auto;"> 
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" id="deleterequest"style="float: left;font-size: 12px">DELETE</button>
                                  <button type="submit"  class="btn btn-success"  id="reapproved" style="font-size: 12px"> Approved</button>
                             </div>
                         </div>                        
            </form>

        </div>
    </div>
</div>
<!-------------------------------------------------END MODAL---------------------------------------------------------------------->
      <div class="modal fade" id="grantmmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: 300px">
                 <form method="post">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <center><h4 class="modal-title" id="myModalLabel">Grant Leave Request</h4></center>
                        </div>
                      <div class="modal-body">  
                        <p class="text-center">Are you sure you want to Grant this Leave Request</p>
                                <input type="hidden" id="leavedesc4">
                                <input type="hidden" id="grantkey"> 
                                <input type="hidden" id="key13">
                                <input type="hidden" id="key24">
                                <input type="hidden" id="apconsumed4">
                                <input type="hidden" id="dateapply4">
                                <input type="hidden" id="prevleaveconsumed4">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size:10px "><span class="glyphicon glyphicon-remove"></span>No</button>
                          <button type="button" class="btn-remove-key btn btn-danger " id="yesgrant" data-key="key"style="font-size:10px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
                      </div>
                     

                  </div>
                     </form>
              </div>
          </div>
      <div class="modal fade" id="declinedmmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="width: 300px">
                 <form method="post">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <center><h4 class="modal-title" id="myModalLabel">Declined Leave Request</h4></center>
                        </div>
                      <div class="modal-body">  
                        <p class="text-center">Are you sure you want to Declined this Leave Request</p>
                                <input type="hidden" id="declinedkey">
                                <input type="hidden" id="leavedesc5">
                                <input type="hidden" id="key15">
                                <input type="hidden" id="key25">
                                <input type="hidden" id="apconsumed5">
                                <input type="hidden" id="dateapply5">
                                
                                <textarea id="reasondeclined" style="margin-left: 41px" placeholder="Reason"> 
                                  
                                </textarea>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size:10px "><span class="glyphicon glyphicon-remove"></span>No</button>
                          <button type="button" class="btn-remove-key btn btn-danger " id="yesdeclined" data-key="key" name="updatestatus"style="font-size:10px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
                      </div>
                     

                  </div>
                     </form>
              </div>
          </div>

</ul>
</div>
</div>
</div>
</div>
</div>
</body>

</html>

 <?php include 'includes/script.php'?>
