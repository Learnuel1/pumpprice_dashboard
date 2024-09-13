


<!-- UPDATE PRODUCT PRICE MODEL--> 
  <!-- Button trigger modal -->
  <button type="button" id="updateProductPrice_model" data-bs-toggle="modal" data-bs-target="#UpdateProductPrice"> 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="UpdateProductPrice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
              <select id="price_product" class="form-control">
                  <!-- <option value="select">select</option> -->
                  <!-- dynamically add options -->
                 
              </select> 
            </div>
            <div class="form-group1"> 
                  <label for="InputPrice">Price</label>
                    <input type="number" class="form-control" id="new_Price" aria-describedby="price" placeholder="Enter new price" name="price">   
            </div> 
            <div class="form-group1"> 
            <label for="checkbox">Status </label>
          <input class="form-check-input" type="checkbox"  id="price_status" value="Available" checked> 
          <label class="form-check-label" for="flexSwitchCheckDefault">Available</label>
            </div> 
          <div class="form-group1">
             <h6 class="form-group1 error" id="price_error"><small></small></h6> 
            </div>
            <div class="form-group1">
              <button type="button" id="productudate_price" class="btn btn-primary btn-block" name="save">Save</button>   
              </div> 
        </div>
        
      </div>
      </div>
    </div>
  </div> 