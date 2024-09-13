<?php
include_once("../functions/infor.php"); 
include_once("../Config/connect.php"); 
session_start();
if(!isset($_SESSION["LoggedIn"])){
  header("Location:./login.php");
}
  
?>
 
<!DOCTYPE html>
<html lang="en">
<?php include("./head.php")?> 
<body>
<section class="nav"> 
        <a class="logo-icon" href="../index.php"><img src="../icons/pumprice-icon-3.png"> </a> 
    <div class="log-infor"> 
    </div> 
    </section>

    <div class="content-wrapper"> 
    <?php include("./sidebar.php")?> 
       
        <div class="content main" id="content-main">
        <?php include("./header.php")?>  
           <div class="content-infor">
                <div class="left">
                    <!-- <div class="card table-infor">
                        <div class="card-body">
                        <p class="heading-text">
                            Current price 
                        </p>  
            					<table class="table products table-hover">
      							<thead class="table-dark">
                              <tr> 
                                <th scope="col">Product</th>
                                <th scope="col">Symbol</th>
                                <th scope="col">Price</th> 
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                            </tr>
      								</thead  >
            					    	<tbody id="all-product"> 
                           
            						    </tbody>
      						</table> -->
                </div>
            </div>
                </div>
                
                <div class="right">
                <!-- <div class="card table-infor">
                        <div class="card-body">
                        <p class="heading-text">
                              Price history  
                            </p>  
                        <table class="table products table-hover">
                            <thead class="table-dark">
                            <tr> 
                                <th scope="col">Product</th>
                                <th scope="col">Symbol</th>
                                <th scope="col">Price</th> 
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                            </tr>
                            </thead>
                            <tbody id="all-time-price"> 
                            <!-- <?php 
                                $userid = $_SESSION["UserType"];
                                $q1="SELECT * FROM view_product_price WHERE Regid=$userid " ;
                                $q1 = $conn->query($q1);
                                while($row = mysqli_fetch_assoc($q1)){
                                  echo $row;
                                  extract($row); 
                                 ?> 
                                 <tr> 
                                 <td><?php echo $row["Name"]; ?></td>
                                 <td><?php echo $row["Symbol"] ;?></td>
                                 <td><?php echo $row["Cost"]; ?></td>
                                 <td><?php echo $row["Date"]; ?></td>
                                 <td><?php echo $row["Time"]; ?></td>
                                </tr>
                                <?php
                                } 
                                ?>   -->
                          
                           </tbody>
                      </table>
                </div> -->
              </div>  
               
                </div>
           </div>
        </div>
  
    </div> 
    

<!--NOTIFICATION MODAL-->  
 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" id="notification_model" data-bs-toggle="modal" data-bs-target="#notification_modal"></button>

<!-- Modal -->
<div class="modal fade" id="notification_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Completed</h5>
        
      </div>
      <div class="modal-body">
        <h5><?php echo $NotificationHeading;  ?></h5>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-notification" class="btn btn-secondary custome" data-bs-dismiss="modal">Ok</button> 
      </div>
    </div>
  </div>
</div>


   <?php include("./addproduct.php") ?>
<!-- UPDATE PRODUCT PRICE MODAL--> 
  <!-- Button trigger modal -->
  <button type="button" id="btn_updateprice_model" data-bs-toggle="modal" data-bs-target="#UpdatePrice_modal"> 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="UpdatePrice_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Update Product</h4> 
          <button type="button" id="btn_close_price_update" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="form-group1"> 
        <h5 class="mb-2 text-muted">Update product price</h5>
              <label for="Products">Select product</label>
              <select id="select_product" class="form-control"> 
              </select> 
            </div>
            <div class="form-group1"> 
                  <label for="InputPrice">Price</label>
                    <input type="number" class="form-control" id="new_Price" aria-describedby="price" placeholder="Enter new price" name="price">   
            </div> 
            <div class="form-group1"> 
            <label for="checkbox">Status </label>
          <input class="form-check-input" type="checkbox"  id="updated_status" value="Available" checked> 
          <label class="form-check-label" for="flexSwitchCheckDefault">Available</label>
            </div> 
          <div class="form-group1">
             <h6 class="form-group1 error" id="price_error"><small></small></h6> 
            </div>
            <div class="form-group1">
            
              <button type="button" id="btn_update_price" value="Reload" class="btn btn-primary btn-block" name="update">Update</button>   
              </div>  
        </div>
        
      </div>
      </div>
    </div>
  </div> 
  
   
<!-- ajax functions --> 

