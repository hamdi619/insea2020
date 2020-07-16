

<!-- validate -->
<div class="modal fade" id="validate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Validate</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="validate_doc.php">
                <input type="hidden" class="userid" name="userid" value="<?php echo $user['id']; ?>">
                <div class="text-center">
                    <h2 class="bold productname"></h2>
                    <p>By validating this student he will be able to download the registration certificate</p>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="validate"><i class="fa fa-check"></i> Validate</button>
              </form>
            </div>
        </div>
    </div>
</div>
