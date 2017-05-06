
  <div class="bg-color2">
          <div class="container">
          <div class="row">

            <div class="col-md-2">
              <!-- logo -->
              <label class="color-white"></label>
              <div class="logo text-center-sm"><h4> Find Orders</h4></div>
            </div>

            <div class="col-md-8">
              <!-- form search -->
              <form class="form-search-list">
                <div class="row">
                  <div class="col-sm-10 col-xs-10 ">
                    <div class="form-group">
                      <label class="color-white"></label>
                      <input class="form-control" style="font-size:18px" placeholder="search for orders" >
                    </div>
                  </div>
                  
                  <div class="col-sm-2 col-xs-12 ">
                    <div class="form-group">
                      <label class="hidden-xs">&nbsp;</label>
                      <button class="btn btn-block btn-theme  btn-success">Search</button>
                    </div>
                  </div>
                </div>
               
              </form>  <!-- form search -->
            </div>


          </div>
         <!-- body-content -->
         <hr>
      <div class="body-content clearfix" >

       
          <div class="container">
            <div class="row">
              <div class="col-md-9">
               
                 <?php
                 if(!empty($this->session->flashdata('message'))){?>
              
                 <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <?php echo $this->session->flashdata('message'); ?>
                </div>
                 <?php } ?>
                
                
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
				    $timelag.=$month." months ";
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
                    <!-- item list -->
                    <div class="item">
                      <div class="row">
                        <div class="col-md-1 hidden-sm hidden-xs"><div class="img-item"><img src="<?= base_url() ?>assets/theme/images/company-logo/4.jpg" alt=""></div></div>
                        <div class="col-md-11">
                          <h3  class="no-margin-top">
                             <a href="<?= base_url() ?>orders/load_order/<?php echo $row->orderid; ?>" style="color:#34a527;"><?php echo $row->subject.",  ".$row->papertype; ?></a>
                           </h3>

                            <div style="color:#aaa">created: <?php echo $timelag; ?> <?php ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Deadline:<?php echo $deadline; ?></span></div>
                           </div>
                          
                          <p style="margin-left:80px">Topic: <strong><?php echo $row->topic; ?></strong> &nbsp;&nbsp;
                          By Client: <strong><?php echo $row->client; ?></strong>&nbsp;&nbsp;
                          Rating: <strong><?php echo $row->levelname; ?></strong> </p>

                          <?php 
                              $instructions=$row->paper_instructions;
                              $limit=200;
                                $overflow="";
								if (strlen($instructions) > $limit) {
								  $instructions = substr($instructions, 0, $limit)."......";
								  $overflow="yes";
							       }
							  ?>
						  <div class="instructions">
						  <p style="color:#e2670d; margin-left:20px">Instructions</p>
                          <p><li  style="margin-left:20px"><?php echo $instructions; ?></li></p>
                          </div>
                          <div style="margin-left:80px">
                          <?php 
                            if($overflow=="yes"){
                            ?>
                            <div style="color:red;"><a href="<?= base_url() ?>orders/load_order/<?php echo $row->orderid; ?>" class="">more</a></div>
                            <?php }
                          ?>
                   
                          <?php if($rate->rate!='suspended'){ ?>
                          <div style="text-align:right; "><a href="#<?= $row->orderid; ?>" class="btn btn-theme btn-xs btn-success" data-toggle="modal">APPLY</a></div>
                          <?php } ?>
					  <!-- Modal Start -->
			  <div class="modal fade" id="<?= $row->orderid; ?>" >
			    <div class="modal-dialog ">
			      <div class="modal-content">
				<form method="post" action="<?php echo base_url() ?>orders/order_application" class="form-horizontal" />                     
				    <div class="modal-content">
				    <div class="modal-header" style="text-align:center">Order Application Form</div>		      
				    <div class="modal-body">
				           <input type="hidden" name="id" value="<?php echo $row->orderid; ?>">
				           <input type="hidden" name="rating" value="<?php echo $rate->rate; ?>">
				           <input type="hidden" name="levelid" value="<?php echo $row->writer_level_id; ?>">
				           <h3 class="no-margin-top"><a href="<?= base_url() ?>orders/all_orders/<?php echo $row->orderid; ?>" class=""><?php echo $row->subject.",  ".$row->papertype; ?></a></h3>
					   Topic: <strong><?php echo $row->topic; ?></strong><br>
                       Rating: <strong><?php echo $row->levelname; ?></strong> 
					   
					   <?php
					   $amount=0;
					   if($this->session->userdata('groupid')==2){
					          $amount=($row->orderamount*60/100)*(60/100);
					   }elseif($this->session->userdata('groupid')==3){
					          $amount=($row->orderamount*60/100)*(35/100);
					   }elseif($this->session->userdata('groupid')==4){
					          $amount=($row->orderamount*60/100)*(15/100);
					   }?>
					   <strong>Amount: $<?php echo round($amount,2); ?> <?php ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Deadline:<?php echo $deadline; ?></span></strong>
				    </div>
				    <div class="modal-footer">
				<button type="submit" class="btn btn-success">Submit</button>
			      </div>
			      </div>
			      </form>
			      </div>
			    </div>
			  </div><!-- End Modal -->
                        </div>
                      </div>
                    </div><!-- end item list -->
                    <?php } ?>
                  </div>
                </div><!-- end box listing -->


              </div>


      