<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Calendar</title>
 <?php include 'includes/empheader.php'?>
    <link rel="stylesheet" href="css/alert.css">
  <script type="text/javascript" src="gulpfile.js"></script>
</head>
<body id="body">
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 211px">
      <img class="logo" src="images/logo3.png" style="padding-left: 19px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

        <li ><a href="companyemployeedashboard.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-home"></span>Home</a></li>   
          <li  ><a href="employeeleavebalance.php" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub "></span>Leave Balance</a></li>
         <li  id="leaverequestnav" ><a href="EmployeeLeaveApplication.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay aqua-hover"></span>
          Leave Request<span class="badge badge-warning" id="badge1"style="margin-left:2px;font-size:11.7px;margin-top:-9px">
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>
          </a></li>
          <li ><a href="EmployeeLeaveRecord.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-th-list"></span>Leave Record</a></li>
          <li  class="active" ><a href="EmployeeCalendar.php" class="aqua-hover " style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon-calendar "></span>Calendar</a></li>
      </ul><br>
    </div>
    <br>
   <div class="col-sm-10 " style="float: right;background-color: #fff;margin-left: 10px;">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1700px;margin-left: 211px;background-color: white">
        <div class="container " style="width:auto;float: left;margin-top: 10px">
          <h5><b id="companyname"> </b></h5>
        </div>
              <!---hiden input form- userkay kay ang ni sign in nga company---->
             <input type="hidden" class=" form-control "   id="userKey" style="width: 250px">
             <input type="hidden" class=" form-control "   id="userid" style="width: 250px">
             <input type="hidden" class=" form-control "   id="empkey" style="width: 250px">
             <input type="hidden" class=" form-control "   id="fullname1" style="width: 250px">
             <input type="hidden" class=" form-control "   id="refuserkey" style="width: 250px">
             <input type="hidden" class=" form-control "   id="photourl" style="width: 250px"  >  
             <input type="hidden" class=" form-control "   id="empuserskey" style="width: 250px">  
             <input type="hidden" id="empid">
             <input type="hidden" id="Employeekey">
             <input type="hidden" id="EmployeePosition">
              <input type="hidden" id="updateappfullname">
               <input type="hidden" class=" form-control "   id="fullname2" style="width: 250px">
               <input type="hidden" id="email_id">
             

        <!--top navbar/ right side-->
        
        <div class="dropdown  loggedin-div" id="user_div"style="float: right;top:15px;margin-right: 100px">
           <img src="images/icon_user.png" id="profile" style="height: 30px; width: 30px"class="image_upload_preview">
          <b id="fullname"></b>  
              <!--    <b id="fname"></b> 
             <b id="companyname"></b> -->
                  
          <a class=" lightgray-hover dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 10px; font-family:'Roboto';">  
                    
            <span class="caret"></span></a>
              <ul class="dropdown-menu" style="margin-left:100px;">
  
                <li><a onclick="logout()"><span class="design icon_out" style="padding-bottom: 9px;top: 3px"></span>Logout</a></li>
             </ul>
        </div>
      </div>
<?php require_once 'modalemployeerecord.php'?>
 
      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px"id="mydiv">
         <div class="col-10" style="padding-top: 45px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()"style="width: 1500px;margin-right: 20px">
        </div>
      </div>
    <?php
require_once('bdd.php');

$sql = "SELECT * FROM events e join company c on e.Company_Id = c.Company_Id join employee em  on e.Company_Id = em.Company_I";
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
  #leaverequestnav{

    display: none;
  }
   </style>

      <!--Leave types-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="padding-bottom: 50px;height: 1000px"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc">
            <h5 style="float: left;"><b>Calendar of Holidays and Events</b></h5>
            <div style="padding-left: 20px; float: right;padding-top: 5px">
               
              </div>
            </div>
            <br>
       <div class="row" >
        <div class="col-sm-9" style="border-right: 2px solid #ccc;">
        
            <div class="month">      
              <ul>
                    <ul id="calendar"></ul>
              </ul>
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
  
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/hullabaloo.js"></script>
 <?php include 'includes/script.php'?>
  
  <script>

  $(document).ready(function() {
var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();
function myDateFormatter (dateObject) {
    var d = new Date(dateObject);
    var day = d.getDate();
    var month = d.getMonth() + 1;
    var year = d.getFullYear();
    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }
    var date = day + "-" + month + "-" + year;
    
    return date;
};
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
        eventMouseover: function (data, event, view) {
        var sd=data.start.format()
            sd=myDateFormatter(sd)
        var ed=data.end.format()
            ed=myDateFormatter(ed)
            tooltip = '<div class="tooltiptopicevent" style="width:auto;height:auto;background:#f2f3f5;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;  line-height: 200%;">' + 'Employee Name: ' + ': ' + data.title + '</br>' + 'Leave Description: ' + ': ' + data.description +'</br>' + 'Start: ' + ': ' + sd+ '</br>' +'End: ' + ': ' + ed+ '</br>' +'</div>';


            $("body").append(tooltip);
            $(this).mouseover(function (e) {
                $(this).css('z-index', 10000);
                $('.tooltiptopicevent').fadeIn('500');
                $('.tooltiptopicevent').fadeTo('10', 1.9);
            }).mousemove(function (e) {
                $('.tooltiptopicevent').css('top', e.pageY + 10);
                $('.tooltiptopicevent').css('left', e.pageX + 20);
            });


        },
        eventMouseout: function (data, event, view) {
            $(this).css('z-index', 8);

            $('.tooltiptopicevent').remove();

        },
        dayClick: function () {
            tooltip.hide()
        },
        eventResizeStart: function () {
            tooltip.hide()
        },
        eventDragStart: function () {
            tooltip.hide()
        },
        viewDisplay: function () {
            tooltip.hide()
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