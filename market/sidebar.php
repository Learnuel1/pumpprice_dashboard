<div class="content myside-bar"> 
                  <div class="user-details">
                      <div class="text">
                          <h4 class="text-heading"><strong><i class="fa fa-user-circle-o" aria-hidden="true"></i> </strong> </h4>
                          <h3 class="text-details"> 
                            <?php echo $_SESSION["Email"]; ?></h4>
                          <!-- <h4 class="text- heading"> <strong>Username</strong></h4> -->
                      </div> 
                  </div>
                  <div class="logout" id="logout">
                  <a class="logout-icon"  href="../index.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
                  </div>
                
                <div class="items">
                     <ul class="btn">
                          <li class="btn-list active-btn" id="dashboard">
                              <a class="btn-list-item active-list" id="dashboard_links" href="./dashboard.php" >Dashboard</a>
                          </li> 
                          <li class="btn-list"  >
                              <a class="btn-list-item" id="addProduct">  New product</a>
                          </li>
                          <li class="btn-list"  id="updateprice_links" >
                              <a class="btn-list-item"  href="./updateProduct.php" id="updateProduct">Update product</a>
                          </li>
                          <li class="btn-list" >
                              <a class="btn-list-item" id="updatePrice" >Update price</a>
                          </li>
                          <li class="btn-list"id="">
                              <a class="btn-list-item" href="./pumpprice.php" target="_blank">Market</a>
                          </li>
                          <li class="btn-list"id="">
                              <a class="btn-list-item" href="./#">Profile</a>
                          </li>
                          <li class="btn-list"id="">
                              <a class="btn-list-item" href="./#">Account</a>
                          </li>
                      </ul>
                </div>
        </div>  
         