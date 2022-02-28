<!DOCTYPE html>
<html lang="en">
<head>
  <title>Company Record</title>
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
<body >
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

         <li><a href="dashboard.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Subscription <span class="badge badge-warning" id="badge1"style="margin-left:2px;font-size:11.7px;margin-top:-9px">
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>             
    
         </a>

         </li>
       
         <li  class="active"><a href="companyrecord.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_rep"></span>Subscriber</a></li>
             
        <li><a href="Billinginformation.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay"></span>Billing</a></li>
        <li><a href="SuperAdminReport.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon glyphicon-stats"></span>Report</a></li>


      </ul><br>

    </div>
    <br>
    <div class="col-sm-10 " style="float: right;background-color: #fff;margin-left: 10px">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1600px;margin-left: 320px;background-color: white">
        <div class="container" style="width:auto;float: left;margin-top: 10px;margin-left:45px">
          <h5><b>Subscription</b></h5>
        </div>
        <!--top navbar/ right side-->
        <div class="dropdown" style="float: right;top:15px;margin-right: 40px">
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
        <div class="col-10" style="padding-top: 38px">
          <form method="post"> 
              <input class="form-control" type="search" placeholder="Search" id="dsearch" style="width: 1570px">
          </form>
         
        </div>
      </div>
    <div class="row">
        <div class="col-sm-12">
         <div class="well" style="height:auto;padding-bottom: 50px;height: 405px;width: auto;"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc;width: auto;">
            <h5 style="float: left;"><b>Manage new subscriber<b></h5>
            <div style="padding-left: 20px; float: right;padding-top: 5px">
              </div>
            </div>
            <br>
            <div class="container" style="width: auto;height:">
              <ul class="nav nav-tabs">
                  <li class="active"style="width: 50%"><a data-toggle="tab" href="#home"style="color: black;font-size: 17px;text-align: center"> <i class="fa fa-close" style="margin-right: 10px"></i><b>Active Accounts</b></a></li>
                  <li style="width: 50%"  class=""><a data-toggle="tab" href="#menu1" style="color: black;font-size: 17px;text-align: center"> <i class="fa fa-close"style="margin-right: 10px"></i><b>Deactivate Accounts</b></a></li>
              </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
         <table class="table table-hover" id="subscriber" style="table-layout: fixed;overflow-x: auto;width:1450px;">
                    <thead>
                <tr style="margin-right: 10px">
                   <th style="font-size: 12px;padding-right: 10px;text-align: center">Subscriber's Name</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Company</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Owner</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Branch</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Address</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Docs</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Date Request</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Status</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Action</th>
                  <th></th>
                </tr>
                   </thead>
                <tbody id="tbody1" style="font-size: 12px;text-align: center;padding-right: 10px;"></tbody>
          </table>
        </div>
        <div id="menu1" class="tab-pane fade">
         <table class="table table-hover" id="deactivatetable" style="table-layout: fixed;overflow-x: auto;width:1450px;">
                    <thead>
                <tr style="margin-right: 10px">
                   <th style="font-size: 12px;padding-right: 10px;text-align: center">Subscriber's Name</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Company</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Owner</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Branch</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Address</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Docs</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Date Request</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Status</th>
                  <th style="font-size: 12px;text-align: center;padding-right: 10px;">Action</th>
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
      <!--Leave types-->

  <div class="modal fade" id="decilned" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Declined Request</b></h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Declined</p>
                <h5 class="text-center fullname"></h5>
                        <input type="hidden"   id="declinedkey"  />
                         <input type="hidden"   id="Username"  />

                </div>
              <div class="modal-footer">
                  <button type="button" style="font-size: 12px"class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-danger yes3" id="yesdeclined" data-key="key"style="font-size:12px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>

    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 500px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Submitted Documents</b> </h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Images of Documents</p>
                <h5 class="text-center fullname"></h5>
                        <input type="hidden"   id="viewkey"  />
                    
                    <div class="row" style="height:auto; width: auto;">
                        <div class="col-sm-3" id="subdoct"style="height:auto; width: auto;">
                            
                          </div>
                             

                    </div>

                </div>
              <div class="modal-footer">
                  <button type="button" style="font-size: 12px"class="btn btn-default" id="close"><span class="glyphicon glyphicon-remove"></span>close</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>  
</div>
</div>
</body>
</html>
 <?php include 'includes/script.php'?>
<script src="app.js"></script>
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

<script>

$(document).ready(function(){  
           $('#dsearch').keyup(function(){  
                search_table($(this).val());  
           });  
 
           function search_table(value){  
                $('#sub ').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  

</script>

  <script src="/__/firebase/5.7.0/firebase-app.js"></script>
  <script src="/__/firebase/5.7.0/firebase-auth.js"></script>
  <script src="/__/firebase/init.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
