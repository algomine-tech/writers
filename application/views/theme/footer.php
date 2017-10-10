 <div class="col-md-3">

                  <div class="box-list">
                    <div class="item">
                      <div class="row">                        
                        <div class="col-md-12">
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
          My Profile:  <strong><?php echo $this->session->userdata('first_name'); ?> <?php echo $this->session->userdata('last_name'); ?></strong>
				<img src="<?= base_url() ?>/images/pass.jpg" alt="" width="50%" class="img-rounded" style="border:1px solid #ccc ;">
			
                            </div>
                            <hr>
        <ul class="list-unstyled" style="" >
			    <div>
				<li style="border-bottom:3px solid #ccc;"><a href="<?= base_url() ?>orders/all_orders" style="color:#34a527">Public Orders</a></li>
			    </div>
			    <div>
				<li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/<?php echo 1; ?>" style="color:#34a527">Applied Public Orders(<?php echo $public; ?>)</a></li>
			    </div>
			    <?php if($this->session->userdata('groupid')==2){ ?>
			    <div>
				<li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>orders/load_orders" style="color:#34a527">Private Orders(<?php 
				
				?>)</a></li>
			    </div>
			    <?php } ?>
			    <div>
				<li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/2" style="color:#34a527">Submitted Orders(<?php echo $submited; ?>)</a></li>
			 
				<li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/4" style="color:#34a527">Revision Orders(<?php echo $revision; ?>)</a></li>
			    </div>
			    <?php if($this->session->userdata('groupid')==3 or $this->session->userdata('groupid')==4){ ?>
			    <div>
				<li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/7" style="color:#34a527">Resubmited For Revision Orders(<?php echo $resubmition; ?>)</a></li>
			    </div>
			    <?php } ?>
			    <div>
				<li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/3" style="color:#34a527">Approved Orders(<?php echo $approved; ?>)</a></li>
			    </div>
			    <div>
				<li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/5/6" style="color:#34a527">Archived Orders(<?php echo ($accepted+$rejected); ?>)</a></li>
			    </div>
			    <div>
        <li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>Payout/pre" style="color:#34a527">Payments</a></li>
          </div>
          <div>
				<li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>Payout/withdrawal" style="color:#34a527">Transaction Statement</a></li>
			    </div>
			    <div>
        <li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>auth/change_password" style="color:#34a527">Profile</a></li>
          </div>
          <div>
				<li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>progress/index" style="color:#34a527">Progress</a></li>
			    </div> 
			    <div>
				<li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>orders/ratings" style="color:#34a527">Rating:<?php if(!empty($ratings)){ echo $rate->rate; } ?></a></li>
			    </div>
          </ul>
                            
                        </div>
                      </div>
                    </div><!-- end item list -->
                  </div>                 

                </div><!-- end box listing -->


              </div>
              
       
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
   $(function () {
      $('#affix').affix({
         offset: {
            top: 60  
         }
      });
   });
</script>
</body>

</html>
