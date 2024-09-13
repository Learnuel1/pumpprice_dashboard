      <!--REGISTRATION SUCCESSFUL MODAL--> 
 
  <!-- Button trigger modal -->
  <button type="button" id="btn_notify_model" data-bs-toggle="modal" data-bs-target="#notify_modal"> 
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="notify_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Complete </h4> 
          <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <h5><?php echo $Registration  ?></h5> 
        <div class="modal-footer">
        <button type="button" id="btn_notification_OK" class="btn btn-secondary custome" data-bs-dismiss="modal">Ok</button> 
      </div>
        
      </div>
      </div>
    </div>
  </div> 
  </div>