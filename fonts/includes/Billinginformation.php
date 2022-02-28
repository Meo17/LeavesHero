<!DOCTYPE html>
<html lang="en">
<head>
  <icon class=""></icon><title>SuperAdminPage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/css1.css">
   <link rel="stylesheet" href="dist/sweetalert.css">
   <link rel="stylesheet" href="materialize/materialize.css">
   <link rel="stylesheet" href="materialize/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/css/mdb.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>
</head>
  
<?php require 'css/css6.css'?>
</head>
<body>



<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">
         <?php foreach($res as $a ) {?>  
         <li ><a href="dashboard.php?id=<?php echo $a["id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Subscription       
            <?php if($count==0){
              echo '<span style="padding-left: 10px"class="glyphicon glyphicon-bell hidden"> 4</span>
            ';
            }
            ?>
            <?php if($count!=0){
             echo '<span style="padding-left: 10px"class="glyphicon glyphicon-bell ">
             '.$count;
            }?></a>

         </li>
       
         <li ><a href="companyrecord.php?id=<?php echo $a["id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_rep"></span>Subscriber</a></li>
             
        <li class="active"><a href="Billinginformation.php?id=<?php echo $a["id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay"></span>Billing</a></li>
        <li><a href="SuperAdminReport.php?id=<?php echo $a["id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon glyphicon-stats"></span>Report</a></li>
 <?php }?> 

      </ul><br>

    </div>
    <br>
    
    <div class="col-sm-10 " style="float: right;background-color: #f1f1f1;margin-left: 10px">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1050px;margin-left: 213px;background-color: white">
        <div class="container" style="width:auto;float: left;margin-top: 10px">
          <h5><b>Billing Information</b></h5>
        </div>
        <!--top navbar/ right side-->
        <div class="dropdown" style="float: right;top:15px;">
          <img src="images/icon_user.png" style="height: 20px; width: 20px">
            <?php foreach($res as $u ) {?>
     
          <a class=" lightgray-hover dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 12px; font-family:'Roboto';"><b><?php echo $u['fullname']; ?></b>
                <?php }?>
            <span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <li><a data-toggle="modal" href="#myModal"><span class="design icon_edit" style="padding-bottom: 9px;top: 3px"></span>Edit</a></li>
                <li><a href="logout.php?logout"><span class="design icon_out" style="padding-bottom: 9px;top: 3px"></span>Logout</a></li>
             </ul>
        </div>
      </div>
      

      <div class="form-group row" style="padding-left: 10px;background-color: #fff;padding-bottom: 10px">
        <form method="post"> 
            
        <div class="col-10" style="padding-top: 38px">
              <form method="post"> 
                <input class="form-control" type="search" placeholder="Search" id="dsearch" >
            
            </div>
          </form>
      </div>
      <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="height:auto;padding-bottom: 50px;height: 405px"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc">
            <h5 style="float: left;"><b>Payments from Subscribers<b></h5>
            <div style="padding-left: 20px; float: right;padding-top: 5px">
              </div>
            </div>
            <br>
            <div class="container" style="width: 948px;" >
                 <div class="col-sm-9"  style="padding-left: 0px"> 
          <div class="container" style="width: 875px;overflow-x:auto">
            <table class="table table-hover" style="table-layout: auto ;"id="myTable">
              <thead>
                <tr>
                  <th style="font-size: 12px" >Company</th>
                  <th style="font-size: 12px">Owner</th>
                  <th style="font-size: 12px">Contact Number</th>
                  <th style="font-size: 12px">Address</th>
                  <th style="font-size: 12px">Email</th>
                  <th style="font-size: 12px">Permit No</th>
                  <th style="font-size: 12px">Payment Type</th>
                  <th style="font-size: 12px">Payment Date</th>
                  <th style="font-size: 12px">Amount</th>
                  <th style="font-size: 12px">Receiver</th>
                </tr>
            </thead>
     <?php foreach($Billinginformation as $row){?>  
         <tbody id="sub">
              <tr>
                <form method="post" > 
                <td style="font-size: 12px"><?php echo $row['Company_Name']?></td>
                <td style="font-size: 12px"><?php echo $row['Company_Owner']?></td>
                <td style="font-size: 12px"><?php echo $row['Company_Contact']?></td>
                <td style="font-size: 12px"><?php echo $row['Company_Address']?></td>
                <td style="font-size: 12px"><?php echo $row['Company_Email']?></td>
                <td style="font-size: 12px"><?php echo $row['Company_License']?></td>
                <td>              </td>
                <td></td>
                <td style="font-size: 12px"><?php echo $row['Subscription_Type']?></td>
                <td>
                </td>
                <td>
                  
                </td>
              </tr>
            </form>
            <?php }?>
            </tbody>

    
           </table>
          
          
        </div>
      </div> 
             
          </div>
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