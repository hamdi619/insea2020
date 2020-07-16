<!-- image cin modal -->
<div class="modal fade" id="image_cin">
    <div class="modal-dialog" style="height: 800px;width: 800px">

            <div class="modal-body text-center">
              <button type="button" class="btn rotate_image btn-success pull-left" id="rotate_image" >
                  <span aria-hidden="true">Rotate <i class="fa fa-rotate-right"></i></span></button><br><br>

              <img src="<?php echo (!empty($user['copy_cin'])) ? 'images/cin/'.$user['copy_cin'] : 'images/profile.jpg'; ?>" width='100%'  class='thumbnail image_rotate' id="image_rotate">
            </div>

    </div>
</div>

<!-- image bac modal -->
<div class="modal fade" id="image_bac">
    <div class="modal-dialog" style="height: 800px;width: 800px">

            <div class="modal-body text-center">
                <button type="button" class="btn rotate_image btn-success pull-left" id="rotate_image2" >
                    <span aria-hidden="true">Rotate <i class="fa fa-rotate-right"></i></span>
                </button>
                <br><br>     
                <img src="<?php echo (!empty($user['copy_bac'])) ? 'images/bac/'.$user['copy_bac'] : 'images/profile.jpg'; ?>"   class='thumbnail image_rotate center-img'   id="image_rotate2">
            </div>

    </div>
</div>

<!-- image attestation modal -->
<div class="modal fade" id="image_attestation" >
    <div class="modal-dialog" style="height: 800px;width: 800px">

            <div class="modal-body text-center">
              <button type="button" class="btn rotate_image btn-success pull-left" id="rotate_image3" >
                  <span aria-hidden="true">Rotate <i class="fa fa-rotate-right"></i></span></button><br><br>
              <img src="<?php echo (!empty($user['photo'])) ? 'images/attestation/'.$user['copy_attest'] : 'images/profile.jpg'; ?>" width='100%'  class='thumbnail image_rotate' id="image_rotate3">
            </div>

    </div>
</div>
