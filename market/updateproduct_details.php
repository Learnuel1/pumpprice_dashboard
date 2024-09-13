


<!-- UPDATE PRODUCT DETAILS MODEL--> 
  <!-- Button trigger modal -->
  <button type="button" id="updateProduct_model" data-bs-toggle="modal" data-bs-target="#UpdateProductDetails"> 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="UpdateProductDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Update Product</h4> 
          <button type="button" id="btn-close-details_update" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="form-group1"> 
        <h5 class="mb-2 text-muted">Update product details</h5>
              <label for="Products">Select product</label>
              <select id="productsName" class="form-control">
                  <!-- <option value="select">Select</option> -->
                  <!-- dynamically add options -->
              </select> 
            </div>
        <div class="form-group1">  
                         <label for="InputEmail">New name</label>
                         <input type="text"class="form-control" id="ProductNewName" aria-describedby="ProductNewName" placeholder="Enter product new name" name="product"> 
        </div> 
            <label for="Symbols">Select symbol</label>
              <select id="symbols" class="form-control">
                  <!-- <option value="select">Select</option>
                  <option value="AGO">AGO</option>
                  <option value="DSK">DSK</option>
                  <option value="Kero">Kero</option>
                  <option  value="Oil">Oil</option> -->
                  <?php include("./symbols.php") ?>
              </select> 
            <div class="form-group1"> 
            <label for="checkbox">Status </label>
          <input class="form-check-input" type="checkbox"  id="status" value="Available" checked> 
          <label class="form-check-label" for="flexSwitchCheckDefault">Available</label>
            </div> 
           
          <div class="form-group1">
             <h6 class="form-group1 error" id="product_error"><small></small></h6> 
            </div>
            <div class="form-group1">
              <button type="button" id="btn-save-productupdate" class="btn btn-primary btn-block" name="save">Save</button>   
              </div> 
        </div>
        
      </div>
      </div>
    </div>
  </div>