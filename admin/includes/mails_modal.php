

<!-- Add -->
<div class="modal fade" id="sendmail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

              <h4 class="modal-title"><b>Send an email to <?php echo $who; ?>!</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="send_email.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Email subject</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="subject"  required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control"  name="reciever" value="<?php if(isset($user['id'])){echo $user['id']; } else{echo '2';} ; ?>">
                  </div>
                </div>

                <br>
                <p><b>Email body</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="mail_text" rows="10" cols="80" required></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="sendmail"><i class="fa fa-paper-plane"></i> SEND</button>
              </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>