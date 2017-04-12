
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
                      </div>
                    </div><!-- end item list -->
                  </div>
                </div><!-- end box listing -->


              </div>


      