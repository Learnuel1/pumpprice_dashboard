<?php
 include_once("./functions/infor.php"); 
 include_once("./functions/loadindex_file.php"); 

session_start();
   if(isset($_SESSION["LoggedIn"])){
     unset($_SESSION["UserType"]);
     unset($_SESSION["LoggedIn"]);
     session_destroy();
    }

?>

<?php 

 function add_product($data,$bizinfor){ 
        ?> 
         <div class="card products" id="<?php $bizinfor["Regid"] ?> ">
            <div class="card-body"> 
            
            <?php
                       if($bizinfor["Website"] !="none" && $bizinfor["Website"] !=null ){
                       ?>
                       <h5 class="heading details bizName" data="<?php echo $bizinfor["Name"]; ?>" id="<?php echo $bizinfor["Name"]; ?>">   
                       <i class="fa fa-building-o biz-infor" aria-hidden="true"></i>  <?php echo $bizinfor["Name"]; ?></h5>
                        <?php
                       }else{
                        ?>
                       <h5 class="heading details bizName" data="<?php echo $bizinfor["Name"]; ?>" id="<?php echo $bizinfor["Name"]; ?>"  > 
                       <i class="fa fa-building-o biz-infor" aria-hidden="true"></i>  <?php echo $bizinfor["Name"]; ?></h5>
                        <?php
                       }
                       ?>  
            </h5>

            <table class="table">
                            <thead >
                            <tr> 
                                <th scope="row">Product</th>
                                <th scope="row">Sym</th>
                                <th scope="row">Price</th> 
                                <!-- <th scope="row">Date</th>
                                <th scope="row">Time</th> -->
                                <th scope="row">Status</th>
                                
                            </tr>
                            </thead>
                            <tbody  id="<?php $bizinfor["Regid"] ?>"> 
                            <?php 
                            foreach($data as $details){
                                ?> 
                                <tr data-href="<?php echo $details["Name"]; ?>"> 
                                <td ><?php echo $details["Name"]; ?> </td>
                                <td  ><?php echo $details["Symbol"] ;?></td>
                                <td><?php echo $details["Cost"]; ?></td> 
                                <td  > 
                                <?php  if( $details["Status"]=="Available"){  
                                      ?>      
                                       <i class="fa fa-circle available" aria-hidden="true"> <?php echo $details["Status"]; ?>
                                </i>
                                       <?php
                                }else{
                                    ?>      
                                        <i class="fa fa-circle not" aria-hidden="true"> <?php echo $details["Status"]; ?>
                                    <?php
                                } ?>
                                </td>
                               </tr>
                               <?php
                            }
                          ?>
                           </tbody>
                      </table>
                      <h5 class="address details"> <i class="fa fa-map-marker biz-infor" aria-hidden="true"></i> <?php echo $bizinfor["Address"]; ?></h5> 
                      <h5 class="contact details"><i class="fa fa-phone biz-infor" aria-hidden="true"></i> <?php echo $bizinfor["Contact"]; ?> <i class="fa fa-product-hunt biz-infor" aria-hidden="true"></i> <?php echo $bizinfor["State"]; ?> <?php echo " "?> <?php echo $bizinfor["City"]; ?>  </h5>
                      <?php
                       if($bizinfor["Website"] !="none" && $bizinfor["Website"] !=null ){
                       ?>
                        <h5 class="address details"><a class="link" href="<?php echo $bizinfor["Website"]; ?>" target="_blank" > <i class="fa fa-link biz-infor" aria-hidden="true"></i> <?php echo $bizinfor["Website"]; ?> </a></h5>
                        
                        <?php
                       }
                       ?>
                      <div class="contact-infor">  
                      </div>
                      
                </div>
            </div> 
        <?php
 }
  
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>pumpprice</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet" > 
    <link href="./css/bootstrap.min.css" rel="stylesheet" > 
    <link href="./css/landing.css" rel="stylesheet" type="text/css" media="screen">
     <link href="./icons/material-design-iconic-font/css/materialdesignicons.min.css" rel="stylesheet" >  
     
    <link href="./css/landingpage.css" rel="stylesheet" type="text/css" media="screen">
     <link href="./css/landingsection.css" rel="stylesheet" type="text/css" media="screen">
     <script src="https://kit.fontawesome.com/54be263888.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="./icons/favicon.ico">  
    <script type="text/javascript" src="./js/jquery.js"></script>
   
    <link href="./icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" > 

</head>
<body>
 <div class="container-fluid">  
        <div class="menue">
            <ul class="nav"> 
              <a class="logo" href="./index.php"><img src="./icons/pumprice-icon-3.png"> </a>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li> 
                    <li class="nav-item">
                      <a class="nav-link " href="./market/pumpprice.php">Market</a>
                    </li> 
                      <a class="nav-link " href="./market/contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="./market/about.php">About</a>
                    </li>
                </li> 
                <li class="nav-item">
                      <a class="nav-link " href="./market/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="./market/user_registration.php">Register</a>
                    </li> 
            </ul>   
  </div>
 
  <section id="landingpage">
                  <div class="header"> 
                      <div class="img-wrapper">   
                        <img src="./images/new_bk.png">
                      </div>
                  </div> 
      <div class="row">
      <div class="col-md-7">
      <h1 class="text-left-header">Petroleum Dashboard</h1>
          <p class="text-left"> 
          Register your gas station for easy price display for customers.
          This can increase your sales to a great extent.  
          And know when there is change in prices, to check for affordable pump Prices
          of different stations.
          </p> 
     
      <div class="jumbotron"> 
      <input type="button" id="get-started" class="btn-1" name="get-started" value="Get Started" >   
        </div> 
</div>
    </div> 
</section>
 
 <?php include_once("./market/footer.php");?>
 
    </div>   
  <script>
    $(document).ready(function(){
      $("#get-started").on('click', function(){
        window.location="./market/register_gas_station.php";
      });
    });
  </script>
      <script src="./js/bootstrap.min.js"></script>
</body>
</html>