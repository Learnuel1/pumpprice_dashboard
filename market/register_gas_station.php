<?php
include_once("../functions/infor.php");
session_start();
?>
<!DOCTYPE html>
<head>
  
<link href="../css/login.css" rel="stylesheet" type="text/css" media="screen"> 
<script src="https://kit.fontawesome.com/54be263888.js" crossorigin="anonymous"></script>
<?php include("./contacthead.php")?> 
<link href="../css/landingpage.css" rel="stylesheet" type="text/css" media="screen">
<link href="../css/register_station.css" rel="stylesheet" type="text/css" media="screen"> 
</head>
   
<body>
 
  <div class="container-fluid">
  <?php include("./defaultnav.php")?> 
    <section class="landing-page">
              <div class="header"> 
                <div class="img-wrapper">   
                  <img src="../images/user_reg.jpg">
                </div>
             </div> 
            <div class="box-1">
                <div class="container">    
                       <div class="contact-wrapper">
                              <div class="registration-left">
                        
                                </div>
                          <div class="contact-right">
                              <h2 class="contact-heading">Register</h2>
                                <div id="registration-error">
                                
                                </div>
                                <form name="reg-form" class="form-control" action="../functions/Functions.php" method="POST" onsubmit="return form_validation()">
                                  <div class="input-group">
                                    <input type="text"id="businessname"  class="field" name="businessname">
                                    <label class="input-lable">Business name</label>
                                  </div>
                                  <div class="input-group"> 
                                    <input type="text"  id="cacnumber" class="field" name="cacnumber">
                                    <label class="input-lable">CAC Number</label>
                                  </div>
                                  <div class="input-group">
                                    <input type="email"id="email"  class="field" name="email">
                                    <label class="input-lable">E-mail</label>
                                  </div>
                                 
                                  <div class="input-group"> 
                                    <input type="text"id="state"  class="field" name="state">
                                    <label class="input-lable">State</label>
                                  </div>
                                  <div class="input-group"> 
                                    <input type="text"id="city"  class="field" name="city">
                                    <label class="input-lable">City</label>
                                  </div>
                                  <div class="input-group"> 
                                    <input type="number"id="businesscontact"  class="field" name="businesscontact">
                                    <label class="input-lable">Business contact</label>
                                  </div> 
                                  <div class="input-group"> 
                                    <input type="text"id="address"  class="field" name="address">
                                    <label class="input-lable">Address</label>
                                  </div> 
                                  <input type="button" id="register" class="submit-btn" value="Submit"name="register">
                                </form>
                              </div>
                        </div>
   
                </div>
            </div>
    </section>
<?php include("./footer.php")?> 
<?php include("./registration_completion.php")?> 
<?php include("./registration_successful.php")?> 

<script type="text/javascript">

$(document).ready(function(){
    //hide modal trigger button
    let completeReg= document.querySelector("#btn_complete_reg_model");
    let completeSuc= document.querySelector("#btn_notify_model");
    
   completeReg.style.display='none';
   completeSuc.style.display='none';
    
    $("#register").on('click',function(){
      let error=""; 
      $("#registration-error").html(error)
      let businessname=$("#businessname").val();
  let cacnumber=$("#cacnumber").val();
  let email=$("#email").val();
  let state=$("#state").val();
  let city=$("#city").val();
  let businesscontact=$("#businesscontact").val();
  let address=$("#address").val();
 
  
  let regex = new RegExp('[a-z0-9]+@[a-z]+[.]+[a-z]{2,3}');
                   
  if(businessname =="" || businessname==null){
    error="Business name is required";
  }else if(cacnumber=="" || cacnumber==null){
    error="CAC number is required";
  }else if(email=="" || email==null){
    error="Email address is required";
  }else if(!regex.test(email)){
      error="Invalid email format";
  }
  else if(state=="" || state==null){
    error="State is required";
  }else if(city=="" || city==null){
    error="City of business is required";
  }else if(businesscontact ==""|| businesscontact==null){
    error="Contact is required";
  }else if(businesscontact.length<11){
      error="Invalid contact";
  }
  else if(address=="" || address==null){
    error="Business address is required";
  }

  if(error !=""){
            $("#registration-error").html(error) ; 
            error="";
  }else{
    $("#registration-error").html(error) ; 
    console.log("clicked")
    //use the imported modal to complete the registration
    $("#btn_complete_reg_model").trigger('click');
  
  } 
    });
    
   $("#user_register").click(function(){
    let error="";
    let password=$("#InputPassword").val();
        let con_password=$("#InputPassword2").val();  
         if(password =="" || password==null){
            error="Password is required";
        } else if(password.length<2){
            error="Password is too short";
        }else if(con_password =="" || con_password==null){
            error="Confirm password"
        }else if(password !=con_password){
            error="Password mismatch";
        } 
  let businessname=$("#businessname").val();
  let cacnumber=$("#cacnumber").val();
  let email=$("#email").val();
  let state=$("#state").val();
  let city=$("#city").val();
  let businesscontact=$("#businesscontact").val();
  let address=$("#address").val();
  let website=$("#webaddress").val();
  
  if(website ==="" || website===null){
  website="none";
  }
        if(error !=""){
            $("#login-error").html(error) ; 
            error="";
        }else{
          $("#login-error").html(error) ; 
          
          $.ajax({
            url:'../functions/Helper.php',
            method:'POST',
            data:{
                register:1,
                businessname: businessname,
                cacnumber:cacnumber, 
                email: email,
                state:state,
                city:city,
                businesscontact:businesscontact,
                address:address,
                password:password,
                website:website
              }, 
            success:function(response){ 
              if(response.indexOf('success')<0){
                $("#registration-error").html(response) ; 
                $("#login-error").html(response) ; 
               }

              if(response.indexOf('success')>=0){
              $("#btn_notify_model").trigger('click');
                  
                 } 
            },
            dataType:'text'
    });
        }
   
   }); 
  $("#btn-close").click(function(){
    $("#login-error").html("")
  });
  
  $("#btn_notification_OK").click(function(){ 
    window.location="../market/login.php";
  });
});

</script>
</body>
</html>
