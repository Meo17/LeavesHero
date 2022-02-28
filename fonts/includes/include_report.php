<?php
    //Connect to database
    $dbc = mysqli_connect("localhost", "root", "", "leaveshero") or die("error connecting to database");


include_once('connection.php');

if (!isset($_SESSION['Username'])) {
    header("location:index.php");
  }
    $user            = $_SESSION['Username'];

    $query = "SELECT COUNT(apply_leave_request_Id) as countapply ,l.LeaveType   FROM  apply_leave_request a  right join leave_type l on a.Company_Id = l.Company_Id JOIN company c ON c.Company_Id = a.Company_Id WHERE a.Leave_Type = l.LeaveType AND  a.Leave_Status = 'Approved' AND c.Username = '$user' GROUP BY Leave_Type";

   $query1 = "SELECT LeaveType   FROM  leave_type l  JOIN company c ON c.Company_Id = l.Company_Id WHERE   c.Username = '$user'";

  
   $query3 = "SELECT LeaveType ,NumberofDays   FROM  leave_type l  JOIN company c ON c.Company_Id = l.Company_Id WHERE   c.Username = '$user'";
  //Execute the query
   $query4 = "SELECT COUNT(apply_leave_request_Id) as countapply ,a.Leave_Start   FROM  apply_leave_request a   JOIN company c ON c.Company_Id = a.Company_Id WHERE  a.Leave_Status = 'Approved' and MONTH(Leave_Start) AND c.Username = '$user'  GROUP BY MONTH(Leave_Start)";

    $visitors = mysqli_query($dbc, $query) or die("error executing the query");
    $visitors1 = mysqli_query($dbc,$query1) or die("error executing the query");
    $leave  = mysqli_query($dbc,$query3) or die("error executing the query");
    $monthlyleave  = mysqli_query($dbc,$query4) or die("error executing the query");


    $data = mysqli_fetch_all($visitors,MYSQLI_ASSOC);
    $data1 = mysqli_fetch_all($visitors1,MYSQLI_ASSOC);
    $data2 = mysqli_fetch_all($leave,MYSQLI_ASSOC);
    $data3 = mysqli_fetch_all($monthlyleave,MYSQLI_ASSOC);

    $countrempleave = json_encode(array_column($data, 'countapply'),JSON_NUMERIC_CHECK);
    $companyleavetype = json_encode(array_column($data1,'LeaveType'));

    $count  = json_encode(array_column($data3, 'countapply'),JSON_NUMERIC_CHECK);
    $monthlyleave = json_encode(array_column($data3,'Leave_Start'));


    $leavetype = json_encode(array_column($data2,'LeaveType'));
    $noofdays  = json_encode(array_column($data2,'NumberofDays'));  
?>