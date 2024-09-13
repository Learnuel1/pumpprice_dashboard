
<!--SEARCH WATCH PRODUCT MODAL -->
  <!-- Button trigger modal -->
  <button type="button" id="btn_watchlist_search_modal" data-bs-toggle="modal" data-bs-target="#watchlist_modal"> 
  </button>
  
  <!-- Modal SEARCH WATCH -->
  <div class="modal fade" id="watchlist_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Search products</h4> 
          <button type="button" id="btn_close_watch_search" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class=search-panel id=watchsearch> <input type=text id=watchlist_searchtext  class=searchtext placeholder='search product' spellcheck=false><a class=button> <i class='fa fa-search search-icon' aria-hidden=true></i></a> <hr class=separator> </div>
        <div class="watch_container" id="watch_container">
      
        </div>
        </div>
        
      </div>
      </div>
    </div>