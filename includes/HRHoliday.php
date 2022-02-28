<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calendar of Holidays</title>
  <?php include 'includes/header.php'?>
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
<div class="container-fluid" >
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" style="padding-top: 20px;position: fixed;width: 276px">
      <img class="logo" src="images/logo3.png" style="padding-left: 20px">
      <ul class="nav nav-pills nav-stacked" style="padding-top: 30px">

        <li ><a href="companydashboard.php" class="aqua-hover" style="color:#fff ; padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Customize</a></li>
  

        <li><a href="companyaddemployee.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design  aqua-hover"><i class="fa fa-user-plus"></i></span>Create Account</a></li>
        <li><a href="companyemployeerecord.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class="fa fa-users"></i></span>Employee Record</a></li>
        <li><a href="leaveapplication.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon-inbox"><i  class="glyphicon glyphicon-bell">
          <span class="badge badge-warning" id="badge1"style="margin-left:-20px;font-size:11.7px;margin-top:-15px">
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>

           </i>      
         </span>Leave Request
        </a>
        </li>
  
        <li><a href="CompanyHR_Report.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design"><i class=" fa fa-area-chart"></i></span>Analytical Report</a></li>
        <li class="active"><a href="CompanyHR_Holiday_Calendar.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="glyphicon glyphicon-calendar"></i></span>View Calendar Holiday</a></li>
        <li ><a href="companybillingaccount.php" class="aqua-hover" style="color:#fff ;padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design "><i class="fa fa-paypal"></i></span>Subscription Payment</a></li>

      </ul><br>
    </div>
    <br>
    <br>
    <div class="col-sm-10 " style="float: right;background-color: #fff;margin-left: 10px;">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1700px;margin-left: 281px;background-color: white">
        <div class="container " style="width:auto;float: left;margin-top: 10px">
   
          <h5><b>Company's Calendar</b></h5>
           <input type="text" class=" form-control hidden"   id="userKey" style="width: 250px">
          <input type="text" class=" form-control hidden"   id="userid" style="width: 250px">
        　 <input type="text" class=" form-control hidden"   id="comuserskey" style="width: 250px">
          <input type="text" class=" form-control hidden"   id="photourl" style="width: 250px">
        </div>

        <!--top navbar/ right side-->
        <div class="dropdown  loggedin-div" id="user_div"style="float: right;top:15px;margin-right: 100px"> 
           <img src="images/icon_user.png" id="profile" style="height: 30px; width: 30px"class="image_upload_preview">
            <b id="user_para"></b>  
           <a class=" lightgray-hover dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 10px; font-family:'Roboto';">        
            <span class="caret"></span></a>
              <ul class="dropdown-menu" style="margin-left:100px;">
               <li><a data-toggle="modal" href="#myModal"><span class="design icon_edit" style="padding-bottom: 9px;top: 3px"></span>Edit</a></li>
                <li><a onclick="logout()"><span class="design icon_out" style="padding-bottom: 9px;top: 3px"></span>Logout</a></li>
       </div>
      </div>

  
 
      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px">
        <div class="col-10" style="padding-top: 45px">
          <input class="form-control" type="search" placeholder="Search" id="dsearch"onkeyup="myFunction()" style="width: 1560px">
        </div>
      </div>

    <?php require'includes/ModalEditCompanyProfile.php';?>  
      
    <?php
require_once('bdd.php');


$sql = "SELECT * FROM events e join company c on e.Company_Id = c.Company_Id ";
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
          <div class="well" style="padding-bottom: 50px;height: 1000px"> 
            <div class="container" style="width: 916px;border-bottom: 2px solid #ccc;width: auto;">
            <h5 style="float: left;"><b>Calendar of Holidays and Events</b></h5>
            <div style="padding-left: 20px; float: right;padding-top: 5px">
               
              </div>
            </div>
            <br>
       <div class="row" >
        <div class="col-sm-9" style="border-right: 2px solid #ccc;">
       
            <div class="month">      
              <ul>
                    <ul id="calendar" style="font-weight:bold;"></ul>
              </ul>
            </div>

     

             
          
        </div>
<style>
  .fc-title{
    font-size: 11px;
  }
  .fc-day-number fc-wed fc-future{
    color: black;
    font-weight:bold;
    font-size: 15px;
  }
</style>
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
<!-- <a href="#mydiv"type="button" class="btn button  btn-circle navbar-fixed-bottom btn-lg "  style="font-size: 12px;float: right;margin-top: 200px;margin-left: 1170px;background-color: #00cc99 ;opacity: 0.6;"><i class="glyphicon glyphicon-chevron-up" id="lastclicked"></i></a>  -->
</body>
</html>
 <?php include 'includes/script.php'?>
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

        eventMouseover: function (data, event, view) {
        var sd=data.start.format()
            sd=myDateFormatter(sd)
        var ed=data.end.format()
            ed=myDateFormatter(ed)
            tooltip = '<div class="tooltiptopicevent" style="width:auto;height:auto;background:#f2f3f5;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;  line-height: 200%;">' + 'Employee Name: ' + ': ' + data.title + '</br>' + 'Leave Description: ' + ': ' + data.description +'</br>' + 'start: ' + ': ' + sd+ '</br>' +'End: ' + ': ' + ed+ '</br>' +'</div>';


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