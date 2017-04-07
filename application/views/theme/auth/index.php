
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Active Users</h3>

          <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="Users">users
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href=""><i class="fa fa-users"></i>All users</a></li>
                     <li class="divider"></li>
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
                     <li class="divider"></li>
                    <li><a href="<?= site_url('auth/create_group'); ?>"><i class="fa fa-plus"></i>Create role</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">
   


<div id="infoMessage"><?php echo $message;?></div>

						<table  class="table table-bordered table-striped" id="example1">
						   <thead>
							<tr>
								<th>Full name</th>
								<th>Email</th>
								<th>Activated</th>
								<th>Last login</th>
								
								<th><?php echo lang('index_action_th');?></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($users as $user):?>
								<tr>
						            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8'); echo ' '; echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
						          
						            <td><?= htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
						            	<td><?php if($user->active): ?> <span class="label bg-green">yes </span><?php else: ?> <span class="label bg-red">No</span><?php endif; ?></td>
									
							        <td><?= date('d-m-Y H:i:s A',($user->last_login)); ?></td>
								   <td>
									<a href="<?= site_url("auth/edit_user/".$user->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                    <?php if ($user->active): ?><a href="<?= site_url("auth/deactivate/".$user->id); ?>" data-toggle="tooltip"  title="deactivate" class="btn btn-danger btn-xs"><i class="fa fa-lock"></i></a> <?php else: ?> <a href="<?= site_url("auth/activate/".$user->id); ?>" data-toggle="tooltip"  title="activate" class="btn btn-success btn-xs"><i class="fa fa-unlock"></i></a> <?php endif; ?>
                                    <a href="<?= site_url("auth/change_password/".$user->id); ?>" data-toggle="tooltip"  title="change password" class="btn btn-info btn-xs"><i class="fa fa-refresh"></i></a>
									</td>
								</tr>
							<?php endforeach;?>
							</tbody>
                      </table>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

        

