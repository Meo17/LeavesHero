
<?php
	session_start();
	include 'db.php';

if (!isset($_SESSION['username'])) {
		header("location: index.php");
	}

	$resid              =  $_GET['Company_Id'];
	$status             =  "Disapproved";
	$subscriptiontype   =  "Free Trial";
	$res                =  ret_company_update($resid);
 
		  if ($res['Status']      == "Waiting for approval") 
			{
				update_status($resid, $status);
				header("location: dashboard.php");
			  // $company_name       =     $res['Company_Name'];
		   //    $company_username   =     $res['Username'];
		   //    $company_password   =     $res['Password'];
		   //    $company_email      =     $res['Company_Email'];
		   //    $company_id         =     $res['Company_Id'];
		   //    $date               =     date('Y-m-d H:i:s');
             
      
		   //    $mail               =    new PHPMailer;

		   //    $mail->SMTPDebug    =    0;                             

		   //    $mail->isSMTP();                                      
		   //    $mail->Host         = 	'smtp.gmail.com';
		   //    $mail->SMTPAuth     =		 true;                               
		   //    $mail->Username     = 	'leaveshero@gmail.com';                
		   //    $mail->Password     = 	'capstone42';                           
		   //    $mail->SMTPSecure   = 	'ssl';                            
		   //    $mail->Port 		  =		 465 ;                                    

		   //    $mail->setFrom('leaveshero@gmail.com', 'LeavesHero');
		   //    $mail->addAddress($company_email, $company_name);     // Add a recipient
		   //    // $mail->addAddress('ellen@example.com');               // Name is optional
		   //    // $mail->addReplyTo('info@example.com', 'Information');
		   //    // $mail->addCC('cc@example.com');
		   //    // $mail->addBCC('bcc@example.com');

		   //    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		   //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		   //    $mail->isHTML(true);                                  // Set email format to HTML

		   //    $mail->Subject = 'THANK YOU ';
		   //    $mail->Body    .= '<b>USERNAME : </b>'.$company_username;
		   //    $mail->Body    .= '<br>';
		   //    $mail->Body    .= '<b>Password : </b>'.$company_password;

		   //    $mail->AltBody = '';

		   //    if(!$mail->send()) {
		   //        echo 'Message could not be sent.';
		   //        echo 'Mailer Error: ' . $mail->ErrorInfo;
		   //    } 

		   //    else {
		   //        echo '<b>Message has been sent</b>';
		   //        update_status($resid, $status);
		   //        subscription($date,$company_id);

		   //        header("location:dashboard.php");
		   //      }

			}
		 else
			{
			header("location: dashboard.php?error%cant%delete");
			}
    

	
	function update_status($resid, $status)
	{
		$db = db();		
		$sql2 = "UPDATE company SET Status = ? WHERE Company_Id = ?";
		$s2 = $db->prepare($sql2);
		$s2->execute(array($status, $resid));	
		$db = null;
	}
    function ret_company_update($id)
    { 
		$db = db();
		$sql = "SELECT * FROM company WHERE Company_Id = ?";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$user = $s->fetch();
		$db = null;
		return $user;
    }
 //    function subscription($date,$company_id,$subscriptiontype){
 //  	 $db = db();
 //  	 $sql = "INSERT INTO subscription (Sub_Date,Company_Id,Subscription) VALUES(?,?,?)";
 //  	 $s = $db->prepare($sql);
 // 	 $s->execute(array($date,$company_id,$subscriptiontype));
 // 	 $db = null;
	// }
	?>
	

               