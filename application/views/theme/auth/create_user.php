
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form class="form-horizontal" method="post" action="<?= site_url('auth/create_user') ?>">
            <div class="box box-success">
        <div class="box-header with-border">
                <h3 class="box-title">Create user</h3>

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
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

          <div class="form-group">
                  <label for="company" class="col-sm-2 control-label">Department</label>

                  <div class="col-sm-10">
                    <?php echo form_input($company);?>
                  </div>
          </div>

            <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($email);?>
                  </div>
               </div>

            <div class="form-group">
                  <label for="phone" class="col-sm-2 control-label">Phone</label>

                  <div class="col-sm-10">
                    <?php echo form_input($phone);?>
                  </div>
               </div>
            <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($password);?><span><?= form_error('password'); ?></span>
                  </div>
               </div>
           <div class="form-group">
                  <label for="password_confirm" class="col-sm-2 control-label">Confirm Password<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($password_confirm);?><span><?= form_error('password_confirm'); ?></span>
                  </div>
               </div>
             <div class="box-footer">
             <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', lang('create_user_submit_btn'),'class="btn btn-xs btn-success pull-right"');?>
        </div>

    



            </div><!-- /.box-body -->
           </div><!--box box-success-->

       <?php echo form_close();?>
          </div>
          </div>
       </section>


