<?php  

  class Product{
    public $Error_log=null;

//check product exist
public function product_exist($product,$usertype,$conn){
    $result=$conn->query("SELECT Name FROM products WHERE Regid='$usertype' AND Name='$product'");
        if($result->num_rows>0){
            return true;
        }else{
            return false;
        }
}
//if product to be updated existed
public function product_count($oldproduct,$newproduct,$usertype,$conn){
    $result=$conn->query("SELECT COUNT(Proid) AS total FROM products WHERE Regid='$usertype' AND Name='$newproduct' AND Name !='$oldproduct' HAVING COUNT(Proid)>0");
        if($result->num_rows>0){
            return true;
        }else{
            return false;
        }
}
//check if symbol exist
public function symbol_exist($symbol,$usertype,$conn){
    $result=$conn->query("SELECT Name FROM products WHERE Regid='$usertype' AND Symbol='$symbol'");
        if($result->num_rows>0){
       
            return true;
        }else{
            return false;
        }
}
//if symbol to be update already exist
public function symbol_count($product ,$symbol,$usertype,$conn){
    $result=$conn->query("SELECT COUNT(Proid) AS total FROM products WHERE Regid='$usertype' AND Symbol='$symbol' AND Name !='$product' ");
        if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            if($row["total"]>0){
                return true;
            }
            return false;
        }
        
        }else{
            return false;
        }
}
public function save($product,$symbol,$status,$price,$usertype,$conn){
    $query="CALL sp_add_product('$usertype','$product','$symbol','$status','$price') ";  
    if (mysqli_query($conn, $query)) { 
            return    $this->Error_log=null;
    } else {
       return $this->Error_log= $query . "<br>" . mysqli_error($conn);
    } 
}
    //GET CURRENT PRICE OF PRODUCTS
    public function current_price($usertype,$conn){
        $product =$conn->query("SELECT DISTINCT Proid FROM view_product WHERE Userid='$usertype'");
        if($product->num_rows>0){
             $rows= $product->fetch_assoc();
            foreach($rows as $row){

            }
        } 
  }
//Get product all time price details
  public function get_product($usertype,$conn){
    $product=$conn->query("CALL sp_current_price('$usertype')"); 
   
    if($product->num_rows>0){  
        while($row = $product->fetch_assoc()){ 
                $result[] =array("Proid"=> $row["Proid"], "Name"=>$row["Name"],"Status"=>$row["Status"],"Price"=>$row["Cost"],"Symbol"=>$row["Symbol"],"Created"=>$row["Created"],"Date"=>$row["Date"],"Time"=> $row["Time"]);
        } 
        return $result;
          } else{
            return $this->Error_log= mysqli_error($conn);;
          }
        }
        
