<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Page</title>
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
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script>
</head>
 <?php include 'css/css12.css'?>

        <!-- Bootstrap Core CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>

  <link href='css/fullcalendar.css' rel='stylesheet' /> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
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
</style> 
  <style type="text/css">
         #img1 {
              border-radius: 160%;
              height: 150px;
              width: 150px;
            } 
       #img {
              border-radius: 160%;
              height: 100px;
              width: 150px;
            }
       #image_upload_preview {
              border-radius: 160%;
              height: 100px;
              width: 150px;
            }

  </style>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">
         <?php foreach($ret  as $em ) {?>  
          <li ><a href="companyemployeedashboard.php? id=<?php echo $em['Employee_Id']?>" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Leave Balance</a></li>
           <?php }?>
          <?php foreach($approver  as $a ) {?> 
                 <?php  if ($a ['Employee_Id'] ==  $em ['Employee_Id'] ){?>
                  <li ><a href="EmployeeLeaveApplication.php? id=<?php echo $em['Employee_Id']?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay aqua-hover"></span>Leave Request
                 <?php if($count == 0 || $count1 == 0 ){

                      echo '<span style="padding-left: 10px"class="glyphicon glyphicon-bell hidden"> </span>';
                    }?>
                 <?php if($count != 0 || $count1 != 0 ){
                       $notif = $count + $count1 ;
                    echo '<span style="padding-left: 10px"class="glyphicon glyphicon-bell gly-rotate-90" style="height:40px"><span class="badge badge-warning" style="margin-top:-14px;margin-left:-4.5px;font-size:11.7px;padding-top:-25px;">'.
             '<p style="margin-top:-4px;margin-left:-4px">'.$notif.'</p>';                       
                   }?>

            </a></li>
          <?php }?>
          <?php }?>
          <?php foreach($ret  as $em ) {?>  
          <li ><a href="EmployeeLeaveRecord.php?id=<?php echo $em['Employee_Id']?>" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-th-list"></span>Leave Record</a></li>
          <li class="active"  ><a href="EmployeeCalendar.php? id=<?php echo $em['Employee_Id']?>" class="aqua-hover " style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span    class="design glyphicon-calendar "></span>Calendar</a></li>
       <?php }?>
      </ul><br>
    </div>
    <br>
      <div class="col-sm-10" style="float: right;background-color: #f1f1f1;margin-left: 10px">
      <div class="container navbar-fixed-top  " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1050px;margin-left: 211px;background-color: white">
        <div class="container" style="width:auto;float: left;width: auto;margin-top: 10px">
            <?php foreach($ret  as $em ) {?>  
          <h5><b> <?php echo $em['Company_Name']; ?></b></h5>
        </div>
        <!--top navbar/ right side-->
        <div class="dropdown" style="float: right;top:15px;">
          <img src="icons/<?php  echo $em['Employee_Profile_Pic']?>" style="height: 35px; width: 35px;margin-top: -7px"id="img">
          <a class="btn-white lightgray-hover dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 10px; font-family:'Roboto';"><b><?php echo $em['Employee_FirstName'],' ',$em['Employee_MiddleInitial'],' ' ,$em['Employee_LastName']; ?></b>
              <?php }?> 
            <span class="caret"></span></button>
              <ul class="dropdown-menu">
              <li><a data-toggle="modal" href="#myModal"><span class="design icon_edit" style="padding-bottom: 9px;top: 3px"></span>Edit
                <li><a href="logout.php?logout"><span class="design icon_out" style="padding-bottom: 9px;top: 3px"></span>Logout</a></li>
             </ul>
        </div>
      </div>
  
 
      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px">
        <div class="col-10" style="padding-top: 38px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch" style="width: 1030px">
        </div>
      </div>
                     <!-- Edit Modal -->
      <div class="modal fade" id="myModal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
    
          <!-- Modal content-->
          <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><b>My Profile </b></h4></center>
            </div>
            <div class="modal-body">

               <form class="form" method="post" enctype="multipart/form-data">
                 <?php foreach($update  as $em ) {?>   
               <input type="file" id="inputFile" name="file" accept="image/*" capture style="display:none" ></input>
                <img src="icons/<?php echo $em['Employee_Profile_Pic'] ; ?>" id="image_upload_preview" style="cursor:pointer;width:100px" class="center round" />
                <div class="form-group" style="padding-top: 10px">
                  <p>Username</p>
                  <input type="text" class="form-control hidden" value="<?php echo $em['Employee_Id']?>" name="employeeid">
                  <input type="text" class="form-control" value="<?php echo $em['Username']?>" name="username">
              </div>
              <div class="form-group">
                  <p>Password</p>
                  <input type="password" class="form-control" value="<?php echo $em['Password1']?>" name="password">
              </div>
              <div class="form-group">
                  <p>Contact Number</p>
                  <input type="text" class="form-control" value="<?php echo $em['Employee_Contact1']?>" name="contact">
              </div>
              <div class="form-group">
                  <p>Email Address</p>
                  <input type="text" class="form-control" value="<?php echo $em['Employee_Email']?>" name="email">
              </div>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn  btn-hover-white btn-danger" style="float: left;" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-hover-white btn-sucess" name="userupdate" style="background-color:#00cc99">Save</button>
            </div>
             <?php }?>
                </form>
          </div> 
        </div>
      </div>
                 <!-- Edit Modal -->

    <?php
require_once('bdd.php');
if (!isset($_SESSION['Username'])) {
    header("location:index.php");
  }
  $user            = $_SESSION['Username'];

$sql = "SELECT * FROM events e join company c on e.Company_Id = c.Company_Id join employee em  on e.Company_Id = em.Company_Id WHERE em.Username = '$user'";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();

$sql1 = "SELECT id, title, start, end, color FROM holiday";

$req1 = $bdd->prepare($sql1);
$req1->execute();

$events1 = $req1->fetchAll();
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

      <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="padding-bottom: 50px;height: 900px"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc">
            <h5 style="float: left;"><b>Calendar of Holidays and Events</b></h5>
            <div style="padding-left: 20px; float: right;padding-top: 5px">
               
              </div>
            </div>
            <br>
       <div class="row" >
        <div class="col-sm-9" style="border-right: 2px solid #ccc;">
         <div class="well" style="height: 300px;height: 650px">
            <div class="month">      
              <ul>
                    <ul id="calendar"></ul>
              </ul>
            </div>
          </div>
        </div>
    
          <div class="col-sm-3 container" style="overflow-y: auto;">
            <h5 style="text-align: center;"><b>List of Legal Holidays and Events</b></h5><br>
            <p style="float: left;">January 1</p>
            <p style="text-align: center;">New Year's Day</p>
            <p style="float: left;">April 9</p>
            <p style="text-align: center;">Araw ng Kagitingan</p>
            <p style="float: left;">April 18</p>
            <p style="text-align: center;">Holy Thursday</p>
            <p style="float: left;">April 19</p>
            <p style="text-align: center;">Good Friday</p>
            <p style="float: left;">May 1</p>
            <p style="text-align: center;">Labor Day</p>
            <p style="float: left;">June 12</p>
            <p style="text-align: center;">Independence Day</p>
            <p style="float: left;">August 26</p>
            <p style="text-align: center;">Nat'l Heroes Day</p>
            <p style="float: left;">November 30</p>
            <p style="text-align: center;">Bonifacio Day</p>
            <p style="float: left;">December 25</p>
            <p style="text-align: center;">Christmas Day</p>
            <p style="float: left;">December 30</p>
            <p style="text-align: center;">Rizal Day</p>
          </div>
        </div>   
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