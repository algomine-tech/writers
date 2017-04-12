 <!-- body-content -->
      <div class="body-content clearfix" >

        <!-- link top -->
        <div class="bg-color2 block-section-xs line-bottom">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 hidden-xs">
                <div></div>
              </div>
              <div class="col-sm-6">
                <div class="text-right"><a href="#"></a></div>
              </div>
            </div>
          </div>
        </div><!-- end link top -->

        <div class="bg-color2">
          <div class="container">
            <div class="row">
              <div class="col-md-9">

                <!-- box item details -->
                <div class="block-section box-item-details">
                  <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                      <p class="text-right"><a href="#"></a></p>
                    </div>
                  </div>

                  <h2 class="title"><a href="#">List Of Available Users</a></h2>
                  <div class="job-meta">
                  </div>
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
                </div><!-- end box item details -->

              </div>
              <div class="col-md-3">

                <!-- box affix right -->
                <div class="block-section " id="affix-box">
                  <div class="text-right">
                    <p><a href="#" class="btn btn-theme btn-line dark btn-block-xs">Login</a></p>
                    <p><a href="#modal-apply"  data-toggle="modal" class="btn btn-theme btn-t-primary btn-block-xs">Apply For A Job</a></p>
                  </div>
                </div><!-- box affix right -->
                <div class="modal fade" id="modal-apply">
          <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header ">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" style="text-align: center; ">REGiSTER AS A :</h4>
                </div>
                <div class="modal-body" style="background: red; ">
                  <h3 class="modal-title" style="text-align: center; "><a href="<?= site_url("auth/create_user/Writer"); ?>" style="color: white;"> WRITER</a></h3>
                </div>
                <div class="modal-body" style="background: blue; ">
                  <h3 class="modal-title" style="text-align: center; "><a href="<?= site_url("auth/create_user/Editor_A"); ?>" style="color: white;">EDITOR A</a></h3>
                </div>
                <div class="modal-body" style="background: green; ">
                  <h3 class="modal-title" style="text-align: center; "><a href="<?= site_url("auth/create_user/Editor_B"); ?>" style="color: white;">EDITOR B</a></h3>
                </div>
            </div>
          </div>
        </div><!-- end modal  apply -->
              </div>
            </div>
          </div>
        </div>
        <!-- modal apply -->
        
      </div><!--end body-content -->