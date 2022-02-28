<!DOCTYPE html>
<html lang="en">
<head>
  <i ></i> <title>Human Resources Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/css.css">
   <link rel="stylesheet" href="dist/sweetalert.css">
   <link rel="stylesheet" href="materialize/materialize.css">
   <link rel="stylesheet" href="materialize/materialize.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/css/mdb.min.css" />
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>
   
  <?php include 'css/css1.css'?>
       <!-- Bootstrap Core CSS -->
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
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 230px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">
        
        <?php foreach($ret as $a ) {?>  
        <li class="active"><a href="companydashboard.php?Company_Id=<?php echo $a["Company_Id"];?>" class="aqua-hover" style="color:#fff ; padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Customize</a></li>
          <?php }?>
          <?php foreach($ret as $b ) {?>  
        <li><a href="companyaddemployee.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>
        <li><a href="companyemployeerecord.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee Record</a></li>
        <li><a href="leaveapplication.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon-inbox"><i  class="glyphicon glyphicon-bell">
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
        <li ><a href="companybillingaccount.php?Company_Id=<?php echo $b["Company_Id"];?>" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="fa fa-paypal"></i></span>Subscription Payment</a></li>
        <?php }?>
      </ul><br>
    </div>
    <br>
    <br>
    
    <div class="col-sm-10 " style="float: right;background-color: #f1f1f1;margin-left: 10px;">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1050px;margin-left: 211px;background-color: white">
        <div class="container " style="width:auto;float: left;margin-top: 10px">
          <?php foreach($ret as $u ) {?>
   
          <h5><b>Customization</b></h5>
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
      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px"id="mydiv">
        <div class="col-10" style="padding-top: 25px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()"style="width: 1030px">
        </div>
      </div>
      <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="height: auto;">
            <div class="container" style="padding-right: 15px;width: 910px;border-bottom: 2px solid #ccc">
            <h5 style="float: left;">Customize Company Leave Type</h5>
          
            </div>

            <form class="form-inline"  style="padding-left: 18px;padding-top: 10px" method="post">

              <div class="form-group" style="padding-right: 10px">
                <p>Leave Type</p>
                <input type="text" class="form-control" name="leavetype"required placeholder="Leave Type" >
                <input type="text" class="form-control hidden" name="comapanyid" value="<?php echo $com['Company_Id']?>" >
              </div>
              <div class="form-group" style="padding-right: 6px">
                <p>Number of Days</p>
                <div style="padding-left: 20px">
                  <input type="Number" class="form-control"  style="width: 65px" name="numberofdays" required placeholder="0">
                </div>
              </div>
              <div class="form-group" style="padding-right: 10px">  
                <p style="padding-left: 100px">Duration</p>
                <div >
                  <label class="checkbox-inline"><input type="checkbox" name="ids[]" value="Half Day">Half Day</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ids[]" value="Full Day">Full Day</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ids[]" value="Multiple Days">Multiple Days</label>
                   <input type="Number" class="form-control"  style="width: 60px" name="multiple1">
                </div>
              </div>
              <div class="form-group">
                <p style="padding-left: 30px">Requirement/s</p>
                <textarea class="form-control" rows="5" name="requirement" style="height: 26px" placeholder="Requirement/s"></textarea>
              </div>
              <div class="form-group" style="padding-left: 20px; padding-top: 26px">
                <button type="submit" class="btn btn-gray btn-hover-lightgray btn-sm" style="line-height: 1;font-size: 10px" name="add">Add</button> 
              </div>
            </form>
           <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
              <button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message"></span>
            </div>
            
           <table class="table table-hover" style="table-layout: auto; overflow-y: auto;">
              <thead > 
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="font-size: 15px">Leave Type</th>
                  <th style="font-size: 15px">Days</th>
                  <th style="font-size: 15px">Duration</th>
                  <th style="font-size: 15px">Multiple Days</th>
                  <th style="font-size: 15px">Requirements</th>
                  <th style="font-size: 15px"></th>
                  <th style="font-size: 15px"></th>
                  <th style="font-size: 15px"></th>
                  <th style="font-size: 15px"></th>
                </tr>
            </thead>
            <tbody id="tbody"style="font-size: " ></tbody>
             
        </form>
      </tr>
    </tbody>
  </table>
</div>
      <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="height: auto;">
            <div class="container" style="padding-right: 15px;width: 910px;border-bottom: 2px solid #ccc">
            <h5 style="float: left;"><b>Customize Employee Leave Type</b></h5>
          
            </div>

            <form class="form-inline"  style="padding-left: 18px;padding-top: 10px" method="post">

              <div class="form-group" style="padding-right: 10px">
                <p>Leave Description</p>
                <input type="text" class="form-control" name="leavetype"required  placeholder="Leave Type">
                <input type="text" class="form-control hidden" name="comapanyid" value="<?php echo $com['Company_Id']?>" >
              </div>
              <div class="form-group" style="padding-right: 6px">
                <p>Number of Days</p>
                <div style="padding-left: 20px">
                  <input type="Number" class="form-control"  style="width: 65px" name="numberofdays" required placeholder="0">
                </div>
              </div>
              <div class="form-group" style="padding-right: 10px">  
                <p style="padding-left: 100px">Duration</p>
                <div >
                  <label class="checkbox-inline"><input type="checkbox" name="ids[]" value="Half Day" >Half Day</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ids[]" value="Full Day">Full Day</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ids[]" value="Multiple Days">Multiple Days</label>
                  <input type="Number" class="form-control"  style="width: 60px" name="multiple1">
                </div>

              </div>
                  <div class="form-group">
                    <p style="padding-left: 30px">Employee Position</p>
                    <input type="text" class="form-control" name="position"required placeholder="Employee Position" style="width: 150px" >
              </div>
                      <div class="form-group">
               <button type="submit" class="btn btn-gray btn-hover-lightgray btn-sm" style="line-height: 1;font-size: 10px;float: right;" name="addemployeeleave">Add</button>
             </div>
              <div class="form-group">
  
                <p style="padding-left: 30px">Requirement/s</p>

                <textarea class="form-control" rows="5" name="requirement" style="height: 35px" placeholder="Requirement/s"></textarea>
              </div>

            </form>
             <div id="alert2" class="alert alert-info text-center" style="margin-top:20px; display:none;">
              <button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message2"></span>
            </div>
            
           <table class="table table-hover" style="table-layout: auto; overflow-y: auto;">
              <thead > 
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="font-size: 15px">Leave Type</th>
                  <th style="font-size: 15px">Days</th>
                  <th style="font-size: 15px">Duration</th>
                  <th style="font-size: 15px">Multiple Days</th>
                  <th style="font-size: 15px">Requirements</th>
                  <th style="font-size: 15px">Position</th>
                  <th style="font-size: 15px"></th>
                  <th style="font-size: 15px"></th>
                  <th style="font-size: 15px"></th>
                </tr>
            </thead>
            <tbody id="tbody2"> 

            
            </tbody>
             
        </form>
      </tr>
    </tbody>
  </table>
</div>
 

</div>
<script type="text/javascript">
  function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("tbody");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
} 
</script>
<div class="col-sm-12">
      <div class="row">
        <div class="col-sm-8">
          <div class="well" style="height: 300px">
            <div class="container" style="width: 595px;border-bottom: 2px solid #ccc">
            <h5 style="float: left;"><b>List of Approver</b></h5> 

            </div>
             <div id="alert3" class="alert alert-info text-center" style="margin-top:20px; display:none;">
              <button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message3"></span>
            </div>
               <table class="table table-hover" style="table-layout: auto;overflow-y: auto">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="font-size: 15px">FirstName</th> 
                  <th style="font-size: 15px">Middle Initial</th>
                   <th style="font-size: 15px">LastName</th>
                  <th style="font-size: 15px">Position</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
            </thead>
     
              <tbody id="tbody1"> 


              </tbody>
    
            
           </table>
         
        </div>
      </div>
      
        <div class="col-sm-4">
          <div class="well" style="height: 300px">
            <div class="container" style="width: 250px;border-bottom: 2px solid #ccc">
            <h5 style="float: left;"><b>Holidays and Events</b></h5>
 
            </div>
            <form class="form-inline" style="padding-left: 18px;padding-top: 10px" method="post">
              <div class="form-group">
                <p>Date/ Month/ Year</p>
                  <input type="text" class="form-control hidden" style="width: 150px;padding-top:2px" name="comapanyid" value="<?php echo $com['Company_Id']?>" required> &nbsp &nbsp
               
                <input type="date" class="form-control" style="width: 150px ;margin:auto;height: 40px;" name="start"> &nbsp &nbsp
                 <button type="submit" class="btn btn-gray btn-hover-lightgray btn-sm"  name="addevent"style="line-height: 1;font-size: 10px"font-size: 10px>Add</button>
              </div>
              <div class="form-group" style="padding-top: 10px">
                <p>Description</p>
                <textarea class="form-control" name="eventdescription" rows="5" id="description" style="width: 230px" required></textarea>
              </div>
            </form>
          </div>
      </div>
    </div>
