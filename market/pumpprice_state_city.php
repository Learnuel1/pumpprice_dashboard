<?php
include_once("../functions/infor.php"); 
include_once("../functions/market_infor.php"); 
session_start();


if(!isset($_SESSION["UserType"])){
    header("Location:./login.php");
}
 if(isset($_SESSION["search_product"])){
    unset($_SESSION["search_product"]);
 }
?>
 
<?php 
 function add_product($data, $bizinfor){ 
        ?> 
         <div class="card products" id="<?php $bizinfor["Userid"] ?> ">
            <div class="card-body">  
            
            <?php
                       if($bizinfor["Website"] !="none" && $bizinfor["Website"] !=null ){
                       ?>
                       <h5 class="heading details" id="businessName"> <a href="<?php echo $bizinfor["Website"] ?>" target="_blank" class="heading heading-link" > 
                       <i class="fa fa-building-o biz-infor" aria-hidden="true"></i>  <?php echo $bizinfor["BusinessName"]; ?></a></h5>
                        <?php
                       }else{
                        ?>
                       <h5 class="heading details heading-link" id="businessName"  > 
                       <i class="fa fa-building-o biz-infor" aria-hidden="true"></i>  <?php echo $bizinfor["BusinessName"]; ?></h5>
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
                            <tbody  id="<?php $bizinfor["Userid"] ?>"> 
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
             <input type="text" id="searchtext" class="searchtext" placeholder="search" ><button class="btn-search" id="btn-search"><i class="fa fa-search " aria-hidden="true"></i></button>
             </div>
             
             <a class="logout" href="../index.php"><button id="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button></a>
             
    </div> 
</div>
<div class="contentmain"> 
    <div class="left-panel">
         <div class="search-panel"> 
                     <input type="text" id="station-searchtext" class="searchtext" placeholder="search product" spellcheck="false">
                   <a class="button">  <i class="fa fa-search search-icon" aria-hidden="true"></i></a>
                      <hr class="separator">
          </div>
         <div class="search-container">
                <div class="search-result" id="search-result">
                    <!-- <div class="result-item">
                        <h3><button class="button-result">companyname <br><h5>addrss</h5></button></h3>   
                    </div>  -->
                   
            </div>
            <div class="other-search" id="option-search"> 
            <label for="State" class="text-infor">Select state</label>
            <div class="option-box">
            
                      <select id="state_option" class="form-control">
                           <option value="City"> State</option>
                           
                           <?php
                           
                            $states = get_station_state();
                            if($states!=null){
                            foreach($states as $data){
                              ?>  
                              <option value="<?php  echo $data["State"] ?> "> <?php  echo $data["State"] ?></option> 
                              <?php
                            }
                        }
                           ?>
                      </select> 
                      
                      <button class="btn-state-search" id="btn_state"> <i class="fa fa-search biz-infor" aria-hidden="true"></i> </button>
            </div>
            <label for="City" class="text-infor">Select city</label>   
            <div class="option-box">
            
            <select id="city_option" class="form-control">
                 <option value="City"> City</option>
                 
                 
            </select> 
            
            <button class="btn-state-search" id="btn_city"> <i class="fa fa-search biz-infor" aria-hidden="true"></i> </button>
  </div>
            </div>
            </div>  
                
			
     
             
    </div>
    <div class="right-panel">
      
    <div class="content-infor"> 
         <?php  
           $state = $_SESSION["search_state_city_state"];
           $city =$_SESSION["search_state_city_city"];
            $business=get_station_state_in_city($state,$city); 
            if($business !=null){  
            $id="";
            foreach($business as $name){ 
                    
                 if($id !=$name["Userid"]){   
                 $data= get_selected_price($name["BusinessName"],$name["Userid"] );
                  
                 if($data !=null && $data[0] !="None"){
                    echo add_product($data,$name);  
                }
                $id=$name["Userid"];
            }
             }
         }
          
         ?>
         
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
<?php  include_once("./product_search_result.php")?> 
 <script>
  $(document).ready(function(){ 
  var search_modal_btn = document.querySelector("#search_result_model");
  
  search_modal_btn.style.display='none';
    $(document.body).on("click",'tr[data-href]',function(){  
        var proname=this.dataset.href;  
           
        $.ajax({  
        url:'../functions/search_helper.php',
        method:'GET',
        data:{search_product:1,
        product:proname
        },
        success:function(response){  
             
           window.location='./search_result.php';
            
        },
        dataType:'json'
    });
    
    });
  
    $("#station-searchtext").on('input',function(){ 
    var text = $("#station-searchtext").val();
     
    
    if(text==="" || text==null || text.length<3){
    $("#search-result").empty(); 
    }else if(text.length>2){
        $("#search-result").empty(); 
    $.ajax({ 
        url:'../functions/Helper.php',
         method:'GET',
         data:{ 
         search:1,
         text:text
         },
         success:function(response){  
            if(response.Error || response.None){ 
            }else{
               $(response).each(function(){ 
                var search ='<div class="result-item"><h5><button data-href='+this.BusinessName +' class="button-result" id="'+this.BusinessName+'  ">'+this.BusinessName+' <br><h6> <span>'+this.Address+'</span></h6></button></h5> </div>';
            $(search).appendTo("#search-result");
               });
           
            }
            
         },
         dataType:'json'
    
    
    });
    
    }
    });  
    var container=document.querySelector(".search-container");
    container.classList.add('search-container--visible')
    $("#station-searchtext").on('keypress',function(){
    
    });
    
    $(".button-result").on('click','data-href',function(){
       var data = this.dataset.href;
        
    });
    
    $("#btn_state").click(function(){
        var state=$("#state_option").val();
        var resultcontainer = document.querySelector("#search_result_modal_body");
        if(state !="" && state.toLowerCase()!="state"){
            
            $.ajax({ 
                url:'../functions/Helper.php',
                method:'GET',
                data:{
                state_search:1,
                state:state
                },
                success:function(response){
                    
                    if(!response.None){ 
                    var firstName="";
                    var tableRow="";
                     $(response).each(function(){
                       
                       if(firstName !=this.Userid){
                        var heading=" <h5 class=" +"heading details id="+this.Userid +" ><i class=" +"fa fa-building-o biz-infor "+" aria-hidden=" +"true"+"></i>"+this.BusinessName+"</h5>";
                       $(resultcontainer).append(heading); 
                        var tableElm="<table class=table table-hover><thead><tr>  </tr> </thead> <tbody id=tr"+this.Userid+"> </tbody> </table>";
                         $(resultcontainer).append(tableElm);
                          tableRow = document.querySelector("#tr" +this.Userid);
                          var type="available";
                       if(this.Status.toLowerCase()!="available"){
                       type="not";
                       }
                        var search_result="<tr><td>"+ this.Name +"</td> <td>"+this.Symbol +"</td> <td>"+ this.Cost +"</td> <td> <i class=fa fa-circle "+type +" aria-hidden=" +"true "+">  "+ this.Status + "</td> </tr>";
                         $(tableRow).append(search_result);
                         firstName=this.Userid;
                       }else{
                       var type="available";
                       if(this.Status.toLowerCase()!="available"){
                       type="not";
                       }
                        var search_result="<tr><td>"+ this.Name +"</td> <td>"+this.Symbol +"</td> <td>"+ this.Cost +"</td> <td> <i class=" +"fa fa-circle "+type +" aria-hidden=" +"true "+">  "+ this.Status + "</td> </tr>";
                         $(tableRow).append(search_result);
                          
                       }
                      
                     });
                    $("#search_result_model").trigger('click');
                    }
                },
                dataType:'json'
                            
            });
                
        }
    });
    
    //state and city search
    $("#state_option").change(function(){
            var state= $("#state_option").val(); 
            if(state !="" && state.toLowerCase()!="state"){
                $("#city_option").empty();
                 var defOptions="<option value=City> Select City</option>";
                 $("#city_option").append(defOptions);
                var elem=document.querySelector("#city_option");
                $.ajax({ 
                url:'../functions/Helper.php',
                method:'GET',
                data:{
                citysearch:1,
                city_state:state
                },
                success:function(response){
                
                if(!response.Error || !response.None){
                $(response).each(function(){
                    var cityOptions="<option value='"+this.City+"'>"+this.City +"</option>";
                 $(elem).append(cityOptions); 
                });
                
                }
                },
                
                dataType:'json'
                
                
                });
            
            }
    });
    $("#btn_city").click(function(){
    var pstate =$("#state_option").val();
    var city=$("#city_option").val();
    
    if(pstate.toLowerCase() !="state" && city.toLowerCase() !="city"){
    
    $.ajax({ 
    url:'../functions/Helper.php',
    method:'GET',
    data:{
        search_state_city:1,
        pstate:pstate,
        city:city
    },
    success:function(response){
        
        if(!response.Error || !response.None){
        window.location='./pumpprice_state_city.php'
        }
        
    },
    dataType:'json'
    
    });
    
    }
    
    });
    
    
    $("#btn-watchlist").click(function(){
     $("#search_result_model").trigger('click');
     
    });
    //not working
    $("#btn_modal_close").click(function(){
        $("#search_result_modal_body").remove();
    });
  }); 
 </script>
</body>
</html>
