<!--ADD NEW PRODUCT MODAL -->
  <!-- Button trigger modal -->
  <button type="button" id="addProduct_model" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Add Product</h4> 
          <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="form-group1"> 
        <h5 class="mb-2 text-muted">Create new product details</h5>
                         <label for="InputEmail">Product name</label>
                         <input type="text"class="form-control" id="ProductName" aria-describedby="ProductName" placeholder="Enter product name" name="product"> 
        </div>
        <div class="form-group1"> 
              <label for="Symbols">Select symbol</label>
              <select id="symbols" class="form-control">
                  <?php include("./symbols.php")?>
              </select> 
            </div>
            <div class="form-group1"> 
            <label for="checkbox">Status </label>
          <input class="form-check-input" type="checkbox"  id="status" value="Available" checked> 
          <label class="form-check-label" for="flexSwitchCheckDefault">Available</label>
            </div>
            <div class="form-group1"> 
                  <label for="InputPrice">Price</label>
                    <input type="number" class="form-control" id="Price" aria-describedby="price" placeholder="Enter product price" name="price">   
            </div> 
            <div class="form-group1">
               <h6 class="form-group1" id="error"><small></small></h6> 
              </div>
              <div class="form-group1">
              <button type="button" id="btn-save-product" class="btn btn-primary btn-block" name="save">Save</button>   
              </div> 
        </div>
        
      </div>
      </div>
    </div>
  </div> 