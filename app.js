$(document).ready(function(){
	fetch();

///////////////////

			//edit
			$(document).on('click', '.edit', function(){
				var id = $(this).data('id');
				getDetails(id);
				$('#edit').modal('show');
			});
			$('#editForm').submit(function(e){
				e.preventDefault();
				var editform = $(this).serialize();
				$.ajax({
					method: 'POST',
					url: 'edit.php',
					data: editform,
					dataType: 'json',
					success: function(response){
						if(response.error){
							$('#alert').show();
							$('#alert_message').html(response.message);
						}
						else{

		     					$('#alert').show();
							    $('#alert_message').html(response.message);
							    fetch();
						}

						$('#edit').modal('hide');
					}
				});
			});
			//
			

			//edit
			$(document).on('click', '.edit1', function(){
				var id = $(this).data('id');
				getDetails1(id);
				$('#edit1').modal('show');
			});
			$('#editForm1').submit(function(e){
				e.preventDefault();
				var editform = $(this).serialize();
				$.ajax({
					method: 'POST',
					url: 'edit1.php',
					data: editform,
					dataType: 'json',
					success: function(response){
						if(response.error){
							$('#alert1').show();
							$('#alert_message1').html(response.message);

						}
						else{
							$('#alert1').show();
							$('#alert_message1').html(response.message);
							fetch();
						}

						$('#edit1').modal('hide');
					}
				});
			});
			//

			//////////////delete leave type//////////////
			$(document).on('click', '.delete', function(){
				var id = $(this).data('id');
				getDetails(id);
				$('#delete').modal('show');
			});
			$('.id').click(function(){
				var id = $(this).val();
				$.ajax({
					method: 'POST', 
					url: 'delete.php',
					data: {id:id},
					dataType: 'json',
					success: function(response){
						if(response.error){

							$('#alert').show();
							$('#alert_message').html(response.message);
						}
						else{

							$('#alert').show();
							$('#alert_message').html(response.message);
							fetch();
						}
						
						$('#delete').modal('hide');
					}
				});
			});
			//	//hide message
			$(document).on('click', '.close', function(){
				$('#alert').hide();
			});
					

				//delete1
			$(document).on('click', '.delete1', function(){
				var id = $(this).data('id');
				getDetails1(id);
				$('#delete1').modal('show');
			});
			$('.Id').click(function(){
				var id = $(this).val();
				$.ajax({
					method: 'POST', 
					url: 'del.php',
					data: {id:id},
					dataType: 'json',
					success: function(response){
						if(response.error){

							$('#alert3').show();
							$('#alert_message3').html(response.message);
						}
						else{

							$('#alert3').show();
							$('#alert_message3').html(response.message);
							fetch();
						}
						
						$('#delete1').modal('hide');
					}
				});
			});
		//hide message
			$(document).on('click', '.close', function(){
				$('#alert3').hide();
			});


});
/////////////////////////////////////////// edit APPROVE /////////////////////////////////////////////////////////////////
		$(document).on('click', '.editapply', function(){
				var id = $(this).data('id');
				getDetails4(id);
				$('#delete2').modal('hide');
				$('#editapply').modal('show');

			});
					$('#editFormapply').submit(function(e){
				e.preventDefault();
				var editform = $(this).serialize();
				$.ajax({
					method: 'POST',
					url: 'edit.php',
					data: editform,
					dataType: 'json',
					success: function(response){
						if(response.error){
							$('#alert').show();
							$('#alert_message').html(response.message);
						}
						else{
							
		     					$('#alert').show();
							    $('#alert_message').html(response.message);
							    fetch();
						}

						$('#edit').modal('hide');
					}
				});
			});
//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////// FORWARD APPROVE /////////////////////////////////////////////////////////////////
				$(document).on('click', '.leaveforward', function(){
					var id = $(this).data('id');
					getDetails4(id);
					$('#leaveforward').modal('show');
				});
//////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////	
			$(document).on('click', '.delete2', function(){
				var id = $(this).data('id');
				getDetails2(id);
				$('#delete2').modal('show');
			});

