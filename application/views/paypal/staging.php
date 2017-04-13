<div class="body-content clearfix" >
        <div class="bg-color1 block-section line-bottom">
          <div class="container">
        <div class="col-md-12 column">
            <div id="header" class="row clearfix">
                <div class="col-md-6 column">
                    <div>
                        
                    </div>
                </div>
            </div>
            <h2 align="center">Staging Area</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Job Name</th>
                    <th class="center">Price</th>
                    <th class="center">Date</th>
                    <th class="center">Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($details as $detail) {
                    ?>
                    <tr>
                        <td><?php echo $detail->id; ?></td>
                        <td><?php echo $detail->topic; ?></td>
                        <td class="center"> $<?php echo number_format($detail->amount,2); ?></td>
                        <td class="center"><?php echo $detail->depositedon; ?></td>
                        <td class="center"> $<?php echo $able ; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <div class="row clearfix">
                <div class="col-md-4 column"> </div>
                <div class="col-md-4 column"> </div>
                <div class="col-md-4 column">
                <?php echo form_open("payout/payout");?>
                <h2>Ensure the Email is similar to that in your Paypal</h2>
                    <table class="table">
                        <tbody>
                        <?php
                foreach($details as $detail) {
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
                        <?php
                }
                ?>
                        </tbody>
                    </table>
                   <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>