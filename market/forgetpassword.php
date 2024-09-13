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

                <form class="form-container"  method="POST">
                    <h5 class="form-group">Find Account</h5>
                    <div class="form-group">
                        <label for="InputEmail">Email address</label>
                        <input type="email"class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email address"> 
                        <small id="emailHelp" class="form-text text-muted">The email that was used to sign up.</small>
                    </div>  
                    <div class="form-group">
                        <p class="form-group"><a href="./login.php" class="infor">Login</a> </p>
                    </div>
                    <div class="form-group">
                        <h6 class="form-group" id="login-error"><small></small></h6> 
                    </div>
                    <button type="button" id="forget_password" class="btn btn-primary btn-block" name="forget_password">Submit</button>
                    
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
          <h5 class="modal-title" id="staticBackdropLabel">Email sent successfully</h5> 
        </div>
        <div class="modal-body">
          Please check email inbox to get new login details.
        </div>
        <div class="modal-footer"> 
          <button type="button" id="btn_message_model" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div> 

    <script type="text/javascript">
        $(document).ready(function(){
           var message= document.querySelector("#message_model");
            message.style.display='none';
            var error="";
            $("#InputEmail").on('keydown',function(){
                $("#login-error").html(error);
             });
            $("#forget_password").on('click',function(){
                var email=$("#InputEmail").val();
               
                let regex = new RegExp('[a-z0-9]+@[a-z]+[.]+[a-z]{2,3}');//validate email
                if(email==""|| email==null){
                    error="Provide email address";
                }else if(!regex.test(email)){
                    error="invalid email format";
                }

                if(error !=""){
                    $("#login-error").html(error);
                    error="";
                }else{
                    $.ajax({
                            url:'../functions/Helper.php',
                            method:'POST',
                            data:{
                                forget_password:1,
                                email:email
                            },

                            success:function(response){ 
                                    //if ordinary user show reset password page
                                    if(response.Regid=="" || response.Regid== null){
                                        //show reset password page
                                        window.location='./password_reset.php';
                                    }else if(response.Regid>0){
                                        //else email the business user
                                        //show model message
                                        $("#message_model").trigger('click'); 
                                        
                                    }else{
                                        $("#login-error").html(response.Error);
                                    } 
                            },
                            dataType:'json'
                    });
                }
            });
            $("#btn_message_model").on('click',function(){
                window.location="../index.php";
        });
        $("#InputEmail").keypress(function (e) {  
            if(e.which==13){
            $("#forget_password").trigger('click');
            }
        });
        });
    </script>
    <script src="../js/bootstrap.min.js"></script>
    
</body>
</html>