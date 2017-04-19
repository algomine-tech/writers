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
            <h2 align="center">Progress</h2>
            <script>
                 <?php
                 if(!empty($this->session->flashdata('message'))){?>
                 alert("<?php echo $this->session->flashdata('message'); ?>");
                 <?php } ?>
                 </script>
                 <?php foreach ($progress as $progress): ?>  
                    <?php if ($progress->orderstatusid == 1): ?>
                        <p><?= $progress->topic ?><br><small>On-Progress</small> </p> 
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100" style="width:14%">
                          14%
                        </div>
                      </div>
                    <?php endif ?>
                    <?php if ($progress->orderstatusid == 2): ?>
                        <p><?= $progress->topic ?><br><small>Submitted</small></p>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width:28%">
                          28%
                        </div>
                      </div>
                    <?php endif ?>
                    <?php if ($progress->orderstatusid == 3): ?>
                        <p><?= $progress->topic ?><br><small>Approved</small></p>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width:42%">
                          48%
                        </div>
                      </div>
                    <?php endif ?>
                    <?php if ($progress->orderstatusid == 4): ?>
                        <p><?= $progress->topic ?><br><small>Revision</small></p>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100" style="width:14%">
                          18%
                        </div>
                      </div>
                    <?php endif ?>
                    <?php if ($progress->orderstatusid == 5): ?>
                        <p><?= $progress->topic ?><br><small>Accepted</small></p>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                          100%
                        </div>
                      </div>
                    <?php endif ?>
                    <?php if ($progress->orderstatusid == 6): ?>
                        <p><?= $progress->topic ?><br><small>Rejected</small></p>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                          100%
                        </div>
                      </div>
                    <?php endif ?>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>