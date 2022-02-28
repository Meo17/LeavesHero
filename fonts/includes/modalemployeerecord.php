     <!---------------------------------------------------VIEW LEAVE MODAL------------------------------------------------------------>
   <div class="modal fade" id="viewdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
      <div class="modal-dialog" style="width: 900px">
          <div class="modal-content" >
             <div class="modal-header" style="height:55px">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title " id="myModalLabel" style="padding-top:-20px"><b>Employee  Profile</b></h4></center>
           </div>
               <div class="modal-body" > 
                <div style="float: left;">
                  
           
                          <h6>Employee Id No :</h6>
                          <h6>First Name :</h6>
                          <h6>Last Name :</h6>
                          <h6>Middle Initial :</h6>
                          <h6>Department :</h6>
                          <h6>Position :</h6>
                          <h6>Hire Date:</h6>
                          <h6>Sex  :</h6>
                          <h6>Marital Status :</h6>
                          <h6>Suffix  :</h6>
                          <h6>Birthdate :</h6>
                          <h6>Age:</h6>
                          <h6>Address:</h6>
                          <h6>Religion:</h6>
                          <h6>Contact1  :</h6>
                          <h6>Contact2:</h6>
                          <h6>Contact3 :</h6>
                          <h6>Email Address:</h6>  
                          <h6>Contact Person:</h6>    
                          <h6>Contact Number:</h6>                                                                 
                            <div style="float: left; text-align: right;margin-left: 100px;margin-top: -474px">
                             <h6 class="Employee_Id"></h6>
                             <h6 class="Employee_FirstName"></h6>
                             <h6 class="Employee_LastName"></h6>
                             <h6 class="Employee_MiddleInitial"></h6>
                             <h6 class="Employee_Department"></h6>
                             <h6 class="Employee_Position"></h6>
                             <h6 class="Employee_HireDate"></h6>
                             <h6 class="Employee_Gender"></h6>
                             <h6 class="Employee_MaritalStatus"></h6>
                             <h6 class="Employee_Suffix"></h6>
                             <h6 class="Employee_Birthdate "></h6>
                             <input type="date"class="Employee_Birthdate" id="date"onblur="getAge();" hidden>
                                               
                             <h6 class="Employee_Address"></h6>
                             <h6 class="Employee_Religion"></h6>
                             <h6 class="Employee_Contact1"></h6>
                             <h6 class="Employee_Contact2"></h6>
                             <h6 class="Employee_Contact3"></h6>
                             <h6 class="Employee_Email"></h6>
                             <h6 class="Employee_ContactPerson"></h6>
                             <h6 class="Employee_ContactPersonNumber"></h6>
              
                           </div>
                           
                   <script type="text/javascript">
                   function getAge(){
                  var dob = document.getElementById('date').value;
                  dob = new Date(dob);
                  var today = new Date();
                  var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                  document.getElementById('age').value=age;
                    };
                                    
                    </script>
               </div>
               <div style="float: left;">
                         <h6 style="font-size: 16px ;float: center;margin-left: 200px"><b>Employee's Leave Summary <b></h6>                                     
                            <div style="float: left; text-align: right;margin-left: 100px;margin-top: -474px">
                 
              
                           </div>
                           
                   <script type="text/javascript">
                   function getAge(){
                  var dob = document.getElementById('date').value;
                  dob = new Date(dob);
                  var today = new Date();
                  var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                  document.getElementById('age').value=age;
                    };
                                    
                    </script>
               </div>
             </div>
              <div class="modal-footer" style="margin-top: 200px">
                  <button type="submit"  class="btn btn-success" data-dismiss="modal"> close</button>
              </div>
          </div>
      </div>
  </div>

  <!-- UPDATE EMPLOYEE -->
  <div class="modal fade" id="updateemp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 800px;">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel"><b>Update Employee's Profile</b></h4></center>
              </div>

            <form method="post">
                 <div class="modal-body">  
                    <div class="container" style="width: 700px;border-bottom: 2px solid #ccc">
                    <h5 style="float: left;"><b>Personal Information</b></h5>
                      <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>

                   </div>
                   <div class="container" style="width: 800px;height: auto;">
                      <div class="form-group" style="margin-left: 45px;margin-top: 10px">
                          <p>Family Name</p>
                            <input type ="text"  name ="id" class="form-control hidden  Employee_Id" >
                          <input type ="text"  name ="lname" class="form-control Employee_LastName"  style="width: 200px">
                        </div>
                        <div class="form-group" style="margin-right: 305px;margin-top: -70px;float: right;">
                            <p>First Name</p>
                            <input type ="text"  name ="fname" class="form-control Employee_FirstName"   style="width: 200px">

                           
                          </div>
                        <div class="form-group" style="margin-right: 245px;margin-top: -70px;float: right;">
                           <p>MI</p>
                            <input type ="text"  name ="mi" class="form-control  Employee_MiddleInitial "   style="width: 40px">
                         
                        </div>
                        <div class="form-group" style="margin-right: 180px;margin-top: -70px;float: right;">
                           <p>Suffix </p>
                            <input type ="text"  name ="suffix" class="form-control  Employee_Suffix "   style="width: 40px">
                         
                        </div>
                         <div class="form-group" style="margin-right: 70px;margin-top: -70px;float: right;">
                           <p>Sex</p>
                            <input type ="text"  name ="sex" class="form-control  Employee_Gender "   style="width: 80px">
                         
                        </div>
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                           <p>Marital Status</p>
                            <input type ="text"  name ="maritalstatus" class="form-control  Employee_MaritalStatus "   style="width: 80px">
                         
                        </div> 
                        <div class="form-group" style="margin-right: 470px;margin-top: 10px;float: right;">
                          <p>Birthdate </p>
                          <input type ="date"  name ="bdate" class="form-control   Employee_Birthdate"   style="width: 150px;padding-bottom: 30px;height: 10px">    
                        </div>

                       <div class="form-group" style="margin-left: 310px;margin-top:-80px;float: left;">
                           <p>Address </p>
                          <textarea type ="text"  name ="address" class="form-control  Employee_Address"   style="width: 230px"> </textarea>  
                        </div>

                        <div class="form-group" style="margin-left: 550px;margin-top:-110px;float: left;">
                           <p>Religion  </p>
                           <input type ="text"  name ="religion" class="form-control  Employee_Religion "   style="width: 150px">   
                        </div>
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                            <p>Contact1 No. </p>
                            <input type ="text"  name ="contact1" class="form-control  Employee_Contact1 "   style="width: 120px">
                         
                        </div>
                        <div class="form-group" style="margin-left: 35px;margin-top: 10px;float: left;">
                            <p>Contact2 No. </p>
                            <input type ="text"  name ="contact2" class="form-control  Employee_Contact2 "   style="width: 120px">
                         
                        </div> 
                         <div class="form-group" style="margin-left: 35px;margin-top: 10px;float: left;">
                            <p>Contact3 No. </p>
                            <input type ="text"  name ="contact3" class="form-control  Employee_Contact3 "   style="width: 100px">
                        </div>    
                         <div class="form-group" style="margin-left: 35px;margin-top: 10px;float: left;">
                            <p>Email </p>
                            <input type ="text"  name ="email" class="form-control  Employee_Email  "   style="width: 210px">
                        </div>  
                        <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                            <p>Contact Person </p>
                            <input type ="text"  name ="contactperson" class="form-control  Employee_ContactPerson "   style="width: 200px">
                         
                        </div>  
                         <div class="form-group" style="margin-left: 35px;margin-top: 10px;float: left;">
                            <p>Contact Person No. </p>
                            <input type ="text"  name ="contactpersonno" class="form-control  Employee_ContactPersonNumber "   style="width: 120px">
                         
                        </div>                                                                    

                    </div>   
                    <div class="container" style="width: 700px;border-bottom: 2px solid #ccc">
                        <h5 style="float: left;"><b>Work Information</b></h5>
                        <div style="padding-left: 20px; float: right;padding-top: 5px">

                        </div>
                   </div>
                        <div class="container">
                          <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>Department </p>
                              <input type ="text"  name ="department" class="form-control  Employee_Department "   style="width: 200px">
                           
                          </div>
                           <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>Position</p>
                              <input type ="text"  name ="position" class="form-control  Employee_Position"   style="width: 200px">
                           
                          </div>
                             <div class="form-group" style="margin-left: 45px;margin-top: 10px;float: left;">
                              <p>HireDate</p>
                              <input type ="date"  name ="hiredate" class="form-control  Employee_HireDate"   style="width: 200px;width: 150px;padding-bottom: 30px;height: 10px">
                           
                            </div>   
                          <div class="form-group" style="margin-left:-645px;margin-top: 100px;float: left;">
                            <p>Branch </p>
                            <input type ="text"  name ="branch" class="form-control  Branch"   style="width: 120px">
                         
                        </div>                                           
                        </div>
                 </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"style="margin-right: 10px"></span>No</button>
                      <button type="submit" class="btn btn-default " name="update"><span class="glyphicon glyphicon-check"style="margin-right: 10px"></span>Yes</button>
                  </div>
            </form>


          </div>
      </div>
  </div>
   <!---------------------------------END MODAL----------------------------------------------------------------------->
  <!-- Delete -->
  <div class="modal fade" id="deleteemployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel">Deactivate Employee</h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Deactivate</p>
                <h5 class="text-center fullname"></h5>
               
                   <input type="text" name="Id" class="Id" hidden>      

                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="submit" class="btn btn-danger " name="updatestatus"style="font-size: "><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>