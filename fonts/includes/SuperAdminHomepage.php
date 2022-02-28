<!DOCTYPE html>
<html lang="en">
<head>
  <title>SuperAdminPage</title>
  <meta charset="utf-8">
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
</head>
  
<?php include 'css/css4.css';?>
       <!-- Bootstrap Core CSS -->
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
         <?php foreach($res as $a ) {?>  
         <li class="active"><a href="dashboard.php?id=<?php echo $a["id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Subscription       
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
       
         <li><a href="companyrecord.php?id=<?php echo $a["id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_rep"></span>Subscriber</a></li>
             
        <li><a href="Billinginformation.php?id=<?php echo $a["id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay"></span>Billing</a></li>
        <li><a href="SuperAdminReport.php?id=<?php echo $a["id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon glyphicon-stats"></span>Report</a></li>
 <?php }?> 

      </ul><br>

    </div>
    <br>
    <div class="col-sm-10 " style="float: right;background-color: #f1f1f1;margin-left: 10px">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1050px;margin-left: 213px;background-color: white">
        <div class="container" style="width:auto;float: left;margin-top: 10px">
          <h5><b>Subscription</b></h5>
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
        <div class="col-10" style="padding-top: 38px">
          <form method="post"> 
              <input class="form-control" type="search" placeholder="Search" id="dsearch" >
          </form>
         
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
               <form class="form" action="/action_page.php">
                 <img src="images/icon_user_edit.png" class="center">
                <div class="form-group" style="padding-top: 10px">
                  <p>Username</p>
                  <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                  <p>Password</p>
                  <input type="pwd" class="form-control" id="email">
              </div>
              <div class="form-group">
                  <p>Contact Number</p>
                  <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                  <p>Email Address</p>
                  <input type="text" class="form-control" id="email">
              </div>
               </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-leave btn-hover-white" data-dismiss="modal">Save</button>
            </div>
          </div> 
        </div>
      </div>


    <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="height:auto;padding-bottom: 50px;height: 405px"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc">
            <h5 style="float: left;"><b>Manage new subscriber</b> 
            <div style="padding-left: 20px; float: right;padding-top: 5px">
              </div>
            </div>
            <br>
            <div class="container" style="width: 948px;" >
                 <div class="col-sm-9"  style="padding-left: 0px"> 
          <div class="container" style="width: 875px;overflow-x:auto">
            <table class="table table-hover" style="table-layout: auto ;" >
              <thead>
                <tr>
                   <th style="font-size: 12px">Subscriber's Name</th>
                  <th style="font-size: 12px">Company</th>
                  <th style="font-size: 12px">Owner</th>
                  <th style="font-size: 12px">Branch</th>
                  <th style="font-size: 12px">Address</th>
                  <th style="font-size: 12px">Docs</th>
                  <th style="font-size: 12px">Status</th>
                  <th></th>
                  <th></th>
                </tr>
            </thead>
         <?php foreach( $ret as $row){?>
          
            <tbody id="sub">

              <tr >
                <form  method="post">

            <?php if ($row['Status'] == 'Waiting for approval' ){ ?>
                <td style="font-size: 12px"><?php echo $row['Subscriber_Name']; ?></td>
                <td style="font-size: 12px"><?php echo $row['Company_Name']; ?></td>
                <td style="font-size: 12px"><?php echo $row['Company_Owner']; ?></td>
                <td style="font-size: 12px"><?php echo $row['Branch']; ?></td>
                <td style="font-size: 12px"><?php echo $row['Company_Address']; ?></td>

                 <td class="hidden">
                    <div class="form-group hidden">
                      <input type="text" class="input-style3" name="company_name"id="status" value="<?php echo $row['Company_Name']?>" placeholder="Status" required>  
                    <input type="text" class="input-style3" name="company_username"id="status" value="<?php echo $row['Username']?>" placeholder="Status" required>
                  <input type="text" class="input-style3" name="company_password"id="status" value="<?php echo $row['Password']?>" placeholder="Status"required>
                  <input type="text" class="input-style3" name="company_email"id="status" value="<?php echo $row['Company_Email']?>" placeholder="Status"required>
                     <input type="date" class="input-style3" name="date"id="status" value="<?php echo date("Y/m/d")?>" placeholder="Status"required>
                    </div>
                </td>
                 <td><a style="color:black;text-decoration:none" download="<?php echo $row['Supporting_Doc1']?>" href="uploads/<?php echo $row['Supporting_Doc1']?>"><?php  echo $row['Supporting_Doc1']?>　<span class="glyphicon glyphicon-download-alt"></span><br>
                  <a style="color:black;text-decoration:none" download="<?php echo $row['Supporting_Doc2']?>" href="uploads/<?php echo $row['Supporting_Doc2']?>"><?php  echo $row['Supporting_Doc2']?> <span class="glyphicon glyphicon-download-alt"></span><br>
                 <a style="color:black;text-decoration:none" download="<?php echo $row['Supporting_Doc4']?>" href="uploads/<?php echo $row['Supporting_Doc3']?>"><?php  echo $row['Supporting_Doc3']?> <span class="glyphicon glyphicon-download-alt"></span><br>
                </td>
                <td><?php echo $row['Status']; ?></td>
                 <td> 
                    <a class="btn btn-info btn-hover-white btn-sm  view1" data-id ="<?php echo $row['Company_Id'];?>" style="font-size:10px">view</a>                    
                </td>              
               <td>
                  <div style="float: left">
                    <?php if ($row['Status'] == 'Waiting for approval' ){ ?>
                        <a type="submit" class="btn btn-defualt btn-sm" href="Confirm.php?Company_Id=<?php echo $row["Company_Id"];?>" style="width: 65px;font-size:10px">Grant</a>
                     <?php }?>
                     <?php if ($row['Status'] == 'Verified' ){ ?>
                        <a type="submit" class="btn btn-leave btn-sm disabled" href="Confirm.php?Company_Id=<?php echo $row["Company_Id"];?>" style="width: 65px">Grant</a>
                     <?php }?>
                     <?php if ($row['Status'] == 'Disapproved' ){ ?>
                        <a type="submit" class="btn btn-leave btn-sm disabled" href="Confirm.php?Company_Id=<?php echo $row["Company_Id"];?>" style="width: 65px">Grant</a>
                     <?php }?>
                   
                  </div>
                
                </td>
                  <td>
                     <div style="float:right">
                       <?php if ($row['Status'] == 'Waiting for approval' ){ ?>                  
                      <a type="submit" class="btn btn-danger btn-sm btn-hover-lightgray"  href="Decline.php?Company_Id=<?php echo $row["Company_Id"];?>"style="width: 75px;font-size:10px">Decline</a>
                      <?php }?>
                       <?php if ($row['Status'] == 'Verified' ){ ?>
                        <a type="submit" class="btn btn-gray btn-sm btn-hover-lightgray disabled" style="width: 65px">Decline</a>
                     <?php }?>
                     <?php if ($row['Status'] == 'Disapproved' ){ ?>
                        <a type="submit" class="btn btn-gray btn-sm btn-hover-lightgray disabled" style="width: 65px">Decline</a>
                     <?php }?>
                    </div>
                  </td>
             <?php }?>
              </form>
              </tr>
            </tbody>
          
            <?php }?>
           </table>
          
          
        </div>
      </div> 
             
          </div>
        </div>
      </div>
      </div>
  <!---------------------- END------------------------------------>      
       <!---------------------------------------------------VIEW LEAVE MODAL------------------------------------------------------------>
 <div class="modal fade" id="view1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 300px">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Company Profile</h4></center>
            </div>
            
             <div class="modal-body" > 
                        <h6>Company Name :</h6>
                        <h6>Subscriber Name:</h6>
                        <h6>Company Owner:</h6>
                        <h6>Company Address :</h6>
                        <h6>Company Contact:</h6>
                        <h6>Company Email:</h6>
                        <h6>Company License :</h6>
                        <h6>Branch :</h6>
                        <h6>Supporting Document1:</h6>
                        <h6>Supporting Doc2:</h6>
                        <h6>Supporting Doc3:</h6>

                          <div style="float: right; text-align: right;margin-right: 10px;margin-top: -265px">
                           <h6 class="Company_Name"></h6>
                           <h6 class="Subscriber_Name"></h6>
                           <h6 class="Company_Owner"></h6>
                           <h6 class="Company_Address"></h6>
                           <h6 class="Company_Contact"></h6>
                           <h6 class="Company_Email"></h6>
                           <h6 class="Company_License"></h6>
                           <h6 class="Branch"></h6>
                           <h6 class="Supporting_Doc1"></h6>
                           <h6 class="Supporting_Doc2"></h6>
                           <h6 class="Supporting_Doc3"></h6>
                          </div>
           </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-success" data-dismiss="modal"> close</button>
            </div>
        </div>
    </div>
</div>    

<!------------------------------------------------------END MODAL----------------------------------------------------------------------->
             
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
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
