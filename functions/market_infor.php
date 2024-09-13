<?php
include_once("../Config/Database.php"); 
 

  
function get_price($name){ 
$myconn=new Database();
$query="SELECT BusinessName,Address,Contact,Symbol,Status, Cost,State,City,Name,Date,Time
FROM view_current_price WHERE Userid='$name'";
$data=mysqli_query($myconn->connect_mysql(), $query);
if($data->num_rows>0){
    while($row=$data->fetch_assoc()){
    $result[]=array("BusinessName"=>$row["BusinessName"], 
    "Name"=>$row["Name"], "Address"=>$row["Address"], 
    "Contact"=>$row["Contact"], "Symbol"=>$row["Symbol"], "Status"=>$row["Status"], "Cost"=>$row["Cost"],"State"=>$row["State"], "City"=>$row["City"], "Date"=>$row["Date"], "Time"=>$row["Time"]
    
    );
    }
   return $result ;
}else{
 return array("None");
}
 
}

  
function get_selected_price($name,$bizid){ 
  $myconn=new Database();
  $query="SELECT BusinessName,Address,Contact,Symbol,Status, Cost,State,City,Name,Date,Time,Website
  FROM view_current_price WHERE BusinessName='$name' AND Userid='$bizid' ";
  $data=mysqli_query($myconn->connect_mysql(), $query);
  if($data->num_rows>0){
      while($row=$data->fetch_assoc()){
      $result[]=array("BusinessName"=>$row["BusinessName"], 
      "Name"=>$row["Name"], "Address"=>$row["Address"], 
      "Contact"=>$row["Contact"], "Symbol"=>$row["Symbol"], "Status"=>$row["Status"], "Cost"=>$row["Cost"],"State"=>$row["State"], "City"=>$row["City"], "Date"=>$row["Date"], "Time"=>$row["Time"],"Website"=>$row["Website"]
      
      );
      }
     return $result ;
  }else{
   return array("None");
  }
   
  }

 function get_business_names(){
    $myconn=new Database();
    $query="SELECT Regid,  BusinessName AS Name, Contact,Address,State,City,Email,Website FROM business";
    $product=mysqli_query($myconn->connect_mysql(),$query); 
    if($product->num_rows>0){  
        while($row= $product->fetch_array()){
        $result[] =$row;
        }
        return $result;
          } else{
            return array("None");
          }
        }
function search_product($product){
  $myconn=new Database();
  $query="SELECT BusinessName,Address,Contact,Symbol,Status, Cost,State,City,Website,Name,Date,Time
  FROM view_current_price WHERE Name='$product' ORDER BY BusinessName Asc ";
  $product=mysqli_query($myconn->connect_mysql(),$query); 
  if($product->num_rows>0){  
      while($row= $product->fetch_assoc()){
      $result[] =$row;
      } 
      return $result;
        } else{
          return array("None");
        }
      } 
      
      function get_station_state(){
        $myconn=new Database();
        $query="SELECT DISTINCT State FROM view_current_price ORDER BY State ASC ";
        $product=mysqli_query($myconn->connect_mysql(),$query); 
        if($product->num_rows>0){  
            while($row= $product->fetch_assoc()){
            $result[] =$row;
            } 
            return $result;
              } else{
                return array("None");
              }
            }
            function get_station_state_in_city($state,$city){
              $myconn=new Database();
              $query="SELECT Userid, BusinessName,Website,Address,Contact,State,City  FROM view_current_price 
                WHERE State='$state' AND City='$city'
              ORDER BY State ASC ";
              $product=mysqli_query($myconn->connect_mysql(),$query); 
              if($product->num_rows>0){  
                  while($row= $product->fetch_assoc()){
                  $result[] =$row;
                  } 
                  return $result;
                    } else{
                      return array("None");
                    }
                  }        
           
?>