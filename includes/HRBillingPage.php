<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Billing </title>
<?php include 'includes/header.php'?>
</head>
<body>
<style type="text/css">
  .submit-button {
  margin-top: 10px;
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

</style>
<style>
* {
    box-sizing: border-box;
}

.content1 {
     
    margin:0 auto;
    text-align:left;
    padding:15px;
     
}

.columns {
    float: left;
    width: 33.3%;
    padding: 8px;
}

.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.price:hover {
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
    background-color: #111;
    color: white;
    font-size: 25px;
}

.price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
}

.price .grey {
    background-color: #eee;
    font-size: 20px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}

@media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
}
/**
* The CSS shown here will not be introduced in the Quickstart guide, but
* shows how you can use CSS to style your Element's container.
*/
input,
.StripeElement {
  height: 40px;
  padding: 10px 12px;

  color: #32325d;
  background-color: white;
  border: 1px solid transparent;
  border-radius: 4px;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

input:focus,
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
 
<div class="container-fluid" >
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 276px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

        <li ><a href="companydashboard.php" class="aqua-hover" style="color:#fff ; padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Customize</a></li>
  

        <li><a href="companyaddemployee.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>
        <li><a href="companyemployeerecord.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee Record</a></li>
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
        <li  class="active"><a href="companybillingaccount.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="fa fa-paypal"></i></span>Subscription Payment</a></li>

      </ul><br>
    </div>x
    <br>
    <br>
    <div class="col-sm-10 " style="float: right;background-color: #fff;margin-left: 10px;">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1700px;margin-left: 279px;background-color: white">
        <div class="container " style="width:auto;float: left;margin-top: 10px">

          <h5><b>Subscription Payment Method</b></h5>
           <input type="text" class=" form-control hidden"   id="userKey" style="width: 250px">
          <input type="text" class=" form-control hidden"   id="userid" style="width: 250px">
        　 <input type="text" class=" form-control hidden"   id="comuserskey" style="width: 250px">
          <input type="text" class=" form-control hidden"   id="photourl" style="width: 250px">
          <input type="hidden" id="login_email">
          <input type="hidden" id="uid">
          <input type="hidden" id="subkey">
          <input type="hidden" id="subscribername">
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
          <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()" style="width: 1560px">
        </div>
      </div>

    <?php require'includes/ModalEditCompanyProfile.php';?>      
 

      <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="padding-bottom: 50px;height: auto;height: 550px"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc;width: auto;">
               <h5 style="float: left;"><b>Total Payment : </b> <b style="color:red" id="payment"></b></h5> 
                      <h5 style="float: right;margin-right: 90px"><b>Remaining Days:</b> </h5>
                      <h5 style ='float:right;margin-right:-135px;margin-top:10px;color:red;'><b id="Remaining"></b></h5>
                      <input type="hidden" name="" id="Subscription_Date">
            </div>
               
        <div class="content" style="width:60%;" id="paymentcontent">
             <h2 style="margin-left: 330px;width:500px"><b >Premium Subscription</b></h2>

            <div class="columns" style="margin-left: 300px; width:500px">
           <div class='col-md-4 card' style="height: 360px;width:360px">
      
          <form  style="margin-top: 40px">

    <!--         <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div> -->
            <div class='form-row'>
              <div class='col-xs-12 form-group '>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' size='4' type='text' id="cardname" required>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group  '>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' class='form-control ' size='20' type='text' id="cardnumber"required>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-4 form-group '>
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control' placeholder='ex. 311' size='4' type='text' id="cvc"required>
              </div>
              <div class='col-xs-4 form-group'>
                <label class='control-label'>Expiration</label>
                <input class='form-control ' placeholder='MM' size='2' type='text' id="expirationmonth"required>
              </div>
              <div class='col-xs-4 form-group '>
                <label class='control-label'> </label>
                <input class='form-control ' placeholder='YYYY' size='4' type='text' id="year"required>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12'>
                <div class='form-control total btn btn-info' style="height: 40px">
                  Total:
                  <span class='amount' ><B style="font-size: 12px"> P 450.00</B></span>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 form-group'>
                <button class='form-control btn btn-primary ' type='button'style="height: 40px" id="paymentyou"><B style="font-size: 12px">Pay »</B></button>
              </div>
            </div>
          </form>
        </div>

            </div>
          </div>
 
  </div>
     
</div>
</div>
    <div class="row" id="pay">
        <div class="col-sm-12">
         <div class="well" style="height:auto;padding-bottom: 50px;height: 405px;width: auto;"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc;width: auto;">
            <h5 style="float: left;"><b>View Payment <b></h5>
            <div style="padding-left: 20px; float: right;padding-top: 5px">
              </div>
            </div>
            <br>
            <div class="container" style="width: auto;height:">
              <ul class="nav nav-tabs">
                  <li class="active"style="width: 100%"><a data-toggle="tab" href="#home"style="color: black;font-size: 17px;text-align: center"> <i class="fa fa-close" style="margin-right: 10px"></i><b>Payment History</b></a></li>
                
              </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
         <table class="table table-hover" id="paymenthistory" style="table-layout: fixed;overflow-x: auto;width:100%;">
                    <thead>
                <tr style="margin-right: 10px">
                   <th style="font-size: 12px;padding-right: 10px;text-align: center">Subscriber's Name</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Date Pay</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Payment Type</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Status</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Payment Amount</th>
                  <th></th>
                </tr>
                   </thead>
                <tbody id="tbody1" style="font-size: 12px;text-align: center;padding-right: 10px;"></tbody>
          </table>
        </div>
       </div>
      </div>

        </div>
      </div>
      </div>
              <div class="modal fade" id="cancelsubcription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Payment Request</b></h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Click yes to accept</p>
                <h5 class="text-center fullname"></h5>
                        <input type="hidden"   id="cancelkey"  />
                         <input type="hidden"   id="Username"  />

                </div>
              <div class="modal-footer">
                  <button type="button" style="font-size: 12px"class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-default yes3" id="yescancel" data-key="key"style="font-size:12px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>
 </div>
</div>
<a href="#mydiv"type="button" class="btn button  btn-circle navbar-fixed-bottom btn-lg "  style="font-size: 12px;float: right;margin-top: 200px;margin-left: 1840px;background-color: #00cc99 ;opacity: 0.6;"><i class="glyphicon glyphicon-chevron-up" id="lastclicked"></i></a>  
</body>
</html>

<?php include 'script.php'?>
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
</body>
</html>
 <?php include 'includes/script.php'?>
  
