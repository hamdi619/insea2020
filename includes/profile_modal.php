
<!-- Mail details -->
<div class="modal fade" id="mail_body">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Notification</b></h4>
            </div>
            <div class="modal-body">
              <p>
                <div>
                <b style="color: green">Information :</b> <span id="type"></span>
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

<!-- Edit Profile -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Update Account</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="profile_edit.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname ar</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname_ar" name="firstname_ar" value="<?php echo $user['firstname_ar']; ?>">
                    </div>
                </div>                
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname ar</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname_ar" name="lastname_ar" value="<?php echo $user['lastname_ar']; ?>">
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-3 control-label">Gender</label>
                    <div class="row col-sm-9">
                        <div class="custom-control custom-radio custom-control-inline col-xs-4">
                          <input type="radio" name="sex" class="custom-control-input" id="male" value="1" <?php if ($user['sex']==1) {
                            echo 'checked="checked"';
                          } ; ?> >
                          <label class="custom-control-label" for="male">male</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline col-xs-4">
                          <input type="radio" name="sex" class="custom-control-input" id="female" value="0" <?php if ($user['sex']==0) {
                            echo 'checked="checked"';
                          } ; ?>  >
                          <label class="custom-control-label" for="female">female</label>
                        </div>
                    </div>
                </div> 

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Phone number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">CIN</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="cin" name="cin" value="<?php echo $user['cin']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">CNE</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="cne" name="cne" value="<?php echo $user['cne']; ?>">
                    </div>
                </div>                                
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="city" name="city"><?php echo $user['adress']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Birthday</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo $user['birthday']; ?>">
                    </div>
                </div>                 
          
         <div class="form-group">
            <label for="select-box1" class="label select-box1 col-xs-3"><span class="label-desc">choisissez votre cycle</span> </label>
            <div class="select-box col-xs-9" >
                <select  class="select" name="cycle" id="cycle"  style="width: 100%" required>
                    <option value="" selected disabled hidden>Cycle</option>
                    <option value="1" <?php if ($user['cycle']==1) {echo 'selected';}; ?> >Cycle ingénieurs d’Etat</option>
                    <option value="2" <?php if ($user['cycle']==2) {echo 'selected';}; ?> >Cycle Master</option>
                    <option value="3" <?php if ($user['cycle']==3) {echo 'selected';}; ?> >Cycle Doctorat</option>
                </select>
            </div>
          </div>
        <div class="form-group">
          <label for="select-box" class="label select-box1 col-xs-3"><span class="label-desc">choisissez votre filiere</span> </label>     
          <div class="select-box col-xs-9"  >
            <select  class="select" style="width: 100%" name="filiere" id="filiere"  value="" required>
              <option value="" selected disabled hidden>Filiere</option>
            </select>
          </div>
        </div> 

        <!-- année et reserve -->
        <div class="form-group">
            <label for="select-box1" class="label select-box1 col-xs-3"><span class="label-desc">choose your year</span> </label>          
            <div class="select-box col-xs-9" >
                <select  class="select"  style="width: 100%" name="year" id="annee"  value="<?php echo (isset($_SESSION['year'])) ? $_SESSION['year'] : '' ?>" required>
                    <option value="" selected disabled hidden>Year</option>
                </select>
            </div>
        </div>   

        <div class="form-group"> 
            <label for="select-box1" class="label select-box1 col-xs-3"><span class="label-desc">Reserve</span> </label>            
            <div class="select-box col-xs-9"  >
                <select  class="select " style="width: 100%" name="reserve" value="<?php echo (isset($_SESSION['reserve'])) ? $_SESSION['reserve'] : '' ?>" required>
                    <option value="" selected disabled hidden>Reserve</option>
                    <option value="1" selected="selected">Oui</option>
                    <option value="0">Non</option>

                </select>
            </div>
        </div>   
        <br>              
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="copy_cin" class="col-sm-3 control-label">Carte National</label>

                    <div class="col-sm-9">
                      <input type="file" id="copy_cin" name="copy_cin">
                    </div>
                </div>
                <div class="form-group">
                    <label for="copy_bac" class="col-sm-3 control-label">Copie BAC</label>

                    <div class="col-sm-9">
                      <input type="file" id="copy_bac" name="copy_bac">
                    </div>
                </div>
                <div class="form-group">
                    <label for="attestation" class="col-sm-3 control-label">Attestation réusite</label>

                    <div class="col-sm-9">
                      <input type="file" id="attestation" name="attestation">
                    </div>
                </div>
                                                                
                <hr>
                
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>


