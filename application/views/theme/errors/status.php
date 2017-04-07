<!-- Main content -->
    <section class="content">
      <div class="row">
             <div class="col-xs-12">
            <div class="box box-primary">
             <div class="box-header with-border">
              <h3 class="box-title">Status Box</h3>
            
            <!-- /.box-header -->
            <div class="box-tools pull-right">
                <a  href="<?= site_url('api/postDatasetValues') ?>"  class="btn btn-success  ajax" title="Post Api Request">
               <i class="fa fa-spin fa-refresh"></i>Refresh </a>
             </div>
            </div>
            
            <div class="box-body">
               <?php  if(isset($error)): ?>  <div class="alert alert-danger"><?= $error; ?></div><?php endif; ?>
               <?php  if(isset($success)): ?>
                      <div class="alert alert-success"><?= $success; ?></div>
                <?php endif; ?>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->
          </div>
          </div>
       </section>