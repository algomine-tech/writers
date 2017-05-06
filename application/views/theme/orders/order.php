 <div class="wrapper">
    <div class="body-content clearfix" >

        <!-- link top -->
        <div class="bg-color1 block-section-xs line-bottom">
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
		            
		            foreach ($ratings as $rate ){};
                 ?>
                  <!-- box item details -->
               <!-- box item details -->
                <div class="block-section box-item-details">
                  <div class="row">
                    <div class="col-md-8">
                     <a href="<?= base_url() ?>orders/load_order/<?php echo $row->orderid; ?>" style="color:#34a527;"><?php echo $row->subject.",  ".$row->papertype; ?></a>
                    </div>
                    <div class="col-md-4">
                      <p class="text-right"><a href="#">Go to our website &raquo;</a></p>
                    </div>
                  </div>

             
		                    <h4 class="title">created: <?php echo $timelag; ?> <?php ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Deadline:<?php echo $deadline; ?></h4>
		                   <div class="job-meta">
		                    <ul class="list-inline">
		                     
		                      <li><i class="fa fa-map-marker"></i> client: <?= $row->client ?></li>
		                      <li><i class="fa fa-star"></i> Level: <?= $row->levelname; ?></li>
		                    </ul>
		            

                         
                       
                          
                          Topic: <B><?php echo $row->topic; ?></B><br>
                       
                        
                          <p class=""><?php echo $row->paper_instructions; ?></p>
                 
                         
                          </div>
                          <?php if($rate->rate!='suspended'){ ?>
                          <div style="text-align:right; "><a href="#<?= $row->orderid; ?>" class="btn btn-success btn-pill" data-toggle="modal">APPLY</a></div>
                          <?php } ?>
                           		  <!-- Modal Start -->
			      <div class="modal fade" id="<?= $row->orderid; ?>" >
			    <div class="modal-dialog ">
			      <div class="modal-content">
				<form method="post" action="<? echo base_url() ?>orders/order_application" class="form-horizontal" />                     
				    <div class="modal-content">
				    <div class="modal-header" style="text-align:center">Order Application Form</div>		      
				    <div class="modal-body">
				           <input type="hidden" name="id" value="<?php echo $row->orderid; ?>">
				           <input type="hidden" name="rating" value="<?php echo $rate->rate; ?>">
				           <input type="hidden" name="levelid" value="<?php echo $row->writer_level_id; ?>">
				           <h3 class="no-margin-top"><a href="<?= base_url() ?>orders/all_orders/<?php echo $row->orderid; ?>" class=""><?php echo $row->subject.",  ".$row->papertype; ?></a></h3>
					   Topic: <B><?php echo $row->topic; ?></B><br>
                                           Rating: <B><?php echo $row->levelname; ?></B> 
					   
					   <?php
					   $amount=0;
					   if($this->session->userdata('groupid')==2){
					          $amount=($row->orderamount*60/100)*(60/100);
					   }elseif($this->session->userdata('groupid')==3){
					          $amount=($row->orderamount*60/100)*(35/100);
					   }elseif($this->session->userdata('groupid')==4){
					          $amount=($row->orderamount*60/100)*(15/100);
					   }?>
					   <B>Amount: $<?php echo round($amount,2); ?> <?php ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Deadline:<?php echo $row->deadline ?></span><B>
				    </div>
				    <div class="modal-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			      </div>
			      </div>
			      </form>
			      </div>
	
		
                        </div>
                      </div>
                    </div><!-- end item list -->
                    <?php } ?>
                  </div>
              


         


      