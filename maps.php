<?php
require_once 'template.php';
$page = new webPage("SNAP: Maps", "maps.css", "data");
$page->openPage();
?>

<div id="map_header">

    <img id="map_logo" alt="Map Tool Logo" src="images/logo_snap_maps_stats.png" />

    <div id="model_menu">
		<p>currently viewing</p>
			<div id="mapMenu">
				<!-- populated by javascript -->
             </div>
		</div>
    </div>

    <div id="map_menu_bar" class="map_bar">
    	<div id="textLinks"></div>
    	<div id="shareBlock" style=""><a class="addthis_button"><img alt="Share" src="/images/share.png" /></a></div>
    	<div id="exportBlock">
    		<span><a href="" onclick="window.print(); return false;">Print</a></span>
    		<span><a href="" >Link</a></span>
    	</div>
    </div>
</div>

<div id="map_wrapper">
    <div id="map_canvas"></div>
    <div id="legend_wrapper">
        <div id="legend_background"></div>
        <div id="legend"></div> 
    </div>
</div>

<div id="map_footer">
    <div class="map_bar">
        <span id="helpBlock"><a href="">Help</a> | <a href="">About this tool</a></span>
        <span class="logoBlock"><a href="http://www.uaf.edu"><img alt="UAF Logo" style="height: 28px;" src="images/UAFLogo_A_white.png" /></a></span>
        <span class="logoBlock"><a href="<?php echo Config::$url ?>"><img alt="SNAP Logo" src="images/snap_acronym_white.png" /></a></span>
    </div>
</div>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">

$(document).ready(function() { 

    // Close any open menus when click outside of them
    $('body').click(function(e) {
        $('.menuOption').parent().removeClass('active');
        $('.menuOptions').hide();
        $('.menuSpacer').removeClass('menuSpacerToggle');
    });

    var currenthash = window.location.hash.substring(1).split("/");
    window.snap.state.variable = currenthash[0] || window.snap.state.defaults.variable;
    window.snap.state.interval = currenthash[1] || window.snap.state.defaults.interval;
    window.snap.state.range = currenthash[2] || window.snap.state.defaults.range;
    window.snap.state.scenario = currenthash[3] || window.snap.state.defaults.scenario;
    var zoom = window.snap.state.zoom = parseInt(currenthash[4], 10) || window.snap.state.defaults.zoom;
    var latitude = window.snap.state.latitude = parseFloat(currenthash[5], 10) || window.snap.state.defaults.latitude;
    var longitude = window.snap.state.longitude = parseFloat(currenthash[6], 10) || window.snap.state.defaults.longitude;

    google.maps.event.addDomListener(window, 'load', function(){
        init(zoom, latitude, longitude);
        google.maps.event.addListenerOnce(map, 'idle', function(){
            addMap();
            google.maps.event.addListener(map, 'idle', function(){
                writeHash();
            });
        });
    });

    // the resize function is defined in the maps.js file.
    $(window).resize(resize);
    
});

</script>
</body>
</html>