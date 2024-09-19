<?php
 include_once("../functions/infor.php"); 
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./contacthead.php")?> 

<body>
<div class="container-fluid">
<?php include("./defaultnav.php")?> 
    <section class="landing-page">
              <div class="header"> 
                <div class="img-wrapper">   
                  <img src="../images/back1.jpg">
                </div>
             </div> 
            <div class="box-1">
                <div class="container">   
                    <section class="contact">
                       <div class="contact-wrapper">
                              <div class="registration-left">
                        
                                </div>
                          <div class="contact-right">
                              <h2 class="contact-heading">Contact</h2>
                                <div id="registration-error">
                                
                                </div>
                                <form class="form-control" action="../functions/Helper.php" method="POST">
                                  <div class="input-group">
                                    <input type="text" id="fullname" require class="field">
                                    <label class="input-lable">Fullname</label>
                                  </div>
                                  <div class="input-group">
                                    <input type="email" id="email" class="field">
                                    <label class="input-lable">E-mail</label>
                                  </div>
                                  <div class="input-group">
                                    <textarea class="field" id="message" name="message" ></textarea>
                                    <label for="message">Message</label>
                                  </div>
                                   <button type="button" id="submit_contact" class="submit_contact" name="submit_contact">Submit</button> 
                                 
                                </form>
                              </div>
                        </div>
                    </section>
              </div>
          </div>
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
          Message sent successfully.
        </div>
        <div class="modal-footer"> 
          <button type="button" id="btn_message_model" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div>  
  </div>
  <?php include("./footer.php")?> 
 

  <script>
    $(document).ready(function(){
      var message= document.querySelector("#message_model");
            message.style.display='none';
      $("#submit_contact").on('click',function(){
        var fullname=$("#fullname").val();
        var email=$("#email").val();
        var message=$("#message").val();
        var error="";

        if(fullname =="" || fullname==null){
          error="Fullname is required";
        }else if(email=="" || email==null){
          error=" Provide email address";
        }else if(message=="" || message==null){
          error="Type your message";
        }
         
        if(error !="" ){
          $("#registration-error").html(error);
        }else{
          
            $.ajax({
                url:'../functions/Helper.php', 
                method:'POST',
                data:{
                  submit_contact:1,
                    fullname:fullname,
                    email:email,
                    message:message
                },
               
                success:function(response){
                  if(response.indexOf('success')<0){
                     $("#registration-error").html(response) ;
                      }
                  if(response.indexOf('success')>=0){
                    $("#message_model").trigger('click'); 
                  }
                },
                dataType:'text'
            });
        }
      });
      $("#btn_message_model").on('click',function () {
        window.location="../index.php";
        });
    });
  </script>
      <script src="../js/bootstrap.min.js"></script>
</body>
</html>