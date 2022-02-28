<?php

$resid = $_GET['id'];
$leave = ret_leave_update($resid);
?>
     <!-- Edit Modal -->
      <div class="modal fade " id="edit" role="dialog" >
        <div class="modal-dialog modal-sm center"style="width: 900px;float: center;margin-left:210px;">
    
          <!-- Modal content-->
      
          <div class="modal-content">
            <div class="modal-header" style="border-bottom: 2px solid #ccc">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
    
            <div class="modal-body">

       <form class="form-inline"  style="padding-left: 18px;padding-top: 10px" method="post" id="editForm>

  
    
              <div class="form-group" style="padding-right: 10px">
                <p>Leave Type</p>
               <input type="hidden" class="id" name="id">
        
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
              <button type="submit" class="btn btn-leave btn-hover-white" name ="update" onClick="window.location.reload()">Save</button>
            </div>
      </form>
    
          </div> 
        </div>
      </div>