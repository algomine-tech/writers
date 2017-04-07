
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <?= form_open(uri_string(), 'class="form-horizontal"') ?>
            <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit User</h3>
           
                   <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="Users">users
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('auth/index')?>"><i class="fa fa-users"></i>All users</a></li>
                     
                    <li><a href="<?= site_url('auth/create_user'); ?>"><i class="fa fa-plus"></i>Create user</a></li>
                   
                  </ul>
                </div>
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="Users">Role
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href=""><i class="fa fa-list"></i>All Roles</a></li>
                    
                    <li><a href="<?= site_url('auth/create_group'); ?>"><i class="fa fa-plus"></i>Create role</a></li>
                   
                  </ul>
                </div>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
<div id="infoMessage"><?php echo $message;?></div>



       <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">Surname<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($first_name);?><span><?= form_error('first_name'); ?></span>
                  </div>
               </div>
        <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">Other names<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($last_name);?><span><?= form_error('last_name'); ?></span>
                  </div>
               </div>
      

        <div class="form-group">
                  <label for="company" class="col-sm-2 control-label">Department</label>

                  <div class="col-sm-10">
                    <?php echo form_input($company);?>
                  </div>
          </div>

     <div class="form-group">
                  <label for="phone" class="col-sm-2 control-label">Phone</label>

                  <div class="col-sm-10">
                    <?php echo form_input($phone);?>
                  </div>
               </div>

    <div class="form-group">
                  <label for="password" class="col-sm-2 control-label"><?php echo lang('edit_user_password_label', 'password');?><span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($password);?>
                  </div>
               </div>
            <div class="form-group">
                  <label for="password_confirm" class="col-sm-2 control-label"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>

                  <div class="col-sm-10">
                    <?php echo form_input($password_confirm);?><span><?= form_error('password_confirm'); ?></span>
                  </div>
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
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Save user','class="btn btn-xs btn-success pull-right"');?>
        </div>

<?php echo form_close();?>

            </div><!-- /.box-body -->
           </div><!--box box-success-->
          </div>
          </div>
       </section>


