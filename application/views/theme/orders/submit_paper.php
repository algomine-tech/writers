
    <!-- wrapper page -->
    <div class="wrapper">

      <!-- body-content -->
      <div class="body-content clearfix" >

        <div class="bg-color2">
          <div class="container">
            <div class="row">
              <div class="col-md-9">

                <!-- box listing -->
                <div class="block-section-sm box-list-area">
                  <div class="box-list">                  
                    <?php 
                     if(empty($orders)){
                         $orders=array();
                    }
                    foreach ($orders as $row) {
			    $now=date("Y-m-d h:i");
			    $datetime1 = new DateTime($row->created_at);
			    $datetime2 = new DateTime($now);
			    $interval = $datetime1->diff($datetime2);

			    $year = $interval->y;
			    $month= $interval->m;
			    $day= $interval->d;
			    $hour= $interval->h;
			    $min = $interval->i;

			    $timelag="";
			    if($year>0)
				    $timelag .= $year." yrs ";
			    if($month>0)
				    $timelag.=$month." mnths ";
			    if($day>0)
				    $timelag.=$day." days ";
			    if($hour>0)
				    $timelag.=$hour." hrs ";
			    if($min)
				    $timelag.=$min." min "; 
		            
		            //set deadline for each group i.e writers 60%, editor A 35% and Editor B 15% of total time
		            $endtime=0;    
		            $start = strtotime($row->created_at);
		            $end= strtotime($row->deadline);
		            if($this->session->userdata('groupid')==2)
	                    {
				    $inter=($end-$start)*0.6;
				    $endtime=$start+$inter;
		            }elseif($this->session->userdata('groupid')==3){
		                   $inter=($end-$start)*0.85;
		                   $endtime=$start+$inter;
		            }elseif($this->session->userdata('groupid')==4){
		                   $inter=($end-$start)*1;
		                   $endtime=$start+$inter;
		            }
		            $deadline=date("Y-m-d h:i:s",$endtime);
                 ?>
                    <!-- item list -->
                    <div class="item">
                      <div class="row">
                    
                        <div class="col-md-11">
                           <div class="col-md-1 hidden-sm hidden-xs"><div class="img-item"><img src="<?= base_url() ?>assets/theme/images/company-logo/4.jpg" alt=""></div></div>
                        
                          <h3  class="no-margin-top">
                             <a href="<?= base_url() ?>orders/submit_paper/<?php echo $row->orderid; ?>" style="color:#34a527;"><?php echo $row->subject.",  ".$row->papertype; ?></a>
                           </h3>

                           <div style="color:#aaa">created: <?php echo $timelag; ?> <?php ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Deadline:<?php echo $deadline; ?></span></div>
                       
                          
                          Topic: <B><?php echo $row->topic; ?></B><br>
                          by Client <B><?php echo $row->client; ?></B> 
                          <p class=""><?php echo $row->paper_instructions; ?></p>
                         <hr>
                        
                       
                        
                   


                  <div class="row">
                        <div class="col-md-11" align="center"> 
                            <form method="post" action="<? echo base_url() ?>orders/save_paper_submition" enctype="multipart/form-data" />
				  <div class="span12 field-box">
				      <input type="hidden" name="orderid" id="orderid" value="<?php echo $row->orderid; ?>">
			
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-btn">
                          <span class="btn btn-default btn-theme btn-file no-right-border">
                            Choose File   <input type="file" name="userfile" id="userfile" value="<?php echo set_value('userfile'); ?>">
				            <span class="alert-msg  error"><?php echo form_error('userfile');  ?></span>
                          </span>
                        </span>
                        <input type="text" class="form-control no-left-border" readonly>
                      </div>
                    </div>
                  </div>
				     
				
				  <?php 
				  if($this->session->userdata('groupid')==3 or $this->session->userdata('groupid')==4){
				      foreach($ratingparameters as $parameter){
				      $rating="";
				      foreach($ordersratings as $rate){				         
				         if($rate->ratingparameterid==$parameter->id){
				             $rating=$rate->rate;
				         }
				      } 				      				      
				      ?>
				      <div class="form-group">
				      <label><?php echo $parameter->name; ?></label>
				      <input type="text" <?php if(!empty($rating)){ echo "readonly"; }?> name="<?php echo $parameter->id; ?>" id="<?php echo $parameter->id; ?>" value="<?php echo $rating; ?>">
				      <span class="alert-msg  error"><?php echo form_error($parameter->id);  ?></span>
				      </div>
				      <?php } 
				  }
				  ?>
				  <div class="form-group">
                    <label >Remarks</label>
                    <textarea class="form-control" rows="6" name="remarks"><?php echo set_value('remarks'); ?></textarea>
                    <span class="alert-msg  error"><?php echo form_error('remarks');  ?></span>
                  </div>
				 
			      
                          
                             <button type="submit" class="btn btn-primary">Submit Paper</button>
                            </form>
                        </div>
                      </div>
                    </div><!-- end item list -->
                    <?php } ?>
                  </div>
                </div><!-- end box listing -->
                </div>
               </div>
              </div>


      