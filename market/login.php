<?php
   
  session_start();
  if(isset($_SESSION["LoggedIn"])){
      $user_type=$_SESSION["UserType"];
      if($user_type==0){
          header("Location:./price.php");
      }else if($user_type>0){
          header("Location:./dashboard.php");
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">  
    <link href="../css/login.css" rel="stylesheet" type="text/css" media="screen"> 
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico"> 
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
        <header id="showcase">
         <div class="content">
         <form name="login-fm" class="form-container"   method="POST" > 
                            <h5 class="form-group">Please Login</h5>
                        <div class="form-group">
                            <label for="InputEmail">Email address</label>
                            <input type="email"class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="enter email" name="email">
                             <small id="emailHelp" class="form-text text-muted"> Your email won't be made public.</small> 
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Password</label>
                            <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password">
                        </div>
                        <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="check">
                        <label class="form-check-label" for="check">Remember me</label>
                        </div>
                        <div class="form-group">
                            <p class="form-group"><a href="forgetpassword.php" class="infor">Forgot password ?</a> </p>
                        </div>
                        <div class="form-group">
                            <h6 class="form-group" id="login-error"><small>
                                  
                        </small></h6> 
                        </div>
                        <button type="button" class="btn btn-primary btn-block" id="login" name="login">Login</button>
                        <div class="form-group">
                            <label class="form-text-2">Not a user ?<a href="./user_registration.php" class="infor"> Register</a> </label>
                        </div>
                    </form> 
         
         </div> 
        </header>
          
    <script>
     $(document).ready(function(){ 
        var error=""; 
           
        $("#login").on('click',function(){
                var email=$("#InputEmail").val();
                var password=$("#InputPassword").val();
                let regex = new RegExp('[a-z0-9]+@[a-z]+[.]+[a-z]{2,3}');
                email =email.toLowerCase();
                if(email=="" || email==null){
                    error="Enter email address";
                }else if(!regex.test(email)){
                    error="Invalid email format";
                }else if(password=="" || password ==null){
                    error="Enter password";
                }

                if(error !=""){
                    $("#login-error").html(error);
                    error="";
                }else{ 
                    $.ajax({url:'../functions/Helper.php',
                        method:'POST',
                        data:{login:1,email:email,password:password }, 
                        success:function(response){  
                             if(response.Regid==0){  
                                 window.location="./pumpprice.php";
                             }else if(response.Regid>0){
                                 window.location="./dashboard.php"; 
                             }else{
                                $("#login-error").html(response.Error); 
                             }  
                        },
                        dataType:'json'
                    });
                } 
            });
      
        $("#InputEmail").on('keydown',function(){ 
                $("#login-error").html(error);
            });
            
            $("#InputPassword").on('keydown',function(){ 
                $("#login-error").html(error);
            });
         $("#InputPassword").keypress(function(e){ 
             if(e.which==13){ 
             $("#login").trigger('click');
             }
          });
          
          $("#InputEmail").keypress(function(e){
          if(e.which==13){
            $("#login").trigger('click');
          }
          }) 
     }); 
     
    </script>
    
    <script src="../js/bootstrap.min.js"></script>
    
</body>
</html>