<?php
include_once("../functions/infor.php"); 
include_once("../functions/market_infor.php"); 
session_start();


if(!isset($_SESSION["UserType"])){
    header("Location:./login.php");
}
 
?>


<?php 

 function add_product($data){ 
        ?>  
            <?php
            if($data["Website"] !="none" && $data["Website"] !=null ){
            ?>
              <h5 class="heading details" id="businessName"> <a href="<?php echo $data["Website"] ?>" target="_blank" class="heading heading-link" > 
            <i class="fa fa-building-o biz-infor" aria-hidden="true"></i>  <?php echo $data["BusinessName"]; ?></a></h5>
             <?php
            }else{
             ?>
            <h5 class="heading details heading-link" id="businessName"> 
            <i class="fa fa-building-o biz-infor" aria-hidden="true"></i>  <?php echo $data["BusinessName"]; ?></h5>
             <?php
            }
            
            
            
            ?> </h5>
            <table class="table table-hover">
                            <thead >
                            <tr> 
                                
                            </tr>
                            </thead>
                            <tbody  id="<?php $data["BusinessName"] ?>"> 
                            <?php 
                             
                                ?> 
                                <tr > 
                                <td ><?php echo $data["Name"]; ?> </td>
                                <td  ><?php echo $data["Symbol"] ;?></td>
                                <td><?php echo $data["Cost"]; ?></td> 
                                <td  > 
                                <?php  if( $data["Status"]=="Available"){  
                                      ?>      
                                       <i class="fa fa-circle available" aria-hidden="true"> <?php echo $data["Status"]; ?>
                                </i>
                                       <?php
                                }else{
                                    ?>      
                                        <i class="fa fa-circle not" aria-hidden="true"> <?php echo $data["Status"]; ?>
                                    <?php
                                } ?>
                                </td>
                               </tr>
                               <?php
                             
                          ?>
                           </tbody>
                      </table> 
                       <h6 class="address details"> <i class="fa fa-map-marker biz-infor" aria-hidden="true"></i> <?php echo $data["Address"]; ?></h6> 
                      <h6 class="contact details"><i class="fa fa-phone biz-infor" aria-hidden="true"></i> <?php echo $data["Contact"]; ?> <i class="fa fa-product-hunt biz-infor" aria-hidden="true"></i> <?php echo $data["State"]; ?> <?php echo " "?> <?php echo $data["City"]; ?>  </h6> 
                      <?php
                       if($data["Website"] !="none" && $data["Website"] !=null ){
                       ?>
                        <h5 class="address details"><a class="link" href="<?php echo $data["Website"]; ?>" target="_blank" > <i class="fa fa-link" aria-hidden="true"></i> <?php echo $data["Website"]; ?> </a></h5>
                        
                        <?php
                       }
                       ?>
                      <hr>
                      <!-- <div class="contact-infor">  
                      <hr>
                      </div>  -->
                 
        <?php

 
 }
  
  

?>
<!DOCTYPE html>
<html lang="en">
<?php  include_once("./pumpprice_head.php")?> 
<body>
<div class="container-wrapper">
    <div class="tophead">
        <div class="logo-infor">
             <a class="logo" href="./pumpprice.php"><img src="../icons/pumprice-icon-3.png"> </a> 
        </div>  
         <nav>
                <ul class="list-items">
                    <li class="item">
                    <a class="item-link active" href="./pumpprice.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Market</a>
                    </li>
                    <li class="item">
                    <a class="item-link" href="./news.php"><i class="fa fa-bullhorn" aria-hidden="true"></i> News</a>
                    </li> 
                </ul>
             </nav>
             <div class="search">
             <input type="text" id="searchtext" class="searchtext" placeholder="search" ><button class="btn-search" id="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
             </div>
             
             <a class="logout" href="../index.php"><button id="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button></a>
             
    </div> 
</div>
<div class="contentmain"> 
    <div class="left-panel">
      
        <div class="search-panel"> 
                     <input type="text" id="station-searchtext" class="searchtext" placeholder="search gas station" spellcheck="false">
                   <a class="button">  <i class="fa fa-search" aria-hidden="true"></i></a>
                      <hr class="separator">
        </div>
         <div class="search-container">
                <div class="search-result" id="search-result">
                    <!-- <div class="result-item">
                        <h3><button class="button-result">companyname <br><h5>addrss</h5></button></h3>   
                    </div>  -->
                 
                </div>  
        
            </div>
    </div>
    <div class="right-panel">
        <div class="content-infor"> 
        <div class="card products">
            <div class="card-body">
            <p class="heading-text">
           <a class="back-button" href="./pumpprice.php"> <i class="fa fa-arrow-circle-left back" aria-hidden="true"></i> </a> <?php echo $SearchHeading; ?>  
            </p> 
         <?php 
           if($_SESSION["search_product"]){
           
            $business=search_product($_SESSION["search_product"]); 
            if($business !=null){  
            foreach($business as $name){  
                 if($name !=null){
                    echo add_product($name);  
                }
             }
         }
          
        }
          
         ?>         
         
        </div>
        </div>
        </div>
        <div class="watch-panel">
        <div class="watchheading">
        <Label class="listhead">Watch list </Label>
        <button class="btn-search" id="btn-watchlist"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
        </div>
        </div>
    </div>
   
</div>

<?php  include_once("./footer.php")?> 
 <script type="text/javascript">
  
 </script>



</body>
</html>
