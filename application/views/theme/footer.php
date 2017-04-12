

              <div class="col-md-3">

                <!-- box listing -->
                <div class="block-section-sm box-list-area">
                  <!-- item list -->  
                  <div class="box-list">
                    <div class="item">
                      <div class="row">                        
                        <div class="col-md-11">
                        <?php 
                        $public=0;
                        $submited=0;
                        $revision=0;
                        $approved=0;
                        $accepted=0;
                        $rejected=0;
                        $resubmition=0;
                         if(empty($numberoforders)){
				  $numberoforders=array();
			 }
			       
                        foreach ($numberoforders as $num ){
                                if($num->orderstatusid==1){
                                   $public=$num->cnt;
                                }elseif($num->orderstatusid==2){
                                   $submited=$num->cnt;;
                                }elseif($num->orderstatusid==3){
                                   $approved=$num->cnt;;
                                }elseif($num->orderstatusid==4){
                                   $revision=$num->cnt;
                                }elseif($num->orderstatusid==5){
                                   $accepted=$num->cnt;
                                }elseif($num->orderstatusid==6){
                                   $rejected=$num->cnt;
                                }elseif($num->orderstatusid==7){
                                   $resubmition=$num->cnt;
                                }
                        
                        }    
                        
                        if(empty($ratings)){
				  $ratings=array();
			}
			
                        foreach ($ratings as $rate ){
                               if($rate->rate==1){
				   $rate->rate='High School';
                               }elseif($rate->rate==2){
                                   $rate->rate='College Level';
                               }elseif($rate->rate==3){
                                   $rate->rate='University Level';
                               }
                               elseif($rate->rate==4){
                                   $rate->rate='Masters Level';
                               }
                               elseif($rate->rate==5){
                                   $rate->rate='PHD Level';
                               }
                        }
                     
                        ?>
                            <div>
				<img src="<?= base_url() ?>/images/pass.jpg" alt="" width="40%">
				<?php echo $this->session->userdata('Firstname'); ?> <?php echo $this->session->userdata('Lastname'); ?>Grace Ramtu
                            </div>
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>orders/all_orders" class="">Public Orders</a></h4>
			    </div>
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>orders/load_orders/<?php echo 1; ?>" class="">Applied Public Orders(<?php echo $public; ?>)</a></h4>
			    </div>
			    <?php if($this->session->userdata('groupid')==2){ ?>
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>orders/load_orders" class="">Private Orders(<?php 
				
				?>)</a></h4>
			    </div>
			    <?php } ?>
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>orders/load_orders/2" class="">Submitted Orders(<?php echo $submited; ?>)</a></h4>
			    </div>
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>orders/load_orders/4" class="">Revision Orders(<?php echo $revision; ?>)</a></h4>
			    </div>
			    <?php if($this->session->userdata('groupid')==3 or $this->session->userdata('groupid')==4){ ?>
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>orders/load_orders/7" class="">Resubmited For Revision Orders(<?php echo $resubmition; ?>)</a></h4>
			    </div>
			    <?php } ?>
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>orders/load_orders/3" class="">Approved Orders(<?php echo $approved; ?>)</a></h4>
			    </div>
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>orders/load_orders/5/6" class="">Archived Orders(<?php echo ($accepted+$rejected); ?>)</a></h4>
			    </div>
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>payments/payments" class="">Payments</a></h4>
			    </div>
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>profile/profile" class="">Profile</a></h4>
			    </div> 
			    <div>
				<h4 class="no-margin-top"><a href="<?= base_url() ?>orders/ratings" class="">Rating:<?php if(!empty($ratings)){ echo $rate->rate; } ?></a></h4>
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
<!--     <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>  -->
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
