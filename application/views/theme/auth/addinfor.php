<!-- body-content -->
      <div class="body-content clearfix" >

        <div class="bg-color1 block-section line-bottom">
          <div class="container">
            <h2 class="text-center">Additional Information<br/>
              <small>Hi,Mr.<?php foreach ($users as $user) {
               echo $user->last_name ;
               }?> Please add some information below before you Continue.</small></h2>
            <div class="white-space-20"></div>
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <!-- form contact -->
                <div id="infoMessage"><?php echo $message;?></div>
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= site_url('auth/addinfor/'.$id) ?>" >
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control "  placeholder="Enter Job Title" value="<?php foreach ($users as $user) {
               echo $user->first_name." ";
               echo $user->last_name ;
               }?>">
                  </div>
                  
                  <div class="form-group">
                <label for="cat">Education Level</label>
                 <select name="cat" class="form-control">
                  <option value="">-- Select Education Level --</option>
                  <option value="high_school">High School</option>
                  <option value="University">University</option>
                  <option value="Masters">Masters</option>
                  <option value="PHD">PHD</option>                  
                  </select> 
                </div>                  
                  <div class="form-group">
                    <label>Tell us why you are better</label>
                    <div class="color-white-mute"><small>Describe the yourself in accordance to this job, Your work experience, skills.</small></div>
                    <textarea class="form-control" rows="6" name="desc" placeholder="Enter Job Description"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Your Resume</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <span class="btn btn-default btn-theme btn-file">
                          Resume  <input type="file" name="resume" >
                        </span>
                      </span>
                      <input type="text" class="form-control form-flat" readonly>
                    </div>
                    <small>Upload your CV/resume. Max. file size: 24 MB.</small>
                  </div>
                  <div class="form-group">
                    <label>Your Education certificate</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <span class="btn btn-default btn-theme btn-file">
                          Cert  <input type="file" name="cert" >
                        </span>
                      </span>
                      <input type="text" class="form-control form-flat" readonly>
                    </div>
                    <small>Upload your recent cerificate, according to the information you provided above.</small>
                  </div>
                  <div class="form-group">
                    <label>Previous Jobs Done</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <span class="btn btn-default btn-theme btn-file">
                          File  <input type="file" name="job" >
                        </span>
                      </span>
                      <input type="text" class="form-control form-flat" readonly>
                    </div>
                    <small>Upload your Previous Jobs .</small>
                  </div>
                  <div class="form-group">
                    <label>Profile Picture</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <span class="btn btn-default btn-theme btn-file">
                          Picture <input type="file" name="prof">
                        </span>
                      </span>
                      <input type="text" class="form-control form-flat" readonly>
                    </div>
                    <small>A sample of the work you have done</small>
                  </div>
                  <!-- checkboxs -->
                  <div class="form-group">
                    <label>Writing Styles</label>
                     <small>Select the citation style</small>
                    <div class="row clearfix">
                      <div class="col-md-4">
                        <div class="checkbox flat-checkbox">
                          <label>
                            <input type="checkbox" name="style[]" value="APA"> 
                            <span class="fa fa-check"></span>
                            APA (American Psychological Association)
                          </label>
                        </div>
                        <div class="checkbox flat-checkbox">
                          <label>
                            <input type="checkbox" name="style[]" value="MLA"> 
                            <span class="fa fa-check"  ></span>
                            MLA (Modern Language Association)
                          </label>
                        </div>
                        <div class="checkbox flat-checkbox">
                          <label>
                            <input type="checkbox" name="style[]" value="Chicago/Turabian"> 
                            <span class="fa fa-check"></span>
                            Chicago/Turabian
                          </label>
                        </div>
                        <div class="checkbox flat-checkbox">
                          <label>
                            <input type="checkbox" name="style[]" value="Others"> 
                            <span class="fa fa-check"></span>
                            Others
                          </label>
                        </div>
                      </div>
                    </div>
                  </div><!-- end checkboxs -->
                  <div class="form-group">
                    <label>Experience (optional)</label>
                    <div class="row clearfix">
                      <div class="col-xs-6">
                        <input type="text" class="form-control " value="Writing"  placeholder="Example: Writing" readonly>
                      </div>
                      <div class="col-xs-6">
                        <select name="experience" class="form-control">
                          <option>1 year</option>
                          <option>2 years</option>
                          <option>3 years</option>
                          <option>4 years</option>
                          <option>5 years and above</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group ">
                     <?php echo form_submit('submit', 'Continue','class="btn btn-t-primary btn-theme"');?>
                  </div>
                 
                <?php echo form_close();?>

                <div class="white-space-10"></div>
                <p class="text-center"><span class="span-line">OR</span></p>
              </div>
            </div>
          </div>
        </div>
      </div><!--end body-content -->