</div>
    <?php
require_once('bdd.php');
if (!isset($_SESSION['Username'])) {
    header("location:index.php");
  }
  $user            = $_SESSION['Username'];

$sql = "SELECT e.id, e.title,e.Company_Id, e.start, e.end, e.color, c.Company_Id,c.Username FROM events e join company c on e.Company_Id = c.Company_Id WHERE c.Username = '$user'  ";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();


$sql1 = "SELECT id, title, start, end, color FROM holiday";
$req1 = $bdd->prepare($sql1);
$req1->execute();
$events1 = $req1->fetchAll();

$sql2 = "SELECT *  FROM apply_leave_request a join Employee e on a.Applied_Employee_Id = e.Employee_Id join company c on e.Company_Id = c.Company_Id WHERE c.Username = '$user'  and a.Leave_Status ='Approved'";
$req2 = $bdd->prepare($sql2);
$req2->execute();
$events2 = $req2->fetchAll();

?>

<style>
  
  #calendar {
    max-width: ;
    margin-bottom: 100px;
  }
    #calendar .p{
  color: white; 
  }
  .col-centered{
    float: none;
    margin: 0 auto;
    height: 100px;
  }
   </style>
   <!--Calendar Events--->
   <div class="col-sm-12">
     
 <div class="row" style="height:500px">
      <div class="col-sm-12">
         <div class="well" style="height: 900px;">
            <div class="month">      
        
              <ul id="calendar"></ul>
            
            </div> 

          </div>
        </div>
    </div>


   </div>

