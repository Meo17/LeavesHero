<!--  -->
<?php

    //Connect to database
    $dbc = mysqli_connect("localhost", "root", "", "leaveshero") or die("error connecting to database");


include_once('connection.php');


  /* Getting demo_viewer table data */

  $sql = "SELECT COUNT(numberofvistor) as count,datevisit FROM views WHERE MONTH(datevisit) GROUP BY MONTH(datevisit)";

  $visitors = mysqli_query($dbc, $sql) or die("error executing the query");

  $data = mysqli_fetch_all($visitors,MYSQLI_ASSOC);
  
  $companycount = json_encode(array_column($data, 'count'),JSON_NUMERIC_CHECK);
  $company      = json_encode(array_column($data,'datevisit'));

 /*  YEARLY REPORT*/
  $sql1 = "SELECT COUNT(numberofvistor) as count,datevisit FROM views WHERE YEAR(datevisit) GROUP BY YEAR(datevisit) ORDER BY YEAR(datevisit) ASC";

  $visitors1 = mysqli_query($dbc, $sql1) or die("error executing the query");

  $data1 = mysqli_fetch_all($visitors1,MYSQLI_ASSOC);
  
  $companycount1 = json_encode(array_column($data1, 'count'),JSON_NUMERIC_CHECK);
  $company1      = json_encode(array_column($data1,'datevisit'));


//MONTLY//////
   $sql2 = "SELECT COUNT(Subscription_Id) as count,Sub_Date FROM subscription WHERE MONTH(Sub_Date) AND Subscription_Type ='Free Trial' GROUP BY MONTH(Sub_Date)";

  $free = mysqli_query($dbc, $sql2) or die("error executing the query");

  $data2 = mysqli_fetch_all($free,MYSQLI_ASSOC);
  
  $countfree = json_encode(array_column($data2, 'count'),JSON_NUMERIC_CHECK);
  $Sub_Date      = json_encode(array_column($data2,'Sub_Date'));


 /*  YEARLY REPORT*/
   $sql3 = "SELECT COUNT(Subscription_Id) as count,Sub_Date FROM subscription WHERE YEAR(Sub_Date) AND Subscription_Type ='Paid' GROUP BY YEAR(Sub_Date)";

  $paid = mysqli_query($dbc, $sql3) or die("error executing the query");

  $data3 = mysqli_fetch_all($paid,MYSQLI_ASSOC);
  
  $countfree1 = json_encode(array_column($data3, 'count'),JSON_NUMERIC_CHECK);
  $Sub_Date1      = json_encode(array_column($data3,'Sub_Date'));


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SuperAdminPage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/css.css">
   <link rel="stylesheet" href="dist/sweetalert.css">
   <link rel="stylesheet" href="materialize/materialize.css">
   <link rel="stylesheet" href="materialize/materialize.min.css">
    <link rel="icon" href="icons/logo.jpg" sizes="32x32">
   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/css/mdb.min.css" />
<?php require 'css/css6.css'?>

       <!-- Bootstrap Core CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>

  <link href='css/fullcalendar.css' rel='stylesheet' />


  <script src="https://code.highcharts.com/highcharts.js"></script>
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

         <li ><a href="dashboard.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_sub"></span>Subscription<span class="badge badge-warning" id="badge1"style="margin-left:2px;font-size:11.7px;margin-top:-9px">
               <p style="margin-top:-6px;margin-left:-4px" id="count"></p>
               </span>       
    
         </a>

         </li>
       
         <li><a href="companyrecord.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_rep"></span>Subscriber</a></li>
             
        <li><a href="Billinginformation.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design icon_pay"></span>Billing</a></li>
        <li class="active"><a href="SuperAdminReport.php" class="aqua-hover" style="padding-bottom: 3px;padding-top: 3px;padding-left: 36px"><span class="design glyphicon glyphicon-stats"></span>Report</a></li>


      </ul><br>

    </div>
    <br>
    
    <div class="col-sm-10 " style="float: right;background-color: #fff1;margin-left: 10px">
      <div class="container navbar-fixed-top " style="border-bottom: 2px solid #00cc99; height: 50px;float: left;width: 1600px;margin-left: 320px;background-color: white;width: auto;">
        <div class="container" style="width:auto;float: left;margin-top: 10px">
          <h5><b>Analytics Report</b></h5>
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
      <div class="form-group row" style="padding-left: 15px;background-color: #fff;padding-bottom: 10px">
        <div class="col-10" style="padding-top: 38px">
           <input class="form-control" type="search" placeholder="Search" id="dsearch" style="width: 1560px">
        </div>
      </div>

