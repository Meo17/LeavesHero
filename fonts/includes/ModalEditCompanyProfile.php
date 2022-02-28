
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Update LeaveType </h4></center>
            </div>
             <form class="form-inline" id="editForm" style="padding-left: 18px;padding-top: 10px" method="post">
            <div class="modal-body">
   
             <div class="container-fluid">   
       
              <div class="form-group" style="padding-right: 10px">
                <p>Leave Type</p>
                <input type="text" class="form-control LeaveType" name="leavetype" >
                <input type="hidden" class="id" name="id">
                <input type="text" class="form-control hidden" name="comapanyid" value="<?php echo $com['Company_Id']?>" >
              </div>
              <div class="form-group" style="padding-right: 6px">
                <p>Number of Days</p>
                <div style="padding-left: 20px">
                  <input type="Number" class="form-control NumberofDays"  style="width: 65px" name="numberofdays">
                </div>
              </div>
              <div class="form-group" style="padding-right: 10px">  
                <p style="padding-left: 100px">Duration</p>
                <div>
                  <label class="checkbox-inline Duration_Type"><input type="checkbox"  name="ids[]" value="Half Day">Half Day</label>
                  <label class="checkbox-inline Duration_Type"><input type="checkbox"  name="ids[]" value="Full Day">Full Day</label>
                  <label class="checkbox-inline Duration_Type"><input type="checkbox"  name="ids[]" value="Multiple Days">Multiple Days</label>
                   <input type="Number" class="form-control Multiple_Days"  style="width: 60px" name="multiple1">
                </div>
              </div>
              <div class="form-group">
                <p style="padding-left: 30px">Requirement/s</p>
                <textarea class="form-control   Requirement" rows="5" name="requirement" style="height: 26px"></textarea>
              </div>

      <br>
        <br>
        <br>    
      </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"style="font-size: 10px"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-sucess"style="background-color: #00cc99;font-size: 10px"><span class="glyphicon glyphicon-check"></span> Update</button>
 
            </div>
    </div>
</form>

        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="delete1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 300px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><b>Remove Approver</b></h4></center>
            </div>
            <div class="modal-body">  
              <p class="text-center">Are you sure you want to Remove</p>
              <h5 class="text-center fullname" style="text-decoration: bold"></h5>
            
         </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"style="font-size: 10px"><span class="glyphicon glyphicon-remove"></span>No</button>
                <button type="button" class="btn btn-danger Id"style="font-size: 10px"><span class="glyphicon glyphicon-trash"></span>Yes</button>
            </div>

        </div>
    </div>
</div>
 


  

  <!-- Update Modal -->
      <div class="modal fade " id="myModal1" role="dialog" >
        <div class="modal-dialog modal-sm center"style="width: 900px;float: center;margin-left:210px;">
    
          <!-- Modal content-->
      
          <div class="modal-content">
            <div class="modal-header" style="border-bottom: 2px solid #ccc">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
    
            <div class="modal-body">

       <form class="form-inline"  style="padding-left: 18px;padding-top: 10px" method="post">

  
    
              <div class="form-group" style="padding-right: 10px">
                <p>Leave Type</p>
               
                <input type="text" class="form-control" name="leavetype1" value="<?php echo $leave["LeaveType"]?>">
                <input type="text" class="form-control hidden" name="comapanyid1" value="<?php echo $com['Company_Id']?>" >
              </div>
              <div class="form-group" style="padding-right: 6px">
                <p>Number of Days</p>
                <div style="padding-left: 20px">
                  <input type="Number" class="form-control"  style="width: 65px" name="numberofdays1">
                </div>
              </div>
              <div class="form-group" style="padding-right: 10px">  
                <p style="padding-left: 100px">Duration</p>
                <div >
                  <label class="checkbox-inline"><input type="checkbox" name="ids1[]" value="Half Day">Half Day</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ids1[]" value="Full Day">Full Day</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ids1[]" value="Multiple Days">Multiple Days</label>
                   <input type="Number" class="form-control"  style="width: 60px" name="multiple1">
                </div>
              </div>
              <div class="form-group">
                <p style="padding-left: 30px">Requirement/s</p>
                <textarea class="form-control" rows="5" name="requirement1" style="height: 26px"></textarea>
              </div>

              
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-leave btn-hover-white" name ="update" onClick="window.location.reload()"style="font-size: 10px">Save</button>
            </div>
           </form>
    
          </div> 
        </div>
      </div>   





