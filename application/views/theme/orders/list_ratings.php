
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
                    <!-- item list -->
                    <div class="item">
                      <div class="row">
                        <div class="col-md-1 hidden-sm hidden-xs"><div class="img-item"><img src="./assets/theme/images/company-logo/4.jpg" alt=""></div></div>
                        <div class="col-md-11">
                           <table class="table table-striped table-bordered bootstrap-datatable datatable" id="example">
				  <thead>
				      <tr>
					<th>TOPIC</th>
					<th>MARK(/100)</th>
				    </tr>
			      </thead>
			      <tbody>
				<!--loop through the array to display the Supplier data --> 
			      <?php //print_r($ratingdata);
			        $num=0;
			        $sum=0;
			        if(empty($ratingdata)){
				    $ratingdata=array();
				}
			        foreach ($ratingdata as $row) { 
			        $sum+=$row->rate;
			        $num++;
			        ?>		                
				<tr>
				  <td><a href="<?= base_url() ?>orders/load_rating_list/<?php echo $row->orderid; ?>"><?php echo $row->topic; ?></a></td>
				  <td><?php echo $row->rate; ?></a></td>
				</tr>
				<?php    //end of loop
			      } ?>
			      
			      </tbody>
                      </table> 
                         
                         
                           		
                        </div>
                      </div>
                    </div><!-- end item list -->
                  </div>
                </div><!-- end box listing -->


              </div>


      