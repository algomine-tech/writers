<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php echo $message;?>
           <div id="map"></div>
   
            <p>Hope you enjoy all of the work we have put into this. </p>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
          </div>
          </div>
       </section>
 <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_7nUlhzKNlZAnbwo3z1imtISnLKAk52I&callback=initMap">
    </script>