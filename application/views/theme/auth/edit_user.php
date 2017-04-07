 <!-- body-content -->
      <div class="body-content clearfix" >

        <div class="bg-color2 block-section line-bottom">
          <div class="container">
            <h1 class="text-center no-margin">Edit Profile</h1>
          </div>
        </div>

        <div class="bg-color1 block-section line-bottom">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">

                <!-- form post a job -->
                <?= form_open(uri_string(), 'class="form-horizontal"') ?>
            <div id="infoMessage"><?php echo $message;?></div>



       <div class="form-group">
                  <label for="first_name">First Name<span style="color:red">*</span></label>
                    <?php echo form_input($first_name);?><span><?= form_error('first_name'); ?></span>
               </div>
        <div class="form-group">
                  <label for="first_name">Other names<span style="color:red">*</span></label>
                    <?php echo form_input($last_name);?><span><?= form_error('last_name'); ?></span>
               </div>
      

        <div class="form-group">
                  <label for="company">Location</label>
                    <?php echo form_input($location);?>
          </div>

     <div class="form-group">
                  <label for="phone">Phone</label>
                    <?php echo form_input($phone);?>
               </div>

    <div class="form-group">
                  <label for="password"><?php echo lang('edit_user_password_label', 'password');?><span style="color:red">*</span></label>
                    <?php echo form_input($password);?>
               </div>
            <div class="form-group">
                  <label for="password_confirm"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>
                    <?php echo form_input($password_confirm);?><span><?= form_error('password_confirm'); ?></span>
               </div>

     
    
      <?php if ($this->ion_auth->is_admin()): ?>
     <div class="form-group">
          <label class="col-sm-2 control-label">Associated Roles</label>
             <div class="col-sm-10">
          <?php foreach ($groups as $group):?>
          
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
             
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              
              </label>
             
          <?php endforeach?>
            </div>
      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
      <div class="form-group">
     <button type="reset" class="btn btn-theme btn-danger pull-left"> cancel </button>
      <?php echo form_submit('submit', 'Save user','class="btn btn-theme btn-success pull-right"');?>
        </div>
      </div>
     
        <?php echo form_close();?>
            </div><!-- /.box-body -->
       
                <!-- end form post a job -->
              </div>
            </div>
          </div>
        </div>        
      </div><!--end body-content -->