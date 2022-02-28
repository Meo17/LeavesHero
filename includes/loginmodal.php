
        <div id="myModalLogIn" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <div class="modal-content">
 
                <div class="modal-foot">
                  <php>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                <div class="modal-head" style="float: left; border-right: 1px solid #ccc">
                  <img src="icons/image2.jpg" style="width: 190px; height: 220px;">
                  </div>
                  <div class="modal-body" style="float: right;padding-right: 13px;">
                    <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
                        <button class="close"><span aria-hidden="true">&times;</span></button>
                          <div id="alert_message"></div>
                      </div>
                    <form id="loginForm" method="POST" ng-app="app" ng-controller="ctrl">
                      <p id="p01"></p>
                      
                      <h4 style="color: #262626">Log in your account here !</h4>
                    <div class="input-group">
                        <input type="text" class="input-style3"  name="username" ng-model="email"id="username" placeholder="Username" required>
                    </div>
                    <div class="input-group has-feedback">
                        <input type="password" class="input-style3" name="password" id="pwd" ng-model="password"  placeholder="Password" required>
                            <i style="margin-top: 5px"class="glyphicon glyphicon-eye-open form-control-feedback" onclick="myFunction()"></i>
                  </div>
                  <a href="#" class="text-hover-gray" style="font-size: 10px;padding-left: 118px; text-decoration: none;color: #ccc">Forget Password?</a><br><br>
                  <button   type="submit" id ="login" ng-click="login()"class="btn btn-leave btn-hover-white sweet-10 "style="width: 208px">Log In</button>
                </form>
                  </div>
                  <div class="modal-footer">
                  </div>
              </div>
           </div>
        </div>      
        <style >
   #pwd + .glyphicon {
   cursor: pointer;
   pointer-events: all;
 }

/* Styles for CodePen Demo Only */

     </style>
  <script>
        function myFunction() {
          var x = document.getElementById("pwd");
          if (x.type === "password") {
              x.type = "text";

          } else {
              x.type = "password";
          }
                      // toggle password visibility
          $('#pwd + .glyphicon').on('click', function() {
            $(this).toggleClass('glyphicon-eye-close').toggleClass('glyphicon-eye-open'); // toggle our classes for the eye icon
            $('#pwd').togglePassword(); // activate the hideShowPassword plugin
          });
                }

</script>

