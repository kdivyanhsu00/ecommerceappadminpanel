<div class="modal fade" id="modal-delete">
  <div class="modal-dialog">
    <form action="" method="POST" id="remove-form">
        @csrf
    <input name="_method" type="hidden" value="DELETE">    
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
            Are you sure want to <strong id="message"></strong>?
            </div>
           
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-create-ad btn-sm" style="width: 100px !important;">Submit</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" style="width: 100px !important;padding: 8px;
    font-size: 16px; margin-top:10px;">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </form>  
    </div>
    <!-- /.modal-dialog -->
  </div>