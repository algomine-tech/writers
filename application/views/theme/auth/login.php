<div class="body-content clearfix" >

        <div class="block-section bg-color4">
          <div class="container">
            <div class="panel panel-md">
              <div class="panel-body">
                <div class="row">

                  <h2 class="title"><a href="#">Writers </a></h2>
                  <hr>
                  <div class="job-meta">
          </div>
                  <div class="col-md-offset-2 col-md-8">
                    <!-- /.login-logo -->
                  <p class="login-box-msg"><div id="infoMessage"><?php echo $message;?></div></p>
                  <?php echo form_open("auth/login");?>
                    <div class="form-group has-feedback">
                         <?php echo form_input($identity);?>
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <?php echo form_input($password);?>
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                 
                      <!-- /.col -->
                      <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                      </div>
                      <!-- /.col -->
                    </div>
                  <?php echo form_close();?>
                <!-- /.login-box-body -->

                  </div>
                </div>
              </div>
            </div>
            <div class="white-space-20"></div>
          </div>
        </div>
      </div><!--end body-content -->
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>