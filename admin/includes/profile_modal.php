
<!-- Mail details -->
<div class="modal fade" id="mail_body">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Email</b></h4>
            </div>
            <div class="modal-body">
              <p>
                <div>
                <b style="color: green">Sender :</b> <span id="sender"></span>
                <span class="pull-right"><b style="color: green">Date:</b> <span  id="sent_date"> </span></span>
                </div>
                
                <br><br>
                <b style="color: green">Subject : </b><span id="mail_subject"></span>
                <br>
                <b style="color: green">Body : </b><br><span id="mail_text"></span>                
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>