<?php  
session_start();
 
include('db.php');
if (!isset($_SESSION['username'])) {
    header("location:index.php");
  }
  $user = $_SESSION['username'];
  $res = ret_admin1($user);
  $ret  = ret_company();
  $count = countcsub($user);
  $sub   = ret_subscription_company($user);
  
 ?>

 <?php
 function ret_admin1($user){
  $db = db(); 
  $sql = "SELECT * FROM  superadmin WHERE username='$user'";
  $s = $db->query($sql);
  $user = $s->fetchAll();
  $db = null;
  return $user;
 }
 ?>
 
 <?php require_once 'includes/SuperAdminReport.php'; ?>

<?php
function countcsub($user){
  $db = db(); 
  $sql = "SELECT COUNT(*) as count from company WHERE  status = 'Waiting for approval'";
  $s = $db->query($sql);
  $user = $s->fetchColumn();
  $db = null;
  return $user;
}

function ret_subscription_company($user){
  $db = db(); 
  $sql = "SELECT COUNT(*) as count from subscription s JOIN company c on s.Company_Id = c.Company_Id WHERE  Status = 'Verified'";
  $s = $db->query($sql);
  $user = $s->fetchAll();
  $db = null;
  return $user;
}

?>
