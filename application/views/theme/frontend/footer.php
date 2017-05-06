

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
				<?php echo $this->session->userdata('first_name'); ?> <?php echo $this->session->userdata('groupid'); ?>
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
              

 
<div class="footer-bottom">
<div class="wrap">
   <div class="copy-right">
     <p>Copyright 2017. All Rights Reserved</p>
   </div>
  <div class="copy">
     
   </div>
</div>
</div>
</body>
</html>