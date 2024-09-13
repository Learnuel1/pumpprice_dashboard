<?php
session_start();

include_once("../Config/Database.php"); 
include_once("./Userlogin.php");
include_once("./Product.php");  
 
$db= new Database();
   
//Register user
 if(isset($_POST["user_register"])){  
    $email=$db->conn->real_escape_string($_POST["email"]);
    $password=$db->conn->real_escape_string($_POST["password"]);  
    
    $user = new Userlogin();
    if($user->user_exist($email,$db->conn)){
      exit('user already exist');
    }else{ 
      //send data to database
        $user->register_user($email, md5($password),$db->conn);
      if($user->Error_log==null){
         echo('success');
      }else{
            echo ($user->Error_log);
      }
    }
    
}
//register gas station
if (isset($_POST["register"])){
   try{
   $businessname=$db->conn->real_escape_string( $_POST["businessname"]);
   $cacnumber=$db->conn->real_escape_string( $_POST["cacnumber"]);
   $email=$db->conn->real_escape_string( $_POST["email"]);
   $state=$db->conn->real_escape_string( $_POST["state"]);
   $city=$db->conn->real_escape_string( $_POST["city"]);
   $businesscontact=$db->conn->real_escape_string( $_POST["businesscontact"]);
   $address=$db->conn->real_escape_string( $_POST["address"]); 
   $password=$db->conn->real_escape_string( $_POST["password"]);
   $website=$db->conn->real_escape_string( $_POST["website"]); 
   
   $user = new Userlogin();
   if($user->business_exist($cacnumber,$db->conn)){
      throw new Exception("Business cac number already exist");
   }
    if($user->email_exist($email,$db->conn)) {
      throw new Exception("Email already exist");
   }
   else{
      $user->register_business($businessname,$cacnumber,strtolower($email),$state,$city,$businesscontact,$address, md5($password),strtolower($website),$db->conn);
      if($user->Error_log==null){
         exit('success');
      }else{
            exit($user->Error_log);
      }
   }
}catch (Exception $e) {
   exit($e->getMessage());
}
    
}
//Login user
if(isset($_POST["login"])){
   $email = $db->conn->real_escape_string( $_POST["email"]);
   $password = $db->conn->real_escape_string( $_POST["password"]);
   $user = new Userlogin();
   $data=[];
   $data= $user->login($email,md5($password),$db->conn);
   if($data=="0"){  
      echo (json_encode(array("Error"=>"incorrect email or password")));
   }else{ 
      
      if($data["Regid"]=="" || $data["Regid"]==null){
          $data["Regid"]="0";
       } 
       $_SESSION["LoggedIn"]=1;
       $_SESSION["Email"]=$data["Email"];
       $_SESSION["UserType"]=$data["Regid"];
      echo (json_encode($data));
      
   }
}
//contact page handler
if(isset($_POST["submit_contact"])){
   $fullname=$db->conn->real_escape_string( $_POST["fullname"]);
   $email=$db->conn->real_escape_string( $_POST["email"]);
   $message=$db->conn->real_escape_string( $_POST["message"]);  
   $user = new Userlogin();
    $user->user_make_contact($fullname,$email,$message,$db->conn);
  if($user->Error_log==null){
     exit('success');
  }else{
     exit($user->Error_log);
  }
}
 
//find user details for password reset
if(isset($_POST["forget_password"])){
   $email=$db->conn->real_escape_string( $_POST["email"]);
   $user = new Userlogin();
   $data =$user->find_user($email,$db->conn);
   if($data=="0"){ 
      echo json_encode(array("Error"=>"Email was not found"));
   }else{ 
       
      echo json_encode($data);
   }

}

//reset normal user password
if(isset($_POST["reset_password"])){
   $email=$db->conn->real_escape_string( $_POST["email"]);
   $userid=$db->conn->real_escape_string( $_POST["userid"]);
   $password=$db->conn->real_escape_string( $_POST["password"]);
   $user = new Userlogin();
   $user->reset_password($userid,$email,md5($password),$db->conn);
   if($user->Error_log==null){
      exit('success');
   }else{
      exit($user->Error_log);
   }
}

//add products 
if(isset($_POST["add_product"])){
   $name=$db->conn->real_escape_string( $_POST["product"]);
   $symbol=$db->conn->real_escape_string( $_POST["symbol"]);
   $status=$db->conn->real_escape_string( $_POST["status"]); 
   $price=$db->conn->real_escape_string( $_POST["price"]);  
   $usertype=$db->conn->real_escape_string( $_POST["usertype"]);
   $product = new Product();
   if($product->product_exist($name,$usertype,$db->conn)){
      echo json_encode(array("Error"=>"Product already exists"));
   }else if($product->symbol_exist($symbol,$usertype,$db->conn)){
      echo json_encode(array("Error"=>"Symbol exists for a product"));
   }else{
      //store product
      $product->save($name,$symbol,$status,$price,$usertype,$db->conn);
      if($product->Error_log==null){ 
         echo json_encode(array("Success"=>"success"));
      }else{ 
         echo json_encode(array("Error"=>$product->Error_log));
      }
   }
}
//load productsz
 if(isset($_POST["load_product"])){
    $usertype=$db->conn->real_escape_string( $_POST["userid"]);
   
    $product = new Product(); 
   $data= $product->get_product($usertype,$db->conn);
    if($product->Error_log==null){ 
          echo json_encode($data); 
   }else{ 
      echo json_encode(array("Error"=>$product->Error_log));
   }
}

