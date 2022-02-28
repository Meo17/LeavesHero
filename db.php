 <?php
function db(){
		return new PDO("mysql:host=localhost; dbname=LeavesHero;", "root","");
}
function  add_subscriber($companyname,$subname,$owner,$address,$contactno,$emailaddress,$registrationno,$branch,$username,$Password1,$password,$img,$img2,$img3,$status){
   $db = db();
   $sql = "INSERT INTO company(Company_Name,Subscriber_Name,Company_Owner,Company_Address,Company_Contact,Company_Email,Company_License  ,Branch,Username,Password,Password1,Supporting_Doc1,Supporting_Doc2,Supporting_Doc3,Status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $s = $db->prepare($sql);
  $s->execute(array($companyname,$subname,$owner,$address,$contactno,$emailaddress,$registrationno,$branch,$username,$Password1,$password,$img,$img2,$img3,$status));
  $db = null;
}   
function ret_company(){
		$db = db();
		$sql = "SELECT * FROM company";
		$s = $db->query($sql);
		$user = $s->fetchAll();
		$db = null;
	return $user;
}
function ret_admin(){
		$db = db();
		$sql = "SELECT * FROM superadmin WHERE company='LeavesHero'";
		$s = $db->query($sql);
		$user = $s->fetchAll();
		$db = null;
	return $user;
}
function ret_employee(){
		$db = db();
		$sql = "SELECT * FROM employee ";
		$s = $db->query($sql);
		$user = $s->fetchAll();
		$db = null;
	return $user;
}

  function login_admin($username, $password){
  try{
    $db = db();
      $query = "SELECT * FROM superadmin WHERE username= :username AND password = :password";  
            $statement = $db->prepare($query);  
            $statement->execute(array('username' => $username,  'password' => $password)); 
            $row = $statement->fetch(PDO::FETCH_ASSOC); 
            $count = $statement->rowCount();  
            if($count > 0){  
                 $_SESSION["username"]  =  $row["username"];  
                 $_SESSION["password"]  =  $row["password"];          
                 $_SESSION['id']        =  $row['id'];
                 $resid                 =  $row['id'];

         echo "<script>window.location='dashboard.php?id = $resid';</script>";
         header("Location:dashboard.php");
              
         }  
      else{  
            $message = '<label>Wrong Data</label>';  
          }
    $db = null;
    }
  catch(PDOException $error){
      echo $error->getMessage();
    } 
}
function login_company($username, $password){
	try{
		$db = db();
			$query = "SELECT * FROM company WHERE Username= :username AND Password1 = :password";  
            $statement = $db->prepare($query);  
            $statement->execute(array('username' => $username,  'password' => $password)); 
            $row = $statement->fetch(PDO::FETCH_ASSOC); 
            $count = $statement->rowCount();  
            if($count > 0){  
                 $_SESSION["Username"]   =  $row["Username"];  
                 $_SESSION["Password1"]   =  $row["Password1"];  				
        				 $_SESSION['Company_Id'] =  $row['Company_Id'];
        				 $resid                  =  $row['Company_Id'];
        				
				    echo "<script>window.location='companydashboard.php?ret_company =$resid';</script>";
				    header("Location:companydashboard.php");
              
			       }  
            else{  
                 $message = '<label>Wrong Data</label>';  
            }
		$db = null;
		}
		catch(PDOException $error){
			echo $error->getMessage();
		}	
}
function login_company_employee($username, $password){
	try{
		$db = db();
			$query = "SELECT * FROM employee WHERE Username= :username AND Password1 = :password AND Employee_Status = 'Active'";  
            $statement = $db->prepare($query);  
            $statement->execute(array('username' => $username,  'password' => $password)); 
            $row = $statement->fetch(PDO::FETCH_ASSOC); 
            $count = $statement->rowCount();  
            if($count > 0){  
                 $_SESSION["Username"]    =  $row["Username"];  
                 $_SESSION["Password1"]    =  $row["Password1"];  				
        				 $_SESSION['Employee_Id'] =  $row['Employee_Id'];
        				 $resid                   =   $row['Employee_Id'];
        			

				 echo "<script>window.location='companyemployeedashboard.php?id =$resid';</script>";
				 header("Location:companyemployeedashboard.php");
              
			}  
            else{  
                 $message = '<label>Wrong Data</label>';  
            }
		$db = null;
		}
		catch(PDOException $error){
			echo $error->getMessage();
		}	
}

 function ret_company2($user){
  $db = db(); 
  $sql = "SELECT * FROM  company WHERE Username='$user'";
  $s = $db->query($sql);
  $user = $s->fetchAll();
  $db = null;
  return $user;
 }
 function company_update($companyid,$companycontact,$companyemail,$username,$password,$password1,$image){
  $db = db();
  $sql = "UPDATE company SET  Company_Contact  = ?,Company_Email = ?,Username = ?, Password = ?, Password1  = ? ,Company_profile = ? WHERE Company_Id = ? ";
  $s = $db->prepare($sql);
  $s->execute(array($companycontact,$companyemail,$username,$password,$password1,$image,$companyid));
  $db = null;
}
 

  function employee_update($employeeid,$username,$password,$password1,$contact,$email,$image)
  {
    $db = db();
    $sql = "UPDATE employee SET Username = ?, Password = ?, Password1 = ?,Employee_Contact1 = ?,Employee_Email = ? ,Employee_Profile_Pic = ? WHERE Employee_Id = ? ";
    $s = $db->prepare($sql);
    $s->execute(array($username,$password,$password1,$contact,$email,$image,$employeeid));
  $db = null;
  }
?>
  
