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

 <!-- body-content -->
      <div class="body-content clearfix" >

        <div class="bg-color2">
          <div class="container">
            <div class="col-md-3 col-sm-3">

              <div class="block-section text-center ">
               <img src="<?= base_url() ?>/images/pass.jpg" alt="" width="50%" class="img-rounded" style="border:1px solid #ccc ;">
                <div class="white-space-20"></div>
                <h4><?= $this->session->userdata('first_name'); ?> &nbsp; <?= $this->session->userdata('last_name'); ?></h4>
                <div class="white-space-20"></div>
                <ul class="list-unstyled">
                  <li style="border-bottom:2px solid #ccc;"><a href="<?= base_url() ?>orders/all_orders" style="color:#34a527">Public Orders</a></li>

          <div>
        <li style="border-bottom:2px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/<?php echo 1; ?>" style="color:#34a527">Applied Public Orders(<?php echo $public; ?>)</a></li>
          </div>
          <?php if($this->session->userdata('groupid')==2){ ?>
          <div>
        <li style="border-bottom:2px solid #ccc"><a href="<?= base_url() ?>orders/load_orders" style="color:#34a527">Private Orders(<?php 
        
        ?>)</a></li>
          </div>
          <?php } ?>
          <div>
        <li style="border-bottom:2px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/2" style="color:#34a527">Submitted Orders(<?php echo $submited; ?>)</a></li>
       
        <li style="border-bottom:2px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/4" style="color:#34a527">Revision Orders(<?php echo $revision; ?>)</a></li>
          </div>
          <?php if($this->session->userdata('groupid')==3 or $this->session->userdata('groupid')==4){ ?>
          <div>
        <li style="border-bottom:2px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/7" style="color:#34a527">Resubmited For Revision Orders(<?php echo $resubmition; ?>)</a></li>
          </div>
          <?php } ?>
          <div>
        <li style="border-bottom:2px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/3" style="color:#34a527">Approved Orders(<?php echo $approved; ?>)</a></li>
          </div>
          <div>
        <li style="border-bottom:2px solid #ccc"><a href="<?= base_url() ?>orders/load_orders/5/6" style="color:#34a527">Archived Orders(<?php echo ($accepted+$rejected); ?>)</a></li>
          </div>
          <div>

         </ul>
                <div class="white-space-20"></div>
               
              </div>    </div>
            <div class="col-md-9 col-sm-9">
              <!-- Block side right -->
              <div class="block-section box-side-account">
                <h3 class="no-margin-top">Change password for <strong><?= $this->session->userdata('first_name'); ?> &nbsp; <?= $this->session->userdata('last_name'); ?></strong></h3>
                <hr/>
                <div class="row">
                  <div class="col-md-7">
                    <?php echo form_open("auth/change_password",'class="form-horizontal"');?>
                  
                      <div class="form-group">
                        <label><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?><span style="color:red">*</span></label>
                         <?php echo form_input($new_password);?><span><?= form_error('new'); ?></span>
                      </div>
                      <div class="form-group">
                        <label>Re-type New Password</label>
                        <?php echo form_input($new_password_confirm);?><span><?= form_error('new_confirm'); ?></span>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-theme btn-t-primary">Change Password</button>
                      </div>
                      <?php echo form_input($user_id);?>
                   <?php echo form_close();?>
                  </div>
                </div>
              </div><!-- end Block side right -->
            </div>
          </div>
        </div>        
      </div><!--end body-content -->
