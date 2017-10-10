<div class="top_bg">
<div class="wrap">
<div class="main_top">
  <h4 class="style">create an account or login</h4>
</div>
</div>
</div>
<div class="main_bg">
<div class="wrap">
<div class="main">
  <div class="login_left">
    <h3>new customers</h3>
    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping address, view and track your orders in your accoung and more.</p>
    <div class="btn">
      <form>
        <input type="button"  onclick="location.href='signup.html';" value="create an account" />
      </form>
    </div>
  </div>
  <div class="login_left">
    <h3>registered customers</h3>
    <p>if you have any account with us, please log in.</p>
  <!-- start registration -->
  <div class="registration">
    <!-- [if IE] 
        < link rel='stylesheet' type='text/css' href='ie.css'/>  
     [endif] -->  
      
    <!-- [if lt IE 7]>  
        < link rel='stylesheet' type='text/css' href='ie6.css'/>  
    <! [endif] -->  
    <script>
      (function() {
    
      // Create input element for testing
      var inputs = document.createElement('input');
      
      // Create the supports object
      var supports = {};
      
      supports.autofocus   = 'autofocus' in inputs;
      supports.required    = 'required' in inputs;
      supports.placeholder = 'placeholder' in inputs;
    
      // Fallback for autofocus attribute
      if(!supports.autofocus) {
        
      }
      
      // Fallback for required attribute
      if(!supports.required) {
        
      }
    
      // Fallback for placeholder attribute
      if(!supports.placeholder) {
        
      }
      
      // Change text inside send button on submit
      var send = document.getElementById('register-submit');
      if(send) {
        send.onclick = function () {
          this.innerHTML = '...Sending';
        }
      }
    
    })();
    </script>
  <div class="registration_left">

     <div class="registration_form">
      <p class="login-box-msg"><div id="infoMessage"><?php echo $message;?></div></p>
     <!-- Form -->
      <?php echo form_open("auth/login", array('id'=>'registration_form'));?>
        <div>
          <label>
            <?php echo form_input($identity);?>
          </label>
        </div>
        <div>
          <label>
             <?php echo form_input($password);?>
          </label>
        </div>            
        <div>
          <input type="submit" value="sign in" id="register-submit">
        </div>
        <div class="forget">
          <a href="#">forgot your password</a>
        </div>
        <?php echo form_close();?>
      <!-- /Form -->
    </div>
  </div>
  </div>
  <!-- end registration -->
  </div>
  <div class="clear"></div>
</div>
</div>
</div>

   