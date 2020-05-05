<div style="    background-color: #f7f7fc;height: 50px;"></div>
<footer>
<?php foreach($site_info as $siteinfo)?>
    <footer class="footer section-pattern footer-bg" data-bg-img="">
        <!-- Footer Top Begin -->
        <div class="footer-top pt-60">
            <div class="container border-bottom">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Widget Quick Nav -->
                     
                        <!-- Widget Quick Nav -->
                           <div class="widget widget_social_icon soicalfooter" style="margin-bottom:0px;">
                            <ul class="social_icon_list list-inline" style="    display: contents;">
                                <li class="soicalli">
                                    <a href="<?=$siteinfo->facebook?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true" style="color: #367dfe;"></i></a>
                                </li>
                                <li class="soicalli">
                                    <a href="<?=$siteinfo->twitter?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true" style="color: #367dfe;"></i></a>
                                </li>
                                <li class="soicalli">
                                    <a href="<?=$siteinfo->linkedin?>" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true" style="color: #367dfe;"></i></a>
                                </li>
                                <li class="soicalli">
                                    <a href="<?=$siteinfo->instagram?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true" style="color: #367dfe;"></i></a>
                                </li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
        <!-- Footer Top End -->


    <footer class="footer section-pattern footer-bg" data-bg-img="">
        <!-- Footer Top Begin -->
        <!-- Footer Top End -->

        <!-- Footer Bottom Begin -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-text text-center" style="font-size:14px">
<span><a href="#"></a>&copy; جميع الحقوق محفوظة اكتف فور ويب 2020</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
        
    </footer>
    <!-- Footer End -->

    <!-- Back to Top Begin -->
    <a href="#" class="back-to-top position-fixed">
        <div class="top-arrow"></div>
        <div class="top-line"></div>
    </a>
    

    <!-- Back to Top End -->

    <!-- ======= jQuery Library ======= -->
    <script src="<?= DIR_DES?>js/jquery.min.js"></script>
    
    <!-- ======= Bootstrap Bundle JS ======= -->
    <script src="<?= DIR_DES?>js/bootstrap.bundle.min.js"></script>

    <!-- =======  Mobile Menu JS ======= -->
    <script src="<?= DIR_DES?>js/menu.min.js"></script>
    
    <!-- ======= Waypoints JS ======= -->
    <script src="<?= DIR_DES?>plugins/waypoints/jquery.waypoints.min.js"></script>
    
    <!-- ======= Counter Up JS ======= -->
    <script src="<?= DIR_DES?>plugins/waypoints/jquery.counterup.min.js"></script>

    <!-- ======= Owl Carousel JS ======= -->
    <script src="<?= DIR_DES?>plugins/owlcarousel/owl.carousel.min.js"></script>

    <!-- ======= Isotope JS ====== -->
    <script src="<?= DIR_DES?>plugins/isotope/isotope.pkgd.min.js"></script>

    <!-- ======= Magnific Popup JS ======= -->
    <script src="<?= DIR_DES?>plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- ======= Countdown JS ======= -->
    <script src="<?= DIR_DES?>/plugins/countdown/countdown.min.js"></script>

    <!-- ======= Retina JS ======= -->
    <script src="<?= DIR_DES?>plugins/retinajs/retina.min.js"></script>

    <!-- ======= Google API ======= -->

    <!-- ======= Main JS ======= -->
    <script src="<?= DIR_DES?>js/main.js"></script>
    
    <!-- ======= Custom JS ======= -->
    <script src="<?= DIR_DES?>js/custom.js"></script>
        <script type="text/javascript" src="<?=DIR;?>design/frontpage/toastr/toastr.min.js"></script>
    <link href="<?=DIR;?>design/frontpage/toastr/toastr.min.css" rel="stylesheet">

<script src="<?=base_url()?>design/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

	<?php 

	if(isset($_SESSION['msg']) && $_SESSION['msg']!=''&& $this->uri->segment(2)=="contact"){?>
<script>
$(document).ready(function(e) {
	toastr.info("<?=$_SESSION['msg'];?>",  {timeOut: 5000})
});
</script>
<?php } ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDLQm_ttVZOC_AGj0_e5tq7HxjHz_w5BlE"></script>
<script src="<?=DIR;?>design/assets/locationpicker.jquery.js"></script>
<script>
$('#us2').locationpicker({
location: {
latitude: "23.885942",
longitude: "45.079162"
},
zoom: 8,
radius: 300,
inputBinding: {
latitudeInput: $('#let'),
longitudeInput: $('#lag'),
radiusInput: $('#us2-radius'),
locationNameInput: $('#us2-address')
},
enableAutocomplete: true
});
</script>
<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        ["First Result1", '30.011333619215367', '31.49148986137697'],
        ["First Result2", '30.010516062118594', '31.489816162951676'],
        ["First Result3", '30.00852788378945', '31.49221942222902'],
        ["First Result4", '30.007301510932173', '31.49400040901491'],
          
    ];
                        
    // Info window content
    var infoWindowContent = [
		['<div class="info_content">' + '<h3>First Result1</h3>' + '<p>First Result1 Details</p>' + '<a href="www.ismatrix.com" traget="_blank">link</a>' + '</div>'],
		['<div class="info_content">' + '<h3>First Result2</h3>' + '<p>First Result2 Details</p>' + '<a href="www.ismatrix.com" traget="_blank">link</a>' + '</div>'],
		['<div class="info_content">' + '<h3>First Result3</h3>' + '<p>First Result3 Details</p>' + '<a href="www.ismatrix.com" traget="_blank">link</a>' + '</div>'],
		['<div class="info_content">' + '<h3>First Result4</h3>' + '<p>First Result4 Details</p>' + '<a href="www.ismatrix.com" traget="_blank">link</a>' + '</div>'],

    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            icon: 'https://upload.wikimedia.org/wikipedia/commons/archive/e/ec/20140718204956%21RedDot.svg',
            map: map,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(16);
        google.maps.event.removeListener(boundsListener);
    });
    
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>
<?php
include("custom.php")
?>

