<?php

session_start();

include_once("./market_infor.php");  

 if(isset($_GET["search_product"])){  
     $product=$_GET["product"];  
       echo json_encode(search_product($product));
     
    $_SESSION["search_product"]=$product;
 }

?>