<!--EndCalendar Events--->


                  <!-- Add Event Modal -->
                  <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form class="form-horizontal" method="POST" action="addEvent.php">
                    
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"><b>Add Event</b></h4>
                      </div>
                      <div class="modal-body">
                           
                        <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                       
                      
                          <input type="text" name="title1" class="form-control hidden" id="title" placeholder="Title" value="<?php echo $com['Company_Id'];?>">
                             <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
                       
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Color</label>
                        <div class="col-sm-10">
                          <select name="color" class="form-control" id="color" style="height: 30px">
                            <option value="">Choose</option>
                            <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                            <option style="color:#008000;" value="#008000">&#9724; Green</option>             
                            <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                            <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                            <option style="color:#000;" value="#000">&#9724; Black</option>
                            
                          </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="start" class="col-sm-2 control-label">Start date</label>
                        <div class="col-sm-10">
                          <input type="text" name="start" class="form-control" id="start" readonly>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="end" class="col-sm-2 control-label">End date</label>
                        <div class="col-sm-10">
                          <input type="text" name="end" class="form-control" id="end" readonly>
                        </div>
                        </div>
                      
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal"style="font-size: 10px">Close</button>
                      <button type="submit" class="btn btn-sucess" style="background-color: #00cc99"style="font-size: 10px"><span class="glyphicon glyphicon-check" style="padding-right: 10px"></span>Save changes</button>
                      </div>
                    </form>
                    </div>
                    </div>
                  </div>
    <!--End Modal --->

   <!---------------Edit Calendar Modal---------------------------->
              <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form class="form-horizontal" method="POST" action="editEventTitle.php">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"><b>Edit Event</b></h4>
                      </div>
                      <div class="modal-body">
                      
                        <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                      <input type="hidden" name="comapanyid" class="form-control" id="comapanyid" placeholder="Title" value="<?php echo $com['Company_Id'];?>">
                          <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Color</label>
                        <div class="col-sm-10">
                          <select name="color" class="form-control" id="color" style="height: 30px">
                            <option value="">Choose</option>
                            <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                            <option style="color:#008000;" value="#008000">&#9724; Green</option>             
                            <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                            <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                            <option style="color:#000;" value="#000">&#9724; Black</option>
                            
                          </select>
                        </div>
                        </div>
                          <div class="form-group"> 
                          <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                            <label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
                            </div>
                          </div>
                        </div>
                        
                        <input type="hidden" name="id" class="form-control" id="id">
                      
                      
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 10px">Close</button>
                      <button type="submit" class="btn btn-sucess" style="background-color: #00cc99;font-size: 10px" ><span class="glyphicon glyphicon-check" style="padding-right: 10px;"></span>Save changes</button>
                      </div>
                    </form>
                    </div>
                    </div>
                    </div>

<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width: 300px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><b>Delete Leave</b></h4></center>
            </div>
            <div class="modal-body">  
              <p class="text-center">Are you sure you want to Delete</p>
             <p class="text-center LeaveType1"></p>
         </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                <button type="button" class="btn btn-danger id"><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteleave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width: 300px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><b>Delete Leave</b></h4></center>
            </div>
            <div class="modal-body">  
              <p class="text-center">Are you sure you want to Delete</p>
             <p class="text-center LeaveType1"></p>
         </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"style="font-size: 10px"><span class="glyphicon glyphicon-remove"></span> No</button>
                <button type="button" class="btn btn-danger id" style="font-size: 10px"><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>

        </div>
    </div>
</div>
<!-- Edit -->
<div class="modal fade" id="edit2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><b>Update Leave Type </b></h4></center>
            </div>
             <form class="form-inline" id="editForm2" style="padding-left: 18px;padding-top: 10px" method="post">
            <div class="modal-body">
   
             <div class="container-fluid">   
       
              <div class="form-group" style="padding-right: 10px">
                <p>Leave Description</p>
                <input type="text" class="form-control LeaveType" name="leavetype" >
                <input type="text" class="hidden id" name="id">
                <input type="text" class="form-control hidden" name="comapanyid" value="<?php echo $com['Company_Id']?>" >
              </div>
              <div class="form-group" style="padding-right: 6px">
                <p>Number of Days</p>
                <div style="padding-left: 20px">
                  <input type="Number" class="form-control NumberofDays"  style="width: 65px" name="numberofdays">
                </div>
              </div>
              <div class="form-group" style="padding-right: 10px">  
                <p style="padding-left: 100px">Duration</p>
                <div>
                  <label class="checkbox-inline Duration_Type"><input type="checkbox"  name="ids[]" value="Half Day">Half Day</label>
                  <label class="checkbox-inline Duration_Type"><input type="checkbox"  name="ids[]" value="Full Day">Full Day</label>
                  <label class="checkbox-inline Duration_Type"><input type="checkbox"  name="ids[]" value="Multiple Days">Multiple Days</label>
                   <input type="Number" class="form-control Multiple_Days"  style="width: 60px" name="multiple1">
                </div>
              </div>
                  <div class="form-group">
                    <p style="padding-left: 30px">Employee Position</p>
                    <input type="text" class="form-control leave_type_employee_position" name="position"required placeholder="Employee Position" style="width: 150px" >
              </div>
              <div class="form-group">
                <p style="padding-left: 30px">Requirement/s</p>
                <textarea class="form-control   Requirement" rows="5" name="requirement" style="height: 26px"></textarea>
              </div>

      <br>
        <br>
        <br>    
      </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"style="font-size: 10px"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-sucess"style="background-color: #00cc99;font-size: 10px"><span class="glyphicon glyphicon-check"></span> Update</button>
 
            </div>
    </div>
</form>

        </div>
    </div>
</div>