//////////////////////////////////////////////////////////////////////////////
////////////////// ///   LEAVE   ///////////////////////////////////////////////
		$(document).on('click', '.applyleave', function(){
				var id = $(this).data('id');
				getDetails3(id);
				$('#delete2').modal('hide');
				$('#applyleave').modal('show');
			});
				$(document).on('click', '.applyleave1', function(){
				var id = $(this).data('id');
				getDetails11(id);
				$('#delete2').modal('hide');
				$('#applyleave1').modal('show');
			});
/////////////////////////////////   GRANT   /////////////////////////////////			
			$(document).on('click', '.delete4', function(){
					var id = $(this).data('id');
					getDetails4(id);
					$('#delete4').modal('show');
				});
			$(document).on('click', '.view', function(){
					var id = $(this).data('id');
					getDetails4(id);
					$('#view').modal('show');
				});
			$(document).on('click', '.view1', function(){
					var id = $(this).data('id');
					getDetails8(id);
					$('#view1').modal('show');
				});
		    $(document).on('click', '.viewdata', function(){
					var id = $(this).data('id');
					getDetails9(id);
					$('#viewdata').modal('show');
				});
//////////////////////////////////////////////////////////////////////
/////////////////////////////////  DISAPPROVED   /////////////////////////////////
			
			$(document).on('click', '.delete5', function(){
					var id = $(this).data('id');
					getDetails12(id);
					$('#delete5').modal('show');
				});

//////////////////////////////////////////////////////////////////////		
///////////////////////////////// REAPPLY LEAVE /////////////////////////////////
			
				$(document).on('click', '.reapply', function(){
					var id = $(this).data('id');
					getDetails5(id);
					$('#reapply').modal('show');
				});
////////////////////////////////SET EMPLOYEE APROVER //////////////////////////////////////		
					$(document).on('click', '.delete6', function(){
					var id = $(this).data('id');
					getDetails6(id);
					$('#delete6').modal('show');
				});
/////////////////////////////////////////// APPROVE /////////////////////////////////////////////////////////////////
				$(document).on('click', '.approve', function(){
					var id = $(this).data('id');
					getDetails7(id);
					$('#approve').modal('show');
				});
