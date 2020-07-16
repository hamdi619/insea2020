
<!-- edit profile -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Update Account</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_edit.php" enctype="multipart/form-data">
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname ar</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname_ar" name="firstname_ar" >
                    </div>
                </div>                
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname ar</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname_ar" name="lastname_ar" >
                    </div>
                </div>   

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_email" name="email" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="password" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Phone number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_phone" name="phone" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">CIN</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_cin" name="cin" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">CNE</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_cne" name="cne" >
                    </div>
                </div>                                
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_city" name="city"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Birthday</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_birthday" name="birthday" >
                    </div>
                </div>                 
          
         <div class="form-group">
            <label for="select-box1" class="label select-box1 col-xs-3"><span class="label-desc">choisissez votre cycle</span> </label>
            <div class="select-box col-xs-9" >
                <select  class="select" name="cycle" id="cycle"  style="width: 100%" >
                    <option value="" selected disabled hidden>Cycle</option>
                    <option value="1">Cycle ingénieurs d’Etat</option>
                    <option value="2">Cycle Master</option>
                    <option value="3">Cycle Doctorat</option>
                </select>
            </div>
          </div>
        <div class="form-group">
          <label for="select-box" class="label select-box1 col-xs-3"><span class="label-desc">choisissez votre filiere</span> </label>     
          <div class="select-box col-xs-9"  >
            <select  class="select" style="width: 100%" name="filiere" id="filiere"  value="4" >
              <option value="" selected disabled hidden>Filiere</option>
              <option value="1">Actuariat-Finance</option>
              <option value="2">Statistique-Economie Appliqué</option>
              <option value="3">Statistique-Démographie</option>
              <option value="4">Recherche Opérationnelle et Aide à la Décision</option>
              <option value="5">Ingénierie des Données et des Logiciels</option>
              <option value="6">Science des Données</option>
              <option value="7">Sciences, Ingénierie et Développement Durable</option>
              <option value="8">Laboratoire GES3D</option>
              <option value="9">Laboratoire SI2M </option>
              <option value="10">Laboratoire MASAFEQ</option>
            </select>
          </div>
        </div> 

        <!-- année et reserve -->
        <div class="form-group">
            <label for="select-box1" class="label select-box1 col-xs-3"><span class="label-desc">choose your year</span> </label>          
            <div class="select-box col-xs-9" >
                <select  class="select"  style="width: 100%" name="year" id="annee" >
                    <option value="" selected disabled hidden>Year</option>
                    <option value="1">1ere année</option>
                    <option value="2">2eme année</option>
                    <option value="3">3eme année</option>
                    <option value="4">4eme année</option>
                </select>
            </div>
        </div>   

        <div class="form-group"> 
            <label for="select-box1" class="label select-box1 col-xs-3"><span class="label-desc">Reserve</span> </label>            
            <div class="select-box col-xs-9"  >
                <select  class="select " style="width: 100%" name="reserve" value="<?php echo (isset($_SESSION['reserve'])) ? $_SESSION['reserve'] : '' ?>" >
                    <option value="" selected disabled hidden>Reserve</option>
                    <option value="1" selected="selected">Oui</option>
                    <option value="0">Non</option>

                </select>
            </div>
        </div>   
        <br>              

                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>



<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_delete.php">
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                    <p>DELETE USER</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Activate -->
<div class="modal fade" id="activate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Activating...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_activate.php">
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                    <p>ACTIVATE USER</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="activate"><i class="fa fa-check"></i> Activate</button>
              </form>
            </div>
        </div>
    </div>
</div> 


     