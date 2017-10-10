<!-- body-content -->
      <div class="body-content clearfix" >

        <!-- link top -->
        <div class="bg-color2 block-section-xs line-bottom">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 hidden-xs">
                <div>Job details :</div>
              </div>
              <div class="col-sm-6">
                 <div class="text-right"><a href="<?= site_url('orders/all_orders'); ?>">&laquo; Go back to public orders</a></div>
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
                  
            <h3 align="center">Progress of my Work Orders</h3>

            <table class="table table-bordered">
               <thead>
                 <tr>
                   <td>Topic</td>
                   <td>status</td>
                   <td>Progress</td>
                 </tr>
               </thead>
               <tbody>
                 <?php
                 if(!empty($this->session->flashdata('message'))){?>
                 alert("<?php echo $this->session->flashdata('message'); ?>");
                 <?php } ?>
                 </script>
                 <?php foreach ($progress as $progress): ?>  
                  <tr>
                    <?php if ($progress->orderstatusid == 1): ?>
                       <td><?= $progress->topic ?></td>
                       <td>On-Progress</td> 
                       <td>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100" style="width:8%">
                          8%
                        </div>
                      </div>
                      </td>
                    <?php endif ?>
                    <?php if ($progress->orderstatusid == 2): ?>
                        <td><?= $progress->topic ?></td>
                        <td><small>Submitted</small></td>
                        <td>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width:28%">
                          28%
                        </div>
                      </div>
                      </td>
                    <?php endif ?>
                    <?php if ($progress->orderstatusid == 3): ?>
                        <td><?= $progress->topic ?></td>
                        <td><small>Approved</small></td>
                        <td>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width:42%">
                          48%
                        </div>
                      </div>
                      </td>
                    <?php endif ?>
                    <?php if ($progress->orderstatusid == 4): ?>
                        <td><?= $progress->topic ?></td>
                        <td><small>Revision</small></td>
                        <td>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100" style="width:14%">
                          18%
                        </div>
                      </div>
                      </td>
                    <?php endif ?>
                    <?php if ($progress->orderstatusid == 5): ?>
                       <td><?= $progress->topic ?><td>
                       <td><small>Accepted</small></td>
                        <td><div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                          100%
                        </div>
                      </div>
                      </td>
                    <?php endif ?>
                    <?php if ($progress->orderstatusid == 6): ?>
                        <td><?= $progress->topic ?></td>
                        <td><small>Rejected</small></td>
                        <td><div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                          100%
                        </div>
                      </div></td>
                    <?php endif ?>
                    </tr>
                <?php endforeach ?>
               </tbody>

            </table>
          
                </div>
            </div>
     <div class="col-md-3">

                <!-- box affix right -->
                <div class="block-section">
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
        <li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>payout/pre" style="color:#34a527">Payments</a></li>
          </div>
          <div>
        <li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>profile/profile" style="color:#34a527">Profile</a></li>
          </div>
          <div>
        <li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>progress/index" style="color:#34a527">Progress</a></li>
          </div> 
          <div>
        <li style="border-bottom:3px solid #ccc"><a href="<?= base_url() ?>orders/ratings" style="color:#34a527">Rating:<?php if(!empty($ratings)){ echo $rate->rate; } ?></a></li>
          </div>
          </ul>
                </div><!-- box affix right -->

              </div>
            </div>
          </div>
        </div>