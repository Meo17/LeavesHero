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
            }
            #divCheckPasswordMatch {

                display: none;
            }
          </style>

              <input type="file" id="inputFile" name="file" accept="image/*" style="display:none" ></input>
                <img src="images/icon_user.png"  id="image_upload_preview" style="cursor:pointer;width:100px" class="center image_upload_preview" ></img>
               
                 <div class="form-group">
                   <p>Password</p> <a data-toggle="modal" href="#confirmodal" style="float: right;color: black;margin-top: -30px;text-decoration: none;"><span class="design icon_edit" style="padding-bottom: 9px;top: 3px"></span>Chage your password</a>
                   <input type="password" class=" form-control"   id="password" style="width: 250px" disabled >

                 </div>      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-leave btn-hover-white" name ="companyedit" id="companyedit1" >Save</button>
             <button type="submit" class="btn btn-red btn-hover-white" data-dismiss="modal"style="float: left;">Cancel</button>
            </div>
          </form>
    
          </div> 
        </div>
      </div>
    <div class="modal fade" id="confirmodal" role="dialog">
        <div class="modal-dialog modal-sm">
  
              
          <div class="modal-content">
            <div class="modal-header" style="border-bottom: 2px solid #ccc">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form  method="post" enctype="multipart/form-data" >
            <div class="modal-body">
                  <div   class="registrationFormAlert alert alert-danger " id="divCheckPasswordMatch">
                  </div>
              
                  
                 <div class="form-group">
                   <p>New Password</p>
                   <input type="password" class=" form-control"   id="newpassword" style="width: 250px" >

                 </div>
                <div class="form-group">
                   <p>Re-Type Password</p>
                   <input type="password" class=" form-control"   id="retypepassword" style="width: 250px" onkeyup="checkPasswordMatch();">

                 </div>
                <div class="form-group">
                   <p>OLD Password </p>
                   <input type="password" class=" form-control"   id="oldpassword" style="width: 250px" >

                 </div>
              
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-leave btn-hover-white" name ="Confirm1" id="companyedit2" >Confirm</button>
             <button type="submit" class="btn btn-red btn-hover-white" data-dismiss="modal"style="float: left;">Cancel</button>
            </div>
          </form>
    
          </div> 
        </div>
      </div>
<style type="text/css">
   .modal-backdrop {

    display: none;    
} 
</style>
<!-----COMPANY PROFILE MODAL------>

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
  function checkPasswordMatch() {
    var password = $("#newpassword").val();
    var confirmPassword = $("#retypepassword").val();

    if (password != confirmPassword){
        $("#divCheckPasswordMatch").html("Passwords do not match!");
      $("#divCheckPasswordMatch").show();
    }
    else{
        $("#divCheckPasswordMatch").html("Passwords match.");
         $("#divCheckPasswordMatch").show();
    }
        
}
</script>