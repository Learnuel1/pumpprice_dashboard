<!--COMPLETE MODAL -->
  <!-- Button trigger modal -->
  <button type="button" id="btn_complete_reg_model" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Complete Registration</h4> 
          <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="form-group1">  
        <div class="form-group">
                    
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password1">
                </div>
                <div class="form-group">
                    <label for="InputPassword">Confirm</label>
                    <input type="password" class="form-control" id="InputPassword2" placeholder="Confirm password" name="password2">
                </div>
                <div class="form-group">
                    <label for="InputWebaddress">Website <span>(optional)</span></label>
                    <input type="text" class="form-control" id="webaddress" placeholder="website" name="website">
                </div>
                <div class="form-group form-check"> 
                   <label class="form-text-2"  >Already a user ?  <a class="infor" href="./login.php"> Login</a> </label>
                </div>
                 
                <div class="form-group">
                    <h6 class="form-group" id="login-error"><small></small></h6>
                    
                </div>
                <button type="button" id="user_register" class="btn btn-primary btn-block" name="user_register">Submit</button>
              
        </div>
        
      </div>
      </div>
    </div>
  </div> 
  </div>