//////////////////////////////////////////////////////////////////////////////////////////////////////////
				$(document).on('click', '.CANCEL', function(){
					var id = $(this).data('id');
					getDetails4(id);
					$('#CANCEL').modal('show');
				});

		function fetch(){
			$.ajax({
				method: 'POST',
				url: 'fetch.php',
				success: function(response){
					$('#tbody').html(response);
				}
			});			
			$.ajax({
				method: 'POST',
				url: 'fetch1.php',
				success: function(response){
					$('#tbody1').html(response);
				}
			});

			   $.ajax({
				method: 'POST',
				url: 'fetch2.php',
				success: function(response){
					$('#tbody2').html(response);
				}
			 });


		}



		function getDetails(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#edit').modal('hide');
						$('#delete').modal('hide');
						$('#alert').show();
						$('#alert_message').html(response.message);
					}
					else{
						$('.id').val(response.data.id);
						$('.LeaveType').val(response.data.LeaveType);
						$('.NumberofDays').val(response.data.NumberofDays);
						$('.Requirement').val(response.data.Requirement);
						$('.Duration_Type').val(response.data.Duration_Type);
						$('.Multiple_Days').val(response.data.Multiple_Days);
						$('.LeaveType1').html(response.data.LeaveType + ' ' );
					}
				}
			});


		}
		function getDetails1(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row1.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#edit1').modal('hide');
						$('#delete1').modal('hide');
						$('#alert1').show();
						$('#alert_message1').html(response.message);
					}
					else{
						$('.Id').val(response.data.Id);
						$('.Employee_LastName').val(response.data.Employee_LastName);
						$('.Employee_FirstName').val(response.data.Employee_FirstName);
						$('.Employee_Position').val(response.data.Employee_Position);
						$('.fullname').html(response.data.Employee_FirstName + ' ' + response.data.Employee_LastName);
					}
				}
			});


		}
		function getDetails2(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row2.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#delete2').modal('hide');

					}
					else{
						$('.id').val(response.data.id);
						$('.LeaveType').val(response.data.LeaveType);
						$('.NumberofDays').val(response.data.NumberofDays);
						$('.Requirement').val(response.data.Requirement);
						$('.Duration_Type').val(response.data.Duration_Type);
						$('.Multiple_Days').val(response.data.Multiple_Days);
						$('.LeaveType').html(response.data.LeaveType);
						$('.NumberofDays').html(response.data.NumberofDays + ' ' + 'Days');
						$('.Requirement').html(' <b > * </b> '+response.data.Requirement);
						$('.Duration_Type').html(response.data.Duration_Type);
						$('.Multiple_Days').html(response.data.Multiple_Days);
					}
				}
			});


		}
		function getDetails3(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row2.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#applyleave').modal('hide');

					}
					else{
						$('.id').val(response.data.id);
						$('.LeaveType').val(response.data.LeaveType);
						$('.NumberofDays').val(response.data.NumberofDays);
						$('.Requirement').val(response.data.Requirement);
						$('.Duration_Type').val(response.data.Duration_Type);
						$('.Multiple_Days').val(response.data.Multiple_Days);
						$('.LeaveType').html(response.data.LeaveType);
						$('.NumberofDays').html(response.data.NumberofDays + ' ' + 'Days');
						$('.Requirement').html(' <b > * </b> '+response.data.Requirement);
						$('.Duration_Type').split(',').val(response.data.Duration_Type);
						$('.Multiple_Days').html(response.data.Multiple_Days);
					}
				}
			});


		}
		function getDetails4(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row3.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#delete4').modal('hide');
						$('#delete4').modal('hide');
					    $('#delete5').modal('hide');
					    $('#approve').modal('hide');
					    $('#leaveforward').modal('hide');
					}
					else{
						$('.id').val(response.data.apply_leave_request_Id);
						$('.Company_Id').val(response.data.Company_Id);
						$('.Applied_Employee_Id').val(response.data.Applied_Employee_Id );
						$('.Leave_Type').val(response.data.Leave_Type);
						$('.Leave_Duration').val(response.data.Leave_Duration);
						$('.Leave_Start').val(response.data.Leave_Start);
						$('.Leave_End').val(response.data.Leave_End);
						$('.Leave_Days').val(response.data.Leave_Days);
						$('.Leave_approver').val(response.data.Leave_approver);
						$('.Leave_Reason').val(response.data.Leave_Reason);	
						$('.Leave_Support_Doc').val(response.data.Leave_Support_Doc);
						$('.Leave_Status').val(response.data.Leave_Status);
						$('.Leave_time_request').val(response.data.Leave_time_request);								
					    $('.Employee_LastName').val(response.data.Employee_LastName);
						$('.Employee_FirstName').val(response.data.Employee_FirstName);
						$('.Employee_MiddleInitial').val(response.data.Employee_MiddleInitial);
						$('.Employee_Suffix').val(response.data.Employee_Suffix);
						$('.Employee_Department').val(response.data.Employee_Department);	
						$('.Employee_Position').val(response.data.Employee_Position );	
						$('.Employee_FirstName').html(response.data.Employee_FirstName);
						$('.Employee_Id').html(response.data.Employee_Id);
					    $('.Employee_LastName').html(response.data.Employee_LastName);
					    $('.Applied_Employee_Id').html(response.data.Applied_Employee_Id );
					    $('.Employee_MiddleInitial').html(response.data.Employee_MiddleInitial);
						$('.Employee_Suffix').html(response.data.Employee_Suffix);
						$('.Employee_Department').html(response.data.Employee_Department);	
						$('.Employee_Position').html(response.data.Employee_Position );
						$('.Leave_Type').html(response.data.Leave_Type);
						$('.Leave_Duration').html(response.data.Leave_Duration);
						$('.Leave_Start').html(response.data.Leave_Start);
						$('.Leave_End').html(response.data.Leave_End);
						$('.Leave_Days').html(response.data.Leave_Days);
						$('.Leave_approver').html(response.data.Leave_approver);
						$('.Leave_Reason').html(response.data.Leave_Reason);	
						$('.Leave_Support_Doc').html(response.data.Leave_Support_Doc);
						$('.Leave_Status').html(response.data.Leave_Status);
						$('.Leave_Type').html(response.data.Leave_Type);
					}
				}
			});


		 }

		function getDetails5(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row4.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#reapply').modal('hide');

					}
					else{
						$('.id').val(response.data.apply_leave_request_Id);
						$('.Employee_Id').val(response.data.Employee_Id);
						$('.Company_Id').val(response.data.Company_Id );
						$('.Leave_Type').val(response.data.Leave_Type);
						$('.Leave_Duration').val(response.data.Leave_Duration);
						$('.NumberofDays').val(response.data.NumberofDays);
						$('.Leave_Start').val(response.data.Leave_Start);
						$('.Leave_End').val(response.data.Leave_End);
						$('.Approver_Name').val(response.data.Approver_Name);
						$('.Leave_Reason').val(response.data.Leave_Reason);	
						$('.Leave_Support_Doc').val(response.data.Leave_Support_Doc);
						$('.Leave_Status').val(response.data.Leave_Status);
						$('.Leave_time_request').val(response.data.Leave_time_request);	
						$('.Lastname').val(response.data.Lastname );	
						$('.Firstname').val(response.data.Firstname);															
						$('.Leave_Type').html(response.data.Leave_Type + ' ' );
						$('.fullname').val(response.data.Firstname + ' ' + response.data.Lastname);
						$('.Employee_Gender').val(response.data.Employee_Gender);

					}
				}
			});


		 }

		function getDetails6(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row5.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#delete6').modal('hide');

					}
					else{
						$('.ID').val(response.data.ID);
						$('.Employee_Id').val(response.data.Employee_Id);
						$('.Company_Id').val(response.data.Company_Id );
						$('.Employee_LastName').val(response.data.Employee_LastName);
						$('.Employee_FirstName').val(response.data.Employee_FirstName);
						$('.Employee_MiddleInitial').val(response.data.Employee_MiddleInitial);
						$('.Employee_Suffix').val(response.data.Employee_Suffix);
						$('.Employee_HireDate').val(response.data.Employee_HireDate);
						$('.Employee_Gender').val(response.data.Employee_Gender);
						$('.Employee_MaritalStatus').val(response.data.Employee_MaritalStatus);	
						$('.Employee_Birthdate').val(response.data.Employee_Birthdate);
						$('.Employee_Address').val(response.data.Employee_Address);
						$('.Employee_Religion').val(response.data.Employee_Religion);	
						$('.Employee_Status').val(response.data.Employee_Status );	
						$('.Employee_Contact1').val(response.data.Employee_Contact1);
					    $('.Employee_Contact2').val(response.data.Employee_Contact2);
						$('.Employee_Contact3').val(response.data.Employee_Contact3);
						$('.Employee_Email').val(response.data.Employee_Email);	
						$('.Employee_ContactPerson').val(response.data.Employee_ContactPerson );	
					    $('.Employee_ContactPersonNumber').val(response.data.Employee_ContactPersonNumber);
						$('.Employee_Bloodtype').val(response.data.Employee_Bloodtype);
						$('.Employee_Department').val(response.data.Employee_Department);	
						$('.Employee_Position').val(response.data.Employee_Position );	
						$('.fullname').html(response.data.Employee_FirstName + ' ' + response.data.Employee_MiddleInitial + ' ' + response.data.Employee_LastName + ' ' + response.data.Employee_Suffix);

					}
				}
			});


		 }
		function getDetails7(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row6.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#delete4').modal('hide');
					    $('#delete5').modal('hide');
					    $('#approve').modal('hide');
					    $('#leaveforward').modal('hide');

					}
					else{
						$('.id').val(response.data.apply_leave_request_Id);
						$('.Company_Id').val(response.data.Company_Id);
						$('.Employee_Id').val(response.data.Employee_Id );
						$('.Leave_Type').val(response.data.Leave_Type);;
						$('.Leave_End').val(response.data.Leave_End);
						$('.Leave_Days').val(response.data.Leave_Days);
						$('.Leave_approver').val(response.data.Leave_approver);
						$('.Leave_Reason').val(response.data.Leave_Reason);	
						$('.Leave_Support_Doc').val(response.data.Leave_Support_Doc);
						$('.Leave_Status').val(response.data.Leave_Status);
						$('.Leave_time_request').val(response.data.Leave_time_request);								
	

					}
				}
			});


		 }
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
		function getDetails8(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row7.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#view1').modal('hide');

					}
					else{
						$('.id').html(response.data.Company_Id);
						$('.Company_Name').html(response.data.Company_Name );
						$('.Subscriber_Name').html(response.data.Subscriber_Name);;
						$('.Company_Owner').html(response.data.Company_Owner);
						$('.Company_Address').html(response.data.Company_Address);
						$('.Company_Contact').html(response.data.Company_Contact);
						$('.Company_Email').html(response.data.Company_Email);	
						$('.Company_License').html(response.data.Company_License);
						$('.Branch').html(response.data.Branch);
						$('.Supporting_Doc1').html(response.data.Supporting_Doc1);								
						$('.Supporting_Doc2').html(response.data.Supporting_Doc2);	
						$('.Supporting_Doc3').html(response.data.Supporting_Doc3);
					}
				}
			});


		 }

		function getDetails10(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row8.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#edit').modal('hide');
						$('#delete').modal('hide');
						$('#alert').show();
						$('#alert_message').html(response.message);
					}
					else{
						$('.id').val(response.data.id);
						$('.LeaveType').val(response.data.LeaveType);
						$('.NumberofDays').val(response.data.NumberofDays);
						$('.Requirement').val(response.data.Requirement);
						$('.Duration_Type').val(response.data.Duration_Type);
						$('.Multiple_Days').val(response.data.Multiple_Days);
						$('.leave_type_employee_position').val(response.data.leave_type_employee_position);
						$('.LeaveType1').html(response.data.LeaveType + ' ' );
					}
				}
			});


		}
		 function getDetails11(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row9.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#applyleave1').modal('hide');

					}
					else{
						$('.id').val(response.data.leave_type_position_id);
						$('.Company_Id').val(response.data.Company_Id);
						$('.LeaveType').val(response.data.LeaveType);
						$('.NumberofDays').val(response.data.NumberofDays);
						$('.Requirement').val(response.data.Requirement);
						$('.Duration_Type').val(response.data.Duration_Type);
						$('.Multiple_Days').val(response.data.Multiple_Days);
						$('.LeaveType').html(response.data.LeaveType);
						$('.NumberofDays').html(response.data.NumberofDays + ' ' + 'Days');
						$('.Requirement').html(' <b > * </b> '+response.data.Requirement);
						$('.Duration_Type').split(',').val(response.data.Duration_Type);
						$('.Multiple_Days').html(response.data.Multiple_Days);
					}
				}
			});


		}
	function getDetails12(id){
			$.ajax({
				method: 'POST',
				url: 'fetch_row6.php',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.error){
						$('#delete4').modal('hide');
					    $('#delete5').modal('hide');
					    $('#approve').modal('hide');
					    $('#leaveforward').modal('hide');

					}
					else{
						$('.id').val(response.data.apply_leave_request_Id);
						$('.Company_Id').val(response.data.Company_Id);
						$('.Applied_Employee_Id').val(response.data.Applied_Employee_Id );
						$('.Leave_Type').val(response.data.Leave_Type);;
						$('.Leave_End').val(response.data.Leave_End);
						$('.Leave_Days').val(response.data.Leave_Days);
						$('.Leave_approver').val(response.data.Leave_approver);
						$('.Leave_Reason').val(response.data.Leave_Reason);	
						$('.Leave_Support_Doc').val(response.data.Leave_Support_Doc);
						$('.Leave_Status').val(response.data.Leave_Status);
						$('.Leave_time_request').val(response.data.Leave_time_request);								
	

					}
				}
			});


		 }