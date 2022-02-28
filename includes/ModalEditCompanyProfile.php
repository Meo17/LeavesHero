<style type="text/css">
   .modal-backdrop {

    display: none;    
} 
.fc-time{
   display : none;
}
</style>
<!-----COMPANY PROFILE MODAL------>
        <!-- Edit Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
    
          <!-- Modal content-->
      
          <div class="modal-content">
            <div class="modal-header" style="border-bottom: 2px solid #ccc">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form  method="post" enctype="multipart/form-data" >
            <div class="modal-body">
              <style>
            .image_upload_preview {
              border-radius: 160%;
              height: 100px;
              width: 150px;
            }</style>
              <input type="file" id="inputFile" name="file" accept="image/*" capture style="display:none" value=""></input>
                <img src="images/icon_user.png" id="image_upload_preview" style="cursor:pointer;width:100px" class="center image_upload_preview" />
                <div class="form-group" style="padding-top: : 10px">
                  <p>Company Address</p>
                    
                   <input id="companyaddress"type="text" class=" form-control"  style="width: 250px" > 
      
      
                 </div>
                 <div class="form-group">
                   <p>Password</p>
                   <input type="password" class=" form-control"   id="password" style="width: 250px" >

                 </div>
              <div class="form-group">
                  <p>Contact Number</p>
                  <input id="companycontact" type="text" class="form-control"   style="width: 250px" > 
              </div>
              <div class="form-group">
                  <p>Email Address</p>
                  <input id="email" type="text" class="form-control"  style="width: 250px" >
                  
                  
              </div>
              
              
            </div>
            <div class="modal-footer">
              <button class="btn btn-leave btn-hover-white" name ="companyedit" id="comedit">Save</button>
             <button class="btn btn-red btn-hover-white" data-dismiss="modal"style="float: left;">Cancel</button>
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
                    <form class="form-horizontal" >
                    
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"><b>Add Event</b></h4>
                      </div>
                      <div class="modal-body">
                           
                        <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                       
                      
                
                             <input type="text" name="title" class="form-control" id="title1" placeholder="Title" required>
                       
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
                          <input type="date" name="start" class="form-control-edit" id="start"  style="width: 440px">
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="end" class="col-sm-2 control-label">End date</label>
                        <div class="col-sm-10">
                          <input type="date" name="end" class="form-control-edit" id="end"style="width: 440px" >
                        </div>
                        </div>
                      
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal"style="font-size: 10px">Close</button>
                      <button id="addcalendarevent" type="submit" class="btn btn-sucess" style="background-color: #00cc99;font-size: 12px"><span class="glyphicon glyphicon-check" style="padding-right: 10px;font-size: 12px"></span>Save changes</button>
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
                    <form class="form-horizontal" >
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"><b>Edit Event</b></h4>
                      </div>
                      <div class="modal-body">
                      
                        <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" id="updatetitle" placeholder="Title">
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Color</label>
                        <div class="col-sm-10">
                          <select name="color" class="form-control" id="updatecolor" style="height: 30px">
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
                          <input type="date" name="start" class="form-control-edit" id="updatestart" style="width: 440px" >
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="end" class="col-sm-2 control-label">End date</label>
                        <div class="col-sm-10">
                          <input type="date" name="end" class="form-control-edit" id="updateend" style="width: 440px">
                        </div>
                        </div>
                          <div class="form-group"> 
                          <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                            <label class="text-danger"><input type="checkbox"  name="delete" id="deleteevents"> Delete event</label>
                            </div>
                          </div>
                        </div>
                        
                        <input type="hidden" name="id" class="form-control" id="id">
                      
                      
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 10px">Close</button>
                      <button type="submit"  class="btn btn-sucess" id="updatecalendar" style="background-color: #00cc99;font-size: 10px" ><span class="glyphicon glyphicon-check" style="padding-right: 10px;"></span>Save changes</button>
                      </div>
                    </form>
                    </div>
                    </div>
                    </div>

<!-- Delete -->


