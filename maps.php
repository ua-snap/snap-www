<?php
require_once 'template.php';
$page = new webPage("SNAP: Maps", "maps.css", "data");
$page->openPage();
?>

<div id="map_header">
    <a href="<?php echo Config::$url ?>">
        <img id="map_logo" alt="Map Tool Logo" src="images/snap_acronym_rgb.gif" />
    </a>

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
    		<span><a href="#" onclick="window.print(); return false;">Print</a></span>
    		<span><a href="#" id="export_link">Link</a></span>

    	</div>
    </div>
</div>

<div id="map_wrapper">
    <div id="link_box" style="background-color: #f5f5f5; display: none; position: absolute; z-index: 20; right: 0px; width: 300px; height: 50px; border: 1px solid #787878;">
                <div style="position: absolute; width: 15px; height: 15px; right: 2px; top: 2px; background-color: #ffffff; text-align: center;"><a id="link_close">X</a></div>
                <div style="margin: 13px;">Link: <input id="link_field" type="text" style="width: 220px;" value="" /></div>
                <script type="text/javascript">
                    $('#link_close').click( function() { $('#link_box').fadeOut(); });
                </script>
            </div>
    <div id="map_canvas"></div>
    <div id="legend_wrapper">
        <div id="legend_background"></div>
        <div id="legend"></div> 
    </div>
</div>

<div id="map_footer">
    <div class="map_bar">
        <span class="buttons">
            <a href="gisdata.php">Download Data</a>
            <a id="metadataLink" target="_blank" href="#">View Metadata</a>
        </span>
        <span class="logoBlock"><a href="http://www.uaf.edu"><img alt="UAF Logo" style="height: 28px;" src="images/UAFLogo_A_white.png" /></a></span>
    </div>
</div>

<div id="printFooter">
    <address>
        <strong>Scenarios Network for Alaska and Arctic Planning</strong><br/>
        snap.uaf.edu<br/>
        3352 College Road, Fairbanks AK 99709<br/>
        nlfresco@alaska.edu | tel 907.474.2405 | fax 907.474.7151<br/>
    </address>
    <img src="images/snap_acronym_screen_color_lg.gif" alt="logo" />
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

    // detect hashchanges and reload the map
    $(window).hashchange(function() {
        buildMenus();
        if( true === addMapIfNecessary() ) {
            addMap();
        }
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
            resize();            
            google.maps.event.addListener(map, 'idle', function(){
                validateState();
            });
        });
    });

    // the resize function is defined in the maps.js file.
    $(window).resize(resize);

    $('#export_link').click( function() {
        $('#link_field').val(window.location.href);
        $('#link_box').fadeIn();
        $('#link_field').focus().select();
    });
    
});

</script>
</body>
</html>