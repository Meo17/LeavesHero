<?php
    //Connect to database
    $dbc = mysqli_connect("localhost", "root", "", "leaveshero") or die("error connecting to database");

include('db.php');
include_once('connection.php');

if (!isset($_SESSION['Username'])) {
    header("location:index.php");
  }
    $user            = $_SESSION['Username'];

    $query = "SELECT COUNT(a.Employee_Id) as employeeleave , l.LeaveType  FROM  apply_leave_request a  JOIN leave_type l on a.Company_Id = l.Company_Id JOIN company c ON c.Company_Id = a.Company_Id WHERE a.Leave_Type = l.LeaveType AND  a.Leave_Status = 'Approved' AND c.Username = '$user' GROUP BY Leave_Type";

    //Execute the query
    $visitors = mysqli_query($dbc, $query) or die("error executing the query");

    //Create an array to hold the records
    $records = array();

    //Retrive the records and add it to the array
    while($row  = mysqli_fetch_assoc($visitors)){
        $records[] = $row;
    }

    print(json_encode($records));

    //Clean up
    mysqli_free_result($visitors);

    //Close connection
    mysqli_close($dbc);
    
?>