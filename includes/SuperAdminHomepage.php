<!DOCTYPE html>
<html lang="en">
<head>
  <title>SuperAdminPage</title>
    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
  <?php include 'includes/empheader.php'?>
  <?php include 'css/css4.css';?>
       <!-- Bootstrap Core CSS -->

</head>
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
<body >
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

         <li class="active"><a href="dashboard.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Subscription<span class="badge badge-warning" id="badge1"style="margin-left:2px;font-size:11.7px;margin-top:-9px">
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>       
    
         </a>

         </li>
       
         <li><a href="companyrecord.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_rep"></span>Subscriber</a></li>
             
        <li><a href="Billinginformation.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay"></span>Billing</a></li>
        <li><a href="SuperAdminReport.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon glyphicon-stats"></span>Report</a></li>


      </ul><br>

    </div>
    <br>
    <div class="col-sm-10 " style="float: right;background-color: #fff;margin-left: 10px">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1600px;margin-left: 320px;background-color: white">
        <div class="container" style="width:auto;float: left;margin-top: 10px;margin-left:-2px">
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
              <input class="form-control" type="search" placeholder="Search" id="dsearch" style="width: 1550px">
          </form>
         
        </div>
      </div>

    <div class="row"style="height:auto">
        <div class="col-sm-12" style="height:auto">
         <div class="well" style="height:auto;padding-bottom: 50px;width: auto;"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc;width: auto;">
            <h5 style="float: left;"><b>Manage new subscriber<b></h5>
            <div style="padding-left: 20px; float: right;padding-top: 5px">
              </div>
            </div>
            <br>
            <div class="container" style="width: auto;height:auto;">
              <ul class="nav nav-tabs">
                  <li class="active"style="width: 32.5%"><a data-toggle="tab" href="#home"style="color: black;font-size: 17px;text-align: center">  <i class="fa fa-refresh"style="margin-right: 10px"></i><b>Pending</b></a></li>
                  <li style="width:32.5%"  class=""><a data-toggle="tab" href="#menu1" style="color: black;font-size: 17px;text-align: center"> <i class="fa fa-handshake-o"style="margin-right: 10px"></i><b>Accepted</b></a></li>
                 <li style="width: 32.5%" class=""><a data-toggle="tab" href="#menu2"style="color: black;font-size: 17px;text-align: center"><i class="fa fa-close" style="margin-right: 10px"></i><b>Declined</b></a></li>
              </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
              <table class="table table-hover" id="subscriber"style="width:1450px;" >
               <thead>
                <tr>
                   <th style="font-size: 12px;text-align: center">Subscriber's Name</th>
                  <th style="font-size: 12px;text-align: center">Company</th>
                  <th style="font-size: 12px;text-align: center">Owner</th>
                  <th style="font-size: 12px;text-align: center">Branch</th>
                  <th style="font-size: 12px;text-align: center">Address</th>
                  <th style="font-size: 12px;text-align: center">Docs</th>
                  <th style="font-size: 12px;text-align: center">Date Request</th>
                  <th style="font-size: 12px;text-align: center">Status</th>
                  <th style="font-size: 12px;text-align: center">Action</th>
                  <th></th>
                </tr>
              </thead>        
              <tbody id="tbody1" style="font-size: 12px;text-align: center;padding-right: 10px;"></tbody>
           </table>
        </div>
        <div id="menu1" class="tab-pane fade ">
              <table class="table table-hover" id="grantable"style="width:1450px;" >
               <thead>
                <tr>
                   <th style="font-size: 12px;text-align: center">Subscriber's Name</th>
                  <th style="font-size: 12px;text-align: center">Company</th>
                  <th style="font-size: 12px;text-align: center">Owner</th>
                  <th style="font-size: 12px;text-align: center">Branch</th>
                  <th style="font-size: 12px;text-align: center">Address</th>
                  <th style="font-size: 12px;text-align: center">Docs</th>
                  <th style="font-size: 12px;text-align: center">Date Request</th>
                  <th style="font-size: 12px;text-align: center">Status</th>
                  <th style="font-size: 12px;text-align: center">Action</th>
                  <th></th>
                </tr>
              </thead>        
              <tbody id="tbody1" style="font-size: 12px;text-align: center;padding-right: 10px;"></tbody>
           </table>
        </div>
           <div id="menu2" class="tab-pane fade ">
              <table class="table table-hover" id="declinedtable"style="width:1450px;" >
               <thead>
                <tr>
                   <th style="font-size: 12px;text-align: center">Subscriber's Name</th>
                  <th style="font-size: 12px;text-align: center">Company</th>
                  <th style="font-size: 12px;text-align: center">Owner</th>
                  <th style="font-size: 12px;text-align: center">Branch</th>
                  <th style="font-size: 12px;text-align: center">Address</th>
                  <th style="font-size: 12px;text-align: center">Docs</th>
                  <th style="font-size: 12px;text-align: center">Date Request</th>
                  <th style="font-size: 12px;text-align: center">Status</th>
                  <th style="font-size: 12px;text-align: center">Action</th>
                  <th></th>
                </tr>
              </thead>        
              <tbody id="tbody1" style="font-size: 12px;text-align: center;padding-right: 10px;"></tbody>
           </table>
        </div>
             
       </div>
      </div>

 
 
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

                </div>
              <div class="modal-footer">
                  <button type="button" style="font-size: 12px"class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-default yes3" id="yesdeclined" data-key="key"style="font-size:12px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>
    <div class="modal fade" id="decilned2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="hidden"   id="decilned2key"  />
                         <input type="hidden"   id="username"  />

                </div>
              <div class="modal-footer">
                  <button type="button" style="font-size: 12px"class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-default yes3" id="yesdeclined2" data-key="key"style="font-size:12px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>
      <div class="modal fade" id="deleterequest2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Delete Request</b></h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Delete</p>
                <h5 class="text-center fullname"></h5>
                        <input type="hidden"   id="deletekey2"  />

                </div>
              <div class="modal-footer">
                  <button type="button" style="font-size: 12px"class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-default yes3" id="yesdelete2" data-key="key"style="font-size:12px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>
   <div class="modal fade" id="grant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Grant Request</b></h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Grant This Request</p>
                <h5 class="text-center fullname"></h5>
                        <input type="hidden"   id="grantkey"  />
                          <input type="hidden"   id="name"  />
                </div>
              <div class="modal-footer">
                  <button type="button" style="font-size: 12px"class="btn  btn-danger  "  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-default yes3" id="yesgrant" data-key="key" name="updatestatus"style="font-size:12px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div> 
     <div class="modal fade" id="grant2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Grant Request</b></h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Grant This Request</p>
                <h5 class="text-center fullname"></h5>
                        <input type="hidden"   id="grantkey2"  />
                          <input type="hidden"   id="name2"  />
                </div>
              <div class="modal-footer">
                  <button type="button" style="font-size: 12px"class="btn  btn-danger  "  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-default yes3" id="yesgrant2" data-key="key" name="updatestatus"style="font-size:12px "><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div> 
    <div class="modal fade" id="viewdocs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                  <button type="button" style="font-size: 12px"class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>close</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>  
</div>
</diV>
</diV>
</body>



</html>
 <?php include 'includes/script.php'?>

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

