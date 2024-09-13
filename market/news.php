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
                    <a class="item-link" href="./pumpprice.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Market</a>
                    </li>
                    <li class="item">
                    <a class="item-link active" href="./news.php"><i class="fa fa-bullhorn" aria-hidden="true"></i> News</a>
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
        <div class="content-infor new-infor"> 
            <div class="new-container">
        <div class="news1">
             <h2>UK To Rely On Oil And Gas Despite Net-Zero Pledge</h2>
          <img src="../images/news/pic3.jpg" height="400px" width="650px" alt="">
             <p>Domestic oil and gas production will continue to play an important role in the UK’s energy mix, despite the commitment to net-zero emissions by 2050, Prime Minister Boris Johnson

            The American Petroleum Institute (API) estimated the inventory draw this week for crude oil to be 2.025 million barrels after analysts predicted a build of 675,000 barrels.

            U.S. crude inventories shed some 78 million barrels since the start of 2021, and about 21 million barrels since the start of 2020.</p>
                </div>
        
          
        <div class="news1">
             <h2>U.S. Considers Chevron Request To Take, Trade Venezuelan Oil</h2>
          <img src="../images/news/pic1.jpg" height="400px" width="650px" alt="">
             <p>The U.S. Administration is currently reviewing a request from Chevron to potentially allow the U.S. oil giant to take and trade crude from Venezuela as a form of payment for the millions of dollars the South American producer owes Chevron for its joint ventures there, Reuters reported on Monday, quoting sources with knowledge of the talks.
            Chevron is the last remaining U.S. oil producer with staff and offices in Venezuela and has a joint venture with the local state-controlled oil firm PDVSA.

            The U.S. major is now lobbying with the Biden Administration to be allowed sanctions relief and be able to take and trade Venezuelan crude as a means to recover the dividends and payments it is owed by the joint venture with PDVSA, according to Reuters’ sources.
            </p>
                </div>
                
                 <div class="news1">
             <h2>Tanker Rates Turn Negative As U.S. LNG Flocks To Europe</h2>
          <img src="../images/news/pic4.jpg" height="400px" width="650px" alt="">
             <p>The spot charter rates for shipping U.S. liquefied natural gas to Europe have just turned negative, suggesting that there are now too many LNG vessels in the Atlantic region but fewer requirements, according to LNG freight price assessor Spark Commodities.
                     </p>
                     <p>
            In December and January, dozens of cargoes of U.S. LNG flocked to Europe, which had a record-high natural gas price amid the gas and energy crisis. The crisis pushed regional LNG prices way above the Asian LNG benchmark and 14 times higher than the U.S. Henry Hub price. Tankers were not only traveling between the U.S. and Europe, but many were also diverted away from Asia to Europe as spot sellers took advantage of the higher gas prices in Europe.
            </p>
                </div>
                
                 <div class="news1">
             <h2>U.S. Gasoline Prices Set To Ease</h2>
          <img src="../images/news/pic2.jpg" height="400px" width="650px" alt="">
             <p>After hitting a peak of $3.45 per gallon last week, the national average U.S. gasoline prices are expected to calm down significantly this week due to price cycling, Patrick De Haan, head of petroleum analysis for fuel-savings app GasBuddy, said on Monday.
                     </p>
                     <p>
            The national average saw over the past week one of its largest weekly jumps in the last year or so, De Haan tweeted on Monday, but added that average gasoline prices should calm down significantly this week. According to GasBuddy, prices are actually down by $0.03 per gallon from the $3.45/gal peak due to price cycling, which now leads to some states stations lowering prices.
            </p>
                </div>
        </div>
        </div>  
        
        <div class="watch-panel">
         <div class="news1">
             <h2>UK To Rely On Oil And Gas Despite Net-Zero Pledge</h2>
          <img src="../images/news/pic5.jpg" height="200px" width="300px" alt="">
             <p>Domestic oil and gas production will continue to play an important role in the UK’s energy mix, despite the commitment to net-zero emissions by 2050, Prime Minister Boris Johnson </p>
                     <p>
             The American Petroleum Institute (API) estimated the inventory draw this week for crude oil to be 2.025 million barrels after analysts predicted a build of 675,000 barrels.
            </p>
                </div>
        </div>
    </div>
   
</div>

<?php  include_once("./footer.php")?> 
 <script>
  $(document).ready(function(){ 
  
    
  
  }); 
 </script>
</body>
</html>
