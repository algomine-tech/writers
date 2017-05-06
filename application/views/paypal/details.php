
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
              <div class="col-sm-6">
                 <div class="text-right"><a href="<?= site_url('orders/all_orders'); ?>">&laquo; Go back to public orders</a></div>
              </div>
            </div>
          </div>
        </div><!-- end link top -->

        <div class="bg-color2">
          <div class="container">
          
            <div class="row">
              <div class="col-md-12">

                <!-- box item details -->
                <div class="block-section box-item-details">
                <div class="row">
              <div class="col-md-12">

               <div class="panel panel-default">
                      <div class=" panel-heading">
                        <strong>Transaction History </strong>
                        </div>
                        <div class="panel-body">
                      <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th><strong>Withdrawn On</strong></th>
                        <th><strong>Currency</strong></th>
                        <th class="center"><strong>Amount</strong></th>
                        <th class="center"><strong>Paypal Email</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($withdrawals as $withdrawals) {
                        ?>
                        <tr>
                            <td><?php echo $withdrawals->withdrawnon; ?></td>
                            <td><?php echo $withdrawals->currency; ?></td>
                            <td class="center"> $<?php echo number_format($withdrawals->amount,2); ?></td>
                            <td class="center"><?php echo $withdrawals->paypal_email; ?></td>
                            <?php
                            }
                    ?>
                        </tr>
                        
                    </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </div><!-- end box item details -->

              </div>
            </div>
          </div>
        </div>




           