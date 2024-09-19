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
             <h2>The Nigerian National Petroleum Company Limited (NNPCL) has authorized major marketers to lift petrol from Dangote Refinery, but independent marketers remain excluded. The new arrangement raises concerns over pricing and access, prompting calls for more transparency and an open market for all petroleum players in Nigeria.</h2>
          <img src="../images/news/pic1.png" height="400px" width="650px" alt="">
             <p >The Nigerian National Petroleum Company Limited (NNPCL) has given the green light for major petroleum marketers to begin lifting petrol from the Dangote Petroleum Refinery, under the existing distribution agreement. According to the initial terms, NNPCL is the exclusive distributor of the refinery's petrol. The first batch of petrol, totaling 16.8 million liters, has already been lifted by NNPCL's retail arm. Reports indicate that several major marketers, including 11 Plc, have commenced distribution of the product to various outlets, primarily in Lagos</p>
             <p>
             However, independent marketers have been excluded from this new arrangement. Alhaji Abubakar Garima, the National President of the Independent Petroleum Marketers Association of Nigeria (IPMAN), confirmed that only NNPCL currently has access to the Dangote fuel, preventing independent marketers from participating. They are awaiting a new pricing structure from NNPCL before proceeding with purchases.
</p>
<p>
Meanwhile, independent marketers expressed concerns about being forced to resort to fuel imports to sustain their businesses. They are advocating for a more open sector that allows all players to participate, including calls for the Federal Government to hand over the Port Harcourt Refinery to independent marketers.
</p>
<p>
The situation remains tense, with many filling stations in Abuja and Lagos still waiting for petrol supplies. IPMAN representatives indicate that if current conditions persist, they may be compelled to import their petrol to continue operations. Dr. Muda Yusuf, CEO of the Centre for the Promotion of Private Enterprise, emphasized the need for transparency regarding the pricing and operational frameworks of this new arrangement
</p>
                </div>
        
          
        <div class="news1">
             <h2>
             New Pump Price; NNPC To Sell Dangote Petrol N950 In Lagos, N992 In Abuja, N1,019 In Borno</h2>
          <img src="../images/news/pic2.png" height="400px" width="650px" alt="">
             <p>The Nigerian National Petroleum Company has released a breakdown of estimated prices of Premium Motor Spirit (Petrol) from Dangote Refinery in retail stations across the country based on September 2024 pricing.

             The Spokesperson of NNPCL, Olufemi Soneye disclosed this in a statement on Monday.

The company confirmed that it is paying Dangote Refinery in United States Dollars for the September 2024 PMS offtake.
            </p>
            <p>
            The state-owned company stressed that the Dangote Refinery Petrol gantry was bought at N898.78 per liter.

Consequently, the estimated cost price of petrol in Lagos, plus logistics, will stand at N950.22 per litre.

In other locations like Federal Capital Territory (Abuja), Sokoto, and Kano states, petrol will be sold at estimated prices of N999.22 per litre.
</p>
<p>
Rivers, Bayelsa, Akwa Ibom, Imo, and other states stood at N980, while Oyo State stood at N960.22.

Lastly, the highest pump price will be in Borno State which stood at N1,019.22 per liter
</p>
<p>
“The NNPC Ltd also wishes to state that, in line with the provisions of the Petroleum Industry Act (PIA), PMS prices are not set by the Government, but negotiated directly between parties at an arm’s length.

“The NNPC Ltd can confirm that it is paying Dangote Refinery in USD for September 2024 PMS offtake, as Naira transactions will only commence on October 1st, 2024.

“The NNPC Ltd assures that if the quoted pricing is disputed, it will be grateful for any discount from the Dangote Refinery, which will be passed on 100 percent to the general public.

“Attached to this statement are the estimated pump prices of PMS (obtained from the Dangote Refinery) across NNPC Retail Stations in the country, based on September 2024 pricing”, he stated.
</p>
<p>
Earlier Dangote Group Spokesperson, Anthony Chiejina faulted NNPCL’s statement that it bought Dangote Refinery petrol at N898 per liter upon the start of petrol supply by the Refinery.

This comes as NNPCL lifted petrol from Dangote Refinery on Sunday.
</p>
                </div>
                
                 <div class="news1">
             <h2>NUPRC Unveils 2024 Oil Sector Growth Plan, Set to Conclude Deep Offshore Licensing Bid Round</h2>
          <img src="../images/news/pic3.png" height="400px" width="650px" alt="">
             <p>The spot charter rates for shipping U.S. liquefied natural gas to Europe have just turned negative, suggesting that there are now too many LNG vessels in the Atlantic region but fewer requirements, according to LNG freight price assessor Spark Commodities.
                     </p>
                     <p>
            In December and January, dozens of cargoes of U.S. LNG flocked to Europe, which had a record-high natural gas price amid the gas and energy crisis. The crisis pushed regional LNG prices way above the Asian LNG benchmark and 14 times higher than the U.S. Henry Hub price. Tankers were not only traveling between the U.S. and Europe, but many were also diverted away from Asia to Europe as spot sellers took advantage of the higher gas prices in Europe.
            </p>
                </div>
                
                 <div class="news1">
             <h2>Gastech 2024: Kyari To Reveal NNPCL’s Strategies For Driving Nigeria’s GDP Growth</h2>
          <img src="../images/news/pic4.png" height="400px" width="650px" alt="">
             <p>The Group Chief Executive Officer of the Nigerian National Petroleum Company Ltd (NNPCL), Mele Kyari, is set to share his vision for driving Nigeria’s GDP with massive investment in the oil and gas sector.
                     </p>
                     <p>
                     The organisers of Gastech 2024 disclosed this in a post shared on its website and seen by THE WHISTLER.
                     The GCEO will speak on, ‘Delivering a Growth Mandate Through Domestic and International Natural Gas Sector Transformation.’
            </p>
                     <p>
                     The event is scheduled to last from September 17-20, 2024 in Houston, Texas, USA.
            </p>
                     <p>
                     Gastech said, “Mele Kolo Kyari, Group CEO of @nnpclimited will be speaking at the Gastech Strategic Conference. He will deliver an Energy Talk exploring ‘Delivering a growth mandate through domestic and international natural gas sector transformation’.<br>

“In this Energy Talk, moderated by Hala Gorani, Anchor & Correspondent, Mele Kolo Kyari will discuss his vision and strategy for driving GDP growth in Nigeria, both through expanded domestic gas supply and the development of major export projects.
            </p>
                </div>
        </div>
        </div>  
        
        <div class="watch-panel">
         <div class="news1">
             <h2>NUPRC Unveils 2024 Oil Sector Growth Plan, Set to Conclude Deep Offshore Licensing Bid Round</h2>
          <img src="../images/news/pic3.png" height="200px" width="300px" alt="">
             <p>*To drive down average oil output cost in all terrains to below $20/barrel 

*Targets oil production growth of between 1.8m bpd to 2.6m bpd<br>  <strong>Emmanuel Addeh in Abuja </strong></p>
                     <p>
                     The Nigerian Upstream Petroleum Regulatory Commission (NUPRC) has released its 2024 and near-term oil and gas sector regulatory action plan, targeting key deliverables, including the conclusion of the deep offshore oil blocks licensing bid round this year.
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