<!---------------------------------------------------------- Delete ---------------------------------------------------------------->
  <div class="modal fade" id="leaveme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel">Delete Leave</h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Delete</p>
                <h5 class="text-center fullname"></h5>
                        <input type="text" name="bookId" value="" id="keys" hidden/>
                        <input type="text"  id="pairleave"  hidden/>
                        <input type="text" name="summarkey" value="" id="summarkey"  hidden/>
                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-danger yes" id="yes" data-key="key" name="updatestatus"style="font-size: "onclick="hulla.send('Successfully Deleted', 'success')"><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>
<!--------------------------------------------------------------- End -------------------------------------------------------------->
<!-------------------------------------------------- Delete employee---------------------------------------------------------------->
  <div class="modal fade" id="leavemeemployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel">Delete Leave</h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Delete</p>
                <h5 class="text-center fullname"></h5>
                        <input type="text" name="bookId1" value="" id="keys1"  hidden/>
                        <input type="text"  id="pairleave1"  hidden/>
                        <input type="text" name="summarkey" value="" id="summarkey1"  hidden/> 
                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-danger yes1" id="yes1" data-key="key" name="updatestatus"style="font-size: "onclick="hulla.send('Successfully Deleted', 'success')"><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>

<!--------------------------------------------------------------- End -------------------------------------------------------------->  <div class="modal fade" id="deldept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel">Delete Department</h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Delete</p>
                <h5 class="text-center fullname"></h5>
                        <input type="text" name="bookId1" value="" id="depkey"  hidden/>

                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-danger yes1" id="yesdeldept" data-key="key" name="updatestatus"style="font-size: "onclick="hulla.send('Successfully Deleted', 'success')"><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>
  
  <div class="modal fade" id="delposs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel">Delete Employee Position</h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Delete</p>
                <h5 class="text-center fullname"></h5>
                        <input type="text" name="bookId1" value="" id="delpos"  hidden/>

                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-danger yes1" id="yesdelpos" data-key="key" name="updatestatus"style="font-size: "onclick="hulla.send('Successfully Deleted', 'success')"><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>
    <div class="modal fade" id="convertcash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel">Delete Company Branch</h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Delete</p>
                <h5 class="text-center fullname"></h5>
                        <input type="text" name="bookId1" value="" id="convertkey"  hidden/>

                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-danger yes1" id="yesdelcombranch" data-key="key" name="updatestatus"style="font-size: "onclick="hulla.send('Successfully Deleted', 'success')"><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>
<!-------------------------------------------------- Delete employee---------------------------------------------------------------->
  <div class="modal fade" id="approverremove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width: 300px">
         <form method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <center><h4 class="modal-title" id="myModalLabel">Delete Leave</h4></center>
                </div>
              <div class="modal-body">  
                <p class="text-center">Are you sure you want to Delete</p>
                <h5 class="text-center fullname"></h5>
                        <input type="text" name="bookId1" value="" id="keys3"  hidden/>

                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                  <button type="button" class="btn-remove-key btn btn-danger yes3" id="yes3" data-key="key" name="updatestatus"style="font-size: "onclick="hulla.send('Successfully Deleted', 'success')"><span class="glyphicon glyphicon-trash"></span>Yes</button>
              </div>
             

          </div>
             </form>
      </div>
  </div>
  
<!--------------------------------------------------------------- End -------------------------------------------------------------->
    <script src="dist/js/jquery.preloadinator.min.js"></script>
    <script>
      $('.js-preloader').preloadinator({
        minTime: 2000
      });
    </script>

<script type="text/javascript">
  $(document).ready(function(e) {
        $(".showonhover").click(function(){
      $("#selectfile").trigger('click');
    });
    });


var input = document.querySelector('input[type=file]'); // see Example 4

function displayAsImage(file) {
  var imgURL = URL.createObjectURL(file),
      img = document.createElement('img');

  img.onload = function() {
    URL.revokeObjectURL(imgURL);
  };

  img.src = imgURL;
  document.body.appendChild(img);
}


$("#image_upload_preview").click(function () {
    $("#inputFile").trigger('click');
});

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    
    }
   $("#inputFile").change(function () {
        readURL(this);
    });
</script>