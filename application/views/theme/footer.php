

              <div class="col-md-3">

                <!-- box listing -->
                <div class="block-section-sm box-list-area">
                  <!-- item list -->  
                  <div class="box-list">
                    <div class="item">
                      <div class="row">                        
                        <div class="col-md-11">
                        <?php 
                        foreach ($numberoforders as $num ) {
                                if($num->orderstatusid==1){
                                   $public=$num->cnt;
                                }elseif($num->orderstatusid==2){
                                   $submited=$num->cnt;;
                                }elseif($num->orderstatusid==4){
                                   $revision=$num->cnt;
                                }
                        
                        }                        
                        ?>
                            <div>
				<img src="<?= base_url() ?>/images/pass.jpg" alt="" width="40%">
				<?php echo $this->session->userdata('Firstname'); ?> <?php echo $this->session->userdata('Lastname'); ?>Grace Ramtu
                            </div>
			    <div>
				<h3 class="no-margin-top"><a href="<?= base_url() ?>orders/all_orders" class="">Public Orders</a></h3>
			    </div>
			    <div>
				<h3 class="no-margin-top"><a href="<?= base_url() ?>orders/all_orders" class="">Applied Public Orders(<?php echo $public; ?>)</a></h3>
			    </div>
			    <?php if($this->session->userdata('groupid')==2){ ?>
			    <div>
				<h3 class="no-margin-top"><a href="<?= base_url() ?>orders/all_orders" class="">Private Orders(<?php 
				
				?>)</a></h3>
			    </div>
			    <?php } ?>
			    <div>
				<h3 class="no-margin-top"><a href="<?= base_url() ?>orders/all_orders" class="">Submitted Orders(<?php echo $submited; ?>)</a></h3>
			    </div>
			    <div>
				<h3 class="no-margin-top"><a href="<?= base_url() ?>orders/all_orders" class="">Revision Orders(<?php  ?>)</a></h3>
			    </div>
			    <div>
				<h3 class="no-margin-top"><a href="<?= base_url() ?>files/files" class="">Files</a></h3>
			    </div>
			    <div>
				<h3 class="no-margin-top"><a href="<?= base_url() ?>payments/payments" class="">Payments</a></h3>
			    </div>
			    <div>
				<h3 class="no-margin-top"><a href="<?= base_url() ?>profile/profile" class="">Profile</a></h3>
			    </div>                        
                        </div>
                      </div>
                    </div><!-- end item list -->
                  </div>                 

                </div><!-- end box listing -->


              </div>
              
              <!--<div class="col-md-3">


              </div>-->
            </div>
          </div>
        </div>  
      </div><!--end body-content -->
<!-- main-footer -->
      <footer class="main-footer">


        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <ul class="list-inline link-footer text-center-xs">
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-sm-6 ">
              <p class="text-center-xs hidden-lg hidden-md hidden-sm">Stay Connect</p>
              <div class="socials text-right text-center-xs">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </footer><!-- end main-footer -->
    </div><!-- end wrapper page -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url() ?>assets/plugins/jquery.js"></script>
    <script src="<?= base_url() ?>assets/plugins/jquery.easing-1.3.pack.js"></script>
    <!-- jQuery Bootstrap -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap-3.3.2/js/bootstrap.min.js"></script>
    <!-- Lightbox -->
    <script src="<?= base_url() ?>assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Theme JS -->
    <script src="<?= base_url() ?>assets/theme/js/theme.js"></script>

    <!-- maps -->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script> 
    <script src="<?= base_url() ?>assets/plugins/gmap3.min.js"></script>
    <!-- maps single marker -->
    <script src="<?= base_url() ?>assets/theme/js/map-detail.js"></script>

    <!-- page script -->
<script>
  $(function () {
   
    $('#example1').DataTable({
      
      "processing":true,
      "searching": true,
     
    });
   

      $('#datepicker').datepicker({
      autoclose: true
    });
        $('#altdatepicker').datepicker({
      autoclose: true
    });
  });



</script>
<script >
  $('#select_all').click(function(event) {
  if(this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
          this.checked = true;
      });
  }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }


});
</script>

</body>

</html>