<script>
 
 $(document).ready(function(){
   let addProduct_model= document.querySelector("#btn_addProduct_modal");
   let notification= document.querySelector("#notification_model");
   let headContainer= document.querySelector("#header"); 
    // ("#notification_model");
   let btn_updateprice_model= document.querySelector("#btn_updateprice_model"); 
   addProduct_model.style.display='none';
   notification.style.display='none';   
   btn_updateprice_model.style.display='none'; 
   let error=""; 
   $("#dashboard").removeClass('active-btn');
   $("#dashboard_links").removeClass('active-list');
   
   $("#updateprice_links").addClass('active-btn');
   $("#updateProduct").addClass('active-list');
   loadproduct();
  let status=$("#status").val(); 
  
  $("#status").on('change',function(){ 
     if($(this).prop('checked')){
       status=$("#status").val(); 
     }else{
       status="Not";
     } 
  });
  let updatestatus=$("#update_status").val(); 
  $("#update_status").on('change',function(){ 
     if($(this).prop('checked')){
       updatestatus=$("#update_status").val(); 
     }else{
       updatestatus="Not";
     } 
  });
  
   $("#addProduct").on('click',function(){ 
     console.log("cliked");
     $("#btn_addProduct_modal").trigger('click');
   });


   $("#btn-save-product").on('click',function(){ 
     let product=$("#ProductName").val(); 
     let symbol=$("#pro_symbols").val(); 
     let price=$("#Price").val(); 
     let usertype ="<?php echo $_SESSION["UserType"]; ?>";
    
      if(product =="" || product==null){
        error="Provide product name";
      }else if(symbol.toLowerCase()=="select"){
        error="Select product symbol";
      }else if(price=="" ||price==null){
        error="Provide product price";
      }else if(price<=0){
        error="invalid price";
      }else if(Number.isNaN(price)){
         error="Invalid character";
      } else{
       const input = $('#Price')[0]
           let dotPos = null;
           input.oninput = function(e) {
           if (e.data === '.') {
             dotPos = input.value.length
           }
           }
           
           let value = input.value
           if (value.includes('.')) {
             dotPos = value.indexOf('.')
           } else if (!value.includes('.') && dotPos === null) {
             input.value += '.00'
           }
           if (dotPos !== null) {
             let sliced = value.slice(dotPos + 1)
             if (sliced.length > 2) {//round up to 2dp
             input.value = Number(value).toFixed(2)
             } else if (sliced.length === 1) {
             input.value += '0'
             } else if (sliced.length === 0) {
             input.value += '.00'
             }
           }
         
      }
      let price=$("#Price").val(); 
     if(error!=""){
       $("#error").html(error);
       error="";
     }else{
         $.ajax({
             url:'../functions/Helper.php',
             method:'POST',
             data:{
               add_product:1,
               product:product,
               symbol:symbol,
               status:status,
               price:price,
               usertype:usertype 
             },
             success:function(response){
                 if(response.Success){  
                   $("#notification_model").trigger('click');
                 } else if (response.Error) {
                   $("#error").html(response.Error);
                 }
             },
             dataType:'json'
          });

     }
   });
   
   $("#ProductName").on('keydown',function(){ 
     erro="";
     $("#error").html(error);
   });

   $("#symbols").on('click',function(){ 
     erro="";
     $("#error").html(error);
   });

   $("#Price").on('click',function(){ 
     erro="";
     $("#error").html(error);
   });

   $("#btn-close").on('click',function(){ 
     erro="";
     $("#error").html(error);
   });
 
 $("#btn_close_price_update").click(function(){
    $("#select_product").empty();
 })
   $("#btn-notification").on('click',function(){   
    window.location.reload(true); 
   }  
   );
    
   //UPDATE PRODUCT DETAILS
   $("#btn_update_product").on('click',function(){
    let oldProduct=$("#productName").val(); 
     
     let newProduct=$("#ProductNewName").val(); 
     let symbol =$("#symbols").val();
      
     if(oldProduct =="" || oldProduct==null || oldProduct.toLowerCase()==="select" ){
        error="Select product name";
      }else if(newProduct==="" ||newProduct===null){
        error="Provide new name";
      }else if(symbol ==="" || symbol.toLowerCase()==="select" ){
        error="Select product symbol";
      }  
     if(error!=""){
       $("#product_error").html(error);
       error="";
     }else{
      $("#product_error").html("");
      $.ajax({ 
       url:'../functions/Helper.php',
       method:'POST',
       data:{
        product_update:1, 
        oldProduct:oldProduct,
         newProduct:newProduct,
         status:status,
         symbol:symbol,
         userid:"<?php echo $_SESSION["UserType"]; ?>"
          },

       success:function(response){ 
        
         if(response.Error){
          $("#product_error").html(response.Error);
         }else{   
                   $("#notification_model").trigger('click'); 
                  
           } 
       },
       dataType:'json'
     });
     }
     
   }); 
   
   //update product status
   $("#btn_update_status").click(function () { 
    let product=$("#updateProStatus").val(); 
     let error="";
     
     if(product==="" || product===null || product.toLowerCase()==="select"){
     error="Select a product";
     }
     
     if(error !=""){
     $("#status_error").html(error);
     error="";
     }else{
      $("#status_error").html(error);
     $.ajax({ 
      url:'../functions/Helper.php',
       method:'POST',
       data:{
       update_status:1, 
       product:product,
       updatestatus:updatestatus,
         userid:"<?php echo $_SESSION["UserType"];  ?>"
          }, 
       success:function(response){
                if(response.Success){  
                   $("#notification_model").trigger('click');
                 } else if (response.Error) {
                   $("#status_error").html(response.Error);
                 }
       },
       dataType:'json'
     });
     
     }
   });
   
   //load products
   function loadproduct() {
    let userid="<?php echo $_SESSION["UserType"];  ?>";
     
     $.ajax({ 
       url:'../functions/Helper.php',
       method:'POST',
       data:{load_product:1, 
         userid:userid
          },

       success:function(response){ 
          
         if(response.Error){
          console.log(response.Error)
         }else{  
          let availCount=0;  
           $("#pro-count").text(response.length);
          $("#all-product").addClass("#all-product");
           $(response).each(function(){
             let datarow="<tr><td>"+this.Name +"</td><td>"+this.Symbol+"</td><td>" +this.Price + "</td><td>" +this.Status+   "</td><td>" +this.Date+  "</td><td>" +this.Time+  "</td></tr>";
             $("#all-product").append(datarow);
               let data={"Name":this.Name,"Symbol":this.Symbol,"Price":this.Price,"Status":this.Status}; 
                
               if(this.Status=="Available"){
                   availCount +=1;
                 } 
                 $("#pro-details").html("Available: "+availCount);
           }  ); 
           
           } 
       },
       dataType:'json'
     }); 
   }
   
   //delete product
   $("#btn_delete").click(function(){  
    let product=$("#deleteProduct").val();   
     if(product ==="" ||product==null ||product.toLowerCase()==="select"   ){
        error="Select a product";
      }  
     if(error!=""){
       $("#delete_error").html(error);
       error="";
     }else{
      $("#product_error").html("");
      $.ajax({ 
       url:'../functions/Helper.php',
       method:'POST',
       data:{
        delete_product:1, 
        product:product, 
         userid:"<?php echo $_SESSION["UserType"]; ?>"
          }, 
       success:function(response){  
         if(response.Error){
          <?php $message= "Product deleted successfully"?>;
          $("#delete_error").html(response.Error);
         }else{  
          $("#notification_model").trigger('click'); 
           } 
       },
       dataType:'json'
     }); 
     }
   });
   
   //load product infor
   $("#updatePrice").click(function(){
   $("#btn_updateprice_model").trigger('click');
    loadData();
   });
   
   function loadData(){
    let datarow="<option value=Select>Select</option>" ;
             $("#select_product").append(datarow);
             $.ajax({ 
       url:'../functions/Helper.php',
       method:'POST',
       data:{load_product_names:1, 
         userid:"<?php echo $_SESSION["UserType"];  ?>"
          }, 
       success:function(response){ 
        
         if(response.Error){ 
          console.log(response)
         }else{   
           $(response).each(function(){
             let datarow="<option value='"+this.Proid +"'>"+this.Name+"</option>" ;
             $("#select_product").append(datarow); 
                 
           }  ); 
           
           } 
       },
       dataType:'json'
     });
   
   } 
   $("#btn_update_price").click(function(){ 
    let p_product=$("#select_product").val();  
     let price=$("#new_Price").val(); 
      
     if(p_product =="" || p_product==null || p_product.toLowerCase()==="select"){
        error="Select product";
      }else if(price=="" ||price==null){
        error="Provide product price";
      }else if(price<=0){
        error="invalid price";
      }else if(Number.isNaN(price)){
         error="Invalid character";
      } else{
       const input = $('#new_Price')[0]
           let dotPos = null;
           input.oninput = function(e) {
           if (e.data === '.') {
             dotPos = input.value.length
           }
           }
           
           let value = input.value
           if (value.includes('.')) {
             dotPos = value.indexOf('.')
           } else if (!value.includes('.') && dotPos === null) {
             input.value += '.00'
           }
           if (dotPos !== null) {
             let sliced = value.slice(dotPos + 1)
             if (sliced.length > 2) {//round up to 2dp
             input.value = Number(value).toFixed(2)
             } else if (sliced.length === 1) {
             input.value += '0'
             } else if (sliced.length === 0) {
             input.value += '.00'
             }
           }
         
      }
      let price=$("#new_Price").val(); 
     if(error!=""){
       $("#price_error").html(error);
       error="";
     }else{
         $.ajax({
             url:'../functions/Helper.php',
             method:'POST',
             data:{
               update_price:1,
               p_product:p_product, 
               price:price,
               status:updated_status,
               userid:"<?php echo $_SESSION["UserType"]; ?>" 
             },
             success:function(response){
                 if(response.Success){  
                   $("#notification_model").trigger('click');
                 } else if (response.Error) {
                   $("#price_error").html(response.Error);
                 }
             },
             dataType:'json'
          });

     }
   });
   //update product price status
   let updated_status=$("#updated_status").val(); 
  $("#updated_status").on('change',function(){ 
     if($(this).prop('checked')){
       updated_status=$("#status").val(); 
     }else{
       updated_status="Not";
     } 
  });
   
   $("#btn_close_price_update").on('click',function(){ 
    $("#price_product").empty();
   });
  
  $("#btn-close-details_update").on('click',function(){
    $("#productsName").empty();
  });
  
  });
</script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>