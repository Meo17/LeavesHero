  
            <!-- Subscription Modal -->
        <div id="myModalSubscribe" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Subscription Form</h4>
                  </div>
                  <div class="modal-body">
                     <p id="message"></p>
                  <input type="hidden" id="uploadkey">
                  <form >
                 
                      <div class="container" style="width:288px; float: left">
                      <div class="form-group">
                        <input type="text" class="input-style3" id="subscibername" name="subname"placeholder="Subscriber's Name"required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="input-style3" id="companyname"name="companyname" placeholder="Company Name"required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="input-style3" id="owner" name="owner" placeholder="Owner"required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-style3" id="branch" name="branch"placeholder="Branch"required>
                    </div>
                  </div>
                  <div class="container" style="width: 280px; float: right;">
                       <div class="form-group">
                        <input type="text" class="input-style3" id="address"placeholder="Address" required>
                     </div>
                    <div class="form-group">
                        <input type="text" class="input-style3" id="contactno"  placeholder="Contact Number"required >
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-style3"  id="emailaddress" placeholder="Email Address" required >
                          <span class="highlight"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="input-style3 " id="registrationno" placeholder="Company Registration Number" required>
                    </div>

                   <div class="form-group">
                            <select id="typecompany" class="input-style3 " style="height: 38px;width: 300px;margin-left:-200px;float: left"required>
                                <option disabled selected>Type of Company</option>
                                <option>Public</option>
                                <option >Private</option>
                            </select>
                    </div>   
                     <div class="form-group hidden">
                    </div>  
                   

  
                  </div>
                  <div class="container" style=" width: 180px; float: left;padding-left: 190px; background-color: #fefefe;margin-top: 40px">
                    <div class="form-group">
                      <div class="container" style="width: 590px;margin-left:-205px;margin-top: 30px">
                        <h5 style="text-align: center; margin-top: -10px">Add atleast 3 Legal Business <br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Documents</h5>
                      </div>
                      <div class="container"  style="height: 50px; width: 350px; background-color: #e6e6e6;margin-left: -70px;margin-top: 20px">
                        <img src="" id="profile-img-tag" width="200px" class="row"  style="margin-left: 20px;width: 10px;float: right;" />
                         <input  type="file"id="supportDocs1"    style="padding-top: 15px;margin-left:-5px" required multiple >
  
                      </div>
                      
                     
                       <div class="container" style="padding-left: 210px;width: 200px;height: 50px;margin-top: 30px">
                          <button type ="submit"class="btn btn-leave btn-hover-white" id="subscribe" style="font-size: 10px;width: 150px;margin-right:100px">Subscribe Now</button>
                      </div>
                    </div>
                    </div>
                   </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                
              </div>
            </form>
           </div>
        </div>
      </div>
      

            <!-- Subscription Modal -->
        <div id="sendfeed" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Feedback Form</b></h4>
                  </div>
                  <div class="modal-body" style="height: 280px;">
                     <p id="message"></p>
                  
                  <form  method="POST">
                 
                      <div class="container" style="width:288px; float: left;">
                         <h4 class="modal-title"><b>Your Feedback </b></h4><br>
                      <div class="form-group">
                        <textarea class="form-control" rows="5"  placeholder="Your Feedback and Suggestion" name="feedbacksugggest"style="align-content:center;overflow:auto;width: 540px">
                          

                        </textarea> 
                        <input type="hidden" name="customeremail" value="leaveshero@gmail.com">
                      </div>

                      
                     
                   <div class="container" style="padding-left: 210px;width: 200px;height: 50px;margin-top: 30px">
                    <button type="submit" class="btn btn-leave " name="feedback" style="font-size: 10px;width: 150px;margin-right:100px"><i class="glyphicon glyphicon-send"style="margin-right: 20px"></i>Send</button>
                      </div>
                    </div>
                   </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                
              </div>
           </div>
        </div>
