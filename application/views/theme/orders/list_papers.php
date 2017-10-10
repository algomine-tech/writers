
    <!-- wrapper page -->
    <div class="wrapper">

      <!-- body-content -->
      <div class="body-content clearfix" >
         <div class="bg-color2 block-section-xs line-bottom">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 hidden-xs">
                <div>Applied Public Orders :</div>
              </div>
              <div class="col-sm-6">
                <div class="text-right"><a href="<?= site_url('orders/all_orders'); ?>">&laquo; Go back to public orders</a></div>
              </div>
            </div>
          </div>
        </div><!-- end top link -->
        <div class="bg-color2">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
            
                <!-- box listing -->
                <div class="block-section-sm ">
                  <div class="box-list">                  
                    <!-- item list -->
                    <div class="panel panel-default">
                      <div class=" panel-heading">
                        <strong> Work Diary </strong>
                        </div>
                        <div class="panel-body">
                    <table class="table  table-bordered datatable" >
				    <thead>
				     <tr>
					<th>TOPIC</th>
					<th>CREATED BY</th>
					<th>FILE</th>
					<th>CREATED ON</th>
					<th>REMARKS</th>
				    </tr>
			      </thead>
			      <tbody>
				<!--loop through the array to display the Supplier data --> 
			      <?php 
			      if(empty($uploads)){
				  $uploads=array();
			      }
			      foreach ($uploads as $row) { ?>
		      
				<tr>
				  <td><?php echo $row->topic; ?></td>
				  <td><?php echo $row->createdby; ?></td>
				  <td><a href="<?=base_url("orders/downloadFile/$row->filename")?>"><?php echo $row->filename; ?></a></td>
				  <td><?php echo $row->uploadedon; ?></td>
				  <td><?php echo $row->remarks; ?></td>
				</tr>
				<?php    //end of loop
			      } ?>
			      
			      </tbody>
                      </table> 
                         
                         
                           		
                        </div>
                        <div class="panel-footer">
                           <p style="color:#ccc">All Submissions</p>
                        </div>
                      </div>
                    </div><!-- end item list -->
                  </div>
                </div><!-- end box listing -->


             


      