//get only product name for option box display
public function get_product_names($usertype,$conn){
    $product=$conn->query("SELECT DISTINCT Proid, Name FROM products
WHERE Regid=$usertype"); 
    // $product=$conn->query("CALL sp_get_user_products('$usertype')"); 
    if($product->num_rows>0){  
        while($row = $product->fetch_assoc()){ 
            $result[] =array("Proid"=>$row["Proid"] ,"Name"=>$row["Name"]); 
        } 
        return $result;
          } else{
            return $this->Error_log= mysqli_error($conn);;
          }
        }
      
// update product details
public function update_product($oldProduct,$newProduct,$symbol,$status,$usertype,$conn){
   
    $query="CALL sp_update_product('$oldProduct','$newProduct','$usertype','$symbol','$status') ";  
    if (mysqli_query($conn, $query)) { 
                 $this->Error_log=null;
     } else {
         $this->Error_log= $query . "<br>" . mysqli_error($conn);
     } 
}
// update product status
public function update_status($Product,$status,$usertype,$conn){
    $query="UPDATE products SET Status='$status' WHERE Name='$Product' AND Regid='$usertype'";  
    if (mysqli_query($conn, $query)) { 
                 $this->Error_log=null;
     } else {
         $this->Error_log= $query . "<br>" . mysqli_error($conn);
     } 
}
public function delete_product($product,$usertype,$conn){
   $query="DELETE FROM products WHERE Name='$product' AND Regid= '$usertype'"; 
    if (mysqli_query($conn, $query)) { 
                $this->Error_log=null;
    } else {
        $this->Error_log= $query . "<br>" . mysqli_error($conn);
    }                                   
} 
 
//update product price
public function update_price($productId,$status,$price,$usertype,$conn){   
    $query="CALL sp_update_price('$productId', '$price','$status','$usertype') "; 

     if (mysqli_query($conn, $query)) { 
                 $this->Error_log=null;
 } else {
        $this->Error_log= $query . "<br>" . mysqli_error($conn);
    } 
}
//search products
public function general_search($search,$conn){
  //  $myconn=new Database();
    $query="SELECT BusinessName,Address,Contact,Symbol,Status, Cost,State,City,Website,Name,Date,Time
    FROM view_current_price WHERE Name LIKE '%$search%' 
    ORDER BY BusinessName Asc ";
    $product=$conn->query($query); 
    if($product->num_rows>0){  
        while($row= $product->fetch_assoc()){
        $result[] =$row;
        } 
        return $result;
          } else{
            return $result[]= array("None"=>"None");
          }
        } 

public function state_search($search,$conn){
  $query="SELECT Userid, BusinessName,Address,Contact,Symbol,Status, Cost,State,City,Website,Name,Date,Time
  FROM view_current_price WHERE State='$search' 
  ORDER BY BusinessName Asc ";
  $product=$conn->query($query); 
  if($product->num_rows>0){  
  while($row= $product->fetch_assoc()){
  $result[] =$row;
  } 
  return $result;
    } else{
      return $result[]= array("None"=>"None");
    }
  }  
  
  public function city_search($city,$conn){
    $query="SELECT DISTINCT City
    FROM view_current_price WHERE State='$city' 
    ORDER BY City Asc";
    $product=$conn->query($query); 
    if($product->num_rows>0){  
    while($row= $product->fetch_array()){
    $result[] =$row;
    } 
    return $result;
      } else{
        return $result[]= array("None"=>"None");
      }
    } 
    
    public function get_station_state_in_city($state,$city,$conn){
        $query="SELECT Userid
        FROM view_current_price WHERE  State='$state' AND City='$city' 
        ORDER BY BusinessName Asc ";
        $product=$conn->query($query); 
        if($product->num_rows>0){  
        while($row= $product->fetch_assoc()){
        $result[] =$row;
        } 
        $_SESSION["search_state_city"]=1;
        $_SESSION["search_state_city_state"]= $state;
        $_SESSION["search_state_city_city"]= $city;
        return $result;
          } else{
            return $result[]= array("None"=>"None");
          }
        } 

 public function search_address($search,$conn){
    $query="SELECT *
    FROM business WHERE BusinessName='$search' 
    ORDER BY Address Asc";
    $product=$conn->query($query); 
    if($product->num_rows>0){  
    while($row= $product->fetch_array()){
    $result[] =$row;
    } 
    return $result;
      } else{
        return $result[]= array("None"=>"None");
      }
    }
    
    public function watch_list_search($search,$conn){
   
        $query="SELECT Regid, BusinessName,Address,Contact,Symbol,Status, Cost,State,City,Website,Name,Date,Time,Proid
        FROM view_current_price WHERE Name LIKE '%$search%' 
        ORDER BY BusinessName Asc ";
        $product=$conn->query($query); 
        if($product->num_rows>0){  
            while($row= $product->fetch_assoc()){
            $result[] =$row;
            } 
            return $result;
              } else{
                return $result[]= array("None"=>"None");
              }
            } 
    
  
    public function get_current_price ($usertype,$conn){
      $query="SELECT BusinessName,Address,Contact,Symbol,Status, Cost,State,City,Name,Date,Time FROM view_current_price WHERE Userid='$usertype'";
      $product=$conn->query($query); 
        if($product->num_rows>0){  
            while($row= $product->fetch_assoc()){
            $result[] =  $row;
            }
            return $result;
              } else{
                return $result[]= array("None"=>"None");
              }
            }
    public function get_price_history ($usertype,$conn){
      $query="SELECT BusinessName,Address,Contact,Symbol,Status, Cost,State,City,Name,Date,Time FROM view_current_price WHERE Userid='$usertype' AND Date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY Date, time ASC";
      $product=$conn->query($query); 
        if($product->num_rows>0){  
            while($row= $product->fetch_assoc()){
            $result[] =  $row;
            }
            return $result;
              } else{
                return $result[]= array("None"=>"None");
              }
            }
    
  }
  
  
?>