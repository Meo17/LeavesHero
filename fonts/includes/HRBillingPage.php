<?php 
  // Load Stripe's PHP library and set your secret keys
  require_once("config.php"); 
  // Create the subscription
  require_once("create-subscription.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HRBillingPage</title>
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
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

  <?php include 'css/css13.css'?>
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
</style>
 
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 230px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">
        
        <?php foreach($ret as $a ) {?>  
        <li><a href="companydashboard.php?Company_Id=<?php echo $a["Company_Id"];?>" class="aqua-hover" style="color:#fff ; padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Customize</a></li>
          <?php }?>
          <?php foreach($ret as $b ) {?>  
        <li><a href="companyaddemployee.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>
        <li><a href="companyemployeerecord.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee Record</a></li>
        <li><a href="leaveapplication.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon-inbox"><i  class="glyphicon glyphicon-bell">
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
        <li><a href="CompanyHR_Report.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class=" fa fa-area-chart"></i></span>Analytical Report</a></li>
        <li><a href="CompanyHR_Holiday_Calendar.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="glyphicon glyphicon-calendar"></i></span>View Calendar's Holiday</a></li>
        <li class="active"><a href="companybillingaccount.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="fa fa-paypal"></i></span>Subscription Payment</a></li>
        <?php }?>
      </ul><br>
    </div>
    <br>
    <div class="col-sm-10 " style="float: right;background-color: #f1f1f1;margin-left: 10px"id="mydiv">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1050px;margin-left: 211px;background-color: white">
        <div class="container " style="width:auto;float: left; margin-top: 10px">
          <?php foreach($ret as $u ) {?>
   
          <h5><b>Subscription Payment Method</b></h5>
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
          <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()" style="width:1000px ">
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
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="padding-bottom: 50px;height: 700px"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc">
               <h5 style="float: left;"><b>Total Payment : </b></h5> 
                      <h5 style="float: right;margin-right: 90px"><b>Remaining Days:</b> </h5>
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
                                  echo "<h5 style ='float:right;margin-right:-135px;margin-top:10px;color:red;'> $remain</h5>";
                                }
                                else if ($remain < 0){
                                  echo "<h5 style ='float:right;margin-right:-135px;margin-top:10px;color:red;margin-left:10px'> 0</h5>";
                                }

                                if ($remain < 0) {
                                    $payment = 120.00;
                                  echo "<h5 style ='float:left;margin-right:10x0px;margin-top:10px;color:red;margin-left:10px'>$payment</h5>";
                                }
                                if ($remain > 0) {
                                    $payment = "Free Trial";
                                  echo "<h5 style ='float:left;margin-right:10x0px;margin-top:10px;color:red;margin-left:10px'>$payment</h5>";
                                }
                                ?> 

                             <?php }?>
                    <?php }?>
                     

            </div>
                 <?php if (isset($success)): ?>
      <div class='success'><?php echo $success; ?></div>
    <?php else: ?>
      <?php if (isset($error)): ?>
        <div class='error'><?php echo $error; ?></div>
      <?php endif ?>      

<div class="content1" style="width:60%;">
<h2 style="text-align:center">Your Subscriptions Type </h2>


<div class="columns">
  <ul class="price">
    <li class="header">Basic</li>
    <li class="grey">$ 9.99 / year</li>
    <li>10GB Storage</li>
    <li>10 Emails</li>
    <li>10 Domains</li>
    <li>1GB Bandwidth</li>
    <li class="grey">

        <form action="" method="POST" class="spacing">
        <input name="plan" type="hidden" value="Basic" />         
        <input name="interval" type="hidden" value="year" />         
        <input name="price" type="hidden" value="9.99" />         
        <input name="currency" type="hidden" value="usd" />         
        <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-image="http://www.w3school.info/wp-content/uploads/2017/08/w3school_logo.png"
          data-name="BASIC PLAN"
          data-description="Start with basic plan"
          data-panel-label="Subscribe Now"
          data-label="Subscribe Now"
          data-locale="auto">
        </script>
      </form>
   

    </li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header" style="background-color:#4CAF50">Pro</li>
    <li class="grey">$ 24.99 / year</li>
    <li>25GB Storage</li>
    <li>25 Emails</li>
    <li>25 Domains</li>
    <li>2GB Bandwidth</li>
    <li class="grey">
       <form action="" method="POST" class="spacing">
         
        <input name="plan" type="hidden" value="Pro" />         
        <input name="interval" type="hidden" value="year" />         
        <input name="price" type="hidden" value="24.99" />         
        <input name="currency" type="hidden" value="usd" />               
        <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-image="http://www.w3school.info/wp-content/uploads/2017/08/w3school_logo.png"
          data-name="Pro PLAN"
          data-description="Start with Pro plan"
          data-panel-label="Subscribe Now"
          data-label="Subscribe Now"
          data-locale="auto">
        </script>
      </form>
    </li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">Premium</li>
    <li class="grey">$ 49.99 / year</li>
    <li>50GB Storage</li>
    <li>50 Emails</li>
    <li>50 Domains</li>
    <li>5GB Bandwidth</li>
    <li class="grey">
<form action="" method="POST" class="spacing">     
        <input name="plan" type="hidden" value="Premium" />         
        <input name="interval" type="hidden" value="year" />         
        <input name="price" type="hidden" value="49.99" />         
        <input name="currency" type="hidden" value="usd" />           
        <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-image="http://www.w3school.info/wp-content/uploads/2017/08/w3school_logo.png"
          data-name="Premium PLAN"
          data-description="Start with Premium plan"
          data-panel-label="Subscribe Now"
          data-label="Subscribe Now"
          data-locale="auto">
        </script>
      </form>
    </li>
  </ul>
</div>

  <?php endif ?>  

</div>
          </div>
     
        </div>
      </div>
    <br>
 
<a href="#mydiv"type="button" class="btn button  btn-circle navbar-fixed-bottom btn-lg "  style="font-size: 12px;float: right;margin-top: 200px;margin-left: 1170px;background-color: #00cc99 ;opacity: 0.6;"><i class="glyphicon glyphicon-chevron-up" id="lastclicked"></i></a>  
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