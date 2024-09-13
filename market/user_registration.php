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
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico"> 
    <script type="text/javascript" src="../js/jquery.js"></script>
    <link href="../icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" > 
     <link href="../icons/linea-icons/linea.css" rel="stylesheet" > 
     <link href="../icons/material-design-iconic-font/css/materialdesignicons.min.css" rel="stylesheet" >  
</head>
<body> 
        <div class="nav">
            <div class="logo"> 
                    <a class="infor" href="../index.php">
                        <img src="../icons/pumprice-icon-3.png">
                    </a>
            </div>
        </div>
        <header id="showcase-2">
        <div class="content">
        <form name="register" class="form-container" action="../functions/Helper.php" method="POST">
                
                <div class="form-group">
                    <h5 class="form-group">Registration</h5>
                    
                    <label for="InputEmail">Email address</label>
                    <input type="email"class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
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
                <button type="button" id="user_register" class="btn btn-primary btn-block" name="user_register">Submit</button>
                 
            </form> 
        
        </div>
        </header>
        
          
    
  <!-- Button trigger modal -->
  <button type="button" id="message_model" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Registration successful</h5> 
        </div>
        <div class="modal-body">
          Registration completed successfully<br>Please login.
        </div>
        <div class="modal-footer"> 
          <button type="button" id="btn_message_model" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div> 
  
    <script type="text/javascript"> 
        $(document).ready(function(){
            let message= document.querySelector("#message_model");
            message.style.display='none';
            let error="";
           $("#user_register").on('click',function(){ 
                let email=$("#InputEmail").val();
                let password=$("#InputPassword").val();
                let con_password=$("#InputPassword2").val();
                let regex = new RegExp('[a-z0-9]+@[a-z]+[.]+[a-z]{2,3}');//validate email
                if(email =="" || email==null){
                    error="Email is required";
                }else if(!regex.test(email)){
                        error="invalid email format";
                } else if(password =="" || password==null){
                    error="Password is required";
                } else if(password.length<2){
                    error="Password is too short";
                }else if(con_password =="" || con_password==null){
                    error="Confirm password"
                }else if(password !=con_password){
                    error="Password mismatch";
                } 

                if(error !=""){
                    $("#login-error").html(error) ; 
                    error="";
                    
                }else{
                    //connect to php
                    $.ajax({
                            url:'../functions/Helper.php',
                            method:'POST',
                            data:{
                                user_register:1,
                                email: email,
                                password: password
                            },
                            success:function(response){
                                if(response.indexOf('success')<0){
                                  $("#login-error").html(response) ;
                                }
                                  if(response.indexOf('success')>=0){
                                      $("#message_model").trigger('click'); 
                                  }
                            },
                            dataType: 'text'
                    });
                }
           }) ;
           $("#InputEmail").on('keydown',function () { 
                $("#login-error").html(error) ;
                 
             });
             $("#InputPassword").on('keydown',function () { 
                $("#login-error").html(error) ;
                 
             });
             $("#InputPassword2").on('keydown',function () { 
                $("#login-error").html(error) ;
                 
             });

        $("#btn_message_model").on('click',function(){
            window.location="login.php";
        });
        });
    </script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com 54be263888.js" crossorigin="anonymous"></script>
</body>
</html>