if(isset($_POST["load_product_names"])){
   $usertype=$db->conn->real_escape_string( $_POST["userid"]);
   
   $product = new Product(); 
  $data= $product->get_product_names($usertype,$db->conn);
   if($product->Error_log==null){ 
         echo json_encode($data); 
   }else{ 
      echo json_encode(array("Error"=>$product->Error_log));
   }
}

if(isset($_POST["product_update"])){
   $name=$db->conn->real_escape_string( $_POST["oldProduct"]);
   $newName=$db->conn->real_escape_string( $_POST["newProduct"]);
   $symbol=$db->conn->real_escape_string( $_POST["symbol"]);
   $status=$db->conn->real_escape_string( $_POST["status"]);    
   $usertype=$db->conn->real_escape_string( $_POST["userid"]);

   $product = new Product();
   if(!$product->product_exist($name,$usertype,$db->conn)){
      echo json_encode(array("Error"=>"Product does not exist"));
   }else if($product->product_count($name,$newName,$usertype,$db->conn)){
      echo json_encode(array("Error"=>"Product already exist"));
   }else if($product->symbol_count($name,$symbol,$usertype,$db->conn)){
      echo json_encode(array("Error"=>"symbol already exist for another product"));
   }
   else{
      //store product
      $product->update_product($name,$newName,$symbol,$status,$usertype,$db->conn); 
      if($product->Error_log==null){
          
         echo json_encode(array("Success"=>"success"));
      }else{ 
         echo json_encode(array("Error"=>$product->Error_log));
      }
   }
}
//update product price

if(isset($_POST["update_price"])){
   $name=$db->conn->real_escape_string( $_POST["p_product"]);  
   $status=$db->conn->real_escape_string( $_POST["status"]);    
   $price=$db->conn->real_escape_string( $_POST["price"]); 
   $userid=$db->conn->real_escape_string( $_POST["userid"]);

   $product = new Product();
   if($product->product_exist($name,$userid,$db->conn)){
      echo json_encode(array("Error"=>"Product does not exist"));
   }  
   else{
      //store product
      $product->update_price($name,$status,$price,$userid,$db->conn); 
      if($product->Error_log==null){ 
      unset( $_POST["product"]); 
         echo json_encode(array("Success"=>"success"));
      }else{ 
         echo json_encode(array("Error"=>$product->Error_log));
      }
   }
}
//update product status

if(isset($_POST["update_status"])){
   $name=$db->conn->real_escape_string( $_POST["product"]);  
   $status=$db->conn->real_escape_string( $_POST["updatestatus"]);  
   $userid=$db->conn->real_escape_string( $_POST["userid"]);

   $product = new Product();
   
      //store product
      $product->update_status($name,$status,$userid,$db->conn); 
      if($product->Error_log==null){ 
         echo json_encode(array("Success"=>"success"));
      }else{ 
         echo json_encode(array("Error"=>$product->Error_log));
      }
   
}
if(isset($_POST["delete_product"])){
   $name=$db->conn->real_escape_string( $_POST["product"]);
   $userid=$db->conn->real_escape_string( $_POST["userid"]); 
   $product = new Product();
   $product->delete_product($name,$userid,$db->conn); 
      if($product->Error_log==null){
         $Notification="Product deleted successfully";
         echo json_encode(array("Success"=>"success"));
      }else{ 
         echo json_encode(array("Error"=>$product->Error_log));
      }
}

if(isset($_GET["search"])){
   $search=$db->conn->real_escape_string( $_GET["text"]);
  
   $product = new Product(); 
  $data= $product->general_search($search,$db->conn);
   if($product->Error_log==null){ 
         echo json_encode($data); 
  }else{ 
     echo json_encode(array("Error"=>$product->Error_log));
  }
}

if(isset($_GET["state_search"])){
   $search=$db->conn->real_escape_string($_GET["cstate"]);
  
   $product = new Product(); 
  $data= $product->state_search($search,$db->conn);
   if($product->Error_log==null){ 
         echo json_encode($data); 
  }else{ 
     echo json_encode(array("Error"=>$product->Error_log));
  }
}

if(isset($_GET["citysearch"])){
   $search=$db->conn->real_escape_string( $_GET["city_state"]);
  
   $product = new Product(); 
  $data= $product->city_search($search,$db->conn);
   if($product->Error_log==null){ 
         echo json_encode($data); 
  }else{ 
     echo json_encode(array("Error"=>$product->Error_log));
  }
 
}

if(isset($_GET["search_state_city"])){
   $state=$db->conn->real_escape_string( $_GET["pstate"]);
   $city=$db->conn->real_escape_string( $_GET["city"]);
  
   $product = new Product(); 
  $data= $product->get_station_state_in_city($state,$city,$db->conn);
   if($product->Error_log==null){ 
         echo json_encode($data); 
  }else{ 
     echo json_encode(array("Error"=>$product->Error_log));
  }
}
if(isset($_GET["search_address"])){
   $search=$db->conn->real_escape_string( $_GET["bizname"]);
  
   $product = new Product(); 
  $data= $product->search_address($search,$db->conn);
   if($product->Error_log==null){ 
         echo json_encode($data); 
  }else{ 
     echo json_encode(array("Error"=>$product->Error_log));
  }
}
if(isset($_GET["watch_list_search"])){
   $search=$db->conn->real_escape_string( $_GET["watch_search_text"]);
  
   $product = new Product(); 
  $data= $product->watch_list_search($search,$db->conn);
   if($product->Error_log==null){ 
         echo json_encode($data); 
  }else{ 
     echo json_encode(array("Error"=>$product->Error_log));
  }
}

?>

 