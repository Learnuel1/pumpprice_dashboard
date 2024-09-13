<?php
 include_once("../functions/infor.php"); 
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
                  <img src="../images/flower.jpg">
                </div>
             </div> 
            <div class="box-1">
                <div class="container">   
                    <section class="contact">
                       <div class="contact-wrapper">
                              <div class="about-left">
                        
                                </div>
                          <div class="contact-right">
                              <h2 class="contact-heading">About</h2>
                              <p class="about-text">
                                <?php echo $About; ?>
                                </p>
                                 
                              </div>
                        </div>
                    </section>
              </div>
          </div> 
  </div>
  <?php include("./footer.php")?> 

  <script>
    $(document).ready(function(){
      $("#get-started").on('click',function(){
        window.location="../market/registration.php";
      });
    });
  </script>
      <script src="../js/bootstrap.min.js"></script>
</body>
</html>