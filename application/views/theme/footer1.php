<div class="footer-bottom">
<div class="wrap">
   <div class="copy-right">
     <p>Copyright 2017. All Rights Reserved</p>
   </div>
  <div class="copy">
     
   </div>
</div>
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url() ?>assets/plugins/jquery.js"></script>
    <script src="<?= base_url() ?>assets/city_state.js"></script>
    <script src="<?= base_url() ?>assets/plugins/jquery.easing-1.3.pack.js"></script>
    <!-- jQuery Bootstrap -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap-3.3.2/js/bootstrap.min.js"></script>
    <!-- Lightbox -->
    <script src="<?= base_url() ?>assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Theme JS -->
    <script src="<?= base_url() ?>assets/theme/js/theme.js"></script>

    <!-- maps -->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script> 
    <script src="<?= base_url() ?>assets/plugins/gmap3.min.js"></script>
    <!-- maps single marker -->
    <script src="<?= base_url() ?>assets/theme/js/map-detail.js"></script>

    <!-- page script -->
<script>
  $(function () {
   
    $('#example1').DataTable({
      
      "processing":true,
      "searching": true,
     
    });
   

      $('#datepicker').datepicker({
      autoclose: true
    });
        $('#altdatepicker').datepicker({
      autoclose: true
    });
  });

  function ajaxFunction(){   
        //if(e.which == 13) {
            var message = $('#message').val();

            $.ajax({
                url: "<?php echo base_url().'Messaging/send'; ?>",
                alert(message);
                type: "POST",
                data: {
                    "message": message,
                },
                dataType: "json",
                console.log(message);               
                success:function(response){   
                    
                    if(response == "ok")
                    {
                        alert("ok");
                        window.location = "<?php echo base_url().'Messaging/add/'.$this->session->userdata('recipient'); ?>";
                    }else{
                        alert('Try Again');
                    }
                }
            });
        }

</script>
<script >
  $('#select_all').click(function(event) {
  if(this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
          this.checked = true;
      });
  }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }


});
</script>

</body>

</html>