<!--Vertical Bar-->
      <div class="row">
        <div class="col-sm-7">
          <div class="well">
            <h5>Monthly View's </h5>
            <canvas id="myChartBarVer" style="height: 200px; width: 600px"></canvas>
          </div>
        </div>
        <!--Doughnut-->
        <div class="col-sm-5">
          <div class="well">
            <h5>Yearly View's</h5>
            <canvas id="myChartDoughnut"></canvas> 
          </div>
        </div>
      </div>
         <!--Line-->
      <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <h5>Monthly Free Subscription</h5>
            <canvas id="myChartLine" style="height: 100px;width: 600px"></canvas> 
          </div>
        </div>
      </div>   
      <!--PolarArea-->
      <div class="row">
        <div class="col-sm-5" hidden>
          <div class="well">
            <h5>Leave Types</h5>   
            <canvas id="myChartPolarArea"></canvas> 
          </div>
        </div>
        <!--Horizontal Bar-->
        <div class="col-sm-12">
          <div class="well">
            <h5>Registered Subscibers</h5>
            <canvas id="myChartBarHor" style="height: 100px; width: 295px"></canvas> 
          </div>
        </div>
      </div>

      <!--PolarArea-->

      <!--Line-->

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
<!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/raphael.min.js"></script>

<!--  -->
<script>
var a = <?php echo  $company;?>;

var freqMap = new Map();

a.forEach(function(time) {
  var date = new Date(time);
  var monthName = date.toLocaleString("en-us", {
    month: "short"
  });

  var key = monthName + "-" + date.getFullYear();
  var count = freqMap.get(key) || 0;
  freqMap.set(key, ++count);
});

var b = <?php echo  $Sub_Date;?>;

var freqMap1 = new Map();

b.forEach(function(time) {
  var date = new Date(time);
  var monthName = date.toLocaleString("en-us", {
    month: "short"
  });

  var key = monthName + "-" + date.getFullYear();
  var count = freqMap1.get(key) || 0;
  freqMap1.set(key, ++count);
});

var c= <?php echo  $company1;?>;

var freqMap2 = new Map();

c.forEach(function(year) {
  var date = new Date(year);


  var key = date.getFullYear();
  var count = freqMap2.get(key) || 0;
  freqMap2.set(key, ++count);
});

var d = <?php echo  $Sub_Date1;?>;

var freqMap3 = new Map();

d.forEach(function(time) {
  var date = new Date(time);
  var monthName = date.toLocaleString("en-us", {
    month: "short"
  });

  var key = monthName + "-" + date.getFullYear();
  var count = freqMap3.get(key) || 0;
  freqMap3.set(key, ++count);
});
var ctx = document.getElementById("myChartBarVer").getContext('2d');
var data_viewer = <?php echo $companycount; ?>;
var myChartBarVer = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:  [...freqMap.keys()],
        datasets: [{
            label: '# of Views',
            data: data_viewer,
            backgroundColor: [
                '#00cc99',
                '#ccc',
                '#262626',
                '#00cc99',
                '#ccc',
                '#262626'
            ],
            borderColor: [
                '#00cc99',
                '#ccc',
                '#262626',
                '#00cc99',
                '#ccc',
                '#262626'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
        }],
            yAxes: [{
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var ctx = document.getElementById("myChartLine").getContext('2d');
var data_viewer = <?php echo $countfree; ?>;
var myChartLine = new Chart(ctx, {
    type: 'line',
    data: {
        labels:[...freqMap1.keys()],
        datasets: [{
            label: '# Free Subscription',
            data: data_viewer,
            backgroundColor: [
              '#f5f5f5'
                
            ],
            borderColor: [
                '#262626'
            ], 
            borderWidth: 1

        }]
    },
    options: {
        scales: {
            xAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
        }],
            yAxes: [{
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var ctx = document.getElementById("myChartDoughnut").getContext('2d');
var data_viewer = <?php echo $companycount1; ?>;
var company_viewer = <?php echo  $company1;?>;
var myChartDoughnut = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [...freqMap2.keys()],
        datasets: [{
            label: '# YEARLY Views',
            data:data_viewer ,
            backgroundColor: [
              '#00cc99',
              '#ccc',
              '#262626'                
            ],
            borderWidth: 0

        }]
    },
     options: {
        scales: {
            xAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
        }],
            yAxes: [{
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});



var ctx = document.getElementById("myChartBarHor").getContext('2d');
var data_viewer = <?php echo $countfree1; ?>;
var company_viewer = <?php echo  $Sub_Date1;?>;
var myChartBarHor = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels:[...freqMap3.keys()],
        datasets: [{
            label: '# Paid Subscibers',
            data: data_viewer,
            backgroundColor: [
                '#00cc99',
                '#ccc',
                '#262626',
                '#00cc99',
                '#ccc',
                '#262626'
            ],
            borderColor: [
                '#00cc99',
                '#ccc',
                '#262626',
                '#00cc99',
                '#ccc',
                '#262626'
            ],
            borderWidth: 1

        }]
    },
     options: {
        scales: {
            xAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }
        }],
            yAxes: [{
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


</script>