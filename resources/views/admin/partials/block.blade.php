<!-- The Modal -->
<div class="modal fade" id="modal-block">
  <div class="modal-dialog">
    <form action="" method="POST" id="block">
    @csrf
    <input type="hidden" name="status" id="status" value="">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title message"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
          Are you sure want to <strong class="message"></strong> this?
          </div>
         </div>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="button" class="btn" data-dismiss="modal">Close</button>
      </div>
      
    </div>
    </form>
  </div>
</div>