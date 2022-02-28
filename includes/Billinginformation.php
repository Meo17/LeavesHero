<!DOCTYPE html>
<html lang="en">
<head>
  <title>SuperAdminPage</title>
  <?php include 'includes/empheader.php'?>
</head>
  <style type="text/css">
    
     .modal-backdrop {

    display: none;    
} 
   
  .btn-circle.btn-lg {
  width: 45px;
  height: 45px;
  padding: 13px 14px;
  font-size: 24px;
  line-height: 2;
  border-radius: 30px;
}
 .modal-backdrop {

    display: none;    
} 
  #cancel{

    display: none;
  }

  #cancel2{

    display: none;
  }
  #setcanceldepartment{

    display: none;
  }
 
 #setcancelposition{

    display: none;
  }
  #setcancelbranch{

    display: none;
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
.notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
    -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
    box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);

}
.notice-sm {
    padding: 10px;
    font-size: 80%;
}
.notice-lg {
    padding: 35px;
    font-size: large;
}
.notice-success {
    border-color: #80D651;
}
.notice-success>strong {
    color: #80D651;
}
.notice-info {
    border-color: #45ABCD;
}
.notice-info>strong {
    color: #45ABCD;
}
.notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
.notice-danger {
    border-color: #d73814;
}
.notice-danger>strong {
    color: #d73814;
}
  </style>
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
 .modal-backdrop {

    display: none;    
} 
  #cancel{

    display: none;
  }

  #cancel2{

    display: none;
  }
  #setcanceldepartment{

    display: none;
  }
 
 #setcancelposition{

    display: none;
  }
  #setcancelbranch{

    display: none;
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
.notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
    -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
    box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);

}
.notice-sm {
    padding: 10px;
    font-size: 80%;
}
.notice-lg {
    padding: 35px;
    font-size: large;
}
.notice-success {
    border-color: #80D651;
}
.notice-success>strong {
    color: #80D651;
}
.notice-info {
    border-color: #45ABCD;
}
.notice-info>strong {
    color: #45ABCD;
}
.notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
.notice-danger {
    border-color: #d73814;
}
.notice-danger>strong {
    color: #d73814;
}
  </style>


<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">
         <li><a href="dashboard.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Subscription<span class="badge badge-warning" id="badge1"style="margin-left:2px;font-size:11.7px;margin-top:-9px">
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>       
    
         </a>

         </li>
       
         <li><a href="companyrecord.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_rep"></span>Subscriber</a></li>
             
        <li  class="active"><a href="Billinginformation.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay"></span>Billing</a></li>
        <li><a href="SuperAdminReport.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon glyphicon-stats"></span>Report</a></li>


      </ul><br>

    </div>
    <br>
    
    <div class="col-sm-10 " style="float: right;background-color: #fff;margin-left: 10px">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1600px;margin-left: 320px;background-color: white;width: auto;">
        <div class="container" style="width:auto;float: left;margin-top: 10px">
          <h5><b>Billing Information</b></h5>
        </div>
        <!--top navbar/ right side-->
        <div class="dropdown" style="float: right;top:15px;margin-right: 30px">
          <img src="images/icon_user.png" style="height: 20px; width: 20px">
            <?php foreach($res as $u ) {?>
     
          <a class=" lightgray-hover dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 12px; font-family:'Roboto';"><b><?php echo $u['fullname']; ?></b>
                <?php }?>
            <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="design icon_out" style="padding-bottom: 9px;top: 3px"></span>Logout</a></li>
             </ul>
        </div>
      </div>
      

      <div class="form-group row" style="padding-left: 10px;background-color: #fff;padding-bottom: 10px">
        <form method="post"> 
            
        <div class="col-10" style="padding-top: 38px">
              <form method="post"> 
                <input class="form-control" type="search" placeholder="Search" id="dsearch" style="width: 1570px">
            </div>
          </form>
      </div>
      <!--Leave types-->
    <div class="row">
        <div class="col-sm-12">
         <div class="well" style="height:auto;padding-bottom: 50px;height: 405px;width: auto;"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc;width: auto;">
            <h5 style="float: left;"><b>Payments from Subscribers<b></h5>
            <div style="padding-left: 20px; float: right;padding-top: 5px">
              </div>
            </div>
            <br>
            <div class="container" style="width: auto;height:">
              <ul class="nav nav-tabs">
                  <li class="active"style="width: 50%"><a data-toggle="tab" href="#home"style="color: black;font-size: 17px;text-align: center"> <i class="fa fa-close" style="margin-right: 10px"></i><b>Receive  </b></a></li>
                 <li style="width: 50%"><a data-toggle="tab" href="#menu"style="color: black;font-size: 17px;text-align: center"> <i class="fa fa-close" style="margin-right: 10px"></i><b>Accepeted  </b></a></li>
              </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
         <table class="table table-hover" id="paymenthistory" style="table-layout: fixed;overflow-x: auto;width:1450px;">
                    <thead>
                <tr style="margin-right: 10px">
                   <th style="font-size: 12px;padding-right: 10px;text-align: center">Company</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Owner</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Contact Number</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Address</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Email</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Permit No</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Payment Date</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Amount</th>
                  <th></th>
                </tr>
                   </thead>
                <tbody id="tbody1" style="font-size: 12px;text-align: center;padding-right: 10px;"></tbody>
          </table>
        </div>
         <div id="menu" class="tab-pane fade">
         <table class="table table-hover" id="accepttable" style="table-layout: fixed;overflow-x: auto;width:1450px;">
                    <thead>
                <tr style="margin-right: 10px">
                   <th style="font-size: 12px;padding-right: 10px;text-align: center">Company</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Owner</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Contact Number</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Address</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Email</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Permit No</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Payment Date</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Amount</th>
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
   <div class="modal fade" id="acceptpay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="hidden"   id="accepteky"  />
                      

                </div>
              <div class="modal-footer">
                  <button type="button" style="font-size: 12px"class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-default yes3" id="yesaccept" data-key="key"style="font-size:12px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
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