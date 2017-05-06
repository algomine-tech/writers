
  <!-- body-content -->
      <div class="body-content clearfix" >

        <!-- link top -->
        <div class="bg-color1 block-section-xs line-bottom">
          <div class="container">
            <div class="row">

                 <?php
                 if(!empty($this->session->flashdata('message'))){?>
              
                 <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <?php echo $this->session->flashdata('message'); ?>
                </div>
                 <?php } ?>
           
              <div class="col-sm-6 hidden-xs">
                <div ><h4 style="color:#15d624">Available Balance :$ <?= $able ?>.00</h4></div>
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
              <div class="col-md-8">

                <!-- box item details -->
                <div class="block-section box-item-details">
          
               <div class="panel panel-default">
                      <div class=" panel-heading">
                        <strong> Contracts </strong>
                        </div>
                        <div class="panel-body">
                      <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th><strong>ID</strong></th>
                        <th><strong>Job Name</strong></th>
                        <th class="center"><strong>Price</strong></th>
                        <th class="center"><strong>Date</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($details as $detail) {
                        if ( $detail->status == 0) {
                        ?>
                        <tr>
                            <td><?php echo $detail->id; ?></td>
                            <td><?php echo $detail->topic; ?></td>
                            <td class="center"> $<?php echo number_format($detail->amount,2); ?></td>
                            <td class="center"><?php echo $detail->depositedon; ?></td>
                            <?php
                            }
                    }
                    ?>
                        </tr>
                        
                    </tbody>
                </table>
                </div>
                </div>
                </div><!-- end box item details -->

              </div>
              <div class="col-md-4">

                <!-- box affix right -->
                <div class="block-section " id="affix-box">
                  <div class="text-right">
                       <?php echo form_open("payout/payout");?>
                <h2>Ensure the Email is similar to that in your Paypal</h2>
                    <table class="table">
                        <tbody>
                        <?php
                foreach($details as $detail) {}
                    ?>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td> <input class="form-control" type="Email" name="email" value="<?php echo $detail->email; ?>"> </td>
                        </tr>
                        <tr>
                            <td><strong>Withdrawable Amount</strong></td>
                            <td><input class="form-control" type="number" name="amount" value="<?php echo $able ; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td class="center" colspan="2"><button type="submit" value="Submit"><img src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif"></button></td>
                        </tr>
              
                        </tbody>
                    </table>
                   <?php echo form_close();?>
                  </div>
                </div><!-- box affix right -->

              </div>
            </div>
          </div>
        </div>




           