<!DOCTYPE html>
<html lang="en">
<head>
  <title>SABillingDebitPage</title>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/css1.css">
   <link rel="stylesheet" href="dist/sweetalert.css">
   <link rel="stylesheet" href="materialize/materialize.css">
   <link rel="stylesheet" href="materialize/materialize.min.css">
   <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>
  <?php include 'css/css14.css'?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>

  <link href='css/fullcalendar.css' rel='stylesheet' />





</head>
  

<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">
        
        
        <?php foreach($ret as $a ) {?>  
        <li><a href="companydashboard.php?Company_Id=<?php echo $a["Company_Id"];?>" class="aqua-hover" style="color:#fff ; padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Customize</a></li>
          <?php }?>
          <?php foreach($ret as $b ) {?>  
        <li><a href="companyaddemployee.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>
        <li><a href="companyemployeerecord.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee</a></li>
        <li><a href="leaveapplication.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon-inbox"><i class="fa fa-envelope"></i></span>Request
                  <?php if($count==0){
              echo '<span style="padding-left: 10px"class="glyphicon glyphicon-bell hidden"> 4</span>
            ';
            }
            ?>
            <?php if($count!=0){
             echo '<span style="padding-left: 10px"class="glyphicon glyphicon-bell ">
             '.$count;
            }?>

        </a></li>
        <li><a href="CompanyHR_Report.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class=" fa fa-area-chart"></i></span>Report</a></li>
        <li><a href="CompanyHR_Holiday_Calendar.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="glyphicon glyphicon-calendar"></i></span>Holiday</a></li>
        <li class="active"><a href="companybillingaccount.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="fa fa-paypal"></i></span>Payment</a></li>
        <?php }?>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-10" style="float: right;background-color: #f1f1f1">
      <div class="container" style="border-bottom: 2px solid #00cc99; height: 30px;float: left;width: 954px">
        <div class="container" style="width:auto;float: left;">
         <?php foreach($ret as $u ) {?>
          <h5>Subscription Payment Method</h5>
        </div>
        <!--top navbar/ right side-->
        <div class="dropdown" style="float: right;top:-13px;">
          <img src="images/icon_user.png" style="height: 20px; width: 20px">
          <button class="btn btn-white lightgray-hover dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 10px; font-family:'Roboto';"><?php echo $u['Company_Name']; ?>
              <?php }?> 
            <span class="caret"></span></button>
              <ul class="dropdown-menu">
               <li><a data-toggle="modal" href="#myModal"<?php echo $a["Company_Id"];?>><span class="design icon_edit" style="padding-bottom: 9px;top: 3px"></span>Edit</a></li>
                <li><a href="logout.php?logout"><span class="design icon_out" style="padding-bottom: 9px;top: 3px"></span>Logout</a></li>
             </ul>
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
            <div class="modal-body">
               <form method="post">
                 <img src="images/icon_user_edit.png" class="center">
                <div class="form-group" style="padding-top: 10px">
                  <p>Username</p>
                   <input type="text" class="form-control hidden" name="id"   value="<?php echo $com["Company_Id"];?>"> 
                  <input type="text" class="form-control" name="usercom" value="<?php echo $com['Username']?>">
              </div>
              <div class="form-group">
                  <p>Password</p>
                  <input type="pwd" class="form-control" name="pass" value="<?php echo $com['Password']?>">
              </div>
              <div class="form-group">
                  <p>Contact Number</p>
                  <input type="text" class="form-control" name="contact" value="<?php echo $com['Company_Contact']?>">
              </div>
              <div class="form-group">
                  <p>Email Address</p>
                  <input type="text" class="form-control" name="email" value="<?php echo $com['Company_Email']?>">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-leave btn-hover-white" name="companyedit">Save</button>
            </div>
           </form>
          </div> 
        </div>
      </div>

      <div class="form-group row" style="padding-left: 10px;background-color: #fff;padding-bottom: 10px">
        <div class="col-10" style="padding-top: 38px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch">
        </div>
      </div>
      <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="padding-bottom: 50px;height: 250px"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc">
                <h5 style="float: left;">Total Payment : </h5> 
                      <h5 style="float: right;margin-right: 90px">Remaining Days: </h5>
                      <?php foreach($remainingdays as $days ) {?>
                        <?php if ($days['Subscription_Type'] = 'Free trial') {?>
                             <?php
                                   $start = $days['Sub_Date'];
                                   $end   = date("h:i:sa");
                              function dateDiff($start, $end) 
                               {
                                 $date1_ts  = strtotime($start);
                                 $date2_ts  = strtotime($end);
                                 $diff      = $date2_ts - $date1_ts;
                                  return round($diff / 86400);
                              }
                                $dateDiff  = dateDiff($start, $end);
                                $remain    = 30 - $dateDiff;
                                if ($remain > 0){
                                  echo "<h5 style ='float:right;margin-right:-120px;margin-top:10px;color:red'> $remain</h5>";
                                }
                                else if ($remain < 0){
                                  echo "<h5 style ='float:right;margin-right:-120px;margin-top:10px;color:red'> 0</h5>";
                                }

                                if ($remain < 0) {
                                    $payment = 120.00;
                                  echo "<h5 style ='float:left;margin-right:10x0px;margin-top:10px;color:red'>$payment</h5>";
                                }
                                if ($remain > 0) {
                                    $payment = "Free Trial";
                                  echo "<h5 style ='float:left;margin-right:10x0px;margin-top:10px;color:red'>$payment</h5>";
                                }
                                ?> 

                             <?php }?>
                      <?php }?>
              <div style="padding-left: 20px; float: right;padding-top: 5px">
              </div>
            </div>
            <br>
            <div class="container" style="width: 948px;" >
                 <div class="col-sm-12"  style="padding-left: 0px"> 
                      <div class="container" style="width: 940px">
                        <div class="container" style="width: 935px">
                          <h5>Payment Method</h5>
                          <ul class="resp-tabs-list" style="padding-left: 145px">
                
                              <li class="resp-tab-item pay-tab active-tab" aria-controls="tab_item-0" role="tab"><a class="pay-tab" href="companybillingaccount.php" style="text-decoration: none"><span><label style="height:50px" class="pic1 "style="width:100px'margin-left"></label>Credit Card</span></a></li>
                              <li class="resp-tab-item pay-tab active-tab " aria-controls="tab_item-1" role="tab">
                                <a class="pay-tab" href="NetBanking.php" style="text-decoration: none"><span><label style="height:50px"class="pic3"></label>Net Banking</span></a></li>
                              <li class="resp-tab-item pay-tab active-tab" aria-controls="tab_item-2" role="tab"><a class="pay-tab" href="Paypal.php" style="text-decoration: none"><span><label style="height:50px"class="pic4"></label>PayPal</span></a></li> 
                              <li class="resp-tab-item resp-tab-active" aria-controls="tab_item-3" role="tab"><a class="pay-tab" href="DebitCard.php" style="color:#00cc99;text-decoration: none"><span><label style="height:50px"class="pic2"></label>Debit Card</span></a></li>
                              <div class="clear"></div>
              
                          </ul> 
                        </div>
                      </div>
                </div> 
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="padding-bottom: 50px;height: 350px"> 
            <div style="width: 650px;padding-right: 40px;float:left">
            <form class="form" method="post" style="padding-left: 350px;padding-top: 20px">
              <h5>Debit Card Information</h5>
                <div class="form-group" style="padding-right: 10px">
                  <h6>Name on Card</h6>
                  <input type="text" class="form-control"  placeholder="Email Address" name="email" required>
                   <input type="text" class="form-control hidden"  placeholder="Email Address" value ="<?php echo $com["Company_Id"];?>"name="Company_Id" >
                </div>
                <div class="form-group"  style="padding-right: 10px">
                  <h6>Card Number</h6>
                  <input type="text" class="form-control" placeholder="Company Name"  name="companyname"required>
                </div>
                <div class="form-group"  style="padding-right: 10px">
                  <h6>Phone Number</h6>
                  <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber"required>
                </div>
             
            </div>
            <div style="width: 550px;padding-left: 370px;">
              <button type="submit" class="btn btn-gray btn-hover-lightgray btn-sm" style="width: 62px;line-height: 1" name="submit">Submit</button>
              <div class="checkbox">
                <h6>
                  <input type="checkbox" value="" name="check">By checking this box, I agree to the Terms & Conditions & Privacy Policy.
                </h6>
              </div>
            </div>
           </form>
          </div>
        </div>
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