<a href="#mydiv"type="button" class="btn button  btn-circle navbar-fixed-bottom btn-lg "  style="font-size: 12px;float: right;margin-top: 200px;margin-left: 1170px;background-color: #00cc99 ;opacity: 0.6;"><i class="glyphicon glyphicon-chevron-up" id="lastclicked"></i></a> 
 


<?php require_once 'ModalEditCompanyProfile.php'?>
   <!---------------Edit Calendar Modal---------------------------->
    <div class="modal fade" id="Viewdetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form class="form-horizontal" method="POST">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"><b>View Details</b></h4>
                      </div>
                      <div class="modal-body">
                      
                        <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">

                        </div>

                        
                        <input type="hidden" name="id" class="form-control" id="id">
                      
                      
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                    </div>
    </div>
</body>
</html>

<script src="app.js"></script>
<script src="app1.js"></script>
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

  $(document).ready(function() {
    
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: Date() ,
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      select: function(start, end) {
        
        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');
      },
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #title').val(event.title);
          $('#ModalEdit #color').val(event.color);
          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // si changement de position

        edit(event);

      },
      eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

        edit(event);

      },
      events: [
    <?php foreach($events as $event): 
      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
        },
      <?php endforeach; ?>

     <?php foreach($events1 as $event): 
      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
        },
      <?php endforeach; ?>
  

     <?php foreach($events2 as $event): 
      
        $start = explode(" ", $event['Leave_Start']);
        $end = explode(" ", $event['Leave_End']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['Leave_Start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['Leave_End'];
        }
      ?>
        {
          id: '<?php echo $event['apply_leave_request_Id']; ?>',
          title: '<?php echo $event['Employee_FirstName']," ",$event['Employee_LastName']," ","On Leave"; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '#ff0000',
        },
      <?php endforeach; ?>
  
      ],

    });
    
    function edit(event){
      start = event.start.format('YYYY-MM-DD HH:mm:ss');
      if(event.end){
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
      }else{
        end = start;
      }
      
      id =  event.id;
      
      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;
      
      $.ajax({
       url: 'editEventDate.php',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
          if(rep == 'OK'){
            alert('Saved');
          }else{
            alert('Could not be saved. try again.'); 
          }
        }
      });
    }
    
  });

</script>

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
           $('#sub1 ').each(function(){  
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