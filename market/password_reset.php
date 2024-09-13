<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pump price</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"> 
    <link href="../css/login.css" rel="stylesheet" type="text/css" media="screen">
    
    <script type="text/javascript" src="../js/jquery.js"></script>
</head>
<body>
 
           
        <div class="nav">
            <div class="logo"> 
                    <a class="infor" href="../index.php">
                        <img src="../icons/pumprice-icon-3.png">
                    </a>
            </div>
        </div>
    <section class="container-fluid bg"> 
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">

            <form name="register" class="form-container" action="../functions/Helper.php" method="POST">
                
                <div class="form-group">
                    <h5 class="form-group">Reset Password</h5>
                    
                    <label for="InputEmail">Email address</label>
                    <input type="email"class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="<?php echo $_SESSION["Email"]  ?>" name="email" disabled>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password1">
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" id="InputPassword2" placeholder="Confirm password" name="password2">
                </div>
                <div class="form-group form-check"> 
                   <label class="form-text-2"  >Already a user ?  <a class="infor" href="./login.php"> Login</a> </label>
                </div> 
                <div class="form-group">
                    <h6 class="form-group" id="login-error"><small></small></h6>
                    
                </div>
                <button type="button" id="reset_password" class="btn btn-primary btn-block" name="reset_password">Submit</button>
                 
            </form> 
            </section>
        </section>
    </section>
     <!-- Button trigger modal -->
  <button type="button" id="message_model" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Successful</h5> 
        </div>
        <div class="modal-body">
        Password reset successful<br>Please login.
        </div>
        <div class="modal-footer"> 
          <button type="button" id="btn_message_model" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div> 
    <script>
        $(document).ready(function(){
            let message= document.querySelector("#message_model");
            message.style.display='none';
            let error="";
            $("#reset_password").on('click',function(){
                let email= "<?php echo $_SESSION["Email"]  ?>";
                let password=$("#InputPassword").val();
                let con_password=$("#InputPassword2").val();
                 
                if(email==""|| email==null){
                    error="Provide email address";
                }else if(password=="" || password==null){
                    error="Enter new password";
                }else if(password.length<2){
                    error="Password is too short";
                }else if(con_password=="" || con_password==null){
                    error="Confirm password";
                }else if(password !=con_password){
                    error="Password mismatch";
                }

                if(error!=""){
                    $("#login-error").html(error);
                    error="";
                }else{
                    $.ajax({
                            url:'../functions/Helper.php',
                            method:'POST',
                            data:{
                                reset_password:1,
                                userid:"<?php echo $_SESSION["UserId"] ?>",
                                email:email,
                                password:password
                            },
                            success:function(response){
                                if(response.indexOf('success')<0){
                                    $("#login-error").html(response);
                                }

                                if(response.indexOf('success')>=0){
                                    "<?php session_destroy(); ?>";
                                  //  alert("Password reset successful");
                                    $("#btn_message_model").trigger('click');
                                }
                            },
                            dataType:'text'
                    });
                }
            });
            $("#btn_message_model").on('click',function () {
                window.location="./login.php";
        });
        });
    </script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/54be263888.js" crossorigin="anonymous"></script>
</body>
</html>